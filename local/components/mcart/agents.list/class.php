<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Errorable;
use \Bitrix\Main\Engine\Contract\Controllerable;

use \Bitrix\Main\Error;
use \Bitrix\Main\ErrorCollection;

use \Bitrix\Main\Application;

use \Bitrix\Main\Data\Cache;
use \Bitrix\Main\Data\TaggedCache;

use \Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Highloadblock\HighloadBlockTable;
use \Bitrix\Main\Engine\ActionFilter;


class AgentsList extends CBitrixComponent implements Controllerable, Errorable
{
    protected ErrorCollection $errorCollection;

    protected Cache $cache;
    protected TaggedCache $taggedCache;

    protected int $cacheTime;
    protected bool $cacheInvalid;
    protected string $cacheKey;
    protected string $cachePatch;

    /**
     * Получение ошибок
     */
    final public function getErrors(): array
    {
        return $this->errorCollection->toArray();
    }

    final public function getErrorByCode($code): Error
    {
        return $this->errorCollection->getErrorByCode($code);
    }

    /**
     * Добавление ошибки
     */
    private function addError(Error $error): void
    {
        $this->errorCollection[] = $error;
    }

    /**
     * Добавление ошибок
     */
    private function addErrors(array $errors): void
    {
        $this->errorCollection->add($errors);
    }

    /**
     * Вывод ошибок в публичке
     */
    private function showErrors(): bool
    {
        if (count($this->getErrors())) {
            foreach ($this->getErrors() as $error) {
                if ((int)$error->getCode() === 404) {
                    ShowError($error->getMessage());
                }
            }

            return true;
        }

        return false;
    }

    /**
     * Обязательный метод, запускается всегда при загрузке класса, используется для проверки Параметров
     */
    final public function onPrepareComponentParams($arParams): array
    {
        $this->initCache(); // создание параметров для работы кеша


        // Проверка подключение модуля highloadblock, отдать ошибку если модуль не подключен
        if (!Loader::includeModule('highloadblock')) {
            $this->addError(
                new Error(Loc::getMessage('MCART_AGENTS_LIST_MODULE_NOT_INSTALLED', ['#MODULE#' => 'highloadblock']), 404)
            );
        }

        /*
         * Проверяем, что заданы значения в $arParams "Время кеширования" и "Количество элементов"
         * Если не заданы, указываем дефолтные значения
         */
        $defaultAgentsCount = '20';
        if (empty($arParams['AGENTS_COUNT'])) {
            $arParams['AGENTS_COUNT'] = $defaultAgentsCount;
        }

        $defaultCacheTime = 36000000;
        if (empty($arParams['CACHE_TIME'])) {
            $arParams['CACHE_TIME'] = $defaultCacheTime;
        }

        return parent::onPrepareComponentParams($arParams);
    }

    private function initCache(): void
    {
        $this->cacheInvalid = false;
        $this->errorCollection = new ErrorCollection();
        $this->cacheKey = self::class . '_' . md5(json_encode($this->arParams)); // тут указывается от каких параметров зависит кэш
        $this->cachePatch = self::class; // директория для хранения файлов кеша

        $this->cache = Cache::createInstance();
        $this->taggedCache = Application::getInstance()->getTaggedCache();
    }

    final public function executeComponent(): void
    {
        if (empty($this->arParams["HLBLOCK_TNAME"])) {
            /**
             * Если параметр Название таблицы (TABLE_NAME) Highload-блока не задан,
             * отдаем ошибку.
             */
            $this->addError(
                new Error(
                    Loc::getMessage('MCART_AGENTS_LIST_NOT_HLBLOCK_TNAME'),
                    404)
            );
        }

        if ($this->showErrors()) {
            return;
        }

        // https://dev.1c-bitrix.ru/api_help/main/reference/cphpcache/initcache.php в данном компоненте используется Bitrix\Main\Data\Cache::initCache из нового ядра
        if ($this->cache->initCache(
            $this->arParams["CACHE_TIME"],
            $this->cacheKey,
            $this->cachePatch
        )) { // если кеш есть
            $this->arResult = $this->cache->getVars();
        } else { // если кеша нет
            $this->taggedCache->startTagCache($this->cachePatch); // старт для области, для тегированного кеша

            $this->arResult = []; // объявим результирующий массив

            $arHlblock = self::getHlblockTableName($this->arParams["HLBLOCK_TNAME"]); // получить хлблок по TABLE_NAME

            $this->taggedCache->registerTag('hlblock_table_name_' . $arHlblock['TABLE_NAME']); // Регистрируем кеш, чтобы по нему на событиях добавление/изменение/удаление элементов хлблока сбрасывать кеш компонента

            $entity = self::getEntityDataClassById($arHlblock); // получить класс для работы с хлблоком
            $typeAgentsFieldName = 'UF_EMPLOYMENT';
            $arTypeAgents = self::getFieldListValue($arHlblock, $typeAgentsFieldName); // получить массив со значениями списочного свойства Виды деятельности агентов
            $this->arResult['AGENTS'] = $this->getAgents($entity, $arTypeAgents); // получить массив со списком агентов и объектом для пагинации


            if ($this->cacheInvalid) {
                $this->taggedCache->abortTagCache();
                $this->cache->abortDataCache();
            }

            $this->taggedCache->endTagCache(); // конец области, для тегированого кеша
            $this->cache->endDataCache($this->arResult); // запись arResult в кеш
        }

        // Получаем Избранных агентов для текущего пользователя
        $category = 'mcart_agent';  // категория настройки
        $name = 'options_agents_star';  // название настройки
        $this->arResult['STAR_AGENTS'] = CUserOptions::GetOption($category, $name);

        $this->IncludeComponentTemplate(); // вызов шаблона компонента
    }

    /**
     * Метод для получения данных хлблока по TABLE_NAME
     * @param string $hl_block_name - название таблицы хлблока
     * @return array
     */
    private static function getHlblockTableName(string $hl_block_name): array
    {
        if (empty($hl_block_name) || strlen($hl_block_name) < 1) {
            return [];
        }

        /*
         * Делаем запрос для получения данных хлблока по TABLE_NAME, используя HighloadBlockTable::getList
         * https://dev.1c-bitrix.ru/learning/course/index.php?COURSE_ID=43&LESSON_ID=5753
         */
        $result = HighloadBlockTable::getList([
            'filter' => [
                "TABLE_NAME" => $hl_block_name
            ], 
        ]);

        if ($row = $result->fetch()) { // Получим результат запроса
            return $row;
        }


        return [];
    }

    /**
     * Метод для получения класса для работы с элементами хлблока
     * @param array $arHlblock - массив с данными хлблока
     * @return string
     */
    private static function getEntityDataClassById(array $arHlblock): string
    {
        if (empty($arHlblock)) {
            return '';
        }

        /*
         * Получение класса хлблока
         * https://tichiy.ru/wiki/rabota-s-highload-blokami-bitriks-cherez-api-d7/
         */

        $hlblock = HighloadBlockTable::getById($arHlblock["ID"])->fetch();

        $entity = HighloadBlockTable::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();

        return $entity_data_class;
    }

    /**
     * Метод для получения значений списочного свойства
     * @param array $arHlblock - массив с данными хлблока (нужен ID хлблока)
     * @param string $fieldName - Код списочного свойства
     * @return array
     */
    private function getFieldListValue(array $arHlblock, string $fieldName): array
    {
        $result = [];

        //Получаем ID пользовательского поля, по его коду
        $fieldID = Bitrix\Main\UserFieldTable::getList([
            'filter' => [
                "ENTITY_ID" => "HLBLOCK_" . $arHlblock['ID'],
                "FIELD_NAME" => $fieldName,
            ],
        ])->Fetch()["ID"];

        if ($fieldID) {

            // Получаем список свойств для $fieldID
            $fieldEnum = CUserFieldEnum::GetList(
                [],
                [
                    'USER_FIELD_ID' => $fieldID,
                ],
            )->arResult;

            foreach ($fieldEnum as $properties) {
                $result[$properties['ID']] = $properties['VALUE'];
            }
        }

        return $result;
    }

    /**
     * Метод для получения списка агентов
     * @param string $entity - класс хлблока
     * @param array $arTypeAgents - массив Видов деятельности агентов
     * @return array|array[]
     */
    private function getAgents(string $entity, array $arTypeAgents): array
    {
        $arAgents = [
            'NAV_OBJECT' => [], // для построения постраничной навигации
            'ITEMS' => [], // список агентов
        ];

        // Объект для пагинации
        $nav = new \Bitrix\Main\UI\PageNavigation("nav-agents");
        $nav->allowAllRecords(true)
            ->setPageSize($this->arParams['AGENTS_COUNT'])
            ->initFromUri();

        $rsAgents = $entity::getlist([
            /*
             * Запрашиваем список "Активных" агентов,
             * в запросе ограничиваем количество агентов (используем объект для пагинации)
             * https://dev.1c-bitrix.ru/learning/course/index.php?COURSE_ID=43&LESSON_ID=2741
             */
            "filter" => [
                "UF_IS_ACTIVE" => 1,
            ],
            "offset" => $nav->getOffset(),
            "limit" => $nav->getLimit(),
            'count_total' => true, // дает возможность получить кол-во элементов через метод getCount()
        ]);

        while ($arAgent = $rsAgents->fetch()) {
            /**
             * Обработает полученный массив
             * 
             * 1. В свойстве Вид деятельности записан ID значения списка,
             * с помощью массива $arTypeAgents определяем значение
             * 
             * 2. В свойстве Фото записан ID файла из таблицы b_file,
             * если значение есть, то получаем путь
             */
            $typeAgentsFieldId = $arAgent['UF_EMPLOYMENT'];
            $arAgent['UF_EMPLOYMENT'] = $arTypeAgents[$typeAgentsFieldId];

            if ($arAgent['UF_PHOTO']) {
                $photoFieldId = $arAgent['UF_PHOTO'];
                $arAgent['UF_PHOTO'] = CFile::GetByID($photoFieldId)->fetch();
                $arAgent['UF_PHOTO'] = $arAgent['UF_PHOTO']['SRC'];
            }

            $arAgents['ITEMS'][$arAgent['ID']] = $arAgent; // Записываем получившийся массив
        }

        $nav->setRecordCount($rsAgents->getCount()); // В объект для пагинации передаем общее количество агентов
        $arAgents['NAV_OBJECT'] = $nav; // Записываем получившийся объект

        return $arAgents;
    }


    /**
     * Конфигурация событий для ajax
     */
    final public function configureActions(): array
    {
        return [
            'clickStar' => [
                'prefilters' => [
                    new ActionFilter\Authentication(),
                    new ActionFilter\HttpMethod(
                        [ActionFilter\HttpMethod::METHOD_POST]
                    ),
                    new ActionFilter\Csrf(),
                ]
            ],
        ];
    }


    /**
     * Метод для изменения избранных агентов через ajax
     * @param $agentID - ID элемента агента
     * @return array|string[]
     */
    public function clickStarAction($agentID): array
    {
        $result = []; // ответ, который уйдет на фронт

        $value = []; // массив ID элементов, которые пользователь добавил в избранное

        // Получаем Избранных агентов для текущего пользователя из таблицы b_user_option
        $category = 'mcart_agent';
        $name = 'options_agents_star';
        $agentsStarOfUser = CUserOptions::GetOption($category, $name);

        if ($agentsStarOfUser) {
            if (!is_array($agentsStarOfUser)) {
                // сделать массивом
                $agentsStarOfUser = [$agentsStarOfUser];
            }

            // Если агент уже есть в избранных
            if (in_array($agentID, $agentsStarOfUser)) {
                // удаляем
                $key = array_search($agentID, $agentsStarOfUser);
                array_splice($agentsStarOfUser, $key, 1);
            } else {
                // добавляем
                array_push($agentsStarOfUser, $agentID);
            }

            $value = $agentsStarOfUser;

        } else { // если записи в таблице еще нет
            array_push($value, $agentID);
        }

        $isSuccess = CUserOptions::SetOption($category, $name, $value);
        if ($isSuccess) {
            $result['action'] = 'success';
        }

        return $result;
    }
}

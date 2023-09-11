<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Главная страница");
?>
<? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    ".default",
    array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "include",
        "EDIT_TEMPLATE" => "",
        "COMPONENT_TEMPLATE" => ".default",
        "PATH" => "/include/main_info.php"
    ),
    false
); ?>

<?
$filterIsPreferredDeal = array(
    "PROPERTY_IS_PREFERRED_DEAL_VALUE" => "Да",
);
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "slider",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "/obyavleniya/#CODE#/",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "N",
        "DISPLAY_PREVIEW_TEXT" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "DETAIL_PICTURE",
            1 => "",
        ),
        "FILTER_NAME" => "filterIsPreferredDeal",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "1",
        "IBLOCK_TYPE" => "advertisements",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "N",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Объявления",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "PRICE",
            1 => "",
        ),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "Y",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "NAME",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N",
        "COMPONENT_TEMPLATE" => "slider",
        "FILE_404" => "/404.php"
    ),
    false
);
?>

    <div class="py-5">
        <div class="container">

            <div class="row">
                <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                    <div class="feature d-flex align-items-start">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "include",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/feature_1.php"
                            )
                        ); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                    <div class="feature d-flex align-items-start">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "include",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/feature_2.php"
                            )
                        ); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                    <div class="feature d-flex align-items-start">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "include",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/feature_3.php"
                            )
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<? $APPLICATION->IncludeComponent(
    "bitrix:news.line",
    "latest_announcements_main",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "1210000",
        "CACHE_TYPE" => "A",
        "COMPONENT_TEMPLATE" => "latest_announcements_main",
        "DETAIL_URL" => "obyavleniya/#CODE#/",
        "FIELD_CODE" => array(
            0 => "PREVIEW_TEXT",
            1 => "PREVIEW_PICTURE",
            2 => "PROPERTY_PRICE",
            3 => "PROPERTY_TOTAL_AREA",
            4 => "PROPERTY_NUMBER_OF_FLOORS",
            5 => "PROPERTY_NUMBER_OF_BATHROOMS",
            6 => "PROPERTY_IS_AVAILABLE_GARAGE",
        ),
        "IBLOCKS" => array(),
        "IBLOCK_TYPE" => "advertisements",
        "NEWS_COUNT" => "9",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC"
    ),
    false
); ?>

<? $APPLICATION->IncludeComponent(
    "bitrix:news.line",
    "services_main",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
        "CACHE_GROUPS" => "Y",    // Учитывать права доступа
        "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
        "CACHE_TYPE" => "A",    // Тип кеширования
        "COMPONENT_TEMPLATE" => "services_main",
        "DETAIL_URL" => "",    // URL, ведущий на страницу с содержимым элемента раздела
        "FIELD_CODE" => array(    // Поля
            0 => "",
            1 => "PROPERTY_EXTERNAL_RESOURCE_LINK",
            2 => "",
        ),
        "IBLOCKS" => "",    // Код информационного блока
        "IBLOCK_TYPE" => "services",    // Тип информационного блока
        "NEWS_COUNT" => "6",    // Количество новостей на странице
        "SORT_BY1" => "ACTIVE_FROM",    // Поле для первой сортировки новостей
        "SORT_BY2" => "SORT",    // Поле для второй сортировки новостей
        "SORT_ORDER1" => "DESC",    // Направление для первой сортировки новостей
        "SORT_ORDER2" => "ASC",    // Направление для второй сортировки новостей
    ),
    false
); ?>

<? $APPLICATION->IncludeComponent(
    "bitrix:news.line",
    "news_main",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
        "CACHE_GROUPS" => "Y",    // Учитывать права доступа
        "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
        "CACHE_TYPE" => "A",    // Тип кеширования
        "DETAIL_URL" => "",    // URL, ведущий на страницу с содержимым элемента раздела
        "FIELD_CODE" => array(    // Поля
            0 => "PREVIEW_TEXT",
            1 => "PREVIEW_PICTURE",
            2 => "DATE_ACTIVE_FROM",
            3 => "",
        ),
        "IBLOCKS" => array(    // Код информационного блока
            0 => "2",
        ),
        "IBLOCK_TYPE" => "news",    // Тип информационного блока
        "NEWS_COUNT" => "3",    // Количество новостей на странице
        "SORT_BY1" => "ACTIVE_FROM",    // Поле для первой сортировки новостей
        "SORT_BY2" => "SORT",    // Поле для второй сортировки новостей
        "SORT_ORDER1" => "DESC",    // Направление для первой сортировки новостей
        "SORT_ORDER2" => "ASC",    // Направление для второй сортировки новостей
    ),
    false
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
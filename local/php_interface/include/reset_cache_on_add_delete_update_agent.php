<?php
// регистрация обработчиков
$eventManager = \Bitrix\Main\EventManager::getInstance();

// при добавлении
$eventManager->addEventHandler(
    '',
    'EstateAgentOnAfterAdd', // тип события, EstateAgent - название хлблока
    'resetCache'  // функция-обработчик
);

// при обновлении
$eventManager->addEventHandler(
    '',
    'EstateAgentOnAfterUpdate', // тип события, EstateAgent - название хлблока
    'resetCache'   // функция-обработчик
);

// при удалении
$eventManager->addEventHandler(
    '',
    'EstateAgentOnAfterDelete', // тип события, EstateAgent - название хлблока
    'resetCache'   // функция-обработчик
);


// создаем обработчик событий
/**
 * Сбрасывает кеш по тегу при добавлении/обновлении/удалении агентов
 * @param \Bitrix\Main\Entity\Event $event
 * @return void
 */
function resetCache(\Bitrix\Main\Entity\Event $event): void {
    $tableName = $event->getEntity()->getDBTableName();
    $taggedCache = \Bitrix\Main\Application::getInstance()->getTaggedCache();
    $taggedCache->clearByTag('hlblock_table_name_' . $tableName);
}

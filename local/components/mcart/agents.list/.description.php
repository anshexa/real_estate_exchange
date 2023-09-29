<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$arComponentDescription = array(
    "NAME" => GetMessage("HLBLOCK_DESC_LIST_AGENTS_NAME"),  // название компонента
    "DESCRIPTION" => GetMessage("HLBLOCK_DESC_LIST_AGENTS_DESC"),   // описание компонента
    "ICON" => "/images/no-avatar.png",
    "SORT" => 20,
    "CACHE_PATH" => "Y",    // показывать кнопку очистки кеша компонента в режиме редактирования сайта
    "PATH" => array(    // расположение компонента в виртуальном дереве компонента в визуальном редакторе
        "ID" => "content",  // код ветки дерева
        "CHILD" => array(   // подчиненная ветка
            "ID" => "agents",
            "NAME" => GetMessage("HLBLOCK_DESC_LIST_AGENTS"),   // название ветки дерева
            "SORT" => 10,
        ),
    ),
);

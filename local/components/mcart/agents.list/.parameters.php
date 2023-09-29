<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        // параметр Название таблицы
        "HLBLOCK_TNAME" => array( // Код поля
            "PARENT" => "BASE", //
            "NAME" => GetMessage("MCART_AGENTS_LIST_HLBLOCK_TNAME"), // Название параметра, берется из языкового файла
            "TYPE" => "STRING", // Тип поля
            "DEFAULT" => "agents",  // Значение по дефолту
        ),
        "AGENTS_COUNT" => array( // Количество элементов для постраничной пагинации
            "PARENT" => "BASE",
            "NAME" => GetMessage("MCART_AGENTS_LIST_HLBLOCK_CONT"),
            "TYPE" => "STRING",
            "DEFAULT" => "20",
        ),
        "CACHE_TIME" => array(   // Кеширование
            "DEFAULT" => 36000000
        ),
    ),
);

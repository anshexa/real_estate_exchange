<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 */

//delayed function must return a string
if (empty($arResult))
    return "";

$strReturn = '<div>';

$itemSize = count($arResult);
for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);
    $bullet = ($index > 0 ? '<span class="mx-2 text-white">&bullet;</span>' : '');

    if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1) {
        $strReturn .= $bullet . '<a href="' . $arResult[$index]["LINK"] . '">' . $title . ' </a>';
    } else {
        $strReturn .=  $bullet . '<strong class="text-white">' . $title . '</strong>';
    }
}

$strReturn .= '</div>';

return $strReturn;

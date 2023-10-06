<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

//delayed function must return a string
if (empty($arResult))
    return "";

$strReturn = '<div class="breadcrumbs-box">
                    <div class="inner-wrap">';

$itemSize = count($arResult);
for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1) {
        $strReturn .= '<a href="' . $arResult[$index]["LINK"] . '">' . $title . '</a>';
    } else {    // последний пункт
        $strReturn .= '<span>' . $title . '</span>';
    }
}

$strReturn .= '
    </div>
</div>';

return $strReturn;

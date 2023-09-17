<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}
?>

<div class="site-pagination">
    <?
    $strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
    $strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
    if ($arResult["bDescPageNumbering"] === true) { // если используется обратная навигация
        // to show always first and last pages
        $arResult["nStartPage"] = $arResult["NavPageCount"];
        $arResult["nEndPage"] = 1;

        $bFirst = true;
        $bPoints = false;
        do {
            $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;
            if ($arResult["nStartPage"] <= 2 ||
                $arResult["NavPageCount"] - $arResult["nStartPage"] <= 1 ||
                abs($arResult['nStartPage'] - $arResult["NavPageNomer"]) <= 2) {

                if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                    ?>
                    <a class="active"><?= $NavRecordGroupPrint ?></a>
                <?
                elseif ($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
                    ?>
                    <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>">
                        <?= $NavRecordGroupPrint ?>
                    </a>
                <?
                else:
                    ?>
                    <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>">
                        <?= $NavRecordGroupPrint ?>
                    </a>
                <?
                endif;
                $bFirst = false;
                $bPoints = true;
            } else {
                if ($bPoints) {
                    ?><span>...</span><?
                    $bPoints = false;
                }
            }
            $arResult["nStartPage"]--;
        } while ($arResult["nStartPage"] >= $arResult["nEndPage"]);
    } else {
        // to show always first and last pages
        $arResult["nStartPage"] = 1;
        $arResult["nEndPage"] = $arResult["NavPageCount"];

        $bFirst = true;
        $bPoints = false;
        do {
            if ($arResult["nStartPage"] <= 2 ||
                $arResult["nEndPage"] - $arResult["nStartPage"] <= 1 ||
                abs($arResult['nStartPage'] - $arResult["NavPageNomer"]) <= 2) {

                if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                    ?>
                    <a class="active"><?= $arResult["nStartPage"] ?></a>
                <?
                elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
                    ?>
                    <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>">
                        <?= $arResult["nStartPage"] ?>
                    </a>
                <?
                else:
                    ?>
                    <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>">
                        <?= $arResult["nStartPage"] ?>
                    </a>
                <?
                endif;
                $bFirst = false;
                $bPoints = true;
            } else {
                if ($bPoints) {
                    ?><span>...</span><?
                    $bPoints = false;
                }
            }
            $arResult["nStartPage"]++;
        } while ($arResult["nStartPage"] <= $arResult["nEndPage"]);
    }
    ?>
</div>

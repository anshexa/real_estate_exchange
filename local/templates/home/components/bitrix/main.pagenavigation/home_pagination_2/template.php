<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * @var array $arResult
 * @var array $arParam
 * @var CBitrixComponentTemplate $this
 */

/** @var PageNavigationComponent $component */
$component = $this->getComponent();

$this->setFrameMode(true);
?>


<div class="site-pagination">
    <? $first = true;

    if ($arResult["CURRENT_PAGE"] > 1 && $arResult["START_PAGE"] > 1):
        $first = false; ?>
        <a href="<?= htmlspecialcharsbx($arResult["URL"]) ?>">
            1
        </a>
        <? if ($arResult["START_PAGE"] > 2): ?>
            <span>...</span>
        <? endif;
    endif;

    $page = $arResult["START_PAGE"];
    do {
        if ($page == $arResult["CURRENT_PAGE"]): ?>
            <a href="" class="active">
                <?= $page ?>
            </a>
        <? elseif ($page == 1): ?>
            <a href="<?= htmlspecialcharsbx($arResult["URL"]) ?>">
                1
            </a>
        <? else: ?>
            <a href="<?= htmlspecialcharsbx($component->replaceUrlTemplate($page)) ?>">
                <?= $page ?>
            </a>
        <?
        endif;

        $page++;
        $first = false;
    } while ($page <= $arResult["END_PAGE"]);

    if ($arResult["CURRENT_PAGE"] < $arResult["PAGE_COUNT"] && $arResult["END_PAGE"] < $arResult["PAGE_COUNT"]):
        if ($arResult["END_PAGE"] < ($arResult["PAGE_COUNT"] - 1)): ?>
            <span>...</span>
        <? endif; ?>
        <a href="<?= htmlspecialcharsbx($component->replaceUrlTemplate($arResult["PAGE_COUNT"])) ?>">
            <?= $arResult["PAGE_COUNT"] ?>
        </a>
    <? endif; ?>
</div>

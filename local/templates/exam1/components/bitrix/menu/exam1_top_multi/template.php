<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>

<nav class="nav">
    <div class="inner-wrap">
        <div class="menu-block popup-wrap">
            <a href="" class="btn-menu btn-toggle"></a>
            <div class="menu popup-block">

                <? if (!empty($arResult)): ?>
                    <ul class="">

                        <? $previousLevel = 0;
                        foreach ($arResult as $arItem): ?>

                            <? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                                <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
                            <? endif ?>

                            <? if ($arItem["PERMISSION"] > "D"): // разрешено - выводим ?>
                                <li
                                    <? if ($arItem["LINK"] == SITE_DIR): ?>
                                        class="main-page"
                                    <? endif; ?>>
                                    <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                                <? if ($arItem["IS_PARENT"]): ?>
                                    <ul>
                                    <? if ($arItem["PARAMS"]["TEXT_MENU"]): ?>
                                        <div class="menu-text"><?= $arItem["PARAMS"]["TEXT_MENU"] ?></div>
                                    <? endif ?>
                                <? else:?>
                                    </li>
                                <? endif ?>

                            <? endif ?>

                            <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

                        <? endforeach ?>

                        <? if ($previousLevel > 1): //close last item tags ?>
                            <?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
                        <? endif ?>

                    </ul>

                    <a href="" class="btn-close"></a>
                <? endif ?>
            </div>
            <div class="menu-overlay"></div>
        </div>
    </div>
</nav>

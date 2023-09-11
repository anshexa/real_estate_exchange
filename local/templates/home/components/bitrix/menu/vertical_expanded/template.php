<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="col-lg-4 mb-5 mb-lg-0">
    <div class="row mb-5">
        <div class="col-md-12">
            <h3 class="footer-heading mb-4"><?= GetMessage("NAVIGATIONS") ?></h3>
        </div>
        <?
        $middleOfMenuItems = ceil(count($arResult) / 2);
        if (!empty($arResult)):
            $i = 0;
            foreach ($arResult as $arItem):
                $i += 1;
                if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1):
                    continue;
                endif;
                ?>
                <? if ($i == 1 || $i == $middleOfMenuItems + 1): ?>
                    <div class="col-md-6 col-lg-6">
                        <ul class="list-unstyled">
                <? endif ?>
                            <li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                <? if ($i == $middleOfMenuItems || $i == count($arResult)): ?>
                        </ul>
                    </div>
                <? endif ?>
            <? endforeach ?>
        <? endif ?>

    </div>
</div>

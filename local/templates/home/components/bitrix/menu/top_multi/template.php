<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="col-4 col-md-4 col-lg-8">
    <nav class="site-navigation text-right text-md-right" role="navigation">

        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3">
            <a href="#" class="site-menu-toggle js-menu-toggle text-black">
                <span class="icon-menu h3"></span>
            </a>
        </div>
        <? if (!empty($arResult)): ?>
            <ul class="site-menu js-clone-nav d-none d-lg-block">
                <?
                $previousLevel = 0;
                foreach ($arResult as $arItem):

                     // закрываем теги, если текущий уровень меньше, чем предыдущий
                     if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):
                        echo str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));
                     endif;

                     $classLi = "";
                     $isNeededUl = false;

                     if ($arItem["IS_PARENT"]):
                         $classLi = "has-children";
                         $isNeededUl = true;
                     endif;

                     if ($arItem["DEPTH_LEVEL"] == 1):
                         if ($arItem["SELECTED"]): //если текущий
                             $classLi = "{$classLi} active";
                         endif;
                     endif;
                     ?>

                     <? if ($arItem["PERMISSION"] > "D"): // если доступ не запрещен, выводим список ?>
                        <li
                            <? if (!empty($classLi)): ?>
                                class="<?= $classLi ?>"
                            <? endif ?>>
                            <a href="<?= $arItem["LINK"] ?>">
                                <?= $arItem["TEXT"] ?>
                            </a>
                            <? if (!empty($isNeededUl)): ?>
                                <ul class="dropdown">
                            <? else: ?>
                                </li>
                            <? endif ?>
                    <? endif ?>

                    <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

                <? endforeach ?>

                <? if ($previousLevel > 1)://close last item tags ?>
                    <?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
                <? endif ?>

            </ul>
        <? endif ?>
    </nav>
</div>

<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">

<head>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <? $APPLICATION->ShowHead(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?

    use Bitrix\Main\Page\Asset;

    // css
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/fonts/icomoon/style.css");

    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap.min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/magnific-popup.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/jquery-ui.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/owl.carousel.min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/owl.theme.default.min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap-datepicker.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/mediaelementplayer.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/animate.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/fonts/flaticon/font/flaticon.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/fl-bigmug-line.css");

    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/aos.css");

    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/style.css");

    // js
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-3.3.1.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-migrate-3.0.1.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-ui.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/popper.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/bootstrap.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/owl.carousel.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/mediaelement-and-player.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.stellar.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.countdown.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.magnific-popup.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/bootstrap-datepicker.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/aos.js");

    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/main.js");
    ?>

</head>

<body>
<? $APPLICATION->ShowPanel(); ?>
<div class="site-loader"></div>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="border-bottom bg-white top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-md-6">
                    <p class="mb-0">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "include",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/phone.php"
                            )
                        ); ?>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "include",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/email.php"
                            )
                        ); ?>
                    </p>
                </div>
                <div class="col-6 col-md-6 text-right">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "include",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/include/social_header.php"
                        )
                    ); ?>
                </div>
            </div>
        </div>

    </div>
    <div class="site-navbar">
        <div class="container py-1">
            <div class="row align-items-center">
                <div class="col-8 col-md-8 col-lg-4">
                    <h1 class="">
                        <a href="<?= SITE_DIR ?>index.php" class="h5 text-uppercase text-black">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "include",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/include/company_name.php"
                                )
                            ); ?>
                        </a>
                    </h1>
                </div>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "top_multi",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                        "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
                        "DELAY" => "N",    // Откладывать выполнение шаблона меню
                        "MAX_LEVEL" => "3",    // Уровень вложенности меню
                        "MENU_CACHE_GET_VARS" => array(    // Значимые переменные запроса
                            0 => "",
                        ),
                        "MENU_CACHE_TIME" => "36000000",    // Время кеширования (сек.)
                        "MENU_CACHE_TYPE" => "A",    // Тип кеширования
                        "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                        "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
                        "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                    ),
                    false
                ); ?>


            </div>
        </div>
    </div>
</div>

<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Главная страница");
?>
<? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    ".default",
    array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "include",
        "EDIT_TEMPLATE" => "",
        "COMPONENT_TEMPLATE" => ".default",
        "PATH" => "/include/main_info.php"
    ),
    false
); ?>

<?
$filterIsPreferredDeal = array(
    "PROPERTY_IS_PREFERRED_DEAL_VALUE" => "Да",
);
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "slider",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "/obyavleniya/#CODE#/",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "N",
        "DISPLAY_PREVIEW_TEXT" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "DETAIL_PICTURE",
            1 => "",
        ),
        "FILTER_NAME" => "filterIsPreferredDeal",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "1",
        "IBLOCK_TYPE" => "advertisements",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "N",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Объявления",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "PRICE",
            1 => "",
        ),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "Y",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "NAME",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N",
        "COMPONENT_TEMPLATE" => "slider",
        "FILE_404" => "/404.php"
    ),
    false
);
?>

    <div class="py-5">
        <div class="container">

            <div class="row">
                <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                    <div class="feature d-flex align-items-start">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "include",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/feature_1.php"
                            )
                        ); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                    <div class="feature d-flex align-items-start">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "include",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/feature_2.php"
                            )
                        ); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                    <div class="feature d-flex align-items-start">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "include",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/feature_3.php"
                            )
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<? $APPLICATION->IncludeComponent(
    "bitrix:news.line",
    "latest_announcements_main",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "1210000",
        "CACHE_TYPE" => "A",
        "COMPONENT_TEMPLATE" => "latest_announcements_main",
        "DETAIL_URL" => "obyavleniya/#CODE#/",
        "FIELD_CODE" => array(
            0 => "PREVIEW_TEXT",
            1 => "PREVIEW_PICTURE",
            2 => "PROPERTY_PRICE",
            3 => "PROPERTY_TOTAL_AREA",
            4 => "PROPERTY_NUMBER_OF_FLOORS",
            5 => "PROPERTY_NUMBER_OF_BATHROOMS",
            6 => "PROPERTY_IS_AVAILABLE_GARAGE",
        ),
        "IBLOCKS" => array(),
        "IBLOCK_TYPE" => "advertisements",
        "NEWS_COUNT" => "9",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC"
    ),
    false
); ?>


    <div class="site-section">
        <? $APPLICATION->IncludeComponent(
            "bitrix:news.line",
            ".default",
            array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "COMPONENT_TEMPLATE" => ".default",
                "DETAIL_URL" => "",
                "FIELD_CODE" => array(
                    0 => "",
                    1 => "PROPERTY_EXTERNAL_RESOURCE_LINK",
                    2 => "",
                ),
                "IBLOCKS" => array(),
                "IBLOCK_TYPE" => "services",
                "NEWS_COUNT" => "6",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "DESC",
                "SORT_ORDER2" => "ASC"
            ),
            false
        ); ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center mb-5">
                    <div class="site-section-title">
                        <h2>Our Services</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <a href="#" class="service text-center border rounded">
                        <span class="icon flaticon-house"></span>
                        <h2 class="service-heading">Research Subburbs</h2>
                        <p><span class="read-more">Learn More</span></p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <a href="#" class="service text-center border rounded">
                        <span class="icon flaticon-sold"></span>
                        <h2 class="service-heading">Sold Houses</h2>
                        <p><span class="read-more">Learn More</span></p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <a href="#" class="service text-center border rounded">
                        <span class="icon flaticon-camera"></span>
                        <h2 class="service-heading">Security Priority</h2>
                        <p><span class="read-more">Learn More</span></p>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <a href="#" class="service text-center border rounded">
                        <span class="icon flaticon-house"></span>
                        <h2 class="service-heading">Research Subburbs</h2>
                        <p><span class="read-more">Learn More</span></p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <a href="#" class="service text-center border rounded">
                        <span class="icon flaticon-sold"></span>
                        <h2 class="service-heading">Sold Houses</h2>
                        <p><span class="read-more">Learn More</span></p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <a href="#" class="service text-center border rounded">
                        <span class="icon flaticon-camera"></span>
                        <h2 class="service-heading">Security Priority</h2>
                        <p><span class="read-more">Learn More</span></p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <? $APPLICATION->IncludeComponent(
            "bitrix:news.line",
            "",
            array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "DETAIL_URL" => "",
                "FIELD_CODE" => array("", ""),
                "IBLOCKS" => array("2"),
                "IBLOCK_TYPE" => "news",
                "NEWS_COUNT" => "3",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "DESC",
                "SORT_ORDER2" => "ASC"
            )
        ); ?>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center">
                    <div class="site-section-title">
                        <h2>Our Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <a href="#"><img src="<?= SITE_DIR ?>upload/img_4.jpg" alt="Image" class="img-fluid"></a>
                    <div class="p-4 bg-white">
                        <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
                        <h2 class="h5 text-black mb-3">
                            <a href="#">When To Sell &amp; How Much To Sell?</a>
                        </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias enim, ipsa exercitationem
                            veniam quae
                            sunt.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
                    <a href="#"><img src="<?= SITE_DIR ?>upload/img_2.jpg" alt="Image" class="img-fluid"></a>
                    <div class="p-4 bg-white">
                        <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
                        <h2 class="h5 text-black mb-3">
                            <a href="#">
                                When To Sell &amp; How Much To Sell?
                            </a>
                        </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias enim, ipsa exercitationem
                            veniam quae
                            sunt.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="300">
                    <a href="#"><img src="<?= SITE_DIR ?>upload/img_3.jpg" alt="Image" class="img-fluid"></a>
                    <div class="p-4 bg-white">
                        <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
                        <h2 class="h5 text-black mb-3">
                            <a href="#">When To Sell &amp; How Much To Sell?</a>
                        </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias enim, ipsa exercitationem
                            veniam quae
                            sunt.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
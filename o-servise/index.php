<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("О сервисе");
?>
<div class="site-section border-bottom">
    <div class="container">
        <? $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            ".default",
            array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "include",
                "EDIT_TEMPLATE" => "",
                "PATH" => "/include/about_service.php"
            ),
            false
        ); ?>
    </div>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>

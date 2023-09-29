<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Агенты");
$APPLICATION->AddChainItem($APPLICATION->GetTitle(), SITE_TEMPLATE_PATH);   // добавляем пункт в меню
?>
<? $APPLICATION->IncludeComponent(
    "mcart:agents.list",
    "",
    array(
        "AGENTS_COUNT" => "3",
        "CACHE_TIME" => "",
        "CACHE_TYPE" => "A",
        "HLBLOCK_TNAME" => "estate_agent"
    )
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
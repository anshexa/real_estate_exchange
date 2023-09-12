<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Обратная связь");
$APPLICATION->AddChainItem($APPLICATION->GetTitle(), SITE_TEMPLATE_PATH);   // добавляем пункт в хлебные крошки
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.feedback",
	"",
	Array(
		"EMAIL_TO" => "hotelsruitstart23@ro.ru",
		"EVENT_MESSAGE_ID" => array(),
		"OK_TEXT" => "Спасибо, мы приняли ваше сообщение.",
		"REQUIRED_FIELDS" => array("NONE"),
		"USE_CAPTCHA" => "Y"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
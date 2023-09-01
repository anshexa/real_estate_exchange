<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет покупателя");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.profile", 
	".default", 
	array(
		"CHECK_RIGHTS" => "N",
		"COMPONENT_TEMPLATE" => ".default",
		"SEND_INFO" => "N",
		"SET_TITLE" => "N",
		"USER_PROPERTY" => array(
		),
		"USER_PROPERTY_NAME" => ""
	),
	false
);?><?$APPLICATION->IncludeComponent(
	"bitrix:subscribe.form", 
	".default", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"PAGE" => "#SITE_DIR#subscribe_new_advertisements_edit.php",
		"SHOW_HIDDEN" => "N",
		"USE_PERSONALIZATION" => "Y",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
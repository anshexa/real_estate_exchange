<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты ");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "include",
		"EDIT_TEMPLATE" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"AREA_FILE_RECURSIVE" => "Y"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
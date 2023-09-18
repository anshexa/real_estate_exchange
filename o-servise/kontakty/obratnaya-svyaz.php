<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Обратная связь");
$APPLICATION->AddChainItem($APPLICATION->GetTitle(), SITE_TEMPLATE_PATH);   // добавляем пункт в хлебные крошки
?>
<div class="site-section">
    <div class="container">
        <div class="row">
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.feedback",
                "feedback_home",
                array(
                    "EMAIL_TO" => "name@surname.local",    // E-mail, на который будет отправлено письмо
                    "EVENT_MESSAGE_ID" => "",    // Почтовые шаблоны для отправки письма
                    "OK_TEXT" => "Спасибо, мы приняли ваше сообщение.",    // Сообщение, выводимое пользователю после отправки
                    "REQUIRED_FIELDS" => array(    // Обязательные поля для заполнения
                        0 => "NAME",
                        1 => "EMAIL",
                        2 => "MESSAGE",
                    ),
                    "USE_CAPTCHA" => "Y",    // Использовать защиту от автоматических сообщений (CAPTCHA) для неавторизованных пользователей
                ),
                false
            ); ?>

            <div class="col-lg-4">
                <div class="p-4 mb-3 bg-white">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "include",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/include/contacts_feedback.php"
                        )
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>

<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

if (is_string($_REQUEST["backurl"]) && mb_strpos($_REQUEST["backurl"], "/") === 0) {
    LocalRedirect($_REQUEST["backurl"]);
}

$APPLICATION->SetTitle("Вход");
?>
<div class="site-section">
    <div class="container">
        <p>Вы зарегистрированы и успешно авторизовались.</p>
        <p><a href="<?= SITE_DIR ?>">Вернуться на главную страницу</a></p>
    </div>
</div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>

<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12 col-lg-8 mb-5">
                <?
                if (!empty($arParams["~AUTH_RESULT"])) {
                    ShowMessage($arParams["~AUTH_RESULT"]);
                }
                ?>

                <form name="bform" method="post" target="_top" action="<?= $arResult["AUTH_URL"] ?>" class="p-5 bg-white border">
                    <?
                    if ($arResult["BACKURL"] <> '') { ?>
                        <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"><?
                    }
                    ?>
                    <input type="hidden" name="AUTH_FORM" value="Y">
                    <input type="hidden" name="TYPE" value="SEND_PWD">

                    <p><?= GetMessage("sys_forgot_pass_label") ?></p>

                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="login">
                                <?= GetMessage("sys_forgot_pass_login1") ?>
                            </label>
                            <input type="text" id="login" name="USER_LOGIN"
                                   class="form-control"
                                   value="<?= $arResult["USER_LOGIN"] ?>">
                            <input type="hidden" name="USER_EMAIL">
                            <br>
                            <p><?= GetMessage("sys_forgot_pass_note_email") ?></p>
                        </div>
                    </div>

                    <? if ($arResult["PHONE_REGISTRATION"]): ?>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="phone">
                                    <?= GetMessage("sys_forgot_pass_phone") ?>
                                </label>
                                <input type="text" id="phone" name="USER_PHONE_NUMBER"
                                       class="form-control"
                                       value="<?= $arResult["USER_PHONE_NUMBER"] ?>">
                                <input type="hidden" name="USER_EMAIL">
                                <br>
                                <p><?= GetMessage("sys_forgot_pass_note_phone") ?></p>
                            </div>
                        </div>
                    <? endif; ?>

                    <? if ($arResult["USE_CAPTCHA"]): ?>
                        <div style="margin-top: 16px">
                            <div>
                                <input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>">
                                <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>"
                                     width="180" height="40" alt="CAPTCHA">
                            </div>
                            <div><?= GetMessage("system_auth_captcha") ?></div>
                            <div><input type="text" name="captcha_word" maxlength="50" value=""></div>
                            <br>
                        </div>
                    <? endif ?>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" name="send_account_info"
                                   class="btn btn-primary  py-2 px-4 rounded-0"
                                   value="<?= GetMessage("AUTH_SEND") ?>">
                        </div>
                    </div>

                    <p>
                        <a href="<?= $arResult["AUTH_AUTH_URL"] ?>" rel="nofollow">
                            <b><?= GetMessage("AUTH_AUTH") ?></b>
                        </a>
                    </p>

                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    document.bform.onsubmit = function () {
        document.bform.USER_EMAIL.value = document.bform.USER_LOGIN.value;
    };
    document.bform.USER_LOGIN.focus();
</script>

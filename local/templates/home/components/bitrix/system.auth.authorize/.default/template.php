<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12 col-lg-8 mb-5">
                <?
                if (!empty($arParams["~AUTH_RESULT"])) {
                    ShowMessage($arParams["~AUTH_RESULT"]);
                }

                if (!empty($arResult['ERROR_MESSAGE'])) {
                    ShowMessage($arResult['ERROR_MESSAGE']);
                }
                ?>

                <form name="form_auth" method="post" action="<?= $arResult["AUTH_URL"] ?>" class="p-5 bg-white border">
                    <input type="hidden" name="AUTH_FORM" value="Y">
                    <input type="hidden" name="TYPE" value="AUTH">
                    <? if ($arResult["BACKURL"] <> ''): ?>
                        <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>">
                    <? endif ?>
                    <? foreach ($arResult["POST"] as $key => $value): ?>
                        <input type="hidden" name="<?= $key ?>" value="<?= $value ?>">
                    <? endforeach ?>

                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="login">
                                <?= GetMessage("AUTH_LOGIN") ?>
                            </label>
                            <input type="text" id="login" class="form-control"
                                   name="USER_LOGIN" value="<?= $arResult["LAST_LOGIN"] ?>">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="password">
                                <?= GetMessage("AUTH_PASSWORD") ?>
                            </label>
                            <input type="password" id="password" class="form-control"
                                   name="USER_PASSWORD" autocomplete="off">
                        </div>
                    </div>

                    <? if ($arResult["CAPTCHA_CODE"]): ?>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>">
                                <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>"
                                     width="180" height="40" alt="CAPTCHA">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="captcha">
                                    <?= GetMessage("AUTH_CAPTCHA_PROMT") ?>:
                                </label>
                                <input type="text" id="captcha" class="form-control"
                                       name="captcha_word" autocomplete="off">
                            </div>
                        </div>
                    <? endif; ?>

                    <? if ($arResult["STORE_PASSWORD"] == "Y"): ?>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="checkbox" id="user_remember" value="Y">
                                <label for="user_remember">
                                    <?= GetMessage("AUTH_REMEMBER_ME") ?>
                                </label>
                            </div>
                        </div>
                    <? endif ?>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary py-2 px-4 rounded-0"
                                   value="<?= GetMessage("AUTH_AUTHORIZE") ?>">
                        </div>
                    </div>

                    <? if ($arParams["NOT_SHOW_LINKS"] != "Y"): ?>
                        <noindex>
                            <p>
                                <a href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>" rel="nofollow">
                                    <?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?>
                                </a>
                            </p>
                        </noindex>
                    <? endif ?>

                    <? if ($arParams["NOT_SHOW_LINKS"] != "Y" &&
                        $arResult["NEW_USER_REGISTRATION"] == "Y" &&
                        $arParams["AUTHORIZE_REGISTRATION"] != "Y"): ?>
                        <noindex>
                            <p>
                                <?= GetMessage("AUTH_FIRST_ONE") ?>
                                <br>
                                <a href="<?= $arResult["AUTH_REGISTER_URL"] ?>" rel="nofollow">
                                    <b><?= GetMessage("AUTH_REGISTER") ?></b>
                                </a>
                            </p>
                        </noindex>
                    <? endif ?>

                </form>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">
    <? if ($arResult["LAST_LOGIN"] <> ''): ?>
        try {
            document.form_auth.USER_PASSWORD.focus();
        } catch (e) {
        }
    <? else: ?>
        try {
            document.form_auth.USER_LOGIN.focus();
        } catch (e) {
        }
    <? endif ?>
</script>

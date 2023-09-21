<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if ($arResult["SHOW_SMS_FIELD"] == true) {
    CJSCore::Init('phone_auth');
}
?>


<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12 col-lg-8 mb-5">
                <? if (!empty($arParams["~AUTH_RESULT"])) {
                     ShowMessage($arParams["~AUTH_RESULT"]);
                }
                ?>
                <? if ($arResult["SHOW_EMAIL_SENT_CONFIRMATION"]): ?>
                    <p><?= GetMessage("AUTH_EMAIL_SENT") ?></p>
                <? endif; ?>

                <? if (!$arResult["SHOW_EMAIL_SENT_CONFIRMATION"] && $arResult["USE_EMAIL_CONFIRMATION"] === "Y"): ?>
                    <p><?= GetMessage("AUTH_EMAIL_WILL_BE_SENT") ?></p>
                <? endif ?>

                <noindex>

                    <? if ($arResult["SHOW_SMS_FIELD"] == true): ?>

                        <? // форма кода подтверждения из смс ?>
                        <form method="post" action="<?= $arResult["AUTH_URL"] ?>" name="regform"
                              class="p-5 bg-white border">
                            <input type="hidden" name="SIGNED_DATA"
                                   value="<?= htmlspecialcharsbx($arResult["SIGNED_DATA"]) ?>">

                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="sms_code">
                                        <?= GetMessage("MAIN_REGISTER_SMS_CODE") ?>
                                    </label>
                                    <input type="text" id="sms_code" name="SMS_CODE" class="form-control"
                                           autocomplete="off"
                                           value="<?= htmlspecialcharsbx($arResult["SMS_CODE"]) ?>">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" name="code_submit_button"
                                           class="btn btn-primary py-2 px-4 rounded-0"
                                           value="<?= GetMessage("MAIN_REGISTER_SMS_SEND") ?>">
                                </div>
                            </div>
                        </form>

                        <script>
                            new BX.PhoneAuth({
                                containerId: 'bx_register_resend',
                                errorContainerId: 'bx_register_error',
                                interval: <?= $arResult["PHONE_CODE_RESEND_INTERVAL"] ?>,
                                data:
                                    <?= CUtil::PhpToJSObject([
                                        'signedData' => $arResult["SIGNED_DATA"],
                                    ]) ?>,
                                onError:
                                    function (response) {
                                        var errorDiv = BX('bx_register_error');
                                        var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
                                        errorNode.innerHTML = '';
                                        for (var i = 0; i < response.errors.length; i++) {
                                            errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
                                        }
                                        errorDiv.style.display = '';
                                    }
                            });
                        </script>

                        <div id="bx_register_error" style="display:none"><? ShowError("error") ?></div>

                        <div id="bx_register_resend"></div>

                    <? elseif (!$arResult["SHOW_EMAIL_SENT_CONFIRMATION"]): ?>

                        <form method="post" action="<?= $arResult["AUTH_URL"] ?>" name="bform"
                              enctype="multipart/form-data" class="p-5 bg-white border">
                            <input type="hidden" name="AUTH_FORM" value="Y">
                            <input type="hidden" name="TYPE" value="REGISTRATION">

                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="name">
                                        <?= GetMessage("AUTH_NAME") ?>
                                    </label>
                                    <input type="text" id="name" name="USER_NAME"
                                           class="form-control"
                                           value="<?= $arResult["USER_NAME"] ?>"
                                           placeholder="<?= GetMessage("AUTH_NAME") ?>">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="font-weight-bold" for="surname">
                                        <?= GetMessage("AUTH_LAST_NAME") ?>
                                    </label>
                                    <input type="text" id="surname" name="USER_LAST_NAME"
                                           class="form-control"
                                           value="<?= $arResult["USER_LAST_NAME"] ?>"
                                           placeholder="<?= GetMessage("AUTH_LAST_NAME") ?>">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="font-weight-bold" for="login">
                                        <?= GetMessage("AUTH_LOGIN") ?>
                                    </label>
                                    <span>*</span>
                                    <input type="text" id="login" name="USER_LOGIN"
                                           title="Логин не менее 3 символов"
                                           class="form-control"
                                           value="<?= $arResult["USER_LOGIN"] ?>"
                                           placeholder="<?= GetMessage("AUTH_LOGIN") ?>">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="font-weight-bold" for="password">
                                        <?= GetMessage("AUTH_PASSWORD") ?>
                                    </label>
                                    <span>*</span>
                                    <input type="password" id="password" name="USER_PASSWORD"
                                           title="<?= $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"] ?>"
                                           class="form-control" autocomplete="off"
                                           value="<?= $arResult["USER_PASSWORD"] ?>">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="font-weight-bold" for="confirm">
                                        <?= GetMessage("AUTH_CONFIRM") ?>
                                    </label>
                                    <span>*</span>
                                    <input type="password" id="confirm" name="USER_CONFIRM_PASSWORD"
                                           class="form-control" autocomplete="off"
                                           value="<?= $arResult["USER_CONFIRM_PASSWORD"] ?>">
                                </div>
                            </div>

                            <? if ($arResult["EMAIL_REGISTRATION"]): ?>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="font-weight-bold" for="email">
                                            <?= GetMessage("AUTH_EMAIL") ?>
                                        </label>
                                        <? if ($arResult["EMAIL_REQUIRED"]): ?>
                                            <span>*</span>
                                        <? endif ?>
                                        <input type="text" id="email" name="USER_EMAIL"
                                               class="form-control"
                                               value="<?= $arResult["USER_EMAIL"] ?>"
                                               placeholder="<?= GetMessage("AUTH_EMAIL") ?>">
                                    </div>
                                </div>
                            <? endif ?>

                            <? if ($arResult["PHONE_REGISTRATION"]): ?>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="font-weight-bold" for="phone">
                                            <?= GetMessage("MAIN_REGISTER_PHONE_NUMBER") ?>
                                        </label>
                                        <? if ($arResult["PHONE_REQUIRED"]): ?>
                                            <span>*</span>
                                        <? endif ?>
                                        <input type="text" id="phone" name="USER_PHONE_NUMBER"
                                               class="form-control"
                                               value="<?= $arResult["USER_PHONE_NUMBER"] ?>"
                                               placeholder="<?= GetMessage("MAIN_REGISTER_PHONE_NUMBER") ?>">
                                    </div>
                                </div>
                            <? endif ?>

                            <? // ********************* User properties *************************************************** ?>
                            <? if ($arResult["USER_PROPERTIES"]["SHOW"] == "Y"): ?>

                                <? foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField): ?>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label class="font-weight-bold">
                                                <?= $arUserField["EDIT_FORM_LABEL"] ?>
                                            </label>
                                            <? if ($arUserField["MANDATORY"] == "Y"): ?>
                                                <span>*</span>
                                            <? endif; ?>
                                            <br>
                                            <? $APPLICATION->IncludeComponent(
                                                "bitrix:system.field.edit",
                                                $arUserField["USER_TYPE"]["USER_TYPE_ID"],
                                                array(
                                                    "bVarsFromForm" => $arResult["bVarsFromForm"],
                                                    "arUserField" => $arUserField,
                                                    "form_name" => "bform"),
                                                null,
                                                array("HIDE_ICONS" => "Y")); ?>
                                        </div>
                                    </div>
                                <? endforeach; ?>
                            <? endif; ?>
                            <? // ******************** /User properties ***************************************************

                            /* CAPTCHA */
                            if ($arResult["USE_CAPTCHA"] == "Y") {
                            ?>
                                <label><?= GetMessage("CAPTCHA_REGF_TITLE") ?></label>

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
                                            <?= GetMessage("CAPTCHA_REGF_PROMT") ?>:
                                        </label>
                                        <input type="text" id="captcha" class="form-control"
                                               name="captcha_word" autocomplete="off">
                                    </div>
                                </div>
                            <?
                            }
                            /* CAPTCHA */
                            ?>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <? // запрос согласия пользователя
                                    $APPLICATION->IncludeComponent(
                                        "bitrix:main.userconsent.request",
                                        "",
                                        array(
                                            "ID" => COption::getOptionString("main", "new_user_agreement", ""),
                                            "IS_CHECKED" => "Y",
                                            "AUTO_SAVE" => "N",
                                            "IS_LOADED" => "Y",
                                            "ORIGINATOR_ID" => $arResult["AGREEMENT_ORIGINATOR_ID"],
                                            "ORIGIN_ID" => $arResult["AGREEMENT_ORIGIN_ID"],
                                            "INPUT_NAME" => $arResult["AGREEMENT_INPUT_NAME"],
                                            "REPLACE" => array(
                                                "button_caption" => GetMessage("AUTH_REGISTER"),
                                                "fields" => array(
                                                    GetMessage("AUTH_NAME"),
                                                    GetMessage("AUTH_LAST_NAME"),
                                                    GetMessage("AUTH_LOGIN"),
                                                    GetMessage("AUTH_PASSWORD"),
                                                    GetMessage("AUTH_EMAIL"),
                                                )
                                            ),
                                        )
                                    ); ?>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" name="Register"
                                           class="btn btn-primary py-2 px-4 rounded-0"
                                           value="<?= GetMessage("AUTH_REGISTER") ?>">
                                </div>
                            </div>

                            <p><span>*</span> <?= GetMessage("AUTH_REQ") ?></p>

                            <p>
                                <a href="<?= $arResult["AUTH_AUTH_URL"] ?>" rel="nofollow">
                                    <b><?= GetMessage("AUTH_AUTH") ?></b>
                                </a>
                            </p>
                        </form>

                        <script type="text/javascript">
                            document.bform.USER_NAME.focus();
                        </script>
                    <? endif ?>
                </noindex>
            </div>

        </div>
    </div>
</div>

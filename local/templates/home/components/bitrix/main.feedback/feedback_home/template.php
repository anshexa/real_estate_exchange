<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>

<div class="col-md-12 col-lg-8 mb-5">
    <? if (!empty($arResult["ERROR_MESSAGE"])) {
        foreach ($arResult["ERROR_MESSAGE"] as $v)
            ShowError($v);
    }
    if ($arResult["OK_MESSAGE"] <> '') { ?>
        <div class="mf-ok-text"><?= $arResult["OK_MESSAGE"] ?></div><?
    } ?>

    <form action="<?= POST_FORM_ACTION_URI ?>" class="p-5 bg-white border">
        <?= bitrix_sessid_post() ?>

        <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="fullname">
                    <?= GetMessage("NAME") ?>
                </label>
                <? if (empty($arParams["REQUIRED_FIELDS"]) ||
                    in_array("NAME", $arParams["REQUIRED_FIELDS"])): ?>
                    <span>*</span>
                <? endif ?>
                <input type="text" id="fullname" class="form-control"
                       placeholder="<?= GetMessage("NAME") ?>"
                       value="<?= $arResult["AUTHOR_NAME"] ?>">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label class="font-weight-bold" for="email">
                    <?= GetMessage("EMAIL") ?>
                </label>
                <? if (empty($arParams["REQUIRED_FIELDS"]) ||
                    in_array("EMAIL", $arParams["REQUIRED_FIELDS"])): ?>
                    <span>*</span>
                <? endif ?>
                <input type="email" id="email" class="form-control"
                       placeholder="<?= GetMessage("EMAIL") ?>"
                       value="<?= $arResult["AUTHOR_EMAIL"] ?>">
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
                <label class="font-weight-bold" for="message">
                    <?= GetMessage("MESSAGE") ?>
                </label>
                <? if (empty($arParams["REQUIRED_FIELDS"]) ||
                    in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])): ?>
                    <span>*</span>
                <? endif ?>
                <textarea name="message" id="message" cols="30" rows="5" class="form-control"
                          placeholder="<?= GetMessage("SAY_HELLO") ?>">
                    <?= $arResult["MESSAGE"] ?>
                </textarea>
            </div>
        </div>

        <? if ($arParams["USE_CAPTCHA"] == "Y"): ?>
            <div class="mf-captcha">
                <div class="mf-text"><?= GetMessage("CAPTCHA") ?></div>
                <input type="hidden" name="captcha_sid" value="<?= $arResult["capCode"] ?>">
                <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["capCode"] ?>"
                     width="180" height="40" alt="CAPTCHA">
                <div class="mf-text">
                    <?= GetMessage("CAPTCHA_CODE") ?><span>*</span>
                </div>
                <input type="text" name="captcha_word" size="30" maxlength="50" value="">
            </div>
        <? endif; ?>
        <input type="hidden" name="PARAMS_HASH" value="<?= $arResult["PARAMS_HASH"] ?>">

        <div class="row form-group">
            <div class="col-md-12">
                <input type="submit" class="btn btn-primary  py-2 px-4 rounded-0"
                       value="<?= GetMessage("SUBMIT") ?>">
            </div>
        </div>

    </form>
</div>

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="review-block">
    <div class="review-text">
        <div class="review-text-cont">
            <?= $arResult['DETAIL_TEXT'] ?>
        </div>
        <div class="review-autor">
            <?= $arResult['NAME'] ?>,
            <?= "{$arResult['DISPLAY_ACTIVE_FROM']} г." ?>,
            <?= $arResult['DISPLAY_PROPERTIES']['POSITION']['VALUE'] ?>,
            <?= $arResult['DISPLAY_PROPERTIES']['COMPANY']['VALUE'] ?>.
        </div>
    </div>
    <div style="clear: both;" class="review-img-wrap">
        <? $imgSrc = SITE_DIR . 'upload/no_photo.jpg';
        if ($arResult['DETAIL_PICTURE']['SRC']) {
            $imgSrc = $arResult['DETAIL_PICTURE']['SRC'];
        } ?>
        <img src="<?= $imgSrc ?>" alt="<?= $arResult['NAME'] ?>">
    </div>
</div>

<? if ($arResult['DISPLAY_PROPERTIES']['DOCUMENTS']['VALUE']):
    if (count($arResult['DISPLAY_PROPERTIES']['DOCUMENTS']['VALUE']) == 1) {
        $filesProperties[0] = $arResult['DISPLAY_PROPERTIES']['DOCUMENTS']['FILE_VALUE'];
    }
    else {
        $filesProperties = $arResult['DISPLAY_PROPERTIES']['DOCUMENTS']['FILE_VALUE'];
    } ?>
    <div class="exam-review-doc">
        <p><?= GetMessage('S2_DOCUMENTS') ?></p>
        <? foreach ($filesProperties as $document): ?>
            <div  class="exam-review-item-doc">
                <img class="rew-doc-ico" src="<?= SITE_TEMPLATE_PATH ?>/img/icons/pdf_ico_40.png">
                <a href="<?= $document['SRC']?>" download="<?= $document['ORIGINAL_NAME'] ?>">
                    <?= $document['ORIGINAL_NAME'] ?>
                </a>
            </div>
        <? endforeach; ?>
    </div>

<? endif; ?>
<hr>

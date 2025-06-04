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


<section class="article-section" data-controller="article-content">
    <header class="article__header">

        <?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
            <h1 class="article__title"><?=$arResult["NAME"]?></h1>
        <?endif;?>
        <div class="article__header-info">
            <div class="article__publication-info content-block">
                <?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
                    <time class="article__publication-date" datetime="<?=$arResult["DISPLAY_ACTIVE_FROM"]?>">
                        <?=$arResult["DISPLAY_ACTIVE_FROM"]?>
                    </time>
                <?endif;?>

                    <? foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
                        <?if ($arProperty["CODE"]=="PLACE" && $arProperty["DISPLAY_VALUE"] != ""):?>
                            <div class="article__publication-place">
                                <?=$arProperty["DISPLAY_VALUE"];?>
                            </div>
                        <?endif;?>
                    <?endforeach;?>
            </div>
        </div>
    </header>

    <div class="article__content-wrapper">
        <div class="article__content content-block">
            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
                <img
                    class="article__image"
                    border="0"
                    src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                    width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
                    height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
                    alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                    title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
                />
            <?endif;?>
            <?if($arResult["DETAIL_TEXT"] != ""):?>
                <p><?echo $arResult["DETAIL_TEXT"];?></p>
            <?else:?>
                <p><?echo $arResult["PREVIEW_TEXT"];?></p>
            <?endif?>
        </div>
    </div>
</section>

<section class="article-section">
    <div class="article__content-wrapper article__controllers-wrapper">
        <div class="article__publication-info">
            <div class="article__publication-views">
                <svg class="icon" role="img">
                    <use xlink:href="/icons.svg#eye"/>
                </svg>
                56
            </div>
        </div>
        <div class="article__buttons-wrapper">
            <div class="article__button-wrapper">
                <button class="article__controller-button" data-controller="wave">
                    <svg class="icon" role="img">
                        <use xlink:href="/icons.svg#share"/>
                    </svg>
                    <span class="article__controller-button-text"
                    >Поделиться материалом</span
                    >
                    <span class="article__controller-button-text--mobile"
                    >Поделиться</span
                    >
                </button>
            </div>
            <div class="article__button-wrapper">
                <button
                        class="article__controller-button"
                        type="button"
                        data-controller="wave"
                        data-modal-window-target="opener"
                        data-modal-id="comment-form-modal"
                        data-action="modal-window#onToggle"
                >
                    <svg class="icon" role="img">
                        <use xlink:href="/icons.svg#comment"/>
                    </svg>
                    <span class="article__controller-button-text"
                    >Оставить комментарий</span
                    >
                    <span class="article__controller-button-text--mobile"
                    >Комментарий</span
                    >
                </button>
            </div>
        </div>
    </div>

            <? foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
                <?if ($arProperty["CODE"]=="THEMES"):?>
                    <?if(is_array($arProperty["DISPLAY_VALUE"])):?>
                        <div class="article__content-wrapper article__topics-wrapper">
                            <h3 class="article__topics-title">Темы</h3>
                            <ul class="article__topics">
                        <? foreach($arProperty["DISPLAY_VALUE"] as $pid1=>$arProperty1):?>
                            <li class="article__topic-item">
                                <a
                                        href="/"
                                        data-controller="wave"
                                        class="article__topic-link button button--secondary button--tiny"
                                ><?=$arProperty1;?></a
                                >
                            </li>
                        <?endforeach;?>

                    <?elseif ($arProperty["DISPLAY_VALUE"] != null):?>
                        <div class="article__content-wrapper article__topics-wrapper">
                            <h3 class="article__topics-title">Темы</h3>
                            <ul class="article__topics">
                        <li class="article__topic-item">
                            <a
                                    href="/"
                                    data-controller="wave"
                                    class="article__topic-link button button--secondary button--tiny"
                            ><?=$arProperty["DISPLAY_VALUE"];?></a
                            >
                        </li>
                    <?endif?>
                <?endif;?>
            <?endforeach;?>

        </ul>
    </div>

	<?if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>

</section>
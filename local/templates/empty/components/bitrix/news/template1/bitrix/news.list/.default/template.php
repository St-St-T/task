<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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


<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <? if ($arItem["DISPLAY_PROPERTIES"]["MAIN"]["VALUE"] == "Y"): ?>
            <article class="news" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

			<? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
				<? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
					<div class="news__illustration"><a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><img
								class="news__illustration-image"
								border="0"
								src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
								width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
								height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>"
								alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
								title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>" /></a></div>
				<? else: ?>
					<div class="news__illustration"><img
							class="news__illustration-image"
							border="0"
							src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
							width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
							height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>"
							alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
							title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>" /></div>
				<? endif; ?>
			<? endif ?>

			<? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
				<? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
					<a class="news__link" href="<? echo $arItem["DETAIL_PAGE_URL"] ?>">
						<h2 class="news__title"><? echo $arItem["NAME"] ?></h2>
					</a>
				<? else: ?>
					<h2 class="news__title"><? echo $arItem["NAME"] ?></h2>
				<? endif; ?>
			<? endif; ?>

			<? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
				<div class="news__publication-info">
					<a class="news__topic-link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><? echo $arItem["PREVIEW_TEXT"]; ?></a>
				</div>
			<? endif; ?>

			<? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]): ?>
				<div class="news__publication-detail">
					<svg class="icon" role="img">
						<use xlink:href="/icons.svg#clock" />
					</svg>
					<a class="news__topic-link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><? echo $arItem["DISPLAY_ACTIVE_FROM"] ?></a>
				</div>
			<? endif ?>

			<? if ($arItem["DISPLAY_PROPERTIES"]["PLACE"]["DISPLAY_VALUE"] != "" && $arMain["DISPLAY_ACTIVE_FROM"]): ?>
				<div class="news__publication-detail">
					<svg class="icon" role="img">
						<use xlink:href="/icons.svg#pin" />
					</svg>
					<?= $$arItem["DISPLAY_PROPERTIES"]["PLACE"]["DISPLAY_VALUE"]; ?>
				</div>
			<? endif ?>

			<? foreach ($arItem["DISPLAY_PROPERTIES"] as $pid => $arProperty): ?>
				<? if ($arProperty["CODE"] == "PLACE"): ?>
					<div class="news__publication-detail">
						<svg class="icon" role="img">
							<use xlink:href="/icons.svg#pin" />
						</svg>
						<?= $arProperty["DISPLAY_VALUE"]; ?>
					</div>
				<? endif ?>
			<? endforeach; ?>


			<? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
				<div style="clear:both"></div>
			<? endif ?>
			<? foreach ($arItem["FIELDS"] as $code => $value): ?>
				<small>
					<?= GetMessage("IBLOCK_FIELD_" . $code) ?>:&nbsp;<?= $value; ?>
				</small><br />
			<? endforeach; ?>

		</article>
        <? endif ?>
<? endforeach; ?>


<div class="news-list event-list" data-view-more-target="container">


	<? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
		<?= $arResult["NAV_STRING"] ?><br />
	<? endif; ?>


	<? foreach ($arResult["ITEMS"] as $arItem): ?>

        <? if ($arItem["DISPLAY_PROPERTIES"]["MAIN"]["VALUE"] == "Y"): ?>
            <? continue;?>
        <? endif ?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<article class="news" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

			<? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
				<? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
					<div class="news__illustration"><a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><img
								class="news__illustration-image"
								border="0"
								src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
								width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
								height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>"
								alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
								title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>" /></a></div>
				<? else: ?>
					<div class="news__illustration"><img
							class="news__illustration-image"
							border="0"
							src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
							width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
							height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>"
							alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
							title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>" /></div>
				<? endif; ?>
			<? endif ?>

			<? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
				<? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
					<a class="news__link" href="<? echo $arItem["DETAIL_PAGE_URL"] ?>">
						<h2 class="news__title"><? echo $arItem["NAME"] ?></h2>
					</a>
				<? else: ?>
					<h2 class="news__title"><? echo $arItem["NAME"] ?></h2>
				<? endif; ?>
			<? endif; ?>

			<? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
				<div class="news__publication-info">
					<a class="news__topic-link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><? echo $arItem["PREVIEW_TEXT"]; ?></a>
				</div>
			<? endif; ?>

			<? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]): ?>
				<div class="news__publication-detail">
					<svg class="icon" role="img">
						<use xlink:href="/icons.svg#clock" />
					</svg>
					<a class="news__topic-link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><? echo $arItem["DISPLAY_ACTIVE_FROM"] ?></a>
				</div>
			<? endif ?>

			<? if ($arItem["DISPLAY_PROPERTIES"]["PLACE"]["DISPLAY_VALUE"] != "" && $arMain["DISPLAY_ACTIVE_FROM"]): ?>
				<div class="news__publication-detail">
					<svg class="icon" role="img">
						<use xlink:href="/icons.svg#pin" />
					</svg>
					<?= $$arItem["DISPLAY_PROPERTIES"]["PLACE"]["DISPLAY_VALUE"]; ?>
				</div>
			<? endif ?>

			<? foreach ($arItem["DISPLAY_PROPERTIES"] as $pid => $arProperty): ?>
				<? if ($arProperty["CODE"] == "PLACE"): ?>
					<div class="news__publication-detail">
						<svg class="icon" role="img">
							<use xlink:href="/icons.svg#pin" />
						</svg>
						<?= $arProperty["DISPLAY_VALUE"]; ?>
					</div>
				<? endif ?>
			<? endforeach; ?>


			<? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
				<div style="clear:both"></div>
			<? endif ?>
			<? foreach ($arItem["FIELDS"] as $code => $value): ?>
				<small>
					<?= GetMessage("IBLOCK_FIELD_" . $code) ?>:&nbsp;<?= $value; ?>
				</small><br />
			<? endforeach; ?>

		</article>

	<? endforeach; ?>


	<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
		<br /><?= $arResult["NAV_STRING"] ?>
	<? endif; ?>
</div>
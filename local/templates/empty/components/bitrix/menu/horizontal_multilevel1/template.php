<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
    <div data-controller="sticky-bar site-menu mobile-menu site-menu-modal" class="site-menu site-menu--sticky">
    <div data-site-menu-target="overlay" class="site-menu__overlay"></div>
    <div class="site-menu__wrapper">
    <a class="site-menu__logotype" href="/">
        <svg class="site-menu__logotype-symbol-mobile" role="img">
            <use xlink:href="icons.svg#logotype-symbol-mobile" />
        </svg>
        <svg class="site-menu__logotype-symbol-desktop" role="img">
            <use xlink:href="icons.svg#logotype-symbol-desktop" />
        </svg>
        <span class="site-menu__logotype-text"> Правительство ЯНАО </span>
    </a>
    <nav class="site-menu__links-wrapper">
	<ul class="site-menu__links" data-site-menu-target="menu">

		<?
		$previousLevel = 0;
		foreach ($arResult as $arItem): ?>

			<? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel): ?>
				<?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
			<? endif ?>

			<? if ($arItem["IS_PARENT"]): ?>

				<? if ($arItem["DEPTH_LEVEL"] == 1): ?>
					<li class="site-menu__link-item"><a href="<?= $arItem["LINK"] ?>" data-site-menu-target="link" class="site-menu__link"><?= $arItem["TEXT"] ?></a>
                        <div id="submenu-0" class="site-submenu" data-site-menu-target="submenu" data-turbo-permanent>
                            <div class="site-submenu__wrapper">
                                <div class="site-submenu__column">
                                    <ul class="links-list links-list--menu">
						<? else: ?>
							<li class="site-menu__link-item"><a href="<?= $arItem["LINK"] ?>" data-site-menu-target="link" class="site-menu__link"><?= $arItem["TEXT"] ?></a>
                                <div id="submenu-0" class="site-submenu" data-site-menu-target="submenu" data-turbo-permanent>
                                    <div class="site-submenu__wrapper">
                                        <div class="site-submenu__column">
                                            <ul class="links-list links-list--menu">
								<? endif ?>

							<? else: ?>

								<? if ($arItem["PERMISSION"] > "D"): ?>

									<? if ($arItem["DEPTH_LEVEL"] == 1): ?>
										<li class="links-list__item"><a href="<?= $arItem["LINK"] ?>" class="links-list__link"><?= $arItem["TEXT"] ?></a></li>
									<? else: ?>
										<li class="links-list__item"><a href="<?= $arItem["LINK"] ?>" class="links-list__link"><?= $arItem["TEXT"] ?></a>
					</li>
				<? endif ?>

			<? else: ?>

				<? if ($arItem["DEPTH_LEVEL"] == 1): ?>
					<li class="links-list__item"><a href="" class="links-list__link" title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>"><?= $arItem["TEXT"] ?></a></li>
				<? else: ?>
					<li class="links-list__item"><a href="" class="links-list__link denied" title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>"><?= $arItem["TEXT"] ?></a></li>
				<? endif ?>

			<? endif ?>

		<? endif ?>

		<? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

	<? endforeach ?>

	<? if ($previousLevel > 1): //close last item tags
	?>
		<?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
	<? endif ?>

	</ul>
	<div class="menu-clear-left"></div>
<? endif ?>
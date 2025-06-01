<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

use Bitrix\Main\Page\Asset;

$asset = Asset::getInstance();

$asset->addCss(SITE_TEMPLATE_PATH . "/app.css");
$asset->addCss(SITE_TEMPLATE_PATH . "/admin.css");
$asset->addJs(SITE_TEMPLATE_PATH . "/scripts/app.js");
$asset->addJs(SITE_TEMPLATE_PATH . "/scripts/admin.js");
$asset->addJs(SITE_TEMPLATE_PATH . "/scripts/vendor.js");
$asset->addJs(SITE_TEMPLATE_PATH . "/scripts/662.js");
?>

<!DOCTYPE html>
<html>

<head>
	<? $APPLICATION->ShowHead(); ?>
	<title><? $APPLICATION->ShowTitle(); ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
</head>

<body data-controller="modal-window page-modal scrollbar visually-impaired-version report-error popup-link button-to-top" data-action="keyup@document->modal-window#onKeypress">
	<div id="panel">
		<? $APPLICATION->ShowPanel(); ?>
	</div>

	<div class="page">
		<div data-controller="gos-header-modal" class="gos-header"></div>
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
						<li class="site-menu__link-item">
							<a data-site-menu-target="link" class="site-menu__link" href="/">
								Пресс-центр
							</a>
							<div id="submenu-0" class="site-submenu" data-site-menu-target="submenu" data-turbo-permanent>
								<div class="site-submenu__wrapper">
									<div class="site-submenu__column">
										<ul class="links-list links-list--menu">
											<li class="links-list__item">
												<a class="links-list__link" href="/news">Новости</a>
											</li>
											<li class="links-list__item">
												<a class="links-list__link" href="/events">Мероприятия</a>
											</li>
											<li class="links-list__item">
												<a class="links-list__link" href="/media">Фото и&nbsp;видео</a>
											</li>
											<li class="links-list__item">
												<a class="links-list__link" href="/report">Доклады</a>
											</li>
											<li class="links-list__item">
												<a class="links-list__link" href="/press-service">Пресс-служба</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>
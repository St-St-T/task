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

<?$APPLICATION->IncludeComponent("bitrix:menu", "horizontal_multilevel1", Array(
    "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
    "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
    "DELAY" => "N",	// Откладывать выполнение шаблона меню
    "MAX_LEVEL" => "2",	// Уровень вложенности меню
    "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
    "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
    "MENU_CACHE_TYPE" => "N",	// Тип кеширования
    "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
    "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
    "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
    "COMPONENT_TEMPLATE" => "horizontal_multilevel"
),
    false
);?>
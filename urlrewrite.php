<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/press-center/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/press-center/news/index.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/press-center/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/press-center/news.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/news/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/news/news/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
);

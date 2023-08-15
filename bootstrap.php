<?php

define('__DIR_ROOT', __DIR__);

if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') {
    $web_root = 'https://'.$_SERVER['HTTP_HOST'];
}else{
    $web_root = 'http://'.$_SERVER['HTTP_HOST'];
}

$dirRoot = str_replace('\\', '/', __DIR__);

$documentRoot = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);

$folder = str_replace(strtolower($documentRoot), '', strtolower($dirRoot));

$web_root = $web_root.$folder;

define('_WEB_ROOT', $web_root);

require_once 'configs/routes.php';

require_once 'app/App.php';

require_once 'core/Controller.php';
<?php

if (class_exists('Xoops', false)) {
    \Xoops::getInstance()->header();
} else {
    require_once XOOPS_ROOT_PATH . '/header.php';
    include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
}
include __DIR__ . '/common.php';

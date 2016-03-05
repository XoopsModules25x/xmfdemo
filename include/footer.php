<?php

if (class_exists('Xoops', false)) {
    \Xoops::getInstance()->footer();
} else {
    require_once XOOPS_ROOT_PATH . '/footer.php';
}

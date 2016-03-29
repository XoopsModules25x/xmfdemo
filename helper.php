<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright       The XOOPS Project http://xoops.org
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author          Richard Griffith <richard@geekwright.com>
 * @author          trabis <lusopoemas@gmail.com>
 */
// code marker
use Xmf\Debug;
use Xmf\Module\Helper;

// code end
require_once dirname(dirname(__DIR__)) . '/mainfile.php';

include __DIR__ . '/include/header.php';

describeThis(basename(__FILE__, '.php'));

// code marker
$dir    = basename(__DIR__);
$helper = Helper::getHelper($dir);
$helper->setDebug(true);

$helper->loadLanguage('manifesto');
$helper->loadLanguage('badmanifesto'); //throws error on log because language file was not found

$helper->addLog(_MA_XMFDEMO_MANIFESTO_HI);
echo _MA_XMFDEMO_MANIFESTO_LOOK_AT_LOG . '<br />';

echo '<h3>' . _MA_XMFDEMO_HELPER_MODULE . '</h3>';
Debug::dump($helper->getModule());
echo 'name: ' . $helper->getModule()->getVar('name') . '<br />';
echo 'mid: ' . $helper->getModule()->getVar('mid') . '<br />';
echo 'version: ' . $helper->getModule()->getVar('version') . '<br />';

echo '<h3>' . _MA_XMFDEMO_HELPER_CONFIG . '</h3>';
Debug::dump($helper->getConfig());

// does not use default since it exists
echo 'config1: ' . $helper->getConfig('config1', 'unused default') . '<br />';
echo 'config2: ' . $helper->getConfig('config2') . '<br />';

// throws an error on log cause config3 is missing
echo 'config3: ' . $helper->getConfig('config3') . '<br />';

// uses default this time
echo 'config3: ' . $helper->getConfig('config3', 'my default') . '<br />';

echo '<h3>' . _MA_XMFDEMO_HELPER_OTHER_MODULE . '</h3>';
if ($otherHelper = Helper::getHelper('pm')) {
    Debug::dump($otherHelper);
    Debug::dump($otherHelper->getHandler('message'));
} else {
    $otherHelper = Helper::getHelper('system');
    Debug::dump($otherHelper);
}

$helper->addLog(_MA_XMFDEMO_MANIFESTO_GOODBYE);
// code end

codeDump(__FILE__);

include __DIR__ . '/include/footer.php';

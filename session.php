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
use Xmf\Module\Helper\Session;

// code end
require_once dirname(dirname(__DIR__)) . '/mainfile.php';

include __DIR__ . '/include/header.php';

describeThis(basename(__FILE__, '.php'));

// code marker
echo '<h3>' . _MA_XMFDEMO_SESSION_VAR_TOGGLE . '</h3>';
// toggle a session variable
$varName = 'widget';
$sessionHelper = new Session();

$var = $sessionHelper->get($varName);
if ($var) {
    echo sprintf(_MA_XMFDEMO_SESSION_VAR_GET, $var) . '<br />';
    $sessionHelper->del($varName);
} else {
    $var = date('Y-m-d H:i:s');
    echo sprintf(_MA_XMFDEMO_SESSION_VAR_SET, $var) . '<br />';
    $sessionHelper->set($varName, $var);
}

Debug::dump($sessionHelper->get($varName, '(not set)'));

Debug::dump($_SESSION, $sessionHelper);


// code end

codeDump(__FILE__);

include __DIR__ . '/include/footer.php';

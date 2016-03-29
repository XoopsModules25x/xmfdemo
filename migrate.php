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
use Xmf\Database\Tables;
use Xmf\Debug;
use Xmf\Module\Helper;
use Xmf\Request;

// code end
require_once dirname(dirname(__DIR__)) . '/mainfile.php';

include __DIR__ . '/include/header.php';

describeThis(basename(__FILE__, '.php'));

// code marker
$dir          = basename(__DIR__);
$helper       = Helper::getHelper($dir);
$modulePrefix = $helper->getModule()->getVar('dirname');

$migrate = new Tables();

$uglyTableName   = "ugly_{$modulePrefix}_table";
$uglyTableExists = $migrate->useTable($uglyTableName);

$mainTableName   = "{$modulePrefix}_widgets";
$mainTableExists = $migrate->useTable($mainTableName);

$isPost = ('POST' === Request::getMethod());
$step   = 0;
if (!$uglyTableExists && !$mainTableExists) {
    $step = $isPost ? 2 : 1;
} elseif ($uglyTableExists) {
    $step = $isPost ? 4 : 3;
} elseif ($mainTableExists) {
    $step = $isPost ? 6 : 5;
}
$formMessage = $formCaption = '';
switch ($step) {
    case 1: // no tables exist
        $formCaption = _MA_XMFDEMO_TABLE_FORM_TITLE_1;
        $formMessage = _MA_XMFDEMO_TABLE_FORM_MESSAGE_1;
        break;
    case 2: // create initial table
        $migrate->addTable($uglyTableName);
        $migrate->addColumn($uglyTableName, 'id', 'int(10) NOT NULL AUTO_INCREMENT');
        $migrate->addColumn($uglyTableName, 'content', 'text NOT NULL');
        $migrate->addColumn($uglyTableName, 'uid', 'int(10) NOT NULL DEFAULT \'0\'');
        $migrate->addPrimaryKey($uglyTableName, 'id');
        $migrate->addIndex('uidid', $uglyTableName, 'uid, id');
        $migrate->executeQueue();
    // fall through
    case 3: // have initial table
        $formCaption = _MA_XMFDEMO_TABLE_FORM_TITLE_3;
        $formMessage = _MA_XMFDEMO_TABLE_FORM_MESSAGE_3;
        break;
    case 4: // rename initial table
        $migrate->useTable($uglyTableName);
        $migrate->renameTable($uglyTableName, $mainTableName);
        $migrate->addColumn($mainTableName, 'update_time', 'int(10) NOT NULL DEFAULT \'0\'');
        $migrate->dropIndexes($mainTableName);
        $migrate->addIndex('uidupdate_time', $mainTableName, 'uid, update_time');
        $migrate->executeQueue();
    // fall through
    case 5: // have renamed table
        $migrate->resetQueue(); // getting the changes for display
        $migrate->useTable($mainTableName);
        $formCaption = _MA_XMFDEMO_TABLE_FORM_TITLE_5;
        $formMessage = _MA_XMFDEMO_TABLE_FORM_MESSAGE_5;
        break;
    case 6: // drop table and restart demo
        $migrate->useTable($mainTableName);
        $migrate->dropTable($mainTableName);
        $migrate->executeQueue();

        $formCaption = _MA_XMFDEMO_TABLE_FORM_TITLE_1;
        $formMessage = _MA_XMFDEMO_TABLE_FORM_MESSAGE_1;
        break;
}

$form = new \XoopsThemeForm($formCaption, 'form', '', 'POST');
$form->addElement(new \XoopsFormLabel('', $formMessage));
$form->addElement(new \XoopsFormButton('', 'submit', _MA_XMFDEMO_FORM_SUBMIT, 'submit'));
echo $form->render();

$tables = $migrate->dumpTables();
if (0 !== count($tables)) {
    echo '<h5>' . _MA_XMFDEMO_TABLE_CURRENT . '</h5>';
    Debug::dump($tables);
}
// code end

codeDump(__FILE__);

include __DIR__ . '/include/footer.php';

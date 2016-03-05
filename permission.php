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
use Xmf\Request;
use Xmf\Module\Helper;
use Xmf\Module\Helper\Permission;
// code end
require_once dirname(dirname(__DIR__)) . '/mainfile.php';

include __DIR__ . '/include/header.php';

describeThis(basename(__FILE__, '.php'));

// code marker
$dir = basename(__DIR__);
$permHelper = new Permission($dir);

if ($permHelper) {
    // this is the name and item we are going to work with
    $gperm_name='xmfdemo-perm';
    $gperm_itemid=1;

    // if this is a post operation get and save our variables
    if ('POST' == Request::getMethod()) {
        echo '<h4>$_POST Input</h4>';
        Debug::dump($_POST);
        $name = $permHelper->defaultFieldName($gperm_name, $gperm_itemid);
        $groups = Request::getVar($name, array(), $hash = 'POST');
        $permHelper->savePermissionForItem($gperm_name, $gperm_itemid, $groups);
    }

    $form = new \XoopsThemeForm(_MA_XMFDEMO_PERMFORM_CAPTION, 'form', '', 'POST');
    $grpElement = $permHelper->getGroupSelectFormForItem(
        $gperm_name,
        $gperm_itemid,
        _MA_XMFDEMO_PERM_CAPTION,
        null,
        true
    );
    $form->addElement($grpElement);
    $form->addElement(new \XoopsFormButton('', 'submit', _MA_XMFDEMO_FORM_SUBMIT, 'submit'));

    echo $form->render();

    $count = count($permHelper->getGroupsForItem($gperm_name, $gperm_itemid));
    echo sprintf(_MA_XMFDEMO_PERM_GROUP_COUNT, $count);

}
// code end

codeDump(__FILE__);

include __DIR__ . '/include/footer.php';

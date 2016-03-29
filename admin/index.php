<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

// code marker
use Xmf\Module\Admin;

// code end

/**
 * @copyright       The XOOPS Project http://xoops.org
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author          Richard Griffith <richard@geekwright.com>
 */

require __DIR__ . '/admin_header.php';

// code marker
$moduleAdmin = Admin::getInstance();
$moduleAdmin->displayNavigation('index.php');
$moduleAdmin->addConfigModuleVersion('system', 212);
$moduleAdmin->addConfigWarning('These are just examples!');
$moduleAdmin->addConfigBoxLine('notarealmodule', 'module');
$moduleAdmin->addConfigBoxLine(array('notarealmodule', 'warning'), 'module');
$moduleAdmin->displayIndex();
// code end

codeDump(__FILE__);
require __DIR__ . '/admin_footer.php';

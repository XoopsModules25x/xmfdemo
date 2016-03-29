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

use Xmf\Debug;

require_once dirname(dirname(__DIR__)) . '/mainfile.php';
include __DIR__ . '/include/header.php';
describeThis(basename(__FILE__, '.php'));

Debug::dump('Just replace this with your code to play!');

codeDump(__FILE__);
include __DIR__ . '/include/footer.php';

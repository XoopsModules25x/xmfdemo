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

/**
 * Dumps selected code from a PHP file with syntax highlighting.
 *
 * Sections to be dumped should be surrounded with comment lines:
 * // code marker
 * // code end
 *
 * @param string $fileName file name to dump
 *
 * @return void
 */
function codeDump($fileName)
{
    $code = file_get_contents($fileName);
    $matches = array();
    if (0 < (int) preg_match_all("#.*// code marker[\\s]*(.*)// code end.*#sU", $code, $matches)) {
        echo '<h2>' . _MA_XMFDEMO_SAMPLE_CODE . '</h2><hr>';
        $code = highlight_string("<?php\n" . implode("\n", $matches[1]), true);
        echo $code;
    }
    echo '<hr><br>';
    if (1 !== preg_match('#/admin/[a-z]*\.php$#', $fileName)) {
        echo '<a href="index.php">' . _MA_XMFDEMO_EXAMPLE_LIST . '</a>';
    }
}

/**
 * Show the title and description for a page
 *
 * @param string $name the name of the file to describe
 *
 * @return void
 */
function describeThis($name)
{
    $title = 'XMF XOOPS Module Framework Demo';
    $body = 'This is a coding example using XMF, the XOOPS module framework ';

    $name = strtoupper($name);

    $defTitle = '_MA_XMFDEMO_PAGE_TITLE_' . $name;
    if (defined($defTitle)) {
        $title = constant($defTitle);
        echo "<h1>{$title}</h1>";
    }

    $defBody = '_MA_XMFDEMO_PAGE_BODY_' . $name;
    if (defined($defBody)) {
        $body = constant($defBody);
        echo $body . '<br><br>';
    }

    echo "\n<hr>\n";
    \Xmf\Metagen::generateMetaTags($title, $body, 10, 4, 20);
}

/**
 * Get a list of files in a directory
 *
 * @param string $dir directory name containing the files to be listed.
 *
 * @return string[] array of file names
 */
function getFileList($dir)
{
    XoopsLoad::load('xoopslists');
    $files = XoopsLists::getFileListAsArray($dir);
    return $files;
}

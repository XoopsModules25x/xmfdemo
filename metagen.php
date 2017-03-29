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
use Xmf\Highlighter;
use Xmf\Metagen;
use Xmf\Module\Helper;

// code end
require_once dirname(dirname(__DIR__)) . '/mainfile.php';

include __DIR__ . '/include/header.php';

describeThis(basename(__FILE__, '.php'));

// code marker
// define some dummy content
$title   = 'XMF - the XOOPS Module Framework';
$article = <<<EOT
XMF is Copyright © 2011-2016 The XOOPS Project

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

Some portions of this work are licensed under the GNU Lesser General
Public License Version 2.1 as published by the Free Software Foundation.
Such portions are clearly identified in the source files.

This program is distributed in the hope that it will be useful, but
WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
General Public License for more details.

You should have received a copy of the GNU General Public License, and
the GNU Lesser General Public License along with this program.
If not, see <http://www.gnu.org/licenses/>.

You may contact the copyright holder through XOOPS Project: <http://xoops.org>
EOT;

echo '<h4>Title</h4>';
Debug::dump($title);

echo '<h4>Article</h4>';
Debug::dump($article);

echo '<h4>Extract Title Keywords</h4>';
// get important words from title
$title_keywords = Metagen::generateKeywords($title, 10, 3);
Debug::dump($title_keywords);

echo '<h4>Extract Keywords</h4>';
// get top 25 keywords, but always keep keywords from title
$keywords = Metagen::generateKeywords($article, 10, 4, $title_keywords);
Debug::dump($keywords);

echo '<h4>Generate a Teaser</h4>';
$metadesc = Metagen::generateDescription($article, 50);
Debug::dump($metadesc);

echo '<h4>Create SEO Slug from Title</h4>';
Debug::dump(Metagen::generateSeoTitle($title));

echo '<h4>Show Article with Keywords Highlighted</h4>';
echo Highlighter::apply($keywords, $article);

echo '<br><br><h4>Show a Search Summary</h4>';
$searchTerms = array('source', 'files');
$summary     = \Xmf\Metagen::getSearchSummary($article, $searchTerms, 80);
echo Highlighter::apply($searchTerms, $summary, '<span style="background-color: yellow;">', '</span>');

// code end

codeDump(__FILE__);

include __DIR__ . '/include/footer.php';

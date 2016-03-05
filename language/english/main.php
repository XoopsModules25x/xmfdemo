<?php
define('_MA_XMFDEMO_SAMPLE_CODE', 'Code');
define('_MA_XMFDEMO_EXAMPLE_LIST', 'Back to the XMF Example List');
define('_MA_XMFDEMO_EXAMPLES', 'XMF Examples');

define('_MA_XMFDEMO_HELPER_MODULE', 'Easy Access to Module object');
define('_MA_XMFDEMO_HELPER_CONFIG', 'Simplify Reading Module Configs');
define('_MA_XMFDEMO_HELPER_OTHER_MODULE', 'Access to Another Module');

define('_MA_XMFDEMO_PAGE_TITLE_HELPER', 'Introducing Module Helpers');
define('_MA_XMFDEMO_PAGE_BODY_HELPER', <<<'EOD'
<p>The module helper is an easy way to access module related information, such as configurations, handlers and more.
Using the module helper can simplify your code.
EOD
);

define('_MA_XMFDEMO_PAGE_TITLE_INDEX', 'XMF XOOPS Module Framework Demo');
define('_MA_XMFDEMO_PAGE_BODY_INDEX', <<<'EOD'
<p>This is a collection of short code examples that demonstrate some features of XMF, the XOOPS Module Framework.
These include several examples from the <a href="https://www.gitbook.com/book/xoops/xmf-cookbook">The XMF Cookbook</a>
in ready to run form.
EOD
);

define('_MA_XMFDEMO_PAGE_TITLE_JWTAJAX', 'Protect Ajax calls with JWT');
define('_MA_XMFDEMO_PAGE_BODY_JWTAJAX', <<<'EOD'
<p>If invoked by the browser, this script generates a JSON Web Token (JWT) and returns a simple page with one button.
<p>Clicking that button invokes this script through Ajax. It includes the JWT in the headers.
<p>When invoked through Ajax, the script verifies the token from the header. Tokens are only valid for 30
seconds after being issued. This is too short for a real application, but it quickly demonstrates expiration.
If the JWT is expired, it results in an error alert.
<p>Open your javascript console or developer tools to watch the full cycle of interactions.
EOD
);

define('_MA_XMFDEMO_PAGE_TITLE_METAGEN', 'Manage Metadata with XMF Metagen');
define('_MA_XMFDEMO_PAGE_BODY_METAGEN', <<<'EOD'
<p>This example shows how the Metagen class can simplify extracting metadata and
summaries from your content.
<p>The results of calls and contents of variables is shown using <tt>Xmf\Debug::dump();</tt>.
Click on any item to explore the details.
EOD
);

define('_MA_XMFDEMO_TABLE_FORM_TITLE_1', 'Create an Example Table');
define('_MA_XMFDEMO_TABLE_FORM_MESSAGE_1', 'Right now, we do not have a table to work with. Click the button to get started.');
define('_MA_XMFDEMO_TABLE_FORM_TITLE_3', 'Alter the Example Table');
define('_MA_XMFDEMO_TABLE_FORM_MESSAGE_3', 'Now, we will rename the table, add a new column and populate it.');
define('_MA_XMFDEMO_TABLE_FORM_TITLE_5', 'Mission Complete');
define('_MA_XMFDEMO_TABLE_FORM_MESSAGE_5', 'The example table has been altered. Now, we will drop it, and restart the demo.');


define('_MA_XMFDEMO_TABLE_CURRENT', 'Current Table State');

define('_MA_XMFDEMO_PAGE_TITLE_MIGRATE', 'Database Table Migrations');
define('_MA_XMFDEMO_PAGE_BODY_MIGRATE', <<<'EOD'
<p>This example shows the basics of manipulating database tables using XMF.
<p>We will cycle through creating a table, then renaming and altering it, and finally, dropping everything
so we can start over.
<p>We will show the working state of our table at each stage, and if the logger is active, you can see
any SQL statements that were executed.
You may also want to explore the table with external tools, such as <em>phpMyAdmin</em>.
EOD
);

define('_MA_XMFDEMO_PERMFORM_CAPTION', 'Example permission');
define('_MA_XMFDEMO_PERM_CAPTION', 'Select authorized groups');
define('_MA_XMFDEMO_FORM_SUBMIT', 'Submit');
define('_MA_XMFDEMO_PERM_GROUP_COUNT', 'There are %0d groups(s) with permission for this item.');

define('_MA_XMFDEMO_PAGE_TITLE_PERMISSION', 'Assign Permissions to an Item');
define('_MA_XMFDEMO_PAGE_BODY_PERMISSION', <<<'EOD'
<p>This example shows how to present a single item permission in a form.
<p>When first invoked, a form is displayed showing the current permission.
<p>If the form is submitted, we show the POST variables, and save the specified permissions.
EOD
);

define('_MA_XMFDEMO_SESSION_VAR_TOGGLE', 'Toggling session variable.');
define('_MA_XMFDEMO_SESSION_VAR_GET', 'Clearing session variable value of "%s"');
define('_MA_XMFDEMO_SESSION_VAR_SET', 'Session variable not set. Setting as: %s');

define('_MA_XMFDEMO_PAGE_TITLE_SESSION', 'XMF Session Helper');
define('_MA_XMFDEMO_PAGE_BODY_SESSION', <<<'EOD'
<p>This example simply toggles a session value each time it is run.
<p>Reload the page to toggle the value.
EOD
);

define('_MA_XMFDEMO_PAGE_TITLE_TEST', 'Playground');
define('_MA_XMFDEMO_PAGE_BODY_TEST', <<<'EOD'
<p>This is here to give you an easy place to try out some XMF code. Just edit <tt>test.php</tt> to get started!
EOD
);

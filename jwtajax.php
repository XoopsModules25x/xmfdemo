<?php

// code marker
use Xmf\Jwt\TokenFactory;
use Xmf\Jwt\TokenReader;
use Xmf\Module\Helper;
use Xmf\Request;

require_once dirname(dirname(__DIR__)) . '/mainfile.php';

// claims we want to assert (verify)
$assertClaims = array('aud' => basename(__FILE__));

// handle ajax requests
if (0 === strcasecmp(Request::getHeader('X-Requested-With', ''), 'XMLHttpRequest')) {
    if (class_exists('Xoops')) {
        \Xoops::getInstance()->logger()->quiet();
    } else {
        $xoopsLogger->activated = false;
    }
    $token = TokenReader::fromHeader('test', $assertClaims);
    if (false === $token) {
        http_response_code(401);
        echo 'not authorized';
    } else {
        // The real work can happen here!
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode(array('saw' => $token->data));
    }
    exit;
}

// handle normal user requests
include __DIR__ . '/include/header.php';

$url = basename(__FILE__);

// add an information claim to our payload
$claims = array_merge($assertClaims, array('data' => 'mydata'));

$token = TokenFactory::build('test', $claims, 30);

$script = <<<EOT
<script>
function myFunction()
{
    \$.ajax({
        url: '{$url}',
        dataType: 'json',
        beforeSend: function (xhr, settings) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + '{$token}');
        },
        success: function (data) {
            // do something useful
            console.log(data.saw);
        },
        error: function() {
            // communicate issue to user
            alert('error');
        }
    });
}
</script>
EOT;

echo $script;
// code end

describeThis(basename(__FILE__, '.php'));

// code marker
echo '<button onClick="myFunction()">Click me</button>';

// code end

codeDump(__FILE__);

include __DIR__ . '/include/footer.php';

<?php
require_once realpath("vendor/autoload.php");

if (file_exists('env.php')) {
    require_once('env.php');
}

use Mwg\Controller\ControllerFooter;
use Mwg\Core\CookieKeys;
use Mwg\Core\CookieTerms;
use Mwg\Core\UrlManager;

require_once ("/core/general.php");

new CookieKeys();
new CookieTerms();
new UrlManager();
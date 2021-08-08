<?php
require_once realpath("vendor/autoload.php");

use Mwg\Controller\ControllerFooter;
use Mwg\Core\CookieKeys;
use Mwg\Core\CookieTerms;
use Mwg\Core\UrlManager;


require_once 'src/core/general.php';

new CookieKeys();
new CookieTerms();
new UrlManager();
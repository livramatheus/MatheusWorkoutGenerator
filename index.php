<?php
require_once realpath("vendor/autoload.php");

$_GENERAL = [
    'project_name' => "Matheus's Workout Generator",
    'author'       => 'Matheus',
    'since'        => '2020',
    'project_addr' => 'MatheusWorkoutGenerator'
];

if (file_exists('env.php')) {
    require_once('env.php');
}

use Mwg\Controller\ControllerFooter;
use Mwg\Core\CookieKeys;
use Mwg\Core\CookieTerms;
use Mwg\Core\UrlManager;

new CookieKeys();
new CookieTerms();
new UrlManager();
<?php

use Mwg\Controller\ControllerMain;
use Mwg\Controller\ControllerFooter;
use Mwg\Core\Template;

$sTemplate = Template::getTemplate();

$bAjax = filter_input(INPUT_POST, 'ajax', FILTER_VALIDATE_BOOLEAN);

$oController  = new ControllerMain();
$oFooter      = new ControllerFooter();
$sPageContent = $oController->render();

$sTemplate = str_replace('##page_content##', $sPageContent, $sTemplate);

if (isset($_GET['w'])) {
    $sFooter = '';
} else {
    $sFooter = $oFooter->render();
}

$sTemplate = str_replace('##page_footer##', $sFooter, $sTemplate);

if (!$bAjax) {
    echo $sTemplate;
}


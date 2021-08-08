<?php

use Mwg\Controller\ControllerFooter;

global $_GENERAL;
$sTemplate = file_get_contents('src/template/tpl.txt');

$oFooter      = new ControllerFooter();
$sFooter      = $oFooter->render();

$sAbout = '<ul>
                    <li><b>' .$_GENERAL['project_name']. '</b> is a free tool that was built to help you decide which workout you will do on that last minute before training.</li>
                    <li>Every workout is entirely random.</li>
                </ul>';

$sThanks = '<ul>
                    <li>
                            <a href="http://www.bodybuilding.com" target="_blank">Bodybuilding.com</a> by providing info about exercises and stimulus
                    </li>
                    <li>
                        <a href="https://developer.snapappointments.com/bootstrap-select/" target="_blank">Bootstrap Select</a> by providing a free bootstrap select/multiple asset
                    </li>
                    <li>
                        <a href="https://www.instagram.com/c.t.ali.fletcher/" target="_blank">CT Fletcher</a> inspiration
                    </li>
                </ul>';

$sPageContent = '
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="jumbotron">
                            <div class="container">
                                <h1 class="display-4">About</h1>
                                    '.$sAbout.'
                                <h1 class="display-4">Thanks to</h1>
                                    ' .$sThanks. '
                                <a href="home" class="btn btn-primary">Go Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

$sTemplate = str_replace('##page_content##', $sPageContent, $sTemplate);
$sTemplate = str_replace('##page_footer##' , $sFooter     , $sTemplate);

echo $sTemplate;

?>
    
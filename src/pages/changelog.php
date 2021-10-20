<?php

use Mwg\Controller\ControllerFooter;
use Mwg\Core\Template;

$sTemplate = Template::getTemplate();

$oFooter      = new ControllerFooter();
$sFooter      = $oFooter->render();

$sChangeLog = '<ul>
                    <li>October 12, 2020 - Initial release (v 1.0)</li>
                    <li>August 03, 2021 - Minor code tweaks (v 1.1)</li>
                </ul>';

$sPageContent = '
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="jumbotron">
                            <div class="container">
                                <h1 class="display-4">Changelog</h1>
                                    '.$sChangeLog.'
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
    
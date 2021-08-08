<?php

namespace Mwg\Controller;
use Mwg\View\ViewFooter;

/**
 * Footer Controller Class
 * @since 31/07/2020
 * @author Matheus do Livramento
 */
class ControllerFooter {
    
    public function render() : string {
        $oFooter = new ViewFooter();
        return $oFooter->createFooter();
    }
    
}

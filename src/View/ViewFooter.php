<?php
namespace Mwg\View;
/**
 * View Footer Class
 * @since 31/07/2020
 * @author Matheus do Livramento
 */
class ViewFooter {
    
    /**
     * Returns footer HTML
     * @global array $_GENERAL
     * @return string Footer HTML
     */
    public function createFooter() : string {
        global $_GENERAL;

        return '<div class="container">
                       <div class="row">
                           <div class="col-12">
                               <div class="card w-100 mx-auto mt-3 mb-3 text-dark bg-light">
                                   <div class="card-body" style="font-size: 0.8rem">
                                       <a href="terms">Terms of use</a> | 
                                       <a href="about">About</a> | 
                                       <a href="changelog">Changelog</a> | 
                                       ' .$_GENERAL['since'] . ', ' .$_GENERAL['project_name']. '
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>';
    }
    
}
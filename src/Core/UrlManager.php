<?php
namespace Mwg\Core;
/**
 * URL Manager Class
 * @since 06/04/2020
 * @author Matheus do Livramento
 */
class UrlManager {
    
    private string $param         = 'url';
    private string $pagesFolder   = 'src/pages';
    private string $defaultFolder = 'home';
    private string $extension     = '.php';
    const DIR_SEPARATOR    = '/';

    public function __construct() {
        $sUrl = filter_input(INPUT_GET, $this->param, FILTER_SANITIZE_STRING);
        
        if (isset($sUrl) && !empty($sUrl)) {
            $aUrlPath = array_filter(explode('/', $sUrl));
            $sPageToLoad = $this->pagesFolder. self::DIR_SEPARATOR .$aUrlPath[0]. $this->extension;

            if (file_exists($sPageToLoad)) {
                require_once $sPageToLoad;
            } else {
                require_once $this->pagesFolder. self::DIR_SEPARATOR .$this->defaultFolder. $this->extension;
            }
        } else {
            require_once $this->pagesFolder .self::DIR_SEPARATOR. $this->defaultFolder. $this->extension;
        }
    }
}
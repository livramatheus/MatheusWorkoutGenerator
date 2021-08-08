<?php
namespace Mwg\Core;
/**
 * Cookie Terms manager class
 * @since 13/07/2020
 * @author Matheus do Livramento
 */
class CookieTerms {

    const LIMIT_COOKIE = 86400;
    const NAME_COOKIE_TERMS  = 'terms';
    
    const TERMS_NOT_READ = 0;
    const TERMS_READ     = 1;
    
    private $value;
    private $time;
    
    public function __construct() {
        $this->cookieToObject();
    }

    private function cookieToObject() {
        $sCookie = filter_input(INPUT_COOKIE, self::NAME_COOKIE_TERMS);
        
        $this->value       = ($sCookie ? $sCookie : self::TERMS_NOT_READ);
        $this->time        = time() + self::LIMIT_COOKIE;
        
        if (!$this->issetCookie()) {
            $this->updateCookie();
        }
    }
    
    public function setTermsOfUseAsRead() {
        $this->value = self::TERMS_READ;
    }
    
    public function getTermsWasRead() {
        return $this->value;
    }
    
    /**
     * Return wether if a cookie exists
     * @return boolean
     */
    public function issetCookie() : bool {
        $sCookie = filter_input(INPUT_COOKIE, self::NAME_COOKIE_TERMS);
        
        return isset($sCookie);
    }
    
    public function updateCookie() {
        setcookie(self::NAME_COOKIE_TERMS, $this->value, $this->time, "/");
    }
}
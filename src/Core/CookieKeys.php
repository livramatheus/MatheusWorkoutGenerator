<?php
namespace Mwg\Core;
/**
 * Cookie manager class
 * @since 20/04/2020
 * @author Matheus do Livramento
 */
class CookieKeys {

    const LIMIT_COOKIE = 86400;
    const NAME_COOKIE_KEYS = 'keys';
    
    private $value;
    private $time;
    
    public function __construct() {
        $this->cookieToObject();
    }

    private function cookieToObject() {
        $sCookie = filter_input(INPUT_COOKIE, self::NAME_COOKIE_KEYS);
        
        $this->value = ($sCookie ? unserialize($sCookie) : []);
        $this->time  = time() + self::LIMIT_COOKIE;
        
        if (!$this->issetCookie()) {
            $this->updateCookie();
        }
        
    }
    
    /**
     * Adds a workout key into cookie variable
     * @param string $sValue Workout Key
     * @return boolean <b>True</b> - added successfully | <b>False</b> - didn't added
     */
    public function addValue(string $sValue) : bool {
        if (!$this->existsValue($sValue) && $this->issetCookie()) {
            $this->value[] = $sValue;
            return true;
        }
        
        return false;
    }
    
    /**
     * Return wether if a cookie exists
     * @return boolean
     */
    public function issetCookie() : bool {
        $sCookie = filter_input(INPUT_COOKIE, self::NAME_COOKIE_KEYS);
        
        return isset($sCookie);
    }

    /**
     * Checks if the supplied parameter exists on current cookie
     * @param string $sValue
     * @return boolean
     */
    private function existsValue(string $sValue) : bool {
        return in_array($sValue, $this->value);
    }
    
    private function getSerializedValue() {
        return serialize($this->value);
    }

    public function updateCookie() {
        setcookie(self::NAME_COOKIE_KEYS, $this->getSerializedValue(), $this->time, "/");
    }
}
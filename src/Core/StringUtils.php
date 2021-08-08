<?php
namespace Mwg\Core;
/**
 * String Util Class
 * @since 06/04/2020
 * @author Matheus do Livramento
 */
class StringUtils {
    
    private static $allowedChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
    /**
     * Returns a random string ranging from 0-9, a-z and A-Z
     * @param int $iLenght The length of the string to be generated
     * @return string The generated string
     */
    public static function generateRandomString(int $iLenght) : string {
        return substr(str_shuffle(self::$allowedChars), 0, $iLenght);
    }
    
}

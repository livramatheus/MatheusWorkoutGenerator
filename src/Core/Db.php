<?php
namespace Mwg\Core;
/**
 * Database connection class
 * @since 31/03/2020
 * @author Matheus do Livramento
 */
class Db {
    
    private static $instance;

    private function __construct() {}
    private function __clone() {}
    
    /** This function loads the database password from a external file for improved security */
    private static function getPass() {
        return file_get_contents('src/ATc17A69/data.txt');
    }
    
    /**
     * @return Db Returns a valid database connection via singleton pattern
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            $host     = 'localhost';
            $user     = 'root';
            $dbname   = 'iwg';
            $password = self::getPass();
            
            self::$instance = mysqli_connect($host, $user, $password, $dbname);
           
            if (self::$instance->connect_error) {
                die("ERROR");
            }
        }
        return self::$instance;
    }
    
}
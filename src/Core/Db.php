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
    
    /**
     * @return Db Returns a valid database connection via singleton pattern
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            $sUrl = parse_url(getenv("CLEARDB_DATABASE_URL"));

            $host     = $sUrl["host"];
            $user     = $sUrl["user"];
            $dbname   = substr($sUrl["path"],1);
            $password = $sUrl["pass"]; 
    
            $active_group = 'default';
            $query_builder = TRUE;
            
            self::$instance = mysqli_connect($host, $user, $password, $dbname);
           
            if (self::$instance->connect_error) {
                die("ERROR");
            }
        }
        return self::$instance;
    }
    
}
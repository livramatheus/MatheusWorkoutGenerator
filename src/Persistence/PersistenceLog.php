<?php
namespace Mwg\Persistence;

use Mwg\Persistence\PersistenceDefault;
use Mwg\Model\ModelLog;

/**
 * Persistence Log Class
 * @since 13/09/2020
 * @author Matheus do Livramento
 */
class PersistenceLog extends PersistenceDefault {
    
    private ModelLog $ModelLog;
    
    public function setModelLog(ModelLog $ModelLog) {
        $this->ModelLog = $ModelLog;
    }
    
    /**
     * Inserts a new user log in database
     */
    public function insertLog() {
        $sSql = 'INSERT INTO tblog(logip, logdate)
                               VALUES (?, ?);';
        
        $this->execQueryParams($sSql, [$this->ModelLog->getIp(), date('Y-m-d')]);
        
    }
    
}

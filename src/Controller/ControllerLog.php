<?php

namespace Mwg\Controller;
use Mwg\Model\ModelLog;
use Mwg\Persistence\PersistenceLog;

/**
 * Controller Log Class
 * @since 13/09/2020
 * @author Matheus do Livramento
 */
class ControllerLog {
    
    private ModelLog $ModelLog;
    private PersistenceLog $PersistenceLog;
    
    public function __construct() {
        $this->ModelLog       = new ModelLog;
        
        $this->ModelLog->setIp($_SERVER['REMOTE_ADDR']);
    }
    
    public function insertLog() {
        $this->PersistenceLog = new PersistenceLog();
        $this->PersistenceLog->setModelLog($this->ModelLog);
        $this->PersistenceLog->insertLog();
    }
    
}

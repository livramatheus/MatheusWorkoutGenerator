<?php
namespace Mwg\Persistence;

use Mwg\Persistence\PersistenceDefault;
use Mwg\Model\ModelLevel;

/**
 * Lever Persistence Class
 * @since 01/04/2020
 * @author Matheus do Livramento
 */
class PersistenceLevel extends PersistenceDefault {
    
    const LEVEL_BEGINNER = 1;
    const LEVEL_CASUAL   = 2;
    const LEVEL_ATHLETE  = 3;
    const LEVEL_PRO      = 4;
    
    const MAX_EX_BEGINNER      = 3;
    const MAX_EX_CASUAL        = 4;
    const MAX_EX_ATHLETE       = 5;
    const MAX_EX_PRO           = 6;
    
    private ModelLevel $ModelLevel;
    
    public function setModelLevel(ModelLevel $ModelLevel) {
        $this->ModelLevel = $ModelLevel;
    }

    /**
     * Returns all levels
     * @return ModelLevel[]
     */
    public function selectAll() : array {
        $sSql = 'SELECT *
                   FROM tblevel
                  ORDER BY lvlkey;';
        
        $oResult = $this->execQuery($sSql);
        
        $aLevels = [];
        
        while ($aRow = $oResult->fetch_assoc()) {
            $this->ModelLevel = new ModelLevel();
            $this->ModelLevel->setKey($aRow['lvlkey']);
            $this->ModelLevel->setDescription($aRow['lvldesc']);
            
            $aLevels[] = $this->ModelLevel;
        }
        
        return $aLevels;
    }
    
}
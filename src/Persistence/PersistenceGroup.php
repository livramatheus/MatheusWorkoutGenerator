<?php
namespace Mwg\Persistence;

use Mwg\Persistence\PersistenceDefault;
use Mwg\Model\ModelGroup;

/**
 * Group Persistence Class
 * @since 18/04/2020
 * @author Matheus do Livramento
 */
class PersistenceGroup extends PersistenceDefault {
    
    private ModelGroup $ModelGroup;
    
    const GROUP_CHEST       = 1;
    const GROUP_BACK        = 2;
    const GROUP_BICEPS      = 3;
    const GROUP_TRICEPS     = 4;
    const GROUP_TRAPS       = 5;
    const GROUP_FRONT_DELTS = 6;
    const GROUP_SIDE_DELTS  = 7;
    const GROUP_ABS         = 8;
    const GROUP_GLUTES      = 9;
    const GROUP_HAMSTRINGS  = 10;
    const GROUP_QUADS       = 11;
    const GROUP_CALVES      = 12;
    
    public function setModelGroup(ModelGroup $ModelGroup) {
        $this->ModelGroup = $ModelGroup;
    }
    
    public static function getAllGroupKeys() {
        return [
                self::GROUP_CHEST      ,
                self::GROUP_BACK       ,
                self::GROUP_BICEPS     ,
                self::GROUP_TRICEPS    ,
                self::GROUP_TRAPS      ,
                self::GROUP_FRONT_DELTS,
                self::GROUP_SIDE_DELTS ,
                self::GROUP_ABS        ,
                self::GROUP_GLUTES     ,
                self::GROUP_HAMSTRINGS ,
                self::GROUP_QUADS      ,
                self::GROUP_CALVES
            ];
    }
    
    /**
     * Returns all muscle groups
     * @return ModelGroup[]
     */
    public function selectAll() : array {
        $sSql = 'SELECT *
                   FROM tbgroup;';
        
        $oResult = $this->execQuery($sSql);
        
        $aGroups = [];
        
        while ($aRow = $oResult->fetch_assoc()) {
            $this->ModelGroup = new ModelGroup();
            $this->ModelGroup->setKey($aRow['grpkey']);
            $this->ModelGroup->setDescription($aRow['grpdesc']);
            
            $aGroups[] = $this->ModelGroup;
        }
        
        
        return $aGroups;
    }
    
}
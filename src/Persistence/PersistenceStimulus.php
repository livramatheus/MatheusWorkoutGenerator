<?php
namespace Mwg\Persistence;

use Mwg\Model\ModelStimulus;
use Mwg\Core\Db;
use Mwg\Persistence\PersistenceDefault;

/**
 * Stimulus Persistence Class
 * @since 06/04/2020
 * @author Matheus do Livramento
 */
class PersistenceStimulus extends PersistenceDefault {
    
    private ModelStimulus $ModelStimulus;
    
    /**
     * Returns a randomized ModelStimulus
     * @return ModelStimulus
     */
    public function randomizeStimulus() : ModelStimulus {
        
        $sSql = 'SELECT *
                   FROM tbstimulus
                  ORDER BY RAND()
                  LIMIT 1;';
        
        $oResult = $this->execQuery($sSql);
        
        $aResult = $oResult->fetch_assoc();
        
        $this->ModelStimulus = new ModelStimulus();
        $this->ModelStimulus->setKey($aResult['stikey']);
        $this->ModelStimulus->setDescription($aResult['stidesc']);
        $this->ModelStimulus->setExplanation($aResult['stiexpla']);
        
        return $this->ModelStimulus;
        
    }
    

}
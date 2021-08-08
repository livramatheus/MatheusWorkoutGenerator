<?php
namespace Mwg\Persistence;

use Mwg\Model\ModelExercise;
use Mwg\Persistence\PersistenceDefault;
use Mwg\Model\ModelGroup;

/**
 * Exercise Persistence Class
 * @since 01/04/2020
 * @author Matheus do Livramento
 */
class PersistenceExercise extends PersistenceDefault {
    
    private ModelExercise $ModelExercise;

    /**
     * Randomizes a set of exercises from database based on a specific group
     * @param ModelGroup $oGroup The Group of exercises
     * @param int $iLimit How many exercises per group will be generated
     * @return ModelExercise[] An array of ModelExercise
     */
    public function getExcerciseGroup(ModelGroup $oGroup, int $iLimit) : array {
        $sSql = "SELECT exekey,
                        exedesc
                   FROM tbexercise
                  WHERE grpkey = '{$oGroup->getKey()}'
                  ORDER BY rand()
                  LIMIT $iLimit";
        
        $oResult = $this->execQuery($sSql);
        
        $aExercises = [];
        
        while ($aRow = $oResult->fetch_assoc()) {
            $this->ModelExercise = new ModelExercise();
            
            $this->ModelExercise->setKey($aRow['exekey']);
            $this->ModelExercise->setDescription($aRow['exedesc']);
            $this->ModelExercise->setGroup($oGroup);
            
            array_push($aExercises, $this->ModelExercise);
        }
        
        return $aExercises;
    }

}
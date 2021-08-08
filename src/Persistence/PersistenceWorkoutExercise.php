<?php
namespace Mwg\Persistence;

use Mwg\Persistence\PersistenceDefault;
use Mwg\Model\ModelWorkout;
use Mwg\Model\ModelWorkoutExercise;
use Mwg\Model\ModelExercise;
use Mwg\Model\ModelStimulus;

/**
 * Workout Exercise Persistence Class
 * @since 06/04/2020
 * @author Matheus do Livramento
 */
class PersistenceWorkoutExercise extends PersistenceDefault {
    
    private ModelWorkoutExercise $ModelWorkoutExercise;
    private ModelWorkout $ModelWorkout;
    private ModelExercise $ModelExercise;
    private ModelStimulus $ModelStimulus;
    
    public function setModelWorkout(ModelWorkout $ModelWorkout) {
        $this->ModelWorkout = $ModelWorkout;
    }

    public function setModelWorkoutExercise(ModelWorkoutExercise $ModelWorkoutExercise) {
        $this->ModelWorkoutExercise = $ModelWorkoutExercise;
    }
     
    /**
     * Stores an relation between workout and exercise on database
     */
    public function insert() {
        $sSql = 'INSERT INTO tbworkoutexercise (iwgkey, wexeseq, wexser, wexrep, exekey, stikey)
                             VALUES(?, ?, ?, ?, ?, ?);';
        
        $xStimulus = ($this->ModelWorkoutExercise->getUsesStimulus() ? $this->ModelWorkoutExercise->getStimulus()->getKey() : null);
        
        $aData = [
            $this->ModelWorkoutExercise->getWorkout()->getKey(),
            $this->ModelWorkoutExercise->getSequence(),
            $this->ModelWorkoutExercise->getSeries(),
            $this->ModelWorkoutExercise->getRep(),
            $this->ModelWorkoutExercise->getExercise()->getKey(),
            $xStimulus
        ];
                
        $this->execQueryParams($sSql, $aData);
    }
    
    /**
     * This function will select all exercises from a Workout
     * @return ModelWorkoutExercise[] An array of ModelWorkoutExercise
     */
    public function select() : array {
        $sSql = 'SELECT *
                   FROM tbworkoutexercise
                   JOIN tbexercise
                        USING (EXEKEY)
                   LEFT JOIN tbstimulus
                        USING (stikey)
                  WHERE iwgkey = ?
                  ORDER BY wexeseq;';
        
        $oResult = $this->execQueryParams($sSql, [$this->ModelWorkout->getKey()], true);
        
        $aWorkoutExercise = [];
        
        while ($aRow = $oResult->fetch_assoc()) {
            $this->ModelWorkoutExercise = new ModelWorkoutExercise();
            $this->ModelStimulus        = new ModelStimulus();
            $this->ModelExercise        = new ModelExercise();
            
            $this->ModelWorkoutExercise->setSeries($aRow['wexser']);
            $this->ModelWorkoutExercise->setRep($aRow['wexrep']);
            $this->ModelWorkoutExercise->setSequence($aRow['wexeseq']);
            
            $this->ModelExercise->setKey($aRow['exekey']);
            $this->ModelExercise->setDescription($aRow['exedesc']);
            $this->ModelWorkoutExercise->setExercise($this->ModelExercise);
            
            /* If stimulus is null, that means that
             * that specific exercise doesn't uses an stimulus.
             * If true, ModelWorkoutExercise is set to use stimulus
             * If false, ModelWorkoutExercise is set to not use stimulus
             */
            if (!is_null($aRow['stikey'])) {
                $this->ModelStimulus->setKey($aRow['stikey']);
                $this->ModelStimulus->setDescription($aRow['stidesc']);
                $this->ModelStimulus->setExplanation($aRow['stiexpla']);
                $this->ModelWorkoutExercise->setStimulus($this->ModelStimulus);
                
                $this->ModelWorkoutExercise->setUsesStimulus(true);
            } else {
                $this->ModelWorkoutExercise->setUsesStimulus(false);
            }
            
            $this->ModelWorkoutExercise->setWorkout($this->ModelWorkout);
            
            $aWorkoutExercise[] = $this->ModelWorkoutExercise;
        }
        
        return $aWorkoutExercise;
    }
    
}

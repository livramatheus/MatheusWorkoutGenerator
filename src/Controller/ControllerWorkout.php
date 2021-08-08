<?php
namespace Mwg\Controller;

use Mwg\Persistence\PersistenceWorkout;
use Mwg\Model\ModelWorkoutExercise;
use Mwg\Model\ModelLevel;
use Mwg\Model\ModelWorkout;

/**
 * Workout Controller Class
 * @since 30/03/2020
 * @author Matheus do Livramento
 */
class ControllerWorkout {
    
    /** @var ModelWorkout */
    private $ModelWorkout;
    
    /** @var ModelWorkoutExercise */
    private $ModelWorkoutExercise;

    /** @var ControllerExercise */
    private $ControllerExercise;
    
    /** @var ControllerWorkoutExercise */
    private $ControllerWorkoutExercise;
    
    /** @var PersistenceWorkout */
    private $PersistenceWorkout;
    
    public function setModelWorkout(ModelWorkout $ModelWorkout) {
        $this->ModelWorkout = $ModelWorkout;
    }

    /**
     * Generates a complete workout returning it's model
     * @param ModelLevel $oLevel
     * @param ModelGroup[] $aGroup
     * @return ModelWorkout
     */
    public function generateWorkout(ModelLevel $oLevel, array $aGroup) : ModelWorkout {
        try {
            $this->ModelWorkout              = new ModelWorkout($oLevel, $aGroup);
        } catch (Exception $oError) {
            $oHttpRequest = new HttpRequest();
            $oHttpRequest->setState(false);
            $oHttpRequest->setContent($oError->getMessage());
            $oHttpRequest->getHttpRequest();
            die();
        }
        
        $this->PersistenceWorkout        = new PersistenceWorkout();
        $this->ControllerExercise        = new ControllerExercise();
        $this->ControllerWorkoutExercise = new ControllerWorkoutExercise();
        
        $this->ModelWorkout->setKey($this->PersistenceWorkout->generateKey());
        $this->ModelWorkout->setSeenCount(1);
        $this->PersistenceWorkout->setModelWorkout($this->ModelWorkout);
        $this->PersistenceWorkout->insert($this->ModelWorkout);
        
        /* @var ModelWorkoutExercise[] */
        $aWorkoutExercise = [];
        
        $iKey = 1;
        
        foreach ($aGroup as /* @var $oGroup ModelGroup */ $oGroup) {
            
            $aExercises = $this->ControllerWorkoutExercise->randExercises($oGroup, $this->ModelWorkout->getMaxExercise($oLevel));
            
            foreach ($aExercises as /* @var $oExercise ModelExercise */ $oExercise) {
                $this->ModelWorkoutExercise = new ModelWorkoutExercise();
                $this->ModelWorkoutExercise->setSequence($iKey);
                $this->ModelWorkoutExercise->setExercise($oExercise);
                $this->ModelWorkoutExercise->setSeries($this->ControllerWorkoutExercise->randSeries());
                $this->ModelWorkoutExercise->setRep($this->ControllerWorkoutExercise->randReps());
                
                // Randomizes wether if the current exercises uses an advanced stimulus or not
                $this->ModelWorkoutExercise->setUsesStimulus($this->ModelWorkout->getLevel()->useStimulus());
                
                if ($this->ModelWorkoutExercise->getUsesStimulus()) {
                    $this->ModelWorkoutExercise->setStimulus($this->ControllerWorkoutExercise->randStimulus());
                }
                
                $this->ModelWorkoutExercise->setWorkout($this->ModelWorkout);
                
                $this->ControllerWorkoutExercise->setModelWorkoutExercise($this->ModelWorkoutExercise);
                $this->ControllerWorkoutExercise->insert();
                
                $aWorkoutExercise[] = $this->ModelWorkoutExercise;
                
                $iKey ++;
            }
        }
        
        $this->ModelWorkout->setWorkoutExercise($aWorkoutExercise);

        return $this->ModelWorkout;
    }
    
    /**
     * This method search and return a workout that matches the supplied key
     * @param boolean $bUpdateSeenCount If the seen count should be incremented
     * @return ModelWorkout The selected workout
     */
    public function getWorkoutByKey($bUpdateSeenCount = false) {
        $this->PersistenceWorkout = new PersistenceWorkout();
        $this->PersistenceWorkout->setModelWorkout($this->ModelWorkout);
        $this->ModelWorkout = $this->PersistenceWorkout->select();
        
        if ($bUpdateSeenCount) {
            $this->PersistenceWorkout->updateSeenCount();
        }
        
        return $this->ModelWorkout;
    }
    
}
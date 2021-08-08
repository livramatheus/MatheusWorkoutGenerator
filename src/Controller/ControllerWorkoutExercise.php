<?php
namespace Mwg\Controller;

use Mwg\Controller\ControllerExercise;
use Mwg\Controller\ControllerStimulus;
use Mwg\Persistence\PersistenceWorkoutExercise;
use Mwg\Model\ModelGroup;
use Mwg\Model\ModelWorkoutExercise;
use Mwg\Model\ModelStimulus;

/**
 * Workout Exercise Controller Class
 * @since 05/04/2020
 * @author Matheus do Livramento
 */
class ControllerWorkoutExercise {
    
    /** @var ControllerExercise */
    private $ControllerExercise;
    
    /** @var ControllerStimulus */
    private $ControllerStimulus;

    /** @var ModelWorkoutExercise */
    private $ModelWorkoutExercise;
    
    /** @var PersistenceWorkoutExercise */
    private $PersistenceWorkoutExercise;
    
    public function setModelWorkoutExercise(ModelWorkoutExercise $ModelWorkoutExercise) {
        $this->ModelWorkoutExercise = $ModelWorkoutExercise;
    }
        
    /**
     * Randomizes the amount of series per exercise
     * @return int The amount of series by exercise
     */
    public function randSeries() : int {
        return rand(3, 5);
    }
    
    /**
     * Randomizes the amount of reps per serie
     * @return int The amount of reps by series
     */
    public function randReps() : int {
        $aReps = [8, 10, 12, 15];
        return $aReps[rand(0, 3)];
    }
    
    /**
     * Randomizes a set of exercises based on a group limited by the $iLimit parameter
     * @param ModelGroup $oGroup The muscular group that the exercises will be randomized
     * @param int $iLimit The limit of exercises per muscular group
     * @return ModelExercise[] An array of ModelExercise
     */
    public function randExercises(ModelGroup $oGroup, int $iLimit) : array {
        $this->ControllerExercise = new ControllerExercise();
        return $this->ControllerExercise->getExcerciseGroup($oGroup, $iLimit);
    }
    
    /**
     * Randomizes a stimulus to be used with an exercise
     * @return ModelStimulus The generated stimulus
     */
    public function randStimulus() : ModelStimulus {
        $this->ControllerStimulus = new ControllerStimulus();
        return $this->ControllerStimulus->randomizeStimulus();
    }
    
    /**
     * Inserts in database a relation between a workout and a exercise.
     */
    public function insert() {
        $this->PersistenceWorkoutExercise = new PersistenceWorkoutExercise();
        $this->PersistenceWorkoutExercise->setModelWorkoutExercise($this->ModelWorkoutExercise);
        $this->PersistenceWorkoutExercise->insert();
    }
    
}
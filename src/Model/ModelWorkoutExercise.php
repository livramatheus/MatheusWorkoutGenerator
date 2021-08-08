<?php
namespace Mwg\Model;
/**
 * Workout x Exercise class
 * @since 30/03/2020
 * @author Matheus do Livramento
 */
class ModelWorkoutExercise {
    
    private ModelWorkout $Workout;
    private ModelExercise $Exercise;
    private ModelStimulus $Stimulus;

    private bool $usesStimulus;
    private int $series;
    private int $rep;
    private int $sequence;
    
    public function getWorkout() : ModelWorkout {
        return $this->Workout;
    }

    public function getExercise() : ModelExercise {
        return $this->Exercise;
    }

    public function getStimulus() : ModelStimulus{
        return $this->Stimulus;
    }

    public function getSeries() : int {
        return $this->series;
    }

    public function getRep() : int {
        return $this->rep;
    }

    public function getSequence() : int{
        return $this->sequence;
    }

    public function setWorkout(ModelWorkout $Workout) {
        $this->Workout = $Workout;
    }

    public function setExercise(ModelExercise $Exercise) {
        $this->Exercise = $Exercise;
    }

    public function setStimulus(ModelStimulus $Stimulus) {
        $this->Stimulus = $Stimulus;
    }

    public function setSeries(int $series) {
        $this->series = $series;
    }
    
    public function setRep(int $rep) {
        $this->rep = $rep;
    }

    public function setSequence(int $sequence) {
        $this->sequence = $sequence;
    }
    
    public function getUsesStimulus() : bool {
        return $this->usesStimulus;
    }

    public function setUsesStimulus(bool $usesStimulus) {
        $this->usesStimulus = $usesStimulus;
    }

    
}
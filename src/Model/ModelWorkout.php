<?php
namespace Mwg\Model;

use Mwg\Persistence\PersistenceLevel;

/**
 * Workout Model Class
 * @since 30/03/2020
 * @author Matheus do Livramento
 */
class ModelWorkout {
    
    private array $WorkoutExercise;
    private ModelLevel $Level;
    private string $key;
    private int $seenCount;
    
    public function __construct($Level = null, $aGroup = null) {
        if (($Level instanceof ModelLevel) && (is_array($aGroup))) {
            $this->Level = $Level;
            $this->WorkoutExercise = $aGroup;
        }
    }
    
    public function getLevel() : ModelLevel{
        return $this->Level;
    }

    public function setLevel(ModelLevel $Level) {
        $this->Level = $Level;
    }

    public function getWorkoutExercise() : array {
        return $this->WorkoutExercise;
    }
        
    public function getKey() : string {
        return $this->key;
    }

    public function getSeenCount() : int {
        return $this->seenCount;
    }
    
    public function setWorkoutExercise(array $WorkoutExercise) {
        $this->WorkoutExercise = $WorkoutExercise;
    }

    public function setKey(string $key) {
        $this->key = $key;
    }

    public function setSeenCount(int $seenCount) {
        $this->seenCount = $seenCount;
    }
    
    public function getMaxExercise(ModelLevel $oLevel) : int {
        switch ($oLevel->getKey()) {
            case PersistenceLevel::LEVEL_BEGINNER:
                return PersistenceLevel::MAX_EX_BEGINNER;
            case PersistenceLevel::LEVEL_CASUAL:
                return PersistenceLevel::MAX_EX_CASUAL;
            case PersistenceLevel::LEVEL_ATHLETE:
                return PersistenceLevel::MAX_EX_ATHLETE;
            case PersistenceLevel::LEVEL_PRO:
                return PersistenceLevel::MAX_EX_PRO;
            default:
                return 0;
        }
    }
}
<?php
namespace Mwg\Persistence;

use Mwg\Persistence\PersistenceDefault;
use Mwg\Core\StringUtils;
use Mwg\Model\ModelWorkout;

/**
 * Workout Persistence Class
 * @since 31/03/2020
 * @author Matheus do Livramento
 */
class PersistenceWorkout extends PersistenceDefault {
    
    const MAX_WORKOUT_KEY_LENGHT = 5;
    
    private ModelWorkout $ModelWorkout;
    private PersistenceWorkoutExercise $PersistenceWorkoutExercise;
    
    public function setModelWorkout(ModelWorkout $ModelWorkout) {
        $this->ModelWorkout = $ModelWorkout;
    }
    
    /**
     * This method stores a workout in database
     */
    public function insert() {
        $sSql = 'INSERT INTO tbworkout
                             VALUES(?, ?, ?);';
        
        $this->execQueryParams($sSql, [$this->ModelWorkout->getKey(), $this->ModelWorkout->getSeenCount(), $this->ModelWorkout->getLevel()->getKey()]);
    }
    
    /**
     * This method randomizes an unique workout key.
     * The while loop iterates until an unique key is generated.
     * @return string The generated Key
     */
    public function generateKey() : string {
        do {
            $sGeneratedKey = StringUtils::generateRandomString(self::MAX_WORKOUT_KEY_LENGHT);
        } while ($this->workoutKeyExists($sGeneratedKey));
        
        return $sGeneratedKey;
    }
    
    /**
     * Checks database if the key supplied by parameter is unique
     * @param string $sKey
     * @return boolean Returns either true if the supplied key exists or false, otherwise
     */
    public function workoutKeyExists(string $sKey) : bool {
        $sSql = "SELECT EXISTS(
                               SELECT 1
                                 FROM tbworkoutexercise
                                WHERE iwgkey = '$sKey'
                              )";
        
        $oResult = $this->execQuery($sSql);
        
        $aReturn = $oResult->fetch_row();
        
        return (boolean) $aReturn[0];
    }
    
    /**
     * This function will select a single workout from database
     * @return ModelWorkout The selected workout
     */
    public function select() : ModelWorkout {
        $sSql = 'SELECT *
                   FROM tbworkout
                  WHERE IWGKEY = ?;';
        
        $oResult = $this->execQueryParams($sSql, [$this->ModelWorkout->getKey()], true);
        
        $aResult = $oResult->fetch_assoc();
        
        $this->ModelWorkout->setSeenCount($aResult['iwgseencnt']);
        
        $this->PersistenceWorkoutExercise = new PersistenceWorkoutExercise();
        $this->PersistenceWorkoutExercise->setModelWorkout($this->ModelWorkout);
        $this->ModelWorkout->setWorkoutExercise($this->PersistenceWorkoutExercise->select());
        
        return $this->ModelWorkout;
    }
    
    public function updateSeenCount() {
        $iNewViewCount = $this->ModelWorkout->getSeenCount() + 1;
        
        $sSql = 'UPDATE tbworkout
                    SET iwgseencnt = ?
                  WHERE iwgkey = ?';
        
        $this->execQueryParams($sSql, [$iNewViewCount, $this->ModelWorkout->getKey()]);
    }
}

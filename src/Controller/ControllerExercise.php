<?php

namespace Mwg\Controller;

use Mwg\Persistence\PersistenceExercise;
use Mwg\Model\ModelGroup;

/**
 * Exercise Controller Class
 * @since 02/04/2020
 * @author Matheus do Livramento
 */
class ControllerExercise {
    
    /** @var PersistenceExercise */
    private $PersistenceExercise;
    
    public function __construct() {
        $this->PersistenceExercise = new PersistenceExercise();
    }
    
    /**
     * Makes a call to Persistence to generate a set of exercises by muscle group
     * @param ModelGroup $oGroup The muscular group that the exercises will be randomized
     * @param int $iLimit The limit of exercises per muscular group
     * @return ModelExercise[] An array of ModelExercise
     */
    public function getExcerciseGroup(ModelGroup $oGroup, int $iLimit) : array {
        return $this->PersistenceExercise->getExcerciseGroup($oGroup, $iLimit);
    }
    
}
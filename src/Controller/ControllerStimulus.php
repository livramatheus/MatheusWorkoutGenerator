<?php

namespace Mwg\Controller;

use Mwg\Persistence\PersistenceStimulus;
use Mwg\Model\ModelStimulus;

/**
 * Stimulus Controller Class
 * @since 06/04/2020
 * @author Matheus do Livramento
 */

class ControllerStimulus {
    
    /** @var PersistenceStimulus */
    private $PersistenceStimulus;
    
    /**
     * Makes a call to PersistenceStimulus and returns a randomized ModelStimulus
     * @return ModelStimulus
     */
    public function randomizeStimulus() : ModelStimulus {
        $this->PersistenceStimulus = new PersistenceStimulus();
        return $this->PersistenceStimulus->randomizeStimulus();
    }
    
}
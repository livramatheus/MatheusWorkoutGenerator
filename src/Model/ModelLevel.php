<?php
namespace Mwg\Model;

use Mwg\Persistence\PersistenceLevel;
use Mwg\Persistence\PersistenceGroup;

/**
 * Model Level Class
 * @since 29/03/2020
 * @author Matheus do Livramento
 */
class ModelLevel {
 
    private int $key;
    private string $description;
   
    public function getKey() : int {
        return $this->key;
    }

    public function getDescription() : string{
        return $this->description;
    }

    public function setKey(int $key) {
        $this->key = $key;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }
    
    public function useStimulus() {
        switch ($this->key) {
            // 1
            case PersistenceLevel::LEVEL_BEGINNER:
                return !(boolean) rand(0, 20);
            
            // 2
            case PersistenceLevel::LEVEL_CASUAL:
                return !(boolean) rand(0, 7);
                
            // 3
            case PersistenceLevel::LEVEL_ATHLETE:
                return !(boolean) rand(0, 4);
            
            // 4
            case PersistenceLevel::LEVEL_PRO:
                return !(boolean) rand(0, 3);   
                
            default:
                return false;
        }
    }
    
    /**
     * This function returns the keys of allowed groups by level
     * @return Array
     */
    
}
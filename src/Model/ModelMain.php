<?php
namespace Mwg\Model;
/**
 * Main Model Class
 * @since 29/03/2020
 * @author Matheus do Livramento
 */
class ModelMain {
    
    private array $Group = [];
    private ModelLevel $Level;
    
    public function getGroup() : array {
        return $this->Group;
    }

    public function getLevel() : ModelLevel {
        return $this->Level;
    }

    public function setGroup(array $Group) {
        $this->Group = $Group;
    }

    public function setLevel(ModelLevel $Level) {
        $this->Level = $Level;
    }
    
    public function isValid() : bool {
        if (!empty($this->Group) && $this->Level->getKey() > 0) {
            return true;
        }
        return false;
    }

}
<?php
namespace Mwg\Model;

use Mwg\Model\ModelGroup;

/**
 * Exercise Model Class
 * @since 29/03/2020
 * @author Matheus do Livramento
 */
class ModelExercise {
    
    private ModelGroup $Group;
    private int $key;
    private string $description;
    
    public function getKey() : int {
        return $this->key;
    }

    public function getDescription() : string{
        return $this->description;
    }

    public function setGroup(ModelGroup $Group) {
        $this->Group = $Group;
    }

    public function setKey(int $key) {
        $this->key = $key;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }

}
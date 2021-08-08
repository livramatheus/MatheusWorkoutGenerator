<?php
namespace Mwg\Model;
/**
 * Group Model Class
 * @since 29/03/2020
 * @author Matheus do Livramento
 */
class ModelGroup {
    
    private int $key;
    private string $description;
    
    public function __construct(int $key = null) {
        $this->setKey($key);
    }
    
    public function getKey() : int{
        return $this->key;
    }

    public function getDescription() : string{
        return $this->description;
    }

    public function setKey($key) {
        $this->key = (int) $key;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }
    
}
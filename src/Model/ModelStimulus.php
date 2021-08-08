<?php
namespace Mwg\Model;
/**
 * Stimulus Model Class
 * @since 29/03/2020
 * @author Matheus do Livramento
 */
class ModelStimulus {
    
    private int $key;
    private string $description;
    private string $explanation;
    
    public function getKey() : int{
        return $this->key;
    }

    public function getDescription() : string {
        return $this->description;
    }
    
    public function getExplanation() : string {
        return $this->explanation;
    }

    public function setKey(int $key) {
        $this->key = $key;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }
    
    public function setExplanation(string $explanation) {
        $this->explanation = $explanation;
    }

}
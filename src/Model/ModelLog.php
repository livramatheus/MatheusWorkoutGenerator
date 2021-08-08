<?php
namespace Mwg\Model;
/**
 * Model Log CLass
 * @since 13/09/2020
 * @author Matheus do Livramento
 */
class ModelLog {
    
    private string $ip;
    private string $date;
    
    public function getIp() : string {
        return $this->ip;
    }
    
    public function setIp(string $ip) {
        $this->ip = $ip;
    }
    
    public function getDate() : string{
        return $this->date;
    }

    public function setDate(string $date) {
        $this->date = $date;
    }

}
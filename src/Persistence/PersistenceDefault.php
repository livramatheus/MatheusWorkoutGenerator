<?php
namespace Mwg\Persistence;

use Mwg\Core\Db;

/**
 * Default Persistence Class
 * @since 03/04/2020
 * @author Matheus do Livramento
 */
abstract class PersistenceDefault {
    
    /**
     * This function is used to execute queries on database
     * @param string $sSql
     * @param boolean $bReturnsData
     * @return mysqli_result Returns result <b>resource</b> if $bReturnsData is true or <b>boolean</b> if $bReturnsData equals false
     */
    protected function execQuery($sSql) {
        
        /* @var $oConnection mysqli */
        $oConnection = Db::getInstance();
        
        /* @var $oResult mysqli_result */
        $oResult = $oConnection->query($sSql);
        
        if ($oResult->num_rows > 0) {
            return $oResult;
        } else {
            return false;
        }
    }
    
    /**
     * This function is used to execute queries on database
     * @param string $sSql
     * @param array $aParams
     * @param boolean $bReturnsData
     * @return mysqli_result Returns result <b>resource</b> if $bReturnsData is true or <b>boolean</b> if $bReturnsData equals false
     */
    protected function execQueryParams(string $sSql, array $aParams, $bReturnsData = false) {
        $sFilter = str_repeat('s', count($aParams));
        
        /* @var $oConnection mysqli */
        $oConnection = Db::getInstance();
        
        /* @var $oStatement mysqli_stmt */
        $oStatement = $oConnection->prepare($sSql);
        
        $oStatement->bind_param($sFilter, ...$aParams);
        $oStatement->execute();
        
        $oResult = $oStatement->get_result();
        
        return $oResult;
    }
}
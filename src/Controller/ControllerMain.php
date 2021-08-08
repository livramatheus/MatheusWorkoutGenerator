<?php
namespace Mwg\Controller;

// Models
use Mwg\Model\ModelMain;
use Mwg\Model\ModelLevel;
use Mwg\Model\ModelGroup;
use Mwg\Model\ModelWorkout;

// Persistences
use Mwg\Persistence\PersistenceGroup;
use Mwg\Persistence\PersistenceWorkout;
use Mwg\Persistence\PersistenceLevel;

// Views
use Mwg\View\ViewMain;
use Mwg\View\ViewWorkout;

// Controllers
use Mwg\Controller\ControllerWorkout;
use Mwg\Controller\ControllerLog;

// Core classes
use Mwg\Core\HttpRequest;
use Mwg\Core\CookieKeys;
use Mwg\Core\CookieTerms;

/**
 * Main Controller Class
 * @since 29/03/2020
 * @author Matheus do Livramento
 */
class ControllerMain {
    
    /** @var ModelMain */
    private $ModelMain;
    
    /** @var ViewMain */
    private $ViewMain;
    
    /** @var ControllerWorkout */
    private $ControllerWorkout;
    
    /** @var ModelWorkout */
    private $ModelWorkout;
    
    /** @var ViewWorkout */
    private $ViewWorkout;
    
    /** @var PersistenceWorkout */
    private $PersistenceWorkout;
    
    /** @var PersistenceGroup */
    private $PersistenceGroup;
    
    /** @var PersistenceLevel */
    private $PersistenceLevel;
    
    /** @var ControllerLog */
    private $ControllerLog;
    
    /** @var CookieKeys */
    private $CookieKeys;
    
    /** @var CookieTerms */
    private $CookieTerms;

    public function __construct() {
        $this->ModelMain          = new ModelMain();
        $this->ViewMain           = new ViewMain();
        $this->ControllerWorkout  = new ControllerWorkout();
        $this->PersistenceWorkout = new PersistenceWorkout();
        $this->PersistenceGroup   = new PersistenceGroup();
        $this->PersistenceLevel   = new PersistenceLevel();
        $this->ModelWorkout       = new ModelWorkout();
        $this->ViewWorkout        = new ViewWorkout();
        $this->CookieKeys         = new CookieKeys();
        $this->CookieTerms        = new CookieTerms();
    }
    
    /**
     * Starts a cookie, and adds a workout key to it
     * @return boolean Whether  if a workout was added to cookie
     */
    private function manageViewCount() : bool {
        return $this->CookieKeys->addValue($this->ModelWorkout->getKey());
    }

    /**
     * Checks data sent by user (workout key, level and group)
     * These data is validated
     * This function may send an Ajax request or return a string (main application form)
     * Ajax that may be sent:
     * - An existing workout based on a key supplied by user
     * - An error message if the supplied key doesn't exists
     * - A newly generated workout based on level and group parameters sent by user
     * @return string 
     */
    public function render() {
        $bAjax = filter_input(INPUT_POST, 'ajax', FILTER_VALIDATE_BOOLEAN);
        
        $this->manageLevelInput();
        $this->manageGroupInput();
        $this->manageTerms();
        
        if (!$this->CookieTerms->getTermsWasRead()) {
            $this->ControllerLog = new ControllerLog();
            $this->ControllerLog->insertLog();
        }
        
        $this->manageCustomUrlInput();
        
        if ($bAjax) {
            $oHttpRequest = new HttpRequest();
            
            if ($this->manageWorkoutKeyInput()) {
                if ($this->PersistenceWorkout->workoutKeyExists($this->ModelWorkout->getKey())) {
                    $oHttpRequest->setContent($this->getWorkoutByKey());
                } else {
                    $oHttpRequest->setState($this->PersistenceWorkout->workoutKeyExists($this->ModelWorkout->getKey()));
                }
                $this->CookieKeys->updateCookie(); // Updates cookie before sending HTTP request
                $this->CookieTerms->updateCookie();
            } elseif ($this->ModelMain->isValid()) {
                $oHttpRequest->setContent($this->generateWorkout($this->ModelMain));
                $this->CookieKeys->updateCookie(); // Updates cookie before sending HTTP request
                $this->CookieTerms->updateCookie();
            } elseif ($this->manageWorkoutLevelGroups()){
                $oHttpRequest->setContent(json_encode($this->ModelMain->getLevel()->getAllowedGroups()));
            }
            
            $oHttpRequest->getHttpRequest();
        } else {
            if ($this->manageCustomUrlInput()) {
                if ($this->PersistenceWorkout->workoutKeyExists($this->ModelWorkout->getKey())) {
                    $this->ControllerWorkout->setModelWorkout($this->ModelWorkout);
                    $this->ModelWorkout = $this->ControllerWorkout->getWorkoutByKey($this->manageViewCount());
                    $this->ViewWorkout->setModelWorkout($this->ModelWorkout);
                    
                    $this->CookieKeys->updateCookie(); // Updates cookie before returning generated workout to index
                    $this->CookieTerms->updateCookie();
                    return $this->ViewWorkout->generateWorkoutTable();
                } else {
                    $this->ViewWorkout->setModelWorkout($this->ModelWorkout);
                    
                    return $this->ViewWorkout->generateNotFoundWorkoutErrorMessage();
                }
            } else {
                $this->ViewMain->setGroups($this->PersistenceGroup->selectAll());
                $this->ViewMain->setLevels($this->PersistenceLevel->selectAll());
                
                return $this->ViewMain->generateForm($this->CookieTerms->getTermsWasRead());
            }
        }
    }
    
    private function manageWorkoutLevelGroups() : bool {
        $iLevelKey = (int) filter_input(INPUT_POST, 'levelkey', FILTER_SANITIZE_NUMBER_INT);
        
        if($iLevelKey) {
            $oModelLevel = new ModelLevel();
            $oModelLevel->setKey($iLevelKey);
            $this->ModelMain->setLevel($oModelLevel);
            
            return true;
        }
        
        return false;
    }


    /**
     * Manages a workout sent by via url trhough W superglobal
     * @return boolean true if a key was sent, false otherwise.
     */
    private function manageCustomUrlInput() : bool {
        $sKey  = filter_input(INPUT_GET, 'w', FILTER_SANITIZE_URL);
        
        if ($sKey) {
            $this->ModelWorkout->setKey($sKey);
            
            return true;
        }
        
        return false;
    }

    /**
     * Method used to search on database and render a specific workout based on it's key
     * @return string Matching key workout table string
     */
    public function getWorkoutByKey() : string {
        $this->ControllerWorkout->setModelWorkout($this->ModelWorkout);
        $this->ModelWorkout = $this->ControllerWorkout->getWorkoutByKey($this->manageViewCount());
        
        $this->ViewWorkout->setModelWorkout($this->ModelWorkout);
        return $this->ViewWorkout->generateWorkoutTable();
    }
    
    /**
     * Manages workout parameters sent by user
     * @return boolean true: workout data was sent by user | false no workout data was sent
     */
    private function manageWorkoutKeyInput() : bool {
        $sKey = filter_input(INPUT_POST, 'w', FILTER_SANITIZE_URL);
        
        if ($sKey) {
            $this->ModelWorkout->setKey($sKey);
            
            return true;
        }
        
        return false;
    }
    
    /**
     * Manages level parameters sent by user
     * @return boolean true: level data was sent by user | false no level data was sent
     */
    private function manageLevelInput() : bool {
        $iLevel = filter_input(INPUT_POST, 'level', FILTER_VALIDATE_INT);

        if ($iLevel) {
            $oLevel = new ModelLevel();
            $oLevel->setKey($iLevel);
            $this->ModelMain->setLevel($oLevel);
            
            return true;
        }
        
        return false;
    }
    
    private function manageTerms() {
        $bTermsAgreed = (int) filter_input(INPUT_POST, CookieTerms::NAME_COOKIE_TERMS, FILTER_SANITIZE_NUMBER_INT);
        
        if ($bTermsAgreed) {
            $this->CookieTerms->setTermsOfUseAsRead();
        }
    }
    
    /**
     * Manages group parameters sent by user
     * @return boolean true: group data was sent by user | false no group data was sent
     */
    private function manageGroupInput() : bool {
        $aSuppliedGroups = filter_input(INPUT_POST, 'group', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        
        if ($aSuppliedGroups) {
            $aGroup = [];

            foreach ((array) filter_input(INPUT_POST, 'group', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) as $iKey) {
                $oModelGroup = new ModelGroup($iKey);
                $aGroup[] = $oModelGroup;
            }

            $this->ModelMain->setGroup($aGroup);
            
            return true;
        }
        
        return false;
    }

    /**
     * Will generate, store and render a complete workout
     * @param ModelMain $oModelMain
     */
    private function generateWorkout(ModelMain $oModelMain) {
        $this->ModelWorkout = $this->ControllerWorkout->generateWorkout($oModelMain->getLevel(), $oModelMain->getGroup());
        $this->manageViewCount();
        
        $this->ViewWorkout->setModelWorkout($this->ModelWorkout);
        return $this->ViewWorkout->generateWorkoutTable();
    }
    
}
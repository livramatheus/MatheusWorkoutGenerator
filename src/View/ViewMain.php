<?php
namespace Mwg\View;
/**
 * Main View Class
 * @since 29/03/2020
 * @author Matheus do Livramento
 */
class ViewMain {
    
    private array $groups;
    private array $levels;
    
    public function setGroups(array $groups) {
        $this->groups = $groups;
    }
    
    public function setLevels(array $levels) {
        $this->levels = $levels;
    }
    
    /**
     * Returns the main application form
     * @param boolean $bTerms Wether if terms was read
     * @return string
     */
    public function generateForm($bTerms = false) : string {
        ob_start();
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form id="form-workout-generate"  class="needs-validation" novalidate>
                <div class="card w-100 mx-auto text-dark bg-light">
                    <div class="card-header">
                        <h4>Generate a Workout...</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="workout-level">
                                <h6>You are a...</h6>
                            </label>
                            <select class="custom-select bg-light form-input form-control selectpicker form-input" id="workout-level" name="level" required>
<?php
foreach ($this->levels as /* @var $ModelLevel ModelLevel */ $ModelLevel) {
    echo "                                <option value=\"" .$ModelLevel->getKey(). "\">" .$ModelLevel->getDescription(). "</option>\n";
}
?>
                            </select>
                            <div class="invalid-feedback">
                                Please, fill this correctly!
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="workout-group">
                                <h6>Choose the groups to train:</h6>
                            </label>
                            <select multiple class="form-control selectpicker form-input" data-style="btn-light" id="workout-group" name="group[]" required size="5">
<?php
foreach ($this->groups as /* @var $ModelGroup ModelGroup */ $ModelGroup) {
    echo "                                <option value=\"" .$ModelGroup->getKey(). "\" id=\"gpr-" .$ModelGroup->getKey(). "\">" .$ModelGroup->getDescription(). "</option>\n";
}
?>
                            </select>
                            <div class="invalid-feedback">
                                Please, fill this correctly!
                            </div>
                        </div>
<?php
    if (!$bTerms) {
        echo '<div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="terms" id="terms" onclick="onClickTerms()">
                            
                            <label class="form-check-label" for="terms">
                                Yes, I accept <a href="terms">the terms of use</a>.
                            </label>
                        </div>';
    }
    
    echo '<div class="form-group text-center mt-3">
              <button type="submit" ' .(!$bTerms ? 'disabled' : ''). ' class="btn btn-primary rounded-0 btn-lg" id="btn-workout-generate">Generate My Workout!</button>
          </div>';
?>
                    </div>
                </div>
            </form>
            <form id="form-workout-seach" class="needs-validation" novalidate>
                <div class="card w-100 mx-auto mt-3 text-dark bg-light">
                    <div class="card-header">
                        <h4>Find an existing workout:</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="hidden" name="terms" value="1">
                            <input type="text" name="w" <?= (!$bTerms ? 'disabled' : '');  ?> class="form-control bg-light form-input" id="workout-search" maxlength="5" required placeholder="Example: LrWp6">
                            <div class="input-group-append">
                                <button class="btn btn-primary" <?= (!$bTerms ? 'disabled' : '');  ?> id="btn-workout-search">Seach</button>
                            </div>
                            <div class="valid-feedback">
                                Ok.
                            </div>
                            <div class="invalid-feedback">
                                Please, fill this correctly!
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
        $sHtml = ob_get_contents();
        ob_end_clean();
        
        return $sHtml;
    }
    
}
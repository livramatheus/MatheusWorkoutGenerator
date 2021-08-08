<?php
namespace Mwg\View;

use Mwg\Model\ModelWorkout;

/**
 * View Workout Class
 * @since 30/03/2020
 * @author Matheus do Livramento
 */
class ViewWorkout {
    
    private ModelWorkout $ModelWorkout;
    
    public function setModelWorkout(ModelWorkout $ModelWorkout) {
        $this->ModelWorkout = $ModelWorkout;
    }
    
    /**
     * Returns an error message to be displayed full screen when not using ajax
     * when a workout key is sent via get
     * @return string Full screen error message
     */
    public function generateNotFoundWorkoutErrorMessage() : string {
        ob_start();
        
        echo '
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="jumbotron">
                            <div class="container">
                                <h1 class="display-4">No!</h1>
                                <p class="lead">Workout <strong>' .$this->ModelWorkout->getKey(). '</strong> does not exist!</p>
                                <a href="../home" class="btn btn-primary">Go Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        
        $sHtml = ob_get_contents();
        ob_end_clean();
        
        return $sHtml;
    }
    
    /**
     * Returns a table with the workout
     * @return string A workout table
     */
    public function generateWorkoutTable() : string {
        ob_start();
?>
<div class="container align-middle">
    <div class="row">
                <div class="col-12">
                    <div class="card w-100 mt-3 mx-auto bg-light">
                        <div class="card-header">
                            <span class="font-weight-bold h3 align-middle">This is the workout:  
                                <span id="workout-key"><?= $this->ModelWorkout->getKey()."\n"; ?></span>
                            </span>
                            <i class="material-icons align-middle" id="btn-workout-copy-key" style="cursor: pointer">content_copy</i>
                            <span class="badge badge-info align-middle">
                                <?= ($this->ModelWorkout->getSeenCount() == 1 ? 'Brand new' : 'Seen ' .$this->ModelWorkout->getSeenCount(). ' times'); ?>
                            </span>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover my-0">
                                <tbody>
            <?php
                foreach ($this->ModelWorkout->getWorkoutExercise() as $iKey => $oWorkoutExercise) {
                    $sRow = "";
                    
                    if ($oWorkoutExercise->getUsesStimulus()) {
                        $sRow .= '    <tr>';
                        $sRow .= '        <td>' .$oWorkoutExercise->getSeries(). ' ' ;
                        $sRow .=              'series of '. $oWorkoutExercise->getRep() . ' reps ';
                        $sRow .=              'of '.$oWorkoutExercise->getExercise()->getDescription(). ' ';
                        $sRow .=              '    <span class="underlined-text" data-toggle="modal" data-target="#modal_info" '; 
                        $sRow .=                   'data-stimulusexplanation="' .$oWorkoutExercise->getStimulus()->getExplanation(). '"'; 
                        $sRow .=                   'data-stimulusdescription="' .$oWorkoutExercise->getStimulus()->getDescription(). '">';
                        $sRow .=                       $oWorkoutExercise->getStimulus()->getDescription();
                        $sRow .=                   '</span>';
                        $sRow .= '        </td>';
                        $sRow .= '    </tr>';
                    } else {
                        $sRow .= '    <tr>';
                        $sRow .= '        <td>' .$oWorkoutExercise->getSeries(). ' ';
                        $sRow .=              'series of '. $oWorkoutExercise->getRep() . ' reps ';
                        $sRow .=              'of '.$oWorkoutExercise->getExercise()->getDescription();
                        $sRow .= '        </td>';
                        $sRow .= '    </tr>';
                    }
                    echo $sRow;
                }
            ?>
                    </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="home" class="btn rounded-0 btn-primary">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
        $sHtml = ob_get_contents();
        ob_end_clean();
        
        return $sHtml;
    }
    
    /**
     * Returns upper screen popup when seaching a workout via ajax
     * @return string HTML of popup
     */
    public function generateNotFoundWorkout() : string {
        ob_start();
        
        echo '
                <div class="container align-middle">
                    <div class="row">
                        <div class="col-12">
                            <div class="card w-50 mx-auto">
                                <div class="card-header">
                                    <h3>No!</h3>
                                </div>
                                <div class="card-body">
                                    The workout <span class="font-weight-bold">' .$this->ModelWorkout->getKey(). '</span> does not exist!
                                </div>
                                <div class="card-footer">
                                    <a href="generate">Go Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        
        $sHtml = ob_get_contents();
        ob_end_clean();
        
        return $sHtml;
    }
}

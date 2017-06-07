<?php

class StepsPanel {

    /**
     * this class is responsable for building the steps for achievement panel.
     */
    public function __construct($ambitionId, $ambitionUser) {
        require '../config.php';
        $grammarArray = $g->getGrammarStepsPanel();
        $activeUser = $_SESSION['id'];
        $stepCtr = new StepCtr();
        $steps = $stepCtr->findByAmbition($ambitionId);
        
        $newStep = '<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" onclick=\'newStep(' . $ambitionId . ', inputStep.value, ' . $ambitionUser . ')\'>
                        <i class="material-icons">playlist_add</i>
                    </button>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="text" id="inputStep" placeholder="'.$grammarArray[1].'" required="">
                    </div>';
               
        /*
         * If there are no steps, print just the form
         * Else, print the form and the steps
         */
        if ($steps == null) {
            //if the active user is the ambition's owner
            if ($activeUser == $ambitionUser) {
                echo $newStep;                
            }
            //if it's another user
            else {
                echo '<div>' . $grammarArray[2] . '</div>';                
            }
        } else {
            //if the active user is the ambition's owner
            if ($activeUser == $ambitionUser) {
                echo $newStep;                
                for ($i = 0; $i < count($steps); $i++) {
                    echo $steps[$i];
                }
            }
            //if it's another user
            else {
                for ($i = 0; $i < count($steps); $i++) {
                    echo $steps[$i];
                }                
            }
        }
    }

}

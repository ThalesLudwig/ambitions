<?php

class CommentPanel {
    /**
     * this class is responsable for building the comments panel.
     */
    
    
    public function __construct($ambitionId,$ambitionOwner){
        require '../config.php';
        $grammarArray = $g->getGrammarCommentsPanel();
        $commentCtr = new CommentCtr();        
        $comments = $commentCtr->findByAmbition($ambitionId);
        
        $newComment =  '<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" onclick=\'newComment('.$ambitionId.', '.$ambitionOwner.', inputComment.value)\'>
                            <i class="material-icons">person_add</i>
                        </button>
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" id="inputComment" placeholder="'.$grammarArray[1].'" required="">
                        </div>';        
        
        /*
         * If there are no comments, print the form and "no comments"
         * Else, print the form and the comments
         */
        if ($comments == null){
            echo $newComment;
            echo '<br>';
            echo '<br>'.$grammarArray[2];
        }
        else {
            echo $newComment;            
            for ($i=0; $i<count($comments); $i++){
                echo $comments[$i];
            }
        }
    }
    
}




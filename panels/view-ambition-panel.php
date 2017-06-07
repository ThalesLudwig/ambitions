<?php

session_start();
require '../config.php';
$grammarArray = $g->getGrammarViewAmbition();

clearstatcache();

$ambId = $_GET['ambId'];
$ambUser = $_GET['ambUser'];

//finds the ambition owner
$userCtr = new UserCtr();
$owner = $userCtr->findById($ambUser);

//finds the ambition
$ambCtr = new AmbitionCtr();
$ambition = $ambCtr->findByAmbId($ambId);

//defines if the fields will be editible or not
if ($_SESSION['id'] != $ambUser) {
    $readOnly = 'disabled';
} else {
    $readOnly = '';
}

//gets the ambition state
$ambState = $ambition->getCompleted();
switch ($ambState) {
    case 0:
        $ambStateText = $grammarArray[11];
        break;
    case 1:
        $ambStateText = $grammarArray[9];
        break;
    case 2:
        $ambStateText = $grammarArray[12];
        break; 
}

//gets the ambition achievement date
$achievementDate = $ambition->getEndDateFormat();
if ($achievementDate == '00/00/0000') {
    $achievementDate = 'dd/mm/yyyy';
}





//---------------- STARTS DRAWING ------------------



//COVER IMAGE
$ambImageExists = file_exists('../images/pics_ambitions/' . $ambId . '.jpg');
//if the ambition has an image
if ($ambImageExists == 1) {
    echo '<div class="amb-cover-pic" style="background-image: url(\'../..//images/pics_ambitions/' . $ambId . '.jpg\')"></div>';
} else {
    //put a random image    
    $randomDefaultPic = 'default' . mt_rand(1, 4);
    echo '<div class="amb-cover-pic" style="background-image: url(\'../..//images/pics_ambitions/' . $randomDefaultPic . '.jpg\')"></div>';
}


//CONTENT WRAPPER
// -- only adds a padding
echo '<div id="view-ambition-panel-wrapper">';

    
    //HEADER 
    // -- Big Title, ChangeCover button, Profile Pic
    echo '<div id="view-ambition-panel-header">';
        echo '<div class="img-circle amb-profile-pic-panel" style="background-image: url(\'../../images/pics_profile/'.$owner->getProfilePic().'\');"></div>';
    
    if ($_SESSION['id'] == $ambUser) {
        echo '<form name="formAmbImage" id="formAmbImage" method="POST" action="../../actions/edit-ambition-image-action.php" enctype="multipart/form-data">';
            echo '<label class="custom-file-upload mdl-button mdl-js-button mdl-button--raised mdl-button--colored">                    
                        <input name="inputAmbImage" type="file" onchange="uploadAmbImage(' . $ambId . ',' . $ambUser . ');"/>
                        '.$grammarArray[13].'
                   </label><br>';
        echo '</form>';
    } else {
        echo '<br><br>';
    }
    echo '</div>';




    //BODY CONTENT
    // -- Title, Description, Creation date, Achievement date
    echo '<div id="view-ambition-panel-body">';
        echo '<div class="">
                <input class="mdl-textfield__input view-ambition-panel-body-title" name="AmbViewTitle"  type="text" id="AmbViewTitle" value="' . $ambition->getTitle() . '" ' . $readOnly . ' placeholder="' . $grammarArray[1] . '">            
              </div>';
        echo '<br><br>';
        echo '<div class="">
                <textarea class="mdl-textfield__input view-ambition-panel-body-desc" type="text" rows="7" id="AmbViewDescription" name="AmbViewDescription" ' . $readOnly . ' placeholder="' . $grammarArray[2] . '"> ' . $ambition->getDescription() . '</textarea>
              </div>';
        echo '<h5>' . $grammarArray[10] . '</h5>';
        echo '<div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" name="AmbViewDate"  type="text" id="AmbViewDate" value="' . $ambition->getDateFormat() . '" readOnly>            
              </div>';
        echo '<h5>' . $grammarArray[3] . '</h5>';
        echo '<div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" name="AmbViewAchieveDate" value="'.$achievementDate.'" type="text" id="AmbViewAchieveDate" '.$readOnly.' onclick="setDateMask()">            
              </div>';
        echo '<br>';
        //tests if the ambition is yours and prints or not the buttons
        if ($_SESSION['id'] == $ambUser) {
            echo '<button class="amb-button-update mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick=\'editAmbition("' . $ambition->getId() . '")\'>' . $grammarArray[5] . '</button>';
            echo '&nbsp&nbsp&nbsp';
            echo '<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick=\'deleteAmbition("' . $ambition->getId() . '")\'>' . $grammarArray[6] . '</button>';
        }
    echo '</div>';



    //HR DIVISOR
    echo '<div class="view-ambition-panel-divisor">';
        echo '<hr>';        
    echo '</div>';
    
    
    
    //AMBITION STATE SELECT
    if ($_SESSION['id'] == $ambUser) {
        echo '<select id="view-ambition-dropdown" class="mdl-textfield mdl-js-textfield" onchange="changeAmbState('.$ambId.')">
                    <option value="0">&nbsp;&nbsp;'.$ambStateText.'</option>
                    <option disabled="disabled">────────────</option>
                    <!--<option disabled role=separator>-->
                    <option value="0">&nbsp;&nbsp;'.$grammarArray[11].'</option>                
                    <option value="1">&nbsp;&nbsp;'.$grammarArray[9].'</option>                
                    <option value="2">&nbsp;&nbsp;'.$grammarArray[12].'</option>        
                </select>';    
    }
    
    
    
    //AMBITION PROGRESS
    $ambProgress = $ambCtr->checkProgress($ambId);
    echo '<div class="label-amb-progress">Progresso: '.$ambProgress.'%</div>';


    
    //STEPS PANEL
    echo '<div id="view-ambition-panel-steps">';
    echo '<h5>' . $grammarArray[7] . '</h5>';
    echo '<div id="steps-panel">';
    $stepsPanel = new StepsPanel($ambId, $ambUser);
    echo '</div>';
    echo '</div>';
    echo '<br><br><br>';


    
    //COMMENTS PANEL
    echo '<div id="view-ambition-panel-comments">';
    echo '<h5>' . $grammarArray[8] . '</h5>';
    echo '<div id="comments-panel">';
    $commentPanel = new CommentPanel($ambId, $ambUser);
    echo '</div>';
    echo '</div>';

    
    
echo '</div>'; //end of wrapper
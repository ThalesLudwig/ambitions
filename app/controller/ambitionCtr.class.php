<?php

class AmbitionCtr {

    private $dao;

    public function __construct() {
        $this->dao = new AmbitionDao();
    }

    public function __destruct() {
        unset($this->dao);
    }

    public function save($user, $title) {
        //returns 1 for success, 0 for failure
        $query = $this->dao->insert("owner, title, description, achieved, completed, start_date, end_date, priority", "$user,'$title','Description', 0, 0, now(),'0000-00-00', 1");
        return $query;
    }

    public function update($id, $title, $description, $achieveDate) {
        $query = $this->dao->update("title='" . $title . "', description='" . $description . "', end_date='".$achieveDate."'", "id=" . $id);
        //returns 1 for success, 0 for failure        
        return $query;
    }

    public function updateAchieved($id, $state) {
        $query = $this->dao->update("completed='" . $state . "'", "id=" . $id);
        //returns 1 for success, 0 for failure        
        return $query;
    }

    public function findAchieved($ambId) {
        $this->dao->find("*", "id='$ambId'");
        $row = $this->dao->getRecordSet();

        for ($i = 0; $i < count($row); $i++) {
            $ambCompleted = $row[$i]["completed"];
        }
        if ($ambCompleted == null) {
            return null;
        } else {
            return $ambCompleted;
        }
    }

    public function findAmbitions($user) {
        $this->dao->find("*", "owner='$user' ORDER BY start_date DESC");
        $row = $this->dao->getRecordSet();
        $ambitions = array();

        for ($i = 0; $i < count($row); $i++) {
            $ambId = $row[$i]["id"];
            $ambUser = $row[$i]["owner"];
            $ambTitle = $row[$i]["title"];
            $ambDesc = $row[$i]["description"];
            $ambCompleted = $row[$i]["completed"];
            $start_date = $row[$i]["start_date"];
            $end_date = $row[$i]["end_date"];
            $priority = $row[$i]["priority"];
            $ambition = new Ambition($ambId, $ambUser, $ambTitle, $ambDesc, $ambCompleted, $start_date, $end_date, $priority);
            $ambitionString = $ambition->build();
            //if the object ambtion is put directly into the array, there is a bug... I had to pass the string instead
            $ambitions[$i] = $ambitionString;
        }
        if ($ambitions == null) {
            return null;
        } else {
            //$ambitionsReversed = array_reverse($ambitions, FALSE);
            return $ambitions;
        }
    }
    
    public function findAmbitionsByState($user, $completed) {
        $this->dao->find("*", "owner='$user' AND completed=".$completed);
        $row = $this->dao->getRecordSet();
        $ambitions = array();

        for ($i = 0; $i < count($row); $i++) {
            $ambId = $row[$i]["id"];
            $ambUser = $row[$i]["owner"];
            $ambTitle = $row[$i]["title"];
            $ambDesc = $row[$i]["description"];
            $ambCompleted = $row[$i]["completed"];
            $start_date = $row[$i]["start_date"];
            $end_date = $row[$i]["end_date"];
            $priority = $row[$i]["priority"];
            $ambition = new Ambition($ambId, $ambUser, $ambTitle, $ambDesc, $ambCompleted, $start_date, $end_date, $priority);
            $ambitionString = $ambition->build();
            //if the object ambtion is put directly into the array, there is a bug... I had to pass the string instead
            $ambitions[$i] = $ambitionString;
        }
        if ($ambitions == null) {
            return null;
        } else {
            $ambitionsReversed = array_reverse($ambitions, FALSE);
            return $ambitionsReversed;
        }
    }

    public function findByAmbId($ambId) {
        $this->dao->find("*", "id='$ambId'");
        $row = $this->dao->getRecordSet();
        for ($i = 0; $i < count($row); $i++) {
            $ambId = $row[$i]["id"];
            $ambUser = $row[$i]["owner"];
            $ambTitle = $row[$i]["title"];
            $ambDesc = $row[$i]["description"];
            $ambCompleted = $row[$i]["completed"];
            $start_date = $row[$i]["start_date"];
            $end_date = $row[$i]["end_date"];
            $priority = $row[$i]["priority"];
            $ambition = new Ambition($ambId, $ambUser, $ambTitle, $ambDesc, $ambCompleted, $start_date, $end_date, $priority);
        }
        if ($ambition == null) {
            return null;
        } else {
            return $ambition;
        }
    }

    public function getFriendList($userId) {
        $bondCtr = new BondCtr();
        $friendsList = $bondCtr->findByUser($userId);
        $friendsString = "";
        //creates the query string with all the user's friends
        for ($i = 0; $i < count($friendsList); $i++) {
            //check if this user is private
            $userCtr = new UserCtr();
            $user = $userCtr->findById($friendsList[$i]);
            $isPrivate = $user->getPrivate();
            if ($isPrivate == 0) {
                //if is not private
                $friendsString = $friendsString . " OR user=" . $friendsList[$i];
            }
        }
        return $friendsString;
    }

    public function deleteById($id) {
        //deletes the steps in this Ambition
        $stepCtr = new StepCtr();
        $stepsArray = $stepCtr->findForDeletion($id);
        if ($stepsArray != null) {
            for ($j = 0; $j < count($stepsArray); $j++) {
                //delete the steps
                $stepCtr->deleteById($stepsArray[$j]);
            }
        }
        //deletes the comments in this Ambition
        $commentCtr = new CommentCtr();
        $commentsArray = $commentCtr->findForDeletion($id);
        if ($commentsArray != null) {
            for ($j = 0; $j < count($commentsArray); $j++) {
                //delete the steps
                $commentCtr->deleteById($commentsArray[$j]);
            }
        }
        //deltes the ambition
        $clause = 'id='.$id;
        $q = $this->dao->delete($clause);
        return $q;
    }

    public function deleteAllbyUser($user) {
        $this->dao->find("*", "owner='$user'");
        $row = $this->dao->getRecordSet();
        $stepCtr = new StepCtr();
        $commentCtr = new CommentCtr();

        for ($i = 0; $i < count($row); $i++) {
            //returns an array with the id of all steps in this ambition
            $stepsArray = $stepCtr->findForDeletion($row[$i]["id"]);
            if ($stepsArray != null) {
                for ($j = 0; $j < count($stepsArray); $j++) {
                    //delete the steps
                    $stepCtr->deleteById($stepsArray[$j]);
                }
            }
            //delete the ambition
            $this->deleteById($row[$i]["id"]);
        }
    }

    public function printWelcomeCard() {
        $country = $_SESSION['location'];

        if ($country != 'BR') {
            echo '<div class="mdl-card mdl-shadow--2dp panel-first-time">'
            . '<h3>Hey, you!</h3>'
            . '<br>'
            . '<p>Your home page looks really empty. You can start creating Ambitions! Don\'t be shy. If you are out of ideas, try following some people, they have objectives too! You can search for people by clicking on the <font color="blue">magnifying glass</font> icon on the top of this page</p>'
            . '<p>Also, remember to check your <a href="edit-profile.php" style="color: red">Edit Profile</a> page and upload a nice cover picture and a profile picture!</p>'            
            . '<br>'
            . '<h4>What do I do now?</h4>'
            . '<br>'
            . '<p>See the text box above? You can create Ambitions on it. Write your objectives, like "travel to London" or "finish the math homework".</p>'
            . '<p>After creating, click on the Ambition\'s name or on the magnifying glass icon to open the Ambition\'s panel. There you can add a cover image, description, steps for completion, and more!</p>'
            . '<p>For more information, please visit the <a href="help.php" style="color: red">Contact and Help</a> page.</p>'
            . '</div>';
        } else {
            echo '<div class="mdl-card mdl-shadow--2dp panel-first-time">'
            . '<h3>Ei, você!</h3>'
            . '<br>'
            . '<p>Sua página principal parece bem vazia. Você pode começar criando Ambições! Não seja tímido. Se estiver sem ideias, tente seguir algumas pessoas, elas também tem objetivos! Você pode pesquisar por pessoas clicando no <font color="blue">ícone da lupa</font> no topo desta página.</p>'
            . '<p>Também, lembre-se de checar sua página de <a href="edit-profile.php" style="color: red">Editar Perfil</a> e coloque uma foto de capa legal e uma foto de perfil!</p>'
            . '<br>'
            . '<h4>O que eu faço agora?</h4>'
            . '<br>'
            . '<p>Está vendo essa caixa de texto acima? Você pode criar Ambições nela. Escreva seus objetivos, como "viajar para Londres" ou "terminar trabalho de matemática".</p>'
            . '<p>Após criar, clique no nome da sua Ambição ou no ícone da lupa para abrir o painel da Ambição. Nele você pode adicionar uma imagem de capa, descrição, etapas, e mais!</p>'
            . '<p>Para saber mais, visite a página de <a href="help.php" style="color: red">Contato e Ajuda</a>.</p>'
            . '</div>';
        }
    }

    public function checkIfEmptyHome($userId) {
        //FIND all ambitions WHERE userId is the active user
        $this->dao->find("*", "owner='$userId'");
        $row = $this->dao->getRecordSet();
        $ambitions = array();
        
        for ($i = 0; $i < count($row); $i++) {
            $ambitions[$i] = $row[$i]["id"];
        }
        
        if ($ambitions == null) {
            $this->printWelcomeCard();
        } else {
            $this->printAmbitions($userId);
        }
    }

    function printAmbitions($id) {
        $ambList = $this->findAmbitions($id);
        if (!$ambList == null) {
            for ($i = 0; $i < count($ambList); $i++) {
                echo $ambList[$i];
            }
        } else {
            echo '<div id="noPosts" align="center">There are no Ambitions.</div>';
        }
    }
    
    function printAmbitionsByStatus($id, $completed) {
        $ambList = $this->findAmbitionsByState($id, $completed);
        if (!$ambList == null) {
            for ($i = 0; $i < count($ambList); $i++) {
                echo $ambList[$i];
            }
        } else {
            echo '<div id="noPosts" align="center">There are no Ambitions.</div>';
        }
    }
    
    public static function checkProgress($ambitionId) {
        $stepCtr = new StepCtr();
        $steps = $stepCtr->findByAmbitionAsArray($ambitionId);
        
        $stepsCount = count($steps);
        $completedStepsCount = 0;
        
        //the index 3 is the amb status
        for ($i = 0; $i < count($steps); $i++) {
          $completed = $steps[$i][3];          
          if ($completed == 1) {
             $completedStepsCount = $completedStepsCount + 1;
          }
        }        
        if ($stepsCount==0 || $completedStepsCount==0) {
            return 0;
        }        
        else {
            //completedSteps * 100 / allSteps
            $progress = ($completedStepsCount*100)/$stepsCount;
            //if 100%, set the ambition as achieved
            $ambCtr = new AmbitionCtr();
            if ((int) $progress==100) {
                //achieved
                $ambCtr->updateAchieved($ambitionId, 1);
            }
            else {
                //in progress
                $ambCtr->updateAchieved($ambitionId, 2);
            }
            return (int) $progress;
        }
    }
    

}

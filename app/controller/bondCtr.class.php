<?php

class BondCtr {

    private $dao;

    public function __construct() {
        $this->dao = new BondDao();
    }

    public function __destruct() {
        unset($this->dao);
    }

    public function save($user, $friend) {
        /* verifies if the bond is already saved on DB */
        $linha = $this->dao->find("*", "user='$user' AND friend='$friend'");
        if ($linha == 1) {
            //register already exists
        } else {
            $query = $this->dao->insert(
                    "user, friend", "'$user','$friend'");
        }
        return $linha;
    }

    public function deleteById($id) {
        $linha = 'id=' . $id;
        $q = $this->dao->delete($linha);
        return $q;
    }

    public function deleteAllbyUser($user){
        //delete the people this user is following
        $this->dao->find("*","user='$user'");
        $row = $this->dao->getRecordSet();
        for ( $i = 0; $i < count($row);  $i++ ){
            $this->deleteById($row[$i]["id"]);            	
        }
        //delete who's following back
        $this->dao->find("*","friend='$user'");
        $row = $this->dao->getRecordSet();
        for ( $i = 0; $i < count($row);  $i++ ){
            $this->deleteById($row[$i]["id"]);            	
        }
    }
    
    public function findBetweenUserFriend($user, $friend) {
        $this->dao->find("*", "user='" . $user . "' AND friend='" . $friend . "'");
        $row = $this->dao->getRecordSet();
        $bond = NULL;
        for ($i = 0; $i < count($row); $i++) {
            $bond[$i] = $row[$i]["id"];
        }
        if (!$bond == null) {
            return $bond;
        } else {
            return null;
        }
    }

    public function findByUser($user) {
        $this->dao->find("*", "user='$user'");
        $row = $this->dao->getRecordSet();
        $matches = array();
        for ($i = 0; $i < count($row); $i++) {
            //returns the names of his team friends
            $matches[$i] = $row[$i]["friend"];
        }
        if (!$matches == null) {
            return $matches;
        } else {
            return null;
        }
    }

    public function findByFriend($user) {
        $this->dao->find("*", "friend='$user'");
        $row = $this->dao->getRecordSet();
        $matches = array();
        for ($i = 0; $i < count($row); $i++) {
            //returns the names of his team friends
            $matches[$i] = $row[$i]["user"];
        }
        if (!$matches == null) {
            return $matches;
        } else {
            return null;
        }
    }

    //prints the users you are following
    public function showFollowing($id) {
        require '../../config.php';
        $grammarArray = $g->getGrammarBondCtr();
        
        try {
            $resultList = $this->findByUser($id);
            $userCtr = new UserCtr();
            $resultUser = null;
            //printing the result count
            if (count($resultList) > 0) {
                echo '&nbsp&nbsp&nbsp ' . $grammarArray[1] . ' ' . count($resultList) . ' ' . $grammarArray[2] . ': <br><br>';
            }
            //printing the list
            for ($i = 0; $i < count($resultList); $i++) {
                $resultUser = $userCtr->findById($resultList[$i]);
                $resultUserName = $resultUser->getName();
                $resultUserSurname = $resultUser->getSurname();
                $resultUserPhoto = $resultUser->getProfilePic();
                //if the user is yourself, link to the profile page
                if ($resultList[$i] == $_SESSION['id']) {
                    echo '<div id="team-body" class="panel-body">';
                    echo "<a href='home'><img class='img-circle' src='../../images/pics_profile/" . $resultUserPhoto . "' style='width:50px;'></a>";
                    echo '&nbsp&nbsp&nbsp';
                    echo "<a href='home' style='color: black; font-size: 15px;'>" . $resultUserName . " " . $resultUserSurname . "</a>";
                    echo '</div>';
                } else {
                    echo '<div id="team-body" class="panel-body">';
                    echo "<a href='user?id=" . $resultList[$i] . "'><img class='img-circle' src='../../images/pics_profile/" . $resultUserPhoto . "' style='width:50px;'></a>";
                    echo '&nbsp&nbsp&nbsp';
                    echo "<a href='user?id=" . $resultList[$i] . "' style='color: black; font-size: 15px;'>" . $resultUserName . " " . $resultUserSurname . "</a>";
                    echo '</div>';
                }
            }
        } catch (Exception $ex) {
            echo 'Sorry, I found an error.';
        }
        if ($resultUser == NULL) {
            echo '<div>' . $grammarArray[3] . '</div>';
        }
    }

    //prints the followers
    public function showFollowers($id) {
        require '../../config.php';
        $grammarArray = $g->getGrammarBondCtr();
        
        try {
            $resultList = $this->findByFriend($id);
            $userCtr = new UserCtr();
            $resultUser = null;
            //printing the result count
            if (count($resultList) > 0) {
                echo '&nbsp&nbsp&nbsp ' . count($resultList) . ' ' . $grammarArray[4] . ': <br><br>';
            }
            //printing the list
            for ($i = 0; $i < count($resultList); $i++) {
                $resultUser = $userCtr->findById($resultList[$i]);
                $resultUserName = $resultUser->getName();
                $resultUserSurname = $resultUser->getSurname();
                $resultUserPhoto = $resultUser->getProfilePic();
                //if the user is yourself, link to the profile page
                if ($resultList[$i] == $_SESSION['id']) {
                    echo '<div id="team-body" class="panel-body">';
                    echo "<a href='home'><img class='img-circle' src='../../images/pics_profile/" . $resultUserPhoto . "' style='width:50px;'></a>";
                    echo '&nbsp&nbsp&nbsp';
                    echo "<a href='home' style='color: black; font-size: 15px;'>" . $resultUserName . " " . $resultUserSurname . "</a>";
                    echo '</div>';
                } else {
                    echo '<div id="team-body" class="panel-body" >';
                    echo "<a href='user?id=" . $resultList[$i] . "'><img class='img-circle' src='../../images/pics_profile/" . $resultUserPhoto . "' style='width:50px;'></a>";
                    echo '&nbsp&nbsp&nbsp';
                    echo "<a href='user?id=" . $resultList[$i] . "' style='color: black; font-size: 15px;'>" . $resultUserName . " " . $resultUserSurname . "</a>";
                    echo '</div>';
                }
            }
        } catch (Exception $ex) {
            echo 'Sorry, I found an error.';
        }
        if ($resultUser == NULL) {
            echo '<div>' . $grammarArray[3] . '</div>';
        }
    }

}

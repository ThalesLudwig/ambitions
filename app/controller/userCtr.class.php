<?php

class UserCtr {

    private $dao;

    public function __construct() {
        $this->dao = new UserDao();
    }

    public function __destruct() {
        unset($this->dao);
    }

    public function save($name, $surname, $password, $email) {
        /* verifies if the user is already saved on DB */
        $result = $this->dao->find("*", "email='$email'");
        if ($result == 1) {
            return 0;
        } else {
            //saves the user, returns 1 for success, 0 for failure
            $query = $this->dao->insert(
                    "name, surname, password, email, pic_profile, private", "'$name','$surname','$password','$email','default.jpg',0");
            return $query;
        }
    }

    public function findByEmailAndPass($inputEmail, $inputPass) {
        $this->dao->find("*", "email='$inputEmail' AND password='$inputPass'");
        $row = $this->dao->getRecordSet();
        $user = null;
        for ($i = 0; $i < count($row); $i++) {
            $userId = $row[$i]["id"];
            $userName = $row[$i]["name"];
            $userSurname = $row[$i]["surname"];
            $userPass = $row[$i]["password"];
            $userEmail = $row[$i]["email"];
            $userProfilePic = $row[$i]["pic_profile"];
            $userCoverPìc = $row[$i]["pic_cover"];
            $userPrivate = $row[$i]["private"];
            $user = new User($userId, $userName, $userSurname, $userPass, $userEmail, $userProfilePic, $userCoverPìc, $userPrivate);
        }
        if (!$user == null) {
            return $user;
        } else {
            return null;
        }
    }

    public function findByEmail($email) {
        $this->dao->find("*", "email='$email'");
        $row = $this->dao->getRecordSet();
        $user = null;
        for ($i = 0; $i < count($row); $i++) {
            $userId = $row[$i]["id"];
            $userName = $row[$i]["name"];
            $userSurname = $row[$i]["surname"];
            $userPass = $row[$i]["password"];
            $userEmail = $row[$i]["email"];
            $userProfilePic = $row[$i]["pic_profile"];
            $userCoverPìc = $row[$i]["pic_cover"];
            $userPrivate = $row[$i]["private"];
            $user = new User($userId, $userName, $userSurname, $userPass, $userEmail, $userProfilePic, $userCoverPìc, $userPrivate);
        }
        if (!$user == null) {
            return $user;
        } else {
            return null;
        }
    }

    public function findById($id) {
        $this->dao->find("*", "id='$id'");
        $row = $this->dao->getRecordSet();
        $user = null;
        for ($i = 0; $i < count($row); $i++) {
            $userId = $row[$i]["id"];
            $userName = $row[$i]["name"];
            $userSurname = $row[$i]["surname"];
            $userPass = $row[$i]["password"];
            $userEmail = $row[$i]["email"];
            $userPhoto = $row[$i]["pic_profile"];
            $userCover = $row[$i]["pic_cover"];
            $userPoints = $row[$i]["private"];
            $user = new User($userId, $userName, $userSurname, $userPass, $userEmail, $userPhoto, $userCover, $userPoints);
        }
        if (!$user == null) {
            return $user;
        } else {
            return null;
        }
    }

    public function findByName($name) {
        $this->dao->find("*", "name LIKE '%$name%'");
        $row = $this->dao->getRecordSet();
        $options = "";
        for ($i = 0; $i < count($row); $i++) {
            $options[$i] = $row[$i]["id"];
        }
        if (!$options == null) {
            return $options;
        } else {
            return null;
        }
    }

    public function findSearchBar($name) {
        //gets the first 7 users containing the inputed chars in his name
        $this->dao->find("*", "name LIKE '%$name%' ORDER BY name DESC LIMIT 7");
        $row = $this->dao->getRecordSet();
        session_start();
        $options = "";
        for ($i = 0; $i < count($row); $i++) {
            //if the user found is not yourself
            if ($row[$i]["id"] != $_SESSION['id']) {
                $options[$i] = array(
                    'id' => $row[$i]["id"],
                    'name' => $row[$i]["name"],
                    'surname' => $row[$i]["surname"],
                    'photo' => $row[$i]["pic_profile"],
                );
            }
        }
        $json_row = json_encode($options);
        if (!$options == null) {
            return $json_row;
        } else {
            return null;
        }
    }
    
    public function findAll() {
        $this->dao->find("*", "");
        $row = $this->dao->getRecordSet();
        $options = "";
        for ($i = 0; $i < count($row); $i++) {
            $options[$i] = array(
                'id' => $row[$i]["id"],
                'name' => $row[$i]["name"],
                'surname' => $row[$i]["surname"],
                'password' => $row[$i]["password"],
                'email' => $row[$i]["email"],
                'pic_profile' => $row[$i]["pic_profile"],
                'pic_cover' => $row[$i]["pic_cover"],
                'private' => $row[$i]["private"],
            );
        }        
        if (!$options == null) {
            return $options;
        } else {
            return null;
        }
    }

    public function deleteById($id) {
        $clause = 'id=' . $id;
        $q = $this->dao->delete($clause);
        return $q;
    }

    public function updatePrivate($id, $private) {
        $query = $this->dao->update("private=" . $private, "id=" . $id);
        //returns 1 for success, 0 for failure
        return $query;
    }

    public function updatePassword($id, $pass) {
        $query = $this->dao->update("password='" . $pass . "'", "id=" . $id);
        //returns 1 for success, 0 for failure
        return $query;
    }

    public function updateCover($id, $cover) {
        $query = $this->dao->update("pic_cover=" . "'" . $cover . "'", "id=" . $id);
        //returns 1 for success, 0 for failure
        return $query;
    }

    public function updateName($id, $name) {
        $query = $this->dao->update("name=" . "'" . $name . "'", "id=" . $id);
        //returns 1 for success, 0 for failure
        return $query;
    }

    public function updateSurname($id, $surname) {
        $query = $this->dao->update("surname=" . "'" . $surname . "'", "id=" . $id);
        //returns 1 for success, 0 for failure
        return $query;
    }

    public function updateProfilePic($id, $photo) {
        $query = $this->dao->update("pic_profile=" . "'" . $photo . "'", "id=" . $id);
        //returns 1 for success, 0 for failure
        return $query;
    }

}

<?php

session_start();
require '../config.php';

if (isset($_POST["btnChangePassword"])) {
    try {
        $activePass = $_POST['inputActivePassword'];
        $newPass = $_POST['inputNewPassword'];
        $confirmPass = $_POST['inputConfirmPassword'];
        
        //confirm if the password typed is the same as the current password
        if (md5($activePass) == $_SESSION['password']) {
            //confirm if the new password matches the confirmation
            if ($newPass == $confirmPass) {
                $passMd5 = md5($newPass);
                $userCtr = new UserCtr();
                $userCtr->updatePassword($_SESSION['id'], $passMd5);
                $_SESSION['password'] = $passMd5;
                //password changed
                header("Location: http://www.samaritan.com.br/settings?0");
            } else {
                //the new password and the confirmation do not match
                header("Location: http://www.samaritan.com.br/settings?1");
            }
        } else {
            //The active password is wrong
            header("Location: http://www.samaritan.com.br/settings?2");
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
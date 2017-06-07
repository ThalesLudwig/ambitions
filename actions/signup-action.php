<?php

/*
 * Action signup. 
 */
require '../config.php';
session_start();

if (isset($_POST['btnSignup'])) {
    $name = $_POST['inputName'];
    $surname = $_POST['inputSurname'];
    $password = $_POST['inputPassword'];
    $email = $_POST['inputEmail'];    
        
    $userCtr = new UserCtr();
    $confirmUser = $userCtr->findByEmail($email);

    //if the email is taken
    if ($confirmUser != null) {
        //send error code 'et' to signup.php
        header("Location: ../register.php?0");
    }
    //if the email is enable
    else {
        $result = $userCtr->save($name, $surname, md5($password), $email);
        //if successful
        if ($result == 1) {
            //getting the user from the DB so it can know his/hers ID
            $activeUser = $userCtr->findByEmailAndPass($email, md5($password));
            $_SESSION['id'] = $activeUser->getId();
            $_SESSION['name'] = $activeUser->getName();
            $_SESSION['surname'] = $activeUser->getSurname();
            $_SESSION['password'] = $activeUser->getPassword();
            $_SESSION['email'] = $activeUser->getEmail();
            $_SESSION['pic_profile'] = $activeUser->getProfilePic();
            $_SESSION['pic_cover'] = $activeUser->getCoverPic();
            $_SESSION['private'] = $activeUser->getPrivate();
            header('Location: ../app/view/home.php');
        } else {
            echo 'Something went wrong.';
        }
    }
}


<?php

/*
 * Logs the user in  
 */

session_start();
include '../config.php';

if (isset($_POST['btnLogin'])) {
    $inputEmail = $_POST['inputUsername'];
    $inputPass = md5($_POST['inputPassword']);    
    $userCtr = new UserCtr();
    $activeUser = $userCtr->findByEmailAndPass($inputEmail, $inputPass);

    if ($activeUser == NULL) {
        //send error code 'il' to index.php
        header("Location: ../app/view/login.php?0");
    } else {
        $_SESSION['id'] = $activeUser->getId();
        $_SESSION['name'] = $activeUser->getName();
        $_SESSION['surname'] = $activeUser->getSurname();
        $_SESSION['password'] = $activeUser->getPassword();
        $_SESSION['email'] = $activeUser->getEmail();
        $_SESSION['pic_profile'] = $activeUser->getProfilePic();
        $_SESSION['pic_cover'] = $activeUser->getCoverPic();
        $_SESSION['private'] = $activeUser->getPrivate();

        //Set cookie to last 1 year
        setcookie('id', $_SESSION['id'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('name', $_SESSION['name'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('surname', $_SESSION['surname'], time() + 60 * 60 * 24 * 365, '/');        
        setcookie('password', $_SESSION['password'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('email', $_SESSION['email'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('pic_profile', $_SESSION['pic_profile'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('pic_cover', $_SESSION['pic_cover'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('private', $_SESSION['private'], time() + 60 * 60 * 24 * 365, '/');

        header('Location: ../app/view/home.php');
    }
}


<?php

session_start();
require '../config.php';

if (isset($_POST["btnDeleteProfile"])) {
    try {
        //delete all user's ambitions
        $ambCtr = new AmbitionCtr();
        $ambCtr->deleteAllbyUser($_SESSION['id']);

        //delete user's connections
        $bondCtr = new BondCtr();
        $bondCtr->deleteAllbyUser($_SESSION['id']);
        
        //delete user's comments
        $commentCtr = new CommentCtr();
        $commentCtr->deleteAllByOwner($_SESSION['id']);
        
        //delete user's notifications
        $notificationCtr = new NotificationCtr();
        $notificationCtr->deleteAllBySenderOrReceiver($_SESSION['id']);
        
        //delete the user
        $userCtr = new UserCtr();
        $user = $userCtr->findById($_SESSION['id']);
        $userCtr->deleteById($_SESSION['id']);        
        
        //delete photos
        if ($user->getProfilePic()!= 'default.jpg') {
            fclose('../images/pics_profile/' . $_SESSION['pic_profile']);
            unlink('../images/pics_profile/' . $_SESSION['pic_profile']);
        }
        if ($user->getCoverPic()!= null) {
            fclose('../images/pics_cover/' . $_SESSION['pic_cover']);
            unlink('../images/pics_cover/' . $_SESSION['pic_cover']);
        }

        header("Location: signout.php");
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}


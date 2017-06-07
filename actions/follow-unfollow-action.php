<?php

/*
 * Action to:
 * Follow user
 * Unfollow user 
 */

session_start();
require '../config.php';
//$grammarArray = $g->getGrammarUser();

$friendId = $_GET['friendId'];


if (isset($_POST['btnUnfolow'])) {
    $bondCtr = new BondCtr();
    $bondId = $bondCtr->findBetweenUserFriend($_SESSION['id'], $friendId);
    $bondCtr->deleteById($bondId[0]);
    header('Location: http://www.samaritan.com.br/user?id=' . $friendId);
}

if (isset($_POST['btnFollow'])) {
    $notificationContent;
    //if the user is NOT Brazillian
    if ($_SESSION['location'] != 'BR') {
        $notificationContent = ' wishes to see your Ambitions.';
    } else {
        $notificationContent = ' deseja ver suas Ambições.';
    }
    //send notification    
    $notification = new NotificationCtr();
    $notificationSender = $_SESSION['id'];
    $notificationReceiver = $friendId;
    $notification->save($notificationSender, $notificationReceiver, $notificationContent, 0);

    header('Location: http://www.samaritan.com.br/user?id=' . $friendId .'&0');
}
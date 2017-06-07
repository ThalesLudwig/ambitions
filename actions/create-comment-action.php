<?php

session_start();
require '../config.php';

$ambId = $_GET['ambId'];
$content = $_GET['content'];
$ambOwner = $_GET['owner'];
$user = $_SESSION['id'];

$contentFormated = addslashes($content);
$commentCtr = new CommentCtr();
$commentCtr->save($ambId, $user, $contentFormated);

//send notification case it's not your own ambition
if ($_SESSION['id'] != $ambOwner) {    
    //getting the ambition's name    
    $ambCtr = new AmbitionCtr();
    $amb = $ambCtr->findByAmbId($ambId);
    $ambName = $amb->getTitle();
    
    if ($_SESSION['location'] != 'BR') {
        $notificationContent = ' commented on: '.$ambName;
    } else {
        $notificationContent = ' comentou em: '.$ambName;
    }        
    //manages the special chars
    $notificationContentFinal = addslashes($notificationContent);
    //sending notification
    $notification = new NotificationCtr();
    $notification->save($_SESSION['id'], $ambOwner, $notificationContentFinal, 1);    
}
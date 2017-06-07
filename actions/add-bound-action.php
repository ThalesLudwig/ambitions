<?php

/*
 * Action to:
 * Accept friend request 
 */

session_start();
require '../config.php';

$notificationId = $_GET['id'];
$receiver = $_GET['receiver'];

$notificationCtr = new NotificationCtr();
$notificationCtr->deleteById($notificationId);

$bondCtr = new BondCtr();
$bondCtr->save($receiver, $_SESSION['id']);

//Prints the notificationsPanel again
function printNotifications() {
    require '../config.php';
    $notificationCtr = new NotificationCtr();    
    $notificationsArray = $notificationCtr->findByReceiver($_SESSION['id']);
    $stringArray = '';
    for ($i = 0; $i < count($notificationsArray); $i++) {
        $stringArray = $stringArray . $notificationsArray[$i];
    }
    return $stringArray;
}

echo '<br>' . printNotifications();


//send notification
if ($_SESSION['location'] != 'BR') {
    $notificationContent = ' accepted your invitation';
} else {
    $notificationContent = ' aceitou seu convite';
}
//manages the special chars
$notificationContentFinal = addslashes($notificationContent);
//sending notification
$notification = new NotificationCtr();
$notification->save($_SESSION['id'], $receiver, $notificationContentFinal, 1);

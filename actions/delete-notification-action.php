
<?php

session_start();
require '../config.php';

$id = $_GET['id'];
//deleting the notification
$notificationCtr = new NotificationCtr();
$notificationCtr->deleteById($id);

//Prints the notificationsPanel again
function printNotifications() {
    require '../config.php';
    $notificationCtr = new NotificationCtr();
    $receiver = $_SESSION['id'];
    $notificationsArray = $notificationCtr->findByReceiver($receiver);
    $stringArray = '';

    for ($i = 0; $i < count($notificationsArray); $i++) {
        $stringArray = $stringArray . $notificationsArray[$i];
    }
    return $stringArray;
}

echo '<br>'.printNotifications();

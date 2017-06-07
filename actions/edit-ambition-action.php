
<?php
require '../config.php';

$ambId = $_GET['id'];
$ambTitle = $_GET['title'];
$ambDesc = $_GET['desc'];
$ambAchieveDate = $_GET['date'];


//gets the date in the right format
$dateArray = explode("/", $ambAchieveDate);
$day = $dateArray[0];
$month = $dateArray[1];
$year = $dateArray[2];
$dateParsed = $year.'-'.$month.'-'.$day;

//in case the user has not set a date
if ($day == 'dd' || $month = 'mm' || $year = 'yyyy') {
    $day = '00';
    $month = '00';
    $year = '0000';
}

//manages the special chars
$ambFinalTitle = addslashes($ambTitle);
$ambFinalDesc = addslashes($ambDesc);

$ambCtr = new AmbitionCtr();
$response = $ambCtr->update($ambId, $ambFinalTitle, $ambFinalDesc, $dateParsed);

header('Location: http://www.samaritan.com.br/home');

    
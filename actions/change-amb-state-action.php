<?php

session_start();
require '../config.php';

$ambId = $_GET['ambId'];
$state = $_GET['state'];

$ambCtr = new AmbitionCtr();
$ambCtr->updateAchieved($ambId, $state);
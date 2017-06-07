<?php

session_start();
require '../config.php';

$ambId = $_GET['ambId'];

$ambCtr = new AmbitionCtr();
$ambCtr->updateAchieved($ambId);
        
<?php

session_start();
require '../config.php';

$ambId = $_GET['id'];

//deleting the ambition
$ambCtr = new AmbitionCtr();
$response = $ambCtr->deleteById($ambId);

header('Location: http://www.samaritan.com.br/home');

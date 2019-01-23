<?php

session_start();
require '../config.php';

$ambId = $_GET['ambId'];
$title = $_GET['title'];

$titleFormated = addslashes($title);

$stepCtr = new StepCtr();
$stepCtr->save($ambId, $titleFormated, 0);
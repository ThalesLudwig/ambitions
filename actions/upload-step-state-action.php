<?php

session_start();
require '../config.php';

$stepId = $_GET['stepId'];
$ambId = $_GET['ambId'];

$stepCtr = new StepCtr();
$stepCtr->uploadCompleted($stepId, $ambId);
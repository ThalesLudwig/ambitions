<?php

session_start();
require '../config.php';

$stepId = $_GET['stepId'];

$stepCtr = new StepCtr();
$stepCtr->deleteById($stepId);
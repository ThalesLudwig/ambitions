<?php

$name = $_GET['name'];

require '../config.php';
$userCtr = new UserCtr();
echo $userCtr->findSearchBar($name);

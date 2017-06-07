<?php

session_start();
require '../config.php';

$commentId = $_GET['commentId'];
$commentOwner = $_GET['commentOwner'];

//remove the comment
$commentCtr = new CommentCtr();
$commentCtr->deleteById($commentId);
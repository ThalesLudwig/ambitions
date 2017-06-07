<?php

/*
 * Persist the Ambition 
 */

session_start();
include '../config.php';

//to which page should the user be redirected
$previousPage = $_GET['back'];

if (isset($_POST["btnSaveAmbition"])) {
    try {
        $ambitionCtr = new AmbitionCtr();
        $ambTitle = $_POST['inputTitle'];        

        //manages the special chars
        $ambFinalTitle = addslashes($ambTitle);
        
        $queryResult = $ambitionCtr->save($_SESSION['id'], $ambFinalTitle);

        if ($queryResult == 1) {
            header('Location: http://www.samaritan.com.br/'.$previousPage);
        } else {
            echo 'Something went wrong. Plase contact support.';
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
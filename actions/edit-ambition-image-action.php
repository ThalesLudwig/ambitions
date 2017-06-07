
<?php

session_start();
require '../config.php';

if (isset($_GET['ambId'])) {
    $ambId = $_GET['ambId'];
}

if (isset($_FILES['inputAmbImage'])) {
    $ambImage = $_FILES['inputAmbImage'];
}

//if the user uploaded an Ambition image
if ($_FILES['inputAmbImage']['name'] != null) {
    //if the image is smaller than 1MB
    if ($ambImage["size"] <= '1048576') {
        //generates a unique name for the image    
        $imageName = $ambId . ".jpg";
        //image path - the folder must exist
        $imagePath = "../images/pics_ambitions/" . $imageName;
        //uploads the image to that path
        move_uploaded_file($ambImage["tmp_name"], $imagePath);
        //returns '1' for everything ok
        $response = array('response' => '1');
        echo json_encode($response);
    }
    //if the image is bigger than 1MB
    else {
        $response = array('response' => '0');
        echo json_encode($response);
    }
}
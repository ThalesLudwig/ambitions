<?php

/*
 * Updates user profile
 * From profile.php  
 */

session_start();
include '../config.php';

if (isset($_POST['btnUpdateProfile'])) {
    $coverPic = $_FILES['inputCoverPic'];
    $profilePic = $_FILES['inputProfilePic'];
    $name = $_POST['inputName'];
    $surname = $_POST['inputSurname'];

    //if the user uploaded a cover picture
    if ($_FILES['inputCoverPic']['name'] != null) {
        //get image extension
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $coverPic["name"], $ext);
        //generates a unique name for the image
        $imageName = $_SESSION['id'] . "." . $ext[1];
        //image path - the folder must exist
        $imagePath = "../images/pics_cover/" . $imageName;
        //uploads the image to that path
        move_uploaded_file($coverPic["tmp_name"], $imagePath);
        //puts the image path in the session
        $_SESSION['pic_cover'] = $imageName;

        $userCtr = new UserCtr();
        $result = $userCtr->updateCover($_SESSION['id'], $imageName);        
        if ($result != 0) {
            echo 'Something went wrong with you cover picture. Contact Support.';
        }
        header('Location: http://www.samaritan.com.br/edit-profile?0');
    }

    //if the user uploaded a profile picture
    if ($_FILES['inputProfilePic']['name'] != null) {
        //if the image is smaller than 1mb
        if ($profilePic["size"] <= '1048576') {
            //get image extension
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $profilePic["name"], $ext);
            //generates a unique name for the image
            $imageName = $_SESSION['id'] . "." . $ext[1];
            //image path - the folder must exist
            $imagePath = "../images/pics_profile/" . $imageName;
            //uploads the image to that path
            move_uploaded_file($profilePic["tmp_name"], $imagePath);
            //puts the image path in the session
            $_SESSION['pic_profile'] = $imageName;
            $userCtr = new UserCtr();
            $result = $userCtr->updateProfilePic($_SESSION['id'], $imageName);            
            //if there were any errors
            if ($result != 0) {
                echo 'Something went wrong with you profile picture. Contact Support.';
            }
            header('Location: http://www.samaritan.com.br/edit-profile?0');
        }
        //if the image is bigger than 1mb
        else {
            header("Location: http://www.samaritan.com.br/edit-profile?1");
        }
    }

    //if user changed the name
    if ($name != null) {
        $userCtr = new UserCtr();
        $result = $userCtr->updateName($_SESSION['id'], $name);
        $_SESSION['name'] = $name;
        header('Location: http://www.samaritan.com.br/edit-profile?0');
    }

    //if user changed the surname
    if ($surname != null) {
        $userCtr = new UserCtr();
        $result = $userCtr->updateSurname($_SESSION['id'], $surname);
        $_SESSION['surname'] = $surname;
        header('Location: http://www.samaritan.com.br/edit-profile?0');
    }
    
}
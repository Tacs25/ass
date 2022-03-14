<?php
include_once "main/includes/dbh.inc.php";
session_start();

if (isset($_POST['subimg'])){
    $file = $_FILES['imahe'];

    $fileName = $file['name'];
    $fileTmp = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $id = $_SESSION['user'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 2000000){
                $fileNewName = "profile".$id.".jpg";
                $fileDestination = 'uploads/'.$fileNewName;
                move_uploaded_file($fileTmp, $fileDestination);
                $ss = $conn->query("UPDATE profileimg SET status = '1' WHERE User_ID = '$id'");
                header("Location: main/edit.php?error=successupload");
            } else{
                header("Location: main/edit.php?error=filetoobig");
            }
        } else{
            echo "There was an error uploading your file!";
        }
    } else{
        header("Location: main/edit.php?error=notthistype");
    }

}
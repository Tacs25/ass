<?php
require_once 'main/includes/functions.inc.php';
require_once 'main/includes/dbh.inc.php';

//$mysqli = new mysqli('localhost', 'root', '', 'access') or die(mysqli_error($mysqli));

if (isset($_POST['delete'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM appointment WHERE ID = $id";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("location: ds.php");
    exit();

}
else{
    header("location: ds.php");
    exit();
}
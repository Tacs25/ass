<?php
include_once "main/includes/dbh.inc.php";
$s = $conn->query("INSERT INTO testing (Name) VALUES ('Ako')");
$last_id = mysqli_insert_id($conn);
if ($last_id){
	$code = rand(1,99999);
	$user_id = "AO";
	$user_id .= $code;
	$user_id .= "N";
	$user_id .= $last_id;
	$ss = $conn->query("UPDATE testing SET User_ID = '$user_id' WHERE ID = '$last_id'");
}
else {
	echo "Error";
}
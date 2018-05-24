<?php
	include "config.php";
	$con = mysqli_connect(hostname, username, password, db_name) or die("Tidak Bisa terhubung ke database!");
	$json = file_get_contents("php://input");

	$obj = json_decode($json,true);

	$username = $obj["username"];
	$password = md5($obj["password"]);

	$query = "select name from user where email='$username' and password='$password' ";
	$result = mysqli_query($con,$query);
	
	if(mysqli_num_rows($result)>0){
		echo json_encode(mysqli_fetch_assoc($result));
	}
	else{
		echo json_encode("failed");
	}

	mysqli_close($con);
?>
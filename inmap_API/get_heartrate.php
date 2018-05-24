<?php
	include "config.php";
	$con = mysqli_connect(hostname, username, password, db_name) or die("Tidak Bisa terhubung ke database!");
	$json = file_get_contents("php://input");

	$obj = json_decode($json,true);

	$query = "Select rate from detak_jantung where id = (select max(id) from detak_jantung)";
	$result = mysqli_query($con,$query);
	

	if(mysqli_num_rows($result)>0){
		//echo json_encode($result);
		echo json_encode(mysqli_fetch_assoc($result));
	}
	else{
		echo json_encode("0");
	}

	mysqli_close($con);
?>
<?php
	include 'config.php';
	$con = mysqli_connect(hostname,username,password,db_name) or die('Unable to Connect');

	$json = file_get_contents('php://input');

	//decoding the json
	$obj = json_decode($json,true);

	//ambil setiap nilai yang dikirim dari mobile
	$name = $obj['name'];
	$phone = $obj['phone'];
	$email = $obj['email'];
	$password = md5($obj['password']);

	//cek apakah id perawat sudah ada di tabel perawat
	$query = "select name from user where email = '$email'";
	$result = mysqli_query($con,$query);
	//jika sudah ada
	if(mysqli_num_rows($result)>0){
		echo json_encode("The email has been used by another account");
	}
	//jika tidak ada
	else{
		$result = "insert into user(name,phone_number,password,email) values('$name', '$phone','$password', '$email')";
		//jika query berhasil
		if(mysqli_query($con,$result)){
			echo json_encode('Berhasil');
		}
		//jika gagal
		else{
			echo json_encode('Failed add account');
		}
	}
	//tutup koneksi
	mysqli_close($con);
?>
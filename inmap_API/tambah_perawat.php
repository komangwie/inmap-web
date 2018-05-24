<?php
	include 'config.php';
	$con = mysqli_connect(hostname,username,password,db_name) or die('Unable to Connect');

	$json = file_get_contents('php://input');

	//decoding the json
	$obj = json_decode($json,true);

	//ambil setiap nilai yang dikirim dari mobile
	$nama = $obj['nama'];
	$no_telepon = $obj['noTelepon'];
	$id_perawat = $obj['idPerawat'];
	$username = $obj['username'];
	$password = md5($obj['password']);

	//cek apakah id perawat sudah ada di tabel perawat
	$query = "select username from perawat where id_perawat='$id_perawat'";
	$result = mysqli_query($con,$query);
	//jika sudah ada
	if(mysqli_num_rows($result)>0){
		echo json_encode("User Sudah Ada");
	}
	//jika tidak ada
	else{
		$result = "insert into perawat(id_perawat,nama,no_telepon,username,password) values('$id_perawat','$nama','$no_telepon','$username','$password')";
		//jika query berhasil
		if(mysqli_query($con,$result)){
			echo json_encode('Berhasil');
		}
		//jika gagal
		else{
			echo json_encode('Gagal Menambahkan Pegawai');
		}
	}
	//tutup koneksi
	mysqli_close($con);
?>
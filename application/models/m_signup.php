<?php
	/**
	* 
	*/
	class M_signup extends CI_Model
	{
					//signup($username,$email,$phone,$gender,$bday,$password);
		function signup($username, $email, $phone, $gender, $bday, $password){
			$pass_md5 = md5($password);
			$query = "insert into user(name, email,phone_number,gender,birthday,password) values('$username','$email','$phone','$gender','$bday','$pass_md5')";
			//$query = "insert into user(name, email) values('komang','wie@gmail.com')";
			$this->db->query($query);
		}
	}
?>
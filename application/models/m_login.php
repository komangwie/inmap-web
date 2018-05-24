<?php
	/**
	* 
	*/
	class M_login extends CI_Model
	{
		function cek_login($username, $password){
			$query = "select * from user where name = '$username' and password = '$password'";
			return $this->db->query($query);
		}
	}
?>
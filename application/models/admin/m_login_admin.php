<?php
	/**
	* 
	*/
	class M_login_admin extends CI_Model
	{
		function admin_login($username,$password){
			$query = "select * from admin where name = '$username' and password='$password'";
			return $this->db->query($query);
		}
	}
?>
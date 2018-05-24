<?php
	/**
	* 
	*/
	class M_user extends CI_Model
	{
		
		function get_user_list(){
			$query = "select * from user where 1";
			return $this->db->query($query);

		}
		function delete_specific_user($id){
			$query = "delete from user where user_id = '$id'";
			return $this->db->query($query);
		}
	}

?>
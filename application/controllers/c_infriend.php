<?php
	/**
	* 
	*/
	class C_infriend extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model("m_user_profile");
		}

		function index(){
			$userID = $this->session->userdata('userID');
			$res =  $this->m_user_profile->get_friend_list($userID)->result_array();
			$data['infriend'] = $res;
			$this->load->view("v_infriend.html", $data);
		}

		function remove_friend(){
			$id = $this->input->post("id");
			$this->m_user_profile->delete_friend($id);
			$status = "Success remove friend";
			echo json_encode($status);
		}
	}
?>
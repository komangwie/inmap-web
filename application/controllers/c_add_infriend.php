<?php
	/**
	* 
	*/
	class C_add_infriend extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model("m_user_profile");
		}

		function index(){
			$this->load->view("v_add_infriend.html");
		}

		function search_friend(){
			$text = $this->input->post("text");
			if($text == null){
				
			}
			else{
				$userID = $this->session->userdata('userID');
				$result = $this->m_user_profile->get_user_by_name($userID, $text)->result_array();
			}
			echo json_encode($result);
		}

		function search_in_friend_list(){
			$name = $this->input->post("name");
			$userID = $this->session->userdata('userID');
			$result = $this->m_user_profile->get_infriend_list($userID, $name)->result_array();
			echo json_encode($result);
		}

		function add_friend(){
			$id = $this->input->post("id");
			$userID = $this->session->userdata('userID');
			$res = $this->m_user_profile->check_existing_fried($userID, $id)->row();
			//echo json_encode($res);
			if($res != null){
				$status = 'Cannot add, This people is already in your infriend list';
				echo json_encode($status);
			}
			else{
				$this->m_user_profile->add_to_friendList($userID, $id);
				$status = 'Success add to infriend list';
				echo json_encode($status);
			}
		}
	}
?>
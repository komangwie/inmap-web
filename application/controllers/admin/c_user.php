<?php
	/**
	* 
	*/
	class C_user extends CI_Controller
	{
		function __construct()
		{
            parent::__construct();
            $this->load->model("admin/m_user","user");
		}

		function index(){
			$res = $this->user->get_user_list()->result_array();
			$data['user'] = $res;
			$this->load->view("admin/v_user.html",$data);
		}

		function delete_user(){
			$id = $this->input->post("id");
			$this->user->delete_specific_user($id);
			echo json_encode($id);
		}

	}
?>
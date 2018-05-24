<?php
	/**
	* 
	*/
	class C_login extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model("m_login");
		}

		function index(){
			$this->load->view("v_login");
		}

		function login_proses(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$md5_pass = md5($password);
			$cek = $this->m_login->cek_login($username,$md5_pass)->num_rows();
			$status = "";
			if($cek > 0){
				$res = $this->m_login->cek_login($username,$md5_pass)->row();
					$data_session = array(
						'username' =>$username,
						'status' => 'login',
						'userID' => $res->user_id
					);
					$this->session->set_userdata($data_session);
			
				//response to json ajax
				$status = "ok";
				echo json_encode($status);
			}
			else{
				$status = "failed";
				echo json_encode($status);
			}
			
		}

		function catatTensi(){
			$rate = $this->input->post('rate');
			
			$cek = $this->m_login->catat($rate);
			echo json_encode($rate);
			
			
		}
	}
?>
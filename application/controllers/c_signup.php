<?php
	/**
	* 
	*/
	class C_signup extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('m_signup');
		}

		function index(){
			$this->load->view('v_signup.html');
		}

		function signup_proses(){
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$gender = $this->input->post('gender');
			$bday = $this->input->post('bday');
			$password = $this->input->post('password');
			$pros = $this->m_signup->signup($username,$email,$phone,$gender,$bday,$password);
			$data_session = array(
				'username' =>$username,
				'status' => 'login'
			);
			$this->session->set_userdata($data_session);
			echo json_encode($username);
		}
	}
?>
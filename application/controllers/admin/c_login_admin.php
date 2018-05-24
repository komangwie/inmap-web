<?php
	/**
	* 
	*/
	class C_login_admin extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model("admin/m_login_admin",'m_login');
		}

		function index(){
			if($this->session->userdata('admin')== 'login'){
				redirect(site_url('admin/c_admin_dashboard'));
			}
			else{
				$this->load->view("admin/v_login_admin.html");
			}
		}

		function admin_login(){
			$username = $this->input->post('username');
			$pass = $this->input->post('pass');
			$passEnc = md5($pass); 
			
			$result = $this->m_login->admin_login($username, $passEnc)->num_rows();
			
			$status = '';

			if($result > 0){

				$res = $this->m_login->admin_login($username, $passEnc)->row();
				$data_session = array(
					'username' =>$username,
					'admin' => 'login',
					'admin_id' => $res->admin_id
				);
				$this->session->set_userdata($data_session);

				$status = 'ok';
				echo json_encode($status);
			}
			else{
				$status = 'no user';
				echo json_encode($status);
			}
			
		}
	}
?>
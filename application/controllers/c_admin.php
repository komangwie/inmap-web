<?php
	/**
	* 
	*/
	class C_admin extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index(){
			$this->load->view("admin/v_login_admin.html");
		}
	}
?>
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
			$this->load->view("v_admin_dashboard.html");
		}
	}
?>
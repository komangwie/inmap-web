<?php
	/**
	* 
	*/
	class C_event_category extends CI_Controller
	{
		
		function __construct()
		{
            parent::__construct();
            $this->load->model("m_event_category");
		}

		function index(){
            $result = $this->m_event_category->get_category()->result_array();
            $data["category"] = $result;
			$this->load->view("v_event_category.html", $data);
		}

		function add_category(){
			$name = $this->input->post('name');
			$desc = $this->input->post('desc');
			$this->m_event_category->add_new_category($name, $des);
			echo json_encode($name);
		}
	}
?>
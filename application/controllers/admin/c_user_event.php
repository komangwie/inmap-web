<?php
	/**
	* 
	*/
	class C_user_event extends CI_Controller
	{
		function __construct()
		{
            parent::__construct();
            $this->load->model("admin/m_user_event","user_event");
		}

		function index(){
			$res = $this->user_event->get_user_event()->result_array();
			$data['event'] = $res;
			$this->load->view("admin/v_user_event.html",$data);
		}

		function get_event(){
			$id = $this->input->post('id');
			$result = $this->user_event->get_spesific_event_by_id($id)->result_array();
			echo json_encode($result);
		}

		//ganti status event offline or online
		function switch_status(){
			$status = $this->input->post("stat");
			$id = $this->input->post('id');
			$this->user_event->switch_event_status($status,$id);
			echo json_encode($status);
		}

	}
?>
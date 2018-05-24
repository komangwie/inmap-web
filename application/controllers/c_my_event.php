<?php
	/**
	* 
	*/
	class C_my_event extends CI_Controller
	{
		
		function __construct()
		{
            parent::__construct();
            $this->load->model("m_my_event");
		}

		function index(){
            $userID = $this->session->userdata('userID');
            $result = $this->m_my_event->get_event($userID)->result_array();
            $data['event'] = $result;
			$this->load->view('v_my_event',$data);
		}

		function delete_event(){
			$id = $this->input->post('id');
			$res = $this->m_my_event->delete_event($id);
			echo json_encode($id);
		}

		function my_transaction(){
            $userID = $this->session->userdata('userID');
            $result = $this->m_my_event->get_transaction($userID)->result_array();
            $data['transaction'] = $result;
			$this->load->view('v_my_transaction.html',$data);
		}
	}
?>
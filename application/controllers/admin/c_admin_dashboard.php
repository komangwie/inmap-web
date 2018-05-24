<?php
	/**
	* 
	*/
	class C_admin_dashboard extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model("admin/m_manage","m_manage");
		}

		function index(){
			$res = $this->m_manage->get_request()->result_array();
			$total_req = $this->m_manage->get_total_request()->result_array();
			$data["request"] = $res;
			$data["total_req"] = $total_req;
			$this->load->view("admin/v_admin_dashboard.html", $data);
		}

		function confirm_ticket_view(){
			$ticket_id = $this->uri->segment(4);
			$transaction = $this->m_manage->get_transaction_by_ticket($ticket_id)->result_array();
			$data["transaction"] = $transaction;
			$this->load->view("admin/v_confirm_ticket.html", $data);
		}

		function reject_transaction(){
			$tr_id = $this->input->post("id");
			$time = $this->input->post("time");
			$data = array('transaction_time' => $time, 'status' => 'rejected');
			$where = "transaction_id = '$tr_id'";
			$this->m_manage->reject_transaction($data, $where);
			echo json_encode("ok");
		}

		function confirm_transaction(){
			$tr_id = $this->input->post("id");
			$user_id = $this->input->post("user_id");
			$time = $this->input->post("time");

			$target_dir = "./image/bar_code" . "/" . $tr_id ."/";
			//if target dir did not exist then make it
			if(!file_exists($target_dir)){
				mkdir($target_dir,0777,true);
			}

			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
			$config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = './image/'; //string, the default is application/cache/
	        $config['errorlog']     = './image/'; //string, the default is application/logs/
	        $config['imagedir']     = $target_dir; //direktori penyimpanan qr code
	        $config['quality']      = true; //boolean, the default is true
	        $config['size']         = '1024'; //interger, the default is 1024
	        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
	        $this->ciqrcode->initialize($config);
	        $image_name= $tr_id . '.png'; //buat name dari qr code sesuai dengan id
 
	        $params['data'] = $tr_id; //data yang akan di jadikan QR CODE
	        $params['level'] = 'H'; //H=High
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
	        $dir = "image/bar_code/". $tr_id ."/". $tr_id .".png";

	        $res = $this->m_manage->confirm_transaction($tr_id, $dir, $user_id, $time);
			echo json_encode($dir);
		}

		function success_transaction(){
			$res = $this->m_manage->get_success_transaction()->result_array();
			$data['res'] = $res;
			$total_success = $this->m_manage->total_success_transaction()->result_array();
			$data['suc'] = $total_success;
			$this->load->view("admin/v_success_transaction.html", $data);
		}
	}
?>
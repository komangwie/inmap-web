<?php 
	/**
	* 
	*/
	class C_dashboard extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			//$this->session->sess_destroy();
			if($this->session->userdata('status')!= 'login'){
				redirect(site_url('c_login'));
			}
			// $this->load->library('ciqrcode'); //pemanggilan library QR CODE
			// $config['cacheable']    = true; //boolean, the default is true
	  //       $config['cachedir']     = './assets/'; //string, the default is application/cache/
	  //       $config['errorlog']     = './assets/'; //string, the default is application/logs/
	  //       $config['imagedir']     = './assets/img/'; //direktori penyimpanan qr code
	  //       $config['quality']      = true; //boolean, the default is true
	  //       $config['size']         = '1024'; //interger, the default is 1024
	  //       $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	  //       $config['white']        = array(70,130,180); // array, default is array(0,0,0)
	  //       $this->ciqrcode->initialize($config);
	  //       $image_name='1508605003.png'; //buat name dari qr code sesuai dengan nim
 
	  //       $params['data'] = '1508605003'; //data yang akan di jadikan QR CODE
	  //       $params['level'] = 'H'; //H=High
	  //       $params['size'] = 10;
	  //       $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	  //       $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
			$this->load->model("m_create_event");
		}

		//load header
		function header_load(){
			$this->load->view("header.html");
		}
		function footer_load(){
			$this->load->view("footer.html");
		}

		function index(){
			$this->load->view('v_dashboard');
		}

		function get_event_by_adminArea(){
			$area = $this->input->post("area");
			$res = $this->m_create_event->get_event_by_adminArea($area)->result_array();
			echo json_encode($res);
		}
	}
?>
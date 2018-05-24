<?php
	/**
	* 
	*/
	class C_Create_Event extends CI_Controller
	{
		public $comment;
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('m_create_event');
			$this->comment = new ListComment();
		}

		
		function index(){
			
			$result = $this->m_create_event->get_category()->result_array();
			$data['category'] = $result;
			$this->load->view('v_create_event.html',$data);
		
		}

		function ticket_pricing(){
			$this->load->view("ticket_pricing.html");
		}
		function ticket_free(){
			$this->load->view("ticket_free.html");
		}

		function privateEvent(){
			$this->load->view("create_friend_list.html");
		}

		function search_infriend_edit(){
			$this->load->view("create_friend_list_edit.html");
		}

		function paid_ticket_display(){
			$this->load->view("paid_ticket_display.html");
		}
		//goto page how to get embed youtube url
		function goto_youtube_url(){
			$this->load->view("youtube_url_tutorial.html");
		}
		//load header
		function header_load(){
			$this->load->view("header.html");
		}
		function footer_load(){
			$this->load->view("footer.html");
		}

		//load view transaction account
		function transaction_account(){
			$this->load->view("v_transaction_account.html");
		}

		//first display content to editing
		function edit_event(){
			//$id get from frontend using url and id placed on 3rd segment url
			$id = $this->uri->segment(3);
			//userID use to know who is view the event
			//future purpose
			$userID = $this->session->userdata('userID');
			//get event photos, event photos can be 1 or 2 photos
			$photo = $this->m_create_event->get_event_photo($id)->result_array();
			//get event detail basic, at 'event' table
			$event = $this->m_create_event->get_event_by_id($id)->result_array();
			//get event location from event_location table
			$location = $this->m_create_event->get_location_by_id($id)->result_array();
			//get category from category table
			$category = $this->m_create_event->get_category()->result_array();
			//check if event type is public or private
			//because public event can have tickets and private event
			//have list of infriend that sent directly
			if($event[0]["type"] == "public"){
				//check if event have tickets
				if($event[0]["ticket"] == 'yes'){
					//get ticket detail here
					$ticket = $this->m_create_event->get_ticket_event($id)->result_array();
					$data["ticket"] = $ticket;
				}
			}
			else{
				//get list of friend that have event id = $id
				$friend = $this->m_create_event->get_list_friend($id)->result_array();
				$data["infriend"] = $friend;
			}

			$data["photo"] = $photo;
			$data["event"] = $event;
			$data["location"] = $location;
			$data["category"] = $category;
			$this->load->view("v_edit_event.html", $data);
		}
		//view event
		function view_event(){
			//$id get from frontend using url and id placed on 3rd segment url, event id
			$id = $this->uri->segment(3);
			//userID use to know who is view the event
			//future purpose
			$userID = $this->session->userdata('userID');
			//get event photos, event photos can be 1 or 2 photos
			$photo = $this->m_create_event->get_event_photo($id)->result_array();
			//get event detail basic, at 'event' table
			$event = $this->m_create_event->get_event_by_id($id)->result_array();
			//get event location from event_location table
			$location = $this->m_create_event->get_location_by_id($id)->result_array();
			//check if event type is public or private
			//because public event can have tickets and private event
			//have list of infriend that sent directly
			if($event[0]["type"] == "public"){
				//check if event have tickets
				if($event[0]["ticket"] == 'yes'){
					//get ticket detail here
					$ticket = $this->m_create_event->get_ticket_event($id)->result_array();
					$data["ticket"] = $ticket;
				}
			}
			else{
				//get list of friend that have event id = $id
				$friend = $this->m_create_event->get_list_friend($id)->result_array();
				$data["infriend"] = $friend;
			}
			//checking if the user already like the event or not yet
			$like = $this->m_create_event->is_my_liked($userID, $id)->result_array();
			if(isset($like)){
				$data["like"] = $like;
			}
			//get total like from event_like table
			$total_like = $this->m_create_event->get_number_like($id)->result_array();
			//check is the event is already commented yet
			$check_comment = $this->m_create_event->check_comment($id)->result_array();
			$pnj = count($check_comment);
			if($pnj > 0){
				$data["isComment"] = "yes";
			}

			$data["photo"] = $photo;
			$data["event"] = $event;
			$data["location"] = $location;
			$data["total_like"] = $total_like;
			// echo "as";
			$this->load->view("v_view_event.html", $data);
		}

		//view event
		function view_event_stats(){
			//$id get from frontend using url and id placed on 3rd segment url, event id
			$id = $this->uri->segment(3);
			//userID use to know who is view the event
			//future purpose
			$userID = $this->session->userdata('userID');
			//get event photos, event photos can be 1 or 2 photos
			$photo = $this->m_create_event->get_event_photo($id)->result_array();
			//get event detail basic, at 'event' table
			$event = $this->m_create_event->get_event_by_id($id)->result_array();
			//get event location from event_location table
			$location = $this->m_create_event->get_location_by_id($id)->result_array();
			//check if event type is public or private
			//because public event can have tickets and private event
			//have list of infriend that sent directly
			if($event[0]["type"] == "public"){
				//check if event have tickets
				if($event[0]["ticket"] == 'yes'){
					//get ticket detail here
					$ticket = $this->m_create_event->get_ticket_event($id)->result_array();
					$data["ticket"] = $ticket;
					$transaction = $this->m_create_event->get_transaction_by_ticket($ticket[0]["ticket_id"])->result_array();
					$data["transaction"] = $transaction;
				}
			}
			else{
				//get list of friend that have event id = $id
				$friend = $this->m_create_event->get_list_friend($id)->result_array();
				$data["infriend"] = $friend;
			}
			//checking if the user already like the event or not yet
			$like = $this->m_create_event->is_my_liked($userID, $id)->result_array();
			if(isset($like)){
				$data["like"] = $like;
			}
			//get total like from event_like table
			$total_like = $this->m_create_event->get_number_like($id)->result_array();
			//check is the event is already commented yet
			$check_comment = $this->m_create_event->check_comment($id)->result_array();
			$pnj = count($check_comment);
			if($pnj > 0){
				$data["isComment"] = "yes";
			}

			//get total views
			$tot_v = $this->m_create_event->get_total_views($id)->result_array();
			//get total comment
			$username = '';
			$content = '';
			$comment_time = '';
			$url = '';
			//send to function (post_id, parent_id, username, description, post_time)
			$fun = $this->rec($id,0, $username, $content, $comment_time, $url);
			//get_data give reult array
			$r = $this->comment->get_data();
			
			//get total sales (money)
			$sales = $this->m_create_event->get_sales($id)->result_array();
			
			$data["total_comment"] = count($r);
			$data["photo"] = $photo;
			$data["event"] = $event;
			$data["location"] = $location;
			$data["total_like"] = $total_like;
			$data["total_view"] = $tot_v;
			$data['sales'] = $sales;
			// echo "as";
			$this->load->view("v_view_event_stats.html", $data);
		}
		//upload event, confused name function hehe
		function upload_Image(){
			$title = $this->input->post('title');
			$description =  $this->input->post('description');
			$dateStart =  $this->input->post('dateStart');
			$dateEnd =  $this->input->post('dateEnd');
			$timeStart =  $this->input->post('timeStart');
			$timeEnd  = $this->input->post('timeEnd');
			$videoUrl =  $this->input->post('videoUrl');
			$category =  $this->input->post('category');
			$type =  $this->input->post('type');
			$ticket =  $this->input->post('ticket');
			$userID = $this->session->userdata('userID');
			$lat = $this->input->post('lat');
			$lng = $this->input->post('lng');
			$adminArea = $this->input->post('adminArea');
			$address = $this->input->post('address');
			$location_desc = $this->input->post("location_desc");
			$dateNow = $this->input->post('dateNow');

			if (isset($videoUrl)) {
				# code...
			}
			else{
				$videoUrl = null;
			}

			//save base attribute
			$res = $this->m_create_event->save_Event($title,$description,$dateStart,$dateEnd,$timeStart,$timeEnd,$videoUrl,$category,$type,$ticket,$userID, $dateNow)->row();
			//get event id after save to handle loaction, image, friend list
			$event_id = $res->event_id;
			//save event location based on event id
			$insertLocation = $this->m_create_event->save_location($event_id, $adminArea, $address, $lat, $lng, $location_desc);
			//if event ticket no
			if($ticket == "yes"){
				//if yes
				$ticket_total = $this->input->post('ticket_total');
				$maximum_order = $this->input->post('maximum_order');
				$price = $this->input->post('price');
				$ticket_title = $this->input->post('ticket_title');
				$ticket_description = $this->input->post('ticket_description');
				$fb = $this->input->post('fb');
				$email = $this->input->post('email');
				$phone = $this->input->post('p_number');
				$this->m_create_event->save_ticket($event_id,$ticket_total, $maximum_order, $price, $ticket_title, $ticket_description, $fb, $email, $phone, $dateStart,$dateEnd,$timeStart,$timeEnd );
			}

			//handle friend list when event type is private event
			if($type == "private"){
				$friend = json_decode($this->input->post("friend"));
				$len = count($friend);
				if($len > 0){
					$this->m_create_event->add_offline_friend($event_id,$friend);
				}
			}

			//handel image upload
			if($_FILES['files']['name']!=''){
				$output = '';
				$target_dir = "./image/eventImage" . "/" . $event_id;
				//if target dir did not exist then make it
				if(!file_exists($target_dir)){
					mkdir($target_dir,0777,true);
				}
				$config["upload_path"] = $target_dir;
				$config["allowed_types"] = 'png|jpg|jpeg';
			
				$this->load->library("upload",$config);
				// //$this->upload->initialize($config);
		
				for($i = 0; $i < count($_FILES['files']['name']);$i++){
					
					$_FILES['file']['name'] = $_FILES['files']['name'][$i];
					$_FILES['file']['type'] = $_FILES['files']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['files']['error'][$i];
					$_FILES['file']['size'] = $_FILES['files']['size'][$i];
					
					if($this->upload->do_upload('file')){
						$data =array('data' =>$this->upload->data());
						$path = "image/eventImage/" . $event_id . "/" . $data['data']['file_name'];
						$this->m_create_event->save_image($event_id, $path);
						//echo json_encode($path);
					}
					else{
						$status = $this->upload->display_errors(); 
						echo json_encode($status);
					}
				}
				
			}

			echo json_encode($event_id);
		
		}

		//update event
		function edit_my_event(){
			$id = $this->input->post('eventID');
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$dateStart =  $this->input->post('dateStart');
			$dateEnd =  $this->input->post('dateEnd');
			$timeStart =  $this->input->post('timeStart');
			$timeEnd  = $this->input->post('timeEnd');
			$videoUrl =  $this->input->post('videoUrl');
			$category =  $this->input->post('category');
			$type =  $this->input->post('type');
			$ticket =  $this->input->post('ticket');
			$userID = $this->session->userdata('userID');
			$lat = $this->input->post('lat');
			$lng = $this->input->post('lng');
			$adminArea = $this->input->post('adminArea');
			$address = $this->input->post('address');
			$location_desc = $this->input->post("location_desc");
			$dateNow = $this->input->post('dateNow');
			$img_change = $this->input->post("img_change");

			if (isset($videoUrl)) {
				# code...
			}
			else{
				$videoUrl = null;
			}
			//save base attribute
			$res = $this->m_create_event->save_edit_Event($title,$description,$dateStart,$dateEnd,$timeStart,$timeEnd,$videoUrl,$category,$type,$ticket,$userID, $dateNow, $id);
			// //save event location based on event id
			$insertLocation = $this->m_create_event->save_edit_location($id, $adminArea, $address, $lat, $lng, $location_desc);
			//if event ticket yes
			if($ticket == "yes"){
				//if yes
				$ticket_total = $this->input->post('ticket_total');
				$maximum_order = $this->input->post('maximum_order');
				$price = $this->input->post('price');
				$ticket_title = $this->input->post('ticket_title');
				$ticket_description = $this->input->post('ticket_description');
				$fb = $this->input->post('fb');
				$email = $this->input->post('email');
				$phone = $this->input->post('p_number');
				$this->m_create_event->save_ticket($id,$ticket_total, $maximum_order, $price, $ticket_title, $ticket_description, $fb, $email, $phone, $dateStart,$dateEnd,$timeStart,$timeEnd );
			}
			//baru sampai sini bor

			// //handle friend list when event type is private event
			if($type == "private"){
				$friend = json_decode($this->input->post("friend"));
				$len = count($friend);
				if($len > 0){
					$this->m_create_event->add_offline_friend($id,$friend);
				}
			}

			// //handel image upload
			if($img_change == "yes"){
				if($_FILES['files']['name']!=''){
					$output = '';
					$target_dir = "./image/eventImage" . "/" . $id;
					//if target dir did not exist then make it
					if(!file_exists($target_dir)){
						mkdir($target_dir,0777,true);
					}
					$config["upload_path"] = $target_dir;
					$config["allowed_types"] = 'png|jpg|jpeg';
					//remove image inside dir and replace using new image
					$files = glob($target_dir . '/{,.}*', GLOB_BRACE);
					foreach($files as $file){ // iterate files
					  if(is_file($file))
					    unlink($file); // delete file
					}
					//also remove inside the eventphote table
					$this->m_create_event->remove_event_image($id);

					$this->load->library("upload",$config);
					// // //$this->upload->initialize($config);
			
					for($i = 0; $i < count($_FILES['files']['name']);$i++){
						
						$_FILES['file']['name'] = $_FILES['files']['name'][$i];
						$_FILES['file']['type'] = $_FILES['files']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['files']['error'][$i];
						$_FILES['file']['size'] = $_FILES['files']['size'][$i];
						
						if($this->upload->do_upload('file')){
							$data =array('data' =>$this->upload->data());
							$path = "image/eventImage/" . $id . "/" . $data['data']['file_name'];
							$this->m_create_event->save_image($id, $path);
							//echo json_encode($path);
						}
						else{
							$status = $this->upload->display_errors(); 
							echo json_encode($status);
						}
					}
					
				}
			}

			echo json_encode($id);
		
		}

		//make event live
		function publish_event(){
			$id = $this->input->post("id");
			$time = $this->input->post("time");
			//future purpose
			$userID = $this->session->userdata('userID');
			$this->m_create_event->publish_event($id, $time, $userID);
			echo json_encode($id);
		}

		// like an event
		function like_event(){
			$id = $this->input->post("id");
			$userID = $this->session->userdata('userID');
			$this->m_create_event->like_event($id, $userID);
			echo json_encode($id);
		}

		// view an event, every user click on event at the home page that count to be a view
		function add_event_views(){
			$id = $this->input->post("id");
			$userID = $this->session->userdata('userID');
			$this->m_create_event->add_event_views($id, $userID);
			echo json_encode($id);
		}

		//add comment
		function add_comment(){
			$comment = $this->input->post("comment");
			$parent = $this->input->post("parent");
			$date = $this->input->post("date");
			$userID = $this->session->userdata('userID');
			$username = $this->session->userdata('username');
			$result = $this->m_create_event->post_comment($comment, $parent, $date, $userID)->result_array();
			$result[0]['username'] = $username;
			echo json_encode($result);
		}

		//get event comment
		function get_comment(){
			$parent = $this->input->post("id");

			$username = '';
			$content = '';
			$comment_time = '';
			$url = '';
			//send to function (post_id, parent_id, username, description, post_time)
			$fun = $this->rec($parent,0, $username, $content, $comment_time, $url);
			//get_data give reult array
			$r = $this->comment->get_data();
			echo json_encode($r);
		}

		function rec($id, $parent_id, $username, $content, $comment_time, $url){
			$this->comment->InsertAtLast($id, $parent_id, $username, $content, $comment_time, $url);
			$q =  $this->m_create_event->count_comment($id)->result_array();
			$length = count($q);
			
			if($length > 0){
				for ($i=0;$i < $length; $i++){ 
					
					$this->rec($q[$i]["comment_id"], $id, $q[$i]["username"], $q[$i]["content"], $q[$i]["comment_time"],$q[$i]["original_photo"]);
				}
			}
			else{
				return $id;
			}
		}

		function book_ticket(){
			//$id get from view_event and want to book ticket
			$id = $this->uri->segment(3);
			//user id to check if the user already book or not,
			$userID = $this->session->userdata('userID');
			$ck = $this->m_create_event->check_transaction($userID, $id)->result_array();
			if(count($ck) > 0){
				$tr_id = $ck[0]["transaction_id"];
				//get ticket detail here
				$ticket = $this->m_create_event->get_ticket_event($id)->result_array();
				$event = $this->m_create_event->get_event_by_id($id)->result_array();
				$transaction = $this->m_create_event->get_transaction_by_id($tr_id)->result_array();
				$data["event_id"] = $id;
				$data["ticket"] = $ticket;
				$data["event"] = $event;
				$data["transaction"] = $transaction;
				$this->load->view("v_transaction.html", $data);
			}
			else{
				//get ticket detail here
				$ticket = $this->m_create_event->get_ticket_event($id)->result_array();
				$event = $this->m_create_event->get_event_by_id($id)->result_array();
				$data["event_id"] = $id;
				$data["ticket"] = $ticket;
				$data["event"] = $event;
				$this->load->view("v_book_ticket.html", $data);
			}
		}

		function display_bank_address(){
			$this->load->view("bank-adress.html");
		}

		//save transaction
		function save_transaction(){
			$ticket_id = $this->input->post("ticket_id");
			$unit_price = $this->input->post("unit_price");
			$total_price = $this->input->post("total_price");
			$number_of_items = $this->input->post("number_of_items");
			$time = $this->input->post("time");
			$userID = $this->session->userdata('userID');
			$res =  $this->m_create_event->save_transaction($ticket_id, $unit_price, $total_price, $number_of_items, $userID, $time)->result_array();
			echo json_encode($res);

		}

		//goto transaction process/progress
		function view_my_transaction(){
			//$id get from view_event and want to book ticket, id is event id
			$id = $this->uri->segment(3);
			//get transaction id segment 4, look at v_book_ticket.html,res ajax
			$tr_id = $this->uri->segment(4);
			//get ticket detail here
			$ticket = $this->m_create_event->get_ticket_event($id)->result_array();
			$event = $this->m_create_event->get_event_by_id($id)->result_array();
			$transaction = $this->m_create_event->get_transaction_by_id($tr_id)->result_array();
			$data["event_id"] = $id;
			$data["ticket"] = $ticket;
			$data["event"] = $event;
			$data["transaction"] = $transaction;
			$this->load->view("v_transaction.html", $data);
		}

		//update the transaction
		function update_transaction(){
			$tr_id = $this->input->post("tr_id");
			$total_price = $this->input->post("total_price");
			$number_of_items = $this->input->post("number_of_items");
			$time = $this->input->post("time");
			$res =  $this->m_create_event->update_transaction($tr_id, $total_price, $number_of_items, $time)->result_array();
			echo json_encode($res);

		}

		function ots_confirm_transaction(){
			$time = $this->input->post("time");
			$tr_id = $this->input->post("tr_id");
			$userID = $this->session->userdata('userID');

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

			$res= $this->m_create_event->ots_confirm_transaction($tr_id, $dir, $time, $userID);
			echo json_encode("ok");
		}

		//free ticket confirm
		function free_ticet_confirmation(){
			$event_id = $tr_id = $this->uri->segment(4);
			//transaction id
			$tr_id = $this->uri->segment(3);
			$data["event_id"] = $event_id;
			$data["tr_id"] = $tr_id;
			$this->load->view("v_free_ticket_confirm.html",$data);
		}
		//at the confirm button witd adsense
		function free_ticket_save_transaction(){
			//transaction id
			$tr_id = $this->input->post("id");
			$time = $this->input->post("time");
			$userID = $this->session->userdata('userID');
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

			$res= $this->m_create_event->free_ticket_save_transaction($tr_id, $time, $dir, $userID);
			echo json_encode("ok");
		}

		//confirmation payment by tranfer bank, upload image proof
		function payment_confirmation(){
			$tr_id = $this->input->post("tr_id");
			$time = $this->input->post("time");
			//handel image upload
			if($_FILES['files']['name']!=''){
				$output = '';
				$target_dir = "./payment_image/bank_transfer" . "/" . $tr_id;
				//if target dir did not exist then make it
				if(!file_exists($target_dir)){
					mkdir($target_dir,0777,true);
				}
				$config["upload_path"] = $target_dir;
				$config["allowed_types"] = 'png|jpg|jpeg';
			
				$this->load->library("upload",$config);
				// //$this->upload->initialize($config);
		
				for($i = 0; $i < count($_FILES['files']['name']);$i++){
					
					$_FILES['file']['name'] = $_FILES['files']['name'][$i];
					$_FILES['file']['type'] = $_FILES['files']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['files']['error'][$i];
					$_FILES['file']['size'] = $_FILES['files']['size'][$i];
					
					if($this->upload->do_upload('file')){
						$data =array('data' =>$this->upload->data());
						$path = "payment_image/bank_transfer/" . $tr_id . "/" . $data['data']['file_name'];
						$this->m_create_event->confirmation_transaction($tr_id, $path, $time);
						//echo json_encode($path);
					}
					else{
						$status = $this->upload->display_errors(); 
						echo json_encode($status);
					}
				}
				
			}

			echo json_encode("ok");
		}

		//search transaction
		function search_in_transaction(){
			$text = $this->input->post("text");
			$ticket_id = $this->input->post("id");
			$res = $this->m_create_event->search_in_transaction($text, $ticket_id)->result_array();
			echo json_encode($res);
		}

		//filter payment method
		function filter_payment(){
			$text = $this->input->post("text");
			$ticket_id = $this->input->post("id");
			$res = $this->m_create_event->filter_payment($text, $ticket_id)->result_array();
			echo json_encode($res);
		}

		//filter status
		function filter_status(){
			$text = $this->input->post("text");
			$ticket_id = $this->input->post("id");
			$res = $this->m_create_event->filter_status($text, $ticket_id)->result_array();
			echo json_encode($res);
		}

		//filter exchange
		function filter_exchange(){
			$text = $this->input->post("text");
			$ticket_id = $this->input->post("id");
			$res = $this->m_create_event->filter_exchange($text, $ticket_id)->result_array();
			echo json_encode($res);
		}

		//filter none at the user event dashboard
		function filter_none(){
			$ticket_id = $this->input->post("id");
			$res = $this->m_create_event->filter_none($ticket_id)->result_array();
			echo json_encode($res);
		}

		function save_transaction_account(){
			$bank_name = $this->input->post('bank_name');
			$under_name = $this->input->post('under_name');
			$rek_number = $this->input->post('rek_number');
			$userID = $this->session->userdata('userID');

			$data = array(
				'bank_name' => $bank_name,
				'name' => $under_name,
				'rek_number' => $rek_number,
				'user_id' => $userID
			 );

			$table = 'bank_account';

			$res = $this->m_create_event->save_transaction_account($table, $data);



			echo json_encode($data['user_id']);
		}
	}

	class ListComment
	{
	    public $array = array();
	    private static $count = 0;

	    /**
	     * @return int
	     */
	    public function GetCount()
	    {
	        return self::$count;
	    }

	    public function get_data(){
	    	return $this->array;
	    }
	   
	    public function InsertAtLast($id, $parent_id, $username, $content, $comment_time, $url) {   
        	$this->array[self::$count] = array();
			$this->array[self::$count]['id'] = $id;
			$this->array[self::$count]['parent'] = $parent_id;
			$this->array[self::$count]['username'] = $username;
			$this->array[self::$count]['content'] = $content;
			$this->array[self::$count]['comment_time'] = $comment_time;
			$this->array[self::$count]['original_photo'] = $url;

			self::$count++;
	    }
	}


?>
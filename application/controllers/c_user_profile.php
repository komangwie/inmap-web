<?php 
	/**
	* 
	*/
	class C_user_profile extends CI_Controller
	{
		
		function  __construct()
		{
			parent::__construct();
			$this->load->model("m_user_profile");
		}

		function index(){
			$userID = $this->session->userdata('userID');
			if ($userID){
				$result = $this->m_user_profile->get_user_profile($userID)->result_array();
				$data['user'] = $result;
				$this->load->view("v_user_profile.html",$data);
			}
			else{
				//$this->load->view("v_user_profile.html");
				
			}
			
		}
		function edit_without_image(){
			$name = $this->input->post("name");
			$email = $this->input->post("email");
			$phone = $this->input->post("phone");
			$gender = $this->input->post("gender");
			$birthday = $this->input->post("birthday");
			$id = $this->input->post("id");
			$this->m_user_profile->update_user($name, $email, $phone, $gender, $birthday, $id);
		}

		function edit_profile(){
			$name = $this->input->post("name");
			$email = $this->input->post("email");
			$phone = $this->input->post("phone");
			$gender = $this->input->post("gender");
			$birthday = $this->input->post("birthday");
			$id = $this->input->post("id");
			$this->m_user_profile->update_user($name, $email, $phone, $gender, $birthday, $id);
			if($_FILES['files']['name']!=''){
				$target_dir = "./image/user/profile" . "/" . $id;
				//if target dir did not exist then make it
				if(!file_exists($target_dir)){
					mkdir($target_dir,0777,true);
				}
				$config["upload_path"] = $target_dir;
				$config["allowed_types"] = 'png|jpg|jpeg';
				$this->load->library("upload",$config);

				for($i = 0; $i < count($_FILES['files']['name']);$i++){
					
					$_FILES['file']['name'] = $_FILES['files']['name'][$i];
					$_FILES['file']['type'] = $_FILES['files']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['files']['error'][$i];
					$_FILES['file']['size'] = $_FILES['files']['size'][$i];
					
					if($this->upload->do_upload('file')){
						$data =array('data' =>$this->upload->data());
						$path = "image/user/profile/" . $id . "/" . $data['data']['file_name'];
						$res = $this->m_user_profile->check_profile($id)->row();
						//if user never have photo profle
						if($res->original_photo == null){	
							$this->m_user_profile->save_photo($id, $path);
						}
						else{
							$this->m_user_profile->update_photo($id, $path);	
						}
						
						//echo json_encode($path);
					}
					else{
						$status = $this->upload->display_errors(); 
						echo json_encode($status);
					}
				}
			}

			echo json_encode($name);

		}

		//goto notifications page
		function goto_notofications(){
			$userID = $this->session->userdata('userID');
			$res = $this->m_user_profile->get_notifications($userID)->result_array();
			$data["notifications"] = $res;
			$this->load->view("v_notifications.html", $data);
		}

		//when user click view or read message in notifications page
		//update ini notifications table read_message*
		function read_notif(){
			$id = $this->input->post("id");
			$userID = $this->session->userdata('userID');
			$this->m_user_profile->read_notifications($userID, $id);
			$status = "ok";
			echo json_encode($status);
		}

		function logout(){
			$this->session->sess_destroy();
			echo json_encode("ok");
		}
	}
 ?>
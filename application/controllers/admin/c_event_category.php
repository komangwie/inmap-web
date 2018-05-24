<?php
	/**
	* 
	*/
	class C_event_category extends CI_Controller
	{
		
		function __construct()
		{
            parent::__construct();
            $this->load->model("admin/m_event_category","event_category");
		}

		function index(){
			$maxItemPerRow = 10;
			$totalData = $this->event_category->get_all_category();
			$tot = $totalData->num_rows();

			$start = 0;
			//echo $tot;
			$data["pages"] = ceil($tot/$maxItemPerRow);
            $result = $this->event_category->get_category($start, $maxItemPerRow)->result_array();
            $data["category"] = $result;
			$this->load->view("admin/v_event_category.html", $data);
		}

		function move_page(){
			//jumlah item per page
			$maxItemPerRow = 10;
			$totalData = $this->event_category->get_all_category();
			//jum record pada databse
			$tot = $totalData->num_rows();
			$pageNow = $this->input->post('page');

			if($pageNow > 1){
				$start = ($pageNow * $maxItemPerRow) - $maxItemPerRow;
			}
			else{
				$start = 0;
			}

			$result = $this->event_category->get_category($start, $maxItemPerRow)->result_array();

			echo json_encode($result);
		}

		// add new event categoory
		function add_category(){
			$name = $this->input->post('name');
			$desc = $this->input->post('desc');
			$result = $this->event_category->add_new_category($name, $desc)->result_array();
			//$this->event_category->add_new_category($name, $desc);
			echo json_encode($result);
		}

		//delete event category from specific id
		function delete_category(){
			$event_id = $this->input->post('id');
			$this->event_category->delete_category_event($event_id);
			echo json_encode($event_id);
		}

		//get specific event by id
		function get_spesific_event(){
			$id = $this->input->post('id');
			$res = $this->event_category->get_event_by_id($id)->result_array();
			echo json_encode($res);
		}

		//edit category
		function edit_category(){
			$name = $this->input->post('name');
			$desc = $this->input->post('desc');
			$id = $this->input->post('id');
			$result = $this->event_category->edit_category($name, $desc,$id)->result_array();
			echo json_encode($result);
		}
	}
?>
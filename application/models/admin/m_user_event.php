<?php
	/**
	* 
	*/
	class M_user_event extends CI_Model
	{
		function get_user_event(){
			$query = "select event.event_id, event.title, event.description, event.video_url, event.type, event.ticket, event.dateStart, event.dateEnd, event.timeStart, event.timeEnd, event.status, eventkategori.kategori_name, user.name  from event, eventkategori, user where event.kategori_id = eventkategori.kategori_id and event.user_id = user.user_id";
			return $this->db->query($query);
		}

		function get_spesific_event_by_id($id){
			$query = "select event.event_id, event.title, event.description, event.video_url, event.type, event.ticket, event.dateStart, event.dateEnd, event.timeStart, event.timeEnd, event.status, eventkategori.kategori_name, user.name  from event, eventkategori, user where event.kategori_id = eventkategori.kategori_id and event.user_id = user.user_id and event.event_id = '$id'";
			return $this->db->query($query);
		}

		function switch_event_status($status, $id){
			$query = "update event set status = '$status' where event_id = '$id'";
			return $this->db->query($query);
		}
	}
?>
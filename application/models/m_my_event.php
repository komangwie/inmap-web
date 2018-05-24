<?php
	/**
	* 
	*/
	class M_my_event extends CI_Model
	{
		function get_event($userID){
			$query = "select * from event where user_id = '$userID' ORDER BY event_id DESC";
			return $this->db->query($query);
		}

		function delete_event($id){
			$query = "delete from event where event_id ='$id' ";
			$this->db->query($query);
		}

		function get_transaction($userID){
			$query = "SELECT ticket.ticket_id, ticket.ticket_title, ticket.dateStart, ticket.dateEnd, ticket.timeStart, ticket.timeEnd, ticket.event_id, transaction.total_price, transaction.number_of_items, transaction.payment_method,  transaction.transaction_id, transaction.payment_confirmation, transaction.status FROM transaction INNER JOIN ticket on transaction.ticket_id = ticket.ticket_id WHERE transaction.user_id = '$userID'";
			return $this->db->query($query);
		}
	}
?>
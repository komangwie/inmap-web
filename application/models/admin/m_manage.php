<?php
	/**
	* 
	*/
	class M_manage extends CI_Model
	{
		
		function get_request(){
			$query = "SELECT ticket.ticket_id, ticket.ticket_title, transaction.transaction_id, COUNT(transaction.ticket_id) as tot_request FROM transaction INNER JOIN ticket ON transaction.ticket_id = ticket.ticket_id WHERE transaction.status = 'wait_for_confirmation' AND transaction.payment_method = 'e_money' GROUP BY transaction.ticket_id";
			return $this->db->query($query);
		}

		function get_total_request(){
			$query = "SELECT COUNT(transaction.ticket_id) as tot_request FROM transaction INNER JOIN ticket ON transaction.ticket_id = ticket.ticket_id WHERE transaction.status = 'wait_for_confirmation' and transaction.payment_method = 'e_money'";
			return $this->db->query($query);
		}

		//get transaction by ticket id, multiple row
        function get_transaction_by_ticket($ticket_id){
            $query = "SELECT user.name, user.user_id, transaction.transaction_id, transaction.number_of_items, transaction.total_price, transaction.payment_method, transaction.status, transaction.transaction_time, transaction.img_confirmation FROM transaction INNER JOIN user ON transaction.user_id = user.user_id WHERE transaction.payment_method = 'e_money' and transaction.ticket_id = '$ticket_id'";
            return $this->db->query($query);
        }

        function confirm_transaction($tr_id, $dir, $user_id, $time){
        	$query = "update transaction set status = 'confirmed', bar_code = '$dir' where transaction_id = '$tr_id'";
        	$this->db->query($query);
        	$query = "insert into notifications(notif_type, content, user_id, sender_id, time) values('message', '$tr_id', '$user_id', '17', '$time')";
        	$this->db->query($query);
        }

        function reject_transaction($data, $where){
        	$this->db->update('transaction', $data, $where);
        }

        function get_success_transaction(){
        	// SELECT ticket.ticket_id, ticket.ticket_title, ticket.ticket_remaining , SUM(transaction.number_of_items) as number_of_ticket, SUM(transaction.total_price) as price, COUNT(transaction.ticket_id) as tot_buyer FROM transaction INNER JOIN ticket ON transaction.ticket_id = ticket.ticket_id WHERE transaction.status = 'confirmed' AND transaction.payment_method = 'e_money' or transaction.payment_method = 'ots' GROUP BY transaction.ticket_id
        	$this->db->select('ticket.ticket_id, ticket.ticket_title, ticket.ticket_remaining, COUNT(transaction.ticket_id) as tot_buyer');
        	$this->db->select_sum('transaction.number_of_items', 'number_of_ticket');
        	$this->db->select_sum('transaction.total_price', 'price');
        	$this->db->from('transaction');
        	$this->db->join('ticket', 'transaction.ticket_id = ticket.ticket_id');
        	$this->db->where("transaction.status", "confirmed");
        	$this->db->where('transaction.payment_method', 'e_money');
        	$this->db->group_by('transaction.ticket_id');
        	return $this->db->get();
        }

        function total_success_transaction(){
        	// SELECT SUM(transaction.number_of_items) as number_of_ticket, SUM(transaction.total_price) as price, COUNT(transaction.ticket_id) as tot_buyer FROM transaction INNER JOIN ticket ON transaction.ticket_id = ticket.ticket_id WHERE transaction.status = 'confirmed' AND transaction.payment_method = 'e_money'
        	$this->db->select_sum('transaction.number_of_items', 'number_of_ticket');
        	$this->db->select_sum('transaction.total_price', 'price');
        	$this->db->select(' COUNT(transaction.ticket_id) as tot_buyer');
        	$this->db->from('transaction');
        	$this->db->join('ticket', 'transaction.ticket_id = ticket.ticket_id');
        	$this->db->where('transaction.status', 'confirmed');
        	$this->db->where('transaction.payment_method', 'e_money');
        	return $this->db->get();
        }
	}

?>
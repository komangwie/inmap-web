<?php
	/**
	* 
	*/
	class M_create_event extends CI_Model
	{
		function get_category(){
            $query = 'select * from eventkategori where 1';
            $this->db->query($query);
			return $this->db->query($query);
        }
        
        function save_Event($title,$description,$dateStart,$dateEnd,$timeStart,$timeEnd,$videoUrl,$category,$type,$ticket,$userID, $dateNow){
            $query = "insert into event(title, 	description, video_url, type, kategori_id, ticket, dateStart, dateEnd, 	timeStart, timeEnd, status,user_id, post_time) values('$title','$description','$videoUrl','$type','$category','$ticket','$dateStart','$dateEnd','$timeStart','$timeEnd','offline','$userID','$dateNow')";
             $query2 = "select event_id from event where event_id= LAST_INSERT_ID()";
            $this->db->query($query);
            return $this->db->query($query2);
        }

        function save_edit_Event($title,$description,$dateStart,$dateEnd,$timeStart,$timeEnd,$videoUrl,$category,$type,$ticket,$userID, $dateNow, $id){
            if($type == "public"){
                if($ticket == "no"){
                    $check_yes = "select ticket from event where  event_id = '$id'";
                    $yes = $this->db->query($check_yes)->result_array();
                    if($yes[0]["ticket"] == "yes"){
                        $del = "delete from ticket where event_id = '$id'";
                        $this->db->query($del);
                    }
               }

               $check_private_before = "select type from event where event_id = '$id'";
               $res = $this->db->query($check_private_before)->result_array();
               if($res[0]["type"] == "private"){
                    $del = "delete from private_offline_friend where event_id = '$id'";
                    $this->db->query($del);
               }
            }
            else{
               $check_yes = "select ticket from event where  event_id = '$id'";
                    $yes = $this->db->query($check_yes)->result_array();
                    if($yes[0]["ticket"] == "yes"){
                        $del = "delete from ticket where event_id = '$id'";
                        $this->db->query($del);
                    }
            }
            // $des = mysqli_real_escape_string($description);
            $query = "update event set title = '$title',  description = '{$description}', video_url = '$videoUrl', type = '$type', kategori_id = '$category', ticket = '$ticket', dateStart = '$dateStart', dateEnd = '$dateEnd',  timeStart = '$timeStart', timeEnd = '$timeEnd', status = 'offline',user_id = '$userID', post_time = '$dateNow' where event_id = '$id'";
            return $this->db->query($query);
        }

        function save_image($event_id, $path){
        	$query = "insert into eventphoto(photo_url, event_id) values('$path', '$event_id')";
        	$this->db->query($query);
        }

        function save_ticket($event_id,$ticket_total, $maximum_order, $price, $ticket_title, $ticket_description, $fb, $email, $phone, $dateStart,$dateEnd,$timeStart,$timeEnd ){
            //first check if in the ticket table there ticket with event id (exist)
            //if exist update it, else insert new
            $q = "select event_id from ticket where event_id = '$event_id'";
            $check_exist = $this->db->query($q)->result_array();
            if(count($check_exist) > 0){
                $query = "update ticket set event_id = '$event_id', ticket_title = '$ticket_title', ticket_description = '$ticket_description', dateStart = '$dateStart', dateEnd = '$dateEnd', timeStart = '$timeStart', timeEnd = '$timeEnd', ticketTotal = '$ticket_total', max_order = '$maximum_order', ticket_remaining = '$ticket_total', price = '$price', email = '$email', facebook = '$fb', phone = '$phone'";
            }
            else{
                $query = "insert into ticket(event_id, ticket_title, ticket_description, dateStart, dateEnd, timeStart, timeEnd, ticketTotal, max_order, ticket_remaining, price, email, facebook, phone) values('$event_id','$ticket_title','$ticket_description','$dateStart','$dateEnd','$timeStart','$timeEnd','$ticket_total','$maximum_order','$ticket_total','$price','$email','$fb','$phone')";
            }
            $this->db->query($query);
        }

        function save_location($event_id, $adminArea, $address, $lat, $lng, $location_desc){
            $query = "insert into event_location(event_id, latitude, longitude, admin_area, address, address_description) values('$event_id', '$lat', '$lng', '$adminArea', '$address', '$location_desc')";
            $this->db->query($query);
        }

         function save_edit_location($event_id, $adminArea, $address, $lat, $lng, $location_desc){
            $query = "update event_location set event_id = '$event_id', latitude = '$lat', longitude = '$lng', admin_area = '$adminArea', address = '$address', address_description = '$location_desc' where event_id = '$event_id'";
            $this->db->query($query);
        }

        //method to save list frien that have direc invitation (event type private);
        function add_offline_friend($event_id,$friend){
            $query = "delete from private_offline_friend where event_id = '$event_id'";
            $this->db->query($query);
            $len = count($friend);
            for ($i=0; $i < $len; $i++) { 
                $fID = $friend[$i];
                $query = "insert into private_offline_friend(event_id, friend_id) values('$event_id', '$fID')";
                $this->db->query($query);
            }
        }

        function get_event_photo($id){
            $query = "SELECT eventphoto.photo_url FROM eventphoto WHERE eventphoto.event_id = '$id'";
            return $this->db->query($query);
        }

        function get_event_by_id($id){
            $query = "SELECT event.event_id, event.title, event.description, event.video_url, event.type, eventkategori.kategori_name, eventkategori.kategori_id, event.ticket, event.dateStart, event.dateEnd, event.timeStart, event.timeEnd, event.status, event.post_time, user.name, userphoto.original_photo FROM event INNER JOIN eventkategori on event.kategori_id = eventkategori.kategori_id INNER JOIN user ON event.user_id = user.user_id LEFT JOIN userphoto ON event.user_id = userphoto.user_id WHERE event.event_id  = '$id'";
            return $this->db->query($query);
        }

        function get_location_by_id($id){
            //at here add some query to retrive event location
            $query = "SELECT event_location.latitude, event_location.longitude, event_location.admin_area, event_location.address, event_location.address_description FROM event_location WHERE event_location.event_id = '$id'";
            return $this->db->query($query);
        }

        function get_ticket_event($id){
            $query = "SELECT ticket_id, ticket_title, ticket_description,ticketTotal, ticket_remaining, max_order, ticket_remaining, price, email, facebook, phone, dateStart, dateEnd, timeStart, timeEnd, event_location.address FROM ticket INNER JOIN event_location on ticket.event_id = event_location.event_id WHERE ticket.event_id = '$id'";
            return $this->db->query($query);
        }

        function get_list_friend($id){
            $query = "SELECT private_offline_friend_id, friend_id, user.name, userphoto.original_photo FROM private_offline_friend INNER JOIN user on private_offline_friend.friend_id = user.user_id LEFT JOIN userphoto ON private_offline_friend.friend_id = userphoto.user_id where private_offline_friend.event_id = '$id'";
            return $this->db->query($query);
        }

        function remove_event_image($id){
            $query = "delete from eventphoto where event_id = '$id'";
            $this->db->query($query);
        }

        function publish_event($id, $time, $userID){
            $query = "select type from event where event_id = '$id'";
            $res = $this->db->query($query)->result_array();
            if($res[0]["type"] == "private"){
                $query = "SELECT friend_id FROM private_offline_friend WHERE event_id = '$id'";
                $get_invited = $this->db->query($query)->result_array();
                $len = count($get_invited);
                for($i = 0 ; $i < $len; $i++){
                    $user_id = $get_invited[$i]["friend_id"];
                    $query = "insert into notifications(notif_type, content, user_id, sender_id,time) values('invitation', '$id', '$user_id', '$userID', '$time')";
                    $this->db->query($query);
                }
            }
            $query = "update event set status = 'online', post_time = '$time' where event_id = '$id'";
            $this->db->query($query);
        }

        function get_event_by_adminArea($area){
            $query = "SELECT event.title, event.event_id, event.dateStart, event.dateEnd, event.timeStart, event.timeEnd, event_location.address, event_location.latitude, event_location.longitude, eventkategori.kategori_name, eventphoto.photo_url, event_like.total_like, ticket.price FROM event_location INNER JOIN event on event_location.event_id = event.event_id INNER JOIN eventkategori on event.kategori_id = eventkategori.kategori_id INNER JOIN eventphoto on event_location.event_id = eventphoto.event_id LEFT JOIN event_like ON event_location.event_id = event_like.event_id LEFT JOIN ticket on event.event_id = ticket.event_id WHERE event_location.admin_area  = '$area' and event.type = 'public' and event.status = 'online' GROUP BY event_id DESC";
            return $this->db->query($query);
        }

        //like event
        function like_event($id, $userID){
            $query = "select event_like_id from event_like where event_id = '$id'";
            $res = $this->db->query($query)->result_array();
            if(count($res) > 0){

            }
            else{
                 $query = "insert into event_like(event_id) values('$id')";
                 $this->db->query($query);
            }
           $query = "insert into user_like(user_id, event_id) values('$userID', '$id')";
           $this->db->query($query);
        }

        //add views every click at home page
        function add_event_views($id, $userID){
            $query = "select event_view_id from event_view where event_id = '$id'";
            $res = $this->db->query($query)->result_array();
            if(count($res) > 0){

            }
            else{
                 $query = "insert into event_view(event_id) values('$id')";
                 $this->db->query($query);
            }
           $query = "insert into user_view_event(user_id, event_id) values('$userID', '$id')";
           $this->db->query($query);
        }

        //check is user already like the event or not yet
        function is_my_liked($userID, $event_id){
            $query = "select user_id from user_like where user_id = '$userID' and event_id = '$event_id' ";
            return $this->db->query($query);
        }

        //get the number of likes
        function get_number_like($id){
            $query = "select total_like from event_like where event_id = '$id' ";
            return $this->db->query($query);
        }

        //get the number of total vies
        function get_total_views($id){
             $query = "select total_view from event_view where event_id = '$id' ";
            return $this->db->query($query);
        }

        //save comment
        function post_comment($comment, $parent, $date, $userID){
            $query = "insert into comment(user_id, content, comment_time, parent_id) values('$userID','$comment', '$date','$parent')";
            $query2 = "select comment_id, comment_time, parent_id, content, userphoto.original_photo from comment LEFT JOIN userphoto ON comment.user_id = userphoto.user_id where comment_id = LAST_INSERT_ID()";
            $this->db->query($query);
            return $this->db->query($query2);
        }

        //get comment
        function count_comment($post_id){
        $query = "select user.name as username, comment.comment_id, comment.content, comment.comment_time, userphoto.original_photo from comment INNER JOIN user on comment.user_id = user.user_id LEFT JOIN userphoto ON comment.user_id = userphoto.user_id WHERE comment.parent_id = '$post_id'";
            return $this->db->query($query);
        }

        //check is the event is commented or not
        function check_comment($id){
            $query = "select comment_id from comment where parent_id = '$id'";
            return $this->db->query($query);
        }
        //save transaction
        function save_transaction($ticket_id, $unit_price, $total_price, $number_of_items, $userID, $time){
            $query = "INSERT INTO transaction(ticket_id, unit_price, total_price, number_of_items, user_id, transaction_time) VALUES('$ticket_id', '$unit_price', '$total_price', '$number_of_items', '$userID', '$time')";
            $query2 = "select transaction_id from transaction where transaction_id = LAST_INSERT_ID()";
            $this->db->query($query);
            return $this->db->query($query2);
        }

        //get transaction by id
        function get_transaction_by_id($tr_id){
            $query = "select * from transaction where transaction_id = '$tr_id'";
            return $this->db->query($query);
        }

        //get transaction by ticket id, multiple row
        function get_transaction_by_ticket($ticket_id){
            $query = "SELECT user.name, transaction.transaction_id, transaction.number_of_items, transaction.total_price, transaction.payment_method, transaction.status, transaction.transaction_time, transaction.exchange FROM transaction INNER JOIN user ON transaction.user_id = user.user_id WHERE transaction.ticket_id = '$ticket_id'";
            return $this->db->query($query);
        }

         //update transaction
        function update_transaction($tr_id, $total_price, $number_of_items, $time){
            $query = "UPDATE transaction SET transaction.total_price = '$total_price', transaction.number_of_items = '$number_of_items', transaction_time = '$time' WHERE transaction.transaction_id = '$tr_id'";
            $query2 = "select * from transaction where transaction_id = LAST_INSERT_ID()";
            $this->db->query($query);
            return $this->db->query($query2);
        }

        //confirm ots transaction
        function ots_confirm_transaction($tr_id, $dir, $time, $userID){
            $query =  "UPDATE transaction SET payment_method = 'ots', payment_confirmation = 'yes', status = 'confirmed', transaction_time = '$time', bar_code = '$dir' WHERE transaction.transaction_id = '$tr_id'";
            $this->db->query($query);
            $query = "insert into notifications(notif_type, content, user_id, sender_id, time) values('message', '$tr_id', '$userID', '17', '$time')";
            $this->db->query($query);
        }

        //udata data transaction after upload proff of payment tranfer
        function confirmation_transaction($tr_id, $path, $time){
            $query =  "UPDATE transaction SET payment_method = 'e_money', payment_confirmation = 'yes', img_confirmation = '$path', status = 'wait_for_confirmation', transaction_time = '$time' WHERE transaction.transaction_id = '$tr_id'";
            $this->db->query($query);
        }

        //check transaction by user
        //if user already have the same transaction before (already book ticket), then she/he will goto transaction page
        function check_transaction($userID, $id){
            $query = "SELECT transaction_id, ticket.event_id FROM transaction INNER JOIN ticket ON transaction.ticket_id = ticket.ticket_id WHERE transaction.user_id = '$userID' AND ticket.event_id = '$id'";
            return $this->db->query($query);
        }

        //confirmation last, ad the google adsense pages
        function free_ticket_save_transaction($tr_id, $time, $dir, $userID){
            $query = "UPDATE transaction SET payment_method = 'free', payment_confirmation = 'yes', status = 'confirmed', transaction_time = '$time', bar_code = '$dir' WHERE transaction.transaction_id = '$tr_id'";
            $this->db->query($query);
        }

        function search_in_transaction($text, $ticket_id){
            $s = "%". $text . "%";
            $query = "SELECT user.name, transaction.transaction_id, transaction.number_of_items, transaction.total_price, transaction.payment_method, transaction.status, transaction.transaction_time, transaction.exchange FROM transaction INNER JOIN user ON transaction.user_id = user.user_id WHERE user.name LIKE '$s' and transaction.ticket_id = '$ticket_id'";
            return $this->db->query($query);
        }

        function filter_payment($text, $ticket_id){
            $query = "SELECT user.name, transaction.transaction_id, transaction.number_of_items, transaction.total_price, transaction.payment_method, transaction.status, transaction.transaction_time, transaction.exchange FROM transaction INNER JOIN user ON transaction.user_id = user.user_id WHERE transaction.payment_method = '$text' and transaction.ticket_id = '$ticket_id'";
            return $this->db->query($query);
        }

        function filter_status($text, $ticket_id){
            $query = "SELECT user.name, transaction.transaction_id, transaction.number_of_items, transaction.total_price, transaction.payment_method, transaction.status, transaction.transaction_time, transaction.exchange FROM transaction INNER JOIN user ON transaction.user_id = user.user_id WHERE transaction.status = '$text' and transaction.ticket_id = '$ticket_id'";
            return $this->db->query($query);
        }

        function filter_exchange($text, $ticket_id){
            $query = "SELECT user.name, transaction.transaction_id, transaction.number_of_items, transaction.total_price, transaction.payment_method, transaction.status, transaction.transaction_time, transaction.exchange FROM transaction INNER JOIN user ON transaction.user_id = user.user_id WHERE transaction.exchange = '$text' and transaction.ticket_id = '$ticket_id'";
            return $this->db->query($query);
        }

        function filter_none($ticket_id){
            $query = "SELECT user.name, transaction.transaction_id, transaction.number_of_items, transaction.total_price, transaction.payment_method, transaction.status, transaction.transaction_time, transaction.exchange FROM transaction INNER JOIN user ON transaction.user_id = user.user_id WHERE transaction.ticket_id = '$ticket_id'";
            return $this->db->query($query);
        }

        //get sales report to user event dashboard/event stats
        function get_sales($id){
            $this->db->select('ticket.ticket_id, sum(transaction.total_price) as tot, transaction.unit_price');
            $this->db->from('transaction');
            $this->db->join('ticket', 'transaction.ticket_id = ticket.ticket_id');
            $this->db->where('ticket.event_id', $id);
            $this->db->where('transaction.status', 'confirmed');
            return $this->db->get();
        }

        function save_transaction_account($table, $data){
            $user_id = array('user_id' => $data['user_id']);
            $res = $this->db->get_where($table, $user_id)->result_array();
            if(count($res) > 0){
                $this->db->update($table, $data, $user_id);
            }
            else{
                $this->db->insert($table, $data);
            }
        }
	}
?>
<?php
	/**
	* 
	*/
	class M_user_profile extends CI_Model
	{
		function get_user_profile($id){
			$q = "select user.user_id, user.name, user.email, user.phone_number, user.gender, user.birthday, (select userphoto.original_photo FROM userphoto where userphoto.user_id = '$id') as photo from user where user.user_id = '$id'";
			 return $this->db->query($q);
		}

		function update_user($name, $email, $phone, $gender, $birthday, $id){
			$q = "update user set name = '$name', email = '$email', phone_number = '$phone', gender = '$gender', birthday = '$birthday' where user_id = '$id'";
			$this->db->query($q);
		}

		function check_profile($id){
			$q = "select original_photo from userphoto where user_id = '$id'";
			return $this->db->query($q);
		}

		function save_photo($id, $path){
			$q = "insert into userphoto(user_id, original_photo) values('$id','$path')";
			$this->db->query($q);
		}

		function update_photo($id, $path){
			$q = "update userphoto set original_photo = '$path' where user_id = '$id'";
			$this->db->query($q);
		}

		function get_user_by_name($userID,$name){
			$na = '%' . $name . '%';
			$q = "SELECT user.user_id, user.name, user.email, userphoto.original_photo as url FROM user LEFT JOIN userphoto ON user.user_id = userphoto.user_id WHERE user.name like '$na' and user.user_id != '$userID'";
			return $this->db->query($q);
		}

		function check_existing_fried($userID, $friendID){
			$q = "select user_id from infriend where user_id = '$userID' and friend_id = '$friendID'";
			return $this->db->query($q);
		}

		function add_to_friendList($userID, $friendID){
			$q = "insert into infriend(user_id, friend_id) values('$userID', '$friendID')";
			$this->db->query($q);
		}

		function get_friend_list($userID){
			$q = "SELECT infriend.infriend_id, infriend.friend_id, user.email, user.name, userphoto.original_photo FROM infriend INNER JOIN user ON infriend.friend_id = user.user_id LEFT JOIN userphoto on userphoto.user_id = infriend.friend_id WHERE infriend.user_id ='$userID'";
			return $this->db->query($q);
		}

		function delete_friend($id){
			$q = "delete from infriend where infriend_id = '$id'";
			$this->db->query($q);
		}

		function get_infriend_list($userID, $name){
			$name = "%" . $name . "%";
			$query = "SELECT user.name,infriend.friend_id, userphoto.original_photo FROM user INNER JOIN infriend ON infriend.friend_id = user.user_id LEFT JOIN userphoto ON infriend.friend_id = userphoto.user_id WHERE user.name like '$name' and infriend.user_id = '$userID'";
			return $this->db->query($query);
		}

		//get notifications from noofications table
		function get_notifications($userID){
			$query = "SELECT notifications.notifications_id, notifications.notif_type, notifications.content, notifications.sender_id, notifications.time, notifications.read_message, user.name, userphoto.original_photo FROM notifications INNER JOIN user ON notifications.sender_id = user.user_id LEFT JOIN userphoto ON notifications.sender_id = userphoto.user_id WHERE notifications.user_id = '$userID'";
			return $this->db->query($query);
		}

		//update yes/no in notifications table, refer that the notifications or message is read yet or not
		function read_notifications($userID, $id){
			$query = "update notifications set read_message = 'yes' where content = '$id' and user_id = '$userID'";
			$this->db->query($query);
		}

		
	}

?>
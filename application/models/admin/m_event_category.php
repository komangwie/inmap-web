<?php
	/**
	* 
	*/
	class M_event_category extends CI_Model
	{
		function get_category($start, $maxItemPerRow){
            $query = "select * from eventkategori limit $start, $maxItemPerRow";
            return $this->db->query($query);
        }

        function get_all_category(){
            $query = "select * from eventkategori where 1";
            return $this->db->query($query);
        }

        
        function add_new_category($name, $desc){
            $query = "insert into eventkategori(kategori_name, kategori_description) values('$name','$desc')";
            $query2 = "select * from eventkategori where kategori_id= LAST_INSERT_ID()";
            $this->db->query($query);
            return $this->db->query($query2);
           
        }

        function delete_category_event($event_id){
        	$query = "delete from eventkategori where kategori_id = '$event_id'";
        	return $this->db->query($query);
        }

        function get_event_by_id($id){
            $query = "select * from eventkategori where kategori_id = '$id'";
            return $this->db->query($query);
        }

        function edit_category($name, $desc,$id){
            $query = "update eventkategori set kategori_name = '$name', kategori_description = '$desc' where kategori_id='$id'";
            $query2 = "select * from eventkategori where kategori_id = '$id'";
            $this->db->query($query);
            return $this->db->query($query2);
        }
	}
?>
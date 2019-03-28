<?php 

class M_register extends CI_Model{	
	function register_user($table,$object){		
		return $this->db->insert($table, $object);
	}	
}

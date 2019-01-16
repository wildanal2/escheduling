<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user', $username);
		$this->db->where('pass', $password);
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}
 

} 
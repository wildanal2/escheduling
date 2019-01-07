<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function get_allagenda()
	{
		$query=$this->db->get('kegiatan');
       	return $query->result();
	}	

    

}
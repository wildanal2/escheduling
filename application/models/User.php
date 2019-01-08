<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function get_allagenda()
	{
		$query=$this->db->get('kegiatan');
       	return $query->result();
	}	

	public function getagendabupati()
	{
		$query=$this->db->query("SELECT * FROM `kegiatan` where level=1"); 
       	return $query->result();
	}	

	public function getagendakominfo()
	{
		$query=$this->db->query("SELECT * FROM `kegiatan` where level=2"); 
       	return $query->result();
	}	
    
    public function getagendaby($tgl)
	{
		$query=$this->db->query('SELECT * FROM `kegiatan` where day(tanggal_awal)='.$tgl);
		// $query->getfirstrow();
       	return $query->result();
	}	

}
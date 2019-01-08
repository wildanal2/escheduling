<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function get_allagenda()
	{
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->order_by('tanggal_awal', 'asc');
        $query= $this->db->get();
       	return $query->result();
	}	

	public function getagendabupati()
	{
		$query=$this->db->query("SELECT * FROM `kegiatan` where level=1 order by tanggal_awal ASC"); 
       	return $query->result();
	}	

	public function getagendakominfo()
	{
		$query=$this->db->query("SELECT * FROM `kegiatan` where level=2 order by tanggal_awal ASC"); 
       	return $query->result();
	}	
    
    public function getagendaby($tgl)
	{
		$query=$this->db->query('SELECT * FROM `kegiatan` where day(tanggal_awal)='.$tgl);
		// $query->getfirstrow();
       	return $query->result();
	}	

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function get_monthagenda()
	{ 
        $query=$this->db->query("SELECT * FROM `kegiatan` where month(tanggal_awal)=month(curdate()) and year(tanggal_awal)=year(curdate())  order by tanggal_awal ASC");
       	return $query->result();
	}	

	public function getweekagenda()
	{
		$query=$this->db->query("select * from (
								  SELECT * FROM `kegiatan` where month(tanggal_awal)=month(curdate()) and year(tanggal_awal)=year(curdate())  order by tanggal_awal ASC
								  ) as kegmonth where kegmonth.tanggal_akhir>= subdate(curdate(),1) and kegmonth.tanggal_awal<= date_add(curdate(),interval 3 day)  order by kegmonth.tanggal_awal asc "
								);
       	return $query->result();
	}

	public function getagendabupati()
	{
		$query=$this->db->query("SELECT * FROM `kegiatan` where level=1 and month(tanggal_awal)=month(curdate()) and year(tanggal_awal)=year(curdate()) order by tanggal_awal ASC"); 
       	return $query->result();
	}	

	public function getagendakominfo()
	{
		$query=$this->db->query("SELECT * FROM `kegiatan` where level=2 and month(tanggal_awal)=month(curdate()) and year(tanggal_awal)=year(curdate()) order by tanggal_awal ASC"); 
       	return $query->result();
	}

	public function getgalleryhome()
	{
		$query=$this->db->query("SELECT * FROM `galeri` order by tanggal ASC limit 6"); 
       	return $query->result();
	}


    
    public function getagendaby($tgl)
	{
		$query=$this->db->query('SELECT * FROM `kegiatan` where day(tanggal_awal)='.$tgl);
		// $query->getfirstrow();
       	return $query->result();
	}	

	public function getpengumumanmarque()
	{ 
        $query=$this->db->query("SELECT * FROM `pengumuman`  order by tanggal DESC");
       	return $query->result();
	}

}
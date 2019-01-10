<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

	public function getAllGallery()
	{
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->order_by('tanggal', 'asc');
        $query= $this->db->get();
       	return $query->result();
	}	

	public function gallerybyid($id)
	{
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->where('id_galery', $id);
        $query= $this->db->get();
        $row = $query->first_row();

       	return $row;
	}	

 	public function save_gallery($nama,$tag,$source){
 		date_default_timezone_set("Asia/Jakarta");
           
        $data = array(
                'nama'  => $nama,
                'tag'  => $tag, 
                'source'  => $source,
                'tanggal' => date("Y-m-d H-i-s")
            );
        $result=$this->db->insert('galeri',$data);
        return $result;
    }

    public function update_gallery($id,$nama,$tag,$source){
 		date_default_timezone_set("Asia/Jakarta");      
        $data = array(
                'nama'  => $nama,
                'tag'  => $tag, 
                'source'  => $source,
                'tanggal' => date("Y-m-d H-i-s")
            );
        $this->db->where('id_galery', $id);
        $result=$this->db->update('galeri',$data);

        return $result;
    }

    public function delete_galery($id)
	{
		$this->db->where('id_galery', $id);
		$result = $this->db->delete('galeri');
		return $result;
	}


}
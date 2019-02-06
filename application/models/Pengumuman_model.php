<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }

    public function get_all_pengumuman()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('tanggal',"desc");

        $query = $this->db->get('pengumuman');
        return $query->result();
    }

    public function get_pengumuman_home(){ 
        // $this->db->select('*');
        // $this->db->from('pengumuman');
        // $this->db->order_by('tanggal',"DESC");
        // // $this->db->limit(4);
        // $query= $this->db->get();
        $query= $this->db->query("SELECT * FROM `pengumuman` order by tanggal DESC limit 4");
        return $query->result();
    }

    public function create_pengumuman($judul,$isi)
    {
        $data = array(
            'judul'     => $judul,
            'isi'       => $isi
        );
        // menambahkan pengumuman
        return $this->db->insert('pengumuman', $data);
    }

    public function pengumumanbyjudul($judul)
    {      
        $this->db->select('*');
        $this->db->from('pengumuman');
        $this->db->where('judul', $judul);
        $query= $this->db->get();
        $row = $query->first_row();

        return $row;
    }   

    public function delete_pengumuman($id)
    {
        // menghapus pengumuman
        $this->db->where('id', $id);
        $result = $this->db->delete('pengumuman');
        return $result;
    }

    public function update_pengumuman($judul,$isi)
    {
        // mengedit pengumuman
        date_default_timezone_set("Asia/Jakarta"); 
        $data = array(
                'isi'  => $isi,
                'tanggal' => date("Y-m-d H-i-s")
            );
        $this->db->where('judul', $judul);
        $result=$this->db->update('pengumuman',$data);

        return $result;
    }


   



}
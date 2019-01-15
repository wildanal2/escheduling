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

    public function get_pengumuman_firstRow(){
        // Urutkan berdasar abjad
        $this->db->order_by('tanggal',"desc");

        $query = $this->db->get('pengumuman');
        $a = $query->first_row();
        return $a;
    }

    public function create_pengumuman()
    {
        $data = array(
            'judul'     => $this->input->post('judul'),
            'isi'       => $this->input->post('isi')
        );

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

    public function delete_pengumuman($judul)
    {
        $this->db->where('judul', $judul);
        $result = $this->db->delete('pengumuman');
        return $result;
    }

    public function update_pengumuman($judul,$isi){
        date_default_timezone_set("Asia/Jakarta"); 
        $data = array(
                'isi'  => $isi,
                'tanggal' => date("Y-m-d H-i-s")
            );
        $this->db->where('judul', $judul);
        $result=$this->db->update('pengumuman',$data);

        return $result;
    }


    public function get_count_pengumuman(){
        $query = $this->db->query("SELECT COUNT(*) as 'ok' FROM pengumuman");
       // return $query->result();
       // $query= $this->db->get();
        
        $row = $query->first_row();
        return $row;

    }

    public function get_count_week_pengumuman(){
        $query = $this->db->query("SELECT COUNT(*) as ok FROM pengumuman WHERE week(tanggal)=week(curdate())");
        $row = $query->first_row();
        return $row;
    }




}
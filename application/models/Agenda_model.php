<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }

    public function get_myagenda($month,$years)
    { 
        $query= $this->db->query("SELECT * FROM kegiatan join level on kegiatan.level= level.id WHERE month(tanggal_awal)=".$month." and year(tanggal_awal)= ".$years." order by tanggal_awal ASC");
        return $query->result();
    }

    public function get_monthagenda()
    { 
        $query= $this->db->query("SELECT * FROM `kegiatan` where month(tanggal_awal)=month(curdate()) and year(tanggal_awal)=year(curdate()) order by tanggal_awal ASC");
        return $query->result();
    }   

    public function newAgenda($nama,$keterangan,$tglmulai,$tglselesai,$agenda,$tglpost)
    {
        $data = array(
            'namaKegiatan'      => $nama,
            'keterangan'      => $keterangan,
            'tanggal_awal'      => $tglmulai,
            'tanggal_akhir'     => $tglselesai,
            'level'             => $agenda,
            'tanggal_post' => $tglpost

        );

        return $this->db->insert('kegiatan', $data);
    }


    public function updateAgenda($id,$nama,$keterangan,$tglmulai,$tglselesai,$agenda,$tglpost)
    {
        $data = array(
            'namaKegiatan'      => $nama,
            'keterangan'      => $keterangan,
            'tanggal_awal'      => $tglmulai,
            'tanggal_akhir'     => $tglselesai,
            'level'             => $agenda,
            'tanggal_post' => $tglpost

        );

        $this->db->where('id_k', $id);
        return $this->db->update('kegiatan', $data);
    }


    public function deleteAgenda($id)
    {
        $this->db->where('id_k', $id);
        $result = $this->db->delete('kegiatan');
        return $result;
    }


    public function generate_dropdown()
    {
        $this->db->select('level.id,
            level.nama
            ');
        $this->db->order_by('nama');

        $result = $this->db->get('level');

        $dropdown[''] = 'Pilih Agenda';

        if($result->num_row()>0){
            foreach ($$result->result_array() as $row) {
                $dropdown[$row['id']] = $row['nama'];
            }
        }
        return $dropdown;
    }

    public function get_all_level()
    {
        $query = $this->db->get('level');
        return $query->result();
    }

    public function get_level_by_id($id)
    {
        $query = $this->db->get_where('level', array('id' => $id));
        return $query->row();
    }

   




}
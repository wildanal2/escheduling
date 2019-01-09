<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }


    public function create_pengumuman()
    {
        $data = array(
            'namaKegiatan'      => $this->input->post('namaKegiatan'),
            'tanggal_awal'      => $this->input->post('tanggal_awal'),
            'tanggal_akhir'     => $this->input->post('tanggal_akhir'),
            'level'             => $this->input->post('level')

        );

        return $this->db->insert('kegiatan', $data);
    }


}
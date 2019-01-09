<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }


    public function create_pengumuman()
    {
        $data = array(
            'judul'     => $this->input->post('judul'),
            'isi'       => $this->input->post('isi')
        );

        return $this->db->insert('pengumuman', $data);
    }


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }



// =========================Agenda==========
    public function get_count_agenda(){
        $query = $this->db->query("SELECT COUNT(*) as ok FROM kegiatan"); 
        $row = $query->first_row();
        return $row;

    }

    public function get_count_week_agenda(){
        $query = $this->db->query("SELECT COUNT(*) as ok FROM kegiatan WHERE week(tanggal_awal)=week(curdate())");
        $row = $query->first_row();
        return $row;
    }

    public function get_count_month_agenda(){
        $query = $this->db->query("SELECT COUNT(*) as ok FROM kegiatan WHERE month(tanggal_awal)=month(curdate())");
        $row = $query->first_row();
        return $row;
    }





// =========================Galleri==========
    public function get_count_galeri(){
        $query = $this->db->query("SELECT COUNT(*) as ok FROM galeri");
       // return $query->result();
       // $query= $this->db->get();
        
        $row = $query->first_row();
        return $row;

    }

    public function get_count_week_galeri(){
        $query = $this->db->query("SELECT COUNT(*) as ok FROM galeri WHERE week(tanggal)=week(curdate())");
        $row = $query->first_row();
        return $row;
    }

    public function get_count_month_galeri(){
        $query = $this->db->query("SELECT COUNT(*) as ok FROM galeri WHERE month(tanggal)=month(curdate())");
        $row = $query->first_row();
        return $row;
    }



// ≥…“““‘‘æ……≥≥≥≥÷÷……………………………… Pengumuman.    
    public function get_count_pengumuman(){
        $query = $this->db->query("SELECT COUNT(*) as 'ok' FROM pengumuman");
        $row = $query->first_row();
        return $row;

    }

    public function get_count_week_pengumuman(){
        $query = $this->db->query("SELECT COUNT(*) as ok FROM pengumuman WHERE week(tanggal)=week(curdate())");
        $row = $query->first_row();
        return $row;
    }

    public function get_count_month_pengumuman(){
        $query = $this->db->query("SELECT COUNT(*) as ok FROM pengumuman WHERE month(tanggal)=month(curdate())");
        $row = $query->first_row();
        return $row;
    }

    



}

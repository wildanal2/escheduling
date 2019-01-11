<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('agenda_model');

	}

	public function index()
	{
		$data['level'] = $this->agenda_model->get_all_level();

		$this->load->view("agenda/header"); 
		$this->load->view('agenda/agenda_view',$data);
		$this->load->view("agenda/footer");
	}



	// Membuat fungsi create
	public function agendaBaru()
	{	 
		date_default_timezone_set("Asia/Jakarta");

		$tglpost = date("Y-m-d H:i:s");//new name
		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');
		$tglmulai = $this->input->post('mulai');
		$tglselesai = $this->input->post('selesai');
		$agenda = $this->input->post('agenda');


		$result = $this->agenda_model->newAgenda($nama,$keterangan,$tglmulai,$tglselesai,$agenda,$tglpost);

		echo json_encode($result);
	}



}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('agenda_model');
		if(!$this->session->userdata('escheduling_logged')){
					redirect('login/login');
		}

	}

	public function index()
	{
		$data['level'] = $this->agenda_model->get_all_level();

		$this->load->view("agenda/header"); 
		$this->load->view('agenda/agenda_view',$data);
		$this->load->view("agenda/footer");
	}

	public function getMyAgenda()
	{
		$month = $this->input->post('month_p');
		$year = $this->input->post('year_p');
        echo json_encode( $this->agenda_model->get_myagenda($month,$year));
	}

	public function getmonthAgenda()
	{
        echo json_encode( $this->agenda_model->get_monthagenda());
	}

	// Membuat fungsi create
	public function agendaBaru()
	{	 
		date_default_timezone_set("Asia/Jakarta");

		$tglpost = date("Y-m-d H:i:s");//new name
		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');
		$tglmulai = date( 'Y-m-d H:i:s', strtotime( $this->input->post('mulai') ) );
		$tglselesai = date( 'Y-m-d H:i:s', strtotime( $this->input->post('selesai') ) );
		$agenda = $this->input->post('level');

		$result = $this->agenda_model->newAgenda($nama,$keterangan,$tglmulai,$tglselesai,$agenda,$tglpost);

		echo json_encode($result);
	}

	// Membuat fungsi UPDATE
	public function agendaUpdate()
	{	 
		date_default_timezone_set("Asia/Jakarta");

		$tglpost = date("Y-m-d H:i:s");//new name
		$idk = $this->input->post('id_k');
		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');
		$tglmulai = date( 'Y-m-d H:i:s', strtotime( $this->input->post('mulai') ) );
		$tglselesai = date( 'Y-m-d H:i:s', strtotime( $this->input->post('selesai') ) );
		$agenda = $this->input->post('level');

		$result = $this->agenda_model->updateAgenda($idk,$nama,$keterangan,$tglmulai,$tglselesai,$agenda,$tglpost);
		if ($result) {
			echo json_encode("suc ");
		}else{
			echo json_encode("Gagal");
		}
		
	}

	// Membuat fungsi create
	public function agendaDelete()
	{	  
		$id = $this->input->post('id_k');

		$result = $this->agenda_model->deleteAgenda($id);
		echo json_encode($result);
	}

	public function getCountAgenda()
	{
		echo json_encode($this->agenda_model->get_count_agenda());
	}

	public function getCountWeekAgenda()
	{
		echo json_encode($this->agenda_model->get_count_week_agenda());
	}



}

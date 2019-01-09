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
		$this->load->view("header_footer/header_admin");
		// Passing data ke view
		$this->load->view('agenda/view');
		$this->load->view("header_footer/footer_admin");
	}



	// Membuat fungsi create
	public function create()
	{
		$data['page_title'] = 'Buat Agenda Baru';
		// Kita butuh helper dan library berikut
		$this->load->helper('form');
		$this->load->library('form_validation');

		// Form validasi untuk Nama Kategori
		$this->form_validation->set_rules(
			'judul',
			'Judul',
			'required|is_unique[pengumuman.judul]',
			array(
				'required' => 'Isi %s dulu',
				'is_unique' => 'Judul <strong>' . $this->input->post('judul') . '</strong> sudah .'
			)
		);

		if($this->form_validation->run() === FALSE){
			$this->load->view('header_footer/header_admin');
			$this->load->view('agenda/create', $data);
			$this->load->view('header_footer/footer_admin');
		} else {
			$this->pengumuman_model->create_agenda();
			redirect('agenda');
		}
	}
}

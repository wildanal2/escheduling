<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Load custom helper applications/helpers/MY_helper.php
		$this->load->helper('MY');
		
		$this->load->model('pengumuman_model');

	}
	public function tes()
	{
		$data['pengumuman'] = $this->pengumuman_model->get_all_pengumuman();
		echo json_encode($data);

	}

	public function index()
	{
		$data['page_title'] = 'Daftar Pengumuman'; 

		// Dapatkan semua kategori
		$data['pengumuman'] = $this->pengumuman_model->get_all_pengumuman();

		$this->load->view("header_footer/header_admin");
		// Passing data ke view
		$this->load->view('pengumuman/view', $data);
		$this->load->view("header_footer/footer_admin");
	}



	// Membuat fungsi create
	public function create()
	{
		$data['page_title'] = 'Buat Pengumuman Baru';
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
			$this->load->view('pengumuman/create', $data);
			$this->load->view('header_footer/footer_admin');
		} else {
			$this->pengumuman_model->create_pengumuman();
			redirect('pengumuman');
		}
	}
}

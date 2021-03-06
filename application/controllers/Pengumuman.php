<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Load custom helper applications/helpers/MY_helper.php
		// $this->load->helper('MY');
		$this->load->model('pengumuman_model');
	}
	public function getPengumuman()
	{

		$data= $this->pengumuman_model->get_all_pengumuman();
		echo json_encode($data);

	}
	public function getPengumumanHome()
	{
		$data= $this->pengumuman_model->get_pengumuman_home();
		echo json_encode($data);
	}

	public function index()
	{
		if(!$this->session->userdata('escheduling_logged')){
					redirect('login/login');
		}
		$data['page_title'] = 'Daftar Pengumuman'; 

		// Dapatkan semua kategori
		$data['pengumuman'] = $this->pengumuman_model->get_all_pengumuman();

		$this->load->view("pengumuman/header");
		// Passing data ke view
		$this->load->view('pengumuman/view', $data);
		$this->load->view("pengumuman/footer");
	}



	// Membuat fungsi create
	public function create()
	{


		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		
		$result = $this->pengumuman_model->create_pengumuman($judul,$isi);
		echo json_encode($result);
	}

	public function delete_pengumuman()
	{
		$id = $this->input->post('id');

		$data = $this->pengumuman_model->delete_pengumuman($id);
			echo json_encode($data);
		
	}
	// Membuat fungsi UPDATE
	public function pengumumanUpdate()
	{	 
		date_default_timezone_set("Asia/Jakarta");

		$judul = $this->input->post('judul_m');
		$isi = $this->input->post('pengumuman_m');
		
		$result = $this->pengumuman_model->update_pengumuman($judul,$isi);
		if ($result) {
			echo json_encode("suc");
		}else{
			echo json_encode("Gagal");
		}
	}

	public function getCountPengumuman()
	{
		echo json_encode($this->pengumuman_model->get_count_pengumuman());
	}

	public function getCountWeekPengumuman()
	{
		echo json_encode($this->pengumuman_model->get_count_week_pengumuman());
	}


}

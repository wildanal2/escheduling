<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');  		
	}

	public function index()
	{

		if ($this->session->userdata('escheduling_logged')) {
			$session_data = $this->session->userdata('escheduling_logged');
			$data['level'] = $session_data['level'];
			
			if ($data['level'] == 1) {
				redirect('Admin/home','refresh');
			}else{
				redirect('Login','refresh');	
			}

		}else {
			redirect('Login','refresh');
		}

	}

	public function home(){
		$data['agenda'] = $this->Admin_model->get_count_agenda();
		$data['w_agenda'] = $this->Admin_model->get_count_week_agenda();
		$data['m_agenda'] = $this->Admin_model->get_count_month_agenda();

		$data['galeri'] = $this->Admin_model->get_count_galeri();
		$data['w_galeri'] = $this->Admin_model->get_count_week_galeri();
		$data['m_galeri'] = $this->Admin_model->get_count_month_galeri();
		
		$data['pengumuman'] = $this->Admin_model->get_count_pengumuman();
		//echo json_encode($this->Admin_model->get_count_pengumuman());
		$data['w_pengumuman'] = $this->Admin_model->get_count_week_pengumuman();
		$data['m_pengumuman'] = $this->Admin_model->get_count_month_pengumuman();


		$this->load->view('header_footer/header_Admin');
		$this->load->view('admin/home_admin',$data);
		$this->load->view('header_footer/footer_Admin');
	}
 

	public function AgendaBupati()
	{
		$this->load->view('header_footer/header_Admin');
		$this->load->view('admin/agenda_bupati');
		$this->load->view('header_footer/footer_Admin');
	}

}
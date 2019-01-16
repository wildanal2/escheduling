<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function __construct()
	{
		parent::__construct();		
		
	}

	public function index()
	{
		$this->load->view('login/header_login');
		$this->load->view('login/login_view');
		$this->load->view('login/footer_login');
	}

	public function home()
	{
		$this->load->view('header_footer/header_Admin');
		$this->load->view('admin/home_admin');
		$this->load->view('header_footer/footer_Admin');
	}

	public function AgendaBupati()
	{
		$this->load->view('header_footer/header_Admin');
		$this->load->view('admin/agenda_bupati');
		$this->load->view('header_footer/footer_Admin');
	}

}
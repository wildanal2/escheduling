<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function login()
	{ 
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$output = array('error' => false);

		$result = $this->Login_model->login($username,$password);
		if ($result) { 
			$output['level'] = 1;
			$output['message'] = 'Prosess Masuk. Tunggu sebentar...';
		}else {
			$output['error'] = true;
			$output['message'] = 'Gagal masuk. User atau Password tidak terdaftar';
		}
		echo json_encode($output);
	}
 




	public function logout()
	{
		$this->session->unset_userdata('kostku_logged_in');
		$this->session->sess_destroy();
		redirect('Kostku','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
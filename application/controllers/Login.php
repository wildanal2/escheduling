<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index(){
		$this->load->view('login/header_login');
		$this->load->view('login/login_view');
		$this->load->view('login/footer_login');
	}

	public function login()
	{ 
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$output = array('error' => false);

		$result = $this->Login_model->login($username,$password);
		if ($result) { 
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id_user' => $row->id,
					'username' => $row->user,
					'level' => $row->level
				);	 
			} 
			$this->session->set_userdata('escheduling_logged',$sess_array );
			$output['level'] = 1;
			$output['message'] = 'Prosess Masuk. Tunggu sebentar...';
		}else {
			
			
			redirect('Admin', 'refreshe');
			// $output['error'] = true;
			// $output['message'] = 'Gagal masuk. User atau Password tidak terdaftar';
		}
		echo json_encode($output);
	}
 
	


	public function logout()
	{
		$this->session->unset_userdata('escheduling_logged');
		$this->session->sess_destroy();
		redirect('Admin','refresh');

	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
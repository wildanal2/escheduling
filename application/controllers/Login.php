<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function ceklogin()
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
			// set sesion logined
			$this->session->set_userdata('escheduling_logged',$sess_array); 
			$output['level'] = 1;
			$output['message'] = 'Prosess Masuk. Tunggu sebentar...';
			// unset attempt login unset
			$this->session->unset_userdata('escheduling_loginattempt');
		}else { 
			$output['error'] = true;
			$output['message'] = 'Gagal masuk. User atau Password tidak terdaftar';

			// mmembuat login attempt 
			// cek attempt
			if ($this->session->userdata('escheduling_loginattempt')) {
				$session_data = $this->session->userdata('escheduling_loginattempt'); 
				$sessattempt_array = array();
				// cek jika salah pwd lebih 5 kali
				if ($session_data['jumlah']>5) {
					$p =($session_data['penalty']*2);
					$sessattempt_array = array( 
											'jumlah' => $session_data['jumlah']+1,
											'penalty' => $p
										);	

					$output['message'] = 'User atau Password tidak terdaftar';
					// memasukkan data session
					$this->session->set_userdata('escheduling_loginattempt',$sessattempt_array );  
				}else if ($session_data['jumlah']==5) {
					$sessattempt_array = array( 
											'jumlah' => $session_data['jumlah']+1,
											'penalty' => 15
										);
					// memasukkan data session
					$this->session->set_userdata('escheduling_loginattempt',$sessattempt_array ); 
				}else{
					$sessattempt_array = array( 
											'jumlah' => $session_data['jumlah']+1,
											'penalty' => 0
										);
					// memasukkan data session
					$this->session->set_userdata('escheduling_loginattempt',$sessattempt_array ); 
				}
				
				// untuk mengirim informasi attempt login
				$output['jumlah'] = $session_data['jumlah'];
				$output['penalty'] = $session_data['penalty'];
			}else { 
				$sessattempt_array = array(
											'jumlah' => 1,
											'penalty' => 0
										);  
				// memasukkan data session
				$this->session->set_userdata('escheduling_loginattempt',$sessattempt_array );
			}

		}

		echo json_encode($output); 
	}
 
	// fungsi untuk mengecek upaya login
	public function cekattempt()
	{
		if ($this->session->userdata('escheduling_loginattempt')) {
			$session_data = $this->session->userdata('escheduling_loginattempt'); 
			
			// untuk mengirim informasi attempt login
			$output['jumlah'] = $session_data['jumlah'];
			$output['penalty'] = $session_data['penalty'];
		}else{
			$output['jumlah'] = 0;
		}
		echo json_encode($output); 
	}


	public function logout()
	{
		$this->session->unset_userdata('escheduling_logged');
		$this->session->sess_destroy();
		
		$this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

		redirect('Admin','refresh');

	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
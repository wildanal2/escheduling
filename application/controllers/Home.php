<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
 
 	public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('User');
	 }

	public function index()
	{
		$this->load->view('home');
	}

	public function getAgenda()
	{
        echo json_encode( $this->User->get_allagenda());
	}

	public function getAgendabupati()
	{
        echo json_encode( $this->User->getagendabupati());
	}

	public function getAgendakominfo()
	{
        echo json_encode( $this->User->getagendakominfo());
	}


	public function agendaby($tgl)
	{
        echo json_encode( $this->User->getagendaby($tgl));
	}


}

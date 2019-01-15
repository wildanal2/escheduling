<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
 
 	public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('User_model'); 
	 }

	public function index()
	{
		$this->load->view('home');
	}

	public function getWeekAgenda()
	{
        echo json_encode( $this->User_model->getweekagenda());
	}

	public function getAgenda()
	{
        echo json_encode( $this->User_model->get_allagenda());
	}

	public function getAgendabupati()
	{
        echo json_encode( $this->User_model->getagendabupati());
	}

	public function getAgendakominfo()
	{
        echo json_encode( $this->User_model->getagendakominfo());
	}

	public function getGalleryHome()
	{
        echo json_encode( $this->User_model->getgalleryhome());
	}

	public function getPengumumanfooter()
	{
        echo json_encode( $this->User_model->getpengumumanmarque());
	}




	public function agendaby($tgl)
	{
        echo json_encode( $this->User_model->getagendaby($tgl));
	}


}

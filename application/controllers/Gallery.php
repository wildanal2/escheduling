<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Gallery_model');

	}

	public function index()
	{
		$this->load->view("gallery/header"); 
		$this->load->view("gallery/view");
		$this->load->view("gallery/footer");
	}


	public function upload_gallery()
	{ 
		date_default_timezone_set("Asia/Jakarta");

		$new_name = date("Y-m-d-H-i-s");//new name

		$config['upload_path']="./assets/image/gallery"; //path folder file upload
		$config['allowed_types']='gif|jpg|png'; //type file yang boleh di upload
		$config['file_name'] = $new_name;  //set name

		$this->load->library('upload', $config); //call library upload

		if ($this->upload->do_upload("file")){ //upload file
			$data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload

			$nama = $this->input->post('nama'); //get nama
			$tag = $this->input->post('tag'); //get tag 
			// mendapatkan ekstensi file
            $path = $_FILES['file']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
			$source =  "gallery/".$new_name.".".$ext;  //set file name ke variable image 

			$this->Gallery_model->save_gallery($nama,$tag,$source); //kirim value ke model user_model	
		}
	}
 

	public function editGallery()
	{ 
		date_default_timezone_set("Asia/Jakarta");

		$id = $this->input->post('id_foto'); // id gal
		$nama = $this->input->post('nama_u'); //get nama
		$tag = $this->input->post('tag_u'); //get tag
		$fotolama = $this->input->post('fotolama');
		$new_name = date("Y-m-d-H-i-s");

		$config['upload_path']="./assets/image/gallery"; //path folder file upload
		$config['allowed_types']='gif|jpg|png'; //type file yang boleh di upload
		$config['file_name'] = $new_name;  //set name

		$this->load->library('upload', $config); //call library upload
		if ($this->upload->do_upload("file")){ //upload file
			$data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload

			// mendapatkan ekstensi file
            $path = $_FILES['file']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
			$source =  "gallery/".$new_name.".".$ext;  //set file name ke variable image 

			$data = $this->Gallery_model->update_gallery($id,$nama,$tag,$source); //kirim value ke model user_model	
			if ($data) {
				unlink('./assets/image/'.$fotolama);
				echo json_encode('sukses');
			}else{
				echo json_encode('gagalupload');
			}
		}else{
			$this->Gallery_model->update_gallery($id,$nama,$tag,$fotolama);
			echo json_encode('sukses');
		}

	}

	public function delete_foto()
	{
		$id = $this->input->post('id_gallery');
		// get data foto
		$foto = $this->Gallery_model->gallerybyid($id);

		$data = $this->Gallery_model->delete_galery($id);
		if ($data) {
			if ($foto!=null) {
				unlink('./assets/image/'.$foto->source);
				echo json_encode($data);
			}else{
				echo json_encode(false);
			}			
		}
		
	}
 

	public function getfotogalery()
	{ 
		$data=$this->Gallery_model->getAllGallery();
        echo json_encode($data);
	}

	public function getCountGaleri()
	{
		echo json_encode($this->Gallery_model->get_count_galeri());
	}

	public function getCountWeekGaleri()
	{
		echo json_encode($this->Gallery_model->get_count_week_galeri());
	}


 
}

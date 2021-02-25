<?php 

class Formislem extends CI_Controller
{

	public function index()
	{



		$this->load->view("form");
	}

	public function kaydet()
	{
		$isim = $this->input->post('isim'); //get ~ post
		$email = $this->input->post('email'); 
		$cinsiyet = $this->input->post('cinsiyet');
		echo $isim. " - ". $email . " - ". $cinsiyet;
	}

}




 ?>
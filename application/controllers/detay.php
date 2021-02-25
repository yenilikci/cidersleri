<?php 

class Detay extends CI_Controller{


	public function index()
	{
		echo "detay contollerının index metotu";
	}

	public function urun()
	{
		echo "detay contollerının urun metotu";
	}

	public function getParams($param1=null,$param2=null)
	{
		echo $param1+$param2;
	}

	public function getParameters()
	{
		//uri kullanımı: 
		//$sayi1 = $this->uri->segment(1); -> Detay
		$sayi1 = $this->uri->segment(2); //-> getParameters
		//$sayi1 = $this->uri->segment(3); //Detay/getParameters/2323 -> 2323
		echo $sayi1;
	}

}


 ?>
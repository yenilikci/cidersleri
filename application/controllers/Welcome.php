<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{

		$sayi1 = 5;
		$sayi2 = 10;
		$toplam = $sayi1 + $sayi2;

		$viewData = array();
		$viewData['sayi1'] = $sayi1;
		$viewData['sayi2'] = $sayi2;
		$viewData['toplam'] = $toplam;
		//view tarafında viewData isimli değişken bize $toplam isimli bir değişken olarak dönüşür

		/*
		$viewData = array(
			'sayi1' => $sayi1,
			'sayi2' => $sayi2,
			'toplam' => $toplam
		);	
		*/

		$personelListesi= array(

			array(
				"isim" => "melih çelik",
				"email" => "belih.celik@hotmail.com"
			),
			array(
				'isim' => "eleman2",
				'email' => "eleman2@hotmail.com"	
			)
		);

		$viewData['personelListesi'] = $personelListesi;

		//action içerisinde view yüklemek
		$this->load->view('personelListesi',$viewData);
	}

	//sitebane/controllerAdi/methodAdi

	public function getMessage()
	{
		 echo "bu diğer metottur";
	}

}

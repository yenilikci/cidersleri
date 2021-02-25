<?php 

class Dbislem extends CI_Controller
{

	public function index()
	{
		/*tüm kayıtları getirmek için
		$rows = $this->db->get("personel")->result();
		print_r($rows);
		*/
		
		/*
		tek sonuç getirir (id 1 olan il kayıtı)
		$rows = $this->db->get("personel")->row();
		print_r($rows);
		*/
		$rows = $this->db->get("personel")->result();
		$viewData = array(
			"rows" => $rows
		);
		$this->load->view('dbislem',$viewData);
	}

	public function where()
	{
		//$this->db->where(sütun,aranan); where normal and işlemi
		//personel tablosundan title değeri çalışan1 olan kayıtlar;
		$rows = $this->db->where("title","çalışan1")->get("personel")->result();


		/*
		örneğin id si 1 den büyük 3 den küçük olan kayıtlar
		$rows = $this->db->where("id>","1")->where("id<","3")->get("personel")->result();
		print_r($rows);
		*/
 

		/*
		detayı boş olmayan kayıtlar
		$rows = $this->db->where("detail !=","")->get("personel")->result();
		print_r($rows);
		*/


		/*sorguyu array şeklinde yapmak
		$where = array(
			"id > " => 1,
			"id < " => 3,
			"detail !=" => ""
		);
		$rows = $this->db->where($where)->get("personel")->result();
		print_r($rows);
		*/



		//sorguda veya (or) kullanma : bunun için or_where
		/*
		$where = array(
			"id > " => 1,
			"id < " => 3,
			"detail !=" => ""
		);
		$rows = $this->db->or_where($where)->get("personel")->result(); 
		print_r($rows);
		*/



		//sorguda in kullanma : bunun için where_in
		/*
		$rows = $this->db->where_in("title",array("çalışan1","çalışan2"))->get("personel")->result();
		print_r($rows);
		*/


		//sorguda or ve in kullanma : bunun için or_where_in
		/*
		$rows = $this->db->where("id",1)->or_where_in("title",array("çalışan1","çalışan2"))->get("personel")->result();
		print_r($rows);
		*/


		//sorguda where not in kullanma : bunun için where_not_in
		/*
		$rows = $this->db->where_not_in("title",array("çalışan1","çalışan2"))->get("personel")->result();
		print_r($rows);
		*/

		$viewData = array("rows" => $rows);
		$this->load->view("dbislem",$viewData);
	}


	public function like()
	{
		/*içinde calisan GEÇEN basliklara sahip kayıtlar :  where title like %calisan%
		$rows = $this->db->like("title","calisan")->get("personel")->result();
		print_r($rows);
		*/



		/*array şeklinde like kullanımı (hem title'da calisan gecen hem detail de an geçen)
		$like = array(
			"title" => "calisan",
			"detail" => "an"
		);

		$rows = $this->db->like($like)->get("personel")->result();
		//sorguyu görmek: $this->db->last_query();
		print_r($rows);,
		*/



		/*aramada or kullanma : bunun için or_like (title da calisan gecenler veya detail da an geçenler)
		$like = array(
			"title" => "calisan",
			"detail" => "an"
		);

		$rows = $this->db->or_like($like)->get("personel")->result();
		print_r($rows);
		*/



		/*aramada not kullanma : bunun için not_like (gibi değilse) (title da calisan gecmeyenler ve detail da an gecmeyenler)
		$like = array(
			"title" => "calisan",
			"detail" => "an"
		);

		$rows = $this->db->not_like($like)->get("personel")->result();
		print_r($rows);*/



		//aramada or ve not kullanma :  (title da calisan gecmeyenler veya detail da an gecmeyenler)
		$like = array(
			"title" => "calisan",
			"detail" => "an"
		);

		$rows = $this->db->or_not_like($like)->get("personel")->result();
		print_r($rows);
			
	}


	public function orderby()
	{
		//asc artan sırada , desc azalan sırada
		//title'a göre artan sırada
		$rows = $this->db->order_by("title","asc")->get("personel")->result();
		print_r($rows);

		//rastgele sıralama - random
		$rows = $this->db->order_by("id","random")->get("personel")->result();

		//birden fazla örneği
		$rows = $this->db->order_by("id","random")->order_by("title","asc")->get("personel")->result();

	}

	public function limit()
	{
		//kaç adet kayıt getireleceğini limit ile belirleyebiliriz
		$rows = $this->db->limit(1)->get("personel")->result();	
		print_r($rows);
	}

	public function query()
	{
		//select * from personel WHERE id > 1 and title LIKE "%etti%" ORDER BY id DESC LIMIT 1
		$rows = $this->db->where("id >","1")->like("title","an")->order_by("id","desc")->limit(1)->get("personel")->result();
		print_r($rows);

		//echo $this->db->last_query();
	}

	public function customquery()
	{
		$rows = $this->db->query("select * from personel WHERE id > 1 and 'title' LIKE '%an%' ORDER BY id DESC LIMIT 1")->result();
		print_r($rows);
	}


	public function insertPage()
	{
		$this->load->view("insert");
	}

	public function insert()
	{
		$title = $this->input->post("title");
		$detail = $this->input->post("detail");

		$data = array(
			'title' => $title,
			'detail' => $detail
		);

		//personel tabloma veriyi ekle
		$insert = $this->db->insert("personel",$data);

		echo $insert;
	}


	public function updatePage()
	{
		$this->load->view("update");
	}

	public function update()
	{
		$id = $this->input->post("id");
		$title = $this->input->post("title");
		$detail = $this->input->post("detail");

		$data = array(
			'title' => $title,
			'detail' => $detail
		);

		$update = $this->db->where("id",$id)->update("personel",$data);

		echo $update;
	}


	public function delete($id)
	{

		//$delete = $this->db->where("id",4)->delete("personel");
		$delete = $this->db->where("id",$id)->delete("personel");
		echo $delete;
	}
	


}




 ?>
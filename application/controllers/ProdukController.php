<?php

use \application\controllers\MainController;

class ProdukController extends MainController{
	
	function __construct(){
		$this->model('produk');
	}

	public function index(){
		$this->template('produk/index');
	}

	
	public function listData(){
		$query = $this->produk->selectAll();
		$list = $this->produk->getResult($query);
		$data = array();
		$no = 0;
		foreach ($list as $li) {
			# code...
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $li['nama_produk'];
			$row[] = $li['harga'];
			$row[] = "<a class='btn btn-primary' onclick='editForm(".$li['id_produk'].")'>edit</a>
			<a class='btn btn-primary' onclick='deleteData(".$li['id_produk'].")'>hapus</a>";

			$data[] =$row;
		}

		//var_dump($data);
		$output = array("data"=>$data);
		echo json_encode($output);

	}

	public function edit($id){
		$query = $this->produk->selectWhere(array('id_produk'=>$id));
		$data = $this->produk->getResult($query);
		echo json_encode($data[0]);
	}
	
	public function insert(){
		$data = array();
		var_dump($_POST['nama']);
		$data['nama_produk'] = $_POST['nama'];
		$data['harga'] = $_POST['harga'];

		//
		$simpan = $this->produk->insert($data);
	}

	public function update(){
		$data = array();
		//var_dump($data);
		$data['nama_produk'] = $_POST['nama'];
		$data['harga'] = $_POST['harga'];

		$id = $_POST['id'];

		$simpan = $this->produk->update($data, array('id_produk'=>$id));
	}

	public function delete($id){
		$hapus = $this->produk->delete(array('id_produk'=>$id));
	}
}

?>
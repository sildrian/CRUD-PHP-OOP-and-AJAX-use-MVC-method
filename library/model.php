<?php

namespace library;

class Model{
	
	protected $_dbHandle;
	protected $_table;

//koneksi ke database
	public function connect(){
		
		$this->_dbHandle = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		if(mysqli_connect_errno()){
			echo "Failed connect to database:" .mysqli_connect_errno();
		}
	}

	public function query($query){
		return mysqli_query($this->_dbHandle, $query);
	}


	public function getResult($mysqliQuery){
		$data = array();

		//var_dump($data);
		while ($record = mysqli_fetch_array($mysqliQuery)) {

			# code...
			array_push($data, $record);
		}

		return $data;
	}


	public function getRows($mysqliQuery){

		return mysqli_num_rows($mysqliQuery);
	}


	public function getError(){
		return mysqli_error($this->_dbHandle);
	}


	public function getId(){
		return mysqli_insert_id($this->_dbHandle);
	}


	public function selectAll($orderBy='', $order='ASC', $limit=''){
		$query = "SELECT * FROM " .$this->_table;

		if($orderBy != '') $query .= "ORDER BY $orderBy $order";
		if($limit != '') $query .=  "LIMIT $limit";

		//var_dump($query);

		return $this->query($query);
	}


	public function selectWhere($condition=array(), $orderBy='', $order='ASC', $limit=''){
		$query = "SELECT * FROM " .$this->_table;

		//var_dump($condition);

		if(is_array($condition)){
			$query .= " WHERE";

			//var_dump($query);
			foreach ($condition as $key => $val) {
			 	# code...
			 	$query .= " $key='$val' AND";
			 } 
			 $query = substr($query, 0, -3);
			 //var_dump($query);
		}

		if($orderBy != '') $query .= "ORDER BY $orderBy $order";
		if($limit != '') $query .=  "LIMIT $limit";

		return $this->query($query);

	}

	public function selectLike($condition='', $orderBy='', $order='ASC', $limit=''){

		$query = "SELECT * FROM " .$this->_table;

		if(is_array($condition)){
			$query .= "WHERE";
			foreach ($condition as $key => $val) {
				# code...
				$query .= "$key LIKE '$val' OR";
			}
			$query = substr($query, 0, -2);
		}

		if($orderBy != '') $query .= "ORDER BY $orderBy $order";
		if($limit != '') $query .=  "LIMIT $limit";

		return $this->query($query);
	}


	public function selectJoin($table, $join="JOIN", $param, $condition='', $orderBy='', $order='ASC', $limit=''){
		$query = "SELECT * FROM " .$this->_table;

		if(is_array($table)){
			foreach ($table as $tbl) {
				# code...
				$query .= "$join $tbl"; 
			}
		}else $query .= "$join $table";

		foreach ($param as $key => $val) {
			# code...
			$query .= "ON $key=$val";
		}

		if(is_array($condition)){
			$query .= "WHERE";

			foreach ($condition as $key => $val) {
				# code...
				$query .= "$key='$val' AND";
			}
			$query = substr($query, 0, -3);
		}

		if($orderBy != '') $query .= "ORDER BY $orderBy $order";
		if($limit != '') $query .=  "LIMIT $limit";

		return $this->query($query);
	}



	public function delete($condition){

		$query = "DELETE FROM " .$this->_table;

		if(is_array($condition)){
			$query .= " WHERE ";
			foreach ($condition as $key => $val) {
				# code...
				$query .= "$key='$val' AND ";
			}

			$query = substr($query, 0, -4);
			//var_dump($query);
		}
		//var_dump($query);
		return $this->query($query);
	}


	public function insert($data){

		$query = "INSERT INTO " .$this->_table . " SET ";

		foreach ($data as $key => $val) {
			# code...
			$query .= "$key='$val',";
		}

		var_dump($query);

		$query = substr($query, 0, -1);

		return $this->query($query);
	}


	public function update($data, $condition){
		$query = "UPDATE " .$this->_table. " SET ";
		//var_dump($query);

		foreach ($data as $key => $val) {
			# code...
			$query .= "$key='$val', ";
		}
		$query = substr($query, 0, -2);

		//var_dump($query);

		if (is_array($condition)) {
			# code...

			$query .= " WHERE ";
			foreach ($condition as $key => $val) {
				# code...
				$query .= "$key='$val' AND ";
			}
			$query = substr($query, 0, -4);
		}

		//var_dump($query);

		return $this->query($query);
	}

}

?>
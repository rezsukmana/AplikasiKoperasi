<?php
	class m_admin{

		public $table 	= 'admin';
		public $id 		= 'username';
		public $find 	= 'nama_admin';

		public function __construct(){
			$db = new setting;
			$db->koneksi();
		}

		public function select(){

			return mysql_query("SELECT * FROM $this->table");
		
		}

		public function insert($id,$password,$nama,$status){

			$cek = $this->edit($id);

			if (mysql_num_rows($cek)>0) {
			
				echo "<script>alert('Data Sudah Ada');</script>";
			
			}else{
			
				return mysql_query("INSERT INTO $this->table VALUES('$id','$password','$nama','$status')");

			}
		}

		public function delete($id){
		
			return mysql_query("DELETE FROM $this->table WHERE $this->id = '$id'");
		
		}

		public function edit($id){

			return mysql_query("SELECT * FROM $this->table WHERE $this->id = '$id'");
		}

		public function update($id,$nama,$status){

			return mysql_query("UPDATE $this->table SET nama_admin = '$nama', status = '$status' WHERE $this->id = '$id'");

		}

		public function find($find){
			return mysql_query("SELECT * FROM $this->table WHERE $this->find LIKE '%$find%'");
		}
	}
?>
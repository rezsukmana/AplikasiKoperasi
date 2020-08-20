<?php
	class m_anggota{

		public $table 	= 'anggota';
		public $id 		= 'id_anggota';
		public $find 	= 'nama';

		public function __construct(){
			$db = new setting;
			$db->koneksi();
		}

		public function select(){

			return mysql_query("SELECT * FROM $this->table");
		
		}

		public function insert($id,$nama,$alamat,$no_hp,$password){

			$cek = $this->edit($id);

			if (mysql_num_rows($cek)>0) {
			
				echo "<script>alert('Data Sudah Ada');</script>";
			
			}else{
			
				return mysql_query("INSERT INTO $this->table VALUES('$id','$nama','alamat','$no_hp','$password')");

			}
		}

		public function delete($id){
		
			return mysql_query("DELETE FROM $this->table WHERE $this->id = '$id'");
		
		}

		public function edit($id){

			return mysql_query("SELECT * FROM $this->table WHERE $this->id = '$id'");
		}

		public function update($id,$nama,$alamat,$no_hp){

			return mysql_query("UPDATE $this->table SET nama = '$nama', no_hp = '$no_hp', alamat = '$alamat' WHERE $this->id = '$id'");

		}

		public function find($find){
			return mysql_query("SELECT * FROM $this->table WHERE $this->find LIKE '%$find%'");
		}
	}
?>
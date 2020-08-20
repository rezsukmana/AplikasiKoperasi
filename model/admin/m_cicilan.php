<?php
	class m_cicilan{

		public $table 	= 'cicilan';
		public $id 		= 'peminjaman';
		public $find 	= 'peminjaman';

		public function __construct(){
			$db = new setting;
			$db->koneksi();
		}

		public function select($query=FALSE){

			return mysql_query("SELECT * FROM $this->table $query");
		
		}

		public function insert($id,$peminjaman,$cicilan,$perbulan){

			$cek = $this->select(" WHERE peminjaman = '$peminjaman'");

			if (mysql_num_rows($cek)>=3) {
			
				echo "<script>alert('Data Sudah Ada');</script>";
			
			}else{
			
				return mysql_query("INSERT INTO $this->table VALUES('$id','$peminjaman','$cicilan','$perbulan')");

			}
		}

		public function delete($id){
		
			return mysql_query("DELETE FROM $this->table WHERE $this->id = '$id'");
		
		}

		public function edit($id,$query=FALSE){

			return mysql_query("SELECT * FROM $this->table WHERE $this->id = '$id' $query");
		}

		public function update($pk,$id,$cicilan,$perbulan){

			return mysql_query("UPDATE $this->table SET $this->id = '$id', cicilan = '$cicilan', perbulan = '$perbulan' WHERE $this->id = '$pk'");

		}

		public function find($find){
			return mysql_query("SELECT * FROM $this->table WHERE $this->find LIKE '%$find%'");
		}
	}
?>
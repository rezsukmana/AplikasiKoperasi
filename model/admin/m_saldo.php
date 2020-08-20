<?php
	class m_saldo{

		public $table 	= 'saldo';
		public $id 		= 'id_saldo';
		public $find 	= 'id_anggota';

		public function __construct(){
			$db = new setting;
			$db->koneksi();
		}

		public function select(){

			return mysql_query("SELECT * FROM $this->table, anggota, admin WHERE $this->table.id_anggota = anggota.id_anggota AND $this->table.username = admin.username");
		
		}

		public function insert($id,$nama_matkul,$sks,$dosen){

			$cek = $this->edit($id);

			if (mysql_num_rows($cek)>0) {
			
				echo "<script>alert('Data Sudah Ada');</script>";
			
			}else{
			
				return mysql_query("INSERT INTO $this->table VALUES('$id','$nama_matkul','$sks','$dosen')");

			}
		}

		public function delete($id){
		
			return mysql_query("DELETE FROM $this->table WHERE $this->id = '$id'");
		
		}

		public function edit($id){

			return mysql_query("SELECT * FROM $this->table WHERE $this->id = '$id'");
		}

		public function update($id,$nama_matkul,$sks,$dosen){

			return mysql_query("UPDATE $this->table SET nama_matkul = '$nama_matkul', sks = '$sks', dosen = '$dosen' WHERE $this->id = '$id'");

		}

		public function find($find){

			return mysql_query("SELECT * FROM $this->table, anggota, admin WHERE $this->table.id_anggota = anggota.id_anggota AND $this->table.username = admin.username AND $this->table.$this->find = $find ORDER BY $this->table.id_saldo ASC");

		}
	}
?>
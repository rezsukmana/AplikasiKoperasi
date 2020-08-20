<?php
	class m_peminjaman{

		public $table 	= 'angsuran';
		public $id 		= 'id_peminjaman';
		public $find 	= 'id_peminjaman';

		public function __construct(){
			$db = new setting;
			$db->koneksi();
		}

		public function select($id){

			return mysql_query("SELECT $this->table.* ,anggota.nama FROM anggota, $this->table WHERE anggota.id_anggota = $this->table.id_anggota AND $this->table.id_peminjaman = '$id'");
		
		}

		public function insert($id,$kd,$kd_matkul,$na,$nt,$nuts,$nuas){

			$nakhir=(0.1*$na)+(0.2*$nt)+(0.3*$nuts)+(0.4*$nuas);

			$grade = $this->grade($nakhir);

			return mysql_query("INSERT INTO $this->table VALUES('$id','$kd','$kd_matkul','$na','$nt','$nuts','$nuas','$nakhir','$grade')");

		}

		public function delete($id){
		
			return mysql_query("DELETE FROM $this->table WHERE $this->id = '$id'");
		
		}

		public function edit($id){

			return mysql_query("SELECT * FROM $this->table, siswa, matakuliah WHERE $this->table.no = '$id' AND $this->table.id = siswa.id AND $this->table.kd_matkul = matakuliah.kd_matkul");
		}

		public function update($id,$kd,$kd_matkul,$na,$nt,$nuts,$nuas){

			$nakhir=(0.1*$na)+(0.2*$nt)+(0.3*$nuts)+(0.4*$nuas);

			$grade = $this->grade($nakhir);

			return mysql_query("UPDATE $this->table SET id = '$kd', kd_matkul = '$kd_matkul', na = '$na', nt = '$nt', nuts = '$nuts', nuas = '$nuas', nakhir= '$nakhir', grade = '$grade' WHERE $this->id = '$id'");

		}

		public function find($find){
			return mysql_query("SELECT * FROM $this->table , siswa, matakuliah WHERE $this->table.id = siswa.id AND $this->table.kd_matkul = matakuliah.kd_matkul AND siswa.nama LIKE '%$find%' OR siswa.id LIKE '%$find%' OR matakuliah.nama_matkul LIKE '%$find%' OR $this->table.dosen LIKE '%$find%'");
		}

		public function grade($nakhir){

			if ($nakhir>=80) {
				$grade="A";
			}elseif ($nakhir>=70) {
				$grade="B";
			}elseif ($nakhir>=50) {
				$grade="C";
			}elseif ($nakhir>=30) {
				$grade="D";
			}else{
				$grade="E";
			}

			return $grade;
		}
	}
?>
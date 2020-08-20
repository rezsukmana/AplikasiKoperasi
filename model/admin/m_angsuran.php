<?php
	class m_angsuran{

		public $table 	= 'angsuran';
		public $id 		= 'id_peminjaman';
		public $find 	= 'id_peminjaman';

		public function __construct(){
			$db = new setting;
			$db->koneksi();
		}

		public function select(){

			return mysql_query("SELECT * FROM $this->table, anggota WHERE $this->table.id_anggota = anggota.id_anggota");
		
		}

		public function insert($id_peminjaman,$id_anggota,$username,$angsuran_ke,$perbulan){

			$datetime	= date('Y-m-d H:i:s');
			$date 		= date('Y-m-d');

			$cari 		= $this->buka(" saldo order by id_saldo desc limit 1");
			$data 		= mysql_fetch_array($cari);
			$saldo 		= $data['saldo_perusahaan'] + $perbulan;
			$ket 		= strtoupper("ANGSURAN KE " .$angsuran_ke ." DARI ID PEMINJAMAN ".$id_peminjaman);

			mysql_query("INSERT INTO saldo VALUES(NULL,'pinjam','$username','$id_anggota','$datetime','0','$perbulan','$saldo','$ket')");

			return mysql_query("INSERT INTO $this->table VALUES(NULL,'$date','$id_peminjaman','$id_anggota','$username','$perbulan','$angsuran_ke')");

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
			return mysql_query("SELECT * FROM $this->table, anggota WHERE $this->table.id_anggota = anggota.id_anggota AND $this->find like '%$find%'");
		}

		public function buka($table){
			return mysql_query("SELECT * FROM $table");
		}
	}
?>
<?php
	class m_peminjaman{

		public $table 	= 'peminjaman';
		public $id 		= 'id_peminjaman';
		public $find 	= 'id_peminjaman';

		public function __construct(){
			$db = new setting;
			$db->koneksi();
		}

		public function select(){

			return mysql_query("SELECT * FROM $this->table, anggota WHERE $this->table.id_anggota = anggota.id_anggota");
						
		}

		public function insert($id_anggota,$user,$peminjaman,$cicilan){

			$datetime=date('Y-m-d H:i:s');
			$date=date('Y-m-d');
			
			//Cek Ketersediaan Saldo Perusahaan
			$dana = $this->buka("saldo ORDER BY id_saldo DESC LIMIT 1");
			$dana_row=mysql_fetch_array($dana);
			if ($peminjaman>=$dana_row['saldo_perusahaan']) {
				echo "Dana Kosong";
				return FALSE;
			}else{
				echo "Dana ada";
				
				//Creat ID Peminjaman
				$cek=$this->buka("peminjaman WHERE id_anggota='$id_anggota'");
				$id_peminjaman=$_POST['id_anggota'] ."-" .(mysql_num_rows($cek)+1);
				
				//Pengurangan Saldo
				$saldo=$dana_row['saldo_perusahaan'] - $peminjaman;
				mysql_query("INSERT INTO saldo VALUES(NULL,'PINJAM','$user','$id_anggota','$datetime','$peminjaman','0','$saldo','PINJAM')");
			}

			//Cari Perbulan
			$perbulan=$this->buka("cicilan WHERE peminjaman = '$peminjaman' AND cicilan = '$cicilan'");
			$perbulan_row=mysql_fetch_array($perbulan);
			$perbulan=$perbulan_row['perbulan'];

			return mysql_query("INSERT INTO $this->table VALUES('$id_peminjaman','$date','$id_anggota','$user','$peminjaman','$cicilan','$perbulan','BELUM')");

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
			return mysql_query("SELECT * FROM $this->table, anggota WHERE $this->table.id_anggota = anggota.id_anggota AND $this->table.id_peminjaman LIKE '%$find%'");
		}

		public function buka($table){
			return mysql_query("SELECT * FROM $table");
		}
	}
?>
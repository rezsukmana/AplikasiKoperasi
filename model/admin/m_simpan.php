<?php
	class m_simpan{

		public $table 	= 'simpan';
		public $id 		= 'id_simpan';
		public $find 	= 'id_anggota';

		public $debit;
		public $kridit;
		public $saldo;
		public $ket;
		
		public function __construct(){
			$db = new setting;
			$db->koneksi();
		}

		public function select(){

			return mysql_query("SELECT * FROM $this->table, anggota, admin WHERE $this->table.id_anggota = anggota.id_anggota AND $this->table.username = admin.username ORDER BY $this->table.id_simpan ASC");
		
		}

		public function insert($id,$aksi,$nominal){
			
				if ($aksi=="debet") {
					$this->debet=$nominal;
					$this->kridit=0;
					$this->ket=strtoupper($aksi);
				}elseif ($aksi=="kridit") {
					$this->debet=0;
					$this->kridit=$nominal;
					$this->ket=strtoupper($aksi);
				}else{
					return FALSE;
				}

				$query_simpan	= $this->where("simpan","id_anggota",$id, "ORDER BY id_simpan DESC limit 1");
				$data			= mysql_fetch_array($query_simpan);
				
				$query_saldo	= mysql_query("SELECT * FROM saldo ORDER BY id_saldo DESC limit 1");
				$data_saldo		= mysql_fetch_array($query_saldo);
				
				if ($aksi=="kridit") {
					if ($this->kridit>$data['saldo_anggota']) {
						echo "<script>alert('Dana Anda Tidak Cukup');location='?mod=simpan'</script>";
						return FALSE;
					}					
				}
				if ($aksi=="kridit") {
					if ($this->kridit > $data_saldo['saldo_perusahaan']) {
						echo "<script>alert('Saldo Perusahaan Kosong');location='?mod=simpan'</script>";
						return FALSE;
					}					
				}
				
				$this->saldo 	= $data['saldo_anggota'] + $this->debet - $this->kridit;
				$date 			= date("Y-m-d H:i:s");

				//echo "$_SESSION[user] <> $id <> $date <> $this->debet <> $this->kridit <> $this->saldo <> $this->ket";

				mysql_query("INSERT INTO $this->table VALUES(NULL,'$_SESSION[user]','$id','$date','$this->debet','$this->kridit','$this->saldo','$this->ket')");

				$this->saldo 	= $data_saldo['saldo_perusahaan'] + $this->debet - $this->kridit;
				$this->ket 		= $this->ket ." DARI AKUN " .$id;

				mysql_query("INSERT INTO saldo VALUES(NULL,'SIMPAN','$_SESSION[user]','$id','$date','$this->kridit','$this->debet','$this->saldo','$this->ket')");

				return "<script>location='?mod=simpan'</script>";
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

			return mysql_query("SELECT * FROM $this->table, anggota, admin WHERE $this->table.id_anggota = anggota.id_anggota AND $this->table.username = admin.username AND $this->table.$this->find = $find ORDER BY $this->table.id_simpan ASC");

		}
		
		public function where($table,$pk,$id,$query=FALSE){

			return mysql_query("SELECT * FROM $table WHERE $pk = '$id' $query");
		
		}
	}
?>
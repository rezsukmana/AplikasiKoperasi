<?php
	session_start();
	
	class setting{
		//Setting APPS
		public $app_name	= "Sistem Informasi Koperasi";
		public $app_ver		= "v 1.0 Betta";
		public $app_dev		= "Anak Pintar";
		public $app_dev_web	= "https://www.bsi.ac.id/";
		public $app_year	= "2017";

		//Setting Database
		private $server	= "localhost";
		private $host	= "root";
		private $pwd	= "";
		private $db 	= "db_koperasi";

		//Proses Sistem Simpan Pinjam Koperasi
		public $debit	= 0;
		public $kridit	= 0;
		public $saldo	= 0;
		public $ket		= "";

		function koneksi(){
		
			mysql_connect($this->server,$this->host,$this->pwd) or die("Not Connected");
		
			mysql_select_db($this->db) or die("Not Database Selected");
		
		}

		function view($file){

			return include "view/".$file .".php";
		
		}

		function login($id, $password, $level){

			$this->koneksi();			
			$password= md5($password);
			
			if ($level == "admin") {
				
				$query= mysql_query("SELECT * FROM admin WHERE username = '$id' AND password = '$password' AND status='aktif'");
				$row= mysql_fetch_array($query);
				$num= mysql_num_rows($query);

				if ($num==1) {
					
					$_SESSION['login']	= TRUE;
					$_SESSION['level']	= "admin";
					$_SESSION['user'] 	= $row['username'];
					$_SESSION['nama']	= $row['nama_admin'];
					return TRUE;

				}else{

					return FALSE;
				
				}

			}elseif ($level == "client") {

				$query= mysql_query("SELECT * FROM anggota WHERE id_anggota = '$id' AND password = '$password'");
				$row= mysql_fetch_array($query);
				$num= mysql_num_rows($query);

				if ($num==1) {
					
					$_SESSION['login']	= TRUE;
					$_SESSION['level']	= "client";
					$_SESSION['id'] 	= $row['id_anggota'];
					$_SESSION['nama']	= $row['nama'];
					return TRUE;

				}else{

					return FALSE;
				
				}
			}
		}

		function session(){
		
			return $_SESSION['login'];
		
		}

		function logout(){

			$_SESSION['login'] = FALSE;
			session_destroy();
			echo "<script>location='index.php';</script>";
		
		}

		public function select($table){

			return mysql_query("SELECT * FROM $table");

		}

		public function where($table,$pk,$id,$query=FALSE){

			return mysql_query("SELECT * FROM $table WHERE $pk = '$id' $query");
		
		}

		function proses_simpan($id,$aksi,$nominal){

			if ($aksi=="debit") {
				$this->debit 	= $nominal;
				$this->kridit 	= 0;
			}elseif ($aksi=="kridit") {
				$this->debet 	= 0;
				$this->kridit 	= $nominal;
			}

			$data 				= $this->where("simpan","id_anggota",$id,"ORDER BY id_simpan DESC LIMIT 1");
			$row 				= mysql_fetch_array($data);
			$this->saldo 		= $row['saldo_anggota'] + $this->debit - $this->kridit;
			$this->ket 			= strtoupper($aksi);

		}
	}
?>
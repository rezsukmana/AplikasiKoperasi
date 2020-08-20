<?php
	error_reporting(0);
	include 'setting.php';

	$db	= new setting;

	if ($db->session()) {

		if (isset($_GET['mod'])) {
			$mod=$_GET['mod'];
		}else{
			$mod="home";
		}	

		if (isset($_GET['aksi'])) {
			$aksi=$_GET['aksi'];
		}else{
			$aksi="view";
		}

		if ($_SESSION['level']=="admin") {
			
			$db->view("admin/head");
			$db->view("admin/header");
			$db->view("admin/sidebar");

			$db->view("admin/mod$mod/$aksi");

			$db->view("admin/footer");

		}elseif ($_SESSION['level']=="client") {
			
			$db->view("client/head");
			$db->view("client/header");
			$db->view("client/sidebar");

			$db->view("client/mod$mod/$aksi");

			$db->view("client/footer");

		}else{
			$db->logout();
		}

	}elseif ($_SERVER["REQUEST_METHOD"]=="POST"){

		$login = $db->login($_POST['id'],$_POST['password'],$_POST['level']);

		if ($login) {
		
			echo "<script>alert('welcome');location='index.php'</script>";
		
		}else{
			
			echo "<script>alert('Wrong');location='index.php'</script>";
		
		}
	
	}elseif (isset($_GET['login'])) {

		if ($_GET['login']=="admin") {
		
			$db->view("admin/login");
		
		}elseif ($_GET['login']=="client") {
		
			$db->view("client/login");
		
		}
	
	}else{
		
		$db->view("dashboard/index");

	}
?>
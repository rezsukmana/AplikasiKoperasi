
<?php
	include 'model/admin/m_angsuran.php';
	$angsuran = new m_angsuran;

	if (isset($_POST['save'])) {
		
		if ($_POST['save']=="save") {
		
			$angsuran->insert($_POST['id_peminjaman'],$_POST['id_anggota'],$_SESSION['user'],$_POST['angsuran_ke'],$_POST['perbulan']);
		
			?>
		
				<script>location="?mod=angsuran&aksi=view"</script>	
		
			<?php
		
		}
	
	}

	if (isset($_POST['id_peminjaman'])) {
		$id_peminjaman	= $_POST['id_peminjaman'];

		$cari2			= $angsuran->buka("angsuran WHERE angsuran.id_peminjaman = '$id_peminjaman'");
		$angsuran_ke 	= mysql_num_rows($cari2) + 1;
		echo $angsuran_ke;

		if ($angsuran_ke>1) {
			$cari 			= $angsuran->buka("angsuran, peminjaman, anggota WHERE angsuran.id_peminjaman = '$id_peminjaman' AND angsuran.id_peminjaman = peminjaman.id_peminjaman AND peminjaman.id_anggota = anggota.id_anggota");
		}else{
			$cari 			= $angsuran->buka("peminjaman, anggota WHERE peminjaman.id_anggota = anggota.id_anggota AND peminjaman.id_peminjaman='$id_peminjaman'");
		}
		
		$data 			= mysql_fetch_array($cari);

		

		if ($angsuran_ke>$data['cicilan']) {
			?>
				<script type="text/javascript">
					alert("Anda Sudah Lunas");
					//location:"?mod=angsuran";
				</script>
			<?php
		}
		//print_r($data);
	}else{
		?>
			<script type="text/javascript">
				alert("Data Tidak Ada");
				location:"?mod=angsuran";
			</script>
		<?php
	}
	
?>

<form method="post" action="?mod=angsuran&aksi=add">
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>ID Peminjaman</td>
			<td>
				<input type="text" value="<?php echo $id_peminjaman ?>" placeholder="ID Peminjaman" required class="col-sm-12" disabled>
				<input type="hidden" name="id_peminjaman" value="<?php echo $id_peminjaman ?>" required>
			</td>
		</tr>
		<tr>
			<td>ID Anggota</td>
			<td>
				<input type="text" value="<?php echo $data['id_anggota'] ?>" placeholder="ID Anggota" required class="col-sm-12" disabled>
				<input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota'] ?>" required>
			</td>
		</tr>
		<tr>
			<td>Nama Peminjam</td>
			<td>
				<input type="text" value="<?php echo $data['nama'] ?>" placeholder="Nama Anggota" required class="col-sm-12" disabled>
				<input type="hidden" name="nama" value="<?php echo $data['nama'] ?>" required>
			</td>
		</tr>
		<tr>
			<td>Angsuran Ke</td>
			<td>
				<input type="text" value="<?php echo $angsuran_ke ?>" placeholder="Nama Anggota" required class="col-sm-12" disabled>
				<input type="hidden" name="angsuran_ke" value="<?php echo $angsuran_ke ?>" required>
			</td>
		</tr>
		<tr>
			<td>Angsuran</td>
			<td>
				<input type="text" value="<?php echo $data['perbulan'] ?>" placeholder="Nama Anggota" required class="col-sm-12" disabled>
				<input type="hidden" name="perbulan" value="<?php echo $data['perbulan'] ?>" required>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="hidden" name="save" value="save">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary"> 
				<a href="?mod=angsuran" title="Batal" class="btn btn-danger">Batal</a>
			</td>
		</tr>
	</table>
</form>
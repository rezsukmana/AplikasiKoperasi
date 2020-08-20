
<?php
	include 'model/admin/m_anggota.php';
	$anggota 	= new m_anggota;

	if (isset($_POST['update'])) {
		
		if ($_POST['update']=="update") {
		
			$anggota->update($_POST['id_anggota'],strtoupper($_POST['nama']),strtoupper($_POST['alamat']),$_POST['no_hp']);

			?>
		
				<script>location="?mod=anggota&aksi=view"</script>
		
			<?php
		
		}
	
	}else{
		
		$query	= $anggota->edit($_GET['id']);
		$row	= mysql_fetch_array($query);
		
		?>
		<form method="post" action="?mod=anggota&aksi=edit">
			<table class="table table-striped table-bordered table-hover">
				<tr>
					<td>ID anggota</td>
					<td>
						<input type="text" placeholder="ID anggota" required disabled value="<?php echo $row['id_anggota'] ?>" class="col-sm-12">
						<input type="hidden" name="id_anggota" required value="<?php echo $row['id_anggota'] ?>">
					</td>
				</tr>
				<tr>
					<td>Nama</td>
					<td><input type="text" name="nama" placeholder="Nama" required value="<?php echo $row['nama'] ?>" class="col-sm-12"></td>
				</tr>
				<tr>
					<td>No. Telp</td>
					<td><input type="text" name="no_hp" placeholder="No. Telp" required value="<?php echo $row['no_hp'] ?>" class="col-sm-12"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><textarea name="alamat" placeholder="Alamat" required class="col-sm-12"><?php echo $row['alamat']; ?></textarea></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="update" value="update">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary"> 
						<a href="?mod=anggota" title="Batal" class="btn btn-danger">Batal</a>
					</td>
				</tr>
			</table>
		</form>
		<?php
	}
	
?>
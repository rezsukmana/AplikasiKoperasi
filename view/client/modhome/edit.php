<!--
<?php
/*
	include 'model/admin/m_siswa.php';
	$siswa 	= new m_siswa;

	if (isset($_POST['update'])) {
		
		if ($_POST['update']=="update") {
		
			$siswa->update($_POST['id'],$_POST['nama'],$_POST['tempt_lahir'],$_POST['tgl_lahir'],$_POST['alamat'],$_POST['telpon']);

			?>
		
				<script>location="?mod=siswa&aksi=view"</script>
		
			<?php
		
		}
	
	}else{
		
		$query	= $siswa->edit($_GET['id']);
		$row	= mysql_fetch_array($query);
		
		?>
		<form method="post" action="?mod=siswa&aksi=edit">
			<table class="table table-striped table-bordered table-hover">
				<tr>
					<td>ID Siswa</td>
					<td>
						<input type="text" placeholder="ID Siswa" required disabled value="<?php echo $row['id'] ?>" class="col-sm-12">
						<input type="hidden" name="id" required value="<?php echo $row['id'] ?>">
					</td>
				</tr>
				<tr>
					<td>Nama</td>
					<td><input type="text" name="nama" placeholder="Nama" required value="<?php echo $row['nama'] ?>" class="col-sm-12"></td>
				</tr>
				<tr>
					<td>Tempat Lahir</td>
					<td><input type="text" name="tempt_lahir" placeholder="Tempat lahir" required value="<?php echo $row['tempt_lahir'] ?>" class="col-sm-12"></td>
				</tr>
				<tr>
					<td>Tgl Lahir</td>
					<td><input type="date" name="tgl_lahir" placeholder="Tgl Lahir" required value="<?php echo $row['tgl_lahir'] ?>" class="col-sm-12"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><textarea name="alamat" placeholder="Alamat" required class="col-sm-12"><?php echo $row['alamat']; ?></textarea></td>
				</tr>
				<tr>
					<td>Telp</td>
					<td><input type="text" name="telpon" placeholder="Telp" required value="<?php echo $row['telpon'] ?>" class="col-sm-12"></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="update" value="update">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary"> 
						<a href="?mod=admin" title="Batal" class="btn btn-danger">Batal</a>
					</td>
				</tr>
			</table>
		</form>
		<?php
	}
*/	
?>
-->
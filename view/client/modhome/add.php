<!--
<?php
/*
	include 'model/admin/m_siswa.php';
	$siswa = new m_siswa;

	if (isset($_POST['save'])) {
		
		if ($_POST['save']=="save") {
		
			$siswa->insert($_POST['id'],$_POST['nama'],$_POST['tempt_lahir'],$_POST['tgl_lahir'],$_POST['alamat'],$_POST['telpon']);
		
			?>
		
				<script>location="?mod=siswa&aksi=view"</script>	
		
			<?php
		
		}
	
	}
*/	
?>

<form method="post" action="?mod=siswa&aksi=add">
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>ID Siswa</td>
			<td><input type="text" name="id" placeholder="ID Siswa" required class="col-sm-12"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" placeholder="Nama" required class="col-sm-12"></td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td><input type="text" name="tempt_lahir" placeholder="Tempat lahir" required class="col-sm-12"></td>
		</tr>
		<tr>
			<td>Tgl Lahir</td>
			<td><input type="date" name="tgl_lahir" placeholder="Tgl Lahir" required class="col-sm-12"></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><textarea name="alamat" placeholder="Alamat" required class="col-sm-12"></textarea></td>
		</tr>
		<tr>
			<td>Telp</td>
			<td><input type="text" name="telpon" placeholder="Telp" required class="col-sm-12"></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="hidden" name="save" value="save">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary"> 
				<a href="?mod=admin" title="Batal" class="btn btn-danger">Batal</a>
			</td>
		</tr>
	</table>
</form>
-->
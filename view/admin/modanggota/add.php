
<?php
	include 'model/admin/m_anggota.php';
	$anggota = new m_anggota;

	if (isset($_POST['save'])) {
		
		if ($_POST['save']=="save") {
		
			$anggota->insert($_POST['id_anggota'],strtoupper($_POST['nama']),strtoupper($_POST['alamat']),$_POST['no_hp'],md5("123456"));
		
			?>
		
				<script>location="?mod=anggota&aksi=view"</script>	
		
			<?php
		
		}
	
	}
	
?>

<form method="post" action="?mod=anggota&aksi=add">
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>ID anggota</td>
			<td><input type="text" name="id_anggota" placeholder="ID anggota" required class="col-sm-12"></td>
		</tr>
		<tr>
			<td>Nama Anggota</td>
			<td><input type="text" name="nama" placeholder="Nama" required class="col-sm-12"></td>
		</tr>
		<tr>
			<td>No. Telp</td>
			<td><input type="text" name="no_hp" placeholder="No. Telp" required class="col-sm-12"></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><textarea name="alamat" placeholder="Alamat" required class="col-sm-12"></textarea></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="hidden" name="save" value="save">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary"> 
				<a href="?mod=anggota" title="Batal" class="btn btn-danger">Batal</a>
			</td>
		</tr>
	</table>
</form>
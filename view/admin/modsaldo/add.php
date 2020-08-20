<!--
<?php
/*
	include 'model/admin/m_matkul.php';
	$matkul = new m_matkul;

	if (isset($_POST['save'])) {
		
		if ($_POST['save']=="save") {
		
			$matkul->insert($_POST['kd_matkul'],$_POST['nama_matkul'],$_POST['sks'],$_POST['dosen']);
		
			?>
		
				<script>location="?mod=matkul&aksi=view"</script>	
		
			<?php
		
		}
	
	}
*/	
?>

<form method="post" action="?mod=matkul&aksi=add">
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>KD matkul</td>
			<td><input type="text" name="kd_matkul" placeholder="KD matkul" required class="col-sm-12"></td>
		</tr>
		<tr>
			<td>Nama Matkul</td>
			<td><input type="text" name="nama_matkul" placeholder="Nama Matkul" required class="col-sm-12"></td>
		</tr>
		<tr>
			<td>SKS</td>
			<td><input type="number" name="sks" placeholder="SKS" required class="col-sm-12"></td>
		</tr>
		<tr>
			<td>Nama Dosen</td>
			<td><input type="text" name="dosen" placeholder="Nama Dosen" required class="col-sm-12"></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="hidden" name="save" value="save">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary"> 
				<a href="?mod=matkul" title="Batal" class="btn btn-danger">Batal</a>
			</td>
		</tr>
	</table>
</form>
-->
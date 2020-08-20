
<?php
	include 'model/admin/m_simpan.php';
	$simpan = new m_simpan;
	$anggota = $this->select("anggota");

	if (isset($_POST['save'])) {
		
		if ($_POST['save']=="save") {
		
			$simpan->insert($_POST['id_anggota'],$_POST['aksi'],$_POST['nominal']);
				
		}
	
	}
	
?>

<form method="post" action="?mod=simpan&aksi=add">
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>Nama Anggota</td>
			<td>
				<select name="id_anggota" class="col-md-12">
					<?php
						while ($data=mysql_fetch_array($anggota)) {
							echo "<option value='$data[id_anggota]'>$data[nama]</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Aksi</td>
			<td>
				<select name="aksi" class="col-md-2">
					<option value="debet">Debet</option>
					<option value="kridit">Kridit</option>
				</select>
				<input type="number" name="nominal" placeholder="Nominal" required class="col-sm-10">
			</td>	
		<tr>
			<td colspan="2">
				<input type="hidden" name="save" value="save">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary"> 
				<a href="?mod=simpan" title="Batal" class="btn btn-danger">Batal</a>
			</td>
		</tr>
	</table>
</form>
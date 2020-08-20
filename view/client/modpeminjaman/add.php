<?php
	include 'model/admin/m_nilai.php';
	$nilai 	= new m_nilai;
	$siswa	= $this->select("siswa");
	$matkul	= $this->select("matakuliah");

	if (isset($_POST['save'])) {
		
		if ($_POST['save']=="save") {
		
			$nilai->insert("NULL",$_POST['id'],$_POST['kd_matkul'],$_POST['na'],$_POST['nt'],$_POST['nuts'],$_POST['nuas']);
		
			?>
		
				<script>location="?mod=nilai&aksi=view"</script>	
		
			<?php
		
		}
	
	}
	
?>

<form method="post" action="?mod=nilai&aksi=add">
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>Mata Kuliah</td>
			<td>
				<select name="kd_matkul" class="col-sm-12">
					<?php while ($row=mysql_fetch_array($matkul)) { ?>
					<option value="<?php echo $row['kd_matkul'] ?>">[<?php echo $row['kd_matkul'] ?>] - <?php echo $row['nama_matkul'] ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nama Mahasiswa</td>
			<td>
				<select name="id" class="col-sm-12">
					<?php while ($row=mysql_fetch_array($siswa)) { ?>
					<option value="<?php echo $row['id'] ?>">[<?php echo $row['id'] ?>] - <?php echo $row['nama'] ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
		<tr>
			<td>Nilai Absen</td>
			<td><input type="number" name="na" placeholder="Nilai Absen 0 - 100" required class="col-sm-12"></td>
		</tr>
		<tr>
			<td>Nilai Tugas</td>
			<td><input type="number" name="nt" placeholder="Nilai Tugas 0 - 100" required class="col-sm-12"></td>
		</tr>
		<tr>
			<td>Nilai UTS</td>
			<td><input type="number" name="nuts" placeholder="Nilai UTS 0 - 100" required class="col-sm-12"></td>
		</tr>
		<tr>
			<td>Nilai UAS</td>
			<td><input type="number" name="nuas" placeholder="Nilai UAS 0 - 100" required class="col-sm-12"></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="hidden" name="save" value="save">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary"> 
				<a href="?mod=nilai" title="Batal" class="btn btn-danger">Batal</a>
			</td>
		</tr>
	</table>
</form>
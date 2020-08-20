<?php
	include 'model/admin/m_nilai.php';
	$nilai 	= new m_nilai;
	$siswa	= $this->select("siswa");
	$matkul	= $this->select("matakuliah");

	if (isset($_POST['update'])) {
		
		if ($_POST['update']=="update") {
		
			$nilai->update($_POST['no'],$_POST['id'],$_POST['kd_matkul'],$_POST['na'],$_POST['nt'],$_POST['nuts'],$_POST['nuas']);

			?>
		
				<script>location="?mod=nilai&aksi=view"</script>
		
			<?php
		
		}
	
	}else{
		
		$query	= $nilai->edit($_GET['id']);
		$data	= mysql_fetch_array($query);
		
		?>
		<form method="post" action="?mod=nilai&aksi=edit">
			<table class="table table-striped table-bordered table-hover">
				<tr>
					<td>Mata Kuliah</td>
					<td>
						<select name="kd_matkul" class="col-sm-12">
							<option value="<?php echo $data['kd_matkul'] ?>"><?php echo "[" .$data['kd_matkul'] ."] - " .$data['nama_matkul'] ?></option>
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
							<option value="<?php echo $data['id'] ?>"><?php echo "[" .$data['id'] ."] - " .$data['nama'] ?></option>
							<?php while ($row=mysql_fetch_array($siswa)) { ?>
							<option value="<?php echo $row['id'] ?>">[<?php echo $row['id'] ?>] - <?php echo $row['nama'] ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
				<tr>
					<td>Nilai Absen</td>
					<td><input type="number" name="na" placeholder="Nilai Absen 0 - 100" required class="col-sm-12" value="<?php echo $data['na']; ?>"></td>
				</tr>
				<tr>
					<td>Nilai Tugas</td>
					<td><input type="number" name="nt" placeholder="Nilai Tugas 0 - 100" required class="col-sm-12" value="<?php echo $data['nt']; ?>"></td>
				</tr>
				<tr>
					<td>Nilai UTS</td>
					<td><input type="number" name="nuts" placeholder="Nilai UTS 0 - 100" required class="col-sm-12" value="<?php echo $data['nuts']; ?>"></td>
				</tr>
				<tr>
					<td>Nilai UAS</td>
					<td><input type="number" name="nuas" placeholder="Nilai UAS 0 - 100" required class="col-sm-12" value="<?php echo $data['nuas']; ?>"></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="no" value="<?php echo $data['no']; ?>">
						<input type="hidden" name="update" value="update">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary"> 
						<a href="?mod=nilai" title="Batal" class="btn btn-danger">Batal</a>
					</td>
				</tr>
			</table>
		</form>
		<?php
	}
	
?>
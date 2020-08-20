<!--
<?php
/*
	include 'model/admin/m_matkul.php';
	$matkul 	= new m_matkul;

	if (isset($_POST['update'])) {
		
		if ($_POST['update']=="update") {
		
			$matkul->update($_POST['kd_matkul'],$_POST['nama_matkul'],$_POST['sks'],$_POST['dosen']);
		
			?>
		
				<script>location="?mod=matkul&aksi=view"</script>
		
			<?php
		
		}
	
	}else{
		
		$query	= $matkul->edit($_GET['id']);
		$row	= mysql_fetch_array($query);
		
		?>
		<form method="post" action="?mod=matkul&aksi=edit">
			<table class="table table-striped table-bordered table-hover">
				<tr>
					<td>KD matkul</td>
					<td>
						<input type="text" placeholder="KD matkul" required disabled value="<?php echo $row['kd_matkul'] ?>" class="col-sm-12">
						<input type="hidden" name="kd_matkul" required value="<?php echo $row['kd_matkul'] ?>">
					</td>
				</tr>
				<tr>
					<td>Nama Matkul</td>
					<td><input type="text" name="nama_matkul" placeholder="Nama Matkul" required value="<?php echo $row['nama_matkul'] ?>" class="col-sm-12"></td>
				</tr>
				<tr>
					<td>SKS</td>
					<td><input type="number" name="sks" placeholder="SKS" required value="<?php echo $row['sks'] ?>" class="col-sm-12"></td>
				</tr>
				<tr>
					<td>Nama Dosen</td>
					<td><input type="text" name="dosen" placeholder="Nama Dosen" required value="<?php echo $row['dosen'] ?>" class="col-sm-12"></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="update" value="update">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary"> 
						<a href="?mod=matkul" title="Batal" class="btn btn-danger">Batal</a>
					</td>
				</tr>
			</table>
		</form>
		<?php
	}
*/	
?>
-->
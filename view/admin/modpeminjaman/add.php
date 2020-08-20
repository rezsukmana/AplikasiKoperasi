<?php
	include 'model/admin/m_peminjaman.php';
	$peminjaman = new m_peminjaman;
	$cicilan	= $this->select("cicilan GROUP BY peminjaman");
	$anggota	= $this->select("anggota");

	if (isset($_POST['save'])) {
		
		if ($_POST['save']=="save") {

			$peminjaman->insert($_POST['id_anggota'],$_SESSION['user'],$_POST['peminjaman'],$_POST['cicilan']);
		
			?>
		
				<script>location="?mod=peminjaman&aksi=view"</script>	
		
			<?php
		
		}
	
	}
	
?>

<form method="post" action="?mod=peminjaman&aksi=add">
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>Nama Anggota</td>
			<td>
				<select name="id_anggota" class="col-sm-12">
					<?php while ($row=mysql_fetch_array($anggota)) { ?>
					<option value="<?php echo $row['id_anggota'] ?>"><?php echo $row['nama'] ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Peminjaman</td>
			<td>
				<select name="peminjaman" class="col-sm-12">
					<?php while ($row=mysql_fetch_array($cicilan)) { ?>
					<option value="<?php echo $row['peminjaman'] ?>"><?php echo $row['peminjaman'] ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
		<tr>
			<td>Cicilan</td>
			<td>
				<input type="radio" name="cicilan" value="12" required> 12x <br>
				<input type="radio" name="cicilan" value="24" required> 24x <br>
				<input type="radio" name="cicilan" value="36" required> 36x 
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="hidden" name="save" value="save">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary"> 
				<a href="?mod=peminjaman" title="Batal" class="btn btn-danger">Batal</a>
			</td>
		</tr>
	</table>
</form>

<?php
	include 'model/admin/m_cicilan.php';
	$cicilan = new m_cicilan;

	if (isset($_POST['save'])) {
		
		if ($_POST['save']=="save") {
		
			$cicilan->insert(NULL,$_POST['peminjaman'],"12",$_POST['cicilan12']);
			$cicilan->insert(NULL,$_POST['peminjaman'],"24",$_POST['cicilan24']);
			$cicilan->insert(NULL,$_POST['peminjaman'],"36",$_POST['cicilan36']);
		
			?>
		
				<script>location="?mod=cicilan&aksi=view"</script>	
		
			<?php
		
		}
	
	}
	
?>

<form method="post" action="?mod=cicilan&aksi=add">
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>Peminjaman</td>
			<td><input type="text" name="peminjaman" placeholder="Peminjaman" required class="col-md-12"></td>
		</tr>
		<tr>
			<td>Cicilan 12x</td>
			<td><input type="text" name="cicilan12" placeholder="Cicilan 12" required class="col-md-12"></td>
		</tr>
		<tr>
			<td>Cicilan 24x</td>
			<td><input type="text" name="cicilan24" placeholder="Cicilan 24" required class="col-md-12"></td>
		</tr>
		<tr>
			<td>Cicilan 36x</td>
			<td><input type="text" name="cicilan36" placeholder="Cicilan 36" required class="col-md-12"></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="hidden" name="save" value="save">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary"> 
				<a href="?mod=cicilan" title="Batal" class="btn btn-danger">Batal</a>
			</td>
		</tr>
	</table>
</form>
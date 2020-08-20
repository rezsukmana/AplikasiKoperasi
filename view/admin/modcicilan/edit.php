
<?php
	include 'model/admin/m_cicilan.php';
	$cicilan 	= new m_cicilan;

	if (isset($_POST['update'])) {
		
		if ($_POST['update']=="update") {
			
			$cicilan->update($_POST['pk'],$_POST['peminjaman'],"12",$_POST['cicilan12']);
			$cicilan->update($_POST['pk'],$_POST['peminjaman'],"24",$_POST['cicilan24']);
			$cicilan->update($_POST['pk'],$_POST['peminjaman'],"36",$_POST['cicilan36']);

			?>
		
				<script>location="?mod=cicilan&aksi=view"</script>
		
			<?php
		
		}
	
	}else{
		
		$query	= $cicilan->edit($_GET['id']);
		$row	= mysql_fetch_array($query);
		
		$q12 	= $cicilan->edit($_GET['id']," AND cicilan = '12'");
		$q24 	= $cicilan->edit($_GET['id']," AND cicilan = '24'");
		$q36 	= $cicilan->edit($_GET['id']," AND cicilan = '36'");
		
		$r12 	= mysql_fetch_array($q12);
		$r24 	= mysql_fetch_array($q24);
		$r36 	= mysql_fetch_array($q36);
		?>

		<form method="post" action="?mod=cicilan&aksi=edit">
			<table class="table table-striped table-bordered table-hover">
				<tr>
					<td>Peminjaman</td>
					<td>
						<input type="text" name="peminjaman" placeholder="Peminjaman" required class="col-md-12" value="<?php echo $row['peminjaman']; ?>">
						<input type="hidden" name="pk" value="<?php echo $row['peminjaman']; ?>" required>
					</td>
				</tr>
				<tr>
					<td>Cicilan 12x</td>
					<td><input type="text" name="cicilan12" placeholder="Cicilan 12" required class="col-md-12" value="<?php echo $r12['perbulan']; ?>"></td>
				</tr>
				<tr>
					<td>Cicilan 24x</td>
					<td><input type="text" name="cicilan24" placeholder="Cicilan 24" required class="col-md-12" value="<?php echo $r24['perbulan']; ?>"></td>
				</tr>
				<tr>
					<td>Cicilan 36x</td>
					<td><input type="text" name="cicilan36" placeholder="Cicilan 36" required class="col-md-12" value="<?php echo $r36['perbulan']; ?>"></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="update" value="update">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary"> 
						<a href="?mod=cicilan" title="Batal" class="btn btn-danger">Batal</a>
					</td>
				</tr>
			</table>
		</form>
		<?php
	}
	
?>
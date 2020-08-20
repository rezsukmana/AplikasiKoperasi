
<?php
	include 'model/admin/m_admin.php';
	$admin 	= new m_admin;

	if (isset($_POST['update'])) {
		
		if ($_POST['update']=="update") {
			
			$admin->update($_POST['username'],strtoupper($_POST['nama_admin']),$_POST['status']);

			?>
		
				<script>location="?mod=admin&aksi=view"</script>
		
			<?php
		
		}
	
	}else{
		
		$query	= $admin->edit($_GET['id']);
		$row	= mysql_fetch_array($query);
		
		?>

		<form method="post" action="?mod=admin&aksi=edit">
			<table class="table table-striped table-bordered table-hover">
				<tr>
					<td>Username</td>
					<td>
						<input type="text" required disabled value="<?php echo $row['username'] ?>" class="col-md-12">
						<input type="hidden" name="username" required value="<?php echo $row['username'] ?>">
					</td>
				</tr>
				<tr>
					<td>Nama</td>
					<td><input type="text" name="nama_admin" placeholder="Nama Admin" required value="<?php echo $row['nama_admin'] ?>" class="col-md-12"></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>
						<select name="status" class="col-md-12">
							<option value="<?php echo $row['status'] ?>"><?php echo ucfirst($row['status']); ?></option>
							<option value="aktif">Aktif</option>
							<option value="tidak">Tidak</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="update" value="update">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary"> 
						<a href="?mod=admin" title="Batal" class="btn btn-danger">Batal</a>
					</td>
				</tr>
			</table>
		</form>
		<?php
	}
	
?>
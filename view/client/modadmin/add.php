
<?php
	include 'model/admin/m_admin.php';
	$admin = new m_admin;

	if (isset($_POST['save'])) {
		
		if ($_POST['save']=="save") {
		
			$admin->insert($_POST['username'],md5($_POST['password']),strtoupper($_POST['nama_admin']),$_POST['status']);
		
			?>
		
				<script>location="?mod=admin&aksi=view"</script>	
		
			<?php
		
		}
	
	}
	
?>

<form method="post" action="?mod=admin&aksi=add">
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>User</td>
			<td><input type="text" name="username" placeholder="Username" required class="col-md-12"></td>
		</tr>
		<tr>
			<td>Nama Admin</td>
			<td><input type="text" name="nama_admin" placeholder="Nama Admin" required class="col-md-12"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" placeholder="Password" required class="col-md-12"></td>
		</tr>
		<tr>
			<td>Status</td>
			<td>
				<select name="status" required class="col-md-12">
					<option value="aktif">aktif</option>
					<option value="tidak">tidak</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="hidden" name="save" value="save">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary"> 
				<a href="?mod=admin" title="Batal" class="btn btn-danger">Batal</a>
			</td>
		</tr>
	</table>
</form>
<?php
	include 'model/admin/m_admin.php';
	$admin = new m_admin;

	if (isset($_GET['method'])) {

		if ($_GET['method']=="delete") {
		
			$admin->delete($_GET['id']);
			
			?>
			
				<script>location="?mod=admin&aksi=view"</script>	
		
			<?php
		
		}
		
	}

	if (isset($_POST['cari'])) {
		$select = $admin->find($_POST['cari']);
	}else{
		$select = $admin->select();
	}
?>

<a href="?mod=admin&aksi=add" title="Tambah Data" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
<button class="btn btn-danger">Total data : <?php echo mysql_num_rows($select) ?></button>

<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>No</th>
		<th>Username</th>
		<th>Nama</th>
		<th>Password</th>
		<th>Status</th>
		<th>Aksi</th>
	</tr>
	<?php
		$no=1;		
		while ($row = mysql_fetch_array($select)) {
			echo "
				<tr>
					<td>".$no++."</td>
					<td>$row[username]</td>
					<td>$row[nama_admin]</td>
					<td>$row[password]</td>
					<td>$row[status]</td>
					<td>
						<a href='?mod=admin&aksi=edit&id=$row[username]' title='Edit' class='btn btn-success'><span class='glyphicon glyphicon-edit'></span></a> 
						";
			?>	
						<a href="?mod=admin&aksi=view&method=delete&id=<?php echo $row['username']?>" title="Hapus" onclick="javascript:return confirm('Hapus?')" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span></a>
			<?php		
			echo	"</td>
				</tr>
			";
		}
	?>
</table>
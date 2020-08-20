<?php
	include 'model/admin/m_anggota.php';
	$anggota = new m_anggota;

	if (isset($_GET['method'])) {

		if ($_GET['method']=="delete") {
		
			$anggota->delete($_GET['id']);
			
			?>
			
				<script>location="?mod=anggota&aksi=view"</script>	
		
			<?php
		
		}
		
	}

	if (isset($_POST['cari'])) {
		$select = $anggota->find($_POST['cari']);
	}else{
		$select = $anggota->select();
	}
?>

<a href="?mod=anggota&aksi=add" title="Tambah Data" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
<button class="btn btn-danger">Total data : <?php echo mysql_num_rows($select) ?></button>

<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>No</th>
		<th>ID Anggota</th>
		<th>Nama Anggota</th>
		<th>No. Hp</th>
		<th>Alamat</th>
		<th>Aksi</th>
	</tr>
	<?php
		$no=1;		
		while ($row = mysql_fetch_array($select)) {
			echo "
				<tr>
					<td>".$no++."</td>
					<td>$row[id_anggota]</td>
					<td>$row[nama]</td>
					<td>$row[no_hp]</td>
					<td>$row[alamat]</td>
					<td>
						<a href='?mod=anggota&aksi=edit&id=$row[id_anggota]' title='Edit' class='btn btn-success'><span class='glyphicon glyphicon-edit'></span></a> 
						";
			?>	
						<a href="?mod=anggota&aksi=view&method=delete&id=<?php echo $row['id_anggota']?>" title="Hapus" onclick="javascript:return confirm('Hapus?')" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span></a>
			<?php		
			echo	"</td>
				</tr>
			";
		}
	?>
</table>
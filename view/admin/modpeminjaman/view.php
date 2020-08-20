<?php
	include 'model/admin/m_peminjaman.php';
	$peminjaman = new m_peminjaman;

	if (isset($_GET['method'])) {

		if ($_GET['method']=="delete") {
		
			$peminjaman->delete($_GET['id']);
			
			?>
			
				<script>location="?mod=peminjaman&aksi=view"</script>	
		
			<?php
		
		}
		
	}

	if (isset($_POST['cari'])) {
		$select = $peminjaman->find($_POST['cari']);
	}else{
		$select = $peminjaman->select();
	}
?>

<a href="?mod=peminjaman&aksi=add" title="Tambah Data" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
<button class="btn btn-danger">Total data : <?php echo mysql_num_rows($select) ?></button>

<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>No</th>
		<th>ID Peminjaman</th>
		<th>Nama Peminjam</th>
		<th>Peminjaman</th>
		<th>Angsuran</th>
		<th>Cicilan</th>
	</tr>
	<?php
		$no=1;		
		while ($row = mysql_fetch_array($select)) {
			echo "
				<tr title='$row[username]'>
					<td>".$no++."</td>
					<td>$row[id_peminjaman]</td>
					<td>$row[nama]</td>
					<td>$row[peminjaman]</td>
					<td>$row[cicilan]</td>
					<td>$row[perbulan]</td>
				</tr>
			";
		}
	?>
</table>
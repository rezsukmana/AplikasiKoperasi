<?php
	include 'model/admin/m_simpan.php';
	$simpan = new m_simpan;

	if (isset($_GET['method'])) {

		if ($_GET['method']=="delete") {
		
			//$simpan->delete($_GET['id']);
			
			?>
			
				<script>location="?mod=simpan&aksi=view"</script>	
		
			<?php
		
		}
		
	}

	if (isset($_POST['cari'])) {
		$select = $simpan->find($_POST['cari']);
	}else{
		$select = $simpan->select();
	}
?>

<a href="?mod=simpan&aksi=add" title="Tambah Data" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
<button class="btn btn-danger">Total data : <?php echo mysql_num_rows($select) ?></button>

<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>No</th>
		<th>Tanggal</th>
		<th>ID Anggota</th>
		<th>Nama Anggota</th>
		<th>Debet</th>
		<th>Kridit</th>
		<th>Saldo</th>
	</tr>
	<?php
		$no=1;
		while ($row = mysql_fetch_array($select)) {
			echo "
				<tr title='$row[ket_simpan] Oleh $row[nama_admin] - $row[username]'>
					<td>".$no++."</td>
					<td>$row[tgl_simpan]</td>
					<td>$row[id_anggota]</td>
					<td>$row[nama]</td>
					<td>$row[debet_anggota]</td>
					<td>$row[kridit_anggota]</td>
					<td>$row[saldo_anggota]</td>
				</tr>
			";
		}
	?>
</table>
<?php
	include 'model/admin/m_angsuran.php';
	$angsuran = new m_angsuran;

	if (isset($_GET['method'])) {

		if ($_GET['method']=="delete") {
		
			$angsuran->delete($_GET['id']);
			
			?>
			
				<script>location="?mod=angsuran&aksi=view"</script>	
		
			<?php
		
		}
		
	}

	if (isset($_POST['cari'])) {
		$select = $angsuran->find($_POST['cari']);
	}else{
		$select = $angsuran->select();
	}
?>

<form action="?mod=angsuran&aksi=add" method="post">
	<input type="text" name="id_peminjaman" placeholder="ID Peminjaman" required>
	<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
	<span class="btn btn-danger">Total data : <?php echo mysql_num_rows($select) ?></span>
</form>



<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>No</th>
		<th>Tgl Angsuran</th>
		<th>ID Peminjaman</th>
		<th>ID Anggota</th>
		<th>Nama Peminjam</th>
		<th>Angsuran Ke</th>
		<th>Angsuran</th>
	</tr>
	<?php
		$no=1;
		while ($row = mysql_fetch_array($select)) {
			echo "
				<tr title='$row[username]'>
					<td>".$no++."</td>
					<td>$row[tgl_angsuran]</td>
					<td>$row[id_peminjaman]</td>
					<td>$row[id_anggota]</td>
					<td>$row[nama]</td>
					<td>$row[angsuran_ke]</td>
					<td>$row[perbulan]</td>
				</tr>
			";
		}
	?>
</table>
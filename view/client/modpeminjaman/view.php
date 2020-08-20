<?php
	include 'model/client/m_peminjaman.php';
	$peminjaman = new m_peminjaman;

	if (isset($_POST['cari'])) {
		$select = $peminjaman->find($_POST['cari']);
	}else{
		$select = $peminjaman->select($_GET['id']);
	}
	$query 	= mysql_query("SELECT * FROM peminjaman WHERE id_peminjaman = '$_GET[id]'");
	$array 	= mysql_fetch_array($query);
?>

<button class="btn btn-primary">Angsuran Ke : <?php echo mysql_num_rows($select) ?></button>
<button class="btn btn-danger">Angsuran Kurang : <?php echo $array['cicilan'] - mysql_num_rows($select) ?></button>

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
<?php
	include 'model/admin/m_saldo.php';
	$saldo = new m_saldo;

	if (isset($_GET['method'])) {

		if ($_GET['method']=="delete") {
		
			//$saldo->delete($_GET['id']);
			
			?>
			
				<script>location="?mod=saldo&aksi=view"</script>	
		
			<?php
		
		}
		
	}

	if (isset($_POST['cari'])) {
		$select = $saldo->find($_POST['cari']);
	}else{
		$select = $saldo->select();
	}
?>

<button class="btn btn-danger">Total data : <?php echo mysql_num_rows($select) ?></button>

<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>No</th>
		<th>Jenis</th>
		<th>Tgl Saldo</th>
		<th>ID Anggota</th>
		<th>Nama Anggota</th>
		<th>Debet</th>
		<th>Kridit</th>
		<th>Saldo</th>
	</tr>
	<?php
		$no=1;		
		while ($row = mysql_fetch_array($select)) {
			if ($row['jenis']=="simpan") {
				$class="label label-danger arrowed-in";
			}else{
				$class="label label-success arrowed";
			}
			echo "
				<tr title='$row[ket_saldo] Oleh $row[nama_admin] - $row[tgl_saldo]'>
					<td>".$no++."</td>
					<td><span class='$class'>$row[jenis]</span></td>
					<td>$row[tgl_saldo]</td>
					<td>$row[id_anggota]</td>
					<td>$row[nama]</td>
					<td>$row[debet_perusahaan]</td>
					<td>$row[kridit_perusahaan]</td>
					<td>$row[saldo_perusahaan]</td>
				</tr>
			";
		}
	?>
</table>
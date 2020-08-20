<?php
	include 'model/admin/m_home.php';
	$home = new m_home;

	if (isset($_GET['method'])) {

		if ($_GET['method']=="delete") {
		
			//$home->delete($_GET['id']);
			
			?>
			
				<script>location="?mod=home&aksi=view"</script>	
		
			<?php
		
		}
		
	}

	if (isset($_POST['cari'])) {
		$select 	= $home->find($_POST['cari']);
	}else{
		$cicilan 	= $home->select("cicilan"," GROUP BY peminjaman");
		$anggota 	= $home->select("anggota","LIMIT 10");
		$simpan 	= $home->select("simpan,anggota","WHERE simpan.id_anggota = anggota.id_anggota ORDER BY simpan.id_simpan DESC LIMIT 10");
		$saldo 		= $home->select("saldo,anggota","WHERE saldo.id_anggota = anggota.id_anggota ORDER BY saldo.id_saldo DESC LIMIT 10");
	}
?>

<div class="col-md-12">
	<a href="grafik.php" target="_BLANK" class="btn btn-danger"><span class="fa fa-pencil-square-o"></span> Grafik Saldo Perusahaan</a>
	<?php include_once 'grafik.php'; ?>
</div>

<div class="clearfix"></div>
	
<div class="col-md-6">
	<button class="btn btn-danger"><span class="fa fa-pencil-square-o"></span> Daftar Peminjaman</button>

	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2">Peminjaman</th>
			<th colspan="3">Cicilan</th>
		</tr>
		<tr>
			<th>12x</th>
			<th>24x</th>
			<th>36x</th>
		</tr>
		<?php
			$no=1;		
			while ($row = mysql_fetch_array($cicilan)) {
				
				$peminjaman=$row['peminjaman'];
				echo "
					<tr>
						<td>".$no++."</td>
						<td>$peminjaman</td>
					";

				$query= $home->select("cicilan"," WHERE peminjaman='$peminjaman'");
				
				while ($data=mysql_fetch_array($query)) {
					echo "<td>$data[perbulan]</td>";
				}
				echo "
					</tr>
				";
			}
		?>
	</table>
</div>

<div class="col-md-6">
	<button class="btn btn-primary"><span class=" fa fa-users"></span> Anggota</button>
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>No</th>
			<th>ID Anggota</th>
			<th>Nama Anggota</th>
			<th>No. Hp</th>
			<th>Alamat</th>
		</tr>
		<?php
			$no=1;		
			while ($row = mysql_fetch_array($anggota)) {
				echo "
					<tr>
						<td>".$no++."</td>
						<td>$row[id_anggota]</td>
						<td>$row[nama]</td>
						<td>$row[no_hp]</td>
						<td>$row[alamat]</td>
					</tr>
				";
			}
		?>
	</table>
</div>
<div class="clearfix"></div>

<div class="col-md-6">
	<button class="btn btn-default"><span class=" fa fa-cloud-download"></span> Simpan</button>
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Nama Anggota</th>
			<th>Debet</th>
			<th>Kridit</th>
			<th>Saldo</th>
		</tr>
		<?php
			$no=1;
			while ($row = mysql_fetch_array($simpan)) {
				echo "
					<tr>
						<td>".$no++."</td>
						<td>".substr($row['tgl_simpan'],0,10)."</td>
						<td title='$row[id_anggota]'>$row[nama]</td>
						<td>$row[debet_anggota]</td>
						<td>$row[kridit_anggota]</td>
						<td>$row[saldo_anggota]</td>
					</tr>
				";
			}
		?>
	</table>
</div>

<div class="col-md-6">
	<button class="btn btn-warning"><span class="fa fa-exchange"></span> Saldo</button>
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>No</th>
			<th>Jenis</th>
			<th>Tgl Saldo</th>
			<th>Nama Anggota</th>
			<th>Debet</th>
			<th>Kridit</th>
			<th>Saldo</th>
		</tr>
		<?php
			$no=1;		
			while ($row = mysql_fetch_array($saldo)) {
				if ($row['jenis']=="simpan") {
					$class="label label-danger arrowed-in";
				}else{
					$class="label label-success arrowed";
				}
				echo "
					<tr>
						<td>".$no++."</td>
						<td><span class='$class'>$row[jenis]</span></td>
						<td>".substr($row['tgl_saldo'],0,10)."</td>
						<td>$row[nama]</td>
						<td>$row[debet_perusahaan]</td>
						<td>$row[kridit_perusahaan]</td>
						<td>$row[saldo_perusahaan]</td>
					</tr>
				";
			}
		?>
	</table>
</div>
<div class="clearfix"></div>

<div class="col-md-6">
	<button class="btn btn-info"><span class="fa fa-cloud-upload"></span> Angsuran</button>
</div>

<div class="col-md-6">
	<button class="btn btn-success"><span class=" fa fa-users"></span> Peminjaman</button>
</div>
<div class="clearfix"></div>
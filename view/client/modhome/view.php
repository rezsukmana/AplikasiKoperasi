<?php
	include 'model/client/m_home.php';
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
		$simpan 	= $home->select("simpan,anggota","WHERE simpan.id_anggota = anggota.id_anggota AND simpan.id_anggota = $_SESSION[id] ORDER BY simpan.id_simpan DESC LIMIT 10");
		$saldo 		= $home->select("peminjaman","WHERE peminjaman.id_anggota = $_SESSION[id] ORDER BY peminjaman.id_peminjaman DESC LIMIT 10");
		$peminjaman = $home->select("peminjaman, anggota","WHERE peminjaman.id_anggota = anggota.id_anggota AND peminjaman.id_anggota = $_SESSION[id]");
	}
?>

<div class="col-md-12">
	<a href="grafik.php?id=<?php echo $_SESSION[id]; ?>" target="_BLANK" class="btn btn-danger"><span class="fa fa-pencil-square-o"></span> Grafik Saldo Simpanan <?php echo $_SESSION['nama']?></a>
	<?php include_once 'grafik.php'; ?>
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
	<button class="btn btn-warning"><span class="fa fa-exchange"></span> Daftar ID Peminjaman</button>
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Peminjaman</th>
			<th>Cicilan</th>
			<th>Perbulan</th>
			<th>Keterangan</th>
		</tr>
		<?php
			$no=1;		
			while ($row = mysql_fetch_array($saldo)) {
				if ($row['ket']=="BELUM") {
					$class="label label-danger arrowed-in";
				}else{
					$class="label label-success arrowed";
				}
				echo "
					<tr>
						<td>".$no++."</td>
						<td>$row[tgl_peminjaman]</td>
						<td>$row[peminjaman]</td>
						<td>$row[cicilan]</td>
						<td>$row[perbulan]</td>
						<td><span class='$class'>$row[ket]</span></td>
					</tr>
				";
			}
		?>
	</table>
</div>
<div class="clearfix"></div>

<?php
	$no=1;
	while ($data = mysql_fetch_array($peminjaman)) {
		$id_peminjaman=$data['id_peminjaman'];
		$angsuran 	= $home->select("angsuran"," WHERE id_peminjaman = '$id_peminjaman' ");
		$kurang 	= $data['cicilan'] - mysql_num_rows($angsuran);
?>
	<div class="col-md-6">
		<button class="btn btn-info"><span class="fa fa-cloud-upload"></span> No Peminjaman <?php echo $id_peminjaman ." Kurang " .$kurang ."x"; ?></button>
		
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<th>No</th>
				<th>Tanggal Angsuran</th>
				<th>Cicilan ke</th>
				<th>Perbulan</th>
			</tr>
			<?php
				
				$n=1;		
				while ($row = mysql_fetch_array($angsuran)) {
					
					echo "
						<tr>
							<td>".$n++."</td>
							<td>$row[tgl_angsuran]</td>
							<td>$row[angsuran_ke]</td>
							<td>$row[perbulan]</td>
						</tr>
					";

				}
			?>
		</table>

	</div>

	<?php
		if($no%2==0){
			echo "<div class='clearfix'></div>";
		}
	$no++;
	}
?>
<?php
	$tgl_hari_ini =  date('l, d-m-Y');
	$nama_laporan = $_POST['kategori_laporan'];
	if ($nama_laporan == "SUMMARY"){
		$tampil_nama = "Laporan Summary";
	}
	else{
		$tampil_nama = "Laporan Utang";
	}
	?>
<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Laporan Summary | Avalon it's Online</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="../../assets/brand/logo-avalon.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Dedy A Muzawwir">
		<title>Data Pengeluaran | Avalon it's Online</title>
		<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
		<link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="../../assets/dist/css/tambahan.css" rel="stylesheet">
		<!-- UNTUK FONT -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Anonymous+Pro&family=Poppins:ital,wght@0,100;0,300;0,500;1,900&display=swap" rel="stylesheet">
		<style type="text/css">
			.left    { text-align: left;}
			.right   { text-align: right;}
			.center  { text-align: center;}
			.justify { text-align: justify;}
		</style>
		<style type="text/css" media="print">
			@page {
			size: a4;   /* auto is the initial value */
			margin: 5;  /* this affects the margin in the printer settings */
			}
		</style>
	</head>
	</head>
	<body>
		<?php 
			error_reporting(0);
			session_start();
			$s_level = $_SESSION['level'];
			$s_user = $_SESSION['username'];
			if ($_SESSION['status']!="login") {
			echo "<script>alert('Anda belum login.....');window.location.href='index?pesan=belum_login';</script>";
			}
			else if ($_SESSION['level']!="OWNER" AND $_SESSION['level']!="ADMIN" AND $_SESSION['level']!="ADMIN"){
			echo "<script>alert('Anda tidak memiliki akses.....');window.location.href='javascript:history.go(-1)';</script>";
			}
			else {
			
			include '../../help/koneksi.php';
			date_default_timezone_set('Asia/Hong_Kong');
			$waktu_skg = date("d/m/Y");
			$jam = date("H:i:s");
			$kode= $_GET['id'];
			$tgl_awal = $_POST['tgl_awal'];
			$tgl_akhir = $_POST['tgl_akhir'];
			function formatTanggal($date){
			// ubah string menjadi format tanggal
			return date('d-m-Y', strtotime($date));
			}
			
			$data_pengeluaran = mysqli_query($koneksi, "SELECT * from tbl_pengeluaran WHERE ID='$kode'");
			
			$no = 1;		
			$total_keluar=0;
			while($data = mysqli_fetch_array($data_pengeluaran)){
				$waktuu = $data['WAKTU_DIBUAT'];
				$tglny = date_create($data['TGL_DIBUAT']);   
				$tglnya = date_format($tglny,'d-M-Y');  
				$kodpenn = $data['ID'];
				$katee = $data['KATEGORI'];
				$ketee = $data['KETERANGAN'];					
				$oleh = $data['UNTUK'];
				$nomii = $data['NOMINAL'];  								
				$nomii_tamp = "Rp" . number_format($nomii,0,',','.');      	
			}
			
			}
			?>		
		<div class="right p-2">
			<img src="../../assets/brand/logo-avalon.png" width="260px" height="auto" class="right">			
			<p style="color:#373435"><?php echo $tgl_hari_ini; ?></p>
		</div>
		<h3 style="color:#373435" class="left"><u><?php echo $tampil_nama; ?> </u></h3>
		<p style="color:#373435" class="left"><?php echo $tgl_awal; ?> s.d <?php echo $tgl_akhir;?>
		<p><br>
			<?php
				$t_pemasukan = mysqli_query($koneksi, "SELECT sum(NOMINAL) as tot_pemasukan FROM tbl_pemasukan WHERE TGL_DIBUAT BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."'");
				while ($dd = mysqli_fetch_array($t_pemasukan)) {
					$tot_pemasukan = $dd['tot_pemasukan'];
					$tot_pemasukan_tamp = "Rp".number_format($tot_pemasukan, 0, ",", ".");
				}
				
				$t_utang = mysqli_query($koneksi, "SELECT sum(NOMINAL) as tot_utang FROM tbl_pengeluaran WHERE TGL_DIBUAT BETWEEN '$tgl_awal' AND '$tgl_akhir' AND KATEGORI='PEMBAYARAN UTANG'");
				while ($dd = mysqli_fetch_array($t_utang)) {
					$tot_utang = $dd['tot_utang'];					
				}
				
				$bayar_utang = mysqli_query($koneksi, "SELECT sum(NOMINAL) as bu_bu FROM tbl_pemasukan WHERE TGL_DIBUAT BETWEEN '$tgl_awal' AND '$tgl_akhir' AND KATEGORI='UTANG'");
				
				while ($dd = mysqli_fetch_array($bayar_utang)) {
					$bu_bu = $dd['bu_bu'];					
				}
				
				$total_utang = $tot_utang - $bu_bu;
				if ($total_utang < 0){
					$total_utang = str_replace("-", "", $total_utang);
				}				
				else{
					$total_utang = $total_utang;
				}
				
				$total_utang_tamp = "Rp".number_format($total_utang, 0, ",", ".");
				
				$pengeluaran_bulan = mysqli_query($koneksi, "SELECT sum(NOMINAL) as tot_pengeluaran FROM tbl_pengeluaran WHERE TGL_DIBUAT BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."'");
				while ($dd = mysqli_fetch_array($pengeluaran_bulan)) {
					$tot_pengeluaran = $dd['tot_pengeluaran'];
					$tot_pengeluaran_tamp = "Rp".number_format($tot_pengeluaran, 0, ",", ".");
				}
				$keuntungan = $tot_pemasukan - $tot_pengeluaran;				
				$keuntungan_tamp = "Rp".number_format($keuntungan, 0, ",", ".");
				?>
		<table class="border-0 text-left" style="width: 80%">

		<?php 		
		if ($nama_laporan == "SUMMARY"){
		echo "
		<tr>
			<td>
				<p style='color:#373435' class='left'>Total Cash</p>
			</td>
			<td style='width: 5%'>
				<p style='color:#373435' class='center'>:</p>
			</td>
			<td style='width: 70%'>
				<p style='color:#373435' class='left'><b>$keuntungan_tamp</b></p>
			</td>
		</tr>
		<tr>
			<td>
				<p style='color:#373435' class='left'>Total Pemasukan</p>
			</td>
			<td style='width: 5%'>
				<p style='color:#373435' class='center'>:</p>
			</td>
			<td style='width: 70%'>
				<p style='color:#373435' class='left'><b>$tot_pemasukan_tamp</b></p>
			</td>
		</tr>
		<tr>
			<td>
				<p style='color:#373435' class='left'>Total Pengeluaran</p>
			</td>
			<td style='width: 5%'>
				<p style='color:#373435' class='center'>:</p>
			</td>
			<td style='width: 70%'>
				<p style='color:#373435' class='left'><b>$tot_pengeluaran_tamp</b></p>
			</td>
		</tr>";}
		else{ 			
			echo"
				<tr>
					<td>
						<p style='color:#373435' class='left'>Total Utang</p>
					</td>
					<td style='width: 5%'>
						<p style='color:#373435' class='center'>:</p>
					</td>
					<td style='width: 70%'>
						<p style='color:#373435' class='left'><b>$total_utang_tamp</b></p>
					</td>
				</tr>";
			} 
			?>
			<tr>
				<td colspan="2">
					<br>
					<br>
				</td>
			</tr>
		</table>
		<?php 
			if ($nama_laporan == "SUMMARY"){
				echo "

		
				<div class='container-xxl mb-5'>
				<table class='table center m-0' style='width: 100%'>
					<tr style='background-color:#7EEC7A'>
						<th colspan='5' class='text-center'>
							<p style='font-size:1.3rem;color:#000'>DETAIL PEMASUKAN</p>
						</th>
					</tr>
					<tr class='text-center'>
						<td style='width: 5%;'><b>No</b></td>
						<td><b>Waktu</b></td>
						<td><b>Kategori</b></td>
						<td style='width: 50%;'><b>Keterangan</b></td>
						<td><b>Nominal</b></td>
					</tr>
					";
					?>
					<?php
						$data_pemasukan = mysqli_query($koneksi,"select * from tbl_pemasukan WHERE TGL_DIBUAT BETWEEN '.$tgl_awal' AND '$tgl_akhir' order by ID DESC");
						$no=1;
						while($d = mysqli_fetch_array($data_pemasukan)){
							$tgl_buat = $d['WAKTU_DIBUAT'];
							$kategori = $d['KATEGORI'];
							$keterangan = $d['KETERANGAN'];
							$nominal = number_format($d['NOMINAL'],0,',','.');
							
					echo "
					<tr>
						<td class='text-center'><p style='font-size:0.8rem ;'>$no</td>
						<td class='text-center'><p style='font-size:0.8rem ;'>$tgl_buat</p></td>
						<td class='text-center'>$kategori</td>
						<td class='text-center'>$keterangan</td>
						<td class='text-end'>Rp.$nominal</td>								
						"; $no++; } ?>					
						
					</tr>
				</table>
			</div>
			<div class='container-xxl mt-5'>
				<table class='table center m-0' style='width: 100%'>
					<tr class='text-center' style='background-color:#7EEC7A'>
						<th colspan='6' class='text-center'>
							<p style='font-size:1.3rem;color:#000'>DETAIL PENGELUARAN</p>
						</th>
					</tr>
					<tr class='text-center'>
						<td style='width: 5%;'><b>No</b></td>
						<td><b>Waktu</b></td>
						<td><b>Kategori</b></td>
						<td style='width: 50%;'><b>Keterangan</b></td>
						<td><b>Untuk</b></td>
						<td><b>Nominal</b></td>
					</tr>
					";
					<?php
						$data_pemasukan = mysqli_query($koneksi,"select * from tbl_pengeluaran WHERE TGL_DIBUAT BETWEEN '$tgl_awal' AND '$tgl_akhir' order by ID DESC");
						$no=1;
						while($d = mysqli_fetch_array($data_pemasukan)){
							$tgl_buat = $d['WAKTU_DIBUAT'];
							$kategori = $d['KATEGORI'];
							$untuk = $d['UNTUK'];
							$keterangan = $d['KETERANGAN'];
							$nominal = number_format($d['NOMINAL'],0,',','.');
						?>
					<tr>
						<td class='text-center'><p style='font-size:0.8rem ;'><?php echo $no; ?></td>
						<td class='text-center'><p style='font-size:0.8rem ;'><?php echo $tgl_buat; ?></p></td>
						<td class='text-center'><?php echo $kategori; ?></td>
						<td class='text-center'><?php echo $keterangan; ?></td>
						<td class='text-center'><?php echo $untuk; ?></td>								
						<td class='text-end'><?php echo 'Rp'.$nominal; ?></td>								
						<?php $no++; }
						?>
					</tr>
				</table>
			</div>
			<?php
					}
					else{
						echo "
						<div class='container-xxl mb-5'>
				<table class='table center m-0' style='width: 100%'>
					<tr class='text-center' style='background-color:#7EEC7A'>
						<th colspan='5'>
							<p style='font-size:1.3rem;color:#000'>DETAIL UTANG</p>
						</th>
					</tr>
					<tr class='text-center'>
						<td style='width: 5%;'><b>No</b></td>
						<td><b>Waktu</b></td>
						<td><b>Kategori</b></td>
						<td style='width: 50%;'><b>Keterangan</b></td>
						<td><b>Nominal</b></td>
					</tr>
					";
					?>
					<?php
						$data_utang = mysqli_query($koneksi,"select * from tbl_pemasukan WHERE TGL_DIBUAT BETWEEN '$tgl_awal' AND '$tgl_akhir' AND KATEGORI='UTANG' order by ID DESC");
						$no=1;
						while($d = mysqli_fetch_array($data_utang)){
							$tgl_buat = $d['WAKTU_DIBUAT'];
							$kategori = $d['KATEGORI'];
							$keterangan = $d['KETERANGAN'];
							$nominal = number_format($d['NOMINAL'],0,',','.');
							
					
					echo "
					<tr>
						<td class='text-center'><p style='font-size:0.8rem ;'>$no</td>
						<td class='text-center'><p style='font-size:0.8rem ;'>$tgl_buat</p></td>
						<td class='text-center'>$kategori</td>
						<td class='text-center'>$keterangan</td>
						<td class='text-end'>Rp.$nominal</td>								
						
					"; $no++; } ?>
						
					</tr>
				</table>
			</div>
			<div class='container-xxl mt-5'>
				<table class='table center m-0' style='width: 100%'>
					<tr class='text-center' style='background-color:#7EEC7A'>
						<th colspan='6' class='text-center'>
							<p style='font-size:1.3rem;color:#000'>DETAIL PEMBAYARAN UTANG</p>
						</th>
					</tr>
					<tr class='text-center'>
						<td style='width: 5%;'><b>No</b></td>
						<td><b>Waktu</b></td>
						<td><b>Kategori</b></td>
						<td style='width: 50%;'><b>Keterangan</b></td>
						<td><b>Untuk</b></td>
						<td><b>Nominal</b></td>
					</tr>
					";
					<?php
						$data_bayar_utang = mysqli_query($koneksi,"select * from tbl_pengeluaran WHERE TGL_DIBUAT BETWEEN '$tgl_awal' AND '$tgl_akhir' AND KATEGORI='PEMBAYARAN UTANG' order by ID DESC");
						$no=1;
						while($d = mysqli_fetch_array($data_bayar_utang)){
							$tgl_buat = $d['WAKTU_DIBUAT'];
							$kategori = $d['KATEGORI'];
							$untuk = $d['UNTUK'];
							$keterangan = $d['KETERANGAN'];
							$nominal = number_format($d['NOMINAL'],0,',','.');
						?>
					<tr>
						<td class='text-center'><p style='font-size:0.8rem ;'><?php echo $no; ?></td>
						<td class='text-center'><p style='font-size:0.8rem ;'><?php echo $tgl_buat; ?></p></td>
						<td class='text-center'><?php echo $kategori; ?></td>
						<td class='text-center'><?php echo $keterangan; ?></td>
						<td class='text-center'><?php echo $untuk; ?></td>								
						<td class='text-end'><?php echo 'Rp'.$nominal; ?></td>								
						<?php $no++; }
						?>
					</tr>
				</table>
			</div>







					<?php }
			?>
			
		<script>
			window.print();
		</script>
	</body>
</html>
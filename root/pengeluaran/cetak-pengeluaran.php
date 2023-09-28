<?php
	$tgl_hari_ini =  date('l, d-m-Y');
?>
<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
	<head>		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">			
        <title>Cetak Nota Pengeluaran | Avalon it's Online</title>
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
					$nomii_tamp = "Rp" . number_format($nomii,0,',','.');      	}
				
		}
      ?>		
			<div class="right p-2">
				<img src="../../assets/brand/logo-avalon.png" width="260px" height="auto" class="right">			
				<p style="color:#373435"><?php echo $tgl_hari_ini; ?></p>
			</div>
			<h3 style="color:#373435" class="left"><u>Bukti Input Pengeluaran</u></h3><br>
			<table class="border-1 text-left" style="width: 100%">
				<tr>
					<td>
						<h5 style="color:#373435" class="left">ID Input</h5>
					</td>
					<td style="width: 5%">
						<h5 style="color:#373435" class="center">:</h5>
					</td>
					<td>
						<h5 style="color:#373435" class="left"><?php echo $kode; ?></h5>
					</td>
				</tr>
				<tr>
					<td>
						<h5 style="color:#373435" class="left">Tanggal Input</h5>
					</td>
					<td style="width: 5%">
						<h5 style="color:#373435" class="center">:</h5>
					</td>
					<td style="width: 75%">
						<h5 style="color:#373435" class="left"><?php echo $tglnya; ?></h5>
					</td>
				</tr>
				<tr>
				</tr>
				<tr>	
					<td>
						<h5 style="color:#373435" class="left">Keperluan</h5>
					</td>
					<td style="width: 5%">
						<h5 style="color:#373435" class="center">:</h5>
					</td>
					<td>
						<h5 style="color:#373435" class="left"><?php echo $katee; ?></h5>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<br>
					</td>
				</tr>
			</table>
			
	
		<table class="border-0 text-center" style="width: 100%">
			<tr class='text-center' style="background-color:#373435;color:#ffffff">
				<th colspan="2" ><h5><p style="color:white">Detail Pengeluaran</p></h5></th>
			</tr>
			<tr rowspan="3">
				<th colspan="2" style="background-color:#9B8989;color:#ffffff"><?php echo nl2br(htmlspecialchars($ketee));?></th>
			</tr>	
			<tr>
				<th colspan="2"><br></td>
			</tr>		
			<tr>
				<td class="text-left" style="background-color:#c1373e;color:#ffffff"><b>Total Tagihan</td>
				<td class="text-center" style="background-color:#c1373e;color:#ffffff"><b>: <?php echo $nomii_tamp; ?></b></td>
			</tr>
		</table>
		
			<table class="border-0 text-center" style="width: 100%">
					
				<tr>
					<th colspan="2"><br><br></td>
				</tr>		
				<tr>
					<td class="text-left"><b>Diajukan Oleh: <?php echo $oleh; ?> </td>
					<td class="text-center"><b>Disetujui Oleh:</td>
				</tr>				
				<tr>
					<th colspan="2"><br><br><br></td>
				</tr>		
				<tr>
					<td class="text-left"></td>
					<td class="text-center"><b><?php echo $s_user; ?></td>
				</tr>
				<tr>
					<td class="text-left"></td>
					<td class='text-center'><b><?php echo $s_level; ?></td>
				</tr>
			</table>	
			
		<script>
			window.print();
		</script>
	</body>
</html>
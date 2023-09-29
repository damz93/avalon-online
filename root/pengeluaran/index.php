<?php
	session_start();
	$nama = $_SESSION['nama_lengkap'];
	$tgl_hari_ini = date('l, d F Y');
	 $bulan_ini = date('M-y');
	?>
<!doctype html>
<html>
	<head>
		<script src="../../assets/dist/js/color-modes.js"></script>
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
		<!-- data tabel -->
		<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
		<!-- akhir data tabel -->
		<!-- <style>
			.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
			}
			@media (min-width: 768px) {
			.bd-placeholder-img-lg {
			font-size: 3.5rem;
			}
			
			}
			.b-example-divider {
			width: 100%;
			height: 3rem;
			background-color: rgba(0, 0, 0, .1); 
			background-color: black;
			border: solid rgba(0, 0, 0, .15); ;
			border-width: 1px 0;
			box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
			}
			.b-example-vr {
			flex-shrink: 0;
			width: 1.5rem;
			height: 100vh;
			}
			.bi {
			vertical-align: -.125em;
			fill: currentColor;
			}
			.nav-scroller {
			position: relative;
			z-index: 2;
			height: 2.75rem;
			overflow-y: hidden;
			}
			.nav-scroller .nav {
			display: flex;
			flex-wrap: nowrap;
			padding-bottom: 1rem;
			margin-top: -1px;
			overflow-x: auto;
			text-align: center;
			white-space: nowrap;
			-webkit-overflow-scrolling: touch;
			}
			.btn-bd-primary {
			--bd-violet-bg: #712cf9;
			--bd-violet-rgb: 112.520718, 44.062154, 249.437846;
			--bs-btn-font-weight: 600;
			--bs-btn-color: var(--bs-white);
			--bs-btn-bg: var(--bd-violet-bg);
			--bs-btn-border-color: var(--bd-violet-bg);
			--bs-btn-hover-color: var(--bs-white);
			--bs-btn-hover-bg: #6528e0;
			--bs-btn-hover-border-color: #6528e0;
			--bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
			--bs-btn-active-color: var(--bs-btn-hover-color);
			--bs-btn-active-bg: #5a23c8;
			--bs-btn-active-border-color: #5a23c8;
			}
			.bd-mode-toggle {
			z-index: 1500;
			}
			.bd-mode-toggle .dropdown-menu .active .bi {
			display: block !important;
			}
			</style> -->
		<!-- Custom styles for this template -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="../../assets/dist/css/data-masuk-keluar.css" rel="stylesheet">
	</head>
	<body>
		<header class="navbar sticky-top flex-md-nowrap p-0 shadow" style="color:white;background-color:#c1373e">
			<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-light" href="#">Avalon Online</a>
			<ul class="navbar-nav flex-row d-md-none">
				<li class="nav-item text-nowrap">
					<button class="nav-link px-3 text-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
					<i class="bi bi-list"></i>
					</button>
				</li>
			</ul>
		</header>
		<div class="container-fluid">
		<div class="row">
			<div class="sidebar col-md-3 col-lg-2 p-0 bg-light">
				<!-- <nav id="sidebar" class="sidebar col-md-3 col-lg-2 d-md-block bg-light collapse"> -->
				<!-- <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel"> -->
				<div class="offcanvas-md offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
					<div class="offcanvas-header" style="background-color: white;">
						<h3 class="offcanvas-title mt-0" style="color:#c1373e;" id="sidebarMenuLabel">Avalon Online</h3>
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="../utama">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
										<path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
									</svg>
									Utama
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link d-flex align-items-center gap-2" href="../pemasukan/">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down-left" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M9.636 2.5a.5.5 0 0 0-.5-.5H2.5A1.5 1.5 0 0 0 1 3.5v10A1.5 1.5 0 0 0 2.5 15h10a1.5 1.5 0 0 0 1.5-1.5V6.864a.5.5 0 0 0-1 0V13.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
										<path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1H6.707l8.147-8.146a.5.5 0 0 0-.708-.708L6 9.293V5.5a.5.5 0 0 0-1 0v5z"/>
									</svg>
									Pemasukan
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link d-flex align-items-center gap-2 active" href="#">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-up-right" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M6.364 13.5a.5.5 0 0 0 .5.5H13.5a1.5 1.5 0 0 0 1.5-1.5v-10A1.5 1.5 0 0 0 13.5 1h-10A1.5 1.5 0 0 0 2 2.5v6.636a.5.5 0 1 0 1 0V2.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5H6.864a.5.5 0 0 0-.5.5z"/>
										<path fill-rule="evenodd" d="M11 5.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793l-8.147 8.146a.5.5 0 0 0 .708.708L10 6.707V10.5a.5.5 0 0 0 1 0v-5z"/>
									</svg>
									Pengeluaran
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link d-flex align-items-center gap-2" href="../laporan/">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-bar-graph" viewBox="0 0 16 16">
										<path d="M10 13.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-6a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v6zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"/>
										<path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
									</svg>
									Laporan
								</a>
							</li>
						</ul>
						<hr class="my-3 m-3" style="color:black">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link d-flex align-items-center gap-2" href="../pengaturan/">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
										<path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
										<path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
									</svg>
									Pengaturan
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link d-flex align-items-center gap-2" href="../logout.php">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
										<path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
									</svg>
									Logout
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- </nav> -->
			</div>
		</div>
		<main class="col-md-9 ms-sm-auto col-lg-10 px-md-5">
			<div class="row">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
				<h3 style="color:#373435">Data Pengeluaran - Avalon</h3>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="container">
					<a href="input-pengeluaran" class="btn btn-success mb-3">+ Pengeluaran</a>
					<div class="table-wrapper table-responsive">
						<div class="card p-3" style="background-color: white;border-color: black;">
							<div class="card-body">
								<table id="tabel1" class="table table-hover border" cellpadding="0" cellspacing="1">
									<thead class="center">
										<tr class="text-center table-primary">
											<!-- <th>No.</th>			    -->
											<th>Waktu Input</th>
											<th>Kategori</th>
											<th>Keterangan</th>
											<th>Untuk</th>
											<th>Nominal</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<?php 
										include '../../help/koneksi.php';
										$no=1;
										$data = mysqli_query($koneksi,"select * from tbl_pengeluaran order by ID DESC");
										while($d = mysqli_fetch_array($data)){
											// $tgl = $d['WAKTU'];
											// $tgl = substr($tgl,0,10);
											$tgl_buat = $d['WAKTU_DIBUAT'];
											$id = $d['ID'];
											$kategori = $d['KATEGORI'];
											$keterangan = $d['KETERANGAN'];
											$untuk = $d['UNTUK'];
											$nominal = number_format($d['NOMINAL'],0,",",".");
											// $mulai = date("d-m-Y", strtotime($mulai));    
											// $selesai = $d['TGL_SELESAI'];
											// $selesai = date("d-m-Y", strtotime($selesai));
											// $notes = $d['LAIN'];
											// $keterr = $d['KETERANGAN'];
											// $status = $d['STATUS'];
											// $persen = $d['PERSEN'];
											
										?>
									<tr class="center">
										<!-- <th class="center"><?php echo $no++; ?></th> -->
										<td class="text-left"><?php echo $tgl_buat; ?></td>
										<td class="text-center"><?php echo $kategori; ?></td>
										<td class="text-left"><?php echo $keterangan; ?></td>
										<td><?php echo $untuk; ?></td>
										<td class="text-end"><?php echo "Rp".$nominal; ?></td>
										<td class="text-center">
											<a target="_BLANK" href='cetak-pengeluaran?id=<?php echo $id; ?>' title="Cetak Nota Pengeluaran" onclick="return confirm('Pilih OK untuk mencetak...')">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
											<path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
											<path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
											</svg>
											</a> |
											<a href='hapus-pengeluaran.php?id=<?php echo $d['ID']; ?>' title="Hapus Pengeluaran" onclick="return confirm('Yakin Ingin Hapus?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16"><path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></a>
										</td>
										<!-- <td>			
											<a href='edit-diskon.php?kode_diskon=<?php echo $d['KODE_DISKON']; ?>' title="Edit Diskon">
											<img src="img/edit.png" class="img-responsive" height="100%"></a>	| 
											<a href='hapus-diskon.php?kode_diskon=<?php echo $d['KODE_DISKON']; ?>' title="Delete Diskon" onclick="return confirm('Are you sure you want to delete?')"><img src="img/delete.png" height="100%" ></a>
											</td> -->
									</tr>
									<?php 
										}
										?>
								</table>
								<script type="text/javascript">
									$(document).ready(function() {
										//$("#tabel1").tablesorter();
										$("#tabel1").DataTable({
											"paging": true,
											"ordering": false,
											"info": true,
											// });
											//$("#tabel1").DataTable({
											"language": {
												"decimal": "",
												"emptyTable": "Tidak ada data yang tersedia di tabel",
												"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ Inputan",
												"infoEmpty": "Menampilkan 0 sampai 0 dari 0 Inputan",
												"infoFiltered": "(difilter dari _MAX_ total Inputan)",
												"infoPostFix": "",
												"thousands": ".",
												"lengthMenu": "Menampilkan _MENU_ Data Pengeluaran",
												"loadingRecords": "memuat...",
												"processing": "Sedang di proses...",
												"search": "Pencarian:",
												"zeroRecords": "Arsip tidak ditemukan",
												"paginate": {
													"first": "Pertama",
													"last": "Terakhir",
													"next": "Selanjutnya",
													"previous": "Kembali"
												},
												"aria": {
													"sortAscending": ": aktifkan urutan kolom ascending",
													"sortDescending": ": aktifkan urutan kolom descending"
												}
											}
										});
									});
								</script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
		<script src="../../assets/dist/js/dashboard.js"></script>
	</body>
</html>
<?php
	error_reporting(0);	
	include "../../help/koneksi.php";
	date_default_timezone_set('Asia/Hong_Kong');
	session_start();
	// menyimpan data kedalam variabel
	$waktu_buat = date("d/m/Y h:i:s A");
	$oleh = $_SESSION['username'];
	//$level = $_SESSION['level'];	
	$tgl_buat = date("Y/m/d");
	$keterangan = $_POST['keterangan_pemasukan'];
	$kategori = $_POST['kategori_pemasukan'];
	
	$nominal = $_POST['nominal_pemasukan'];
	$nominal_s = str_replace(".","",$nominal); 
	
	
	// query SQL untuk insert data
	$query="INSERT INTO tbl_pemasukan(WAKTU_DIBUAT,TGL_DIBUAT,KATEGORI,KETERANGAN,NOMINAL,DIBUAT_OLEH)VALUES('$waktu_buat','$tgl_buat','$kategori','$keterangan','$nominal_s','$oleh')";
		if (mysqli_query($koneksi, $query)) {
			echo "<script>alert('Data Pemasukan Tersimpan');window.location.href='input-pemasukan';</script>";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
		}
	?>
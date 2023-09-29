<?php
	session_start();
	include "../../help/koneksi.php";
	error_reporting(0);
	$id   = $_GET['id'];
	// query SQL untuk insert data
	if ($_SESSION['status']!="login") {
		echo "<script>alert('Anda belum login.....');window.location.href='../../index.php?pesan=belum_login';</script>";
	}
	else if(($_SESSION['level']!="OWNER")AND($_SESSION['level']!="ADMIN")) {
		echo "<script>alert('Anda tidak memiliki akses.....');window.location.href='javascript:history.go(-1)';</script>";
	}
	else {
		$query="DELETE from tbl_pengeluaran where ID='$id'";
		if (mysqli_query($koneksi, $query)) {
			echo "<script>alert('Data berhasil terhapus');window.location.href='../pengeluaran';</script>";		
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
		}
	}
?>
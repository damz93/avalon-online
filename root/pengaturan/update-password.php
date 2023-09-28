<?php
	error_reporting(0);	
	include "../../help/koneksi.php";
	date_default_timezone_set('Asia/Hong_Kong');
	session_start();
	// menyimpan data kedalam variabel
	$waktu_buat = date("d/m/Y h:i:s A");
	$oleh = $_SESSION['username'];
	//$level = $_SESSION['level'];	
	$tgl_upd = date("Y/m/d");
	$password_lama = $_POST['password_lama'];
	$password_baru = $_POST['password_baru'];
	$data_cek_pass = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE USERNAME = '$oleh' and PASSWORD = '$password_lama'");
	$cek = mysqli_num_rows($data_cek_pass);
	if($cek < 1){
		echo "<script>alert('Gagal... Password yang dimaksudkan tidak sesuai');window.location.href='../pengaturan/';</script>";
	}
	else{
		$query="UPDATE tbl_user SET TGL_DIUPDATE='$tgl_upd',PASSWORD='$password_baru' where USERNAME='$oleh'";
			if (mysqli_query($koneksi, $query)) {
				echo "<script>alert('Password berhasil diperbaharui');window.location.href='../utama';</script>";
			} else {
				echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
			}
		}

?>
<?php 
	//error_reporting(0);
   // mengaktifkan session php
   session_start();
   
   // menghubungkan dengan koneksi
   include 'koneksi.php';
   
   // menangkap data yang dikirim dari form
   $username = $_POST['username'];
   $password = $_POST['password'];
   $level = $_POST['level'];
   $lev = $level;
   
   // menyeleksi data admin dengan username dan password yang sesuai
   $data = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE USERNAME = '$username' and PASSWORD = '$password'");
   $data2 = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE USERNAME = '$username' and PASSWORD = '$password' and LEVEL='$level'");
   
   while($d = mysqli_fetch_array($data2)){
	   $nama_lengk = $d['NAMA'];
	   
   }
   
   
   // menghitung jumlah data yang ditemukan
   $cek = mysqli_num_rows($data);
   $cek2 = mysqli_num_rows($data2);
   if ($level=="0"){
	echo "<script>alert('Level Harus diisi terlebih dahulu');window.location.href='../index?pesan=gagal';</script>";
   }
   else if (empty($username)||(empty($password))){
   	echo "<script>alert('Username dan Password harus diisi');window.location.href='../index?pesan=gagal';</script>";
   }
   else{
   	if($cek > 0){
   	    if ($cek2 > 0) {
   		    $_SESSION['username'] = $username;   		    
   		    $_SESSION['level'] = $level;   		    
   		    $_SESSION['nama_lengkap'] = $nama_lengk;
   		    $_SESSION['status'] = "login";
			if ($lev == "ADMIN") {
				$welcome = "Selamat datang ".$username."(Admin)";					
				echo "<script>alert('".$welcome."');window.location.href='../root/utama';</script>";
				
			}
			else if ($lev == "OWNER") {
				$welcome = "Selamat datang ".$username."(Owner)";					
				echo "<script>alert('".$welcome."');window.location.href='../root/utama';</script>";
			}	
   	    }
   	    else{
   	        echo "<script>alert('Maaf, Anda tidak punya akses...');window.location.href='../index?pesan=gagal';</script>";
   	    }
   	
   	}else{
   		echo "<script>alert('Username dan Password Salah...');window.location.href='../index?pesan=gagal';</script>";
   	}
   }
?>
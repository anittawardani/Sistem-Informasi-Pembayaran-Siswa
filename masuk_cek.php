<?php 
session_start();
include 'koneksi.php';

//devine variable
$username = $_POST['username'];
$password = $_POST['password'];

//query for cek data pengguna
$queryLogin = mysqli_query($konek,"SELECT * FROM tb_pengguna WHERE username='$username' AND password='$password'");
//get the row
$cekPengguna = mysqli_num_rows($queryLogin);

	//pengguna ditemukan
	if($cekPengguna > 0){
		//print data
		$data = mysqli_fetch_assoc($queryLogin);
		//cek level dari pengguna
		if($data['level']=="admin"){ 
			//jika pengguna admin
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "admin";
			header("location:beranda.php");
		}else{
			//jika pengguna siswa
			$_SESSION['nis']   = $username;
			$_SESSION['level'] = "siswa";
			header("location:beranda.php");
		}
	}else{
		//jika tidak ditemukan pengguna
		header("location:index.php?pesan=gagal2");
	}
?>


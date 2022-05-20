<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	//variabel untuk menyimpan kiriman dari form
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	if($user=='' || $pass==''){
		echo "Form belum lengkap!!";
	}else{
		include "koneksi.php";
		$sqlLogin = mysqli_query($konek, "SELECT * FROM admin 
						WHERE username='$user' AND password='$pass'");
		$jml = mysqli_num_rows($sqlLogin);
		$d=mysqli_fetch_array($sqlLogin);
		if($jml > 0){
			session_start();
			$_SESSION['login']	= true;
			$_SESSION['id']		= $d['idadmin'];
			$_SESSION['username']=$d['username'];
			
			header('location:./index.php');
		}else{
			echo "Username dan Password Anda Salah";
		}
	}
}
?>
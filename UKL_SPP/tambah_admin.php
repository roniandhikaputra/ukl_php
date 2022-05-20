<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<?php include "header.php"; ?>

<div class="container">
	<div class="page-header">
		<h3>Tambah Data Admin</h3>
	</div>
	<form method="post" action="">
		<table class="table">
			<tr>
				<td>Nama Admin</td>
				<td><input class="form-control" type="text" name="username" /></td>
			</tr>

			<tr>
				<td>Passwordmu</td>
				<td><input class="form-control" type="text" name="password" /></td>
			</tr>

			<tr>
				<td></td>
				<td><input class="btn btn-success" type="submit" value="Simpan" /></td>
			</tr>
		</table>
	</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	//variabel dari elemen form
	$nama = mysqli_real_escape_string($konek, $_POST[ 'username']);
	
	if($nama==''){
		echo "Form belum lengkap!!!";
	}else{

		$simpan = mysqli_query($konek, "INSERT INTO admin(username) VALUES ('$nama')");
		
		if(!$simpan){
			echo "Simpan data gagal!!";
		}else{
			header('location:tampil_admin.php');
		}
	}
}


?>
</div>
<?php include "footer.php"; ?>
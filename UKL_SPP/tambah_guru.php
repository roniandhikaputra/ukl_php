<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>

<?php include "header.php"; ?>

<div class="container">
	<div class="page-header">
		<h3>Tambah Data Guru</h3>
	</div>
	<form method="post" action="">
		<table class="table">
			<tr>
				<td>Nama Guru</td>
				<td><input class="form-control" type="text" name="namaguru" /></td>
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
		$nama = mysqli_real_escape_string($konek, $_POST['namaguru']);
		
		if($nama==''){
			echo "Form belum lengkap!!!";
		}else{
			//proses simpan data guru
			$simpan = mysqli_query($konek, "INSERT INTO guru(namaguru) VALUES ('$nama')");
			
			if(!$simpan){
				echo "Simpan data gagal!!";
			}else{
				header('location:tampil_guru.php');
			}
		}
	}
	?>
</div>
<?php include "footer.php"; ?>
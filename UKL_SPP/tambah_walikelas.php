<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Wali Kelas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>

<?php include "header.php"; ?>

<div class="container">
	<div class="page-header">
		<h3>Tambah data Kelas dan Wali Kelas</h3>
	</div>

	<form method="POST" action="">
		<table class="table">
			<tr>
				<td width="160px">Kelas</td>
				<td><input class="form-control" type="text" name="kelas" maxlength="40" /></td>
			</tr>
			<tr>
				<td>Pilih Guru / Wali Kelas</td>
				<td>
					<select name="guru" class="form-control">
						<option value="" selected>- Pilih Guru -</option>
						<?php
						$sqlGuru=mysqli_query($konek, "SELECT * FROM guru ORDER BY idguru ASC");
						while($g=mysqli_fetch_array($sqlGuru)){
							echo "<option value='$g[idguru]'>$g[namaguru]</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input class="btn btn-success" type="submit" value="Simpan" /></td>
			</tr>
		</table>	
	</form>

	<!-- untuk memproses form -->
	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$kelas = $_POST['kelas'];
		$guru = $_POST['guru'];
		
		if($kelas=='' || $guru==''){
			echo "Form belum lengkap!!!";		
		}else{
			//simpan data
			$simpan = mysqli_query($konek, "INSERT INTO walikelas(kelas,idguru)
							VALUES ('$kelas','$guru')");
			
			if(!$simpan){
				echo "Simpan data gagal!!!";
			}else{
				header('location:tampil_walikelas.php');
			}
		}
	}
	?>
</div>

<?php include "footer.php"; ?>
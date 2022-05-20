<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data SISWA</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body>
<?php include "header.php"; ?>

<?php
$sqlEdit = mysqli_query($konek, "SELECT * FROM siswa WHERE idsiswa='$_GET[id]'");
$e=mysqli_fetch_array($sqlEdit);
?>

<div class="container">
	<div class="page-header">
		<h3>Edit data Siswa</h3>
	</div>
<form method="POST" action="">
	<input type="hidden" name='idsiswa' value="<?php echo $e['idsiswa']; ?>" />
	<table class="table">
		<tr>
			<td width="160px">NIS</td>
			<td><input type="text" class="form-control" name="nis" value="<?php echo $e['nis']; ?>" maxlength="10"></td>
		</tr>
		<tr>
			<td>Nama Siswa</td>
			<td><input type="text" name="namasiswa" class="form-control" value="<?php echo $e['namasiswa']; ?>" maxlength="40"></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>
				<select name="kelas">
					<?php
					$sqlKelas = mysqli_query($konek, "select * from walikelas order by kelas ASC");
					while($k=mysqli_fetch_array($sqlKelas)){

						if($k['kelas'] == $e['kelas']){
							$selected = "selected";
						}else{
							$selected ="";
						}

						?>
						<option value="<?php echo $k['kelas']; ?>" <?php echo $selected; ?>><?php echo $k['kelas']; ?></option>
						<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tahun Ajaran</td>
			<td><input type="text" name="tahunajaran" value="<?php echo $e['tahunajaran']; ?>" /></td>
		</tr>
		<tr>
			<td>Biaya SPP</td>
			<td><input type="text" name="biaya" value="<?php echo $e['biaya']; ?>" readonly /></td>
		</tr>
		<tr>
			<td>Jatuh Tempo Pertama</td>
			<td><input type="text" name="jatuhtempo" value="input tanggal" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input class="btn btn-success" type="submit" value="Update" /></td>
		</tr>
	</table>
</form>

<!-- proses edit data -->
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

	//variabel untuk menampung inputan dari form
	$id 	= $_POST['idsiswa'];
	$nis 	= $_POST['nis'];
	$nama 	= $_POST['namasiswa'];
	$kelas 	= $_POST['kelas'];
	$tahun 	= $_POST['tahunajaran'];
	$biaya 	= $_POST['biaya'];

	if($nis=='' || $nama =='' || $kelas==''){
		echo "Form Belum lengkap....";
	}else{
		$update = mysqli_query($konek, "UPDATE siswa SET nis='$nis',   #nama fungsi php untuk menjalankan instruksi atau argumen ke mysql
											namasiswa='$nama',
											kelas='$kelas',
											tahunajaran='$tahun',
											biaya='$biaya'
										WHERE idsiswa='$id'");

		if(!$update){
			echo "Update data gagal...";

		}else{
			header('location:tampil_siswa.php');
		}
	}
}
?>
</div>
<?php include "footer.php" ?>
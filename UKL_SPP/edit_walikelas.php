<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data WaliKelas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body>
<?php include "header.php"; ?>

<?php
$sqlEdit = mysqli_query($konek, "SELECT * FROM walikelas WHERE kelas='$_GET[kls]'");
$e=mysqli_fetch_array($sqlEdit);
?>

<div class="container">
	<div class="page-header">
		<h3>Edit data Kelas dan Wali Kelas</h3>
	</div>
<form method="POST" action="">
	<table class="table">
		<tr>
			<td width="160px">Kelas</td>
			<td><input type="text" class="form-control" name="kelas" value="<?php echo $e['kelas']; ?>" maxlength="40" readonly /></td>
		</tr>
		<tr>
			<td>Pilih Guru / Wali Kelas</td>
			<td>
				<select name="guru" class="form-control">
					<?php
					$sqlGuru=mysqli_query($konek, "SELECT * FROM guru ORDER BY idguru ASC");
					while($g=mysqli_fetch_array($sqlGuru)){
						if($g['idguru'] == $e['idguru']){
							$selected = "selected";
						}else{
							$selected = "";
						}
						
						echo "<option value='$g[idguru]' $selected>$g[namaguru]</option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input class="btn btn-success" type="submit" value="Update" /></td>
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
		//update data
		$update = mysqli_query($konek, "UPDATE walikelas SET idguru='$guru' WHERE kelas='$kelas'");
		
		if(!$update){
			echo "Update data gagal!!!";
		}else{
			header('location:tampil_walikelas.php');
		}
	}
}
?>
</div>

<?php include "footer.php"; ?>
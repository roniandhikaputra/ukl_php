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

<?php
$sqlEdit=mysqli_query($konek, "SELECT * FROM guru WHERE idguru='$_GET[id]'");
$e=mysqli_fetch_array($sqlEdit);
?>
<div class="container">
	<div class="page-header">
		<h3>Edit Data Guru</h3>
	</div>
	<form method="post" action="">
		<input type="hidden" name="idguru" value="<?php echo $e['idguru']; ?>" />
		<table class="table">
			<tr>
				<td>Nama Guru</td>
				<td><input type="text" class="form-control" name="namaguru" value="<?php echo $e['namaguru']; ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input class="btn btn-success" type="submit" value="Update" /></td>
			</tr>
		</table>
	</form>

	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//variabel dari elemen form
		$id		= $_POST['idguru'];
		$nama 	= $_POST['namaguru'];
		
		if($nama==''){
			echo "Form belum lengkap!!!";
		}else{
			//proses edit data guru
			$edit = mysqli_query($konek, "UPDATE guru SET namaguru='$nama' WHERE idguru='$id'");
			
			if(!$edit){
				echo "Edit data gagal!!";
			}else{
				header('location:tampil_guru.php');
			}
		}
	}
	?>
</div>
<?php include "footer.php"; ?>
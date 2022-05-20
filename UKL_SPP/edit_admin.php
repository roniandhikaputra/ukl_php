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

<?php
$sqlEdit=mysqli_query($konek, "SELECT * FROM admin WHERE idadmin='$_GET[id]'");
$e=mysqli_fetch_array($sqlEdit);
//mysqli_fetch_array berfungsi menangkap data dari hasil perintahR
?>
<h3>Edit Data Admin</h3>
<form method="post" action="">
	<input type="hidden" name="idadmin" value="<?php echo $e['idadmin']; ?>" />
	<table>
		<tr>
			<td>Nama Guru</td>
			<td><input type="text" name="username" value="<?php echo $e['username']; ?>" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Update" /></td>
		</tr>
	</table>
</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	//variabel dari elemen form
	$id		= $_POST['idadmin'];
	$nama 	= $_POST['username'];
	
	if($nama==''){
		echo "Form belum lengkap!!!";
	}else{
		//proses edit data guru
		$edit = mysqli_query($konek, "UPDATE admin SET username='$nama' WHERE idadmin='$id'");
		
		if(!$edit){
			echo "Edit data gagal!!";
		}else{
			header('location:tampil_admin.php');
		}
	}
}
?>

<?php include "footer.php"; ?>
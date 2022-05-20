<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data ADMIN</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
	
	<?php include "header.php"; ?>
<div class="container">
	<div class="page-header">
		<h3>Data Admin</h3>
	</div>
	<a class="btn btn-primary" style="margin-bottom: 10px" href="tambah_admin.php">Tambah Data</a>
	<table class="table table-bordered table-striped">
		<tr>
			<th>No.</th>
			<th>Nama Admin</th>
			<th>Aksi</th>
		</tr>
		
		<?php
		$sql=mysqli_query($konek, "SELECT * FROM admin ORDER BY idadmin ASC");
		$no=1;
		while($d=mysqli_fetch_array($sql)){
			echo "<tr>
				<td width='40px' align='center'>$no</td>
				<td>$d[username]</td>
				<td width='160px' align='center'>
				<a class='btn btn-success btn-sm' href='edit_admin.php?id=$d[idadmin]'>Edit</a> /
				<a class='btn btn-danger btn-sm' href='hapus_admin.php?id=$d[idadmin]'>Hapus</a> </td>
				</tr>";
			$no++;
		}
		?>
	</table>
</div>
<?php include "footer.php"; ?>
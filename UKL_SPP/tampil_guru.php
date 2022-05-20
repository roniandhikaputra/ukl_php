<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data GURU</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
	<?php include "header.php"; ?>

<div class="container">
	<div class="page-header">
		<h3>Data Guru</h3>
	</div>
	<a class="btn btn-primary" style="margin-bottom: 10px" href="tambah_guru.php">Tambah Data</a><br/>
	<table class="table table-bordered table-striped">
		<tr>
			<th>No.</th>
			<th>Nama Guru</th>
			<th>Aksi</th>
		</tr>
		<?php
		$sql=mysqli_query($konek, "SELECT * FROM guru ORDER BY idguru ASC");
		$no=1;
		while($d=mysqli_fetch_array($sql)){
			echo "<tr>
				<td width='40px' align='center'>$no</td>
				<td>$d[namaguru]</td>
				<td width='160px' align='center'>
					<a class='btn btn-success btn-sm' href='edit_guru.php?id=$d[idguru]'>Edit</a> /
					<a class='btn btn-danger btn-sm' href='hapus_guru.php?id=$d[idguru]'>Hapus</a>
				</td>
			</tr>";
			$no++;
		}
		?>
	</table>
</div>
<?php include "footer.php"; ?>
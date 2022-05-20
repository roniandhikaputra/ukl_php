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

<div class="container">
	<div class="page-header">
		<h3>Data Siswa</h3>
	</div>
<a class="btn btn-primary" style="margin-bottom: 10px" href="tambah_siswa.php">Tambah Data</a>
<table class="table table-bordered table-striped">
	<tr>
		<th>No.</th>
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>Tahun Ajaran</th>
		<th>Biaya</th>
		<th>Aksi</th>
	</tr>

	<?php 
	$sql = mysqli_query($konek,"select * from siswa order by kelas asc");
	$no=1;
	while($d=mysqli_fetch_array($sql)){ //menangkap data dari hasil query
		echo "<tr>
			<td width='40px' align='center'>$no</td>
			<td>$d[nis]</td>
			<td>$d[namasiswa]</td>
			<td>$d[kelas]</td>
			<td>$d[tahunajaran]</td>
			<td>$d[biaya]</td>
			<td width='160px' align='center'>
				<a class='btn btn-success btn-sm' href='edit_siswa.php?id=$d[idsiswa]'>Edit</a> /
				<a class='btn btn-danger btn-sm' href='hapus_siswa.php?id=$d[idsiswa]'>Hapus</a>
			</td>
		</tr>";
		$no++;
	}
	?>
</table>
</div>

<?php include "footer.php"; ?>
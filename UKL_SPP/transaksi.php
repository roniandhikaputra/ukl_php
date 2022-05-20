<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>

<?php include "header.php" ?>

<div class="container">
	<div class="page-header">
	<h3>Transaksi Pembayaran SPP</h3>
<form method="get" action="">
	NIS: <input class="form-control" type="text" name="nis" /></td>
	<input class="btn btn-success" type="submit" value="Cari Siswa" /></td>
</form>

<?php
if(isset($_GET['nis']) && $_GET['nis']!=''){
	$sqlSiswa = mysqli_query($konek, "SELECT * FROM siswa WHERE nis='$_GET[nis]'");
	$ds=mysqli_fetch_array($sqlSiswa);
	$nis = $ds['nis'];
?> 

<h3>Biodata Siswa</h3>
<table>
	<tr>
		<td>NIS</td>
		<td>:</td>
		<td><?php echo $ds['nis']; ?></td>
	</tr>
	<tr>
		<td>Nama Siswa</td>
		<td>:</td>
		<td><?php echo $ds['namasiswa']; ?></td>
	</tr>
	<tr>
		<td>Kelas</td>
		<td>:</td>
		<td><?php echo $ds['kelas']; ?></td>
	</tr>
	<tr>
		<td>Tahun Ajaran</td>
		<td>:</td>
		<td><?php echo $ds['tahunajaran']; ?></td>
	</tr>
</table>

<h3>Tagihan SPP Siswa</h3>
<table border="1">
	<tr>
		<th>No</th>
		<th>Bulan</th>
		<th>Jatuh Tempo</th>
		<th>No. Bayar</th>
		<th>Tgl. Bayar</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
		<th>Bayar</th>
	</tr>

	<?php
	$sql = mysqli_query($konek, "SELECT * FROM spp WHERE idsiswa='$ds[idsiswa]' ORDER BY jatuhtempo ASC");
	$no=1;
	while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td>$no</td>
			<td>$d[bulan]</td>
			<td>$d[jatuhtempo]</td>
			<td>$d[nobayar]</td>
			<td>$d[tglbayar]</td>
			<td>$d[jumlah]</td>
			<td>$d[ket]</td>
			<td align='center'>";
				if($d['nobayar']==''){
					echo "<a href='proses_transaksi.php?nis=$nis&act=bayar&id=$d[idspp]'>Bayar</a>";
				}else{
					echo "-";
				}
			echo "</td>
		</tr>";
		$no++;
	}
	?>
</table>

<?php
}
?>

<p>Wajib Bayar Pada Tanggal Yang Ditentukan!!!</p>

<?php include "footer.php" ?>
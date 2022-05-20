<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>

<?php include "header.php"; ?>

<div class="container">
	<div class="page-header">
		<h3>Laporan</h3>
    </div>
<ul>
    <li><a href="laporan_data_guru.php" target="_blank">Laporan Data Guru</a></li>
    <li><a href="laporan_data_siswa.php" target="_blank">Laporan Data Siswa</a></li>
    <li>
        <strong>Laporan Pembayaran</strong><br/>
        <form method="GET" action="laporan_pembayaran.php" target="_blank">
            Mulai Tanggal <input type="date" name="tgl1" value="<?php echo date('Y-m-d'); ?>"/>
            Sampai Tanggal <input type="date" name="tgl2"value="<?php echo date('Y-m-d'); ?>"/>
            <input class="btn btn-success" type="submit" value="Tampilkan" /></td>
        </form>
    </li>
</ul>
</div>
<?php include "footer.php"; ?>
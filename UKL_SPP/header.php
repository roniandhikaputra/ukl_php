<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location:login.php');
}

include "koneksi.php";
?>
  <?php
     include "navbar.php";
    ?>
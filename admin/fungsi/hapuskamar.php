<?php
include "koneksi.php";
$ambil = $_GET['id'];

// Disable foreign key checks
$pdo->query("SET FOREIGN_KEY_CHECKS=0;");

// Delete the rows from the tables
$pdo->query("DELETE FROM kamar WHERE idkamar='$ambil'");
$pdo->query("DELETE FROM stokkamar WHERE idkamar='$ambil'");

// Enable foreign key checks again
$pdo->query("SET FOREIGN_KEY_CHECKS=1;");

echo "<script>document.location.href='../datakamar';</script>";
?>

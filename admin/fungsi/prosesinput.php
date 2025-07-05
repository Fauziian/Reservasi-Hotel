<?php
include "koneksi.php";

// Capture POST data
$id = $_POST['id'];  // idkamar
$tipe = $_POST['tipe'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$gambar = $_FILES['gambar']['name'];

// Cek apakah idkamar sudah ada di tabel kamar
$cekIdKamar = $pdo->query("SELECT COUNT(*) FROM kamar WHERE idkamar = '$id'");
$result = $cekIdKamar->fetchColumn();

if ($result > 0) {
    // Jika idkamar sudah ada, tampilkan pesan error
    echo "<script>alert('ID Kamar sudah ada. Silakan pilih ID yang berbeda.');document.location.href='../datakamar';</script>";
} else {
    // Jika idkamar belum ada, lakukan proses insert
    // SQL untuk memasukkan data ke tabel kamar
    $sqlsimpan = $pdo->query("INSERT INTO kamar (idkamar, tipe, jumlah, harga, gambar) 
                             VALUES ('$id', '$tipe', '$jumlah', '$harga', '$gambar')");

    // SQL untuk memasukkan data ke tabel stokkamar
    $sqlsimpan2 = $pdo->query("INSERT INTO stokkamar (idstokkamar, idkamar, tipe, stok) 
                              VALUES ('$id', '$id', '$tipe', '$jumlah')");

    // Pindahkan file gambar ke direktori tujuan
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../../simpangambar/" . $_FILES['gambar']['name']);

    // Redirect setelah data berhasil disimpan
    echo "<script>alert('Data Kamar Tersimpan');document.location.href='../datakamar';</script>";
}
?>

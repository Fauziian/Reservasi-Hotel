<?php
    require_once "view/header.php";
?>

<aside>
    <!-- Judul Halaman Admin -->
    <div id="abc">
        <p>ADMIN RESERVASI HOTEL</p>
    </div>

    <!-- Daftar Gambar Kamar Hotel -->
    <div class="kamar-container">
        <div class="kotak">
            <img src="../gambar/Superior.jpg" width="100%" height="100%">
            <p>Kamar Superior</p>
        </div>
        <div class="kotak">
            <img src="../gambar/Presidential.jpg" width="100%" height="100%">
            <p>Kamar Presidential</p>
        </div>
        <div class="kotak">
            <img src="../gambar/Deluxe.jpg" width="100%" height="100%">
            <p>Kamar Deluxe</p>
        </div>
        <div class="kotak">
            <img src="../gambar/Ruang-Konferensi.jpg" width="100%" height="100%">
            <p>Ruang Konferensi</p>
        </div>
    </div>
	<?php
    require_once "view/header.php";

    // Query untuk menghitung total reservasi hari ini
    $totalReservasi = $pdo->query("SELECT COUNT(*) as total FROM pemesanan WHERE DATE(tglpesan) = CURDATE()")->fetchColumn();

    // Query untuk menghitung total kamar yang tersedia hari ini
    $totalKamar = $pdo->query("SELECT SUM(stokkamar.stok) as total FROM stokkamar")->fetchColumn();

    // Query untuk menghitung total pendapatan hari ini
    $totalPendapatan = $pdo->query("SELECT SUM(pemesanan.totalbayar) as total FROM pemesanan WHERE DATE(tglpesan) = CURDATE()")->fetchColumn();

?>
    <!-- Ringkasan Reservasi atau Statistik -->
    <div id="reservasi-summary">
		<h3>Ringkasan Reservasi</h3>
        <p>Total Reservasi Hari Ini: <?php echo $totalReservasi ?></p>
        <p>Total Kamar Tersedia: <?php echo $totalKamar ?></p>
        <p>Total Pendapatan Hari Ini: Rp. <?php echo number_format($totalPendapatan, 0, ',', '.') ?></p>
    </div>
	

</aside>

<?php
    require_once "view/footer.php";
?>

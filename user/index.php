<?php
	require_once "view/header.php";
	if(isset($_SESSION['tipe'])) {
		$amb = $_SESSION['tipe'];
		$sqlx = $pdo->query("SELECT * FROM kamar WHERE tipe=$amb");
		$datax = $sqlx->fetch();
		$idkamar = $datax['idkamar'];
		$tipe = $datax['tipe'];
		$jumlah = $datax['jumlah'];
		$gambar = $datax['gambar'];
		$harga = $datax['harga'];
		$hargaf = number_format($harga, 0, ',', '.');
	}
?>

<script type="text/javascript">
	function pilih() {
		var type = document.opsi.tipe.value;
		var teks = document.getElementById('selek').options[document.getElementById('selek').selectedIndex].text;
		document.opsi.harga.value = type;
		document.opsi.tipex.value = teks;

	}
</script>

<div id="imgindex">
    <div id="imglog">
        <p><br>SELAMAT DATANG<br>
        <?php 
            if (isset($_SESSION['user'])) {
                $id_tamu = $_SESSION['user'];
                $sqll = $pdo->query("SELECT nama FROM tamu WHERE idtamu = '$id_tamu'");
                $user_data = $sqll->fetch();
                $nama_user = $user_data['nama'];
                echo strtoupper($nama_user); 
            } else {
                echo "Pengguna"; 
            }
        ?>
        <br><br>&nbsp;</p>
    </div>
</div>


			<div id="reservasi">
				<li>Reservasi</li>
				<form method="post" action="pemesanan" name="opsi">
					<table>
						<tr>
							<td>Check-In</td>
							<td>Check-Out</td>
							<td>Type</td>
							<td>Harga/Malam</td>
							<td></td>
						</tr>
						<tr>
							<td>
								<input type="date" name="cekin">
							</td>
							<td>
								<input type="date" name="cekout">
							</td>
							<td>
								<select name="tipe" id="selek" required="required" onchange="pilih()" style="font-weight: bold;">
									<option selected="selected" disabled="disabled">-Pilih-</option>
									<option value="Rp 350.000">Standard</option>
									<option value="Rp 430.000">Superior</option>
									<option value="Rp 550.000">Deluxe</option>
									<option value="Rp 700.000">Junior Suite</option>
									<option value="Rp 900.000">Suite</option>
									<option value="Rp 1.200.000">Executive</option>
									<option value="Rp 2.000.000">Presidential/Penthouse</option>
								</select>
							</td>
							<td>
								<input type="text" name="harga" style="width: 100px;" onchange="pilih()">
								<input type="hidden" name="tipex" style="width: 100px;" onchange="pilih()">
							</td>
							<td>
								<input type="submit" name="ok" value="Pesan" id="tombol">
							</td>
						</tr>
					</table>
				</form>
			</div>

			<div id="tentang">
				<h3>Tentang Kami</h3><br>
				<p>					
					Horison Unjani adalah kampus yang menawarkan fasilitas unik berupa hotel yang dapat digunakan oleh mahasiswa dan mahasiswi untuk tempat tinggal selama masa studi. Dengan adanya hotel ini, mahasiswa tidak perlu khawatir lagi mengenai tempat tinggal, sehingga mereka dapat fokus pada kegiatan akademik tanpa gangguan.
					Horison Unjani berjarak sekitar 1 km dari Stasiun Cimahi. Stasiun Cimahi merupakan jalur transportasi yang menghubungkan berbagai daerah, mulai dari Jakarta hingga Bandung, memudahkan akses bagi mahasiswa yang datang dari luar kota.
					Hotel yang disediakan oleh Horison Unjani menawarkan kenyamanan dan fasilitas modern, seperti kamar yang dilengkapi dengan AC, Wi-Fi, dan layanan kebersihan. Fasilitas ini sangat mendukung kebutuhan mahasiswa yang ingin memiliki tempat tinggal yang nyaman dan strategis, dekat dengan kampus. Selain itu, hotel ini juga dilengkapi dengan ruang-ruang bersama yang memungkinkan mahasiswa untuk belajar atau berkolaborasi.
				</p><br>
			</div>

			<div id="cekinout">
				<h3>Check-In &amp; Check-Out</h3><br>
				<h4>Check-In</h4>
				<p>Jam Check-In Standar : 12.00 WITA</p>
				<p>*Waktu Check-In dari plan mempunyai prioritas lebih besar</p><br>
				<h4>Check-Out</h4>
				<p>Jam Check-Out Standar : 12.00 WITA</p>
				<p>*Waktu Check-Out dari plan mempunyai prioritas lebih besar</p><br>
			</div>

			<div id="petalokasi">
				<h3>Peta Lokasi</h3><br>
				<img src="../gambar/mapsunjani.png" width="70%">
			</div>
			</center>
	

<?php
	require_once "view/footer.php"
?>
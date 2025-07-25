<?php
    require_once "view/header.php";
?>

<aside>
    <center>
        <h3>Stok Kamar</h3>
        <div id="datakamar">
        <?php
            include "fungsi/koneksi.php";
            // Query untuk menggabungkan data stok kamar dan detail kamar
            $sql = $pdo->query("
                SELECT 
                    stokkamar.idkamar AS id, 
                    stokkamar.tipe AS tipe, 
                    stokkamar.stok AS stok, 
                    kamar.gambar AS gambar 
                FROM 
                    stokkamar 
                LEFT JOIN 
                    kamar 
                ON 
                    stokkamar.idkamar = kamar.idkamar
            ");
            while ($data = $sql->fetch()) {
                $id = $data['id'];
                $tipe = $data['tipe'];
                $stok = $data['stok'];
                $gambar = $data['gambar'];

                // Potong nama tipe jika terlalu panjang
                $bts = 25;
                $tpak = strlen($tipe);
                $tp = ($tpak > $bts) ? substr($tipe, 0, $bts) . '...' : $tipe;
        ?>
        <head>
			<style>
				#datakamar {
					display: flex;
					justify-content: flex-start; /* Agar elemen berada di kiri */
					gap: 20px;
					flex-wrap: wrap;
				}

				.kamar {
					width: 250px;
					margin-bottom: 20px;
				}

				.kamar img {
					width: 200px;
					height: 150px;
				}
			</style>
		</head>
            <div class="kamar">
                <table>
                    <tr>
                        <td>
                            <center>
                                <a href="detailkamar?id=<?php echo $id ?>" style="text-decoration:none;">
                                <div class="idkamar">
                                    <?php echo $id ?>
                                </div>
                                <div class="tipekamar"><b><?php echo $tp ?></b></div>
                                <img src="../simpangambar/<?php echo $gambar ?>" width="200px" height="150px"/>
                                <div class="tipekamar">Stok <?php echo $stok ?> Kamar</div>
                                </a>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                <a href="editstok?id=<?php echo $id ?>">
                                    <button style="width:70px;background-color:#000;color:white;font-weight:bold;padding:4px;border:1px solid red;">Edit</button>
                                </a> 
                                <a href="fungsi/hapusstok?id=<?php echo $id ?>" onclick="return confirm('Anda akan menghapus?')">
                                    <button style="width:70px;background:#B40301;color:white;font-weight:bold;padding:4px;border:1px solid red;">Hapus</button>
                                </a>
                            </center>
                        </td>
                    </tr>
                </table>
            </div>
        <?php
            }
        ?>
        </div>
    </center>
</aside>

<?php
    require_once "view/footer.php";
?>

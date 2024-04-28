<?php 
require 'function.php';

// Ambil data dari tabel atk
if (isset($_POST["cari"])) {
    $keyword = $_POST["keyword"]; // Simpan keyword pencarian
    $katalog_atk = cari($keyword); // Menetapkan hasil pencarian ke $katalog_atk
} else {
    // Jika tidak ada pencarian, ambil semua data atk
    $katalog_atk = query("SELECT * FROM atk ORDER BY id ASC");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ASET/Style.css">
    <title>Tampilan Utama</title>
</head>
<body>
    <div class="container">
        <h1 class="judul">Katalog ATK</h1>
        <a href="tambah.php" class="tombol">Tambah Data Barang</a>
        <br><br>
        <!-- Formulir pencarian -->
        <form action="" method="POST" class="form-cari">
            <input type="text" name="keyword" size="35" autofocus placeholder="Masukkan pencarian" autocomplete="off">
            <button type="submit" name="cari">Cari</button>
        </form>
        <br><br>
        <!-- Tabel untuk menampilkan data atk -->
        <table border="2" cellpadding="10" cellspacing="0" class="tabel-atk">
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Detail</th>
                <th>Qty</th>
                <th>Gambar</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($katalog_atk as $row) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row['id']; ?>" class="aksi">Ubah</a>
                        <a href="hapus.php?id=<?= $row['id']; ?>" class="aksi">Hapus</a>
                    </td>
                    <td><?= $row['kode'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['detail'] ?></td>
                    <td><?= $row['qty'] ?></td>
                    <td>
                        <img src="ASET/<?= $row['gambar'] ?>" width="50">
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="footer">
        <p>Toko ATK by Amalia </p>
    </div>
</body>
</html>

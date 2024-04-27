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
    <title>Tampilan Utama</title>
</head>
<body>
    <h1>Katalog ATK</h1>
    <a href="tambah.php">Tambah Data Barang</a>

    <br><br>

    <!-- Formulir pencarian -->
    <form action="" method="POST">
        <input type="text" name="keyword" size="35" autofocus placeholder="Masukkan pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>

    <br><br>

    <!-- Tabel untuk menampilkan data atk -->
    <table border="2" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>kode</th>
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
                    <a href="ubah.php?id=<?= $row['id']; ?>">ubah</a>
                    <a href="hapus.php?id=<?= $row['id']; ?>">hapus</a>
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
</body>
</html>

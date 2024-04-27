<?php 
//koneksi dbms
require "function.php";

//apakah tombol submit sudah ditekan apa belum
if(isset($_POST["submit"])) {
    //cek apakah data berhasil atau tidak 
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'index.php';
        </script>
        ";
    } else{
        echo "
        <script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'index.php';
        </script>
        ";
    }
 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog</title>
</head>
<body>
    <h1>Tambah Barang</h1>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="kode"> Kode : </label>
                <input type="text" name="kode" id="kode" required>
            </li>
            <li>
                <label for="nama"> Nama : </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="detail"> Detail : </label>
                <input type="text" name="detail" id="detail"required
            >
            </li>
            <li>
                <label for="qty"> Qty: </label>
                <input type="text" name="qty" id="qty" required>
            </li>
            <li>
                <label for="gambar"> Gambar : </label>
                <input type="text" name="gambar" id="gambar" required>
            </li>
            <button type="submit" name="submit">Kirim</button>
        </ul>
    </form>
</body>
</html>

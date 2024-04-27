<?php 
//koneksi dbms
require "function.php";


//ambil data di URL 
$id = $_GET["id"];

// query atk berdasarkan id 
$atk = query("SELECT * FROM atk WHERE id = $id")[0];


//apakah tombol submit sudah ditekan apa belum
if(isset($_POST["submit"])) {
    //cek apakah data berhasil dubah atau tidak 
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil diubah!');
        document.location.href = 'index.php';
        </script>
        ";
    } else{
        echo "
        <script>
        alert('Data gagal diubah!');
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
    <title>Halaman Ubah Data Barang</title>
</head>
<body>
    <h1>Ubah Data Barang</h1>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?=$atk["id"]; ?>">
        <ul>
            <li>
                <label for="kode"> Kode : </label>
                <input type="text" name="kode" id="kode" required value="<?=$atk["kode"]; ?>">
            </li>
            <li>
                <label for="nama"> Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?=$atk["nama"]; ?>">
            </li>
            <li>
                <label for="detail"> Detail : </label>
                <input type="text" name="detail" id="detail"required value="<?=$atk["detail"]; ?>">
            
            </li>
            <li>
                <label for="qty"> Qty : </label>
                <input type="text" name="qty" id="qty" required value="<?=$atk["qty"]; ?>">
            </li>
            <li>
                <label for="gambar"> Gambar : </label>
                <input type="text" name="gambar" id="gambar" required value="<?=$atk["gambar"]; ?>">
            </li>
            <button type="submit" name="submit">Ubah data</button>
        </ul>
    </form>
</body>
</html>

<?php
// Memasukkan file yang berisi definisi fungsi-fungsi
require_once "function.php";

// Memanggil fungsi hapus() 
if(isset($_GET['id'])) {
    $id = $_GET["id"];

    if (hapus($id) > 0) {
        echo "
        <script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
            <script>
            alert('Data Gagal Dihapus!');
            document.location.href = 'index.php';
            </script>
            ";
    }
} else {
    echo "ID tidak ditemukan";
}
?>

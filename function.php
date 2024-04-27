<?php 
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "katalog_atk");

// Fungsi untuk menjalankan query dan mengambil hasilnya dalam bentuk array
function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi untuk menambahkan data barang ke database
function tambah($data){
    global $koneksi;
    $nama = htmlspecialchars($data["nama"]);
    $kode = htmlspecialchars($data["kode"]);
    $detail = htmlspecialchars($data["detail"]);
    $qty = htmlspecialchars($data["qty"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // Query insert ke database 
    $query = "INSERT INTO atk VALUES(NULL, '$nama', '$kode', '$detail', '$qty', '$gambar')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
} 

// Fungsi untuk menghapus data mahasiswa dari database
function hapus($id)
{
    global $koneksi;
    // Periksa apakah $id tidak kosong
    if($id !== null) {
        mysqli_query($koneksi, "DELETE FROM atk WHERE id = $id");
        return mysqli_affected_rows($koneksi);
    } else {
        // Jika $id kosong, kembalikan 0
        return 0;
    }
}

// Fungsi untuk mengubah data mahasiswa di database
function ubah($data) {
    global $koneksi;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $kode = htmlspecialchars($data["kode"]);
    $detail = htmlspecialchars($data["detail"]);
    $qty = htmlspecialchars($data["qty"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // Query update ke database 
    $query = "UPDATE atk SET
                nama = '$nama', 
                kode='$kode',
                detail = '$detail', 
                qty = '$qty',
                gambar = '$gambar'
               WHERE id = $id ";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// Fungsi untuk melakukan pencarian data mahasiswa berdasarkan keyword
function cari($keyword){
    $query = "SELECT * FROM atk
                WHERE 
                nama LIKE '%$keyword%' OR 
                kode LIKE '%$keyword%' OR
                detail LIKE '%$keyword%' OR
                qty LIKE '%$keyword%'";
    return query($query);            
}


 
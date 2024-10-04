<?php
include 'koneksi.php';

// Periksa apakah ID sudah diterima dengan benar dari URL
if (!isset($_GET['id'])) {
    echo "<script>alert('ID user tidak ditemukan.'); window.location.href = 'index.php';</script>";
    exit;
}

// Mendapatkan ID user dari parameter URL
$id = $_GET['id'];

// Menggunakan kolom 'id_user' sesuai dengan struktur tabel Anda
$query = "DELETE FROM tb_user WHERE id_user = $id";

// Eksekusi query dan cek apakah berhasil
if (mysqli_query($conn, $query)) {
    echo "<script>alert('Data user berhasil dihapus.'); window.location.href = 'Data admin.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data user.'); window.location.href = 'Data admin.php';</script>";
}

mysqli_close($conn);
?>

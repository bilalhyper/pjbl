<?php
// Memanggil file koneksi.php
include "koneksi.php";

// Mengambil data dari form
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];
$no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
$role = "user"; // Level otomatis diisi 'user' pada saat registrasi

// Format acak password harus sama dengan proses_login.php
$pengacak = "p3ng4c4k";
$password_acak = md5($pengacak . md5($password) . $pengacak);

if (isset($_POST['kirim'])) {
    // Cek apakah email atau username sudah terdaftar
    $cek_user = "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $cek_user);

    if (mysqli_num_rows($result) == 0) {
        // Proses kirim data ke database MySQL, kolom 'id' tidak perlu disertakan
        $query = "INSERT INTO tb_user (username, email, password, no_hp, alamat, role) 
                  VALUES ('$username', '$email', '$password_acak', '$no_hp', '$alamat', '$role')";
        $hasil = mysqli_query($conn, $query);

        if ($hasil) {
            // Redirect ke halaman login setelah berhasil registrasi
            header("Location: login.html");
            exit; // Tambahkan exit setelah header untuk menghentikan eksekusi script lebih lanjut
        } else {
            // Menampilkan error MySQL
            echo "Registrasi User Gagal! Error: " . mysqli_error($conn);
        }
    } else {
        echo "Username atau email sudah terdaftar!";
    }
} else {
    echo "Terjadi kesalahan dalam proses registrasi!";
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php
include "koneksi.php"; // Pastikan file koneksi.php ada dan berisi detail koneksi database

// Ambil data dari formulir
$email = $_POST['email'];
$username = $_POST['username'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];
$role = $_POST['role'];

// Validasi data (misalnya, pastikan email unik atau username unik jika perlu)

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Query untuk menambahkan pengguna baru ke database
$query = "INSERT INTO tb_user (email, username, no_hp, alamat, password, role) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssssss", $email, $username, $no_hp, $alamat, $hashed_password, $role);
    
    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('User added successfully'); window.location.href='Data admin.php';</script>";
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
} else {
    echo "<p>Error preparing statement: " . mysqli_error($conn) . "</p>";
}

// Tutup koneksi
mysqli_close($conn);
?>

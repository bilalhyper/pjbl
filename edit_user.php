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
$query = "SELECT * FROM tb_user WHERE id_user = $id";
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil dan data ditemukan
if (!$result || mysqli_num_rows($result) == 0) {
    echo "<script>alert('Data user tidak ditemukan.'); window.location.href = 'index.php';</script>";
    exit;
}

$data = mysqli_fetch_assoc($result);

// Jika form di-submit, update data user
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $role = $_POST['role'];

    // Update data user di database
    $update_query = "UPDATE tb_user SET email = '$email', username = '$username', no_hp = '$no_hp', alamat = '$alamat', role = '$role' WHERE id_user = $id";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Data user berhasil diupdate.'); window.location.href = 'Data admin.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data user.'); window.location.href = 'Data admin.php';</script>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit User</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($data['username']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">No_hp</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo htmlspecialchars($data['no_hp']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo htmlspecialchars($data['alamat']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role">
                <option value="admin" <?php if ($data['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="user" <?php if ($data['role'] == 'user') echo 'selected'; ?>>User</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="Data admin.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>

<?php
session_start();
require 'db_connection.php'; // Sambungkan ke database

// Cek apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    echo json_encode(['error' => 'You must be logged in to comment.']);
    exit();
}

// Ambil data dari request
$product_id = $_POST['product_id'];
$user_id = $_SESSION['user_id']; // Asumsi user ID disimpan di sesi
$comment = $_POST['comment'];
$rating = $_POST['rating'];

// Simpan komentar ke tabel comments
$sql = "INSERT INTO comments (product_id, user_id, comment, rating) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iisi", $product_id, $user_id, $comment, $rating);
$stmt->execute();

// Cek apakah produk sudah punya rating sebelumnya
$sql_check = "SELECT * FROM product_ratings WHERE product_id = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("i", $product_id);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows > 0) {
    // Update total rating dan jumlah rating produk
    $row = $result->fetch_assoc();
    $new_total_rating = $row['total_rating'] + $rating;
    $new_rating_count = $row['rating_count'] + 1;

    $sql_update = "UPDATE product_ratings SET total_rating = ?, rating_count = ? WHERE product_id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("iii", $new_total_rating, $new_rating_count, $product_id);
    $stmt_update->execute();
} else {
    // Jika belum ada, buat data baru
    $sql_insert_rating = "INSERT INTO product_ratings (product_id, total_rating, rating_count) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert_rating);
    $stmt_insert->bind_param("iii", $product_id, $rating, 1);
    $stmt_insert->execute();
}

echo json_encode(['success' => true]);
?>

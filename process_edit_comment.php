<?php
include "koneksi.php";

// Ambil ID komentar dari URL
$comment_id = intval($_POST['comment_id']);

// Ambil data dari formulir
$product_id = intval($_POST['product_id']);
$user_id = intval($_POST['user_id']);
$rating = intval($_POST['rating']);
$comment = trim($_POST['comment']); // Trim untuk menghapus spasi tambahan



// Cek jika $comment tidak kosong
if (empty($comment)) {
    echo "Komentar tidak boleh kosong.";
    exit;
}

// Update komentar di database
$query = "UPDATE comments SET product_id = ?, user_id = ?, rating = ?, comment = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("iiisi", $product_id, $user_id, $rating, $comment, $comment_id);

if ($stmt->execute()) {
    echo "Komentar berhasil diperbarui.";
} else {
    echo "Terjadi kesalahan: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = intval($_POST['product_id']);
    $user_id = intval($_POST['user_id']);
    $rating = intval($_POST['rating']);
    $comment = $_POST['comment'];

    // Debugging: cek apakah product_id ada di tabel products
    $check_product = "SELECT id FROM products WHERE id = ?";
    $stmt = $conn->prepare($check_product);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows == 0) {
        echo "Error: Produk dengan ID $product_id tidak ditemukan.";
        exit();
    }
    
    $stmt->close();

    // Lanjutkan ke query insert
    $sql = "INSERT INTO comments (product_id, user_id, rating, comment) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiis", $product_id, $user_id, $rating, $comment);

    if ($stmt->execute()) {
        echo "Komentar berhasil ditambahkan!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: comments.php");
    exit();
}
?>

<?php
// process-comment.php

include 'koneksi.php'; // Memasukkan koneksi database

session_start(); // Memulai session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pastikan pengguna sudah login
    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        echo "Anda harus login terlebih dahulu!";
        exit;
    }

    // Ambil data dari form dan session
    $product_id = intval($_POST['product_id']);
    $rating = intval($_POST['rating']);
    $comment = $_POST['comment'];
    $user_id = $_SESSION['user_id']; // Ambil user_id dari session

    // Insert comment into database
    $sql = "INSERT INTO comments (product_id, user_id, rating, comment) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiis", $product_id, $user_id, $rating, $comment);

    if ($stmt->execute()) {
        // Mengambil total rating dan jumlah rating saat ini dari product_ratings
        $sql_get_rating = "SELECT total_rating, rating_count FROM product_ratings WHERE product_id = ?";
        $stmt_get_rating = $conn->prepare($sql_get_rating);
        $stmt_get_rating->bind_param("i", $product_id);
        $stmt_get_rating->execute();
        $result = $stmt_get_rating->get_result();
        $current_rating = $result->fetch_assoc();
        
        $total_rating = $current_rating['total_rating'] + $rating;
        $rating_count = $current_rating['rating_count'] + 1;

        // Update rating di tabel product_ratings
        $sql_update_rating = "UPDATE product_ratings SET total_rating = ?, rating_count = ? WHERE product_id = ?";
        $stmt_update = $conn->prepare($sql_update_rating);
        $stmt_update->bind_param("dii", $total_rating, $rating_count, $product_id);
        
        if ($stmt_update->execute()) {
            echo "Comment added and rating updated successfully.";
        } else {
            echo "Error updating rating: " . $stmt_update->error;
        }

        $stmt_get_rating->close();
        $stmt_update->close();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
?>

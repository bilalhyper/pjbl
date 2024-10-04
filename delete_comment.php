<?php
include "koneksi.php";

$id_comment = intval($_GET['id']);

$sql = "DELETE FROM comments WHERE id_comment = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_comment);

if ($stmt->execute()) {
    echo "Komentar berhasil dihapus!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

header("Location: comments.php");
exit();
?>

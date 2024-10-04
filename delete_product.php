<!-- delete_product.php -->
<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus produk berdasarkan ID
    $query = "DELETE FROM products WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo "Product has been deleted.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

header("Location: admin.php");
exit;
?>

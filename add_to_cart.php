<?php
session_start();
if (isset($_SESSION['user_id'])) {
    echo "User ID is: " . $_SESSION['user_id'];
} else {
    echo "User is not logged in.";
}


// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    // Redirect ke halaman login jika user belum login
    header("Location: login.php");
    exit;
}

// Mengambil data dari POST
$user_id = $_SESSION['user_id']; // Dari session login
$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : null;
$size = isset($_POST['size']) ? $_POST['size'] : null;
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;

// Validasi input
if (!$product_id || !$size || !$quantity) {
    die("Error: Incomplete form data.");
}

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'umkm_web');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk menambahkan produk ke keranjang
$sql = "INSERT INTO cart (user_id, product_id, size, quantity) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iisi", $user_id, $product_id, $size, $quantity);

if ($stmt->execute()) {
    echo "Product added to cart successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

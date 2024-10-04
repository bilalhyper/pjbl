<?php
include "koneksi.php";

// Cek apakah ada id kategori yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data kategori berdasarkan ID
    $query = "SELECT * FROM category WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $category = mysqli_fetch_assoc($result);
}

// Proses Update Kategori
if (isset($_POST['update_category'])) {
    $category_name = $_POST['category_name'];

    $query = "UPDATE category SET category_name = '$category_name' WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo "Kategori berhasil diperbarui!";
        header("Location: data_category.php");
    } else {
        echo "Gagal memperbarui kategori: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container py-5">
        <h1>Edit Category</h1>

        <form action="edit_category.php" method="POST">
            <div class="form-group">
                <label for="category_name">Category Name:</label>
                <input type="text" name="category_name" class="form-control" value="<?php echo $category['category_name']; ?>" required>
            </div>
            <button type="submit" name="update_category" class="btn btn-success mt-2">Update Category</button>
        </form>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

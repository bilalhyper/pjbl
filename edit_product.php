<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f2f5;
    color: #333;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center; 
    flex-direction: column; 
    min-height: 100vh;
}

h2 {
    text-align: center; 
    color: #444;
    margin-bottom: 20px;
}


form {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    width: 100%;
    margin: 0 auto;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
}

input[type="text"],
input[type="number"],
textarea,
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s, box-shadow 0.3s;
}

input[type="text"]:focus,
input[type="number"]:focus,
textarea:focus,
input[type="file"]:focus {
    border-color: #0056b3;
    box-shadow: 0 0 5px rgba(0, 86, 179, 0.2);
    outline: none;
}

input[type="submit"] {
    background-color: #28a745;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, box-shadow 0.3s;
    width: 100%;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #218838;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

img {
    margin-bottom: 15px;
    border-radius: 5px;
    max-width: 100px;
    max-height: 100px;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

textarea {
    resize: vertical; /* Membatasi resize hanya vertikal */
}

@media (max-width: 600px) {
    form {
        padding: 20px;
        width: calc(100% - 40px);
    }
}

</style>

<!-- edit_product.php -->
<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data produk berdasarkan ID
    $query = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $spesification = $_POST['spesification'];
    $price = $_POST['price'];
    $sizes = $_POST['sizes'];
    $colors = $_POST['colors'];
    $stock = $_POST['stock'];
    $rating = $_POST['rating'];
    $image_url = $product['image_url']; // Set default gambar lama

    // Periksa apakah ada gambar baru yang diunggah
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_url = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    $sql = "UPDATE products SET product_name='$product_name',category_id='$category_id', description='$description', spesification='$spesification' , price='$price', sizes='$sizes', colors='$colors', stock='$stock', rating='$rating' , image_url='$image_url' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Product has been updated.";
        header("Location: Data Product.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
    <form action="edit_product.php?id=<?php echo $product['id']; ?>" method="post" enctype="multipart/form-data">
        <label for="product_name">Product Name:</label><br>
        <input type="text" name="product_name" id="product_name" value="<?php echo $product['product_name']; ?>" required><br>
        <label for="product_name">Category:</label><br>
        <input type="text" name="category_id" id="category_id" value="<?php echo $product['category_id']; ?>" required><br>
        <label for="description">Description:</label><br>
        <textarea name="description" id="description" required><?php echo $product['description']; ?></textarea><br>
        <label for="description">Spesification:</label><br>
        <textarea name="spesification" id="spesification" required><?php echo $product['spesification']; ?></textarea><br>
        <label for="price">Price:</label><br>
        <input type="number" name="price" id="price" value="<?php echo $product['price']; ?>" required><br>
        <label for="sizes">Sizes:</label><br>
        <input type="text" name="sizes" id="sizes" value="<?php echo $product['sizes']; ?>" required><br>
        <label for="colors">Colors:</label><br>
        <input type="text" name="colors" id="colors" value="<?php echo $product['colors']; ?>" required><br>
        <label for="rating">Stock:</label><br>
        <input type="number" name="stock" id="stock" step="1" min="0" max="1000" value="<?php echo $row['stock']; ?>" required><br>
        <label for="rating">Rating:</label><br>
        <input type="number" name="rating" id="rating" step="1" min="0" max="1000" value="<?php echo $row['rating']; ?>" required><br>


        <label for="image">Select image to upload:</label><br>
        <input type="file" name="image" id="image"><br>
        <img src="<?php echo $product['image_url']; ?>" alt="Current Image" style="width: 100px;"><br>
        <input type="submit" value="Update Product">
    </form>
</body>
</html>

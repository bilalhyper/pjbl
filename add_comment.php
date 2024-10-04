<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Komentar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }
    </style>
<body>
<div class="container">
    <h1>Tambah Komentar</h1>
    <form action="process_add_comment.php" method="POST">
        <div class="mb-3">
            <label for="product_id" class="form-label">Pilih Produk</label>
            <select class="form-select" id="product_id" name="product_id" required>
                <option value="">Pilih Produk</option>
                <?php
                include "koneksi.php";
                // Query untuk mendapatkan produk dari tabel products
                $query = "SELECT id, product_name FROM products";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['product_name']) . '</option>';
                    }
                } else {
                    echo '<option value="">Tidak ada produk tersedia</option>';
                }

                mysqli_close($conn);
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="number" class="form-control" id="user_id" name="user_id" required>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Komentar</label>
            <textarea class="form-control" id="comment" name="comment" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Komentar</button>
        <a href="comments.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
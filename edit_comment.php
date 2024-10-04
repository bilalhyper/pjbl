<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Komentar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
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
    <h1>Edit Komentar</h1>
    <?php
    include "koneksi.php";

    $id_comment = intval($_GET['id']);
    $query = "SELECT * FROM comments WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_comment);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    ?>
   <form action="process_edit_comment.php?id=<?php echo $row['id']; ?>" method="POST">
    <input type="hidden" name="comment_id" value="<?php echo $row['id']; ?>"> <!-- Tambahkan input hidden ini -->
    <div class="mb-3">
        <label for="product_id" class="form-label">Product ID</label>
        <input type="number" class="form-control" id="product_id" name="product_id" value="<?php echo $row['product_id']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="user_id" class="form-label">User ID</label>
        <input type="number" class="form-control" id="user_id" name="user_id" value="<?php echo $row['user_id']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="rating" class="form-label">Rating</label>
        <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" value="<?php echo $row['rating']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="comment" class="form-label">Komentar</label>
        <textarea class="form-control" id="comment" name="comment" required><?php echo htmlspecialchars($row['comment']); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Komentar</button>
    <a href="comments.php" class="btn btn-secondary">Kembali</a>
</form>

    <?php
    } else {
        echo "Komentar tidak ditemukan.";
    }
    $stmt->close();
    $conn->close();
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// koneksi.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clashoes"; // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>


<?php
// Ambil ID produk dari URL
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Query untuk mendapatkan detail produk
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    // Cek apakah produk ditemukan
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        // Query untuk mendapatkan total rating dan jumlah rating
        $sql_rating = "SELECT total_rating, rating_count FROM product_ratings WHERE product_id = ?";
        $stmt = $conn->prepare($sql_rating);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result_rating = $stmt->get_result();

        if ($result_rating->num_rows > 0) {
            $row_rating = $result_rating->fetch_assoc();
            $average_rating = $row_rating['rating_count'] > 0 ? $row_rating['total_rating'] / $row_rating['rating_count'] : 0;
        } else {
            $average_rating = 0; // Jika belum ada rating
        }
    } else {
        echo "<p>Produk tidak ditemukan.</p>";
    }
}
?>




<?php
include 'koneksi.php'; // Memasukkan koneksi database

// Cek apakah ada kategori yang dipilih dari query string
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Jika kategori dipilih, tambahkan kondisi ke query
if ($category) {
    $sql = "SELECT products.*, category.category_name 
            FROM products 
            LEFT JOIN category ON products.category_id = category.id
            WHERE category.category_name = '$category'";
} else {
    // Jika tidak ada kategori yang dipilih, tampilkan semua produk
    $sql = "SELECT products.*, category.category_name 
            FROM products 
            LEFT JOIN category ON products.category_id = category.id";
}

$result = $conn->query($sql);
?>

<?php
session_start(); // Memulai session

// Simulasi status login (ubah ini dengan sistem login Anda)
$_SESSION['logged_in'] = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : false;

// Debug untuk mengecek apakah user sudah login
if ($_SESSION['logged_in']) {
    echo "<script>console.log('User is logged in');</script>";
} else {
    echo "<script>console.log('User is not logged in');</script>";
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clashoes Shop - Product Detail Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/Clashoescilik.jpg">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');
   


.comment-box{
    
    padding:5px;
}



.comment-area textarea{
   resize: none; 
        border: 1px solid #ad9f9f;
}


.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #ffffff;
    outline: 0;
    box-shadow:black !important;
}

.send {
    color: #fff;
    background-color: #ff0000;
    border-color: #ff0000;
}

.btn-size {
    cursor: pointer;
    padding: 5px 10px;
    margin: 0 5px;
}

.btn-size.selected {
    background-color: #28a745; /* Warna hijau untuk ukuran yang dipilih */
    color: white;
}


.send:hover {
    color: #fff;
    background-color: #f50202;
    border-color: #f50202;
}


.rating {
 display: flex;
        margin-top: -10px;
    flex-direction: row-reverse;
    margin-left: -4px;
        float: left;
}

.rating>input {
    display: none
}

.rating>label {
        position: relative;
    width: 19px;
    font-size: 25px;
    color: yellow;
    cursor: pointer;
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}
    .card-img, .card-img-bottom {
    border-bottom-right-radius: calc(.25rem - 1px);
    border-bottom-left-radius: calc(.25rem - 1px);
}
.card-img, .card-img-top {
    border-top-left-radius: calc(.25rem - 1px);
    border-top-right-radius: calc(.25rem - 1px);
}
.card-img, .card-img-bottom, .card-img-top {
    width: 100%;
    
}
.img-fluid {
    max-width: 100%;
    height: auto;
    background-color: white;
}

.col-2 {
    flex: 0 0 auto;
    width: 100px;
}

.modal {
          display: none; 
          position: fixed; 
          z-index: 1; 
          left: 0;
           top: 0;
           width: 100%;
        height: 100%;
        overflow: auto; 
        background-color: rgb(0,0,0); 
        background-color: rgba(0,0,0,0.4); 
}
                            
 .modal-content {
        background-color: #fefefe;
        margin: 15% auto; 
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 300px;
        text-align: center;
    }
                            
                                .close {
                                    color: #aaa;
                                    float: right;
                                    font-size: 28px;
                                    font-weight: bold;
                                }
                            
                                .close:hover,
                                .close:focus {
                                    color: black;
                                    text-decoration: none;
                                    cursor: pointer;
                                }
</style>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">geats135@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">0815-1398-0800</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                Clashoes
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about us.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php" style="color:  #0bff7e;">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="cart.php">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="profile.php">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <!-- Menampilkan detail produk -->
<div class="col-lg-5 mt-5">
    <div class="card mb-3">
        <img class="card-img img-fluid" src="<?php echo $product['image_url']; ?>" alt="Product Image" id="product-detail">
    </div>
</div>


<div class="col-lg-7 mt-5">
    <div class="card">
        <div class="card-body">
            <h1 class="h2"><?php echo $product['product_name']; ?></h1>
            <p class="h3 py-2">Rp <?php echo number_format($product['price'], 2, ',', '.'); ?></p>
            <p class="py-2">
    <!-- Rating produk -->
    <?php
    $rating = round($average_rating); // Menggunakan variabel rata-rata rating
    for ($i = 0; $i < 5; $i++) {
        echo $i < $rating ? '<i class="fa fa-star text-warning"></i>' : '<i class="fa fa-star text-secondary"></i>';
    }
    ?>
    <span class="list-inline-item text-dark">Rating <?php echo number_format($average_rating, 1); ?> | Comments 33</span>
</p>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <h6>Stock:</h6>
                </li>
                <li class="list-inline-item">
                    <p class="text-muted"><strong><?php echo $product['stock']; ?></strong></p>
                </li>
            </ul>

            <h6>Description:</h6>
            <p><?php echo $product['description']; ?></p>

            <h6>Spesification:</h6>
            <p><?php echo $product['spesification']; ?></p>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <h6>Available Color :</h6>
                </li>
                <li class="list-inline-item">
                    <p class="text-muted"><strong><?php echo $product['colors']; ?></strong></p>
                </li>
            </ul>

            <form id="buy-form" action="payment.html" method="GET">
    <!-- Produk yang dipilih -->
    <input type="hidden" name="product-title" value="<?php echo $product['product_name']; ?>">
    <input type="hidden" name="product-price" value="<?php echo $product['price']; ?>">
    <input type="hidden" name="product-image" value="<?php echo $product['image_url']; ?>">

    
    <!-- Pilihan ukuran -->
    <input type="hidden" name="product-size" id="product-size" value=""> <!-- Hidden untuk menyimpan ukuran yang dipilih -->
    <!-- Pilihan ukuran -->
    <div class="row">
        <div class="col-auto">
            <ul class="list-inline pb-3">
                <li class="list-inline-item">Size :
               <?php
$sizes = explode('/', $product['sizes']); // Ganti koma dengan garis miring
foreach ($sizes as $size) {
    echo '<button type="button" class="btn btn-success btn-size" data-size="' . trim($size) . '">' . trim($size) . '</button>';
}
?>

                </li>
            </ul>
        </div>
        
        <!-- Pilihan kuantitas -->
        <div class="col-auto">
            <ul class="list-inline pb-3">
                <li class="list-inline-item text-right">
                    Quantity
                    <input type="hidden" name="product-quantity" id="product-quantity" value="1">
                </li>
                <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
            </ul>
        </div>
    </div>

   <!-- Tombol Buy dan Add to Cart -->
    <!-- Tombol Buy dan Add to Cart -->
    <div class="row pb-3">
                                <div class="col d-grid">
                                    <button type="button" class="btn btn-success btn-lg" id="buy-btn">Buy</button>
                                </div>
                                <div class="col d-grid">
                                    <button type="button" class="btn btn-success btn-lg" id="add-to-cart-btn">Add To Cart</button>
                                </div>
                            </div>
                        </form>
                            
                            <!-- Notifikasi Pop-Up -->
                            <div id="cart-notification" class="modal" style="display:none;">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <p>Product has been added to your cart!</p>
                                </div>
                            </div>
                            
                          
            <!-- Notifikasi Ukuran Belum Dipilih -->
<div id="size-notification" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close-size">&times;</span>
        <p>Pilih size dulu!</p>
    </div>
</div>

<div id="login-notification" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close-login">&times;</span>
        <p>Anda harus login terlebih dahulu!</p>
    </div>
</div>



                              
                           
                            
<div class="card-body">
    <div class="row">
        <div class="col-2">
            <img src="https://i.imgur.com/xELPaag.jpg" width="70" class="rounded-circle mt-2">
        </div>
        <div class="col-10">
            <div class="comment-box ml-2">
                <h4>Add a comment</h4>

                <form id="comment-form" action="process-comment.php" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
   
    <div class="rating">
        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
    </div>
    <textarea id="comment-input" name="comment" class="form-control" placeholder="What is your view?" rows="4"></textarea>
    <button type="submit" class="btn btn-success btn-sm">Send</button>
</form>
<div id="comments-list" class="mt-4">
    <?php
    // Mengambil data komentar dengan username dari tabel tb_user
    $sql = "SELECT comments.*, tb_user.username 
            FROM comments 
            JOIN tb_user ON comments.user_id = tb_user.id_user
            WHERE comments.product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product['id']); // Ambil product_id dari produk yang sedang dilihat
    $stmt->execute();
    $comment_result = $stmt->get_result();

    if ($comment_result->num_rows > 0) {
        while ($comment = $comment_result->fetch_assoc()) {
            echo '<div class="comment">';
            echo '<div class="comment-content">';
            echo '<p><strong>' . htmlspecialchars($comment['username']) . '</strong> (' . str_repeat('★', $comment['rating']) . str_repeat('☆', 5 - $comment['rating']) . ')</p>';
            echo '<p>' . htmlspecialchars($comment['comment']) . '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "<p>No comments yet.</p>";
    }
    ?>
</div>
                    </div>
                    
                                    
                                  
                                    
                                    </div>
                                
                                </div>
                            
                            </div>
                        
                        
                        </div>
                    
                    </div>
                
                
                </div>
      
            </div>
        </div>
    </section>
    


    <!-- Close Content -->
    <script>
    const isLoggedIn = <?php echo json_encode(isset($_SESSION['logged_in']) && $_SESSION['logged_in']); ?>;
    console.log("Login status:", isLoggedIn);

    // Fungsi untuk mengupdate kuantitas
    function updateQuantity(amount) {
        const quantityInput = document.getElementById("product-quantity");
        let currentQuantity = parseInt(quantityInput.value);
        currentQuantity += amount;

        // Pastikan kuantitas tidak kurang dari 1
        if (currentQuantity < 1) {
            currentQuantity = 1;
        }
        quantityInput.value = currentQuantity;
        document.getElementById("var-value").innerText = currentQuantity;
    }

    document.getElementById('btn-plus').addEventListener('click', function() {
        updateQuantity(1); // Tambah kuantitas
    });

    document.getElementById('btn-minus').addEventListener('click', function() {
        updateQuantity(-1); // Kurangi kuantitas
    });

    



    const addToCartButton = document.getElementById("add-to-cart-btn");
    const buyButton = document.getElementById("buy-btn");
    const cartNotification = document.getElementById("cart-notification");
    const loginNotification = document.getElementById("login-notification");

    // Fungsi untuk menambah ke keranjang
    function addToCart() {
        if (!isLoggedIn) {
            loginNotification.style.display = "block";
            return;
        }

        const productName = "<?php echo $product['product_name']; ?>";
        const productPrice = "<?php echo $product['price']; ?>";
        const productQuantity = parseInt(document.getElementById("product-quantity").value);
        const productImage = "<?php echo $product['image_url']; ?>";
        const selectedSize = document.querySelector('.btn-size.active') ? document.querySelector('.btn-size.active').getAttribute('data-size') : '';

        if (!selectedSize) {
            document.getElementById('size-notification').style.display = "block";
            return;
        }

        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const existingProductIndex = cart.findIndex(item => item.name === productName && item.size === selectedSize);

        if (existingProductIndex !== -1) {
            cart[existingProductIndex].quantity += productQuantity;
        } else {
            let product = {
                name: productName,
                price: productPrice,
                quantity: productQuantity,
                image: productImage,
                size: selectedSize
            };
            cart.push(product);
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        cartNotification.style.display = "block";
    }

    // Fungsi untuk proses pembelian
    function buyNow() {
    if (!isLoggedIn) {
        loginNotification.style.display = "block";
        return;
    }

    const selectedSize = document.querySelector('.btn-size.active') ? document.querySelector('.btn-size.active').getAttribute('data-size') : '';
    if (!selectedSize) {
        document.getElementById('size-notification').style.display = "block";
        return;
    }

    const product = {
        name: "<?php echo $product['product_name']; ?>",
        price: "<?php echo $product['price']; ?>",
        quantity: parseInt(document.getElementById("product-quantity").value),
        image: "<?php echo $product['image_url']; ?>",
        size: selectedSize
    };

    localStorage.setItem('selectedProduct', JSON.stringify(product)); // Simpan produk di localStorage

    document.getElementById("buy-form").submit(); // Lanjutkan ke halaman pembayaran
}

    addToCartButton.addEventListener("click", function(event) {
        event.preventDefault();
        addToCart();
    });

    buyButton.addEventListener("click", function(event) {
        event.preventDefault();
        buyNow();
    });

    document.querySelectorAll('.btn-size').forEach(function(sizeButton) {
        sizeButton.addEventListener('click', function() {
            document.querySelectorAll('.btn-size').forEach(function(btn) {
                btn.classList.remove('active');
            });
            sizeButton.classList.add('active');
        });
    });

    document.querySelector('.close').onclick = function() {
        cartNotification.style.display = "none";
    };

    document.querySelector('.close-size').addEventListener('click', function() {
        document.getElementById('size-notification').style.display = 'none';
    });

    document.querySelector('.close-login').addEventListener('click', function() {
        loginNotification.style.display = 'none';
    });
</script>


    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Related Products</h4>
            </div>

            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product">
            <?php
                if ($result->num_rows > 0) {
                    // Loop untuk menampilkan data produk
                    while ($row = $result->fetch_assoc()) {
                ?>

                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                        <img class="card-img rounded-0 img-fluid" src="<?php echo $row['image_url']; ?>">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <li><a class="btn btn-success text-white mt-2" href="shop-single.php?id=<?php echo $row['id']; ?>"><i class="far fa-eye"></i></a></li>
                                            <li><a class="btn btn-success text-white mt-2" href="cart.php?action=add&id=<?php echo $row['id']; ?>"><i class="fas fa-cart-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="shop-single.php?id=<?php echo $row['id']; ?>" class="h3 text-decoration-none"><?php echo $row['product_name']; ?></a>
                                    <p class="text-muted">Stok: <?php echo $row['stock']; ?> pcs</p>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li><?php echo $row['sizes']; ?></li>
                                        <li class="pt-2">
                                            <?php
                                            $colors = explode(',', $row['colors']);
                                            foreach ($colors as $color) {
                                                echo '<span class="product-color-dot color-dot-' . trim($color) . ' float-left rounded-circle ml-1"></span>';
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <?php
                                        $rating = round($row['rating']);
                                        for ($i = 0; $i < 5; $i++) {
                                            if ($i < $rating) {
                                                echo '<i class="text-warning fa fa-star"></i>';
                                            } else {
                                                echo '<i class="text-muted fa fa-star"></i>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                    <p class="text-center mb-0">Rp<?php echo number_format($row['price'], 2, ',', '.'); ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo '<p>Produk tidak ditemukan.</p>';
                }
                ?>
                            </div>
                        </div>
                    </div>

               
    </section>
    <!-- End Article -->


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Clashoes Shop</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            SMKN 4 Kota Malang
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">0815-13980-800</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">geats135@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Sneakers</a></li>
                        <li><a class="text-decoration-none" href="#">Sport shoes</a></li>
                        <li><a class="text-decoration-none" href="#">School Shoes</a></li>
                       
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Home</a></li>
                        <li><a class="text-decoration-none" href="#">About Us</a></li>
                        <li><a class="text-decoration-none" href="#">Shop Locations</a></li>
                        <li><a class="text-decoration-none" href="#">Contact</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light">Subscribe</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2024 Company Name 
                            | Designed by Bilal Ahmad Ramadhan</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>
    <!-- Start Slider Script -->
    <script src="assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clashoes Shop eCommerce HTML CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/Clashoes.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/Clashoescilik.jpg">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>
<style>
    /*

TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

---------------------------------------------
Table of contents
------------------------------------------------
1. Typography
2. General
3. Nav
4. Hero Carousel
5. Accordion
6. Shop
7. Product
8. Carousel Hero
9. Carousel Brand
10. Services
11. Contact map
12. Footer
13. Small devices (landscape phones, 576px and up)
14. Medium devices (tablets, 768px and up)
15. Large devices (desktops, 992px and up)
16. Extra large devices (large desktops, 1200px and up)
--------------------------------------------- */




/* Typography */
body, ul, li, p, a, label, input, div {
  font-family: 'Roboto', sans-serif;
  font-size: 18px !important;
  font-weight: 300 !important;
}
.h1 {
  font-family: 'Roboto', sans-serif;
  font-size: 48px !important;
  font-weight: 200 !important;
}
.h2 {
  font-family: 'Roboto', sans-serif;
  font-size: 30px !important;
  font-weight: 300;
}
.h3 {
  font-family: 'Roboto', sans-serif;
  font-size: 22px !important;
}
/* General */
.logo { font-weight: 500 !important;}
.text-warning {  color: #ede861 !important;}
.text-muted { color: #bcbcbc !important;}
.text-success { color: #59ab6e !important;}
.text-light { color: #cfd6e1 !important;}
.bg-dark { background-color: #212934 !important;}

.bg-black { background-color: #1d242d !important;}
.bg-success { background-color: #59ab6e !important;}
.btn-success {
  background-color: #59ab6e !important;
  border-color: #56ae6c !important;
}
.pagination .page-link:hover {color: #000;}
.pagination .page-link:hover, .pagination .page-link.active {
  background-color: #69bb7e;
  color: #fff;
}
/* Nav */
#templatemo_nav_top { min-height: 40px;}
#templatemo_nav_top * { font-size: .9em !important;}
#templatemo_main_nav a { color: #212934;}
#templatemo_main_nav a:hover { color: #69bb7e;}
#templatemo_main_nav .navbar .nav-icon { margin-right: 20px;}

/* Hero Carousel */
#template-mo-zay-hero-carousel { background: #efefef !important;}
/* Accordion */
.templatemo-accordion a { color: #000;}
.templatemo-accordion a:hover { color: #333d4a;}
/* Shop */
.shop-top-menu a:hover { color: #69bb7e !important;}
/* Product */
.product-wap { box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.10);}
.product-wap .product-color-dot.color-dot-red { background:#f71515;}
.product-wap .product-color-dot.color-dot-blue { background:#6db4fe;}
.product-wap .product-color-dot.color-dot-black { background:#000000;}
.product-wap .product-color-dot.color-dot-light { background:#e0e0e0;}
.product-wap .product-color-dot.color-dot-green { background:#0bff7e;}
.card.product-wap .card .product-overlay {
  background: rgba(0,0,0,.2);
  visibility: hidden;
  opacity: 0;
  transition: .3s;
}
.card.product-wap:hover .card .product-overlay {
  visibility: visible;
  opacity: 1;
}
.card.product-wap a { color: #000;}
#carousel-related-product .slick-slide:focus { outline: none !important;}
#carousel-related-product .slick-dots li button:before {
  font-size: 15px;
  margin-top: 20px;
}
/* Brand */
.brand-img {
  filter: grayscale(100%);
  opacity: 0.5;
  transition: .5s;
}
.brand-img:hover {
  filter: grayscale(0%);
  opacity: 1;
}
/* Carousel Hero */
#template-mo-zay-hero-carousel .carousel-indicators li {
  margin-top: -50px;
  background-color: #59ab6e;
}
#template-mo-zay-hero-carousel .carousel-control-next i,
#template-mo-zay-hero-carousel .carousel-control-prev i {
  color: #59ab6e !important;
  font-size: 2.8em !important;
}
/* Carousel Brand */
.tempaltemo-carousel .h1 {
  font-size: .5em !important;
  color: #000 !important;
}
/* Services */
.services-icon-wap {transition: .3s;}
.services-icon-wap:hover, .services-icon-wap:hover i {color: #fff;}
.services-icon-wap:hover {background: #69bb7e;}
/* Contact map */
.leaflet-control a, .leaflet-control { font-size: 10px !important;}
.form-control { border: 1px solid #e8e8e8;}
/* Footer */
#tempaltemo_footer a { color: #dcdde1;}
#tempaltemo_footer a:hover { color: #68bb7d;}
#tempaltemo_footer ul.footer-link-list li { padding-top: 10px;}
#tempaltemo_footer ul.footer-icons li {
  width: 2.6em;
  height: 2.6em;
  line-height: 2.6em;
}
#tempaltemo_footer ul.footer-icons li:hover {
  background-color: #cfd6e1;
  transition: .5s;
}
#tempaltemo_footer ul.footer-icons li:hover i {
  color: #212934;
  transition: .5s;
}
#tempaltemo_footer .border-light { border-color: #2d343f !important;}
/*
// Extra small devices (portrait phones, less than 576px)
// No media query since this is the default in Bootstrap
*/
/* Small devices (landscape phones, 576px and up)*/
.product-wap .h3, .product-wap li, .product-wap i, .product-wap p {
  font-size: 12px !important;
}
.product-wap .product-color-dot {
  width: 6px;
  height: 6px;
}

@media (min-width: 576px) {
  .tempaltemo-carousel .h1 { font-size: 1em !important;}
}

/*// Medium devices (tablets, 768px and up)*/
@media (min-width: 768px) {
  #templatemo_main_nav .navbar-nav {max-width: 450px;}
 }

/* Large devices (desktops, 992px and up)*/
@media (min-width: 992px) {
  #templatemo_main_nav .navbar-nav {max-width: 550px;}
  #template-mo-zay-hero-carousel .carousel-item {min-height: 30rem !important;}
  .product-wap .h3, .product-wap li, .product-wap i, .product-wap p {font-size: 18px !important;}
  .product-wap .product-color-dot {
    width: 12px;
    height: 12px;
  }
}

/* Extra large devices (large desktops, 1200px and up)*/
@media (min-width: 1200px) {}
    /* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

a {
    text-decoration: none;
    color: inherit;
}

h2 {
    margin-top: 50px;
}

/* Header styles */
.header-top {
    background-color: #333;
    color: white;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
}

.header-top .contact-info span {
    margin-right: 15px;
}

.header-top .social-icons a {
    color: white;
    margin-left: 10px;
}

.navbar {
    background-color: white;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

.navbar .logo h1 {
    color: green;
    margin: 0;
}

.navbar .nav-links {
    list-style: none;
    display: flex;
}

.navbar .nav-links li {
    margin-left: 20px;
}

.navbar .nav-icons a {
    margin-left: 15px;
    color: black;
}

/* Cart container */
.cart-container {
    width: 90%;
    margin: 20px auto;
    background-color: white;
    padding: 20px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

.h3,h3 {
    font-size: 20px;
}

.cart-container h1 a {
    font-size: 24px;
    margin-bottom: 20px;
    color: green;
   font-weight: 600;
}

.cart-container h1 a span {
    font-weight: 600;
    color: black;
    font-size: 35px;
}


.cart-table {
    width: 100%;
    border-collapse: collapse;
}

.cart-table thead {
    border-bottom: 2px solid #ccc;
}

.cart-table th {
    text-align: center;
    padding: 10px;
}

.cart-table td {
    padding: 15px 10px;
    vertical-align: middle;
}

.product-details {
    display: flex;
    align-items: center;
}

.product-details img {
    width: 180px;
    height: 180px;
    margin-right: 5px;
}

.sizes button {
    margin-right: 5px;
    padding: 5px 10px;
    margin-top: 10px;
    border: 1px solid #ccc;
    background-color: #f5f5f5;
    cursor: pointer;
}

.quantity-controls {
    display: flex;
    align-items: center;
}

.quantity-controls button {
    border: 1px solid #ccc;
    background-color: #f5f5f5;
    padding: 5px 10px;
    cursor: pointer;
}

.quantity-controls input {
    text-align: center;
    width: 40px;
    margin: 0 5px;
}

.buy-btn {
    background-color: green;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

.buy-btn:hover {
    background-color: darkgreen;
}

/* Footer styles */
footer {
    background-color: #333;
    color: white;
    padding: 20px;
    margin-top: 50px;
}

.footer-content {
    display: flex;
    justify-content: space-between;
}

.footer-section h2 {
    margin-bottom: 20px;
    font-size: 18px;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-bottom {
    text-align: center;
    margin-top: 20px;
    border-top: 1px solid #444;
    padding-top: 20px;
    font-size: 14px;
}

.btn-success {
        background-color: green;
        border-color: green;
    }

    .btn-success:hover {
        background-color: darkgreen;
        border-color: darkgreen;
    }

    .quantity-controls button {
    transition: background-color 0.6s ease, border-color 0.6s ease;
}

.quantity-controls button:hover {
    background-color:#56ae6c; /* Warna latar belakang saat hover */
    border-color: white; /* Warna border saat hover */
    color: white; /* Warna teks saat hover, jika diperlukan */
}

.btn-danger {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
    margin-left: 10px;
    width: 110px;
}

.size-selection {
    border: 1px solid #ccc;
    background-color: #f5f5f5;
    cursor: pointer;
    padding: 5px 10px;
    margin-right: 5px;
}

.size-selection.active {
    border: 2px solid #59ab6e; /* Warna border saat tombol dipilih */
    background-color: #e0e0e0; /* Warna latar belakang saat tombol dipilih */
}

.cart-section h2 {
    color: black ; /* Mengubah warna tulisan "Your Cart" menjadi hijau */
    margin-bottom: 50px;
}

.cart-section h2 .badge {
    font-size: 1.20rem; /* Mengubah ukuran font tulisan "Your Order" menjadi lebih kecil */
    
    color: green; /* Mengubah warna tulisan di badge */
    padding: 0.3em 0.5em; /* Padding untuk badge */
    border-radius: 0.25rem; /* Sudut melengkung untuk badge */
}


</style>
<body>
    
       <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">getas135@gmail.com</a>
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
                            <a class="nav-link" href="shop.php">Shop</a>
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
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->
   
    <?php
    // Mendapatkan data cart dari localStorage
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    ?>
    
    <section class="cart-section bg-light">
        <div class="container">
        <h2>Cart   | <a href="order.php"> <span class="badge ">Order</span></a></h2> 
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><img src="<?php echo $item['image']; ?>" alt="Product Image" width="100"></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['size']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>Rp <?php echo number_format($item['price'], 2, ',', '.'); ?></td>
                        <td>Rp <?php echo number_format($item['price'] * $item['quantity'], 2, ',', '.'); ?></td>
                        <td>
                        <button class="btn btn-danger btn-sm remove-item">Remove</button>
                        <button class="btn btn-primary btn-sm buy-item">Buy</button>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    
    <script>
   // Fungsi untuk menghapus item dari cart
function removeCartItem(index) {
    let cart = JSON.parse(localStorage.getItem('cart'));
    cart.splice(index, 1); // Menghapus item dari array berdasarkan index
    localStorage.setItem('cart', JSON.stringify(cart)); // Update cart di localStorage
    location.reload(); // Refresh halaman setelah item dihapus
}

// Fungsi untuk membeli item (redirect ke halaman payment)
function buyCartItem(index) {
    let cart = JSON.parse(localStorage.getItem('cart'));
    let item = cart[index]; // Ambil item yang ingin dibeli
    localStorage.setItem('selectedProduct', JSON.stringify(item)); // Simpan produk yang dipilih di localStorage

    // Redirect ke halaman pembayaran dengan informasi produk yang dipilih
    window.location.href = "payment.html";
}

// Event listener untuk tombol remove
document.querySelectorAll('.remove-item').forEach(function(button, index) {
    button.addEventListener('click', function() {
        removeCartItem(index); // Panggil fungsi remove dengan index item
    });
});

// Event listener untuk tombol buy
document.querySelectorAll('.buy-item').forEach(function(button, index) {
    button.addEventListener('click', function() {
        buyCartItem(index); // Panggil fungsi buy dengan index item
    });
});

// Mengambil cart dari localStorage dan menambahkan ke dalam cookie PHP agar bisa dibaca di server
const cart = localStorage.getItem('cart');
if (cart) {
    document.cookie = "cart=" + cart + ";path=/";
}
       
    </script>
</body>
</html>
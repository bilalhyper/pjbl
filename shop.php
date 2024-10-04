<?php
include 'koneksi.php'; // Memasukkan koneksi database

// Cek apakah ada kategori yang dipilih dari query string
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Jika kategori dipilih, tambahkan kondisi ke query
if ($category) {
    $sql = "SELECT products.*, category.category_name 
            FROM products 
            LEFT JOIN category ON products.category_id = category.id
            WHERE category.category_name = '$category' AND products.id <= 10
            ORDER BY rating DESC LIMIT 9";
} else {
    // Jika tidak ada kategori yang dipilih, tampilkan semua produk
    $sql = "SELECT products.*, category.category_name 
            FROM products 
            LEFT JOIN category ON products.category_id = category.id
            WHERE products.id <= 10
            ORDER BY rating DESC LIMIT 9";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clashoes Shop - Product Listing Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/Clashoes.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/Clashoescilik.jpg">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="assets/css/custom.css">

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

</head>
<style>
    
body, ul , p, a, label, input, div {
  font-family: 'Roboto', sans-serif;
  font-size: 18px !important;
  font-weight: 300 !important;
}

li {
  font-size: 10px !important;
  color: grey;
  

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
.bg-light { background-color: #e9eef5 !important;}
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

.size {
    font-size: 10px;
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
  font-size: 5px !important;
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

</style>
<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:geats135@gmail.com">geats135@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:0815-13980-800">0815-1398-0800</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    
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
                            <a class="nav-link" href="shop.php" style="color: #0bff7e;">Shop</a>
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



    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Filter</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Gender
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="shop.php?category=Men">Men</a></li>
                            <li><a class="text-decoration-none" href="shop.php?category=Women">Women</a></li>
                        </ul>
                    </li>
                    
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Product
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseThree" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="shop.php">Sneakers</a></li>
                            <li><a class="text-decoration-none" href="shop2.php">School</a></li>
                            <li><a class="text-decoration-none" href="shop3.php">Sport</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="shop.php">All</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#"></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none" href="#"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 pb-4">
                        <div class="d-flex">
                            <select class="form-control">
                                <option>Sneakers</option>
                                <option>School</option>
                                <option>Sport</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                <?php
                if ($result->num_rows > 0) {
                    // Loop untuk menampilkan data produk
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
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
                  
                
                <div div="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="shop.php" tabindex="-1">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="shop2.php">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="shop3.php">3</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- End Content -->

   


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
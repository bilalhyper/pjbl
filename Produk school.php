<?php
    $current_page = basename($_SERVER['PHP_SELF']); // Mendapatkan nama file halaman aktif
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/Clashoes.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/Clashoescilik.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
    
    ::after,
        ::before {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        i {
            height: 30px !important;
        }

        a {
            text-decoration: none;
        }

        li {
            list-style: none;
        }

        h1 {
            font-weight: 600;
            font-size: 1.0rem;
            margin-top: 20px;
            color: #777;
            margin-left: 20px
        }

        .icon-bold {
            font-weight: bold;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .wrapper {
            display: flex;
        }

        .main {
            min-height: 100vh;
            width: 100%;
            overflow: hidden;
            transition: all 0.35s ease-in-out;
            background-color: #f4f3ef;
        }

        #sidebar {
            width: 70px;
            min-width: 70px;
            z-index: 1000;
            transition: all .25s ease-in-out;
            background-color: white;
            display: flex;
            flex-direction: column;
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15); /* Perbesar shadow */
            position: relative; /* Tambahkan ini */
        }

        #sidebar.expand {
            width: 260px;
            min-width: 260px;
        }

        .toggle-btn {
            background-color: transparent;
            cursor: pointer;
            border: 0;
            padding: 1rem 1.5rem;
        }

        .toggle-btn i {
            font-size: 1.5rem;
            color: black;
        }

        .sidebar-logo {
            margin: auto 0;
        }

        .sidebar-logo a {
            color: #59ab6e;
            font-size: 2.05rem;
            font-weight: 600;
            margin: auto 0;
            padding-bottom: 23px; /* Spasi antara logo dan garis */
            border-bottom: 2px solid #e0e0e0; /* Tambahkan garis bawah */
            width: 100%;
        }

        #sidebar:not(.expand) .sidebar-logo,
        #sidebar:not(.expand) a.sidebar-link span {
            display: none;
        }

        .sidebar-nav {
            padding: 2rem 0;
            flex: 1 1 auto;
            
        }

        a.sidebar-link {
        padding: .625rem 1.625rem;
        color: #a9afbb;
        display: block;
        font-size: 14px;
        white-space: nowrap;
        position: relative;
        border-left: 3px solid transparent;
        transition: background-color 0.3s ease, border-left 0.3s ease;
    }
        .sidebar-link i {
            font-size: 1.1rem;
            margin-right: 1.2rem;
        }

        a.sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.4);
            border-left: 3px solid rgb(10, 199, 10);
        }

        a.sidebar-link.active {
            background-color: #59ab6e;
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, .14), 0 7px 10px -5px rgba(54, 244, 95, 0.4);
            color: white;
            border-left: 5px solid white;
            border-right: 5px solid white;
            border-bottom-left-radius: 15px;
            border-top-left-radius: 15px;
            border-bottom-right-radius:15px;
            border-top-right-radius:15px;

        }

        .sidebar-item {
            position: relative;
        }

        #sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
            position: absolute;
            top: 0;
            left: 70px;
            background-color: #3ba35a;
            padding: 0;
            min-width: 15rem;
            display: none;
        }

        #sidebar:not(.expand) .sidebar-item:hover .has-dropdown+.sidebar-dropdown {
            display: block;
            max-height: 15em;
            width: 100%;
            opacity: 1;
        }

        #sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
            border: solid;
            border-width: 0 .075rem .075rem 0;
            content: "";
            display: inline-block;
            padding: 2px;
            position: absolute;
            right: 1.5rem;
            top: 1.4rem;
            transform: rotate(-135deg);
            transition: all .2s ease-out;
        }

        #sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
            transform: rotate(45deg);
            transition: all .2s ease-out;
        }

        .sidebar-dropdown {
        display: none;
        background-color: #f4f3ef;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        position: relative;
        padding-left: 1rem;
        transition: all 0.3s ease;
    }

    .sidebar-item:hover .sidebar-dropdown {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    .sidebar-dropdown a {
        padding: .625rem 2rem;
        display: block;
        color: #a9afbb;
        font-size: 0.9rem;
        border-left: 3px solid transparent;
        transition: background-color 0.3s ease, border-left 0.3s ease;
    }

    .sidebar-dropdown a:hover {
        background-color: rgba(91, 207, 157, 0.2);
        border-left: 3px solid #59ab6e;
        color: #59ab6e;
    }

    /* Animasi dropdown */
    .sidebar-dropdown {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .sidebar-link.active, .sidebar-dropdown a.active {
        background-color: #59ab6e;
        color: white;
        border-left: 3px solid white;
        border-radius: 5px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .sidebar-dropdown a.active:hover {
        background-color: #4a9462; /* Warna hover saat aktif */
    }

    .sidebar-item:hover .sidebar-dropdown {
        max-height: 200px;
    }

   
    /* Gaya untuk fa-chevron-right agar berada di kanan */
    .sidebar-link .fa-chevron-right {
        position: absolute;
        right: 20px; /* Letakkan tepat di tepi kanan */
        top: 50%;
        transform: translateY(-50%);
        transition: transform 0.3s ease;
    }

    .sidebar-link:hover .fa-chevron-right {
        transform: translateY(-50%) rotate(90deg); /* Rotasi 90 derajat saat hover */
    }

        .nullbar {
           background-color: #f4f3ef;
           height: 90px;
           width: 100%;
           border: none;
           padding-bottom: 23px; /* Spasi antara logo dan garis */
           border-bottom: 1px solid #777; /* Tambahkan garis bawah */
           z-index: 1000;
           padding: 10px;
           position: relative; /* Tambahkan posisi relative */
}

        .container {
            width: 130%;
            background-color: #fff;
            padding: 0;
            border-radius: 10px 10px 0 0;
            margin-left: 24px;
            display: inline-block;
            margin-top: 30px;
        }

        .form-group {
            width: 90%;
            margin: 20px;
        }

        .btn-add-user {
            margin-top: 30px;
            margin-bottom: 20px;
            background-color: #3ba35a ;
           
        }

        .btn-add-user:hover{
            margin-bottom: 20px;
            background-color: #3ba35a;
        }

         /* Tambahkan overflow untuk mendukung scroll horizontal */
         .table-responsive {
            width: 100%;
            overflow-x: auto;
            padding: 20px;
            margin-top: 20px;
        }

        /* Gaya Tambahan untuk Tabel */
        table {
            border-collapse: separate;
            border-spacing: 0;
            width: 110%;
            margin: 20px auto;
            font-size: 0.9rem;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        table thead tr {
            background-color: #59ab6e;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }

        table th,
        table td {
            padding: 15px;
            text-align: center;
        }

        table tbody tr {
            border-bottom: 1px solid #dddddd;
            transition: background-color 0.3s ease;
        }

        table tbody tr:nth-of-type(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #eaf6ea;
        }

        table tbody tr:last-of-type {
            border-bottom: 2px solid #59ab6e;
        }

        .btn-action .btn {
            font-size: 0.8rem;
            padding: 7px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-action .btn-edit {
            background-color: #ffc107;
            color: white;
            border: none;
        }

        .btn-action .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .btn-action .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-action .btn-delete:hover {
            background-color: #c82333;
        }

        /* Tambahkan ini ke CSS Anda */
        .sidebar-dropdown {
    display: none; /* Tersembunyi secara default */
}

.sidebar-dropdown.show {
    display: block; /* Tampilkan saat kelas show ditambahkan */
}


    </style>

</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="expand">
            <div class="d-flex align-items-center justify-content-start"
                style="height: 90px; justify-content: center; background-color:  white">
                <button class="toggle-btn" type="button">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Clashoes</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="Dasboard admin.php" class="sidebar-link">
                        <i class="fa-solid fa-house"></i>
                        <span style="font-weight: 600;">Dasbor</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="Data admin.php" class="sidebar-link ">
                        <i class="fa-solid fa-user"></i>
                        <span style="font-weight: 600;">User</span>
                    </a>
                </li>
           <!-- Item Produk dengan Kondisi Aktif -->
           <li class="sidebar-item">
    <a href="Data product.php" class="sidebar-link has-dropdown <?php echo ($current_page == 'Produk sneakers.php' || $current_page == 'add_product.php' || $current_page == 'manage_stock.php') ?  : ''; ?>">
        <i class="fa-solid fa-box"></i>
        <span style="font-weight: 600;">Product</span>
        <i class="fa fa-chevron-right" style="position:absolute; right: 20px;"></i>
    </a>

    <!-- Dropdown untuk Produk -->
    <div class="sidebar-dropdown <?php echo ($current_page == 'Produk sneakers.php' || $current_page == 'Produk school.php' || $current_page == 'Produk sport.php') ? 'show' : ''; ?>">
        <a href="Produk sneakers.php" class="sidebar-link <?php echo $current_page == 'Produk sneakers.php' ? 'active' : ''; ?>">Sneakers</a>
        <a href="Produk school.php" class="sidebar-link <?php echo $current_page == 'Produk school.php' ? 'active' : ''; ?>">School</a>
        <a href="Produk sport.php" class="sidebar-link <?php echo $current_page == 'Produk sport.php' ? 'active' : ''; ?>">Sport</a>
    </div>
</li>


                </li>
                <li class="sidebar-item">
                    <a href="Data category.php" class="sidebar-link">
                        <i class="fa-solid fa-clipboard-list"></i>
                        <span style="font-weight: 600; " >Categories</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-comment"></i>
                        <span style="font-weight: 600;">Comment</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="admin_profile.php" class="sidebar-link">
                        <i class="fa-solid fa-cog"></i>
                        <span style="font-weight: 600;">Profile</span>
                    </a>
                </li>
        
            </ul>
            <div class="sidebar-footer">
                <a href="logout.php" class="sidebar-link">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span style="font-weight: 600;">Logout</span>
                </a>
            </div>
        </aside>
        <main class="main">
        <div class="table-responsive">
            <div class="nullbar"><h1>Data Shoes School</h1>
        </div>
            <div class="container">
                
                <a href="add_product.php" class="btn btn-primary btn-add-user">
                    <i class="fa-solid fa-plus"></i> Add Product
                </a>
                <table>
                <thead>
    <tr>
        <th>No</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Description</th>
        <th>Specification</th>
        <th>Price</th>
        <th>Sizes</th>
        <th>Colors</th>
        <th>Stock</th>
        <th>Rating</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php
    include "koneksi.php";

    // Query untuk mengambil data produk dari database
    $query = "SELECT * FROM products WHERE id BETWEEN 11 AND 17 LIMIT 6";

    
    $result = mysqli_query($conn, $query);

    // Cek apakah query berhasil dieksekusi
    if ($result) {
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $no . "</td>
                    <td>" . $row['product_name'] . "</td>
                    <td>" . $row['category_id'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td>" . $row['spesification'] . "</td>
                    <td>" . $row['price'] . "</td>
                    <td>" . $row['sizes'] . "</td>
                    <td>" . $row['colors'] . "</td>
                    <td>" . $row['stock'] . "</td>
                    <td>" . $row['rating'] . "</td>
                    <td><img src='" . $row['image_url'] . "' alt='Product Image' style='width: 50px; height: 50px;'></td>
                    <td class='btn-action'>
                        <a href='edit_product.php?id=" . $row['id'] . "' class='btn btn-edit'><i class='fa-solid fa-pen'></i> </a>
                        <a href='delete_product.php?id=" . $row['id'] . "' class='btn btn-delete'><i class='fa-solid fa-trash'></i> </a>
                    </td>
                  </tr>";
            $no++;
        }
    } else {
        echo "<tr><td colspan='8'>No products found</td></tr>";
    }
    ?>
</tbody>

                </table>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script>

        
        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("click", function () {
            document.querySelector("#sidebar").classList.toggle("expand");
        });


         // Toggle Dropdown for Product
         const productLink = document.getElementById('productLink');
        const productDropdown = document.getElementById('productDropdown');

        productLink.addEventListener('click', function () {
            productDropdown.classList.toggle('active');
        });


        document.addEventListener('DOMContentLoaded', function() {
        const sidebarLinks = document.querySelectorAll('.sidebar-link.has-dropdown');

        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const dropdown = this.nextElementSibling;

                // Mencegah navigasi ke link
                e.preventDefault();

                // Menutup semua dropdown lainnya
                document.querySelectorAll('.sidebar-dropdown').forEach(d => {
                    if (d !== dropdown) {
                        d.classList.remove('show');
                    }
                });

                // Toggle dropdown yang diinginkan
                dropdown.classList.toggle('show');
            });
        });
    });


        
    </script>

</body>

</html>

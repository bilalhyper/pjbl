<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data User</title>
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
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

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
            border-left: 3px solid transparent;
        }

        .sidebar-link i {
            font-size: 1.1rem;
            margin-right: 1.2rem;
        }

        a.sidebar-link:hover {
            background-color: rgba(91, 207, 157, 0.2);
            border-left: 3px solid rgb(10, 199, 10);
        }

        a.sidebar-link.active {
            background-color: #59ab6e;
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, .14), 0 7px 10px -5px rgba(54, 244, 95, 0.4);
            color: white;
            border-left: 5px solid white;
            border-right: 5px solid white;
           

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
            width: 94%;
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

        /* Gaya Tambahan untuk Tabel */
        table {
            border-collapse: separate;
            border-spacing: 0;
            width: 95%;
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
                    <a href="#" class="sidebar-link active">
                        <i class="fa-solid fa-user"></i>
                        <span style="font-weight: 600;" class="active">User</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="Data product.php" class="sidebar-link">
                        <i class="fa-solid fa-box"></i>
                        <span style="font-weight: 600;">Product</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="Data category.php" class="sidebar-link">
                        <i class="fa-solid fa-clipboard-list"></i>
                        <span style="font-weight: 600; ">Categories</span>
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
            <div class="nullbar">
            <h1>Data User</h1>
            </div>
            <div class="container">
                
                <a href="add_user.php" class="btn btn-primary btn-add-user">
                    <i class="fa-solid fa-plus"></i> Add User
                </a>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>No_hp</th>
                            <th>Alamat</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";

                        // Query untuk mengambil data user dari database
                        $query = "SELECT * FROM tb_user";
                        $result = mysqli_query($conn, $query);

                        // Cek apakah query berhasil dieksekusi
                        if (!$result) {
                            echo "<tr><td colspan='6'>Gagal mengambil data.</td></tr>";
                        } else {
                            $no = 1;
                            // Tampilkan data user di tabel
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['no_hp']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                                echo "<td>••••••••</td>"; // Tidak menampilkan password asli untuk alasan keamanan
                                echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                                echo "<td class='btn-action'>
                                        <a href='edit_user.php?id=" . $row['id_user'] . "' class='btn btn-edit'><i class='fa-solid fa-pen'></i> </a>
                                        <a href='delete_user.php?id=" . $row['id_user'] . "' class='btn btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'><i class='fa-solid fa-trash'></i> </a>
                                    </td>";
                                echo "</tr>";
                            }
                        }

                        // Tutup koneksi
                        mysqli_close($conn);
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
    </script>

</body>

</html>

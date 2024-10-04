-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Okt 2024 pada 09.23
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clashoes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(10) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `category_name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Gender', NULL, '2024-09-20 11:10:18', '2024-09-20 11:10:18'),
(2, 'Men', 1, '2024-09-20 11:10:18', '2024-09-20 11:10:18'),
(3, 'Women', 1, '2024-09-20 11:10:18', '2024-09-20 11:10:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` enum('credit_card','bank_transfer','e-wallet','cash_on_delivery') DEFAULT NULL,
  `payment_status` enum('pending','completed','failed') DEFAULT 'pending',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `spesification` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `sizes` varchar(255) DEFAULT NULL,
  `colors` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `category_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `spesification`, `price`, `stock`, `sizes`, `colors`, `image_url`, `rating`, `category_id`) VALUES
(1, 'Aero Street', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse. Donec condimentum elementum convallis. Nunc sed orci a diam ultrices aliquet interdum quis nulla.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse. Donec condimentum elementum convallis. Nunc sed orci a diam ultrices aliquet interdum quis nulla.', 159000.00, 77, '36/38/40/42', 'white', 'uploads/AEROSTREET 1.png', 5, 2),
(2, 'Aerostreet X Gibran 3 ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse. Donec condimentum elementum convallis. Nunc sed orci a diam ultrices aliquet interdum quis nulla.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse. Donec condimentum elementum convallis. Nunc sed orci a diam ultrices aliquet interdum quis nulla.', 180000.00, 34, '34/36/38/40', 'WHITE', 'uploads/sneaker_wanita-removebg-preview2.png', 3.5, 3),
(3, 'Aerostreet Oxford Natural ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse. Donec condimentum elementum convallis. Nunc sed orci a diam ultrices aliquet interdum quis nulla.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse. Donec condimentum elementum convallis. Nunc sed orci a diam ultrices aliquet interdum quis nulla.', 155000.00, 33, '34/36/38/40', 'WHITE', 'uploads/sg-11134201-7rbmz-lp6df1t7jz4q46-removebg-preview2.png', 3, 2),
(5, 'Aerostreet Oxford Natural ', 'yyyyyyu', NULL, 155000.00, 0, '34/36/38/40', 'WHITE', 'uploads/sg-11134201-7rbmz-lp6df1t7jz4q46-removebg-preview2.png', 3, 3),
(6, 'Aerostreet Brooklyn', 'ytytuo', 'rrrrrr', 150000.00, 33, '34/36/38/40', 'WHITE', 'uploads/id-11134207-7r98y-llym42tpvq8cba-removebg-preview2.png', 3, 2),
(7, 'PVN Junsung 530 wanita', 'rrrrrf', NULL, 154300.00, 0, '34/36/38/40', 'WHITE', 'uploads/image 2.png', 4.5, 3),
(8, 'COROLLA COX3323402', 'pppppp', NULL, 155000.00, 0, '34/36/38/40', 'WHITE', 'uploads/id-11134207-7r98w-lsgfde33xt7rd3-removebg-preview2.png', 3, 3),
(9, 'Aerostreet Classic hijau tua', 'wwwwwwwwwe', NULL, 160000.00, 0, '34/36/38/40', 'WHITE', 'uploads/SneakersHAL12.png', 4, 2),
(10, 'COROLLA COX3323404', 'rrrrrrrrrt', NULL, 150000.00, 0, '34/36/38/40', 'WHITE', 'uploads/id-11134207-7r98r-lsc7p1dmbz6h5b-removebg-preview.png', 2.5, 3),
(11, 'School', 'lorem ipsum', 'lorem ipsum', 153000.00, 55, '34/36/38/40', 'black', 'uploads/b86a53a0f4fa3ae44c631fb44ce60cba2.jpg', 4, 3),
(12, 'School2', 'LOREM IPSUM', 'DFDVDVDV', 158000.00, 57, '36/38/40/42', 'black', 'uploads/image 3.png', 3, 3),
(13, ' SEPATU ANDO HITAM', 'LOREM IPSUM', 'LOREM IPSUM', 158000.00, 43, '34/36/38/40', 'black', 'uploads/SEKOLAH FETUR2.jpg', 2, 2),
(14, 'Aero Street 21AA30', 'LOREM IPSUM', 'LOREM IPSUM', 153000.00, 98, '34/36/38/40', 'WHITE', 'uploads/AEROSTREET 1.png', 4, 2),
(15, 'SCHOOL SHOES 4', 'LOREM IPSUM LOREM IPSUM', 'LOREM IPSUM LOREM IPSUM', 158000.00, 87, '36/38/40/42', 'black', 'uploads/id-11134207-7r98y-llc4ywggtrjf5c.jpg', 3, 3),
(16, 'Sepatu Sekolah  Kanvas ', 'LOREM LOREM LOREM LOREM', 'ISUM IPSUM IPSUM', 165000.00, 89, '36/38/40/42', 'WHITE', 'uploads/id-11134207-7r98w-lxlv78frihpm5f-removebg-preview.png', 4, 2),
(17, 'Sepatu Sport Pria ', 'LOREM IPSUM LOREM IPSUM LOREM IPSUM', 'LOREM IPSUM LOREM IPSUM LOREM IPSUM', 165000.00, 56, '36/38/40/42', 'Green', 'uploads/FEATUR_SPORT-removebg-preview2.png', 4, 2),
(18, 'Sepatu Sport Wanita ', 'LOREM IPSUM LOREM IPSUM LOREM IPSUM', 'LOREM IPSUM LOREM IPSUM LOREM IPSUM', 153000.00, 67, '34/36/38/40', 'PINK', 'uploads/id-11134201-7r98o-llemyv0c9v6a4c-removebg-preview.png', 3, 3),
(19, 'Sepatu Sport Wanita ', 'LOREM IPSUM LOREM IPSUM LOREM IPSUM', 'LOREM IPSUM LOREM IPSUM LOREM IPSUM', 144000.00, 34, '34/36/38/40', 'WHITE', 'uploads/id-11134207-7r98r-lsc7p1dmbz6h5b-removebg-preview.png', 4, 3),
(20, 'Sepatu Sport', 'LOREM IPSUM LOREM IPSUM LOREM IPSUM', 'LOREM IPSUM LOREM IPSUM LOREM IPSUM', 170000.00, 76, '36/38/40/42', 'WHITE', 'uploads/id-11134207-7r98w-lsgfde33xt7rd3-removebg-preview2.png', 3, 3),
(21, 'NIKEE', 'lorem', 'llll', 165000.00, 8, '34/36/38/40', 'black', 'uploads/f7ec6177489b15e193f785c9d51b3b57.jpg', 4, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total_rating` int(11) DEFAULT 0,
  `rating_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product_ratings`
--

INSERT INTO `product_ratings` (`id`, `product_id`, `total_rating`, `rating_count`) VALUES
(1, 1, 5, 5),
(2, 2, 5, 5),
(3, 17, 5, 5),
(4, 17, 4, 1),
(5, 17, 5, 1),
(6, 17, 5, 5),
(7, 17, 5, 5),
(8, 17, 5, 5),
(9, 9, 5, 5),
(10, 9, 5, 5),
(11, 9, 2, 2),
(12, 7, 10, 6),
(13, 7, 10, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `review_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(40) NOT NULL,
  `username` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `email`, `no_hp`, `alamat`, `password`, `role`) VALUES
(1, 'bilal', 'adenrawrpo@gmail.com', '08213209677', 'malang', '$2y$10$NShd9/C8fdJ/yH0buvHig.BXWpXXIoBK/Yzkq7PvpbVLhtf603z0C', 'admin'),
(2, 'nopal', 'kyya7877@gmail.com', '08215139348', 'sukunae', 'ebf0664735062d6ddce4b9e5be760825', 'admin'),
(4, 'lal', 'geats135@gmail.com', '081513980800', 'sukun', 'ebf0664735062d6ddce4b9e5be760825', 'user'),
(6, 'han', 'nopal@gmail.com', '082140993827', 'klayatan', 'ebf0664735062d6ddce4b9e5be760825', 'user'),
(10, 'raka', 'raka@gmail.com', '09886767575', 'kololo', '$2y$10$DLbnducoy1YCgy0l8dEJ8.GSIwMQtmzFRuNnrsLzSV1vf5UmbSp0q', 'user'),
(12, 'USER', 'user@gmail.com', '0988989', 'kasin', 'ebf0664735062d6ddce4b9e5be760825', 'user'),
(13, 'user1', 'user1@gmail.com', '09089898977', 'malang', '$2y$10$a0J0hlm0eSqo8b5qyYAEvuB7m2wWu5hc3RSV1Tihcxd.zr3.77Esq', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_parent` (`parent_id`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `comments_ibfk_2` (`user_id`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`category_id`);

--
-- Indeks untuk tabel `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ketidakleluasaan untuk tabel `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_category_parent` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD CONSTRAINT `product_ratings_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ketidakleluasaan untuk tabel `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

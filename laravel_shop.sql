-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 10:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(7, 35, 15, 3, 25, '2024-03-11 21:40:32', '2024-03-11 21:40:32'),
(8, 35, 6, 1, 35, '2024-03-11 21:40:32', '2024-03-11 21:40:32'),
(9, 35, 15, 3, 25, '2024-03-11 21:41:21', '2024-03-11 21:41:21'),
(10, 35, 6, 1, 35, '2024-03-11 21:41:21', '2024-03-11 21:41:21'),
(11, 37, 6, 3, 35, '2024-03-11 21:48:27', '2024-03-11 21:48:27'),
(12, 38, 10, 1, 25, '2024-03-11 22:23:33', '2024-03-11 22:23:33'),
(13, 39, 7, 1, 25, '2024-03-11 22:29:35', '2024-03-11 22:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `content`) VALUES
(35, 'abc', '0918622480', 'admin@gmail.com', 'dddddddddddddd'),
(36, 'abc', '0918622480', 'admin@gmail.com', 'dwadwadwa'),
(37, 'abc', '0918622480', '2001202153@hufi.edu.vn', 'dwadwadwadwad'),
(38, 'Nước hoa nam', '0918622480', '2001202153@hufi.edu.vn', 'đawadwadwadwad'),
(39, 'Nước hoa nam333', '0918622480', '2001202153@hufi.edu.vn', 'dwadawdawdwadw');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `description`, `content`, `slug`, `active`) VALUES
(1, 'Thời trang', 0, 'Thời trang', '<p>Thời trang</p>', 'thoi-trang', 1),
(2, 'Áo nữ', 1, 'Áo nữ', '<p>Áo nữ</p>', 'ao-nu', 1),
(6, 'Nước hoa', 0, 'Nước hoa', '<p>Nước hoa</p>', 'nuoc-hoa', 1),
(9, 'Nước hoa nam', 6, 'Nước hoa nam', '<p>Nước hoa nam</p>', 'nuoc-hoa-nam', 1),
(11, 'Trang sức', 0, 'Trang sức', '<p>Trang sức</p>', 'trang-suc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_01_112944_create_menus_table', 2),
(6, '2024_02_19_080059_create_products_table', 3),
(8, '2024_03_04_051050_create_sliders_table', 4),
(9, '2024_03_11_014148_create_customers_table', 5),
(10, '2024_03_11_014217_create_carts_table', 5),
(11, '2024_03_12_044252_create_jobs_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `price_salce` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `content`, `price`, `price_salce`, `quantity`, `menu_id`, `image`, `active`, `created_at`, `updated_at`) VALUES
(5, 'Esprit Ruffle Shirt', 'Esprit Ruffle Shirt', '<p><a href=\"http://127.0.0.1:8000/product-detail.html\">Esprit Ruffle Shirt</a></p>', 16, 1, 12, 2, '/storage/uploads/2024/03/06/product-01.jpg', 1, '2024-03-06 00:49:57', '2024-03-06 00:49:57'),
(6, 'Herschel supply', 'Herschel supply', '<p><a href=\"http://127.0.0.1:8000/product-detail.html\">Herschel supply</a></p>', 35, 1, 12, 2, '/storage/uploads/2024/03/06/product-02.jpg', 1, '2024-03-06 00:50:33', '2024-03-06 00:50:33'),
(7, 'Only Check Trouser', 'Only Check Trouser', '<p><a href=\"http://127.0.0.1:8000/product-detail.html\">Only Check Trouser</a></p>', 25, 1, 12, 9, '/storage/uploads/2024/03/06/product-03.jpg', 1, '2024-03-06 00:51:07', '2024-03-06 00:51:07'),
(8, 'Classic Trench Coat', 'Classic Trench Coat', '<p><a href=\"http://127.0.0.1:8000/product-detail.html\">Classic Trench Coat</a></p>', 75, 1, 12, 2, '/storage/uploads/2024/03/06/product-04.jpg', 1, '2024-03-06 00:51:36', '2024-03-06 00:51:36'),
(9, 'Front Pocket Jumper', 'Front Pocket Jumper', '<p><a href=\"http://127.0.0.1:8000/product-detail.html\">Front Pocket Jumper</a></p>', 34, 1, 12, 9, '/storage/uploads/2024/03/06/product-05.jpg', 1, '2024-03-05 17:51:07', '2024-03-05 17:51:07'),
(10, 'Vintage Inspired Classic', 'Vintage Inspired Classic', '<p><a href=\"http://127.0.0.1:8000/product-detail.html\">Vintage Inspired Classic</a></p>', 25, 1, 12, 9, '/storage/uploads/2024/03/06/product-06.jpg', 1, '2024-03-05 17:51:07', '2024-03-05 17:51:07'),
(11, 'Shirt in Stretch Cotton', 'Shirt in Stretch Cotton', '<p><a href=\"http://127.0.0.1:8000/product-detail.html\">Shirt in Stretch Cotton</a></p>', 25, 1, 12, 9, '/storage/uploads/2024/03/06/product-07.jpg', 1, '2024-03-05 17:51:07', '2024-03-05 17:51:07'),
(12, 'Pieces Metallic Printed', 'Pieces Metallic Printed', '<p><a href=\"http://127.0.0.1:8000/product-detail.html\">Pieces Metallic Printed</a></p>', 25, 1, 12, 9, '/storage/uploads/2024/03/06/product-08.jpg', 1, '2024-03-05 17:51:07', '2024-03-05 17:51:07'),
(13, 'Converse All Star Hi Plimsolls', 'Converse All Star Hi Plimsolls', '<p><a href=\"http://127.0.0.1:8000/product-detail.html\">Converse All Star Hi Plimsolls</a></p>', 25, 1, 12, 9, '/storage/uploads/2024/03/06/product-09.jpg', 1, '2024-03-05 17:51:07', '2024-03-05 17:51:07'),
(14, 'Femme T-Shirt In Stripe', 'Femme T-Shirt In Stripe', '<p><a href=\"http://127.0.0.1:8000/product-detail.html\">Femme T-Shirt In Stripe</a></p>', 25, 1, 12, 9, '/storage/uploads/2024/03/06/product-10.jpg', 1, '2024-03-05 17:51:07', '2024-03-05 17:51:07'),
(15, 'Herschel supply', 'Herschel supply', '<p><a href=\"http://127.0.0.1:8000/product-detail.html\">Herschel supply</a></p>', 25, 1, 12, 9, '/storage/uploads/2024/03/06/product-11.jpg', 1, '2024-03-05 17:51:07', '2024-03-05 17:51:07'),
(16, 'Herschel supply', 'Herschel supply', '<p>Herschel supply</p>', 25, 1, 12, 9, '/storage/uploads/2024/03/06/product-12.jpg', 1, '2024-03-05 17:51:07', '2024-03-08 22:14:22'),
(17, 'T-Shirt with Sleeve', 'T-Shirt with Sleeve', '<h2><strong>Nước Hoa Charme Vanitas 30ml</strong></h2><h2><strong>Giới Thiệu Nước Hoa Charme Vanitas 30ml</strong></h2><p>Nước hoa Charme Vanitas dành cho các bạn nữ trẻ trung, năng động. Mùi hương mang nốt hương hoa cỏ thực sự quyến rũ nồng nàn khi sử dụng vào buổi sáng của khí trời.</p><p><img src=\"https://nuochoacharme.info/wp-content/uploads/2019/06/Vanitas_120200317123205452-400x400.jpg\" alt=\"nuoc-hoa-charme-vanitas\" srcset=\"https://nuochoacharme.info/wp-content/uploads/2019/06/Vanitas_120200317123205452-400x400.jpg 400w, https://nuochoacharme.info/wp-content/uploads/2019/06/Vanitas_120200317123205452-800x800.jpg 800w, https://nuochoacharme.info/wp-content/uploads/2019/06/Vanitas_120200317123205452-280x280.jpg 280w, https://nuochoacharme.info/wp-content/uploads/2019/06/Vanitas_120200317123205452-768x768.jpg 768w, https://nuochoacharme.info/wp-content/uploads/2019/06/Vanitas_120200317123205452-300x300.jpg 300w, https://nuochoacharme.info/wp-content/uploads/2019/06/Vanitas_120200317123205452-600x600.jpg 600w, https://nuochoacharme.info/wp-content/uploads/2019/06/Vanitas_120200317123205452-100x100.jpg 100w, https://nuochoacharme.info/wp-content/uploads/2019/06/Vanitas_120200317123205452.jpg 1200w\" sizes=\"100vw\" width=\"400\" height=\"400\"></p><p><i>Nước hoa charme Vanitas</i></p><h2><strong>Nước hoa Charme Vanitas dành cho các bạn nữ trẻ trung, năng động.</strong></h2><p>Mở đầu là hương chanh lá cam tươi mát giống với một chiếc bánh cupcake ngon lành, trong khi đó hương hoa tiare và hoa lan nam phi giúp củng cố hương chanh, một hương thơm nhẹ nhàng khá giống với hương hoắc hương giúp cho mùi hương thêm phần đẳng cấp. Lớp hương giữa làm nhẹ bớt mùi hương chanh và cân bằng giữa hương hoa cỏ và chanh, tạo nên một mùi hương chưa từng có trong giới nước hoa, mùi hương vừa tươi mát và đồng thời cũng rất ấm áp ngay khi hai mùi hương này hòa huyện với nhau. Mùi hương được dẫn dắt vào lớp hương cuối đầy ấm áp và dễ chịu của hương gỗ tuyết tùng.</p><p>&nbsp;</p><p><img src=\"https://nuochoacharme.info/wp-content/uploads/2019/06/nuoc-hoa-nu-charme-vanitas-30ml-1-400x400.jpg\" alt=\"Nước hoa charme Vanitas\" srcset=\"https://nuochoacharme.info/wp-content/uploads/2019/06/nuoc-hoa-nu-charme-vanitas-30ml-1-400x400.jpg 400w, https://nuochoacharme.info/wp-content/uploads/2019/06/nuoc-hoa-nu-charme-vanitas-30ml-1-280x280.jpg 280w, https://nuochoacharme.info/wp-content/uploads/2019/06/nuoc-hoa-nu-charme-vanitas-30ml-1-300x300.jpg 300w, https://nuochoacharme.info/wp-content/uploads/2019/06/nuoc-hoa-nu-charme-vanitas-30ml-1-600x600.jpg 600w, https://nuochoacharme.info/wp-content/uploads/2019/06/nuoc-hoa-nu-charme-vanitas-30ml-1-100x100.jpg 100w, https://nuochoacharme.info/wp-content/uploads/2019/06/nuoc-hoa-nu-charme-vanitas-30ml-1.jpg 700w\" sizes=\"100vw\" width=\"400\" height=\"400\"></p><p><i>Trẻ trung năng động bức phá</i></p><h2><strong>Thành phần tạo nên Charme Vanitas đầy quyến rũ.</strong></h2><p>Mẫu chai nước hoa Charme Vanitas được thiết kế trong mẫu chai sang trọng với một tông màu vàng và được đính thêm một đoạn kim loại màu vàng kim thể hiện sự sang trọng và hấp dẫn. Charme Vanitas là một mẫu nước hoa thể hiện được sự tươi mát tốt nhất trong các sản phẩn của Charme. Hương hoa trắng mạnh mẽ, nhưng không quá nồng và dược hương gỗ làm dịu bớt.</p><p><img src=\"https://nuochoacharme.info/wp-content/uploads/2019/06/unnamed-2-400x400.jpg\" alt=\"Nuoc-hoa-charme-vanitas\" srcset=\"https://nuochoacharme.info/wp-content/uploads/2019/06/unnamed-2-400x400.jpg 400w, https://nuochoacharme.info/wp-content/uploads/2019/06/unnamed-2-280x280.jpg 280w, https://nuochoacharme.info/wp-content/uploads/2019/06/unnamed-2-300x300.jpg 300w, https://nuochoacharme.info/wp-content/uploads/2019/06/unnamed-2-100x100.jpg 100w, https://nuochoacharme.info/wp-content/uploads/2019/06/unnamed-2.jpg 512w\" sizes=\"100vw\" width=\"400\" height=\"400\"></p><p><i>Thiết kế sang trọng tinh tế</i></p><p>Nước hoa Vanitas dạng chai thủy tinh được thiết kế tinh xảo, polish thủ công từng cạnh lấp lánh như pha lê, đẹp và sang trọng. Charme Vanitas 30ml là sự lựa chọn tuyệt vời cho phái đẹp hiện đại.</p><p>Charme Vanitas 30ml là sự lựa chọn tuyệt vời cho phái đẹp hiện đại.</p><h2><strong>CHARME cam kết với người tiêu dùng:</strong></h2><p>– Giấy phép lưu hành, chất lượng sản phẩm được Bộ y Tế kiểm nghiệm.</p><p>– Tem chống hàng giả của bộ Công An.</p><p>– Hương liệu cao cấp được nhập khẩu chính ngạch từ Pháp.</p><p>– Công nghệ và dây chuyền sản xuất đạt tiêu chuẩn Châu Âu.</p><p>– Mùi hương chuẩn như Versace Vanitas nổi tiếng trên thế giới.</p><figure class=\"image\"><img style=\"aspect-ratio:296/296;\" src=\"https://nuochoacharme.info/wp-content/uploads/2019/06/67945292_140957360450266_3062379310603042816_n-1.jpg\" alt=\"nuoc-hoa-charme-vanitas\" srcset=\"https://nuochoacharme.info/wp-content/uploads/2019/06/67945292_140957360450266_3062379310603042816_n-1.jpg 296w, https://nuochoacharme.info/wp-content/uploads/2019/06/67945292_140957360450266_3062379310603042816_n-1-280x280.jpg 280w, https://nuochoacharme.info/wp-content/uploads/2019/06/67945292_140957360450266_3062379310603042816_n-1-100x100.jpg 100w\" sizes=\"100vw\" width=\"296\" height=\"296\"></figure><p>+ Dung tích: 30ml.<br>+ Hạn sử dụng: 3 năm kể từ ngày sản xuất.<br>+ Cách sử dụng: Giữ chai thẳng đứng, nhấn nút và xịt vào vùng cổ và cổ tay.<br>+ Bảo quản: Để nơi khô ráo, thoáng mát. Tránh tiếp xúc trực tiếp với mắt và tránh xa tầm tay trẻ em.</p>', 25, 1, 12, 9, '/storage/uploads/2024/03/06/product-13.jpg', 1, '2024-03-05 17:51:07', '2024-03-07 23:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `sort_by` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `url`, `image`, `sort_by`, `active`, `created_at`, `updated_at`) VALUES
(3, 'Women Collection 2018', 'https://www.youtube.com/watch?v=iP5PV99eBrk&list=PLzrVYRai0riRnmKWhDEYixPDLs3CCk2lO&index=26', '/storage/uploads/2024/03/06/slide-01.jpg', 1, 1, '2024-03-06 00:27:55', '2024-03-06 00:27:55'),
(4, 'Men New-Season', 'https://www.youtube.com/watch?v=iP5PV99eBrk&list=PLzrVYRai0riRnmKWhDEYixPDLs3CCk2lO&index=26', '/storage/uploads/2024/03/06/slide-02.jpg', 2, 1, '2024-03-06 00:28:21', '2024-03-06 00:28:21'),
(5, 'Men Collection 2018', 'https://www.youtube.com/watch?v=iP5PV99eBrk&list=PLzrVYRai0riRnmKWhDEYixPDLs3CCk2lO&index=26', '/storage/uploads/2024/03/06/slide-03.jpg', 3, 1, '2024-03-06 00:28:48', '2024-03-06 00:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', '2024-01-29 07:39:03', '$2y$12$aHI3fbHfEWq5fEOMZEuCFe4EGMxBCsqJVxKHbbWhsdEy9aar/xKHC', 'zGHcK5KNFkpBVB1FoSZGjhsrBGRjGbPDTYvCyoWmeIeHZEDJ92UaO1XB1A8t', '2024-01-29 07:39:03', '2024-01-29 07:39:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

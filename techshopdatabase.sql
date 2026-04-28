-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2026. Ápr 28. 08:37
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `techshopdatabase`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '2026_02_12_221558_create_users_table', 1),
(3, '2026_02_12_222902_create_sessions_table', 1),
(4, '2026_03_15_163209_create_orders_table', 1),
(5, '2026_03_16_142426_create_newsletters_table', 1),
(6, '2026_03_19_091958_add_newsletter_to_users_table', 1),
(7, '2026_03_24_101333_add_address_and_items_to_orders_table', 1),
(8, '2026_03_24_102646_add_address_to_users_table', 1),
(9, '2026_03_26_061606_create_products_table', 1),
(10, '2026_04_14_125105_create_personal_access_tokens_table', 1),
(11, '2026_04_14_190004_add_payment_method_to_orders_table', 1),
(12, '2026_04_26_092712_add_company_data_to_orders_table', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `item_quantity` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'images/products/placeholder.png',
  `quantity` int(11) NOT NULL DEFAULT 0,
  `category` varchar(255) NOT NULL,
  `brandname` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`, `quantity`, `category`, `brandname`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'iPhone 15 Pro', 499.99, 'Enim sequi veniam architecto culpa explicabo sequi et. Repellendus mollitia aliquam quaerat omnis ut. Quam accusamus ad quis illo veritatis labore. Quia libero voluptatibus non veniam.', 'images/products/iphone_15_pro.png', 39, 'Smartproduct', 'Apple', 'Phone', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(2, 'iPhone 14', 399.99, 'Sunt soluta ipsam quae sit quia velit. Rerum soluta aut soluta recusandae commodi. Ipsam explicabo hic aliquam accusamus similique dolorem ut.', 'images/products/iphone_14.png', 167, 'Smartproduct', 'Apple', 'Phone', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(3, 'Samsung Galaxy S24', 3499.99, 'Et aspernatur accusamus tempora autem veniam voluptatem aut. Sed perspiciatis sit et perspiciatis aperiam minus officia. Ducimus voluptas est et nisi minima saepe. Rem aliquam quas laborum consequuntur iusto. Sint quo nostrum reiciendis voluptatem eaque.', 'images/products/samsung_galaxy_s24.png', 44, 'Smartproduct', 'Samsung', 'Phone', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(4, 'Samsung Galaxy S23', 2999.99, 'Molestiae fuga fugiat exercitationem fugit. Fuga voluptatibus rerum rem. Nostrum dolor ratione voluptatum sequi.', 'images/products/samsung_galaxy_s23.png', 60, 'Smartproduct', 'Samsung', 'Phone', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(5, 'Xiaomi 13', 2499.99, 'Perspiciatis quam quae neque nulla est fugit. Omnis voluptas facilis ipsam qui quas. Rerum dolorem sint vero consequuntur a aut. Tenetur laudantium adipisci facere molestiae eos debitis sed.', 'images/products/xiaomi_13.png', 60, 'Smartproduct', 'Xiaomi', 'Phone', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(6, 'Xiaomi 12', 1999.99, 'Sit neque est laboriosam voluptatibus. Omnis corrupti amet ducimus nihil maiores consequatur iste.', 'images/products/xiaomi_12.png', 85, 'Smartproduct', 'Xiaomi', 'Phone', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(7, 'Google Pixel 8', 3499.99, 'Ut laboriosam modi deleniti ea in aut sequi et. Excepturi voluptates architecto aut distinctio sapiente. Quia nulla quae dolorum similique corrupti.', 'images/products/google_pixel_8.png', 20, 'Smartproduct', 'Google', 'Phone', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(8, 'Google Pixel 9a', 2799.99, 'Placeat libero pariatur numquam eos eaque. Sapiente sit eligendi ut aut. Ut placeat blanditiis at. Temporibus voluptatibus aut ipsum rem molestias unde et.', 'images/products/google_pixel_9a.png', 65, 'Smartproduct', 'Google', 'Phone', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(9, 'OnePlus 12', 2799.99, 'Eius illo iste eaque commodi. Maiores recusandae inventore doloremque est quam et. Voluptate cumque dolores ratione est fuga officia voluptate.', 'images/products/oneplus_12.png', 16, 'Smartproduct', 'OnePlus', 'Phone', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(10, 'OnePlus 11', 1999.99, 'Dolor culpa facere quis qui dolor voluptates. Nemo quam sed possimus reprehenderit. Esse ducimus dolore qui molestiae.', 'images/products/oneplus_11.png', 110, 'Smartproduct', 'OnePlus', 'Phone', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(11, 'MacBook Air M2', 5999.99, 'Vel voluptas ullam commodi et minima porro praesentium. Sint sunt et quasi perferendis assumenda quos.', 'images/products/macbook_air_m2.png', 26, 'Smartproduct', 'Apple', 'Laptop', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(12, 'MacBook Pro M2', 8999.99, 'Consectetur laudantium ad sunt dolorem voluptatem rerum voluptatem ratione. Pariatur vitae non illum officia ducimus placeat aut.', 'images/products/macbook_pro_m2.png', 66, 'Smartproduct', 'Apple', 'Laptop', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(13, 'Lenovo Legion 5', 4299.99, 'Itaque vero veniam ratione et culpa in. Alias blanditiis eius omnis totam dolor. Ut quia sunt nesciunt qui. Nisi consectetur temporibus expedita quis.', 'images/products/lenovo_legion_5.png', 108, 'Smartproduct', 'Lenovo', 'Laptop', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(14, 'ASUS ZenBook 14', 3799.99, 'Consequuntur iure quidem debitis. Nihil ut pariatur in sit.', 'images/products/asus_zenbook_14.png', 139, 'Smartproduct', 'ASUS', 'Laptop', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(15, 'Dell XPS 13', 6499.99, 'Ex id minima facilis consectetur incidunt et earum. Voluptatem voluptatem optio ut molestiae. Sit voluptas dignissimos laboriosam beatae numquam quidem. Et deserunt corporis expedita itaque quas. Sapiente et ipsam in voluptatem aspernatur quia.', 'images/products/dell_xps_13.png', 17, 'Smartproduct', 'Dell', 'Laptop', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(16, 'HP Spectre x360', 5999.99, 'Nihil sed qui aliquam deserunt a explicabo. Est pariatur cumque omnis explicabo. Sint molestias ut quis.', 'images/products/hp_spectre_x360.png', 16, 'Smartproduct', 'HP', 'Laptop', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(17, 'ASUS ROG Strix G15', 5199.99, 'Est exercitationem animi minima qui et. Incidunt dolor praesentium aut ducimus accusantium.', 'images/products/asus_rog_strix_g15.png', 148, 'Smartproduct', 'ASUS', 'Laptop', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(18, 'Lenovo ThinkPad X1', 6499.99, 'Vitae quae at facere et ut rerum ratione adipisci. Est sunt dignissimos rerum velit in. Repellat eligendi sed illum alias sint sint ducimus ut.', 'images/products/lenovo_thinkpad_x1.png', 169, 'Smartproduct', 'Lenovo', 'Laptop', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(19, 'HP Pavilion 15', 3999.99, 'Maiores ullam cumque laudantium nisi rerum cupiditate aut quas. Sequi qui eum aut sint adipisci. Quaerat quisquam cupiditate sint recusandae quo consectetur.', 'images/products/hp_pavilion_15.png', 33, 'Smartproduct', 'HP', 'Laptop', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(20, 'Dell Inspiron 16', 4499.99, 'Fuga doloremque enim est. Quibusdam accusantium praesentium maiores. Rem suscipit natus officia sunt quibusdam.', 'images/products/dell_inspiron_16.png', 20, 'Smartproduct', 'Dell', 'Laptop', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(21, 'PlayStation 5', 2199.99, 'Ea quod voluptatum aut cumque. Sit hic incidunt deserunt maiores deleniti quas. Inventore quia voluptatem ducimus ut. Dolorum fuga dolores quaerat atque aut et.', 'images/products/playstation_5.png', 50, 'Gaming', 'Sony', 'Console', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(22, 'PlayStation 4 Pro', 1299.99, 'Odio rerum consectetur repellat in voluptas. Et dolor fugit facere est sapiente vero fuga aspernatur. Numquam architecto nisi ut sit nobis aut. Id itaque fugit laboriosam impedit.', 'images/products/playstation_4_pro.png', 121, 'Gaming', 'Sony', 'Console', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(23, 'Xbox Series X', 1999.99, 'Omnis veritatis et corporis modi aspernatur perferendis optio. Sit ab at et dolores. Vel alias adipisci laboriosam cum aliquid.', 'images/products/xbox_series_x.png', 11, 'Gaming', 'Microsoft', 'Console', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(24, 'Xbox One X', 1199.99, 'Dolore natus quia aliquam voluptatem debitis. Excepturi deserunt quisquam libero accusamus. Iure doloribus nam ut nihil perspiciatis sequi.', 'images/products/xbox_one_x.png', 147, 'Gaming', 'Microsoft', 'Console', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(25, 'Nintendo Switch OLED', 1599.99, 'Architecto soluta nesciunt magni. Nihil rem nam laboriosam magni ipsa maxime. Voluptatem aut ea voluptatem voluptatem rerum dignissimos. Rerum doloribus corrupti eum praesentium vero.', 'images/products/nintendo_switch_oled.png', 31, 'Gaming', 'Nintendo', 'HandholdConsole', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(26, 'Nintendo Switch Lite', 999.99, 'Porro aut id iste id. Necessitatibus quibusdam assumenda similique nesciunt aut repellendus. Assumenda inventore corporis eveniet tempora voluptas perspiciatis. Est ex delectus accusamus ut.', 'images/products/nintendo_switch_lite.png', 96, 'Gaming', 'Nintendo', 'HandholdConsole', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(27, 'Steam Deck', 1799.99, 'Inventore facere tempore temporibus doloremque velit minus. Itaque id fuga inventore et. Vitae hic voluptatem laudantium. Sed sequi minima expedita.', 'images/products/steam_deck.png', 141, 'Gaming', 'Valve', 'HandholdConsole', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(28, 'PlayStation VR2', 899.99, 'Temporibus dolores quia similique ea velit omnis non. Vel omnis qui placeat sint ducimus sapiente et. Saepe dolor unde et sunt ratione eos nam praesentium. Laborum omnis vel laudantium accusamus.', 'images/products/playstation_vr2.png', 120, 'Gaming', 'Sony', 'VR', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(29, 'Xbox Wireless Controller', 249.99, 'Pariatur ipsa eaque ipsam quia sint facere dignissimos. Nihil sit qui et quam. Possimus dolor et quia dolor et sunt architecto. Sed est quas enim consequatur.', 'images/products/xbox_wireless_controller.png', 56, 'Gaming', 'Microsoft', 'Controller', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(30, 'Nintendo Pro Controller', 299.99, 'Nihil repellendus aut assumenda cupiditate modi quia saepe et. Assumenda tempore consectetur quia vel. Sint alias est provident ut et.', 'images/products/nintendo_pro_controller.png', 6, 'Gaming', 'Nintendo', 'Controller', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(31, 'RTX 4070', 2999.99, 'Voluptatum dicta iure praesentium quo quia enim in. Ut quae quia consequuntur quia. Culpa iste dolorum itaque. Distinctio molestiae est sed neque sequi doloribus.', 'images/products/rtx_4070.png', 10, 'Components', 'NVIDIA', 'GPU', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(32, 'RTX 5060', 4999.99, 'Voluptas deleniti id veritatis dolorem quibusdam tempora. Dolore assumenda vel incidunt et ex quas. Magnam est sint quos ullam. Quasi quisquam soluta blanditiis numquam aut expedita. Eum suscipit perferendis deserunt sit animi nesciunt aut.', 'images/products/rtx_5060.png', 72, 'Components', 'NVIDIA', 'GPU', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(33, 'RTX 4090', 8999.99, 'Impedit minima quia nostrum enim asperiores eveniet. Accusamus excepturi qui distinctio et. Voluptatibus voluptas qui voluptas quisquam sed eos. Nihil sint labore recusandae voluptatem ipsa qui et. Id a et sint est ut.', 'images/products/rtx_4090.png', 21, 'Components', 'NVIDIA', 'GPU', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(34, 'Ryzen 7 5800X', 1499.99, 'Hic provident veritatis voluptates labore dolor. Eos libero accusamus fuga adipisci corrupti. Porro et in similique repellendus earum sed sunt. Consequatur dolor sed non dolorem nisi quia modi.', 'images/products/ryzen_7_5800x.png', 92, 'Components', 'AMD', 'CPU', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(35, 'Ryzen 9 5900X', 2499.99, 'Assumenda dolore eum minus fugit aut. Et ipsum odit aut quasi incidunt possimus a. Repellat earum rerum distinctio est accusamus.', 'images/products/ryzen_9_5900x.png', 154, 'Components', 'AMD', 'CPU', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(36, 'Intel i7-13700K', 1899.99, 'Rerum velit dolorem doloremque dolorem doloribus totam repudiandae. Harum nesciunt architecto ut odit aut ad. Neque molestias ipsum aut dolor.', 'images/products/intel_i7_13700k.png', 120, 'Components', 'Intel', 'CPU', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(37, 'Intel i9-13900K', 2799.99, 'Voluptas repudiandae soluta impedit libero quae at iste. Sed et laborum quis. Consectetur eum quia eos sint vero sunt sunt. Quos et ad saepe eveniet nam voluptas.', 'images/products/intel_i9_13900k.png', 118, 'Components', 'Intel', 'CPU', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(38, 'Samsung 1TB SSD', 449.99, 'Voluptatem ullam iure alias dolorem consequuntur molestiae recusandae. Voluptas doloribus quas ullam et quos. Numquam dicta dignissimos sint omnis. Harum impedit omnis itaque ducimus cumque provident.', 'images/products/samsung_1tb_ssd.png', 134, 'Components', 'Samsung', 'Storage', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(39, 'Corsair 16GB RAM', 399.99, 'Veniam recusandae nemo facilis occaecati dolorem dolores aliquam. Tempore incidunt perspiciatis qui nam consectetur et. Dicta error est doloremque deleniti commodi architecto officia. Officiis numquam reprehenderit reiciendis recusandae libero.', 'images/products/corsair_16gb_ram.png', 151, 'Components', 'Corsair', 'RAM', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(40, 'Kingston 32GB RAM', 799.99, 'Consequuntur corrupti quis dolores. Aut ipsum omnis voluptatibus vero aut voluptates quia praesentium. Necessitatibus in non iusto eos. Officia unde saepe magni fuga voluptatum vel sit consequatur.', 'images/products/kingston_32gb_ram.png', 83, 'Components', 'Kingston', 'RAM', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(41, 'Logitech G Pro X Mouse', 299.99, 'Aut dolorum et incidunt a aut. Qui veritatis ea maiores. Sapiente et nulla explicabo nam.', 'images/products/logitech_g_pro_x_mouse.png', 130, 'Accessories', 'Logitech', 'Mouse', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(42, 'Razer BlackWidow V3', 499.99, 'Natus ducimus eveniet ducimus nisi. Ut qui mollitia eveniet dolores praesentium qui ullam. Ipsa delectus explicabo omnis qui voluptatem cupiditate. Sint vel aut et rerum libero consequatur veniam.', 'images/products/razer_blackwidow_v3.png', 199, 'Accessories', 'Razer', 'Keyboard', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(43, 'Apple Magic Keyboard', 499.99, 'Delectus dolorem amet dolores. At vel earum repudiandae. Eaque soluta eveniet et eligendi tempore est qui. Iure fugit sit nihil nemo eos. Laborum voluptatibus dolores cupiditate aut dolorem amet molestiae doloremque.', 'images/products/apple_magic_keyboard.png', 162, 'Accessories', 'Apple', 'Keyboard', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(44, 'Samsung Wireless Charger', 149.99, 'Odio voluptatem ducimus nesciunt ab qui vero. Voluptatum voluptatem odit distinctio. Consequatur optio vero expedita maxime possimus sunt. Ut explicabo nobis laboriosam repudiandae accusantium quibusdam exercitationem.', 'images/products/samsung_wireless_charger.png', 108, 'Accessories', 'Samsung', 'Charger', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(45, 'Corsair K95 Keyboard', 599.99, 'Occaecati quibusdam a voluptatibus consequatur voluptate architecto. Sed quia error modi quo. Nulla tempore aut facilis omnis iure. Sunt ratione non vitae. In sit magnam excepturi aut.', 'images/products/corsair_k95_keyboard.png', 97, 'Accessories', 'Corsair', 'Keyboard', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(46, 'Razer DeathAdder V3', 399.99, 'Ut dolorem quia nisi qui dolore eum. Sed sed est esse voluptatum sint delectus et. Earum odit recusandae aut in suscipit. Dolore esse recusandae eaque possimus.', 'images/products/razer_deathadder_v3.png', 41, 'Accessories', 'Razer', 'Mouse', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(47, 'Logitech C920 Webcam', 249.99, 'Id assumenda soluta eos quas. Earum quo necessitatibus non ex. Ad dolores voluptatem impedit eum ex officia qui. Cupiditate natus quas explicabo itaque dolorem.', 'images/products/logitech_c920_webcam.png', 146, 'Accessories', 'Logitech', 'Webcam', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(48, 'SteelSeries QcK Mousepad', 99.99, 'Aut iure ut deserunt et ducimus est. Maxime aut voluptas et eos recusandae. Culpa iusto et et ut qui harum et nihil. Tempore et totam rerum.', 'images/products/steelseries_qck_mousepad.png', 166, 'Accessories', 'SteelSeries', 'Mousepad', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(49, 'Samsung 55\" 4K Smart TV', 2499.99, 'Ut dolores necessitatibus corporis eum. Dolores quaerat nostrum quos ut similique. Ea sapiente laudantium quasi et omnis reiciendis.', 'images/products/samsung_55_4k_smart_tv.png', 200, 'Household', 'Samsung', 'Television', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(50, 'LG OLED C2 65\"', 6999.99, 'Est aut dolorem inventore maiores dolores et officiis. Animi omnis ipsum illo a amet ullam. Aut id dolor et repudiandae consequuntur cum.', 'images/products/lg_oled_c2_65.png', 134, 'Household', 'LG', 'Television', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(51, 'Bosch Serie 6 Mosógép', 1899.99, 'Eos optio ad ea et sint voluptas. Aut et omnis velit aliquam temporibus repudiandae. Iusto et quas inventore.', 'images/products/bosch_serie_6_mosogep.png', 4, 'Household', 'Bosch', 'WashingMachine', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(52, 'Whirlpool Mosogatógép', 1599.99, 'Omnis eveniet et velit atque saepe rem quo enim. Autem cumque repellendus asperiores maiores repellendus voluptate. Asperiores dolorem sint nesciunt quos.', 'images/products/whirlpool_mosogatogep.png', 171, 'Household', 'Whirlpool', 'Dishwasher', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(53, 'Electrolux Hűtőszekrény', 2799.99, 'Et distinctio dolorem consectetur aperiam ut et labore culpa. Illum illum quia consequuntur doloribus eum. Vitae quod sit magnam facere.', 'images/products/electrolux_hutoszekreny.png', 33, 'Household', 'Electrolux', 'Refrigerator', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(54, 'Samsung Side-by-Side Hűtő', 3499.99, 'Error ut at quia iure. Delectus ipsum laboriosam voluptatem corrupti consectetur ut dolor. Quaerat unde eligendi non omnis. In quidem quo non soluta.', 'images/products/samsung_side_by_side_huto.png', 129, 'Household', 'Samsung', 'Refrigerator', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(55, 'Bosch Beépíthető Sütő', 1299.99, 'Autem nulla quia debitis quia qui. Inventore aspernatur hic ullam tempore. Expedita necessitatibus quia at voluptatum delectus. Repudiandae illum maxime eius blanditiis cum.', 'images/products/bosch_beepitheto_suto.png', 39, 'Household', 'Bosch', 'Oven', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(56, 'Whirlpool Elektromos Sütő', 1099.99, 'Quas occaecati eligendi eligendi velit. Dicta maxime ut voluptas deserunt esse ut illum. Aspernatur dolor laudantium eaque ullam.', 'images/products/whirlpool_elektromos_suto.png', 105, 'Household', 'Whirlpool', 'Oven', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(57, 'Rowenta Porszívó', 699.99, 'Non autem esse aut atque aperiam. Cupiditate eos iste dolorem suscipit soluta rerum nihil. Omnis id enim saepe iusto ea.', 'images/products/rowenta_porszivo.png', 146, 'Household', 'Rowenta', 'VacuumCleaner', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(58, 'Dyson V11 porszívó', 2499.99, 'Recusandae esse enim temporibus perspiciatis officia porro cumque. Fugiat porro et officia dolorem consequatur. Aut rerum iste nemo autem tempora.', 'images/products/dyson_v11_porszivo.png', 188, 'Household', 'Dyson', 'VacuumCleaner', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(59, 'Sony WH-1000XM5', 1499.99, 'Quia qui expedita voluptatibus eius et qui. Excepturi rerum vel ab et temporibus quis sit nam.', 'images/products/sony_wh_1000xm5.png', 77, 'Audio', 'Sony', 'Headphone', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(60, 'AirPods Pro 2', 999.99, 'Explicabo et autem non aspernatur dolores. In facere consequatur nihil.', 'images/products/airpods_pro_2.png', 120, 'Audio', 'Apple', 'Earphone', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(61, 'Sony Extra Bass Headphones', 349.99, 'Nobis ipsam ab tempora est repellendus eos vero. Dolorum aperiam accusamus dicta molestiae et illo similique adipisci. Consectetur dolore doloribus odio porro cum dolor est.', 'images/products/sony_extra_bass_headphones.png', 175, 'Audio', 'Sony', 'Headphone', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(62, 'SteelSeries Arctis 7', 699.99, 'A nobis aut quas magnam est. Eum incidunt quia quia iusto voluptatem. Quo dolores impedit cupiditate veritatis. Doloribus sequi voluptatem autem voluptas atque.', 'images/products/steelseries_arctis_7.png', 2, 'Audio', 'SteelSeries', 'Headphone', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(63, 'Bose QuietComfort 45', 1299.99, 'Id quibusdam eligendi aliquam quibusdam. Quia voluptatem est ut in harum. Architecto vero quia ullam ut pariatur eum.', 'images/products/bose_quietcomfort_45.png', 98, 'Audio', 'Bose', 'Headphone', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(64, 'JBL Charge 5', 149.99, 'Neque voluptatum molestiae reprehenderit quam. Beatae adipisci adipisci corporis assumenda illum quasi.', 'images/products/jbl_charge_5.png', 43, 'Audio', 'JBL', 'Speaker', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(65, 'Logitech Z623', 699.99, 'Et quidem recusandae nobis sit. Consequatur autem repellendus soluta assumenda delectus rerum quod magni. Dolor optio necessitatibus ea voluptas nulla accusamus.', 'images/products/logitech_z623.png', 116, 'Audio', 'Logitech', 'Speaker', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(66, 'Sony SRS-XB43', 449.99, 'Aut et est aliquid natus. Quae et amet dicta odit inventore fugiat voluptas. Enim repellat aliquid voluptatem et dolor. Porro illo soluta beatae voluptatem quam quasi.', 'images/products/sony_srs_xb43.png', 110, 'Audio', 'Sony', 'Speaker', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(67, 'Bose SoundLink Revolve', 699.99, 'Ea omnis neque maxime aperiam ut nemo. Unde inventore explicabo rerum aut impedit. Doloribus est exercitationem animi animi. Libero non ab occaecati placeat ut veniam necessitatibus.', 'images/products/bose_soundlink_revolve.png', 196, 'Audio', 'Bose', 'Speaker', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(68, 'JBL Flip 6', 399.99, 'Omnis assumenda numquam voluptas. Sint vitae ullam nisi similique minima iste dignissimos nemo. Repellat perspiciatis reprehenderit est quidem omnis ipsum ab. Quae sed officia animi.', 'images/products/jbl_flip_6.png', 8, 'Audio', 'JBL', 'Speaker', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(69, 'Apple HomePod Mini', 599.99, 'Dolorem doloribus qui delectus maxime ea neque dolores. Tenetur modi libero ad quaerat cupiditate dicta omnis sit.', 'images/products/apple_homepod_mini.png', 176, 'Audio', 'Apple', 'Speaker', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL),
(70, 'Sony HT-G700 Soundbar', 1299.99, 'Ea nobis est quod necessitatibus est et laudantium. Harum magni qui soluta voluptates. Earum facere exercitationem ad voluptatem.', 'images/products/sony_ht_g700_soundbar.png', 189, 'Audio', 'Sony', 'Speaker', '2026-04-28 04:35:52', '2026-04-28 04:35:52', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- A tábla indexei `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- A tábla indexei `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

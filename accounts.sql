-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 06:03 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(36,2) NOT NULL,
  `date` date DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_number` double(36,2) NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_credit_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `previous_credit_balance`, `created_at`, `updated_at`) VALUES
(1, 'armashash', 'kawishsheikh106@gmail.com', '03332477512', 'dasdqwdq', '123', '2021-03-17 07:02:39', '2021-03-17 07:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `equity`
--

CREATE TABLE `equity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(36,2) NOT NULL,
  `date` date DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(36,2) NOT NULL,
  `date` date DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gatein`
--

CREATE TABLE `gatein` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `invoice_number` double(36,2) NOT NULL,
  `supplier_id` double(8,2) NOT NULL,
  `quantity` double(36,2) NOT NULL,
  `rate` double(36,2) NOT NULL,
  `total` double(36,2) NOT NULL,
  `item_information` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gatein`
--

INSERT INTO `gatein` (`id`, `purchase_id`, `name`, `details`, `date`, `invoice_number`, `supplier_id`, `quantity`, `rate`, `total`, `item_information`, `created_at`, `updated_at`) VALUES
(3, 1, 'Product - 1', 'dawqdqw', '2021-03-19', 1234577.00, 1.00, 1.00, 22.00, 22.00, 'a', '2021-03-17 09:43:46', NULL),
(4, 1, 'Product - 1', 'dawqdqw', '2021-03-19', 1234577.00, 1.00, 1.00, 22.00, 22.00, 'a', '2021-03-17 09:44:18', NULL),
(5, 1, 'Product - 1', 'dawqdqw', '2021-03-19', 1234577.00, 1.00, 1.00, 22.00, 22.00, 'a', '2021-03-17 10:47:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gateout`
--

CREATE TABLE `gateout` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `total` double(8,2) NOT NULL,
  `rate` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `date` date NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` double(8,2) NOT NULL,
  `product_id` double(8,2) NOT NULL,
  `tax_id` double(8,2) NOT NULL,
  `unit_id` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(36,2) NOT NULL,
  `date` date DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `liabilities`
--

CREATE TABLE `liabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(36,2) NOT NULL,
  `date` date DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'armashash', '2021-03-17 10:05:38', '2021-03-17 10:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `product_id`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"backblue.gif\"]', '2021-03-17 10:05:58', '2021-03-17 10:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_11_114215_create_permission_tables', 1),
(5, '2021_02_14_092321_create_categories_table', 1),
(6, '2021_02_15_085316_create_assets_table', 1),
(7, '2021_02_16_121954_create_main_categories_table', 1),
(8, '2021_02_16_132539_create_suppliers_table', 1),
(9, '2021_02_16_163708_create_taxes_table', 1),
(10, '2021_02_17_140526_create_units_table', 1),
(11, '2021_02_17_143459_create_products_table', 1),
(12, '2021_02_17_144724_create_media_table', 1),
(13, '2021_02_19_130344_create_purchases_table', 1),
(14, '2021_02_24_143722_create_customers_table', 1),
(15, '2021_03_02_140948_create_banks_table', 1),
(16, '2021_03_02_153904_create_transactions_table', 1),
(17, '2021_03_08_130221_create_sales_table', 1),
(18, '2021_03_15_123438_create_gatein_table', 1),
(19, '2021_03_15_123513_create_gateout_table', 1),
(20, '2021_03_16_161233_create_returns_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'main-category-edit', 'web', '2021-03-17 07:01:00', '2021-03-17 07:01:00'),
(2, 'main-category-delete', 'web', '2021-03-17 07:01:00', '2021-03-17 07:01:00'),
(3, 'main-category-show', 'web', '2021-03-17 07:01:00', '2021-03-17 07:01:00'),
(4, 'main-category-create', 'web', '2021-03-17 07:01:00', '2021-03-17 07:01:00'),
(5, 'category-edit', 'web', '2021-03-17 07:01:00', '2021-03-17 07:01:00'),
(6, 'category-delete', 'web', '2021-03-17 07:01:00', '2021-03-17 07:01:00'),
(7, 'category-show', 'web', '2021-03-17 07:01:00', '2021-03-17 07:01:00'),
(8, 'category-create', 'web', '2021-03-17 07:01:00', '2021-03-17 07:01:00'),
(9, 'asset-create', 'web', '2021-03-17 07:01:00', '2021-03-17 07:01:00'),
(10, 'asset-show', 'web', '2021-03-17 07:01:00', '2021-03-17 07:01:00'),
(11, 'asset-delete', 'web', '2021-03-17 07:01:00', '2021-03-17 07:01:00'),
(12, 'asset-edit', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(13, 'liability-show', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(14, 'liability-delete', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(15, 'liability-edit', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(16, 'liability-create', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(17, 'equity-show', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(18, 'equity-delete', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(19, 'equity-edit', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(20, 'equity-create', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(21, 'income-create', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(22, 'income-delete', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(23, 'income-edit', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(24, 'income-show', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(25, 'expense-show', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(26, 'expense-delete', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(27, 'expense-edit', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(28, 'expense-create', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(29, 'supplier-show', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(30, 'supplier-delete', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(31, 'supplier-edit', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(32, 'supplier-create', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(33, 'ledger-show', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(34, 'ledger-delete', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(35, 'ledger-edit', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(36, 'ledger-create', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(37, 'tax-show', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(38, 'tax-delete', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(39, 'tax-edit', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(40, 'tax-create', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(41, 'product-show', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(42, 'product-delete', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(43, 'product-edit', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(44, 'product-create', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(45, 'unit-show', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(46, 'unit-delete', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(47, 'unit-edit', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(48, 'unit-create', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(49, 'purchases-show', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(50, 'purchases-delete', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(51, 'purchases-edit', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(52, 'purchases-create', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(53, 'customer-show', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(54, 'customer-delete', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(55, 'customer-edit', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(56, 'customer-create', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(57, 'bank-create', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(58, 'bank-edit', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(59, 'bank-delete', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(60, 'bank-show', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(61, 'return-create', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(62, 'return-edit', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(63, 'return-delete', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(64, 'return-show', 'web', '2021-03-17 07:01:01', '2021-03-17 07:01:01'),
(65, 'transaction-create', 'web', '2021-03-17 07:01:02', '2021-03-17 07:01:02'),
(66, 'transaction-edit', 'web', '2021-03-17 07:01:02', '2021-03-17 07:01:02'),
(67, 'transaction-delete', 'web', '2021-03-17 07:01:02', '2021-03-17 07:01:02'),
(68, 'sale-show', 'web', '2021-03-17 07:01:02', '2021-03-17 07:01:02'),
(69, 'sale-create', 'web', '2021-03-17 07:01:02', '2021-03-17 07:01:02'),
(70, 'sale-edit', 'web', '2021-03-17 07:01:02', '2021-03-17 07:01:02'),
(71, 'sale-delete', 'web', '2021-03-17 07:01:02', '2021-03-17 07:01:02'),
(72, 'view', 'web', '2021-03-17 07:01:02', '2021-03-17 07:01:02'),
(73, 'edit', 'web', '2021-03-17 07:01:02', '2021-03-17 07:01:02'),
(74, 'delete', 'web', '2021-03-17 07:01:02', '2021-03-17 07:01:02'),
(75, 'show', 'web', '2021-03-17 07:01:02', '2021-03-17 07:01:02'),
(76, 'create', 'web', '2021-03-17 07:01:02', '2021-03-17 07:01:02'),
(77, 'check', 'web', '2021-03-17 07:01:02', '2021-03-17 07:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` double(36,2) NOT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_price` double(36,2) NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `guid`, `model`, `sale_price`, `serial_number`, `tax_id`, `category_id`, `supplier_id`, `supplier_price`, `details`, `created_at`, `updated_at`) VALUES
(1, 'armashash', '894111f4-e41d-453f-b66b-66b92c9ab537', '21', 41.00, '123', 1, 1, 1, 31.00, '41', '2021-03-17 10:05:58', '2021-03-17 10:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `invoice_number` double(36,2) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` double(36,2) NOT NULL,
  `rate` double(36,2) NOT NULL,
  `total` double(36,2) NOT NULL,
  `item_information` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `name`, `details`, `purchase_date`, `invoice_number`, `code`, `supplier_id`, `quantity`, `rate`, `total`, `item_information`, `created_at`, `updated_at`) VALUES
(1, 'Product - 1', 'dawqdqw', '2021-03-19', 1234577.00, 'PR-S7cv5Zn', 1, 1.00, 22.00, 22.00, 'aaasss', '2021-03-17 07:04:21', '2021-03-17 07:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_number` bigint(20) NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `total` double(36,2) NOT NULL,
  `quantity` double(36,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2021-03-17 07:01:02', '2021-03-17 07:01:02'),
(2, 'admin', 'web', '2021-03-17 07:01:02', '2021-03-17 07:01:02'),
(3, 'super-admin', 'web', '2021-03-17 07:01:02', '2021-03-17 07:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(56, 3),
(57, 3),
(58, 3),
(59, 3),
(60, 3),
(61, 3),
(62, 3),
(63, 3),
(64, 3),
(65, 3),
(66, 3),
(67, 3),
(68, 3),
(69, 3),
(70, 3),
(71, 3),
(72, 3),
(73, 2),
(73, 3),
(74, 2),
(74, 3),
(75, 1),
(75, 2),
(75, 3),
(76, 2),
(76, 3),
(77, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` double(8,2) NOT NULL,
  `rate` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `date` date NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `tax_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `total`, `rate`, `discount`, `quantity`, `date`, `code`, `details`, `customer_id`, `product_id`, `tax_id`, `unit_id`, `created_at`, `updated_at`) VALUES
(7, 577.00, 41.00, 15.00, 21.00, '2021-03-03', 'SL-Ew9hvXF', 'bvkjsbavkjndsanvlkjdshglkfdmnbvkjfdbhlkfdblkmlk', 1, 1, 1, 2, '2021-03-17 11:59:08', '2021-03-17 11:59:08'),
(8, 271.00, 41.00, 21.00, 12.00, '2021-03-03', 'SL-jKmiR6r', 'bvkjsbavkjndsanvlkjdshglkfdmnbvkjfdbhlkfdblkmlk', 1, 1, 1, 2, '2021-03-17 11:59:08', '2021-03-17 11:59:08'),
(9, 31.00, 41.00, 41.00, 21.00, '2021-03-03', 'SL-nFFDvoI', 'bvkjsbavkjndsanvlkjdshglkfdmnbvkjfdbhlkfdblkmlk', 1, 1, 1, 2, '2021-03-17 12:01:12', '2021-03-17 12:01:12'),
(10, 460.00, 41.00, 22.00, 11.00, '2021-03-11', 'SL-S9o6t0f', 'bvkjsbavkjndsanvlkjdshglkfdmnbvkjfdbhlkfdblkmlk', 1, 1, 1, 2, '2021-03-17 12:02:33', '2021-03-17 12:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_credit_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `guid`, `name`, `phone`, `address`, `details`, `previous_credit_balance`, `created_at`, `updated_at`) VALUES
(1, '11adade3-9550-4ac3-b9da-200a6846526a', 'armashash', '03332477512', 'ads@ads', 'qdqsqdq', '123', '2021-03-17 07:02:56', '2021-03-17 07:02:56'),
(2, '8b5c0a4f-278f-42fd-8ea2-d96b516fff0b', 'armashash', '03332477512', 'ads@ads', 'qdqsqdq', '123', '2021-03-17 07:02:57', '2021-03-17 07:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` double(36,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `name`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 'asd', 31.00, '2021-03-17 10:04:56', '2021-03-17 10:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ac_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'assets'),
(2, 'liabilities'),
(3, 'income'),
(4, 'expense'),
(5, 'equity'),
(6, 'products'),
(7, 'sales');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 'asd', 1, '2021-03-17 10:05:09', '2021-03-17 10:05:09'),
(2, '41', 7, '2021-03-17 10:05:15', '2021-03-17 10:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_auth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `o_auth`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'test@example.com', NULL, '$2y$10$NpIwr1he5ig7I5O.JeWh1eTu7TD52RLDvFJgBUJKNKV15iIixaX2W', 'secret', NULL, '2021-03-17 07:01:02', '2021-03-17 07:01:02'),
(2, 'admin', 'admin@example.com', NULL, '$2y$10$.Br51BUAkaFzMcktZUwyFevAKCJHxhI6w.MgOhGnZ2S/shB62zLOi', 'secret', NULL, '2021-03-17 07:01:02', '2021-03-17 07:01:02'),
(3, 'superadmin', 'superadmin@example.com', NULL, '$2y$10$ypbSfjVqfLgayUYuQHrFKek4FhhXCSqGe1c9R2..skhJNqBEzX1a6', 'secret', NULL, '2021-03-17 07:01:02', '2021-03-17 07:01:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assets_category_id_foreign` (`category_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_type_id_foreign` (`type_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equity`
--
ALTER TABLE `equity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equity_category_id_foreign` (`category_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gatein`
--
ALTER TABLE `gatein`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gatein_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `gateout`
--
ALTER TABLE `gateout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gateout_sale_id_foreign` (`sale_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `income_category_id_foreign` (`category_id`);

--
-- Indexes for table `liabilities`
--
ALTER TABLE `liabilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `liabilities_category_id_foreign` (`category_id`);

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_tax_id_foreign` (`tax_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `returns_sale_id_foreign` (`sale_id`),
  ADD KEY `returns_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_tax_id_foreign` (`tax_id`),
  ADD KEY `sales_unit_id_foreign` (`unit_id`),
  ADD KEY `sales_product_id_foreign` (`product_id`),
  ADD KEY `sales_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_bank_id_foreign` (`bank_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `units_type_id_foreign` (`type_id`);

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
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `equity`
--
ALTER TABLE `equity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gatein`
--
ALTER TABLE `gatein`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gateout`
--
ALTER TABLE `gateout`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `liabilities`
--
ALTER TABLE `liabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equity`
--
ALTER TABLE `equity`
  ADD CONSTRAINT `equity_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gatein`
--
ALTER TABLE `gatein`
  ADD CONSTRAINT `gatein_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gateout`
--
ALTER TABLE `gateout`
  ADD CONSTRAINT `gateout_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `liabilities`
--
ALTER TABLE `liabilities`
  ADD CONSTRAINT `liabilities_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `main_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `returns`
--
ALTER TABLE `returns`
  ADD CONSTRAINT `returns_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `returns_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

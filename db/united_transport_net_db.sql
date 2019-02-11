-- phpMyAdmin SQL Dump
<<<<<<< HEAD
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 11:10 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36
=======
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2019 at 09:37 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12
>>>>>>> master

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `united_transport_net_db`
--

-- --------------------------------------------------------

--
<<<<<<< HEAD
=======
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) UNSIGNED NOT NULL,
  `Add_Bank` varchar(250) DEFAULT NULL,
  `Bank_Description` text,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `Add_Bank`, `Bank_Description`, `amount`, `user_id`, `created_at`) VALUES
(41, 'Shakeel Bhai', 'Owner expense account', 2853415, 2, '2019-01-07 19:33:33'),
(42, 'Iftikhar Bhai', 'Expense Account', 0, 2, '2018-11-28 12:20:31'),
(43, 'Wali Bhai', 'Owner Account', 500000, 2, '2018-11-28 13:12:10');

-- --------------------------------------------------------

--
>>>>>>> master
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `First_Name` varchar(250) DEFAULT NULL,
  `Last_Name` varchar(250) DEFAULT NULL,
<<<<<<< HEAD
=======
  `sales_person` int(11) NOT NULL,
  `sp_commission` varchar(250) DEFAULT NULL,
>>>>>>> master
  `Phone_Number` varchar(250) DEFAULT NULL,
  `Address` tinytext,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

<<<<<<< HEAD
=======
--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `First_Name`, `Last_Name`, `sales_person`, `sp_commission`, `Phone_Number`, `Address`, `user_id`, `created_at`) VALUES
(2, 'Muhammad Mateen', 'Azghar', 3, '30', '033300300', 'lee market', 2, '2019-01-07 13:14:47'),
(5, 'Umer Bhai', '----', 3, '20', '0333566996', 'Karachi Pakistan', 2, '2019-01-07 13:23:31');

>>>>>>> master
-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) UNSIGNED NOT NULL,
  `First_Name` varchar(250) DEFAULT NULL,
  `Middle_Name` tinytext,
  `Last_Name` varchar(250) DEFAULT NULL,
  `Address` tinytext,
  `Email_Address` varchar(252) DEFAULT NULL,
  `Phone_Number` varchar(256) DEFAULT NULL,
  `Employee_ID` int(11) DEFAULT NULL,
  `Contract_Number` varchar(252) DEFAULT NULL,
  `License_Number` varchar(250) DEFAULT NULL,
  `Issue_Date` varchar(250) DEFAULT NULL,
  `Expiration_Date` varchar(250) DEFAULT NULL,
  `Join_Date` varchar(250) DEFAULT NULL,
  `Leave_Date` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `Emergency_Contact_Details` varchar(250) DEFAULT NULL,
  `Gender` varchar(251) DEFAULT NULL,
  `driver_image` varchar(250) DEFAULT NULL,
  `documents` varchar(250) DEFAULT NULL,
  `license_image` varchar(250) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

<<<<<<< HEAD
=======
--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `First_Name`, `Middle_Name`, `Last_Name`, `Address`, `Email_Address`, `Phone_Number`, `Employee_ID`, `Contract_Number`, `License_Number`, `Issue_Date`, `Expiration_Date`, `Join_Date`, `Leave_Date`, `Password`, `Emergency_Contact_Details`, `Gender`, `driver_image`, `documents`, `license_image`, `user_id`, `created_at`) VALUES
(1, 'Asim', 'Asim', 'Asim', 'Asim', 'Asim@gmail.com', '465465', 0, '5665465', '654654', '64654', '65645', '6465', '', '546546565', '6446565654', 'male', NULL, NULL, NULL, 2, '2019-01-07 10:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) UNSIGNED NOT NULL,
  `Select_Bank` varchar(255) DEFAULT NULL,
  `Bank_Amount` varchar(255) DEFAULT NULL,
  `Expense_Title` varchar(255) DEFAULT NULL,
  `Expense_Description` text,
  `Expense_Amount` int(11) DEFAULT NULL,
  `Expense_Voucher` varchar(250) NOT NULL,
  `Date_Of_Submission` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `Select_Bank`, `Bank_Amount`, `Expense_Title`, `Expense_Description`, `Expense_Amount`, `Expense_Voucher`, `Date_Of_Submission`, `user_id`, `created_at`) VALUES
(1, '41', 'Select Bank Amount', 'lunch with drink', 'lunch drink', 2000, 'UBWS-EXP-001', '2019-01-01', 2, '2019-01-07 19:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `expense_detail`
--

CREATE TABLE `expense_detail` (
  `exp_detail_id` int(11) NOT NULL,
  `exp_id` int(11) NOT NULL,
  `expense_title` varchar(250) NOT NULL,
  `expense_amount` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_detail`
--

INSERT INTO `expense_detail` (`exp_detail_id`, `exp_id`, `expense_title`, `expense_amount`) VALUES
(1, 1, 'eating', '1000'),
(2, 1, 'fuel', '1000');

>>>>>>> master
-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `main_name` varchar(100) NOT NULL,
  `sort` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `main_name`, `sort`, `icon`, `url`, `user_id`) VALUES
(2, 'Dashboard', 'dashboard', 1, 'home', 'home', 4),
(3, 'Modules', 'modules', 4, 'home', 'modules', 4),
(5, 'Role/Permission', 'role', 2, 'home', 'role', 4),
(7, 'Users', 'user', 3, 'home', 'users', 2),
(22, 'Drivers', 'Drivers', 1, 'home', 'drivers', 2),
(23, 'Customer', 'Customer', 2, 'home', 'customer', 2),
(24, 'Vehicle', 'Vehicle', 3, 'home', 'vehicle', 2),
<<<<<<< HEAD
(25, 'Sales person', 'Sales person', 5, 'home', 'sales_person', 2);
=======
(25, 'Sales person', 'Sales person', 5, 'home', 'sales_person', 2),
(36, 'Orders', 'Orders', 6, 'home', 'orders', 2),
(38, 'Vehicel_fuel', 'Vehicel_fuel', 6, 'home', 'Vehicel_fuel', 2),
(40, 'Expense', 'expense', 5, 'local_atm', 'expense', 2);
>>>>>>> master

-- --------------------------------------------------------

--
-- Table structure for table `modules_fileds`
--

CREATE TABLE `modules_fileds` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `filed_type` varchar(100) NOT NULL,
  `options` varchar(255) NOT NULL,
  `length` int(11) NOT NULL,
  `required` int(11) NOT NULL DEFAULT '0',
  `module_id` int(11) NOT NULL,
  `is_relation` int(11) NOT NULL,
  `relation_column` varchar(100) DEFAULT NULL,
  `relation_table` varchar(100) DEFAULT NULL,
  `value_column` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules_fileds`
--

INSERT INTO `modules_fileds` (`id`, `name`, `type`, `filed_type`, `options`, `length`, `required`, `module_id`, `is_relation`, `relation_column`, `relation_table`, `value_column`) VALUES
(1, 'name', 'VARCHAR', 'input', '', 100, 1, 15, 0, NULL, NULL, NULL),
(2, 'gender', 'VARCHAR', 'radio', 'male,female', 100, 1, 15, 0, NULL, NULL, NULL),
(3, 'relationship_status', 'VARCHAR', 'select', 'single,married,divorced,widowed', 100, 1, 15, 0, NULL, NULL, NULL),
(4, 'image', 'VARCHAR', 'file', 'jpg,png,jpeg,gif', 100, 1, 15, 0, NULL, NULL, NULL),
(5, 'education', 'VARCHAR', 'checkbox', 'matric,inter,bachlor', 255, 1, 15, 0, NULL, NULL, NULL),
(6, 'message', 'TEXT', 'textarea', '', 255, 1, 15, 0, NULL, NULL, NULL),
(7, 'Name', 'VARCHAR', 'input', '', 100, 1, 16, 0, NULL, NULL, NULL),
(8, 'Icon', 'VARCHAR', 'file', 'png,jpg,jpeg,gif', 255, 1, 16, 0, NULL, NULL, NULL),
(9, 'Name', 'VARCHAR', 'input', '', 100, 1, 17, 0, NULL, NULL, NULL),
(10, 'Icon', 'VARCHAR', 'file', 'png,jpg,jpeg,gif', 255, 1, 17, 0, NULL, NULL, NULL),
(11, 'Title', 'VARCHAR', 'input', '', 255, 1, 18, 0, NULL, NULL, NULL),
(12, 'Description', 'TEXT', 'textarea', '', 500, 1, 18, 0, NULL, NULL, NULL),
(13, 'category', 'INT', 'input', '', 11, 1, 18, 1, 'id', 'blog_category', 'Name'),
(14, 'image', 'VARCHAR', 'file', 'png,jpg,jpeg,gif', 255, 1, 18, 0, NULL, NULL, NULL),
(15, 'first_name', 'VARCHAR', 'input', '', 250, 0, 19, 0, NULL, NULL, NULL),
(16, 'Middle_Name', 'VARCHAR', 'input', '', 250, 0, 19, 0, NULL, NULL, NULL),
(17, 'Middle_Name', 'VARCHAR', 'input', '', 250, 0, 19, 0, NULL, NULL, NULL),
(18, 'Last_Name', 'VARCHAR', 'input', '', 245, 0, 19, 0, NULL, NULL, NULL),
(19, 'Phone_Number', 'VARCHAR', 'input', '', 250, 0, 19, 0, NULL, NULL, NULL),
(20, 'Employee_ID', 'INT', 'input', '', 250, 0, 19, 0, NULL, NULL, NULL),
(21, 'Contract_Number', 'VARCHAR', 'input', '', 250, 0, 19, 0, NULL, NULL, NULL),
(22, 'License_Number', 'VARCHAR', 'input', '', 262, 0, 19, 0, NULL, NULL, NULL),
(23, 'Issue_Date', 'VARCHAR', 'input', '', 250, 0, 19, 0, NULL, NULL, NULL),
(24, 'Expiration_Date', 'VARCHAR', 'input', '', 250, 0, 19, 0, NULL, NULL, NULL),
(25, 'Join_Date', 'VARCHAR', 'input', '', 250, 0, 19, 0, NULL, NULL, NULL),
(26, 'Leave_Date', 'VARCHAR', 'input', '', 250, 0, 19, 0, NULL, NULL, NULL),
(27, 'Password', 'VARCHAR', 'input', '', 250, 0, 19, 0, NULL, NULL, NULL),
(28, 'Gender', 'VARCHAR', 'input', '', 50, 0, 19, 0, NULL, NULL, NULL),
(29, 'Driver_image', 'VARCHAR', 'input', '', 250, 0, 19, 0, NULL, NULL, NULL),
(30, 'documents', 'VARCHAR', 'input', '', 250, 0, 19, 0, NULL, NULL, NULL),
(31, 'license_image', 'VARCHAR', 'textarea', '', 249, 0, 19, 0, NULL, NULL, NULL),
(32, 'first_name', 'VARCHAR', 'input', '', 250, 0, 19, 0, NULL, NULL, NULL),
(33, 'first_name', 'VARCHAR', 'input', '', 250, 0, 19, 0, NULL, NULL, NULL),
(34, 'first_name', 'INT', 'input', '', 50, 0, 21, 0, NULL, NULL, NULL),
(35, 'First_Name', 'VARCHAR', 'input', '', 250, 0, 22, 0, NULL, NULL, NULL),
(36, 'Middle_Name', 'TEXT', 'input', '', 254, 0, 22, 0, NULL, NULL, NULL),
(37, 'Last_Name', 'VARCHAR', 'input', '', 250, 0, 22, 0, NULL, NULL, NULL),
(38, 'Address', 'TEXT', 'textarea', '', 253, 0, 22, 0, NULL, NULL, NULL),
(39, 'Email_Address', 'VARCHAR', 'input', '', 252, 0, 22, 0, NULL, NULL, NULL),
(40, 'Phone_Number', 'VARCHAR', 'input', '', 256, 0, 22, 0, NULL, NULL, NULL),
(41, 'Employee_ID', 'INT', 'input', '', 11, 0, 22, 0, NULL, NULL, NULL),
(42, 'Contract_Number', 'VARCHAR', 'input', '', 252, 0, 22, 0, NULL, NULL, NULL),
(43, 'License_Number', 'VARCHAR', 'input', '', 250, 0, 22, 0, NULL, NULL, NULL),
(44, 'Issue_Date', 'VARCHAR', 'input', '', 250, 0, 22, 0, NULL, NULL, NULL),
(45, 'Expiration_Date', 'VARCHAR', 'input', '', 250, 0, 22, 0, NULL, NULL, NULL),
(46, 'Join_Date', 'VARCHAR', 'input', '', 250, 0, 22, 0, NULL, NULL, NULL),
(47, 'Leave_Date', 'VARCHAR', 'input', '', 250, 0, 22, 0, NULL, NULL, NULL),
(48, 'Password', 'VARCHAR', 'input', '', 250, 0, 22, 0, NULL, NULL, NULL),
(49, 'Emergency_Contact_Details', 'VARCHAR', 'textarea', '', 250, 0, 22, 0, NULL, NULL, NULL),
(50, 'Gender', 'VARCHAR', 'input', '', 251, 0, 22, 0, NULL, NULL, NULL),
(51, 'driver_image', 'VARCHAR', 'file', ',', 250, 0, 22, 0, NULL, NULL, NULL),
(52, 'documents', 'VARCHAR', 'file', ',', 250, 0, 22, 0, NULL, NULL, NULL),
(53, 'license_image', 'VARCHAR', 'file', ',', 250, 0, 22, 0, NULL, NULL, NULL),
(54, 'First_Name', 'VARCHAR', 'input', '', 250, 0, 23, 0, NULL, NULL, NULL),
(55, 'Last_Name', 'VARCHAR', 'input', '', 250, 0, 23, 0, NULL, NULL, NULL),
(56, 'Phone_Number', 'VARCHAR', 'input', '', 250, 0, 23, 0, NULL, NULL, NULL),
(57, 'Address', 'TEXT', 'textarea', '', 250, 0, 23, 0, NULL, NULL, NULL),
(58, 'First_Name', 'VARCHAR', 'input', '', 250, 0, 23, 0, NULL, NULL, NULL),
(59, 'Last_Name', 'VARCHAR', 'input', '', 250, 0, 23, 0, NULL, NULL, NULL),
(60, 'Phone_Number', 'VARCHAR', 'input', '', 250, 0, 23, 0, NULL, NULL, NULL),
(61, 'Address', 'TEXT', 'textarea', '', 250, 0, 23, 0, NULL, NULL, NULL),
(62, 'vehicle_maker', 'VARCHAR', 'input', '', 250, 0, 24, 0, NULL, NULL, NULL),
(63, 'vehicle_engine_type', 'VARCHAR', 'input', '', 250, 0, 24, 0, NULL, NULL, NULL),
(64, 'vehicle_model', 'VARCHAR', 'input', '', 250, 0, 24, 0, NULL, NULL, NULL),
(65, 'vehicle_type', 'VARCHAR', 'input', '', 260, 0, 24, 0, NULL, NULL, NULL),
(66, 'Color', 'VARCHAR', 'input', '', 250, 0, 24, 0, NULL, NULL, NULL),
(67, 'vehicle_year', 'VARCHAR', 'input', '', 250, 0, 24, 0, NULL, NULL, NULL),
(68, 'vin', 'VARCHAR', 'input', '', 250, 0, 24, 0, NULL, NULL, NULL),
(69, 'initial_mileage', 'VARCHAR', 'input', '', 250, 0, 24, 0, NULL, NULL, NULL),
(70, 'license_plate', 'VARCHAR', 'input', '', 250, 0, 24, 0, NULL, NULL, NULL),
(71, 'vehicle_image', 'VARCHAR', 'input', '', 250, 0, 24, 0, NULL, NULL, NULL),
(72, 'licence_expiry_date', 'VARCHAR', 'input', '', 250, 0, 24, 0, NULL, NULL, NULL),
(73, 'registration_expiry_date', 'VARCHAR', 'input', '', 250, 0, 24, 0, NULL, NULL, NULL),
(74, 'vehicle_group_id', 'INT', 'input', '', 11, 0, 24, 0, NULL, NULL, NULL),
(75, 'vehicle_status', 'INT', 'input', '', 11, 0, 24, 0, NULL, NULL, NULL),
(76, 'sp_name', 'VARCHAR', 'input', '', 250, 0, 25, 0, NULL, NULL, NULL),
(77, 'sp_email_', 'VARCHAR', 'input', '', 250, 0, 25, 0, NULL, NULL, NULL),
(78, 'sp_address', 'VARCHAR', 'input', '', 249, 0, 25, 0, NULL, NULL, NULL),
(79, 'sp_contact_num', 'VARCHAR', 'input', '', 253, 0, 25, 0, NULL, NULL, NULL),
<<<<<<< HEAD
(80, 'sp_create_date', 'VARCHAR', 'input', '', 250, 0, 25, 0, NULL, NULL, NULL);
=======
(80, 'sp_create_date', 'VARCHAR', 'input', '', 250, 0, 25, 0, NULL, NULL, NULL),
(81, 'order_customer', 'VARCHAR', 'input', '', 250, 0, 26, 0, NULL, NULL, NULL),
(82, 'pickup_date_and_time', 'VARCHAR', 'input', '', 250, 0, 26, 0, NULL, NULL, NULL),
(83, 'dropoff_date_and_time', 'VARCHAR', 'input', '', 250, 0, 26, 0, NULL, NULL, NULL),
(84, 'order_vehicle', 'VARCHAR', 'input', '', 250, 0, 26, 0, NULL, NULL, NULL),
(85, 'order_driver', 'VARCHAR', 'input', '', 250, 0, 26, 0, NULL, NULL, NULL),
(86, 'No_of_travellers', 'VARCHAR', 'input', '', 250, 0, 26, 0, NULL, NULL, NULL),
(87, 'order_pickup_address', 'VARCHAR', 'input', '', 250, 0, 26, 0, NULL, NULL, NULL),
(88, 'order_drop_off_address', 'VARCHAR', 'input', '', 250, 0, 26, 0, NULL, NULL, NULL),
(89, 'note', 'TEXT', 'textarea', '', 250, 0, 26, 0, NULL, NULL, NULL),
(90, 'order_total', 'VARCHAR', 'input', '', 250, 0, 26, 0, NULL, NULL, NULL),
(91, 'order_customer', 'VARCHAR', 'input', '', 250, 0, 27, 0, NULL, NULL, NULL),
(92, 'pickup_date_&_time', 'VARCHAR', 'input', '', 250, 0, 27, 0, NULL, NULL, NULL),
(93, 'dropoff_date_&_time', 'VARCHAR', 'input', '', 250, 0, 27, 0, NULL, NULL, NULL),
(94, 'order_vehicle', 'VARCHAR', 'input', '', 250, 0, 27, 0, NULL, NULL, NULL),
(95, 'no._of_travellers_', 'VARCHAR', 'input', '', 250, 0, 27, 0, NULL, NULL, NULL),
(96, 'order_pickup_address', 'VARCHAR', 'textarea', '', 250, 0, 27, 0, NULL, NULL, NULL),
(97, 'order_drop_off__address', 'VARCHAR', 'textarea', '', 250, 0, 27, 0, NULL, NULL, NULL),
(98, 'Note', 'VARCHAR', 'textarea', '', 250, 0, 27, 0, NULL, NULL, NULL),
(99, 'order_total_amount', 'VARCHAR', 'input', '', 250, 0, 27, 0, NULL, NULL, NULL),
(100, 'order_customer', 'VARCHAR', 'input', '', 250, 0, 27, 0, NULL, NULL, NULL),
(101, 'create_date', 'VARCHAR', 'input', '', 250, 0, 28, 0, NULL, NULL, NULL),
(102, 'order_customer', 'VARCHAR', 'input', '', 250, 0, 29, 0, NULL, NULL, NULL),
(103, 'order_customer', 'VARCHAR', 'input', '', 250, 0, 29, 0, NULL, NULL, NULL),
(104, 'order_customer', 'VARCHAR', 'input', '', 250, 0, 30, 0, NULL, NULL, NULL),
(105, 'order_customer', 'VARCHAR', 'input', '', 250, 0, 31, 0, NULL, NULL, NULL),
(106, 'pickup_date_&_time', 'VARCHAR', 'input', '', 250, 0, 31, 0, NULL, NULL, NULL),
(107, 'dropoff_date_&_time', 'VARCHAR', 'input', '', 250, 0, 31, 0, NULL, NULL, NULL),
(108, 'order_vehicle', 'VARCHAR', 'input', '', 250, 0, 31, 0, NULL, NULL, NULL),
(109, 'order_driver', 'VARCHAR', 'input', '', 250, 0, 31, 0, NULL, NULL, NULL),
(110, 'no_of_travel', 'VARCHAR', 'input', '', 250, 0, 31, 0, NULL, NULL, NULL),
(111, 'pickup_address', 'VARCHAR', 'textarea', '', 250, 0, 31, 0, NULL, NULL, NULL),
(112, 'dropoff_address', 'VARCHAR', 'textarea', '', 250, 0, 31, 0, NULL, NULL, NULL),
(113, 'order_customer', 'VARCHAR', 'input', '', 250, 0, 32, 0, NULL, NULL, NULL),
(114, 'order_customer', 'VARCHAR', 'input', '', 250, 0, 33, 0, NULL, NULL, NULL),
(115, 'order_customer', 'VARCHAR', 'input', '', 250, 0, 33, 0, NULL, NULL, NULL),
(116, 'order_customer', 'VARCHAR', 'input', '', 250, 0, 34, 0, NULL, NULL, NULL),
(117, 'order_customer', 'VARCHAR', 'input', '', 250, 0, 35, 0, NULL, NULL, NULL),
(118, 'pickup_date_and_time', 'VARCHAR', 'input', '', 250, 0, 36, 0, NULL, NULL, NULL),
(119, '_dropoff_date_and_time', 'VARCHAR', 'input', '', 250, 0, 36, 0, NULL, NULL, NULL),
(120, 'order_vehicle', 'VARCHAR', 'input', '', 250, 0, 36, 0, NULL, NULL, NULL),
(121, 'order_driver', 'VARCHAR', 'input', '', 250, 0, 36, 0, NULL, NULL, NULL),
(122, 'no_of_travel', 'VARCHAR', 'input', '', 250, 0, 36, 0, NULL, NULL, NULL),
(123, 'pickup_address', 'TEXT', 'textarea', '', 250, 0, 36, 0, NULL, NULL, NULL),
(124, 'drop_off_address', 'TEXT', 'textarea', '', 250, 0, 36, 0, NULL, NULL, NULL),
(125, 'pickup_location', 'VARCHAR', 'textarea', '', 250, 0, 36, 0, NULL, NULL, NULL),
(126, 'drop_off_location', 'TEXT', 'textarea', '', 250, 0, 36, 0, NULL, NULL, NULL),
(127, 'order_total_amount', 'VARCHAR', 'input', '', 250, 0, 36, 0, NULL, NULL, NULL),
(128, 'note', 'TEXT', 'textarea', '', 250, 0, 36, 0, NULL, NULL, NULL),
(129, 'vehicle_id', 'VARCHAR', 'input', '', 250, 0, 38, 0, NULL, NULL, NULL),
(130, 'fuel_tank', 'VARCHAR', 'input', '', 250, 0, 38, 0, NULL, NULL, NULL),
(131, 'start_meter', 'VARCHAR', 'input', '', 250, 0, 38, 0, NULL, NULL, NULL),
(132, 'province', 'VARCHAR', 'input', '', 250, 0, 38, 0, NULL, NULL, NULL),
(133, 'note', 'VARCHAR', 'textarea', '', 250, 0, 38, 0, NULL, NULL, NULL),
(134, 'qty', 'VARCHAR', 'input', '', 250, 0, 38, 0, NULL, NULL, NULL),
(135, 'cost_per_unit', 'VARCHAR', 'input', '', 250, 0, 38, 0, NULL, NULL, NULL),
(136, 'complete', 'VARCHAR', 'input', '', 250, 0, 38, 0, NULL, NULL, NULL),
(137, 'Bank_Amount', 'VARCHAR', 'input', '', 250, 0, 40, 0, NULL, NULL, NULL),
(138, 'chal_mary_bhai', 'VARCHAR', 'input', '', 250, 0, 41, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_customer` int(11) DEFAULT NULL,
  `sales_person_id` int(11) NOT NULL,
  `pickup_date_and_time` varchar(250) DEFAULT NULL,
  `dropoff_date_and_time` varchar(250) DEFAULT NULL,
  `order_vehicle` varchar(250) DEFAULT NULL,
  `order_driver` varchar(250) DEFAULT NULL,
  `no_of_travel` varchar(250) DEFAULT NULL,
  `pickup_address` tinytext,
  `drop_off_address` tinytext,
  `pickup_location` varchar(250) DEFAULT NULL,
  `drop_off_location` tinytext,
  `order_total_amount` varchar(250) DEFAULT NULL,
  `net_amount` varchar(250) DEFAULT NULL,
  `note` tinytext,
  `order_status` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_customer`, `sales_person_id`, `pickup_date_and_time`, `dropoff_date_and_time`, `order_vehicle`, `order_driver`, `no_of_travel`, `pickup_address`, `drop_off_address`, `pickup_location`, `drop_off_location`, `order_total_amount`, `net_amount`, `note`, `order_status`, `user_id`, `created_at`) VALUES
(10, 2, 3, '2019-01-01', '2019-02-07', '1', '1', 'yest', NULL, 'lahore lahore', 'karachi', 'lahore', '1000', '700', 'hello world', 'Complete', 2, '2019-01-07 13:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_expense`
--

CREATE TABLE `order_expense` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `expense_title` varchar(250) NOT NULL,
  `expense_date` varchar(250) NOT NULL,
  `expense_amount` varchar(250) NOT NULL,
  `expense_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> master

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `view_all` int(11) NOT NULL DEFAULT '0',
  `created` int(11) DEFAULT '0',
  `edit` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `disable` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `module_id`, `user_id`, `user_type_id`, `view`, `view_all`, `created`, `edit`, `deleted`, `disable`) VALUES
(28, 2, 2, 13, 1, 0, 0, 0, 0, 0),
(29, 3, 2, 13, 0, 1, 0, 1, 0, 0),
(30, 5, 2, 13, 0, 0, 1, 0, 0, 0),
(35, 2, 2, 14, 1, 0, 0, 0, 0, 0),
(36, 3, 2, 14, 0, 0, 0, 0, 0, 0),
(37, 5, 2, 14, 0, 0, 0, 0, 0, 0),
<<<<<<< HEAD
(221, 2, 2, 1, 1, 1, 1, 1, 1, 1),
(222, 3, 2, 1, 1, 1, 1, 1, 1, 1),
(223, 5, 2, 1, 1, 1, 1, 1, 1, 1),
(224, 7, 2, 1, 1, 1, 1, 1, 1, 1),
(225, 22, 2, 1, 1, 1, 1, 1, 1, 1),
(226, 23, 2, 1, 1, 1, 1, 1, 1, 1),
(227, 24, 2, 1, 0, 0, 0, 0, 0, 0),
(228, 25, 2, 1, 1, 1, 1, 1, 1, 1);
=======
(296, 2, 2, 1, 1, 1, 1, 1, 1, 1),
(297, 3, 2, 1, 1, 1, 1, 1, 1, 1),
(298, 5, 2, 1, 1, 1, 1, 1, 1, 1),
(299, 7, 2, 1, 1, 1, 1, 1, 1, 1),
(300, 22, 2, 1, 1, 1, 1, 1, 1, 1),
(301, 23, 2, 1, 1, 1, 1, 1, 1, 1),
(302, 24, 2, 1, 1, 1, 1, 1, 1, 1),
(303, 25, 2, 1, 1, 1, 1, 1, 1, 1),
(304, 36, 2, 1, 1, 1, 1, 1, 1, 1),
(305, 38, 2, 1, 1, 1, 1, 1, 1, 1),
(306, 40, 2, 1, 1, 1, 1, 1, 1, 1);
>>>>>>> master

-- --------------------------------------------------------

--
-- Table structure for table `sales_person`
--

CREATE TABLE `sales_person` (
  `id` int(11) UNSIGNED NOT NULL,
  `sp_name` varchar(250) DEFAULT NULL,
  `sp_email_` varchar(250) DEFAULT NULL,
  `sp_address` varchar(249) DEFAULT NULL,
  `sp_contact_num` varchar(253) DEFAULT NULL,
  `sp_create_date` varchar(250) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_person`
--

INSERT INTO `sales_person` (`id`, `sp_name`, `sp_email_`, `sp_address`, `sp_contact_num`, `sp_create_date`, `user_id`, `created_at`) VALUES
<<<<<<< HEAD
(1, 'Mr Ali ', 'ali@gmail.com', 'magma karachi ', '03332500000', '2019-01-01', 2, '2019-01-05 09:56:57'),
(2, 'Mr Yasir ', 'yasir@gmail.com', 'magma karachi ', '03000010010', '2019-01-02', 2, '2019-01-05 09:57:21'),
(3, 'Mr Talha Dev', 'Dev@gmail.com', 'garden karachi ', '03000010100', '2019-01-03', 2, '2019-01-05 09:57:53');
=======
(1, 'Mr Ali ', 'ali@gmail.com', 'magma karachi ', '03332500000', '2019-01-01', 2, '2019-01-05 19:05:46'),
(2, 'Mr Yasir ', 'yasir@gmail.com', 'magma karachi ', '03000010010', '2019-01-02', 2, '2019-01-05 19:05:49'),
(3, 'Mr Talha Dev', 'Dev@gmail.com', 'garden karachi ', '03000010100', '2019-01-03', 2, '2019-01-05 19:05:52'),
(4, 'Ramjee', 'ramjees@gmail.com', 'abdullah haroon', '099002002', '2019-01-06', 2, '2019-01-05 15:16:37');
>>>>>>> master

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `sliderID` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `File` varchar(250) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
<<<<<<< HEAD
=======
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `id` int(11) UNSIGNED NOT NULL,
  `create_date` varchar(250) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
>>>>>>> master
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
<<<<<<< HEAD
  `sales_person` varchar(250) DEFAULT NULL,
=======
>>>>>>> master
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

<<<<<<< HEAD
INSERT INTO `users` (`id`, `name`, `email`, `sales_person`, `password`, `role`) VALUES
(2, 'admin', 'admin@gmail.com', NULL, 'e6e061838856bf47e1de730719fb2609', 1),
(4, 'admin1', 'admin1@gmail.com', NULL, 'e6e061838856bf47e1de730719fb2609', 1),
(5, 'Udata', 'Udata@gmail.com', NULL, '5327b0d1bfa868acb9baac5a9d901815', 14),
(6, 'mob', 'admindd@gmail.com', NULL, '6cf0a3d27fdc438e4ee601448e452e48', 14),
(9, 'rtrt', 'adminsdee@milya.com', NULL, '532b7cbe070a3579f424988a040752f2', 14),
(10, 'musa', 'musa@gmail.com', NULL, 'c45d99e5638d1f9f801b545096003a8d', 14),
(12, 'rtrteree', 'adminsdeee11@milya.com', NULL, '0acf3d81f151df5994a88f039e636228', 14),
(13, 'musaeeee', 'mus22a@gmail.com', NULL, 'dbc4d84bfcfe2284ba11beffb853a8c4', 14),
(14, 'hero11', 'hero11@milya.com', NULL, '0acf3d81f151df5994a88f039e636228', 14),
(15, 'hero22', 'hero22@gmail.com', NULL, 'dbc4d84bfcfe2284ba11beffb853a8c4', 14),
(16, 'rest11', 'rest11@milya.com', NULL, '0acf3d81f151df5994a88f039e636228', 14),
(17, 'west22', 'hwest22@gmail.com', NULL, 'dbc4d84bfcfe2284ba11beffb853a8c4', 14),
(18, 'opp', 'opp@milya.com', NULL, 'e201220da86c13f4d9badaab658fa973', 14),
(19, 'urrr', 'urrr@gmail.com', NULL, '549ce24fb62238d013a6e222cb4d41d8', 14),
(20, 'DADU', 'DADU@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 14),
(21, 'AHSAN', 'AHSAN@gmail.com', NULL, 'd6a9a933c8aafc51e55ac0662b6e4d4a', 14),
(22, '21321', 'dasdas', NULL, 'd41d8cd98f00b204e9800998ecf8427e', 14),
(26, 'xyzmg', 'xyzmg@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 14),
(27, 'mojjojo1', 'mojjojo1@gmail.com', NULL, 'd41d8cd98f00b204e9800998ecf8427e', 14),
(28, 'akash jivraj', 'akashjivraj@gmail.com', '2', '253acb401ca5ef629fb17e520cfc64e6', 0);
=======
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(2, 'admin', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', 1),
(4, 'admin1', 'admin1@gmail.com', 'e6e061838856bf47e1de730719fb2609', 1),
(5, 'Udata', 'Udata@gmail.com', '5327b0d1bfa868acb9baac5a9d901815', 14),
(6, 'mob', 'admindd@gmail.com', '6cf0a3d27fdc438e4ee601448e452e48', 14),
(9, 'rtrt', 'adminsdee@milya.com', '532b7cbe070a3579f424988a040752f2', 14),
(10, 'musa', 'musa@gmail.com', 'c45d99e5638d1f9f801b545096003a8d', 14),
(12, 'rtrteree', 'adminsdeee11@milya.com', '0acf3d81f151df5994a88f039e636228', 14),
(13, 'musaeeee', 'mus22a@gmail.com', 'dbc4d84bfcfe2284ba11beffb853a8c4', 14),
(14, 'hero11', 'hero11@milya.com', '0acf3d81f151df5994a88f039e636228', 14),
(15, 'hero22', 'hero22@gmail.com', 'dbc4d84bfcfe2284ba11beffb853a8c4', 14),
(16, 'rest11', 'rest11@milya.com', '0acf3d81f151df5994a88f039e636228', 14),
(17, 'west22', 'hwest22@gmail.com', 'dbc4d84bfcfe2284ba11beffb853a8c4', 14),
(18, 'opp', 'opp@milya.com', 'e201220da86c13f4d9badaab658fa973', 14),
(19, 'urrr', 'urrr@gmail.com', '549ce24fb62238d013a6e222cb4d41d8', 14),
(20, 'DADU', 'DADU@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 14),
(21, 'AHSAN', 'AHSAN@gmail.com', 'd6a9a933c8aafc51e55ac0662b6e4d4a', 14),
(22, '21321', 'dasdas', 'd41d8cd98f00b204e9800998ecf8427e', 14),
(26, 'xyzmg', 'xyzmg@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 14),
(27, 'mojjojo1', 'mojjojo1@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 14),
(28, 'akash jivraj', 'akashjivraj@gmail.com', '253acb401ca5ef629fb17e520cfc64e6', 0);
>>>>>>> master

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`, `user_id`) VALUES
(1, 'Admin', 2),
(13, 'Company', 2),
(14, 'Distribution', 2);

-- --------------------------------------------------------

--
<<<<<<< HEAD
=======
-- Table structure for table `vehicel_fuel`
--

CREATE TABLE `vehicel_fuel` (
  `id` int(11) UNSIGNED NOT NULL,
  `fuel_create_date` varchar(250) NOT NULL,
  `vehicle_id` varchar(250) DEFAULT NULL,
  `fuel_tank` varchar(250) DEFAULT NULL,
  `start_meter` varchar(250) DEFAULT NULL,
  `province` varchar(250) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `qty` varchar(250) DEFAULT NULL,
  `cost_per_unit` varchar(250) DEFAULT NULL,
  `complete` varchar(250) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicel_fuel`
--

INSERT INTO `vehicel_fuel` (`id`, `fuel_create_date`, `vehicle_id`, `fuel_tank`, `start_meter`, `province`, `note`, `qty`, `cost_per_unit`, `complete`, `user_id`, `created_at`) VALUES
(1, '2019-01-16', '2', 'No', '800', 'karachi', 'this fuel was added', '89', '95', 'No', 2, '2019-01-07 16:10:00'),
(2, '2019-01-19', '2', 'Yes', '8700', 'sindh', 'fuel tank', '10', '90', 'yes', 2, '2019-01-07 16:19:27'),
(3, '2019-01-04', '1', 'hello world', '890', 'punjab', 'punjab', '89', '78', 'Yes', 2, '2019-01-07 16:20:12');

-- --------------------------------------------------------

--
>>>>>>> master
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) UNSIGNED NOT NULL,
  `vehicle_maker` varchar(250) DEFAULT NULL,
  `vehicle_engine_type` varchar(250) DEFAULT NULL,
  `vehicle_model` varchar(250) DEFAULT NULL,
  `vehicle_type` varchar(260) DEFAULT NULL,
  `Color` varchar(250) DEFAULT NULL,
  `vehicle_year` varchar(250) DEFAULT NULL,
  `vin` varchar(250) DEFAULT NULL,
  `initial_mileage` varchar(250) DEFAULT NULL,
  `license_plate` varchar(250) DEFAULT NULL,
  `vehicle_image` varchar(250) DEFAULT NULL,
  `licence_expiry_date` varchar(250) DEFAULT NULL,
  `registration_expiry_date` varchar(250) DEFAULT NULL,
  `vehicle_group_id` int(11) DEFAULT NULL,
  `vehicle_status` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
<<<<<<< HEAD
=======
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `vehicle_maker`, `vehicle_engine_type`, `vehicle_model`, `vehicle_type`, `Color`, `vehicle_year`, `vin`, `initial_mileage`, `license_plate`, `vehicle_image`, `licence_expiry_date`, `registration_expiry_date`, `vehicle_group_id`, `vehicle_status`, `user_id`, `created_at`) VALUES
(1, 'honda ', '1500', 'civic', 'car', 'red', '2019', 'yes', '900', '7880', 'image will be here', '8-nov-2019', '8-nov-2020', 3, 1, 2, '2019-01-05 19:45:37'),
(2, 'local', 'local', 'local', 'local', 'blue', '1990', '8990', '999', '89kkk', 'image will be here', '8-nov-1990', '9-nov-2000', 1, 1, 2, '2019-01-05 19:47:00');

--
>>>>>>> master
-- Indexes for dumped tables
--

--
<<<<<<< HEAD
=======
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
>>>>>>> master
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
=======
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_detail`
--
ALTER TABLE `expense_detail`
  ADD PRIMARY KEY (`exp_detail_id`);

--
>>>>>>> master
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules_fileds`
--
ALTER TABLE `modules_fileds`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
=======
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_expense`
--
ALTER TABLE `order_expense`
  ADD PRIMARY KEY (`id`);

--
>>>>>>> master
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_person`
--
ALTER TABLE `sales_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`sliderID`);

--
<<<<<<< HEAD
=======
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`id`);

--
>>>>>>> master
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
=======
-- Indexes for table `vehicel_fuel`
--
ALTER TABLE `vehicel_fuel`
  ADD PRIMARY KEY (`id`);

--
>>>>>>> master
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
=======
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
>>>>>>> master

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
<<<<<<< HEAD
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
=======
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense_detail`
--
ALTER TABLE `expense_detail`
  MODIFY `exp_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
>>>>>>> master

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
>>>>>>> master

--
-- AUTO_INCREMENT for table `modules_fileds`
--
ALTER TABLE `modules_fileds`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_expense`
--
ALTER TABLE `order_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
>>>>>>> master

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;
>>>>>>> master

--
-- AUTO_INCREMENT for table `sales_person`
--
ALTER TABLE `sales_person`
<<<<<<< HEAD
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
=======
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
>>>>>>> master

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `sliderID` int(11) NOT NULL AUTO_INCREMENT;

--
<<<<<<< HEAD
=======
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
>>>>>>> master
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
=======
-- AUTO_INCREMENT for table `vehicel_fuel`
--
ALTER TABLE `vehicel_fuel`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
>>>>>>> master
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

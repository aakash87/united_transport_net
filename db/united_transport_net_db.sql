-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 11:10 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `First_Name` varchar(250) DEFAULT NULL,
  `Last_Name` varchar(250) DEFAULT NULL,
  `Phone_Number` varchar(250) DEFAULT NULL,
  `Address` tinytext,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(25, 'Sales person', 'Sales person', 5, 'home', 'sales_person', 2);

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
(80, 'sp_create_date', 'VARCHAR', 'input', '', 250, 0, 25, 0, NULL, NULL, NULL);

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
(221, 2, 2, 1, 1, 1, 1, 1, 1, 1),
(222, 3, 2, 1, 1, 1, 1, 1, 1, 1),
(223, 5, 2, 1, 1, 1, 1, 1, 1, 1),
(224, 7, 2, 1, 1, 1, 1, 1, 1, 1),
(225, 22, 2, 1, 1, 1, 1, 1, 1, 1),
(226, 23, 2, 1, 1, 1, 1, 1, 1, 1),
(227, 24, 2, 1, 0, 0, 0, 0, 0, 0),
(228, 25, 2, 1, 1, 1, 1, 1, 1, 1);

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
(1, 'Mr Ali ', 'ali@gmail.com', 'magma karachi ', '03332500000', '2019-01-01', 2, '2019-01-05 09:56:57'),
(2, 'Mr Yasir ', 'yasir@gmail.com', 'magma karachi ', '03000010010', '2019-01-02', 2, '2019-01-05 09:57:21'),
(3, 'Mr Talha Dev', 'Dev@gmail.com', 'garden karachi ', '03000010100', '2019-01-03', 2, '2019-01-05 09:57:53');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sales_person` varchar(250) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

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
-- Indexes for dumped tables
--

--
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
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `modules_fileds`
--
ALTER TABLE `modules_fileds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `sales_person`
--
ALTER TABLE `sales_person`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `sliderID` int(11) NOT NULL AUTO_INCREMENT;

--
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
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

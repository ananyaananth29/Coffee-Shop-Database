-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 08:26 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `Br_id` int(50) NOT NULL,
  `Br_name` varchar(50) NOT NULL,
  `Loc` varchar(50) NOT NULL,
  `Mgr_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`Br_id`, `Br_name`, `Loc`, `Mgr_id`) VALUES
(1, 'Main', 'Malleshwaram', 100),
(2, 'Sub', 'Vidyaranyapura', 100);

-- --------------------------------------------------------

--
-- Table structure for table `branch_facilities`
--

CREATE TABLE `branch_facilities` (
  `Br_id` int(11) NOT NULL,
  `Facilities` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch_facilities`
--

INSERT INTO `branch_facilities` (`Br_id`, `Facilities`) VALUES
(1, 'wifi'),
(2, 'wifi');

-- --------------------------------------------------------

--
-- Table structure for table `branch_item`
--

CREATE TABLE `branch_item` (
  `Br_id` int(11) NOT NULL,
  `Item_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `branch_phone`
--

CREATE TABLE `branch_phone` (
  `Br_id` int(11) NOT NULL,
  `Phone_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch_phone`
--

INSERT INTO `branch_phone` (`Br_id`, `Phone_no`) VALUES
(1, 2147483647),
(2, 981254789);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cust_id` int(11) NOT NULL,
  `Cust_name` varchar(50) NOT NULL,
  `Phone_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_id` int(11) NOT NULL,
  `Emp_name` varchar(50) NOT NULL,
  `Phone_no` int(11) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `E_mail` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Br_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_id`, `Emp_name`, `Phone_no`, `Address`, `E_mail`, `Position`, `Br_id`) VALUES
(100, 'rita', 2147483647, 'Malleshwaram', 'hihuihuh@gmail.com', 'HR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Item_no` int(11) NOT NULL,
  `Item_name` varchar(50) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `just_item_emp_order`
--

CREATE TABLE `just_item_emp_order` (
  `Cust_id` int(11) NOT NULL,
  `Item_no` int(11) NOT NULL,
  `Emp_id` int(11) NOT NULL,
  `Order_no` int(11) NOT NULL,
  `Subtotal` int(11) NOT NULL,
  `Taxes` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_no` int(11) NOT NULL,
  `Item_name` varchar(50) NOT NULL,
  `Qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Sup_id` int(11) NOT NULL,
  `Sup_name` varchar(50) NOT NULL,
  `Phone_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_item`
--

CREATE TABLE `supplier_item` (
  `Sup_id` int(11) NOT NULL,
  `Sup_item` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sup_branch_item`
--

CREATE TABLE `sup_branch_item` (
  `Sup_id` int(11) NOT NULL,
  `Br_id` int(11) NOT NULL,
  `Item_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`Br_id`),
  ADD KEY `Mgr_id` (`Mgr_id`);

--
-- Indexes for table `branch_facilities`
--
ALTER TABLE `branch_facilities`
  ADD PRIMARY KEY (`Br_id`,`Facilities`);

--
-- Indexes for table `branch_item`
--
ALTER TABLE `branch_item`
  ADD PRIMARY KEY (`Br_id`,`Item_no`),
  ADD KEY `Item_no` (`Item_no`);

--
-- Indexes for table `branch_phone`
--
ALTER TABLE `branch_phone`
  ADD PRIMARY KEY (`Br_id`,`Phone_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cust_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_id`),
  ADD KEY `Br_id` (`Br_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`Item_no`);

--
-- Indexes for table `just_item_emp_order`
--
ALTER TABLE `just_item_emp_order`
  ADD PRIMARY KEY (`Cust_id`,`Item_no`,`Emp_id`,`Order_no`),
  ADD KEY `Emp_id` (`Emp_id`),
  ADD KEY `Item_no` (`Item_no`),
  ADD KEY `Order_no` (`Order_no`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_no`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Sup_id`);

--
-- Indexes for table `supplier_item`
--
ALTER TABLE `supplier_item`
  ADD PRIMARY KEY (`Sup_id`,`Sup_item`);

--
-- Indexes for table `sup_branch_item`
--
ALTER TABLE `sup_branch_item`
  ADD PRIMARY KEY (`Sup_id`,`Br_id`,`Item_no`),
  ADD KEY `Br_id` (`Br_id`),
  ADD KEY `Item_no` (`Item_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`Mgr_id`) REFERENCES `employee` (`Emp_id`);

--
-- Constraints for table `branch_facilities`
--
ALTER TABLE `branch_facilities`
  ADD CONSTRAINT `branch_facilities_ibfk_1` FOREIGN KEY (`Br_id`) REFERENCES `branches` (`Br_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch_item`
--
ALTER TABLE `branch_item`
  ADD CONSTRAINT `branch_item_ibfk_1` FOREIGN KEY (`Br_id`) REFERENCES `branches` (`Br_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branch_item_ibfk_2` FOREIGN KEY (`Item_no`) REFERENCES `items` (`Item_no`);

--
-- Constraints for table `branch_phone`
--
ALTER TABLE `branch_phone`
  ADD CONSTRAINT `branch_phone_ibfk_1` FOREIGN KEY (`Br_id`) REFERENCES `branches` (`Br_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Br_id`) REFERENCES `branches` (`Br_id`);

--
-- Constraints for table `just_item_emp_order`
--
ALTER TABLE `just_item_emp_order`
  ADD CONSTRAINT `just_item_emp_order_ibfk_1` FOREIGN KEY (`Emp_id`) REFERENCES `employee` (`Emp_id`),
  ADD CONSTRAINT `just_item_emp_order_ibfk_2` FOREIGN KEY (`Item_no`) REFERENCES `items` (`Item_no`),
  ADD CONSTRAINT `just_item_emp_order_ibfk_3` FOREIGN KEY (`Order_no`) REFERENCES `orders` (`Order_no`),
  ADD CONSTRAINT `just_item_emp_order_ibfk_4` FOREIGN KEY (`Cust_id`) REFERENCES `customer` (`Cust_id`);

--
-- Constraints for table `supplier_item`
--
ALTER TABLE `supplier_item`
  ADD CONSTRAINT `supplier_item_ibfk_1` FOREIGN KEY (`Sup_id`) REFERENCES `supplier` (`Sup_id`);

--
-- Constraints for table `sup_branch_item`
--
ALTER TABLE `sup_branch_item`
  ADD CONSTRAINT `sup_branch_item_ibfk_1` FOREIGN KEY (`Br_id`) REFERENCES `branches` (`Br_id`),
  ADD CONSTRAINT `sup_branch_item_ibfk_2` FOREIGN KEY (`Item_no`) REFERENCES `items` (`Item_no`),
  ADD CONSTRAINT `sup_branch_item_ibfk_3` FOREIGN KEY (`Sup_id`) REFERENCES `supplier` (`Sup_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

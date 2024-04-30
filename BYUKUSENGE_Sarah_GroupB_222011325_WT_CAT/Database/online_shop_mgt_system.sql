-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 05:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shop_mgt_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `ProductID`, `FirstName`, `LastName`, `Email`, `Phone`) VALUES
(1, 2, 'Uwineza', 'Fabiola', 'fabioluwin@gmail.com', '0783221124'),
(2, 3, 'John', 'Doel', 'john.doe@example.com', '0793211098'),
(3, 1, 'Bihibindi', 'Gad', 'bihibndgad@gmail.com', '0783211220'),
(4, 4, 'Uwase', 'Chanella', 'chanuwase@gmail.com', '07287755431'),
(5, 5, 'Dukundane', 'Jean Nepo', 'nepodukund@gmail.com', '072334411122'),
(6, 8, 'andrew', 'kwizera', 'kwizandrew@gmail.com', '0725432677'),
(12, 8, 'abeza', 'alice', 'iraharicher@gmail.com', '0788888888');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Position` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeID`, `FirstName`, `LastName`, `Position`, `Email`) VALUES
(1, 'Clere', 'Abinema', 'manager', 'abiclr@gmail.com'),
(2, 'karimu', 'hagena', 'accountant', 'karigena@gmail.com'),
(3, 'jonas', 'kwizera', 'manager', 'kwizerjohns@gmail.com'),
(4, 'IRADUKUNDA', 'NEPO', 'ceo', 'iradukundajeannepomuscene5@gmail.com'),
(5, 'Pannda', 'Yuhi', 'secretary', 'pandyuhi@gmail.com'),
(6, 'Daniel', 'Ngabo', 'technician', 'dangabo@gmail.com'),
(8, 'ytrew', 'gtredf', 'manager', 'iraharicher@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Price`, `Category`) VALUES
(1, 'Laptop', 1200, 'Electronics'),
(2, 'Backpack', 70000, 'Accessories'),
(3, 'Smartphone', 500000, 'Electronics'),
(4, 'Books', 5000, 'Papers'),
(5, 'Printer', 80000000, 'Electronics'),
(8, 'loud speaker', 60000, '0'),
(9, 'shoes', 50000, 'clothes');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseinfo`
--

CREATE TABLE `purchaseinfo` (
  `PurchaseID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `PurchaseDate` date DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchaseinfo`
--

INSERT INTO `purchaseinfo` (`PurchaseID`, `CustomerID`, `EmployeeID`, `PurchaseDate`, `TotalAmount`) VALUES
(1, 5, 2, '0000-00-00', 700000.00),
(2, 4, 6, '2024-04-18', 40000.00),
(3, 3, 5, '2023-11-28', 50000.00),
(4, 1, 3, '2022-12-01', 10000000.00),
(5, 2, 4, '2022-08-30', 600455.00),
(6, 5, 1, '2024-05-09', 545000.00),
(7, 6, 2, '2024-04-17', 8500000.00);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `ShippingID` int(11) NOT NULL,
  `PurchaseID` int(11) DEFAULT NULL,
  `ShippingType` varchar(255) DEFAULT NULL,
  `ShippingCost` float DEFAULT NULL,
  `ShippingDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`ShippingID`, `PurchaseID`, `ShippingType`, `ShippingCost`, `ShippingDate`) VALUES
(2, 4, 'Standard', 200000, '0000-00-00'),
(3, 2, 'Standard', 65000, '0000-00-00'),
(4, 1, 'Professionality', 750000, '0000-00-00'),
(5, 6, 'nnnnn', 555, '0000-00-00'),
(6, 2, 'pilate', 69000, '0000-00-00'),
(7, 7, 'orginal', 1000000, '0000-00-00'),
(9, 7, 'very hard', 70000000000, '2024-05-10'),
(10, 7, 'Hard', 777777, '2024-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'Byukusenge', 'Sarah', 'SARAH', 'sarahbyuk@gmail.com', '078955444313', '$2y$10$Lr1C1Y/fqbylwbwAQdkIWunLvF.JTTz5byB/SreWMwD4K2XVxIMcq', '2024-04-13 10:41:48', '544566', 0),
(2, 'Belysee', 'Uwase', 'Belseu', 'uwaserth22@gmail.com', '07854443213', '$2y$10$b0ZbLC.oDE19Oo9THm4ky...ubRGp1jukxRNmIxeUf1p/L2aOmScK', '2024-04-13 10:46:49', '3443', 0),
(3, 'Dany', 'Peter', 'Danyp', 'peter2@gmail.com', '073344455', '$2y$10$e/ed/Nia4vC.sL9/uEVUx.y5wUEWkAwfvgoc3ZJfHjik83wGvLCeO', '2024-04-13 10:47:48', '6666', 0),
(4, 'IRADUKUNDA', 'Jean Nepo', 'nepo69', 'nepoiradukunda69@gmail.com', '07854443213', '$2y$10$ZYWFVefFzWypiYnGgBG70u7FaqIvrK1SVKVoQNkBa8g/uDrPiCfd6', '2024-04-30 03:41:46', '3443', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `purchaseinfo`
--
ALTER TABLE `purchaseinfo`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`ShippingID`),
  ADD KEY `PurchaseID` (`PurchaseID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchaseinfo`
--
ALTER TABLE `purchaseinfo`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `ShippingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `purchaseinfo`
--
ALTER TABLE `purchaseinfo`
  ADD CONSTRAINT `purchaseinfo_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`),
  ADD CONSTRAINT `purchaseinfo_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`);

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`PurchaseID`) REFERENCES `purchaseinfo` (`PurchaseID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

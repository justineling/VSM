-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 03:46 AM
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
-- Database: `vehicle_sales_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `access_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `access_level` int(11) NOT NULL,
  `f_add` int(11) NOT NULL,
  `f_edit` int(11) NOT NULL,
  `f_view` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`access_id`, `module_id`, `access_level`, `f_add`, `f_edit`, `f_view`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1),
(3, 3, 1, 1, 1, 1),
(4, 4, 1, 1, 1, 1),
(5, 5, 1, 1, 1, 1),
(6, 6, 1, 1, 1, 1),
(7, 7, 1, 1, 1, 1),
(8, 8, 1, 1, 1, 1),
(9, 9, 1, 1, 1, 1),
(10, 1, 2, 1, 1, 1),
(11, 2, 2, 1, 1, 1),
(12, 3, 2, 1, 1, 1),
(13, 4, 2, 1, 1, 1),
(14, 5, 2, 1, 1, 1),
(15, 6, 2, 1, 1, 1),
(16, 7, 2, 1, 1, 1),
(17, 8, 2, 1, 1, 1),
(18, 9, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `service_id` int(255) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `parts_id` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `customer_id`, `vehicle_id`, `date`, `time`, `service_id`, `staff_id`, `parts_id`, `remarks`) VALUES
(1, 1, 1, '2018-08-30', '09:00:00', 1, 1, 1, NULL),
(2, 1, 2, '2024-03-04', '09:00:00', 3, 4, 5, 'Routine check-up'),
(4, 5, 5, '2024-03-06', '14:00:00', 2, 3, 4, 'Brake repair'),
(5, 6, 8, '2024-03-05', '16:23:00', 1, 4, 1, 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billing_no` int(11) NOT NULL,
  `invoice_no` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `service_amount` decimal(10,2) DEFAULT NULL,
  `parts_amount` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL,
  `staff_id` int(11) NOT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billing_no`, `invoice_no`, `customer_id`, `vehicle_id`, `title`, `service_amount`, `parts_amount`, `total`, `created_at`, `status`, `staff_id`, `remarks`) VALUES
(5, NULL, 7, 1, 'asdfsdfa', 2323.00, 2323.00, 2323.00, NULL, 'paid', 0, NULL),
(11, NULL, 7, 1, NULL, NULL, NULL, NULL, NULL, 'unpaid', 0, NULL),
(12, NULL, 7, 1, NULL, NULL, NULL, NULL, NULL, 'paid', 0, NULL),
(13, NULL, 7, 1, NULL, NULL, NULL, NULL, NULL, 'unpaid', 0, NULL),
(14, NULL, 7, 1, NULL, NULL, NULL, NULL, NULL, 'pending', 0, NULL),
(15, NULL, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(16, NULL, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(17, NULL, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(18, NULL, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(19, NULL, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(20, NULL, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(21, NULL, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(22, NULL, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(23, NULL, 8, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `body_inspection`
--

CREATE TABLE `body_inspection` (
  `inspection_id` int(11) NOT NULL,
  `body_inspection` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `body_inspection`
--

INSERT INTO `body_inspection` (`inspection_id`, `body_inspection`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `account_code` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ic` varchar(255) DEFAULT NULL,
  `personal_contact` varchar(11) DEFAULT NULL,
  `personal_email` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `office_contact` varchar(11) DEFAULT NULL,
  `office_fax` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `government_private` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `uploaded_ic` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `outstanding` varchar(50) DEFAULT NULL,
  `plate_no` varchar(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `account_code`, `company_name`, `name`, `ic`, `personal_contact`, `personal_email`, `department`, `office_contact`, `office_fax`, `email`, `address`, `government_private`, `website`, `uploaded_ic`, `remarks`, `nickname`, `type`, `outstanding`, `plate_no`, `status`) VALUES
(5, 0, '12312312', '12', '3213', '123123123', '323', '3123', '21312', '3123', '323', '3213', 'PRIVATE', '312', '5_VSM.jpg', '123123', NULL, NULL, NULL, NULL, NULL),
(6, 111, '', '111', '12312', '1', '321312', '', '', '', '11', '111', '', '', '6_VSM.jpg', '123123', NULL, NULL, NULL, NULL, NULL),
(7, 12312, '312312', '312312', '12321312', '123213', '323123', '312', '312312', '3123123', '123123', '3123123', 'GOVERMENT', '12312312', '7_VSM.jpg', '21312', NULL, NULL, NULL, NULL, NULL),
(8, 11, '', '11', '11', '1', '23123', '', '', '', '111', '111', '', '', '8_VSM.jpg', '11', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `jobsheet_id` int(11) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `jobsheet_id`, `image_name`) VALUES
(1, 1, 'image1');

-- --------------------------------------------------------

--
-- Table structure for table `indicator`
--

CREATE TABLE `indicator` (
  `indicator_id` int(11) NOT NULL,
  `warning_indicator` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `indicator`
--

INSERT INTO `indicator` (`indicator_id`, `warning_indicator`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `jobsheet`
--

CREATE TABLE `jobsheet` (
  `jobsheet_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `date_received` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `inspection_id` int(11) DEFAULT NULL,
  `indicator_id` int(11) DEFAULT NULL,
  `parts_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `information_status` varchar(255) DEFAULT NULL,
  `qc_check` varchar(255) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jobsheet`
--

INSERT INTO `jobsheet` (`jobsheet_id`, `customer_id`, `vehicle_id`, `date_received`, `completion_date`, `work_id`, `inspection_id`, `indicator_id`, `parts_id`, `service_id`, `information_status`, `qc_check`, `staff_id`, `remarks`) VALUES
(1, 1, 1, '2018-08-31', '2018-08-31', 1, 1, 1, 1, 1, 'inform', 'qc checked', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `job_board`
--

CREATE TABLE `job_board` (
  `job_board_id` int(11) NOT NULL,
  `bill_issue` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `jobsheet_id` int(11) DEFAULT NULL,
  `date_issue` datetime DEFAULT NULL,
  `completion_date` datetime DEFAULT NULL,
  `date_operation` datetime DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `vehicle_model` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `repair` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `parts_id` int(11) NOT NULL,
  `parts_code` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `cost` decimal(10,0) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `soh` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `sell_price` varchar(255) DEFAULT NULL,
  `barcode` char(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`parts_id`, `parts_code`, `item_name`, `cost`, `description`, `soh`, `category`, `sell_price`, `barcode`) VALUES
(1, 'SC001', 'NAME1', 111, 'DES1', 'SOH 1', 'ABC', '100', '12345'),
(4, 'PC 100', 'NAME 100', 100, 'DES 100', 'SOH 100', 'XYZ', '100', '101010101'),
(5, 'PC 888', 'QWDFCQEW', 0, 'VEWV', 'EWEWQ', 'WEW', '888', '2342342234'),
(6, 'PC 10000', 'QWEFCSEW', 721, 'EDIT-0721', 'EDIT', 'EDIT', '721', '721');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `job_id` int(11) NOT NULL,
  `access_level` int(11) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`job_id`, `access_level`, `position`) VALUES
(1, 1, 'admin'),
(2, 2, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `quotation_id` int(11) NOT NULL,
  `quote_no` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `service_amount` varchar(255) DEFAULT NULL,
  `parts_amount` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_type` varchar(255) DEFAULT NULL,
  `service_code` varchar(255) DEFAULT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `service_cost` decimal(10,0) DEFAULT NULL,
  `service_description` varchar(255) DEFAULT NULL,
  `service_barcode` char(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_type`, `service_code`, `service_name`, `service_cost`, `service_description`, `service_barcode`) VALUES
(5, 'Type A', 'SC001', 'Service 1', 100, 'Description for Service 1', '1234567890'),
(6, 'Type B', 'SC002', 'Service 2', 150, 'Description for Service 2', '0987654321'),
(7, 'Type C', 'SC003', 'Service 3', 200, 'Description for Service 3', '9876543210'),
(8, 'Type A', 'SC004', 'Service 4', 120, 'Description for Service 4', '6789054321'),
(11, 'EWFEW', 'SERVICE 700', '700', 888, 'DES 700', '777777777');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `position`) VALUES
(1, 'john', 'mechanic'),
(2, 'John Doe', 'Manager'),
(3, 'Jane Smith', 'Technician'),
(4, 'Michael Johnson', 'Assistant');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `sell` decimal(10,2) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `uom` varchar(255) DEFAULT NULL,
  `in_date` date DEFAULT NULL,
  `out_date` date DEFAULT NULL,
  `vehicle_no` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `category`, `item`, `cost`, `sell`, `unit`, `uom`, `in_date`, `out_date`, `vehicle_no`, `model`, `owner`) VALUES
(11, 'Battery', 'Supercharge Power Station', 169.70, 250.90, 0, 'PC', '2018-04-10', '2018-04-10', 'QAA 1234', 'Ford', 'Dr. Chin'),
(12, 'Oil', 'Premium Motor Oil', 25.50, 40.00, 0, 'L', '2023-06-15', '2023-06-20', 'BBB 5678', 'Toyota', 'Ms. Johnson'),
(13, 'Tire', 'All-Season Radial Tire', 150.00, 200.00, 0, 'PCS', '2023-07-01', '2023-07-10', 'CCC 9876', 'Honda', 'Mr. Smith'),
(14, 'Brake', 'Ceramic Brake Pad', 80.00, 120.00, 0, 'SETS', '2023-08-10', '2023-08-15', 'DDD 2468', 'Chevrolet', 'Mrs. Lee'),
(15, 'Spark Plug', 'Platinum Spark Plug', 12.99, 25.00, 0, 'PCS', '2023-09-05', '2023-09-10', 'EEE 1357', 'Ford', 'Mr. Wang'),
(16, 'Suspension', 'Coilover Suspension Kit', 800.00, 1200.00, 0, 'SETS', '2023-10-20', '2023-10-25', 'FFF 8642', 'Subaru', 'Mr. Tan'),
(17, 'Exhaust', 'Stainless Steel Exhaust System', 500.00, 750.00, 0, 'PCS', '2023-11-15', '2023-11-20', 'GGG 9753', 'Audi', 'Ms. Garcia'),
(18, 'Coolant', 'Engine Coolant', 15.00, 30.00, 0, 'L', '2023-12-05', '2023-12-10', 'HHH 3698', 'Volkswagen', 'Mr. Patel'),
(19, 'Filter Test', 'Air Filter Test', 80.50, 200.00, 86, 'SCP', '2024-02-26', '2024-03-04', 'III 4567', 'BMW TEST', 'Mrs. Christinane');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `plate_no` varchar(11) DEFAULT NULL,
  `engine_no` varchar(11) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `last_service` varchar(255) DEFAULT NULL,
  `model_type` varchar(255) DEFAULT NULL,
  `mileage` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `colour` varchar(255) DEFAULT NULL,
  `cc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `plate_no`, `engine_no`, `brand`, `last_service`, `model_type`, `mileage`, `owner`, `colour`, `cc`) VALUES
(5, '1231', 'rewrw', 'ew', 'rrwew', '2wfew', 'ewrew', 'ewrfew', 'erewr', 'rwerwe'),
(6, '321', '88', '8888', '888', '888', '88', '888', '888', '888'),
(7, '654', '324', 'defcdsg', 'sdfdsf', 'sdgsd', 'dsf', 'gsdg', 'dsgds', 'dsgsdg'),
(8, '88888', '888', '888888888', '888', '8888888888', '88888', '88', '88', '88888888'),
(9, '23423', '23432', 'w', '3wwfe', 'wef', 'werw', 'fffffsf', 'we', 'ew');

-- --------------------------------------------------------

--
-- Table structure for table `vsm_users`
--

CREATE TABLE `vsm_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_level` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vsm_users`
--

INSERT INTO `vsm_users` (`user_id`, `username`, `name`, `password`, `access_level`) VALUES
(1, 'admin', 'admin', '123', 1),
(2, 'staff', 'staff', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `work_record`
--

CREATE TABLE `work_record` (
  `work_id` int(11) NOT NULL,
  `type_of_work` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `work_record`
--

INSERT INTO `work_record` (`work_id`, `type_of_work`) VALUES
(1, 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billing_no`),
  ADD KEY `billingvehicle` (`vehicle_id`),
  ADD KEY `billingcustomer` (`customer_id`);

--
-- Indexes for table `body_inspection`
--
ALTER TABLE `body_inspection`
  ADD PRIMARY KEY (`inspection_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `indicator`
--
ALTER TABLE `indicator`
  ADD PRIMARY KEY (`indicator_id`);

--
-- Indexes for table `jobsheet`
--
ALTER TABLE `jobsheet`
  ADD PRIMARY KEY (`jobsheet_id`);

--
-- Indexes for table `job_board`
--
ALTER TABLE `job_board`
  ADD PRIMARY KEY (`job_board_id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`parts_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`quotation_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `vsm_users`
--
ALTER TABLE `vsm_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `work_record`
--
ALTER TABLE `work_record`
  ADD PRIMARY KEY (`work_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `billing_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `body_inspection`
--
ALTER TABLE `body_inspection`
  MODIFY `inspection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `indicator`
--
ALTER TABLE `indicator`
  MODIFY `indicator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobsheet`
--
ALTER TABLE `jobsheet`
  MODIFY `jobsheet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_board`
--
ALTER TABLE `job_board`
  MODIFY `job_board_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `parts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vsm_users`
--
ALTER TABLE `vsm_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `work_record`
--
ALTER TABLE `work_record`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billingcustomer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

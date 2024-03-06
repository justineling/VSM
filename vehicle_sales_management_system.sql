-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 04:31 AM
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
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `account_code`, `company_name`, `name`, `ic`, `personal_contact`, `personal_email`, `department`, `office_contact`, `office_fax`, `email`, `address`, `government_private`, `website`, `uploaded_ic`, `remarks`) VALUES
(5, 0, '12312312', '12', '3213', '123123123', '323', '3123', '21312', '3123', '323', '3213', 'PRIVATE', '312', '5_VSM.jpg', '123123'),
(6, 111, '', '111', '12312', '1', '321312', '', '', '', '11', '111', '', '', '6_VSM.jpg', '123123'),
(7, 12312, '312312', '312312', '12321312', '123213', '323123', '312', '312312', '3123123', '123123', '3123123', 'GOVERMENT', '12312312', '7_VSM.jpg', '21312'),
(8, 11, '', '11', '11', '1', '23123', '', '', '', '111', '111', '', '', '8_VSM.jpg', '11');

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
  `part_id` int(11) NOT NULL,
  `item_code` varchar(32) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT '',
  `category` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`part_id`, `item_code`, `item_name`, `category`, `price`) VALUES
(1, 'F0001', 'engine oil', 'oil', 200.00);

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
(1, 'full service', NULL, NULL, NULL, NULL, NULL),
(2, 'Oil Change', NULL, NULL, NULL, NULL, NULL),
(3, 'Brake Inspection', NULL, NULL, NULL, NULL, NULL),
(4, 'Engine Tune-up', NULL, NULL, NULL, NULL, NULL);

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
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `plate_no` int(11) DEFAULT NULL,
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
(5, 1231, 'rewrw', 'ew', 'rrwew', '2wfew', 'ewrew', 'ewrfew', 'erewr', 'rwerwe'),
(6, 321, '88', '8888', '888', '888', '88', '888', '888', '888'),
(7, 654, '324', 'defcdsg', 'sdfdsf', 'sdgsd', 'dsf', 'gsdg', 'dsgds', 'dsgsdg'),
(8, 88888, '888', '888888888', '888', '8888888888', '88888', '88', '88', '88888888'),
(9, 23423, '23432', 'w', '3wwfe', 'wef', 'werw', 'fffffsf', 'we', 'ew');

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
  ADD PRIMARY KEY (`part_id`);

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
  MODIFY `part_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

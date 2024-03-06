/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : vehicle_sales_management_system

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2018-09-05 15:48:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for access
-- ----------------------------
DROP TABLE IF EXISTS `access`;
CREATE TABLE `access` (
  `access_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `access_level` int(11) NOT NULL,
  `f_add` int(11) NOT NULL,
  `f_edit` int(11) NOT NULL,
  `f_view` int(11) DEFAULT NULL,
  PRIMARY KEY (`access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of access
-- ----------------------------
INSERT INTO `access` VALUES ('1', '1', '1', '1', '1', '1');
INSERT INTO `access` VALUES ('2', '2', '1', '1', '1', '1');
INSERT INTO `access` VALUES ('3', '3', '1', '1', '1', '1');
INSERT INTO `access` VALUES ('4', '4', '1', '1', '1', '1');
INSERT INTO `access` VALUES ('5', '5', '1', '1', '1', '1');
INSERT INTO `access` VALUES ('6', '6', '1', '1', '1', '1');
INSERT INTO `access` VALUES ('7', '7', '1', '1', '1', '1');
INSERT INTO `access` VALUES ('8', '8', '1', '1', '1', '1');
INSERT INTO `access` VALUES ('9', '9', '1', '1', '1', '1');
INSERT INTO `access` VALUES ('10', '1', '2', '1', '1', '1');
INSERT INTO `access` VALUES ('11', '2', '2', '1', '1', '1');
INSERT INTO `access` VALUES ('12', '3', '2', '1', '1', '1');
INSERT INTO `access` VALUES ('13', '4', '2', '1', '1', '1');
INSERT INTO `access` VALUES ('14', '5', '2', '1', '1', '1');
INSERT INTO `access` VALUES ('15', '6', '2', '1', '1', '1');
INSERT INTO `access` VALUES ('16', '7', '2', '1', '1', '1');
INSERT INTO `access` VALUES ('17', '8', '2', '1', '1', '1');
INSERT INTO `access` VALUES ('18', '9', '2', '1', '1', '1');

-- ----------------------------
-- Table structure for appointment
-- ----------------------------
DROP TABLE IF EXISTS `appointment`;
CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `service_id` int(255) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `parts_id` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of appointment
-- ----------------------------
INSERT INTO `appointment` VALUES ('1', '1', '1', '2018-08-30', '09:00:00', '1', '1', '1', null);

-- ----------------------------
-- Table structure for body_inspection
-- ----------------------------
DROP TABLE IF EXISTS `body_inspection`;
CREATE TABLE `body_inspection` (
  `inspection_id` int(11) NOT NULL AUTO_INCREMENT,
  `body_inspection` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`inspection_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of body_inspection
-- ----------------------------
INSERT INTO `body_inspection` VALUES ('1', 'test');

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer
-- ----------------------------

-- ----------------------------
-- Table structure for image
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobsheet_id` int(11) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of image
-- ----------------------------
INSERT INTO `image` VALUES ('1', '1', 'image1');

-- ----------------------------
-- Table structure for indicator
-- ----------------------------
DROP TABLE IF EXISTS `indicator`;
CREATE TABLE `indicator` (
  `indicator_id` int(11) NOT NULL AUTO_INCREMENT,
  `warning_indicator` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`indicator_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of indicator
-- ----------------------------
INSERT INTO `indicator` VALUES ('1', 'test');

-- ----------------------------
-- Table structure for jobsheet
-- ----------------------------
DROP TABLE IF EXISTS `jobsheet`;
CREATE TABLE `jobsheet` (
  `jobsheet_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`jobsheet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jobsheet
-- ----------------------------
INSERT INTO `jobsheet` VALUES ('1', '1', '1', '2018-08-31', '2018-08-31', '1', '1', '1', '1', '1', 'inform', 'qc checked', '1', '');

-- ----------------------------
-- Table structure for job_board
-- ----------------------------
DROP TABLE IF EXISTS `job_board`;
CREATE TABLE `job_board` (
  `job_board_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `repair` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`job_board_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of job_board
-- ----------------------------

-- ----------------------------
-- Table structure for parts
-- ----------------------------
DROP TABLE IF EXISTS `parts`;
CREATE TABLE `parts` (
  `parts_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `cost` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`parts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of parts
-- ----------------------------
INSERT INTO `parts` VALUES ('1', 'oil', 'engine oil', '200');

-- ----------------------------
-- Table structure for position
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_level` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of position
-- ----------------------------
INSERT INTO `position` VALUES ('1', '1', 'admin');
INSERT INTO `position` VALUES ('2', '2', 'staff');

-- ----------------------------
-- Table structure for quotation
-- ----------------------------
DROP TABLE IF EXISTS `quotation`;
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
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`quotation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of quotation
-- ----------------------------

-- ----------------------------
-- Table structure for service
-- ----------------------------
DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of service
-- ----------------------------
INSERT INTO `service` VALUES ('1', 'full service');

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('1', 'john', 'mechanic');

-- ----------------------------
-- Table structure for vehicle
-- ----------------------------
DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `plate_no` int(11) DEFAULT NULL,
  `engine_no` varchar(11) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `last_service` varchar(255) DEFAULT NULL,
  `model_type` varchar(255) DEFAULT NULL,
  `mileage` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `colour` varchar(255) DEFAULT NULL,
  `cc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vehicle
-- ----------------------------

-- ----------------------------
-- Table structure for vsm_users
-- ----------------------------
DROP TABLE IF EXISTS `vsm_users`;
CREATE TABLE `vsm_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_level` int(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vsm_users
-- ----------------------------
INSERT INTO `vsm_users` VALUES ('1', 'admin', 'admin', '123', '1');
INSERT INTO `vsm_users` VALUES ('2', 'staff', 'staff', '123', '2');

-- ----------------------------
-- Table structure for work_record
-- ----------------------------
DROP TABLE IF EXISTS `work_record`;
CREATE TABLE `work_record` (
  `work_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_of_work` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`work_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of work_record
-- ----------------------------
INSERT INTO `work_record` VALUES ('1', 'test');

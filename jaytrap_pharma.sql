/*
Navicat MySQL Data Transfer

Source Server         : pharmacy
Source Server Version : 50641
Source Host           : reignbws.com:3306
Source Database       : jaytrap_pharma

Target Server Type    : MYSQL
Target Server Version : 50641
File Encoding         : 65001

Date: 2019-05-24 18:10:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `drugs`
-- ----------------------------
DROP TABLE IF EXISTS `drugs`;
CREATE TABLE `drugs` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `generic_name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `price` int(7) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `created_by` int(19) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` int(19) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of drugs
-- ----------------------------

-- ----------------------------
-- Table structure for `stockings`
-- ----------------------------
DROP TABLE IF EXISTS `stockings`;
CREATE TABLE `stockings` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `drug_id` int(19) DEFAULT NULL,
  `batch_id` int(19) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `unit_qty` int(10) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(19) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `unit` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stockings
-- ----------------------------

-- ----------------------------
-- Table structure for `transactions`
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `drug_id` int(19) DEFAULT NULL,
  `quantity` int(19) DEFAULT NULL,
  `price` int(8) DEFAULT NULL,
  `created_by` int(19) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transactions
-- ----------------------------

-- ----------------------------
-- Table structure for `units`
-- ----------------------------
DROP TABLE IF EXISTS `units`;
CREATE TABLE `units` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(19) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of units
-- ----------------------------

-- ----------------------------
-- Table structure for `user_cat`
-- ----------------------------
DROP TABLE IF EXISTS `user_cat`;
CREATE TABLE `user_cat` (
  `cat_id` int(19) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(19) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_cat
-- ----------------------------
INSERT INTO `user_cat` VALUES ('1', 'Administrator', 'He is the owner of the app', 'Active', '2019-05-21 18:54:19', '1');
INSERT INTO `user_cat` VALUES ('2', 'System Admininstrator', 'He is the system administrator ', 'Active', '2019-05-21 18:55:03', '1');
INSERT INTO `user_cat` VALUES ('3', 'Dispenser', 'He is the one managing the point of sales', 'Active', '2019-05-21 18:57:30', '1');
INSERT INTO `user_cat` VALUES ('4', 'Inventory Manager', 'He is the one stocking the products', 'Active', '2019-05-21 18:58:13', '1');
INSERT INTO `user_cat` VALUES ('5', 'cat test', 'this is to test the category', 'INACTIVE', '2019-05-23 13:13:42', '1');

-- ----------------------------
-- Table structure for `user_cat_links`
-- ----------------------------
DROP TABLE IF EXISTS `user_cat_links`;
CREATE TABLE `user_cat_links` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `link_id` int(19) NOT NULL,
  `cat_id` int(19) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_cat_links
-- ----------------------------
INSERT INTO `user_cat_links` VALUES ('1', '1', '1');
INSERT INTO `user_cat_links` VALUES ('3', '2', '1');
INSERT INTO `user_cat_links` VALUES ('4', '3', '1');
INSERT INTO `user_cat_links` VALUES ('5', '4', '1');
INSERT INTO `user_cat_links` VALUES ('6', '5', '1');
INSERT INTO `user_cat_links` VALUES ('7', '1', '2');
INSERT INTO `user_cat_links` VALUES ('8', '2', '2');
INSERT INTO `user_cat_links` VALUES ('9', '3', '2');
INSERT INTO `user_cat_links` VALUES ('10', '4', '2');
INSERT INTO `user_cat_links` VALUES ('11', '5', '2');
INSERT INTO `user_cat_links` VALUES ('12', '6', '1');

-- ----------------------------
-- Table structure for `user_links`
-- ----------------------------
DROP TABLE IF EXISTS `user_links`;
CREATE TABLE `user_links` (
  `link_id` int(19) NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL,
  `link_name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `link_image` varchar(13) DEFAULT NULL,
  `link_parent` int(19) DEFAULT NULL,
  `page_id` varchar(10) DEFAULT NULL,
  `page_id_sub` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_links
-- ----------------------------
INSERT INTO `user_links` VALUES ('2', '#', 'User Management', 'Active', 'icon-user', '0', 'user', null);
INSERT INTO `user_links` VALUES ('3', '../users/create_user.php', 'Create User', 'Active', 'icon-plus2', '2', 'user', null);
INSERT INTO `user_links` VALUES ('4', '../users/user_category.php', 'User Category ', 'Active', 'icon-plus2', '2', 'user', null);
INSERT INTO `user_links` VALUES ('5', '../users/assign_privs.php', 'Assign Privileges', 'Actvie', 'icon-plus2', '2', 'user', null);
INSERT INTO `user_links` VALUES ('6', '../users/user_category.php', 'User Categories', 'Active', 'icon-plus2', '2', 'user', null);

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `full_name` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_cat` int(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(14) NOT NULL,
  `status` varchar(6) NOT NULL DEFAULT 'Active',
  `created_on` datetime DEFAULT NULL,
  `created_by` int(19) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'kwamekert', 'kertice asante', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '1', 'kerticeasante@yahoo.com', '206916032', 'Active', '2019-05-13 18:11:17', '1');
INSERT INTO `users` VALUES ('9', '', 'belinda aseye', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '1', 'belinda@gmail.com', '0206909127', 'Active', '2019-05-22 20:15:48', '1');
INSERT INTO `users` VALUES ('10', '', 'Desmond Jerome Kafui Azah', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '1', 'kafjer@gmail.com', '020912992', 'Active', '2019-05-22 23:08:11', '1');
INSERT INTO `users` VALUES ('11', '', 'new User', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '4', 'user@gmail.com', '45645644', 'Active', '2019-05-23 13:08:11', '1');

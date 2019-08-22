/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100140
 Source Host           : localhost:3306
 Source Schema         : pharmacydb

 Target Server Type    : MySQL
 Target Server Version : 100140
 File Encoding         : 65001

 Date: 16/08/2019 15:40:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for drug_sales
-- ----------------------------
DROP TABLE IF EXISTS `drug_sales`;
CREATE TABLE `drug_sales`  (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(19) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `drug_id` int(19) NULL DEFAULT NULL,
  `quantity` int(19) NULL DEFAULT NULL,
  `price` int(8) NULL DEFAULT NULL,
  `created_by` int(19) NULL DEFAULT NULL,
  `created_on` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of drug_sales
-- ----------------------------
INSERT INTO `drug_sales` VALUES (18, 'ph_5d0ac692a4edf', 1, 10, 100, 1, '2019-06-19 23:34:42');
INSERT INTO `drug_sales` VALUES (19, 'ph_5d0ac8d4a808b', 1, 32, 100, 1, '2019-06-19 23:44:20');
INSERT INTO `drug_sales` VALUES (20, 'ph_5d0ac93d2d185', 1, 45, 100, 1, '2019-06-19 23:46:05');
INSERT INTO `drug_sales` VALUES (21, 'ph_5d0ac9833d7c7', 1, 3, 100, 1, '2019-06-19 23:47:15');
INSERT INTO `drug_sales` VALUES (22, 'ph_5d0ad64143ead', 1, 23, 100, 1, '2019-06-20 00:41:37');
INSERT INTO `drug_sales` VALUES (23, 'ph_5d0ad64143ead', 5, 45, 40, 1, '2019-06-20 00:41:37');
INSERT INTO `drug_sales` VALUES (24, 'ph_5d0ad899efa8c', 1, 10, 100, 1, '2019-06-20 00:51:38');
INSERT INTO `drug_sales` VALUES (25, 'ph_5d0b8becebeac', 1, 10, 100, 1, '2019-06-20 13:36:45');
INSERT INTO `drug_sales` VALUES (26, 'ph_5d0bce29712d9', 1, 3, 100, 1, '2019-06-20 18:19:21');
INSERT INTO `drug_sales` VALUES (27, 'ph_5d0bce55acb31', 1, 3, 100, 1, '2019-06-20 18:20:05');
INSERT INTO `drug_sales` VALUES (28, 'ph_5d0bce85e7610', 1, 3, 100, 1, '2019-06-20 18:20:54');
INSERT INTO `drug_sales` VALUES (29, 'ph_5d0bcec2434f0', 1, 3, 100, 1, '2019-06-20 18:21:54');
INSERT INTO `drug_sales` VALUES (30, 'ph_5d0bcff4e632c', 1, 3, 100, 1, '2019-06-20 18:27:01');
INSERT INTO `drug_sales` VALUES (31, 'ph_5d0bd0238d2fa', 1, 3, 100, 1, '2019-06-20 18:27:47');
INSERT INTO `drug_sales` VALUES (32, 'ph_5d0bd039123ef', 1, 3, 100, 1, '2019-06-20 18:28:09');
INSERT INTO `drug_sales` VALUES (33, 'ph_5d0bd09b4d76e', 1, 3, 100, 1, '2019-06-20 18:29:47');
INSERT INTO `drug_sales` VALUES (34, 'ph_5d0bd0cc28ac4', 1, 3, 100, 1, '2019-06-20 18:30:36');
INSERT INTO `drug_sales` VALUES (35, 'ph_5d0bd125585b2', 1, 1, 100, 1, '2019-06-20 18:32:05');
INSERT INTO `drug_sales` VALUES (36, 'ph_5d0bd3c785628', 1, 1, 100, 1, '2019-06-20 18:43:19');
INSERT INTO `drug_sales` VALUES (37, 'ph_5d0bd3eb469ce', 1, 1, 100, 1, '2019-06-20 18:43:55');
INSERT INTO `drug_sales` VALUES (38, 'ph_5d0bd42880b56', 1, 1, 100, 1, '2019-06-20 18:44:56');
INSERT INTO `drug_sales` VALUES (39, 'ph_5d0bd443b782e', 1, 1, 100, 1, '2019-06-20 18:45:23');
INSERT INTO `drug_sales` VALUES (40, 'ph_5d0bd4e4e3b0f', 1, 1, 100, 1, '2019-06-20 18:48:05');
INSERT INTO `drug_sales` VALUES (41, 'ph_5d0bd8e7af934', 1, 5, 100, 1, '2019-06-20 19:05:11');
INSERT INTO `drug_sales` VALUES (42, 'ph_5d0bd99eeb4a1', 1, 1, 100, 1, '2019-06-20 19:08:15');
INSERT INTO `drug_sales` VALUES (43, 'ph_5d0bda7274c7b', 1, 1, 100, 1, '2019-06-20 19:11:46');
INSERT INTO `drug_sales` VALUES (44, 'ph_5d0bdb37b371c', 1, 1, 100, 1, '2019-06-20 19:15:03');
INSERT INTO `drug_sales` VALUES (45, 'ph_5d0bdb688305e', 1, 1, 100, 1, '2019-06-20 19:15:52');
INSERT INTO `drug_sales` VALUES (46, 'ph_5d0bdc4a47078', 1, 10, 100, 1, '2019-06-20 19:19:38');
INSERT INTO `drug_sales` VALUES (47, 'ph_5d0bde167d277', 3, 20, 50, 1, '2019-06-20 19:27:18');
INSERT INTO `drug_sales` VALUES (48, 'ph_5d0bde167d277', 1, 5, 100, 1, '2019-06-20 19:27:18');
INSERT INTO `drug_sales` VALUES (49, 'ph_5d0bde53418ba', 1, 2, 100, 1, '2019-06-20 19:28:19');
INSERT INTO `drug_sales` VALUES (50, 'ph_5d4b315925d51', 1, 2, 100, 1, '2019-08-07 20:15:21');

-- ----------------------------
-- Table structure for drugs
-- ----------------------------
DROP TABLE IF EXISTS `drugs`;
CREATE TABLE `drugs`  (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `generic_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `company` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `type` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `category` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `price` int(7) NULL DEFAULT NULL,
  `brand` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` int(19) NULL DEFAULT NULL,
  `created_on` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(19) NULL DEFAULT NULL,
  `updated_on` datetime(0) NULL DEFAULT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of drugs
-- ----------------------------
INSERT INTO `drugs` VALUES (1, 'Paracetamol', 'Unicom', 'Capsule', 'Children', 'Active', 100, NULL, 1, '2019-05-27 23:15:31', NULL, NULL, 1);
INSERT INTO `drugs` VALUES (2, 'Colodium', 'Ernest Chemist', 'Capsule', 'Children', 'INACTIVE', 50, NULL, 1, '2019-05-27 23:16:22', NULL, NULL, 0);
INSERT INTO `drugs` VALUES (3, 'Colodium', 'Ernest Chemist', 'Capsule', 'Children', 'Active', 50, NULL, 1, '2019-05-27 23:16:34', NULL, NULL, 182);
INSERT INTO `drugs` VALUES (4, 'NewDrug', 'Allsafe', 'Capsule', 'Adults', 'Active', 100, NULL, 1, '2019-05-27 23:18:24', NULL, NULL, 100);
INSERT INTO `drugs` VALUES (5, 'Tabea ', 'Adepa Pharmacy', 'Syrup', 'Adults', 'Active', 40, NULL, 1, '2019-05-28 22:08:13', NULL, NULL, 0);
INSERT INTO `drugs` VALUES (6, 'NeoPl', 'KinaPharma', 'Capsule', 'Teenagers', 'Active', 100, NULL, 1, '2019-07-06 01:23:38', NULL, NULL, 0);

-- ----------------------------
-- Table structure for stockings
-- ----------------------------
DROP TABLE IF EXISTS `stockings`;
CREATE TABLE `stockings`  (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `drug_id` int(19) NULL DEFAULT NULL,
  `batch_id` int(19) NULL DEFAULT NULL,
  `expiration_date` date NULL DEFAULT NULL,
  `unit_qty` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_on` datetime(0) NULL DEFAULT NULL,
  `created_by` int(19) NULL DEFAULT NULL,
  `status` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Active',
  `unit` int(5) NULL DEFAULT NULL,
  `updated_by` int(19) NULL DEFAULT NULL,
  `updated_on` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of stockings
-- ----------------------------
INSERT INTO `stockings` VALUES (6, 1, NULL, '2019-06-23', 10, '2019-06-20 17:36:35', 1, 'Active', 2, NULL, NULL);
INSERT INTO `stockings` VALUES (7, NULL, NULL, '2019-06-30', 20, '2019-06-20 17:37:00', 1, 'Active', NULL, NULL, NULL);
INSERT INTO `stockings` VALUES (8, 3, NULL, '2019-06-21', 10, '2019-06-20 17:39:17', 1, 'Active', 2, NULL, NULL);
INSERT INTO `stockings` VALUES (9, 4, NULL, '2019-06-28', 10, '2019-06-20 17:41:03', 1, 'Active', 2, NULL, NULL);
INSERT INTO `stockings` VALUES (10, 5, NULL, '2019-06-28', 10, '2019-06-20 17:43:14', 1, 'Active', 2, NULL, NULL);
INSERT INTO `stockings` VALUES (11, 4, NULL, '2019-06-21', 10, '2019-06-20 17:46:02', 1, 'Active', 2, NULL, NULL);
INSERT INTO `stockings` VALUES (12, 4, NULL, '2019-06-28', 4, '2019-06-20 17:47:04', 1, 'Active', 2, NULL, NULL);
INSERT INTO `stockings` VALUES (13, 4, NULL, '2019-06-28', 322, '2019-06-20 17:49:58', 1, 'Active', 2, NULL, NULL);
INSERT INTO `stockings` VALUES (14, 3, NULL, '2019-06-29', 12, '2019-06-20 17:50:34', 1, 'Active', 2, NULL, NULL);
INSERT INTO `stockings` VALUES (15, 3, NULL, '2019-06-22', 67, '2019-06-20 17:51:06', 1, 'Active', 2, NULL, NULL);
INSERT INTO `stockings` VALUES (16, 1, NULL, '2019-06-27', 100, '2019-06-20 17:52:07', 1, 'Active', 2, NULL, NULL);
INSERT INTO `stockings` VALUES (17, 1, NULL, '2019-06-27', 100, '2019-06-20 17:52:15', 1, 'Active', 2, NULL, NULL);
INSERT INTO `stockings` VALUES (18, 1, NULL, '2019-06-27', 100, '2019-06-20 17:59:39', 1, 'Active', 2, NULL, NULL);
INSERT INTO `stockings` VALUES (19, 3, NULL, '2019-06-27', 100, '2019-06-20 17:59:59', 1, 'Active', 2, NULL, NULL);
INSERT INTO `stockings` VALUES (20, 3, NULL, '2019-06-27', 100, '2019-06-20 18:01:36', 1, 'Active', 2, NULL, NULL);
INSERT INTO `stockings` VALUES (21, 4, NULL, '2019-06-27', 100, '2019-06-20 18:01:46', 1, 'Active', 2, NULL, NULL);
INSERT INTO `stockings` VALUES (22, 3, NULL, '2019-08-14', 100, '2019-08-07 20:14:29', 1, 'Active', 2, NULL, NULL);

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions`  (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `total_item` int(19) NULL DEFAULT NULL,
  `total_price` int(19) NULL DEFAULT NULL,
  `created_on` datetime(0) NULL DEFAULT NULL,
  `t_id` varchar(19) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of transactions
-- ----------------------------
INSERT INTO `transactions` VALUES (1, 1, 5000, '2019-06-19 23:33:26', 'ph_5d0ac6468a402');
INSERT INTO `transactions` VALUES (2, 1, 1000, '2019-06-19 23:34:42', 'ph_5d0ac692a4edf');
INSERT INTO `transactions` VALUES (3, 1, 3200, '2019-06-19 23:44:20', 'ph_5d0ac8d4a808b');
INSERT INTO `transactions` VALUES (4, 1, 4500, '2019-06-19 23:46:05', 'ph_5d0ac93d2d185');
INSERT INTO `transactions` VALUES (5, 1, 300, '2019-06-19 23:47:15', 'ph_5d0ac9833d7c7');
INSERT INTO `transactions` VALUES (6, 2, 4100, '2019-06-20 00:41:37', 'ph_5d0ad64143ead');
INSERT INTO `transactions` VALUES (7, 1, 1000, '2019-06-20 00:51:37', 'ph_5d0ad899efa8c');
INSERT INTO `transactions` VALUES (8, 1, 1000, '2019-06-20 13:36:44', 'ph_5d0b8becebeac');
INSERT INTO `transactions` VALUES (9, 1, 300, '2019-06-20 18:19:21', 'ph_5d0bce29712d9');
INSERT INTO `transactions` VALUES (10, 1, 300, '2019-06-20 18:20:05', 'ph_5d0bce55acb31');
INSERT INTO `transactions` VALUES (11, 1, 300, '2019-06-20 18:20:53', 'ph_5d0bce85e7610');
INSERT INTO `transactions` VALUES (12, 1, 300, '2019-06-20 18:21:54', 'ph_5d0bcec2434f0');
INSERT INTO `transactions` VALUES (13, 1, 300, '2019-06-20 18:27:00', 'ph_5d0bcff4e632c');
INSERT INTO `transactions` VALUES (14, 1, 300, '2019-06-20 18:27:47', 'ph_5d0bd0238d2fa');
INSERT INTO `transactions` VALUES (15, 1, 300, '2019-06-20 18:28:09', 'ph_5d0bd039123ef');
INSERT INTO `transactions` VALUES (16, 1, 300, '2019-06-20 18:29:47', 'ph_5d0bd09b4d76e');
INSERT INTO `transactions` VALUES (17, 1, 300, '2019-06-20 18:30:36', 'ph_5d0bd0cc28ac4');
INSERT INTO `transactions` VALUES (18, 1, 100, '2019-06-20 18:32:05', 'ph_5d0bd125585b2');
INSERT INTO `transactions` VALUES (19, 1, 100, '2019-06-20 18:43:19', 'ph_5d0bd3c785628');
INSERT INTO `transactions` VALUES (20, 1, 100, '2019-06-20 18:43:55', 'ph_5d0bd3eb469ce');
INSERT INTO `transactions` VALUES (21, 1, 100, '2019-06-20 18:44:56', 'ph_5d0bd42880b56');
INSERT INTO `transactions` VALUES (22, 1, 100, '2019-06-20 18:45:23', 'ph_5d0bd443b782e');
INSERT INTO `transactions` VALUES (23, 1, 100, '2019-06-20 18:48:05', 'ph_5d0bd4e4e3b0f');
INSERT INTO `transactions` VALUES (24, 1, 500, '2019-06-20 19:05:11', 'ph_5d0bd8e7af934');
INSERT INTO `transactions` VALUES (25, 1, 100, '2019-06-20 19:08:15', 'ph_5d0bd99eeb4a1');
INSERT INTO `transactions` VALUES (26, 1, 100, '2019-06-20 19:11:46', 'ph_5d0bda7274c7b');
INSERT INTO `transactions` VALUES (27, 1, 100, '2019-06-20 19:15:03', 'ph_5d0bdb37b371c');
INSERT INTO `transactions` VALUES (28, 1, 100, '2019-06-20 19:15:52', 'ph_5d0bdb688305e');
INSERT INTO `transactions` VALUES (29, 1, 1000, '2019-06-20 19:19:38', 'ph_5d0bdc4a47078');
INSERT INTO `transactions` VALUES (30, 2, 1500, '2019-06-20 19:27:18', 'ph_5d0bde167d277');
INSERT INTO `transactions` VALUES (31, 1, 200, '2019-06-20 19:28:19', 'ph_5d0bde53418ba');
INSERT INTO `transactions` VALUES (32, 1, 200, '2019-08-07 20:15:21', 'ph_5d4b315925d51');

-- ----------------------------
-- Table structure for units
-- ----------------------------
DROP TABLE IF EXISTS `units`;
CREATE TABLE `units`  (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_on` datetime(0) NULL DEFAULT NULL,
  `created_by` int(19) NULL DEFAULT NULL,
  `description` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of units
-- ----------------------------
INSERT INTO `units` VALUES (1, 'Stips', '2019-05-27 23:58:10', 1, 'This is for strips', 'Active');
INSERT INTO `units` VALUES (2, 'Strips', '2019-05-28 00:01:19', 1, '            This is really cool', 'Active');

-- ----------------------------
-- Table structure for user_cat
-- ----------------------------
DROP TABLE IF EXISTS `user_cat`;
CREATE TABLE `user_cat`  (
  `cat_id` int(19) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_on` datetime(0) NULL DEFAULT NULL,
  `created_by` int(19) NULL DEFAULT NULL,
  PRIMARY KEY (`cat_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_cat
-- ----------------------------
INSERT INTO `user_cat` VALUES (1, 'Administrator', 'He is the owner of the app', 'Active', '2019-05-21 18:54:19', 1);
INSERT INTO `user_cat` VALUES (2, 'System Admininstrator', 'He is the system administrator ', 'Active', '2019-05-21 18:55:03', 1);
INSERT INTO `user_cat` VALUES (3, 'Dispenser', 'He is the one managing the point of sales', 'Active', '2019-05-21 18:57:30', 1);
INSERT INTO `user_cat` VALUES (4, 'Inventory Manager', 'He is the one stocking the products', 'Active', '2019-05-21 18:58:13', 1);
INSERT INTO `user_cat` VALUES (5, 'cat test', 'this is to test the category', 'INACTIVE', '2019-05-23 13:13:42', 1);

-- ----------------------------
-- Table structure for user_cat_links
-- ----------------------------
DROP TABLE IF EXISTS `user_cat_links`;
CREATE TABLE `user_cat_links`  (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `link_id` int(19) NOT NULL,
  `cat_id` int(19) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_cat_links
-- ----------------------------
INSERT INTO `user_cat_links` VALUES (1, 1, 1);
INSERT INTO `user_cat_links` VALUES (3, 2, 1);
INSERT INTO `user_cat_links` VALUES (4, 3, 1);
INSERT INTO `user_cat_links` VALUES (5, 4, 1);
INSERT INTO `user_cat_links` VALUES (6, 5, 1);
INSERT INTO `user_cat_links` VALUES (7, 1, 2);
INSERT INTO `user_cat_links` VALUES (8, 2, 2);
INSERT INTO `user_cat_links` VALUES (9, 3, 2);
INSERT INTO `user_cat_links` VALUES (10, 4, 2);
INSERT INTO `user_cat_links` VALUES (11, 5, 2);
INSERT INTO `user_cat_links` VALUES (12, 6, 1);
INSERT INTO `user_cat_links` VALUES (13, 7, 1);
INSERT INTO `user_cat_links` VALUES (14, 8, 1);
INSERT INTO `user_cat_links` VALUES (15, 9, 1);
INSERT INTO `user_cat_links` VALUES (16, 10, 1);
INSERT INTO `user_cat_links` VALUES (17, 11, 1);
INSERT INTO `user_cat_links` VALUES (18, 12, 1);
INSERT INTO `user_cat_links` VALUES (19, 13, 1);
INSERT INTO `user_cat_links` VALUES (20, 14, 1);
INSERT INTO `user_cat_links` VALUES (21, 15, 1);
INSERT INTO `user_cat_links` VALUES (22, 16, 1);

-- ----------------------------
-- Table structure for user_links
-- ----------------------------
DROP TABLE IF EXISTS `user_links`;
CREATE TABLE `user_links`  (
  `link_id` int(19) NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `link_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `link_image` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `link_parent` int(19) NULL DEFAULT NULL,
  `page_id` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `page_id_sub` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`link_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_links
-- ----------------------------
INSERT INTO `user_links` VALUES (2, '#', 'User Management', 'Active', 'icon-user', 0, 'user', NULL);
INSERT INTO `user_links` VALUES (3, '../users/create_user.php', 'Create User', 'Active', 'icon-plus2', 2, 'user', NULL);
INSERT INTO `user_links` VALUES (4, '../users/user_category.php', 'User Category ', 'Active', 'icon-plus2', 2, 'user', NULL);
INSERT INTO `user_links` VALUES (5, '../users/assign_privs.php', 'Assign Privileges', 'Actvie', 'icon-plus2', 2, 'user', NULL);
INSERT INTO `user_links` VALUES (6, '../users/user_category.php', 'User Categories', 'Active', 'icon-plus2', 2, 'user', NULL);
INSERT INTO `user_links` VALUES (7, '#', 'Drugs', 'Active', 'icon-aid-kit', 0, 'drugs', NULL);
INSERT INTO `user_links` VALUES (8, '../drugs/add_drug.php', 'Add Drug', 'Active', 'icon-plus2', 7, 'drugs', NULL);
INSERT INTO `user_links` VALUES (9, '#', 'Inventory', 'Active', 'icon-database', 0, 'inventory', NULL);
INSERT INTO `user_links` VALUES (10, '../inventory/add_stock.php', 'Add Stock', 'Active', 'icon-plus2', 9, 'inventory', NULL);
INSERT INTO `user_links` VALUES (11, '#', 'Settings ', 'Active ', 'icon-cog2', 0, 'settings', NULL);
INSERT INTO `user_links` VALUES (12, '../settings/unit_settings.php', 'Unit Settings', 'Active ', 'icon-plus2', 11, 'settings', NULL);
INSERT INTO `user_links` VALUES (13, '../inventory/list_stocks.php', 'List Stocks ', 'Active', 'icon-plus2', 9, 'inventory', NULL);
INSERT INTO `user_links` VALUES (14, '../drugs/list_drugs.php', 'List Drugs', 'Active', 'icon-plus2', 7, 'drugs', NULL);
INSERT INTO `user_links` VALUES (15, '#', 'Sales', 'Active', 'icon-cart5', 0, 'sales', NULL);
INSERT INTO `user_links` VALUES (16, '../sales/list_drugs.php', 'Point Of Sales', 'Active', 'icon-plus2', 15, 'sales', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `full_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_cat` int(1) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone_number` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Active',
  `created_on` datetime(0) NULL DEFAULT NULL,
  `created_by` int(19) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'kwamekert', 'kertice asante', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, 'kerticeasante@yahoo.com', '206916032', 'Active', '2019-05-13 18:11:17', 1);
INSERT INTO `users` VALUES (9, '', 'belinda aseye', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, 'belinda@gmail.com', '0206909127', 'Active', '2019-05-22 20:15:48', 1);
INSERT INTO `users` VALUES (10, '', 'Desmond Jerome Kafui Azah', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, 'kafjer@gmail.com', '020912992', 'Active', '2019-05-22 23:08:11', 1);
INSERT INTO `users` VALUES (11, '', 'new User', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 4, 'user@gmail.com', '45645644', 'Active', '2019-05-23 13:08:11', 1);
INSERT INTO `users` VALUES (12, '', 'test', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 3, 'test@gmail.com', '0206909127', 'Active', '2019-07-06 01:22:59', 1);

SET FOREIGN_KEY_CHECKS = 1;

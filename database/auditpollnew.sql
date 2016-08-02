/*
Navicat MySQL Data Transfer

Source Server         : phpajax
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : auditpollnew

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-08-02 14:44:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `attitude`
-- ----------------------------
DROP TABLE IF EXISTS `attitude`;
CREATE TABLE `attitude` (
  `attitudeID` int(10) NOT NULL AUTO_INCREMENT,
  `processID` int(10) DEFAULT NULL,
  `questionID` int(10) DEFAULT NULL,
  `questionaireID` int(10) DEFAULT NULL,
  `attitude` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitDate` date DEFAULT NULL,
  `quarter` int(1) DEFAULT NULL,
  `fiscalYear` int(4) DEFAULT NULL,
  PRIMARY KEY (`attitudeID`),
  KEY `questionID` (`questionID`),
  KEY `questionaireID` (`questionaireID`),
  KEY `attitude_ibfk_1` (`processID`),
  CONSTRAINT `attitude_ibfk_1` FOREIGN KEY (`processID`) REFERENCES `process` (`processID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `attitude_ibfk_2` FOREIGN KEY (`questionID`) REFERENCES `question` (`questionID`),
  CONSTRAINT `attitude_ibfk_3` FOREIGN KEY (`questionaireID`) REFERENCES `questionaire` (`questionaireID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of attitude
-- ----------------------------

-- ----------------------------
-- Table structure for `auditor`
-- ----------------------------
DROP TABLE IF EXISTS `auditor`;
CREATE TABLE `auditor` (
  `auditorID` int(10) NOT NULL AUTO_INCREMENT,
  `auditorCode` int(10) DEFAULT NULL,
  `auditorPre` varchar(20) DEFAULT NULL,
  `auditorName` varchar(200) DEFAULT NULL,
  `auditorLastname` varchar(200) DEFAULT NULL,
  `auditorPicture` varchar(200) DEFAULT NULL,
  `auditorPosition` varchar(200) DEFAULT NULL,
  `auditorLevel` int(10) DEFAULT NULL,
  `auditorOption` varchar(200) DEFAULT NULL,
  `partyID` int(10) DEFAULT NULL,
  `divisionID` int(10) DEFAULT NULL,
  `jobID` int(10) DEFAULT NULL,
  PRIMARY KEY (`auditorID`),
  KEY `auditorParty` (`partyID`),
  KEY `auditorDivision` (`divisionID`),
  KEY `auditorJob` (`jobID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auditor
-- ----------------------------
INSERT INTO `auditor` VALUES ('1', '8907', 'นาย', 'สมยศ', 'คชกิจจารักษ์', 'auditor_579709a3bb213.jpg', 'ผู้อำนวยการกอง', '9', 'ตรวจสอบหน่วยงานส่วนกลาง', '1', '1', null);
INSERT INTO `auditor` VALUES ('2', '10020', 'นางสาว', 'พรทิพย์ ', 'วาพันดุง', '020415_170650.jpg', 'หัวหน้างาน ', '8', 'ตรวจสอบหน่วยงานส่วนกลาง 1', '1', '1', '1');
INSERT INTO `auditor` VALUES ('3', '11639', 'นางสาว', 'รติชา ', 'บัวพูล', '020415_170706.jpg', 'ผู้ตรวจสอบ', '6', null, '1', '1', '1');
INSERT INTO `auditor` VALUES ('4', '11719', 'นางสาว', 'บุญลัดฎา ', 'เชื้อแก้ว', '020415_170722.JPG', 'ผู้ตรวจสอบ', '6', null, '1', '1', '1');
INSERT INTO `auditor` VALUES ('5', '13015', 'นางสาว', 'ศิริมล ', 'เกื้อคลัง', '020415_170752.JPG', 'ผู้ตรวจสอบ', '5', null, '1', '1', '1');
INSERT INTO `auditor` VALUES ('6', '10252', 'นางสาว', 'ดวงมณี ', 'ศรีจันทร์นิล', '020415_170827.JPG', 'หัวหน้างาน', '8', 'งตรวจสอบหน่วยงานส่วนกลาง 2', '1', '1', '2');
INSERT INTO `auditor` VALUES ('7', '10742', 'นางสาว', 'นฤมล ', 'เปล่งสอาด', '020415_170844.JPG', 'ผู้ตรวจสอบ', '6', null, '1', '1', '2');
INSERT INTO `auditor` VALUES ('8', '11638', 'นาย', 'ภูวเดช ', 'เพ็ชรมาตศรี', '020415_170900.JPG', 'ผู้ตรวจสอบ', '6', null, '1', '1', '2');
INSERT INTO `auditor` VALUES ('9', '13581', 'นางสาว', 'สุภาวิณี ', 'อยู่โภชนา', '161015_162711.png', 'นักบริหารงานทั่วไป', '4', '(ปฏิบัติหน้าที่ผู้ตรวจสอบ)', '1', '1', '2');
INSERT INTO `auditor` VALUES ('10', '8909', 'นาย', 'ประจักษ์ ', 'สังฆธรรม', '080216_161530.jpg', 'ผู้อำนวยการกอง', '10', null, '1', '2', '3');
INSERT INTO `auditor` VALUES ('11', '9988', 'นาย', 'สมัยโชค ', 'ชูความดี', '020415_170408.jpg', 'หัวหน้างาน', '8', 'งานตรวจสอบข้อมูลและระบบงานสารสนเทศ', '1', '2', '3');
INSERT INTO `auditor` VALUES ('12', '7490', 'นาย', 'กฤศ ', 'สังขจันทร์', '020415_170422.jpg', 'พนักงานคอมพิวเตอร์', '6', '(ปฏิบัติหน้าที่ผู้ตรวจสอบ)', '1', '2', '3');
INSERT INTO `auditor` VALUES ('13', '13773', 'นาย', 'ณัฐวัตร ', 'บุญพิทักษ์', '020415_170437.jpg', 'นักวิชาการคอมพิวเตอร์', '5', '(ปฏิบัติหน้าที่ผู้ตรวจสอบ)', '1', '2', '3');
INSERT INTO `auditor` VALUES ('14', '14180', 'นาย', 'วรากรณ์ ', 'สุภัคนิกร', '020415_170456.jpg', 'วิศวกร', '5', '(ปฏิบัติหน้าที่ผู้ตรวจสอบ)', '1', '2', '3');
INSERT INTO `auditor` VALUES ('16', '10061', 'นาย', 'พัฒนา', 'วัฒนากร', '020415_170516.jpg', 'หัวหน้างาน', '8', 'งานปฏิบัติการคอมพิวเตอร์และเครือข่าย', '1', '2', '4');
INSERT INTO `auditor` VALUES ('17', '11509', 'นาย', 'เอกชัย', 'มีศรี', '020415_170600.jpg', 'ผู้ตรวจสอบ', '6', null, '1', '2', '4');
INSERT INTO `auditor` VALUES ('18', '16312', 'นางสาว', 'กานต์วิณี', 'โรจน์วงศ์วรา', 'auditor_5774bd64ad960.jpg', 'นักวิชาการคอมพิวเตอร์', '4', '(ปฏิบัติหน้าที่ผู้ตรวจสอบ)', '1', '2', '4');
INSERT INTO `auditor` VALUES ('19', '10482', 'นางสาว', 'ภัทรวรรณ', 'เพ็ชรจั่น', '020415_170543.jpg', 'นักวิชาการคอมพิวเตอร์', '7', '(ปฏิบัติหน้าที่ผู้ตรวจสอบ)', '1', '2', '4');

-- ----------------------------
-- Table structure for `division`
-- ----------------------------
DROP TABLE IF EXISTS `division`;
CREATE TABLE `division` (
  `divisionID` int(10) NOT NULL,
  `divisionName` varchar(200) DEFAULT NULL,
  `divisionSynName` varchar(200) DEFAULT NULL,
  `partyID` int(10) DEFAULT NULL,
  PRIMARY KEY (`divisionID`),
  KEY `partyID` (`partyID`),
  CONSTRAINT `division_ibfk_1` FOREIGN KEY (`partyID`) REFERENCES `party` (`partyID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of division
-- ----------------------------
INSERT INTO `division` VALUES ('1', 'กองตรวจสอบหน่วยงานส่วนกลาง', 'กตส.', '1');
INSERT INTO `division` VALUES ('2', 'กองตรวจสอบเทคโนโลยีสารสนเทศ', 'กตท.', '1');
INSERT INTO `division` VALUES ('3', 'กองตรวจสอบภูมิภาค 1', 'กตภ.1', '2');
INSERT INTO `division` VALUES ('4', 'กองตรวจสอบภูมิภาค 2', 'กตภ.2', '2');
INSERT INTO `division` VALUES ('5', 'กองตรวจสอบภูมิภาค 3', 'กตภ.3', '2');
INSERT INTO `division` VALUES ('6', 'กองตรวจสอบภูมิภาค 4', 'กตภ.4', '2');
INSERT INTO `division` VALUES ('7', 'กองตรวจสอบภูมิภาค 5', 'กตภ.5', '2');
INSERT INTO `division` VALUES ('8', 'กองพัฒนาและสนับสนุนงานตรวจสอบ', 'กพส.', '3');
INSERT INTO `division` VALUES ('9', 'ผู้ช่วยผู้ว่าการ (สำนักตรวจสอบ)', null, '3');

-- ----------------------------
-- Table structure for `job`
-- ----------------------------
DROP TABLE IF EXISTS `job`;
CREATE TABLE `job` (
  `jobID` int(10) NOT NULL,
  `jobName` varchar(200) DEFAULT NULL,
  `jobSynName` varchar(200) DEFAULT NULL,
  `divisionID` int(10) DEFAULT NULL,
  PRIMARY KEY (`jobID`),
  KEY `job_ibfk_1` (`divisionID`),
  CONSTRAINT `job_ibfk_1` FOREIGN KEY (`divisionID`) REFERENCES `division` (`divisionID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job
-- ----------------------------
INSERT INTO `job` VALUES ('1', 'งานตรวจสอบหน่วยงานส่วนกลาง 1', 'กตก.ง.1', '1');
INSERT INTO `job` VALUES ('2', 'งานตรวจสอบหน่วยงานส่วนกลาง 2', 'กตก.ง.2', '1');
INSERT INTO `job` VALUES ('3', 'งานตรวจสอบข้อมูลและระบบงานสารสนเทศ', 'งตข.', '2');
INSERT INTO `job` VALUES ('4', 'งานตรวจสอบงานปฏิบัติการคอมพิวเตอร์และเครือข่าย', 'งตค.', '2');
INSERT INTO `job` VALUES ('5', 'งานตรวจสอบภูมิภาค 1', 'กตภ1.ง.1', '3');
INSERT INTO `job` VALUES ('6', 'งานตรวจสอบภูมิภาค 2', 'กตภ1.ง.2', '3');
INSERT INTO `job` VALUES ('7', 'งานตรวจสอบภูมิภาค 1', 'กตภ2.ง.1', '4');
INSERT INTO `job` VALUES ('8', 'งานตรวจสอบภูมิภาค 2', 'กตภ2.ง.2', '4');
INSERT INTO `job` VALUES ('9', 'งานตรวจสอบภูมิภาค 1', 'กตภ3.ง.1', '5');
INSERT INTO `job` VALUES ('10', 'งานตรวจสอบภูมิภาค 2', 'กตภ3.ง.2', '5');
INSERT INTO `job` VALUES ('11', 'งานตรวจสอบภูมิภาค 1', 'กตภ4.ง.1', '6');
INSERT INTO `job` VALUES ('12', 'งานตรวจสอบภูมิภาค 2', 'กตภ4.ง.2', '6');
INSERT INTO `job` VALUES ('13', 'งานตรวจสอบภูมิภาค 1', 'กตภ5.ง.1', '7');
INSERT INTO `job` VALUES ('14', 'งานตรวจสอบภูมิภาค 2', 'กตภ5.ง.2', '7');
INSERT INTO `job` VALUES ('15', 'งานพัฒนางานตรวจสอบ', 'งพต.', '8');
INSERT INTO `job` VALUES ('16', 'งานสนับสนุนงานตรวจสอบ', 'งสต.', '8');
INSERT INTO `job` VALUES ('17', 'บริหารงานหน้าห้องผู้ช่วยผู้ว่าการ', null, '9');

-- ----------------------------
-- Table structure for `log`
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `logID` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) DEFAULT NULL,
  `userIP` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logEvent` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logTypeID` int(10) DEFAULT NULL,
  `logDate` datetime DEFAULT NULL,
  PRIMARY KEY (`logID`),
  KEY `userID` (`userID`),
  KEY `log_ibfk_2` (`logTypeID`),
  CONSTRAINT `log_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  CONSTRAINT `log_ibfk_2` FOREIGN KEY (`logTypeID`) REFERENCES `logtype` (`logTypeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES ('19', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-25 04:00:00');
INSERT INTO `log` VALUES ('20', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-25 04:00:28');
INSERT INTO `log` VALUES ('21', '1', '::1', 'เข้าสู่ระบบ', '1', '2016-07-25 04:00:43');
INSERT INTO `log` VALUES ('22', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-25 05:48:17');
INSERT INTO `log` VALUES ('23', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-25 06:02:55');
INSERT INTO `log` VALUES ('26', '1', '::1', 'เข้าสู่ระบบ', '1', '2016-07-25 06:19:12');
INSERT INTO `log` VALUES ('27', '6', '::1', 'เข้าสู่ระบบ', '1', '2016-07-25 06:27:24');
INSERT INTO `log` VALUES ('28', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-25 06:28:28');
INSERT INTO `log` VALUES ('30', '2', '::1', 'แก้ไขข้อมูลส่วนตัวของ พัฒนา วัฒนากร', '3', '2016-07-25 06:29:38');
INSERT INTO `log` VALUES ('31', '2', '::1', 'แก้ไขข้อมูลส่วนตัวของ พัฒนา วัฒนากร', '3', '2016-07-25 06:30:07');
INSERT INTO `log` VALUES ('32', '2', '::1', 'แก้ไขข้อมูลส่วนตัวของ พัฒนา วัฒนากร', '3', '2016-07-25 06:30:15');
INSERT INTO `log` VALUES ('33', '3', '::1', 'เข้าสู่ระบบ', '1', '2016-07-25 06:31:35');
INSERT INTO `log` VALUES ('34', '3', '::1', 'แก้ไขข้อมูลส่วนตัวของ ธุรการ ส่วนกลาง', '3', '2016-07-25 06:33:11');
INSERT INTO `log` VALUES ('35', '3', '::1', 'เข้าสู่ระบบ', '1', '2016-07-25 11:23:53');
INSERT INTO `log` VALUES ('36', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-25 11:24:54');
INSERT INTO `log` VALUES ('37', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-26 03:54:54');
INSERT INTO `log` VALUES ('38', '3', '::1', 'เข้าสู่ระบบ', '1', '2016-07-26 04:45:48');
INSERT INTO `log` VALUES ('39', '3', '::1', 'เพิ่มฝ่าย ทดสอบ', '3', '2016-07-26 05:03:19');
INSERT INTO `log` VALUES ('40', '3', '::1', 'เพิ่มฝ่าย dsfdsf', '3', '2016-07-26 05:03:21');
INSERT INTO `log` VALUES ('41', '3', '::1', 'แก้ไขข้อมูลหน่วยรับตรวจ  กองบัญชี1 อีเมล์ majirodore@gmail.com1 โทร. 08882444281 ผจก.สาขา ฟฟฟฟฟฟฟฟฟฟ', '3', '2016-07-26 05:07:16');
INSERT INTO `log` VALUES ('42', '3', '::1', 'แก้ไขข้อมูลหน่วยรับตรวจ  กองบัญชี1 อีเมล์ majirodore@gmail.com1 โทร. 08882444281 ผจก.สาขา ฟฟฟฟฟฟฟฟฟฟ', '3', '2016-07-26 05:07:18');
INSERT INTO `log` VALUES ('43', '3', '::1', 'แก้ไขข้อมูลหน่วยรับตรวจ  กองบัญชี1 อีเมล์ majirodore@gmail.com1 โทร. 08882444281 ผจก.สาขา aaaaaaaaaaaa', '3', '2016-07-26 05:08:29');
INSERT INTO `log` VALUES ('44', '3', '::1', 'แก้ไขข้อมูลหน่วยรับตรวจ  กองบัญชี1 อีเมล์ majirodore@gmail.com1 โทร. 08882444281 ผจก.สาขา aaaaaaaaaaaa', '3', '2016-07-26 05:10:16');
INSERT INTO `log` VALUES ('45', '3', '::1', 'เพิ่มฝ่าย fwefwefewfewafds', '3', '2016-07-26 05:12:09');
INSERT INTO `log` VALUES ('46', '3', '::1', 'เพิ่มฝ่าย wdffwddddddddddd', '3', '2016-07-26 05:12:26');
INSERT INTO `log` VALUES ('47', '3', '::1', 'เพิ่มฝ่าย eดำดกหดกดก', '3', '2016-07-26 05:13:27');
INSERT INTO `log` VALUES ('48', '3', '::1', 'แก้ไขข้อมูลผู้ตรวจสอบ  สมยศศศ คชกิจจารักษ์ ตำแหน่ง ผู้อำนวยการกอง ชั้น 9 ฝ่าย 1 กอง 1 งาน 2', '3', '2016-07-26 08:55:54');
INSERT INTO `log` VALUES ('49', '3', '::1', 'แก้ไขข้อมูลผู้ตรวจสอบ  สมยศศ คชกิจจารักษ์ ตำแหน่ง ผู้อำนวยการกอง ชั้น 9 ฝ่าย 1 กอง 1 งาน 2', '3', '2016-07-26 08:56:35');
INSERT INTO `log` VALUES ('50', '3', '::1', 'แก้ไขข้อมูลผู้ตรวจสอบ  สมยศ คชกิจจารักษ์ ตำแหน่ง ผู้อำนวยการกอง ชั้น 9 ฝ่าย 1 กอง 1 งาน 2', '3', '2016-07-26 09:10:05');
INSERT INTO `log` VALUES ('51', '3', '::1', 'แก้ไขข้อมูลผู้ตรวจสอบ  สมยศ คชกิจจารักษ์ ตำแหน่ง ผู้อำนวยการกอง ชั้น 9 ฝ่าย 1 กอง 1 งาน 2', '3', '2016-07-26 09:12:15');
INSERT INTO `log` VALUES ('52', '3', '::1', 'แก้ไขข้อมูลผู้ตรวจสอบ  สมยศL คชกิจจารักษ์ ตำแหน่ง ผู้อำนวยการกอง ชั้น 9 ฝ่าย 1 กอง 1 งาน 2', '3', '2016-07-26 09:16:17');
INSERT INTO `log` VALUES ('53', '3', '::1', 'แก้ไขข้อมูลผู้ตรวจสอบ  สมยศ คชกิจจารักษ์ ตำแหน่ง ผู้อำนวยการกอง ชั้น 9 ฝ่าย 1 กอง 1 งาน 2', '3', '2016-07-26 09:16:25');
INSERT INTO `log` VALUES ('54', '1', '::1', 'เข้าสู่ระบบ', '1', '2016-07-26 09:24:07');
INSERT INTO `log` VALUES ('55', '3', '::1', 'เข้าสู่ระบบ', '1', '2016-07-26 09:24:21');
INSERT INTO `log` VALUES ('56', '4', '::1', 'เข้าสู่ระบบ', '1', '2016-07-26 09:31:01');
INSERT INTO `log` VALUES ('57', '3', '::1', 'เข้าสู่ระบบ', '1', '2016-07-26 09:44:14');
INSERT INTO `log` VALUES ('58', '3', '::1', 'อนุมัติการออกตรวจ การบริหารจัดการลดน้ำสูญเสีย (DMA)', '3', '2016-07-26 10:16:06');
INSERT INTO `log` VALUES ('59', '3', '::1', 'อนุมัติการออกตรวจ การบริหารจัดการลดน้ำสูญเสีย (DMA)', '3', '2016-07-26 10:22:22');
INSERT INTO `log` VALUES ('61', '6', '::1', 'เข้าสู่ระบบ', '1', '2016-07-26 10:27:56');
INSERT INTO `log` VALUES ('62', '6', '::1', 'เพิ่มข้อมูลการออกตรวจ การจัดทำรายงานทางการเงิน', '3', '2016-07-26 10:31:17');
INSERT INTO `log` VALUES ('63', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-26 10:31:27');
INSERT INTO `log` VALUES ('64', '3', '::1', 'เข้าสู่ระบบ', '1', '2016-07-26 10:31:48');
INSERT INTO `log` VALUES ('65', '3', '::1', 'อนุมัติการออกตรวจ การบริหารจัดการลดน้ำสูญเสีย (DMA)', '3', '2016-07-26 10:31:58');
INSERT INTO `log` VALUES ('66', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-26 10:32:05');
INSERT INTO `log` VALUES ('67', '3', '::1', 'เข้าสู่ระบบ', '1', '2016-07-26 10:32:48');
INSERT INTO `log` VALUES ('68', '6', '::1', 'เข้าสู่ระบบ', '1', '2016-07-26 10:47:18');
INSERT INTO `log` VALUES ('69', '6', '::1', 'เพิ่มข้อมูลการออกตรวจ การวางแผนเชิงกลยุทธ์', '3', '2016-07-26 10:48:42');
INSERT INTO `log` VALUES ('70', '3', '::1', 'เข้าสู่ระบบ', '1', '2016-07-26 10:48:51');
INSERT INTO `log` VALUES ('71', '3', '::1', 'อนุมัติการออกตรวจ การวางแผนเชิงกลยุทธ์', '3', '2016-07-26 10:49:08');
INSERT INTO `log` VALUES ('72', '3', '::1', 'อนุมัติการออกตรวจ การวางแผนเชิงกลยุทธ์', '3', '2016-07-26 10:50:29');
INSERT INTO `log` VALUES ('73', '3', '::1', 'อนุมัติการออกตรวจ การบริหารจัดการลดน้ำสูญเสีย (DMA)', '3', '2016-07-26 11:03:45');
INSERT INTO `log` VALUES ('74', '3', '::1', 'ยกเลิกการออกตรวจ การจัดทำรายงานทางการเงิน', '3', '2016-07-26 11:04:09');
INSERT INTO `log` VALUES ('75', '5', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 04:14:37');
INSERT INTO `log` VALUES ('76', '4', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 04:33:18');
INSERT INTO `log` VALUES ('77', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 06:29:50');
INSERT INTO `log` VALUES ('78', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 06:55:46');
INSERT INTO `log` VALUES ('79', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 06:58:30');
INSERT INTO `log` VALUES ('80', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 06:59:06');
INSERT INTO `log` VALUES ('81', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 07:00:37');
INSERT INTO `log` VALUES ('82', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 07:01:08');
INSERT INTO `log` VALUES ('83', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 07:03:24');
INSERT INTO `log` VALUES ('84', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 07:32:21');
INSERT INTO `log` VALUES ('85', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 07:35:13');
INSERT INTO `log` VALUES ('86', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 08:03:14');
INSERT INTO `log` VALUES ('87', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 08:04:17');
INSERT INTO `log` VALUES ('88', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 08:06:00');
INSERT INTO `log` VALUES ('89', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 08:07:40');
INSERT INTO `log` VALUES ('90', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 08:10:19');
INSERT INTO `log` VALUES ('91', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 08:10:53');
INSERT INTO `log` VALUES ('92', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 08:11:54');
INSERT INTO `log` VALUES ('93', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 08:14:07');
INSERT INTO `log` VALUES ('94', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 08:14:52');
INSERT INTO `log` VALUES ('95', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 08:15:17');
INSERT INTO `log` VALUES ('96', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 08:15:20');
INSERT INTO `log` VALUES ('97', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 08:21:28');
INSERT INTO `log` VALUES ('98', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 08:22:10');
INSERT INTO `log` VALUES ('99', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 08:24:29');
INSERT INTO `log` VALUES ('100', '1', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 08:41:39');
INSERT INTO `log` VALUES ('101', '1', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 08:44:59');
INSERT INTO `log` VALUES ('102', '1', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 08:45:41');
INSERT INTO `log` VALUES ('103', '3', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 08:48:51');
INSERT INTO `log` VALUES ('104', '5', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 08:52:53');
INSERT INTO `log` VALUES ('105', '4', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 09:29:55');
INSERT INTO `log` VALUES ('106', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 09:30:35');
INSERT INTO `log` VALUES ('107', '5', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 09:30:48');
INSERT INTO `log` VALUES ('108', '3', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 10:00:30');
INSERT INTO `log` VALUES ('109', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 10:00:43');
INSERT INTO `log` VALUES ('110', '2', '::1', 'เพิ่มข้อมูลการออกตรวจ การควบคุมทั่วไป (ITGC)', '3', '2016-07-27 10:04:57');
INSERT INTO `log` VALUES ('111', '3', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 10:05:46');
INSERT INTO `log` VALUES ('112', '3', '::1', 'อนุมัติการออกตรวจ การควบคุมทั่วไป (ITGC)', '3', '2016-07-27 10:05:52');
INSERT INTO `log` VALUES ('113', '4', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 10:06:00');
INSERT INTO `log` VALUES ('114', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-27 10:06:36');
INSERT INTO `log` VALUES ('115', '5', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 10:06:54');
INSERT INTO `log` VALUES ('116', '3', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 10:33:58');
INSERT INTO `log` VALUES ('117', '5', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 10:36:56');
INSERT INTO `log` VALUES ('118', '3', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 10:37:27');
INSERT INTO `log` VALUES ('119', '3', '::1', 'อนุมัติการออกตรวจ การวางแผนเชิงกลยุทธ์', '3', '2016-07-27 10:37:32');
INSERT INTO `log` VALUES ('120', '5', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 10:37:52');
INSERT INTO `log` VALUES ('121', '7', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 10:40:57');
INSERT INTO `log` VALUES ('122', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 10:49:23');
INSERT INTO `log` VALUES ('123', '5', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 10:53:34');
INSERT INTO `log` VALUES ('124', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-27 11:05:42');
INSERT INTO `log` VALUES ('125', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-28 09:38:21');
INSERT INTO `log` VALUES ('126', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-29 03:20:52');
INSERT INTO `log` VALUES ('127', '5', '::1', 'เข้าสู่ระบบ', '1', '2016-07-29 04:07:19');
INSERT INTO `log` VALUES ('128', '4', '::1', 'เข้าสู่ระบบ', '1', '2016-07-29 04:15:25');
INSERT INTO `log` VALUES ('129', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-29 04:16:04');
INSERT INTO `log` VALUES ('130', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-29 04:18:50');
INSERT INTO `log` VALUES ('131', '2', '::1', 'เพิ่มข้อมูลการออกตรวจ GIS', '3', '2016-07-29 04:19:22');
INSERT INTO `log` VALUES ('132', '3', '::1', 'เข้าสู่ระบบ', '1', '2016-07-29 04:19:30');
INSERT INTO `log` VALUES ('133', '3', '::1', 'อนุมัติการออกตรวจ GIS', '3', '2016-07-29 04:19:40');
INSERT INTO `log` VALUES ('134', '4', '::1', 'เข้าสู่ระบบ', '1', '2016-07-29 04:19:47');
INSERT INTO `log` VALUES ('135', '4', '::1', 'ส่งแบบประเมิน', '3', '2016-07-29 04:20:20');
INSERT INTO `log` VALUES ('136', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-29 04:25:48');
INSERT INTO `log` VALUES ('137', '6', '::1', 'เข้าสู่ระบบ', '1', '2016-07-29 07:48:15');
INSERT INTO `log` VALUES ('138', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-29 09:02:46');
INSERT INTO `log` VALUES ('139', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-29 09:05:03');
INSERT INTO `log` VALUES ('140', '4', '::1', 'เข้าสู่ระบบ', '1', '2016-07-29 10:06:20');
INSERT INTO `log` VALUES ('141', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-29 10:29:19');
INSERT INTO `log` VALUES ('142', '5', '::1', 'เข้าสู่ระบบ', '1', '2016-07-29 10:34:46');
INSERT INTO `log` VALUES ('143', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-07-29 10:39:44');
INSERT INTO `log` VALUES ('144', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-08-01 04:24:27');
INSERT INTO `log` VALUES ('145', '5', '::1', 'เข้าสู่ระบบ', '1', '2016-08-01 05:13:25');
INSERT INTO `log` VALUES ('146', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-08-01 05:39:38');
INSERT INTO `log` VALUES ('147', '5', '::1', 'เข้าสู่ระบบ', '1', '2016-08-01 11:05:44');
INSERT INTO `log` VALUES ('148', '5', '::1', 'เข้าสู่ระบบ', '1', '2016-08-02 04:10:42');
INSERT INTO `log` VALUES ('149', '3', '::1', 'เข้าสู่ระบบ', '1', '2016-08-02 09:04:42');
INSERT INTO `log` VALUES ('150', '2', '::1', 'เข้าสู่ระบบ', '1', '2016-08-02 09:05:07');
INSERT INTO `log` VALUES ('151', '2', '::1', 'เพิ่มข้อมูลการออกตรวจ SCADA', '3', '2016-08-02 09:05:51');
INSERT INTO `log` VALUES ('152', '3', '::1', 'เข้าสู่ระบบ', '1', '2016-08-02 09:06:35');

-- ----------------------------
-- Table structure for `logtype`
-- ----------------------------
DROP TABLE IF EXISTS `logtype`;
CREATE TABLE `logtype` (
  `logTypeID` int(10) NOT NULL,
  `logTypeName` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`logTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of logtype
-- ----------------------------
INSERT INTO `logtype` VALUES ('1', 'เข้าสู่ระบบ');
INSERT INTO `logtype` VALUES ('2', 'เพิ่มข้อมูล');
INSERT INTO `logtype` VALUES ('3', 'แก้ไขข้อมูล');

-- ----------------------------
-- Table structure for `party`
-- ----------------------------
DROP TABLE IF EXISTS `party`;
CREATE TABLE `party` (
  `partyID` int(10) NOT NULL AUTO_INCREMENT,
  `partyName` varchar(200) DEFAULT NULL,
  `partySynName` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`partyID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of party
-- ----------------------------
INSERT INTO `party` VALUES ('1', 'ฝ่ายตรวจสอบหน่วยงานส่วนกลาง', 'ฝตก.');
INSERT INTO `party` VALUES ('2', '	ฝ่ายตรวจสอบหน่วยงานส่วนภูมิภาค', 'ฝตภ.');
INSERT INTO `party` VALUES ('3', 'ผู้ช่วยผู้ว่าการ (สำนักตรวจสอบ)', 'ผชต.');

-- ----------------------------
-- Table structure for `process`
-- ----------------------------
DROP TABLE IF EXISTS `process`;
CREATE TABLE `process` (
  `processID` int(10) NOT NULL AUTO_INCREMENT,
  `processName` varchar(200) DEFAULT NULL,
  `teamID` int(10) DEFAULT NULL,
  `pwaBranchID` int(10) DEFAULT NULL,
  `beginDate` date DEFAULT NULL,
  `finishDate` date DEFAULT NULL,
  `quarter` int(1) DEFAULT NULL,
  `fiscalYear` int(4) DEFAULT NULL,
  `approveDate` date DEFAULT NULL,
  `approveBy` int(10) DEFAULT NULL,
  `processStatusID` int(10) DEFAULT NULL,
  PRIMARY KEY (`processID`),
  KEY `process_ibfk_5` (`processStatusID`),
  KEY `teamID` (`teamID`),
  KEY `pwaBranchID` (`pwaBranchID`),
  KEY `approveBy` (`approveBy`),
  CONSTRAINT `process_ibfk_12` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`),
  CONSTRAINT `process_ibfk_13` FOREIGN KEY (`pwaBranchID`) REFERENCES `pwabranch` (`pwaBranchID`),
  CONSTRAINT `process_ibfk_14` FOREIGN KEY (`approveBy`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `process_ibfk_5` FOREIGN KEY (`processStatusID`) REFERENCES `processstatus` (`processStatusID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of process
-- ----------------------------
INSERT INTO `process` VALUES ('45', 'การบริหารจัดการลดน้ำสูญเสีย (DMA)', '1', '23', '2016-02-01', '2016-03-01', '2', '2559', '2016-07-26', '3', '4');
INSERT INTO `process` VALUES ('46', 'การจัดทำรายงานทางการเงิน', '2', '33', '2016-05-01', '2016-06-01', '3', '2559', '2016-07-26', '3', '3');
INSERT INTO `process` VALUES ('47', 'การวางแผนเชิงกลยุทธ์', '2', '34', '2016-06-01', '2016-07-01', '3', '2559', '2016-07-27', '3', '2');
INSERT INTO `process` VALUES ('48', 'การควบคุมทั่วไป (ITGC)', '1', '32', '2016-04-01', '2016-05-12', '3', '2559', '2016-07-27', '3', '2');
INSERT INTO `process` VALUES ('49', 'GIS', '78', '26', '2016-07-01', '2016-07-31', '4', '2559', '2016-07-29', '3', '4');
INSERT INTO `process` VALUES ('50', 'SCADA', '1', '26', '2016-04-01', '2016-05-07', '3', '2559', null, null, '1');

-- ----------------------------
-- Table structure for `processstatus`
-- ----------------------------
DROP TABLE IF EXISTS `processstatus`;
CREATE TABLE `processstatus` (
  `processStatusID` int(10) NOT NULL,
  `processStatusName` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`processStatusID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of processstatus
-- ----------------------------
INSERT INTO `processstatus` VALUES ('1', 'รอการอนุมัติ');
INSERT INTO `processstatus` VALUES ('2', 'อนุมัติแล้ว');
INSERT INTO `processstatus` VALUES ('3', 'ถูกยกเลิก');
INSERT INTO `processstatus` VALUES ('4', 'ได้รับการประเมินแล้ว');

-- ----------------------------
-- Table structure for `pwabranch`
-- ----------------------------
DROP TABLE IF EXISTS `pwabranch`;
CREATE TABLE `pwabranch` (
  `pwaBranchID` int(10) NOT NULL AUTO_INCREMENT,
  `pwaBranchName` varchar(200) DEFAULT NULL,
  `pwaRegID` int(10) DEFAULT NULL,
  `pwaBranchEmail` varchar(200) DEFAULT NULL,
  `pwaBranchTel` varchar(200) DEFAULT NULL,
  `pwaBranchManager` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`pwaBranchID`),
  KEY `pwaRegID` (`pwaRegID`),
  CONSTRAINT `pwabranch_ibfk_1` FOREIGN KEY (`pwaRegID`) REFERENCES `pwareg` (`pwaRegID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pwabranch
-- ----------------------------
INSERT INTO `pwabranch` VALUES ('1', 'กปภ.เขต 1', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('2', 'กปภ.สาขาชลบุรี (ชั้นพิเศษ)', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('3', 'กปภ.สาขาพัทยา (ชั้นพิเศษ)', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('4', 'กปภ.สาขาบ้านบึง', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('5', 'กปภ.สาขาพนัสนิคม', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('6', 'กปภ.สาขาศรีราชา', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('7', 'กปภ.สาขาแหลมฉบัง', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('8', 'กปภ.สาขาฉะเชิงเทรา', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('9', 'กปภ.สาขาบางปะกง', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('10', 'กปภ.สาขาบางคล้า', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('11', 'กปภ.สาขาพนมสารคาม', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('12', 'กปภ.สาขาระยอง', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('13', 'กปภ.สาขาบ้านฉาง', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('14', 'กปภ.สาขาปากน้ำประแสร์', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('15', 'กปภ.สาขาจันทบุรี', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('16', 'กปภ.สาขาขลุง', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('17', 'กปภ.สาขาตราด', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('18', 'กปภ.สาขาคลองใหญ่', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('19', 'กปภ.สาขาสระแก้ว', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('20', 'กปภ.สาขาวัฒนานคร', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('21', 'กปภ.สาขาอรัญประเทศ', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('22', 'กปภ.สาขาปราจีนบุรี', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('23', 'กปภ.สาขากบินทร์บุรี', '1', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('24', 'การประปาส่วนภูมิภาคเขต 2', '2', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('25', 'การประปาส่วนภูมิภาคเขต 3', '3', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('26', 'การประปาส่วนภูมิภาคเขต 4', '4', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('27', 'การประปาส่วนภูมิภาคเขต 5', '5', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('28', 'การประปาส่วนภูมิภาคเขต 6', '6', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('29', 'การประปาส่วนภูมิภาคเขต 7', '7', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('30', 'การประปาส่วนภูมิภาคเขต 8', '8', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('31', 'การประปาส่วนภูมิภาคเขต 9', '9', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('32', 'การประปาส่วนภูมิภาคเขต 10', '10', 'majirodore@gmail.com', '0888244428', null);
INSERT INTO `pwabranch` VALUES ('33', 'กองบัญชี', '11', 'majirodore@gmail.com1', '08882444281', 'aaaaaaaaaaaa');
INSERT INTO `pwabranch` VALUES ('34', 'กองแผนงานโครงการ 1', '11', null, null, null);

-- ----------------------------
-- Table structure for `pwareg`
-- ----------------------------
DROP TABLE IF EXISTS `pwareg`;
CREATE TABLE `pwareg` (
  `pwaRegID` int(10) NOT NULL AUTO_INCREMENT,
  `pwaRegName` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pwaRegID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pwareg
-- ----------------------------
INSERT INTO `pwareg` VALUES ('1', 'การประปาส่วนภูมิภาคเขต 1');
INSERT INTO `pwareg` VALUES ('2', 'การประปาส่วนภูมิภาคเขต 2');
INSERT INTO `pwareg` VALUES ('3', 'การประปาส่วนภูมิภาคเขต 3');
INSERT INTO `pwareg` VALUES ('4', 'การประปาส่วนภูมิภาคเขต 4');
INSERT INTO `pwareg` VALUES ('5', 'การประปาส่วนภูมิภาคเขต 5');
INSERT INTO `pwareg` VALUES ('6', 'การประปาส่วนภูมิภาคเขต 6');
INSERT INTO `pwareg` VALUES ('7', 'การประปาส่วนภูมิภาคเขต 7');
INSERT INTO `pwareg` VALUES ('8', 'การประปาส่วนภูมิภาคเขต 8');
INSERT INTO `pwareg` VALUES ('9', 'การประปาส่วนภูมิภาคเขต 9');
INSERT INTO `pwareg` VALUES ('10', 'การประปาส่วนภูมิภาคเขต 10');
INSERT INTO `pwareg` VALUES ('11', 'การประปาส่วนภูมิภาค สำนักงานใหญ่');

-- ----------------------------
-- Table structure for `question`
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `questionID` int(10) NOT NULL AUTO_INCREMENT,
  `questionName` text,
  `questionTypeID` int(10) DEFAULT NULL,
  `questionaireID` int(10) DEFAULT NULL,
  `questionMethodID` int(10) DEFAULT NULL,
  PRIMARY KEY (`questionID`),
  KEY `questionaireID` (`questionaireID`),
  KEY `question_ibfk_2` (`questionMethodID`),
  KEY `questionTypeID` (`questionTypeID`),
  CONSTRAINT `question_ibfk_1` FOREIGN KEY (`questionaireID`) REFERENCES `questionaire` (`questionaireID`),
  CONSTRAINT `question_ibfk_2` FOREIGN KEY (`questionMethodID`) REFERENCES `questionmethod` (`questionMethodID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `question_ibfk_3` FOREIGN KEY (`questionTypeID`) REFERENCES `questiontype` (`questionTypeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('0', 'ข้อเสนอแนะอื่นๆ', null, '2', '2');
INSERT INTO `question` VALUES ('1', 'ผู้ตรวจสอบมีทักษะในการสื่อสารที่ชัดเจนและมีประสิทธิภาพ', '1', '1', '1');
INSERT INTO `question` VALUES ('2', 'ผู้ตรวจสอบรับฟังความคิดเห็นและข้อชี้แจงของหน่วยรับตรวจ', '1', '1', '1');
INSERT INTO `question` VALUES ('3', 'ผู้ตรวจสอบปฏิบัติงานด้วยความสุภาพ เรียบร้อย เป็นกันเอง', '1', '1', '1');
INSERT INTO `question` VALUES ('4', 'ผู้ตรวจสอบปฏิบัติงานด้วยความเที่ยงธรรม และเป็นอิสระ', '1', '1', '1');
INSERT INTO `question` VALUES ('5', 'ผู้ตรวจสอบแสดงออกถึงความสามัคคี และมีความสัมพันธ์ที่ดีในการปฏิบัติงานของทีมงาน', '1', '1', '1');
INSERT INTO `question` VALUES ('6', 'ผู้ตรวจสอบอธิบายขอบเขต วัตถุประสงค์การตรวจสอบ และขั้นตอนการตรวจสอบอย่างชัดเจน', '2', '1', '1');
INSERT INTO `question` VALUES ('7', 'การปฏิบัติงานของผู้ตรวจสอบไม่เป็นอุปสรรค ในการปฏิบัติงานปกติ ของหน่วยรับตรวจ', '2', '1', '1');
INSERT INTO `question` VALUES ('8', 'มีการแจ้งขอข้อมูล/เอกสาร ก่อนการเข้าตรวจสอบฯ', '2', '1', '1');
INSERT INTO `question` VALUES ('9', 'ผู้ตรวจสอบให้คำแนะนำ คำปรึกษา เกี่ยวกับเรื่องที่ตรวจสอบ รวมถึงระเบียบ ข้อบังคับที่เกี่ยวข้องอย่างชัดเจนเหมาะสม', '2', '1', '1');
INSERT INTO `question` VALUES ('10', 'สรุปผลการตรวจสอบ เนื้อหาชัดเจน อ่านเข้าใจง่าย และเป็นเหตุเป็นผล', '3', '1', '1');
INSERT INTO `question` VALUES ('11', 'สรุปผลการตรวจสอบ ชี้ให้ท่านทราบถึงความเสี่ยงและการควบคุมภายในของกระบวนการ/กิจกรรมที่ได้รับการตรวจสอบ', '3', '1', '1');
INSERT INTO `question` VALUES ('12', 'ข้อเสนอแนะของผู้ตรวจสอบสามารถนำไปปรับปรุงแก้ไขได้', '3', '1', '1');
INSERT INTO `question` VALUES ('13', 'การปฏิบัติงานตรวจสอบโดยรวมเป็นประโยชน์และมีประสิทธิภาพ', '3', '1', '1');
INSERT INTO `question` VALUES ('14', 'ความขยันหมั่นเพียรในการทำงาน', null, '3', '1');
INSERT INTO `question` VALUES ('15', 'ให้คำแนะนำ ปรึกษา ที่เป็นประโยชน์', null, '3', '1');
INSERT INTO `question` VALUES ('16', 'มีทักษะการแก้ไขปัญหาในการปฏิบัติงาน', null, '3', '1');
INSERT INTO `question` VALUES ('17', 'ปฏิบัติหน้าที่ด้วยความเที่ยงธรรม', null, '3', '1');
INSERT INTO `question` VALUES ('18', 'มีความสุภาพ เรียบร้อย เป็นกันเอง', null, '3', '1');
INSERT INTO `question` VALUES ('63', 'ผู้ตรวจสอบมีทักษะในการสื่อสารที่ชัดเจนและมีประสิทธิภาพ', '6', '2', '1');
INSERT INTO `question` VALUES ('64', 'ผู้ตรวจสอบรับฟังความคิดเห็นและข้อชี้แจงของหน่วยรับตรวจ', '6', '2', '1');
INSERT INTO `question` VALUES ('65', 'ผู้ตรวจสอบปฏิบัติงานด้วยความสุภาพ เรียบร้อย เป็นกันเอง', '6', '2', '1');
INSERT INTO `question` VALUES ('66', 'ผู้ตรวจสอบปฏิบัติงานด้วยความเที่ยงธรรม และเป็นอิสระ', '6', '2', '1');
INSERT INTO `question` VALUES ('67', 'ผู้ตรวจสอบแสดงออกถึงความสามัคคี และมีความสัมพันธ์ที่ดีในการปฏิบัติงานของทีมงาน', '6', '2', '1');
INSERT INTO `question` VALUES ('68', 'ผู้ตรวจสอบอธิบายขอบเขต วัตถุประสงค์การตรวจสอบ และขั้นตอนการตรวจสอบอย่างชัดเจน', '7', '2', '1');
INSERT INTO `question` VALUES ('69', 'การปฏิบัติงานของผู้ตรวจสอบไม่เป็นอุปสรรค ในการปฏิบัติงานปกติ ของหน่วยรับตรวจ', '7', '2', '1');
INSERT INTO `question` VALUES ('70', 'มีการแจ้งขอข้อมูล/เอกสาร ก่อนการเข้าตรวจสอบฯ', '7', '2', '1');
INSERT INTO `question` VALUES ('71', 'ผู้ตรวจสอบให้คำแนะนำ คำปรึกษา เกี่ยวกับเรื่องที่ตรวจสอบ รวมถึงระเบียบ ข้อบังคับที่เกี่ยวข้องอย่างชัดเจนเหมาะสม', '7', '2', '1');
INSERT INTO `question` VALUES ('72', 'สรุปผลการตรวจสอบ เนื้อหาชัดเจน อ่านเข้าใจง่าย และเป็นเหตุเป็นผล', '8', '2', '1');
INSERT INTO `question` VALUES ('73', 'สรุปผลการตรวจสอบ ชี้ให้ท่านทราบถึงความเสี่ยงและการควบคุมภายในของกระบวนการ/กิจกรรมที่ได้รับการตรวจสอบ', '8', '2', '1');
INSERT INTO `question` VALUES ('74', 'ข้อเสนอแนะของผู้ตรวจสอบสามารถนำไปปรับปรุงแก้ไขได้', '8', '2', '1');
INSERT INTO `question` VALUES ('75', 'การปฏิบัติงานตรวจสอบโดยรวมเป็นประโยชน์และมีประสิทธิภาพ', '8', '2', '1');
INSERT INTO `question` VALUES ('81', 'หน่วยรับตรวจได้รับแจ้งให้ทราบล่วงหน้าเป็นลายลักษณ์อักษร/ทาง E-mail ของหน่วยงานเกี่ยวกับกำหนดการตรวจสอบ วัตถุประสงค์และขอบเขตการตรวจสอบของผู้ตรวจสอบ', '9', '2', '1');
INSERT INTO `question` VALUES ('82', 'ผู้ตรวจสอบมีการลงเวลาปฏิบัติงานทั้งไปและกลับที่หน่วยรับตรวจ (ยกเว้นผู้ตรวจสอบที่ตรวจสอบสำนักงานใหญ่)', '9', '2', '1');

-- ----------------------------
-- Table structure for `questionaire`
-- ----------------------------
DROP TABLE IF EXISTS `questionaire`;
CREATE TABLE `questionaire` (
  `questionaireID` int(10) NOT NULL AUTO_INCREMENT,
  `questionaireName` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `questionaireYear` int(10) DEFAULT NULL,
  PRIMARY KEY (`questionaireID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of questionaire
-- ----------------------------
INSERT INTO `questionaire` VALUES ('1', 'ผลการประเมินการปฏิบัติงานของผู้ตรวจสอบ ปี 2559 (เก่า)', '2559');
INSERT INTO `questionaire` VALUES ('2', 'ผลการประเมินการปฏิบัติงานของผู้ตรวจสอบ ปี 2559', '2559');
INSERT INTO `questionaire` VALUES ('3', 'การประเมินผลรายบุคคล', '2559');

-- ----------------------------
-- Table structure for `questionmethod`
-- ----------------------------
DROP TABLE IF EXISTS `questionmethod`;
CREATE TABLE `questionmethod` (
  `questionMethodID` int(10) NOT NULL AUTO_INCREMENT,
  `questionMethodName` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`questionMethodID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of questionmethod
-- ----------------------------
INSERT INTO `questionmethod` VALUES ('1', '5 radio buttons');
INSERT INTO `questionmethod` VALUES ('2', 'textbox');

-- ----------------------------
-- Table structure for `questiontype`
-- ----------------------------
DROP TABLE IF EXISTS `questiontype`;
CREATE TABLE `questiontype` (
  `questionTypeID` int(10) NOT NULL,
  `questionTypeName` varchar(500) DEFAULT NULL,
  `questionaireID` int(10) DEFAULT NULL,
  PRIMARY KEY (`questionTypeID`),
  KEY `questionaireID` (`questionaireID`),
  CONSTRAINT `questiontype_ibfk_1` FOREIGN KEY (`questionaireID`) REFERENCES `questionaire` (`questionaireID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of questiontype
-- ----------------------------
INSERT INTO `questiontype` VALUES ('1', 'ด้านคุณสมบัติและลักษณะการทำงานของทีมตรวจสอบ', '1');
INSERT INTO `questiontype` VALUES ('2', 'ด้านการปฏิบัติงาน', '1');
INSERT INTO `questiontype` VALUES ('3', 'ด้านสรุปผลการตรวจสอบ (ณ วันปิดประชุมการตรวจสอบ)', '1');
INSERT INTO `questiontype` VALUES ('4', 'ข้อมูลทั่วไป', '1');
INSERT INTO `questiontype` VALUES ('5', 'การประเมินผลรายบุคคล', '1');
INSERT INTO `questiontype` VALUES ('6', 'ด้านคุณสมบัติและลักษณะการทำงานของทีมตรวจสอบ', '2');
INSERT INTO `questiontype` VALUES ('7', 'ด้านการปฏิบัติงาน', '2');
INSERT INTO `questiontype` VALUES ('8', 'ด้านสรุปผลการตรวจสอบ (ณ วันปิดประชุมการตรวจสอบ)', '2');
INSERT INTO `questiontype` VALUES ('9', 'ข้อมูลทั่วไป', '2');

-- ----------------------------
-- Table structure for `scoreperson`
-- ----------------------------
DROP TABLE IF EXISTS `scoreperson`;
CREATE TABLE `scoreperson` (
  `scorePersonID` int(10) NOT NULL AUTO_INCREMENT,
  `questionID` int(10) NOT NULL,
  `auditorID` int(10) NOT NULL,
  `processID` int(10) NOT NULL,
  `scorePoint` int(10) DEFAULT NULL,
  `questionaireID` int(10) DEFAULT NULL,
  `submitDate` date DEFAULT NULL,
  `quarter` int(1) DEFAULT NULL,
  `fiscalYear` int(4) DEFAULT NULL,
  `editDate` date DEFAULT NULL,
  `editBy` int(10) DEFAULT NULL,
  PRIMARY KEY (`scorePersonID`),
  KEY `questionID` (`questionID`),
  KEY `auditorID` (`auditorID`),
  KEY `questionaireID` (`questionaireID`),
  KEY `editBy` (`editBy`),
  KEY `scoreperson_ibfk_3` (`processID`),
  CONSTRAINT `scoreperson_ibfk_1` FOREIGN KEY (`questionID`) REFERENCES `question` (`questionID`),
  CONSTRAINT `scoreperson_ibfk_2` FOREIGN KEY (`auditorID`) REFERENCES `auditor` (`auditorID`),
  CONSTRAINT `scoreperson_ibfk_3` FOREIGN KEY (`processID`) REFERENCES `process` (`processID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `scoreperson_ibfk_4` FOREIGN KEY (`questionaireID`) REFERENCES `questionaire` (`questionaireID`),
  CONSTRAINT `scoreperson_ibfk_5` FOREIGN KEY (`editBy`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of scoreperson
-- ----------------------------
INSERT INTO `scoreperson` VALUES ('261', '14', '16', '45', '5', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('262', '15', '16', '45', '4', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('263', '16', '16', '45', '3', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('264', '17', '16', '45', '2', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('265', '18', '16', '45', '1', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('266', '14', '17', '45', '2', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('267', '15', '17', '45', '3', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('268', '16', '17', '45', '4', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('269', '17', '17', '45', '5', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('270', '18', '17', '45', '4', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('271', '14', '18', '45', '3', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('272', '15', '18', '45', '2', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('273', '16', '18', '45', '1', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('274', '17', '18', '45', '2', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('275', '18', '18', '45', '3', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('276', '14', '19', '45', '4', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('277', '15', '19', '45', '5', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('278', '16', '19', '45', '4', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('279', '17', '19', '45', '3', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('280', '18', '19', '45', '2', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('281', '14', '14', '49', '2', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('282', '15', '14', '49', '3', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('283', '16', '14', '49', '4', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('284', '17', '14', '49', '5', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('285', '18', '14', '49', '4', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('286', '14', '16', '49', '3', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('287', '15', '16', '49', '2', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('288', '16', '16', '49', '1', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('289', '17', '16', '49', '2', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('290', '18', '16', '49', '3', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('291', '14', '17', '49', '4', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('292', '15', '17', '49', '5', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('293', '16', '17', '49', '4', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('294', '17', '17', '49', '3', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('295', '18', '17', '49', '2', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('296', '14', '19', '49', '1', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('297', '15', '19', '49', '2', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('298', '16', '19', '49', '3', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('299', '17', '19', '49', '4', '2', '2016-07-29', '4', '2559', null, null);
INSERT INTO `scoreperson` VALUES ('300', '18', '19', '49', '5', '2', '2016-07-29', '4', '2559', null, null);

-- ----------------------------
-- Table structure for `scoreteam`
-- ----------------------------
DROP TABLE IF EXISTS `scoreteam`;
CREATE TABLE `scoreteam` (
  `scoreTeamID` int(10) NOT NULL AUTO_INCREMENT,
  `questionID` int(10) NOT NULL,
  `processID` int(10) NOT NULL,
  `scorePoint` int(10) DEFAULT NULL,
  `submitDate` date DEFAULT NULL,
  `questionaireID` int(10) DEFAULT NULL,
  `quarter` int(1) DEFAULT NULL,
  `fiscalYear` int(4) DEFAULT NULL,
  `editDate` date DEFAULT NULL,
  `editBy` int(10) DEFAULT NULL,
  PRIMARY KEY (`scoreTeamID`),
  KEY `questionID` (`questionID`),
  KEY `questionaireID` (`questionaireID`),
  KEY `editBy` (`editBy`),
  KEY `scoreteam_ibfk_2` (`processID`),
  CONSTRAINT `scoreteam_ibfk_1` FOREIGN KEY (`questionID`) REFERENCES `question` (`questionID`),
  CONSTRAINT `scoreteam_ibfk_2` FOREIGN KEY (`processID`) REFERENCES `process` (`processID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `scoreteam_ibfk_3` FOREIGN KEY (`questionaireID`) REFERENCES `questionaire` (`questionaireID`),
  CONSTRAINT `scoreteam_ibfk_4` FOREIGN KEY (`editBy`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of scoreteam
-- ----------------------------
INSERT INTO `scoreteam` VALUES ('196', '63', '45', '1', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('197', '64', '45', '2', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('198', '65', '45', '3', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('199', '66', '45', '4', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('200', '67', '45', '5', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('201', '68', '45', '4', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('202', '69', '45', '3', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('203', '70', '45', '2', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('204', '71', '45', '1', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('205', '72', '45', '2', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('206', '73', '45', '3', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('207', '74', '45', '4', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('208', '75', '45', '5', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('209', '81', '45', '4', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('210', '82', '45', '3', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('211', '63', '49', '5', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('212', '64', '49', '5', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('213', '65', '49', '5', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('214', '66', '49', '5', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('215', '67', '49', '5', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('216', '68', '49', '4', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('217', '69', '49', '4', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('218', '70', '49', '4', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('219', '71', '49', '4', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('220', '72', '49', '3', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('221', '73', '49', '3', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('222', '74', '49', '3', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('223', '75', '49', '3', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('224', '81', '49', '2', '2016-07-29', '2', '4', '2559', null, null);
INSERT INTO `scoreteam` VALUES ('225', '82', '49', '2', '2016-07-29', '2', '4', '2559', null, null);

-- ----------------------------
-- Table structure for `team`
-- ----------------------------
DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
  `teamID` int(10) NOT NULL AUTO_INCREMENT,
  `head` int(10) DEFAULT NULL,
  `member1` int(10) DEFAULT NULL,
  `member2` int(10) DEFAULT NULL,
  `member3` int(10) DEFAULT NULL,
  `userID` int(10) DEFAULT NULL,
  PRIMARY KEY (`teamID`),
  KEY `head` (`head`),
  KEY `member1` (`member1`),
  KEY `member2` (`member2`),
  KEY `member3` (`member3`),
  KEY `userID` (`userID`),
  CONSTRAINT `team_ibfk_1` FOREIGN KEY (`head`) REFERENCES `auditor` (`auditorID`),
  CONSTRAINT `team_ibfk_2` FOREIGN KEY (`member1`) REFERENCES `auditor` (`auditorID`),
  CONSTRAINT `team_ibfk_3` FOREIGN KEY (`member2`) REFERENCES `auditor` (`auditorID`),
  CONSTRAINT `team_ibfk_4` FOREIGN KEY (`member3`) REFERENCES `auditor` (`auditorID`),
  CONSTRAINT `team_ibfk_5` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of team
-- ----------------------------
INSERT INTO `team` VALUES ('0', null, null, null, null, null);
INSERT INTO `team` VALUES ('1', '16', '17', '18', '19', '2');
INSERT INTO `team` VALUES ('2', '2', '3', '4', '5', '6');
INSERT INTO `team` VALUES ('3', '2', '3', '4', '6', '6');
INSERT INTO `team` VALUES ('78', '16', '14', '17', '19', '2');

-- ----------------------------
-- Table structure for `token`
-- ----------------------------
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token` (
  `tokenID` int(10) NOT NULL,
  `tokenName` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tokenPassword` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pwaBranchID` int(10) DEFAULT NULL,
  PRIMARY KEY (`tokenID`),
  KEY `pwaBranchID` (`pwaBranchID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of token
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `userPassword` varchar(200) DEFAULT NULL,
  `userCode` int(10) DEFAULT NULL,
  `userName` varchar(200) DEFAULT NULL,
  `userFullname` varchar(200) DEFAULT NULL,
  `userLastname` varchar(200) DEFAULT NULL,
  `userPicture` varchar(200) DEFAULT NULL,
  `userEmail` varchar(200) DEFAULT NULL,
  `usertypeID` int(10) DEFAULT NULL,
  `userPosition` varchar(200) DEFAULT NULL,
  `userLevel` int(10) DEFAULT NULL,
  `jobID` int(10) DEFAULT NULL,
  `auditorID` int(10) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `user_ibfk_2` (`usertypeID`),
  KEY `auditorID` (`auditorID`),
  KEY `user_ibfk_1` (`jobID`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`jobID`) REFERENCES `job` (`jobID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`usertypeID`) REFERENCES `usertype` (`usertypeID`),
  CONSTRAINT `user_ibfk_3` FOREIGN KEY (`auditorID`) REFERENCES `auditor` (`auditorID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '81e9d6abee202d00e26e8fc8a1ec5936cbd78f2af9d45c604bfe90785c009eeb', '16312', 'admin', 'กานต์วิณี', 'โรจน์วงศ์วรา (ผู้ดูแลระบบ)', 'user_5774c9f93c5ac.jpg', 'garnvini@gmail.com', '1', 'นักวิชาการคอมพิวเตอร์', '4', '4', '18');
INSERT INTO `user` VALUES ('2', '81e9d6abee202d00e26e8fc8a1ec5936cbd78f2af9d45c604bfe90785c009eeb', '10061', 'auditor', 'พัฒนา', 'วัฒนากร', '', 'pattanaw@pwamail.co.th', '2', 'หัวหน้างาน', '8', '4', '16');
INSERT INTO `user` VALUES ('3', '81e9d6abee202d00e26e8fc8a1ec5936cbd78f2af9d45c604bfe90785c009eeb', '16312', 'administrator1', 'ธุรการ', 'ส่วนกลาง', '', 'garnvini@gmail.com', '3', 'นักวิชาการคอมพิวเตอร์', '4', '4', '18');
INSERT INTO `user` VALUES ('4', '81e9d6abee202d00e26e8fc8a1ec5936cbd78f2af9d45c604bfe90785c009eeb', '16312', 'participant', 'กานต์วิณี', 'โรจน์วงศ์วรา (หน่วยรับตรวจ)', null, 'garnvini@gmail.com', '4', 'นักวิชาการคอมพิวเตอร์', '4', '4', '18');
INSERT INTO `user` VALUES ('5', '81e9d6abee202d00e26e8fc8a1ec5936cbd78f2af9d45c604bfe90785c009eeb', '16312', 'developer', 'กานต์วิณี', 'โรจน์วงศ์วรา (กองพัฒนา)', null, 'garnvini@gmail.com', '5', 'นักวิชาการคอมพิวเตอร์', '4', '4', '18');
INSERT INTO `user` VALUES ('6', '81e9d6abee202d00e26e8fc8a1ec5936cbd78f2af9d45c604bfe90785c009eeb', '10020', 'auditor2', 'พรทิพย์', 'วาพันดุง', '020415_170650.jpg', 'porntipw@pwamail.co.th', '2', 'หัวหน้างาน', '8', '1', '2');
INSERT INTO `user` VALUES ('7', '81e9d6abee202d00e26e8fc8a1ec5936cbd78f2af9d45c604bfe90785c009eeb', '16312', 'administrator2', 'ธุรการ', 'ภูมิภาค', null, 'garnvini@gmail.com', '7', 'ธุรการ', '4', '4', '18');

-- ----------------------------
-- Table structure for `usertype`
-- ----------------------------
DROP TABLE IF EXISTS `usertype`;
CREATE TABLE `usertype` (
  `usertypeID` int(10) NOT NULL,
  `usertypeName` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`usertypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usertype
-- ----------------------------
INSERT INTO `usertype` VALUES ('1', 'ผู้ดูแลระบบ');
INSERT INTO `usertype` VALUES ('2', 'หัวหน้างาน');
INSERT INTO `usertype` VALUES ('3', 'ธุรการ (ส่วนกลาง)');
INSERT INTO `usertype` VALUES ('4', 'หน่วยรับตรวจ');
INSERT INTO `usertype` VALUES ('5', 'กองพัฒนาและสนับสนุนงานตรวจสอบ');
INSERT INTO `usertype` VALUES ('6', 'ผู้ตรวจสอบ');
INSERT INTO `usertype` VALUES ('7', 'ธุรการ (ภูมิภาค)');

-- MySQL dump 10.9
--
-- Host: localhost    Database: wizoneday
-- ------------------------------------------------------
-- Server version	4.1.22-standard
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO,MYSQL323' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `wiz_admin`
--

DROP TABLE IF EXISTS `wiz_admin`;
CREATE TABLE `wiz_admin` (
  `id` varchar(20) NOT NULL default '',
  `passwd` varchar(20) default NULL,
  `name` varchar(20) default NULL,
  `resno` varchar(14) default NULL,
  `email` varchar(80) default NULL,
  `tphone` varchar(14) default NULL,
  `hphone` varchar(14) default NULL,
  `post` varchar(7) default NULL,
  `address` varchar(255) default NULL,
  `address2` varchar(255) default NULL,
  `part` int(3) default NULL,
  `permi` text,
  `last` datetime default NULL,
  `wdate` datetime default NULL,
  `descript` text,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_admin`
--

/*!40000 ALTER TABLE `wiz_admin` DISABLE KEYS */;
INSERT INTO `wiz_admin` VALUES ('admin','1234','관리자','761001-1000004','admin@oneday.com','02-0000-0000','010-0000-0000','0000-00','서울특별시 OO구 OO동 OO번지','OO빌딩 OO호',0,'01-00/01-01/01-02/01-03/01-04/01-05/01-06/01-07/01-08/01-09/03-00/03-01/03-02/03-03/03-04/03-05/03-06/03-07/03-08/03-09/05-00/05-01/05-02/05-03/05-04/05-05/05-06/05-07/05-08/05-09/05-10/05-11/05-12/06-00/06-01/06-02/06-03/06-04/06-05/06-06/07-00/07-01/07-02/07-03/07-04/07-05/08-00/08-01/08-03/08-02/','2011-02-23 14:52:47','2006-08-18 10:00:58','');
/*!40000 ALTER TABLE `wiz_admin` ENABLE KEYS */;

--
-- Table structure for table `wiz_adminlog`
--

DROP TABLE IF EXISTS `wiz_adminlog`;
CREATE TABLE `wiz_adminlog` (
  `idx` int(10) NOT NULL auto_increment,
  `status` enum('S','F') default NULL,
  `admin_id` varchar(20) default NULL,
  `ip` varchar(20) default NULL,
  `date` datetime default NULL,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=47;

--
-- Dumping data for table `wiz_adminlog`
--

/*!40000 ALTER TABLE `wiz_adminlog` DISABLE KEYS */;
INSERT INTO `wiz_adminlog` VALUES (1,'S','admin','125.131.178.58','2006-06-30 10:22:44'),(2,'S','admin','125.131.178.58','2006-06-30 15:35:51'),(3,'S','admin','125.131.178.58','2006-07-03 16:54:39'),(4,'S','admin','125.131.178.58','2006-07-03 19:01:25'),(5,'S','admin','125.131.178.58','2006-07-04 14:07:58'),(6,'S','admin','203.170.111.108','2006-07-06 01:46:57'),(7,'S','admin','125.131.178.58','2006-07-06 09:41:32'),(8,'S','admin','125.131.178.58','2006-07-06 09:42:38'),(9,'S','admin','125.131.178.58','2006-07-07 11:20:08'),(10,'S','admin','125.131.178.58','2006-07-11 15:28:43'),(11,'S','wizshop','125.131.178.58','2006-07-12 09:08:17'),(12,'S','admin','125.131.178.58','2006-07-12 09:08:38'),(13,'S','admin','125.131.178.58','2006-07-12 17:31:59'),(14,'S','admin','210.57.247.136','2006-07-13 01:30:33'),(15,'S','admin','125.131.178.58','2006-07-14 15:55:48'),(16,'S','admin','210.57.247.136','2006-07-15 17:04:19'),(17,'S','admin','125.131.178.58','2006-07-18 09:25:30'),(18,'S','admin','125.131.178.58','2006-07-19 09:12:05'),(19,'S','admin','125.131.178.58','2006-07-19 12:18:15'),(20,'S','admin','125.131.178.58','2006-07-19 12:28:47'),(21,'S','admin','210.57.247.136','2006-07-19 23:07:55'),(22,'S','admin','210.57.247.136','2006-07-20 23:00:39'),(23,'S','admin','125.131.178.58','2006-07-21 17:18:25'),(24,'S','admin','125.131.178.58','2006-07-21 21:34:56'),(25,'S','admin','125.131.178.58','2006-07-24 13:16:07'),(26,'S','admin','125.131.178.58','2006-07-25 13:51:49'),(27,'S','admin','125.131.178.58','2006-07-25 20:35:37'),(28,'S','admin','210.57.246.21','2006-07-25 22:23:25'),(29,'S','admin','125.131.178.58','2006-07-26 16:09:05'),(30,'S','admin','210.57.246.195','2006-07-26 21:39:38'),(31,'S','admin','125.131.178.58','2006-07-27 09:37:53'),(32,'S','admin','125.131.178.58','2006-07-27 12:11:26'),(33,'S','admin','125.131.178.58','2006-07-27 12:13:25'),(34,'S','admin','125.131.178.58','2006-07-27 16:31:08'),(35,'S','admin','210.57.244.172','2006-07-31 21:23:22'),(36,'S','admin','125.131.178.58','2006-08-01 08:06:15'),(37,'S','admin','125.131.178.58','2006-08-07 16:08:03'),(38,'S','admin','125.131.178.58','2006-08-10 08:55:37'),(39,'S','admin','125.131.178.58','2006-08-10 14:00:43'),(40,'S','admin','125.131.178.58','2006-08-17 13:12:39'),(41,'S','admin','125.131.178.58','2006-08-17 13:16:01'),(42,'S','admin','125.131.178.58','2006-08-17 16:07:18'),(43,'S','admin','125.131.178.58','2006-08-17 17:31:46'),(44,'S','admin','203.170.109.244','2006-08-17 20:21:52'),(45,'S','admin','125.131.178.58','2006-08-18 08:10:50'),(46,'S','admin','125.131.178.58','2006-08-18 08:44:15');
/*!40000 ALTER TABLE `wiz_adminlog` ENABLE KEYS */;

--
-- Table structure for table `wiz_advert`
--

DROP TABLE IF EXISTS `wiz_advert`;
CREATE TABLE `wiz_advert` (
  `idx` int(10) NOT NULL auto_increment,
  `advert_use` varchar(2) default NULL,
  `advert_img` varchar(100) default NULL,
  `advert_url` varchar(100) default NULL,
  `advert_point` int(10) default NULL,
  `wdate` datetime default NULL,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=2;

--
-- Dumping data for table `wiz_advert`
--

/*!40000 ALTER TABLE `wiz_advert` DISABLE KEYS */;
INSERT INTO `wiz_advert` VALUES (1,'Y','advert_img.gif','http://oneday.com',1,'2011-02-14 14:39:59');
/*!40000 ALTER TABLE `wiz_advert` ENABLE KEYS */;

--
-- Table structure for table `wiz_advertinfo`
--

DROP TABLE IF EXISTS `wiz_advertinfo`;
CREATE TABLE `wiz_advertinfo` (
  `idx` int(10) NOT NULL auto_increment,
  `orderid` varchar(50) default NULL,
  `prdcode` varchar(50) default NULL,
  `advert_id` varchar(30) default NULL,
  `user_id` varchar(30) default NULL,
  `reserve` int(10) default NULL,
  `wdate` datetime default NULL,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=2;

--
-- Dumping data for table `wiz_advertinfo`
--

/*!40000 ALTER TABLE `wiz_advertinfo` DISABLE KEYS */;
INSERT INTO `wiz_advertinfo` VALUES (1,'110131153020498','1101190001','test','test',50,'2011-01-31 15:31:43');
/*!40000 ALTER TABLE `wiz_advertinfo` ENABLE KEYS */;

--
-- Table structure for table `wiz_banner`
--

DROP TABLE IF EXISTS `wiz_banner`;
CREATE TABLE `wiz_banner` (
  `idx` int(3) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL default '',
  `align` enum('R','L') default NULL,
  `prior` int(3) default NULL,
  `isuse` enum('Y','N') default NULL,
  `link_url` varchar(255) default NULL,
  `link_target` enum('_SELF','_BLANK') default NULL,
  `de_type` enum('IMG','HTML') default NULL,
  `de_img` varchar(100) default NULL,
  `de_html` mediumtext,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=59;

--
-- Dumping data for table `wiz_banner`
--

/*!40000 ALTER TABLE `wiz_banner` DISABLE KEYS */;
INSERT INTO `wiz_banner` VALUES (39,'banner_01','',1,'Y','','','IMG','08120205561567.gif','<P>&nbsp;</P>'),(40,'banner_01','',1,'Y','','','IMG','08120205562369.gif',''),(41,'banner_01','',1,'Y','','','IMG','08120205563387.gif',''),(42,'banner_01','',1,'Y','','','IMG','08120205564079.gif',''),(43,'banner_01','',1,'Y','/bbs/list.php?code=review','','IMG','08120205565080.gif',''),(44,'banner_01','',1,'Y','','','IMG','08120205565922.gif',''),(38,'banner_02','',1,'Y','','','IMG','11011711202831.gif',''),(57,'banner_02','',2,'Y','','','IMG','11011711230425.jpg','<P>&nbsp;</P>'),(58,'banner_02','',1,'Y','/index.php?yy=2011&mm=01&dd=17&prdidx=1101130003','','IMG','11011711304287.jpg','');
/*!40000 ALTER TABLE `wiz_banner` ENABLE KEYS */;

--
-- Table structure for table `wiz_bannerinfo`
--

DROP TABLE IF EXISTS `wiz_bannerinfo`;
CREATE TABLE `wiz_bannerinfo` (
  `idx` int(5) NOT NULL auto_increment,
  `title` varchar(20) NOT NULL default '',
  `name` varchar(20) NOT NULL default '',
  `types` enum('W','H') NOT NULL default 'W',
  `types_num` int(3) NOT NULL default '1',
  `isuse` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=6;

--
-- Dumping data for table `wiz_bannerinfo`
--

/*!40000 ALTER TABLE `wiz_bannerinfo` DISABLE KEYS */;
INSERT INTO `wiz_bannerinfo` VALUES (1,'醫','banner_01','H',1,'Y'),(2,'硫','banner_02','H',4,'Y'),(3,'異','banner_03','W',3,'N'),(4,'異','banner_04','H',2,'N'),(5,'異','banner_05','H',1,'N');
/*!40000 ALTER TABLE `wiz_bannerinfo` ENABLE KEYS */;

--
-- Table structure for table `wiz_basket`
--

DROP TABLE IF EXISTS `wiz_basket`;
CREATE TABLE `wiz_basket` (
  `idx` int(10) NOT NULL auto_increment,
  `orderid` varchar(20) default NULL,
  `prdcode` varchar(10) default NULL,
  `prdname` varchar(100) default NULL,
  `prdimg` varchar(30) default NULL,
  `prdprice` int(10) default NULL,
  `prdreserve` int(10) default NULL,
  `opttitle` varchar(50) default NULL,
  `optcode` varchar(50) default NULL,
  `opttitle2` varchar(50) default NULL,
  `optcode2` varchar(50) default NULL,
  `opttitle3` varchar(50) default NULL,
  `optcode3` varchar(50) default NULL,
  `opttitle4` varchar(50) default NULL,
  `optcode4` mediumtext,
  `opttitle5` varchar(50) default NULL,
  `optcode5` mediumtext,
  `opttitle6` varchar(50) default NULL,
  `optcode6` mediumtext,
  `opttitle7` varchar(50) default NULL,
  `optcode7` mediumtext,
  `amount` int(5) default NULL,
  `wdate` datetime default NULL,
  `status` varchar(2) default NULL,
  `admin` varchar(20) default NULL,
  `bank` varchar(20) default NULL,
  `account` varchar(20) default NULL,
  `acc_name` varchar(20) default NULL,
  `reason` varchar(20) default NULL,
  `memo` mediumtext,
  `repay` enum('R','C') default NULL,
  `ca_date` datetime default NULL,
  `cc_date` datetime default NULL,
  `del_type` enum('DA','DB','DC','DD') default NULL,
  `del_price` int(11) default NULL,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=79;

--
-- Dumping data for table `wiz_basket`
--

/*!40000 ALTER TABLE `wiz_basket` DISABLE KEYS */;
INSERT INTO `wiz_basket` VALUES (78,'110222111038556','1102090001','아카이','1102090001_R.jpg',35000,3000,'','','','','사이즈','88^5000^0^15^1^15','','','색상','흰색^0^0^15^1^15','','','','',1,'2011-02-22 11:11:26','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',0);
/*!40000 ALTER TABLE `wiz_basket` ENABLE KEYS */;

--
-- Table structure for table `wiz_basket_tmp`
--

DROP TABLE IF EXISTS `wiz_basket_tmp`;
CREATE TABLE `wiz_basket_tmp` (
  `idx` int(10) NOT NULL auto_increment,
  `uniq_id` varchar(40) default NULL,
  `prdcode` varchar(10) default NULL,
  `prdname` varchar(100) default NULL,
  `prdimg` varchar(30) default NULL,
  `prdprice` int(10) default NULL,
  `prdreserve` int(10) default NULL,
  `opttitle` varchar(50) default NULL,
  `optcode` varchar(50) default NULL,
  `opttitle2` varchar(50) default NULL,
  `optcode2` varchar(50) default NULL,
  `opttitle3` varchar(50) default NULL,
  `optcode3` varchar(50) default NULL,
  `opttitle4` varchar(50) default NULL,
  `optcode4` mediumtext,
  `opttitle5` varchar(50) default NULL,
  `optcode5` mediumtext,
  `opttitle6` varchar(50) default NULL,
  `optcode6` mediumtext,
  `opttitle7` varchar(50) default NULL,
  `optcode7` mediumtext,
  `amount` int(5) default NULL,
  `wdate` datetime default NULL,
  `status` varchar(2) default NULL,
  `admin` varchar(20) default NULL,
  `bank` varchar(20) default NULL,
  `account` varchar(20) default NULL,
  `acc_name` varchar(20) default NULL,
  `reason` varchar(20) default NULL,
  `memo` mediumtext,
  `repay` enum('R','C') default NULL,
  `ca_date` datetime default NULL,
  `cc_date` datetime default NULL,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM COMMENT='wizshop ?λ컮援щ땲 ?꾩떆';

--
-- Dumping data for table `wiz_basket_tmp`
--

/*!40000 ALTER TABLE `wiz_basket_tmp` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiz_basket_tmp` ENABLE KEYS */;

--
-- Table structure for table `wiz_bbs`
--

DROP TABLE IF EXISTS `wiz_bbs`;
CREATE TABLE `wiz_bbs` (
  `idx` int(10) NOT NULL auto_increment,
  `prdcode` varchar(10) default NULL,
  `code` varchar(30) default NULL,
  `prino` int(10) default NULL,
  `grpno` int(10) default NULL,
  `depno` int(2) default NULL,
  `star` int(1) default NULL,
  `notice` char(1) default NULL,
  `category` varchar(80) default NULL,
  `memid` varchar(20) default NULL,
  `memgrp` text,
  `name` varchar(20) default NULL,
  `email` varchar(50) default NULL,
  `tphone` varchar(20) default NULL,
  `hphone` varchar(20) default NULL,
  `zipcode` varchar(20) default NULL,
  `address` varchar(20) default NULL,
  `subject` varchar(100) default NULL,
  `content` mediumtext,
  `addinfo1` varchar(255) default NULL,
  `addinfo2` varchar(255) default NULL,
  `addinfo3` varchar(255) default NULL,
  `addinfo4` varchar(255) default NULL,
  `addinfo5` varchar(255) default NULL,
  `ctype` enum('T','H') default NULL,
  `privacy` enum('Y','N') default NULL,
  `upfile1` varchar(40) default NULL,
  `upfile2` varchar(40) default NULL,
  `upfile3` varchar(40) default NULL,
  `upfile4` varchar(40) default NULL,
  `upfile5` varchar(40) default NULL,
  `upfile6` varchar(40) default NULL,
  `upfile7` varchar(40) default NULL,
  `upfile8` varchar(40) default NULL,
  `upfile9` varchar(40) default NULL,
  `upfile10` varchar(40) default NULL,
  `upfile11` varchar(40) default NULL,
  `upfile12` varchar(40) default NULL,
  `upfile1_name` varchar(40) default NULL,
  `upfile2_name` varchar(40) default NULL,
  `upfile3_name` varchar(40) default NULL,
  `upfile4_name` varchar(40) default NULL,
  `upfile5_name` varchar(40) default NULL,
  `upfile6_name` varchar(40) default NULL,
  `upfile7_name` varchar(40) default NULL,
  `upfile8_name` varchar(40) default NULL,
  `upfile9_name` varchar(40) default NULL,
  `upfile10_name` varchar(40) default NULL,
  `upfile11_name` varchar(40) default NULL,
  `upfile12_name` varchar(40) default NULL,
  `movie1` mediumtext,
  `movie2` mediumtext,
  `movie3` mediumtext,
  `passwd` varchar(30) default NULL,
  `count` int(8) default NULL,
  `recom` int(8) default NULL,
  `comment` int(8) default NULL,
  `ip` varchar(15) default NULL,
  `wdate` int(10) default NULL,
  `upfile_url` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`idx`),
  KEY `code` (`code`)
) TYPE=MyISAM AUTO_INCREMENT=87;

--
-- Dumping data for table `wiz_bbs`
--

/*!40000 ALTER TABLE `wiz_bbs` DISABLE KEYS */;
INSERT INTO `wiz_bbs` VALUES (62,'','notice',3,3,0,0,'','','admin','admin','관리자','admin@oneday.com','','','','','공지사항테스트 공지사항테스트 공지사항테스트 공지사항테스트','공지사항테스트 공지사항테스트 공지사항테스트 공지사항테스트','','','','','','H','','','','','','','','','','','','','','','','','','','','','','','','','','','','','2934',12,6,0,'211.237.17.249',1297250974,''),(63,'','notice',4,4,0,0,'','','admin','admin','관리자','admin@oneday.com','','','','','공지사항테스트 공지사항테스트 공지사항테스트 공지사항테스트','공지사항테스트 공지사항테스트 공지사항테스트 공지사항테스트','','','','','','H','','','','','','','','','','','','','','','','','','','','','','','','','','','','','2939',12,6,0,'211.237.17.249',1297250979,''),(64,'','notice',5,5,0,0,'','','admin','admin','관리자','admin@oneday.com','','','','','공지사항테스트 공지사항테스트 공지사항테스트 공지사항테스트','공지사항테스트 공지사항테스트 공지사항테스트 공지사항테스트','','','','','','H','','','','','','','','','','','','','','','','','','','','','','','','','','','','','2942',25,6,0,'211.237.17.249',1297250982,''),(67,'1102090001','talk',1,66,1,0,'','','test','test,test','테스트','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'61.77.81.194',1297509668,''),(68,'1102090001','talk',3,3,0,5,'','','test','test','테스트','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752564,''),(69,'1102090001','talk',4,4,0,5,'','','test','test','테스트','','','','','','','123123','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752568,''),(70,'1102090001','talk',5,5,0,5,'','','test','test','테스트','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752571,''),(71,'1102090001','talk',6,6,0,5,'','','test','test','테스트','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752573,''),(72,'1102090001','talk',7,7,0,5,'','','test','test','테스트','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752574,''),(73,'1102090001','talk',8,8,0,5,'','','test','test','테스트','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752575,''),(74,'1102090001','talk',9,9,0,5,'','','test','test','테스트','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752576,''),(75,'1102090001','talk',10,10,0,5,'','','test','test','테스트','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752576,''),(76,'1102090001','talk',11,11,0,5,'','','test','test','테스트','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752577,''),(77,'1102090001','talk',12,12,0,5,'','','test','test','테스트','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752578,''),(78,'1102090001','talk',13,13,0,5,'','','test','test','테스트','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752579,''),(79,'1102090001','talk',14,14,0,5,'','','test','test','테스트','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752581,''),(80,'1102090001','talk',15,15,0,5,'','','test','test','테스트','','','','','','','123123123','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752582,''),(81,'1102090001','talk',16,16,0,5,'','','test','test','테스트','','','','','','','1231231','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752583,''),(82,'1102090001','talk',17,17,0,5,'','','test','test','테스트','','','','','','','123123','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752585,''),(83,'1102090001','talk',18,18,0,5,'','','test','test','테스트','','','','','','','123123123','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752586,''),(84,'1102090001','talk',19,19,0,5,'','','test','test','테스트','','','','','','','123123123','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752587,''),(85,'1102090001','talk',20,20,0,5,'','','test','test','테스트','','','','','','','123123123','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752589,''),(86,'1102090001','talk',21,21,0,5,'','','test','test','테스트','','','','','','','123123123','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752591,''),(66,'1102090001','talk',2,1,0,5,'','','test','test,test','테스트','','','','','','','test','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'61.77.81.194',1297509665,''),(61,'','notice',2,2,0,0,'','','admin','admin','관리자','admin@oneday.com','','','','','공지사항테스트 공지사항테스트 공지사항테스트 공지사항테스트','공지사항테스트 공지사항테스트 공지사항테스트 공지사항테스트','','','','','','H','','','','','','','','','','','','','','','','','','','','','','','','','','','','','2927',11,6,0,'211.237.17.249',1297250967,''),(60,'','notice',1,1,0,0,'','','admin','admin','관리자','admin@oneday.com','','','','','공지사항테스트 공지사항테스트 공지사항테스트 공지사항테스트','공지사항테스트 공지사항테스트 공지사항테스트 공지사항테스트','','','','','','H','','','','','','','','','','','','','','','','','','','','','','','','','','','','','2841',8,6,0,'211.237.17.249',1297250921,'');
/*!40000 ALTER TABLE `wiz_bbs` ENABLE KEYS */;

--
-- Table structure for table `wiz_bbscat`
--

DROP TABLE IF EXISTS `wiz_bbscat`;
CREATE TABLE `wiz_bbscat` (
  `idx` int(10) unsigned NOT NULL auto_increment,
  `gubun` char(1) default NULL,
  `code` varchar(30) default NULL,
  `catname` varchar(100) default NULL,
  `catimg` varchar(30) default NULL,
  `catimg_over` varchar(30) default NULL,
  `caticon` varchar(30) default NULL,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=30;

--
-- Dumping data for table `wiz_bbscat`
--

/*!40000 ALTER TABLE `wiz_bbscat` DISABLE KEYS */;
INSERT INTO `wiz_bbscat` VALUES (17,'','faq','二쇰Ц/寃곗','0902020408473_img.gif','0902020408473_img_over.gif',''),(6,'A','photo','','','',''),(9,'A','qna','','','',''),(16,'A','notice','','','',''),(18,'','faq','諛곗','0902020409046_img.gif','0902020409046_img_over.gif',''),(19,'','faq','諛','0902020409219_img.gif','0902020409219_img_over.gif',''),(20,'','faq','','0902020409392_img.gif','0902020409392_img_over.gif',''),(21,'','faq','湲고','0902020410002_img.gif','0902020410002_img_over.gif',''),(23,'A','talk','','','',''),(24,'A','event','','','',''),(25,'A','resell','','','',''),(26,'A','family','','','',''),(27,'A','blog','','','',''),(28,'A','reco','전체','','',''),(29,'A','center','전체','','','');
/*!40000 ALTER TABLE `wiz_bbscat` ENABLE KEYS */;

--
-- Table structure for table `wiz_bbsinfo`
--

DROP TABLE IF EXISTS `wiz_bbsinfo`;
CREATE TABLE `wiz_bbsinfo` (
  `code` varchar(30) default NULL,
  `type` enum('BBS','SCH','PRD','RV') default NULL,
  `title` varchar(50) default NULL,
  `titleimg` varchar(40) default NULL,
  `header` varchar(255) default NULL,
  `footer` varchar(255) default NULL,
  `category` varchar(255) default NULL,
  `bbsadmin` varchar(255) default NULL,
  `lpermi` varchar(6) default NULL,
  `rpermi` varchar(6) default NULL,
  `wpermi` varchar(6) default NULL,
  `apermi` varchar(6) default NULL,
  `cpermi` varchar(6) default NULL,
  `datetype_list` varchar(30) default NULL,
  `datetype_view` varchar(30) default NULL,
  `skin` varchar(50) default NULL,
  `permsg` varchar(255) default NULL,
  `perurl` varchar(255) default NULL,
  `pageurl` varchar(255) default NULL,
  `editor` enum('Y','N') default NULL,
  `usetype` enum('Y','N') default NULL,
  `privacy` enum('Y','N') default NULL,
  `upfile` enum('Y','N') default NULL,
  `movie` enum('Y','N') default NULL,
  `comment` enum('Y','N') default NULL,
  `remail` enum('Y','N') default NULL,
  `imgview` enum('Y','N') default NULL,
  `recom` enum('Y','N') default NULL,
  `abuse` enum('Y','N') default NULL,
  `abtxt` mediumtext,
  `simgsize` int(3) default NULL,
  `mimgsize` int(3) default NULL,
  `rows` int(3) default NULL,
  `lists` int(3) default NULL,
  `newc` int(3) default NULL,
  `hotc` int(3) default NULL,
  `line` int(3) default NULL,
  `subject_len` int(3) default NULL,
  `img_align` varchar(10) default NULL,
  `btn_view` enum('Y','N') default NULL,
  `spam_check` enum('Y','N') default NULL,
  `view_list` enum('Y','N') default NULL,
  UNIQUE KEY `code` (`code`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_bbsinfo`
--

/*!40000 ALTER TABLE `wiz_bbsinfo` DISABLE KEYS */;
INSERT INTO `wiz_bbsinfo` VALUES ('notice','BBS','공지사항','','','','','','','','','','','','','bbsBasic','권한이 없습니다.','','','Y','Y','','Y','Y','Y','','','Y','','',120,500,20,5,2,600,4,0,'LEFT','N','Y','N'),('schedule','SCH','일정','','','','','','','','','','','','%y.%m.%d','scheduleBasic','권한이 없습니다.','','','N','Y','','Y','Y','Y','','','N','','',120,500,0,0,0,0,0,0,'LEFT','Y','Y',NULL),('talk','BBS','토크','','','','','','','','26','26','26','%Y-%m-%d %H:%i','%Y-%m-%d %H:%i','bbsBasic','로그인을 하셔야 합니다.','','','N','Y','','Y','N','N','','','N','','',120,500,20,5,2,600,10,40,'LEFT','N','Y','N'),('reco','BBS','추천하기','','','','','','0','0','','0','0','','','formBasic','로그인을 하셔야 합니다.','/','','N','Y','','Y','N','N','','','N','','',120,500,20,5,2,600,4,0,'LEFT','N','Y','N'),('center','BBS','고객센터','','','','','','','','','','','','','formBasic','권한이 없습니다.','','','N','Y','','Y','N','N','','','N','','',120,500,20,5,2,600,4,0,'LEFT','N','Y','N');
/*!40000 ALTER TABLE `wiz_bbsinfo` ENABLE KEYS */;

--
-- Table structure for table `wiz_brand`
--

DROP TABLE IF EXISTS `wiz_brand`;
CREATE TABLE `wiz_brand` (
  `idx` int(10) unsigned NOT NULL auto_increment,
  `priorno` int(11) default NULL,
  `brdname` varchar(30) default NULL,
  `brduse` enum('Y','N') default NULL,
  `brdimg` varchar(30) default NULL,
  `brdimg_over` varchar(30) default NULL,
  `subimg` mediumtext,
  `subimg_type` varchar(3) default NULL,
  `prd_num` int(3) default NULL,
  `prd_width` varchar(3) default NULL,
  `prd_height` varchar(3) default NULL,
  `recom_use` enum('Y','N') default NULL,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=4;

--
-- Dumping data for table `wiz_brand`
--

/*!40000 ALTER TABLE `wiz_brand` DISABLE KEYS */;
INSERT INTO `wiz_brand` VALUES (2,1,'','','0901070433338_brd.gif','0901070433338_brd_over.gif','釉','HTM',20,'','','Y'),(3,2,'','','','','','NON',20,'200','250','N');
/*!40000 ALTER TABLE `wiz_brand` ENABLE KEYS */;

--
-- Table structure for table `wiz_category`
--

DROP TABLE IF EXISTS `wiz_category`;
CREATE TABLE `wiz_category` (
  `catcode` varchar(6) NOT NULL default '',
  `depthno` int(1) default NULL,
  `priorno01` int(2) default NULL,
  `priorno02` int(2) default NULL,
  `priorno03` int(2) default NULL,
  `catname` varchar(30) default NULL,
  `catuse` enum('Y','N') default NULL,
  `catimg` varchar(20) default NULL,
  `catimg_over` varchar(20) default NULL,
  `subimg` mediumtext,
  `subimg_type` varchar(3) default NULL,
  `prd_tema` varchar(10) default NULL,
  `prd_num` int(3) default NULL,
  `prd_width` varchar(3) default NULL,
  `prd_height` varchar(3) default NULL,
  `recom_use` enum('Y','N') default NULL,
  `recom_tema` varchar(10) default NULL,
  `recom_num` int(3) default NULL,
  PRIMARY KEY  (`catcode`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_category`
--

/*!40000 ALTER TABLE `wiz_category` DISABLE KEYS */;
INSERT INTO `wiz_category` VALUES ('100000',1,1,0,0,'','','','','','NON','',20,'','','N','',0),('110000',1,2,0,0,'','','','','','NON','',20,'','','N','',0),('120000',1,3,0,0,'','','','','','NON','',20,'','','N','',0),('130000',1,4,0,0,'遺','','','','','NON','',20,'','','N','',0),('140000',1,5,0,0,'','','','','','NON','',20,'','','N','',0),('150000',1,6,0,0,'','','','','','NON','',20,'','','N','',0),('160000',1,7,0,0,'','','','','','NON','',20,'','','N','',0),('170000',1,8,0,0,'','','','','','NON','',20,'','','N','',0),('180000',1,9,0,0,'諭','','','','','NON','',20,'','','N','',0),('190000',1,10,0,0,'','','','','','NON','',20,'','','N','',0),('200000',1,11,0,0,'test2','','','','','NON','',20,'','','N','',0);
/*!40000 ALTER TABLE `wiz_category` ENABLE KEYS */;

--
-- Table structure for table `wiz_comment`
--

DROP TABLE IF EXISTS `wiz_comment`;
CREATE TABLE `wiz_comment` (
  `idx` int(10) NOT NULL auto_increment,
  `ctype` varchar(10) default NULL,
  `cidx` varchar(20) default NULL,
  `prdcode` varchar(10) default NULL,
  `star` int(1) default NULL,
  `id` varchar(20) default NULL,
  `name` varchar(20) default NULL,
  `content` mediumtext,
  `passwd` varchar(20) default NULL,
  `wdate` datetime default NULL,
  `wip` varchar(20) default NULL,
  PRIMARY KEY  (`idx`),
  KEY `cidx` (`cidx`)
) TYPE=MyISAM AUTO_INCREMENT=2;

--
-- Dumping data for table `wiz_comment`
--

/*!40000 ALTER TABLE `wiz_comment` DISABLE KEYS */;
INSERT INTO `wiz_comment` VALUES (1,'BBS','4','',0,'test','','TEST','test','2010-12-16 18:59:03','211.237.17.228');
/*!40000 ALTER TABLE `wiz_comment` ENABLE KEYS */;

--
-- Table structure for table `wiz_company`
--

DROP TABLE IF EXISTS `wiz_company`;
CREATE TABLE `wiz_company` (
  `idx` int(10) NOT NULL auto_increment,
  `com_id` varchar(30) default NULL,
  `com_pw` varchar(30) default NULL,
  `company` varchar(100) default NULL,
  `com_no` varchar(20) default NULL,
  `bossname` varchar(20) default NULL,
  `business` varchar(255) default NULL,
  `com_kind` varchar(255) default NULL,
  `addr1` varchar(255) default NULL,
  `addr2` varchar(255) default NULL,
  `charge` varchar(20) default NULL,
  `charge_tel` varchar(20) default NULL,
  `charge_hp` varchar(20) default NULL,
  `charge_fax` varchar(20) default NULL,
  `charge_email` varchar(100) default NULL,
  `memo` text,
  `lastlog` datetime NOT NULL default '0000-00-00 00:00:00',
  `wdate` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=2;

--
-- Dumping data for table `wiz_company`
--

/*!40000 ALTER TABLE `wiz_company` DISABLE KEYS */;
INSERT INTO `wiz_company` VALUES (1,'company','1234','공급업체','000-00-00000','OOO','서비스','요식업','OO시 OO구 OO동 OO번지','OO빌딩 OO호','OOO','000-0000-0000','000-0000-0000','00-0000-0000','test@test.co.kr','','2011-02-23 12:45:25','2011-01-19 18:30:10');
/*!40000 ALTER TABLE `wiz_company` ENABLE KEYS */;

--
-- Table structure for table `wiz_conrefer`
--

DROP TABLE IF EXISTS `wiz_conrefer`;
CREATE TABLE `wiz_conrefer` (
  `referer` text,
  `host` varchar(30) default NULL,
  `cnt` int(10) default NULL
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_conrefer`
--

/*!40000 ALTER TABLE `wiz_conrefer` DISABLE KEYS */;
INSERT INTO `wiz_conrefer` VALUES ('','',230),('http://blog.daum.net/_blog/hdn/ArticleContentsView.do?blogid=0OtfB&articleno=39&looping=0&longOpen=','blog.daum.net',2),('http://www.anywiz.co.kr/','www.anywiz.co.kr',36),('http://blog.naver.com/PostView.nhn?blogId=dongpil2&logNo=150102555981&beginTime=0&jumpingVid=&from=search&redirect=Log&widgetTypeCall=true&topReferer=http%3A%2F%2Fsearch.naver.com%2Fsearch.naver%3Fwhere%3Dnexearch%26query%3D%25BB%25E7%25C0%25CC%25C6%25AE%2B%25B0%25B3%25B9%25DF%26sm%3Dtop_hty%26fbm%3D1','blog.naver.com',1),('http://anywiz.co.kr/','anywiz.co.kr',4),('http://blog.naver.com/PostView.nhn?blogId=dongpil2&logNo=150102555981&beginTime=0&jumpingVid=&from=search&redirect=Log&widgetTypeCall=true&topReferer=http%3A%2F%2Fsearch.naver.com%2Fsearch.naver%3Fsm%3Dtab_hty%26where%3Dnexearch%26query%3D%25BC%25EE%25BC%25C8%25C4%25BF%25B8%25D3%25BD%25BA%2B%25B1%25B8%25C3%25E0','blog.naver.com',1),('http://mail3.nate.com/app/msg/viewmail/?mboxid=10&pg=1&msgid=18452&srtfld=1&srtdrct=D&un=1','mail3.nate.com',1),('http://mail3.nate.com/app/msg/viewmail/?mboxid=10&pg=1&msgid=15882&srtfld=1&srtdrct=D&un=1','mail3.nate.com',1),('http://mail2.daum.net/hanmail/mail/ViewMail.daum?MSGID=7000000000G0deD&FOLDER=%25EB%25B0%259B%25EC%259D%2580%25ED%258E%25B8%25EC%25A7%2580%25ED%2595%25A8&mpage=1&TYPE=&KEYTYPE=&KEYWORD=&_top_hm=li_read_normal&status=N&fromname=help%40anywiz.co.kr&star=N','mail2.daum.net',1),('http://mail2.daum.net/hanmail/mail/ViewMail.daum?MSGID=0000000000010gG&FOLDER=IT%2B%25EA%25B4%2580%25EB%25A0%25A8&mpage=1&TYPE=&KEYTYPE=&KEYWORD=&_top_hm=li_read_normal&status=N&fromname=help%40anywiz.co.kr&star=N','mail2.daum.net',1),('http://mail3.nate.com/app/msg/viewmail/?output=preview&msgid=17284&mboxid=10&pg=1&srtdrct=D&srtfld=1&skeywd=&sfield=&un=1','mail3.nate.com',1),('http://m.mail.naver.com/read/?folder=0&mark=&newmail=&mailid=19574','m.mail.naver.com',1),('http://mail.naver.com/new/?n=dc6e7b36456678ccb42a','mail.naver.com',1),('http://mail.naver.com/new/?n=d2c350f105ec63b85003','mail.naver.com',1),('http://hmail2.daum.net/hanmailex/ViewMail.daum?method=noAjax&folderId=id-%25EB%25B0%259B%25EC%259D%2580%25ED%258E%25B8%25EC%25A7%2580%25ED%2595%25A8&mailId=A000000000Gb8vx&showHeader=simple&imageView=undefined','hmail2.daum.net',1),('http://mail.naver.com/new/?n=e90e7213dcdabbb9d916','mail.naver.com',1),('http://bl157w.blu157.mail.live.com/mail/InboxLight.aspx?n=254490970','bl157w.blu157.mail.live.com',1),('http://mail3.nate.com/app/msg/viewmail/?mboxid=10&pg=1&msgid=3888&srtfld=1&srtdrct=D&un=1','mail3.nate.com',1),('http://anywiz.co.kr/solution/wizoneday.php','anywiz.co.kr',8),('http://mail3.nate.com/app/msg/viewmail/?output=preview&msgid=7695&mboxid=10&pg=1&srtdrct=D&srtfld=1&skeywd=&sfield=&un=0','mail3.nate.com',1),('http://mail3.nate.com/app/msg/viewmail/?output=preview&msgid=12702&mboxid=10&pg=1&srtdrct=D&srtfld=1&skeywd=&sfield=&un=1','mail3.nate.com',1),('http://blog.naver.com/PostView.nhn?blogId=dongpil2&logNo=150102555981&beginTime=0&jumpingVid=&from=search&redirect=Log&widgetTypeCall=true&topReferer=http%3A%2F%2Fsearch.naver.com%2Fsearch.naver%3Fsm%3Dtab_hty%26where%3Dnexearch%26query%3D%25BF%25F8%25B5%25A5%25C0%25CC%25B8%25F4%25BB%25E7%25C0%25CC%25C6%25AE%25C1%25A6%25C0%25DB','blog.naver.com',1),('http://www.gobizmail.com/readMessage.do?folder=Inbox&uid=1318','www.gobizmail.com',1),('http://mail.handsomefish.com/web/mail_view.php?msg_mbox=new&msg_id=11015&msg_fname=20110217.154037.5192.handsomefish.com&msg_vflag=Y&msg_sflag=&page=1&sortby=&sortorder=&fraction=&search_v=&keyword=&mail_list_count=','mail.handsomefish.com',1),('http://blog.naver.com/PostView.nhn?blogId=dongpil2&logNo=150102555981&redirect=Dlog&widgetTypeCall=true&topReferer=http%3A%2F%2Fsearch.nate.com%2Fsearch%2Fall.html%3Fz%3DA%26s%3D%26tq%3D%26sg%3D%26nq%3D%26sc%3D%26afc%3D%26thr%3Dsbus%26q%3D%25BC%25EE%25BC%25C8%25C4%25BF%25B8%25D3%25BD%25BA%25B1%25D7%25B8%25B0%25BF%25F8%25B5%25A5%25C0%25CC','blog.naver.com',1),('http://mail.naver.com/new/?n=b86fbe40e523b8c81677','mail.naver.com',1),('http://mail2.daum.net/hanmail/mail/ViewMail.daum?MSGID=i00000000023kbh&FOLDER=%25EB%25B0%259B%25EC%259D%2580%25ED%258E%25B8%25EC%25A7%2580%25ED%2595%25A8&mpage=1&TYPE=&KEYTYPE=&KEYWORD=&_top_hm=li_read_normal&status=N&fromname=help%40anywiz.co.kr&star=N','mail2.daum.net',1),('http://mail.naver.com/new/?n=f66e02f03e5ccb2dcdc4','mail.naver.com',1),('http://mail1.naver.com/new/?n=2a097f1849ad3b17005d','mail1.naver.com',1),('http://mail2.daum.net/hanmail/mail/ViewMail.daum?MSGID=000000000000FPq&FOLDER=%25EB%25B0%259B%25EC%259D%2580%25ED%258E%25B8%25EC%25A7%2580%25ED%2595%25A8&mpage=1&TYPE=&KEYTYPE=&KEYWORD=&_top_hm=li_read_normal&status=N&fromname=help%40anywiz.co.kr&star=N','mail2.daum.net',1),('http://mail.naver.com/new/?n=d44ac192d907922084c9','mail.naver.com',1),('http://blog.naver.com/PostView.nhn?blogId=dongpil2&logNo=150103023000&beginTime=0&jumpingVid=&from=search&redirect=Log&widgetTypeCall=true&topReferer=http%3A%2F%2Fhighlightsearch.naver.com%2Fblog%2Fsearch.naver%3Fwhere%3Dhl%26end_url%3Dhttp%253A%252F%252Fblog.naver.com%252Fdongpil2%253FRedirect%253DLog%2526logNo%253D150103023000%26end_cr%3Dblg*i%26end_gdid%3D90000003_0000000000000022F2D65D98%26query%3D%25EC%2586%258C%25EC%2585%259C%25EC%25BB%25A4%25EB%25A8%25B8%25EC%258A%25A4%2520%25EC%2598%2581%25EC%2597%2585%26hl_terms%3D%25EC%25BB%25A4%25EB%25A8%25B8%25EC%258A%25A4%2520%25EC%2586%258C%25EC%2585%259C%2520%25EC%2598%2581%25EC%2597%2585','blog.naver.com',1),('http://mail.naver.com/new/?n=d09212471ddd0cb42812','mail.naver.com',1),('http://jjangsports.com/webmail/src/read_body.php?mailbox=INBOX&passed_id=2530&view_unsafe_images=1&startMessage=1','jjangsports.com',1),('http://blog.naver.com/PostView.nhn?blogId=dongpil2&logNo=150102555981&beginTime=0&jumpingVid=&from=search&redirect=Log&widgetTypeCall=true&topReferer=http%3A%2F%2Fsearch.naver.com%2Fsearch.naver%3Fwhere%3Dnexearch%26query%3D%25BC%25EE%25BC%25C8%25C4%25BF%25B8%25D3%25BD%25BA%2B%25BB%25E7%25C0%25CC%25C6%25AE%2B%25B8%25B8%25B5%25E5%25B4%25C2%2B%25C7%25C1%25B7%25CE%25B1%25D7%25B7%25A5%26sm%3Dtop_hty%26fbm%3D1','blog.naver.com',1),('http://anywiz.co.kr/solution/wizoneday.php?','anywiz.co.kr',1),('http://blog.naver.com/PostView.nhn?blogId=dongpil2&logNo=150103023000&beginTime=0&jumpingVid=&from=search&redirect=Log&widgetTypeCall=true&topReferer=http%3A%2F%2Fsearch.naver.com%2Fsearch.naver%3Fsm%3Dtab_hty%26where%3Dnexearch%26query%3D%25BC%25D2%25BC%25C8%25C4%25BF%25B8%25D3%25BD%25BA%2B%25BC%25D6%25B7%25E7%25BC%25C7','blog.naver.com',1),('http://blog.naver.com/PostView.nhn?blogId=dongpil2&logNo=150102555981&beginTime=0&jumpingVid=&from=search&redirect=Log&widgetTypeCall=true&topReferer=http%3A%2F%2Fsearch.naver.com%2Fsearch.naver%3Fsm%3Dtab_hty%26where%3Dnexearch%26query%3D%25BC%25EE%25BC%25C8%25C4%25BF%25B8%25D3%25BD%25BA%25C7%25C1%25B7%25CE%25B1%25D7%25B7%25A5','blog.naver.com',1),('http://blog.naver.com/PostView.nhn?blogId=dongpil2&logNo=150102555981&beginTime=0&jumpingVid=&from=search&redirect=Log&widgetTypeCall=true&topReferer=http%3A%2F%2Fsearch.naver.com%2Fsearch.naver%3Fsm%3Dtab_hty%26where%3Dnexearch%26query%3D%25C6%25BC%25C4%25CF%25B9%25DF%25B1%25DE%25BC%25D6%25B7%25E7%25BC%25C7','blog.naver.com',1),('http://blog.daum.net/_blog/hdn/ArticleContentsView.do?blogid=0OtfB&articleno=40&looping=0&longOpen=','blog.daum.net',1),('http://www.anywiz.co.kr/index.php','www.anywiz.co.kr',1),('http://blog.naver.com/PostView.nhn?blogId=dongpil2&logNo=150102555981&beginTime=0&jumpingVid=&from=search&redirect=Log&widgetTypeCall=true&topReferer=http%3A%2F%2Fsearch.naver.com%2Fsearch.naver%3Fsm%3Dtab_hty%26where%3Dnexearch%26query%3D%25C4%25ED%25C6%25F9%25B8%25DE%25C5%25B8%25BB%25E7%25C0%25CC%25C6%25AE%2B%25B0%25B3%25B9%25DF','blog.naver.com',1);
/*!40000 ALTER TABLE `wiz_conrefer` ENABLE KEYS */;

--
-- Table structure for table `wiz_consult`
--

DROP TABLE IF EXISTS `wiz_consult`;
CREATE TABLE `wiz_consult` (
  `idx` int(10) NOT NULL auto_increment,
  `memid` varchar(20) default NULL,
  `name` varchar(20) default NULL,
  `subject` varchar(250) default NULL,
  `question` mediumtext,
  `answer` mediumtext,
  `wdate` date default NULL,
  `status` enum('Y','N') default NULL,
  PRIMARY KEY  (`idx`),
  KEY `memid` (`memid`)
) TYPE=MyISAM AUTO_INCREMENT=17;

--
-- Dumping data for table `wiz_consult`
--

/*!40000 ALTER TABLE `wiz_consult` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiz_consult` ENABLE KEYS */;

--
-- Table structure for table `wiz_content`
--

DROP TABLE IF EXISTS `wiz_content`;
CREATE TABLE `wiz_content` (
  `idx` int(3) NOT NULL auto_increment,
  `type` varchar(30) NOT NULL default '',
  `isuse` enum('Y','N') default NULL,
  `scroll` enum('Y','N') default NULL,
  `posi_x` int(3) default NULL,
  `posi_y` int(3) default NULL,
  `size_x` int(3) default NULL,
  `size_y` int(3) default NULL,
  `sdate` date default NULL,
  `edate` date default NULL,
  `linkurl` varchar(255) default NULL,
  `popup_type` char(1) default NULL,
  `title` varchar(255) default NULL,
  `content` mediumtext,
  `wdate` date default NULL,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=17;

--
-- Dumping data for table `wiz_content`
--

/*!40000 ALTER TABLE `wiz_content` DISABLE KEYS */;
INSERT INTO `wiz_content` VALUES (1,'company','Y','',0,0,0,0,'0000-00-00','0000-00-00','',NULL,'','','2005-07-13'),(2,'agreement','Y','',0,0,0,0,'0000-00-00','0000-00-00','',NULL,'','','2005-07-13'),(3,'guide','Y','',0,0,0,0,'0000-00-00','0000-00-00','',NULL,'','','2005-07-13'),(4,'privacy','Y','',0,0,0,0,'0000-00-00','0000-00-00','',NULL,'','','2005-07-13'),(15,'new','','',0,0,0,0,'0000-00-00','0000-00-00','','','ㅇㅇ','ㅇㅇ','2011-02-09'),(16,'popup','N','N',100,100,340,400,'2011-02-10','2012-02-10','','W','테스트 팝업','테스트 팝업','2011-02-10');
/*!40000 ALTER TABLE `wiz_content` ENABLE KEYS */;

--
-- Table structure for table `wiz_contime`
--

DROP TABLE IF EXISTS `wiz_contime`;
CREATE TABLE `wiz_contime` (
  `time` int(10) default NULL,
  `cnt` int(10) default NULL
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_contime`
--

/*!40000 ALTER TABLE `wiz_contime` DISABLE KEYS */;
INSERT INTO `wiz_contime` VALUES (2010121408,1),(2010121413,1),(2010121414,1),(2010121508,1),(2010121513,1),(2010121515,3),(2010121516,1),(2010121608,2),(2010121614,1),(2010121615,2),(2010121616,1),(2010121617,1),(2010121708,2),(2010121709,2),(2010121716,1),(2011010415,2),(2011010418,1),(2011010522,1),(2011010710,1),(2011010711,4),(2011010713,1),(2011010714,1),(2011010716,1),(2011010717,3),(2011010718,2),(2011010719,1),(2011010722,1),(2011010810,3),(2011010811,1),(2011010812,1),(2011010813,1),(2011010814,1),(2011010815,2),(2011010816,3),(2011010817,1),(2011010820,2),(2011010821,1),(2011010822,1),(2011010903,1),(2011010913,1),(2011010915,2),(2011010917,1),(2011010920,4),(2011010923,2),(2011011008,1),(2011011009,6),(2011011010,2),(2011011012,2),(2011011013,2),(2011011014,4),(2011011015,2),(2011011015,2),(2011011016,1),(2011011017,4),(2011011019,1),(2011011020,1),(2011011021,1),(2011011022,1),(2011011100,1),(2011011109,8),(2011011110,5),(2011011111,4),(2011011112,1),(2011011113,3),(2011011114,3),(2011011115,5),(2011011116,1),(2011011117,2),(2011011119,2),(2011011121,1),(2011011209,3),(2011011210,2),(2011011211,3),(2011011213,2),(2011011214,2),(2011011309,3),(2011011310,1),(2011011311,1),(2011011312,1),(2011011313,10),(2011011314,11),(2011011315,3),(2011011316,11),(2011011317,24),(2011011318,16),(2011011319,12),(2011011320,8),(2011011321,7),(2011011322,10),(2011011323,7),(2011011400,1),(2011011401,4),(2011011402,12),(2011011403,4),(2011011404,8),(2011011405,29),(2011011406,18),(2011011407,38),(2011011408,25),(2011011409,35),(2011011410,35),(2011011411,5),(2011011412,5),(2011011413,5),(2011011414,20),(2011011415,17),(2011011416,33),(2011011417,70),(2011011418,31),(2011011419,41),(2011011420,11),(2011011421,12),(2011011422,18),(2011011423,28),(2011011500,15),(2011011501,5),(2011011502,8),(2011011503,1),(2011011504,2),(2011011506,1),(2011011508,1),(2011011509,4),(2011011510,4),(2011011511,7),(2011011512,7),(2011011513,7),(2011011514,8),(2011011515,5),(2011011516,5),(2011011517,3),(2011011518,5),(2011011519,2),(2011011520,2),(2011011521,4),(2011011522,1),(2011011523,6),(2011011600,5),(2011011601,2),(2011011602,1),(2011011603,1),(2011011604,1),(2011011605,2),(2011011608,2),(2011011609,3),(2011011610,3),(2011011611,6),(2011011612,4),(2011011613,6),(2011011614,3),(2011011615,19),(2011011616,5),(2011011617,34),(2011011618,6),(2011011619,10),(2011011620,4),(2011011621,8),(2011011622,3),(2011011623,21),(2011011700,29),(2011011701,14),(2011011702,6),(2011011703,10),(2011011704,3),(2011011705,2),(2011011706,2),(2011011707,5),(2011011708,21),(2011011709,55),(2011011710,72),(2011011711,76),(2011011712,37),(2011011713,44),(2011011714,39),(2011011715,43),(2011011716,56),(2011011717,48),(2011011718,47),(2011011719,35),(2011011720,30),(2011011721,30),(2011011722,39),(2011011723,30),(2011011800,58),(2011011801,37),(2011011802,22),(2011011803,15),(2011011804,3),(2011011805,3),(2011011806,7),(2011011807,14),(2011011808,36),(2011011809,67),(2011011810,99),(2011011811,58),(2011011812,51),(2011011813,63),(2011011814,51),(2011011815,63),(2011011816,45),(2011011817,51),(2011011818,36),(2011011819,40),(2011011820,28),(2011011909,1),(2011011919,2),(2011011921,1),(2011012009,1),(2011012010,2),(2011012015,1),(2011012109,2),(2011012110,1),(2011012115,1),(2011012116,3),(2011012117,1),(2011012413,3),(2011012414,1),(2011012415,1),(2011012419,1),(2011012510,1),(2011012515,1),(2011012609,1),(2011012614,2),(2011012617,1),(2011012621,1),(2011012710,4),(2011012715,1),(2011012716,1),(2011012717,1),(2011012718,2),(2011012809,1),(2011012811,1),(2011012815,1),(2011013110,1),(2011013113,1),(2011013115,3),(2011013117,2),(2011013118,1),(2011020110,1),(2011020111,2),(2011020115,1),(2011020214,1),(2011020709,1),(2011020714,1),(2011020917,1),(2011020918,2),(2011020919,1),(2011020920,2),(2011021010,3),(2011021014,2),(2011021015,2),(2011021016,3),(2011021017,1),(2011021018,5),(2011021101,1),(2011021109,1),(2011021110,1),(2011021114,2),(2011021117,2),(2011021118,2),(2011021210,1),(2011021212,1),(2011021220,1),(2011021223,1),(2011021313,1),(2011021314,1),(2011021322,20),(2011021409,1),(2011021410,3),(2011021414,1),(2011021415,2),(2011021416,1),(2011021504,1),(2011021506,1),(2011021510,2),(2011021511,1),(2011021512,1),(2011021513,1),(2011021516,3),(2011021609,1),(2011021615,2),(2011021617,1),(2011021618,2),(2011021702,1),(2011021706,20),(2011021709,1),(2011021710,7),(2011021711,10),(2011021712,22),(2011021713,11),(2011021714,5),(2011021715,4),(2011021716,5),(2011021717,5),(2011021718,12),(2011021719,1),(2011021720,4),(2011021721,2),(2011021722,5),(2011021800,1),(2011021803,1),(2011021805,1),(2011021808,3),(2011021809,2),(2011021810,2),(2011021811,1),(2011021812,1),(2011021813,2),(2011021814,4),(2011021815,2),(2011021816,3),(2011021817,5),(2011021819,1),(2011021820,1),(2011021900,1),(2011021901,24),(2011021902,104),(2011021907,1),(2011021910,1),(2011021912,1),(2011021916,4),(2011021918,1),(2011021919,1),(2011021920,1),(2011021923,2),(2011022000,2),(2011022001,3),(2011022008,1),(2011022010,1),(2011022013,1),(2011022014,1),(2011022015,1),(2011022016,21),(2011022018,1),(2011022021,1),(2011022023,1),(2011022100,2),(2011022102,2),(2011022109,1),(2011022110,2),(2011022111,3),(2011022112,4),(2011022114,4),(2011022115,4),(2011022116,3),(2011022117,3),(2011022118,1),(2011022119,1),(2011022121,2),(2011022200,1),(2011022201,2),(2011022203,1),(2011022208,1),(2011022210,1),(2011022211,3),(2011022213,2),(2011022214,1),(2011022215,1),(2011022216,2),(2011022217,1),(2011022218,2),(2011022219,1),(2011022220,2),(2011022222,1),(2011022223,1),(2011022302,1),(2011022310,1),(2011022311,2),(2011022314,2),(2011022315,1);
/*!40000 ALTER TABLE `wiz_contime` ENABLE KEYS */;

--
-- Table structure for table `wiz_coupon`
--

DROP TABLE IF EXISTS `wiz_coupon`;
CREATE TABLE `wiz_coupon` (
  `idx` int(10) NOT NULL auto_increment,
  `coupon_name` varchar(250) default NULL,
  `coupon_img` varchar(60) default NULL,
  `coupon_sdate` date default NULL,
  `coupon_edate` date default NULL,
  `coupon_amount` int(10) default NULL,
  `coupon_limit` enum('Y','N') default NULL,
  `coupon_dis` int(10) default NULL,
  `coupon_type` enum('?','%') default NULL,
  `wdate` date default NULL,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=9;

--
-- Dumping data for table `wiz_coupon`
--

/*!40000 ALTER TABLE `wiz_coupon` DISABLE KEYS */;
INSERT INTO `wiz_coupon` VALUES (8,'XXX','','2011-02-10','2011-02-12',0,'N',10,'%','2011-02-10');
/*!40000 ALTER TABLE `wiz_coupon` ENABLE KEYS */;

--
-- Table structure for table `wiz_cprelation`
--

DROP TABLE IF EXISTS `wiz_cprelation`;
CREATE TABLE `wiz_cprelation` (
  `idx` int(10) NOT NULL auto_increment,
  `prdcode` char(10) default NULL,
  `catcode` char(6) default NULL,
  PRIMARY KEY  (`idx`),
  KEY `catcode` (`catcode`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_cprelation`
--

/*!40000 ALTER TABLE `wiz_cprelation` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiz_cprelation` ENABLE KEYS */;

--
-- Table structure for table `wiz_daycategory`
--

DROP TABLE IF EXISTS `wiz_daycategory`;
CREATE TABLE `wiz_daycategory` (
  `catcode` varchar(6) NOT NULL default '',
  `depthno` int(1) default NULL,
  `priorno01` int(2) default NULL,
  `priorno02` int(2) default NULL,
  `priorno03` int(2) default NULL,
  `catname` varchar(30) default NULL,
  `catuse` enum('Y','N') default NULL,
  `catimg` varchar(20) default NULL,
  `catimg_over` varchar(20) default NULL,
  `subimg` mediumtext,
  `subimg_type` varchar(3) default NULL,
  `prd_tema` varchar(10) default NULL,
  `prd_num` int(3) default NULL,
  `prd_width` varchar(3) default NULL,
  `prd_height` varchar(3) default NULL,
  `recom_use` enum('Y','N') default NULL,
  `recom_tema` varchar(10) default NULL,
  `recom_num` int(3) default NULL,
  PRIMARY KEY  (`catcode`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_daycategory`
--

/*!40000 ALTER TABLE `wiz_daycategory` DISABLE KEYS */;
INSERT INTO `wiz_daycategory` VALUES ('100000',1,1,0,0,'지산동','','','','','','',0,'','','','',0),('110000',1,2,0,0,'시지동','','','','','','',0,'','','','',0),('120000',1,3,0,0,'칠곡','','','','','','',0,'','','','',0),('130000',1,4,0,0,'성서','','','','','','',0,'','','','',0),('140000',1,6,0,0,'범어동','','','','','','',0,'','','','',0),('150000',1,7,0,0,'울산','','','','','','',0,'','','','',0),('160000',1,5,0,0,'포항','','','','','','',0,'','','','',0),('170000',1,8,0,0,'청주','','','','','','',0,'','','','',0),('180000',1,9,0,0,'제주','','','','','','',0,'','','','',0);
/*!40000 ALTER TABLE `wiz_daycategory` ENABLE KEYS */;

--
-- Table structure for table `wiz_daycprelation`
--

DROP TABLE IF EXISTS `wiz_daycprelation`;
CREATE TABLE `wiz_daycprelation` (
  `idx` int(10) NOT NULL auto_increment,
  `prdcode` char(10) default NULL,
  `catcode` char(6) default NULL,
  PRIMARY KEY  (`idx`),
  KEY `catcode` (`catcode`)
) TYPE=MyISAM AUTO_INCREMENT=3;

--
-- Dumping data for table `wiz_daycprelation`
--

/*!40000 ALTER TABLE `wiz_daycprelation` DISABLE KEYS */;
INSERT INTO `wiz_daycprelation` VALUES (2,'1102090001','110000');
/*!40000 ALTER TABLE `wiz_daycprelation` ENABLE KEYS */;

--
-- Table structure for table `wiz_dayorder`
--

DROP TABLE IF EXISTS `wiz_dayorder`;
CREATE TABLE `wiz_dayorder` (
  `orderid` varchar(20) NOT NULL default '',
  `prdcode` varchar(20) default NULL,
  `amount` int(10) NOT NULL default '0',
  `send_id` varchar(20) default NULL,
  `send_name` varchar(20) default NULL,
  `send_tphone` varchar(14) default NULL,
  `send_hphone` varchar(14) default NULL,
  `send_email` varchar(50) default NULL,
  `send_post` varchar(7) default NULL,
  `send_address` varchar(80) default NULL,
  `demand` mediumtext,
  `message` mediumtext,
  `cancelmsg` mediumtext,
  `rece_name` varchar(20) default NULL,
  `rece_tphone` varchar(14) default NULL,
  `rece_hphone` varchar(14) default NULL,
  `rece_email` varchar(50) default NULL,
  `rece_post` varchar(7) default NULL,
  `rece_address` varchar(80) default NULL,
  `pay_method` varchar(2) default NULL,
  `account_name` varchar(20) default NULL,
  `account` varchar(80) default NULL,
  `coupon_use` int(10) default NULL,
  `coupon_idx` varchar(100) default NULL,
  `reserve_use` int(10) default NULL,
  `reserve_price` int(10) default NULL,
  `deliver_method` varchar(2) default NULL,
  `deliver_price` int(10) default NULL,
  `deliver_num` varchar(32) default NULL,
  `deliver_date` varchar(12) default NULL,
  `discount_price` int(10) default NULL,
  `prd_price` int(10) default NULL,
  `total_price` int(10) default NULL,
  `status` varchar(2) default NULL,
  `order_date` datetime default NULL,
  `pay_date` datetime default NULL,
  `send_date` datetime default NULL,
  `cancel_date` datetime default NULL,
  `descript` mediumtext,
  `tno` varchar(50) default NULL,
  `dealno` varchar(50) default NULL,
  `escrow_check` varchar(2) default 'N',
  `escrow_stats` varchar(2) default 'NO',
  `tax_type` char(1) default NULL,
  `id_info` varchar(20) NOT NULL default '',
  `bill_yn` char(1) NOT NULL default '',
  `coupon_number` varchar(50) default NULL,
  `coupon_date` datetime default NULL,
  `authno` varchar(10) NOT NULL default '',
  `isgift` enum('Y','N') default 'N',
  PRIMARY KEY  (`orderid`),
  KEY `pay_method` (`pay_method`,`send_id`,`status`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_dayorder`
--

/*!40000 ALTER TABLE `wiz_dayorder` DISABLE KEYS */;
INSERT INTO `wiz_dayorder` VALUES ('110222111038556','1102090001',1,'test','테스트','010-0000-0000','010-0000-0000','test@test.com','-','','','',' ','테스트','010-0000-0000','010-0000-0000','test@test.com','-','','PC','','',0,'',0,0,'DC',0,'',NULL,0,35000,35000,'OR','2011-02-22 11:11:26','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','',NULL,NULL,'N','NO','','','',NULL,NULL,'','');
/*!40000 ALTER TABLE `wiz_dayorder` ENABLE KEYS */;

--
-- Table structure for table `wiz_dayproduct`
--

DROP TABLE IF EXISTS `wiz_dayproduct`;
CREATE TABLE `wiz_dayproduct` (
  `prdcode` varchar(10) NOT NULL default '',
  `prdname` varchar(100) default NULL,
  `accounts` varchar(22) default NULL,
  `money` int(10) default NULL,
  `commission` int(10) default NULL,
  `company_idx` int(10) default NULL,
  `company` varchar(100) default NULL,
  `md_idx` int(10) default NULL,
  `md_name` varchar(20) default NULL,
  `prdcom` varchar(50) default NULL,
  `origin` varchar(50) default NULL,
  `showset` enum('Y','N') default NULL,
  `stock` int(5) default NULL,
  `savestock` int(5) default NULL,
  `prior` bigint(14) default NULL,
  `viewcnt` int(5) default NULL,
  `deimgcnt` int(5) default NULL,
  `basketcnt` int(10) default NULL,
  `ordercnt` int(10) default NULL,
  `cancelcnt` int(10) default NULL,
  `comcnt` int(10) default NULL,
  `sellprice` int(10) default NULL,
  `conprice` int(10) default NULL,
  `discount_per` int(10) default NULL,
  `reserve` int(10) default NULL,
  `strprice` varchar(255) default NULL,
  `selldate` datetime default NULL,
  `selllastdate` datetime default NULL,
  `starttime` varchar(10) default NULL,
  `endtime` varchar(10) default NULL,
  `selllimit` varchar(10) default NULL,
  `personal_mininum` int(10) default NULL,
  `personal_maxnum` int(10) default NULL,
  `stock_mininum` int(10) default NULL,
  `stock_maxnum` int(10) default NULL,
  `buy_mininum` int(10) NOT NULL default '1',
  `buy_maxnum` int(10) NOT NULL default '1',
  `del_type` enum('DA','DB','DC','DD') default NULL,
  `del_price` int(11) default NULL,
  `prdicon` varchar(255) default NULL,
  `prefer` int(1) default NULL,
  `opt_use` enum('Y','N') default NULL,
  `opttitle` varchar(50) default NULL,
  `optcode` mediumtext,
  `opttitle2` varchar(50) default NULL,
  `optcode2` mediumtext,
  `opttitle3` varchar(50) default NULL,
  `optcode3` mediumtext,
  `opttitle4` varchar(50) default NULL,
  `optcode4` mediumtext,
  `opttitle5` varchar(50) default NULL,
  `optcode5` mediumtext,
  `opttitle6` varchar(50) default NULL,
  `optcode6` mediumtext,
  `opttitle7` varchar(50) default NULL,
  `optcode7` mediumtext,
  `optvalue` mediumtext,
  `prdimg_R` varchar(30) default NULL,
  `prdimg_L1` varchar(30) default NULL,
  `prdimg_M1` varchar(30) default NULL,
  `prdimg_S1` varchar(30) default NULL,
  `prdimg_L2` varchar(30) default NULL,
  `prdimg_M2` varchar(30) default NULL,
  `prdimg_S2` varchar(30) default NULL,
  `prdimg_L3` varchar(30) default NULL,
  `prdimg_M3` varchar(30) default NULL,
  `prdimg_S3` varchar(30) default NULL,
  `prdimg_L4` varchar(30) default NULL,
  `prdimg_M4` varchar(30) default NULL,
  `prdimg_S4` varchar(30) default NULL,
  `prdimg_L5` varchar(30) default NULL,
  `prdimg_M5` varchar(30) default NULL,
  `prdimg_S5` varchar(30) default NULL,
  `searchkey` varchar(255) default NULL,
  `stortexp` varchar(255) default NULL,
  `content` mediumtext,
  `coupon_con` text,
  `shopguide` text,
  `attention` mediumtext,
  `wdate` datetime default NULL,
  `mdate` datetime default NULL,
  `isdeliver` enum('Y','N') default 'N',
  `shopinfo` text,
  `sms` text,
  `deliver_fee` int(11) default NULL,
  `img_main` varchar(100) default NULL,
  `img_coupon` varchar(100) default NULL,
  `img_mail` varchar(100) default NULL,
  `img_title` varchar(100) default NULL,
  `deliver_standard` int(11) NOT NULL default '0',
  `addstock` int(11) default NULL,
  PRIMARY KEY  (`prdcode`),
  FULLTEXT KEY `prdcode` (`prdcode`),
  FULLTEXT KEY `prdcode_2` (`prdcode`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_dayproduct`
--

/*!40000 ALTER TABLE `wiz_dayproduct` DISABLE KEYS */;
INSERT INTO `wiz_dayproduct` VALUES ('1102090001','아카이','money',27000,0,1,'공급업체',4,'테스트MD','','','N',0,0,0,0,0,0,0,0,0,30000,60000,50,3000,'','2011-02-17 00:00:01','2012-02-29 23:59:59','09:00:00','20:00:00','stock',0,0,100,200,1,15,'',0,'',0,'','','','','','사이즈','44^1000^0^^55^2000^0^^66^3000^0^^77^4000^0^^88^5000^0^^99^0^0^^','','','색상','흰색,검정,노랑,파랑,빨강','','','','','0^0^0^0^0^^','1102090001_R.jpg','1102090001_L1.jpg','1102090001_M1.jpg','1102090001_S1.jpg','1102090001_L2.jpg','1102090001_M2.jpg','1102090001_S2.jpg','1102090001_L3.jpg','1102090001_M3.jpg','1102090001_S3.jpg','','','','','','','','간단설명간단설명간단설명간단설명간단설명간단설명간단설명간단설명간단설명간단설명','<P><IMG border=0 src=\"http://wizoneday.anywiz.co.kr/data/webedit/11021104161688.jpg\"></P>','<P><IMG border=0 src=\"http://wizoneday.anywiz.co.kr/data/webedit/11021104165731.jpg\"></P>','<P><IMG border=0 src=\"http://wizoneday.anywiz.co.kr/data/webedit/11020908543845.jpg\"></P>','쿠폰 내 주의사항쿠폰 내 주의사항쿠폰 내 주의사항쿠폰 내 주의사항쿠폰 내 주의사항쿠폰 내 주의사항쿠폰 내 주의사항쿠폰 내 주의사항쿠폰 내 주의사항쿠폰 내 주의사항','2011-02-09 20:49:45','0000-00-00 00:00:00','N','쿠폰 내 매장안내쿠폰 내 매장안내쿠폰 내 매장안내쿠폰 내 매장안내쿠폰 내 매장안내쿠폰 내 매장안내쿠폰 내 매장안내쿠폰 내 매장안내쿠폰 내 매장안내쿠폰 내 매장안내','SMS 문구SMS 문구SMS 문구SMS 문구SMS 문구SMS 문구SMS 문구SMS 문구SMS 문구',0,'','Array','Array','',0,60);
/*!40000 ALTER TABLE `wiz_dayproduct` ENABLE KEYS */;

--
-- Table structure for table `wiz_design`
--

DROP TABLE IF EXISTS `wiz_design`;
CREATE TABLE `wiz_design` (
  `site_title` varchar(255) default NULL,
  `site_intro` varchar(255) default NULL,
  `site_keyword` varchar(255) default NULL,
  `site_align` enum('LEFT','CENTER','RIGHT') default NULL,
  `site_width` int(4) default NULL,
  `site_bgcolor` varchar(7) default NULL,
  `site_background` varchar(40) default NULL,
  `site_font` varchar(7) default NULL,
  `site_link` varchar(7) default NULL,
  `site_active` varchar(7) default NULL,
  `site_hover` varchar(7) default NULL,
  `site_visited` varchar(7) default NULL,
  `footer_html` mediumtext,
  `logo_img` varchar(40) default NULL,
  `cate_img` varchar(40) default NULL,
  `cate_sub` enum('Y','N') default NULL,
  `cate_subx` int(5) default NULL,
  `cate_suby` int(5) default NULL,
  `cate_menuh` int(5) default NULL,
  `main_img` varchar(40) default NULL,
  `main_width` int(3) default NULL,
  `main_height` int(3) default NULL,
  `main_link` varchar(255) default NULL,
  `main_target` varchar(20) default NULL,
  `main_html` mediumtext,
  `notice_img` varchar(40) default NULL,
  `notice_rows` int(2) default NULL,
  `notice_cut` int(3) default NULL,
  `right_scroll` enum('Y','N') default NULL,
  `right_prdcnt` int(2) default NULL,
  `right_starty` int(3) default NULL,
  `topnavi_login_url` varchar(255) default NULL,
  `topnavi_logout_url` varchar(255) default NULL,
  `topnavi_join_url` varchar(255) default NULL,
  `topnavi_myshop_url` varchar(255) default NULL,
  `topnavi01_url` varchar(255) default NULL,
  `topnavi02_url` varchar(255) default NULL,
  `topnavi03_url` varchar(255) default NULL,
  `topnavi04_url` varchar(255) default NULL,
  `topnavi05_url` varchar(255) default NULL,
  `topnavi06_url` varchar(255) default NULL,
  `topmenu01_url` varchar(255) default NULL,
  `topmenu02_url` varchar(255) default NULL,
  `topmenu03_url` varchar(255) default NULL,
  `topmenu04_url` varchar(255) default NULL,
  `topmenu05_url` varchar(255) default NULL,
  `topmenu06_url` varchar(255) default NULL,
  `topmenu07_url` varchar(255) default NULL,
  `topmenu08_url` varchar(255) default NULL,
  `topmenu09_url` varchar(255) default NULL,
  `topmenu10_url` varchar(255) default NULL
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_design`
--

/*!40000 ALTER TABLE `wiz_design` DISABLE KEYS */;
INSERT INTO `wiz_design` VALUES ('원데이몰 솔루션','원데이몰 솔루션, 원데이몰 솔루션, 원데이몰 솔루션','원데이몰 솔루션, 원데이몰 솔루션, 원데이몰 솔루션','CENTER',930,'#FFFFFF','','','','','','','<TABLE cellSpacing=0 cellPadding=0 width=914 border=0>\r\n<TBODY>\r\n<TR bgColor=#eeeeee>\r\n<TD> </TD>\r\n<TD class=font_12_1 style=\'PADDING-RIGHT: 0px; PADDING-LEFT: 15px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\'>\r\n<A href=\'/\'>홈</A> | \r\n<A href=\'/center/company.php\'>회사소개</A> | \r\n<A href=\'/center/guide.php\'>이용안내</A> | \r\n<A href=\'/member/join.php\'>이용약관</A> | \r\n<A href=\'/center/privacy.php\'>개인정보 보호정책</A> | \r\n<A href=\'/center/center.php\'>고객센터</A> | \r\n<A href=\'/center/sitemap.php\'>사이트맵</A>\r\n</TD></TR>\r\n<TR>\r\n<TD vAlign=center align=middle width=190><IMG height=39 src=\'/images/newimg/main/img_footer_logo.gif\' width=145></TD>\r\n<TD class=font_12_1 style=\'PADDING-RIGHT: 0px; PADDING-LEFT: 15px; PADDING-BOTTOM: 20px; PADDING-TOP: 20px\'>123-11 서울시 강남구 홍길동 123-1호 00빌딩 123호 | ☎ 문의 전화 : 000-0000-0000 / Fax 000-0000-0000<BR>00그룹 등록번호 : 123-12-12345 <BR>대표자명:000 | 통신판매업신고 제제12-123호 | 개인정보 보호 관리자 : 0000<BR>Copyright ⓒ 2007 DEMO SHOP All rights reserved. </TD></TR></TBODY></TABLE>\r\n','logo.gif','cateimg.gif','Y',170,110,21,'mainimg.gif',489,238,'',NULL,'<P>sddddddddddddddddddd</P>','notice_img.gif',4,30,'Y',100,90,'/member/login.php','/member/logout.php','/member/join.php','/member/my_shop.php','/','','/shop/prd_basket.php','/shop/order_list.php','','',' /oneday/company.php','/','/oneday/guide.php','/bbs/list.php?code=notice','/oneday/center.php','/','/oneday/oneday_sch.php','','','');
/*!40000 ALTER TABLE `wiz_design` ENABLE KEYS */;

--
-- Table structure for table `wiz_feed`
--

DROP TABLE IF EXISTS `wiz_feed`;
CREATE TABLE `wiz_feed` (
  `idx` int(10) NOT NULL auto_increment,
  `feed_email` varchar(100) default NULL,
  `feed_sms` varchar(100) default NULL,
  `wdate` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=12;

--
-- Dumping data for table `wiz_feed`
--

/*!40000 ALTER TABLE `wiz_feed` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiz_feed` ENABLE KEYS */;

--
-- Table structure for table `wiz_filedesc`
--

DROP TABLE IF EXISTS `wiz_filedesc`;
CREATE TABLE `wiz_filedesc` (
  `idx` int(10) NOT NULL auto_increment,
  `fdir` text,
  `fdesc` text,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_filedesc`
--

/*!40000 ALTER TABLE `wiz_filedesc` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiz_filedesc` ENABLE KEYS */;

--
-- Table structure for table `wiz_level`
--

DROP TABLE IF EXISTS `wiz_level`;
CREATE TABLE `wiz_level` (
  `idx` int(10) NOT NULL auto_increment,
  `level` int(2) default NULL,
  `icon` varchar(60) default NULL,
  `name` varchar(100) default NULL,
  `distype` enum('W','P') default NULL,
  `discount` int(8) default NULL,
  `exp` mediumtext,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=27;

--
-- Dumping data for table `wiz_level`
--

/*!40000 ALTER TABLE `wiz_level` DISABLE KEYS */;
INSERT INTO `wiz_level` VALUES (26,4,'','일반회원','P',0,''),(22,1,'','골드회원','P',10,''),(23,2,'','우수회원','P',0,''),(24,3,'','정회원','P',0,'');
/*!40000 ALTER TABLE `wiz_level` ENABLE KEYS */;

--
-- Table structure for table `wiz_mailsms`
--

DROP TABLE IF EXISTS `wiz_mailsms`;
CREATE TABLE `wiz_mailsms` (
  `code` varchar(20) NOT NULL default '',
  `subject` varchar(255) default NULL,
  `sms_cust` enum('Y','N') default NULL,
  `sms_oper` enum('Y','N') default NULL,
  `sms_msg` varchar(100) default NULL,
  `email_subj` varchar(255) default NULL,
  `email_cust` enum('Y','N') default NULL,
  `email_oper` enum('Y','N') default NULL,
  `email_msg` text,
  PRIMARY KEY  (`code`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_mailsms`
--

/*!40000 ALTER TABLE `wiz_mailsms` DISABLE KEYS */;
INSERT INTO `wiz_mailsms` VALUES ('mem_notice','일반 메일 발송시','N','N','','','N','N','<STYLE>\r\n  td {font-size:12px;font-family:\"굴림\",\"돋움\";color:#4A4A4A;line-height:160%} \r\n  table {border-collapse:collapse;}\r\n</STYLE>\r\n\r\n<TABLE height=\"100%\" cellSpacing=0 cellPadding=0 width=642 align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD align=middle>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/top_06.gif\"></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=642 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 30px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\">메일내용 작성</TD>\r\n<TD vAlign=bottom align=right width=190><IMG src=\"{SHOP_URL}/images/mailimg/img_06.gif\"></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/bottom.gif\"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>'),('mem_apply','[회원관련] 회원가입시','Y','N','[{SHOP_NAME}] - {MEM_NAME}님 가입해주셔서 감사합니다.','[{SHOP_NAME}] - 가입해주셔서 감사합니다.','Y','N','\r\n<STYLE>\r\n  td {font-size:12px;font-family:\"굴림\",\"돋움\";color:#4A4A4A;line-height:160%} \r\n  table {border-collapse:collapse;}\r\n</STYLE>\r\n\r\n<TABLE height=\"100%\" cellSpacing=0 cellPadding=0 width=642 align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD align=middle>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/top_06.gif\"></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=642 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 30px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\">\r\n<P>회원님 가입해주셔서 감사합니다.<BR><BR>아이디 : {MEM_ID}</P>\r\n<P>비밀번호&nbsp;: {MEM_PW}</P></TD>\r\n<TD vAlign=bottom align=right width=190><IMG src=\"{SHOP_URL}/images/mailimg/img_06.gif\"></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/bottom.gif\"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>'),('mem_out','[회원관련] 회원탈퇴시','Y','Y','[{SHOP_NAME}] - {MEM_NAME}님, 탈퇴처리되었습니다.','[{SHOP_NAME}] - {MEM_NAME}님, 탈퇴처리되었습니다.','Y','Y','<STYLE>\r\n  td {font-size:12px;font-family:\"굴림\",\"돋움\";color:#4A4A4A;line-height:160%} \r\n  table {border-collapse:collapse;}\r\n</STYLE>\r\n\r\n<TABLE height=\"100%\" cellSpacing=0 cellPadding=0 width=642 align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD align=middle>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/top_06.gif\"></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=642 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 30px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\">회원님 탈퇴처리되었습니다. 불편을드려 죄송합니다</TD>\r\n<TD vAlign=bottom align=right width=190><IMG src=\"{SHOP_URL}/images/mailimg/img_06.gif\"></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/bottom.gif\"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>'),('mem_idpw','[회원관련] 아이디/비밀번호 찾기시','Y','N','[{SHOP_NAME}] - {MEM_NAME}님, 요청하신 아이디/비밀번호[{MEM_ID}/{MEM_PW}] 입니다','[{SHOP_NAME}] - {MEM_NAME}님 요청하신 아이디/비밀번호 입니다.','Y','N','<STYLE>\r\n  td {font-size:12px;font-family:\"굴림\",\"돋움\";color:#4A4A4A;line-height:160%} \r\n  table {border-collapse:collapse;}\r\n</STYLE>\r\n\r\n<TABLE height=\"100%\" cellSpacing=0 cellPadding=0 width=642 align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD align=middle>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/top_06.gif\"></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=642 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 30px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\">회원님 요청하신 아이디/비밀번호 입니다.<BR><BR>아이디 : {MEM_ID}<BR>비밀번호 : {MEM_PW}</TD>\r\n<TD vAlign=bottom align=right width=190><IMG src=\"{SHOP_URL}/images/mailimg/img_06.gif\"></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/bottom.gif\"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>'),('order_com','[주문관련] 주문완료시','Y','N','[{SHOP_NAME}] - {MEM_NAME}님의 주문이 정상적으로 접수되었습니다. 감사합니다.','[{SHOP_NAME}] - {MEM_NAME}님의  주문이 정상적으로 접수되었습니다. 감사합니다.','Y','Y','<STYLE>\r\n  td {font-size:12px;font-family:\"굴림\",\"돋움\";color:#4A4A4A;line-height:160%} \r\n  table {border-collapse:collapse;}\r\n</STYLE>\r\n<TABLE height=\"100%\" cellSpacing=0 cellPadding=0 width=642 align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD align=middle>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/top_02.gif\"></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/title_02.gif\"></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=642 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 30px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\"><FONT color=#1cb6b6><B><FONT color=#000000>{MEM_NAME}</FONT>고객님, 안녕하세요? <BR>저희 쇼핑몰을 이용해 주셔서 감사합니다.<BR><FONT color=#000000>{MEM_NAME}</FONT>고객님께서 주문하신 제품이 접수되었습니다.<BR></B></FONT><BR><FONT color=#757575>주문내역 및 배송정보는 MY Shopping의 주문/배송조회에서 <BR>확인하실 수 있습니다. <BR>고객님께 빠르고 정확하게 제품이 전달될 수 있도록 최선을 다하겠습니다. </FONT></TD>\r\n<TD align=right width=190><IMG src=\"{SHOP_URL}/images/mailimg/img_02.gif\"></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD align=middle background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<P>&nbsp;</P>\r\n<P>{ORDER_INFO}</P>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=\"95%\" align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD>\r\n<TABLE cellSpacing=0 cellPadding=5 width=\"100%\" border=0>\r\n<TBODY>\r\n<TR>\r\n<TD colSpan=2></TD></TR>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 15px; PADDING-BOTTOM: 20px; PADDING-TOP: 20px\" colSpan=2>※ 기타 문의사항이 있으시면, {SHOP_EMAIL}이나 {SHOP_TEL}으로 문의주시기 바랍니다.</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/bottom.gif\"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>'),('order_pay','[주문관련] 입금확인시','Y','N','[{SHOP_NAME}] - {MEM_NAME}님 입금확인 되었습니다. 신속히 배송해드리겠습니다.','[{SHOP_NAME}] - {MEM_NAME}님 입금확인 되었습니다. 신속히 배송해드리겠습니다.','Y','N','<STYLE>\r\n  td {font-size:12px;font-family:\"굴림\",\"돋움\";color:#4A4A4A;line-height:160%} \r\n  table {border-collapse:collapse;}\r\n</STYLE>\r\n<TABLE height=\"100%\" cellSpacing=0 cellPadding=0 width=642 align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD align=middle>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/top_03.gif\"></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/title_03.gif\"></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=642 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 30px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\"><FONT color=#1cb6b6><B><FONT color=#000000>{MEM_NAME}</FONT>고객님, 안녕하세요? <BR>저희 쇼핑몰을 이용해 주셔서 감사합니다.<BR><FONT color=#000000>{MEM_NAME}</FONT>고객님께서 주문하신 제품이 접수되었습니다.<BR></B></FONT><BR><FONT color=#757575>주문내역 및 배송정보는 MY Shopping의 주문/배송조회에서 <BR>확인하실 수 있습니다. <BR>고객님께 빠르고 정확하게 제품이 전달될 수 있도록 최선을 다하겠습니다. </FONT></TD>\r\n<TD align=right width=190><IMG src=\"{SHOP_URL}/images/mailimg/img_02.gif\"></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD align=middle background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<P>&nbsp;</P>\r\n<P>{ORDER_INFO}</P>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=\"95%\" align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD>\r\n<TABLE cellSpacing=0 cellPadding=5 width=\"100%\" border=0>\r\n<TBODY>\r\n<TR>\r\n<TD colSpan=2></TD></TR>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 15px; PADDING-BOTTOM: 20px; PADDING-TOP: 20px\" colSpan=2>※ 기타 문의사항이 있으시면, {SHOP_EMAIL}이나 {SHOP_TEL}으로 문의주시기 바랍니다.</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/bottom.gif\"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>'),('order_deliver','[주문관련] 배송처리시','Y','N','[{SHOP_NAME}] - {MEM_NAME}님 주문하신 상품이 배송되었습니다.','[{SHOP_NAME}] - {MEM_NAME}님 주문하신 상품이 배송되었습니다.','Y','N','<STYLE>\r\n  td {font-size:12px;font-family:\"굴림\",\"돋움\";color:#4A4A4A;line-height:160%} \r\n  table {border-collapse:collapse;}\r\n</STYLE>\r\n<TABLE height=\"100%\" cellSpacing=0 cellPadding=0 width=642 align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD align=middle>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/top_04.gif\"></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/title_04.gif\"></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=642 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 30px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\"><FONT color=#1cb6b6><B><FONT color=#000000>{MEM_NAME}</FONT>고객님, 안녕하세요? <BR>저희 쇼핑몰을 이용해 주셔서 감사합니다.<BR><FONT color=#000000>{MEM_NAME}</FONT>고객님께서 주문하신 제품이 접수되었습니다.<BR></B></FONT><BR><FONT color=#757575>주문내역 및 배송정보는 MY Shopping의 주문/배송조회에서 <BR>확인하실 수 있습니다. <BR>고객님께 빠르고 정확하게 제품이 전달될 수 있도록 최선을 다하겠습니다. </FONT></TD>\r\n<TD align=right width=190><IMG src=\"{SHOP_URL}/images/mailimg/img_02.gif\"></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD align=middle background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<P>&nbsp;</P>\r\n<P>{ORDER_INFO}</P>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=\"95%\" align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD>\r\n<TABLE cellSpacing=0 cellPadding=5 width=\"100%\" border=0>\r\n<TBODY>\r\n<TR>\r\n<TD colSpan=2></TD></TR>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 15px; PADDING-BOTTOM: 20px; PADDING-TOP: 20px\" colSpan=2>※ 기타 문의사항이 있으시면, {SHOP_EMAIL}이나 {SHOP_TEL}으로 문의주시기 바랍니다.</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/bottom.gif\"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>'),('order_cancel','[주문관련] 주문취소시','Y','N','[{SHOP_NAME}] - {MEM_NAME}님 주문이 취소되었습니다.','[{SHOP_NAME}] - {MEM_NAME}님 주문이 취소되었습니다.','Y','N','<STYLE>\r\n  td {font-size:12px;font-family:\"굴림\",\"돋움\";color:#4A4A4A;line-height:160%} \r\n  table {border-collapse:collapse;}\r\n</STYLE>\r\n<TABLE height=\"100%\" cellSpacing=0 cellPadding=0 width=642 align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD align=middle>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/top_05.gif\"></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/title_05.gif\"></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=642 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 30px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\"><FONT color=#1cb6b6><B><FONT color=#000000>{MEM_NAME}</FONT>고객님, 안녕하세요? <BR>저희 쇼핑몰을 이용해 주셔서 감사합니다.<BR><FONT color=#000000>{MEM_NAME}</FONT>고객님께서 주문하신 제품이 접수되었습니다.<BR></B></FONT><BR><FONT color=#757575>주문내역 및 배송정보는 MY Shopping의 주문/배송조회에서 <BR>확인하실 수 있습니다. <BR>고객님께 빠르고 정확하게 제품이 전달될 수 있도록 최선을 다하겠습니다. </FONT></TD>\r\n<TD align=right width=190><IMG src=\"{SHOP_URL}/images/mailimg/img_02.gif\"></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD align=middle background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<P>&nbsp;</P>\r\n<P>{ORDER_INFO}</P>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=\"95%\" align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD>\r\n<TABLE cellSpacing=0 cellPadding=5 width=\"100%\" border=0>\r\n<TBODY>\r\n<TR>\r\n<TD colSpan=2></TD></TR>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 15px; PADDING-BOTTOM: 20px; PADDING-TOP: 20px\" colSpan=2>※ 기타 문의사항이 있으시면, {SHOP_EMAIL}이나 {SHOP_TEL}으로 문의주시기 바랍니다.</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/bottom.gif\"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>');
/*!40000 ALTER TABLE `wiz_mailsms` ENABLE KEYS */;

--
-- Table structure for table `wiz_md`
--

DROP TABLE IF EXISTS `wiz_md`;
CREATE TABLE `wiz_md` (
  `idx` int(10) NOT NULL auto_increment,
  `md_name` varchar(30) default NULL,
  `md_email` varchar(100) default NULL,
  `tel` varchar(20) default NULL,
  `hp` varchar(20) default NULL,
  `memo` text,
  `lastlog` datetime default NULL,
  `wdate` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=5;

--
-- Dumping data for table `wiz_md`
--

/*!40000 ALTER TABLE `wiz_md` DISABLE KEYS */;
INSERT INTO `wiz_md` VALUES (4,'테스트MD','md@oneday.com','010-0000-0000','010-0000-0000','테스트',NULL,'2011-01-19 18:07:23');
/*!40000 ALTER TABLE `wiz_md` ENABLE KEYS */;

--
-- Table structure for table `wiz_member`
--

DROP TABLE IF EXISTS `wiz_member`;
CREATE TABLE `wiz_member` (
  `id` varchar(20) NOT NULL default '',
  `passwd` varchar(20) default NULL,
  `name` varchar(20) default NULL,
  `resno` varchar(14) default NULL,
  `email` varchar(50) default NULL,
  `tphone` varchar(14) default NULL,
  `hphone` varchar(14) default NULL,
  `fax` varchar(14) default NULL,
  `post` varchar(7) default NULL,
  `address` varchar(255) default NULL,
  `address2` varchar(255) default NULL,
  `reemail` enum('Y','N') default NULL,
  `resms` enum('Y','N') default NULL,
  `birthday` varchar(10) default NULL,
  `bgubun` char(1) default NULL,
  `marriage` char(1) default NULL,
  `memorial` varchar(10) default NULL,
  `scholarship` varchar(2) default NULL,
  `job` varchar(2) default NULL,
  `income` varchar(2) default NULL,
  `car` varchar(2) default NULL,
  `consph` varchar(80) default NULL,
  `conprd` varchar(80) default NULL,
  `level` varchar(10) default NULL,
  `recom` varchar(20) default NULL,
  `visit` int(5) default NULL,
  `visit_time` datetime default NULL,
  `comment` mediumtext,
  `com_num` varchar(20) default NULL,
  `com_name` varchar(30) default NULL,
  `com_owner` varchar(20) default NULL,
  `com_post` varchar(7) default NULL,
  `com_address` varchar(80) default NULL,
  `com_kind` varchar(50) default NULL,
  `com_class` varchar(50) default NULL,
  `wdate` datetime default NULL,
  `goods` varchar(50) default NULL,
  `recom_name` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_member`
--

/*!40000 ALTER TABLE `wiz_member` DISABLE KEYS */;
INSERT INTO `wiz_member` VALUES ('test','test','테스트','000000-0000000','test@test.com','010-0000-0000','010-0000-0000','010-0000-0000','0000-00','OO시 OO구 OO동 OO번지','OO빌딩 OO호','Y','Y','-00-00','','','-00-00','','','','','','','26','',18,'2011-02-22 11:10:36','','','','','-','','','','2011-01-19 21:22:06',NULL,NULL);
/*!40000 ALTER TABLE `wiz_member` ENABLE KEYS */;

--
-- Table structure for table `wiz_mostmail`
--

DROP TABLE IF EXISTS `wiz_mostmail`;
CREATE TABLE `wiz_mostmail` (
  `code` varchar(20) NOT NULL default '',
  `subject` varchar(255) default NULL,
  `email_msg` text,
  PRIMARY KEY  (`code`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_mostmail`
--

/*!40000 ALTER TABLE `wiz_mostmail` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiz_mostmail` ENABLE KEYS */;

--
-- Table structure for table `wiz_mycoupon`
--

DROP TABLE IF EXISTS `wiz_mycoupon`;
CREATE TABLE `wiz_mycoupon` (
  `idx` int(10) NOT NULL auto_increment,
  `memid` varchar(20) NOT NULL default '',
  `eventidx` int(10) default NULL,
  `prdcode` varchar(20) default NULL,
  `coupon_name` varchar(255) default NULL,
  `coupon_dis` int(10) default NULL,
  `coupon_type` enum('?','%') default NULL,
  `coupon_sdate` date default NULL,
  `coupon_edate` date default NULL,
  `coupon_use` enum('N','Y') default NULL,
  `wdate` datetime default NULL,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_mycoupon`
--

/*!40000 ALTER TABLE `wiz_mycoupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiz_mycoupon` ENABLE KEYS */;

--
-- Table structure for table `wiz_operinfo`
--

DROP TABLE IF EXISTS `wiz_operinfo`;
CREATE TABLE `wiz_operinfo` (
  `pay_method` varchar(20) default NULL,
  `pay_method_day` varchar(20) NOT NULL default '',
  `pay_id` varchar(30) default NULL,
  `pay_key` varchar(100) default NULL,
  `pay_account` mediumtext,
  `pay_agent` varchar(20) default NULL,
  `pay_escrow` enum('Y','N') default NULL,
  `pay_test` enum('Y','N') default NULL,
  `sms_type` char(1) default NULL,
  `sms_id` varchar(80) default NULL,
  `sms_pw` varchar(20) default NULL,
  `del_com` varchar(20) default NULL,
  `del_trace` mediumtext,
  `del_prd` enum('DA','DB') default NULL,
  `del_prd2` enum('DA','DB') default NULL,
  `del_method` enum('DA','DB','DC','DD') default NULL,
  `del_fixprice` int(10) default NULL,
  `del_staprice` int(10) default NULL,
  `del_staprice2` int(10) default NULL,
  `del_staprice3` int(10) default NULL,
  `del_extrapost1` int(10) default NULL,
  `del_extrapost12` int(10) default NULL,
  `del_extraprice1` int(10) default NULL,
  `del_extrapost2` int(10) default NULL,
  `del_extrapost22` int(10) default NULL,
  `del_extraprice2` int(10) default NULL,
  `del_extrapost3` int(10) default NULL,
  `del_extrapost32` int(10) default NULL,
  `del_extraprice3` int(10) default NULL,
  `number0` varchar(50) default NULL,
  `number1` varchar(50) default NULL,
  `number2` varchar(50) default NULL,
  `number3` varchar(50) default NULL,
  `number4` varchar(50) default NULL,
  `number5` varchar(50) default NULL,
  `number6` varchar(50) default NULL,
  `number7` varchar(50) default NULL,
  `number8` varchar(50) default NULL,
  `number9` varchar(50) default NULL,
  `button_buy` varchar(50) default NULL,
  `button_soldout` varchar(50) default NULL,
  `timemsg` varchar(200) default NULL,
  `countmsg` varchar(200) default NULL,
  `sns` varchar(100) default NULL,
  `reserve_use` enum('Y','N') default NULL,
  `reserve_join` int(10) default NULL,
  `reserve_recom` int(10) default NULL,
  `reserve_min` int(10) default NULL,
  `reserve_max` int(10) default NULL,
  `reserve_buy` int(10) default NULL,
  `reserve_per` int(10) default NULL,
  `review_use` enum('Y','N') default NULL,
  `review_level` enum('E','M') default NULL,
  `coupon_use` enum('Y','N') default NULL,
  `con_parameter` varchar(255) default NULL,
  `prdimg_R` varchar(4) default NULL,
  `prdimg_S` varchar(4) default NULL,
  `prdimg_M` varchar(4) default NULL,
  `prdimg_L` varchar(4) default NULL,
  `tax_use` enum('Y','N') default NULL,
  `tax_status` varchar(2) default NULL,
  `prdrel_use` enum('Y','N') default NULL
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_operinfo`
--

/*!40000 ALTER TABLE `wiz_operinfo` DISABLE KEYS */;
INSERT INTO `wiz_operinfo` VALUES ('PB/PC/PN/PV/','PC/PN/PH/','tanywiz','6f51f77a2b2222d642e20e445101a35f','1^국민은행^000-000-00000^테스트\r\n2^신한은행^000-000-00000^테스트','KCP','N','Y','C','Any_','','한진택배','http://www.hanjin.co.kr/transmission/transmission_fail.jsp?wbl_num=','DB','DA','DC',1000,50000,0,3000,690940,690949,2000,360813,360815,1000,0,0,0,'number_0.gif','number_1.gif','number_2.gif','number_3.gif','number_4.gif','number_5.gif','number_6.gif','number_7.gif','number_8.gif','number_9.gif','button_buy.gif','button_soldout.gif','판매시간이 종료되었습니다.','구매인원이 마감되었습니다.','twiter,me2day,cyworld,facebook,sms,email','Y',1000,0,1000,50000,10,10,'','','Y','query,p,q','130','50','300','2000','N','OY','');
/*!40000 ALTER TABLE `wiz_operinfo` ENABLE KEYS */;

--
-- Table structure for table `wiz_option`
--

DROP TABLE IF EXISTS `wiz_option`;
CREATE TABLE `wiz_option` (
  `idx` int(5) NOT NULL auto_increment,
  `opttitle` varchar(255) default NULL,
  `optcode` mediumtext,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=4;

--
-- Dumping data for table `wiz_option`
--

/*!40000 ALTER TABLE `wiz_option` DISABLE KEYS */;
INSERT INTO `wiz_option` VALUES (2,'사이즈','230\r\n235\r\n240\r\n245\r\n250\r\n255\r\n260\r\n265\r\n270\r\n277\r\n280\r\n285\r\n290'),(3,'색상','흰색\r\n검정\r\n노랑\r\n파랑\r\n빨강');
/*!40000 ALTER TABLE `wiz_option` ENABLE KEYS */;

--
-- Table structure for table `wiz_order`
--

DROP TABLE IF EXISTS `wiz_order`;
CREATE TABLE `wiz_order` (
  `orderid` varchar(20) NOT NULL default '',
  `send_id` varchar(20) default NULL,
  `send_name` varchar(20) default NULL,
  `send_tphone` varchar(14) default NULL,
  `send_hphone` varchar(14) default NULL,
  `send_email` varchar(50) default NULL,
  `send_post` varchar(7) default NULL,
  `send_address` varchar(80) default NULL,
  `demand` mediumtext,
  `message` mediumtext,
  `cancelmsg` mediumtext,
  `rece_name` varchar(20) default NULL,
  `rece_tphone` varchar(14) default NULL,
  `rece_hphone` varchar(14) default NULL,
  `rece_post` varchar(7) default NULL,
  `rece_address` varchar(80) default NULL,
  `pay_method` varchar(2) default NULL,
  `account_name` varchar(20) default NULL,
  `account` varchar(80) default NULL,
  `coupon_use` int(10) default NULL,
  `coupon_idx` varchar(100) default NULL,
  `reserve_use` int(10) default NULL,
  `reserve_price` int(10) default NULL,
  `deliver_method` varchar(2) default NULL,
  `deliver_price` int(10) default NULL,
  `deliver_num` varchar(32) default NULL,
  `deliver_date` varchar(12) default NULL,
  `discount_price` int(10) default NULL,
  `prd_price` int(10) default NULL,
  `total_price` int(10) default NULL,
  `status` varchar(2) default NULL,
  `order_date` datetime default NULL,
  `pay_date` datetime default NULL,
  `send_date` datetime default NULL,
  `cancel_date` datetime default NULL,
  `descript` mediumtext,
  `tno` varchar(50) default NULL,
  `escrow_check` varchar(2) default 'N',
  `escrow_stats` varchar(2) default 'NO',
  `tax_type` char(1) default NULL,
  `id_info` varchar(20) NOT NULL default '',
  `bill_yn` char(1) NOT NULL default '',
  `authno` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`orderid`),
  KEY `pay_method` (`pay_method`,`send_id`,`status`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_order`
--

/*!40000 ALTER TABLE `wiz_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiz_order` ENABLE KEYS */;

--
-- Table structure for table `wiz_page`
--

DROP TABLE IF EXISTS `wiz_page`;
CREATE TABLE `wiz_page` (
  `idx` int(3) NOT NULL auto_increment,
  `type` varchar(30) NOT NULL default '',
  `subimg` varchar(100) default NULL,
  `content` mediumtext,
  `content2` text,
  `addinfo` mediumtext,
  `addinfo2` mediumtext,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=35;

--
-- Dumping data for table `wiz_page`
--

/*!40000 ALTER TABLE `wiz_page` DISABLE KEYS */;
INSERT INTO `wiz_page` VALUES (11,'join','','제 1조 (목적) \r\n이 약관은 전기통신 사업법 및 동 법 시행령에 의하여 OOO(이하 \"회사\" 라 합니다.)가 제공하는 인터넷 홈페이지 서비스 (이하 \"서비스\" 라 합니다.)의 이용조건 및 절차에 관한 사항, 회사와 이용자의 권리와 의무 및 책임사항을 규정함을 목적으로 합니다.\r\n \r\n제 2조 (약관의 효력과 개정) \r\n1. 이 약관은 전기통신사업법 제 31 조, 동 법 시행규칙 제 21조의 2에 따라 공시절차를 거친 후 홈페이지를 통하여 이를 공지하거나 전자우편 기타의 방법으로 이용자에게 통지함으로써 효력을 발생합니다.\r\n \r\n2. 회사는 본 약관을 사전 고지 없이 개정할 수 있으며, 개정된 약관은 제9조에 정한 방법으로 공지합니다. 회원은 개정된 약관에 동의하지 아니하는 경우 본인의 회원등록을 취소(회원탈퇴)할 수 있으며, 계속 사용의 경우는 약관 개정에 대한 동의로 간주됩니다. 개정된 약관은 공지와 동시에 그 효력이 발생됩니다.\r\n  \r\n제 3조 (약관이외의 준칙) \r\n이 약관에 명시되어 있지 않은 사항은 전기통신 기본법, 전기통신 사업법, 기타 관련법령의 규정에 따릅니다.\r\n \r\n제 4조 (용어의 정의) \r\n이 약관에서 사용하는 용어의 정의는 다음과 같습니다.\r\n \r\n1. 회원 : 서비스에 개인정보를 제공하여 회원등록을 한 자로서, 서비스의 정보를 지속적으로 제공받으며, 이용할 수 있는 자를 말합니다. \r\n2. 이용자 : 본 약관에 따라 회사가 제공하는 서비스를 받는 회원 및 비회원을 말합니다.\r\n3. 아이디 (ID) : 회원 식별과 회원의 서비스 이용을 위하여 회원이 선정하고 회사가 승인하는 문자와 숫자의 조합을 말합니다.  \r\n4. 비밀번호 : 회원이 통신상의 자신의 비밀을 보호하기 위해 선정한 문자와 숫자의 조합을 말합니다.  \r\n5. 전자우편 (E-mail) : 인터넷을 통한 우편입니다.  \r\n6. 해지 : 회사 또는 회원이 서비스 이용 이후 그 이용계약을 종료 시키는 의사표시를 말합니다.  \r\n7. 홈페이지 : 회사가 이용자에게 서비스를 제공하기 위하여 컴퓨터 등 정보통신설비를 이용하여 이용자가 열람 및 이용할 수 있도록 설정한 가상의 서비스 공간을 말합니다.\r\n  \r\n제 5조 (서비스의 제공 및 변경) \r\n1. 회사가 제공하는 서비스는 다음과 같습니다.\r\n \r\n1) 회사에 대한 홍보 내용\r\n2) 회사가 판매하는 제품 안내\r\n3) 기타 회사가 제공하는 각종 정보\r\n4) 고객 상담 서비스\r\n5) 회원 이용 서비스\r\n \r\n2. 회사는 필요한 경우 서비스의 내용을 추가 또는 변경하여 제공할 수 있습니다.\r\n  \r\n제 6조 (서비스의 중단) \r\n1. 회사는 컴퓨터 등 정보통신설비의 보수점검/교체 및 고장, 통신의 두절 등의 사유가 발생한 경우에는 서비스의 제공을 일시적으로 중단할 수 있습니다.\r\n \r\n2. 제 1항에 의한 서비스 중단의 경우에는 제 9조에 정한 방법으로 이용자에게 통지합니다.\r\n \r\n3. 회사는 제1항의 사유로 서비스의 제공이 일시적으로 중단됨으로 인하여 이용자 또는 제3자가 입은 손해에 대하여 배상하지 아니합니다. 단, 회사에 고의 또는 중과실이 있는 경우에는 그러하지 아니합니다.\r\n  \r\n제 7조 (회원가입) \r\n1. 이용자는 회사가 정한 가입양식에 따라 회원정보를 기입한 후 이 약관에 동의한다는 의사표시를 함으로서 회원가입을 신청합니다.\r\n \r\n2. 이용자는 반드시 실명으로 회원가입을 하여야 하며, 1개의 주민등록번호에 대해 1건의 회원가입신청을 할 수 있습니다.\r\n \r\n3. 회사는 제 1항과 같이 회원으로 가입할 것을 신청한 이용자 중 다음 각 호에 해당하지 않는 한 회원으로 등록합니다.\r\n \r\n 1) 이름이 실명이 아닌 경우\r\n \r\n2) 등록 내용에 허위, 기재누락, 오기가 있는 경우\r\n \r\n3) 타인의 명의를 사용하여 신청한 경우\r\n \r\n4) 가입신청자가 이 약관 제 8조 3항에 의하여 이전에 회원자격을 상실한 적이 있는 경우(단, 제 8조 3항에 의한 회원자격 상실 후 3년이 경과한 자로서 회사의 회원 재가입 승낙을 얻은 경우는 예외로 합니다.)\r\n \r\n5) 만 14세 미만의 아동\r\n \r\n6) 기타 회원으로 회사 소정의 이용신청요건을 충족하지 못하는 경우\r\n  \r\n4. 회원가입계약의 성립시기는 회사의 승낙이 이용자에게 도달한 시점으로 합니다.\r\n \r\n5. 회원은 제 10조 1항에 의한 등록사항에 변경이 있는 경우 회원정보변경 항목을 통해 직접 변경사항을 수정, 등록하여야 합니다.\r\n  \r\n제 8조 (회원탈퇴 및 자격 상실 등) \r\n1. 회원은 언제든지 회원의 탈퇴를 홈페이지에 요청할 수 있으며, 홈페이지는 즉시 이에 응합니다.\r\n \r\n2. 회원이 다음 각 호의 사유에 해당하는 경우, 회사는 회원자격을 제한 및 정지시킬 수 있습니다.\r\n \r\n 1) 가입 신청 시에 허위 내용을 등록한 경우\r\n \r\n2) 타인의 서비스 이용을 방해하거나 그 정보를 도용하는 등 서비스 운영질서를 위협하는 경우\r\n \r\n3) 서비스를 이용하여 법령과 이 약관이 금지하거나, 공서양속에 반하는 행위를 하는 경우\r\n \r\n4) 제 13조 에 명기된 회원의 의무사항을 준수하지 못할 경우\r\n  \r\n3. 회사가 회원자격을 제한/정지시킨 후, 동일한 행위가 2회 이상 반복되거나 30일 이내에 그 사유가 시정되지 아니하는 경우 회사는 회원자격을 상실 시킬 수 있습니다.\r\n \r\n4. 회사가 회원자격을 상실 시키는 경우 회원에게 이를 통지하고 탈퇴를 처리합니다. 이 경우 회원에게 이를 통지하고, 탈퇴 전에 소명할 기회를 부여합니다.\r\n \r\n \r\n제 9조 (이용자에 대한 통지) \r\n1. 회사가 이용자에 대한 통지를 하는 경우, 이용자가 서비스에 제출한 전자우편 주소로 할 수 있습니다.\r\n \r\n2. 회사가 불특정 다수 이용자에 대한 통지의 경우 1주일 이상 서비스 게시판에 게시함으로써 개별 통지에 갈음할 수 있습니다.\r\n \r\n \r\n제 10조 (개인 정보 보호) \r\n1. 회사는 이용자 정보 수집 시 회사측이 필요한 최소한의 정보를 수집합니다.\r\n다음 사항을 필수사항으로 하며 그 외 사항은 선택사항으로 합니다.\r\n \r\n1) 성명\r\n2) 주민등록번호\r\n3) 희망 ID\r\n4) 비밀번호\r\n5) E-mail\r\n6) 주소\r\n7) 전화번호\r\n8) favor 구독 여부\r\n \r\n2. 회사가 이용자의 개인식별이 가능한 개인정보를 수집하는 때에는 반드시 당해 이용자의 동의를 받습니다.\r\n \r\n3. 제공된 개인정보는 당해 이용자의 동의 없이 제 3자에게 제공할 수 없으며, 이에 대한 모든 책임은 회사가 집니다. 다만 다음의 경우에는 예외로 합니다.\r\n \r\n 1) 배송업무상 배송업체에게 배송에 필요한 최소한의 이용자의 정보\r\n(성명, 주소, 전화번호)를 알려주는 경우\r\n \r\n2) 통계작성, 학술연구 또는 시장조사를 위하여 필요한 경우로서 특정 개인을 식별할 수 없는 형태로 제공하는 경우\r\n \r\n3) 관계법령에 의하여 국가기관으로부터 요구 받은 경우\r\n \r\n4) 범죄에 대한 수사상의 목적이 있거나, 정보통신 윤리위원회의 요청이 있는 경우\r\n \r\n5) 기타 관계법령에서 정한 절차에 따른 요청이 있는 경우\r\n \r\n \r\n4. 이용자는 언제든지 회사가 가지고 있는 자신의 개인정보에 대해 열람 및 오류정정을 할 수 있습니다.\r\n \r\n5. 회사로부터 개인정보를 제공받은 제 3자는 개인정보를 제공받은 목적을 달성한 때에는 당해 개인정보를 지체 없이 파기합니다.\r\n \r\n \r\n제 11조 (회사의 의무) \r\n1. 회사는 이 약관에서 정한 바에 따라 계속적, 안정적으로 서비스를 제공할 수 있도록 최선의 노력을 다하여야만 합니다.\r\n \r\n2. 회사는 서비스에 관련된 설비를 항상 운용할 수 있는 상태로 유지/보수하고, 장애가 발생하는 경우 지체 없이 이를 수리/복구할 수 있도록 최선의 노력을 다하여야 합니다.\r\n \r\n3. 회사는 이용자가 안전하게 서비스를 이용할 수 있도록 이용자의 개인정보보호를 위한 보안시스템을 갖추어야 합니다.\r\n \r\n4. 회사는 이용자가 원하지 않는 영리목적의 광고성 전자우편을 발송하지 않습니다.\r\n \r\n \r\n제 12조 (회원의 ID 및 비밀번호에 대한 의무) \r\n1. 회원에게 부여된 아이디(ID)와 비밀번호의 관리책임은 회원에게 있으며 관리 소홀, 부정사용에 의하여 발생하는 모든 결과에 대한 책임은 회원에게 있습니다.\r\n \r\n2. 회원이 자신의 ID 및 비밀번호를 도난 당하거나 제 3자가 사용하고 있음을 인지한 경우에는 바로 회사에 통보하고 회사의 안내가 있는 경우에는 그에 따라야 합니다.\r\n \r\n \r\n제 13조 (회원의 의무) \r\n1. 회원은 관계법령, 본 약관의 규정, 이용안내 및 주의사항 등 회사가 통지하는 사항을 준수하여야 하며, 기타 회사의 업무에 방해되는 행위를 하여서는 안됩니다.\r\n \r\n2. 회원은 회사의 사전승낙 없이 서비스를 이용하여 어떠한 영리행위도 할 수 없습니다.\r\n \r\n3. 회원은 서비스를 이용하여 얻은 정보를 회사의 사전승낙 없이 복사, 복제, 변경, 번역, 출판/방송 기타의 방법으로 사용하거나 이를 타인에게 제공할 수 없습니다.\r\n \r\n4. 회원은 자기 신상정보의 변경사항 발생시 즉각 변경하여야 합니다.\r\n회원정보를 수정하지 않아 발생하는 모든 결과에 대한 책임은 회원에게 있습니다.\r\n \r\n5. 회원은 서비스 이용과 관련하여 다음 각 호의 행위를 하지 않아야 하며, 다음 행위를 함으로 발생하는 모든 결과에 대한 책임은 회원에게 있습니다.\r\n \r\n 1) 다른 회원의 아이디(ID)를 부정하게 사용하는 행위\r\n \r\n2) 다른 회원의 E-mail 주소를 취득하여 스팸메일을 발송하는 행위\r\n \r\n3) 범죄행위를 목적으로 하거나 기타 범죄행위와 관련된 행위\r\n \r\n4) 선량한 풍속, 기타 사회질서를 해하는 행위\r\n \r\n5) 회사 및 타인의 명예를 훼손하거나 모욕하는 행위\r\n \r\n6) 회사 및 타인의 지적재산권 등의 권리를 침해하는 행위\r\n \r\n7) 해킹행위 또는 컴퓨터 바이러스의 유포행위\r\n \r\n8) 타인의 의사에 반하여 광고성 정보 등 일정한 내용을 지속적으로 전송하는 행위\r\n \r\n9) 서비스의 안정적인 운영에 지장을 주거나 줄 우려가 있는 일체의 행위\r\n \r\n10) 회사가 제공하는 서비스의 내용을 변경하는 행위\r\n\r\n11) 기타 관계법령에 위배되는 행위\r\n \r\n \r\n \r\n제 14조 (게시물 삭제) \r\n1. 회사는 이용자가 게시하거나 등록하는 서비스내의 게시물이 제 13조의 규정에 위반되거나, 다음 각 호에 해당한다고 판단되는 경우 사전통지 없이 게시물을 삭제할 수 있습니다.\r\n \r\n 1) 다른 이용자 또는 제 3자를 비방하거나 중상모략으로 명예를 손상시키는 내용\r\n \r\n2) 공공질서 또는 미풍양속에 위반되는 내용\r\n \r\n3) 범죄적 행위에 결부된다고 인정되는 내용\r\n \r\n4) 제 3자의 저작권 등 기타 권리를 침해하는 내용\r\n \r\n5) 서비스의 안정적인 운영에 지장을 주거나 줄 우려가 있는 내용\r\n \r\n6) 근거나 확인절차 없이 회사를 비난하거나 유언비어를 유포한 내용용\r\n \r\n7) 기타 관계법령에 의거하여 위반된다고 판단되는 내용\r\n \r\n단, 독자게시판의 경우 다음과 같이 예외를 둔다.\r\n용량이 큰 데이터의 경우 업로드 된 게시물의 수를 제한하며 그 수를 넘을 때에는 서버의 원활한 운영을 위해 가장 오래된 게시물부터 삭제할 수 있다.\r\n \r\n2. 회사는 이용자가 게시하거나 등록하는 서비스내의 게시물이 제 13조의 규정에 위반되거나 동 조 제1항 각 호에 해당한다고 판단되는 정보를 링크하고 있을 경우 사전통지 없이 게시물을 삭제할 수 있습니다.\r\n \r\n \r\n제 15조 (게시물에 대한 권리 / 의무) \r\n게시물에 대한 저작권을 포함한 모든 권리 및 책임은 이를 게시한 이용자에게 있습니다.\r\n \r\n제 16조 (연결 \"홈페이지\"와 피연결 \"홈페이지\"간의 관계) \r\n1. 상위 \"홈페이지\"와 하위 \"홈페이지\"가 하이퍼 링크(예:하이퍼 링크의 대상에는 문자, 그림 및 동화상 등이 포함됨) 방식 등으로 연결된 경우, 전자를 연결 \"홈페이지\"라고 하고 후자를 피연결 \"홈페이지(웹사이트)\"라고 합니다.\r\n \r\n2. 연결 \"홈페이지\"는 피연결 \"홈페이지\"가 독자적으로 제공하는 재화?용역에 의하여 이용자와 행하는 거래에 대해서 보증책임을 지지 않습니다.\r\n \r\n \r\n제 17조 (저작권의 귀속 및 이용제한) \r\n1. 회사가 작성한 저작물에 대한 저작권 및 기타 지적재산권은 회사에 귀속합니다.\r\n \r\n2. 이용자는 서비스를 이용함으로써 얻은 정보를 회사의 사전승낙 없이 복제, 송신, 출판, 배포, 방송, 기타 방법에 의하여 영리목적으로 이용하거나 제 3자에게 이용하게 하여서는 안됩니다.\r\n \r\n \r\n제 18조 (양도금지) \r\n회원이 서비스의 이용권한, 기타 이용 계약상 지위를 타인에게 양도, 증여할 수 없으며, 이를 담보로 제공할 수 없습니다.\r\n \r\n제 19조 (손해배상) \r\n회사는 무료로 제공되는 서비스와 관련하여 이용자에게 어떠한 손해가 발생하더라도 동 손해가 회사의 중대한 과실에 의한 경우를 제외하고 이에 대하여 책임을 부여하지 아니합니다.\r\n \r\n제 20조 (면책 / 배상) \r\n1. 회사는 이용자가 서비스에 게재한 정보, 자료, 사실의 정확성, 신뢰성 등 그 내용에 관하여는 어떠한 책임을 부담하지 아니하고, 이용자는 자신의 책임아래 서비스를 이용하며, 서비스를 이용하여 게시 또는 전송한 자료 등에 관하여 손해가 발생하거나 자료의 취사선택, 기타 서비스 이용과 관련하여 어떠한 불이익이 발생하더라도 이에 대한 모든 책임은 이용자에게 있습니다.\r\n \r\n2. 회사는 제 13조의 규정에 위반하여 이용자간 또는 이용자와 제 3자간에 서비스를 매개로 한 물품거래 등과 관련하여 어떠한 책임도 부담하지 아니하고, 이용자가 서비스의 이용과 관련하여 기대하는 이익에 관하여 책임을 부담하지 않습니다.\r\n \r\n3. 이용자가 제 13조, 기타 이 약관의 규정을 위반함으로 인하여 회사가 이용자 또는 제 3자에 대하여 책임을 부담하게 되고, 이로써 회사에게 손해가 발생하게 되는 경우, 이 약관을 위반한 이용자는 회사에게 발생하는 모든 손해를 배상하여야 하며, 동 손해로부터 회사를 면책시켜야 합니다.\r\n \r\n \r\n제 21조 (분쟁의 해결) \r\n1. 회사와 이용자는 서비스와 관련하여 발생한 분쟁을 원만하게 해결하기 위하여 필요한 모든 노력을 하여야 합니다.\r\n \r\n2. 제 1항의 규정에도 불구하고, 동 분쟁으로 인하여 소송이 제기될 경우 동 소송은 서울지방법원을 관할로 합니다.\r\n \r\n3. 동 소송에는 대한민국 법을 적용합니다.\r\n \r\n \r\n제 22조 (기타) \r\n이 약관에 명시되지 아니한 사항의 처리를 위하여 이용자는 OOO.(전화번호 : 02-xxx-xxxx)를 이용합니다.\r\n \r\n부칙 \r\n이 약관은 OOOO년 O월 O 일부터 시행합니다.','※ 총 칙\r\n1. OOO는 \'정보통신망이용촉진및정보보호등에관한법률\'상의 개인정보보호 규정과 정보통신부가 제정한 \'개인정보보\r\n    호지침\' 및 ‘개인정보의 기술적/관리적 보호조치 기준’을 준수하고 있습니다. 또한 OOO는 \'개인정보보호정책\'을 \r\n    제정하여 회원들의 개인정보 보호를 위해 최선을 다하겠음을 선언합니다.\r\n2. OOO의 \'개인정보보호정책\'은 관련 법률 및 정부 지침의 변경과 OOO의 내부 방침 변경에 의해 변경될 수 있습\r\n    니다. OOO의 \'개인정보보호방침\'이 변경될 경우 변경사항은 OOO 홈페이지의 공지사항에 \r\n    최소 7일간 게시됩니다. \r\n\r\n\r\n※ 개인정보\r\nOOO는 귀하께서 OOO의 이용약관의 내용에 대해 \"동의한다\" 버튼 또는 \"동의하지 않는다\" 버튼을 클릭할 수 있는 절차를 마련하여, \"동의한다\" 버튼을 클릭하면 개인정보 수집에 대해 동의한 것으로 봅니다. 또한, 귀하께서 “동의한다” 버튼을 클릭하면 아래의 개인정보 수집 항목 중 “비밀번호”와 “주민등록번호”를 제외한 나머지 항목들은 OOO가 서비스\r\n를 이행하기 위해 외주업체에 제공하는 것에 대해 동의한 것으로 간주합니다.\r\n\r\n\r\n1. \"개인정보\"의 범위는 정보통신망이용촉진및정보보호등에관한법률에서 규정하는 내용에 따라, \'생존하는 개인에 관한 \r\n    정보로서 당해 정보에 포함되어 있는 성명, 주민등록번호 등의 사항에 의하여 당해 개인을 식별할 수 있는 정보(당해 \r\n    정보만으로는 특정 개인을 식별할 수 없더라도 다른 정보와 용이하게 결합하여 식별할 수 있는 것을 포함한다)\'를 의미\r\n    합니다. \r\n2. OOO는 이용자 확인, 대금결제, 이용 서비스의 소유자 확인, 개별회원에게 맞춤화된 서비스, 기타 부가서비스 등을 \r\n    위하여 회원들의 개인정보를 수집ㆍ이용 합니다. 수집하는 개인정보 항목에 따른 구체적인 수집목적 및 이용 목적은 \r\n    다음과 같습니다.\r\n-  성명, 아이디, 비밀번호, 주민등록번호/사업자등록번호 : 회원제 서비스 이용에 따른 본인 확인 절차에 이용, \r\n-  이용 서비스의 소유자 확인\r\n-  이메일주소, 전화번호, 팩스번호 : 도메인 관리 규정에 따른 필수 정보 확보, 고지사항 전달, 불만처리 등을 위한 원활\r\n    한 의사 소통\r\n-  경로의 확보, 새로운 서비스 및 신상품이나 이벤트 정보 등의 안내\r\n-  은행정보, 신용카드 정보 : 유료정보 이용 및 구매에 대한 결제\r\n-  주소 : 도메인 정보조회 제공, 청구서 및 쇼핑몰 물품 배송에 대한 정확한 배송지 확인\r\n    쿠키 ( 아이디 ) : 쿠키 운영을 통해 방문자들의 아이디를 자동 분석하여 등급별 차등화된 가격 혜택 적용.\r\n    고객께서는 웹브라우저에서 옵션을 설정함으로써 쿠키가 저장될 때마다 확인을 거치거나, 아니면 모든 쿠키의 저장을 \r\n    거부할 수도 있습니다. 그러나 쿠키의 저장을 거부할 경우 웹서비스 이용이 제한될 수 있습니다. \r\n3. OOO은 회원 개인정보를 위탁관리하지 않습니다. \r\n4. 이용자의 기본적 인권 침해의 우려가 있는 민감한 개인정보(인종 및 민족, 사상 및 신조, 출신지 및 본적 지, 정치적 성향 \r\n    및 범죄기록, 건강상태 및 성생활 등)는 요구하지 않습니다. \r\n5. 개인정보의 보유 기간은 \"회원이 OOO에 가입하는 순간부터 해지 신청 순간까지\"입니다. OOO의 회원DB는 탈퇴\r\n    신청자의 개인정보가 탈퇴 즉시 삭제토록 되어 있습니다. \r\n    단, 수집목적 및 제공받은 목적이 달성된 경우에도 법률의 규정에 의하여 보존할 필요성이 있는 경우에는 법률의 \r\n    규정에 따라 고객의 개인정보를 보유할 수 있습니다.\r\n- 계약 또는 청약철회 등에 관한 기록 : 5년\r\n- 대금결제 및 재화등의 공급에 관한 기록 : 5년\r\n- 소비자의 불만 또는 분쟁처리에 관한 기록 : 3년 등\r\n\r\n\r\n\r\n※ 제3자에 대한 정보 제공\r\n1. OOO는 회원들의 개인정보를 무단으로 타인 또는 다른 회사나 기관에 제공하지 않습니다. \r\n    단, 다음에 해당하는 경우는 예외로 합니다. \r\n-  도메인 이름 등록을 위하여 해당 도메인의 등록사업자에게 신청자의 정보를 제공하는 경우\r\n-  도메인 이름에 대한 WHOIS 서비스를 위하여 제공하는 경우 \r\n-  정보통신망이용촉진및정보보호등에관한법률 등 관계법령에 의하여 국가기관 또는 정부에서 지정한 소비자단체들의 \r\n    요청에 의한 경우 \r\n-  분쟁에 연루된 도메인 등록자의 연락처를 분쟁 조정 기구나 법원이 요청하는 경우\r\n-  범죄에 대한 수사상의 목적이 있거나 정보통신윤리위원회, 한국정보보호진흥원 등 법정단체의 요청이 있는 경우 \r\n-  업무상 연락을 위하여 회원의 정보(성명, 주소, 전화번호)를 사용하는 경우 \r\n-  통계작성, 홍보자료, 학술연구 또는 시장조사를 위하여 필요한 경우로서 특정 고객임을 식별할 수 없는 형태로 제공\r\n    되는 경우\r\n-  회원들이 OOO의 서비스를 신청하여 OOO가 서비스 이행을 위해 배송업체, 외주콜센터업체, 지로발송 업체 등\r\n    에 해당 회원의 비밀번호, 주민등록번호를 포함하지 않는 주문정보, 주소지 정보, 연락처 등을 제공하는 경우\r\n\r\n2. OOO는 보다 다양한 서비스 제공을 위하여 회원들의 개인정보를 제휴사에게 제공하거나, 제휴사와 공유하고자 할 때\r\n    는 반드시 사전에 회원 개개인의 동의를 구하겠습니다. 제휴사가 어디인지, 제공 또는 공유되는 개인정보항목이 무엇인\r\n    지, 왜 그러한 개인정보가 공유되어야 하는지, 그리고 언제까지 어떻게 보호, 관리되는지에 대해 개별적으로 전자우편을 \r\n    통해 고지하여 동의를 구하는 절차를 거치게 되며, 귀하께서 동의하지 않는 경우에는 제휴사에게 제공하거나 제휴사와 \r\n    공유하지 않습니다.\r\n\r\n\r\n\r\n※ 개인정보의 열람 및 정정 \r\n1. OOO의 회원은 언제든지 자신의 개인정보를 열람하거나 정정하실 수 있습니다. 개인정보 열람 및 정정을 원하시는\r\n    분은 OOO 사이트에 로그온 하신 후, 로그아웃 버튼 옆의 \'정보변경\' 버튼을 클릭하십시오. \r\n2. 만일 ID와 비밀번호를 잃어버리신 회원은 홈페이지에서 \'ID 확인/비밀번호 확인\'서비스를 통해 ID나 비밀번호를 확인하\r\n    실 수 있습니다.\r\n3. OOO 회원 ID와 비밀번호에 대한 관리 책임은 본인에게 있습니다.\r\n    본인의 개인정보를 효과적으로 보호하기 위해서 자신의 회원ID 와 비밀번호를 적절하게 관리하고 책임을 져야 합니다. \r\n    본인의 ID와 비밀번호를 유출하였다면 이에 대해서 OOO는 책임을 지지않습니다. 다만, OOO의 과실 혹은 고의\r\n    에 의한 회원 ID와 비밀번호 유출에 대해서는 해당 고객이 OOO의 책임을 물을 수 있습니다.\r\n    이용자는 OOO의 계정을 이용해서 웹사이트를 이용한 뒤에는 해당 계정을 종료하시고 웹 브라우저의 창을 닫아주십\r\n    시오. 특히 컴퓨터를 타인과 공유하거나 공공장소에서 사용하는 경우 반드시 로그아웃하시거나 웹 브라우저를 종료하여\r\n    야 합니다.\r\n\r\n\r\n\r\n※ 회원 탈퇴\r\nOOO 회원은 언제든지 본인이 원할 때 탈퇴가 가능합니다. 회원 탈퇴는 회원 정보 관리 화면에서 신청 가능합니다. \r\n단, 회원이 가비아에서 이용 중인 서비스의 만기일이 지나지 않은 경우, 회원 탈퇴는 가능하지 않습니다.\r\n\r\n\r\n\r\n※ 개인정보보호를 위한 기술적 대책\r\nOOO는 회원들의 개인정보가 분실, 도난, 누출, 변조 또는 훼손되지 않도록 다음과 같은 기술적 대책을 마련하고 있습\r\n니다. \r\n1. 회원 개개인의 개인정보는 비밀번호에 의해 보호되며, 개인정보 데이터는 별도의 보안기능을 통해 보호 되고 있습니다. \r\n2. 회원 개개인의 비밀번호는 이용자 및 개인정보취급자가 생일, 주민등록번호, 전화번호 등 추측하기 쉬운 숫자를 비밀\r\n    번호로 이용하지 않도록 패스워드 작성 규칙을 수립하고 이행합니다.\r\n3. OOO는 백신 프로그램 및 악성코드 방어 소프트웨어을 이용하여 컴퓨터 바이러스에 의한 피해를 방지하고 있으며, \r\n    해당 소프트웨어는 매일 주기적으로 업데이트하고 있습니다.\r\n4. OOO는 침입차단 기능과 침입탐지 기능을 탑재하고 있는 고가의 라우터와 L3 스위치 장비를 사용하여 이중으로 \r\n    네트워크 상의 개인정보를 안전하게 보호하고 있습니다.\r\n5. OOO는 또한 별도의 침입차단시스템(Firewall)을 구축하여 3중 개인정보보호시스템을 운영하고 있습니다.\r\n6. OOO는 개인정보를 개인정보보호시스템에 암호화하여 저장하고 있으며, OOO의 정보통신망 외부로 개인정보를 \r\n    송신하거나 PC에 저장할 경우 암호화하여 저장하도록 시스템을 운영하고 있습니다. \r\n\r\n※ 의견수렴 및 불만처리\r\nOOO 회원 중 OOO의 개인정보보호와 관련하여 불만이 있으신 분은 개인정보 관리책임자에게 의견을 주시면, 접수 즉시 조치하여 처리결과를 통보해 드리겠습니다. 개인정보 무단 유출이나 기타 심각한 개인정보 침해 시에는 정부에서 설치하여 운영중인 개인정보침해 신고센터(http://www.cyberpr ivacy.or.kr, http://www.1336.or.kr, 전화 02-1336,)에 불만처리 또는 중재를 신청하실 수도 있습니다.\r\n\r\n\r\n\r\n※ 개인정보관리 계획의 수립 및 시행\r\nOOO는 회사 규정에 별도의 전산관리규정을 마련하여 다음과 같은 사항을 준수하겠습니다.\r\n1. 개인정보관리책임자의 지정 등 개인정보보호 조칙의 구성, 운영에 관한 사항\r\n2. 개인정보취급자의 교육에 관한 사항\r\n3. 개인정보처리시스템의 접속 기록 유지 및 정기적인 확인 감독\r\n4. 개인정보 출력 및 복사시의 보호조치\r\n5. 기타 개인정보 보호를 위해 필요한 사항\r\n\r\n\r\n\r\n※ 개인정보 관리 담당자\r\nOOO는 개인정보에 대한 의견수렴 및 불만처리를 담당하는 개인정보 관리담당자를 지정하고 있습니다. \r\n- 개인정보 관리 담당자\r\n성 명 : OOO\r\n직 책 : OOOO 대표\r\n전화번호 : 02-xxx-xxxx\r\nE-mail : xxxx@xxxx.com\r\n\r\n\r\n\r\n※ 아동의 회원 가입에 대해\r\n1. OOO는 아동의 개인정보를 보호하기 위하여 만 14세 미만의 아동이 회원 가입을 신청할 경우 법정대리인(부모)의 \r\n    동의가 있어야 합니다. 부모님의 허락을 받지않은 14세 미만의 미성년자에 대해서는 OOO가 임의로 회원에서 제외\r\n    할 수 있습니다. \r\n2. 만 14세 미만 미성년자의 법정대리인은 대리인의 책임하에 있는 미성년자의 개인정보에 대한 열람, 정정, 동의철회를 \r\n    요청할 수 있으며, 이러한 요청이 있을 경우 OOO는 지체없이 필요한 조치를 취하겠습니다. \r\n\r\n※ 미성년자 거래시 철회에 대해\r\nOOO는 미성년자와의 거래시 사전에 법정대리인(부모)의 동의를 구할 의무가 있으며, 법정대리인(부모)의 동의를 얻지 못한 거래의 경우, 거래를 취소할 수 있습니다. 또한 거래 당사자인 미성년자의 법정대리인(부모)이 거래 성립 후 7일 이내에 철회를 요청할 경우, 거래를 철회(환불)하겠습니다.\r\n\r\n\r\n\r\n※ 광고성 정보 전송에 대해\r\n1. OOO는 회원을 대상으로 OOO가 제공하고 있는 서비스에 대한 안내, 서비스에 대한 공지 등에 대한 메일을 자유\r\n    롭게 보낼 수 있습니다.\r\n2. OOO는 회원을 대상으로 광고성 정보를 전송할 수 있습니다. 단, 이러한 경우에는 (광고)라는 문구를 표시하여 회원\r\n    들이 광고성 정보임을 쉽게 파악할 수 있게 하며, 수신거부 의사를 밝힌 회원에게는 광고성 정보를 전송하지 않겠습니다.','resno/email/address/tphone/hphone/fax/','resno/email/address/tphone/hphone/fax/'),(29,'join2','','',NULL,'',''),(12,'company','','<P>회사소개</P>','','',''),(13,'privacy','','<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD width=20><IMG src=\'/images/icon_arrow_blue.gif\'></TD>\r\n<TD>회원의 개인정보 수집목적 및 이용</TD></TR>\r\n<TR>\r\n<TD height=5></TD></TR>\r\n<TR>\r\n<TD></TD>\r\n<TD>당사는 고객님께서 당사에서 물품 및 서비스 상품에 대한 주문 및 접수, 대금 결제를 이용하고<BR>주문 상품 배송 및 회원에게 제공되는 각종 편의 서비스를 이용하기 위해 필요한 최소한의<BR>정보를 필수로 수집하고 있습니다.<BR>당사 회원으로 등록하신 모든 고객의 개인정보는 위에서 밝힌 목적이외에는 절대로 사용될<BR>수 없으나, 회원 개인정보의 사용 목적과 용도가 변경될 경우에 반드시 당사 회원으로 등록하신<BR>모든 고객님께 동의를 구할 것입니다.<BR></TD></TR></TBODY></TABLE><IMG src=\'/images/privacy_line.gif\'><BR>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD vAlign=top width=20><IMG src=\'/images/icon_arrow_blue.gif\'></TD>\r\n<TD>개인정보 수집 항목 및 보유, 이용 기간 당사 회원을 대상으로 각종 서비스를 제공하기 위해 제공 받는 필수 회원정보는 다음과 같습니다.</TD></TR>\r\n<TR>\r\n<TD height=5></TD></TR>\r\n<TR>\r\n<TD></TD>\r\n<TD>① 성명<BR>② 주민등록번호(회원의 경우)<BR>③ 주소<BR>④ 전화번호(일반전화와 핸드폰)<BR>⑤ 희망ID(회원의 경우)<BR>⑥ 비밀번호(회원의 경우)<BR><BR>이외에 회원가입시 고객님이 원하실 경우에 추가 정보를 선택하여 제공하실 수 있도록 되어<BR>있으며 일부 물품 및 서비스 상품에 대한 주문 및 접수시에 고객님이 원하시는 정확한 주문<BR>내용을 파악하여 원활한 주문 및 결제와 배송을 위하여 추가 정보를 요구하고 있습니다.<BR>회원이 탈퇴하시거나 코센의 이용약관에 의한 회원 자격 상실의 경우에 당사가 보유한 해당<BR>고객의 개인 정보는 지체 없이 파기됩니다.<BR></TD></TR></TBODY></TABLE><IMG src=\'/images/privacy_line.gif\'><BR>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD width=20><IMG src=\'/images/icon_arrow_blue.gif\'></TD>\r\n<TD>아동의 개인 정보 보호 </TD></TR>\r\n<TR>\r\n<TD height=5></TD></TR>\r\n<TR>\r\n<TD></TD>\r\n<TD>당사는 \'정보통신망이용 촉진 및 정보보호등에 관한 법률 제31조 제1항\'에 의하여 만14세미만의 <BR>아동의 개인정보 수집시 법정대리인의 동의를 받아야 합니다.<BR>따라서, 당사는 만14세미만의 아동에 대해서는 개인정보를 받지 않을 뿐만 아니라, 회원으로 가입이 되지 않습니다.<BR>단, 14세 미만의 아동은 법정대리인의 동의 및 서면 인증후에, 회원으로 가입할 수 있습니다.<BR>또한, 만 14세 미만 아동의 법정 대리인은 아동의 개인정보의 열람, 정정, 동의 철회를 요청할수 <BR>있으며 이런 요청이 있을 경우 당사는 지체없이 필요한 조치를 취합니다. <BR></TD></TR></TBODY></TABLE><IMG src=\'/images/privacy_line.gif\'><BR>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD width=20><IMG src=\'/images/icon_arrow_blue.gif\'></TD>\r\n<TD>개인정보 제공 및 공유</TD></TR>\r\n<TR>\r\n<TD height=5></TD></TR>\r\n<TR>\r\n<TD></TD>\r\n<TD>당사 회원의 고객 개인정보는 원칙적으로 제3기관 및 제3자에게 제공 될 수 없으며 당사가<BR>회원님께 편의를 제공하기 위하여 특정 회사에 개인정보를 제공하고자 할 경우에는 반드시<BR>회원님께 해당되는 합당한 절차를 통하여 동의를 구하도록 되어 있습니다.<BR>단, 다음 경우에 한하여 고객의 동의 없이 개인정보를 제공할 수 있습니다.<BR><BR>① 업무상 배송업체에 배송에 필요한 최소한의 이용자정보(성명, 주소, 전화번호)를 알려주는 경우<BR>② 통계작성, 학술연구 또는 시장조사를 위하여 필요한 경우로서 특정 개인을 식별할 수 없는<BR>형태로 제공하는 경우<BR>③ 정부 기관의 공식적 요청이 있을 경우.<BR></TD></TR></TBODY></TABLE><IMG src=\'/images/privacy_line.gif\'><BR>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD width=20><IMG src=\'/images/icon_arrow_blue.gif\'></TD>\r\n<TD>개인정보 열람, 정정 및 삭제 처리</TD></TR>\r\n<TR>\r\n<TD height=5></TD></TR>\r\n<TR>\r\n<TD></TD>\r\n<TD>회원님이 원하실 경우 언제라도 당사에서 개인정보를 열람하실 수 있으며 보관된 필수 정보를 수정하실 수 있습니다.<BR>또한 회원가입시 요구된 필수 정보 외의 추가 정보는 언제나 열람, 수정, 삭제할 수 있습니다.<BR>회원님의 개인정보 변경 및 삭제와 회원탈퇴는 당사의 고객센터에서 로그인(Login) 후 이용하실 수 있습니다.<BR></TD></TR></TBODY></TABLE><IMG src=\'/images/privacy_line.gif\'><BR>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD width=20><IMG src=\'/images/icon_arrow_blue.gif\'></TD>\r\n<TD>쿠키(Cookie) 운영</TD></TR>\r\n<TR>\r\n<TD height=5></TD></TR>\r\n<TR>\r\n<TD></TD>\r\n<TD>당사는 회원인증을 위하여 Cookie 방식을 이용하고 있습니다.<BR>이는 로그아웃(Logout)시 자동으로 컴퓨터에 저장되지 않고 삭제되도록 되어 있으므로<BR>공공장소나 타인이 사용할 수 있는 컴퓨터를 사용하 실 경우에는 로그인(Login)후 서비스 이용이<BR>끝나시면 반드시 로그아웃(Logout)해 주시기 바랍니다.<BR></TD></TR></TBODY></TABLE><IMG src=\'/images/privacy_line.gif\'><BR>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD width=20><IMG src=\'/images/icon_arrow_blue.gif\'></TD>\r\n<TD>비회원고객의 개인정보관리</TD></TR>\r\n<TR>\r\n<TD height=5></TD></TR>\r\n<TR>\r\n<TD></TD>\r\n<TD>① 당사는 비회원 고객 또한 물품 및 서비스 상품의 구매를 하실 수 있습니다.<BR>당사는 비회원 주문의 경우 배송 및 대금 결제, 상품 배송에 반드시 필요한 개인정보만을 <BR>고객님께 요청하고 있습니다.<BR><BR>② 당사에서 비회원으로 구입을 하신 경우 비회원 고객께서 입력하신 지불인 정보 및 수령인 <BR>정보는 대금 결제 및 상품 배송에 관련한 용도 외에는 다른 어떠한 용도로도 사용되지 않습니다.<BR></TD></TR></TBODY></TABLE><IMG src=\'/images/privacy_line.gif\'><BR>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD width=20><IMG src=\'/images/icon_arrow_blue.gif\'></TD>\r\n<TD>내부 보안 대책</TD></TR>\r\n<TR>\r\n<TD height=5></TD></TR>\r\n<TR>\r\n<TD></TD>\r\n<TD>당사는 고객의 개인정보를 취급할 수 있는 인력을 최소한으로 한정하고 해당 인원에게 정기적,<BR>부정기적 보안교육을 실시하고 있습니다. 또한 고객님의 개인정보를 열람할 수 있는 시스템에는<BR>2차 암호 체제를 갖추고 외부 네트워크로부터 철저하게 격리시켜 외부 침입 및 내부 침입에 대응하고 있습니다.<BR>이상의 당사의 개인정보 보호정책은 사이트 오픈과 동시에 시행합니다.<BR><BR>당사는 개인정보 보호 관리책임자를 아래와 같이 지정합니다.<BR><BR>- 직위: 팀장<BR>- 성명: 홍길동<BR>- E-mail: <A href=\'mailto:help@wizshop.net\'>help@wizshop.net</A><BR></TD></TR></TBODY></TABLE>','','',''),(14,'guide','','<P>이용안내</P>','','',''),(16,'sitemap','','','','',''),(17,'faq','','','','',''),(18,'login','','','','',''),(19,'myshop','','','','',''),(20,'basket','','','','',''),(21,'orderform','','','','',''),(22,'orderpay','','','','',''),(23,'ordercom','','','','',''),(24,'prdsearch','','','','',''),(25,'new','','','','',''),(26,'recom','','','','',''),(27,'popular','','','','',''),(28,'sale','','','','',''),(30,'prdview','','<P>&nbsp;</P>','','',''),(31,'best','','','','',''),(32,'orderdel','','','','',''),(33,'reco',NULL,NULL,'※ 총 칙\r\n1. OOO는 \'정보통신망이용촉진및정보보호등에관한법률\'상의 개인정보보호 규정과 정보통신부가 제정한 \'개인정보보\r\n    호지침\' 및 ‘개인정보의 기술적/관리적 보호조치 기준’을 준수하고 있습니다. 또한 OOO는 \'개인정보보호정책\'을 \r\n    제정하여 회원들의 개인정보 보호를 위해 최선을 다하겠음을 선언합니다.\r\n2. OOO의 \'개인정보보호정책\'은 관련 법률 및 정부 지침의 변경과 OOO의 내부 방침 변경에 의해 변경될 수 있습\r\n    니다. OOO의 \'개인정보보호방침\'이 변경될 경우 변경사항은 OOO 홈페이지의 공지사항에 \r\n    최소 7일간 게시됩니다. \r\n\r\n\r\n※ 개인정보\r\nOOO는 귀하께서 OOO의 이용약관의 내용에 대해 \"동의한다\" 버튼 또는 \"동의하지 않는다\" 버튼을 클릭할 수 있는 절차를 마련하여, \"동의한다\" 버튼을 클릭하면 개인정보 수집에 대해 동의한 것으로 봅니다. 또한, 귀하께서 “동의한다” 버튼을 클릭하면 아래의 개인정보 수집 항목 중 “비밀번호”와 “주민등록번호”를 제외한 나머지 항목들은 OOO가 서비스\r\n를 이행하기 위해 외주업체에 제공하는 것에 대해 동의한 것으로 간주합니다.\r\n\r\n\r\n1. \"개인정보\"의 범위는 정보통신망이용촉진및정보보호등에관한법률에서 규정하는 내용에 따라, \'생존하는 개인에 관한 \r\n    정보로서 당해 정보에 포함되어 있는 성명, 주민등록번호 등의 사항에 의하여 당해 개인을 식별할 수 있는 정보(당해 \r\n    정보만으로는 특정 개인을 식별할 수 없더라도 다른 정보와 용이하게 결합하여 식별할 수 있는 것을 포함한다)\'를 의미\r\n    합니다. \r\n2. OOO는 이용자 확인, 대금결제, 이용 서비스의 소유자 확인, 개별회원에게 맞춤화된 서비스, 기타 부가서비스 등을 \r\n    위하여 회원들의 개인정보를 수집ㆍ이용 합니다. 수집하는 개인정보 항목에 따른 구체적인 수집목적 및 이용 목적은 \r\n    다음과 같습니다.\r\n-  성명, 아이디, 비밀번호, 주민등록번호/사업자등록번호 : 회원제 서비스 이용에 따른 본인 확인 절차에 이용, \r\n-  이용 서비스의 소유자 확인\r\n-  이메일주소, 전화번호, 팩스번호 : 도메인 관리 규정에 따른 필수 정보 확보, 고지사항 전달, 불만처리 등을 위한 원활\r\n    한 의사 소통\r\n-  경로의 확보, 새로운 서비스 및 신상품이나 이벤트 정보 등의 안내\r\n-  은행정보, 신용카드 정보 : 유료정보 이용 및 구매에 대한 결제\r\n-  주소 : 도메인 정보조회 제공, 청구서 및 쇼핑몰 물품 배송에 대한 정확한 배송지 확인\r\n    쿠키 ( 아이디 ) : 쿠키 운영을 통해 방문자들의 아이디를 자동 분석하여 등급별 차등화된 가격 혜택 적용.\r\n    고객께서는 웹브라우저에서 옵션을 설정함으로써 쿠키가 저장될 때마다 확인을 거치거나, 아니면 모든 쿠키의 저장을 \r\n    거부할 수도 있습니다. 그러나 쿠키의 저장을 거부할 경우 웹서비스 이용이 제한될 수 있습니다. \r\n3. OOO은 회원 개인정보를 위탁관리하지 않습니다. \r\n4. 이용자의 기본적 인권 침해의 우려가 있는 민감한 개인정보(인종 및 민족, 사상 및 신조, 출신지 및 본적 지, 정치적 성향 \r\n    및 범죄기록, 건강상태 및 성생활 등)는 요구하지 않습니다. \r\n5. 개인정보의 보유 기간은 \"회원이 OOO에 가입하는 순간부터 해지 신청 순간까지\"입니다. OOO의 회원DB는 탈퇴\r\n    신청자의 개인정보가 탈퇴 즉시 삭제토록 되어 있습니다. \r\n    단, 수집목적 및 제공받은 목적이 달성된 경우에도 법률의 규정에 의하여 보존할 필요성이 있는 경우에는 법률의 \r\n    규정에 따라 고객의 개인정보를 보유할 수 있습니다.\r\n- 계약 또는 청약철회 등에 관한 기록 : 5년\r\n- 대금결제 및 재화등의 공급에 관한 기록 : 5년\r\n- 소비자의 불만 또는 분쟁처리에 관한 기록 : 3년 등\r\n\r\n\r\n\r\n※ 제3자에 대한 정보 제공\r\n1. OOO는 회원들의 개인정보를 무단으로 타인 또는 다른 회사나 기관에 제공하지 않습니다. \r\n    단, 다음에 해당하는 경우는 예외로 합니다. \r\n-  도메인 이름 등록을 위하여 해당 도메인의 등록사업자에게 신청자의 정보를 제공하는 경우\r\n-  도메인 이름에 대한 WHOIS 서비스를 위하여 제공하는 경우 \r\n-  정보통신망이용촉진및정보보호등에관한법률 등 관계법령에 의하여 국가기관 또는 정부에서 지정한 소비자단체들의 \r\n    요청에 의한 경우 \r\n-  분쟁에 연루된 도메인 등록자의 연락처를 분쟁 조정 기구나 법원이 요청하는 경우\r\n-  범죄에 대한 수사상의 목적이 있거나 정보통신윤리위원회, 한국정보보호진흥원 등 법정단체의 요청이 있는 경우 \r\n-  업무상 연락을 위하여 회원의 정보(성명, 주소, 전화번호)를 사용하는 경우 \r\n-  통계작성, 홍보자료, 학술연구 또는 시장조사를 위하여 필요한 경우로서 특정 고객임을 식별할 수 없는 형태로 제공\r\n    되는 경우\r\n-  회원들이 OOO의 서비스를 신청하여 OOO가 서비스 이행을 위해 배송업체, 외주콜센터업체, 지로발송 업체 등\r\n    에 해당 회원의 비밀번호, 주민등록번호를 포함하지 않는 주문정보, 주소지 정보, 연락처 등을 제공하는 경우\r\n\r\n2. OOO는 보다 다양한 서비스 제공을 위하여 회원들의 개인정보를 제휴사에게 제공하거나, 제휴사와 공유하고자 할 때\r\n    는 반드시 사전에 회원 개개인의 동의를 구하겠습니다. 제휴사가 어디인지, 제공 또는 공유되는 개인정보항목이 무엇인\r\n    지, 왜 그러한 개인정보가 공유되어야 하는지, 그리고 언제까지 어떻게 보호, 관리되는지에 대해 개별적으로 전자우편을 \r\n    통해 고지하여 동의를 구하는 절차를 거치게 되며, 귀하께서 동의하지 않는 경우에는 제휴사에게 제공하거나 제휴사와 \r\n    공유하지 않습니다.\r\n\r\n\r\n\r\n※ 개인정보의 열람 및 정정 \r\n1. OOO의 회원은 언제든지 자신의 개인정보를 열람하거나 정정하실 수 있습니다. 개인정보 열람 및 정정을 원하시는\r\n    분은 OOO 사이트에 로그온 하신 후, 로그아웃 버튼 옆의 \'정보변경\' 버튼을 클릭하십시오. \r\n2. 만일 ID와 비밀번호를 잃어버리신 회원은 홈페이지에서 \'ID 확인/비밀번호 확인\'서비스를 통해 ID나 비밀번호를 확인하\r\n    실 수 있습니다.\r\n3. OOO 회원 ID와 비밀번호에 대한 관리 책임은 본인에게 있습니다.\r\n    본인의 개인정보를 효과적으로 보호하기 위해서 자신의 회원ID 와 비밀번호를 적절하게 관리하고 책임을 져야 합니다. \r\n    본인의 ID와 비밀번호를 유출하였다면 이에 대해서 OOO는 책임을 지지않습니다. 다만, OOO의 과실 혹은 고의\r\n    에 의한 회원 ID와 비밀번호 유출에 대해서는 해당 고객이 OOO의 책임을 물을 수 있습니다.\r\n    이용자는 OOO의 계정을 이용해서 웹사이트를 이용한 뒤에는 해당 계정을 종료하시고 웹 브라우저의 창을 닫아주십\r\n    시오. 특히 컴퓨터를 타인과 공유하거나 공공장소에서 사용하는 경우 반드시 로그아웃하시거나 웹 브라우저를 종료하여\r\n    야 합니다.\r\n\r\n\r\n\r\n※ 회원 탈퇴\r\nOOO 회원은 언제든지 본인이 원할 때 탈퇴가 가능합니다. 회원 탈퇴는 회원 정보 관리 화면에서 신청 가능합니다. \r\n단, 회원이 가비아에서 이용 중인 서비스의 만기일이 지나지 않은 경우, 회원 탈퇴는 가능하지 않습니다.\r\n\r\n\r\n\r\n※ 개인정보보호를 위한 기술적 대책\r\nOOO는 회원들의 개인정보가 분실, 도난, 누출, 변조 또는 훼손되지 않도록 다음과 같은 기술적 대책을 마련하고 있습\r\n니다. \r\n1. 회원 개개인의 개인정보는 비밀번호에 의해 보호되며, 개인정보 데이터는 별도의 보안기능을 통해 보호 되고 있습니다. \r\n2. 회원 개개인의 비밀번호는 이용자 및 개인정보취급자가 생일, 주민등록번호, 전화번호 등 추측하기 쉬운 숫자를 비밀\r\n    번호로 이용하지 않도록 패스워드 작성 규칙을 수립하고 이행합니다.\r\n3. OOO는 백신 프로그램 및 악성코드 방어 소프트웨어을 이용하여 컴퓨터 바이러스에 의한 피해를 방지하고 있으며, \r\n    해당 소프트웨어는 매일 주기적으로 업데이트하고 있습니다.\r\n4. OOO는 침입차단 기능과 침입탐지 기능을 탑재하고 있는 고가의 라우터와 L3 스위치 장비를 사용하여 이중으로 \r\n    네트워크 상의 개인정보를 안전하게 보호하고 있습니다.\r\n5. OOO는 또한 별도의 침입차단시스템(Firewall)을 구축하여 3중 개인정보보호시스템을 운영하고 있습니다.\r\n6. OOO는 개인정보를 개인정보보호시스템에 암호화하여 저장하고 있으며, OOO의 정보통신망 외부로 개인정보를 \r\n    송신하거나 PC에 저장할 경우 암호화하여 저장하도록 시스템을 운영하고 있습니다. \r\n\r\n※ 의견수렴 및 불만처리\r\nOOO 회원 중 OOO의 개인정보보호와 관련하여 불만이 있으신 분은 개인정보 관리책임자에게 의견을 주시면, 접수 즉시 조치하여 처리결과를 통보해 드리겠습니다. 개인정보 무단 유출이나 기타 심각한 개인정보 침해 시에는 정부에서 설치하여 운영중인 개인정보침해 신고센터(http://www.cyberpr ivacy.or.kr, http://www.1336.or.kr, 전화 02-1336,)에 불만처리 또는 중재를 신청하실 수도 있습니다.\r\n\r\n\r\n\r\n※ 개인정보관리 계획의 수립 및 시행\r\nOOO는 회사 규정에 별도의 전산관리규정을 마련하여 다음과 같은 사항을 준수하겠습니다.\r\n1. 개인정보관리책임자의 지정 등 개인정보보호 조칙의 구성, 운영에 관한 사항\r\n2. 개인정보취급자의 교육에 관한 사항\r\n3. 개인정보처리시스템의 접속 기록 유지 및 정기적인 확인 감독\r\n4. 개인정보 출력 및 복사시의 보호조치\r\n5. 기타 개인정보 보호를 위해 필요한 사항\r\n\r\n\r\n\r\n※ 개인정보 관리 담당자\r\nOOO는 개인정보에 대한 의견수렴 및 불만처리를 담당하는 개인정보 관리담당자를 지정하고 있습니다. \r\n- 개인정보 관리 담당자\r\n성 명 : OOO\r\n직 책 : OOOO 대표\r\n전화번호 : 02-xxx-xxxx\r\nE-mail : xxxx@xxxx.com\r\n\r\n\r\n\r\n※ 아동의 회원 가입에 대해\r\n1. OOO는 아동의 개인정보를 보호하기 위하여 만 14세 미만의 아동이 회원 가입을 신청할 경우 법정대리인(부모)의 \r\n    동의가 있어야 합니다. 부모님의 허락을 받지않은 14세 미만의 미성년자에 대해서는 OOO가 임의로 회원에서 제외\r\n    할 수 있습니다. \r\n2. 만 14세 미만 미성년자의 법정대리인은 대리인의 책임하에 있는 미성년자의 개인정보에 대한 열람, 정정, 동의철회를 \r\n    요청할 수 있으며, 이러한 요청이 있을 경우 OOO는 지체없이 필요한 조치를 취하겠습니다. \r\n\r\n※ 미성년자 거래시 철회에 대해\r\nOOO는 미성년자와의 거래시 사전에 법정대리인(부모)의 동의를 구할 의무가 있으며, 법정대리인(부모)의 동의를 얻지 못한 거래의 경우, 거래를 취소할 수 있습니다. 또한 거래 당사자인 미성년자의 법정대리인(부모)이 거래 성립 후 7일 이내에 철회를 요청할 경우, 거래를 철회(환불)하겠습니다.\r\n\r\n\r\n\r\n※ 광고성 정보 전송에 대해\r\n1. OOO는 회원을 대상으로 OOO가 제공하고 있는 서비스에 대한 안내, 서비스에 대한 공지 등에 대한 메일을 자유\r\n    롭게 보낼 수 있습니다.\r\n2. OOO는 회원을 대상으로 광고성 정보를 전송할 수 있습니다. 단, 이러한 경우에는 (광고)라는 문구를 표시하여 회원\r\n    들이 광고성 정보임을 쉽게 파악할 수 있게 하며, 수신거부 의사를 밝힌 회원에게는 광고성 정보를 전송하지 않겠습니다.',NULL,NULL),(34,'center',NULL,NULL,'※ 총 칙\r\n1. OOO는 \'정보통신망이용촉진및정보보호등에관한법률\'상의 개인정보보호 규정과 정보통신부가 제정한 \'개인정보보\r\n    호지침\' 및 ‘개인정보의 기술적/관리적 보호조치 기준’을 준수하고 있습니다. 또한 OOO는 \'개인정보보호정책\'을 \r\n    제정하여 회원들의 개인정보 보호를 위해 최선을 다하겠음을 선언합니다.\r\n2. OOO의 \'개인정보보호정책\'은 관련 법률 및 정부 지침의 변경과 OOO의 내부 방침 변경에 의해 변경될 수 있습\r\n    니다. OOO의 \'개인정보보호방침\'이 변경될 경우 변경사항은 OOO 홈페이지의 공지사항에 \r\n    최소 7일간 게시됩니다. \r\n\r\n\r\n※ 개인정보\r\nOOO는 귀하께서 OOO의 이용약관의 내용에 대해 \"동의한다\" 버튼 또는 \"동의하지 않는다\" 버튼을 클릭할 수 있는 절차를 마련하여, \"동의한다\" 버튼을 클릭하면 개인정보 수집에 대해 동의한 것으로 봅니다. 또한, 귀하께서 “동의한다” 버튼을 클릭하면 아래의 개인정보 수집 항목 중 “비밀번호”와 “주민등록번호”를 제외한 나머지 항목들은 OOO가 서비스\r\n를 이행하기 위해 외주업체에 제공하는 것에 대해 동의한 것으로 간주합니다.\r\n\r\n\r\n1. \"개인정보\"의 범위는 정보통신망이용촉진및정보보호등에관한법률에서 규정하는 내용에 따라, \'생존하는 개인에 관한 \r\n    정보로서 당해 정보에 포함되어 있는 성명, 주민등록번호 등의 사항에 의하여 당해 개인을 식별할 수 있는 정보(당해 \r\n    정보만으로는 특정 개인을 식별할 수 없더라도 다른 정보와 용이하게 결합하여 식별할 수 있는 것을 포함한다)\'를 의미\r\n    합니다. \r\n2. OOO는 이용자 확인, 대금결제, 이용 서비스의 소유자 확인, 개별회원에게 맞춤화된 서비스, 기타 부가서비스 등을 \r\n    위하여 회원들의 개인정보를 수집ㆍ이용 합니다. 수집하는 개인정보 항목에 따른 구체적인 수집목적 및 이용 목적은 \r\n    다음과 같습니다.\r\n-  성명, 아이디, 비밀번호, 주민등록번호/사업자등록번호 : 회원제 서비스 이용에 따른 본인 확인 절차에 이용, \r\n-  이용 서비스의 소유자 확인\r\n-  이메일주소, 전화번호, 팩스번호 : 도메인 관리 규정에 따른 필수 정보 확보, 고지사항 전달, 불만처리 등을 위한 원활\r\n    한 의사 소통\r\n-  경로의 확보, 새로운 서비스 및 신상품이나 이벤트 정보 등의 안내\r\n-  은행정보, 신용카드 정보 : 유료정보 이용 및 구매에 대한 결제\r\n-  주소 : 도메인 정보조회 제공, 청구서 및 쇼핑몰 물품 배송에 대한 정확한 배송지 확인\r\n    쿠키 ( 아이디 ) : 쿠키 운영을 통해 방문자들의 아이디를 자동 분석하여 등급별 차등화된 가격 혜택 적용.\r\n    고객께서는 웹브라우저에서 옵션을 설정함으로써 쿠키가 저장될 때마다 확인을 거치거나, 아니면 모든 쿠키의 저장을 \r\n    거부할 수도 있습니다. 그러나 쿠키의 저장을 거부할 경우 웹서비스 이용이 제한될 수 있습니다. \r\n3. OOO은 회원 개인정보를 위탁관리하지 않습니다. \r\n4. 이용자의 기본적 인권 침해의 우려가 있는 민감한 개인정보(인종 및 민족, 사상 및 신조, 출신지 및 본적 지, 정치적 성향 \r\n    및 범죄기록, 건강상태 및 성생활 등)는 요구하지 않습니다. \r\n5. 개인정보의 보유 기간은 \"회원이 OOO에 가입하는 순간부터 해지 신청 순간까지\"입니다. OOO의 회원DB는 탈퇴\r\n    신청자의 개인정보가 탈퇴 즉시 삭제토록 되어 있습니다. \r\n    단, 수집목적 및 제공받은 목적이 달성된 경우에도 법률의 규정에 의하여 보존할 필요성이 있는 경우에는 법률의 \r\n    규정에 따라 고객의 개인정보를 보유할 수 있습니다.\r\n- 계약 또는 청약철회 등에 관한 기록 : 5년\r\n- 대금결제 및 재화등의 공급에 관한 기록 : 5년\r\n- 소비자의 불만 또는 분쟁처리에 관한 기록 : 3년 등\r\n\r\n\r\n\r\n※ 제3자에 대한 정보 제공\r\n1. OOO는 회원들의 개인정보를 무단으로 타인 또는 다른 회사나 기관에 제공하지 않습니다. \r\n    단, 다음에 해당하는 경우는 예외로 합니다. \r\n-  도메인 이름 등록을 위하여 해당 도메인의 등록사업자에게 신청자의 정보를 제공하는 경우\r\n-  도메인 이름에 대한 WHOIS 서비스를 위하여 제공하는 경우 \r\n-  정보통신망이용촉진및정보보호등에관한법률 등 관계법령에 의하여 국가기관 또는 정부에서 지정한 소비자단체들의 \r\n    요청에 의한 경우 \r\n-  분쟁에 연루된 도메인 등록자의 연락처를 분쟁 조정 기구나 법원이 요청하는 경우\r\n-  범죄에 대한 수사상의 목적이 있거나 정보통신윤리위원회, 한국정보보호진흥원 등 법정단체의 요청이 있는 경우 \r\n-  업무상 연락을 위하여 회원의 정보(성명, 주소, 전화번호)를 사용하는 경우 \r\n-  통계작성, 홍보자료, 학술연구 또는 시장조사를 위하여 필요한 경우로서 특정 고객임을 식별할 수 없는 형태로 제공\r\n    되는 경우\r\n-  회원들이 OOO의 서비스를 신청하여 OOO가 서비스 이행을 위해 배송업체, 외주콜센터업체, 지로발송 업체 등\r\n    에 해당 회원의 비밀번호, 주민등록번호를 포함하지 않는 주문정보, 주소지 정보, 연락처 등을 제공하는 경우\r\n\r\n2. OOO는 보다 다양한 서비스 제공을 위하여 회원들의 개인정보를 제휴사에게 제공하거나, 제휴사와 공유하고자 할 때\r\n    는 반드시 사전에 회원 개개인의 동의를 구하겠습니다. 제휴사가 어디인지, 제공 또는 공유되는 개인정보항목이 무엇인\r\n    지, 왜 그러한 개인정보가 공유되어야 하는지, 그리고 언제까지 어떻게 보호, 관리되는지에 대해 개별적으로 전자우편을 \r\n    통해 고지하여 동의를 구하는 절차를 거치게 되며, 귀하께서 동의하지 않는 경우에는 제휴사에게 제공하거나 제휴사와 \r\n    공유하지 않습니다.\r\n\r\n\r\n\r\n※ 개인정보의 열람 및 정정 \r\n1. OOO의 회원은 언제든지 자신의 개인정보를 열람하거나 정정하실 수 있습니다. 개인정보 열람 및 정정을 원하시는\r\n    분은 OOO 사이트에 로그온 하신 후, 로그아웃 버튼 옆의 \'정보변경\' 버튼을 클릭하십시오. \r\n2. 만일 ID와 비밀번호를 잃어버리신 회원은 홈페이지에서 \'ID 확인/비밀번호 확인\'서비스를 통해 ID나 비밀번호를 확인하\r\n    실 수 있습니다.\r\n3. OOO 회원 ID와 비밀번호에 대한 관리 책임은 본인에게 있습니다.\r\n    본인의 개인정보를 효과적으로 보호하기 위해서 자신의 회원ID 와 비밀번호를 적절하게 관리하고 책임을 져야 합니다. \r\n    본인의 ID와 비밀번호를 유출하였다면 이에 대해서 OOO는 책임을 지지않습니다. 다만, OOO의 과실 혹은 고의\r\n    에 의한 회원 ID와 비밀번호 유출에 대해서는 해당 고객이 OOO의 책임을 물을 수 있습니다.\r\n    이용자는 OOO의 계정을 이용해서 웹사이트를 이용한 뒤에는 해당 계정을 종료하시고 웹 브라우저의 창을 닫아주십\r\n    시오. 특히 컴퓨터를 타인과 공유하거나 공공장소에서 사용하는 경우 반드시 로그아웃하시거나 웹 브라우저를 종료하여\r\n    야 합니다.\r\n\r\n\r\n\r\n※ 회원 탈퇴\r\nOOO 회원은 언제든지 본인이 원할 때 탈퇴가 가능합니다. 회원 탈퇴는 회원 정보 관리 화면에서 신청 가능합니다. \r\n단, 회원이 가비아에서 이용 중인 서비스의 만기일이 지나지 않은 경우, 회원 탈퇴는 가능하지 않습니다.\r\n\r\n\r\n\r\n※ 개인정보보호를 위한 기술적 대책\r\nOOO는 회원들의 개인정보가 분실, 도난, 누출, 변조 또는 훼손되지 않도록 다음과 같은 기술적 대책을 마련하고 있습\r\n니다. \r\n1. 회원 개개인의 개인정보는 비밀번호에 의해 보호되며, 개인정보 데이터는 별도의 보안기능을 통해 보호 되고 있습니다. \r\n2. 회원 개개인의 비밀번호는 이용자 및 개인정보취급자가 생일, 주민등록번호, 전화번호 등 추측하기 쉬운 숫자를 비밀\r\n    번호로 이용하지 않도록 패스워드 작성 규칙을 수립하고 이행합니다.\r\n3. OOO는 백신 프로그램 및 악성코드 방어 소프트웨어을 이용하여 컴퓨터 바이러스에 의한 피해를 방지하고 있으며, \r\n    해당 소프트웨어는 매일 주기적으로 업데이트하고 있습니다.\r\n4. OOO는 침입차단 기능과 침입탐지 기능을 탑재하고 있는 고가의 라우터와 L3 스위치 장비를 사용하여 이중으로 \r\n    네트워크 상의 개인정보를 안전하게 보호하고 있습니다.\r\n5. OOO는 또한 별도의 침입차단시스템(Firewall)을 구축하여 3중 개인정보보호시스템을 운영하고 있습니다.\r\n6. OOO는 개인정보를 개인정보보호시스템에 암호화하여 저장하고 있으며, OOO의 정보통신망 외부로 개인정보를 \r\n    송신하거나 PC에 저장할 경우 암호화하여 저장하도록 시스템을 운영하고 있습니다. \r\n\r\n※ 의견수렴 및 불만처리\r\nOOO 회원 중 OOO의 개인정보보호와 관련하여 불만이 있으신 분은 개인정보 관리책임자에게 의견을 주시면, 접수 즉시 조치하여 처리결과를 통보해 드리겠습니다. 개인정보 무단 유출이나 기타 심각한 개인정보 침해 시에는 정부에서 설치하여 운영중인 개인정보침해 신고센터(http://www.cyberpr ivacy.or.kr, http://www.1336.or.kr, 전화 02-1336,)에 불만처리 또는 중재를 신청하실 수도 있습니다.\r\n\r\n\r\n\r\n※ 개인정보관리 계획의 수립 및 시행\r\nOOO는 회사 규정에 별도의 전산관리규정을 마련하여 다음과 같은 사항을 준수하겠습니다.\r\n1. 개인정보관리책임자의 지정 등 개인정보보호 조칙의 구성, 운영에 관한 사항\r\n2. 개인정보취급자의 교육에 관한 사항\r\n3. 개인정보처리시스템의 접속 기록 유지 및 정기적인 확인 감독\r\n4. 개인정보 출력 및 복사시의 보호조치\r\n5. 기타 개인정보 보호를 위해 필요한 사항\r\n\r\n\r\n\r\n※ 개인정보 관리 담당자\r\nOOO는 개인정보에 대한 의견수렴 및 불만처리를 담당하는 개인정보 관리담당자를 지정하고 있습니다. \r\n- 개인정보 관리 담당자\r\n성 명 : OOO\r\n직 책 : OOOO 대표\r\n전화번호 : 02-xxx-xxxx\r\nE-mail : xxxx@xxxx.com\r\n\r\n\r\n\r\n※ 아동의 회원 가입에 대해\r\n1. OOO는 아동의 개인정보를 보호하기 위하여 만 14세 미만의 아동이 회원 가입을 신청할 경우 법정대리인(부모)의 \r\n    동의가 있어야 합니다. 부모님의 허락을 받지않은 14세 미만의 미성년자에 대해서는 OOO가 임의로 회원에서 제외\r\n    할 수 있습니다. \r\n2. 만 14세 미만 미성년자의 법정대리인은 대리인의 책임하에 있는 미성년자의 개인정보에 대한 열람, 정정, 동의철회를 \r\n    요청할 수 있으며, 이러한 요청이 있을 경우 OOO는 지체없이 필요한 조치를 취하겠습니다. \r\n\r\n※ 미성년자 거래시 철회에 대해\r\nOOO는 미성년자와의 거래시 사전에 법정대리인(부모)의 동의를 구할 의무가 있으며, 법정대리인(부모)의 동의를 얻지 못한 거래의 경우, 거래를 취소할 수 있습니다. 또한 거래 당사자인 미성년자의 법정대리인(부모)이 거래 성립 후 7일 이내에 철회를 요청할 경우, 거래를 철회(환불)하겠습니다.\r\n\r\n\r\n\r\n※ 광고성 정보 전송에 대해\r\n1. OOO는 회원을 대상으로 OOO가 제공하고 있는 서비스에 대한 안내, 서비스에 대한 공지 등에 대한 메일을 자유\r\n    롭게 보낼 수 있습니다.\r\n2. OOO는 회원을 대상으로 광고성 정보를 전송할 수 있습니다. 단, 이러한 경우에는 (광고)라는 문구를 표시하여 회원\r\n    들이 광고성 정보임을 쉽게 파악할 수 있게 하며, 수신거부 의사를 밝힌 회원에게는 광고성 정보를 전송하지 않겠습니다.',NULL,NULL);
/*!40000 ALTER TABLE `wiz_page` ENABLE KEYS */;

--
-- Table structure for table `wiz_poll`
--

DROP TABLE IF EXISTS `wiz_poll`;
CREATE TABLE `wiz_poll` (
  `idx` int(10) NOT NULL auto_increment,
  `code` varchar(20) default NULL,
  `polluse` enum('Y','N') default NULL,
  `pollmain` enum('Y','N') default NULL,
  `sdate` date default NULL,
  `edate` date default NULL,
  `apermi` enum('N','M') default NULL,
  `cpermi` enum('N','M') default NULL,
  `subject` varchar(150) default NULL,
  `content` mediumtext,
  `wdate` date default NULL,
  `cnt` int(10) default '0',
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_poll`
--

/*!40000 ALTER TABLE `wiz_poll` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiz_poll` ENABLE KEYS */;

--
-- Table structure for table `wiz_polldata`
--

DROP TABLE IF EXISTS `wiz_polldata`;
CREATE TABLE `wiz_polldata` (
  `idx` int(10) NOT NULL auto_increment,
  `pidx` int(10) NOT NULL default '0',
  `question` varchar(150) default NULL,
  `answer01` varchar(100) default NULL,
  `count01` int(10) default NULL,
  `answer02` varchar(100) default NULL,
  `count02` int(10) default NULL,
  `answer03` varchar(100) default NULL,
  `count03` int(10) default NULL,
  `answer04` varchar(100) default NULL,
  `count04` int(10) default NULL,
  `answer05` varchar(100) default NULL,
  `count05` int(10) default NULL,
  `answer06` varchar(100) default NULL,
  `count06` int(10) default NULL,
  `answer07` varchar(100) default NULL,
  `count07` int(10) default NULL,
  `answer08` varchar(100) default NULL,
  `count08` int(10) default NULL,
  `answer09` varchar(100) default NULL,
  `count09` int(10) default NULL,
  `answer10` varchar(100) default NULL,
  `count10` int(10) default NULL,
  PRIMARY KEY  (`idx`),
  KEY `code` (`pidx`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_polldata`
--

/*!40000 ALTER TABLE `wiz_polldata` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiz_polldata` ENABLE KEYS */;

--
-- Table structure for table `wiz_pollinfo`
--

DROP TABLE IF EXISTS `wiz_pollinfo`;
CREATE TABLE `wiz_pollinfo` (
  `code` varchar(20) NOT NULL default '',
  `title` varchar(100) NOT NULL default '',
  `titleimg` varchar(40) default NULL,
  `header` varchar(255) default NULL,
  `footer` varchar(255) default NULL,
  `lpermi` varchar(6) default NULL,
  `rpermi` varchar(6) default NULL,
  `apermi` varchar(6) default NULL,
  `cpermi` varchar(6) default NULL,
  `skin` varchar(100) default NULL,
  `permsg` varchar(255) default NULL,
  `perurl` varchar(255) default NULL,
  `mainskin` mediumtext,
  `purl` mediumtext,
  `usetype` enum('Y','N') default NULL,
  `spam_check` enum('Y','N') default NULL,
  `datetype_list` varchar(30) default NULL,
  `datetype_view` varchar(30) default NULL,
  `comment` enum('Y','N') default NULL,
  `rows` int(3) default NULL,
  `lists` int(3) default NULL,
  `newc` int(3) default NULL,
  `subject_len` int(3) default NULL,
  `abuse` enum('Y','N') default NULL,
  `abtxt` mediumtext,
  `wdate` date default NULL,
  PRIMARY KEY  (`code`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_pollinfo`
--

/*!40000 ALTER TABLE `wiz_pollinfo` DISABLE KEYS */;
INSERT INTO `wiz_pollinfo` VALUES ('poll','','','','','','','','','pollBasic','沅','','<table width=\'100%\' cellspacing=\'0\' cellpadding=\'0\' border=\'0\'>\r\n  <tr><td><b>{SUBJECT}</b></td></tr>\r\n  <tr><td>{CONTENT}</td></tr>\r\n\r\n  [LOOP]\r\n  <tr><td><img src=\"/images/point.gif\" align=\"absmiddle\"> {QUESTION}</td></tr>\r\n\r\n    [LOOP2]\r\n    <tr><td> {ANSWER} </td></tr>\r\n    [/LOOP2]\r\n\r\n  [/LOOP]\r\n  <tr><td height=5></td></tr>\r\n  <tr><td align=center>{VOTE_BTN} {VIEW_BTN}</td></tr>\r\n</table>','','Y','Y','%Y.%m.%d','%Y.%m.%d','Y',20,5,2,0,'','','2008-12-22');
/*!40000 ALTER TABLE `wiz_pollinfo` ENABLE KEYS */;

--
-- Table structure for table `wiz_prdmain`
--

DROP TABLE IF EXISTS `wiz_prdmain`;
CREATE TABLE `wiz_prdmain` (
  `idx` int(3) NOT NULL auto_increment,
  `type` varchar(30) NOT NULL default '',
  `typename` varchar(30) default NULL,
  `isuse` enum('Y','N') default NULL,
  `prior` int(3) default NULL,
  `skin_type` varchar(10) default NULL,
  `prd_num` int(3) default NULL,
  `prd_row` int(3) default NULL,
  `prd_width` varchar(3) default NULL,
  `prd_height` varchar(3) default NULL,
  `barimg` varchar(255) default NULL,
  `html` mediumtext,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_prdmain`
--

/*!40000 ALTER TABLE `wiz_prdmain` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiz_prdmain` ENABLE KEYS */;

--
-- Table structure for table `wiz_prdrelation`
--

DROP TABLE IF EXISTS `wiz_prdrelation`;
CREATE TABLE `wiz_prdrelation` (
  `idx` int(10) NOT NULL auto_increment,
  `prdcode` varchar(10) default NULL,
  `relcode` varchar(10) default NULL,
  PRIMARY KEY  (`idx`),
  KEY `prdcode` (`prdcode`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_prdrelation`
--

/*!40000 ALTER TABLE `wiz_prdrelation` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiz_prdrelation` ENABLE KEYS */;

--
-- Table structure for table `wiz_product`
--

DROP TABLE IF EXISTS `wiz_product`;
CREATE TABLE `wiz_product` (
  `prdcode` varchar(10) NOT NULL default '',
  `prdname` varchar(100) default NULL,
  `prdcom` varchar(50) default NULL,
  `origin` varchar(50) default NULL,
  `showset` enum('Y','N') default NULL,
  `stock` int(5) default NULL,
  `savestock` int(5) default NULL,
  `prior` bigint(14) default NULL,
  `viewcnt` int(5) default NULL,
  `deimgcnt` int(5) default NULL,
  `basketcnt` int(10) default NULL,
  `ordercnt` int(10) default NULL,
  `cancelcnt` int(10) default NULL,
  `comcnt` int(10) default NULL,
  `sellprice` int(10) default NULL,
  `conprice` int(10) default NULL,
  `reserve` int(10) default NULL,
  `strprice` varchar(255) default NULL,
  `new` enum('Y','N') default NULL,
  `best` enum('Y','N') default NULL,
  `popular` enum('Y','N') default NULL,
  `recom` enum('Y','N') default NULL,
  `sale` enum('Y','N') default NULL,
  `shortage` enum('Y','N','S') default NULL,
  `coupon_use` enum('Y','N') default NULL,
  `coupon_dis` int(10) default NULL,
  `coupon_type` enum('?','%') default NULL,
  `coupon_amount` int(10) default NULL,
  `coupon_limit` enum('N') default NULL,
  `coupon_sdate` date default NULL,
  `coupon_edate` date default NULL,
  `del_type` enum('DA','DB','DC','DD') default NULL,
  `del_price` int(11) default NULL,
  `prdicon` varchar(255) default NULL,
  `prefer` int(1) default NULL,
  `brand` int(11) default NULL,
  `info_use` enum('Y','N') default NULL,
  `info_name1` varchar(80) default NULL,
  `info_value1` varchar(255) default NULL,
  `info_name2` varchar(80) default NULL,
  `info_value2` varchar(255) default NULL,
  `info_name3` varchar(80) default NULL,
  `info_value3` varchar(255) default NULL,
  `info_name4` varchar(80) default NULL,
  `info_value4` varchar(255) default NULL,
  `info_name5` varchar(80) default NULL,
  `info_value5` varchar(255) default NULL,
  `info_name6` varchar(80) default NULL,
  `info_value6` varchar(255) default NULL,
  `opt_use` enum('Y','N') default NULL,
  `opttitle` varchar(50) default NULL,
  `optcode` mediumtext,
  `opttitle2` varchar(50) default NULL,
  `optcode2` mediumtext,
  `opttitle3` varchar(50) default NULL,
  `optcode3` mediumtext,
  `opttitle4` varchar(50) default NULL,
  `optcode4` mediumtext,
  `opttitle5` varchar(50) default NULL,
  `optcode5` mediumtext,
  `opttitle6` varchar(50) default NULL,
  `optcode6` mediumtext,
  `opttitle7` varchar(50) default NULL,
  `optcode7` mediumtext,
  `optvalue` mediumtext,
  `prdimg_R` varchar(30) default NULL,
  `prdimg_L1` varchar(30) default NULL,
  `prdimg_M1` varchar(30) default NULL,
  `prdimg_S1` varchar(30) default NULL,
  `prdimg_L2` varchar(30) default NULL,
  `prdimg_M2` varchar(30) default NULL,
  `prdimg_S2` varchar(30) default NULL,
  `prdimg_L3` varchar(30) default NULL,
  `prdimg_M3` varchar(30) default NULL,
  `prdimg_S3` varchar(30) default NULL,
  `prdimg_L4` varchar(30) default NULL,
  `prdimg_M4` varchar(30) default NULL,
  `prdimg_S4` varchar(30) default NULL,
  `prdimg_L5` varchar(30) default NULL,
  `prdimg_M5` varchar(30) default NULL,
  `prdimg_S5` varchar(30) default NULL,
  `searchkey` varchar(255) default NULL,
  `stortexp` varchar(255) default NULL,
  `content` mediumtext,
  `wdate` datetime default NULL,
  `mdate` datetime default NULL,
  PRIMARY KEY  (`prdcode`),
  FULLTEXT KEY `prdcode` (`prdcode`),
  FULLTEXT KEY `prdcode_2` (`prdcode`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_product`
--

/*!40000 ALTER TABLE `wiz_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiz_product` ENABLE KEYS */;

--
-- Table structure for table `wiz_reserve`
--

DROP TABLE IF EXISTS `wiz_reserve`;
CREATE TABLE `wiz_reserve` (
  `idx` int(10) NOT NULL auto_increment,
  `memid` char(20) NOT NULL default '',
  `reservemsg` char(100) NOT NULL default '',
  `reserve` int(10) NOT NULL default '0',
  `orderid` char(20) default NULL,
  `wdate` datetime default NULL,
  PRIMARY KEY  (`idx`),
  KEY `memid` (`memid`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_reserve`
--

/*!40000 ALTER TABLE `wiz_reserve` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiz_reserve` ENABLE KEYS */;

--
-- Table structure for table `wiz_shopinfo`
--

DROP TABLE IF EXISTS `wiz_shopinfo`;
CREATE TABLE `wiz_shopinfo` (
  `shop_name` varchar(30) default NULL,
  `shop_url` varchar(100) default NULL,
  `shop_email` varchar(50) default NULL,
  `shop_tel` varchar(14) default NULL,
  `shop_hand` varchar(14) default NULL,
  `site_key` mediumtext,
  `site_date` varchar(20) default NULL,
  `designer_id` varchar(20) default NULL,
  `designer_pw` varchar(20) default NULL,
  `anywiz_id` varchar(60) default NULL,
  `anywiz_pw` varchar(60) default NULL,
  `admin_title` varchar(255) default NULL,
  `admin_footer` mediumtext,
  `com_num` varchar(20) default NULL,
  `com_name` varchar(30) default NULL,
  `com_owner` varchar(20) default NULL,
  `com_post` varchar(7) default NULL,
  `com_address` varchar(80) default NULL,
  `com_kind` varchar(50) default NULL,
  `com_class` varchar(50) default NULL,
  `com_tel` varchar(20) default NULL,
  `com_fax` varchar(20) default NULL,
  `start_page` varchar(255) default NULL,
  `solution` varchar(100) default NULL,
  `sch_use` enum('Y','N') default NULL,
  `poll_use` enum('Y','N') default NULL,
  `design_use` enum('Y','N') default NULL,
  `addbbs_use` enum('Y','N') default NULL,
  `sms_use` enum('Y','N') default NULL,
  `namecheck_use` enum('Y','N') default NULL,
  `namecheck_id` varchar(20) default NULL,
  `namecheck_pw` varchar(20) default NULL,
  `estimate_use` enum('Y','N') default NULL,
  `estimate_bigo` mediumtext,
  `ssl_use` enum('Y','N') default NULL,
  `ssl_port` varchar(4) default NULL,
  `up_date` date default NULL
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_shopinfo`
--

/*!40000 ALTER TABLE `wiz_shopinfo` DISABLE KEYS */;
INSERT INTO `wiz_shopinfo` VALUES ('소셜커머스 솔루션','http://wizoneday.anywiz.co.kr','help@oneday.com','000-0000-0000','000-0000-0000','1513d9e161a40fe991ae002a84936eb8\r\nde1637fbf193d71bcbe718ac82df5ee3','1292217562','wizoneday','1234','34138f076d918cb3b7f91205181fb3ab','663c13d1d636f6ea10e3be4d8a25710b','::::: 원데이몰 관리자 :::::','Copyright ⓒ 2009 사이트명 All rights reserved.','000-00-000000','원데이몰','대표자','000-000','서울 OO구 OO동 OOO-O번지','서비스','원데이몰','00-0000-0000','00-0000-0000','/admin/main/main.php','wizshop','Y','Y','Y','Y','Y','N','','','Y','1. (주)원데이몰에서 판매한 제품의 A/S 기간은 6개월 입니다.\r\n2. 본 견적서는 견적 당일에만 유효 합니다.\r\n3. 기타 문의사항은 000-0000-0000번으로 전화 주시기 바랍니다..','N','','2011-02-23');
/*!40000 ALTER TABLE `wiz_shopinfo` ENABLE KEYS */;

--
-- Table structure for table `wiz_tabledesc`
--

DROP TABLE IF EXISTS `wiz_tabledesc`;
CREATE TABLE `wiz_tabledesc` (
  `idx` int(10) NOT NULL auto_increment,
  `tname` varchar(100) default NULL,
  `tdesc` text,
  `field` varchar(100) default NULL,
  `fdesc` text,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=819;

--
-- Dumping data for table `wiz_tabledesc`
--

/*!40000 ALTER TABLE `wiz_tabledesc` DISABLE KEYS */;
INSERT INTO `wiz_tabledesc` VALUES (1,'wiz_admin','<b>관리자테이블</b>\r\n관리자 목록테이블입니다.','anywiz',NULL),(2,'wiz_admin',NULL,'id','아이디'),(3,'wiz_admin',NULL,'passwd','비밀번호'),(4,'wiz_admin',NULL,'name','이름'),(5,'wiz_admin',NULL,'resno','주민등록번호'),(6,'wiz_admin',NULL,'email','이메일'),(7,'wiz_admin',NULL,'tphone','전화번호'),(8,'wiz_admin',NULL,'hphone','휴대전화번호'),(9,'wiz_admin',NULL,'post','우편번호'),(10,'wiz_admin',NULL,'address','주소'),(11,'wiz_admin',NULL,'address2','상세주소'),(12,'wiz_admin',NULL,'part','직급'),(13,'wiz_admin',NULL,'permi','페이지 접근권한'),(14,'wiz_admin',NULL,'last','마지막 접속시간'),(15,'wiz_admin',NULL,'wdate','등록일'),(16,'wiz_admin',NULL,'descript','관리자주석'),(17,'wiz_adminlog','<b>관리자 접속로그 테이블</b>\r\n관리자 접속로그 테이블입니다.','anywiz',NULL),(18,'wiz_adminlog',NULL,'idx','인덱스'),(19,'wiz_adminlog',NULL,'status','상태'),(20,'wiz_adminlog',NULL,'admin_id','접속 아이디'),(21,'wiz_adminlog',NULL,'ip','IP'),(22,'wiz_adminlog',NULL,'date','접속일'),(23,'wiz_adminlog','<b>관리자 접속로그 테이블</b>\r\n관리자 접속로그 테이블입니다.','anywiz',NULL),(24,'wiz_adminlog',NULL,'idx','인덱스'),(25,'wiz_adminlog',NULL,'status','상태'),(26,'wiz_adminlog',NULL,'admin_id','접속 아이디'),(27,'wiz_adminlog',NULL,'ip','IP'),(28,'wiz_adminlog',NULL,'date','접속일'),(29,'wiz_banner','<b>배너 테이블</b>\r\n배너 테이블입니다.','anywiz',NULL),(30,'wiz_banner',NULL,'idx','인덱스'),(31,'wiz_banner',NULL,'name','배너그룹코드'),(32,'wiz_banner',NULL,'align','정렬값'),(33,'wiz_banner',NULL,'prior','우선순위'),(34,'wiz_banner',NULL,'isuse','사용여부'),(35,'wiz_banner',NULL,'link_url','링크주소'),(36,'wiz_banner',NULL,'link_target','링크Target'),(37,'wiz_banner',NULL,'de_type','디자인방법'),(38,'wiz_banner',NULL,'de_img','배너이미지'),(39,'wiz_banner',NULL,'de_html','배너내용'),(40,'wiz_bannerinfo','<b>배너그룹 테이블</b>\r\n배너그릅 테이블입니다.','anywiz',NULL),(41,'wiz_bannerinfo',NULL,'idx','인덱스'),(42,'wiz_bannerinfo',NULL,'title','배너그룹이름'),(43,'wiz_bannerinfo',NULL,'name','배너그룹코드'),(44,'wiz_bannerinfo',NULL,'types','배너형태'),(45,'wiz_bannerinfo',NULL,'types_num','배너갯수'),(46,'wiz_bannerinfo',NULL,'isuse','사용여부'),(47,'wiz_basket','<b>장바구니 테이블</b>\r\n장바구니 테이블입니다.','anywiz',NULL),(48,'wiz_basket',NULL,'idx','인덱스'),(49,'wiz_basket',NULL,'orderid','주문번호'),(50,'wiz_basket',NULL,'prdcode','상품코드'),(51,'wiz_basket',NULL,'prdname','상품명'),(52,'wiz_basket',NULL,'prdimg','상품이미지'),(53,'wiz_basket',NULL,'prdprice','상품가격'),(54,'wiz_basket',NULL,'prdreserve','적립금'),(55,'wiz_basket',NULL,'opttitle','옵션명1'),(56,'wiz_basket',NULL,'optcode','옵션내용1'),(57,'wiz_basket',NULL,'opttitle2','옵션명2'),(58,'wiz_basket',NULL,'optcode2','옵션내용2'),(59,'wiz_basket',NULL,'opttitle3','옵션명3'),(60,'wiz_basket',NULL,'optcode3','옵션내용3'),(61,'wiz_basket',NULL,'opttitle4','옵션명4'),(62,'wiz_basket',NULL,'optcode4','옵션내용4'),(63,'wiz_basket',NULL,'opttitle5','옵션명5'),(64,'wiz_basket',NULL,'optcode5','옵션내용5'),(65,'wiz_basket',NULL,'opttitle6','옵션명6'),(66,'wiz_basket',NULL,'optcode6','옵션내용6'),(67,'wiz_basket',NULL,'opttitle7','옵션명7'),(68,'wiz_basket',NULL,'optcode7','옵션내용7'),(69,'wiz_basket',NULL,'amount','수량'),(70,'wiz_basket',NULL,'wdate','등록일'),(71,'wiz_basket',NULL,'status','상태'),(72,'wiz_basket',NULL,'admin','취소 처리 관리자'),(73,'wiz_basket',NULL,'bank','환불계좌은행'),(74,'wiz_basket',NULL,'account','환불계좌번호'),(75,'wiz_basket',NULL,'acc_name','환불계좌예금주'),(76,'wiz_basket',NULL,'reason','취소사유'),(77,'wiz_basket',NULL,'memo','메모'),(78,'wiz_basket',NULL,'repay','환불방법'),(79,'wiz_basket',NULL,'ca_date','취소요청일'),(80,'wiz_basket',NULL,'cc_date','취소완료일'),(81,'wiz_basket',NULL,'del_type','배송방법'),(82,'wiz_basket',NULL,'del_price','배송료'),(83,'wiz_basket_tmp','<b>장바구니 임시 테이블</b>\r\n장바구니 임시 테이블입니다.','anywiz',NULL),(84,'wiz_basket_tmp',NULL,'idx','인덱스'),(85,'wiz_basket_tmp',NULL,'uniq_id','고유값(쿠키)'),(86,'wiz_basket_tmp',NULL,'prdcode','상품코드'),(87,'wiz_basket_tmp',NULL,'prdname','상품명'),(88,'wiz_basket_tmp',NULL,'prdimg','상품이미지'),(89,'wiz_basket_tmp',NULL,'prdprice','상품가격'),(90,'wiz_basket_tmp',NULL,'prdreserve','적립금'),(91,'wiz_basket_tmp',NULL,'opttitle','옵션명1'),(92,'wiz_basket_tmp',NULL,'optcode','옵션내용1'),(93,'wiz_basket_tmp',NULL,'opttitle2','옵션명2'),(94,'wiz_basket_tmp',NULL,'optcode2','옵션내용2'),(95,'wiz_basket_tmp',NULL,'opttitle3','옵션명3'),(96,'wiz_basket_tmp',NULL,'optcode3','옵션내용3'),(97,'wiz_basket_tmp',NULL,'opttitle4','옵션명4'),(98,'wiz_basket_tmp',NULL,'optcode4','옵션내용4'),(99,'wiz_basket_tmp',NULL,'opttitle5','옵션명5'),(100,'wiz_basket_tmp',NULL,'optcode5','옵션내용5'),(101,'wiz_basket_tmp',NULL,'opttitle6','옵션명6'),(102,'wiz_basket_tmp',NULL,'optcode6','옵션내용6'),(103,'wiz_basket_tmp',NULL,'opttitle7','옵션명7'),(104,'wiz_basket_tmp',NULL,'optcode7','옵션내용7'),(105,'wiz_basket_tmp',NULL,'amount','수량'),(106,'wiz_basket_tmp',NULL,'wdate','등록일'),(107,'wiz_basket_tmp',NULL,'status','상태'),(108,'wiz_basket_tmp',NULL,'admin','취소처리 관리자'),(109,'wiz_basket_tmp',NULL,'bank','환불계좌은행'),(110,'wiz_basket_tmp',NULL,'account','환불계좌번호'),(111,'wiz_basket_tmp',NULL,'acc_name','환불계좌예금주'),(112,'wiz_basket_tmp',NULL,'reason','취소사유'),(113,'wiz_basket_tmp',NULL,'memo','메모'),(114,'wiz_basket_tmp',NULL,'repay','환불방법'),(115,'wiz_basket_tmp',NULL,'ca_date','취소요청일'),(116,'wiz_basket_tmp',NULL,'cc_date','취소완료일'),(117,'wiz_bbs','<b>게시물 테이블</b>\r\n게시물 테이블입니다.','anywiz',NULL),(118,'wiz_bbs',NULL,'idx','인덱스'),(119,'wiz_bbs',NULL,'prdcode','상품코드'),(120,'wiz_bbs',NULL,'code','게시판코드'),(121,'wiz_bbs',NULL,'prino','정렬값'),(122,'wiz_bbs',NULL,'grpno','답변그룹값'),(123,'wiz_bbs',NULL,'depno','답변깊이값'),(124,'wiz_bbs',NULL,'star','선호도'),(125,'wiz_bbs',NULL,'notice','공지사항'),(126,'wiz_bbs',NULL,'category','카테고리'),(127,'wiz_bbs',NULL,'memid','글쓴이 아이디'),(128,'wiz_bbs',NULL,'memgrp','답변그룹 아이디'),(129,'wiz_bbs',NULL,'name','이름'),(130,'wiz_bbs',NULL,'email','이메일'),(131,'wiz_bbs',NULL,'tphone','전화번호'),(132,'wiz_bbs',NULL,'hphone','휴대전화번호'),(133,'wiz_bbs',NULL,'zipcode','우편번호'),(134,'wiz_bbs',NULL,'address','주소'),(135,'wiz_bbs',NULL,'subject','제목'),(136,'wiz_bbs',NULL,'content','내용'),(137,'wiz_bbs',NULL,'addinfo1','추가내용1'),(138,'wiz_bbs',NULL,'addinfo2','추가내용2'),(139,'wiz_bbs',NULL,'addinfo3','추가내용3'),(140,'wiz_bbs',NULL,'addinfo4','추가내용4'),(141,'wiz_bbs',NULL,'addinfo5','추가내용5'),(142,'wiz_bbs',NULL,'ctype','HTML 사용여부'),(143,'wiz_bbs',NULL,'privacy','비밀글'),(144,'wiz_bbs',NULL,'upfile1','첨부파일1'),(145,'wiz_bbs',NULL,'upfile2','첨부파일2'),(146,'wiz_bbs',NULL,'upfile3','첨부파일3'),(147,'wiz_bbs',NULL,'upfile4','첨부파일4'),(148,'wiz_bbs',NULL,'upfile5','첨부파일5'),(149,'wiz_bbs',NULL,'upfile6','첨부파일6'),(150,'wiz_bbs',NULL,'upfile7','첨부파일7'),(151,'wiz_bbs',NULL,'upfile8','첨부파일8'),(152,'wiz_bbs',NULL,'upfile9','첨부파일9'),(153,'wiz_bbs',NULL,'upfile10','첨부파일10'),(154,'wiz_bbs',NULL,'upfile11','첨부파일11'),(155,'wiz_bbs',NULL,'upfile12','첨부파일12'),(156,'wiz_bbs',NULL,'upfile1_name','첨부파일명1'),(157,'wiz_bbs',NULL,'upfile2_name','첨부파일명2'),(158,'wiz_bbs',NULL,'upfile3_name','첨부파일명3'),(159,'wiz_bbs',NULL,'upfile4_name','첨부파일명4'),(160,'wiz_bbs',NULL,'upfile5_name','첨부파일명5'),(161,'wiz_bbs',NULL,'upfile6_name','첨부파일명6'),(162,'wiz_bbs',NULL,'upfile7_name','첨부파일명7'),(163,'wiz_bbs',NULL,'upfile8_name','첨부파일명8'),(164,'wiz_bbs',NULL,'upfile9_name','첨부파일명9'),(165,'wiz_bbs',NULL,'upfile10_name','첨부파일명10'),(166,'wiz_bbs',NULL,'upfile11_name','첨부파일명11'),(167,'wiz_bbs',NULL,'upfile12_name','첨부파일명12'),(168,'wiz_bbs',NULL,'movie1','동영상1'),(169,'wiz_bbs',NULL,'movie2','동영상2'),(170,'wiz_bbs',NULL,'movie3','동영상3'),(171,'wiz_bbs',NULL,'passwd','비밀번호'),(172,'wiz_bbs',NULL,'count','조회수'),(173,'wiz_bbs',NULL,'recom','추천수'),(174,'wiz_bbs',NULL,'comment','코멘트수'),(175,'wiz_bbs',NULL,'ip','IP'),(176,'wiz_bbs',NULL,'wdate','작성일'),(177,'wiz_bbscat','<b>게시판 카테고리 테이블</b>\r\n게시판 카테고리 테이블입니다.','anywiz',NULL),(178,'wiz_bbscat',NULL,'idx','인덱스'),(179,'wiz_bbscat',NULL,'gubun','카테고리형식(전체,일반)'),(180,'wiz_bbscat',NULL,'code','게시판코드'),(181,'wiz_bbscat',NULL,'catname','카테고리명'),(182,'wiz_bbscat',NULL,'catimg','메뉴 이미지'),(183,'wiz_bbscat',NULL,'catimg_over','메뉴 롤오버 이미지'),(184,'wiz_bbscat',NULL,'caticon','아이콘'),(185,'wiz_bbsinfo','<b>게시판 정보 테이블</b>\r\n게시판 정보 테이블입니다.','anywiz',NULL),(186,'wiz_bbsinfo',NULL,'code','게시판코드'),(187,'wiz_bbsinfo',NULL,'type','게시판형식(일반,일정,상품,후기)'),(188,'wiz_bbsinfo',NULL,'title','게시판명'),(189,'wiz_bbsinfo',NULL,'titleimg','타이틀이미지'),(190,'wiz_bbsinfo',NULL,'header','상단파일'),(191,'wiz_bbsinfo',NULL,'footer','하단파일'),(192,'wiz_bbsinfo',NULL,'category','카테고리'),(193,'wiz_bbsinfo',NULL,'bbsadmin','게시판관리자'),(194,'wiz_bbsinfo',NULL,'lpermi','목록보기 권한'),(195,'wiz_bbsinfo',NULL,'rpermi','내용보기 권한'),(196,'wiz_bbsinfo',NULL,'wpermi','글쓰기 권한'),(197,'wiz_bbsinfo',NULL,'apermi','답글쓰기 권한'),(198,'wiz_bbsinfo',NULL,'cpermi','코멘트쓰기 권한'),(199,'wiz_bbsinfo',NULL,'datetype_list','날짜형식(목록페이지)'),(200,'wiz_bbsinfo',NULL,'datetype_view','날짜형식(보기페이지)'),(201,'wiz_bbsinfo',NULL,'skin','스킨'),(202,'wiz_bbsinfo',NULL,'permsg','권한이 없을 경우 경고메세지'),(203,'wiz_bbsinfo',NULL,'perurl','권한이 없을 경우 이동페이지'),(204,'wiz_bbsinfo',NULL,'pageurl','게시판 페이지 주소'),(205,'wiz_bbsinfo',NULL,'editor','웹에디터 사용여부 '),(206,'wiz_bbsinfo',NULL,'usetype','게시판 사용여부 '),(207,'wiz_bbsinfo',NULL,'privacy','자동 비밀글 사용여부 '),(208,'wiz_bbsinfo',NULL,'upfile','파일업로드 사용여부'),(209,'wiz_bbsinfo',NULL,'movie','동영상 사용여부'),(210,'wiz_bbsinfo',NULL,'comment','코멘트 사용여부 '),(211,'wiz_bbsinfo',NULL,'remail','답글 메일알람 사용여부 '),(212,'wiz_bbsinfo',NULL,'imgview','이미지 첨부파일 보기페이지 노출여부 '),(213,'wiz_bbsinfo',NULL,'recom','추천기능 사용여부 '),(214,'wiz_bbsinfo',NULL,'abuse','욕설,비방글 필터링 사용여부 '),(215,'wiz_bbsinfo',NULL,'abtxt','욕설,비방글 필터링 내용 '),(216,'wiz_bbsinfo',NULL,'simgsize','목록페이지 이미지크기 '),(217,'wiz_bbsinfo',NULL,'mimgsize','보기페이지 이미지크기 '),(218,'wiz_bbsinfo',NULL,'rows','페이지 출력수 '),(219,'wiz_bbsinfo',NULL,'lists','리스트 출력수 '),(220,'wiz_bbsinfo',NULL,'newc','NEW 기간설정 '),(221,'wiz_bbsinfo',NULL,'hotc','HOT 조회수 설정 '),(222,'wiz_bbsinfo',NULL,'line','줄바꿈 게시물수 '),(223,'wiz_bbsinfo',NULL,'subject_len','제목 글자수 '),(224,'wiz_bbsinfo',NULL,'img_align','첨부파일 이미지 정렬값 '),(225,'wiz_bbsinfo',NULL,'btn_view','권한이 없을 경우 글쓰기 버튼 노출여부 '),(226,'wiz_bbsinfo',NULL,'spam_check','스팸글체크기능 사용여부 '),(227,'wiz_brand','<b>브랜드 테이블</b>\r\n브랜드 테이블입니다.','anywiz',NULL),(228,'wiz_brand',NULL,'idx','인덱스'),(229,'wiz_brand',NULL,'priorno','진열순서'),(230,'wiz_brand',NULL,'brdname','브랜드명'),(231,'wiz_brand',NULL,'brduse','사용여부'),(232,'wiz_brand',NULL,'brdimg','메뉴이미지'),(233,'wiz_brand',NULL,'brdimg_over','롤오버이미지'),(234,'wiz_brand',NULL,'subimg','서브상단'),(235,'wiz_brand',NULL,'subimg_type','서브상단형식'),(236,'wiz_brand',NULL,'prd_num','상품진열수'),(237,'wiz_brand',NULL,'prd_width','상품크기(가로)'),(238,'wiz_brand',NULL,'prd_height','상품크기(세로)'),(239,'wiz_brand',NULL,'recom_use','추천상품 진열여부'),(240,'wiz_category','<b>상품분류 테이블</b>\r\n상품분류 테이블입니다.','anywiz',NULL),(241,'wiz_category',NULL,'catcode','분류코드'),(242,'wiz_category',NULL,'depthno','분류위치값'),(243,'wiz_category',NULL,'priorno01','대분류 정렬값'),(244,'wiz_category',NULL,'priorno02','중분류 정렬값'),(245,'wiz_category',NULL,'priorno03','소분류 정렬값'),(246,'wiz_category',NULL,'catname','분류명'),(247,'wiz_category',NULL,'catuse','사용여부'),(248,'wiz_category',NULL,'catimg','메뉴이미지'),(249,'wiz_category',NULL,'catimg_over','롤오버 이미지'),(250,'wiz_category',NULL,'subimg','서브상단'),(251,'wiz_category',NULL,'subimg_type','서브상단형식'),(252,'wiz_category',NULL,'prd_tema','상품테마'),(253,'wiz_category',NULL,'prd_num','상품진열수'),(254,'wiz_category',NULL,'prd_width','상품크기(가로)'),(255,'wiz_category',NULL,'prd_height','상품크기(세로)'),(256,'wiz_category',NULL,'recom_use','추천상품 진열여부'),(257,'wiz_category',NULL,'recom_tema','추천상품테마'),(258,'wiz_category',NULL,'recom_num','추천상품 진열수'),(259,'wiz_comment','<b>코멘트 테이블</b>\r\n코멘트 테이블입니다.','anywiz',NULL),(260,'wiz_comment',NULL,'idx','인덱스'),(261,'wiz_comment',NULL,'ctype','코멘트형식'),(262,'wiz_comment',NULL,'cidx','게시물번호'),(263,'wiz_comment',NULL,'prdcode','상품코드'),(264,'wiz_comment',NULL,'star','선호도'),(265,'wiz_comment',NULL,'id','작성자 아이디'),(266,'wiz_comment',NULL,'name','이름'),(267,'wiz_comment',NULL,'content','내용'),(268,'wiz_comment',NULL,'passwd','비밀번호'),(269,'wiz_comment',NULL,'wdate','작성일'),(270,'wiz_comment',NULL,'wip','IP'),(271,'wiz_conrefer','<b>접속경로 테이블</b>\r\n접속경로 테이블입니다.','anywiz',NULL),(272,'wiz_conrefer',NULL,'referer','접속경로'),(273,'wiz_conrefer',NULL,'host','접속HOST'),(274,'wiz_conrefer',NULL,'cnt','접속자수 '),(275,'wiz_consult','<b>1:1 상담관리 테이블</b>\r\n1:1 상담관리 테이블입니다.','anywiz',NULL),(276,'wiz_consult',NULL,'idx','인덱스'),(277,'wiz_consult',NULL,'memid','작성자 아이디'),(278,'wiz_consult',NULL,'name','이름'),(279,'wiz_consult',NULL,'subject','제목'),(280,'wiz_consult',NULL,'question','질문'),(281,'wiz_consult',NULL,'answer','답변'),(282,'wiz_consult',NULL,'wdate','작성일'),(283,'wiz_consult',NULL,'status','처리상태'),(284,'wiz_content','<b>팝업 및 페이지설정 테이블</b>\r\n팝업 및 페이지설정 테이블입니다.','anywiz',NULL),(285,'wiz_content',NULL,'idx','인덱스'),(286,'wiz_content',NULL,'type','내용 형식'),(287,'wiz_content',NULL,'isuse','사용여부'),(288,'wiz_content',NULL,'scroll','스크롤 사용여부'),(289,'wiz_content',NULL,'posi_x','좌측 위치'),(290,'wiz_content',NULL,'posi_y','상단 위치'),(291,'wiz_content',NULL,'size_x','가로 크기'),(292,'wiz_content',NULL,'size_y','세로 크기 '),(293,'wiz_content',NULL,'sdate','게시기간 시작일 '),(294,'wiz_content',NULL,'edate','게시기간 종료일 '),(295,'wiz_content',NULL,'linkurl','링크주소 '),(296,'wiz_content',NULL,'popup_type','팝업형태 '),(297,'wiz_content',NULL,'title','제목 '),(298,'wiz_content',NULL,'content','내용'),(299,'wiz_content',NULL,'wdate','작성일'),(300,'wiz_contime','<b>접속자 테이블</b>\r\n접속자 테이블입니다.','anywiz',NULL),(301,'wiz_contime',NULL,'time','접속시간 '),(302,'wiz_contime',NULL,'cnt','접속자수 '),(303,'wiz_coupon','<b>쿠폰 테이블</b>\r\n쿠폰 테이블입니다.','anywiz',NULL),(304,'wiz_coupon',NULL,'idx','인덱스'),(305,'wiz_coupon',NULL,'coupon_name','쿠폰명'),(306,'wiz_coupon',NULL,'coupon_img','쿠폰이미지'),(307,'wiz_coupon',NULL,'coupon_sdate','사용기간 시작일'),(308,'wiz_coupon',NULL,'coupon_edate','사용기간 종료일'),(309,'wiz_coupon',NULL,'coupon_amount','수량'),(310,'wiz_coupon',NULL,'coupon_limit','수량제한여부'),(311,'wiz_coupon',NULL,'coupon_dis','할인금액/할인율'),(312,'wiz_coupon',NULL,'coupon_type','할인형식'),(313,'wiz_coupon',NULL,'wdate','작성일'),(314,'wiz_cprelation','<b>상품, 상품분류 관계 테이블</b>\r\n상품, 상품분류 관계 테이블입니다.','anywiz',NULL),(315,'wiz_cprelation',NULL,'idx','인덱스'),(316,'wiz_cprelation',NULL,'prdcode','상품코드 '),(317,'wiz_cprelation',NULL,'catcode','분류코드  '),(318,'wiz_design','<b>디자인 테이블</b>\r\n디자인 테이블입니다.','anywiz',NULL),(319,'wiz_design',NULL,'site_title','쇼핑몰 타이틀'),(320,'wiz_design',NULL,'site_intro','쇼핑몰 소개글'),(321,'wiz_design',NULL,'site_keyword','쇼핑몰 검색키워드'),(322,'wiz_design',NULL,'site_align','쇼핑몰 정렬'),(323,'wiz_design',NULL,'site_width','사이트 가로크기'),(324,'wiz_design',NULL,'site_bgcolor','전체배경색'),(325,'wiz_design',NULL,'site_background','배경이미지'),(326,'wiz_design',NULL,'site_font','일반폰트색'),(327,'wiz_design',NULL,'site_link','링크(link)색'),(328,'wiz_design',NULL,'site_active','링크(active)색'),(329,'wiz_design',NULL,'site_hover','링크(hover)색'),(330,'wiz_design',NULL,'site_visited','링크(visited)색'),(331,'wiz_design',NULL,'footer_html','하단주소'),(332,'wiz_design',NULL,'logo_img','로고 이미지'),(333,'wiz_design',NULL,'cate_img','상품카테고리 이미지'),(334,'wiz_design',NULL,'cate_sub','서브카테고리 출력여부'),(335,'wiz_design',NULL,'cate_subx','카테고리 가로좌표'),(336,'wiz_design',NULL,'cate_suby','카테고리 세로좌표'),(337,'wiz_design',NULL,'cate_menuh','카테고리 메뉴높이'),(338,'wiz_design',NULL,'main_img','메인이미지'),(339,'wiz_design',NULL,'main_width','메인이미지 가로크기'),(340,'wiz_design',NULL,'main_height','메인이미지 세로크기'),(341,'wiz_design',NULL,'main_link','메인이미지 링크주소'),(342,'wiz_design',NULL,'main_target','메인이미지 링크타겟'),(343,'wiz_design',NULL,'main_html','메인 HTML'),(344,'wiz_design',NULL,'notice_img','공지사항 이미지'),(345,'wiz_design',NULL,'notice_rows','공지사항 게시물수'),(346,'wiz_design',NULL,'notice_cut','공지사항 글자수제한'),(347,'wiz_design',NULL,'right_scroll','우측영역 따라다니기 사용여부'),(348,'wiz_design',NULL,'right_prdcnt','우측영역 상품갯수'),(349,'wiz_design',NULL,'right_starty','우측영역 세로좌표'),(350,'wiz_design',NULL,'topnavi_login_url','탑메뉴 로그인 주소'),(351,'wiz_design',NULL,'topnavi_logout_url','탑메뉴 로그아웃 주소'),(352,'wiz_design',NULL,'topnavi_join_url','탑메뉴 회원가입 주소'),(353,'wiz_design',NULL,'topnavi_myshop_url','탑메뉴 마이페이지 주소'),(354,'wiz_design',NULL,'topnavi01_url','탑메뉴1 주소'),(355,'wiz_design',NULL,'topnavi02_url','탑메뉴2 주소'),(356,'wiz_design',NULL,'topnavi03_url','탑메뉴3 주소'),(357,'wiz_design',NULL,'topnavi04_url','탑메뉴4 주소'),(358,'wiz_design',NULL,'topnavi05_url','탑메뉴5 주소'),(359,'wiz_design',NULL,'topnavi06_url','탑메뉴6 주소'),(360,'wiz_design',NULL,'topmenu01_url','상단메뉴1 주소'),(361,'wiz_design',NULL,'topmenu02_url','상단메뉴2 주소'),(362,'wiz_design',NULL,'topmenu03_url','상단메뉴3 주소'),(363,'wiz_design',NULL,'topmenu04_url','상단메뉴4 주소'),(364,'wiz_design',NULL,'topmenu05_url','상단메뉴5 주소'),(365,'wiz_design',NULL,'topmenu06_url','상단메뉴6 주소'),(366,'wiz_design',NULL,'topmenu07_url','상단메뉴7 주소'),(367,'wiz_design',NULL,'topmenu08_url','상단메뉴8 주소'),(368,'wiz_design',NULL,'topmenu09_url','상단메뉴9 주소'),(369,'wiz_design',NULL,'topmenu10_url','상단메뉴10 주소'),(370,'wiz_level','<b>회원등급 테이블</b>\r\n회원등급 테이블입니다.','anywiz',NULL),(371,'wiz_level',NULL,'idx','인덱스'),(372,'wiz_level',NULL,'level','등급레벨'),(373,'wiz_level',NULL,'icon','아이콘'),(374,'wiz_level',NULL,'name','등급명'),(375,'wiz_level',NULL,'distype','할인타입'),(376,'wiz_level',NULL,'discount','할인액'),(377,'wiz_level',NULL,'exp','설명'),(378,'wiz_mailsms','<b>이메일, SMS 메세지 설정 테이블</b>\r\n이메일, SMS 메세지 설정 테이블입니다.','anywiz',NULL),(379,'wiz_mailsms',NULL,'code','메세지 코드 '),(380,'wiz_mailsms',NULL,'subject','분류명'),(381,'wiz_mailsms',NULL,'sms_cust','SMS 고객 수신여부'),(382,'wiz_mailsms',NULL,'sms_oper','SMS 관리자 수신여부'),(383,'wiz_mailsms',NULL,'sms_msg','SMS 메세지'),(384,'wiz_mailsms',NULL,'email_subj','이메일 제목'),(385,'wiz_mailsms',NULL,'email_cust','이메일 고객 수신여부'),(386,'wiz_mailsms',NULL,'email_oper','이메일 관리자 수신여부'),(387,'wiz_mailsms',NULL,'email_msg','이메일 내용'),(388,'wiz_member','<b>회원 테이블</b>\r\n회원 테이블입니다.','anywiz',NULL),(389,'wiz_member',NULL,'id','아이디'),(390,'wiz_member',NULL,'passwd','비밀번호'),(391,'wiz_member',NULL,'name','이름'),(392,'wiz_member',NULL,'resno','주민등록번호'),(393,'wiz_member',NULL,'email','이메일'),(394,'wiz_member',NULL,'tphone','전화번호'),(395,'wiz_member',NULL,'hphone','휴대전화번호'),(396,'wiz_member',NULL,'fax','팩스번호'),(397,'wiz_member',NULL,'post','우편번호'),(398,'wiz_member',NULL,'address','주소'),(399,'wiz_member',NULL,'address2','상세주소'),(400,'wiz_member',NULL,'reemail','메일 수신여부'),(401,'wiz_member',NULL,'resms','SMS 수신여부'),(402,'wiz_member',NULL,'birthday','생년월일'),(403,'wiz_member',NULL,'bgubun','양력, 음력'),(404,'wiz_member',NULL,'marriage','결혼여부'),(405,'wiz_member',NULL,'memorial','결혼기념일'),(406,'wiz_member',NULL,'scholarship','학력'),(407,'wiz_member',NULL,'job','직업'),(408,'wiz_member',NULL,'income','월평균수입'),(409,'wiz_member',NULL,'car','자동자소유'),(410,'wiz_member',NULL,'consph','관심분야'),(411,'wiz_member',NULL,'conprd',''),(412,'wiz_member',NULL,'level','회원등급'),(413,'wiz_member',NULL,'recom','추천인'),(414,'wiz_member',NULL,'visit','방문수'),(415,'wiz_member',NULL,'visit_time','마지막 방문일'),(416,'wiz_member',NULL,'comment','관리자주석'),(417,'wiz_member',NULL,'com_num','사업자등록번호'),(418,'wiz_member',NULL,'com_name','상호'),(419,'wiz_member',NULL,'com_owner','대표자명'),(420,'wiz_member',NULL,'com_post','우편번호'),(421,'wiz_member',NULL,'com_address','주소'),(422,'wiz_member',NULL,'com_kind','업태'),(423,'wiz_member',NULL,'com_class','종목'),(424,'wiz_member',NULL,'wdate','가입일'),(425,'wiz_mycoupon','<b>쿠폰 발급내역 테이블</b>\r\n쿠폰 발급내역 테이블입니다.','anywiz',NULL),(426,'wiz_mycoupon',NULL,'idx','인덱스'),(427,'wiz_mycoupon',NULL,'memid','발급 아이디'),(428,'wiz_mycoupon',NULL,'eventidx','이벤트번호'),(429,'wiz_mycoupon',NULL,'prdcode','상품코드'),(430,'wiz_mycoupon',NULL,'coupon_name','쿠폰명'),(431,'wiz_mycoupon',NULL,'coupon_dis','할인액'),(432,'wiz_mycoupon',NULL,'coupon_type','할인타입'),(433,'wiz_mycoupon',NULL,'coupon_sdate','사용기간 시작일'),(434,'wiz_mycoupon',NULL,'coupon_edate','사용기간 종료일'),(435,'wiz_mycoupon',NULL,'coupon_use','사용여부'),(436,'wiz_mycoupon',NULL,'wdate','발급일'),(437,'wiz_operinfo','<b>운영정보설정 테이블</b>\r\n운영정보설정 테이블입니다.','anywiz',NULL),(438,'wiz_operinfo',NULL,'pay_method','결제방법'),(439,'wiz_operinfo',NULL,'pay_id','상점 아이디'),(440,'wiz_operinfo',NULL,'pay_key','상점 Key'),(441,'wiz_operinfo',NULL,'pay_account','은행계좌번호'),(442,'wiz_operinfo',NULL,'pay_agent','PG업체'),(443,'wiz_operinfo',NULL,'pay_escrow','에스크로 사용여부'),(444,'wiz_operinfo',NULL,'pay_test','테스트 결제 사용여부'),(445,'wiz_operinfo',NULL,'sms_type','SMS 종류'),(446,'wiz_operinfo',NULL,'sms_id','SMS 아이디'),(447,'wiz_operinfo',NULL,'sms_pw','SMS 비밀번호'),(448,'wiz_operinfo',NULL,'del_com','택배사'),(449,'wiz_operinfo',NULL,'del_trace','배송추적설정'),(450,'wiz_operinfo',NULL,'del_prd','상품별 배송정책(무료배송)'),(451,'wiz_operinfo',NULL,'del_prd2','상품별 배송정책(상품별 배송비)'),(452,'wiz_operinfo',NULL,'del_method','기본 배송정책'),(453,'wiz_operinfo',NULL,'del_fixprice','고정값'),(454,'wiz_operinfo',NULL,'del_staprice','구매가격별(금액)'),(455,'wiz_operinfo',NULL,'del_staprice2','구매가격별(이상 구매 시 택배비)'),(456,'wiz_operinfo',NULL,'del_staprice3','구매가격별(이하 구매 시 택배비)'),(457,'wiz_operinfo',NULL,'del_extrapost1','지역할증 우편번호1 시작번호'),(458,'wiz_operinfo',NULL,'del_extrapost12','지역할증 우편번호1 끝번호'),(459,'wiz_operinfo',NULL,'del_extraprice1','할증료1'),(460,'wiz_operinfo',NULL,'del_extrapost2','지역할증 우편번호2 시작번호'),(461,'wiz_operinfo',NULL,'del_extrapost22','지역할증 우편번호2 끝번호'),(462,'wiz_operinfo',NULL,'del_extraprice2','할증료2'),(463,'wiz_operinfo',NULL,'del_extrapost3','지역할증 우편번호3 시작번호'),(464,'wiz_operinfo',NULL,'del_extrapost32','지역할증 우편번호3 끝번호'),(465,'wiz_operinfo',NULL,'del_extraprice3','할증료3'),(466,'wiz_operinfo',NULL,'reserve_use','적립금 사용여부'),(467,'wiz_operinfo',NULL,'reserve_join','회원가입 적립금'),(468,'wiz_operinfo',NULL,'reserve_recom','추천인 적립금'),(469,'wiz_operinfo',NULL,'reserve_min','최소사용 적립금'),(470,'wiz_operinfo',NULL,'reserve_max','1회 최대사용 적립금'),(471,'wiz_operinfo',NULL,'reserve_buy','상품구매시 적립금'),(472,'wiz_operinfo',NULL,'reserve_per','적립금 일괄적용'),(473,'wiz_operinfo',NULL,'review_use','상품평 사용여부'),(474,'wiz_operinfo',NULL,'review_level','상품평 작성권한'),(475,'wiz_operinfo',NULL,'coupon_use','쿠폰 사용여부'),(476,'wiz_operinfo',NULL,'con_parameter','검색 키워드 분석 파라미터 '),(477,'wiz_operinfo',NULL,'prdimg_R','상품 목록이미지'),(478,'wiz_operinfo',NULL,'prdimg_S','상품 축소이미지'),(479,'wiz_operinfo',NULL,'prdimg_M','상품 상세이미지'),(480,'wiz_operinfo',NULL,'prdimg_L','상품 확대이미지'),(481,'wiz_operinfo',NULL,'tax_use','세금계산서 사용여부'),(482,'wiz_operinfo',NULL,'tax_status','세금계산서 발급시점'),(483,'wiz_option','<b>상품옵션 테이블</b>\r\n상품옵션 테이블입니다.','anywiz',NULL),(484,'wiz_option',NULL,'idx','인덱스'),(485,'wiz_option',NULL,'opttitle','옵션명'),(486,'wiz_option',NULL,'optcode','옵션항목'),(487,'wiz_order','<b>주문 테이블</b>\r\n주문 테이블입니다.','anywiz',NULL),(488,'wiz_order',NULL,'orderid','주문번호'),(489,'wiz_order',NULL,'send_id','주문자 아이디'),(490,'wiz_order',NULL,'send_name','주문자 이름'),(491,'wiz_order',NULL,'send_tphone','주문자 전화번호'),(492,'wiz_order',NULL,'send_hphone','주문자 휴대전화번호'),(493,'wiz_order',NULL,'send_email','주문자 이메일'),(494,'wiz_order',NULL,'send_post','주문자 우편번호'),(495,'wiz_order',NULL,'send_address','주문자 주소'),(496,'wiz_order',NULL,'demand','요청사항'),(497,'wiz_order',NULL,'message','메세지'),(498,'wiz_order',NULL,'cancelmsg','주문취소 사유'),(499,'wiz_order',NULL,'rece_name','수취인 이름'),(500,'wiz_order',NULL,'rece_tphone','수취인 전화번호'),(501,'wiz_order',NULL,'rece_hphone','수취인 휴대전화번호'),(502,'wiz_order',NULL,'rece_post','수취인 우편번호'),(503,'wiz_order',NULL,'rece_address','수취인 주소'),(504,'wiz_order',NULL,'pay_method','결제방법'),(505,'wiz_order',NULL,'account_name','입금자명'),(506,'wiz_order',NULL,'account','입금계좌번호'),(507,'wiz_order',NULL,'coupon_use','쿠폰 사용 금액'),(508,'wiz_order',NULL,'coupon_idx','쿠폰 번호'),(509,'wiz_order',NULL,'reserve_use','적립금 사용 금액'),(510,'wiz_order',NULL,'reserve_price','적립금'),(511,'wiz_order',NULL,'deliver_method','배송방법'),(512,'wiz_order',NULL,'deliver_price','배송비'),(513,'wiz_order',NULL,'deliver_num','운송장번호'),(514,'wiz_order',NULL,'deliver_date','발송일자'),(515,'wiz_order',NULL,'discount_price','회원할인금액'),(516,'wiz_order',NULL,'prd_price','상품금액'),(517,'wiz_order',NULL,'total_price','총 결제금액'),(518,'wiz_order',NULL,'status','주문상태'),(519,'wiz_order',NULL,'order_date','주문일'),(520,'wiz_order',NULL,'pay_date','결제일'),(521,'wiz_order',NULL,'send_date','배송일'),(522,'wiz_order',NULL,'cancel_date','취소일'),(523,'wiz_order',NULL,'descript','관리자메모'),(524,'wiz_order',NULL,'tno','거래번호'),(525,'wiz_order',NULL,'escrow_check','에스크로 여부'),(526,'wiz_order',NULL,'escrow_stats','에스크로 상태'),(527,'wiz_order',NULL,'tax_type','세금계산서 발행여부'),(528,'wiz_page','<b>페이지 테이블</b>\r\n페이지 테이블입니다.','anywiz',NULL),(529,'wiz_page',NULL,'idx','인덱스'),(530,'wiz_page',NULL,'type','페이지 타입'),(531,'wiz_page',NULL,'subimg','상단이미지'),(532,'wiz_page',NULL,'content','내용'),(533,'wiz_page',NULL,'content2','내용2'),(534,'wiz_page',NULL,'addinfo','추가정보1'),(535,'wiz_page',NULL,'addinfo2','추가정보2'),(536,'wiz_poll','<b>설문조사 테이블</b>\r\n설문조사 테이블입니다.','anywiz',NULL),(537,'wiz_poll',NULL,'idx','인덱스'),(538,'wiz_poll',NULL,'code','설문코드'),(539,'wiz_poll',NULL,'polluse','진행여부'),(540,'wiz_poll',NULL,'pollmain','메인추출여부'),(541,'wiz_poll',NULL,'sdate','진행시작일'),(542,'wiz_poll',NULL,'edate','진행종료일'),(543,'wiz_poll',NULL,'apermi','참여 권한 '),(544,'wiz_poll',NULL,'cpermi','코멘트작성 권한 '),(545,'wiz_poll',NULL,'subject','설문명 '),(546,'wiz_poll',NULL,'content','설문내용 '),(547,'wiz_poll',NULL,'wdate','작성일 '),(548,'wiz_poll',NULL,'cnt','참여자수 '),(549,'wiz_polldata','<b>설문내용 테이블</b>\r\n설문내용 테이블입니다.','anywiz',NULL),(550,'wiz_polldata',NULL,'idx','인덱스'),(551,'wiz_polldata',NULL,'pidx','설문조사 번호 '),(552,'wiz_polldata',NULL,'question','질문 '),(553,'wiz_polldata',NULL,'answer01','답변1 '),(554,'wiz_polldata',NULL,'count01','참여자수1 '),(555,'wiz_polldata',NULL,'answer02','답변2'),(556,'wiz_polldata',NULL,'count02','참여자수2'),(557,'wiz_polldata',NULL,'answer03','답변3'),(558,'wiz_polldata',NULL,'count03','참여자수3'),(559,'wiz_polldata',NULL,'answer04','답변4'),(560,'wiz_polldata',NULL,'count04','참여자수4'),(561,'wiz_polldata',NULL,'answer05','답변5'),(562,'wiz_polldata',NULL,'count05','참여자수5'),(563,'wiz_polldata',NULL,'answer06','답변6'),(564,'wiz_polldata',NULL,'count06','참여자수6'),(565,'wiz_polldata',NULL,'answer07','답변7'),(566,'wiz_polldata',NULL,'count07','참여자수7'),(567,'wiz_polldata',NULL,'answer08','답변8'),(568,'wiz_polldata',NULL,'count08','참여자수8'),(569,'wiz_polldata',NULL,'answer09','답변9'),(570,'wiz_polldata',NULL,'count09','참여자수9'),(571,'wiz_polldata',NULL,'answer10','답변10'),(572,'wiz_polldata',NULL,'count10','참여자수10'),(573,'wiz_pollinfo','<b>설문조사 정보 테이블</b>\r\n설문조사 정보 테이블입니다.','anywiz',NULL),(574,'wiz_pollinfo',NULL,'code','  설문코드  '),(575,'wiz_pollinfo',NULL,'title','설문명'),(576,'wiz_pollinfo',NULL,'titleimg','상단이미지'),(577,'wiz_pollinfo',NULL,'header','상단파일'),(578,'wiz_pollinfo',NULL,'footer','하단파일'),(579,'wiz_pollinfo',NULL,'lpermi','목록보기 권한'),(580,'wiz_pollinfo',NULL,'rpermi','내용보기 권한'),(581,'wiz_pollinfo',NULL,'apermi','설문참여 권한'),(582,'wiz_pollinfo',NULL,'cpermi','코멘트쓰기 권한'),(583,'wiz_pollinfo',NULL,'skin','스킨'),(584,'wiz_pollinfo',NULL,'permsg','권한이 없을 경우 경고 메세지 '),(585,'wiz_pollinfo',NULL,'perurl','권한이 없을 경우 이동페이지 '),(586,'wiz_pollinfo',NULL,'mainskin','메인추출 스킨 '),(587,'wiz_pollinfo',NULL,'purl','연결페이지 '),(588,'wiz_pollinfo',NULL,'usetype','사용여부'),(589,'wiz_pollinfo',NULL,'spam_check','스팸글체크기능 사용여부'),(590,'wiz_pollinfo',NULL,'datetype_list','날짜형식(목록페이지) '),(591,'wiz_pollinfo',NULL,'datetype_view','날짜형식(보기페이지) '),(592,'wiz_pollinfo',NULL,'comment','코멘트 사용여부 '),(593,'wiz_pollinfo',NULL,'rows','페이지 출력수 '),(594,'wiz_pollinfo',NULL,'lists','리스트 출력수 '),(595,'wiz_pollinfo',NULL,'newc','NEW 기간설정 '),(596,'wiz_pollinfo',NULL,'subject_len','제목 글자수 '),(597,'wiz_pollinfo',NULL,'abuse','욕설,비방글 필터링 사용여부  '),(598,'wiz_pollinfo',NULL,'abtxt','욕설,비방글 필터링 내용 '),(599,'wiz_pollinfo',NULL,'wdate','작성일 '),(600,'wiz_prdmain','<b>상품 메인추출 테이블</b>\r\n상품 메인추출테이블입니다.','anywiz',NULL),(601,'wiz_prdmain',NULL,'idx','인덱스'),(602,'wiz_prdmain',NULL,'type','상품그룹'),(603,'wiz_prdmain',NULL,'typename','상품그룹명'),(604,'wiz_prdmain',NULL,'isuse','사용여부'),(605,'wiz_prdmain',NULL,'prior','진열순서'),(606,'wiz_prdmain',NULL,'skin_type','정렬방식'),(607,'wiz_prdmain',NULL,'prd_num','전체상품수'),(608,'wiz_prdmain',NULL,'prd_row','가로상품수'),(609,'wiz_prdmain',NULL,'prd_width','상품 가로사이즈'),(610,'wiz_prdmain',NULL,'prd_height','상품 세로사이즈'),(611,'wiz_prdmain',NULL,'barimg','바이미지'),(612,'wiz_prdmain',NULL,'html','이벤트'),(613,'wiz_prdrelation','<b>관련상품 테이블</b>\r\n관련상품 테이블입니다.','anywiz',NULL),(614,'wiz_prdrelation',NULL,'idx','인덱스'),(615,'wiz_prdrelation',NULL,'prdcode','상품코드'),(616,'wiz_prdrelation',NULL,'relcode','관련상품코드'),(617,'wiz_product','<b>상품 테이블</b>\r\n상품 테이블입니다.','anywiz',NULL),(618,'wiz_product',NULL,'prdcode','상품코드'),(619,'wiz_product',NULL,'prdname','상품명'),(620,'wiz_product',NULL,'prdcom','제조사'),(621,'wiz_product',NULL,'origin','원산지'),(622,'wiz_product',NULL,'showset','진열여부'),(623,'wiz_product',NULL,'stock','재고'),(624,'wiz_product',NULL,'savestock','안전재고'),(625,'wiz_product',NULL,'prior','우선순위'),(626,'wiz_product',NULL,'viewcnt','조회수'),(627,'wiz_product',NULL,'deimgcnt','상세이미지 조회수'),(628,'wiz_product',NULL,'basketcnt','장바구니 담긴건수'),(629,'wiz_product',NULL,'ordercnt','주문건수'),(630,'wiz_product',NULL,'cancelcnt','주문취소 건수'),(631,'wiz_product',NULL,'comcnt','배송완료 건수'),(632,'wiz_product',NULL,'sellprice','판매가'),(633,'wiz_product',NULL,'conprice','정가'),(634,'wiz_product',NULL,'reserve','적립금'),(635,'wiz_product',NULL,'strprice','가격대체문구'),(636,'wiz_product',NULL,'new','신상품'),(637,'wiz_product',NULL,'best','베스트상품'),(638,'wiz_product',NULL,'popular','인기상품'),(639,'wiz_product',NULL,'recom','추천상품'),(640,'wiz_product',NULL,'sale','세일상품'),(641,'wiz_product',NULL,'shortage','재고량(품절, 무제한, 재고수량)'),(642,'wiz_product',NULL,'coupon_use','쿠폰사용'),(643,'wiz_product',NULL,'coupon_dis','쿠폰할인액'),(644,'wiz_product',NULL,'coupon_type','쿠폰할인타입'),(645,'wiz_product',NULL,'coupon_amount','쿠폰수량'),(646,'wiz_product',NULL,'coupon_limit','쿠폰수량제한여부'),(647,'wiz_product',NULL,'coupon_sdate','쿠폰기간 시작일'),(648,'wiz_product',NULL,'coupon_edate','쿠폰기간 종료일'),(649,'wiz_product',NULL,'del_type','배송방법'),(650,'wiz_product',NULL,'del_price','배송비'),(651,'wiz_product',NULL,'prdicon','상품아이콘'),(652,'wiz_product',NULL,'prefer','선호도'),(653,'wiz_product',NULL,'brand','브랜드'),(654,'wiz_product',NULL,'info_use','상품정보 사용여부'),(655,'wiz_product',NULL,'info_name1','상품정보 이름1'),(656,'wiz_product',NULL,'info_value1','상품정보 내용1'),(657,'wiz_product',NULL,'info_name2','상품정보 이름2'),(658,'wiz_product',NULL,'info_value2','상품정보 내용2'),(659,'wiz_product',NULL,'info_name3','상품정보 이름3'),(660,'wiz_product',NULL,'info_value3','상품정보 내용3'),(661,'wiz_product',NULL,'info_name4','상품정보 이름4'),(662,'wiz_product',NULL,'info_value4','상품정보 내용4'),(663,'wiz_product',NULL,'info_name5','상품정보 이름5'),(664,'wiz_product',NULL,'info_value5','상품정보 내용5'),(665,'wiz_product',NULL,'info_name6','상품정보 이름6'),(666,'wiz_product',NULL,'info_value6','상품정보 내용6'),(667,'wiz_product',NULL,'opt_use','가격/재고 옵션 사용여부'),(668,'wiz_product',NULL,'opttitle','옵션명1'),(669,'wiz_product',NULL,'optcode','옵션내용1'),(670,'wiz_product',NULL,'opttitle2','옵션명2'),(671,'wiz_product',NULL,'optcode2','옵션내용2'),(672,'wiz_product',NULL,'opttitle3','옵션명3'),(673,'wiz_product',NULL,'optcode3','옵션내용3'),(674,'wiz_product',NULL,'opttitle4','옵션명4'),(675,'wiz_product',NULL,'optcode4','옵션내용4'),(676,'wiz_product',NULL,'opttitle5','옵션명5'),(677,'wiz_product',NULL,'optcode5','옵션내용5'),(678,'wiz_product',NULL,'opttitle6','옵션명6'),(679,'wiz_product',NULL,'optcode6','옵션내용6'),(680,'wiz_product',NULL,'opttitle7','옵션명7'),(681,'wiz_product',NULL,'optcode7','옵션내용7'),(682,'wiz_product',NULL,'optvalue','옵션값'),(683,'wiz_product',NULL,'prdimg_R','상품목록 이미지'),(684,'wiz_product',NULL,'prdimg_L1','확대 이미지1'),(685,'wiz_product',NULL,'prdimg_M1','제품상세 이미지1'),(686,'wiz_product',NULL,'prdimg_S1','축소 이미지1'),(687,'wiz_product',NULL,'prdimg_L2','확대 이미지2'),(688,'wiz_product',NULL,'prdimg_M2','제품상세 이미지2'),(689,'wiz_product',NULL,'prdimg_S2','축소 이미지2'),(690,'wiz_product',NULL,'prdimg_L3','확대 이미지3'),(691,'wiz_product',NULL,'prdimg_M3','제품상세 이미지3'),(692,'wiz_product',NULL,'prdimg_S3','축소 이미지3'),(693,'wiz_product',NULL,'prdimg_L4','확대 이미지4'),(694,'wiz_product',NULL,'prdimg_M4','제품상세 이미지4'),(695,'wiz_product',NULL,'prdimg_S4','축소 이미지4'),(696,'wiz_product',NULL,'prdimg_L5','확대 이미지5'),(697,'wiz_product',NULL,'prdimg_M5','제품상세 이미지5'),(698,'wiz_product',NULL,'prdimg_S5','축소 이미지5'),(699,'wiz_product',NULL,'searchkey','검색어'),(700,'wiz_product',NULL,'stortexp','관리자주석'),(701,'wiz_product',NULL,'content','상세설명'),(702,'wiz_product',NULL,'wdate','등록일'),(703,'wiz_product',NULL,'mdate','수정일'),(704,'wiz_reserve','<b>적립금 테이블</b>\r\n적립금 테이블입니다.','anywiz',NULL),(705,'wiz_reserve',NULL,'idx','인덱스'),(706,'wiz_reserve',NULL,'memid','회원 아이디'),(707,'wiz_reserve',NULL,'reservemsg','적립금 내용'),(708,'wiz_reserve',NULL,'reserve','적립금'),(709,'wiz_reserve',NULL,'orderid','주문번호'),(710,'wiz_reserve',NULL,'wdate','적립일'),(711,'wiz_shopinfo','<b>쇼핑몰 정보 테이블</b>\r\n쇼핑몰 정보 테이블입니다.','anywiz',NULL),(712,'wiz_shopinfo',NULL,'shop_name','쇼핑몰 이름'),(713,'wiz_shopinfo',NULL,'shop_url','쇼핑몰 주소'),(714,'wiz_shopinfo',NULL,'shop_email','관리자 이메일'),(715,'wiz_shopinfo',NULL,'shop_tel','관리자 전화번호'),(716,'wiz_shopinfo',NULL,'shop_hand','관리자 휴대전화번호'),(717,'wiz_shopinfo',NULL,'site_key','라이센스키'),(718,'wiz_shopinfo',NULL,'site_date','설치일'),(719,'wiz_shopinfo',NULL,'designer_id','디자이너 아이디'),(720,'wiz_shopinfo',NULL,'designer_pw','디자이너 비밀번호'),(721,'wiz_shopinfo',NULL,'anywiz_id','애니위즈 아이디'),(722,'wiz_shopinfo',NULL,'anywiz_pw','애니위즈 비밀번호'),(723,'wiz_shopinfo',NULL,'admin_title','관리자 타이틀'),(724,'wiz_shopinfo',NULL,'admin_footer','관리자 카피라잇'),(725,'wiz_shopinfo',NULL,'com_num','사업자등록번호'),(726,'wiz_shopinfo',NULL,'com_name','상호'),(727,'wiz_shopinfo',NULL,'com_owner','대표자명'),(728,'wiz_shopinfo',NULL,'com_post','우편번호'),(729,'wiz_shopinfo',NULL,'com_address','주소'),(730,'wiz_shopinfo',NULL,'com_kind','업태'),(731,'wiz_shopinfo',NULL,'com_class','종목'),(732,'wiz_shopinfo',NULL,'com_tel','전화번호'),(733,'wiz_shopinfo',NULL,'com_fax','팩스번호'),(734,'wiz_shopinfo',NULL,'start_page','관리자 로그인 후 이동페이지'),(735,'wiz_shopinfo',NULL,'sch_use','일정관리 사용여부'),(736,'wiz_shopinfo',NULL,'poll_use','설문관리 사용여부'),(737,'wiz_shopinfo',NULL,'design_use','디자인관리 사용여부'),(738,'wiz_shopinfo',NULL,'addbbs_use','게시판추가 사용여부'),(739,'wiz_shopinfo',NULL,'sms_use','SMS 사용여부'),(740,'wiz_shopinfo',NULL,'namecheck_use','실명인증 사용여부'),(741,'wiz_shopinfo',NULL,'namecheck_id','실명인증 아이디'),(742,'wiz_shopinfo',NULL,'namecheck_pw','실명인증 비밀번호'),(743,'wiz_shopinfo',NULL,'estimate_use','견적서 사용여부'),(744,'wiz_shopinfo',NULL,'estimate_bigo','견적서 비고내용'),(745,'wiz_shopinfo',NULL,'ssl_use','SSL 사용여부'),(746,'wiz_shopinfo',NULL,'ssl_port','SSL 포트번호'),(747,'wiz_tax','<b>세금계산서 테이블</b>\r\n세금계산서 테이블입니다.','anywiz',NULL),(748,'wiz_tax',NULL,'orderid','주문번호'),(749,'wiz_tax',NULL,'com_num','사업자등록번호'),(750,'wiz_tax',NULL,'com_name','상호'),(751,'wiz_tax',NULL,'com_owner','대표자명'),(752,'wiz_tax',NULL,'com_address','주소'),(753,'wiz_tax',NULL,'com_kind','업태'),(754,'wiz_tax',NULL,'com_class','종목'),(755,'wiz_tax',NULL,'com_tel','전화번호'),(756,'wiz_tax',NULL,'com_email','이메일'),(757,'wiz_tax',NULL,'shop_num','쇼핑몰 사업자등록번호'),(758,'wiz_tax',NULL,'shop_name','쇼핑몰 상호'),(759,'wiz_tax',NULL,'shop_owner','쇼핑몰 대표자명'),(760,'wiz_tax',NULL,'shop_address','쇼핑몰 주소'),(761,'wiz_tax',NULL,'shop_kind','쇼핑몰 업태'),(762,'wiz_tax',NULL,'shop_class','쇼핑몰 종목'),(763,'wiz_tax',NULL,'shop_tel','쇼핑몰 전화번호'),(764,'wiz_tax',NULL,'shop_email','쇼핑몰 이메일'),(765,'wiz_tax',NULL,'prd_info','상품정보'),(766,'wiz_tax',NULL,'supp_price','공급가액'),(767,'wiz_tax',NULL,'tax_price','세액'),(768,'wiz_tax',NULL,'tax_pub','승인여부'),(769,'wiz_tax',NULL,'tax_date','작성일'),(770,'wiz_tax',NULL,'wdate','승인일'),(771,'wiz_tradecom','<b>거래처 테이블</b>\r\n거래처 테이블입니다.','anywiz',NULL),(772,'wiz_tradecom',NULL,'idx','인덱스'),(773,'wiz_tradecom',NULL,'com_type','업체구분'),(774,'wiz_tradecom',NULL,'com_num','사업자등록번호'),(775,'wiz_tradecom',NULL,'com_name','상호'),(776,'wiz_tradecom',NULL,'com_owner','대표자'),(777,'wiz_tradecom',NULL,'com_post','우편번호'),(778,'wiz_tradecom',NULL,'com_address','주소'),(779,'wiz_tradecom',NULL,'com_kind','업태'),(780,'wiz_tradecom',NULL,'com_class','종목'),(781,'wiz_tradecom',NULL,'com_tel','전화번호'),(782,'wiz_tradecom',NULL,'com_fax','팩스번호'),(783,'wiz_tradecom',NULL,'com_bank','거래은행'),(784,'wiz_tradecom',NULL,'com_account','계좌번호'),(785,'wiz_tradecom',NULL,'com_homepage','홈페이지'),(786,'wiz_tradecom',NULL,'charge_name','담당자명'),(787,'wiz_tradecom',NULL,'charge_email','담당자 이메일'),(788,'wiz_tradecom',NULL,'charge_hand','담당자 휴대전화번호'),(789,'wiz_tradecom',NULL,'charge_tel','담당자 전화번호'),(790,'wiz_tradecom',NULL,'descript','기타사항'),(791,'wiz_wishlist','<b>관심상품 테이블</b>\r\n관심상품 테이블입니다.','anywiz',NULL),(792,'wiz_wishlist',NULL,'idx','인덱스'),(793,'wiz_wishlist',NULL,'memid','회원 아이디'),(794,'wiz_wishlist',NULL,'prdcode','상품코드'),(795,'wiz_wishlist',NULL,'opttitle','옵션명1'),(796,'wiz_wishlist',NULL,'optcode','옵션내용1'),(797,'wiz_wishlist',NULL,'opttitle2','옵션명2'),(798,'wiz_wishlist',NULL,'optcode2','옵션내용2'),(799,'wiz_wishlist',NULL,'opttitle3','옵션명3'),(800,'wiz_wishlist',NULL,'optcode3','옵션내용3'),(801,'wiz_wishlist',NULL,'opttitle4','옵션명4'),(802,'wiz_wishlist',NULL,'optcode4','옵션내용4'),(803,'wiz_wishlist',NULL,'opttitle5','옵션명5'),(804,'wiz_wishlist',NULL,'optcode5','옵션내용5'),(805,'wiz_wishlist',NULL,'opttitle6','옵션명6'),(806,'wiz_wishlist',NULL,'optcode6','옵션내용6'),(807,'wiz_wishlist',NULL,'opttitle7','옵션명7'),(808,'wiz_wishlist',NULL,'optcode7','옵션내용7'),(809,'wiz_wishlist',NULL,'amount','수량'),(810,'wiz_wishlist',NULL,'wdate','등록일'),(811,'','','anywiz',NULL),(812,'wiz_filedesc','<b>파일구조 테이블</b>\r\n파일구조 테이블입니다.','anywiz',NULL),(813,'wiz_filedesc',NULL,'idx','인덱스'),(814,'wiz_filedesc',NULL,'fdir','파일경로'),(815,'wiz_filedesc',NULL,'fdesc','파일설명'),(816,'wiz_operinfo',NULL,'prdrel_use','관련상품 사용여부'),(817,'wiz_shopinfo',NULL,'up_date','최종 업데이트 날짜'),(818,'','','anywiz',NULL);
/*!40000 ALTER TABLE `wiz_tabledesc` ENABLE KEYS */;

--
-- Table structure for table `wiz_tax`
--

DROP TABLE IF EXISTS `wiz_tax`;
CREATE TABLE `wiz_tax` (
  `orderid` varchar(20) NOT NULL default '',
  `com_num` varchar(20) default NULL,
  `com_name` varchar(30) default NULL,
  `com_owner` varchar(20) default NULL,
  `com_address` varchar(80) default NULL,
  `com_kind` varchar(50) default NULL,
  `com_class` varchar(50) default NULL,
  `com_tel` varchar(14) default NULL,
  `com_email` varchar(50) default NULL,
  `shop_num` varchar(20) default NULL,
  `shop_name` varchar(30) default NULL,
  `shop_owner` varchar(20) default NULL,
  `shop_address` varchar(80) default NULL,
  `shop_kind` varchar(50) default NULL,
  `shop_class` varchar(50) default NULL,
  `shop_tel` varchar(14) default NULL,
  `shop_email` varchar(50) default NULL,
  `prd_info` mediumtext,
  `supp_price` int(11) default NULL,
  `tax_price` int(11) default NULL,
  `tax_pub` enum('Y','N') default NULL,
  `tax_date` date default NULL,
  `wdate` datetime default NULL,
  PRIMARY KEY  (`orderid`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_tax`
--

/*!40000 ALTER TABLE `wiz_tax` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiz_tax` ENABLE KEYS */;

--
-- Table structure for table `wiz_tradecom`
--

DROP TABLE IF EXISTS `wiz_tradecom`;
CREATE TABLE `wiz_tradecom` (
  `idx` int(10) NOT NULL auto_increment,
  `com_type` enum('BUY','SAL','DEL','OTH') default NULL,
  `com_num` varchar(20) default NULL,
  `com_name` varchar(30) default NULL,
  `com_owner` varchar(20) default NULL,
  `com_post` varchar(7) default NULL,
  `com_address` varchar(80) default NULL,
  `com_kind` varchar(50) default NULL,
  `com_class` varchar(50) default NULL,
  `com_tel` varchar(14) default NULL,
  `com_fax` varchar(14) default NULL,
  `com_bank` varchar(20) default NULL,
  `com_account` varchar(25) default NULL,
  `com_homepage` varchar(50) default NULL,
  `charge_name` varchar(20) default NULL,
  `charge_email` varchar(50) default NULL,
  `charge_hand` varchar(14) default NULL,
  `charge_tel` varchar(14) default NULL,
  `descript` mediumtext,
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=4;

--
-- Dumping data for table `wiz_tradecom`
--

/*!40000 ALTER TABLE `wiz_tradecom` DISABLE KEYS */;
INSERT INTO `wiz_tradecom` VALUES (3,'BUY','000-00-000000','쇼핑몰','대표자','000-000','서울 OO구 OO동 OO번지 OO빌딩','서비스','프로그램개발','000-0000-0000','000-0000-0000','OO은행','000-00-00000','http://test.com','담당자','test@test.com','000-0000-00000','00-0000-0000','');
/*!40000 ALTER TABLE `wiz_tradecom` ENABLE KEYS */;

--
-- Table structure for table `wiz_wishlist`
--

DROP TABLE IF EXISTS `wiz_wishlist`;
CREATE TABLE `wiz_wishlist` (
  `idx` int(10) NOT NULL auto_increment,
  `memid` varchar(20) default NULL,
  `prdcode` varchar(10) default NULL,
  `opttitle` varchar(50) default NULL,
  `optcode` varchar(50) default NULL,
  `opttitle2` varchar(50) default NULL,
  `optcode2` varchar(50) default NULL,
  `opttitle3` varchar(50) default NULL,
  `optcode3` varchar(50) default NULL,
  `opttitle4` varchar(50) default NULL,
  `optcode4` mediumtext,
  `opttitle5` varchar(50) default NULL,
  `optcode5` mediumtext,
  `opttitle6` varchar(50) default NULL,
  `optcode6` mediumtext,
  `opttitle7` varchar(50) default NULL,
  `optcode7` mediumtext,
  `amount` int(5) default NULL,
  `wdate` date default NULL,
  PRIMARY KEY  (`idx`),
  KEY `memid` (`memid`)
) TYPE=MyISAM;

--
-- Dumping data for table `wiz_wishlist`
--

/*!40000 ALTER TABLE `wiz_wishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `wiz_wishlist` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


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
INSERT INTO `wiz_admin` VALUES ('admin','1234','������','761001-1000004','admin@oneday.com','02-0000-0000','010-0000-0000','0000-00','����Ư���� OO�� OO�� OO����','OO���� OOȣ',0,'01-00/01-01/01-02/01-03/01-04/01-05/01-06/01-07/01-08/01-09/03-00/03-01/03-02/03-03/03-04/03-05/03-06/03-07/03-08/03-09/05-00/05-01/05-02/05-03/05-04/05-05/05-06/05-07/05-08/05-09/05-10/05-11/05-12/06-00/06-01/06-02/06-03/06-04/06-05/06-06/07-00/07-01/07-02/07-03/07-04/07-05/08-00/08-01/08-03/08-02/','2011-02-23 14:52:47','2006-08-18 10:00:58','');
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
INSERT INTO `wiz_bannerinfo` VALUES (1,'�','banner_01','H',1,'Y'),(2,'�','banner_02','H',4,'Y'),(3,'�','banner_03','W',3,'N'),(4,'�','banner_04','H',2,'N'),(5,'�','banner_05','H',1,'N');
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
INSERT INTO `wiz_basket` VALUES (78,'110222111038556','1102090001','��ī��','1102090001_R.jpg',35000,3000,'','','','','������','88^5000^0^15^1^15','','','����','���^0^0^15^1^15','','','','',1,'2011-02-22 11:11:26','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',0);
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
) TYPE=MyISAM COMMENT='wizshop ?�바구니 ?�시';

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
INSERT INTO `wiz_bbs` VALUES (62,'','notice',3,3,0,0,'','','admin','admin','������','admin@oneday.com','','','','','���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ','���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ','','','','','','H','','','','','','','','','','','','','','','','','','','','','','','','','','','','','2934',12,6,0,'211.237.17.249',1297250974,''),(63,'','notice',4,4,0,0,'','','admin','admin','������','admin@oneday.com','','','','','���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ','���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ','','','','','','H','','','','','','','','','','','','','','','','','','','','','','','','','','','','','2939',12,6,0,'211.237.17.249',1297250979,''),(64,'','notice',5,5,0,0,'','','admin','admin','������','admin@oneday.com','','','','','���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ','���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ','','','','','','H','','','','','','','','','','','','','','','','','','','','','','','','','','','','','2942',25,6,0,'211.237.17.249',1297250982,''),(67,'1102090001','talk',1,66,1,0,'','','test','test,test','�׽�Ʈ','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'61.77.81.194',1297509668,''),(68,'1102090001','talk',3,3,0,5,'','','test','test','�׽�Ʈ','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752564,''),(69,'1102090001','talk',4,4,0,5,'','','test','test','�׽�Ʈ','','','','','','','123123','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752568,''),(70,'1102090001','talk',5,5,0,5,'','','test','test','�׽�Ʈ','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752571,''),(71,'1102090001','talk',6,6,0,5,'','','test','test','�׽�Ʈ','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752573,''),(72,'1102090001','talk',7,7,0,5,'','','test','test','�׽�Ʈ','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752574,''),(73,'1102090001','talk',8,8,0,5,'','','test','test','�׽�Ʈ','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752575,''),(74,'1102090001','talk',9,9,0,5,'','','test','test','�׽�Ʈ','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752576,''),(75,'1102090001','talk',10,10,0,5,'','','test','test','�׽�Ʈ','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752576,''),(76,'1102090001','talk',11,11,0,5,'','','test','test','�׽�Ʈ','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752577,''),(77,'1102090001','talk',12,12,0,5,'','','test','test','�׽�Ʈ','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752578,''),(78,'1102090001','talk',13,13,0,5,'','','test','test','�׽�Ʈ','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752579,''),(79,'1102090001','talk',14,14,0,5,'','','test','test','�׽�Ʈ','','','','','','','1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752581,''),(80,'1102090001','talk',15,15,0,5,'','','test','test','�׽�Ʈ','','','','','','','123123123','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752582,''),(81,'1102090001','talk',16,16,0,5,'','','test','test','�׽�Ʈ','','','','','','','1231231','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752583,''),(82,'1102090001','talk',17,17,0,5,'','','test','test','�׽�Ʈ','','','','','','','123123','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752585,''),(83,'1102090001','talk',18,18,0,5,'','','test','test','�׽�Ʈ','','','','','','','123123123','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752586,''),(84,'1102090001','talk',19,19,0,5,'','','test','test','�׽�Ʈ','','','','','','','123123123','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752587,''),(85,'1102090001','talk',20,20,0,5,'','','test','test','�׽�Ʈ','','','','','','','123123123','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752589,''),(86,'1102090001','talk',21,21,0,5,'','','test','test','�׽�Ʈ','','','','','','','123123123','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'211.237.17.249',1297752591,''),(66,'1102090001','talk',2,1,0,5,'','','test','test,test','�׽�Ʈ','','','','','','','test','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','test',0,0,0,'61.77.81.194',1297509665,''),(61,'','notice',2,2,0,0,'','','admin','admin','������','admin@oneday.com','','','','','���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ','���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ','','','','','','H','','','','','','','','','','','','','','','','','','','','','','','','','','','','','2927',11,6,0,'211.237.17.249',1297250967,''),(60,'','notice',1,1,0,0,'','','admin','admin','������','admin@oneday.com','','','','','���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ','���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ ���������׽�Ʈ','','','','','','H','','','','','','','','','','','','','','','','','','','','','','','','','','','','','2841',8,6,0,'211.237.17.249',1297250921,'');
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
INSERT INTO `wiz_bbscat` VALUES (17,'','faq','주문/결�','0902020408473_img.gif','0902020408473_img_over.gif',''),(6,'A','photo','','','',''),(9,'A','qna','','','',''),(16,'A','notice','','','',''),(18,'','faq','배�','0902020409046_img.gif','0902020409046_img_over.gif',''),(19,'','faq','�','0902020409219_img.gif','0902020409219_img_over.gif',''),(20,'','faq','','0902020409392_img.gif','0902020409392_img_over.gif',''),(21,'','faq','기�','0902020410002_img.gif','0902020410002_img_over.gif',''),(23,'A','talk','','','',''),(24,'A','event','','','',''),(25,'A','resell','','','',''),(26,'A','family','','','',''),(27,'A','blog','','','',''),(28,'A','reco','��ü','','',''),(29,'A','center','��ü','','','');
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
INSERT INTO `wiz_bbsinfo` VALUES ('notice','BBS','��������','','','','','','','','','','','','','bbsBasic','������ �����ϴ�.','','','Y','Y','','Y','Y','Y','','','Y','','',120,500,20,5,2,600,4,0,'LEFT','N','Y','N'),('schedule','SCH','����','','','','','','','','','','','','%y.%m.%d','scheduleBasic','������ �����ϴ�.','','','N','Y','','Y','Y','Y','','','N','','',120,500,0,0,0,0,0,0,'LEFT','Y','Y',NULL),('talk','BBS','��ũ','','','','','','','','26','26','26','%Y-%m-%d %H:%i','%Y-%m-%d %H:%i','bbsBasic','�α����� �ϼž� �մϴ�.','','','N','Y','','Y','N','N','','','N','','',120,500,20,5,2,600,10,40,'LEFT','N','Y','N'),('reco','BBS','��õ�ϱ�','','','','','','0','0','','0','0','','','formBasic','�α����� �ϼž� �մϴ�.','/','','N','Y','','Y','N','N','','','N','','',120,500,20,5,2,600,4,0,'LEFT','N','Y','N'),('center','BBS','������','','','','','','','','','','','','','formBasic','������ �����ϴ�.','','','N','Y','','Y','N','N','','','N','','',120,500,20,5,2,600,4,0,'LEFT','N','Y','N');
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
INSERT INTO `wiz_brand` VALUES (2,1,'','','0901070433338_brd.gif','0901070433338_brd_over.gif','�','HTM',20,'','','Y'),(3,2,'','','','','','NON',20,'200','250','N');
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
INSERT INTO `wiz_category` VALUES ('100000',1,1,0,0,'','','','','','NON','',20,'','','N','',0),('110000',1,2,0,0,'','','','','','NON','',20,'','','N','',0),('120000',1,3,0,0,'','','','','','NON','',20,'','','N','',0),('130000',1,4,0,0,'�','','','','','NON','',20,'','','N','',0),('140000',1,5,0,0,'','','','','','NON','',20,'','','N','',0),('150000',1,6,0,0,'','','','','','NON','',20,'','','N','',0),('160000',1,7,0,0,'','','','','','NON','',20,'','','N','',0),('170000',1,8,0,0,'','','','','','NON','',20,'','','N','',0),('180000',1,9,0,0,'�','','','','','NON','',20,'','','N','',0),('190000',1,10,0,0,'','','','','','NON','',20,'','','N','',0),('200000',1,11,0,0,'test2','','','','','NON','',20,'','','N','',0);
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
INSERT INTO `wiz_company` VALUES (1,'company','1234','���޾�ü','000-00-00000','OOO','����','��ľ�','OO�� OO�� OO�� OO����','OO���� OOȣ','OOO','000-0000-0000','000-0000-0000','00-0000-0000','test@test.co.kr','','2011-02-23 12:45:25','2011-01-19 18:30:10');
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
INSERT INTO `wiz_content` VALUES (1,'company','Y','',0,0,0,0,'0000-00-00','0000-00-00','',NULL,'','','2005-07-13'),(2,'agreement','Y','',0,0,0,0,'0000-00-00','0000-00-00','',NULL,'','','2005-07-13'),(3,'guide','Y','',0,0,0,0,'0000-00-00','0000-00-00','',NULL,'','','2005-07-13'),(4,'privacy','Y','',0,0,0,0,'0000-00-00','0000-00-00','',NULL,'','','2005-07-13'),(15,'new','','',0,0,0,0,'0000-00-00','0000-00-00','','','����','����','2011-02-09'),(16,'popup','N','N',100,100,340,400,'2011-02-10','2012-02-10','','W','�׽�Ʈ �˾�','�׽�Ʈ �˾�','2011-02-10');
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
INSERT INTO `wiz_daycategory` VALUES ('100000',1,1,0,0,'���굿','','','','','','',0,'','','','',0),('110000',1,2,0,0,'������','','','','','','',0,'','','','',0),('120000',1,3,0,0,'ĥ��','','','','','','',0,'','','','',0),('130000',1,4,0,0,'����','','','','','','',0,'','','','',0),('140000',1,6,0,0,'���','','','','','','',0,'','','','',0),('150000',1,7,0,0,'���','','','','','','',0,'','','','',0),('160000',1,5,0,0,'����','','','','','','',0,'','','','',0),('170000',1,8,0,0,'û��','','','','','','',0,'','','','',0),('180000',1,9,0,0,'����','','','','','','',0,'','','','',0);
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
INSERT INTO `wiz_dayorder` VALUES ('110222111038556','1102090001',1,'test','�׽�Ʈ','010-0000-0000','010-0000-0000','test@test.com','-','','','',' ','�׽�Ʈ','010-0000-0000','010-0000-0000','test@test.com','-','','PC','','',0,'',0,0,'DC',0,'',NULL,0,35000,35000,'OR','2011-02-22 11:11:26','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','',NULL,NULL,'N','NO','','','',NULL,NULL,'','');
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
INSERT INTO `wiz_dayproduct` VALUES ('1102090001','��ī��','money',27000,0,1,'���޾�ü',4,'�׽�ƮMD','','','N',0,0,0,0,0,0,0,0,0,30000,60000,50,3000,'','2011-02-17 00:00:01','2012-02-29 23:59:59','09:00:00','20:00:00','stock',0,0,100,200,1,15,'',0,'',0,'','','','','','������','44^1000^0^^55^2000^0^^66^3000^0^^77^4000^0^^88^5000^0^^99^0^0^^','','','����','���,����,���,�Ķ�,����','','','','','0^0^0^0^0^^','1102090001_R.jpg','1102090001_L1.jpg','1102090001_M1.jpg','1102090001_S1.jpg','1102090001_L2.jpg','1102090001_M2.jpg','1102090001_S2.jpg','1102090001_L3.jpg','1102090001_M3.jpg','1102090001_S3.jpg','','','','','','','','���ܼ����ܼ����ܼ����ܼ����ܼ����ܼ����ܼ����ܼ����ܼ����ܼ���','<P><IMG border=0 src=\"http://wizoneday.anywiz.co.kr/data/webedit/11021104161688.jpg\"></P>','<P><IMG border=0 src=\"http://wizoneday.anywiz.co.kr/data/webedit/11021104165731.jpg\"></P>','<P><IMG border=0 src=\"http://wizoneday.anywiz.co.kr/data/webedit/11020908543845.jpg\"></P>','���� �� ���ǻ������� �� ���ǻ������� �� ���ǻ������� �� ���ǻ������� �� ���ǻ������� �� ���ǻ������� �� ���ǻ������� �� ���ǻ������� �� ���ǻ������� �� ���ǻ���','2011-02-09 20:49:45','0000-00-00 00:00:00','N','���� �� ����ȳ����� �� ����ȳ����� �� ����ȳ����� �� ����ȳ����� �� ����ȳ����� �� ����ȳ����� �� ����ȳ����� �� ����ȳ����� �� ����ȳ����� �� ����ȳ�','SMS ����SMS ����SMS ����SMS ����SMS ����SMS ����SMS ����SMS ����SMS ����',0,'','Array','Array','',0,60);
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
INSERT INTO `wiz_design` VALUES ('�����̸� �ַ��','�����̸� �ַ��, �����̸� �ַ��, �����̸� �ַ��','�����̸� �ַ��, �����̸� �ַ��, �����̸� �ַ��','CENTER',930,'#FFFFFF','','','','','','','<TABLE cellSpacing=0 cellPadding=0 width=914 border=0>\r\n<TBODY>\r\n<TR bgColor=#eeeeee>\r\n<TD> </TD>\r\n<TD class=font_12_1 style=\'PADDING-RIGHT: 0px; PADDING-LEFT: 15px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\'>\r\n<A href=\'/\'>Ȩ</A> | \r\n<A href=\'/center/company.php\'>ȸ��Ұ�</A> | \r\n<A href=\'/center/guide.php\'>�̿�ȳ�</A> | \r\n<A href=\'/member/join.php\'>�̿���</A> | \r\n<A href=\'/center/privacy.php\'>�������� ��ȣ��å</A> | \r\n<A href=\'/center/center.php\'>������</A> | \r\n<A href=\'/center/sitemap.php\'>����Ʈ��</A>\r\n</TD></TR>\r\n<TR>\r\n<TD vAlign=center align=middle width=190><IMG height=39 src=\'/images/newimg/main/img_footer_logo.gif\' width=145></TD>\r\n<TD class=font_12_1 style=\'PADDING-RIGHT: 0px; PADDING-LEFT: 15px; PADDING-BOTTOM: 20px; PADDING-TOP: 20px\'>123-11 ����� ������ ȫ�浿 123-1ȣ 00���� 123ȣ | �� ���� ��ȭ : 000-0000-0000 / Fax 000-0000-0000<BR>00�׷� ��Ϲ�ȣ : 123-12-12345 <BR>��ǥ�ڸ�:000 | ����Ǹž��Ű� ����12-123ȣ | �������� ��ȣ ������ : 0000<BR>Copyright �� 2007 DEMO SHOP All rights reserved. </TD></TR></TBODY></TABLE>\r\n','logo.gif','cateimg.gif','Y',170,110,21,'mainimg.gif',489,238,'',NULL,'<P>sddddddddddddddddddd</P>','notice_img.gif',4,30,'Y',100,90,'/member/login.php','/member/logout.php','/member/join.php','/member/my_shop.php','/','','/shop/prd_basket.php','/shop/order_list.php','','',' /oneday/company.php','/','/oneday/guide.php','/bbs/list.php?code=notice','/oneday/center.php','/','/oneday/oneday_sch.php','','','');
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
INSERT INTO `wiz_level` VALUES (26,4,'','�Ϲ�ȸ��','P',0,''),(22,1,'','���ȸ��','P',10,''),(23,2,'','���ȸ��','P',0,''),(24,3,'','��ȸ��','P',0,'');
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
INSERT INTO `wiz_mailsms` VALUES ('mem_notice','�Ϲ� ���� �߼۽�','N','N','','','N','N','<STYLE>\r\n  td {font-size:12px;font-family:\"����\",\"����\";color:#4A4A4A;line-height:160%} \r\n  table {border-collapse:collapse;}\r\n</STYLE>\r\n\r\n<TABLE height=\"100%\" cellSpacing=0 cellPadding=0 width=642 align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD align=middle>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/top_06.gif\"></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=642 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 30px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\">���ϳ��� �ۼ�</TD>\r\n<TD vAlign=bottom align=right width=190><IMG src=\"{SHOP_URL}/images/mailimg/img_06.gif\"></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/bottom.gif\"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>'),('mem_apply','[ȸ������] ȸ�����Խ�','Y','N','[{SHOP_NAME}] - {MEM_NAME}�� �������ּż� �����մϴ�.','[{SHOP_NAME}] - �������ּż� �����մϴ�.','Y','N','\r\n<STYLE>\r\n  td {font-size:12px;font-family:\"����\",\"����\";color:#4A4A4A;line-height:160%} \r\n  table {border-collapse:collapse;}\r\n</STYLE>\r\n\r\n<TABLE height=\"100%\" cellSpacing=0 cellPadding=0 width=642 align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD align=middle>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/top_06.gif\"></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=642 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 30px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\">\r\n<P>ȸ���� �������ּż� �����մϴ�.<BR><BR>���̵� : {MEM_ID}</P>\r\n<P>��й�ȣ&nbsp;: {MEM_PW}</P></TD>\r\n<TD vAlign=bottom align=right width=190><IMG src=\"{SHOP_URL}/images/mailimg/img_06.gif\"></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/bottom.gif\"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>'),('mem_out','[ȸ������] ȸ��Ż���','Y','Y','[{SHOP_NAME}] - {MEM_NAME}��, Ż��ó���Ǿ����ϴ�.','[{SHOP_NAME}] - {MEM_NAME}��, Ż��ó���Ǿ����ϴ�.','Y','Y','<STYLE>\r\n  td {font-size:12px;font-family:\"����\",\"����\";color:#4A4A4A;line-height:160%} \r\n  table {border-collapse:collapse;}\r\n</STYLE>\r\n\r\n<TABLE height=\"100%\" cellSpacing=0 cellPadding=0 width=642 align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD align=middle>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/top_06.gif\"></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=642 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 30px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\">ȸ���� Ż��ó���Ǿ����ϴ�. ��������� �˼��մϴ�</TD>\r\n<TD vAlign=bottom align=right width=190><IMG src=\"{SHOP_URL}/images/mailimg/img_06.gif\"></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/bottom.gif\"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>'),('mem_idpw','[ȸ������] ���̵�/��й�ȣ ã���','Y','N','[{SHOP_NAME}] - {MEM_NAME}��, ��û�Ͻ� ���̵�/��й�ȣ[{MEM_ID}/{MEM_PW}] �Դϴ�','[{SHOP_NAME}] - {MEM_NAME}�� ��û�Ͻ� ���̵�/��й�ȣ �Դϴ�.','Y','N','<STYLE>\r\n  td {font-size:12px;font-family:\"����\",\"����\";color:#4A4A4A;line-height:160%} \r\n  table {border-collapse:collapse;}\r\n</STYLE>\r\n\r\n<TABLE height=\"100%\" cellSpacing=0 cellPadding=0 width=642 align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD align=middle>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/top_06.gif\"></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=642 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 30px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\">ȸ���� ��û�Ͻ� ���̵�/��й�ȣ �Դϴ�.<BR><BR>���̵� : {MEM_ID}<BR>��й�ȣ : {MEM_PW}</TD>\r\n<TD vAlign=bottom align=right width=190><IMG src=\"{SHOP_URL}/images/mailimg/img_06.gif\"></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/bottom.gif\"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>'),('order_com','[�ֹ�����] �ֹ��Ϸ��','Y','N','[{SHOP_NAME}] - {MEM_NAME}���� �ֹ��� ���������� �����Ǿ����ϴ�. �����մϴ�.','[{SHOP_NAME}] - {MEM_NAME}����  �ֹ��� ���������� �����Ǿ����ϴ�. �����մϴ�.','Y','Y','<STYLE>\r\n  td {font-size:12px;font-family:\"����\",\"����\";color:#4A4A4A;line-height:160%} \r\n  table {border-collapse:collapse;}\r\n</STYLE>\r\n<TABLE height=\"100%\" cellSpacing=0 cellPadding=0 width=642 align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD align=middle>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/top_02.gif\"></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/title_02.gif\"></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=642 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 30px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\"><FONT color=#1cb6b6><B><FONT color=#000000>{MEM_NAME}</FONT>����, �ȳ��ϼ���? <BR>���� ���θ��� �̿��� �ּż� �����մϴ�.<BR><FONT color=#000000>{MEM_NAME}</FONT>���Բ��� �ֹ��Ͻ� ��ǰ�� �����Ǿ����ϴ�.<BR></B></FONT><BR><FONT color=#757575>�ֹ����� �� ��������� MY Shopping�� �ֹ�/�����ȸ���� <BR>Ȯ���Ͻ� �� �ֽ��ϴ�. <BR>���Բ� ������ ��Ȯ�ϰ� ��ǰ�� ���޵� �� �ֵ��� �ּ��� ���ϰڽ��ϴ�. </FONT></TD>\r\n<TD align=right width=190><IMG src=\"{SHOP_URL}/images/mailimg/img_02.gif\"></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD align=middle background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<P>&nbsp;</P>\r\n<P>{ORDER_INFO}</P>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=\"95%\" align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD>\r\n<TABLE cellSpacing=0 cellPadding=5 width=\"100%\" border=0>\r\n<TBODY>\r\n<TR>\r\n<TD colSpan=2></TD></TR>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 15px; PADDING-BOTTOM: 20px; PADDING-TOP: 20px\" colSpan=2>�� ��Ÿ ���ǻ����� �����ø�, {SHOP_EMAIL}�̳� {SHOP_TEL}���� �����ֽñ� �ٶ��ϴ�.</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/bottom.gif\"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>'),('order_pay','[�ֹ�����] �Ա�Ȯ�ν�','Y','N','[{SHOP_NAME}] - {MEM_NAME}�� �Ա�Ȯ�� �Ǿ����ϴ�. �ż��� ����ص帮�ڽ��ϴ�.','[{SHOP_NAME}] - {MEM_NAME}�� �Ա�Ȯ�� �Ǿ����ϴ�. �ż��� ����ص帮�ڽ��ϴ�.','Y','N','<STYLE>\r\n  td {font-size:12px;font-family:\"����\",\"����\";color:#4A4A4A;line-height:160%} \r\n  table {border-collapse:collapse;}\r\n</STYLE>\r\n<TABLE height=\"100%\" cellSpacing=0 cellPadding=0 width=642 align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD align=middle>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/top_03.gif\"></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/title_03.gif\"></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=642 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 30px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\"><FONT color=#1cb6b6><B><FONT color=#000000>{MEM_NAME}</FONT>����, �ȳ��ϼ���? <BR>���� ���θ��� �̿��� �ּż� �����մϴ�.<BR><FONT color=#000000>{MEM_NAME}</FONT>���Բ��� �ֹ��Ͻ� ��ǰ�� �����Ǿ����ϴ�.<BR></B></FONT><BR><FONT color=#757575>�ֹ����� �� ��������� MY Shopping�� �ֹ�/�����ȸ���� <BR>Ȯ���Ͻ� �� �ֽ��ϴ�. <BR>���Բ� ������ ��Ȯ�ϰ� ��ǰ�� ���޵� �� �ֵ��� �ּ��� ���ϰڽ��ϴ�. </FONT></TD>\r\n<TD align=right width=190><IMG src=\"{SHOP_URL}/images/mailimg/img_02.gif\"></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD align=middle background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<P>&nbsp;</P>\r\n<P>{ORDER_INFO}</P>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=\"95%\" align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD>\r\n<TABLE cellSpacing=0 cellPadding=5 width=\"100%\" border=0>\r\n<TBODY>\r\n<TR>\r\n<TD colSpan=2></TD></TR>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 15px; PADDING-BOTTOM: 20px; PADDING-TOP: 20px\" colSpan=2>�� ��Ÿ ���ǻ����� �����ø�, {SHOP_EMAIL}�̳� {SHOP_TEL}���� �����ֽñ� �ٶ��ϴ�.</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/bottom.gif\"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>'),('order_deliver','[�ֹ�����] ���ó����','Y','N','[{SHOP_NAME}] - {MEM_NAME}�� �ֹ��Ͻ� ��ǰ�� ��۵Ǿ����ϴ�.','[{SHOP_NAME}] - {MEM_NAME}�� �ֹ��Ͻ� ��ǰ�� ��۵Ǿ����ϴ�.','Y','N','<STYLE>\r\n  td {font-size:12px;font-family:\"����\",\"����\";color:#4A4A4A;line-height:160%} \r\n  table {border-collapse:collapse;}\r\n</STYLE>\r\n<TABLE height=\"100%\" cellSpacing=0 cellPadding=0 width=642 align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD align=middle>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/top_04.gif\"></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/title_04.gif\"></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=642 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 30px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\"><FONT color=#1cb6b6><B><FONT color=#000000>{MEM_NAME}</FONT>����, �ȳ��ϼ���? <BR>���� ���θ��� �̿��� �ּż� �����մϴ�.<BR><FONT color=#000000>{MEM_NAME}</FONT>���Բ��� �ֹ��Ͻ� ��ǰ�� �����Ǿ����ϴ�.<BR></B></FONT><BR><FONT color=#757575>�ֹ����� �� ��������� MY Shopping�� �ֹ�/�����ȸ���� <BR>Ȯ���Ͻ� �� �ֽ��ϴ�. <BR>���Բ� ������ ��Ȯ�ϰ� ��ǰ�� ���޵� �� �ֵ��� �ּ��� ���ϰڽ��ϴ�. </FONT></TD>\r\n<TD align=right width=190><IMG src=\"{SHOP_URL}/images/mailimg/img_02.gif\"></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD align=middle background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<P>&nbsp;</P>\r\n<P>{ORDER_INFO}</P>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=\"95%\" align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD>\r\n<TABLE cellSpacing=0 cellPadding=5 width=\"100%\" border=0>\r\n<TBODY>\r\n<TR>\r\n<TD colSpan=2></TD></TR>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 15px; PADDING-BOTTOM: 20px; PADDING-TOP: 20px\" colSpan=2>�� ��Ÿ ���ǻ����� �����ø�, {SHOP_EMAIL}�̳� {SHOP_TEL}���� �����ֽñ� �ٶ��ϴ�.</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/bottom.gif\"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>'),('order_cancel','[�ֹ�����] �ֹ���ҽ�','Y','N','[{SHOP_NAME}] - {MEM_NAME}�� �ֹ��� ��ҵǾ����ϴ�.','[{SHOP_NAME}] - {MEM_NAME}�� �ֹ��� ��ҵǾ����ϴ�.','Y','N','<STYLE>\r\n  td {font-size:12px;font-family:\"����\",\"����\";color:#4A4A4A;line-height:160%} \r\n  table {border-collapse:collapse;}\r\n</STYLE>\r\n<TABLE height=\"100%\" cellSpacing=0 cellPadding=0 width=642 align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD align=middle>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/top_05.gif\"></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/title_05.gif\"></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=642 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 30px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px\"><FONT color=#1cb6b6><B><FONT color=#000000>{MEM_NAME}</FONT>����, �ȳ��ϼ���? <BR>���� ���θ��� �̿��� �ּż� �����մϴ�.<BR><FONT color=#000000>{MEM_NAME}</FONT>���Բ��� �ֹ��Ͻ� ��ǰ�� �����Ǿ����ϴ�.<BR></B></FONT><BR><FONT color=#757575>�ֹ����� �� ��������� MY Shopping�� �ֹ�/�����ȸ���� <BR>Ȯ���Ͻ� �� �ֽ��ϴ�. <BR>���Բ� ������ ��Ȯ�ϰ� ��ǰ�� ���޵� �� �ֵ��� �ּ��� ���ϰڽ��ϴ�. </FONT></TD>\r\n<TD align=right width=190><IMG src=\"{SHOP_URL}/images/mailimg/img_02.gif\"></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD align=middle background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<P>&nbsp;</P>\r\n<P>{ORDER_INFO}</P>\r\n<P>&nbsp;</P></TD></TR>\r\n<TR>\r\n<TD background={SHOP_URL}/images/mailimg/bg_line.gif>\r\n<TABLE cellSpacing=0 cellPadding=0 width=\"95%\" align=center border=0>\r\n<TBODY>\r\n<TR>\r\n<TD>\r\n<TABLE cellSpacing=0 cellPadding=5 width=\"100%\" border=0>\r\n<TBODY>\r\n<TR>\r\n<TD colSpan=2></TD></TR>\r\n<TR>\r\n<TD style=\"PADDING-RIGHT: 0px; PADDING-LEFT: 15px; PADDING-BOTTOM: 20px; PADDING-TOP: 20px\" colSpan=2>�� ��Ÿ ���ǻ����� �����ø�, {SHOP_EMAIL}�̳� {SHOP_TEL}���� �����ֽñ� �ٶ��ϴ�.</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>\r\n<TR>\r\n<TD><IMG src=\"{SHOP_URL}/images/mailimg/bottom.gif\"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>');
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
INSERT INTO `wiz_md` VALUES (4,'�׽�ƮMD','md@oneday.com','010-0000-0000','010-0000-0000','�׽�Ʈ',NULL,'2011-01-19 18:07:23');
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
INSERT INTO `wiz_member` VALUES ('test','test','�׽�Ʈ','000000-0000000','test@test.com','010-0000-0000','010-0000-0000','010-0000-0000','0000-00','OO�� OO�� OO�� OO����','OO���� OOȣ','Y','Y','-00-00','','','-00-00','','','','','','','26','',18,'2011-02-22 11:10:36','','','','','-','','','','2011-01-19 21:22:06',NULL,NULL);
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
INSERT INTO `wiz_operinfo` VALUES ('PB/PC/PN/PV/','PC/PN/PH/','tanywiz','6f51f77a2b2222d642e20e445101a35f','1^��������^000-000-00000^�׽�Ʈ\r\n2^��������^000-000-00000^�׽�Ʈ','KCP','N','Y','C','Any_','','�����ù�','http://www.hanjin.co.kr/transmission/transmission_fail.jsp?wbl_num=','DB','DA','DC',1000,50000,0,3000,690940,690949,2000,360813,360815,1000,0,0,0,'number_0.gif','number_1.gif','number_2.gif','number_3.gif','number_4.gif','number_5.gif','number_6.gif','number_7.gif','number_8.gif','number_9.gif','button_buy.gif','button_soldout.gif','�ǸŽð��� ����Ǿ����ϴ�.','�����ο��� �����Ǿ����ϴ�.','twiter,me2day,cyworld,facebook,sms,email','Y',1000,0,1000,50000,10,10,'','','Y','query,p,q','130','50','300','2000','N','OY','');
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
INSERT INTO `wiz_option` VALUES (2,'������','230\r\n235\r\n240\r\n245\r\n250\r\n255\r\n260\r\n265\r\n270\r\n277\r\n280\r\n285\r\n290'),(3,'����','���\r\n����\r\n���\r\n�Ķ�\r\n����');
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
INSERT INTO `wiz_page` VALUES (11,'join','','�� 1�� (����) \r\n�� ����� ������� ����� �� �� �� ����ɿ� ���Ͽ� OOO(���� \"ȸ��\" �� �մϴ�.)�� �����ϴ� ���ͳ� Ȩ������ ���� (���� \"����\" �� �մϴ�.)�� �̿����� �� ������ ���� ����, ȸ��� �̿����� �Ǹ��� �ǹ� �� å�ӻ����� �������� �������� �մϴ�.\r\n \r\n�� 2�� (����� ȿ�°� ����) \r\n1. �� ����� ������Ż���� �� 31 ��, �� �� �����Ģ �� 21���� 2�� ���� ���������� ��ģ �� Ȩ�������� ���Ͽ� �̸� �����ϰų� ���ڿ��� ��Ÿ�� ������� �̿��ڿ��� ���������ν� ȿ���� �߻��մϴ�.\r\n \r\n2. ȸ��� �� ����� ���� ���� ���� ������ �� ������, ������ ����� ��9���� ���� ������� �����մϴ�. ȸ���� ������ ����� �������� �ƴ��ϴ� ��� ������ ȸ������� ���(ȸ��Ż��)�� �� ������, ��� ����� ���� ��� ������ ���� ���Ƿ� ���ֵ˴ϴ�. ������ ����� ������ ���ÿ� �� ȿ���� �߻��˴ϴ�.\r\n  \r\n�� 3�� (����̿��� ��Ģ) \r\n�� ����� ��õǾ� ���� ���� ������ ������� �⺻��, ������� �����, ��Ÿ ���ù����� ������ �����ϴ�.\r\n \r\n�� 4�� (����� ����) \r\n�� ������� ����ϴ� ����� ���Ǵ� ������ �����ϴ�.\r\n \r\n1. ȸ�� : ���񽺿� ���������� �����Ͽ� ȸ������� �� �ڷμ�, ������ ������ ���������� ����������, �̿��� �� �ִ� �ڸ� ���մϴ�. \r\n2. �̿��� : �� ����� ���� ȸ�簡 �����ϴ� ���񽺸� �޴� ȸ�� �� ��ȸ���� ���մϴ�.\r\n3. ���̵� (ID) : ȸ�� �ĺ��� ȸ���� ���� �̿��� ���Ͽ� ȸ���� �����ϰ� ȸ�簡 �����ϴ� ���ڿ� ������ ������ ���մϴ�.  \r\n4. ��й�ȣ : ȸ���� ��Ż��� �ڽ��� ����� ��ȣ�ϱ� ���� ������ ���ڿ� ������ ������ ���մϴ�.  \r\n5. ���ڿ��� (E-mail) : ���ͳ��� ���� �����Դϴ�.  \r\n6. ���� : ȸ�� �Ǵ� ȸ���� ���� �̿� ���� �� �̿����� ���� ��Ű�� �ǻ�ǥ�ø� ���մϴ�.  \r\n7. Ȩ������ : ȸ�簡 �̿��ڿ��� ���񽺸� �����ϱ� ���Ͽ� ��ǻ�� �� ������ż��� �̿��Ͽ� �̿��ڰ� ���� �� �̿��� �� �ֵ��� ������ ������ ���� ������ ���մϴ�.\r\n  \r\n�� 5�� (������ ���� �� ����) \r\n1. ȸ�簡 �����ϴ� ���񽺴� ������ �����ϴ�.\r\n \r\n1) ȸ�翡 ���� ȫ�� ����\r\n2) ȸ�簡 �Ǹ��ϴ� ��ǰ �ȳ�\r\n3) ��Ÿ ȸ�簡 �����ϴ� ���� ����\r\n4) �� ��� ����\r\n5) ȸ�� �̿� ����\r\n \r\n2. ȸ��� �ʿ��� ��� ������ ������ �߰� �Ǵ� �����Ͽ� ������ �� �ֽ��ϴ�.\r\n  \r\n�� 6�� (������ �ߴ�) \r\n1. ȸ��� ��ǻ�� �� ������ż����� ��������/��ü �� ����, ����� ���� ���� ������ �߻��� ��쿡�� ������ ������ �Ͻ������� �ߴ��� �� �ֽ��ϴ�.\r\n \r\n2. �� 1�׿� ���� ���� �ߴ��� ��쿡�� �� 9���� ���� ������� �̿��ڿ��� �����մϴ�.\r\n \r\n3. ȸ��� ��1���� ������ ������ ������ �Ͻ������� �ߴܵ����� ���Ͽ� �̿��� �Ǵ� ��3�ڰ� ���� ���ؿ� ���Ͽ� ������� �ƴ��մϴ�. ��, ȸ�翡 ���� �Ǵ� �߰����� �ִ� ��쿡�� �׷����� �ƴ��մϴ�.\r\n  \r\n�� 7�� (ȸ������) \r\n1. �̿��ڴ� ȸ�簡 ���� ���Ծ�Ŀ� ���� ȸ�������� ������ �� �� ����� �����Ѵٴ� �ǻ�ǥ�ø� �����μ� ȸ�������� ��û�մϴ�.\r\n \r\n2. �̿��ڴ� �ݵ�� �Ǹ����� ȸ�������� �Ͽ��� �ϸ�, 1���� �ֹε�Ϲ�ȣ�� ���� 1���� ȸ�����Խ�û�� �� �� �ֽ��ϴ�.\r\n \r\n3. ȸ��� �� 1�װ� ���� ȸ������ ������ ���� ��û�� �̿��� �� ���� �� ȣ�� �ش����� �ʴ� �� ȸ������ ����մϴ�.\r\n \r\n 1) �̸��� �Ǹ��� �ƴ� ���\r\n \r\n2) ��� ���뿡 ����, ���紩��, ���Ⱑ �ִ� ���\r\n \r\n3) Ÿ���� ���Ǹ� ����Ͽ� ��û�� ���\r\n \r\n4) ���Խ�û�ڰ� �� ��� �� 8�� 3�׿� ���Ͽ� ������ ȸ���ڰ��� ����� ���� �ִ� ���(��, �� 8�� 3�׿� ���� ȸ���ڰ� ��� �� 3���� ����� �ڷμ� ȸ���� ȸ�� �簡�� �³��� ���� ���� ���ܷ� �մϴ�.)\r\n \r\n5) �� 14�� �̸��� �Ƶ�\r\n \r\n6) ��Ÿ ȸ������ ȸ�� ������ �̿��û����� �������� ���ϴ� ���\r\n  \r\n4. ȸ�����԰���� �����ñ�� ȸ���� �³��� �̿��ڿ��� ������ �������� �մϴ�.\r\n \r\n5. ȸ���� �� 10�� 1�׿� ���� ��ϻ��׿� ������ �ִ� ��� ȸ���������� �׸��� ���� ���� ��������� ����, ����Ͽ��� �մϴ�.\r\n  \r\n�� 8�� (ȸ��Ż�� �� �ڰ� ��� ��) \r\n1. ȸ���� �������� ȸ���� Ż�� Ȩ�������� ��û�� �� ������, Ȩ�������� ��� �̿� ���մϴ�.\r\n \r\n2. ȸ���� ���� �� ȣ�� ������ �ش��ϴ� ���, ȸ��� ȸ���ڰ��� ���� �� ������ų �� �ֽ��ϴ�.\r\n \r\n 1) ���� ��û �ÿ� ���� ������ ����� ���\r\n \r\n2) Ÿ���� ���� �̿��� �����ϰų� �� ������ �����ϴ� �� ���� ������� �����ϴ� ���\r\n \r\n3) ���񽺸� �̿��Ͽ� ���ɰ� �� ����� �����ϰų�, ������ӿ� ���ϴ� ������ �ϴ� ���\r\n \r\n4) �� 13�� �� ���� ȸ���� �ǹ������� �ؼ����� ���� ���\r\n  \r\n3. ȸ�簡 ȸ���ڰ��� ����/������Ų ��, ������ ������ 2ȸ �̻� �ݺ��ǰų� 30�� �̳��� �� ������ �������� �ƴ��ϴ� ��� ȸ��� ȸ���ڰ��� ��� ��ų �� �ֽ��ϴ�.\r\n \r\n4. ȸ�簡 ȸ���ڰ��� ��� ��Ű�� ��� ȸ������ �̸� �����ϰ� Ż�� ó���մϴ�. �� ��� ȸ������ �̸� �����ϰ�, Ż�� ���� �Ҹ��� ��ȸ�� �ο��մϴ�.\r\n \r\n \r\n�� 9�� (�̿��ڿ� ���� ����) \r\n1. ȸ�簡 �̿��ڿ� ���� ������ �ϴ� ���, �̿��ڰ� ���񽺿� ������ ���ڿ��� �ּҷ� �� �� �ֽ��ϴ�.\r\n \r\n2. ȸ�簡 ��Ư�� �ټ� �̿��ڿ� ���� ������ ��� 1���� �̻� ���� �Խ��ǿ� �Խ������ν� ���� ������ ������ �� �ֽ��ϴ�.\r\n \r\n \r\n�� 10�� (���� ���� ��ȣ) \r\n1. ȸ��� �̿��� ���� ���� �� ȸ������ �ʿ��� �ּ����� ������ �����մϴ�.\r\n���� ������ �ʼ��������� �ϸ� �� �� ������ ���û������� �մϴ�.\r\n \r\n1) ����\r\n2) �ֹε�Ϲ�ȣ\r\n3) ��� ID\r\n4) ��й�ȣ\r\n5) E-mail\r\n6) �ּ�\r\n7) ��ȭ��ȣ\r\n8) favor ���� ����\r\n \r\n2. ȸ�簡 �̿����� ���νĺ��� ������ ���������� �����ϴ� ������ �ݵ�� ���� �̿����� ���Ǹ� �޽��ϴ�.\r\n \r\n3. ������ ���������� ���� �̿����� ���� ���� �� 3�ڿ��� ������ �� ������, �̿� ���� ��� å���� ȸ�簡 ���ϴ�. �ٸ� ������ ��쿡�� ���ܷ� �մϴ�.\r\n \r\n 1) ��۾����� ��۾�ü���� ��ۿ� �ʿ��� �ּ����� �̿����� ����\r\n(����, �ּ�, ��ȭ��ȣ)�� �˷��ִ� ���\r\n \r\n2) ����ۼ�, �м����� �Ǵ� �������縦 ���Ͽ� �ʿ��� ���μ� Ư�� ������ �ĺ��� �� ���� ���·� �����ϴ� ���\r\n \r\n3) ������ɿ� ���Ͽ� ����������κ��� �䱸 ���� ���\r\n \r\n4) ���˿� ���� ������� ������ �ְų�, ������� ��������ȸ�� ��û�� �ִ� ���\r\n \r\n5) ��Ÿ ������ɿ��� ���� ������ ���� ��û�� �ִ� ���\r\n \r\n \r\n4. �̿��ڴ� �������� ȸ�簡 ������ �ִ� �ڽ��� ���������� ���� ���� �� ���������� �� �� �ֽ��ϴ�.\r\n \r\n5. ȸ��κ��� ���������� �������� �� 3�ڴ� ���������� �������� ������ �޼��� ������ ���� ���������� ��ü ���� �ı��մϴ�.\r\n \r\n \r\n�� 11�� (ȸ���� �ǹ�) \r\n1. ȸ��� �� ������� ���� �ٿ� ���� �����, ���������� ���񽺸� ������ �� �ֵ��� �ּ��� ����� ���Ͽ��߸� �մϴ�.\r\n \r\n2. ȸ��� ���񽺿� ���õ� ���� �׻� ����� �� �ִ� ���·� ����/�����ϰ�, ��ְ� �߻��ϴ� ��� ��ü ���� �̸� ����/������ �� �ֵ��� �ּ��� ����� ���Ͽ��� �մϴ�.\r\n \r\n3. ȸ��� �̿��ڰ� �����ϰ� ���񽺸� �̿��� �� �ֵ��� �̿����� ����������ȣ�� ���� ���Ƚý����� ���߾�� �մϴ�.\r\n \r\n4. ȸ��� �̿��ڰ� ������ �ʴ� ���������� ���� ���ڿ����� �߼����� �ʽ��ϴ�.\r\n \r\n \r\n�� 12�� (ȸ���� ID �� ��й�ȣ�� ���� �ǹ�) \r\n1. ȸ������ �ο��� ���̵�(ID)�� ��й�ȣ�� ����å���� ȸ������ ������ ���� ��Ȧ, ������뿡 ���Ͽ� �߻��ϴ� ��� ����� ���� å���� ȸ������ �ֽ��ϴ�.\r\n \r\n2. ȸ���� �ڽ��� ID �� ��й�ȣ�� ���� ���ϰų� �� 3�ڰ� ����ϰ� ������ ������ ��쿡�� �ٷ� ȸ�翡 �뺸�ϰ� ȸ���� �ȳ��� �ִ� ��쿡�� �׿� ����� �մϴ�.\r\n \r\n \r\n�� 13�� (ȸ���� �ǹ�) \r\n1. ȸ���� �������, �� ����� ����, �̿�ȳ� �� ���ǻ��� �� ȸ�簡 �����ϴ� ������ �ؼ��Ͽ��� �ϸ�, ��Ÿ ȸ���� ������ ���صǴ� ������ �Ͽ����� �ȵ˴ϴ�.\r\n \r\n2. ȸ���� ȸ���� �����³� ���� ���񽺸� �̿��Ͽ� ��� ���������� �� �� �����ϴ�.\r\n \r\n3. ȸ���� ���񽺸� �̿��Ͽ� ���� ������ ȸ���� �����³� ���� ����, ����, ����, ����, ����/��� ��Ÿ�� ������� ����ϰų� �̸� Ÿ�ο��� ������ �� �����ϴ�.\r\n \r\n4. ȸ���� �ڱ� �Ż������� ������� �߻��� �ﰢ �����Ͽ��� �մϴ�.\r\nȸ�������� �������� �ʾ� �߻��ϴ� ��� ����� ���� å���� ȸ������ �ֽ��ϴ�.\r\n \r\n5. ȸ���� ���� �̿�� �����Ͽ� ���� �� ȣ�� ������ ���� �ʾƾ� �ϸ�, ���� ������ ������ �߻��ϴ� ��� ����� ���� å���� ȸ������ �ֽ��ϴ�.\r\n \r\n 1) �ٸ� ȸ���� ���̵�(ID)�� �����ϰ� ����ϴ� ����\r\n \r\n2) �ٸ� ȸ���� E-mail �ּҸ� ����Ͽ� ���Ը����� �߼��ϴ� ����\r\n \r\n3) ���������� �������� �ϰų� ��Ÿ ���������� ���õ� ����\r\n \r\n4) ������ ǳ��, ��Ÿ ��ȸ������ ���ϴ� ����\r\n \r\n5) ȸ�� �� Ÿ���� ���� �Ѽ��ϰų� ����ϴ� ����\r\n \r\n6) ȸ�� �� Ÿ���� �������� ���� �Ǹ��� ħ���ϴ� ����\r\n \r\n7) ��ŷ���� �Ǵ� ��ǻ�� ���̷����� ��������\r\n \r\n8) Ÿ���� �ǻ翡 ���Ͽ� ���� ���� �� ������ ������ ���������� �����ϴ� ����\r\n \r\n9) ������ �������� ��� ������ �ְų� �� ����� �ִ� ��ü�� ����\r\n \r\n10) ȸ�簡 �����ϴ� ������ ������ �����ϴ� ����\r\n\r\n11) ��Ÿ ������ɿ� ����Ǵ� ����\r\n \r\n \r\n \r\n�� 14�� (�Խù� ����) \r\n1. ȸ��� �̿��ڰ� �Խ��ϰų� ����ϴ� ���񽺳��� �Խù��� �� 13���� ������ ���ݵǰų�, ���� �� ȣ�� �ش��Ѵٰ� �ǴܵǴ� ��� �������� ���� �Խù��� ������ �� �ֽ��ϴ�.\r\n \r\n 1) �ٸ� �̿��� �Ǵ� �� 3�ڸ� ����ϰų� �߻������ ���� �ջ��Ű�� ����\r\n \r\n2) �������� �Ǵ� ��ǳ��ӿ� ���ݵǴ� ����\r\n \r\n3) ������ ������ ��εȴٰ� �����Ǵ� ����\r\n \r\n4) �� 3���� ���۱� �� ��Ÿ �Ǹ��� ħ���ϴ� ����\r\n \r\n5) ������ �������� ��� ������ �ְų� �� ����� �ִ� ����\r\n \r\n6) �ٰų� Ȯ������ ���� ȸ�縦 ���ϰų� ����� ������ �����\r\n \r\n7) ��Ÿ ������ɿ� �ǰ��Ͽ� ���ݵȴٰ� �ǴܵǴ� ����\r\n \r\n��, ���ڰԽ����� ��� ������ ���� ���ܸ� �д�.\r\n�뷮�� ū �������� ��� ���ε� �� �Խù��� ���� �����ϸ� �� ���� ���� ������ ������ ��Ȱ�� ��� ���� ���� ������ �Խù����� ������ �� �ִ�.\r\n \r\n2. ȸ��� �̿��ڰ� �Խ��ϰų� ����ϴ� ���񽺳��� �Խù��� �� 13���� ������ ���ݵǰų� �� �� ��1�� �� ȣ�� �ش��Ѵٰ� �ǴܵǴ� ������ ��ũ�ϰ� ���� ��� �������� ���� �Խù��� ������ �� �ֽ��ϴ�.\r\n \r\n \r\n�� 15�� (�Խù��� ���� �Ǹ� / �ǹ�) \r\n�Խù��� ���� ���۱��� ������ ��� �Ǹ� �� å���� �̸� �Խ��� �̿��ڿ��� �ֽ��ϴ�.\r\n \r\n�� 16�� (���� \"Ȩ������\"�� �ǿ��� \"Ȩ������\"���� ����) \r\n1. ���� \"Ȩ������\"�� ���� \"Ȩ������\"�� ������ ��ũ(��:������ ��ũ�� ��󿡴� ����, �׸� �� ��ȭ�� ���� ���Ե�) ��� ������ ����� ���, ���ڸ� ���� \"Ȩ������\"��� �ϰ� ���ڸ� �ǿ��� \"Ȩ������(������Ʈ)\"��� �մϴ�.\r\n \r\n2. ���� \"Ȩ������\"�� �ǿ��� \"Ȩ������\"�� ���������� �����ϴ� ��ȭ?�뿪�� ���Ͽ� �̿��ڿ� ���ϴ� �ŷ��� ���ؼ� ����å���� ���� �ʽ��ϴ�.\r\n \r\n \r\n�� 17�� (���۱��� �ͼ� �� �̿�����) \r\n1. ȸ�簡 �ۼ��� ���۹��� ���� ���۱� �� ��Ÿ ���������� ȸ�翡 �ͼ��մϴ�.\r\n \r\n2. �̿��ڴ� ���񽺸� �̿������ν� ���� ������ ȸ���� �����³� ���� ����, �۽�, ����, ����, ���, ��Ÿ ����� ���Ͽ� ������������ �̿��ϰų� �� 3�ڿ��� �̿��ϰ� �Ͽ����� �ȵ˴ϴ�.\r\n \r\n \r\n�� 18�� (�絵����) \r\nȸ���� ������ �̿����, ��Ÿ �̿� ���� ������ Ÿ�ο��� �絵, ������ �� ������, �̸� �㺸�� ������ �� �����ϴ�.\r\n \r\n�� 19�� (���ع��) \r\nȸ��� ����� �����Ǵ� ���񽺿� �����Ͽ� �̿��ڿ��� ��� ���ذ� �߻��ϴ��� �� ���ذ� ȸ���� �ߴ��� ���ǿ� ���� ��츦 �����ϰ� �̿� ���Ͽ� å���� �ο����� �ƴ��մϴ�.\r\n \r\n�� 20�� (��å / ���) \r\n1. ȸ��� �̿��ڰ� ���񽺿� ������ ����, �ڷ�, ����� ��Ȯ��, �ŷڼ� �� �� ���뿡 ���Ͽ��� ��� å���� �δ����� �ƴ��ϰ�, �̿��ڴ� �ڽ��� å�ӾƷ� ���񽺸� �̿��ϸ�, ���񽺸� �̿��Ͽ� �Խ� �Ǵ� ������ �ڷ� � ���Ͽ� ���ذ� �߻��ϰų� �ڷ��� ��缱��, ��Ÿ ���� �̿�� �����Ͽ� ��� �������� �߻��ϴ��� �̿� ���� ��� å���� �̿��ڿ��� �ֽ��ϴ�.\r\n \r\n2. ȸ��� �� 13���� ������ �����Ͽ� �̿��ڰ� �Ǵ� �̿��ڿ� �� 3�ڰ��� ���񽺸� �Ű��� �� ��ǰ�ŷ� ��� �����Ͽ� ��� å�ӵ� �δ����� �ƴ��ϰ�, �̿��ڰ� ������ �̿�� �����Ͽ� ����ϴ� ���Ϳ� ���Ͽ� å���� �δ����� �ʽ��ϴ�.\r\n \r\n3. �̿��ڰ� �� 13��, ��Ÿ �� ����� ������ ���������� ���Ͽ� ȸ�簡 �̿��� �Ǵ� �� 3�ڿ� ���Ͽ� å���� �δ��ϰ� �ǰ�, �̷ν� ȸ�翡�� ���ذ� �߻��ϰ� �Ǵ� ���, �� ����� ������ �̿��ڴ� ȸ�翡�� �߻��ϴ� ��� ���ظ� ����Ͽ��� �ϸ�, �� ���طκ��� ȸ�縦 ��å���Ѿ� �մϴ�.\r\n \r\n \r\n�� 21�� (������ �ذ�) \r\n1. ȸ��� �̿��ڴ� ���񽺿� �����Ͽ� �߻��� ������ �����ϰ� �ذ��ϱ� ���Ͽ� �ʿ��� ��� ����� �Ͽ��� �մϴ�.\r\n \r\n2. �� 1���� �������� �ұ��ϰ�, �� �������� ���Ͽ� �Ҽ��� ����� ��� �� �Ҽ��� ������������� ���ҷ� �մϴ�.\r\n \r\n3. �� �Ҽۿ��� ���ѹα� ���� �����մϴ�.\r\n \r\n \r\n�� 22�� (��Ÿ) \r\n�� ����� ��õ��� �ƴ��� ������ ó���� ���Ͽ� �̿��ڴ� OOO.(��ȭ��ȣ : 02-xxx-xxxx)�� �̿��մϴ�.\r\n \r\n��Ģ \r\n�� ����� OOOO�� O�� O �Ϻ��� �����մϴ�.','�� �� Ģ\r\n1. OOO�� \'������Ÿ��̿�������������ȣ����ѹ���\'���� ����������ȣ ������ ������źΰ� ������ \'����������\r\n    ȣ��ħ\' �� ������������ �����/������ ��ȣ��ġ ���ء��� �ؼ��ϰ� �ֽ��ϴ�. ���� OOO�� \'����������ȣ��å\'�� \r\n    �����Ͽ� ȸ������ �������� ��ȣ�� ���� �ּ��� ���ϰ����� �����մϴ�.\r\n2. OOO�� \'����������ȣ��å\'�� ���� ���� �� ���� ��ħ�� ����� OOO�� ���� ��ħ ���濡 ���� ����� �� �ֽ�\r\n    �ϴ�. OOO�� \'����������ȣ��ħ\'�� ����� ��� ��������� OOO Ȩ�������� �������׿� \r\n    �ּ� 7�ϰ� �Խõ˴ϴ�. \r\n\r\n\r\n�� ��������\r\nOOO�� ���ϲ��� OOO�� �̿����� ���뿡 ���� \"�����Ѵ�\" ��ư �Ǵ� \"�������� �ʴ´�\" ��ư�� Ŭ���� �� �ִ� ������ �����Ͽ�, \"�����Ѵ�\" ��ư�� Ŭ���ϸ� �������� ������ ���� ������ ������ ���ϴ�. ����, ���ϲ��� �������Ѵ١� ��ư�� Ŭ���ϸ� �Ʒ��� �������� ���� �׸� �� ����й�ȣ���� ���ֹε�Ϲ�ȣ���� ������ ������ �׸���� OOO�� ����\r\n�� �����ϱ� ���� ���־�ü�� �����ϴ� �Ϳ� ���� ������ ������ �����մϴ�.\r\n\r\n\r\n1. \"��������\"�� ������ ������Ÿ��̿�������������ȣ����ѹ������� �����ϴ� ���뿡 ����, \'�����ϴ� ���ο� ���� \r\n    �����μ� ���� ������ ���ԵǾ� �ִ� ����, �ֹε�Ϲ�ȣ ���� ���׿� ���Ͽ� ���� ������ �ĺ��� �� �ִ� ����(���� \r\n    ���������δ� Ư�� ������ �ĺ��� �� ������ �ٸ� ������ �����ϰ� �����Ͽ� �ĺ��� �� �ִ� ���� �����Ѵ�)\'�� �ǹ�\r\n    �մϴ�. \r\n2. OOO�� �̿��� Ȯ��, ��ݰ���, �̿� ������ ������ Ȯ��, ����ȸ������ ����ȭ�� ����, ��Ÿ �ΰ����� ���� \r\n    ���Ͽ� ȸ������ ���������� �������̿� �մϴ�. �����ϴ� �������� �׸� ���� ��ü���� �������� �� �̿� ������ \r\n    ������ �����ϴ�.\r\n-  ����, ���̵�, ��й�ȣ, �ֹε�Ϲ�ȣ/����ڵ�Ϲ�ȣ : ȸ���� ���� �̿뿡 ���� ���� Ȯ�� ������ �̿�, \r\n-  �̿� ������ ������ Ȯ��\r\n-  �̸����ּ�, ��ȭ��ȣ, �ѽ���ȣ : ������ ���� ������ ���� �ʼ� ���� Ȯ��, �������� ����, �Ҹ�ó�� ���� ���� ��Ȱ\r\n    �� �ǻ� ����\r\n-  ����� Ȯ��, ���ο� ���� �� �Ż�ǰ�̳� �̺�Ʈ ���� ���� �ȳ�\r\n-  ��������, �ſ�ī�� ���� : �������� �̿� �� ���ſ� ���� ����\r\n-  �ּ� : ������ ������ȸ ����, û���� �� ���θ� ��ǰ ��ۿ� ���� ��Ȯ�� ����� Ȯ��\r\n    ��Ű ( ���̵� ) : ��Ű ��� ���� �湮�ڵ��� ���̵� �ڵ� �м��Ͽ� ��޺� ����ȭ�� ���� ���� ����.\r\n    �������� ������������ �ɼ��� ���������ν� ��Ű�� ����� ������ Ȯ���� ��ġ�ų�, �ƴϸ� ��� ��Ű�� ������ \r\n    �ź��� ���� �ֽ��ϴ�. �׷��� ��Ű�� ������ �ź��� ��� ������ �̿��� ���ѵ� �� �ֽ��ϴ�. \r\n3. OOO�� ȸ�� ���������� ��Ź�������� �ʽ��ϴ�. \r\n4. �̿����� �⺻�� �α� ħ���� ����� �ִ� �ΰ��� ��������(���� �� ����, ��� �� ����, ����� �� ���� ��, ��ġ�� ���� \r\n    �� ���˱��, �ǰ����� �� ����Ȱ ��)�� �䱸���� �ʽ��ϴ�. \r\n5. ���������� ���� �Ⱓ�� \"ȸ���� OOO�� �����ϴ� �������� ���� ��û ��������\"�Դϴ�. OOO�� ȸ��DB�� Ż��\r\n    ��û���� ���������� Ż�� ��� ������� �Ǿ� �ֽ��ϴ�. \r\n    ��, �������� �� �������� ������ �޼��� ��쿡�� ������ ������ ���Ͽ� ������ �ʿ伺�� �ִ� ��쿡�� ������ \r\n    ������ ���� ���� ���������� ������ �� �ֽ��ϴ�.\r\n- ��� �Ǵ� û��öȸ � ���� ��� : 5��\r\n- ��ݰ��� �� ��ȭ���� ���޿� ���� ��� : 5��\r\n- �Һ����� �Ҹ� �Ǵ� ����ó���� ���� ��� : 3�� ��\r\n\r\n\r\n\r\n�� ��3�ڿ� ���� ���� ����\r\n1. OOO�� ȸ������ ���������� �������� Ÿ�� �Ǵ� �ٸ� ȸ�糪 ����� �������� �ʽ��ϴ�. \r\n    ��, ������ �ش��ϴ� ���� ���ܷ� �մϴ�. \r\n-  ������ �̸� ����� ���Ͽ� �ش� �������� ��ϻ���ڿ��� ��û���� ������ �����ϴ� ���\r\n-  ������ �̸��� ���� WHOIS ���񽺸� ���Ͽ� �����ϴ� ��� \r\n-  ������Ÿ��̿�������������ȣ����ѹ��� �� ������ɿ� ���Ͽ� ������� �Ǵ� ���ο��� ������ �Һ��ڴ�ü���� \r\n    ��û�� ���� ��� \r\n-  ���￡ ����� ������ ������� ����ó�� ���� ���� �ⱸ�� ������ ��û�ϴ� ���\r\n-  ���˿� ���� ������� ������ �ְų� ���������������ȸ, �ѱ�������ȣ����� �� ������ü�� ��û�� �ִ� ��� \r\n-  ������ ������ ���Ͽ� ȸ���� ����(����, �ּ�, ��ȭ��ȣ)�� ����ϴ� ��� \r\n-  ����ۼ�, ȫ���ڷ�, �м����� �Ǵ� �������縦 ���Ͽ� �ʿ��� ���μ� Ư�� ������ �ĺ��� �� ���� ���·� ����\r\n    �Ǵ� ���\r\n-  ȸ������ OOO�� ���񽺸� ��û�Ͽ� OOO�� ���� ������ ���� ��۾�ü, �����ݼ��;�ü, ���ι߼� ��ü ��\r\n    �� �ش� ȸ���� ��й�ȣ, �ֹε�Ϲ�ȣ�� �������� �ʴ� �ֹ�����, �ּ��� ����, ����ó ���� �����ϴ� ���\r\n\r\n2. OOO�� ���� �پ��� ���� ������ ���Ͽ� ȸ������ ���������� ���޻翡�� �����ϰų�, ���޻�� �����ϰ��� �� ��\r\n    �� �ݵ�� ������ ȸ�� �������� ���Ǹ� ���ϰڽ��ϴ�. ���޻簡 �������, ���� �Ǵ� �����Ǵ� ���������׸��� ������\r\n    ��, �� �׷��� ���������� �����Ǿ�� �ϴ���, �׸��� �������� ��� ��ȣ, �����Ǵ����� ���� ���������� ���ڿ����� \r\n    ���� �����Ͽ� ���Ǹ� ���ϴ� ������ ��ġ�� �Ǹ�, ���ϲ��� �������� �ʴ� ��쿡�� ���޻翡�� �����ϰų� ���޻�� \r\n    �������� �ʽ��ϴ�.\r\n\r\n\r\n\r\n�� ���������� ���� �� ���� \r\n1. OOO�� ȸ���� �������� �ڽ��� ���������� �����ϰų� �����Ͻ� �� �ֽ��ϴ�. �������� ���� �� ������ ���Ͻô�\r\n    ���� OOO ����Ʈ�� �α׿� �Ͻ� ��, �α׾ƿ� ��ư ���� \'��������\' ��ư�� Ŭ���Ͻʽÿ�. \r\n2. ���� ID�� ��й�ȣ�� �Ҿ������ ȸ���� Ȩ���������� \'ID Ȯ��/��й�ȣ Ȯ��\'���񽺸� ���� ID�� ��й�ȣ�� Ȯ����\r\n    �� �� �ֽ��ϴ�.\r\n3. OOO ȸ�� ID�� ��й�ȣ�� ���� ���� å���� ���ο��� �ֽ��ϴ�.\r\n    ������ ���������� ȿ�������� ��ȣ�ϱ� ���ؼ� �ڽ��� ȸ��ID �� ��й�ȣ�� �����ϰ� �����ϰ� å���� ���� �մϴ�. \r\n    ������ ID�� ��й�ȣ�� �����Ͽ��ٸ� �̿� ���ؼ� OOO�� å���� �����ʽ��ϴ�. �ٸ�, OOO�� ���� Ȥ�� ����\r\n    �� ���� ȸ�� ID�� ��й�ȣ ���⿡ ���ؼ��� �ش� ���� OOO�� å���� ���� �� �ֽ��ϴ�.\r\n    �̿��ڴ� OOO�� ������ �̿��ؼ� ������Ʈ�� �̿��� �ڿ��� �ش� ������ �����Ͻð� �� �������� â�� �ݾ��ֽ�\r\n    �ÿ�. Ư�� ��ǻ�͸� Ÿ�ΰ� �����ϰų� ������ҿ��� ����ϴ� ��� �ݵ�� �α׾ƿ��Ͻðų� �� �������� �����Ͽ�\r\n    �� �մϴ�.\r\n\r\n\r\n\r\n�� ȸ�� Ż��\r\nOOO ȸ���� �������� ������ ���� �� Ż�� �����մϴ�. ȸ�� Ż��� ȸ�� ���� ���� ȭ�鿡�� ��û �����մϴ�. \r\n��, ȸ���� ����ƿ��� �̿� ���� ������ �������� ������ ���� ���, ȸ�� Ż��� �������� �ʽ��ϴ�.\r\n\r\n\r\n\r\n�� ����������ȣ�� ���� ����� ��å\r\nOOO�� ȸ������ ���������� �н�, ����, ����, ���� �Ǵ� �Ѽյ��� �ʵ��� ������ ���� ����� ��å�� �����ϰ� �ֽ�\r\n�ϴ�. \r\n1. ȸ�� �������� ���������� ��й�ȣ�� ���� ��ȣ�Ǹ�, �������� �����ʹ� ������ ���ȱ���� ���� ��ȣ �ǰ� �ֽ��ϴ�. \r\n2. ȸ�� �������� ��й�ȣ�� �̿��� �� ������������ڰ� ����, �ֹε�Ϲ�ȣ, ��ȭ��ȣ �� �����ϱ� ���� ���ڸ� ���\r\n    ��ȣ�� �̿����� �ʵ��� �н����� �ۼ� ��Ģ�� �����ϰ� �����մϴ�.\r\n3. OOO�� ��� ���α׷� �� �Ǽ��ڵ� ��� ����Ʈ������ �̿��Ͽ� ��ǻ�� ���̷����� ���� ���ظ� �����ϰ� ������, \r\n    �ش� ����Ʈ����� ���� �ֱ������� ������Ʈ�ϰ� �ֽ��ϴ�.\r\n4. OOO�� ħ������ ��ɰ� ħ��Ž�� ����� ž���ϰ� �ִ� ���� ����Ϳ� L3 ����ġ ��� ����Ͽ� �������� \r\n    ��Ʈ��ũ ���� ���������� �����ϰ� ��ȣ�ϰ� �ֽ��ϴ�.\r\n5. OOO�� ���� ������ ħ�����ܽý���(Firewall)�� �����Ͽ� 3�� ����������ȣ�ý����� ��ϰ� �ֽ��ϴ�.\r\n6. OOO�� ���������� ����������ȣ�ý��ۿ� ��ȣȭ�Ͽ� �����ϰ� ������, OOO�� ������Ÿ� �ܺη� ���������� \r\n    �۽��ϰų� PC�� ������ ��� ��ȣȭ�Ͽ� �����ϵ��� �ý����� ��ϰ� �ֽ��ϴ�. \r\n\r\n�� �ǰ߼��� �� �Ҹ�ó��\r\nOOO ȸ�� �� OOO�� ����������ȣ�� �����Ͽ� �Ҹ��� ������ ���� �������� ����å���ڿ��� �ǰ��� �ֽø�, ���� ��� ��ġ�Ͽ� ó������� �뺸�� �帮�ڽ��ϴ�. �������� ���� �����̳� ��Ÿ �ɰ��� �������� ħ�� �ÿ��� ���ο��� ��ġ�Ͽ� ����� ��������ħ�� �Ű���(http://www.cyberpr ivacy.or.kr, http://www.1336.or.kr, ��ȭ 02-1336,)�� �Ҹ�ó�� �Ǵ� ���縦 ��û�Ͻ� ���� �ֽ��ϴ�.\r\n\r\n\r\n\r\n�� ������������ ��ȹ�� ���� �� ����\r\nOOO�� ȸ�� ������ ������ ������������� �����Ͽ� ������ ���� ������ �ؼ��ϰڽ��ϴ�.\r\n1. ������������å������ ���� �� ����������ȣ ��Ģ�� ����, ��� ���� ����\r\n2. ��������������� ������ ���� ����\r\n3. ��������ó���ý����� ���� ��� ���� �� �������� Ȯ�� ����\r\n4. �������� ��� �� ������� ��ȣ��ġ\r\n5. ��Ÿ �������� ��ȣ�� ���� �ʿ��� ����\r\n\r\n\r\n\r\n�� �������� ���� �����\r\nOOO�� ���������� ���� �ǰ߼��� �� �Ҹ�ó���� ����ϴ� �������� ��������ڸ� �����ϰ� �ֽ��ϴ�. \r\n- �������� ���� �����\r\n�� �� : OOO\r\n�� å : OOOO ��ǥ\r\n��ȭ��ȣ : 02-xxx-xxxx\r\nE-mail : xxxx@xxxx.com\r\n\r\n\r\n\r\n�� �Ƶ��� ȸ�� ���Կ� ����\r\n1. OOO�� �Ƶ��� ���������� ��ȣ�ϱ� ���Ͽ� �� 14�� �̸��� �Ƶ��� ȸ�� ������ ��û�� ��� �����븮��(�θ�)�� \r\n    ���ǰ� �־�� �մϴ�. �θ���� ����� �������� 14�� �̸��� �̼����ڿ� ���ؼ��� OOO�� ���Ƿ� ȸ������ ����\r\n    �� �� �ֽ��ϴ�. \r\n2. �� 14�� �̸� �̼������� �����븮���� �븮���� å���Ͽ� �ִ� �̼������� ���������� ���� ����, ����, ����öȸ�� \r\n    ��û�� �� ������, �̷��� ��û�� ���� ��� OOO�� ��ü���� �ʿ��� ��ġ�� ���ϰڽ��ϴ�. \r\n\r\n�� �̼����� �ŷ��� öȸ�� ����\r\nOOO�� �̼����ڿ��� �ŷ��� ������ �����븮��(�θ�)�� ���Ǹ� ���� �ǹ��� ������, �����븮��(�θ�)�� ���Ǹ� ���� ���� �ŷ��� ���, �ŷ��� ����� �� �ֽ��ϴ�. ���� �ŷ� ������� �̼������� �����븮��(�θ�)�� �ŷ� ���� �� 7�� �̳��� öȸ�� ��û�� ���, �ŷ��� öȸ(ȯ��)�ϰڽ��ϴ�.\r\n\r\n\r\n\r\n�� ���� ���� ���ۿ� ����\r\n1. OOO�� ȸ���� ������� OOO�� �����ϰ� �ִ� ���񽺿� ���� �ȳ�, ���񽺿� ���� ���� � ���� ������ ����\r\n    �Ӱ� ���� �� �ֽ��ϴ�.\r\n2. OOO�� ȸ���� ������� ���� ������ ������ �� �ֽ��ϴ�. ��, �̷��� ��쿡�� (����)��� ������ ǥ���Ͽ� ȸ��\r\n    ���� ���� �������� ���� �ľ��� �� �ְ� �ϸ�, ���Űź� �ǻ縦 ���� ȸ�����Դ� ���� ������ �������� �ʰڽ��ϴ�.','resno/email/address/tphone/hphone/fax/','resno/email/address/tphone/hphone/fax/'),(29,'join2','','',NULL,'',''),(12,'company','','<P>ȸ��Ұ�</P>','','',''),(13,'privacy','','<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD width=20><IMG src=\'/images/icon_arrow_blue.gif\'></TD>\r\n<TD>ȸ���� �������� �������� �� �̿�</TD></TR>\r\n<TR>\r\n<TD height=5></TD></TR>\r\n<TR>\r\n<TD></TD>\r\n<TD>���� ���Բ��� ��翡�� ��ǰ �� ���� ��ǰ�� ���� �ֹ� �� ����, ��� ������ �̿��ϰ�<BR>�ֹ� ��ǰ ��� �� ȸ������ �����Ǵ� ���� ���� ���񽺸� �̿��ϱ� ���� �ʿ��� �ּ�����<BR>������ �ʼ��� �����ϰ� �ֽ��ϴ�.<BR>��� ȸ������ ����Ͻ� ��� ���� ���������� ������ ���� �����̿ܿ��� ����� ����<BR>�� ������, ȸ�� ���������� ��� ������ �뵵�� ����� ��쿡 �ݵ�� ��� ȸ������ ����Ͻ�<BR>��� ���Բ� ���Ǹ� ���� ���Դϴ�.<BR></TD></TR></TBODY></TABLE><IMG src=\'/images/privacy_line.gif\'><BR>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD vAlign=top width=20><IMG src=\'/images/icon_arrow_blue.gif\'></TD>\r\n<TD>�������� ���� �׸� �� ����, �̿� �Ⱓ ��� ȸ���� ������� ���� ���񽺸� �����ϱ� ���� ���� �޴� �ʼ� ȸ�������� ������ �����ϴ�.</TD></TR>\r\n<TR>\r\n<TD height=5></TD></TR>\r\n<TR>\r\n<TD></TD>\r\n<TD>�� ����<BR>�� �ֹε�Ϲ�ȣ(ȸ���� ���)<BR>�� �ּ�<BR>�� ��ȭ��ȣ(�Ϲ���ȭ�� �ڵ���)<BR>�� ���ID(ȸ���� ���)<BR>�� ��й�ȣ(ȸ���� ���)<BR><BR>�̿ܿ� ȸ�����Խ� ������ ���Ͻ� ��쿡 �߰� ������ �����Ͽ� �����Ͻ� �� �ֵ��� �Ǿ�<BR>������ �Ϻ� ��ǰ �� ���� ��ǰ�� ���� �ֹ� �� �����ÿ� ������ ���Ͻô� ��Ȯ�� �ֹ�<BR>������ �ľ��Ͽ� ��Ȱ�� �ֹ� �� ������ ����� ���Ͽ� �߰� ������ �䱸�ϰ� �ֽ��ϴ�.<BR>ȸ���� Ż���Ͻðų� �ڼ��� �̿����� ���� ȸ�� �ڰ� ����� ��쿡 ��簡 ������ �ش�<BR>���� ���� ������ ��ü ���� �ı�˴ϴ�.<BR></TD></TR></TBODY></TABLE><IMG src=\'/images/privacy_line.gif\'><BR>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD width=20><IMG src=\'/images/icon_arrow_blue.gif\'></TD>\r\n<TD>�Ƶ��� ���� ���� ��ȣ </TD></TR>\r\n<TR>\r\n<TD height=5></TD></TR>\r\n<TR>\r\n<TD></TD>\r\n<TD>���� \'������Ÿ��̿� ���� �� ������ȣ� ���� ���� ��31�� ��1��\'�� ���Ͽ� ��14���̸��� <BR>�Ƶ��� �������� ������ �����븮���� ���Ǹ� �޾ƾ� �մϴ�.<BR>����, ���� ��14���̸��� �Ƶ��� ���ؼ��� ���������� ���� ���� �Ӹ� �ƴ϶�, ȸ������ ������ ���� �ʽ��ϴ�.<BR>��, 14�� �̸��� �Ƶ��� �����븮���� ���� �� ���� �����Ŀ�, ȸ������ ������ �� �ֽ��ϴ�.<BR>����, �� 14�� �̸� �Ƶ��� ���� �븮���� �Ƶ��� ���������� ����, ����, ���� öȸ�� ��û�Ҽ� <BR>������ �̷� ��û�� ���� ��� ���� ��ü���� �ʿ��� ��ġ�� ���մϴ�. <BR></TD></TR></TBODY></TABLE><IMG src=\'/images/privacy_line.gif\'><BR>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD width=20><IMG src=\'/images/icon_arrow_blue.gif\'></TD>\r\n<TD>�������� ���� �� ����</TD></TR>\r\n<TR>\r\n<TD height=5></TD></TR>\r\n<TR>\r\n<TD></TD>\r\n<TD>��� ȸ���� �� ���������� ��Ģ������ ��3��� �� ��3�ڿ��� ���� �� �� ������ ��簡<BR>ȸ���Բ� ���Ǹ� �����ϱ� ���Ͽ� Ư�� ȸ�翡 ���������� �����ϰ��� �� ��쿡�� �ݵ��<BR>ȸ���Բ� �ش�Ǵ� �մ��� ������ ���Ͽ� ���Ǹ� ���ϵ��� �Ǿ� �ֽ��ϴ�.<BR>��, ���� ��쿡 ���Ͽ� ���� ���� ���� ���������� ������ �� �ֽ��ϴ�.<BR><BR>�� ������ ��۾�ü�� ��ۿ� �ʿ��� �ּ����� �̿�������(����, �ּ�, ��ȭ��ȣ)�� �˷��ִ� ���<BR>�� ����ۼ�, �м����� �Ǵ� �������縦 ���Ͽ� �ʿ��� ���μ� Ư�� ������ �ĺ��� �� ����<BR>���·� �����ϴ� ���<BR>�� ���� ����� ������ ��û�� ���� ���.<BR></TD></TR></TBODY></TABLE><IMG src=\'/images/privacy_line.gif\'><BR>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD width=20><IMG src=\'/images/icon_arrow_blue.gif\'></TD>\r\n<TD>�������� ����, ���� �� ���� ó��</TD></TR>\r\n<TR>\r\n<TD height=5></TD></TR>\r\n<TR>\r\n<TD></TD>\r\n<TD>ȸ������ ���Ͻ� ��� ������ ��翡�� ���������� �����Ͻ� �� ������ ������ �ʼ� ������ �����Ͻ� �� �ֽ��ϴ�.<BR>���� ȸ�����Խ� �䱸�� �ʼ� ���� ���� �߰� ������ ������ ����, ����, ������ �� �ֽ��ϴ�.<BR>ȸ������ �������� ���� �� ������ ȸ��Ż��� ����� �����Ϳ��� �α���(Login) �� �̿��Ͻ� �� �ֽ��ϴ�.<BR></TD></TR></TBODY></TABLE><IMG src=\'/images/privacy_line.gif\'><BR>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD width=20><IMG src=\'/images/icon_arrow_blue.gif\'></TD>\r\n<TD>��Ű(Cookie) �</TD></TR>\r\n<TR>\r\n<TD height=5></TD></TR>\r\n<TR>\r\n<TD></TD>\r\n<TD>���� ȸ�������� ���Ͽ� Cookie ����� �̿��ϰ� �ֽ��ϴ�.<BR>�̴� �α׾ƿ�(Logout)�� �ڵ����� ��ǻ�Ϳ� ������� �ʰ� �����ǵ��� �Ǿ� �����Ƿ�<BR>������ҳ� Ÿ���� ����� �� �ִ� ��ǻ�͸� ����� �� ��쿡�� �α���(Login)�� ���� �̿���<BR>�����ø� �ݵ�� �α׾ƿ�(Logout)�� �ֽñ� �ٶ��ϴ�.<BR></TD></TR></TBODY></TABLE><IMG src=\'/images/privacy_line.gif\'><BR>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD width=20><IMG src=\'/images/icon_arrow_blue.gif\'></TD>\r\n<TD>��ȸ������ ������������</TD></TR>\r\n<TR>\r\n<TD height=5></TD></TR>\r\n<TR>\r\n<TD></TD>\r\n<TD>�� ���� ��ȸ�� �� ���� ��ǰ �� ���� ��ǰ�� ���Ÿ� �Ͻ� �� �ֽ��ϴ�.<BR>���� ��ȸ�� �ֹ��� ��� ��� �� ��� ����, ��ǰ ��ۿ� �ݵ�� �ʿ��� ������������ <BR>���Բ� ��û�ϰ� �ֽ��ϴ�.<BR><BR>�� ��翡�� ��ȸ������ ������ �Ͻ� ��� ��ȸ�� ������ �Է��Ͻ� ������ ���� �� ������ <BR>������ ��� ���� �� ��ǰ ��ۿ� ������ �뵵 �ܿ��� �ٸ� ��� �뵵�ε� ������ �ʽ��ϴ�.<BR></TD></TR></TBODY></TABLE><IMG src=\'/images/privacy_line.gif\'><BR>\r\n<TABLE cellSpacing=0 cellPadding=0 border=0>\r\n<TBODY>\r\n<TR>\r\n<TD width=20><IMG src=\'/images/icon_arrow_blue.gif\'></TD>\r\n<TD>���� ���� ��å</TD></TR>\r\n<TR>\r\n<TD height=5></TD></TR>\r\n<TR>\r\n<TD></TD>\r\n<TD>���� ���� ���������� ����� �� �ִ� �η��� �ּ������� �����ϰ� �ش� �ο����� ������,<BR>�������� ���ȱ����� �ǽ��ϰ� �ֽ��ϴ�. ���� ������ ���������� ������ �� �ִ� �ý��ۿ���<BR>2�� ��ȣ ü���� ���߰� �ܺ� ��Ʈ��ũ�κ��� ö���ϰ� �ݸ����� �ܺ� ħ�� �� ���� ħ�Կ� �����ϰ� �ֽ��ϴ�.<BR>�̻��� ����� �������� ��ȣ��å�� ����Ʈ ���°� ���ÿ� �����մϴ�.<BR><BR>���� �������� ��ȣ ����å���ڸ� �Ʒ��� ���� �����մϴ�.<BR><BR>- ����: ����<BR>- ����: ȫ�浿<BR>- E-mail: <A href=\'mailto:help@wizshop.net\'>help@wizshop.net</A><BR></TD></TR></TBODY></TABLE>','','',''),(14,'guide','','<P>�̿�ȳ�</P>','','',''),(16,'sitemap','','','','',''),(17,'faq','','','','',''),(18,'login','','','','',''),(19,'myshop','','','','',''),(20,'basket','','','','',''),(21,'orderform','','','','',''),(22,'orderpay','','','','',''),(23,'ordercom','','','','',''),(24,'prdsearch','','','','',''),(25,'new','','','','',''),(26,'recom','','','','',''),(27,'popular','','','','',''),(28,'sale','','','','',''),(30,'prdview','','<P>&nbsp;</P>','','',''),(31,'best','','','','',''),(32,'orderdel','','','','',''),(33,'reco',NULL,NULL,'�� �� Ģ\r\n1. OOO�� \'������Ÿ��̿�������������ȣ����ѹ���\'���� ����������ȣ ������ ������źΰ� ������ \'����������\r\n    ȣ��ħ\' �� ������������ �����/������ ��ȣ��ġ ���ء��� �ؼ��ϰ� �ֽ��ϴ�. ���� OOO�� \'����������ȣ��å\'�� \r\n    �����Ͽ� ȸ������ �������� ��ȣ�� ���� �ּ��� ���ϰ����� �����մϴ�.\r\n2. OOO�� \'����������ȣ��å\'�� ���� ���� �� ���� ��ħ�� ����� OOO�� ���� ��ħ ���濡 ���� ����� �� �ֽ�\r\n    �ϴ�. OOO�� \'����������ȣ��ħ\'�� ����� ��� ��������� OOO Ȩ�������� �������׿� \r\n    �ּ� 7�ϰ� �Խõ˴ϴ�. \r\n\r\n\r\n�� ��������\r\nOOO�� ���ϲ��� OOO�� �̿����� ���뿡 ���� \"�����Ѵ�\" ��ư �Ǵ� \"�������� �ʴ´�\" ��ư�� Ŭ���� �� �ִ� ������ �����Ͽ�, \"�����Ѵ�\" ��ư�� Ŭ���ϸ� �������� ������ ���� ������ ������ ���ϴ�. ����, ���ϲ��� �������Ѵ١� ��ư�� Ŭ���ϸ� �Ʒ��� �������� ���� �׸� �� ����й�ȣ���� ���ֹε�Ϲ�ȣ���� ������ ������ �׸���� OOO�� ����\r\n�� �����ϱ� ���� ���־�ü�� �����ϴ� �Ϳ� ���� ������ ������ �����մϴ�.\r\n\r\n\r\n1. \"��������\"�� ������ ������Ÿ��̿�������������ȣ����ѹ������� �����ϴ� ���뿡 ����, \'�����ϴ� ���ο� ���� \r\n    �����μ� ���� ������ ���ԵǾ� �ִ� ����, �ֹε�Ϲ�ȣ ���� ���׿� ���Ͽ� ���� ������ �ĺ��� �� �ִ� ����(���� \r\n    ���������δ� Ư�� ������ �ĺ��� �� ������ �ٸ� ������ �����ϰ� �����Ͽ� �ĺ��� �� �ִ� ���� �����Ѵ�)\'�� �ǹ�\r\n    �մϴ�. \r\n2. OOO�� �̿��� Ȯ��, ��ݰ���, �̿� ������ ������ Ȯ��, ����ȸ������ ����ȭ�� ����, ��Ÿ �ΰ����� ���� \r\n    ���Ͽ� ȸ������ ���������� �������̿� �մϴ�. �����ϴ� �������� �׸� ���� ��ü���� �������� �� �̿� ������ \r\n    ������ �����ϴ�.\r\n-  ����, ���̵�, ��й�ȣ, �ֹε�Ϲ�ȣ/����ڵ�Ϲ�ȣ : ȸ���� ���� �̿뿡 ���� ���� Ȯ�� ������ �̿�, \r\n-  �̿� ������ ������ Ȯ��\r\n-  �̸����ּ�, ��ȭ��ȣ, �ѽ���ȣ : ������ ���� ������ ���� �ʼ� ���� Ȯ��, �������� ����, �Ҹ�ó�� ���� ���� ��Ȱ\r\n    �� �ǻ� ����\r\n-  ����� Ȯ��, ���ο� ���� �� �Ż�ǰ�̳� �̺�Ʈ ���� ���� �ȳ�\r\n-  ��������, �ſ�ī�� ���� : �������� �̿� �� ���ſ� ���� ����\r\n-  �ּ� : ������ ������ȸ ����, û���� �� ���θ� ��ǰ ��ۿ� ���� ��Ȯ�� ����� Ȯ��\r\n    ��Ű ( ���̵� ) : ��Ű ��� ���� �湮�ڵ��� ���̵� �ڵ� �м��Ͽ� ��޺� ����ȭ�� ���� ���� ����.\r\n    �������� ������������ �ɼ��� ���������ν� ��Ű�� ����� ������ Ȯ���� ��ġ�ų�, �ƴϸ� ��� ��Ű�� ������ \r\n    �ź��� ���� �ֽ��ϴ�. �׷��� ��Ű�� ������ �ź��� ��� ������ �̿��� ���ѵ� �� �ֽ��ϴ�. \r\n3. OOO�� ȸ�� ���������� ��Ź�������� �ʽ��ϴ�. \r\n4. �̿����� �⺻�� �α� ħ���� ����� �ִ� �ΰ��� ��������(���� �� ����, ��� �� ����, ����� �� ���� ��, ��ġ�� ���� \r\n    �� ���˱��, �ǰ����� �� ����Ȱ ��)�� �䱸���� �ʽ��ϴ�. \r\n5. ���������� ���� �Ⱓ�� \"ȸ���� OOO�� �����ϴ� �������� ���� ��û ��������\"�Դϴ�. OOO�� ȸ��DB�� Ż��\r\n    ��û���� ���������� Ż�� ��� ������� �Ǿ� �ֽ��ϴ�. \r\n    ��, �������� �� �������� ������ �޼��� ��쿡�� ������ ������ ���Ͽ� ������ �ʿ伺�� �ִ� ��쿡�� ������ \r\n    ������ ���� ���� ���������� ������ �� �ֽ��ϴ�.\r\n- ��� �Ǵ� û��öȸ � ���� ��� : 5��\r\n- ��ݰ��� �� ��ȭ���� ���޿� ���� ��� : 5��\r\n- �Һ����� �Ҹ� �Ǵ� ����ó���� ���� ��� : 3�� ��\r\n\r\n\r\n\r\n�� ��3�ڿ� ���� ���� ����\r\n1. OOO�� ȸ������ ���������� �������� Ÿ�� �Ǵ� �ٸ� ȸ�糪 ����� �������� �ʽ��ϴ�. \r\n    ��, ������ �ش��ϴ� ���� ���ܷ� �մϴ�. \r\n-  ������ �̸� ����� ���Ͽ� �ش� �������� ��ϻ���ڿ��� ��û���� ������ �����ϴ� ���\r\n-  ������ �̸��� ���� WHOIS ���񽺸� ���Ͽ� �����ϴ� ��� \r\n-  ������Ÿ��̿�������������ȣ����ѹ��� �� ������ɿ� ���Ͽ� ������� �Ǵ� ���ο��� ������ �Һ��ڴ�ü���� \r\n    ��û�� ���� ��� \r\n-  ���￡ ����� ������ ������� ����ó�� ���� ���� �ⱸ�� ������ ��û�ϴ� ���\r\n-  ���˿� ���� ������� ������ �ְų� ���������������ȸ, �ѱ�������ȣ����� �� ������ü�� ��û�� �ִ� ��� \r\n-  ������ ������ ���Ͽ� ȸ���� ����(����, �ּ�, ��ȭ��ȣ)�� ����ϴ� ��� \r\n-  ����ۼ�, ȫ���ڷ�, �м����� �Ǵ� �������縦 ���Ͽ� �ʿ��� ���μ� Ư�� ������ �ĺ��� �� ���� ���·� ����\r\n    �Ǵ� ���\r\n-  ȸ������ OOO�� ���񽺸� ��û�Ͽ� OOO�� ���� ������ ���� ��۾�ü, �����ݼ��;�ü, ���ι߼� ��ü ��\r\n    �� �ش� ȸ���� ��й�ȣ, �ֹε�Ϲ�ȣ�� �������� �ʴ� �ֹ�����, �ּ��� ����, ����ó ���� �����ϴ� ���\r\n\r\n2. OOO�� ���� �پ��� ���� ������ ���Ͽ� ȸ������ ���������� ���޻翡�� �����ϰų�, ���޻�� �����ϰ��� �� ��\r\n    �� �ݵ�� ������ ȸ�� �������� ���Ǹ� ���ϰڽ��ϴ�. ���޻簡 �������, ���� �Ǵ� �����Ǵ� ���������׸��� ������\r\n    ��, �� �׷��� ���������� �����Ǿ�� �ϴ���, �׸��� �������� ��� ��ȣ, �����Ǵ����� ���� ���������� ���ڿ����� \r\n    ���� �����Ͽ� ���Ǹ� ���ϴ� ������ ��ġ�� �Ǹ�, ���ϲ��� �������� �ʴ� ��쿡�� ���޻翡�� �����ϰų� ���޻�� \r\n    �������� �ʽ��ϴ�.\r\n\r\n\r\n\r\n�� ���������� ���� �� ���� \r\n1. OOO�� ȸ���� �������� �ڽ��� ���������� �����ϰų� �����Ͻ� �� �ֽ��ϴ�. �������� ���� �� ������ ���Ͻô�\r\n    ���� OOO ����Ʈ�� �α׿� �Ͻ� ��, �α׾ƿ� ��ư ���� \'��������\' ��ư�� Ŭ���Ͻʽÿ�. \r\n2. ���� ID�� ��й�ȣ�� �Ҿ������ ȸ���� Ȩ���������� \'ID Ȯ��/��й�ȣ Ȯ��\'���񽺸� ���� ID�� ��й�ȣ�� Ȯ����\r\n    �� �� �ֽ��ϴ�.\r\n3. OOO ȸ�� ID�� ��й�ȣ�� ���� ���� å���� ���ο��� �ֽ��ϴ�.\r\n    ������ ���������� ȿ�������� ��ȣ�ϱ� ���ؼ� �ڽ��� ȸ��ID �� ��й�ȣ�� �����ϰ� �����ϰ� å���� ���� �մϴ�. \r\n    ������ ID�� ��й�ȣ�� �����Ͽ��ٸ� �̿� ���ؼ� OOO�� å���� �����ʽ��ϴ�. �ٸ�, OOO�� ���� Ȥ�� ����\r\n    �� ���� ȸ�� ID�� ��й�ȣ ���⿡ ���ؼ��� �ش� ���� OOO�� å���� ���� �� �ֽ��ϴ�.\r\n    �̿��ڴ� OOO�� ������ �̿��ؼ� ������Ʈ�� �̿��� �ڿ��� �ش� ������ �����Ͻð� �� �������� â�� �ݾ��ֽ�\r\n    �ÿ�. Ư�� ��ǻ�͸� Ÿ�ΰ� �����ϰų� ������ҿ��� ����ϴ� ��� �ݵ�� �α׾ƿ��Ͻðų� �� �������� �����Ͽ�\r\n    �� �մϴ�.\r\n\r\n\r\n\r\n�� ȸ�� Ż��\r\nOOO ȸ���� �������� ������ ���� �� Ż�� �����մϴ�. ȸ�� Ż��� ȸ�� ���� ���� ȭ�鿡�� ��û �����մϴ�. \r\n��, ȸ���� ����ƿ��� �̿� ���� ������ �������� ������ ���� ���, ȸ�� Ż��� �������� �ʽ��ϴ�.\r\n\r\n\r\n\r\n�� ����������ȣ�� ���� ����� ��å\r\nOOO�� ȸ������ ���������� �н�, ����, ����, ���� �Ǵ� �Ѽյ��� �ʵ��� ������ ���� ����� ��å�� �����ϰ� �ֽ�\r\n�ϴ�. \r\n1. ȸ�� �������� ���������� ��й�ȣ�� ���� ��ȣ�Ǹ�, �������� �����ʹ� ������ ���ȱ���� ���� ��ȣ �ǰ� �ֽ��ϴ�. \r\n2. ȸ�� �������� ��й�ȣ�� �̿��� �� ������������ڰ� ����, �ֹε�Ϲ�ȣ, ��ȭ��ȣ �� �����ϱ� ���� ���ڸ� ���\r\n    ��ȣ�� �̿����� �ʵ��� �н����� �ۼ� ��Ģ�� �����ϰ� �����մϴ�.\r\n3. OOO�� ��� ���α׷� �� �Ǽ��ڵ� ��� ����Ʈ������ �̿��Ͽ� ��ǻ�� ���̷����� ���� ���ظ� �����ϰ� ������, \r\n    �ش� ����Ʈ����� ���� �ֱ������� ������Ʈ�ϰ� �ֽ��ϴ�.\r\n4. OOO�� ħ������ ��ɰ� ħ��Ž�� ����� ž���ϰ� �ִ� ���� ����Ϳ� L3 ����ġ ��� ����Ͽ� �������� \r\n    ��Ʈ��ũ ���� ���������� �����ϰ� ��ȣ�ϰ� �ֽ��ϴ�.\r\n5. OOO�� ���� ������ ħ�����ܽý���(Firewall)�� �����Ͽ� 3�� ����������ȣ�ý����� ��ϰ� �ֽ��ϴ�.\r\n6. OOO�� ���������� ����������ȣ�ý��ۿ� ��ȣȭ�Ͽ� �����ϰ� ������, OOO�� ������Ÿ� �ܺη� ���������� \r\n    �۽��ϰų� PC�� ������ ��� ��ȣȭ�Ͽ� �����ϵ��� �ý����� ��ϰ� �ֽ��ϴ�. \r\n\r\n�� �ǰ߼��� �� �Ҹ�ó��\r\nOOO ȸ�� �� OOO�� ����������ȣ�� �����Ͽ� �Ҹ��� ������ ���� �������� ����å���ڿ��� �ǰ��� �ֽø�, ���� ��� ��ġ�Ͽ� ó������� �뺸�� �帮�ڽ��ϴ�. �������� ���� �����̳� ��Ÿ �ɰ��� �������� ħ�� �ÿ��� ���ο��� ��ġ�Ͽ� ����� ��������ħ�� �Ű���(http://www.cyberpr ivacy.or.kr, http://www.1336.or.kr, ��ȭ 02-1336,)�� �Ҹ�ó�� �Ǵ� ���縦 ��û�Ͻ� ���� �ֽ��ϴ�.\r\n\r\n\r\n\r\n�� ������������ ��ȹ�� ���� �� ����\r\nOOO�� ȸ�� ������ ������ ������������� �����Ͽ� ������ ���� ������ �ؼ��ϰڽ��ϴ�.\r\n1. ������������å������ ���� �� ����������ȣ ��Ģ�� ����, ��� ���� ����\r\n2. ��������������� ������ ���� ����\r\n3. ��������ó���ý����� ���� ��� ���� �� �������� Ȯ�� ����\r\n4. �������� ��� �� ������� ��ȣ��ġ\r\n5. ��Ÿ �������� ��ȣ�� ���� �ʿ��� ����\r\n\r\n\r\n\r\n�� �������� ���� �����\r\nOOO�� ���������� ���� �ǰ߼��� �� �Ҹ�ó���� ����ϴ� �������� ��������ڸ� �����ϰ� �ֽ��ϴ�. \r\n- �������� ���� �����\r\n�� �� : OOO\r\n�� å : OOOO ��ǥ\r\n��ȭ��ȣ : 02-xxx-xxxx\r\nE-mail : xxxx@xxxx.com\r\n\r\n\r\n\r\n�� �Ƶ��� ȸ�� ���Կ� ����\r\n1. OOO�� �Ƶ��� ���������� ��ȣ�ϱ� ���Ͽ� �� 14�� �̸��� �Ƶ��� ȸ�� ������ ��û�� ��� �����븮��(�θ�)�� \r\n    ���ǰ� �־�� �մϴ�. �θ���� ����� �������� 14�� �̸��� �̼����ڿ� ���ؼ��� OOO�� ���Ƿ� ȸ������ ����\r\n    �� �� �ֽ��ϴ�. \r\n2. �� 14�� �̸� �̼������� �����븮���� �븮���� å���Ͽ� �ִ� �̼������� ���������� ���� ����, ����, ����öȸ�� \r\n    ��û�� �� ������, �̷��� ��û�� ���� ��� OOO�� ��ü���� �ʿ��� ��ġ�� ���ϰڽ��ϴ�. \r\n\r\n�� �̼����� �ŷ��� öȸ�� ����\r\nOOO�� �̼����ڿ��� �ŷ��� ������ �����븮��(�θ�)�� ���Ǹ� ���� �ǹ��� ������, �����븮��(�θ�)�� ���Ǹ� ���� ���� �ŷ��� ���, �ŷ��� ����� �� �ֽ��ϴ�. ���� �ŷ� ������� �̼������� �����븮��(�θ�)�� �ŷ� ���� �� 7�� �̳��� öȸ�� ��û�� ���, �ŷ��� öȸ(ȯ��)�ϰڽ��ϴ�.\r\n\r\n\r\n\r\n�� ���� ���� ���ۿ� ����\r\n1. OOO�� ȸ���� ������� OOO�� �����ϰ� �ִ� ���񽺿� ���� �ȳ�, ���񽺿� ���� ���� � ���� ������ ����\r\n    �Ӱ� ���� �� �ֽ��ϴ�.\r\n2. OOO�� ȸ���� ������� ���� ������ ������ �� �ֽ��ϴ�. ��, �̷��� ��쿡�� (����)��� ������ ǥ���Ͽ� ȸ��\r\n    ���� ���� �������� ���� �ľ��� �� �ְ� �ϸ�, ���Űź� �ǻ縦 ���� ȸ�����Դ� ���� ������ �������� �ʰڽ��ϴ�.',NULL,NULL),(34,'center',NULL,NULL,'�� �� Ģ\r\n1. OOO�� \'������Ÿ��̿�������������ȣ����ѹ���\'���� ����������ȣ ������ ������źΰ� ������ \'����������\r\n    ȣ��ħ\' �� ������������ �����/������ ��ȣ��ġ ���ء��� �ؼ��ϰ� �ֽ��ϴ�. ���� OOO�� \'����������ȣ��å\'�� \r\n    �����Ͽ� ȸ������ �������� ��ȣ�� ���� �ּ��� ���ϰ����� �����մϴ�.\r\n2. OOO�� \'����������ȣ��å\'�� ���� ���� �� ���� ��ħ�� ����� OOO�� ���� ��ħ ���濡 ���� ����� �� �ֽ�\r\n    �ϴ�. OOO�� \'����������ȣ��ħ\'�� ����� ��� ��������� OOO Ȩ�������� �������׿� \r\n    �ּ� 7�ϰ� �Խõ˴ϴ�. \r\n\r\n\r\n�� ��������\r\nOOO�� ���ϲ��� OOO�� �̿����� ���뿡 ���� \"�����Ѵ�\" ��ư �Ǵ� \"�������� �ʴ´�\" ��ư�� Ŭ���� �� �ִ� ������ �����Ͽ�, \"�����Ѵ�\" ��ư�� Ŭ���ϸ� �������� ������ ���� ������ ������ ���ϴ�. ����, ���ϲ��� �������Ѵ١� ��ư�� Ŭ���ϸ� �Ʒ��� �������� ���� �׸� �� ����й�ȣ���� ���ֹε�Ϲ�ȣ���� ������ ������ �׸���� OOO�� ����\r\n�� �����ϱ� ���� ���־�ü�� �����ϴ� �Ϳ� ���� ������ ������ �����մϴ�.\r\n\r\n\r\n1. \"��������\"�� ������ ������Ÿ��̿�������������ȣ����ѹ������� �����ϴ� ���뿡 ����, \'�����ϴ� ���ο� ���� \r\n    �����μ� ���� ������ ���ԵǾ� �ִ� ����, �ֹε�Ϲ�ȣ ���� ���׿� ���Ͽ� ���� ������ �ĺ��� �� �ִ� ����(���� \r\n    ���������δ� Ư�� ������ �ĺ��� �� ������ �ٸ� ������ �����ϰ� �����Ͽ� �ĺ��� �� �ִ� ���� �����Ѵ�)\'�� �ǹ�\r\n    �մϴ�. \r\n2. OOO�� �̿��� Ȯ��, ��ݰ���, �̿� ������ ������ Ȯ��, ����ȸ������ ����ȭ�� ����, ��Ÿ �ΰ����� ���� \r\n    ���Ͽ� ȸ������ ���������� �������̿� �մϴ�. �����ϴ� �������� �׸� ���� ��ü���� �������� �� �̿� ������ \r\n    ������ �����ϴ�.\r\n-  ����, ���̵�, ��й�ȣ, �ֹε�Ϲ�ȣ/����ڵ�Ϲ�ȣ : ȸ���� ���� �̿뿡 ���� ���� Ȯ�� ������ �̿�, \r\n-  �̿� ������ ������ Ȯ��\r\n-  �̸����ּ�, ��ȭ��ȣ, �ѽ���ȣ : ������ ���� ������ ���� �ʼ� ���� Ȯ��, �������� ����, �Ҹ�ó�� ���� ���� ��Ȱ\r\n    �� �ǻ� ����\r\n-  ����� Ȯ��, ���ο� ���� �� �Ż�ǰ�̳� �̺�Ʈ ���� ���� �ȳ�\r\n-  ��������, �ſ�ī�� ���� : �������� �̿� �� ���ſ� ���� ����\r\n-  �ּ� : ������ ������ȸ ����, û���� �� ���θ� ��ǰ ��ۿ� ���� ��Ȯ�� ����� Ȯ��\r\n    ��Ű ( ���̵� ) : ��Ű ��� ���� �湮�ڵ��� ���̵� �ڵ� �м��Ͽ� ��޺� ����ȭ�� ���� ���� ����.\r\n    �������� ������������ �ɼ��� ���������ν� ��Ű�� ����� ������ Ȯ���� ��ġ�ų�, �ƴϸ� ��� ��Ű�� ������ \r\n    �ź��� ���� �ֽ��ϴ�. �׷��� ��Ű�� ������ �ź��� ��� ������ �̿��� ���ѵ� �� �ֽ��ϴ�. \r\n3. OOO�� ȸ�� ���������� ��Ź�������� �ʽ��ϴ�. \r\n4. �̿����� �⺻�� �α� ħ���� ����� �ִ� �ΰ��� ��������(���� �� ����, ��� �� ����, ����� �� ���� ��, ��ġ�� ���� \r\n    �� ���˱��, �ǰ����� �� ����Ȱ ��)�� �䱸���� �ʽ��ϴ�. \r\n5. ���������� ���� �Ⱓ�� \"ȸ���� OOO�� �����ϴ� �������� ���� ��û ��������\"�Դϴ�. OOO�� ȸ��DB�� Ż��\r\n    ��û���� ���������� Ż�� ��� ������� �Ǿ� �ֽ��ϴ�. \r\n    ��, �������� �� �������� ������ �޼��� ��쿡�� ������ ������ ���Ͽ� ������ �ʿ伺�� �ִ� ��쿡�� ������ \r\n    ������ ���� ���� ���������� ������ �� �ֽ��ϴ�.\r\n- ��� �Ǵ� û��öȸ � ���� ��� : 5��\r\n- ��ݰ��� �� ��ȭ���� ���޿� ���� ��� : 5��\r\n- �Һ����� �Ҹ� �Ǵ� ����ó���� ���� ��� : 3�� ��\r\n\r\n\r\n\r\n�� ��3�ڿ� ���� ���� ����\r\n1. OOO�� ȸ������ ���������� �������� Ÿ�� �Ǵ� �ٸ� ȸ�糪 ����� �������� �ʽ��ϴ�. \r\n    ��, ������ �ش��ϴ� ���� ���ܷ� �մϴ�. \r\n-  ������ �̸� ����� ���Ͽ� �ش� �������� ��ϻ���ڿ��� ��û���� ������ �����ϴ� ���\r\n-  ������ �̸��� ���� WHOIS ���񽺸� ���Ͽ� �����ϴ� ��� \r\n-  ������Ÿ��̿�������������ȣ����ѹ��� �� ������ɿ� ���Ͽ� ������� �Ǵ� ���ο��� ������ �Һ��ڴ�ü���� \r\n    ��û�� ���� ��� \r\n-  ���￡ ����� ������ ������� ����ó�� ���� ���� �ⱸ�� ������ ��û�ϴ� ���\r\n-  ���˿� ���� ������� ������ �ְų� ���������������ȸ, �ѱ�������ȣ����� �� ������ü�� ��û�� �ִ� ��� \r\n-  ������ ������ ���Ͽ� ȸ���� ����(����, �ּ�, ��ȭ��ȣ)�� ����ϴ� ��� \r\n-  ����ۼ�, ȫ���ڷ�, �м����� �Ǵ� �������縦 ���Ͽ� �ʿ��� ���μ� Ư�� ������ �ĺ��� �� ���� ���·� ����\r\n    �Ǵ� ���\r\n-  ȸ������ OOO�� ���񽺸� ��û�Ͽ� OOO�� ���� ������ ���� ��۾�ü, �����ݼ��;�ü, ���ι߼� ��ü ��\r\n    �� �ش� ȸ���� ��й�ȣ, �ֹε�Ϲ�ȣ�� �������� �ʴ� �ֹ�����, �ּ��� ����, ����ó ���� �����ϴ� ���\r\n\r\n2. OOO�� ���� �پ��� ���� ������ ���Ͽ� ȸ������ ���������� ���޻翡�� �����ϰų�, ���޻�� �����ϰ��� �� ��\r\n    �� �ݵ�� ������ ȸ�� �������� ���Ǹ� ���ϰڽ��ϴ�. ���޻簡 �������, ���� �Ǵ� �����Ǵ� ���������׸��� ������\r\n    ��, �� �׷��� ���������� �����Ǿ�� �ϴ���, �׸��� �������� ��� ��ȣ, �����Ǵ����� ���� ���������� ���ڿ����� \r\n    ���� �����Ͽ� ���Ǹ� ���ϴ� ������ ��ġ�� �Ǹ�, ���ϲ��� �������� �ʴ� ��쿡�� ���޻翡�� �����ϰų� ���޻�� \r\n    �������� �ʽ��ϴ�.\r\n\r\n\r\n\r\n�� ���������� ���� �� ���� \r\n1. OOO�� ȸ���� �������� �ڽ��� ���������� �����ϰų� �����Ͻ� �� �ֽ��ϴ�. �������� ���� �� ������ ���Ͻô�\r\n    ���� OOO ����Ʈ�� �α׿� �Ͻ� ��, �α׾ƿ� ��ư ���� \'��������\' ��ư�� Ŭ���Ͻʽÿ�. \r\n2. ���� ID�� ��й�ȣ�� �Ҿ������ ȸ���� Ȩ���������� \'ID Ȯ��/��й�ȣ Ȯ��\'���񽺸� ���� ID�� ��й�ȣ�� Ȯ����\r\n    �� �� �ֽ��ϴ�.\r\n3. OOO ȸ�� ID�� ��й�ȣ�� ���� ���� å���� ���ο��� �ֽ��ϴ�.\r\n    ������ ���������� ȿ�������� ��ȣ�ϱ� ���ؼ� �ڽ��� ȸ��ID �� ��й�ȣ�� �����ϰ� �����ϰ� å���� ���� �մϴ�. \r\n    ������ ID�� ��й�ȣ�� �����Ͽ��ٸ� �̿� ���ؼ� OOO�� å���� �����ʽ��ϴ�. �ٸ�, OOO�� ���� Ȥ�� ����\r\n    �� ���� ȸ�� ID�� ��й�ȣ ���⿡ ���ؼ��� �ش� ���� OOO�� å���� ���� �� �ֽ��ϴ�.\r\n    �̿��ڴ� OOO�� ������ �̿��ؼ� ������Ʈ�� �̿��� �ڿ��� �ش� ������ �����Ͻð� �� �������� â�� �ݾ��ֽ�\r\n    �ÿ�. Ư�� ��ǻ�͸� Ÿ�ΰ� �����ϰų� ������ҿ��� ����ϴ� ��� �ݵ�� �α׾ƿ��Ͻðų� �� �������� �����Ͽ�\r\n    �� �մϴ�.\r\n\r\n\r\n\r\n�� ȸ�� Ż��\r\nOOO ȸ���� �������� ������ ���� �� Ż�� �����մϴ�. ȸ�� Ż��� ȸ�� ���� ���� ȭ�鿡�� ��û �����մϴ�. \r\n��, ȸ���� ����ƿ��� �̿� ���� ������ �������� ������ ���� ���, ȸ�� Ż��� �������� �ʽ��ϴ�.\r\n\r\n\r\n\r\n�� ����������ȣ�� ���� ����� ��å\r\nOOO�� ȸ������ ���������� �н�, ����, ����, ���� �Ǵ� �Ѽյ��� �ʵ��� ������ ���� ����� ��å�� �����ϰ� �ֽ�\r\n�ϴ�. \r\n1. ȸ�� �������� ���������� ��й�ȣ�� ���� ��ȣ�Ǹ�, �������� �����ʹ� ������ ���ȱ���� ���� ��ȣ �ǰ� �ֽ��ϴ�. \r\n2. ȸ�� �������� ��й�ȣ�� �̿��� �� ������������ڰ� ����, �ֹε�Ϲ�ȣ, ��ȭ��ȣ �� �����ϱ� ���� ���ڸ� ���\r\n    ��ȣ�� �̿����� �ʵ��� �н����� �ۼ� ��Ģ�� �����ϰ� �����մϴ�.\r\n3. OOO�� ��� ���α׷� �� �Ǽ��ڵ� ��� ����Ʈ������ �̿��Ͽ� ��ǻ�� ���̷����� ���� ���ظ� �����ϰ� ������, \r\n    �ش� ����Ʈ����� ���� �ֱ������� ������Ʈ�ϰ� �ֽ��ϴ�.\r\n4. OOO�� ħ������ ��ɰ� ħ��Ž�� ����� ž���ϰ� �ִ� ���� ����Ϳ� L3 ����ġ ��� ����Ͽ� �������� \r\n    ��Ʈ��ũ ���� ���������� �����ϰ� ��ȣ�ϰ� �ֽ��ϴ�.\r\n5. OOO�� ���� ������ ħ�����ܽý���(Firewall)�� �����Ͽ� 3�� ����������ȣ�ý����� ��ϰ� �ֽ��ϴ�.\r\n6. OOO�� ���������� ����������ȣ�ý��ۿ� ��ȣȭ�Ͽ� �����ϰ� ������, OOO�� ������Ÿ� �ܺη� ���������� \r\n    �۽��ϰų� PC�� ������ ��� ��ȣȭ�Ͽ� �����ϵ��� �ý����� ��ϰ� �ֽ��ϴ�. \r\n\r\n�� �ǰ߼��� �� �Ҹ�ó��\r\nOOO ȸ�� �� OOO�� ����������ȣ�� �����Ͽ� �Ҹ��� ������ ���� �������� ����å���ڿ��� �ǰ��� �ֽø�, ���� ��� ��ġ�Ͽ� ó������� �뺸�� �帮�ڽ��ϴ�. �������� ���� �����̳� ��Ÿ �ɰ��� �������� ħ�� �ÿ��� ���ο��� ��ġ�Ͽ� ����� ��������ħ�� �Ű���(http://www.cyberpr ivacy.or.kr, http://www.1336.or.kr, ��ȭ 02-1336,)�� �Ҹ�ó�� �Ǵ� ���縦 ��û�Ͻ� ���� �ֽ��ϴ�.\r\n\r\n\r\n\r\n�� ������������ ��ȹ�� ���� �� ����\r\nOOO�� ȸ�� ������ ������ ������������� �����Ͽ� ������ ���� ������ �ؼ��ϰڽ��ϴ�.\r\n1. ������������å������ ���� �� ����������ȣ ��Ģ�� ����, ��� ���� ����\r\n2. ��������������� ������ ���� ����\r\n3. ��������ó���ý����� ���� ��� ���� �� �������� Ȯ�� ����\r\n4. �������� ��� �� ������� ��ȣ��ġ\r\n5. ��Ÿ �������� ��ȣ�� ���� �ʿ��� ����\r\n\r\n\r\n\r\n�� �������� ���� �����\r\nOOO�� ���������� ���� �ǰ߼��� �� �Ҹ�ó���� ����ϴ� �������� ��������ڸ� �����ϰ� �ֽ��ϴ�. \r\n- �������� ���� �����\r\n�� �� : OOO\r\n�� å : OOOO ��ǥ\r\n��ȭ��ȣ : 02-xxx-xxxx\r\nE-mail : xxxx@xxxx.com\r\n\r\n\r\n\r\n�� �Ƶ��� ȸ�� ���Կ� ����\r\n1. OOO�� �Ƶ��� ���������� ��ȣ�ϱ� ���Ͽ� �� 14�� �̸��� �Ƶ��� ȸ�� ������ ��û�� ��� �����븮��(�θ�)�� \r\n    ���ǰ� �־�� �մϴ�. �θ���� ����� �������� 14�� �̸��� �̼����ڿ� ���ؼ��� OOO�� ���Ƿ� ȸ������ ����\r\n    �� �� �ֽ��ϴ�. \r\n2. �� 14�� �̸� �̼������� �����븮���� �븮���� å���Ͽ� �ִ� �̼������� ���������� ���� ����, ����, ����öȸ�� \r\n    ��û�� �� ������, �̷��� ��û�� ���� ��� OOO�� ��ü���� �ʿ��� ��ġ�� ���ϰڽ��ϴ�. \r\n\r\n�� �̼����� �ŷ��� öȸ�� ����\r\nOOO�� �̼����ڿ��� �ŷ��� ������ �����븮��(�θ�)�� ���Ǹ� ���� �ǹ��� ������, �����븮��(�θ�)�� ���Ǹ� ���� ���� �ŷ��� ���, �ŷ��� ����� �� �ֽ��ϴ�. ���� �ŷ� ������� �̼������� �����븮��(�θ�)�� �ŷ� ���� �� 7�� �̳��� öȸ�� ��û�� ���, �ŷ��� öȸ(ȯ��)�ϰڽ��ϴ�.\r\n\r\n\r\n\r\n�� ���� ���� ���ۿ� ����\r\n1. OOO�� ȸ���� ������� OOO�� �����ϰ� �ִ� ���񽺿� ���� �ȳ�, ���񽺿� ���� ���� � ���� ������ ����\r\n    �Ӱ� ���� �� �ֽ��ϴ�.\r\n2. OOO�� ȸ���� ������� ���� ������ ������ �� �ֽ��ϴ�. ��, �̷��� ��쿡�� (����)��� ������ ǥ���Ͽ� ȸ��\r\n    ���� ���� �������� ���� �ľ��� �� �ְ� �ϸ�, ���Űź� �ǻ縦 ���� ȸ�����Դ� ���� ������ �������� �ʰڽ��ϴ�.',NULL,NULL);
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
INSERT INTO `wiz_pollinfo` VALUES ('poll','','','','','','','','','pollBasic','�','','<table width=\'100%\' cellspacing=\'0\' cellpadding=\'0\' border=\'0\'>\r\n  <tr><td><b>{SUBJECT}</b></td></tr>\r\n  <tr><td>{CONTENT}</td></tr>\r\n\r\n  [LOOP]\r\n  <tr><td><img src=\"/images/point.gif\" align=\"absmiddle\"> {QUESTION}</td></tr>\r\n\r\n    [LOOP2]\r\n    <tr><td> {ANSWER} </td></tr>\r\n    [/LOOP2]\r\n\r\n  [/LOOP]\r\n  <tr><td height=5></td></tr>\r\n  <tr><td align=center>{VOTE_BTN} {VIEW_BTN}</td></tr>\r\n</table>','','Y','Y','%Y.%m.%d','%Y.%m.%d','Y',20,5,2,0,'','','2008-12-22');
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
INSERT INTO `wiz_shopinfo` VALUES ('�Ҽ�Ŀ�ӽ� �ַ��','http://wizoneday.anywiz.co.kr','help@oneday.com','000-0000-0000','000-0000-0000','1513d9e161a40fe991ae002a84936eb8\r\nde1637fbf193d71bcbe718ac82df5ee3','1292217562','wizoneday','1234','34138f076d918cb3b7f91205181fb3ab','663c13d1d636f6ea10e3be4d8a25710b','::::: �����̸� ������ :::::','Copyright �� 2009 ����Ʈ�� All rights reserved.','000-00-000000','�����̸�','��ǥ��','000-000','���� OO�� OO�� OOO-O����','����','�����̸�','00-0000-0000','00-0000-0000','/admin/main/main.php','wizshop','Y','Y','Y','Y','Y','N','','','Y','1. (��)�����̸����� �Ǹ��� ��ǰ�� A/S �Ⱓ�� 6���� �Դϴ�.\r\n2. �� �������� ���� ���Ͽ��� ��ȿ �մϴ�.\r\n3. ��Ÿ ���ǻ����� 000-0000-0000������ ��ȭ �ֽñ� �ٶ��ϴ�..','N','','2011-02-23');
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
INSERT INTO `wiz_tabledesc` VALUES (1,'wiz_admin','<b>���������̺�</b>\r\n������ ������̺��Դϴ�.','anywiz',NULL),(2,'wiz_admin',NULL,'id','���̵�'),(3,'wiz_admin',NULL,'passwd','��й�ȣ'),(4,'wiz_admin',NULL,'name','�̸�'),(5,'wiz_admin',NULL,'resno','�ֹε�Ϲ�ȣ'),(6,'wiz_admin',NULL,'email','�̸���'),(7,'wiz_admin',NULL,'tphone','��ȭ��ȣ'),(8,'wiz_admin',NULL,'hphone','�޴���ȭ��ȣ'),(9,'wiz_admin',NULL,'post','�����ȣ'),(10,'wiz_admin',NULL,'address','�ּ�'),(11,'wiz_admin',NULL,'address2','���ּ�'),(12,'wiz_admin',NULL,'part','����'),(13,'wiz_admin',NULL,'permi','������ ���ٱ���'),(14,'wiz_admin',NULL,'last','������ ���ӽð�'),(15,'wiz_admin',NULL,'wdate','�����'),(16,'wiz_admin',NULL,'descript','�������ּ�'),(17,'wiz_adminlog','<b>������ ���ӷα� ���̺�</b>\r\n������ ���ӷα� ���̺��Դϴ�.','anywiz',NULL),(18,'wiz_adminlog',NULL,'idx','�ε���'),(19,'wiz_adminlog',NULL,'status','����'),(20,'wiz_adminlog',NULL,'admin_id','���� ���̵�'),(21,'wiz_adminlog',NULL,'ip','IP'),(22,'wiz_adminlog',NULL,'date','������'),(23,'wiz_adminlog','<b>������ ���ӷα� ���̺�</b>\r\n������ ���ӷα� ���̺��Դϴ�.','anywiz',NULL),(24,'wiz_adminlog',NULL,'idx','�ε���'),(25,'wiz_adminlog',NULL,'status','����'),(26,'wiz_adminlog',NULL,'admin_id','���� ���̵�'),(27,'wiz_adminlog',NULL,'ip','IP'),(28,'wiz_adminlog',NULL,'date','������'),(29,'wiz_banner','<b>��� ���̺�</b>\r\n��� ���̺��Դϴ�.','anywiz',NULL),(30,'wiz_banner',NULL,'idx','�ε���'),(31,'wiz_banner',NULL,'name','��ʱ׷��ڵ�'),(32,'wiz_banner',NULL,'align','���İ�'),(33,'wiz_banner',NULL,'prior','�켱����'),(34,'wiz_banner',NULL,'isuse','��뿩��'),(35,'wiz_banner',NULL,'link_url','��ũ�ּ�'),(36,'wiz_banner',NULL,'link_target','��ũTarget'),(37,'wiz_banner',NULL,'de_type','�����ι��'),(38,'wiz_banner',NULL,'de_img','����̹���'),(39,'wiz_banner',NULL,'de_html','��ʳ���'),(40,'wiz_bannerinfo','<b>��ʱ׷� ���̺�</b>\r\n��ʱ׸� ���̺��Դϴ�.','anywiz',NULL),(41,'wiz_bannerinfo',NULL,'idx','�ε���'),(42,'wiz_bannerinfo',NULL,'title','��ʱ׷��̸�'),(43,'wiz_bannerinfo',NULL,'name','��ʱ׷��ڵ�'),(44,'wiz_bannerinfo',NULL,'types','�������'),(45,'wiz_bannerinfo',NULL,'types_num','��ʰ���'),(46,'wiz_bannerinfo',NULL,'isuse','��뿩��'),(47,'wiz_basket','<b>��ٱ��� ���̺�</b>\r\n��ٱ��� ���̺��Դϴ�.','anywiz',NULL),(48,'wiz_basket',NULL,'idx','�ε���'),(49,'wiz_basket',NULL,'orderid','�ֹ���ȣ'),(50,'wiz_basket',NULL,'prdcode','��ǰ�ڵ�'),(51,'wiz_basket',NULL,'prdname','��ǰ��'),(52,'wiz_basket',NULL,'prdimg','��ǰ�̹���'),(53,'wiz_basket',NULL,'prdprice','��ǰ����'),(54,'wiz_basket',NULL,'prdreserve','������'),(55,'wiz_basket',NULL,'opttitle','�ɼǸ�1'),(56,'wiz_basket',NULL,'optcode','�ɼǳ���1'),(57,'wiz_basket',NULL,'opttitle2','�ɼǸ�2'),(58,'wiz_basket',NULL,'optcode2','�ɼǳ���2'),(59,'wiz_basket',NULL,'opttitle3','�ɼǸ�3'),(60,'wiz_basket',NULL,'optcode3','�ɼǳ���3'),(61,'wiz_basket',NULL,'opttitle4','�ɼǸ�4'),(62,'wiz_basket',NULL,'optcode4','�ɼǳ���4'),(63,'wiz_basket',NULL,'opttitle5','�ɼǸ�5'),(64,'wiz_basket',NULL,'optcode5','�ɼǳ���5'),(65,'wiz_basket',NULL,'opttitle6','�ɼǸ�6'),(66,'wiz_basket',NULL,'optcode6','�ɼǳ���6'),(67,'wiz_basket',NULL,'opttitle7','�ɼǸ�7'),(68,'wiz_basket',NULL,'optcode7','�ɼǳ���7'),(69,'wiz_basket',NULL,'amount','����'),(70,'wiz_basket',NULL,'wdate','�����'),(71,'wiz_basket',NULL,'status','����'),(72,'wiz_basket',NULL,'admin','��� ó�� ������'),(73,'wiz_basket',NULL,'bank','ȯ�Ұ�������'),(74,'wiz_basket',NULL,'account','ȯ�Ұ��¹�ȣ'),(75,'wiz_basket',NULL,'acc_name','ȯ�Ұ��¿�����'),(76,'wiz_basket',NULL,'reason','��һ���'),(77,'wiz_basket',NULL,'memo','�޸�'),(78,'wiz_basket',NULL,'repay','ȯ�ҹ��'),(79,'wiz_basket',NULL,'ca_date','��ҿ�û��'),(80,'wiz_basket',NULL,'cc_date','��ҿϷ���'),(81,'wiz_basket',NULL,'del_type','��۹��'),(82,'wiz_basket',NULL,'del_price','��۷�'),(83,'wiz_basket_tmp','<b>��ٱ��� �ӽ� ���̺�</b>\r\n��ٱ��� �ӽ� ���̺��Դϴ�.','anywiz',NULL),(84,'wiz_basket_tmp',NULL,'idx','�ε���'),(85,'wiz_basket_tmp',NULL,'uniq_id','������(��Ű)'),(86,'wiz_basket_tmp',NULL,'prdcode','��ǰ�ڵ�'),(87,'wiz_basket_tmp',NULL,'prdname','��ǰ��'),(88,'wiz_basket_tmp',NULL,'prdimg','��ǰ�̹���'),(89,'wiz_basket_tmp',NULL,'prdprice','��ǰ����'),(90,'wiz_basket_tmp',NULL,'prdreserve','������'),(91,'wiz_basket_tmp',NULL,'opttitle','�ɼǸ�1'),(92,'wiz_basket_tmp',NULL,'optcode','�ɼǳ���1'),(93,'wiz_basket_tmp',NULL,'opttitle2','�ɼǸ�2'),(94,'wiz_basket_tmp',NULL,'optcode2','�ɼǳ���2'),(95,'wiz_basket_tmp',NULL,'opttitle3','�ɼǸ�3'),(96,'wiz_basket_tmp',NULL,'optcode3','�ɼǳ���3'),(97,'wiz_basket_tmp',NULL,'opttitle4','�ɼǸ�4'),(98,'wiz_basket_tmp',NULL,'optcode4','�ɼǳ���4'),(99,'wiz_basket_tmp',NULL,'opttitle5','�ɼǸ�5'),(100,'wiz_basket_tmp',NULL,'optcode5','�ɼǳ���5'),(101,'wiz_basket_tmp',NULL,'opttitle6','�ɼǸ�6'),(102,'wiz_basket_tmp',NULL,'optcode6','�ɼǳ���6'),(103,'wiz_basket_tmp',NULL,'opttitle7','�ɼǸ�7'),(104,'wiz_basket_tmp',NULL,'optcode7','�ɼǳ���7'),(105,'wiz_basket_tmp',NULL,'amount','����'),(106,'wiz_basket_tmp',NULL,'wdate','�����'),(107,'wiz_basket_tmp',NULL,'status','����'),(108,'wiz_basket_tmp',NULL,'admin','���ó�� ������'),(109,'wiz_basket_tmp',NULL,'bank','ȯ�Ұ�������'),(110,'wiz_basket_tmp',NULL,'account','ȯ�Ұ��¹�ȣ'),(111,'wiz_basket_tmp',NULL,'acc_name','ȯ�Ұ��¿�����'),(112,'wiz_basket_tmp',NULL,'reason','��һ���'),(113,'wiz_basket_tmp',NULL,'memo','�޸�'),(114,'wiz_basket_tmp',NULL,'repay','ȯ�ҹ��'),(115,'wiz_basket_tmp',NULL,'ca_date','��ҿ�û��'),(116,'wiz_basket_tmp',NULL,'cc_date','��ҿϷ���'),(117,'wiz_bbs','<b>�Խù� ���̺�</b>\r\n�Խù� ���̺��Դϴ�.','anywiz',NULL),(118,'wiz_bbs',NULL,'idx','�ε���'),(119,'wiz_bbs',NULL,'prdcode','��ǰ�ڵ�'),(120,'wiz_bbs',NULL,'code','�Խ����ڵ�'),(121,'wiz_bbs',NULL,'prino','���İ�'),(122,'wiz_bbs',NULL,'grpno','�亯�׷찪'),(123,'wiz_bbs',NULL,'depno','�亯���̰�'),(124,'wiz_bbs',NULL,'star','��ȣ��'),(125,'wiz_bbs',NULL,'notice','��������'),(126,'wiz_bbs',NULL,'category','ī�װ�'),(127,'wiz_bbs',NULL,'memid','�۾��� ���̵�'),(128,'wiz_bbs',NULL,'memgrp','�亯�׷� ���̵�'),(129,'wiz_bbs',NULL,'name','�̸�'),(130,'wiz_bbs',NULL,'email','�̸���'),(131,'wiz_bbs',NULL,'tphone','��ȭ��ȣ'),(132,'wiz_bbs',NULL,'hphone','�޴���ȭ��ȣ'),(133,'wiz_bbs',NULL,'zipcode','�����ȣ'),(134,'wiz_bbs',NULL,'address','�ּ�'),(135,'wiz_bbs',NULL,'subject','����'),(136,'wiz_bbs',NULL,'content','����'),(137,'wiz_bbs',NULL,'addinfo1','�߰�����1'),(138,'wiz_bbs',NULL,'addinfo2','�߰�����2'),(139,'wiz_bbs',NULL,'addinfo3','�߰�����3'),(140,'wiz_bbs',NULL,'addinfo4','�߰�����4'),(141,'wiz_bbs',NULL,'addinfo5','�߰�����5'),(142,'wiz_bbs',NULL,'ctype','HTML ��뿩��'),(143,'wiz_bbs',NULL,'privacy','��б�'),(144,'wiz_bbs',NULL,'upfile1','÷������1'),(145,'wiz_bbs',NULL,'upfile2','÷������2'),(146,'wiz_bbs',NULL,'upfile3','÷������3'),(147,'wiz_bbs',NULL,'upfile4','÷������4'),(148,'wiz_bbs',NULL,'upfile5','÷������5'),(149,'wiz_bbs',NULL,'upfile6','÷������6'),(150,'wiz_bbs',NULL,'upfile7','÷������7'),(151,'wiz_bbs',NULL,'upfile8','÷������8'),(152,'wiz_bbs',NULL,'upfile9','÷������9'),(153,'wiz_bbs',NULL,'upfile10','÷������10'),(154,'wiz_bbs',NULL,'upfile11','÷������11'),(155,'wiz_bbs',NULL,'upfile12','÷������12'),(156,'wiz_bbs',NULL,'upfile1_name','÷�����ϸ�1'),(157,'wiz_bbs',NULL,'upfile2_name','÷�����ϸ�2'),(158,'wiz_bbs',NULL,'upfile3_name','÷�����ϸ�3'),(159,'wiz_bbs',NULL,'upfile4_name','÷�����ϸ�4'),(160,'wiz_bbs',NULL,'upfile5_name','÷�����ϸ�5'),(161,'wiz_bbs',NULL,'upfile6_name','÷�����ϸ�6'),(162,'wiz_bbs',NULL,'upfile7_name','÷�����ϸ�7'),(163,'wiz_bbs',NULL,'upfile8_name','÷�����ϸ�8'),(164,'wiz_bbs',NULL,'upfile9_name','÷�����ϸ�9'),(165,'wiz_bbs',NULL,'upfile10_name','÷�����ϸ�10'),(166,'wiz_bbs',NULL,'upfile11_name','÷�����ϸ�11'),(167,'wiz_bbs',NULL,'upfile12_name','÷�����ϸ�12'),(168,'wiz_bbs',NULL,'movie1','������1'),(169,'wiz_bbs',NULL,'movie2','������2'),(170,'wiz_bbs',NULL,'movie3','������3'),(171,'wiz_bbs',NULL,'passwd','��й�ȣ'),(172,'wiz_bbs',NULL,'count','��ȸ��'),(173,'wiz_bbs',NULL,'recom','��õ��'),(174,'wiz_bbs',NULL,'comment','�ڸ�Ʈ��'),(175,'wiz_bbs',NULL,'ip','IP'),(176,'wiz_bbs',NULL,'wdate','�ۼ���'),(177,'wiz_bbscat','<b>�Խ��� ī�װ� ���̺�</b>\r\n�Խ��� ī�װ� ���̺��Դϴ�.','anywiz',NULL),(178,'wiz_bbscat',NULL,'idx','�ε���'),(179,'wiz_bbscat',NULL,'gubun','ī�װ�����(��ü,�Ϲ�)'),(180,'wiz_bbscat',NULL,'code','�Խ����ڵ�'),(181,'wiz_bbscat',NULL,'catname','ī�װ���'),(182,'wiz_bbscat',NULL,'catimg','�޴� �̹���'),(183,'wiz_bbscat',NULL,'catimg_over','�޴� �ѿ��� �̹���'),(184,'wiz_bbscat',NULL,'caticon','������'),(185,'wiz_bbsinfo','<b>�Խ��� ���� ���̺�</b>\r\n�Խ��� ���� ���̺��Դϴ�.','anywiz',NULL),(186,'wiz_bbsinfo',NULL,'code','�Խ����ڵ�'),(187,'wiz_bbsinfo',NULL,'type','�Խ�������(�Ϲ�,����,��ǰ,�ı�)'),(188,'wiz_bbsinfo',NULL,'title','�Խ��Ǹ�'),(189,'wiz_bbsinfo',NULL,'titleimg','Ÿ��Ʋ�̹���'),(190,'wiz_bbsinfo',NULL,'header','�������'),(191,'wiz_bbsinfo',NULL,'footer','�ϴ�����'),(192,'wiz_bbsinfo',NULL,'category','ī�װ�'),(193,'wiz_bbsinfo',NULL,'bbsadmin','�Խ��ǰ�����'),(194,'wiz_bbsinfo',NULL,'lpermi','��Ϻ��� ����'),(195,'wiz_bbsinfo',NULL,'rpermi','���뺸�� ����'),(196,'wiz_bbsinfo',NULL,'wpermi','�۾��� ����'),(197,'wiz_bbsinfo',NULL,'apermi','��۾��� ����'),(198,'wiz_bbsinfo',NULL,'cpermi','�ڸ�Ʈ���� ����'),(199,'wiz_bbsinfo',NULL,'datetype_list','��¥����(���������)'),(200,'wiz_bbsinfo',NULL,'datetype_view','��¥����(����������)'),(201,'wiz_bbsinfo',NULL,'skin','��Ų'),(202,'wiz_bbsinfo',NULL,'permsg','������ ���� ��� ���޼���'),(203,'wiz_bbsinfo',NULL,'perurl','������ ���� ��� �̵�������'),(204,'wiz_bbsinfo',NULL,'pageurl','�Խ��� ������ �ּ�'),(205,'wiz_bbsinfo',NULL,'editor','�������� ��뿩�� '),(206,'wiz_bbsinfo',NULL,'usetype','�Խ��� ��뿩�� '),(207,'wiz_bbsinfo',NULL,'privacy','�ڵ� ��б� ��뿩�� '),(208,'wiz_bbsinfo',NULL,'upfile','���Ͼ��ε� ��뿩��'),(209,'wiz_bbsinfo',NULL,'movie','������ ��뿩��'),(210,'wiz_bbsinfo',NULL,'comment','�ڸ�Ʈ ��뿩�� '),(211,'wiz_bbsinfo',NULL,'remail','��� ���Ͼ˶� ��뿩�� '),(212,'wiz_bbsinfo',NULL,'imgview','�̹��� ÷������ ���������� ���⿩�� '),(213,'wiz_bbsinfo',NULL,'recom','��õ��� ��뿩�� '),(214,'wiz_bbsinfo',NULL,'abuse','�弳,���� ���͸� ��뿩�� '),(215,'wiz_bbsinfo',NULL,'abtxt','�弳,���� ���͸� ���� '),(216,'wiz_bbsinfo',NULL,'simgsize','��������� �̹���ũ�� '),(217,'wiz_bbsinfo',NULL,'mimgsize','���������� �̹���ũ�� '),(218,'wiz_bbsinfo',NULL,'rows','������ ��¼� '),(219,'wiz_bbsinfo',NULL,'lists','����Ʈ ��¼� '),(220,'wiz_bbsinfo',NULL,'newc','NEW �Ⱓ���� '),(221,'wiz_bbsinfo',NULL,'hotc','HOT ��ȸ�� ���� '),(222,'wiz_bbsinfo',NULL,'line','�ٹٲ� �Խù��� '),(223,'wiz_bbsinfo',NULL,'subject_len','���� ���ڼ� '),(224,'wiz_bbsinfo',NULL,'img_align','÷������ �̹��� ���İ� '),(225,'wiz_bbsinfo',NULL,'btn_view','������ ���� ��� �۾��� ��ư ���⿩�� '),(226,'wiz_bbsinfo',NULL,'spam_check','���Ա�üũ��� ��뿩�� '),(227,'wiz_brand','<b>�귣�� ���̺�</b>\r\n�귣�� ���̺��Դϴ�.','anywiz',NULL),(228,'wiz_brand',NULL,'idx','�ε���'),(229,'wiz_brand',NULL,'priorno','��������'),(230,'wiz_brand',NULL,'brdname','�귣���'),(231,'wiz_brand',NULL,'brduse','��뿩��'),(232,'wiz_brand',NULL,'brdimg','�޴��̹���'),(233,'wiz_brand',NULL,'brdimg_over','�ѿ����̹���'),(234,'wiz_brand',NULL,'subimg','������'),(235,'wiz_brand',NULL,'subimg_type','����������'),(236,'wiz_brand',NULL,'prd_num','��ǰ������'),(237,'wiz_brand',NULL,'prd_width','��ǰũ��(����)'),(238,'wiz_brand',NULL,'prd_height','��ǰũ��(����)'),(239,'wiz_brand',NULL,'recom_use','��õ��ǰ ��������'),(240,'wiz_category','<b>��ǰ�з� ���̺�</b>\r\n��ǰ�з� ���̺��Դϴ�.','anywiz',NULL),(241,'wiz_category',NULL,'catcode','�з��ڵ�'),(242,'wiz_category',NULL,'depthno','�з���ġ��'),(243,'wiz_category',NULL,'priorno01','��з� ���İ�'),(244,'wiz_category',NULL,'priorno02','�ߺз� ���İ�'),(245,'wiz_category',NULL,'priorno03','�Һз� ���İ�'),(246,'wiz_category',NULL,'catname','�з���'),(247,'wiz_category',NULL,'catuse','��뿩��'),(248,'wiz_category',NULL,'catimg','�޴��̹���'),(249,'wiz_category',NULL,'catimg_over','�ѿ��� �̹���'),(250,'wiz_category',NULL,'subimg','������'),(251,'wiz_category',NULL,'subimg_type','����������'),(252,'wiz_category',NULL,'prd_tema','��ǰ�׸�'),(253,'wiz_category',NULL,'prd_num','��ǰ������'),(254,'wiz_category',NULL,'prd_width','��ǰũ��(����)'),(255,'wiz_category',NULL,'prd_height','��ǰũ��(����)'),(256,'wiz_category',NULL,'recom_use','��õ��ǰ ��������'),(257,'wiz_category',NULL,'recom_tema','��õ��ǰ�׸�'),(258,'wiz_category',NULL,'recom_num','��õ��ǰ ������'),(259,'wiz_comment','<b>�ڸ�Ʈ ���̺�</b>\r\n�ڸ�Ʈ ���̺��Դϴ�.','anywiz',NULL),(260,'wiz_comment',NULL,'idx','�ε���'),(261,'wiz_comment',NULL,'ctype','�ڸ�Ʈ����'),(262,'wiz_comment',NULL,'cidx','�Խù���ȣ'),(263,'wiz_comment',NULL,'prdcode','��ǰ�ڵ�'),(264,'wiz_comment',NULL,'star','��ȣ��'),(265,'wiz_comment',NULL,'id','�ۼ��� ���̵�'),(266,'wiz_comment',NULL,'name','�̸�'),(267,'wiz_comment',NULL,'content','����'),(268,'wiz_comment',NULL,'passwd','��й�ȣ'),(269,'wiz_comment',NULL,'wdate','�ۼ���'),(270,'wiz_comment',NULL,'wip','IP'),(271,'wiz_conrefer','<b>���Ӱ�� ���̺�</b>\r\n���Ӱ�� ���̺��Դϴ�.','anywiz',NULL),(272,'wiz_conrefer',NULL,'referer','���Ӱ��'),(273,'wiz_conrefer',NULL,'host','����HOST'),(274,'wiz_conrefer',NULL,'cnt','�����ڼ� '),(275,'wiz_consult','<b>1:1 ������ ���̺�</b>\r\n1:1 ������ ���̺��Դϴ�.','anywiz',NULL),(276,'wiz_consult',NULL,'idx','�ε���'),(277,'wiz_consult',NULL,'memid','�ۼ��� ���̵�'),(278,'wiz_consult',NULL,'name','�̸�'),(279,'wiz_consult',NULL,'subject','����'),(280,'wiz_consult',NULL,'question','����'),(281,'wiz_consult',NULL,'answer','�亯'),(282,'wiz_consult',NULL,'wdate','�ۼ���'),(283,'wiz_consult',NULL,'status','ó������'),(284,'wiz_content','<b>�˾� �� ���������� ���̺�</b>\r\n�˾� �� ���������� ���̺��Դϴ�.','anywiz',NULL),(285,'wiz_content',NULL,'idx','�ε���'),(286,'wiz_content',NULL,'type','���� ����'),(287,'wiz_content',NULL,'isuse','��뿩��'),(288,'wiz_content',NULL,'scroll','��ũ�� ��뿩��'),(289,'wiz_content',NULL,'posi_x','���� ��ġ'),(290,'wiz_content',NULL,'posi_y','��� ��ġ'),(291,'wiz_content',NULL,'size_x','���� ũ��'),(292,'wiz_content',NULL,'size_y','���� ũ�� '),(293,'wiz_content',NULL,'sdate','�ԽñⰣ ������ '),(294,'wiz_content',NULL,'edate','�ԽñⰣ ������ '),(295,'wiz_content',NULL,'linkurl','��ũ�ּ� '),(296,'wiz_content',NULL,'popup_type','�˾����� '),(297,'wiz_content',NULL,'title','���� '),(298,'wiz_content',NULL,'content','����'),(299,'wiz_content',NULL,'wdate','�ۼ���'),(300,'wiz_contime','<b>������ ���̺�</b>\r\n������ ���̺��Դϴ�.','anywiz',NULL),(301,'wiz_contime',NULL,'time','���ӽð� '),(302,'wiz_contime',NULL,'cnt','�����ڼ� '),(303,'wiz_coupon','<b>���� ���̺�</b>\r\n���� ���̺��Դϴ�.','anywiz',NULL),(304,'wiz_coupon',NULL,'idx','�ε���'),(305,'wiz_coupon',NULL,'coupon_name','������'),(306,'wiz_coupon',NULL,'coupon_img','�����̹���'),(307,'wiz_coupon',NULL,'coupon_sdate','���Ⱓ ������'),(308,'wiz_coupon',NULL,'coupon_edate','���Ⱓ ������'),(309,'wiz_coupon',NULL,'coupon_amount','����'),(310,'wiz_coupon',NULL,'coupon_limit','�������ѿ���'),(311,'wiz_coupon',NULL,'coupon_dis','���αݾ�/������'),(312,'wiz_coupon',NULL,'coupon_type','��������'),(313,'wiz_coupon',NULL,'wdate','�ۼ���'),(314,'wiz_cprelation','<b>��ǰ, ��ǰ�з� ���� ���̺�</b>\r\n��ǰ, ��ǰ�з� ���� ���̺��Դϴ�.','anywiz',NULL),(315,'wiz_cprelation',NULL,'idx','�ε���'),(316,'wiz_cprelation',NULL,'prdcode','��ǰ�ڵ� '),(317,'wiz_cprelation',NULL,'catcode','�з��ڵ�  '),(318,'wiz_design','<b>������ ���̺�</b>\r\n������ ���̺��Դϴ�.','anywiz',NULL),(319,'wiz_design',NULL,'site_title','���θ� Ÿ��Ʋ'),(320,'wiz_design',NULL,'site_intro','���θ� �Ұ���'),(321,'wiz_design',NULL,'site_keyword','���θ� �˻�Ű����'),(322,'wiz_design',NULL,'site_align','���θ� ����'),(323,'wiz_design',NULL,'site_width','����Ʈ ����ũ��'),(324,'wiz_design',NULL,'site_bgcolor','��ü����'),(325,'wiz_design',NULL,'site_background','����̹���'),(326,'wiz_design',NULL,'site_font','�Ϲ���Ʈ��'),(327,'wiz_design',NULL,'site_link','��ũ(link)��'),(328,'wiz_design',NULL,'site_active','��ũ(active)��'),(329,'wiz_design',NULL,'site_hover','��ũ(hover)��'),(330,'wiz_design',NULL,'site_visited','��ũ(visited)��'),(331,'wiz_design',NULL,'footer_html','�ϴ��ּ�'),(332,'wiz_design',NULL,'logo_img','�ΰ� �̹���'),(333,'wiz_design',NULL,'cate_img','��ǰī�װ� �̹���'),(334,'wiz_design',NULL,'cate_sub','����ī�װ� ��¿���'),(335,'wiz_design',NULL,'cate_subx','ī�װ� ������ǥ'),(336,'wiz_design',NULL,'cate_suby','ī�װ� ������ǥ'),(337,'wiz_design',NULL,'cate_menuh','ī�װ� �޴�����'),(338,'wiz_design',NULL,'main_img','�����̹���'),(339,'wiz_design',NULL,'main_width','�����̹��� ����ũ��'),(340,'wiz_design',NULL,'main_height','�����̹��� ����ũ��'),(341,'wiz_design',NULL,'main_link','�����̹��� ��ũ�ּ�'),(342,'wiz_design',NULL,'main_target','�����̹��� ��ũŸ��'),(343,'wiz_design',NULL,'main_html','���� HTML'),(344,'wiz_design',NULL,'notice_img','�������� �̹���'),(345,'wiz_design',NULL,'notice_rows','�������� �Խù���'),(346,'wiz_design',NULL,'notice_cut','�������� ���ڼ�����'),(347,'wiz_design',NULL,'right_scroll','�������� ����ٴϱ� ��뿩��'),(348,'wiz_design',NULL,'right_prdcnt','�������� ��ǰ����'),(349,'wiz_design',NULL,'right_starty','�������� ������ǥ'),(350,'wiz_design',NULL,'topnavi_login_url','ž�޴� �α��� �ּ�'),(351,'wiz_design',NULL,'topnavi_logout_url','ž�޴� �α׾ƿ� �ּ�'),(352,'wiz_design',NULL,'topnavi_join_url','ž�޴� ȸ������ �ּ�'),(353,'wiz_design',NULL,'topnavi_myshop_url','ž�޴� ���������� �ּ�'),(354,'wiz_design',NULL,'topnavi01_url','ž�޴�1 �ּ�'),(355,'wiz_design',NULL,'topnavi02_url','ž�޴�2 �ּ�'),(356,'wiz_design',NULL,'topnavi03_url','ž�޴�3 �ּ�'),(357,'wiz_design',NULL,'topnavi04_url','ž�޴�4 �ּ�'),(358,'wiz_design',NULL,'topnavi05_url','ž�޴�5 �ּ�'),(359,'wiz_design',NULL,'topnavi06_url','ž�޴�6 �ּ�'),(360,'wiz_design',NULL,'topmenu01_url','��ܸ޴�1 �ּ�'),(361,'wiz_design',NULL,'topmenu02_url','��ܸ޴�2 �ּ�'),(362,'wiz_design',NULL,'topmenu03_url','��ܸ޴�3 �ּ�'),(363,'wiz_design',NULL,'topmenu04_url','��ܸ޴�4 �ּ�'),(364,'wiz_design',NULL,'topmenu05_url','��ܸ޴�5 �ּ�'),(365,'wiz_design',NULL,'topmenu06_url','��ܸ޴�6 �ּ�'),(366,'wiz_design',NULL,'topmenu07_url','��ܸ޴�7 �ּ�'),(367,'wiz_design',NULL,'topmenu08_url','��ܸ޴�8 �ּ�'),(368,'wiz_design',NULL,'topmenu09_url','��ܸ޴�9 �ּ�'),(369,'wiz_design',NULL,'topmenu10_url','��ܸ޴�10 �ּ�'),(370,'wiz_level','<b>ȸ����� ���̺�</b>\r\nȸ����� ���̺��Դϴ�.','anywiz',NULL),(371,'wiz_level',NULL,'idx','�ε���'),(372,'wiz_level',NULL,'level','��޷���'),(373,'wiz_level',NULL,'icon','������'),(374,'wiz_level',NULL,'name','��޸�'),(375,'wiz_level',NULL,'distype','����Ÿ��'),(376,'wiz_level',NULL,'discount','���ξ�'),(377,'wiz_level',NULL,'exp','����'),(378,'wiz_mailsms','<b>�̸���, SMS �޼��� ���� ���̺�</b>\r\n�̸���, SMS �޼��� ���� ���̺��Դϴ�.','anywiz',NULL),(379,'wiz_mailsms',NULL,'code','�޼��� �ڵ� '),(380,'wiz_mailsms',NULL,'subject','�з���'),(381,'wiz_mailsms',NULL,'sms_cust','SMS �� ���ſ���'),(382,'wiz_mailsms',NULL,'sms_oper','SMS ������ ���ſ���'),(383,'wiz_mailsms',NULL,'sms_msg','SMS �޼���'),(384,'wiz_mailsms',NULL,'email_subj','�̸��� ����'),(385,'wiz_mailsms',NULL,'email_cust','�̸��� �� ���ſ���'),(386,'wiz_mailsms',NULL,'email_oper','�̸��� ������ ���ſ���'),(387,'wiz_mailsms',NULL,'email_msg','�̸��� ����'),(388,'wiz_member','<b>ȸ�� ���̺�</b>\r\nȸ�� ���̺��Դϴ�.','anywiz',NULL),(389,'wiz_member',NULL,'id','���̵�'),(390,'wiz_member',NULL,'passwd','��й�ȣ'),(391,'wiz_member',NULL,'name','�̸�'),(392,'wiz_member',NULL,'resno','�ֹε�Ϲ�ȣ'),(393,'wiz_member',NULL,'email','�̸���'),(394,'wiz_member',NULL,'tphone','��ȭ��ȣ'),(395,'wiz_member',NULL,'hphone','�޴���ȭ��ȣ'),(396,'wiz_member',NULL,'fax','�ѽ���ȣ'),(397,'wiz_member',NULL,'post','�����ȣ'),(398,'wiz_member',NULL,'address','�ּ�'),(399,'wiz_member',NULL,'address2','���ּ�'),(400,'wiz_member',NULL,'reemail','���� ���ſ���'),(401,'wiz_member',NULL,'resms','SMS ���ſ���'),(402,'wiz_member',NULL,'birthday','�������'),(403,'wiz_member',NULL,'bgubun','���, ����'),(404,'wiz_member',NULL,'marriage','��ȥ����'),(405,'wiz_member',NULL,'memorial','��ȥ�����'),(406,'wiz_member',NULL,'scholarship','�з�'),(407,'wiz_member',NULL,'job','����'),(408,'wiz_member',NULL,'income','����ռ���'),(409,'wiz_member',NULL,'car','�ڵ��ڼ���'),(410,'wiz_member',NULL,'consph','���ɺо�'),(411,'wiz_member',NULL,'conprd',''),(412,'wiz_member',NULL,'level','ȸ�����'),(413,'wiz_member',NULL,'recom','��õ��'),(414,'wiz_member',NULL,'visit','�湮��'),(415,'wiz_member',NULL,'visit_time','������ �湮��'),(416,'wiz_member',NULL,'comment','�������ּ�'),(417,'wiz_member',NULL,'com_num','����ڵ�Ϲ�ȣ'),(418,'wiz_member',NULL,'com_name','��ȣ'),(419,'wiz_member',NULL,'com_owner','��ǥ�ڸ�'),(420,'wiz_member',NULL,'com_post','�����ȣ'),(421,'wiz_member',NULL,'com_address','�ּ�'),(422,'wiz_member',NULL,'com_kind','����'),(423,'wiz_member',NULL,'com_class','����'),(424,'wiz_member',NULL,'wdate','������'),(425,'wiz_mycoupon','<b>���� �߱޳��� ���̺�</b>\r\n���� �߱޳��� ���̺��Դϴ�.','anywiz',NULL),(426,'wiz_mycoupon',NULL,'idx','�ε���'),(427,'wiz_mycoupon',NULL,'memid','�߱� ���̵�'),(428,'wiz_mycoupon',NULL,'eventidx','�̺�Ʈ��ȣ'),(429,'wiz_mycoupon',NULL,'prdcode','��ǰ�ڵ�'),(430,'wiz_mycoupon',NULL,'coupon_name','������'),(431,'wiz_mycoupon',NULL,'coupon_dis','���ξ�'),(432,'wiz_mycoupon',NULL,'coupon_type','����Ÿ��'),(433,'wiz_mycoupon',NULL,'coupon_sdate','���Ⱓ ������'),(434,'wiz_mycoupon',NULL,'coupon_edate','���Ⱓ ������'),(435,'wiz_mycoupon',NULL,'coupon_use','��뿩��'),(436,'wiz_mycoupon',NULL,'wdate','�߱���'),(437,'wiz_operinfo','<b>��������� ���̺�</b>\r\n��������� ���̺��Դϴ�.','anywiz',NULL),(438,'wiz_operinfo',NULL,'pay_method','�������'),(439,'wiz_operinfo',NULL,'pay_id','���� ���̵�'),(440,'wiz_operinfo',NULL,'pay_key','���� Key'),(441,'wiz_operinfo',NULL,'pay_account','������¹�ȣ'),(442,'wiz_operinfo',NULL,'pay_agent','PG��ü'),(443,'wiz_operinfo',NULL,'pay_escrow','����ũ�� ��뿩��'),(444,'wiz_operinfo',NULL,'pay_test','�׽�Ʈ ���� ��뿩��'),(445,'wiz_operinfo',NULL,'sms_type','SMS ����'),(446,'wiz_operinfo',NULL,'sms_id','SMS ���̵�'),(447,'wiz_operinfo',NULL,'sms_pw','SMS ��й�ȣ'),(448,'wiz_operinfo',NULL,'del_com','�ù��'),(449,'wiz_operinfo',NULL,'del_trace','�����������'),(450,'wiz_operinfo',NULL,'del_prd','��ǰ�� �����å(������)'),(451,'wiz_operinfo',NULL,'del_prd2','��ǰ�� �����å(��ǰ�� ��ۺ�)'),(452,'wiz_operinfo',NULL,'del_method','�⺻ �����å'),(453,'wiz_operinfo',NULL,'del_fixprice','������'),(454,'wiz_operinfo',NULL,'del_staprice','���Ű��ݺ�(�ݾ�)'),(455,'wiz_operinfo',NULL,'del_staprice2','���Ű��ݺ�(�̻� ���� �� �ù��)'),(456,'wiz_operinfo',NULL,'del_staprice3','���Ű��ݺ�(���� ���� �� �ù��)'),(457,'wiz_operinfo',NULL,'del_extrapost1','�������� �����ȣ1 ���۹�ȣ'),(458,'wiz_operinfo',NULL,'del_extrapost12','�������� �����ȣ1 ����ȣ'),(459,'wiz_operinfo',NULL,'del_extraprice1','������1'),(460,'wiz_operinfo',NULL,'del_extrapost2','�������� �����ȣ2 ���۹�ȣ'),(461,'wiz_operinfo',NULL,'del_extrapost22','�������� �����ȣ2 ����ȣ'),(462,'wiz_operinfo',NULL,'del_extraprice2','������2'),(463,'wiz_operinfo',NULL,'del_extrapost3','�������� �����ȣ3 ���۹�ȣ'),(464,'wiz_operinfo',NULL,'del_extrapost32','�������� �����ȣ3 ����ȣ'),(465,'wiz_operinfo',NULL,'del_extraprice3','������3'),(466,'wiz_operinfo',NULL,'reserve_use','������ ��뿩��'),(467,'wiz_operinfo',NULL,'reserve_join','ȸ������ ������'),(468,'wiz_operinfo',NULL,'reserve_recom','��õ�� ������'),(469,'wiz_operinfo',NULL,'reserve_min','�ּһ�� ������'),(470,'wiz_operinfo',NULL,'reserve_max','1ȸ �ִ��� ������'),(471,'wiz_operinfo',NULL,'reserve_buy','��ǰ���Ž� ������'),(472,'wiz_operinfo',NULL,'reserve_per','������ �ϰ�����'),(473,'wiz_operinfo',NULL,'review_use','��ǰ�� ��뿩��'),(474,'wiz_operinfo',NULL,'review_level','��ǰ�� �ۼ�����'),(475,'wiz_operinfo',NULL,'coupon_use','���� ��뿩��'),(476,'wiz_operinfo',NULL,'con_parameter','�˻� Ű���� �м� �Ķ���� '),(477,'wiz_operinfo',NULL,'prdimg_R','��ǰ ����̹���'),(478,'wiz_operinfo',NULL,'prdimg_S','��ǰ ����̹���'),(479,'wiz_operinfo',NULL,'prdimg_M','��ǰ ���̹���'),(480,'wiz_operinfo',NULL,'prdimg_L','��ǰ Ȯ���̹���'),(481,'wiz_operinfo',NULL,'tax_use','���ݰ�꼭 ��뿩��'),(482,'wiz_operinfo',NULL,'tax_status','���ݰ�꼭 �߱޽���'),(483,'wiz_option','<b>��ǰ�ɼ� ���̺�</b>\r\n��ǰ�ɼ� ���̺��Դϴ�.','anywiz',NULL),(484,'wiz_option',NULL,'idx','�ε���'),(485,'wiz_option',NULL,'opttitle','�ɼǸ�'),(486,'wiz_option',NULL,'optcode','�ɼ��׸�'),(487,'wiz_order','<b>�ֹ� ���̺�</b>\r\n�ֹ� ���̺��Դϴ�.','anywiz',NULL),(488,'wiz_order',NULL,'orderid','�ֹ���ȣ'),(489,'wiz_order',NULL,'send_id','�ֹ��� ���̵�'),(490,'wiz_order',NULL,'send_name','�ֹ��� �̸�'),(491,'wiz_order',NULL,'send_tphone','�ֹ��� ��ȭ��ȣ'),(492,'wiz_order',NULL,'send_hphone','�ֹ��� �޴���ȭ��ȣ'),(493,'wiz_order',NULL,'send_email','�ֹ��� �̸���'),(494,'wiz_order',NULL,'send_post','�ֹ��� �����ȣ'),(495,'wiz_order',NULL,'send_address','�ֹ��� �ּ�'),(496,'wiz_order',NULL,'demand','��û����'),(497,'wiz_order',NULL,'message','�޼���'),(498,'wiz_order',NULL,'cancelmsg','�ֹ���� ����'),(499,'wiz_order',NULL,'rece_name','������ �̸�'),(500,'wiz_order',NULL,'rece_tphone','������ ��ȭ��ȣ'),(501,'wiz_order',NULL,'rece_hphone','������ �޴���ȭ��ȣ'),(502,'wiz_order',NULL,'rece_post','������ �����ȣ'),(503,'wiz_order',NULL,'rece_address','������ �ּ�'),(504,'wiz_order',NULL,'pay_method','�������'),(505,'wiz_order',NULL,'account_name','�Ա��ڸ�'),(506,'wiz_order',NULL,'account','�Աݰ��¹�ȣ'),(507,'wiz_order',NULL,'coupon_use','���� ��� �ݾ�'),(508,'wiz_order',NULL,'coupon_idx','���� ��ȣ'),(509,'wiz_order',NULL,'reserve_use','������ ��� �ݾ�'),(510,'wiz_order',NULL,'reserve_price','������'),(511,'wiz_order',NULL,'deliver_method','��۹��'),(512,'wiz_order',NULL,'deliver_price','��ۺ�'),(513,'wiz_order',NULL,'deliver_num','������ȣ'),(514,'wiz_order',NULL,'deliver_date','�߼�����'),(515,'wiz_order',NULL,'discount_price','ȸ�����αݾ�'),(516,'wiz_order',NULL,'prd_price','��ǰ�ݾ�'),(517,'wiz_order',NULL,'total_price','�� �����ݾ�'),(518,'wiz_order',NULL,'status','�ֹ�����'),(519,'wiz_order',NULL,'order_date','�ֹ���'),(520,'wiz_order',NULL,'pay_date','������'),(521,'wiz_order',NULL,'send_date','�����'),(522,'wiz_order',NULL,'cancel_date','�����'),(523,'wiz_order',NULL,'descript','�����ڸ޸�'),(524,'wiz_order',NULL,'tno','�ŷ���ȣ'),(525,'wiz_order',NULL,'escrow_check','����ũ�� ����'),(526,'wiz_order',NULL,'escrow_stats','����ũ�� ����'),(527,'wiz_order',NULL,'tax_type','���ݰ�꼭 ���࿩��'),(528,'wiz_page','<b>������ ���̺�</b>\r\n������ ���̺��Դϴ�.','anywiz',NULL),(529,'wiz_page',NULL,'idx','�ε���'),(530,'wiz_page',NULL,'type','������ Ÿ��'),(531,'wiz_page',NULL,'subimg','����̹���'),(532,'wiz_page',NULL,'content','����'),(533,'wiz_page',NULL,'content2','����2'),(534,'wiz_page',NULL,'addinfo','�߰�����1'),(535,'wiz_page',NULL,'addinfo2','�߰�����2'),(536,'wiz_poll','<b>�������� ���̺�</b>\r\n�������� ���̺��Դϴ�.','anywiz',NULL),(537,'wiz_poll',NULL,'idx','�ε���'),(538,'wiz_poll',NULL,'code','�����ڵ�'),(539,'wiz_poll',NULL,'polluse','���࿩��'),(540,'wiz_poll',NULL,'pollmain','�������⿩��'),(541,'wiz_poll',NULL,'sdate','���������'),(542,'wiz_poll',NULL,'edate','����������'),(543,'wiz_poll',NULL,'apermi','���� ���� '),(544,'wiz_poll',NULL,'cpermi','�ڸ�Ʈ�ۼ� ���� '),(545,'wiz_poll',NULL,'subject','������ '),(546,'wiz_poll',NULL,'content','�������� '),(547,'wiz_poll',NULL,'wdate','�ۼ��� '),(548,'wiz_poll',NULL,'cnt','�����ڼ� '),(549,'wiz_polldata','<b>�������� ���̺�</b>\r\n�������� ���̺��Դϴ�.','anywiz',NULL),(550,'wiz_polldata',NULL,'idx','�ε���'),(551,'wiz_polldata',NULL,'pidx','�������� ��ȣ '),(552,'wiz_polldata',NULL,'question','���� '),(553,'wiz_polldata',NULL,'answer01','�亯1 '),(554,'wiz_polldata',NULL,'count01','�����ڼ�1 '),(555,'wiz_polldata',NULL,'answer02','�亯2'),(556,'wiz_polldata',NULL,'count02','�����ڼ�2'),(557,'wiz_polldata',NULL,'answer03','�亯3'),(558,'wiz_polldata',NULL,'count03','�����ڼ�3'),(559,'wiz_polldata',NULL,'answer04','�亯4'),(560,'wiz_polldata',NULL,'count04','�����ڼ�4'),(561,'wiz_polldata',NULL,'answer05','�亯5'),(562,'wiz_polldata',NULL,'count05','�����ڼ�5'),(563,'wiz_polldata',NULL,'answer06','�亯6'),(564,'wiz_polldata',NULL,'count06','�����ڼ�6'),(565,'wiz_polldata',NULL,'answer07','�亯7'),(566,'wiz_polldata',NULL,'count07','�����ڼ�7'),(567,'wiz_polldata',NULL,'answer08','�亯8'),(568,'wiz_polldata',NULL,'count08','�����ڼ�8'),(569,'wiz_polldata',NULL,'answer09','�亯9'),(570,'wiz_polldata',NULL,'count09','�����ڼ�9'),(571,'wiz_polldata',NULL,'answer10','�亯10'),(572,'wiz_polldata',NULL,'count10','�����ڼ�10'),(573,'wiz_pollinfo','<b>�������� ���� ���̺�</b>\r\n�������� ���� ���̺��Դϴ�.','anywiz',NULL),(574,'wiz_pollinfo',NULL,'code','  �����ڵ�  '),(575,'wiz_pollinfo',NULL,'title','������'),(576,'wiz_pollinfo',NULL,'titleimg','����̹���'),(577,'wiz_pollinfo',NULL,'header','�������'),(578,'wiz_pollinfo',NULL,'footer','�ϴ�����'),(579,'wiz_pollinfo',NULL,'lpermi','��Ϻ��� ����'),(580,'wiz_pollinfo',NULL,'rpermi','���뺸�� ����'),(581,'wiz_pollinfo',NULL,'apermi','�������� ����'),(582,'wiz_pollinfo',NULL,'cpermi','�ڸ�Ʈ���� ����'),(583,'wiz_pollinfo',NULL,'skin','��Ų'),(584,'wiz_pollinfo',NULL,'permsg','������ ���� ��� ��� �޼��� '),(585,'wiz_pollinfo',NULL,'perurl','������ ���� ��� �̵������� '),(586,'wiz_pollinfo',NULL,'mainskin','�������� ��Ų '),(587,'wiz_pollinfo',NULL,'purl','���������� '),(588,'wiz_pollinfo',NULL,'usetype','��뿩��'),(589,'wiz_pollinfo',NULL,'spam_check','���Ա�üũ��� ��뿩��'),(590,'wiz_pollinfo',NULL,'datetype_list','��¥����(���������) '),(591,'wiz_pollinfo',NULL,'datetype_view','��¥����(����������) '),(592,'wiz_pollinfo',NULL,'comment','�ڸ�Ʈ ��뿩�� '),(593,'wiz_pollinfo',NULL,'rows','������ ��¼� '),(594,'wiz_pollinfo',NULL,'lists','����Ʈ ��¼� '),(595,'wiz_pollinfo',NULL,'newc','NEW �Ⱓ���� '),(596,'wiz_pollinfo',NULL,'subject_len','���� ���ڼ� '),(597,'wiz_pollinfo',NULL,'abuse','�弳,���� ���͸� ��뿩��  '),(598,'wiz_pollinfo',NULL,'abtxt','�弳,���� ���͸� ���� '),(599,'wiz_pollinfo',NULL,'wdate','�ۼ��� '),(600,'wiz_prdmain','<b>��ǰ �������� ���̺�</b>\r\n��ǰ �����������̺��Դϴ�.','anywiz',NULL),(601,'wiz_prdmain',NULL,'idx','�ε���'),(602,'wiz_prdmain',NULL,'type','��ǰ�׷�'),(603,'wiz_prdmain',NULL,'typename','��ǰ�׷��'),(604,'wiz_prdmain',NULL,'isuse','��뿩��'),(605,'wiz_prdmain',NULL,'prior','��������'),(606,'wiz_prdmain',NULL,'skin_type','���Ĺ��'),(607,'wiz_prdmain',NULL,'prd_num','��ü��ǰ��'),(608,'wiz_prdmain',NULL,'prd_row','���λ�ǰ��'),(609,'wiz_prdmain',NULL,'prd_width','��ǰ ���λ�����'),(610,'wiz_prdmain',NULL,'prd_height','��ǰ ���λ�����'),(611,'wiz_prdmain',NULL,'barimg','���̹���'),(612,'wiz_prdmain',NULL,'html','�̺�Ʈ'),(613,'wiz_prdrelation','<b>���û�ǰ ���̺�</b>\r\n���û�ǰ ���̺��Դϴ�.','anywiz',NULL),(614,'wiz_prdrelation',NULL,'idx','�ε���'),(615,'wiz_prdrelation',NULL,'prdcode','��ǰ�ڵ�'),(616,'wiz_prdrelation',NULL,'relcode','���û�ǰ�ڵ�'),(617,'wiz_product','<b>��ǰ ���̺�</b>\r\n��ǰ ���̺��Դϴ�.','anywiz',NULL),(618,'wiz_product',NULL,'prdcode','��ǰ�ڵ�'),(619,'wiz_product',NULL,'prdname','��ǰ��'),(620,'wiz_product',NULL,'prdcom','������'),(621,'wiz_product',NULL,'origin','������'),(622,'wiz_product',NULL,'showset','��������'),(623,'wiz_product',NULL,'stock','���'),(624,'wiz_product',NULL,'savestock','�������'),(625,'wiz_product',NULL,'prior','�켱����'),(626,'wiz_product',NULL,'viewcnt','��ȸ��'),(627,'wiz_product',NULL,'deimgcnt','���̹��� ��ȸ��'),(628,'wiz_product',NULL,'basketcnt','��ٱ��� ���Ǽ�'),(629,'wiz_product',NULL,'ordercnt','�ֹ��Ǽ�'),(630,'wiz_product',NULL,'cancelcnt','�ֹ���� �Ǽ�'),(631,'wiz_product',NULL,'comcnt','��ۿϷ� �Ǽ�'),(632,'wiz_product',NULL,'sellprice','�ǸŰ�'),(633,'wiz_product',NULL,'conprice','����'),(634,'wiz_product',NULL,'reserve','������'),(635,'wiz_product',NULL,'strprice','���ݴ�ü����'),(636,'wiz_product',NULL,'new','�Ż�ǰ'),(637,'wiz_product',NULL,'best','����Ʈ��ǰ'),(638,'wiz_product',NULL,'popular','�α��ǰ'),(639,'wiz_product',NULL,'recom','��õ��ǰ'),(640,'wiz_product',NULL,'sale','���ϻ�ǰ'),(641,'wiz_product',NULL,'shortage','���(ǰ��, ������, ������)'),(642,'wiz_product',NULL,'coupon_use','�������'),(643,'wiz_product',NULL,'coupon_dis','�������ξ�'),(644,'wiz_product',NULL,'coupon_type','��������Ÿ��'),(645,'wiz_product',NULL,'coupon_amount','��������'),(646,'wiz_product',NULL,'coupon_limit','�����������ѿ���'),(647,'wiz_product',NULL,'coupon_sdate','�����Ⱓ ������'),(648,'wiz_product',NULL,'coupon_edate','�����Ⱓ ������'),(649,'wiz_product',NULL,'del_type','��۹��'),(650,'wiz_product',NULL,'del_price','��ۺ�'),(651,'wiz_product',NULL,'prdicon','��ǰ������'),(652,'wiz_product',NULL,'prefer','��ȣ��'),(653,'wiz_product',NULL,'brand','�귣��'),(654,'wiz_product',NULL,'info_use','��ǰ���� ��뿩��'),(655,'wiz_product',NULL,'info_name1','��ǰ���� �̸�1'),(656,'wiz_product',NULL,'info_value1','��ǰ���� ����1'),(657,'wiz_product',NULL,'info_name2','��ǰ���� �̸�2'),(658,'wiz_product',NULL,'info_value2','��ǰ���� ����2'),(659,'wiz_product',NULL,'info_name3','��ǰ���� �̸�3'),(660,'wiz_product',NULL,'info_value3','��ǰ���� ����3'),(661,'wiz_product',NULL,'info_name4','��ǰ���� �̸�4'),(662,'wiz_product',NULL,'info_value4','��ǰ���� ����4'),(663,'wiz_product',NULL,'info_name5','��ǰ���� �̸�5'),(664,'wiz_product',NULL,'info_value5','��ǰ���� ����5'),(665,'wiz_product',NULL,'info_name6','��ǰ���� �̸�6'),(666,'wiz_product',NULL,'info_value6','��ǰ���� ����6'),(667,'wiz_product',NULL,'opt_use','����/��� �ɼ� ��뿩��'),(668,'wiz_product',NULL,'opttitle','�ɼǸ�1'),(669,'wiz_product',NULL,'optcode','�ɼǳ���1'),(670,'wiz_product',NULL,'opttitle2','�ɼǸ�2'),(671,'wiz_product',NULL,'optcode2','�ɼǳ���2'),(672,'wiz_product',NULL,'opttitle3','�ɼǸ�3'),(673,'wiz_product',NULL,'optcode3','�ɼǳ���3'),(674,'wiz_product',NULL,'opttitle4','�ɼǸ�4'),(675,'wiz_product',NULL,'optcode4','�ɼǳ���4'),(676,'wiz_product',NULL,'opttitle5','�ɼǸ�5'),(677,'wiz_product',NULL,'optcode5','�ɼǳ���5'),(678,'wiz_product',NULL,'opttitle6','�ɼǸ�6'),(679,'wiz_product',NULL,'optcode6','�ɼǳ���6'),(680,'wiz_product',NULL,'opttitle7','�ɼǸ�7'),(681,'wiz_product',NULL,'optcode7','�ɼǳ���7'),(682,'wiz_product',NULL,'optvalue','�ɼǰ�'),(683,'wiz_product',NULL,'prdimg_R','��ǰ��� �̹���'),(684,'wiz_product',NULL,'prdimg_L1','Ȯ�� �̹���1'),(685,'wiz_product',NULL,'prdimg_M1','��ǰ�� �̹���1'),(686,'wiz_product',NULL,'prdimg_S1','��� �̹���1'),(687,'wiz_product',NULL,'prdimg_L2','Ȯ�� �̹���2'),(688,'wiz_product',NULL,'prdimg_M2','��ǰ�� �̹���2'),(689,'wiz_product',NULL,'prdimg_S2','��� �̹���2'),(690,'wiz_product',NULL,'prdimg_L3','Ȯ�� �̹���3'),(691,'wiz_product',NULL,'prdimg_M3','��ǰ�� �̹���3'),(692,'wiz_product',NULL,'prdimg_S3','��� �̹���3'),(693,'wiz_product',NULL,'prdimg_L4','Ȯ�� �̹���4'),(694,'wiz_product',NULL,'prdimg_M4','��ǰ�� �̹���4'),(695,'wiz_product',NULL,'prdimg_S4','��� �̹���4'),(696,'wiz_product',NULL,'prdimg_L5','Ȯ�� �̹���5'),(697,'wiz_product',NULL,'prdimg_M5','��ǰ�� �̹���5'),(698,'wiz_product',NULL,'prdimg_S5','��� �̹���5'),(699,'wiz_product',NULL,'searchkey','�˻���'),(700,'wiz_product',NULL,'stortexp','�������ּ�'),(701,'wiz_product',NULL,'content','�󼼼���'),(702,'wiz_product',NULL,'wdate','�����'),(703,'wiz_product',NULL,'mdate','������'),(704,'wiz_reserve','<b>������ ���̺�</b>\r\n������ ���̺��Դϴ�.','anywiz',NULL),(705,'wiz_reserve',NULL,'idx','�ε���'),(706,'wiz_reserve',NULL,'memid','ȸ�� ���̵�'),(707,'wiz_reserve',NULL,'reservemsg','������ ����'),(708,'wiz_reserve',NULL,'reserve','������'),(709,'wiz_reserve',NULL,'orderid','�ֹ���ȣ'),(710,'wiz_reserve',NULL,'wdate','������'),(711,'wiz_shopinfo','<b>���θ� ���� ���̺�</b>\r\n���θ� ���� ���̺��Դϴ�.','anywiz',NULL),(712,'wiz_shopinfo',NULL,'shop_name','���θ� �̸�'),(713,'wiz_shopinfo',NULL,'shop_url','���θ� �ּ�'),(714,'wiz_shopinfo',NULL,'shop_email','������ �̸���'),(715,'wiz_shopinfo',NULL,'shop_tel','������ ��ȭ��ȣ'),(716,'wiz_shopinfo',NULL,'shop_hand','������ �޴���ȭ��ȣ'),(717,'wiz_shopinfo',NULL,'site_key','���̼���Ű'),(718,'wiz_shopinfo',NULL,'site_date','��ġ��'),(719,'wiz_shopinfo',NULL,'designer_id','�����̳� ���̵�'),(720,'wiz_shopinfo',NULL,'designer_pw','�����̳� ��й�ȣ'),(721,'wiz_shopinfo',NULL,'anywiz_id','�ִ����� ���̵�'),(722,'wiz_shopinfo',NULL,'anywiz_pw','�ִ����� ��й�ȣ'),(723,'wiz_shopinfo',NULL,'admin_title','������ Ÿ��Ʋ'),(724,'wiz_shopinfo',NULL,'admin_footer','������ ī�Ƕ���'),(725,'wiz_shopinfo',NULL,'com_num','����ڵ�Ϲ�ȣ'),(726,'wiz_shopinfo',NULL,'com_name','��ȣ'),(727,'wiz_shopinfo',NULL,'com_owner','��ǥ�ڸ�'),(728,'wiz_shopinfo',NULL,'com_post','�����ȣ'),(729,'wiz_shopinfo',NULL,'com_address','�ּ�'),(730,'wiz_shopinfo',NULL,'com_kind','����'),(731,'wiz_shopinfo',NULL,'com_class','����'),(732,'wiz_shopinfo',NULL,'com_tel','��ȭ��ȣ'),(733,'wiz_shopinfo',NULL,'com_fax','�ѽ���ȣ'),(734,'wiz_shopinfo',NULL,'start_page','������ �α��� �� �̵�������'),(735,'wiz_shopinfo',NULL,'sch_use','�������� ��뿩��'),(736,'wiz_shopinfo',NULL,'poll_use','�������� ��뿩��'),(737,'wiz_shopinfo',NULL,'design_use','�����ΰ��� ��뿩��'),(738,'wiz_shopinfo',NULL,'addbbs_use','�Խ����߰� ��뿩��'),(739,'wiz_shopinfo',NULL,'sms_use','SMS ��뿩��'),(740,'wiz_shopinfo',NULL,'namecheck_use','�Ǹ����� ��뿩��'),(741,'wiz_shopinfo',NULL,'namecheck_id','�Ǹ����� ���̵�'),(742,'wiz_shopinfo',NULL,'namecheck_pw','�Ǹ����� ��й�ȣ'),(743,'wiz_shopinfo',NULL,'estimate_use','������ ��뿩��'),(744,'wiz_shopinfo',NULL,'estimate_bigo','������ �����'),(745,'wiz_shopinfo',NULL,'ssl_use','SSL ��뿩��'),(746,'wiz_shopinfo',NULL,'ssl_port','SSL ��Ʈ��ȣ'),(747,'wiz_tax','<b>���ݰ�꼭 ���̺�</b>\r\n���ݰ�꼭 ���̺��Դϴ�.','anywiz',NULL),(748,'wiz_tax',NULL,'orderid','�ֹ���ȣ'),(749,'wiz_tax',NULL,'com_num','����ڵ�Ϲ�ȣ'),(750,'wiz_tax',NULL,'com_name','��ȣ'),(751,'wiz_tax',NULL,'com_owner','��ǥ�ڸ�'),(752,'wiz_tax',NULL,'com_address','�ּ�'),(753,'wiz_tax',NULL,'com_kind','����'),(754,'wiz_tax',NULL,'com_class','����'),(755,'wiz_tax',NULL,'com_tel','��ȭ��ȣ'),(756,'wiz_tax',NULL,'com_email','�̸���'),(757,'wiz_tax',NULL,'shop_num','���θ� ����ڵ�Ϲ�ȣ'),(758,'wiz_tax',NULL,'shop_name','���θ� ��ȣ'),(759,'wiz_tax',NULL,'shop_owner','���θ� ��ǥ�ڸ�'),(760,'wiz_tax',NULL,'shop_address','���θ� �ּ�'),(761,'wiz_tax',NULL,'shop_kind','���θ� ����'),(762,'wiz_tax',NULL,'shop_class','���θ� ����'),(763,'wiz_tax',NULL,'shop_tel','���θ� ��ȭ��ȣ'),(764,'wiz_tax',NULL,'shop_email','���θ� �̸���'),(765,'wiz_tax',NULL,'prd_info','��ǰ����'),(766,'wiz_tax',NULL,'supp_price','���ް���'),(767,'wiz_tax',NULL,'tax_price','����'),(768,'wiz_tax',NULL,'tax_pub','���ο���'),(769,'wiz_tax',NULL,'tax_date','�ۼ���'),(770,'wiz_tax',NULL,'wdate','������'),(771,'wiz_tradecom','<b>�ŷ�ó ���̺�</b>\r\n�ŷ�ó ���̺��Դϴ�.','anywiz',NULL),(772,'wiz_tradecom',NULL,'idx','�ε���'),(773,'wiz_tradecom',NULL,'com_type','��ü����'),(774,'wiz_tradecom',NULL,'com_num','����ڵ�Ϲ�ȣ'),(775,'wiz_tradecom',NULL,'com_name','��ȣ'),(776,'wiz_tradecom',NULL,'com_owner','��ǥ��'),(777,'wiz_tradecom',NULL,'com_post','�����ȣ'),(778,'wiz_tradecom',NULL,'com_address','�ּ�'),(779,'wiz_tradecom',NULL,'com_kind','����'),(780,'wiz_tradecom',NULL,'com_class','����'),(781,'wiz_tradecom',NULL,'com_tel','��ȭ��ȣ'),(782,'wiz_tradecom',NULL,'com_fax','�ѽ���ȣ'),(783,'wiz_tradecom',NULL,'com_bank','�ŷ�����'),(784,'wiz_tradecom',NULL,'com_account','���¹�ȣ'),(785,'wiz_tradecom',NULL,'com_homepage','Ȩ������'),(786,'wiz_tradecom',NULL,'charge_name','����ڸ�'),(787,'wiz_tradecom',NULL,'charge_email','����� �̸���'),(788,'wiz_tradecom',NULL,'charge_hand','����� �޴���ȭ��ȣ'),(789,'wiz_tradecom',NULL,'charge_tel','����� ��ȭ��ȣ'),(790,'wiz_tradecom',NULL,'descript','��Ÿ����'),(791,'wiz_wishlist','<b>���ɻ�ǰ ���̺�</b>\r\n���ɻ�ǰ ���̺��Դϴ�.','anywiz',NULL),(792,'wiz_wishlist',NULL,'idx','�ε���'),(793,'wiz_wishlist',NULL,'memid','ȸ�� ���̵�'),(794,'wiz_wishlist',NULL,'prdcode','��ǰ�ڵ�'),(795,'wiz_wishlist',NULL,'opttitle','�ɼǸ�1'),(796,'wiz_wishlist',NULL,'optcode','�ɼǳ���1'),(797,'wiz_wishlist',NULL,'opttitle2','�ɼǸ�2'),(798,'wiz_wishlist',NULL,'optcode2','�ɼǳ���2'),(799,'wiz_wishlist',NULL,'opttitle3','�ɼǸ�3'),(800,'wiz_wishlist',NULL,'optcode3','�ɼǳ���3'),(801,'wiz_wishlist',NULL,'opttitle4','�ɼǸ�4'),(802,'wiz_wishlist',NULL,'optcode4','�ɼǳ���4'),(803,'wiz_wishlist',NULL,'opttitle5','�ɼǸ�5'),(804,'wiz_wishlist',NULL,'optcode5','�ɼǳ���5'),(805,'wiz_wishlist',NULL,'opttitle6','�ɼǸ�6'),(806,'wiz_wishlist',NULL,'optcode6','�ɼǳ���6'),(807,'wiz_wishlist',NULL,'opttitle7','�ɼǸ�7'),(808,'wiz_wishlist',NULL,'optcode7','�ɼǳ���7'),(809,'wiz_wishlist',NULL,'amount','����'),(810,'wiz_wishlist',NULL,'wdate','�����'),(811,'','','anywiz',NULL),(812,'wiz_filedesc','<b>���ϱ��� ���̺�</b>\r\n���ϱ��� ���̺��Դϴ�.','anywiz',NULL),(813,'wiz_filedesc',NULL,'idx','�ε���'),(814,'wiz_filedesc',NULL,'fdir','���ϰ��'),(815,'wiz_filedesc',NULL,'fdesc','���ϼ���'),(816,'wiz_operinfo',NULL,'prdrel_use','���û�ǰ ��뿩��'),(817,'wiz_shopinfo',NULL,'up_date','���� ������Ʈ ��¥'),(818,'','','anywiz',NULL);
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
INSERT INTO `wiz_tradecom` VALUES (3,'BUY','000-00-000000','���θ�','��ǥ��','000-000','���� OO�� OO�� OO���� OO����','����','���α׷�����','000-0000-0000','000-0000-0000','OO����','000-00-00000','http://test.com','�����','test@test.com','000-0000-00000','00-0000-0000','');
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


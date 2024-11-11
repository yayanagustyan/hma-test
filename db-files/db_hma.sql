/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.4.21-MariaDB : Database - db_hma
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tb_menu` */

DROP TABLE IF EXISTS `tb_menu`;

CREATE TABLE `tb_menu` (
  `mn_id` int(11) NOT NULL AUTO_INCREMENT,
  `mn_name` char(32) DEFAULT NULL,
  `mn_icon` char(32) DEFAULT NULL,
  `mn_sort` int(11) DEFAULT NULL,
  `mn_link` char(32) DEFAULT NULL,
  PRIMARY KEY (`mn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_menu` */

insert  into `tb_menu`(`mn_id`,`mn_name`,`mn_icon`,`mn_sort`,`mn_link`) values (1,'Dashboard','icon-home',1,''),(2,'Master Pengguna','icon-people',2,'users'),(3,'Logout','icon-logout',4,'account/logout'),(4,'Pengaturan','icon-settings',3,'settings');

/*Table structure for table `tb_params` */

DROP TABLE IF EXISTS `tb_params`;

CREATE TABLE `tb_params` (
  `prm_id` int(11) NOT NULL AUTO_INCREMENT,
  `prm_name` char(32) DEFAULT NULL,
  `prm_value` char(64) DEFAULT NULL,
  PRIMARY KEY (`prm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_params` */

insert  into `tb_params`(`prm_id`,`prm_name`,`prm_value`) values (1,'bg-login','bg_1731350891.jpg'),(2,'logo','logo_1731350873.png');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` char(32) DEFAULT NULL,
  `user_email` char(64) DEFAULT NULL,
  `user_pass` char(128) DEFAULT NULL,
  `user_image` char(32) DEFAULT NULL,
  `user_status` enum('0','1') DEFAULT '0',
  `user_login` int(11) DEFAULT 0,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_user` */

insert  into `tb_user`(`user_id`,`user_name`,`user_email`,`user_pass`,`user_image`,`user_status`,`user_login`) values (1,'Admin Panel','admin@panel.com','!adm@123','avatar-7.jpg','1',1),(5,'Asep Jaya Abadi','asdas@gmail.com','aa','users_1731350793.jpg','1',0),(7,'Test','test@gmail.com','aa','users_1731350828.png','1',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

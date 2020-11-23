/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.14-MariaDB : Database - db_sipkesmas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_sipkesmas` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_sipkesmas`;

/*Table structure for table `hak_akses` */

DROP TABLE IF EXISTS `hak_akses`;

CREATE TABLE `hak_akses` (
  `id_hak_akses` int(5) NOT NULL AUTO_INCREMENT,
  `nama_hak_akses` varchar(50) NOT NULL,
  PRIMARY KEY (`id_hak_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `hak_akses` */

insert  into `hak_akses`(`id_hak_akses`,`nama_hak_akses`) values 
(1,'admin'),
(2,'pemanggil_antrian_umum'),
(3,'pemanggil_antrian_gigi'),
(4,'kepala');

/*Table structure for table `kritik_saran` */

DROP TABLE IF EXISTS `kritik_saran`;

CREATE TABLE `kritik_saran` (
  `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `isi_aduan` varchar(500) NOT NULL,
  `tgl_aduan` date DEFAULT NULL,
  PRIMARY KEY (`id_pengaduan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `kritik_saran` */

insert  into `kritik_saran`(`id_pengaduan`,`nama`,`email`,`isi_aduan`,`tgl_aduan`) values 
(1,'firman','alter@gmail.com','sukses',NULL),
(2,'pradit','pradit@gmail.com','coba kritik saran',NULL),
(3,'Firman','firman@xx.com','Test','2020-09-04');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id_login` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(32) DEFAULT NULL,
  `posisi` int(5) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  PRIMARY KEY (`id_login`),
  UNIQUE KEY `username` (`username`),
  KEY `hak_akses` (`posisi`),
  CONSTRAINT `login_ibfk_1` FOREIGN KEY (`posisi`) REFERENCES `hak_akses` (`id_hak_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`id_login`,`nama`,`username`,`password`,`posisi`,`pertanyaan`,`jawaban`) values 
(1,'Pradit123','admin@gmail.com','admin',1,'Siapa nama adik saya?','Helen'),
(16,'Pemanggil BP Umum','pemanggil@gmail.com','123',2,'Makanan favorit?','Bakso'),
(17,'Kepala Puskesmas Bansari','kepala@gmail.com','123',4,'Makanan favorit ?','Bakso'),
(18,'Pemanggil BP Gigi','pemanggil2@gmail.com','123',3,'Makanan favorit ?','Bakso');

/*Table structure for table `pasien` */

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `no_rm` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_daftar` date NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `nama_kk` varchar(100) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  PRIMARY KEY (`no_rm`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `pasien` */

insert  into `pasien`(`no_rm`,`tanggal_daftar`,`nama_pasien`,`jenis_kelamin`,`nama_kk`,`pekerjaan`,`alamat`,`tempat_lahir`,`tanggal_lahir`,`agama`) values 
(9,'2020-09-04','x','L','xx ','xxx','xxxx','xxx','2020-09-04','kristen'),
(10,'2020-09-04','abc','L','abc ','abc','abc','abc','2020-09-04','islam'),
(11,'2020-09-04','ushshd','L','hghgh ','hhg','njdjshdjsh','jnj','2020-09-04','islam');

/*Table structure for table `pasien_berobat` */

DROP TABLE IF EXISTS `pasien_berobat`;

CREATE TABLE `pasien_berobat` (
  `id_berobat` int(20) NOT NULL AUTO_INCREMENT,
  `no_rm` int(11) NOT NULL,
  `tanggal_berobat` date DEFAULT NULL,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_pasien` varchar(20) DEFAULT NULL,
  `no_jaminan` varchar(20) DEFAULT NULL,
  `tujuan` varchar(20) DEFAULT NULL,
  `no_antrian` int(11) NOT NULL,
  `status` enum('Selesai','Tunda','Belum Selesai','Gagal','') NOT NULL DEFAULT 'Belum Selesai',
  PRIMARY KEY (`id_berobat`),
  KEY `pasien_berobat_ibfk_1` (`no_rm`),
  CONSTRAINT `pasien_berobat_ibfk_1` FOREIGN KEY (`no_rm`) REFERENCES `pasien` (`no_rm`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

/*Data for the table `pasien_berobat` */

insert  into `pasien_berobat`(`id_berobat`,`no_rm`,`tanggal_berobat`,`nama_pasien`,`jenis_kelamin`,`tempat_lahir`,`tanggal_lahir`,`jenis_pasien`,`no_jaminan`,`tujuan`,`no_antrian`,`status`) values 
(60,11,'2020-09-04','ushshd','L','jnj','2020-09-04','umum','','bpgigi',1,'Selesai'),
(61,11,'2020-09-04','ushshd','L','jnj','2020-09-04','umum','','bpumum',1,'Selesai');

/*Table structure for table `status_antrian` */

DROP TABLE IF EXISTS `status_antrian`;

CREATE TABLE `status_antrian` (
  `loket_antrian` varchar(20) NOT NULL,
  `status_antrian` enum('Berjalan','Berhenti') NOT NULL,
  `tanggal_mulai` date NOT NULL,
  PRIMARY KEY (`loket_antrian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `status_antrian` */

insert  into `status_antrian`(`loket_antrian`,`status_antrian`,`tanggal_mulai`) values 
('bpgigi','Berjalan','2020-08-30'),
('bpumum','Berjalan','2020-08-30');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.13-MariaDB : Database - spk_motor
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`spk_motor` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `spk_motor`;

/*Table structure for table `data_kriteria` */

DROP TABLE IF EXISTS `data_kriteria`;

CREATE TABLE `data_kriteria` (
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `atribut` varchar(30) NOT NULL,
  `bobot` int(11) NOT NULL,
  PRIMARY KEY (`kode_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_kriteria` */

insert  into `data_kriteria`(`kode_kriteria`,`nama_kriteria`,`atribut`,`bobot`) values ('K1','Tipe Mesin','benefit',5),('K2','Susunan Silinder','benefit',10),('K3','Merk Kendaraan','benefit',5),('K4','Volume Silinder','benefit',20),('K5','Sistem Bahan Bakar','benefit',15),('K6','Tipe Transmisi','benefit',20),('K7','Harga','cost',25);

/*Table structure for table `data_motor` */

DROP TABLE IF EXISTS `data_motor`;

CREATE TABLE `data_motor` (
  `kode_motor` varchar(20) NOT NULL,
  `nama_motor` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_motor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_motor` */

insert  into `data_motor`(`kode_motor`,`nama_motor`,`gambar`) values ('M005','YZF R15 MONSTER ENERGY YAMAHA MOTOGP EDITION','78499429.jpg'),('M006','NEW YZF R25','50689486.png'),('M007','ALL NEW NMAX 155 CONNECTED / ABS VERSION','80493452.png'),('M008','MIO M3 125','86265731.png'),('M009','VIXION','87610599.png'),('M010','WR 155 R','20638735.png'),('M011','MX KING 150 MONSTER ENERGY YAMAHA MOTOGP EDITION','70026187.png'),('M012','VEGA FORCE','17499312.png'),('M013','MT09','66045276.png'),('M014','ALL NEW R1','20156859.png'),('M015','BeAT','25070638.png'),('M016','SUPRA X 125 FI','94877290.png'),('M017','CBR150R','50206051.png'),('M018','CBR250RR','53584591.png'),('M019','REVO X','81793278.png'),('M020','VARIO 125 CBS -ISS','17773426.png'),('M021','PCX HYBRID','95129220.png'),('M022','CRF 150L','68416320.png'),('M023','HONDA MONKEY','89859370.png'),('M024','HONDA-CBR1000RR','47750496.png'),('M025','Kawasaki KLX 150 BF','27676340.jpg'),('M026','NINJA 250','81127563.png'),('M027','W175TR','98664872.png'),('M028','NINJA ZX-6R ABS','78334833.png'),('M029','NEX II Elegant Premium','44494084.png'),('M030','ADDRESS PLAYFUL','45915811.png'),('M031','NEW SMASH FI','86223530.png'),('M032','ALL NEW SATRIA F150','20743200.png'),('M033','GSX-S150','67723312.png'),('M034','GSX -R150','73286479.png');

/*Table structure for table `nilai_kriteria` */

DROP TABLE IF EXISTS `nilai_kriteria`;

CREATE TABLE `nilai_kriteria` (
  `kode_nilai_kriteria` varchar(20) NOT NULL,
  `kode_kriteria` varchar(20) NOT NULL,
  `crips` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`kode_nilai_kriteria`),
  KEY `kode_kriteria` (`kode_kriteria`),
  CONSTRAINT `nilai_kriteria_ibfk_1` FOREIGN KEY (`kode_kriteria`) REFERENCES `data_kriteria` (`kode_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nilai_kriteria` */

insert  into `nilai_kriteria`(`kode_nilai_kriteria`,`kode_kriteria`,`crips`,`nilai`) values ('NK1','K1','DOHC',80),('NK10','K3','Honda',80),('NK11','K3','Yamaha',100),('NK12','K4','110 CC',10),('NK13','K4','125 CC',20),('NK14','K4','150 CC',40),('NK15','K4','250 CC',60),('NK16','K4','600 CC',80),('NK17','K4','1000 CC',100),('NK18','K5','Karburator',70),('NK19','K5','Injeksi',100),('NK2','K1','SOHC',100),('NK20','K6','Manual',80),('NK21','K6','Matic',100),('NK22','K7','20000000',20),('NK23','K7','30000000',40),('NK24','K7','40000000',60),('NK25','K7','60000000',80),('NK26','K7','60000000',100),('NK3','K2','Silinder 1',20),('NK4','K2','Silinder 2',40),('NK5','K2','Silinder 3',60),('NK6','K2','Silinder 4',80),('NK7','K2','Silinder 6',100),('NK8','K3','Suzuki',40),('NK9','K3','Kawasaki',60);

/*Table structure for table `spesifikasi_motor` */

DROP TABLE IF EXISTS `spesifikasi_motor`;

CREATE TABLE `spesifikasi_motor` (
  `kode_spesifikasi` int(11) NOT NULL AUTO_INCREMENT,
  `kode_motor` varchar(20) NOT NULL,
  `merk_motor` varchar(20) NOT NULL,
  `tipe_mesin` varchar(20) NOT NULL,
  `silinder` varchar(50) NOT NULL,
  `volume` varchar(20) NOT NULL,
  `sistem_bb` varchar(50) NOT NULL,
  `transmisi` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_spesifikasi`),
  KEY `kode_motor` (`kode_motor`),
  KEY `merk_motor` (`merk_motor`),
  KEY `tipe_mesin` (`tipe_mesin`),
  KEY `silinder` (`silinder`),
  KEY `volume` (`volume`),
  KEY `sistem_bb` (`sistem_bb`),
  KEY `transmisi` (`transmisi`),
  KEY `harga` (`harga`),
  CONSTRAINT `spesifikasi_motor_ibfk_1` FOREIGN KEY (`kode_motor`) REFERENCES `data_motor` (`kode_motor`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `spesifikasi_motor` */

insert  into `spesifikasi_motor`(`kode_spesifikasi`,`kode_motor`,`merk_motor`,`tipe_mesin`,`silinder`,`volume`,`sistem_bb`,`transmisi`,`harga`) values (18,'M005','Yamaha','SOHC','Silinder 1','150 CC','Injeksi','Manual','37685000'),(19,'M006','Yamaha','DOHC','Silinder 2','250 CC','Injeksi','Manual','61665000'),(20,'M007','Yamaha','SOHC','Silinder 1','150 CC','Injeksi','Matic','33750000'),(21,'M008','Yamaha','SOHC','Silinder 1','125 CC','Injeksi','Matic','16350000'),(22,'M009','Yamaha','SOHC','Silinder 1','150 CC','Injeksi','Manual','27945000'),(23,'M010','Yamaha','SOHC','Silinder 1','150 CC','Injeksi','Manual','36900000'),(24,'M011','Yamaha','SOHC','Silinder 1','150 CC','Injeksi','Manual','24375000'),(25,'M012','Yamaha','SOHC','Silinder 1','125 CC','Injeksi','Manual','16665000'),(26,'M013','Yamaha','DOHC','Silinder 3','1000 CC','Injeksi','Manual','250000000'),(27,'M014','Yamaha','DOHC','Silinder 4','1000 CC','Injeksi','Manual','605000000'),(28,'M015','Honda','SOHC','Silinder 1','110 CC','Injeksi','Matic','16450000'),(29,'M016','Honda','SOHC','Silinder 1','125 CC','Injeksi','Manual','19250000'),(30,'M017','Honda','DOHC','Silinder 1','150 CC','Injeksi','Manual','40000000'),(31,'M018','Honda','DOHC','Silinder 2','250 CC','Injeksi','Manual','72700000'),(32,'M019','Honda','SOHC','Silinder 1','110 CC','Injeksi','Manual','16605000'),(33,'M020','Honda','SOHC','Silinder 1','125 CC','Injeksi','Matic','21505000'),(34,'M021','Honda','SOHC','Silinder 1','150 CC','Injeksi','Matic','43293000'),(35,'M022','Honda','SOHC','Silinder 1','150 CC','Injeksi','Manual','34450000'),(36,'M023','Honda','SOHC','Silinder 1','125 CC','Injeksi','Manual','77700000'),(37,'M024','Honda','DOHC','Silinder 4','1000 CC','Injeksi','Manual','715190000'),(38,'M025','Kawasaki','SOHC','Silinder 1','150 CC','Karburator','Manual','34600000'),(39,'M026','Kawasaki','DOHC','Silinder 2','250 CC','Injeksi','Manual','74400000'),(40,'M027','Kawasaki','SOHC','Silinder 1','150 CC','Karburator','Manual','29900000'),(41,'M028','Kawasaki','DOHC','Silinder 4','600 CC','Injeksi','Manual','315700000'),(42,'M029','Suzuki','SOHC','Silinder 1','110 CC','Injeksi','Matic','16500000'),(43,'M030','Suzuki','SOHC','Silinder 1','110 CC','Injeksi','Matic','17450000'),(44,'M031','Suzuki','SOHC','Silinder 1','110 CC','Injeksi','Manual','16850000'),(45,'M032','Suzuki','DOHC','Silinder 1','150 CC','Injeksi','Manual','25360000'),(46,'M033','Suzuki','DOHC','Silinder 1','150 CC','Injeksi','Manual','27400000'),(47,'M034','Suzuki','DOHC','Silinder 1','150 CC','Injeksi','Manual','30600000');

/*Table structure for table `tabel_alternatif` */

DROP TABLE IF EXISTS `tabel_alternatif`;

CREATE TABLE `tabel_alternatif` (
  `id_alternatif` int(11) NOT NULL AUTO_INCREMENT,
  `kode_alt` varchar(50) NOT NULL,
  PRIMARY KEY (`id_alternatif`),
  KEY `kode_alt` (`kode_alt`),
  CONSTRAINT `tabel_alternatif_ibfk_1` FOREIGN KEY (`kode_alt`) REFERENCES `data_motor` (`kode_motor`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_alternatif` */

insert  into `tabel_alternatif`(`id_alternatif`,`kode_alt`) values (106,'M011'),(107,'M012'),(108,'M013');

/*Table structure for table `tabel_nilai_alternatif` */

DROP TABLE IF EXISTS `tabel_nilai_alternatif`;

CREATE TABLE `tabel_nilai_alternatif` (
  `id_nilai_alt` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `merk` int(11) DEFAULT NULL,
  `mesin` int(11) DEFAULT NULL,
  `silinder` int(11) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `sbb` int(11) DEFAULT NULL,
  `transmisi` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_nilai_alt`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_nilai_alternatif` */

insert  into `tabel_nilai_alternatif`(`id_nilai_alt`,`nama`,`merk`,`mesin`,`silinder`,`volume`,`sbb`,`transmisi`,`harga`) values (57,'MX KING 150 MONSTER ENERGY YAMAHA MOTOGP EDITION',100,100,20,40,100,80,40),(58,'VEGA FORCE',100,100,20,20,100,80,20),(59,'MT09',100,80,60,100,100,80,100);

/*Table structure for table `tabel_normalisasi_alternatif` */

DROP TABLE IF EXISTS `tabel_normalisasi_alternatif`;

CREATE TABLE `tabel_normalisasi_alternatif` (
  `id_normalisasi_alt` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `merk` double DEFAULT NULL,
  `mesin` double DEFAULT NULL,
  `silinder` double DEFAULT NULL,
  `volume` double DEFAULT NULL,
  `sbb` double DEFAULT NULL,
  `transmisi` double DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  PRIMARY KEY (`id_normalisasi_alt`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_normalisasi_alternatif` */

insert  into `tabel_normalisasi_alternatif`(`id_normalisasi_alt`,`nama`,`merk`,`mesin`,`silinder`,`volume`,`sbb`,`transmisi`,`harga`,`jumlah`) values (13,'MX KING 150 MONSTER ENERGY YAMAHA MOTOGP EDITION',1,1,0.33333333333333,0.4,1,1,0.5,68.833333333333),(14,'VEGA FORCE',1,1,0.33333333333333,0.2,1,1,1,77.333333333333),(15,'MT09',1,0.8,1,1,1,1,0.2,79);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`nama`,`telepon`,`email`,`password`) values (1,'admin','081224556789','admin@gmail.com','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

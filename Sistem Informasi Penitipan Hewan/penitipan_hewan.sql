/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.14-MariaDB : Database - penitipan_hewan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`penitipan_hewan` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `penitipan_hewan`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `no_telp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=keybcs2;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`nama`,`no_telp`,`email`,`password`) values 
(1,'evik','083123456789','evikn02@gmail.com','admin');

/*Table structure for table `detail_transaksi` */

DROP TABLE IF EXISTS `detail_transaksi`;

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_jenis` int(11) NOT NULL,
  `makanan` int(11) NOT NULL,
  `ukuran_hewan` int(11) NOT NULL,
  `obat` int(11) NOT NULL,
  `vaksin` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `id_transaksi` (`id_transaksi`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_hewan` (`id_kategori_hewan`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `detail_transaksi` */

insert  into `detail_transaksi`(`id_detail`,`id_transaksi`,`id_kategori`,`id_jenis`,`makanan`,`ukuran_hewan`,`obat`,`vaksin`,`bayar`) values 
(34,30,1,1,1,0,0,0,30000),
(35,31,2,6,2,0,0,0,40000),
(36,32,1,1,1,0,0,0,30000),
(37,32,1,2,1,4,13000,2,223000),
(38,33,1,1,1,0,0,0,30000);

/*Table structure for table `gambar` */

DROP TABLE IF EXISTS `gambar`;

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `id_detail_trans` int(11) NOT NULL,
  `nama_gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_gambar`),
  KEY `id_detail_trans` (`id_detail_trans`),
  CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_detail_trans`) REFERENCES `detail_transaksi` (`id_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `gambar` */

insert  into `gambar`(`id_gambar`,`id_detail_trans`,`nama_gambar`) values 
(10,34,'70532747.jpg'),
(11,35,'28024743.jpg'),
(12,36,'23995442.jpg'),
(13,37,'82577678.jpg'),
(14,38,'51933175.jpg');

/*Table structure for table `jenis_hewan` */

DROP TABLE IF EXISTS `jenis_hewan`;

CREATE TABLE `jenis_hewan` (
  `id_jenis_hewan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_hewan` int(11) DEFAULT NULL,
  `nama_jenis_hewan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_hewan`),
  KEY `id_kategori_hewan` (`id_kategori_hewan`),
  CONSTRAINT `jenis_hewan_ibfk_1` FOREIGN KEY (`id_kategori_hewan`) REFERENCES `kategori_hewan` (`id_kategori_hewan`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `jenis_hewan` */

insert  into `jenis_hewan`(`id_jenis_hewan`,`id_kategori_hewan`,`nama_jenis_hewan`) values 
(1,1,'Persia'),
(2,1,'Anggora'),
(3,1,'Siam'),
(4,1,'Kampung'),
(5,1,'Ragoail'),
(6,2,'Pompom'),
(7,2,'Pudel'),
(8,2,'Cinuahua'),
(9,2,'Beagie'),
(10,2,'Shitzu'),
(11,2,'Chow-chow'),
(12,2,'Siberian husky');

/*Table structure for table `kategori_hewan` */

DROP TABLE IF EXISTS `kategori_hewan`;

CREATE TABLE `kategori_hewan` (
  `id_kategori_hewan` int(11) NOT NULL,
  `nama_kategori_hewan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_kategori_hewan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori_hewan` */

insert  into `kategori_hewan`(`id_kategori_hewan`,`nama_kategori_hewan`,`harga`) values 
(1,'Kucing',25000),
(2,'Anjing',30000);

/*Table structure for table `makanan` */

DROP TABLE IF EXISTS `makanan`;

CREATE TABLE `makanan` (
  `id_makanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_hewan` int(11) DEFAULT NULL,
  `keterangan` varchar(60) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_makanan`),
  KEY `id_kategori_hewan` (`id_kategori_hewan`),
  CONSTRAINT `makanan_ibfk_1` FOREIGN KEY (`id_kategori_hewan`) REFERENCES `kategori_hewan` (`id_kategori_hewan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `makanan` */

insert  into `makanan`(`id_makanan`,`id_kategori_hewan`,`keterangan`,`harga`) values 
(1,1,'Dari PS',5000),
(2,2,'Dari PS',10000);

/*Table structure for table `obat_peliharaan` */

DROP TABLE IF EXISTS `obat_peliharaan`;

CREATE TABLE `obat_peliharaan` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `id_hewan` int(11) DEFAULT NULL,
  `nama_obat` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_obat`),
  KEY `id_hewan` (`id_hewan`),
  CONSTRAINT `obat_peliharaan_ibfk_1` FOREIGN KEY (`id_hewan`) REFERENCES `kategori_hewan` (`id_kategori_hewan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `obat_peliharaan` */

insert  into `obat_peliharaan`(`id_obat`,`id_hewan`,`nama_obat`,`harga`) values 
(1,1,'Anti Bakteri',3000),
(2,1,'Anti Kutu',5000),
(3,1,'Anti Jamur',5000),
(4,2,'Anti Bakteri',5000),
(5,2,'Anti Kutu',10000),
(6,2,'Anti Jamur',10000);

/*Table structure for table `stok_kandang` */

DROP TABLE IF EXISTS `stok_kandang`;

CREATE TABLE `stok_kandang` (
  `nama` varchar(11) NOT NULL,
  `total` int(11) NOT NULL,
  `sisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `stok_kandang` */

insert  into `stok_kandang`(`nama`,`total`,`sisa`) values 
('kucing',25,25),
('anjing',15,15);

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `tgl_titip` date DEFAULT NULL,
  `tgl_ambil` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `status_ambil` int(11) NOT NULL,
  `kode_trans` varchar(100) NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id_transaksi`,`id_user`,`tgl_titip`,`tgl_ambil`,`status`,`status_ambil`,`kode_trans`) values 
(30,4,'2020-08-30','2020-08-31',2,0,'TR001'),
(31,4,'2020-08-30','2020-08-31',2,0,'TR002'),
(32,4,'2020-08-30','2020-08-31',2,0,'TR004'),
(33,2,'2020-08-30','2020-08-31',2,0,'TR005'),
(34,2,'2020-09-01','2020-09-02',2,0,''),
(35,2,'2020-08-30','2020-08-31',0,0,'');

/*Table structure for table `ukuran_hewan` */

DROP TABLE IF EXISTS `ukuran_hewan`;

CREATE TABLE `ukuran_hewan` (
  `id_ukuran` int(11) NOT NULL AUTO_INCREMENT,
  `id_peliharaan` int(11) DEFAULT NULL,
  `nama_ukuran` varchar(50) DEFAULT NULL,
  `harga_ukuran` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ukuran`),
  KEY `id_peliharaan` (`id_peliharaan`),
  CONSTRAINT `ukuran_hewan_ibfk_1` FOREIGN KEY (`id_peliharaan`) REFERENCES `kategori_hewan` (`id_kategori_hewan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `ukuran_hewan` */

insert  into `ukuran_hewan`(`id_ukuran`,`id_peliharaan`,`nama_ukuran`,`harga_ukuran`) values 
(4,1,'S (Small)',30000),
(5,1,'M (Medium)',45000),
(6,1,'L (Large)',60000),
(7,2,'S (Small)',45000),
(8,2,'M (Medium)',65000),
(9,2,'L (Large)',90000);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`nama`,`alamat`,`no_telp`,`username`,`password`,`email`) values 
(1,'Evik ','Jl. Purbaya No.109, Warak Kidul, Sumberadi, Mlati, Sleman, Yogyakarta','083122494952','evik','123','evik@gmail.com'),
(2,'Frengky','London stret','0972611771','fucek','123','frengkyman@gmail.com'),
(4,'Demon Hunter','Lawn Of Dawns','083122494952','alucard','123','demon@gmail.com');

/*Table structure for table `vaksin` */

DROP TABLE IF EXISTS `vaksin`;

CREATE TABLE `vaksin` (
  `id_vaksin` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_hewan` int(11) DEFAULT NULL,
  `nama_vaksin` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_vaksin`),
  KEY `id_kategori_hewan` (`id_kategori_hewan`),
  CONSTRAINT `vaksin_ibfk_1` FOREIGN KEY (`id_kategori_hewan`) REFERENCES `kategori_hewan` (`id_kategori_hewan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `vaksin` */

insert  into `vaksin`(`id_vaksin`,`id_kategori_hewan`,`nama_vaksin`,`harga`) values 
(1,1,'Vaksin Feio 3',140000),
(2,1,'Vaksin Feio 4',150000),
(3,2,'DHP',135000),
(4,2,'DHPPi',145000),
(5,2,'DHPPiLR',170000),
(6,2,'Rabies',50000);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : 127.0.0.1:3306
 Source Schema         : mangga_db

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 20/09/2020 19:52:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
BEGIN;
INSERT INTO `admin` VALUES ('admin', 'ahmad');
COMMIT;

-- ----------------------------
-- Table structure for cf_penyakit
-- ----------------------------
DROP TABLE IF EXISTS `cf_penyakit`;
CREATE TABLE `cf_penyakit` (
  `id_cfpenyakit` int(11) NOT NULL AUTO_INCREMENT,
  `id_penyakit` varchar(5) NOT NULL,
  `cf_pakar` double NOT NULL,
  PRIMARY KEY (`id_cfpenyakit`),
  UNIQUE KEY `id_penyakit` (`id_penyakit`),
  KEY `aturan_ibfk_1` (`id_penyakit`),
  CONSTRAINT `cf_penyakit_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cf_penyakit
-- ----------------------------
BEGIN;
INSERT INTO `cf_penyakit` VALUES (15, 'P001', 0.9);
INSERT INTO `cf_penyakit` VALUES (17, 'P002', 0.9);
INSERT INTO `cf_penyakit` VALUES (18, 'P003', 0.85);
INSERT INTO `cf_penyakit` VALUES (19, 'P004', 0.95);
INSERT INTO `cf_penyakit` VALUES (20, 'P005', 0.95);
INSERT INTO `cf_penyakit` VALUES (21, 'P006', 0.95);
INSERT INTO `cf_penyakit` VALUES (22, 'P007', 0.95);
INSERT INTO `cf_penyakit` VALUES (23, 'P008', 0.9);
COMMIT;

-- ----------------------------
-- Table structure for gejala
-- ----------------------------
DROP TABLE IF EXISTS `gejala`;
CREATE TABLE `gejala` (
  `id_gejala` varchar(5) NOT NULL,
  `nama_gejala` varchar(200) NOT NULL,
  PRIMARY KEY (`id_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gejala
-- ----------------------------
BEGIN;
INSERT INTO `gejala` VALUES ('G001', 'Terdapat bercak-bercak pada daun tidak teratur');
INSERT INTO `gejala` VALUES ('G002', 'Pusat bercak saling pecah menyebabkan bercak berlubang');
INSERT INTO `gejala` VALUES ('G003', 'Daun yang sakit mengering dan gugur ');
INSERT INTO `gejala` VALUES ('G004', 'Serangan pada tangkai daun dapat menyebabkan daun layu dan rontok');
INSERT INTO `gejala` VALUES ('G005', 'Pada batang muda terdapat bercak-bercak berwarna kelabu yang bisa berkembang dan mengelilingi batang yang dapat menyebabkan matinya yang terserang');
INSERT INTO `gejala` VALUES ('G006', 'Pada bagian bunga terjadi bintik-bintik kecil berwarna hitam terutama pada keadaan cuaca lembab, dan dapat menyebabkan rontoknya sebagian atau seluruh kuncup bunga ');
INSERT INTO `gejala` VALUES ('G007', 'Pada buah-buah yang matang terlihat gejala khas yaitu bercak-bercak hitam pada bagian kulit, yang sedikit demi sedikit melekuk dan bersatu, daging buah membusuk');
INSERT INTO `gejala` VALUES ('G008', 'Pada batang atau cabang, mengeluarkan blendok, kulit berwarna gelap, kemudian mengering dan agak mengendap dan selajutnya pecah dan mengelupas sebagai kepingan ');
INSERT INTO `gejala` VALUES ('G009', 'Bagian yang sakit menjadi luka yang terbuka (kanker)');
INSERT INTO `gejala` VALUES ('G010', 'cabang yang terserang berat bisa mati');
INSERT INTO `gejala` VALUES ('G011', 'Patogen (parasit) ini dapat menyebabkan matinya ujung tanaman (dieback) pada ranting tanaman, juga dapat meyebabkan busuk lunak pada buah');
INSERT INTO `gejala` VALUES ('G012', 'Terbentuknya miseluim mengkilat seperti rumah laba-laba dan berkembang menjadi kerak berwarna merah jambu pada cabang/batang');
INSERT INTO `gejala` VALUES ('G013', 'Daun-daun yang terdapat pada ujung batang menjadi layu dan mengering ');
INSERT INTO `gejala` VALUES ('G014', 'Bercak biasanya dibatasi oleh tepi berwarna gelap');
INSERT INTO `gejala` VALUES ('G015', 'Bercak-bercak dapat bersatu membentuk bercak yang lebih besar yang dapat mencapai beberapa cm');
INSERT INTO `gejala` VALUES ('G016', 'Pada bercak tua pada bagian yang berwarna kelabu, terdapat titik-titik hitam yang terdiri dari tubuh buah, seringkali bagian ini pecah dan menimbulkan lubang');
INSERT INTO `gejala` VALUES ('G017', 'Gejala berupa bercak daun dengan bentuk tidak teratur, berwarna kelabu keputih â€“ putihan dan panjangnya beberapa mm');
INSERT INTO `gejala` VALUES ('G018', 'bercak yang berwarna kelabu terdapat titik-titik hitam yang terdiri atas tubuh buah');
INSERT INTO `gejala` VALUES ('G019', 'Patogen (parasit) umumnya menyerang daun tua');
INSERT INTO `gejala` VALUES ('G020', 'Permukaan kulit buah ditandai dengan adanya noda/titik bekas tusukan ovipositor (alat peletak telur) lalat betina saat meletakkan telurnya ke dalam buah');
INSERT INTO `gejala` VALUES ('G021', 'Larva yang menetas dari telur di dalam buah, maka noda-noda tersebut berkembang menjadi bercak coklat di sekitar titik tersebut');
INSERT INTO `gejala` VALUES ('G022', 'Larva memakan daging buah');
INSERT INTO `gejala` VALUES ('G023', 'Buah menjadi busuk dan gugur sebelum matang');
INSERT INTO `gejala` VALUES ('G024', 'Daun menjadi keputihan penuh dengan kutu putih. Kutu putih/kutu kebul juga merangsang terbentuknya cendawan jelaga');
INSERT INTO `gejala` VALUES ('G025', 'Serangan hama kutu putih menyebabkan pertumbuhan dan produksi buah terhambat');
INSERT INTO `gejala` VALUES ('G026', 'Pada bekas patahnya cabang, terlihat lubang dan saluran gerekan');
INSERT INTO `gejala` VALUES ('G027', 'Larva membuat saluran gerekan tidak lebih dari 2,5 cm di dalam ujung ranting yang berdiameter kurang lebih 6 mm');
INSERT INTO `gejala` VALUES ('G028', 'Pada cabang-cabang yang mati apabila dibelah pada bekas saluran tersebut seringkali menjadi tempat tinggal semut');
INSERT INTO `gejala` VALUES ('G029', 'Dari lubang gerekan tersebut mengalir cairan getah berwarna hitam');
INSERT INTO `gejala` VALUES ('G030', 'Pada tanaman yang rusak berat, dapat mengakibatkan kerusakan bunga dan cabang patah');
INSERT INTO `gejala` VALUES ('G031', 'Serangan pada ranting tampak dengan adanya benjolan seperti gumpalan yang merupakan campuran kotoran serangga dengan getah');
COMMIT;

-- ----------------------------
-- Table structure for penyakit
-- ----------------------------
DROP TABLE IF EXISTS `penyakit`;
CREATE TABLE `penyakit` (
  `id_penyakit` varchar(5) NOT NULL,
  `nama_penyakit` varchar(200) NOT NULL,
  `definisi` text NOT NULL,
  `solusi` text NOT NULL,
  PRIMARY KEY (`id_penyakit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of penyakit
-- ----------------------------
BEGIN;
INSERT INTO `penyakit` VALUES ('P001', 'ANTRAKNOSA', 'Antraknose adalah patogen atau jamur Gloeosporium mangiferae rac, Colletotrichum gloeosporiodes Penz, Glomerella cingulate (Ston). Bagian-bagian tanaman yang tumbuh dengan cepat (sukulentis) termasuk daun, bunga, dan buah paling rentang terhadap antraknos. Penyakit ini terbentuk karena kelembapan udara dan hujan. Pada cuaca yang sanggat lembap jamur dapat membuntuk banyak sepora pada bagian-bagian tanaman yang sakit. Infeksi dibantu oleh kelembapan yang tinggi, terutama jika hal ini terjadi bersamaan dengan perkembangan yang cepat dari bagian tanaman tertentu. Jamur tidak tumbuh kelembapan kurang dari 95%.  ', '<ol>\n    <li>Jangan mengusahakan mangga secara komersial di daerah-daerah yang basah dan lembap. </li>\n    <li>Tanaman harus dirawat sebaik-baiknya agar menjadi lebih tahan. Tanaman dipupuk dengan tepat dan diairi selama musim kemarau.</li>\n    <li>Tentukan jarak tanam dan lakukan pemangkasan. </li>\n    <li>Memotong dan memusnahkan bagian tanaman yang terserang</li>\n    <li>Menghindari penanaman yang disatukan dengan pohon buah lain seperti jeruk, pisang, pepaya, alpukat, kopi dan jambu monyet. </li>\n    <li>Pada saat tampak gejala awal dilakukan penyemprotan fungisida Benomil (500 ppm) / Tiabendazol (90 ppm).</li>\n    <li>Pengendalian lain bisa dengan penyemprotan fungisida dengan komposisi Dicotophos 0,2% dan Mancozeb 0,25%, selang 3-7 hari dilakukan pemupukan dengan pupuk daun dengan dosis 2gram / liter udara.</li>\n</ol>');
INSERT INTO `penyakit` VALUES ('P002', 'PENYAKIT KULIT BOTRYODIPLODIA', 'penyakit kulit Botryodiplodia adalah patogen atau jamur Botryodiplodia theobromae suatu jamur yang umumnya terdapat di daerah tropika. Penyakit timbul pada pangkal batang dan dengan mendadak menerima sinar matahari penuh, misalnya karena pemangkasan yang terlalu berat. Dari bagian yang sakit mengalir blendok, kulit berwarna gelap, kelak mongering dan agak mengendap, pecah dan mengelupas sebagai keping-kepingan. Bagian yang sakit menjadi luka yang terbuka (kanker) dan cabang yang sakit dapat mati.', '1.) Mengupas kulit batang atau ranting yang terserang, lalu dioles dengan bubur Bordeaux 5% yang ditambah dengan lem kayu 0,5% atau bias juga dengan campuran kapur dan garam dapur (25 kg kapur mati, 2 kg garam dapur, 25-35 liter air). 2.) Kebun diperiksa dengan teratur agar serangga dapat diketahui segera. Bagian yang sakit dipotong dan luka yang terjadi ditutupi dengan lilinyang dicampur dengan karbolineum plantarium.');
INSERT INTO `penyakit` VALUES ('P003', 'JAMUR UPAS', 'penyakit jamur upas adalah patogen Upasia salmonicolor, Corticium salmonicolor. Penyakit ini biasanya menyerang pada permukaan cabang dan ranting ini terdapat benang-benang jamur putih mengkilat, seperti sarang laba-laba. Seterusnya jamur akan membuntuk kerak berwarna merah jambu, yang merupakan tanda khas dari jamur upas.', '1.)Mengupas / mengerok bagian cabang dan ranting yang terserang. 2.)Memotong dan memusnahkan cabang serta ranting yang terserang. 3.)Sebelum tampak gejala serangan, tanaman disemprot dengan fungisida DITHANE, DEROSAL atau DACONIL satu minggu sekali.');
INSERT INTO `penyakit` VALUES ('P004', 'BERCAK DAUN HITAM STIGMINA', 'penyakit bercak daun hitam adalah patogen atau jamur Stigmina mangiferae (Koord) ell. Penyakit lebih banyak terdapat selama musih hujan, tanaman membentuk daun-daun muda (flush). Baik daun muda maupun daun tua dapat terinfeksi, namun kerugian yang lebih berat terjadi pada daun-daun muda, karna daun-daun ini lebih cepat rontok dari pada biasanya.', '1.) Penyakit dapat dikendalikan dengan mengunakan benomil, tiofanat-metil, atau karbendazim. Dengan penambahan perata (misalnya Teepol), fungsida memberikan hasil yang lebih baik. 2.) Klorotalonil dan kaptan dapat dipakai juga, namun fungsida ini memerlukan tambahan pelekat (misalnya Tenac sticker). 3.) Daun yang sakit yang telah gugur pun dapat menjadi sumber infeksi, sebaiknya daun-daun ini dikumpulkan dan dibakar.');
INSERT INTO `penyakit` VALUES ('P005', 'BERCAK DAUN KELABU', 'penyakit bercak daun kelabu adalah patogen atau jamur Pestalotiopsis mangiferae (Henn.) Stey, Pestalotia funereal-desm, P. pauciseta Sacc. Konidium berbentuk kumparan, dengan ukuran lebih kurang 20 x 5 ?m, mempunyai tiga sel tengah yang berdinding tebal, kecoklatan-coklatan, dengan sel pangkal dan sel ujung hialin. Sel ujung mempunyai 3 ekor (seta)', '1.) Pemakaian fungisida untuk mengendalikan penyakit-penyakit daun yang lebih penting akan mengendalikan bercak daun kelabu.');
INSERT INTO `penyakit` VALUES ('P006', 'LALAT BUAH', 'adalah hama yang banyak menyerang buah-buahan dan sayuran, Serangga dewasa berwarna kuning bersayap putih bening dan panjang 7 - 8 mm, suka hinggap dan bertelur pada buah mangga, jambu biji; jambu air, belimbing, nangka, jeruk dan cabai, jadi buah menjadi rusak. ', '1.) Dengan memusnahkan buah yang rusak, memberi umpan berupa larutan sabun atau metil eugenol di dalam wadah dan insektisida atau dengan pemasangan perangkap lalat buah dengan menggunakan minyak selasih dan petrogenol untuk menangkap lalat buah. Minyak selasih dan petrogenol adalah senyawa pemikat (sex pheromone) bekerja sebagai penghubung antara individu jantan dan individu betina sehingga keduanya dapat menjalankan perilaku kawin dan kopulasi.');
INSERT INTO `penyakit` VALUES ('P007', 'KUTU KEBUL/KUTU PUTIH', 'adalah salah satu dari beberapa spesies whitefly yang saat ini merupakan hama pertanian. Kutu berbentuk oval, datar, tertutup lapisan tebal seperti lilin, sering hinggap di daun dan menghisap cairan sel daun. Akibat serangan kutu tersebut, pada daun terdapat bercak kuning kotor. Gejala jika tanaman terserang hama kutu putih adalah daun menjadi keputihan penuh dengan kutu putih. Kutu putih / kutu kebul juga merangsang terbentuknya cendawan jelaga. Serangan hama kutu putih menyebabkan pertumbuhan dan produksi tanaman terhambat. ', '1.) Memotong / memangkas daun yang ada di koloni kutu putih kemudian membakarnya. <br> 2.) Jika sudah parah dan seluruh daun ada kutu putih maka bisa dilakukan pemangkasan total. 3.) menyemprotkan insektisida yang sesuai (secukupnya).\r\n');
INSERT INTO `penyakit` VALUES ('P008', 'PENGGEREK CABANG DAN RANTING', 'Larva ini biasanya menggerek pucuk yang masih muda (flush) dan malai bunga dengan caraa mengebor, menggerek tunas, malai menuju kebawah. Tunas daun/malai bunga akan menjadi layu, batang akan mengelupas kering sehingga transportasi unsur hara terhenti kemudian mati. ', '1.) Segera pangkas bagian tanaman yang terserang kurang lebih 5 cm di bawah lubang yang masing-masing mengeluarkan kotoran segar. 2.) Musnahkan larva penggerek yang ada di cabang / ranting / batang yang telah dipotong dengan jalan membelah bagian tanaman tersebut dan membakarnya. 3.) dilakukan dengan menyemprotkan insektisida pada fase tunas untuk menghindarkan tanaman mangga yang terserang oleh perusak pucuk sekaligus menghindarkan serangan penggerek batang.');
COMMIT;

-- ----------------------------
-- Table structure for petunjuk
-- ----------------------------
DROP TABLE IF EXISTS `petunjuk`;
CREATE TABLE `petunjuk` (
  `id_petunjuk` varchar(4) NOT NULL,
  `nama_petunjuk` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_petunjuk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of petunjuk
-- ----------------------------
BEGIN;
INSERT INTO `petunjuk` VALUES ('PT01', 'Beranda', 'Halaman utama saat webite pertama kali dibuka oleh pengunjung.');
INSERT INTO `petunjuk` VALUES ('PT02', 'Petunjuk', 'Halaman yang digunakan untuk mengetahui fungsi-fungsi menu pada website.');
INSERT INTO `petunjuk` VALUES ('PT03', 'Diagnosa', 'Halaman yang digunakan untuk melakukan diagnosa penyakit berdasarkan gejala-gejala yang dipaparkan, penggunjung langsung dapat menggunakan tanpa perlu melakukan registrasi dan login terlebih dahulu.');
INSERT INTO `petunjuk` VALUES ('PT04', 'Info Penyakit', 'Halaman yang berisi tentang penyakit-penyakit yang terindex di dalam aplikasi sistem pakar berserta penjelasan penyakit.');
INSERT INTO `petunjuk` VALUES ('PT05', 'Tentang', 'Halaman yang berisi infomasi tentang aplikasi dan nama pakar.');
INSERT INTO `petunjuk` VALUES ('PT06', 'Login Admin', 'Menu yang digunakan admin/pakar untuk melakukan akses ke halaman khusus guna pengelolaan data aplikasi.');
COMMIT;

-- ----------------------------
-- Table structure for profil
-- ----------------------------
DROP TABLE IF EXISTS `profil`;
CREATE TABLE `profil` (
  `id_profil` varchar(4) NOT NULL,
  `aplikasi` text NOT NULL,
  `admin` text NOT NULL,
  `pakar` text NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of profil
-- ----------------------------
BEGIN;
INSERT INTO `profil` VALUES ('PR01', 'Sistem Pakar Hama & Penyakit Tanaman Buah Mangga Metode Certainty Factor Berbasis Web', 'Achmad Maulana', 'Dr.Arlyna Budi Pustika');
COMMIT;

-- ----------------------------
-- Table structure for rule
-- ----------------------------
DROP TABLE IF EXISTS `rule`;
CREATE TABLE `rule` (
  `id_rule` int(11) NOT NULL AUTO_INCREMENT,
  `id_penyakit` varchar(5) NOT NULL,
  `nama_rule` varchar(20) NOT NULL,
  `cf_pakar` float NOT NULL,
  PRIMARY KEY (`id_rule`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rule
-- ----------------------------
BEGIN;
INSERT INTO `rule` VALUES (1, 'P001', 'ANTRAKNOSA_1', 1);
INSERT INTO `rule` VALUES (2, 'P001', 'ANTRAKNOSA_2', 0.2);
INSERT INTO `rule` VALUES (3, 'P001', 'ANTRAKNOSA_3', 0.3);
INSERT INTO `rule` VALUES (4, 'P001', 'ANTRAKNOSA_4', 0.4);
INSERT INTO `rule` VALUES (5, 'P001', 'ANTRAKNOSA_5', 0.5);
INSERT INTO `rule` VALUES (6, 'P001', 'ANTRAKNOSA_6', 0.6);
INSERT INTO `rule` VALUES (7, 'P001', 'ANTRAKNOSA_7', 0.7);
INSERT INTO `rule` VALUES (8, 'P001', 'ANTRAKNOSA_8', 0.8);
INSERT INTO `rule` VALUES (9, 'P002', 'BOTRYODIPLODIA_1', 1);
INSERT INTO `rule` VALUES (10, 'P002', 'BOTRYODIPLODIA_2', 0.2);
INSERT INTO `rule` VALUES (11, 'P002', 'BOTRYODIPLODIA_3', 0.3);
INSERT INTO `rule` VALUES (12, 'P003', 'JAMURUPAS_1', 1);
INSERT INTO `rule` VALUES (13, 'P003', 'JAMURUPAS_2', 0.2);
INSERT INTO `rule` VALUES (14, 'P003', 'JAMURUPAS_3', 0.3);
INSERT INTO `rule` VALUES (15, 'P003', 'JAMURUPAS_4', 0.4);
INSERT INTO `rule` VALUES (16, 'P004', 'BERCAKDAUNHITAM_1', 1);
INSERT INTO `rule` VALUES (17, 'P004', 'BERCAKDAUNHITAM_2', 0.2);
INSERT INTO `rule` VALUES (18, 'P004', 'BERCAKDAUNHITAM_3', 0.3);
INSERT INTO `rule` VALUES (19, 'P005', 'BERCAKDAUNKELABU_1', 1);
INSERT INTO `rule` VALUES (20, 'P005', 'BERCAKDAUNKELABU_2', 0.2);
INSERT INTO `rule` VALUES (21, 'P005', 'BERCAKDAUNKELABU_3', 0.3);
INSERT INTO `rule` VALUES (22, 'P006', 'LALATBUAH_1', 1);
INSERT INTO `rule` VALUES (23, 'P006', 'LALATBUAH_2', 0.4);
INSERT INTO `rule` VALUES (24, 'P006', 'LALATBUAH_3', 0.6);
INSERT INTO `rule` VALUES (25, 'P006', 'LALATBUAH_4', 0.8);
INSERT INTO `rule` VALUES (26, 'P007', 'KUTUKEBUL_1', 1);
INSERT INTO `rule` VALUES (27, 'P008', 'PENGGERAKCABANG_1', 1);
INSERT INTO `rule` VALUES (28, 'P008', 'PENGGERAKCABANG_2', 0.2);
INSERT INTO `rule` VALUES (29, 'P008', 'PENGGERAKCABANG_3', 0.4);
INSERT INTO `rule` VALUES (30, 'P008', 'PENGGERAKCABANG_4', 0.6);
INSERT INTO `rule` VALUES (31, 'P008', 'PENGGERAKCABANG_5', 0.8);
COMMIT;

-- ----------------------------
-- Table structure for rule_detail
-- ----------------------------
DROP TABLE IF EXISTS `rule_detail`;
CREATE TABLE `rule_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rule` int(11) NOT NULL,
  `id_gejala` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rule_detail
-- ----------------------------
BEGIN;
INSERT INTO `rule_detail` VALUES (1, 1, 'G001');
INSERT INTO `rule_detail` VALUES (2, 1, 'G002');
INSERT INTO `rule_detail` VALUES (3, 1, 'G003');
INSERT INTO `rule_detail` VALUES (4, 1, 'G004');
INSERT INTO `rule_detail` VALUES (5, 1, 'G005');
INSERT INTO `rule_detail` VALUES (6, 1, 'G006');
INSERT INTO `rule_detail` VALUES (7, 1, 'G007');
INSERT INTO `rule_detail` VALUES (8, 1, 'G015');
INSERT INTO `rule_detail` VALUES (9, 1, 'G023');
INSERT INTO `rule_detail` VALUES (10, 2, 'G001');
INSERT INTO `rule_detail` VALUES (11, 2, 'G002');
INSERT INTO `rule_detail` VALUES (12, 3, 'G001');
INSERT INTO `rule_detail` VALUES (13, 3, 'G002');
INSERT INTO `rule_detail` VALUES (14, 3, 'G003');
INSERT INTO `rule_detail` VALUES (15, 4, 'G001');
INSERT INTO `rule_detail` VALUES (16, 4, 'G002');
INSERT INTO `rule_detail` VALUES (17, 4, 'G003');
INSERT INTO `rule_detail` VALUES (18, 4, 'G004');
INSERT INTO `rule_detail` VALUES (19, 5, 'G001');
INSERT INTO `rule_detail` VALUES (20, 5, 'G002');
INSERT INTO `rule_detail` VALUES (21, 5, 'G003');
INSERT INTO `rule_detail` VALUES (22, 5, 'G004');
INSERT INTO `rule_detail` VALUES (23, 5, 'G005');
INSERT INTO `rule_detail` VALUES (24, 6, 'G001');
INSERT INTO `rule_detail` VALUES (25, 6, 'G002');
INSERT INTO `rule_detail` VALUES (26, 6, 'G003');
INSERT INTO `rule_detail` VALUES (27, 6, 'G004');
INSERT INTO `rule_detail` VALUES (28, 6, 'G005');
INSERT INTO `rule_detail` VALUES (29, 6, 'G006');
INSERT INTO `rule_detail` VALUES (30, 7, 'G001');
INSERT INTO `rule_detail` VALUES (31, 7, 'G002');
INSERT INTO `rule_detail` VALUES (32, 7, 'G003');
INSERT INTO `rule_detail` VALUES (33, 7, 'G004');
INSERT INTO `rule_detail` VALUES (34, 7, 'G005');
INSERT INTO `rule_detail` VALUES (35, 7, 'G006');
INSERT INTO `rule_detail` VALUES (36, 7, 'G007');
INSERT INTO `rule_detail` VALUES (37, 8, 'G001');
INSERT INTO `rule_detail` VALUES (38, 8, 'G002');
INSERT INTO `rule_detail` VALUES (39, 8, 'G003');
INSERT INTO `rule_detail` VALUES (40, 8, 'G004');
INSERT INTO `rule_detail` VALUES (41, 8, 'G005');
INSERT INTO `rule_detail` VALUES (42, 8, 'G006');
INSERT INTO `rule_detail` VALUES (43, 8, 'G007');
INSERT INTO `rule_detail` VALUES (44, 8, 'G015');
INSERT INTO `rule_detail` VALUES (45, 9, 'G008');
INSERT INTO `rule_detail` VALUES (46, 9, 'G009');
INSERT INTO `rule_detail` VALUES (47, 9, 'G010');
INSERT INTO `rule_detail` VALUES (48, 9, 'G011');
INSERT INTO `rule_detail` VALUES (49, 10, 'G008');
INSERT INTO `rule_detail` VALUES (50, 10, 'G009');
INSERT INTO `rule_detail` VALUES (51, 11, 'G008');
INSERT INTO `rule_detail` VALUES (52, 11, 'G009');
INSERT INTO `rule_detail` VALUES (53, 11, 'G010');
INSERT INTO `rule_detail` VALUES (54, 12, 'G002');
INSERT INTO `rule_detail` VALUES (55, 12, 'G003');
INSERT INTO `rule_detail` VALUES (56, 12, 'G010');
INSERT INTO `rule_detail` VALUES (57, 12, 'G012');
INSERT INTO `rule_detail` VALUES (58, 12, 'G013');
INSERT INTO `rule_detail` VALUES (59, 13, 'G002');
INSERT INTO `rule_detail` VALUES (60, 13, 'G003');
INSERT INTO `rule_detail` VALUES (61, 14, 'G002');
INSERT INTO `rule_detail` VALUES (62, 14, 'G003');
INSERT INTO `rule_detail` VALUES (63, 14, 'G010');
INSERT INTO `rule_detail` VALUES (64, 15, 'G002');
INSERT INTO `rule_detail` VALUES (65, 15, 'G003');
INSERT INTO `rule_detail` VALUES (66, 15, 'G010');
INSERT INTO `rule_detail` VALUES (67, 15, 'G012');
INSERT INTO `rule_detail` VALUES (68, 16, 'G001');
INSERT INTO `rule_detail` VALUES (69, 16, 'G014');
INSERT INTO `rule_detail` VALUES (70, 16, 'G015');
INSERT INTO `rule_detail` VALUES (71, 16, 'G016');
INSERT INTO `rule_detail` VALUES (72, 17, 'G001');
INSERT INTO `rule_detail` VALUES (73, 17, 'G014');
INSERT INTO `rule_detail` VALUES (74, 18, 'G001');
INSERT INTO `rule_detail` VALUES (75, 18, 'G014');
INSERT INTO `rule_detail` VALUES (76, 18, 'G015');
INSERT INTO `rule_detail` VALUES (77, 19, 'G001');
INSERT INTO `rule_detail` VALUES (78, 19, 'G017');
INSERT INTO `rule_detail` VALUES (79, 19, 'G018');
INSERT INTO `rule_detail` VALUES (80, 19, 'G019');
INSERT INTO `rule_detail` VALUES (81, 20, 'G001');
INSERT INTO `rule_detail` VALUES (82, 20, 'G017');
INSERT INTO `rule_detail` VALUES (83, 21, 'G001');
INSERT INTO `rule_detail` VALUES (84, 21, 'G017');
INSERT INTO `rule_detail` VALUES (85, 21, 'G018');
INSERT INTO `rule_detail` VALUES (86, 22, 'G007');
INSERT INTO `rule_detail` VALUES (87, 22, 'G020');
INSERT INTO `rule_detail` VALUES (88, 22, 'G021');
INSERT INTO `rule_detail` VALUES (89, 22, 'G022');
INSERT INTO `rule_detail` VALUES (90, 22, 'G023');
INSERT INTO `rule_detail` VALUES (91, 23, 'G007');
INSERT INTO `rule_detail` VALUES (92, 23, 'G020');
INSERT INTO `rule_detail` VALUES (93, 24, 'G007');
INSERT INTO `rule_detail` VALUES (94, 24, 'G020');
INSERT INTO `rule_detail` VALUES (95, 24, 'G021');
INSERT INTO `rule_detail` VALUES (96, 25, 'G007');
INSERT INTO `rule_detail` VALUES (97, 25, 'G020');
INSERT INTO `rule_detail` VALUES (98, 25, 'G021');
INSERT INTO `rule_detail` VALUES (99, 25, 'G022');
INSERT INTO `rule_detail` VALUES (100, 26, 'G024');
INSERT INTO `rule_detail` VALUES (101, 26, 'G025');
INSERT INTO `rule_detail` VALUES (102, 27, 'G026');
INSERT INTO `rule_detail` VALUES (103, 27, 'G027');
INSERT INTO `rule_detail` VALUES (104, 27, 'G028');
INSERT INTO `rule_detail` VALUES (105, 27, 'G029');
INSERT INTO `rule_detail` VALUES (106, 27, 'G030');
INSERT INTO `rule_detail` VALUES (107, 27, 'G031');
INSERT INTO `rule_detail` VALUES (108, 28, 'G026');
INSERT INTO `rule_detail` VALUES (109, 28, 'G027');
INSERT INTO `rule_detail` VALUES (110, 28, 'G026');
INSERT INTO `rule_detail` VALUES (111, 29, 'G027');
INSERT INTO `rule_detail` VALUES (112, 29, 'G028');
INSERT INTO `rule_detail` VALUES (113, 30, 'G026');
INSERT INTO `rule_detail` VALUES (114, 30, 'G027');
INSERT INTO `rule_detail` VALUES (115, 30, 'G028');
INSERT INTO `rule_detail` VALUES (116, 30, 'G029');
INSERT INTO `rule_detail` VALUES (117, 31, 'G026');
INSERT INTO `rule_detail` VALUES (118, 31, 'G027');
INSERT INTO `rule_detail` VALUES (119, 31, 'G028');
INSERT INTO `rule_detail` VALUES (120, 31, 'G029');
INSERT INTO `rule_detail` VALUES (121, 31, 'G030');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

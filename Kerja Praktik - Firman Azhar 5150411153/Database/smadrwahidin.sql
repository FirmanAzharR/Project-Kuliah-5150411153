/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.26-MariaDB : Database - smadrwahidin
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`smadrwahidin` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `smadrwahidin`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(30) NOT NULL AUTO_INCREMENT,
  `kode_admin` varchar(30) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `nama_gambar` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`kode_admin`,`nama`,`tempat_lahir`,`tanggal_lahir`,`jenkel`,`alamat`,`email`,`telepon`,`nama_gambar`,`status`) values (1,'admin','Admin','Yogyakarta','1996-03-04','L','Yogyakarta','firmanazharr@gmail.com','083123621458',NULL,1);

/*Table structure for table `akademik_guru` */

DROP TABLE IF EXISTS `akademik_guru`;

CREATE TABLE `akademik_guru` (
  `kode_guru` int(11) NOT NULL AUTO_INCREMENT,
  `id_guru` int(11) NOT NULL,
  `NIP` varchar(50) NOT NULL,
  `NUPTK` varchar(50) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`kode_guru`),
  KEY `id_guru` (`id_guru`),
  CONSTRAINT `akademik_guru_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `akademik_guru` */

insert  into `akademik_guru`(`kode_guru`,`id_guru`,`NIP`,`NUPTK`,`status`) values (1,7,'197007302008012013','0062748650300042','1'),(3,9,'197007302008012017','0062748650300045','1'),(4,27,'197007302008012111','197007302008012111','1'),(5,26,'197007302008012112','197007302008012112','1'),(6,25,'197007302008012113','197007302008012113','1'),(7,24,'197007302008012114','197007302008012114','1'),(8,23,'197007302008012115','197007302008012115','1'),(9,22,'197007302008012116','197007302008012116','1'),(10,13,'197007302008012117','197007302008012117','1'),(11,20,'197007302008012118','197007302008012118','1'),(12,19,'197007302008012119','197007302008012119','1'),(13,18,'197007302008012120','197007302008012120','1'),(15,16,'197007302008012122','197007302008012122','1'),(16,15,'197007302008012123','197007302008012123','1'),(17,14,'197007302008012124','197007302008012124','1'),(20,10,'197007302008012127','197007302008012127','1'),(21,28,'197007302008012129','197007302008012129','1');

/*Table structure for table `akademik_siswa` */

DROP TABLE IF EXISTS `akademik_siswa`;

CREATE TABLE `akademik_siswa` (
  `NISS` varchar(50) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`NISS`),
  KEY `id_siswa` (`id_siswa`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `akademik_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  CONSTRAINT `akademik_siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `akademik_siswa` */

insert  into `akademik_siswa`(`NISS`,`id_siswa`,`id_kelas`,`semester`,`tahun_ajaran`,`status`) values ('1112320800201180001',21,1,'2','2018',1),('1112320800201180006',25,1,'2','2018',1),('1112320800201180007',28,1,'2','2018',1);

/*Table structure for table `berita` */

DROP TABLE IF EXISTS `berita`;

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `isi` longtext NOT NULL,
  `tgl` varchar(100) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `berita` */

insert  into `berita`(`id_berita`,`jenis`,`judul`,`isi`,`tgl`,`img`) values (12,'Pendidikan','Jokowi: Tak Perlu Risau soal \"Full Day School\"','<p>JAKARTA, KOMPAS.com - Presiden Joko Widodo meminta masyarakat tidak perlu khawatir soal wacana lima hari sekolah atau full day school. Hal ini disampaikan Jokowi dalam akun Facebook resminya, Senin (14/8/2017). &quot;Tak perlu risau soal wacana lima hari sekolah (full day school)&quot; tulis Jokowi sambil mengunggah foto empat anak berseragam sekolah dasar. Foto tersebut diberi tulisan, &#39;lima hari sekolah bukan keharusan!&#39;. Jokowi mengatakan, bagi sekolah yang selama ini menerapkan sekolah enam hari untuk tetap melanjutkannya. &quot;Tidak perlu berubah sampai lima hari,&quot; kata dia.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Gambar terkait\" src=\"https://asset.kompas.com/data/photo/2016/07/18/1334292IMG-20160718-092144-HDR-1468822086146780x390.jpg\" /></p>\r\n\r\n<p>Begitu pula bagi yang selama ini sudah menerapkan lima hari sekolah atau 8 jam belajar dalam sehari, Jokowi meminta hal tersebut dipertahankan. Yang terpenting, sistem sekolah disetujui oleh semua pihak, mulai dari masyarakat hingga ulama setempat. &quot;Untuk kedua kalinya saya tegaskan...,&quot; tulis Jokowi menutup statusnya. Baca: Presiden Diminta Undang Warga Nahdliyin terkait Full Day School Pada Kamis (10/8/2017) pekan lalu, Jokowi memang sudah menyampaikan hal serupa saat diwawancarai wartawan di Istana. Jokowi saat itu mengatakan bahwa ia akan segera menerbitkan Peraturan Presiden yang menggantikan Peraturan Menteri Pendidikan dan Kebudayaan Nomor 23 Tahun 2017 tentang sekolah lima hari. Full day school sebelumnya mendapatkan penolakan dari kalangan Nahdlatul Ulama karena dianggap dapat mematikan sekolah madrasah diniyah. Sebab, dengan sistem full day school, jam belajar akan menjadi 8 jam setiap harinya atau akan mencapai sore hari. Padahal, sekolah madrasah dimulai di siang hari. Baca: Alhamdulillah, Bapak Presiden Sudah Tegas soal Full Day School Ketua Umum Pengurus Besar Nahdlatul Ulama (PBNU) Said Aqil Siradj menegaskan, NU menolak keras kebijakan sekolah lima hari. Ia mengatakan, soal ini tidak perlu dikompromikan lagi. &quot;Kami dari NU menolak keras. Tidak ada dialog, dan yang penting pemerintah segera mencabut Permen sekolah lima hari,&quot; kata Said, ditemui di sela-sela Grand Launching Hari Santri 2017, di Jakarta, Kamis (10/8/2017). Baca: Akan Terbitkan Perpres, Jokowi Tegaskan Full Day School Tak Wajib Ketua Fraksi Partai Persatuan Pembangunan Reni Marlinawati menyebut, meskipun full day school bukan suatu keharusan, banyak sekolah yang terpaksa menjalankan sistem tersebut karena gengsi. &quot;Sekolah itu punya gengsi sendiri. Tidak ada bagi kepala sekolah, &#39;Enggak usah dulu deh, kita kan belum siap&#39;. Mereka harus memperlihatkan, karena itu prestise di mata masyarakat, di mata pejabat di atasnya,&quot; kata Reni, dalam jumpa pers di Kompleks Parlemen, Senayan, Jakarta, Kamis (3/8/2017).<br />\r\n<br />\r\nArtikel ini telah tayang di&nbsp;<a href=\"http://kompas.com/\">Kompas.com</a>&nbsp;dengan judul &quot;Jokowi: Tak Perlu Risau soal &quot;Full Day School&quot;&quot;,&nbsp;<a href=\"https://nasional.kompas.com/read/2017/08/14/13380931/jokowi--tak-perlu-risau-soal-full-day-school-\">https://nasional.kompas.com/read/2017/08/14/13380931/jokowi--tak-perlu-risau-soal-full-day-school-</a>.&nbsp;<br />\r\nPenulis : Ihsanuddin<br />\r\n&nbsp;</p>\r\n','26 Jul, 2018 21:09:23','fullday.png'),(13,'Pendidikan','Sudah Waktunya Ada Mata Pelajaran Coding di Sekolah','<p><strong>JAKARTA</strong>&nbsp;- Kemajuan teknologi informasi (TI) harus diimbangi pembelajaran yang tepat. Kementerian Pendidikan dan Kebudayaan (Kemendikbud) didesak mulai mengajarkan mata pelajaran pemrograman komputer (<em>coding</em>) bagi para siswa di sekolah. Sektor pendidikan di mancanegara telah lama memberikan mata pelajaran (mapel) sains komputer atau pemrograman komputer. Sistem pembelajarannya, siswa bahkan didorong untuk mempelajari program dan aplikasi sehingga mereka bisa menciptakan aplikasi sendiri.<br />\r\n<br />\r\n&quot;Ini di semua negara, Amerika, Inggris, Singapura, Malaysia, Australia, Finlandia sudah mulai. Apakah kita akan selalu jadi orang yang ketinggalan, bangsa yang ketinggalan atau kita mau kejar ketinggalan itu dan malah bergerak jauh di depan,&quot; kata pengamat pendidikan dari Eduspec Indra Charismiadji seusai diskusi Pembelajaran Coding dalam Menumbuhkan Kecakapan Abad 21 dan Computational Thinking di Kantor Kemendikbud, Jakarta, Rabu (28/3/2018).<br />\r\n<br />\r\nIndra menjelaskan bahwa&nbsp;<em>science, technology, engineering, and mathematics</em>&nbsp;(STEM) dan<em>&nbsp;computer science</em>&nbsp;menjadi suatu tren di dunia pendidikan saat ini. Di negara lain seperti Amerika Serikat (AS), Finlandia, dan Australia, coding sudah dibuat dalam kurikulum yang berlaku dari jenjang SD hingga SMA. Contohnya di AS pelajaran khusus komputer sains diajarkan dalam mata pelajaran khusus. Sementara di Finlandia diajarkan dalam bentuk<em>&nbsp;e-learning</em>. Tidak ada guru yang mengajar tatap muka, melainkan siswa wajib belajar secara mandiri melalui jaringan (daring). Sedangkan di Australia lebih menarik lagi karena menggantikan pelajaran sejarah dan geografi dengan sains komputer.&nbsp;<br />\r\n<br />\r\nIndra mengatakan, Kemendikbud didesak untuk segera memulai mapel ini karena kementerian lain sudah mencoba memulai. Di antaranya Kementerian Agama (Kemenag) yang mulai tahun ini memasukkan&nbsp;<em>coding&nbsp;</em>ke dalam ekstrakuri kuler. Selain itu, Kementerian Komunikasi dan Informatika (Kemenkominfo) juga tengah menjalankan program 1.000&nbsp;<em>startup&nbsp;</em>dan lulusan SMK yang dia nilai sudah memiliki keahlian di bidang komputer berpotensi mengisi lowongan sebagai tenaga TI bagi 1.000 startup tersebut.<br />\r\n<br />\r\n&quot;Kebetulan di SMK ada mapel yang bisa menaungi program ini yakni simulasi digital dan&nbsp;<em>enterpreneurship</em>. Jadi kalau enggak bisa (program&nbsp;<em>coding</em>) dari SD, yang SMK dululah,&quot; katanya.&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"Sudah Waktunya Ada Mata Pelajaran Coding di Sekolah\" src=\"https://cdn.sindonews.net/dyn/620/content/2018/03/29/144/1293593/sudah-waktunya-ada-mata-pelajaran-coding-di-sekolah-1eF.jpg\" /></p>\r\n\r\n<p><br />\r\nDirektur Pembinaan SMK Kemendikbud Bahrun menjelaskan, saat ingin memasukkan coding ke dalam kurikulum harus dilihat dulu kompetensi mana yang akan digunakan. Dalam hal ini Kemendikbud akan berkoordinasi intensif dengan kementerian lain seperti dengan Kemenkominfo.&nbsp; Dia menyampaikan, perkembangan pendidikan yang terjadi di Indonesia tidak bisa dibandingkan dengan negara lain. Di Singapura misalnya hanya ada tiga SMK. Sementara Indonesia memiliki 13.910 SMK. &quot;Disparitas pendidikan kita memang relatif besar,&quot; katanya.&nbsp;<br />\r\n<br />\r\nSementara itu, Direktur Sekolah Global Sevilla Robertus Budi Setiono mengungkapkan, perkembangan teknologi memang tidak dapat dipisahkan dari pendidikan. Maka itu, peran sekolahlah yang harus bisa mengarahkan teknologi informasi itu ke efek yang positif.<br />\r\nMisalnya saja pemakaian gawai tidak dilarang di janjang SMP dan SMA di lingkungan sekolah. Hanya di tingkat TK dan SD yang tidak diperkenankan.&nbsp;<br />\r\n<br />\r\nRobert menjelaskan, memang gawai bagai dua sisi mata uang. Jika tidak dipakai dengan benar, akan berdampak buruk bagi siswa. Namun, di sisi lain gawai adalah alat untuk membuka jendela dunia karena memiliki akses ke informasi terbaru.</p>\r\n','26 Jul, 2018 21:23:55','kodekid.jpg'),(15,'Teknologi','Teknologi Digital EdConnect Mengubah Kegiatan Sekolah Lebih Efektif','<p>Dunia&nbsp;pendidikan di Indonesia dapat dimaksimalkan oleh teknologi, salah satunya coba dihadirkan oleh&nbsp;<a href=\"https://dailysocial.id/post/platform-saas-pendidikan-edconnect-yang-tak-sekedar-menyediakan-bahan-belajar-online\">Edconnect</a>. Banyak manfaat yang bisa didapat dengan&nbsp;<a href=\"https://dailysocial.id/search/teknologi/\">teknologi</a>&nbsp;digital yang dihadirkannya, sekaligus meninggalkan cara lama sekolah yang mengandalkan kertas sebagai medium utama kegiatan. Sehingga, tidak&nbsp;banyak pengeluaran biaya yang ditanggung oleh sekolah, seperti biaya pengadaan dan distribusi naskah ujian nasional tahun 2017.</p>\r\n\r\n<p>Sebelumnya juga ada kendala yang pada&nbsp;sistem administrasi belajar mengajar menggunakan teknologi dengan biaya yang&nbsp;tidak&nbsp;efisien. Namun, kemunculan EdConnect dengan berbagai fitur pintar dan&nbsp;memudahkan seperti presensi, dan informasi murid untuk&nbsp;dunia pendidikan lebih terjamin.&nbsp;Dengan fitur dari EdConnect, semua pengguna yang terlibat&nbsp;di dalamnya, seperti guru, murid, orang tua sampai kepala sekolah tidak perlu memikirkan biaya yang besar.</p>\r\n\r\n<p>CEO &amp; Co Founder EdConnect, Aswin Tanzil mengatakan bahwa kemajuan teknologi yang begitu pesat, kita langsung melihat penggunaan teknologi dalam pendidikan yang masih sangat minim sekali. Malah guru dan institusi pendidikan masih jarang sekali&nbsp;mengoptimalkan teknologi untuk kemajuan sekolah mereka.</p>\r\n\r\n<p>Supaya institusi pendidikan terakomodasi dengan cerdas dan digital, EdConnect sudah dapat digunakan&nbsp;untuk&nbsp;di tiga jenjang pendidikan SD, SMP dan SMA dalam mengelola sistem pendidikan dengan mudah, efisien dan tanpa kertas.</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<h2>Sistem&nbsp;<em>dashboard</em>&nbsp;pintar yang memantau perkembangan&nbsp;siswa</h2>\r\n\r\n<p>Hadirnya aplikasi<a href=\"https://dailysocial.id/search/edconnect-lite/\">&nbsp;EdConnect Lite</a>, sebelumnya melihat kondisi pendidikan di Indonesia yang dapat lebih efisien dan mengurangi&nbsp;penggunaan kertas melalui digital. Lewat aplikasi ini guru dapat mengabsen, memberi tugas, memberi nilai sampai merekapitulasi nilai secara keseluruhan hanya dengan&nbsp;<em>dashboard&nbsp;</em>pintar.</p>\r\n\r\n<p>Adapun kemudahan ini, sangat efisien menghubungkan semua faktor penting di sekolah dengan satu aplikasi. Di mana data absensi sampai nilai dapat dirangkum secara otomatis untuk menghemat waktu&nbsp;laporan siswa, baik harian, mingguan, dan bulanan. Sedangkan untuk nilai, guru dapat dengan mudah mengelola penilaian setiap ujian yang diberikan kepada siswa.</p>\r\n\r\n<p>Guru pun, tidak hanya mengontrol secara keseluruhan data murid di sekolah. Kini, orang tua juga dapat berkomunikasi langsung dengan guru melalui chat di dalam fitur aplikasi seluler. Sehingga,&nbsp;orang tua juga bisa langsung mengetahui&nbsp;nilai yang diberikan oleh guru.</p>\r\n','26 Jul, 2018 21:42:17','Untitled.png'),(16,'Umum','Begini Cara Belajar Untuk Hadapi Ujian Nasional dan Mendapatkan Uang Tunai','<p><strong>Liputan6.com, Jakarta</strong>&nbsp;Jika mendengar kata &#39;belajar&#39; rasanya tak semua para siswa semangat melakukannya ya. Padahal hitungan minggu, sebentar lagi para siswa sekolah di seluruh Indonesia akan menghadapi ujian nasional.</p>\r\n\r\n<p>Tentu saja setiap sekolah mulai mempersiapkan kegiatan ekstrakurikuler, seperti diadakannya pendalaman materi dari mata pelajaran yang akan diuji sejak beberapa bulan sebelumnya guna lancar dalam menghadapi ujian nasional.</p>\r\n\r\n<p>Namun, terkadang kegiatan tersebut tak selalu berjalan lancar. Ada saja tantangan yang harus dihadapi oleh para tenaga pengajar,&nbsp; kebanyakan adalah bagaimana meningkatkan minat belajar para murid.</p>\r\n\r\n<p>Ternyata, tak hanya pelajar SMU, namun saat ini para pelajar SMP pun mengalami kesulitan serupa.</p>\r\n\r\n<p>Bukan pahlawan tanpa tanda jasa atau guru namanya jika menyerah dan tak melakukan usaha untuk anak didiknya.</p>\r\n\r\n<p>Seperti yang dilakukan salah satu guru di SMP Pembangunan, Jakarta Timur, tak sengaja menemukan cara inovatif dalam memacu rasa semangat belajar anak didiknya. Soraya Hanum Trisdianto, guru yang berhasil menggunakan kuis yang berasal dari ponsel para muridnya untuk mendalami materi mata pelajaran.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Soraya Hanum Trisdianto, guru yang berhasil menggunakan kuis yang berasal dari ponsel para muridnya untuk mendalami materi mata pelajaran.\" src=\"https://cdn1-production-images-kly.akamaized.net/mDBzM4uMPKCLqIbmecPl0J48BVs=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/1967201/original/029359000_1520337752-3052fc16-0977-4dc2-847f-87b8283693f7.jpg\" /></p>\r\n\r\n<p>Cara ibu guru Soraya yang kreatif dalam mengajar anak-anak muridnya pun&nbsp;ikut menginspirasi Andhika Pratama. Aktor ini merasa salut dengan sang ibu guru.</p>\r\n\r\n<p>&ldquo;Saya sangat peduli dengan pendidikan anak saya, dan akan ada waktunya bagi saya untuk berperan di bidang ini untuk ruang lingkup yang lebih luas suatu saat nanti. Salut buat Ibu Soraya.. dan semoga semakin banyak guru kreatif seperti beliau di luar sana,&rdquo; ujar Andhika.</p>\r\n\r\n<p>Baginya, metode yang diterapkan Ibu Soraya&nbsp;merupakan cara kreatif dalam mengajar. Andhika sebagai orangtua memang enggan melakukan paksaan belajar pada anak-anaknya untuk menghapal atau mendalami pelajaran dengan cara yang tak mereka suka.</p>\r\n\r\n<p>&ldquo;Sekarang guru juga harus kreatif dan paham karakteristik anak remaja&nbsp;<em>zaman now</em>, karena seharusnya fokus utama adalah membangkitkan minat belajarnya dulu, baru setelah itu ke pendalaman materi,&rdquo; tutup Andhika.</p>\r\n\r\n<p>Sebagai informasi, Kuis Kaget, Uang Kaget adalah kuis yang digagas bersama oleh aplikasi browsing&nbsp;<a href=\"https://www.youtube.com/watch?v=qmFmWxkZXU8&amp;feature=youtu.be\">UC Browser</a>&nbsp;dan aplikasi<em>&nbsp;live streaming</em>&nbsp;BIGO Live. Kuis tersebut hadir setiap hari dengan berisi 12 pertanyaan seputar pengetahuan umum dan juga matematika dasar. Hadiah yang diberikan pun tak tanggung-tanggung, yakni uang tunai sampai dengan 40 juta rupiah tiap harinya.</p>\r\n\r\n<p>Kepala Sekolah SMP Pembangunan, Drs. Eko Amrih Widodo, berpendapat bahwa metode unik ini cukup berhasil meningkatkan minat belajar para murid, berpatokan dari antusiasme yang terlihat saat pendalaman materi dari hari ke hari.</p>\r\n\r\n<p>Dengan adanya kreatifitas dari para tenaga pengajar, diharapkan kegiatan belajar-mengajar di sekolah kini tak lagi membosankan dan malah menjadi suatu hal yang siswa-siswi gemari. Melakukan pendekatan dengan cara yang inovatif dan tak melulu konservatif akan menjadi kunci keberhasilan kegiatan belajar-mengajar yang kondusif tak hanya di sekolah, namun juga di seluruh lembaga pendidikan.</p>\r\n','27 Jul, 2018 02:57:21','uas.jpg'),(18,'Olahraga','Asian Games 2018, Tim Basket Putra Indonesia Kalah Telak Lawan Korsel','<p>Timnas basket putra Indonesia meraih hasil buruk pada laga perdana penyisihan Grup A Asian Games 2018. Mereka kalah telak dari Korea Selatan, Selasa (14/8/2018). Pada laga yang berlangsung di Hall Basket, Senayan, Jakarta, Arki Dikania Wisnu dkk kalah dengan skor 65-104. Pada kuarter pertama, Korea Selatan tampil cukup dominan. Terbukti, tim Negeri Ginseng ini sukses menorehkan keunggulan 5 angka saat fase awal pertandingan. Indonesia mencoba memberi perlawanan melalui Xaverius Prawiro dan Valentinus Wuwungan. Akan tetapi, Korsel mampu menunjukkan kolektivitas permainan yang lebih baik sehingga mengakhir kuarter pertama dengan skor 28-18.<br />\r\n<br />\r\nPada kuarter kedua, Indonesia memasukkan Andakara Prastawa untuk menambah daya gedor dan ternyata cukup memberi dampak positif. Korsel yang mengandalkan pemain naturalisasi Ricardo Preston Ratliffe tetap tidak mengendurkan serangan. Korsel kembali unggul dengan skor 53-31. Pada kuarter ketiga, dominasi Korsel semakin tidak terbendung karena banyak tembakan tiga angka yang sukses. Para pemain Indonesia berupaya keras untuk lepas dari bayang-bayang dominasi Korea. Namun, pertahanan Korea juga tergolong tangguh karena beberapa kali mampu mencuri bola pemain tuan rumah<br />\r\n<br />\r\nPerolehan poin Korea pun kian bertambah. Pada akhir kuarter ketiga, Ratliffe dkk menorehkan skor 80-45 atas Indonesia. Pada kuarter keempat, pemain Indonesia seperti frutrasi. Terbukti, tiga pemain terkena foul out. Mereka adalah Adhi Pratama, Arki dan Valentinus Wuwungan. Korsel pun pada akhirnya menang dengan jarak sangat lebar, 104-65.<br />\r\n&nbsp;</p>\r\n','15 Aug, 2018 04:35:56','indo.jpg');

/*Table structure for table `data_lengkap` */

DROP TABLE IF EXISTS `data_lengkap`;

CREATE TABLE `data_lengkap` (
  `id_dtlengkap` int(11) NOT NULL AUTO_INCREMENT,
  `kebutuhan_khusus` varchar(100) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `cabang` varchar(100) NOT NULL,
  `rekening` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dtlengkap`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `data_lengkap` */

insert  into `data_lengkap`(`id_dtlengkap`,`kebutuhan_khusus`,`nama_bank`,`cabang`,`rekening`) values (1,'Tidak ada','BPD','Sleman','SMA Dr.Wahidin Mlati');

/*Table structure for table `data_rinci` */

DROP TABLE IF EXISTS `data_rinci`;

CREATE TABLE `data_rinci` (
  `id_dtrinci` int(11) NOT NULL AUTO_INCREMENT,
  `status_bos` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `sertifikast_iso` varchar(100) NOT NULL,
  `daya_listrik` varchar(100) NOT NULL,
  `akses_internet` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dtrinci`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `data_rinci` */

insert  into `data_rinci`(`id_dtrinci`,`status_bos`,`waktu`,`sertifikast_iso`,`daya_listrik`,`akses_internet`) values (1,'Bersedia Menerima','Pagi','Belum Bersertifikat','PLN','Smartfren');

/*Table structure for table `detail_jurusan` */

DROP TABLE IF EXISTS `detail_jurusan`;

CREATE TABLE `detail_jurusan` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_jurusan` int(11) NOT NULL,
  `id_mapel` varchar(50) NOT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `id_jurusan` (`id_jurusan`),
  KEY `id_mapel` (`id_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_jurusan` */

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengirim` varchar(100) NOT NULL,
  `email_pengirim` varchar(100) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `pesan` varchar(2000) NOT NULL,
  PRIMARY KEY (`id_feedback`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `feedback` */

insert  into `feedback`(`id_feedback`,`nama_pengirim`,`email_pengirim`,`subject`,`pesan`) values (8,'Bahasa Indonesia','firmanazharr@gmail.com','Saran','Bagi Anda, atau siapa saja yang ingin bertanya akan suatu hal, berkaitan erat dengan Sekolah SMA Dr. Wahidin, Akademik, atau memberi kritik dan saran tentang website kami atau sekolah kami serta menawarkan sebuah kerja sama, apapun yang Anda ajukan, kami akan melayaninya dengan sepenuh hati. \r\n\r\nTerimakasih untuk tanggapan dan kerjasama anda.'),(9,'Agung','contoh@gmail.com','Saran','allalalalalllllkjkj');

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `guru` */

insert  into `guru`(`id_guru`,`nama`,`jenkel`,`tempat_lahir`,`tgl_lahir`,`agama`,`alamat`,`email`,`telepon`,`status`,`pendidikan`,`gambar`) values (7,'Dra. Sri Arti Reintarsih','P','Jakarta','2018-07-01','islam','Jakarta','sriarti@rocketmail.com','087654123456','nikah','S3 Akuntansi','teach.jpg'),(9,'Dra. Efrasina T. Wanitomurni','P','Yogyakarta','2018-07-20','islam','Yogyakarta','efrasina@gmail.com','09898988998','nikah','S2 Akuntansi',''),(10,'Prapti Lestari, S.Pd','P','Yogyakarta','2018-07-27','islam','Yogyakarta','praptilestari@gmail.com','087123456789','nikah','S1 Pendidikan Bahasa Indonesia',''),(13,'Indyah Sriwasiyati, S.S','P','Yogyakarta','2018-07-27','islam','Yogyakarta','contoh@gmail.com','081123123123','nikah','S2 Akuntansi',''),(14,'Dra. Rini Widiyastuti','P','Yogyakarta','2018-07-27','islam','Yogyakarta','contoh@gmail.com','09898988998','nikah','S2 Akuntansi',''),(15,'Sumardiyono, S.Pd','L','Yogyakarta','2018-07-27','islam','Yogyakarta','contoh@gmail.com','09898988998','nikah','S2 Akuntansi',''),(16,'Tri Rahayu K, S.Pd','P','Yogyakarta','2018-07-27','islam','Yogyakarta','contoh@gmail.com','09898988998','nikah','S2 Akuntansi',''),(18,'Iwandaru, S.Ag','L','Yogyakarta','2018-07-27','islam','Yogyakarta','contoh@gmail.com','09898988998','nikah','S1 Pendidikan Agama Islam',''),(19,'Chatarina Etty S.H. ,M.Pd','P','Yogyakarta','2018-07-27','kristen','Yogyakarta','contoh@gmail.com','09898988998','nikah','S2 Akuntansi',''),(20,'Basuki Rahmat, S.Pd','L','Yogyakarta','2018-07-27','islam','Yogyakarta','contoh@gmail.com','09898988998','nikah','S2 Akuntansi',''),(22,'Sulistyaningsih, ST','P','Yogyakarta','2018-07-27','islam','Yogyakarta','contoh@gmail.com','09898988998','nikah','S2 Akuntansi',''),(23,'Hasti Purnaningrum, SS','L','Yogyakarta','2018-07-27','islam','Yogyakarta','contoh@gmail.com','09898988998','nikah','S2 Akuntansi',''),(24,'Dewi Puspitasari, S.KOM','P','Yogyakarta','2018-07-27','islam','Yogyakarta','contoh@gmail.com','09898988998','nikah','S1 Informatika',''),(25,'Sugiyanto, S.Pd','L','Yogyakarta','2018-07-27','islam','Yogyakarta','contoh@gmail.com','09898988998','nikah','S1 Pendidikan Bahasa Indonesia',''),(26,'Drs. Ys. Sumiyadi','L','Yogyakarta','2018-07-27','islam','Yogyakarta','contoh@gmail.com','09898988998','nikah','S2 Akuntansi',''),(27,'Retno Wulandari, S.Pd','P','Yogyakarta','2018-07-27','islam','Yogyakarta','contoh@gmail.com','09898988998','nikah','S1 Pendidikan Bahasa Indonesia',''),(28,'Siti Khusnatun, S.Pd','P','Yogyakarta','2018-07-27','islam','Yogyakarta','contoh@gmail.com','09898988998','nikah','S2 Akuntansi','aaa.jpg');

/*Table structure for table `identitas_sekolah` */

DROP TABLE IF EXISTS `identitas_sekolah`;

CREATE TABLE `identitas_sekolah` (
  `id_identitas` int(11) NOT NULL AUTO_INCREMENT,
  `npsn` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `kepemilikan` varchar(100) NOT NULL,
  `tgl_sk_pendirian` varchar(100) NOT NULL,
  `tgl_sk_oprasional` varchar(100) NOT NULL,
  `kepsek` varchar(100) NOT NULL,
  `operator` varchar(100) NOT NULL,
  `akreditasi` varchar(100) NOT NULL,
  `kurikulum` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  PRIMARY KEY (`id_identitas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `identitas_sekolah` */

insert  into `identitas_sekolah`(`id_identitas`,`npsn`,`status`,`pendidikan`,`kepemilikan`,`tgl_sk_pendirian`,`tgl_sk_oprasional`,`kepsek`,`operator`,`akreditasi`,`kurikulum`,`waktu`) values (1,'20400873','Swasta','SMA','Yayasan','0458/H/1986','1986-05-29','Dr.Sri Arti Rientarsih','suwajirah','B','KTSP','Pagi');

/*Table structure for table `jenis_nilai` */

DROP TABLE IF EXISTS `jenis_nilai`;

CREATE TABLE `jenis_nilai` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_nilai` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `jenis_nilai` */

insert  into `jenis_nilai`(`id_jenis`,`jenis_nilai`) values (1,'TUGAS 1'),(2,'TUGAS 2'),(3,'ULANGAN'),(4,'MID SEMESTER'),(5,'UAS');

/*Table structure for table `jurusan` */

DROP TABLE IF EXISTS `jurusan`;

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(200) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `jurusan` */

insert  into `jurusan`(`id_jurusan`,`nama_jurusan`) values (1,'IPS'),(2,'IPA'),(4,'BAHASA'),(8,'MULTIMEDIA');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(10) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `wali_kelas` int(11) NOT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `id_jurusan` (`id_jurusan`),
  KEY `wali_kelas` (`wali_kelas`),
  CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`wali_kelas`) REFERENCES `akademik_guru` (`kode_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

insert  into `kelas`(`id_kelas`,`nama_kelas`,`id_jurusan`,`wali_kelas`) values (1,'X',1,1),(2,'X',2,12),(3,'X',4,5),(4,'XI',1,1),(5,'XI',2,12),(6,'XII',4,5),(7,'XII',1,1),(8,'XII',2,12),(10,'XI',4,5);

/*Table structure for table `kepala_sekolah` */

DROP TABLE IF EXISTS `kepala_sekolah`;

CREATE TABLE `kepala_sekolah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenkel` varchar(2) NOT NULL,
  `tmpt_lhr` varchar(100) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kepala_sekolah` */

insert  into `kepala_sekolah`(`id`,`nip`,`kode`,`nama`,`jenkel`,`tmpt_lhr`,`tgl_lhr`,`alamat`,`email`,`telepon`,`gambar`,`status`) values (1,'11111212121212','11111212121212','Dra. Sri Arti Reintarsih','P','Jakarta','1980-08-08','Yogyakarta','kepala@mail.com','087123456141','kepsek.jpg',1);

/*Table structure for table `kontak_hubung` */

DROP TABLE IF EXISTS `kontak_hubung`;

CREATE TABLE `kontak_hubung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telp` varchar(100) NOT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kontak_hubung` */

insert  into `kontak_hubung`(`id`,`telp`,`fax`,`email`,`website`) values (1,'623619','','prapti.lestari7@gmail.com','http://202.92.204.194/prefill');

/*Table structure for table `kontak_utama` */

DROP TABLE IF EXISTS `kontak_utama`;

CREATE TABLE `kontak_utama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(100) NOT NULL,
  `rt/rw` varchar(100) NOT NULL,
  `dusun` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `lintang` varchar(100) NOT NULL,
  `bujur` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kontak_utama` */

insert  into `kontak_utama`(`id`,`alamat`,`rt/rw`,`dusun`,`desa`,`kecamatan`,`kabupaten`,`provinsi`,`kode_pos`,`lintang`,`bujur`) values (1,'JL. MAGELANG KM. 5 MLATI','14 / 30','Popongan','Sinduadi','Kec. Mlati','Kab. Sleman','Prov. D.I. Yogyakarta','55284','-7.7598000','110.3663000');

/*Table structure for table `mapel` */

DROP TABLE IF EXISTS `mapel`;

CREATE TABLE `mapel` (
  `kode_mapel` varchar(50) NOT NULL,
  `nama_mapel` varchar(200) NOT NULL,
  `kkm` int(11) NOT NULL,
  `kode_guru` int(11) NOT NULL,
  PRIMARY KEY (`kode_mapel`),
  KEY `kode_guru` (`kode_guru`),
  CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`kode_guru`) REFERENCES `akademik_guru` (`kode_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mapel` */

insert  into `mapel`(`kode_mapel`,`nama_mapel`,`kkm`,`kode_guru`) values ('BI','Bahasa Indonesia',75,1),('BI2','Bahasa Inggris 2',75,8),('BING','Bahasa Inggris',75,10),('BIO','Biologi',75,9),('BJ','Bahasa Jawa',80,8),('EKN','Ekonomi/Akuntansi',75,3),('FSK','Fisika',75,10),('GEO','GEOGRAFI',75,16),('KMA','Kimia',75,15),('KRJ','Kerajinan Tangan',75,21),('MTK','Matematika',75,20),('PAI','Pendidikan Agama Islam',75,13),('PJS','PENJASKES',75,11),('PKN','Pendidika Kewarganegaraan',75,6),('SBD','Pendidikan Seni dan Budaya',75,4),('SJR','Sejarah',75,12),('SOS','Sosiologi',80,17),('TI','Teknik Informatika',75,7);

/*Table structure for table `mapel_kelas` */

DROP TABLE IF EXISTS `mapel_kelas`;

CREATE TABLE `mapel_kelas` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `kode_mapel` varchar(50) NOT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `kode_mapel` (`kode_mapel`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `mapel_kelas_ibfk_1` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`),
  CONSTRAINT `mapel_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `mapel_kelas` */

insert  into `mapel_kelas`(`id_detail`,`id_kelas`,`kode_mapel`) values (4,1,'BI'),(23,1,'PAI'),(24,1,'PKN'),(25,1,'BING'),(26,1,'MTK'),(27,1,'FSK'),(28,1,'BIO'),(29,1,'BJ'),(30,1,'EKN'),(31,1,'GEO'),(32,1,'KMA'),(33,1,'KRJ'),(34,1,'PJS'),(35,1,'SBD'),(36,1,'SJR'),(37,1,'SOS'),(38,1,'TI'),(41,4,'BING'),(42,4,'BI2');

/*Table structure for table `nilai` */

DROP TABLE IF EXISTS `nilai`;

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `id_mapel` varchar(100) NOT NULL,
  `tugas1` int(11) NOT NULL,
  `tugas2` int(11) NOT NULL,
  `ulangan` int(11) NOT NULL,
  `ujian` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `id_mapel` (`id_mapel`),
  KEY `id_siswa` (`id_siswa`),
  CONSTRAINT `nilai_ibfk_5` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`kode_mapel`),
  CONSTRAINT `nilai_ibfk_6` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=latin1;

/*Data for the table `nilai` */

insert  into `nilai`(`id_nilai`,`id_siswa`,`id_kelas`,`semester`,`id_mapel`,`tugas1`,`tugas2`,`ulangan`,`ujian`,`tahun`) values (167,21,1,'1','BI',100,87,70,83,'2018'),(168,25,1,'1','BI',100,78,75,80,'2018'),(169,21,1,'1','BING',93,80,50,97,'2018'),(170,25,1,'1','BING',100,80,55,90,'2018'),(171,21,1,'1','BIO',65,90,70,100,'2018'),(172,25,1,'1','BIO',65,90,80,100,'2018'),(173,21,1,'1','BJ',80,90,70,85,'2018'),(174,25,1,'1','BJ',100,90,86,83,'2018'),(175,21,1,'1','EKN',68,80,77,83,'2018'),(176,25,1,'1','EKN',68,80,80,80,'2018'),(177,21,1,'1','FSK',100,90,78,89,'2018'),(178,25,1,'1','FSK',80,89,79,78,'2018'),(179,21,1,'1','GEO',80,67,70,80,'2018'),(180,25,1,'1','GEO',80,80,70,90,'2018'),(181,21,1,'1','KMA',60,70,90,75,'2018'),(182,25,1,'1','KMA',60,70,90,77,'2018'),(183,21,1,'1','KRJ',80,77,80,80,'2018'),(184,25,1,'1','KRJ',78,77,87,90,'2018'),(185,21,1,'1','MTK',80,80,90,80,'2018'),(186,25,1,'1','MTK',80,80,90,90,'2018'),(187,21,1,'1','PAI',80,100,80,80,'2018'),(188,25,1,'1','PAI',80,100,80,80,'2018'),(189,21,1,'1','PJS',100,80,87,80,'2018'),(190,25,1,'1','PJS',100,80,77,80,'2018'),(191,21,1,'1','PKN',70,90,89,76,'2018'),(192,25,1,'1','PKN',70,100,89,78,'2018'),(193,21,1,'1','SBD',80,100,100,90,'2018'),(194,25,1,'1','SBD',80,100,100,77,'2018'),(195,21,1,'1','SJR',80,80,80,80,'2018'),(196,25,1,'1','SJR',80,80,80,80,'2018'),(197,21,1,'1','SOS',80,100,100,70,'2018'),(198,25,1,'1','SOS',100,80,100,100,'2018'),(199,21,1,'1','TI',90,90,100,90,'2018'),(200,25,1,'1','TI',70,80,80,85,'2018'),(205,21,1,'2','BI',100,70,90,70,'2018'),(206,25,1,'2','BI',80,80,90,70,'2018'),(207,28,1,'2','BI',100,90,90,70,'2018');

/*Table structure for table `pengumuman` */

DROP TABLE IF EXISTS `pengumuman`;

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `isi` longtext NOT NULL,
  `tgl` varchar(60) NOT NULL,
  `img` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `pengumuman` */

insert  into `pengumuman`(`id_pengumuman`,`jenis`,`judul`,`isi`,`tgl`,`img`) values (48,'siswa','Lomba Essay 2018 Di SMK 1 Sleman','<p>Dalam tangka memperingati hari Sumpah Pemuda yang jatuh pada tanggal 28 Oktober mendatang, maka kami selaku dewan redaksi PT. Berita Kita akan mengadakan lomba menulis esai dengan tema kepemudaan. Adapun beberapa ketentuan yang berlaku pada lomba ini adalah:</p>\r\n\r\n<p><strong>A. Ketentuan Umum</strong></p>\r\n\r\n<ol>\r\n	<li>Berkewarganegaraan Indonesia.</li>\r\n	<li>Mahasiswa dan Umum.</li>\r\n	<li>Berusia 18 tahun ke atas.</li>\r\n</ol>\r\n\r\n<p><strong>B. Ketentuan Khusus</strong></p>\r\n\r\n<ol>\r\n	<li>Tema utama esai adalah soal kepemudaan di Indonesia.</li>\r\n	<li>Esai ditulis di Microsoft Word, dengan&nbsp;<em>font&nbsp;</em>Times New Roman berukuran 12 dan berjarak spasi 1,5.</li>\r\n	<li>Esai bisa dikirm dalam format Word atau PDF.</li>\r\n	<li>Sertakan foto dalam format JPG. Foto boleh hasil jepretan sendiri atau bisa diambil dari internet. Jika dari internet, mohon dicantumkan sumber gambar tersebut berasal.</li>\r\n	<li>Sertakan foto pribadi terbaru berukuran 3 x 4 dan juga hasil&nbsp;<em>scan&nbsp;</em>fotokopi KTP peserta.</li>\r\n	<li>Esai yang ditulis murni karya peserta sendiri dan belum pernah ditampilkan di media massa mana pun.</li>\r\n	<li>Tidak plagiat</li>\r\n</ol>\r\n\r\n<p>Pengumupan tulisan paling lambat dilakukan pada tanggal 1 Oktober yang akan datang. Jika melewati batas waktu tersebut, maka tulisan tersebut akan kami diskualifikasi dari lomba yang kami adakan ini.</p>\r\n','14 Jul, 2018 16:20:58','essay.png'),(49,'guru','Rapat Mingguan','<p>Berkumpil di ruang seperti biasa</p>\r\n','28 Jul, 2018 05:42:41','technologi.jpg'),(51,'siswa','ythgfhgfhgfh','<p>kjlk</p>\r\n','15 Aug, 2018 10:05:28','poster2.jpg');

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(250) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(30) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `jml_saudara` varchar(10) NOT NULL,
  `nama_adik` varchar(50) DEFAULT NULL,
  `nama_kakak` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `pekerjaan_ortu` varchar(100) DEFAULT NULL,
  `alamat_orangtua` varchar(250) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `siswa` */

insert  into `siswa`(`id_siswa`,`nama_siswa`,`jenkel`,`tempat_lahir`,`tgl_lahir`,`agama`,`alamat`,`email`,`telepon`,`jml_saudara`,`nama_adik`,`nama_kakak`,`nama_ayah`,`nama_ibu`,`pekerjaan_ortu`,`alamat_orangtua`,`gambar`) values (21,'Firman Azhar R','L','Jakarta','1996-05-04','islam','Yogyakarta','firmanazhar14@gmail.com','083123621456','2','Cikalana Wahyuning Riyadi','Azhar','Riyadi','Ngatmi','Wiraswasta','Yogyakarta','lalal.jpg'),(25,'Dewi Stella Anjani ','P','Yogyakarta','2018-07-10','islam','Yogyakarta','stellaanjani@gmail.com','081123123123','1','Cika Adella','Ryan Darmadi','Alex','Anjani','Dosen','Yogyakarta',''),(28,'siska','P','Yogyakarta','1998-02-03','islam','Yogyakarta','contoh@gmail.com','08765413456','2','Adik','Kakak','ayah','ibu','Pegawai','Yogyakarta','orang2.jpg');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`username`,`password`,`hak_akses`) values ('11111212121212','kepala','kepala'),('1112320800201180001','431996','siswa'),('1112320800201180006','1112320800201180006','siswa'),('1112320800201180007','1112320800201180007','siswa'),('197007302008012013','111111','guru'),('197007302008012017','197007302008012017','guru'),('197007302008012111','197007302008012111','guru'),('197007302008012112','197007302008012112','guru'),('197007302008012114','197007302008012114','guru'),('197007302008012115','197007302008012115','guru'),('197007302008012116','197007302008012116','guru'),('197007302008012117','197007302008012117','guru'),('197007302008012118','197007302008012118','guru'),('197007302008012119','197007302008012119','guru'),('197007302008012120','197007302008012120','guru'),('197007302008012122','197007302008012122','guru'),('197007302008012123','197007302008012123','guru'),('197007302008012124','197007302008012124','guru'),('197007302008012127','197007302008012127','guru'),('197007302008012129','197007302008012129','guru'),('admin','admin','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

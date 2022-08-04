/*
SQLyog Enterprise v12.5.1 (64 bit)
MySQL - 10.4.20-MariaDB : Database - db_dpa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_dpa` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_dpa`;

/*Table structure for table `tbl_dpa` */

DROP TABLE IF EXISTS `tbl_dpa`;

CREATE TABLE `tbl_dpa` (
  `id_dpa` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_dpa` varchar(100) NOT NULL,
  `urusan_pemerintahan` text NOT NULL,
  `bidang_urusan` varchar(100) NOT NULL,
  `kegiatan` varchar(150) NOT NULL,
  `organisasi` varchar(150) NOT NULL,
  `unit` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `jabatan_pimpinan` text NOT NULL,
  `nama_pimpinan` varchar(150) NOT NULL,
  `nip_pimpinan` varchar(50) NOT NULL,
  `tahun` varchar(6) NOT NULL,
  PRIMARY KEY (`id_dpa`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_dpa` */

insert  into `tbl_dpa`(`id_dpa`,`nomor_dpa`,`urusan_pemerintahan`,`bidang_urusan`,`kegiatan`,`organisasi`,`unit`,`tanggal`,`jabatan_pimpinan`,`nama_pimpinan`,`nip_pimpinan`,`tahun`) values 
(1,'5.02.0.00.0.00.01.0000','UNSUR PENUNJANG URUSAN PEMERINTAHAN','KEUANGAN','5.02.02.1.04 Koordinasi dan Pelaksanaan Akuntansi dan Pelaporan Keuangan Daerah','1.1','5.02.0.00.0.00.01.0000 BADAN KEUANGAN DAERAH','0000-00-00','Kepala Badan Keuangan Daerah','AGUS DYAN NUR, SE, MM.','196502121991031001','2021'),
(2,'2.16.2.21.2.20.01.0000','UNSUR PENUNJANG URUSAN PEMERINTAHAN','KEUANGAN','5.02.02.1.04 Koordinasi dan Pelaksanaan Akuntansi dan Pelaporan Keuangan Daerah','1.2',' 5.02.0.00.0.00.01.0001 Dinas Komunikasi dan Informatika','0000-00-00','Kepala Dinas Kominfo','M. Muslim','196502121991031004','2021'),
(3,'5.02.02.1.04.05.00006','UNSUR PENUNJANG URUSAN PEMERINTAHAN','KEUANGAN','Koordinasi dan Penyusunan Rancangan Peraturan Daerah','1.3','5.02.0.00.0.00.01.0002 Dinas Kesehatan Provinsi Kalimantan Selatan','0000-00-00','Kepala Dinas','Dr. H.Muhammad Muslim,S.Pd,M.Kes','196502121991031657','2021'),
(4,'5.02.02.1.04.07.87690','UNSUR PENUNJANG URUSAN PEMERINTAHAN','KEUANGAN',' Koordinasi, Sinkronisasi, dan Penyelesaian Tuntutan Perbendaharaan','1.4','Dinas Pekerjaan Umum Dan Penataan Daerah','0000-00-00','Plt Kepala Dinas','Solhan','196502121991065387','2021'),
(5,'2.13.0.00.0.00.01.0000','URUSAN PEMERINTAHAN WAJIB YANG TIDAK BERKAITAN DENGAN PELAYANAN DASAR','URUSAN PEMERINTAHAN BIDANG PEMBERDAYAAN MASYARAKAT DAN DESA','PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH PROVINSI','1.5','Dinas Pemberdayaan Masyarakat Dan Desa','0000-00-00','Kepala Dinas PMD','Zulkifli','156502121991031001','2021');

/*Table structure for table `tbl_dpa_sub` */

DROP TABLE IF EXISTS `tbl_dpa_sub`;

CREATE TABLE `tbl_dpa_sub` (
  `id_dpa_sub` int(11) NOT NULL AUTO_INCREMENT,
  `sumber_dana` varchar(150) NOT NULL,
  `lokasi_dpa_sub` varchar(100) NOT NULL,
  `waktu_pelaksanaan` varchar(150) NOT NULL,
  `indikator_keluaran` text NOT NULL,
  `target_keluaran` varchar(150) NOT NULL,
  `id_dpa` int(11) NOT NULL,
  `id_sub_kegiatan` int(11) NOT NULL,
  PRIMARY KEY (`id_dpa_sub`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_dpa_sub` */

insert  into `tbl_dpa_sub`(`id_dpa_sub`,`sumber_dana`,`lokasi_dpa_sub`,`waktu_pelaksanaan`,`indikator_keluaran`,`target_keluaran`,`id_dpa`,`id_sub_kegiatan`) values 
(1,'PENDAPATAN ASLI DAERAH (PAD)','Kota Banjarbaru','Januari s.d. Desember','Dokumen Penyusunana Laporan Pertanggungjawaban APBD','4 dokumen',1,1),
(2,'PENDAPATAN ASLI DAERAH (PAD)','Kota Banjarbaru','Januari s.d. Desember','Dokumen Laporan Keuangan Yang di Sampaikan Tepat Waktu dan Akuntabel ','1 dokumen',2,2),
(3,'PENDAPATAN ASLI DAERAH (PAD)','Kota Banjarbaru','Januari s.d. Desember','Dokumen Rancangan Peraturan Daerah','1 dokumen',3,3),
(4,'PENDAPATAN ASLI DAERAH (PAD)','Kota Banjarbaru','Januari s.d. Desember','Dokumen Penyusunana Laporan Pertanggung Jawaban APBD ','4 dokumen',4,4),
(5,'PENDAPATAN ASLI DAERAH (PAD)','Kota Banjarbaru','Januari s.d. Desember','Perencanaan, Penganggaran, dan Evaluasi Kinerja Perangkat Daerah','1 dokumen',5,5);

/*Table structure for table `tbl_penarikan_dana` */

DROP TABLE IF EXISTS `tbl_penarikan_dana`;

CREATE TABLE `tbl_penarikan_dana` (
  `id_penarikan` int(11) NOT NULL AUTO_INCREMENT,
  `bulan_penarikan` varchar(50) NOT NULL,
  `jumlah_penarikan` double NOT NULL,
  `id_dpa` int(11) NOT NULL,
  PRIMARY KEY (`id_penarikan`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_penarikan_dana` */

insert  into `tbl_penarikan_dana`(`id_penarikan`,`bulan_penarikan`,`jumlah_penarikan`,`id_dpa`) values 
(1,'1',43667400,1),
(2,'2',104965250,1),
(3,'3',109800450,1),
(4,'4',230779250,1),
(5,'5',197957000,1),
(6,'6',233002000,1),
(7,'7',494365000,1),
(8,'8',225966850,1),
(9,'9',84565000,1),
(10,'10',155129200,1),
(11,'11',260610700,1),
(12,'12',117449700,1),
(13,'1',43000000,2),
(14,'2',102222222,2),
(15,'3',11000000,2),
(16,'4',97000000,2),
(17,'5',112500000,2),
(18,'6',50000000,2),
(19,'7',7865498,2),
(20,'8',80000000,2),
(21,'9',90000000,2),
(22,'10',102222087,2),
(23,'11',93450000,2),
(24,'12',102340000,2),
(25,'1',494365000,3),
(26,'2',225966850,3),
(27,'3',84565000,3),
(28,'4',155129200,3),
(29,'5',260107008,3),
(30,'6',117449700,3),
(31,'7',238002000,3),
(32,'8',197950009,3),
(33,'9',230779250,3),
(34,'10',130779250,3),
(35,'11',105800450,3),
(36,'12',1009800450,3),
(37,'1',104965250,4),
(38,'2',108965250,4),
(39,'3',124965250,4),
(40,'4',43667400,4),
(41,'5',230777654,4),
(42,'6',630779250,4),
(43,'7',220779250,4),
(44,'8',494365000,4),
(45,'9',894365000,4),
(46,'10',155129200,4),
(47,'11',166129200,4),
(48,'12',189129200,4),
(49,'1',21000000,5),
(50,'2',5798995,5),
(51,'3',25050000,5),
(52,'4',1549568004,5),
(53,'5',265469000,5),
(54,'6',962335000,5),
(55,'7',842300000,5),
(56,'8',325657000,5),
(57,'9',39800000,5),
(58,'10',18700000,5),
(59,'11',982350000,5),
(60,'12',718400000,5);

/*Table structure for table `tbl_pengguna` */

DROP TABLE IF EXISTS `tbl_pengguna`;

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_pengguna` varchar(75) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_pengguna` */

insert  into `tbl_pengguna`(`id_pengguna`,`username`,`password`,`nama_pengguna`,`role`) values 
(3,'admin','c4ca4238a0b923820dcc509a6f75849b','Admin','admin'),
(8,'x','c4ca4238a0b923820dcc509a6f75849b','AGUS DYAN NUR, SE, MM.','pimpinan'),
(9,'w','c4ca4238a0b923820dcc509a6f75849b','Muhammad Rifqi','admin');

/*Table structure for table `tbl_rincian` */

DROP TABLE IF EXISTS `tbl_rincian`;

CREATE TABLE `tbl_rincian` (
  `id_rincian` int(11) NOT NULL AUTO_INCREMENT,
  `koefisien` int(11) NOT NULL,
  `harga_rincian` double NOT NULL,
  `ppn` int(11) NOT NULL,
  `id_dpa_sub` int(11) NOT NULL,
  `id_uraian` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  PRIMARY KEY (`id_rincian`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_rincian` */

insert  into `tbl_rincian`(`id_rincian`,`koefisien`,`harga_rincian`,`ppn`,`id_dpa_sub`,`id_uraian`,`id_satuan`) values 
(1,40,2100,0,1,1,4),
(2,10,24200,0,1,2,4),
(3,25,63500,0,1,3,4),
(4,15,14300,0,1,4,4),
(5,10,250000,0,2,5,4),
(6,6,63500,0,3,2,4),
(7,40,2100,0,4,1,4),
(8,10,24200,0,4,2,4),
(9,25,63500,0,4,3,3),
(10,15,14300,0,4,4,4),
(11,11,250000,0,5,2,4);

/*Table structure for table `tbl_satuan` */

DROP TABLE IF EXISTS `tbl_satuan`;

CREATE TABLE `tbl_satuan` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `satuan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_satuan` */

insert  into `tbl_satuan`(`id_satuan`,`satuan`) values 
(2,'pcs'),
(3,'kotak'),
(4,'buah'),
(5,'paket'),
(6,'lembar'),
(7,'orang');

/*Table structure for table `tbl_skpd` */

DROP TABLE IF EXISTS `tbl_skpd`;

CREATE TABLE `tbl_skpd` (
  `id_skpd` varchar(30) NOT NULL,
  `nama_skpd` varchar(100) NOT NULL,
  `alamat_skpd` text NOT NULL,
  `no_telpon` varchar(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'skpd',
  PRIMARY KEY (`id_skpd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_skpd` */

insert  into `tbl_skpd`(`id_skpd`,`nama_skpd`,`alamat_skpd`,`no_telpon`,`username`,`password`,`role`) values 
('1.1','Badan Keuangan Daerah','Jl. Raya Dharma Praja Kawasan Perkantoran Pemprov. Kalsel ','05115910591','bakeuda','c4ca4238a0b923820dcc509a6f75849b','skpd'),
('1.2','Dinas Komunikasi dan Informatika','Jl. Palam, Kecamatan Cempaka Kota Banjarbaru','05116749844','diskominfo','c4ca4238a0b923820dcc509a6f75849b','skpd'),
('1.3','Dinas Kesehatan Provinsi Kalimantan Selatan','Jl. Belitung Darat. No.18 Banjarmasin','05113355661','dinkes','c4ca4238a0b923820dcc509a6f75849b','skpd'),
('1.4','Dinas Pekerjaan Umum Dan Penataan Daerah','Jl. May. Jend Panjaitan No. 8, Palam, Banjarbaru','05113300385','pupr','c4ca4238a0b923820dcc509a6f75849b','skpd'),
('1.5','Dinas Pemberdayaan Masyarakat Dan Desa','Jl. Palam, Kecamatan Cempaka Kawasan Perkantoran Pemprov Kalsel Kota Banjarbaru','05116749212','dpmd','c4ca4238a0b923820dcc509a6f75849b','skpd');

/*Table structure for table `tbl_sub_kegiatan` */

DROP TABLE IF EXISTS `tbl_sub_kegiatan`;

CREATE TABLE `tbl_sub_kegiatan` (
  `id_sub_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `sub_kegiatan` text NOT NULL,
  PRIMARY KEY (`id_sub_kegiatan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_sub_kegiatan` */

insert  into `tbl_sub_kegiatan`(`id_sub_kegiatan`,`sub_kegiatan`) values 
(1,'5.02.02.1.04.03 Koordinasi Penyusunan Laporan Pertanggungjawaban Pelaksanaan APBD Bulanan, Triwulanan dan Semesteran'),
(2,'5.02.02.1.04.04 Konsolidasi Laporan Keuangan SKPD, BLUD dan Laporan Keuangan Pemerintah Daerah'),
(3,'5.02.02.1.04.05 Koordinasi dan Penyusunan Rancangan Peraturan Daerah tentang Pertanggungjawaban Pelaksanaan APBD Provinsi dan Rancangan Peraturan Kepala Daerah tentang Penjabaran Pertanggungjawaban Pelaksanaan APBD Provinsi'),
(4,'5.02.02.1.04.07 Koordinasi, Sinkronisasi, dan Penyelesaian Tuntutan Perbendaharaan dan Tuntutan Kerugian Daerah'),
(5,'2.13.01.101.06  Koordinasi dan Penyusunan Laporan Capaian Kinerja dan Ikhtisar Realisasi Kinerja SKPD');

/*Table structure for table `tbl_uraian` */

DROP TABLE IF EXISTS `tbl_uraian`;

CREATE TABLE `tbl_uraian` (
  `id_uraian` int(11) NOT NULL AUTO_INCREMENT,
  `kode_rekening` varchar(100) NOT NULL,
  `uraian` text NOT NULL,
  PRIMARY KEY (`id_uraian`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_uraian` */

insert  into `tbl_uraian`(`id_uraian`,`kode_rekening`,`uraian`) values 
(1,'5.1 ','Belanja Operasi'),
(2,'5.1.02 ','Belanja Barang dan Jasa '),
(3,'5.1.02.01 ','Belanja Barang '),
(4,'5.1.02.01.01','Belanja Barang Pakai Habis '),
(5,'5.1.02.01.01.0024','Belanja Alat/Bahan untuk Kegiatan Kantor-Alat Tulis Kantor'),
(7,'5.1.02','Belanja Barang dan Jasa '),
(8,'5.1.02.01.01','Belanja Barang Pakai Habis'),
(9,'5.1.02','Belanja Barang dan Jasa');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

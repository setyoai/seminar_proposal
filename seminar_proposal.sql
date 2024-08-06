-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2024 at 02:32 PM
-- Server version: 8.0.39-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seminar_proposal`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-12-10-132220', 'App\\Database\\Migrations\\Seminar', 'default', 'App', 1702216479, 1),
(3, '2023-12-12-175620', 'App\\Database\\Migrations\\CreateUser', 'default', 'App', 1702444118, 3),
(4, '2023-12-13-134438', 'App\\Database\\Migrations\\CreateMahasiswa', 'default', 'App', 1702476520, 4),
(5, '2023-12-14-170713', 'App\\Database\\Migrations\\CreateRuangan', 'default', 'App', 1702573821, 5),
(7, '2023-12-15-160343', 'App\\Database\\Migrations\\CreateSempro', 'default', 'App', 1702889585, 6),
(8, '2023-12-21-064454', 'App\\Database\\Migrations\\CreateAuth', 'default', 'App', 1703141560, 7),
(9, '2023-12-21-075055', 'App\\Database\\Migrations\\CreateDaftarSempro', 'default', 'App', 1703149438, 8),
(12, '2023-12-23-071946', 'App\\Database\\Migrations\\CreateUser', 'default', 'App', 1703350671, 9),
(13, '2023-12-29-121339', 'App\\Database\\Migrations\\DetailSempro', 'default', 'App', 1703855576, 10),
(14, '2024-01-10-135211', 'App\\Database\\Migrations\\CreateJudulSkripsi', 'default', 'App', 1704894950, 11),
(15, '2024-01-16-051549', 'App\\Database\\Migrations\\CreateDafSkripsi', 'default', 'App', 1705382992, 12),
(16, '2024-01-16-054908', 'App\\Database\\Migrations\\CreateDosbing', 'default', 'App', 1705384640, 13),
(17, '2024-01-17-082718', 'App\\Database\\Migrations\\CreatePriode', 'default', 'App', 1705481351, 14),
(18, '2024-01-17-082727', 'App\\Database\\Migrations\\CreateSkripsi', 'default', 'App', 1705481351, 14),
(19, '2024-02-01-145351', 'App\\Database\\Migrations\\CreateBimbingan', 'default', 'App', 1706799988, 15),
(20, '2024-03-04-041409', 'App\\Database\\Migrations\\CreateHistory', 'default', 'App', 1709527343, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tb_auth`
--

CREATE TABLE `tb_auth` (
  `id_auth` int NOT NULL,
  `level_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_auth`
--

INSERT INTO `tb_auth` (`id_auth`, `level_nama`) VALUES
(1, 'Koordinator'),
(2, 'Operator'),
(3, 'Dosen');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bimbingan`
--

CREATE TABLE `tb_bimbingan` (
  `id_bimbingan` int NOT NULL,
  `dosbingid_bimbingan` int DEFAULT NULL,
  `mhsnim_bimbingan` int DEFAULT NULL,
  `ket_bimbingan` varchar(100) DEFAULT NULL,
  `tanggal_bimbingan` datetime DEFAULT NULL,
  `dosenid_bimbingan` int DEFAULT NULL,
  `balasanket_bimbingan` varchar(100) DEFAULT NULL,
  `tanggalbalasan_bimbingan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_bimbingan`
--

INSERT INTO `tb_bimbingan` (`id_bimbingan`, `dosbingid_bimbingan`, `mhsnim_bimbingan`, `ket_bimbingan`, `tanggal_bimbingan`, `dosenid_bimbingan`, `balasanket_bimbingan`, `tanggalbalasan_bimbingan`) VALUES
(41, 50, 201953073, 'Assalamualaikum Pak Muzid maaf mengganggu waktunya. Saya Setyo Adi Sasono, mahasiswa Sistem Informas', '2024-03-09 02:06:40', 16, 'Wa\'alaikumussalam nanti jam 15an ya', '2024-03-09 02:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dafsempro`
--

CREATE TABLE `tb_dafsempro` (
  `id_dafsempro` int NOT NULL,
  `id_dafskripsi` int NOT NULL,
  `judul_dafsempro` varchar(100) NOT NULL,
  `transkrip_dafsempro` varchar(100) NOT NULL,
  `pengesahan_dafsempro` varchar(100) DEFAULT NULL,
  `bukubimbingan_dafsempro` varchar(100) DEFAULT NULL,
  `kwkomputer_dafsempro` varchar(100) DEFAULT NULL,
  `kwinggris_dafsempro` varchar(100) DEFAULT NULL,
  `kwkwu_dafsempro` varchar(100) DEFAULT NULL,
  `slippembayaran_dafsempro` varchar(100) DEFAULT NULL,
  `plagiasi_dafsempro` varchar(100) DEFAULT NULL,
  `tanggal_dafsempro` datetime DEFAULT CURRENT_TIMESTAMP,
  `status_dafsempro` varchar(100) DEFAULT NULL,
  `keterangan_dafsempro` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_dafsempro`
--

INSERT INTO `tb_dafsempro` (`id_dafsempro`, `id_dafskripsi`, `judul_dafsempro`, `transkrip_dafsempro`, `pengesahan_dafsempro`, `bukubimbingan_dafsempro`, `kwkomputer_dafsempro`, `kwinggris_dafsempro`, `kwkwu_dafsempro`, `slippembayaran_dafsempro`, `plagiasi_dafsempro`, `tanggal_dafsempro`, `status_dafsempro`, `keterangan_dafsempro`) VALUES
(6, 54, 'Sistem informasi puskesmas ', '25-Feb-20248933954762488724284.jpg', '25-Feb-20248903060949669614213.jpg', '25-Feb-20247677759304303663714.jpg', '25-Feb-20242866007586960971470.jpg', NULL, NULL, NULL, NULL, '2024-02-25 13:08:29', '1', NULL),
(7, 58, 'Sistem informasi monitoring Activity Marketing berbasis web pada CV Pakis Jaya', '28-Feb-20244649623682723202764.jpg', '28-Feb-20247581720269588957810.jpg', '28-Feb-20245978517078100546095.jpg', '28-Feb-20245849820150069797614.jpg', '28-Feb-20242150955845224047667.jpg', '28-Feb-20248120431045540590030.jpg', '28-Feb-20243588274157984835092.jpg', '28-Feb-20241997102970068149216.jpg', '2024-02-28 23:07:27', '1', NULL),
(8, 55, 'Sistem Informasi Penerimaan Peserta Didik Baru Berbasis Web Menggunakan Metode Simple Additive Weigh', '28-Feb-20241161433129256177039.jpg', '28-Feb-20245998702073104150542.jpg', '28-Feb-20241273553125836163553.jpg', '28-Feb-20241962973471251027905.jpg', '28-Feb-20245900574401774848388.jpg', '28-Feb-20243552238684619538327.jpg', '28-Feb-20246098648144729713034.jpg', '28-Feb-20243735393940118708660.jpg', '2024-02-28 23:35:05', '1', NULL),
(9, 62, 'Sistem informasi manajemen operasional ninja xpress divisi pickup pada Mini Sort Hub (MSH) Kudus ber', 'Transkrip Acc Kaprodi_page-0001.jpg', 'Halaman Pengesahan.jpg', 'Buku Bimbingan_page-0001.jpg', 'Sertifikat KW Komputer_page-0001.jpg', 'Sertifikat KW Bahasa Inggris_page-0001.jpg', 'Sertifikat KW Kewirausahaan_page-0001.jpg', NULL, 'Plagiasi_page-0001.jpg', '2024-02-29 00:07:00', '1', NULL),
(10, 56, 'Sistem informasi pelayanan perbaikan laptop pada Service SSI Jepara berbasis web', 'Transkrip Acc Kaprodi_page-0001_1.jpg', 'Halaman Pengesahan_1.jpg', 'Buku Bimbingan_page-0001_1.jpg', 'Sertifikat KW Komputer_page-0001_1.jpg', 'Sertifikat KW Bahasa Inggris_page-0001_1.jpg', 'Sertifikat KW Kewirausahaan_page-0001_1.jpg', NULL, 'Plagiasi_page-0001_1.jpg', '2024-02-29 00:11:07', '1', NULL),
(11, 60, 'Metode Smarter untuk penentuan potongan harga pelanggan depo murah Kabupaten Kudus', 'Transkrip Acc Kaprodi_page-0001_2.jpg', 'Halaman Pengesahan_2.jpg', 'Buku Bimbingan_page-0001_2.jpg', 'Sertifikat KW Komputer_page-0001_2.jpg', 'Sertifikat KW Bahasa Inggris_page-0001_2.jpg', 'Sertifikat KW Kewirausahaan_page-0001_2.jpg', 'Bukti Pembayaran_page-0001.jpg', 'Plagiasi_page-0001_2.jpg', '2024-02-29 00:13:05', '1', NULL),
(12, 59, 'Sistem informasi Pondok Pesantren Putri Al-Muqoddasah Kudus berbasis Responsive Web Design menggunak', 'Transkrip Acc Kaprodi_page-0001_3.jpg', 'Halaman Pengesahan_3.jpg', 'Buku Bimbingan_page-0001_3.jpg', 'Sertifikat KW Komputer_page-0001_3.jpg', 'Sertifikat KW Bahasa Inggris_page-0001_3.jpg', 'Sertifikat KW Kewirausahaan_page-0001_3.jpg', 'Bukti Pembayaran_page-0001_1.jpg', 'Plagiasi_page-0001_3.jpg', '2024-02-29 00:14:41', '1', NULL),
(13, 57, 'Sistem informasi manajemen stok obat dan barang berbasis web pada Apotek Mulya Farma', 'Transkrip Acc Kaprodi_page-0001_4.jpg', 'Halaman Pengesahan_4.jpg', 'Buku Bimbingan_page-0001_4.jpg', 'Sertifikat KW Komputer_page-0001_4.jpg', 'Sertifikat KW Bahasa Inggris_page-0001_4.jpg', 'Sertifikat KW Kewirausahaan_page-0001_4.jpg', 'Bukti Pembayaran_page-0001_2.jpg', 'Plagiasi_page-0001_4.jpg', '2024-02-29 00:15:36', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dafskripsi`
--

CREATE TABLE `tb_dafskripsi` (
  `id_dafskripsi` int NOT NULL,
  `tanggal_dafskripsi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nim_dafskripsi` varchar(100) NOT NULL,
  `krs_dafskripsi` varchar(100) NOT NULL,
  `transkrip_dafskripsi` varchar(100) NOT NULL,
  `slippembayaran_dafskripsi` varchar(100) NOT NULL,
  `status_dafskripsi` varchar(100) NOT NULL,
  `keterangan_dafskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_dafskripsi`
--

INSERT INTO `tb_dafskripsi` (`id_dafskripsi`, `tanggal_dafskripsi`, `nim_dafskripsi`, `krs_dafskripsi`, `transkrip_dafskripsi`, `slippembayaran_dafskripsi`, `status_dafskripsi`, `keterangan_dafskripsi`) VALUES
(54, '2024-02-25 00:30:33', '201953112', '25-Feb-20243256241758312812333.jpg', '25-Feb-20242194144716631798968.jpg', '25-Feb-20245883768392763338508.jpg', '1', ''),
(55, '2024-02-28 22:50:40', '201953108', '28-Feb-20247777061274623858070.jpg', '28-Feb-20247976594737369399831.jpg', '28-Feb-2024487516676989535906.jpg', '1', ''),
(56, '2024-02-28 22:53:07', '201653081', '28-Feb-20245668532585393737037.jpg', '28-Feb-20244350691132169487180.jpg', '28-Feb-20242089289302663928702.jpg', '1', ''),
(57, '2024-02-28 22:57:20', '201653075', '28-Feb-20247422075997131379665.jpg', '28-Feb-2024583631679357678354.jpg', '28-Feb-20245439273169721372640.jpg', '1', ''),
(58, '2024-02-28 23:00:47', '201653004', '28-Feb-20243221771806184586756.jpg', '28-Feb-20247618608624616601421.jpg', '28-Feb-20246341300058428385571.jpg', '1', ''),
(59, '2024-02-28 23:44:40', '201653126', '28-Feb-20241583675614724162642.jpg', '28-Feb-20241969315448269182419.jpg', '28-Feb-2024308293824662479056.jpg', '1', ''),
(60, '2024-02-28 23:47:10', '201853073', '28-Feb-20245287399053365714930.jpg', '28-Feb-20241833427632694060243.jpg', '28-Feb-202479773705185954373.jpg', '1', ''),
(61, '2024-02-28 23:50:51', '201853051', '28-Feb-2024266760902305875659.jpg', '28-Feb-20241354948202979320122.jpg', '28-Feb-2024918586513009361473.jpg', '', ''),
(62, '2024-02-28 23:52:05', '201853101', '28-Feb-20244393783384325855471.jpg', '28-Feb-20243812672996990337080.jpg', '28-Feb-20247230810246146096713.jpg', '1', ''),
(63, '2024-02-28 23:56:44', '201953153', '28-Feb-20247304768635238354642.jpg', '28-Feb-20244691028530717561371.jpg', '28-Feb-20246756008153832345148.jpg', '2', 'Kurang Transkrip Nilai'),
(64, '2024-03-09 02:05:30', '201953073', '09-Mar-20242375608317214192961.jpg', '09-Mar-20244890710788165460921.jpg', '09-Mar-202413764985240707823.jpg', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detsempro`
--

CREATE TABLE `tb_detsempro` (
  `id_detsempro` int NOT NULL,
  `id_dafsempro` int NOT NULL,
  `id_sempro` int NOT NULL,
  `id_dosen` int NOT NULL,
  `leveldosen_detsempro` varchar(100) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `latar_belakang` varchar(100) DEFAULT NULL,
  `rumusan_masalah` varchar(100) DEFAULT NULL,
  `batasan_masalah` varchar(100) DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `manfaat` varchar(100) DEFAULT NULL,
  `tinjauan_pustaka` varchar(100) DEFAULT NULL,
  `metodologi` varchar(100) DEFAULT NULL,
  `kerangka_pemikiran` varchar(100) DEFAULT NULL,
  `jadwal_kegiatan` varchar(100) DEFAULT NULL,
  `riwayat_penilitian` varchar(100) DEFAULT NULL,
  `daftar_pustaka` varchar(100) DEFAULT NULL,
  `tanggal_detsempro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_detsempro`
--

INSERT INTO `tb_detsempro` (`id_detsempro`, `id_dafsempro`, `id_sempro`, `id_dosen`, `leveldosen_detsempro`, `judul`, `latar_belakang`, `rumusan_masalah`, `batasan_masalah`, `tujuan`, `manfaat`, `tinjauan_pustaka`, `metodologi`, `kerangka_pemikiran`, `jadwal_kegiatan`, `riwayat_penilitian`, `daftar_pustaka`, `tanggal_detsempro`) VALUES
(63, 6, 83, 17, 'Ketua Penguji', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-22'),
(64, 6, 83, 15, 'Anggota Penguji 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-22'),
(65, 6, 83, 29, 'Anggota Penguji 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-22'),
(66, 7, 84, 33, 'Ketua Penguji', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-11'),
(67, 7, 84, 25, 'Anggota Penguji 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-11'),
(68, 7, 84, 17, 'Anggota Penguji 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-11'),
(69, 13, 90, 25, 'Ketua Penguji', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-01'),
(70, 13, 90, 17, 'Anggota Penguji 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-01'),
(71, 13, 90, 18, 'Anggota Penguji 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-01'),
(72, 11, 88, 17, 'Ketua Penguji', 'Kurang Jelas', '', '', '', '', '', NULL, '', '', '', '', '', '2023-08-03'),
(73, 11, 88, 29, 'Anggota Penguji 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03'),
(74, 11, 88, 30, 'Anggota Penguji 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03'),
(75, 8, 85, 29, 'Ketua Penguji', 'Penulisan', '', '', '', '', '', NULL, '', '', '', '', '', '2023-09-13'),
(76, 8, 85, 31, 'Anggota Penguji 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-13'),
(77, 8, 85, 33, 'Anggota Penguji 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-13'),
(78, 9, 86, 29, 'Ketua Penguji', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03'),
(79, 9, 86, 18, 'Anggota Penguji 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03'),
(80, 9, 86, 33, 'Anggota Penguji 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosbing`
--

CREATE TABLE `tb_dosbing` (
  `id_dosbing` int NOT NULL,
  `dafskripsiid_dosbing` int NOT NULL,
  `dosen1_dosbing` int DEFAULT NULL,
  `dosen2_dosbing` int DEFAULT NULL,
  `tanggal_dosbing` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_dosbing`
--

INSERT INTO `tb_dosbing` (`id_dosbing`, `dafskripsiid_dosbing`, `dosen1_dosbing`, `dosen2_dosbing`, `tanggal_dosbing`) VALUES
(40, 54, 15, 29, '2024-02-25 00:30:33'),
(41, 55, 31, 33, '2024-02-28 22:50:40'),
(42, 56, 25, 17, '2024-02-28 22:53:07'),
(43, 57, 17, 18, '2024-02-28 22:57:20'),
(44, 58, 25, 17, '2024-02-28 23:00:47'),
(45, 59, 16, 25, '2024-02-28 23:44:40'),
(46, 60, 29, 30, '2024-02-28 23:47:10'),
(47, 61, NULL, NULL, '2024-02-28 23:50:51'),
(48, 62, 18, 33, '2024-02-28 23:52:05'),
(49, 63, NULL, NULL, '2024-02-28 23:56:44'),
(50, 64, 17, 16, '2024-03-09 02:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int NOT NULL,
  `nidn_dosen` varchar(100) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `alamat_dosen` varchar(100) NOT NULL,
  `nohp_dosen` varchar(100) NOT NULL,
  `email_dosen` varchar(100) DEFAULT NULL,
  `jeniskelamin_dosen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nidn_dosen`, `nama_dosen`, `alamat_dosen`, `nohp_dosen`, `email_dosen`, `jeniskelamin_dosen`) VALUES
(15, '0608047901', 'Dr. Eko Darmanto, S.Kom., M.Cs., MTA', 'Kudus', '081325781453', 'eko.darmanto@umk.ac.id', 'Laki - laki'),
(16, '0623068301', 'Syafiul Muzid, ST., M.Cs., MTA', 'Kudus', '082220117701', 'syafiul.muzid@umk.ac.id', ''),
(17, '0608088201', 'Nanik Susanti, S.Kom., M.Kom. MOS', 'Kudus', '08564199790', 'nanik.susanti@umk.ac.id', ''),
(18, '0004047501', 'Yudie Irawan, S.Kom M.Kom., MTA, MOS', 'Kudus', '082242471084', 'yudie.Irawan@umk.ac.id', ''),
(22, '202053066', 'Cindy Alfionita', 'Kudus Mejobo', '0832421415', 'cindy@gmail.com', ''),
(25, '987654321', 'Diana Laily Fithri S.Kom., M.Kom', 'Kudus', '085640212924', 'diana.laily@umk.ac.id', ''),
(27, '0602017901', 'Supriyono, S.Kom., M.Kom., MCE., MOS', 'Kudus', '', 'supriyono.si@umk.ac.id', ''),
(29, '0618098701', 'Noor Latifah, S.Kom,M.Kom', 'Kudus', '', 'noor.latifah@umk.ac.id', ''),
(30, '0607067001', 'R. Rhoedy Setiawan, S.Kom., M.Kom., MTA', 'Kudus', '', 'rhoedy.setiawan@umk.ac.id', ''),
(31, '0610128601', 'Putri Kurnia Handayani, S.Kom,M.Kom', 'Kudus', '', 'putri.kurnia@umk.ac.id', ''),
(32, '0619067802', ' Pratomo Setiaji, S.Kom., M.Kom., MTA', 'Kudus', '', 'pratomo.setiaji@umk.ac.id', ''),
(33, '0606058201', 'Fajar Nugraha, S.Kom., M.Kom., MOS', 'Kudus', '', 'fajar.nugraha@umk.ac.id', ''),
(34, ' 0618058301', 'Andy Prasetyo Utomo,S.Kom,M.T', 'Kudus', '', 'andy.prasetyo@umk.ac.id', ''),
(35, '0628017501', 'Anteng Widodo,ST.,M.Kom', 'Kudus', '', 'anteng.widodo@umk.ac.id', ''),
(36, ' 0623018201', 'Arif Setiawan,S.Kom,M.Cs', 'Kudus', '', 'arif.setiawan@umk.ac.id', ''),
(37, '0621048301', 'Muhammad Arifin,S.Kom,M.Kom', 'Kudus', '', 'muhammad.arifin@umk.ac.id', ''),
(38, '0631088901', 'Wiwit Agus Triyanto, S.Kom,M.Kom', 'Kudus', '', 'wiwit.agus@umk.ac.id', ''),
(39, '3274234242', 'Rudi Safiudin', 'Kudus', '02342342', 'rudisafiudin@umk.ac.id', 'Laki - laki'),
(40, '0324023482', 'Fajar Nugraha', 'Kudus', '023842342', 'fajarnugraha@umk.ac.id', 'laki - laki');

-- --------------------------------------------------------

--
-- Table structure for table `tb_judulskripsi`
--

CREATE TABLE `tb_judulskripsi` (
  `id_judul` int NOT NULL,
  `nim_mhs` varchar(100) DEFAULT NULL,
  `nama_mhs` varchar(100) DEFAULT NULL,
  `judul_skripsi` varchar(250) DEFAULT NULL,
  `dosen1_dosbing` int DEFAULT NULL,
  `dosen2_dosbing` int DEFAULT NULL,
  `tahun_skripsi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_judulskripsi`
--

INSERT INTO `tb_judulskripsi` (`id_judul`, `nim_mhs`, `nama_mhs`, `judul_skripsi`, `dosen1_dosbing`, `dosen2_dosbing`, `tahun_skripsi`) VALUES
(63, ' 201853028', 'Muhammad Hilmy Abyan', 'Sistem informasi Pengelolaan kartu pengawasan berbasis web responsive dengan menggunakan notifikasi whatsapp pada dinas perhubungan kabupaten kudus (studi kasus : seksi angkutan jalan)', 17, 30, '2023'),
(64, '201853122', 'Endah Agustina ', 'Sistem informasi manajemen pelayanan kesehatan masyarakat pada kelurahan kerjasan kecamatan kota kabupaten kudus berbasis web responsive dengan notifikasi whatsapp', 29, 18, '2023'),
(65, '201853125', 'Dhelles Ribut Aji', 'Aplikasi layanan pesan antar makanan pada ojek pangkalan berbasis android. Sarjana thesis, Universitas Muria Kudus', 18, 16, '2023'),
(66, ' 201653023', 'Ichlasul Amal', 'Sistem informasi penjualan dan pengelolaan stok barang pada ud vista mart berbasis web responsive. Sarjana thesis, Universitas Muria Kudus', 25, 29, '2023'),
(67, '201853094', 'Dian Aditya', 'Penerapan metode promethee Pada sistem informasi manajemen kepegawaian di pmi kabupaten kudus berbasis web. Sarjana thesis, UNIVERSITAS MURIA KUDUS', 17, 29, '2023'),
(68, ' 201853065', 'Shella Agustina', 'Sistem informasi rekam medis pada klinik rawat inap ibnu sina berbasis web. Sarjana thesis, Universitas Muria Kudus', 31, 30, '2023'),
(69, '201853083', 'Naimah Azzahro Alfida', 'Sistem informasi penjualan rokok dan retur bahan baku pada pr. Rajan nabadi berbasis web dengan fitur notifikasi whatsapp. Sarjana thesis, UNIVERSITAS MURIA KUDUS', 17, 15, '2023'),
(70, '201653126', 'Zuhairina Izzatu Amalia', 'Sistem informasi pengelolaan keuangan pondok pesantren putri al-muqoddasah kudus berbasis responsive web design menggunakan notifikasi whatsapp. Sarjana thesis, Universitas Muria Kudus', 25, 33, '2023'),
(71, '201853085', 'Muhammad Iqbal Azammudin', 'Portal e-commerce kain textile di kabupaten jepara berbasis web. Sarjana thesis, UNIVERSITAS MURIA KUDUS', 30, 25, '2023'),
(72, '201853160', 'Syarifatul Azkiyah', 'Aplikasi e-crm (electronic customer relationship management) berbasis web menggunakan notifikasi whatsapp pada penjualan perumahan pt graha sejahtera barokah. Sarjana thesis, Universitas Muria Kudus', 31, 16, '2023'),
(73, '201853008', 'Anas Burhanuddin', 'Sistem informasi kependudukan desa pilangrejo berbasis web dengan teknologi qr code. Sarjana thesis, Universitas Muria Kudus', 15, 33, '2023'),
(74, '201853150', 'Muhammad Ihsan Burhanuddin', ' Sistem informasi pendidikan pondok pesantren al-huda pasuruhan pati berbasis web. Sarjana thesis, UNIVERSITAS MURIA KUDUS', 18, 33, '2023'),
(75, '201853140', 'Tyhan Chakim', 'Sistem informasi manajemen pengelolaan museum kretek kudus berbasis web dan notifikasi whatsapp. Sarjana thesis, Universitas Muria Kudus', 27, 25, '2023'),
(76, '201853115', 'Bayu Dwi Dewantara', 'Sistem informasi penggajian dan penilaian kinerja dengan metode saw pada cv briliankd store. Sarjana thesis, UNIVERSITAS MURIA KUDUS', 18, 31, '2023'),
(77, '201853129', 'Aprilia Damayanti', 'Sistem informasi pengelolaan dana desa di desa bulungcangkring berbasis web dengan notifikasi whatsapp. Sarjana thesis, UNIVERSITAS MURIA KUDUS', 25, 32, '2023'),
(78, '201853086', 'Aida Elhami', 'Sistem informasi pelayanan jasa pada lailianur make up berbasis web menggunakan metode pieces. Sarjana thesis, UNIVERSITAS MURIA KUDUS', 27, 25, '2023'),
(79, '201953130', 'Anggi Novita Dewi', 'Digitalisasi manajemen tugas akhir di program studi teknik mesin universitas muria kudus dengan sistem informasi web-based dilengkapi fitur notifikasi whatsapp dan chatbot. Sarjana thesis, Universitas Muria Kudus', 27, 16, '2023'),
(80, '201853001', 'Mohammad Alaika Fauzi', 'Implementasi strategi customer relationship management (crm) pada sistem informasi pelayanan pelanggan toko mahir komputer berbasis web. Sarjana thesis, UNIVERSITAS MURIA KUDUS', 15, 30, '2023'),
(81, '201853001', 'Mohammad Alaika Fauzi', 'Implementasi strategi customer relationship management (crm) pada sistem informasi pelayanan pelanggan toko mahir komputer berbasis web. Sarjana thesis, UNIVERSITAS MURIA KUDUS', 15, 30, '2023'),
(82, ' 201953134', 'Sa’ad Fauzi', 'Sistem informasi pengelolaan aset barang milik negara (bmn) pada iain kudus berbasis android. Sarjana thesis, Universitas Muria Kudus', 29, 16, '2023'),
(83, '201653001', 'Maulana Wifqil Hana', 'Rancang bangun sistem rekrutmen karyawan pada rsu fastabiq sehat pku muhammadiyah pati menggunakan framework codeigniter berbasis website. Sarjana thesis, UNIVERSITAS MURIA KUDUS', 17, 25, '2023'),
(84, '201853038', 'Pri Hatmoko ', 'Sistem informasi monitoring hewan ternak pada ud jagal sapi berbasis web. Sarjana thesis, Universitas Muria Kudus', 17, 29, '2023'),
(85, '201953144', 'Hadad Karsa Nur Iman', 'Prediksi potensi kunjungan wisatawan pasca pandemi di kabupaten pati menggunakan metode decision tree c4.5. Sarjana thesis, Universitas Muria Kudus', 29, 27, '2023'),
(86, '201553027', 'Muhammad Ilham ', 'Sistem informasi manajemen penjualan vape dengan model konsinyasi. Sarjana thesis, UNIVERSITAS MURIA KUDUS', 32, 17, '2023'),
(87, '201853067', 'Abdillah Kartiko', 'Implementasi sistem informasi customer relationship management (crm) Pada pt.sukuntex berbasis web responsif. Sarjana thesis, Universitas Muria Kudus', 31, 27, '2023'),
(88, '201853111', 'Nur Akhmad Khasan', 'Sistem informasi penjualan dan monitoring stok dengan metode safety stock dan reorder point berbasis web responsif. Sarjana thesis, Universitas Muria Kudus', 31, 25, '2023'),
(89, ' 201853047', 'Uswatun Khasanah', 'Portal penjualan untuk sales representative pada toko bangunan berbasis website. Sarjana thesis, UNIVERSITAS MURIA KUDUS', 25, 31, '2023'),
(90, '201653038', 'Muhammad Ilham Khanafi ', 'Sistem informasi penyewaan bus pariwisata pada grup PT. langsung prima raya berbasis web responsive menggunakan notifikasi whatsapp. Sarjana thesis, UNIVERSITAS MURIA KUDUS', 25, 27, '2023'),
(91, '201853003', 'Muhammad Adib Khoironi', 'Peramalan harga saham dengan metode fuzzy time series model chen berbasis web Studi kasus di bursa efek indonesia (bei). Sarjana thesis, Universitas Muria Kudus', 30, 25, '2023'),
(92, '201853113', 'Nova Kurniawan', 'Portal penjualan bahan bangunan pada kabupaten kudus menggunakan notifikasi whatsapp. Sarjana thesis, UNIVERSITAS MURIA KUDUS', 29, 16, '2023');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mhs` int NOT NULL,
  `nim_mhs` varchar(100) DEFAULT NULL,
  `nama_mhs` varchar(100) DEFAULT NULL,
  `password_mhs` varchar(100) DEFAULT NULL,
  `alamat_mhs` varchar(100) DEFAULT NULL,
  `nohp_mhs` varchar(100) DEFAULT NULL,
  `email_mhs` varchar(100) DEFAULT NULL,
  `status_mhs` varchar(100) DEFAULT NULL,
  `photo_mhs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mhs`, `nim_mhs`, `nama_mhs`, `password_mhs`, `alamat_mhs`, `nohp_mhs`, `email_mhs`, `status_mhs`, `photo_mhs`) VALUES
(38, '201953074', 'Irfan Maulana ', '$2y$10$HdwWGA7oyB5Nju20m.ZUDufQ6sgYFuQbVuGHpmQGWFJGDn2vfnjjy', 'Pati', '08313113112', 'irfanmaula@gmail.com', '1', ''),
(39, '201953071', 'Rudi Hartono', '$2y$10$5SvQSfFzmo.tILOKlpAWt.TXGpXlaWJo3oWrkT/ly95MEwMEktAZK', 'Jepara', '08342242424', 'rudihartono@gmail.com', '1', ''),
(40, '201953070', 'Andik Nur Prabowo', '$2y$10$3j5TTsssVddEz8/d4y0YK.01M4PJQAJVQvStAYx8nhzusj5JLumOG', 'Kudus', '08123123138', 'andiknurprabowo@gmail.com', '1', ''),
(41, '201953079', 'Bambang Pamungkas', '$2y$10$bkTCub.CW/KQUgWK5YP12.PMzsZJgDBG9Uanp.FZuHpj0XAfGodi.', 'Kudus', '0823424290', 'bambangpamungkas@gmail.com', '2', ''),
(42, '201953112', 'Chandra Roseahansyah', '$2y$10$kDFHty6yMEcFz6o0./PJVelSrzAJMET8HI2iHsomZKs1zN49/orr6', 'Demak', '', 'chandraroseahansyah@gmail.com', '1', ''),
(43, '201653004', 'Mohammad Robi', '$2y$10$wBl2ZhyaQ/Y4/ZJUt8LzeOYq5fpZAWZ8ir.Ewobz/t60FAF0ez14S', 'Demak', '08216316311', 'mohammadrobi@umk.ac.id', '1', ''),
(44, '201653075', 'Vina Variana', '$2y$10$VE0nthNN.a0QvGvOIn4E3ORFNYQR26gmgjAKFX8faIhaAF4QV7jza', 'Pati', '0821312311', '201653075@std.umk.ac.id', '1', ''),
(45, '201653126', 'Zuhairina Izzatu Amalia', '$2y$10$UoY9PVPa0ru8OzrpM/nvBOOOkBF0.gdxEzQE4Ev64BKk6GO7Ujw9W', 'Jepara', '081712831123', '201653126@std.umk.ac.id', '1', ''),
(46, '201653081', 'Rifka Dwi Ariyanto', '$2y$10$beCwWSxBBUqyV3MmH15j3u9pmHUY9uzKJinIQmg4fjfiXbMDfgIlG', 'Kudus', '085602816778', '201653081@std.umk.ac.id', '1', ''),
(47, '201853073', 'Muhammad Eka Putra', '$2y$10$eU2HqhP0IZX3izUn/CPkMeC7n2xQC4cWgVMxeB3wOMU.T8WrC5.jG', 'Pati', '0823713123', '201853073@std.umk.ac.id', '1', ''),
(48, '201853051', 'Wahyu Andhina Risasongko', '$2y$10$7CxWce7EEMd8yW0irRerbu.aQ.MsqxkF7orU7j7p2tzPkw32/H6Ma', 'Jepara', '081561823462', '201853051@std.umk.ac.id', '1', ''),
(49, '201853101', 'Ardian Karisfianto', '$2y$10$89n37.3EjlYIYVahHGoCAOjNm2y4lek8ZZ5B4KmI1IxF5FW2LIixK', 'Kudus', '', '201853101@std.umk.ac.id', '1', ''),
(50, '201953153', 'Utomo Yoga Firmansyah', '$2y$10$Fd/xlyCFs84oqn8UfUrxnuhphMq22qWi/S.DDgk91mOywATDpfJai', 'Pati', '', '201953153@std.umk.ac.id', '1', ''),
(51, '201853153', 'Didin Puspa Dini', NULL, 'Kudus', '', '201853153@std.umk.ac.id', NULL, ''),
(52, '201853066', 'Choirida Puji Erwanti', NULL, 'Pati', '', '201853066@std.umk.ac.id', NULL, ''),
(53, '201853033', 'Robby Adriansyah', NULL, 'Pati', '', '201853033@std.umk.ac.id', NULL, ''),
(54, '201853043', 'Feronanda Mardiyan Putra', NULL, 'Kudus', '', '201853043@std.umk.ac.id', NULL, ''),
(55, '201953053', 'Agustina Silvi Damayanti', NULL, 'Kudus', '', '201953053@std.umk.ac.id', NULL, ''),
(56, '201953127', 'Luhur Wigi Saputra', NULL, 'Pati', '', '201953127@std.umk.ac.id', NULL, ''),
(57, '201953050', 'Erbilanto Setyadi', NULL, 'Jepara', '', '201953050@std.umk.ac.id', NULL, ''),
(58, '201953081', 'Putri Diana Rahmawati', NULL, 'Kudus', '', '201953081@std.umk.ac.id', NULL, ''),
(59, '201953063', 'Ahazia Philip Kristono', NULL, 'Pati', '', '201953063@std.umk.ac.id', NULL, ''),
(60, '201853014', 'Fachrizal Ariey Putra', NULL, 'Kudus', '', '201853014@std.umk.ac.id', NULL, ''),
(61, '201953014', 'Asna Saadah', NULL, 'Kudus', '', '201953014@std.umk.ac.id', NULL, ''),
(62, '201853019', 'Eno Adetyas', NULL, 'Jepara', '', '201853019@std.umk.ac.id', NULL, ''),
(63, '201953108', 'Herfian Cahyo Kumolo', '$2y$10$qyTmbNRB30bH3fPSwTYXn.ulq0ifkZ8EvIuo5aBgF083NZ7egc/tW', 'Kudus', '', '201953108@std.umk.ac.id', '1', ''),
(64, '201853154', 'Yusron Syarif', NULL, 'Pati', '', '201853154@std.umk.ac.id', NULL, ''),
(65, '201953106', 'Dela Septian Margareta', NULL, 'Pati', '', '201953106@std.umk.ac.id', NULL, ''),
(66, '201953154', 'Mahfud Riswan Darmawan', NULL, 'Kudus', '', '201953154@std.umk.ac.id', NULL, ''),
(67, '201953038', 'Muhammad Raihan Nur Farizi', NULL, 'Kudus', '', '201953038@std.umk.ac.id', NULL, ''),
(68, '201953073', 'Setyo Adi Sasono', '$2y$10$g1heMX9wQQ2tGM0lVpDRmOAfA3T2AJgGCamDc22xIXPOEyOf6DjRG', 'Grobogan', '082227783774', '201953073@std.umk.ac.id', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id_riwayat` int NOT NULL,
  `id_user` int NOT NULL,
  `judul_skripsi` varchar(250) DEFAULT NULL,
  `tanggal_pengecekan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_riwayat`
--

INSERT INTO `tb_riwayat` (`id_riwayat`, `id_user`, `judul_skripsi`, `tanggal_pengecekan`) VALUES
(4, 38, 'sistem informasi puskesmas ', '2024-03-06 20:47:50'),
(5, 38, 'sistem informasi penggajian ', '2024-03-06 21:22:05'),
(6, 68, 'Sistem informasi penggajian ', '2024-03-09 02:09:31'),
(7, 68, 'Sistem informasi inventory management ', '2024-03-09 02:09:50'),
(8, 68, 'sistem informasi inventory ', '2024-03-09 10:10:50'),
(9, 39, 'sistem ', '2024-06-12 22:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id_ruangan` int NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(1, 'LAB. PEMROGRAMAN'),
(2, 'LAB. MULTIMEDIA'),
(6, 'LAB. HARDWARE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sempro`
--

CREATE TABLE `tb_sempro` (
  `id_sempro` int NOT NULL,
  `id_dafsempro` int NOT NULL,
  `nama_ruanganid` int DEFAULT NULL,
  `jam_sempro` varchar(100) DEFAULT NULL,
  `tanggal_sempro` date DEFAULT NULL,
  `penguji1_sempro` varchar(100) DEFAULT NULL,
  `penguji2_sempro` varchar(100) DEFAULT NULL,
  `penguji3_sempro` varchar(100) DEFAULT NULL,
  `hasil_sempro` varchar(100) DEFAULT NULL,
  `status_sempro` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_sempro`
--

INSERT INTO `tb_sempro` (`id_sempro`, `id_dafsempro`, `nama_ruanganid`, `jam_sempro`, `tanggal_sempro`, `penguji1_sempro`, `penguji2_sempro`, `penguji3_sempro`, `hasil_sempro`, `status_sempro`) VALUES
(83, 6, 2, '09:00', '2023-02-22', '17', '15', '29', NULL, NULL),
(84, 7, 6, '10:00', '2023-06-11', '33', '25', '17', NULL, NULL),
(85, 8, 2, '09:00', '2023-09-13', '29', '31', '33', 'Diterima', 'Revisi Kecil'),
(86, 9, 6, '08:00', '2023-08-03', '29', '18', '33', NULL, NULL),
(87, 10, 6, '11:00', '2023-06-11', '33', '25', '17', NULL, NULL),
(88, 11, 6, '12:00', '2023-08-03', '17', '29', '30', 'Diterima', 'Revisi Kecil'),
(89, 12, 2, '09:00', '2023-09-05', '17', '16', '25', NULL, NULL),
(90, 13, 6, '08:00', '2023-06-01', '25', '17', '18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL,
  `username_user` varchar(100) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `level_userid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username_user`, `password_user`, `level_userid`) VALUES
(1, '0608088201', '$2y$10$z3odtDSLl5yrNXyIm5s4IO7I8Kx0OxOjzL0QT2HLc/.XAh3Ya9ghC', 'Dosen'),
(2, '0623068301', '$2y$10$yNt/uR12cEvxqHGRzZKjhu1Q6sKAOYw3B5uY7aF46SCn5fz2d.aP6', 'Dosen'),
(6, '0004047501', '$2y$10$cFSnG5RaQOHud6eBWCqu3uNh8uDpjk/qGOIAJJ1MGmwS./uZt2Wnq', 'Koordinator'),
(7, '0608047901', '$2y$10$s5jxwGMz8Ca7YUEWRhLyUeqd.K9HnMEMaIxr8NNkJHh9ihJoSuGta', 'Dosen'),
(10, '202053066', '$2y$10$RJHSkjUdMLkUouUgIAAnuOARhnxcRQ4j0tXUp4GwlgDee7BKzztge', 'Operator'),
(14, '987654321', '$2y$10$PkKEKdvVfemWNcQ/goURK.tPBIc8YNJpT9UCmR2Eh9th.qsCrGCs6', 'Dosen'),
(16, '0602017901', '$2y$10$dlu709TSIZ41BiTGzwSJWusR//hfJ9HCcYbRrAYDHlH6E9J4fhTP6', 'Dosen'),
(18, '0618098701', '$2y$10$fpwdASbpPMDX5RYKiwGlJuPhVeSU4YWMCB455loZoZpU7sMhf9Kn6', 'Dosen'),
(19, '0607067001', '$2y$10$5VyWC1ETdzUuvXnIFPDErO.rhc86RDhrrMbXMO2iRC0FQ.3sNG59K', 'Dosen'),
(20, '0610128601', '$2y$10$ryERxkC6YVw3PEzbn.pXh.eg2Q3TEZA/SDFUxFppxPYWCig3kely.', 'Dosen'),
(21, '0619067802', '$2y$10$TN/1tTsaefrrRaakSLJu9Oo7/xf1HDUZ.c9NzP4/17XGeoYgYrq7i', 'Dosen'),
(22, '0606058201', '$2y$10$W0wsW0MGGPBjmA3yaqJGo.CXis1f.jhaEVhViSKEMYAiacCU2Wcue', 'Dosen'),
(23, ' 0618058301', '$2y$10$/s2DTGlRqRPZ1zZJsSveSeaTooMVatQBOpyOkRkGuXwmc6TgO5nzS', 'Dosen'),
(24, '0628017501', '$2y$10$iyQ.iKfkBcHA0XDqhwgHYO8xe96/tYPYEZrPxf97NJVs3RxxrfkxW', 'Dosen'),
(25, ' 0623018201', '$2y$10$nkPDHnFqojkUMCAi4MyLFOELx7zolqJsvnIOeJtA.HVhL8El15Tqi', 'Dosen'),
(26, '0621048301', '$2y$10$.G1Jr6LGntu95o4hJxjUUe8/rxB9D72cSvN0cQiVX6Sc1GxnuAGmu', 'Dosen'),
(27, '0631088901', '$2y$10$iLfvdNQOGqsrvifVw3HUfu3/DGwkYuwJOdxwefliqScvZ9.ZSEM6C', 'Dosen'),
(28, '3274234242', '$2y$10$2uQywQnqjZrpLpSrLftW8OXNtCFzoBAdNq3Cay147XduXJEDyUEri', 'Dosen'),
(29, '0324023482', '$2y$10$T6JtsRto2mE9Sv8xXc7EiOm6id3l35BdGNwMlAfuGV9mwfuKmbiGO', 'Dosen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_auth`
--
ALTER TABLE `tb_auth`
  ADD KEY `level_nama` (`level_nama`);

--
-- Indexes for table `tb_bimbingan`
--
ALTER TABLE `tb_bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`),
  ADD KEY `dosbingid_bimbingan` (`dosbingid_bimbingan`);

--
-- Indexes for table `tb_dafsempro`
--
ALTER TABLE `tb_dafsempro`
  ADD PRIMARY KEY (`id_dafsempro`),
  ADD KEY `tb_dafsempro_ibfk_1` (`id_dafskripsi`);

--
-- Indexes for table `tb_dafskripsi`
--
ALTER TABLE `tb_dafskripsi`
  ADD PRIMARY KEY (`id_dafskripsi`),
  ADD KEY `fk_foreign_tb_mhs` (`nim_dafskripsi`);

--
-- Indexes for table `tb_detsempro`
--
ALTER TABLE `tb_detsempro`
  ADD PRIMARY KEY (`id_detsempro`),
  ADD KEY `tb_detsempro_id_sempro_foreign` (`id_sempro`),
  ADD KEY `id_dafsempro` (`id_dafsempro`);

--
-- Indexes for table `tb_dosbing`
--
ALTER TABLE `tb_dosbing`
  ADD PRIMARY KEY (`id_dosbing`),
  ADD KEY `tb_dosbing_ibfk_1` (`dafskripsiid_dosbing`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `nidn_dosen` (`nidn_dosen`);

--
-- Indexes for table `tb_judulskripsi`
--
ALTER TABLE `tb_judulskripsi`
  ADD PRIMARY KEY (`id_judul`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `nim_mhs` (`nim_mhs`);

--
-- Indexes for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tb_sempro`
--
ALTER TABLE `tb_sempro`
  ADD PRIMARY KEY (`id_sempro`),
  ADD KEY `nama_ruanganid` (`nama_ruanganid`),
  ADD KEY `id_dafsempro` (`id_dafsempro`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `username_user` (`username_user`),
  ADD KEY `level_userid` (`level_userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_bimbingan`
--
ALTER TABLE `tb_bimbingan`
  MODIFY `id_bimbingan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_dafsempro`
--
ALTER TABLE `tb_dafsempro`
  MODIFY `id_dafsempro` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_dafskripsi`
--
ALTER TABLE `tb_dafskripsi`
  MODIFY `id_dafskripsi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tb_detsempro`
--
ALTER TABLE `tb_detsempro`
  MODIFY `id_detsempro` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tb_dosbing`
--
ALTER TABLE `tb_dosbing`
  MODIFY `id_dosbing` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_judulskripsi`
--
ALTER TABLE `tb_judulskripsi`
  MODIFY `id_judul` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mhs` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  MODIFY `id_riwayat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id_ruangan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_sempro`
--
ALTER TABLE `tb_sempro`
  MODIFY `id_sempro` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bimbingan`
--
ALTER TABLE `tb_bimbingan`
  ADD CONSTRAINT `tb_bimbingan_ibfk_1` FOREIGN KEY (`dosbingid_bimbingan`) REFERENCES `tb_dosbing` (`id_dosbing`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_dafsempro`
--
ALTER TABLE `tb_dafsempro`
  ADD CONSTRAINT `tb_dafsempro_ibfk_1` FOREIGN KEY (`id_dafskripsi`) REFERENCES `tb_dafskripsi` (`id_dafskripsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_dafskripsi`
--
ALTER TABLE `tb_dafskripsi`
  ADD CONSTRAINT `fk_foreign_tb_mhs` FOREIGN KEY (`nim_dafskripsi`) REFERENCES `tb_mahasiswa` (`nim_mhs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_detsempro`
--
ALTER TABLE `tb_detsempro`
  ADD CONSTRAINT `tb_detsempro_ibfk_1` FOREIGN KEY (`id_dafsempro`) REFERENCES `tb_dafsempro` (`id_dafsempro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detsempro_id_sempro_foreign` FOREIGN KEY (`id_sempro`) REFERENCES `tb_sempro` (`id_sempro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_dosbing`
--
ALTER TABLE `tb_dosbing`
  ADD CONSTRAINT `tb_dosbing_ibfk_1` FOREIGN KEY (`dafskripsiid_dosbing`) REFERENCES `tb_dafskripsi` (`id_dafskripsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sempro`
--
ALTER TABLE `tb_sempro`
  ADD CONSTRAINT `tb_sempro_ibfk_2` FOREIGN KEY (`nama_ruanganid`) REFERENCES `tb_ruangan` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_sempro_ibfk_3` FOREIGN KEY (`id_dafsempro`) REFERENCES `tb_dafsempro` (`id_dafsempro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `fk_foreign_tb_auth` FOREIGN KEY (`level_userid`) REFERENCES `tb_auth` (`level_nama`),
  ADD CONSTRAINT `fk_foreign_tb_dosen` FOREIGN KEY (`username_user`) REFERENCES `tb_dosen` (`nidn_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

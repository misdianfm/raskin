-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2017 at 04:27 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raskin`
--

-- --------------------------------------------------------

--
-- Table structure for table `agamas`
--

CREATE TABLE `agamas` (
  `id_agama` int(10) UNSIGNED NOT NULL,
  `agama` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `agamas`
--

INSERT INTO `agamas` (`id_agama`, `agama`) VALUES
(1, 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `bobots`
--

CREATE TABLE `bobots` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_bobot` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bobot` double(15,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bobots`
--

INSERT INTO `bobots` (`id`, `nama_bobot`, `bobot`) VALUES
(9, 'Sangat Layak', 5.00000000),
(10, 'Layak', 4.00000000),
(11, 'Cukup Layak', 3.00000000),
(12, 'Kurang Layak', 2.00000000),
(13, 'Tidak Layak', 1.00000000);

-- --------------------------------------------------------

--
-- Table structure for table `goldars`
--

CREATE TABLE `goldars` (
  `id_goldar` int(10) UNSIGNED NOT NULL,
  `goldar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `goldars`
--

INSERT INTO `goldars` (`id_goldar`, `goldar`) VALUES
(1, 'Tidak Diketahui'),
(2, 'A'),
(3, 'B'),
(4, 'AB'),
(5, 'O'),
(6, 'A-'),
(7, 'A+'),
(8, 'B-'),
(9, 'B+'),
(10, 'AB-'),
(11, 'AB+'),
(12, 'O-'),
(13, 'O+');

-- --------------------------------------------------------

--
-- Table structure for table `jks`
--

CREATE TABLE `jks` (
  `id_jk` int(10) UNSIGNED NOT NULL,
  `jk` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jks`
--

INSERT INTO `jks` (`id_jk`, `jk`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `keluargas`
--

CREATE TABLE `keluargas` (
  `id_kk` int(10) UNSIGNED NOT NULL,
  `no_kk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rw_id` int(10) UNSIGNED NOT NULL,
  `rt_id` int(10) UNSIGNED NOT NULL,
  `vektor_s` double(15,8) DEFAULT NULL,
  `vektor_v` double(15,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `keluargas`
--

INSERT INTO `keluargas` (`id_kk`, `no_kk`, `alamat`, `rw_id`, `rt_id`, `vektor_s`, `vektor_v`) VALUES
(1, '3302181602053638', 'Pasir Wetan', 1, 2, 2.82189362, 0.08360382),
(2, '3302182601080004', 'Pasir Wetan', 1, 2, 2.46583178, 0.07305483),
(3, '3302181212080005', 'Pasir Wetan', 1, 2, 2.38741090, 0.07073147),
(4, '3302181602054508', 'Pasir Wetan', 1, 2, 1.89588821, 0.05616920),
(5, '3302181602054506', 'Pasir Wetan', 1, 2, 2.26325406, 0.06705309),
(6, '3302181602054511', 'Pasir Wetan', 1, 2, 1.90526501, 0.05644700),
(7, '3302181602054513', 'Pasir Wetan', 1, 2, 2.08077030, 0.06164667),
(8, '3302181602053633', 'Pasir Wetan', 1, 2, 2.05909912, 0.06100462),
(9, '3302180602070017', 'Pasir Wetan', 1, 2, 2.48952427, 0.07375676),
(10, '3302181602053653', 'Pasir Wetan', 1, 3, 2.38866947, 0.07076875),
(11, '3302182911060018', 'Pasir Wetan', 1, 3, 2.44795791, 0.07252528),
(12, '3302181602054494', 'Pasir Wetan', 1, 2, 1.96714999, 0.05828046),
(13, '3302181602053603', 'Pasir Wetan', 2, 2, 2.26171272, 0.06700743),
(14, '3302181602053639', 'Pasir Wetan', 1, 2, 2.29473759, 0.06798585),
(15, '3302181804090003', 'Pasir Wetan', 2, 2, 2.02400062, 0.05996476);

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` int(10) UNSIGNED NOT NULL,
  `kriteria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bobot_id` int(10) UNSIGNED NOT NULL,
  `tipe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wj` double(15,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `kriteria`, `bobot_id`, `tipe`, `wj`) VALUES
(1, 'Jumlah Pendapatan Rumah Tangga per Bulan', 9, 'Biaya', 0.11111111),
(2, 'Jenis Lantai Tempat Tinggal Terluas', 9, 'Keuntungan', 0.11111111),
(3, 'Jenis Dinding Tempat Tinggal Terluas', 9, 'Keuntungan', 0.11111111),
(4, 'Penggunaan Fasilitas Tempat Buang Air Besar', 10, 'Keuntungan', 0.08888889),
(5, 'Sumber Penerangan Utama', 10, 'Keuntungan', 0.08888889),
(6, 'Sumber Air Minum Utama', 10, 'Keuntungan', 0.08888889),
(7, 'Luas Lantai Bangunan Tempat Tinggal', 10, 'Keuntungan', 0.08888889),
(8, 'Jenis Pekerjaan Utama Kepala Rumah Tangga', 10, 'Keuntungan', 0.08888889),
(9, 'Transportasi Untuk Pergi/Pulang', 11, 'Keuntungan', 0.06666667),
(10, 'Status Penguasaan Bangunan Yang Ditempati', 11, 'Keuntungan', 0.06666667),
(11, 'Bahan Bakar/Energi Utama Memasak', 12, 'Keuntungan', 0.04444444),
(12, 'Jumlah Tanggungan Keluarga Dalam Satu Rumah', 12, 'Keuntungan', 0.04444444);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(199, '2014_10_12_000000_create_users_table', 1),
(200, '2014_10_12_100000_create_password_resets_table', 1),
(201, '2016_11_12_100001_laratrust_setup_tables', 1),
(202, '2016_11_12_124524_create_agamas_table', 1),
(203, '2016_11_12_131747_create_rts_table', 1),
(204, '2016_11_12_131756_create_rws_table', 1),
(205, '2016_11_12_134056_create_keluargas_table', 1),
(231, '2016_11_17_145733_create_jks_table', 2),
(232, '2016_11_17_150336_create_tempatlahirs_table', 2),
(233, '2016_11_17_150350_create_goldars_table', 2),
(234, '2016_11_17_150408_create_pendidikans_table', 2),
(235, '2016_11_17_150420_create_pekerjaans_table', 2),
(236, '2016_11_17_150449_create_shdks_table', 2),
(237, '2016_11_17_151920_create_penduduks_table', 2),
(247, '2016_12_11_131005_create_bobots_table', 3),
(248, '2016_12_11_130642_create_kriterias_table', 4),
(250, '2016_12_11_140015_create_variabels_table', 5),
(251, '2016_12_12_132905_create_rankings_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '36a44cf8a761ddaaf8f7478305217a671cdf98701e6e36efbae5ae7f3fb6a3a0', '2016-12-15 02:26:36'),
('misdiandinifadilla@gmail.com', 'c449cf805840513376d3ccb5927e57e3bdfb42d43c1a443d9297e109b82a5a01', '2017-02-04 08:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaans`
--

CREATE TABLE `pekerjaans` (
  `id_pekerjaan` int(10) UNSIGNED NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pekerjaans`
--

INSERT INTO `pekerjaans` (`id_pekerjaan`, `pekerjaan`) VALUES
(1, 'Belum/Tidak Bekerja'),
(2, 'Mengurus Rumah Tangga'),
(3, 'Pelajar/Mahasiswa'),
(4, 'Pedagang'),
(5, 'Wiraswasta'),
(6, 'Buruh Harian Lepas'),
(7, 'Karyawan Swasta');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikans`
--

CREATE TABLE `pendidikans` (
  `id_pendidikan` int(10) UNSIGNED NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pendidikans`
--

INSERT INTO `pendidikans` (`id_pendidikan`, `pendidikan`) VALUES
(1, 'Tidak/Belum Sekolah'),
(2, 'Tamat SD/Sederajat'),
(3, 'Belum Tamat SD/Sederajat'),
(4, 'SLTP/Sederajat'),
(5, 'SLTA/Sederajat');

-- --------------------------------------------------------

--
-- Table structure for table `penduduks`
--

CREATE TABLE `penduduks` (
  `id_penduduk` int(10) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kk_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jk_id` int(10) UNSIGNED NOT NULL,
  `tl_id` int(10) UNSIGNED NOT NULL,
  `tlahir` date NOT NULL,
  `goldar_id` int(10) UNSIGNED NOT NULL,
  `agama_id` int(10) UNSIGNED NOT NULL,
  `pendidikan_id` int(10) UNSIGNED NOT NULL,
  `pekerjaan_id` int(10) UNSIGNED NOT NULL,
  `status_kawin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shdk_id` int(10) UNSIGNED NOT NULL,
  `nama_ayah` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `akta_lahir` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `akta_lahir_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `akta_kawin` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `akta_kawin_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `akta_cerai` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `akta_cerai_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `penduduks`
--

INSERT INTO `penduduks` (`id_penduduk`, `nik`, `kk_id`, `nama`, `jk_id`, `tl_id`, `tlahir`, `goldar_id`, `agama_id`, `pendidikan_id`, `pekerjaan_id`, `status_kawin`, `shdk_id`, `nama_ayah`, `nama_ibu`, `akta_lahir`, `akta_lahir_no`, `akta_kawin`, `akta_kawin_no`, `akta_cerai`, `akta_cerai_no`) VALUES
(1, '3302181705680001', 1, 'Akhmad Sodirin', 1, 1, '1968-05-17', 1, 1, 2, 4, 'Kawin', 1, 'Sastrowirjo', 'Minah', 'Tidak Ada', '', 'Ada', '', 'Ada', ''),
(2, '3302181704700004', 2, 'Priono', 1, 1, '1970-04-17', 1, 1, 2, 5, 'Kawin', 1, 'Sudiyono', 'Karsinah', 'Tidak Ada', '', 'Tidak Ada', '', 'Tidak Ada', ''),
(3, '3302181508840003', 3, 'Suwarno', 1, 1, '1984-08-15', 1, 1, 4, 5, 'Kawin', 1, 'Sanusi', 'Nailah', 'Tidak Ada', '', 'Tidak Ada', '', 'Tidak Ada', ''),
(4, '3302183112520036', 4, 'Achmad Saidin', 1, 1, '1952-12-31', 1, 1, 2, 5, 'Kawin', 1, 'Rikam', 'Tiwen', 'Tidak Ada', '', 'Tidak Ada', '', 'Tidak Ada', ''),
(5, '3302183112550086', 5, 'Achmad Sanardi', 1, 1, '1955-12-31', 1, 1, 2, 6, 'Kawin', 1, 'Kuswandi', 'Rasiwen', 'Tidak Ada', '', 'Tidak Ada', '', 'Tidak Ada', ''),
(6, '3302180203790001', 6, 'Jamingan', 1, 2, '1979-03-02', 1, 1, 2, 6, 'Kawin', 1, 'Machrowi', 'Aswinem', 'Tidak Ada', '', 'Tidak Ada', '', 'Tidak Ada', ''),
(7, '3302180503690001', 7, 'Kusworo', 1, 1, '1969-03-05', 1, 1, 4, 5, 'Kawin', 1, 'Chaerudin', 'Rutilah', 'Tidak Ada', '', 'Tidak Ada', '', 'Tidak Ada', ''),
(8, '3302180507770002', 8, 'Teguh Suwarno', 1, 1, '1977-07-05', 1, 1, 2, 7, 'Kawin', 1, 'Munjirin', 'Sukirah', 'Tidak Ada', '', 'Tidak Ada', '', 'Tidak Ada', ''),
(9, '3302182502710002', 9, 'Rochmat', 1, 1, '1971-02-25', 11, 1, 5, 6, 'Kawin', 1, 'Mukarto', 'Narsiyah', 'Tidak Ada', '', 'Tidak Ada', '', 'Tidak Ada', ''),
(10, '3302181505670001', 10, 'Rohmat', 1, 1, '1967-05-15', 5, 1, 2, 6, 'Kawin', 1, 'Dulkasan', 'Nawiyah', 'Tidak Ada', '', 'Tidak Ada', '', 'Tidak Ada', ''),
(11, '3302180304700006', 11, 'Mochamad Kasiron', 1, 1, '1970-04-03', 1, 1, 2, 6, 'Kawin', 1, 'Maduryat', 'Rait', 'Tidak Ada', '', NULL, '', NULL, ''),
(12, '3302182308720001', 12, 'Rustamto', 1, 1, '1972-08-23', 1, 1, 4, 4, 'Kawin', 1, 'Suhadi Rasikin', 'Artem', 'Tidak Ada', '', 'Tidak Ada', '', 'Tidak Ada', ''),
(13, '3302180712390001', 13, 'Pudjadi', 1, 1, '1939-12-07', 5, 1, 4, 6, 'Kawin', 1, 'Sastromiharjo', 'Darem', 'Tidak Ada', '', 'Tidak Ada', '', 'Tidak Ada', ''),
(14, '3302183112580045', 14, 'Sukarso', 1, 1, '1958-12-31', 1, 1, 2, 4, 'Kawin', 1, 'Sastrorejo', 'Minah', 'Tidak Ada', '', 'Tidak Ada', '', 'Tidak Ada', ''),
(15, '3371011005730003', 15, 'Aris Supriyadi', 1, 3, '1973-05-10', 1, 1, 2, 7, 'Kawin', 1, 'Muchrori', 'Suharti', 'Tidak Ada', '', 'Ada', '', 'Tidak Ada', '');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Super Admin', NULL, '2016-11-16 14:20:44', '2016-11-16 14:20:44'),
(2, 'admin', 'Admin', NULL, '2016-11-16 14:20:44', '2016-11-16 14:20:44'),
(3, 'kepaladesa', 'Kepala Desa', NULL, '2017-02-01 03:38:20', '2017-02-01 03:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rts`
--

CREATE TABLE `rts` (
  `id_rt` int(10) UNSIGNED NOT NULL,
  `rt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rts`
--

INSERT INTO `rts` (`id_rt`, `rt`) VALUES
(1, '001'),
(2, '004'),
(3, '005');

-- --------------------------------------------------------

--
-- Table structure for table `rws`
--

CREATE TABLE `rws` (
  `id_rw` int(10) UNSIGNED NOT NULL,
  `rw` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rws`
--

INSERT INTO `rws` (`id_rw`, `rw`) VALUES
(1, '001'),
(2, '002');

-- --------------------------------------------------------

--
-- Table structure for table `shdks`
--

CREATE TABLE `shdks` (
  `id_shdk` int(10) UNSIGNED NOT NULL,
  `shdk` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shdks`
--

INSERT INTO `shdks` (`id_shdk`, `shdk`) VALUES
(1, 'Kepala Keluarga'),
(2, 'Istri');

-- --------------------------------------------------------

--
-- Table structure for table `spks`
--

CREATE TABLE `spks` (
  `id` int(11) NOT NULL,
  `kk_id` int(10) NOT NULL,
  `variabel_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spks`
--

INSERT INTO `spks` (`id`, `kk_id`, `variabel_id`) VALUES
(1, 1, 4),
(2, 1, 7),
(3, 1, 10),
(4, 1, 17),
(5, 1, 21),
(6, 1, 25),
(7, 1, 30),
(8, 1, 32),
(9, 1, 37),
(10, 1, 40),
(11, 1, 45),
(12, 1, 49),
(13, 2, 3),
(14, 2, 8),
(15, 2, 10),
(16, 2, 18),
(17, 2, 21),
(18, 2, 25),
(19, 2, 29),
(20, 2, 32),
(21, 2, 38),
(22, 2, 42),
(23, 2, 45),
(24, 2, 48),
(25, 3, 1),
(26, 3, 6),
(27, 3, 10),
(28, 3, 17),
(29, 3, 21),
(30, 3, 26),
(31, 3, 30),
(32, 3, 33),
(33, 3, 39),
(34, 3, 40),
(35, 3, 45),
(36, 3, 49),
(37, 4, 2),
(38, 4, 7),
(39, 4, 14),
(40, 4, 18),
(41, 4, 21),
(42, 4, 26),
(43, 4, 30),
(44, 4, 32),
(45, 4, 38),
(46, 4, 42),
(47, 4, 45),
(48, 4, 49),
(49, 5, 1),
(50, 5, 7),
(51, 5, 10),
(52, 5, 18),
(53, 5, 21),
(54, 5, 26),
(55, 5, 30),
(56, 5, 31),
(57, 5, 36),
(58, 5, 42),
(59, 5, 45),
(60, 5, 50),
(61, 6, 3),
(62, 6, 7),
(63, 6, 14),
(64, 6, 18),
(65, 6, 21),
(66, 6, 26),
(67, 6, 30),
(68, 6, 32),
(69, 6, 39),
(70, 6, 42),
(71, 6, 45),
(72, 6, 49),
(73, 7, 3),
(74, 7, 7),
(75, 7, 14),
(76, 7, 18),
(77, 7, 21),
(78, 7, 26),
(79, 7, 30),
(80, 7, 32),
(81, 7, 38),
(82, 7, 40),
(83, 7, 45),
(84, 7, 49),
(96, 9, 4),
(97, 9, 8),
(98, 9, 10),
(99, 9, 18),
(100, 9, 21),
(101, 9, 25),
(102, 9, 29),
(103, 9, 33),
(104, 9, 38),
(105, 9, 42),
(106, 9, 45),
(107, 9, 49),
(108, 10, 4),
(109, 10, 6),
(110, 10, 12),
(111, 10, 18),
(112, 10, 21),
(113, 10, 25),
(114, 10, 30),
(115, 10, 33),
(116, 10, 38),
(117, 10, 42),
(118, 10, 45),
(119, 10, 49),
(132, 12, 3),
(133, 12, 6),
(134, 12, 14),
(135, 12, 18),
(136, 12, 21),
(137, 12, 26),
(138, 12, 30),
(139, 12, 32),
(140, 12, 39),
(141, 12, 42),
(142, 12, 45),
(143, 12, 49),
(156, 14, 3),
(157, 14, 6),
(158, 14, 11),
(159, 14, 18),
(160, 14, 21),
(161, 14, 26),
(162, 14, 30),
(163, 14, 32),
(164, 14, 39),
(165, 14, 42),
(166, 14, 45),
(167, 14, 49),
(168, 15, 2),
(169, 15, 6),
(170, 15, 12),
(171, 15, 18),
(172, 15, 21),
(173, 15, 26),
(174, 15, 30),
(175, 15, 34),
(176, 15, 39),
(177, 15, 42),
(178, 15, 45),
(179, 15, 49),
(180, 8, 3),
(181, 8, 8),
(182, 8, 14),
(183, 8, 18),
(184, 8, 21),
(185, 8, 26),
(186, 8, 29),
(187, 8, 32),
(188, 8, 39),
(189, 8, 40),
(190, 8, 45),
(191, 8, 49),
(192, 11, 3),
(193, 11, 6),
(194, 11, 12),
(195, 11, 18),
(196, 11, 21),
(197, 11, 26),
(198, 11, 30),
(199, 11, 33),
(200, 11, 36),
(201, 11, 40),
(202, 11, 45),
(203, 11, 49),
(204, 13, 4),
(205, 13, 6),
(206, 13, 14),
(207, 13, 18),
(208, 13, 21),
(209, 13, 25),
(210, 13, 30),
(211, 13, 32),
(212, 13, 37),
(213, 13, 42),
(214, 13, 43),
(215, 13, 49);

-- --------------------------------------------------------

--
-- Table structure for table `tempatlahirs`
--

CREATE TABLE `tempatlahirs` (
  `id_tl` int(10) UNSIGNED NOT NULL,
  `tl` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tempatlahirs`
--

INSERT INTO `tempatlahirs` (`id_tl`, `tl`) VALUES
(1, 'Banyumas'),
(2, 'Purbalingga'),
(3, 'Magelang');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Misdiandini Fadilla Mukti', 'superadmin', 'misdiandinifadilla@outlook.com', '$2y$10$qvbvoVufw3eSectO42aUruV9Bs2tc1aP.v1OvyCRLzWghwyYE.Syq', 'Superadmin', 'tyjEjAonAlvTnPLh8AvzJHHCn4VzTpkZhVTGikWAFkGJuXYancldStPSajhP', '2017-01-31 18:45:33', '2017-02-06 22:48:02'),
(13, 'Admin', 'admin', 'yorozuyakagura18@gmail.com', '$2y$10$WteGuWFnlcjhuZ4LphRWqORtZRt.y/ummVls4Hl2iP1cQ2dQ2S1BG', 'Admin', 'fL7j1RowaVyLJP3JEJCwuI67GZTvNdKgZei2NEWyAFKn3ycsuRGMoh7uljmw', '2017-02-01 03:55:40', '2017-02-08 07:22:02'),
(17, 'Kepala Desa', 'kepaladesa', 'misdiandinifadilla@gmail.com', '$2y$10$NlMhQPWgbyyjrV5OlqCu5eHzpNjIak8QFdb8cWVAH47TdHAi5Oeym', 'Kepaladesa', 'QpCvIxEnddwlsoA1f8qsNa4GE6FcbxOubP2aVDUfYnUH3qWAgdu2XNhiQwHF', '2017-02-02 00:18:52', '2017-02-03 19:24:12'),
(18, 'Coba-coba', 'coba', 'bappedapbg2016@gmail.com', '$2y$10$bR2dxh2vCeh8xp9AMIl5huVhcQ/6dZ45rptw04SujAm1UQq0VHW3e', 'Admin', '3g2g2bQJhhD3mUDtgnmN4hp4NzkTD047HFdiOEGS7FPEc6LOyPJu2Vvbgjmh', '2017-02-04 06:12:07', '2017-02-04 09:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `variabels`
--

CREATE TABLE `variabels` (
  `id` int(10) UNSIGNED NOT NULL,
  `variabel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bobot_id` int(10) UNSIGNED NOT NULL,
  `kriteria_id` int(10) UNSIGNED NOT NULL,
  `normalisasi` double(15,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `variabels`
--

INSERT INTO `variabels` (`id`, `variabel`, `bobot_id`, `kriteria_id`, `normalisasi`) VALUES
(1, '< Rp. 500.000,00', 9, 1, 0.83625103),
(2, '>= Rp. 500.000,00 s.d. RP. 750.000,00', 10, 1, 0.85724398),
(3, '> Rp. 750.000,00 s.d. Rp. 1.000.000,00', 11, 1, 0.88508815),
(4, '>1.000.000,00', 12, 1, 0.92587471),
(5, 'Tanah', 9, 2, 1.19581317),
(6, 'Semen/Pur', 10, 2, 1.16652904),
(7, 'Tegel', 11, 2, 1.12983096),
(8, 'Keramik', 12, 2, 1.08005974),
(9, 'Marmer', 13, 2, 1.00000000),
(10, 'Bambu/Gedek/Tabag', 9, 3, 1.19581317),
(11, 'Gipsum/Triplek', 10, 3, 1.16652904),
(12, 'Kayu', 11, 3, 1.12983096),
(13, 'Tembok Tidak Diplester', 12, 3, 1.08005974),
(14, 'Tembok Diplester', 13, 3, 1.00000000),
(15, ' TIdak Ada', 9, 4, 1.15380035),
(16, 'Umum', 10, 4, 1.13114022),
(17, 'Bersama', 11, 4, 1.10258170),
(18, 'Sendiri', 12, 4, 1.06355076),
(19, 'Pelita/Sentir/Petromaks/sejenis', 9, 5, 1.15380035),
(20, 'Listrik Non-PLN', 10, 5, 1.13114022),
(21, 'Listrik <900 watt', 11, 5, 1.10258170),
(22, 'Listrik >900-2200 watt', 12, 5, 1.06355076),
(23, 'Listrik  >2200 watt', 13, 5, 1.00000000),
(24, 'Air Sungai/hujan/mata air tak terlindung', 9, 6, 1.15380035),
(25, 'Sumur tanpa bor/pompa', 10, 6, 1.13114022),
(26, 'Sumur bor/pompa', 11, 6, 1.10258170),
(27, 'Leding (PAM)', 12, 6, 1.06355076),
(28, 'Air isi ulang/kemasan', 13, 6, 1.00000000),
(29, '<= 8 m2/orang', 10, 7, 1.13114022),
(30, '> 8m2/orang', 12, 7, 1.06355076),
(31, 'Pengangguran', 9, 8, 1.15380035),
(32, 'Buruh/karyawan/pegawai tidak tetap', 10, 8, 1.13114022),
(33, 'Buruh/karyawan/pegawai tetap', 11, 8, 1.10258170),
(34, 'Wiraswasta', 12, 8, 1.06355076),
(35, 'PNS', 13, 8, 1.00000000),
(36, 'Jalan Kaki', 9, 9, 1.11326358),
(37, 'Transportasi Umum', 10, 9, 1.09682498),
(38, 'Tansprtasi pribadi non bahan bakar', 11, 9, 1.07598963),
(39, 'Tranasportasi pribadi berbahan bakar', 12, 9, 1.04729413),
(40, 'Numpang', 9, 10, 1.11326358),
(41, 'Sewa/kontrak', 10, 10, 1.09682498),
(42, 'Milik Sendiri', 12, 10, 1.04729413),
(43, 'Kayu/arang/merang', 9, 11, 1.07415098),
(44, 'Minyak Tanah', 10, 11, 1.06355075),
(45, 'Gas/Elpiji Subsidi', 11, 11, 1.05003890),
(46, 'Gas/Elpiji Non-Subsidi', 12, 11, 1.03128597),
(47, 'Listrik', 13, 11, 1.00000000),
(48, '>= 6 orang', 9, 12, 1.07415098),
(49, '> 2-5 orang', 10, 12, 1.06355075),
(50, '<= 2 orang', 12, 12, 1.03128597);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agamas`
--
ALTER TABLE `agamas`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `bobots`
--
ALTER TABLE `bobots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goldars`
--
ALTER TABLE `goldars`
  ADD PRIMARY KEY (`id_goldar`);

--
-- Indexes for table `jks`
--
ALTER TABLE `jks`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indexes for table `keluargas`
--
ALTER TABLE `keluargas`
  ADD PRIMARY KEY (`id_kk`),
  ADD UNIQUE KEY `no_kk` (`no_kk`),
  ADD KEY `keluargas_rw_id_foreign` (`rw_id`),
  ADD KEY `keluargas_rt_id_foreign` (`rt_id`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kriteria` (`kriteria`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pendidikans`
--
ALTER TABLE `pendidikans`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `penduduks`
--
ALTER TABLE `penduduks`
  ADD PRIMARY KEY (`id_penduduk`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `penduduks_kk_id_foreign` (`kk_id`),
  ADD KEY `penduduks_jk_id_foreign` (`jk_id`),
  ADD KEY `penduduks_tl_id_foreign` (`tl_id`),
  ADD KEY `penduduks_goldar_id_foreign` (`goldar_id`),
  ADD KEY `penduduks_agama_id_foreign` (`agama_id`),
  ADD KEY `penduduks_pendidikan_id_foreign` (`pendidikan_id`),
  ADD KEY `penduduks_pekerjaan_id_foreign` (`pekerjaan_id`),
  ADD KEY `penduduks_shdk_id_foreign` (`shdk_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `rts`
--
ALTER TABLE `rts`
  ADD PRIMARY KEY (`id_rt`);

--
-- Indexes for table `rws`
--
ALTER TABLE `rws`
  ADD PRIMARY KEY (`id_rw`);

--
-- Indexes for table `shdks`
--
ALTER TABLE `shdks`
  ADD PRIMARY KEY (`id_shdk`);

--
-- Indexes for table `spks`
--
ALTER TABLE `spks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempatlahirs`
--
ALTER TABLE `tempatlahirs`
  ADD PRIMARY KEY (`id_tl`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variabels`
--
ALTER TABLE `variabels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variabels_bobot_id_foreign` (`bobot_id`),
  ADD KEY `variabels_kriteria_id_foreign` (`kriteria_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agamas`
--
ALTER TABLE `agamas`
  MODIFY `id_agama` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bobots`
--
ALTER TABLE `bobots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `goldars`
--
ALTER TABLE `goldars`
  MODIFY `id_goldar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `jks`
--
ALTER TABLE `jks`
  MODIFY `id_jk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `keluargas`
--
ALTER TABLE `keluargas`
  MODIFY `id_kk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;
--
-- AUTO_INCREMENT for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  MODIFY `id_pekerjaan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pendidikans`
--
ALTER TABLE `pendidikans`
  MODIFY `id_pendidikan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `penduduks`
--
ALTER TABLE `penduduks`
  MODIFY `id_penduduk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rts`
--
ALTER TABLE `rts`
  MODIFY `id_rt` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rws`
--
ALTER TABLE `rws`
  MODIFY `id_rw` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shdks`
--
ALTER TABLE `shdks`
  MODIFY `id_shdk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `spks`
--
ALTER TABLE `spks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
--
-- AUTO_INCREMENT for table `tempatlahirs`
--
ALTER TABLE `tempatlahirs`
  MODIFY `id_tl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `variabels`
--
ALTER TABLE `variabels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluargas`
--
ALTER TABLE `keluargas`
  ADD CONSTRAINT `keluargas_rt_id_foreign` FOREIGN KEY (`rt_id`) REFERENCES `rts` (`id_rt`),
  ADD CONSTRAINT `keluargas_rw_id_foreign` FOREIGN KEY (`rw_id`) REFERENCES `rws` (`id_rw`);

--
-- Constraints for table `penduduks`
--
ALTER TABLE `penduduks`
  ADD CONSTRAINT `penduduks_agama_id_foreign` FOREIGN KEY (`agama_id`) REFERENCES `agamas` (`id_agama`),
  ADD CONSTRAINT `penduduks_goldar_id_foreign` FOREIGN KEY (`goldar_id`) REFERENCES `goldars` (`id_goldar`),
  ADD CONSTRAINT `penduduks_jk_id_foreign` FOREIGN KEY (`jk_id`) REFERENCES `jks` (`id_jk`),
  ADD CONSTRAINT `penduduks_kk_id_foreign` FOREIGN KEY (`kk_id`) REFERENCES `keluargas` (`id_kk`),
  ADD CONSTRAINT `penduduks_pekerjaan_id_foreign` FOREIGN KEY (`pekerjaan_id`) REFERENCES `pekerjaans` (`id_pekerjaan`),
  ADD CONSTRAINT `penduduks_pendidikan_id_foreign` FOREIGN KEY (`pendidikan_id`) REFERENCES `pendidikans` (`id_pendidikan`),
  ADD CONSTRAINT `penduduks_shdk_id_foreign` FOREIGN KEY (`shdk_id`) REFERENCES `shdks` (`id_shdk`),
  ADD CONSTRAINT `penduduks_tl_id_foreign` FOREIGN KEY (`tl_id`) REFERENCES `tempatlahirs` (`id_tl`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `variabels`
--
ALTER TABLE `variabels`
  ADD CONSTRAINT `variabels_bobot_id_foreign` FOREIGN KEY (`bobot_id`) REFERENCES `bobots` (`id`),
  ADD CONSTRAINT `variabels_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2017 at 04:00 PM
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
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Kristen Katholik'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Konghucu'),
(7, 'Kepercayaan Lainnya');

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
(13, 'Tidak Layak', 1.00000000),
(14, 'Bangeting Layak Banget', 10.00000000);

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
(1, '3302181602053638', 'Pasir Wetan', 1, 2, 4.91256865, 0.07706519),
(2, '3302182601080004', 'Pasir Wetan', 1, 2, 4.55373493, 0.07143604),
(3, '3302181212080005', 'Pasir Wetan', 1, 2, 4.26919354, 0.06697234),
(4, '3302181602054508', 'Pasir Wetan', 1, 2, 3.87252968, 0.06074973),
(5, '3302181602054506', 'Pasir Wetan', 1, 2, 3.96310209, 0.06217057),
(6, '3302181602054511', 'Pasir Wetan', 1, 2, 3.95207371, 0.06199757),
(7, '3302181602054513', 'Pasir Wetan', 1, 2, 4.28910326, 0.06728467),
(8, '3302181602053633', 'Pasir Wetan', 1, 2, 4.42550857, 0.06942450),
(9, '3302180602070017', 'Pasir Wetan', 1, 2, 4.52780241, 0.07102922),
(10, '3302181602053653', 'Pasir Wetan', 1, 3, 4.29317135, 0.06734848),
(11, '3302182911060018', 'Pasir Wetan', 1, 3, 4.39906413, 0.06900966),
(12, '3302181602054494', 'Pasir Wetan', 1, 2, 3.99568682, 0.06268174),
(13, '3302181602053603', 'Pasir Wetan', 2, 2, 4.35259898, 0.06828075),
(14, '3302181602053639', 'Pasir Wetan', 1, 2, 4.16806306, 0.06538587),
(15, '3302181804090003', 'Pasir Wetan', 2, 2, 3.77142612, 0.05916368),
(16, '304304', 'Desa Blater', 2, 1, 0.00000000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` int(10) UNSIGNED NOT NULL,
  `kriteria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bobot` double(15,8) NOT NULL,
  `bobot_id` int(10) UNSIGNED DEFAULT NULL,
  `tipe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wj` double(15,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `kriteria`, `bobot`, `bobot_id`, `tipe`, `wj`) VALUES
(1, 'Jumlah Pendapatan Rumah Tangga per Bulan', 10.00000000, 9, 'Biaya', 0.10416667),
(2, 'Jenis Lantai Tempat Tinggal Terluas', 10.00000000, 10, 'Keuntungan', 0.10416667),
(3, 'Jenis Dinding Tempat Tinggal Terluas', 10.00000000, 10, 'Keuntungan', 0.10416667),
(4, 'Penggunaan Fasilitas Tempat Buang Air Besar', 6.00000000, 10, 'Keuntungan', 0.06250000),
(5, 'Sumber Penerangan Utama', 6.00000000, 11, 'Keuntungan', 0.06250000),
(6, 'Sumber Air Minum Utama', 6.00000000, 11, 'Keuntungan', 0.06250000),
(7, 'Luas Lantai Bangunan Tempat Tinggal', 10.00000000, 10, 'Keuntungan', 0.10416667),
(8, 'Jenis Pekerjaan Utama Kepala Rumah Tangga', 8.00000000, 9, 'Keuntungan', 0.08333333),
(9, 'Transportasi Untuk Pergi/Pulang', 6.00000000, 12, 'Keuntungan', 0.06250000),
(10, 'Status Penguasaan Bangunan Yang Ditempati', 10.00000000, 10, 'Keuntungan', 0.10416667),
(11, 'Bahan Bakar/Energi Utama Memasak', 6.00000000, 12, 'Keuntungan', 0.06250000),
(12, 'Jumlah Tanggungan Keluarga Dalam Satu Rumah', 8.00000000, 9, 'Keuntungan', 0.08333333);

-- --------------------------------------------------------

--
-- Table structure for table `lims`
--

CREATE TABLE `lims` (
  `id` int(11) NOT NULL,
  `lim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lims`
--

INSERT INTO `lims` (`id`, `lim`) VALUES
(1, 3);

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
('fazaasulaiman@gmail.com', 'b3a1b40e0797d645d5dab60e373e095c5679d868cf5a748ffeddf4a9fd3520dd', '2017-02-10 20:58:11');

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
(15, '3371011005730003', 15, 'Aris Supriyadi', 1, 3, '1973-05-10', 1, 1, 2, 7, 'Kawin', 1, 'Muchrori', 'Suharti', 'Tidak Ada', '', 'Ada', '', 'Tidak Ada', ''),
(16, '12345', 16, 'Saito Johnny', 1, 1, '1990-01-03', 6, 1, 3, 1, 'Kawin', 1, 'Saito', 'Saiko', NULL, '', 'Tidak Ada', '', 'Tidak Ada', ''),
(18, '76534570928387', 12, 'Takebuchi Kei', 2, 1, '1991-09-04', 11, 1, 3, 6, 'Kawin', 2, 'Takebuchi', 'Takebuchi', NULL, '', NULL, '', NULL, ''),
(22, '4545454', 16, 'Empat Lima Puluh', 1, 1, '1986-03-01', 3, 1, 1, 1, 'Cerai Hidup', 2, 'Ayah', 'Ibu', NULL, '123', 'Tidak Ada', '', NULL, '667');

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
(3, '005'),
(4, '002'),
(5, '003'),
(6, '006');

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
(2, '002'),
(3, '003'),
(4, '004');

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
(425, 1, 4),
(426, 1, 7),
(427, 1, 10),
(428, 1, 17),
(429, 1, 21),
(430, 1, 25),
(431, 1, 30),
(432, 1, 32),
(433, 1, 37),
(434, 1, 40),
(435, 1, 45),
(436, 1, 49),
(437, 2, 3),
(438, 2, 8),
(439, 2, 10),
(440, 2, 18),
(441, 2, 21),
(442, 2, 25),
(443, 2, 29),
(444, 2, 32),
(445, 2, 38),
(446, 2, 42),
(447, 2, 45),
(448, 2, 48),
(449, 3, 1),
(450, 3, 6),
(451, 3, 10),
(452, 3, 17),
(453, 3, 21),
(454, 3, 26),
(455, 3, 30),
(456, 3, 33),
(457, 3, 39),
(458, 3, 40),
(459, 3, 45),
(460, 3, 49),
(461, 5, 1),
(462, 5, 7),
(463, 5, 10),
(464, 5, 18),
(465, 5, 21),
(466, 5, 26),
(467, 5, 30),
(468, 5, 31),
(469, 5, 36),
(470, 5, 42),
(471, 5, 45),
(472, 5, 50),
(473, 6, 3),
(474, 6, 7),
(475, 6, 14),
(476, 6, 18),
(477, 6, 21),
(478, 6, 26),
(479, 6, 30),
(480, 6, 32),
(481, 6, 39),
(482, 6, 42),
(483, 6, 45),
(484, 6, 49),
(485, 7, 3),
(486, 7, 7),
(487, 7, 14),
(488, 7, 18),
(489, 7, 21),
(490, 7, 26),
(491, 7, 30),
(492, 7, 32),
(493, 7, 38),
(494, 7, 40),
(495, 7, 45),
(496, 7, 49),
(509, 9, 4),
(510, 9, 8),
(511, 9, 10),
(512, 9, 18),
(513, 9, 21),
(514, 9, 25),
(515, 9, 29),
(516, 9, 33),
(517, 9, 38),
(518, 9, 42),
(519, 9, 45),
(520, 9, 49),
(521, 10, 4),
(522, 10, 6),
(523, 10, 12),
(524, 10, 18),
(525, 10, 21),
(526, 10, 25),
(527, 10, 30),
(528, 10, 33),
(529, 10, 38),
(530, 10, 42),
(531, 10, 45),
(532, 10, 49),
(533, 11, 3),
(534, 11, 6),
(535, 11, 12),
(536, 11, 18),
(537, 11, 21),
(538, 11, 26),
(539, 11, 30),
(540, 11, 33),
(541, 11, 36),
(542, 11, 40),
(543, 11, 45),
(544, 11, 49),
(545, 12, 3),
(546, 12, 6),
(547, 12, 14),
(548, 12, 18),
(549, 12, 21),
(550, 12, 26),
(551, 12, 30),
(552, 12, 32),
(553, 12, 39),
(554, 12, 42),
(555, 12, 45),
(556, 12, 49),
(557, 13, 4),
(558, 13, 6),
(559, 13, 14),
(560, 13, 18),
(561, 13, 21),
(562, 13, 25),
(563, 13, 30),
(564, 13, 32),
(565, 13, 37),
(566, 13, 42),
(567, 13, 43),
(568, 13, 49),
(569, 14, 3),
(570, 14, 6),
(571, 14, 11),
(572, 14, 18),
(573, 14, 21),
(574, 14, 26),
(575, 14, 30),
(576, 14, 32),
(577, 14, 39),
(578, 14, 42),
(579, 14, 45),
(580, 14, 49),
(593, 4, 2),
(594, 4, 7),
(595, 4, 14),
(596, 4, 18),
(597, 4, 21),
(598, 4, 26),
(599, 4, 30),
(600, 4, 32),
(601, 4, 38),
(602, 4, 42),
(603, 4, 45),
(604, 4, 49),
(606, 8, 3),
(607, 8, 8),
(608, 8, 14),
(609, 8, 18),
(610, 8, 21),
(611, 8, 26),
(612, 8, 29),
(613, 8, 32),
(614, 8, 39),
(615, 8, 40),
(616, 8, 45),
(617, 8, 49),
(771, 16, 1),
(772, 16, 9),
(773, 16, 11),
(774, 16, 16),
(775, 16, 23),
(776, 16, 26),
(777, 16, 29),
(778, 16, 35),
(779, 16, 36),
(780, 16, 40),
(781, 16, 43),
(782, 16, 48),
(783, 15, 2),
(784, 15, 6),
(785, 15, 12),
(786, 15, 18),
(787, 15, 21),
(788, 15, 26),
(789, 15, 30),
(790, 15, 34),
(791, 15, 39),
(792, 15, 42),
(793, 15, 45),
(794, 15, 49);

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
(3, 'Magelang'),
(4, 'Banjarnegara'),
(5, 'Jakarta'),
(6, 'Semarang');

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
(1, 'Misdiandini Fadilla Mukti', 'superadmin', 'misdiandinifadilla@outlook.com', '$2y$10$Kq7VuR2lQVLMwo0pjTB2PekU7fDN7I.58XskMM2iYzvdhG12b9oui', 'Superadmin', 'jD78WSGprQuCgKSENVGJgx4GpKIoxcoS0JDRTmt40UwvD9mQCrzRu3ylihfb', '2017-01-31 18:45:33', '2017-03-20 06:21:11'),
(13, 'Sutanto Agus Waluyo', 'admin', 'sutanto.agusw@yahoo.co.id', '$2y$10$YetAY5g3..d4rwJeyY79neysjnR6BvrygXBjmhjxxHuft4d2JB8Q6', 'Admin', 'lxwcNw1ueRRQwT8Fse5YRWNfVC0gqfqr9NoJuuN6RLbMNMxLmSQLGyFMELpk', '2017-02-01 03:55:40', '2017-03-20 06:48:57'),
(17, 'Hj. Endriyanti', 'kepaladesa', 'misdiandinifadilla@gmail.com', '$2y$10$Ld6xQYy8UaeuCln/sl.ObOBiamRs6hDY2mumeKAYcSE/AbtlH16hy', 'Kepaladesa', 'HUDyry2IwiixudgdkLQQd3UpwWGdVVwPBBG45b3EhlMoplYEH61okHMu79j4', '2017-02-02 00:18:52', '2017-03-20 06:40:25'),
(20, 'Hujan', 'hujan', 'hujan@hujan.com', '$2y$10$THPo9L/VUNHeWJRhIbW/m.kgi7uAtwNhNjpcgmtt.bhdVCskNnLta', 'Kepaladesa', 'n4yn0KWsiwaiFScilYEVxlJKVvbFWFN6JQfBEr7Q9MDWah511pE7t0YjdmDy', '2017-03-20 06:17:25', '2017-03-20 06:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `variabels`
--

CREATE TABLE `variabels` (
  `id` int(10) UNSIGNED NOT NULL,
  `variabel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bobot` double(15,8) NOT NULL,
  `bobot_id` int(10) UNSIGNED DEFAULT NULL,
  `kriteria_id` int(10) UNSIGNED NOT NULL,
  `normalisasi` double(15,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `variabels`
--

INSERT INTO `variabels` (`id`, `variabel`, `bobot`, `bobot_id`, `kriteria_id`, `normalisasi`) VALUES
(1, '< Rp. 500.000,00', 10.00000000, 9, 1, 0.78674380),
(2, '>= Rp. 500.000,00 s.d. RP. 750.000,00', 8.00000000, 10, 1, 0.80524516),
(3, '> Rp. 750.000,00 s.d. Rp. 1.000.000,00', 6.00000000, 11, 1, 0.82974105),
(4, '>1.000.000,00', 4.00000000, 12, 1, 0.86553656),
(5, 'Tanah', 10.00000000, 9, 2, 1.27106181),
(6, 'Semen/Pur', 10.00000000, 10, 2, 1.27106181),
(7, 'Tegel', 9.00000000, 11, 2, 1.25718811),
(8, 'Keramik', 8.00000000, 12, 2, 1.24185782),
(9, 'Marmer', 5.00000000, 13, 2, 1.18252240),
(10, 'Bambu/Gedek/Tabag', 10.00000000, 9, 3, 1.27106181),
(11, 'Gipsum/Triplek', 9.00000000, 10, 3, 1.25718811),
(12, 'Kayu', 8.00000000, 11, 3, 1.24185782),
(13, 'Tembok Tidak Diplester', 7.00000000, 12, 3, 1.22470375),
(14, 'Tembok Diplester', 6.00000000, 13, 3, 1.20519529),
(15, ' Tidak Ada', 6.00000000, 9, 4, 1.11849605),
(16, 'Umum', 5.00000000, 10, 4, 1.10582302),
(17, 'Bersama', 4.00000000, 11, 4, 1.09050773),
(18, 'Sendiri', 3.00000000, 12, 4, 1.07107548),
(19, 'Pelita/Sentir/Petromaks/sejenis', 6.00000000, 9, 5, 1.11849605),
(20, 'Listrik Non-PLN', 6.00000000, 10, 5, 1.11849605),
(21, 'Listrik <=900 watt', 5.00000000, 11, 5, 1.10582302),
(22, 'Listrik >900-2200 watt', 2.00000000, 12, 5, 1.04427378),
(23, 'Listrik  >2200 watt', 2.00000000, 13, 5, 1.04427378),
(24, 'Air Sungai/hujan/mata air tak terlindung', 5.00000000, 9, 6, 1.10582302),
(25, 'Sumur tanpa bor/pompa', 5.00000000, 10, 6, 1.10582302),
(26, 'Sumur bor/pompa', 4.00000000, 11, 6, 1.09050773),
(27, 'Leding (PAM)', 3.00000000, 12, 6, 1.07107548),
(28, 'Air isi ulang/kemasan', 2.00000000, 13, 6, 1.04427378),
(29, '<= 8 m2/orang', 10.00000000, 10, 7, 1.27106181),
(30, '> 8m2/orang', 6.00000000, 12, 7, 1.20519529),
(31, 'Pengangguran', 10.00000000, 9, 8, 1.21152765),
(32, 'Buruh/karyawan/pegawai tidak tetap', 8.00000000, 10, 8, 1.18920711),
(33, 'Buruh/karyawan/pegawai tetap', 6.00000000, 11, 8, 1.16103667),
(34, 'Wiraswasta', 4.00000000, 12, 8, 1.12246204),
(35, 'PNS', 0.00000000, 13, 8, 0.00000000),
(36, 'Jalan Kaki', 8.00000000, 9, 9, 1.13878863),
(37, 'Transportasi Umum', 8.00000000, 10, 9, 1.13878863),
(38, 'Tansprtasi pribadi non bahan bakar', 7.00000000, 11, 9, 1.12932418),
(39, 'Tranasportasi pribadi berbahan bakar', 6.00000000, 12, 9, 1.11849605),
(40, 'Numpang', 10.00000000, 9, 10, 1.27106181),
(41, 'Sewa/kontrak', 9.00000000, 10, 10, 1.25718811),
(42, 'Milik Sendiri', 5.00000000, 12, 10, 1.18252240),
(43, 'Kayu/arang/merang', 6.00000000, 9, 11, 1.11849605),
(44, 'Minyak Tanah', 6.00000000, 10, 11, 1.11849605),
(45, 'Gas/Elpiji Subsidi', 5.00000000, 11, 11, 1.10582302),
(46, 'Gas/Elpiji Non-Subsidi', 2.00000000, 12, 11, 1.04427378),
(47, 'Listrik', 2.00000000, 13, 11, 1.04427378),
(48, '>= 6 orang', 8.00000000, 9, 12, 1.18920711),
(49, '> 2-5 orang', 6.00000000, 10, 12, 1.16103667),
(50, '<= 2 orang', 4.00000000, 11, 12, 1.12246204);

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
-- Indexes for table `lims`
--
ALTER TABLE `lims`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

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
  MODIFY `id_agama` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `bobots`
--
ALTER TABLE `bobots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
  MODIFY `id_kk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
  MODIFY `id_penduduk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
  MODIFY `id_rt` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rws`
--
ALTER TABLE `rws`
  MODIFY `id_rw` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `shdks`
--
ALTER TABLE `shdks`
  MODIFY `id_shdk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `spks`
--
ALTER TABLE `spks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=795;
--
-- AUTO_INCREMENT for table `tempatlahirs`
--
ALTER TABLE `tempatlahirs`
  MODIFY `id_tl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
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

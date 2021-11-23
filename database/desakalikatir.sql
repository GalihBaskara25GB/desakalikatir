-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 12:19 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desakalikatir`
--

-- --------------------------------------------------------

--
-- Table structure for table `rangking`
--

CREATE TABLE `rangking` (
  `id` int(11) NOT NULL,
  `id_vaksin` int(11) NOT NULL,
  `nilai_preferensi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rangking`
--

INSERT INTO `rangking` (`id`, `id_vaksin`, `nilai_preferensi`) VALUES
(1, 19, 0.252525),
(2, 20, 0.171717),
(3, 21, 0),
(4, 22, 0.0808081),
(5, 23, 0),
(6, 24, 0.181818),
(7, 25, 0),
(8, 26, 0),
(9, 27, 0.262626),
(10, 28, 0.0808081),
(11, 29, 0),
(12, 30, 0),
(13, 31, 0),
(14, 32, 0),
(15, 33, 0),
(16, 34, 0),
(17, 35, 0),
(18, 36, 0),
(19, 37, 0.181818),
(20, 38, 0.181818),
(21, 39, 0),
(22, 40, 0),
(23, 41, 0.181818),
(24, 42, 0.181818),
(25, 43, 0.181818),
(26, 44, 0),
(27, 45, 0),
(28, 46, 0.181818),
(29, 47, 0.181818),
(30, 48, 0),
(31, 49, 0.10101),
(32, 50, 0.10101),
(33, 51, 0),
(34, 52, 0.181818),
(35, 53, 0.282828),
(36, 54, 0.10101),
(37, 55, 0.10101),
(38, 56, 0.10101),
(39, 57, 0),
(40, 58, 0),
(41, 59, 0),
(42, 60, 0.10101),
(43, 61, 0.10101),
(44, 62, 0.10101),
(45, 63, 0.10101),
(46, 64, 0),
(47, 65, 0),
(48, 66, 0.10101),
(49, 67, 0.181818),
(50, 68, 0.282828);

-- --------------------------------------------------------

--
-- Table structure for table `smt_kriteria`
--

CREATE TABLE `smt_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL,
  `tipe` enum('max','min','','') NOT NULL DEFAULT 'max'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smt_kriteria`
--

INSERT INTO `smt_kriteria` (`id_kriteria`, `kriteria`, `bobot`, `tipe`) VALUES
(1, 'usia', 85, 'max'),
(2, 'alamat', 40, 'max'),
(3, 'status', 50, 'max'),
(4, 'pekerjaan', 70, 'max'),
(5, 'penyakit', 90, 'max'),
(6, 'terpapar', 70, 'max'),
(7, 'vaksin', 90, 'max');

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tgl_dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id`, `nama`, `email`, `gambar`, `password`, `role_id`, `is_active`, `tgl_dibuat`) VALUES
(15, 'Admin', 'admin@email.com', 'default.jpg', '$2y$10$S1vUEQiIsrjbwcSoK0q2feXXLaHJZTOF09WXByQLrrVnfSpheUPY2', 1, 1, 1635648518),
(36, 'budi', 'budi@yahoo.com', 'default.jpg', '$2y$10$WoQni4Itr4j2rTkjxSE2jez/Dr7JETZXxp4sOrVPwOomSLuA3Z1mO', 2, 1, 1635733919),
(37, 'bambang', 'bambang@yahoo.com', 'default.jpg', '$2y$10$TtTqFFjL3E7bIT3lDIEW3OYHpFGoGHqWUJfZdtrlClr.107Ljwp3W', 2, 1, 1635764365),
(38, 'judi', 'judi@email.com', 'default.jpg', '$2y$10$o1TEz2AxS6yi4zob2W/k8eWSCkZ90iFVjG21Ji8eMTQ9orgfTXmZK', 2, 1, 1635765109),
(39, 'judi', 'jum@gmail.com', 'default.jpg', '$2y$10$OExqO2JyORotHTCKcgJI5OzWkAkJ9p029Ef3.NHaTKGQfPWcwD4w2', 2, 1, 1635765758);

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vaksin`
--

CREATE TABLE `tb_vaksin` (
  `id_vaksin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nik` varchar(25) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `penyakit` varchar(128) NOT NULL,
  `terpapar` varchar(128) NOT NULL,
  `vaksin` varchar(128) NOT NULL,
  `usia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_vaksin`
--

INSERT INTO `tb_vaksin` (`id_vaksin`, `nama`, `alamat`, `jk`, `status`, `tempat_lahir`, `tgl_lahir`, `nik`, `no_tlp`, `email`, `pekerjaan`, `penyakit`, `terpapar`, `vaksin`, `usia`) VALUES
(19, 'RAMDHAN ARI FATONI', 'desa kalikatir rt.01 rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '2009-12-01', '1234567895588258', '085649123344', 'ramdhan@gmail.com', 'pelajar', 'tidak ada', 'belum', 'sudah', '13'),
(20, 'BAYU MUKHAMAD AJI', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '2007-12-23', '3516022312070001', '085648525855', 'bayu@gmail.com', 'pelajar', 'tidak ada', 'belum', 'sudah', '13'),
(21, 'GIO SAMSAM AIRLANGGA', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '2007-12-08', '3516021908070001', '085123789645', 'gio@gmail.com', 'pelajar', 'tidak ada', 'belum', 'sudah', '14'),
(22, 'NAFA HERDIYANTI', 'desa kalikatir rt.01 rw.01', 'wanita', 'belum_kawin', 'MOJOKERTO', '2006-11-12', '3516025211060002', '085127225069', 'nafa@gmail.com', 'pelajar', 'tidak_ada', 'belum', 'sudah', '14'),
(23, 'ADELIA FEBRIYANTI', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'belum_kawin', 'MOJOKERTO', '2006-02-19', '3516025902060001', '085645996325', 'adelia@gmail.com', 'pelajar', 'tidak ada', 'belum', 'sudah', '15'),
(24, 'MAZLUL ALFIKI', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '2006-01-31', '3516023101060002', '081658445967', 'alfiki@gmail.com', 'pelajar', 'tidak ada', 'belum', 'belum', '15'),
(25, 'LEZHA RISYABEL DANDES PUTRI', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'belum_kawin', 'MOJOKERTO', '2005-12-19', '3516025912050002', '085647446125', 'lezha@gmail.com', 'pelajar', 'tidak ada', 'belum', 'sudah', '16'),
(26, 'DEDE RIFKI', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '2005-11-05', '3516020511050001', '085645996341', 'dede@gmail.com', 'pelajar', 'tidak ada', 'belum', 'sudah', '17'),
(27, 'MOCHAMAD EGA PUTRA NUR HABVIDHA', 'desa kalikatir rt.01 rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '2005-11-27', '3516022711050001', '085612452115', 'ega@gmail.com', 'pelajar', 'tidak_ada', 'belum', 'belum', '16'),
(28, 'MOCHAMMAD SAIFUL ALAM', 'desa kalikatir rt.01 rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '2005-10-01', '3516020110050001', '085647125645', 'saiful@gmail.com', 'pelajar', 'tidak_ada', 'belum', 'sudah', '16'),
(29, 'FIRA AMANDA WARDANI', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'belum_kawin', 'MOJOKERTO', '2005-06-27', '3516026706050001', '0856459624566', 'fira@gmail.com', 'pelajar', 'tidak_ada', 'belum', 'sudah', '16'),
(30, 'SABAR PRASTIO', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '2005-06-13', '3516021306050002', '085645258411', 'prastio@gmal.com', 'pelajar', 'tidak_ada', 'belum', 'sudah', '16'),
(31, 'RICO RAMADHAN', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '2004-12-15', '3516021512040001', '085643341967', 'rico@gmail.com', 'pelajar', 'tidak ada', 'belum', 'sudah', '17'),
(32, 'FERDI SAMBA HASIBUAN', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '2004-12-14', '3516021412040001', '0', 'ferdi@gmail.com', 'pelajar', 'tidak_ada', 'belum', 'sudah', '17'),
(33, 'SITI NUR FATIMAH', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'belum_kawin', 'MOJOKERTO', '2004-10-16', '3516025610040001', '0', 'siti@gmail.com', 'pelajar', 'tidak_ada', 'belum', 'sudah', '17'),
(34, 'MUKHAMAD ILHAM MULLOH', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '2004-06-22', '3516022206040001', '0', 'ilham@gmail.com', 'pelajar', 'tidak_ada', 'belum', 'sudah', '17'),
(35, 'GEFI UTAMI PUTRI', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'belum_kawin', 'MOJOKERTO', '2004-01-24', '3516026401040001', '085677145341', 'gefi@gmail.com', 'pelajar', 'tidak_ada', 'belum', 'sudah', '18'),
(36, 'AMBAR DWI PRASTYO', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'belum_kawin', 'MOJOKERTO', '2003-07-09', '3516024907030001', '08567431967', 'ambar@gmail.com', 'pelajar', 'tidak_ada', 'belum', 'sudah', '18'),
(37, 'ROCHMAD FAJAR NUR ALIM', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '2005-03-05', '3516020503030001', '085647449123', 'rochmad@gmail.com', 'pelajar', 'tidak_ada', 'belum', 'belum', '19'),
(38, 'TEGAR HERMAWAN', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '2002-09-11', '3516021109020002', '0', 'tegar@gmail.com', 'pelajar', 'tidak_ada', 'belum', 'belum', '19'),
(39, 'PUPUT SEPTANIA TRIASNINGRUM', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'belum_kawin', 'MOJOKERTO', '2002-09-06', '3516024609020002', '085647443251', 'puput@gmail.com', 'pelajar', 'tidak_ada', 'belum', 'sudah', '19'),
(40, 'MAMIK SEPTA UTARI', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'belum_kawin', 'MOJOKERTO', '2002-07-20', '3516026007020001', '085647443567', 'septa@gmail.com', 'pelajar', 'tidak_ada', 'belum', 'sudah', '19'),
(41, 'PURI RAHAYU SUYANTO PUTRI', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'belum_kawin', 'MOJOKERTO', '2002-05-27', '3516026705020002', '085647945617', 'puri@gmail.com', 'pelajar', 'tidak_ada', 'belum', 'belum', '19'),
(42, 'ILMI NURAINI', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'belum_kawin', 'MOJOKERTO', '2002-03-11', '3516025103020002', '0', 'ilmu@gmail.com', 'Mahasiswa', 'tidak_ada', 'belum', 'belum', '20'),
(43, 'RISKI WAHYU ARIANTO', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '2001-09-19', '3516021909010003', '0', 'riski@gmail.com', 'Mahasiswa', 'tidak_ada', 'belum', 'belum', '21'),
(44, 'FERI WULANDARI', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'belum_kawin', 'MOJOKERTO', '2000-07-12', '3516025206000002', '0', 'feri@gmail.com', 'Tidak Bekerja', 'tidak_ada', 'belum', 'sudah', '21'),
(45, 'ZHOLAHUDIN ALFON ROZAQY', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '2000-06-04', '3516020406000003', '0', 'alfon@gmail.com', 'Mahasiswa', 'tidak_ada', 'belum', 'sudah', '21'),
(46, 'LINGGA TITA HANDARU', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '2000-05-11', '3516021105000002', '0', 'lingga@gmail.com', 'Mahasiswa', 'tidak_ada', 'belum', 'belum', '21'),
(47, 'WIWIN LESTARI', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'belum_kawin', 'MOJOKERTO', '2000-01-29', '3516026901000001', '085647556125', 'wiwin@gmail.com', 'Mengurus Rumah Tangga', 'tidak_ada', 'belum', 'belum', '21'),
(48, 'RAHMAT HIDAYAT', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '1999-01-19', '3516020111990001', '085647559967', 'dayat@gmail.com', 'Tidak Bekerja', 'tidak_ada', 'belum', 'sudah', '22'),
(49, 'WIDYANI ADI SATRIYO PUTRI', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'kawin', 'MOJOKERTO', '1999-09-09', '3516024909990003', '085645996341', 'widya@gmail.com', 'Mengurus Rumah Tangga', 'tidak_ada', 'belum', 'sudah', '22'),
(50, 'TEGUH ADI PRAMONO', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'kawin', 'MOJOKERTO', '1999-07-30', '3516023007990002', '085647336152', 'teguh@gmail.com', 'Tidak Bekerja', 'tidak_ada', 'belum', 'sudah', '22'),
(51, 'AMIRUDIN ZAKARIA', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '1999-07-26', '3516022607990002', '085647556314', 'zakaria@gmail.com', 'Tidak Bekerja', 'tidak_ada', 'belum', 'sudah', '22'),
(52, 'NOVIYAL WAHYU AFFANDI', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '1998-11-16', '3516021611980002', '085647996241', 'noviyal@gmail.com', 'Wiraswasta', 'tidak_ada', 'belum', 'belum', '23'),
(53, 'FINA ASTRIYA', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'kawin', 'MOJOKERTO', '1998-04-22', '3516026204980001', '085647996341', 'fina@gmail.com', 'Mengurus Rumah Tangga', 'tidak_ada', 'belum', 'belum', '23'),
(54, 'LUTFIATUL AZIZAH', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'kawin', 'MOJOKERTO', '1998-01-02', '3516094201880008', '0856479125334', 'lutfiatul@gmail.com', 'Mengurus Rumah Tangga', 'tidak_ada', 'belum', 'sudah', '24'),
(55, 'SADALA AMBA NUH TERA', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'kawin', 'MOJOKERTO', '1997-12-20', '3516022012970003', '085647995125', 'sadala@gmail.com', 'Tidak Bekerja', 'tidak_ada', 'belum', 'sudah', '24'),
(56, 'EZRA ARYO HADI PUTRO PAMUNGKAS', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'kawin', 'MOJOKERTO', '1997-04-22', '3516020604970002', '085648778443', 'ezra@gmail.com', 'Karyawan Swasta', 'tidak_ada', 'belum', 'sudah', '24'),
(57, 'ANGGA ARIFIN', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '1996-08-18', '3516021808960002', '085641255341', 'angga@gmail.com', 'Tidak Bekerja', 'tidak_ada', 'belum', 'sudah', '25'),
(58, 'MUHAMMAD HUDI', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '1996-06-12', '3516021206960002', '085614345293', 'hudi@gmail.com', 'Tidak Bekerja', 'tidak_ada', 'belum', 'sudah', '25'),
(59, 'MUHAMMAD HUDA', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '1996-06-12', '3516021206960003', '085647443241', 'huda@gmail.com', 'Tidak Bekerja', 'tidak_ada', 'belum', 'sudah', '25'),
(60, 'SHOLICHUDIN', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'kawin', 'MOJOKERTO', '1996-05-18', '3516021805960002', '085647996338', 'sholic@gmail.com', 'Tidak Bekerja', 'tidak_ada', 'belum', 'sudah', '25'),
(61, 'FITRI WULANDARI', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'kawin', 'MOJOKERTO', '1995-03-13', '3516025303950001', '085647964885', 'fitri@gmail.com', 'Karyawan Swasta', 'tidak_ada', 'belum', 'sudah', '27'),
(62, 'HAPSARI PUTRI HENDRA', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'kawin', 'JOMBANG', '1995-03-28', '3517096803950002', '085647156341', 'hapsari@gmail.com', 'Karyawan Swasta', 'tidak_ada', 'belum', 'sudah', '27'),
(63, 'RINI SHOLIKHAH', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'kawin', 'MOJOKERTO', '1995-03-04', '3516024403950002', '085467889431', 'rini@gmail.com', 'Mengurus Rumah Tangga', 'tidak_ada', 'belum', 'sudah', '27'),
(64, 'GURUH PRASETYO', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '1995-01-28', '3516022801950003', '085647225647', 'guruh@gmail.com', 'Mahasiswa', 'tidak_ada', 'belum', 'sudah', '27'),
(65, 'GALIH PRASOJO', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '1995-01-28', '3516022801950002', '085647445968', 'galih@gmail.com', 'Tidak Bekerja', 'tidak_ada', 'belum', 'sudah', '27'),
(66, 'MOCH. NUROYKHAN', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'kawin', 'MOJOKERTO', '1994-12-05', '3516020512940001', '085647991563', 'nuroykhan@gmail.com', 'Karyawan Swasta', 'tidak_ada', 'belum', 'sudah', '28'),
(67, 'ANDIKA PURBAYA', 'Desa Kalikatir Rt.01 Rw.01', 'pria', 'belum_kawin', 'MOJOKERTO', '1994-03-29', '3516022903940003', '085697458625', 'andika@gmail.com', 'Tidak Bekerja', 'tidak_ada', 'belum', 'belum', '28'),
(68, 'MUSDALIFAH', 'Desa Kalikatir Rt.01 Rw.01', 'wanita', 'kawin', 'SAMARINDA', '1993-10-23', '3516026310930001', '085964789125', 'musdalifah@gmail.com', 'Mengurus Rumah Tangga', 'tidak_ada', 'belum', 'belum', '29');

-- --------------------------------------------------------

--
-- Table structure for table `user_akses_menu`
--

CREATE TABLE `user_akses_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_akses_menu`
--

INSERT INTO `user_akses_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(2, 1, 'Data Pendaftar Vaksin', 'data_pendaftar', 'fas fa-fw fa-clipboard-list', 1),
(3, 1, 'Pembobotan Kriteria', 'smt_kriteria', 'fas fa-fw fa-clipboard-list', 1),
(8, 1, 'Proses Smart', 'proses_smart', 'fas fa-fw fa-clipboard-list', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rangking`
--
ALTER TABLE `rangking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smt_kriteria`
--
ALTER TABLE `smt_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_vaksin`
--
ALTER TABLE `tb_vaksin`
  ADD PRIMARY KEY (`id_vaksin`);

--
-- Indexes for table `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rangking`
--
ALTER TABLE `rangking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `smt_kriteria`
--
ALTER TABLE `smt_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_vaksin`
--
ALTER TABLE `tb_vaksin`
  MODIFY `id_vaksin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

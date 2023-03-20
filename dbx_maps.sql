-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 12:17 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbx_maps`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbx_location`
--

CREATE TABLE `tbx_location` (
  `IndexLocation` int(11) NOT NULL,
  `NameLocation` text NOT NULL,
  `Address` text NOT NULL,
  `Latitude` text NOT NULL,
  `Logitude` text NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Provinsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbx_location`
--

INSERT INTO `tbx_location` (`IndexLocation`, `NameLocation`, `Address`, `Latitude`, `Logitude`, `Type`, `Provinsi`) VALUES
(2, 'Kabupaten Aceh Besar', '', '5.5289', '95.2918', 'Districts', 'Aceh'),
(3, 'Kabupaten Pidie', '', '4.66667', '96', 'Districts', 'Aceh'),
(4, 'Kota Banda Aceh', '', '5.5483', '95.3238', 'City', 'Aceh'),
(5, 'Kota Serang', '', '-6.1200', '106.1502', 'City', 'Banten'),
(6, 'Kab. Bengkulu Tengah', '', '-3.7331', '102.4504', 'Districts', 'Bengkulu'),
(7, 'Kab. Bengkulu Utara', '', '-3.266325', '101.980461', 'Districts', 'Bengkulu'),
(8, 'Kab. Mukomuko', '', '-2.550839999999937', '101.10638000000006', 'Districts', 'Bengkulu'),
(9, 'Kab. Rejang Lebong', '', '-3.1666699999999537', '102.50000000000006', 'Districts', 'Bengkulu'),
(10, 'Kab. Deli Serdang', '', '3.5541756', '98.8786266', 'Districts', 'Sumatera Utara'),
(11, 'Kabupaten Humbang Hasundutan', '', '2.3117900000000304', '98.88637000000006', 'Districts', 'Sumatera Utara'),
(12, 'Kabupaten Toba', '', '2.39793', '99.21678', 'Districts', 'Sumatera Utara'),
(13, 'Kota Binjai', '', '3.598401', '98.489166', 'City', 'Sumatera Utara'),
(14, 'Kota Medan', '', '3.5951956', '98.6722227', 'City', 'Sumatera Utara'),
(15, 'Kota Pematang Siantar', '', '2.970042', ' 99.068169', 'City', 'Sumatera Utara'),
(16, 'Kab. Padang Pariaman', '', '-0.61898', '100.11997', 'Districts', 'Sumatera Barat'),
(17, 'Kab. Pesisir Selatan', '', '-1.35', '100.567', 'Districts', 'Sumatera Barat'),
(18, 'Kota Payakumbuh', '', '-0.2159', '100.6334', 'City', 'Sumatera Barat'),
(19, 'Kab. Indragiri Hilir', '', '-0.333332', '103.166832666', 'Districts', 'Riau'),
(20, 'Kab. Rokan Hulu', '', '0.88333', '100.48333', 'Districts', 'Riau'),
(21, 'Kab. Siak', '', '0.811881', ' 101.797961', 'Districts', 'Riau'),
(22, 'Kota Pekanbaru', '', '0.533505', ' 101.447403', 'City', 'Riau'),
(23, 'Kab. Kerinci', '', '-2.083666332', '101.474664768', 'Districts', 'Jambi'),
(24, 'Kab. Musi Banyuasin', '', '-2.499999999999943', '	104.00000000000006', 'Districts', 'Sumatera Selatan'),
(25, 'Kab. Ogan Ilir', '', '-3.249999999999943', '105.16667000000007', 'Districts', 'Sumatera Selatan'),
(26, 'Kab. Ogan Komering Ulu', '', '-4.65728', '104.00659', 'Districts', 'Sumatera Selatan'),
(27, 'Kab. Lampung Selatan', '', '-5.453099999999949', '	104.98770000000007', 'Districts', 'Lampung'),
(28, 'Kota Bandar Lampung', '', '-5.450000', '	105.266670', 'City', 'Lampung'),
(29, 'Kota Metro', '', '-5.0999996', '105.324665368', 'City', 'Lampung'),
(30, 'Kab. Bangka', '', '-1.91667', '105.93333', 'Districts', 'Kepulauan Bangka Belitung'),
(31, 'Kab. Bangka Barat', '', '-2.0593695', '105.1940395', 'Districts', 'Kepulauan Bangka Belitung'),
(32, 'Kab. Bangka Timur', '', '-2.8678037', '	108.1428669', 'Districts', 'Kepulauan Bangka Belitung'),
(33, 'Kab. Bintan', '', '1.221836', '104.557549', 'Districts', 'Kepulauan Riau'),
(34, 'Kab. Kepulauan Anambas', '', '2.924690000000055', '105.74407000000008', 'Districts', 'Kepulauan Riau'),
(35, 'Kab. Natuna', '', '3.9384', '108.38401', 'Districts', 'Kepulauan Riau'),
(36, 'Provinsi DKI Jakarta', '', '-6.200000', '106.816666', 'Districts', 'DKI Jakarta'),
(37, 'Kab. Bogor', '', '-6.595038', '106.816635', 'Districts', 'Jawa Barat'),
(38, 'Kab. Ciamis', '', '-7.326220', '108.329346', 'Districts', 'Jawa Barat'),
(39, 'Kab. Garut', '', '-7.227906', '107.908699', 'Districts', 'Jawa Barat'),
(40, 'Kab. Sukabumi', '', '-6.923700', '106.928726', 'Districts', 'Jawa Barat'),
(41, 'Kota Cirebon', '', '-6.737246', '108.550659', 'City', 'Jawa Barat'),
(42, 'Kota Tasikmalaya', '', '-7.319563', '108.202972', 'City', 'Jawa Barat'),
(43, 'Kab. Banyumas', '', '-7.4238544', '109.2297912', 'Districts', 'Jawa Tengah'),
(44, 'Kab. Blora', '', '-6.967782', '111.413333575696', 'Districts', 'Jawa Tengah'),
(45, 'Kab. Brebes', '', '-6.892344', '109.026947', 'Districts', 'Jawa Tengah'),
(46, 'Kab. Grobogan', '', '-7.024666568', '110.919329656', 'Districts', 'Jawa Tengah'),
(47, 'Kab. Kebumen', '', '-7.676190', '109.663699', 'Districts', 'Jawa Tengah'),
(48, 'Kab. Pati', '', '-6.732099999999946', '111.07100000000008', 'Districts', 'Jawa Tengah'),
(49, 'Kab. Purworejo', '', '-7.7166638', '110.0166666', 'Districts', 'Jawa Tengah'),
(50, 'Kab. Gunungkidul', '', '-8.051218', '110.694313', 'Districts', 'DI Yogyakarta'),
(51, 'Kab. Sleman', '', '-7.71556', '110.35556', 'Districts', 'DI Yogyakarta'),
(52, 'Kab. Banyuwangi', '', '-8.2325', '114.35755', 'Districts', 'Jawa Timur'),
(53, 'Kab. Jember', '', '-8.184486', '113.668076', 'Districts', 'Jawa Timur'),
(54, 'Kab. Lumajang', '', '-8.233507', '113.220802', 'Districts', 'Jawa Timur'),
(55, 'Kab. Ponorogo', '', '-7.866688', '111.466614', 'Districts', 'Jawa Timur'),
(56, 'Kab. Situbondo', '', '-7.70623', '114.00976', 'Districts', 'Jawa Timur'),
(57, 'Kota Malang', '', '-7.983908', '112.621391', 'City', 'Jawa Timur'),
(58, 'Kab. Lombok Barat', '', '-8.2086521', '115.4382347', 'Districts', 'NTB'),
(59, 'Kab. Lombok Tengah', '', '-8.6853476', '116.282209754645', 'Districts', 'NTB'),
(60, 'Kab. Sumbawa', '', '-8.4920254', '117.4209206', 'Districts', 'NTB'),
(61, 'Kab. Kupang', '', '-10.04767825', '123.995781436266', 'Districts', 'NTT'),
(62, 'Kab. Manggarai', '', '-8.6870782', '120.5361845', 'Districts', 'NTT'),
(63, 'Kab. Ngada', '', '-8.7037352', '121.2924998', 'Districts', 'NTT'),
(64, 'Kota Kupang', '', '-10.178757', '123.597603', 'City', 'NTT'),
(65, 'Kab. Ketapang', '', '-1.859098', '109.971901', 'Districts', 'Kalimantan Barat'),
(66, 'Kab. Sanggau', '', '0.25472', '110.45', 'Districts', 'Kalimantan Barat'),
(67, 'Kota Singkawang', '', '0.90925', '108.98463', 'City', 'Kalimantan Barat'),
(68, 'Kab. Katingan', '', '-1.4999999999999432', '112.50000000000011', 'Districts', 'Kalimantan Tengah'),
(69, 'Kab. Lamandau', '', '-1.8526377', '111.2845025', 'Districts', 'Kalimantan Tengah'),
(70, 'Kota Palangkaraya', '', '-2.2136', '113.9108', 'Districts', 'Kalimantan Tengah'),
(71, 'Kab. Kutai Timur', '', '0.520395', '117.603374', 'Districts', 'Kalimantan Timur'),
(72, 'Kota Samarinda', '', '-0.502106', '117.153709', 'City', 'Kalimantan Timur'),
(73, 'Kab. Bulungan', '', '2.9', '117.1', 'Districts', 'Kalimantan Utara'),
(74, 'Kab. Tana Tidung', '', '3.485050000000058', '116.99965000000009', 'Districts', 'Kalimantan Utara'),
(75, 'Kota Tarakan', '', '3.31332', '117.59152', 'City', 'Kalimantan Utara'),
(76, 'Kab. Minahasa', '', '1.2537000000000376', '124.83000000000004', 'Districts', 'Sulawesi Utara'),
(77, 'Kota Bitung', '', '1.45528', '125.2554532', 'City', 'Sulawesi Utara'),
(78, 'Kota Manado', '', '1.460126', '124.826347', 'City', 'Sulawesi Utara'),
(79, 'Kab. Banggai', '', '-1.640814', '123.550408', 'Districts', 'Sulawesi Tengah'),
(80, 'Kab. Donggala', '', '-1.04261765', '119.674469265066', 'Districts', 'Sulawesi Tengah'),
(81, 'Kab. Poso', '', '-1.6568513', '120.5421575', 'Districts', 'Sulawesi Tengah'),
(82, 'Kota Palu', '', '-0.8917', '119.8707', 'City', 'Sulawesi Tengah'),
(83, 'Kab. Bulukumba', '', '-5.420999999999935', '120.23990000000003', 'Districts', 'Sulawesi Selatan'),
(84, 'Kab. Gowa', '', '-5.166669999999954', '119.66667000000007', 'Districts', 'Sulawesi Selatan'),
(85, 'Kab. Luwu Utara', '', '-3.5657637', '119.770527269267', 'Districts', 'Sulawesi Selatan'),
(86, 'Kab. Maros', '', '-4.951488', '119.577049', 'Districts', 'Sulawesi Selatan'),
(87, 'Kota Pare Pare', '', '-4.0045933', '119.629966', 'City', 'Sulawesi Selatan'),
(88, 'Kab. Buton', '', '-4.804624', '123.1752067', 'Districts', 'Sulawesi Tenggara'),
(89, 'Kab. Konawe', '', '-3.9449999999999363', '122.49889000000007', 'Districts', 'Sulawesi Tenggara'),
(90, 'Kab. Konawe Selatan', '', '-4.2027', '122.4467', 'Districts', 'Sulawesi Tenggara'),
(91, 'Kab. Wakatobi', '', '-5.535833', '123.758056', 'Districts', 'Sulawesi Tenggara'),
(92, 'Kota Bau Bau', '', '-5.46667', '122.633', 'City', 'Sulawesi Tenggara'),
(93, 'Kab. Boalemo', '', '0.5260200000000737', '122.35601000000008', 'Districts', 'Gorontalo'),
(94, 'Kab. Bone Bolango', '', '0.5392300000000319', '123.11291000000006', 'Districts', 'Gorontalo'),
(95, 'Kab. Gorontalo', '', '0.5728000000000293', '122.23370000000011', 'Districts', 'Gorontalo'),
(96, 'Kota Gorontalo', '', '0.556174', '123.058548', 'City', 'Gorontalo'),
(97, 'Kab. Polewali Mandar', '', '-3.4173234', '119.319507152196', 'Districts', 'Sulawesi Barat'),
(98, 'Kab. Buru', '', '-6.711099999999931', '108.55960000000005', 'Districts', 'Maluku'),
(99, 'Kab. Buru Selatan', '', '-3.514729999999929', '126.8486200000001', 'Districts', 'Maluku'),
(100, 'Kab. Kepulauan Aru', '', '-6.166667', '134.5', 'Districts', 'Maluku'),
(101, 'Kota Tual', '', '-0.9666699999999651', '101.58333000000005', 'City', 'Maluku'),
(102, 'Kab. Halmahera Tengah', '', '0.48056', '128.25', 'Districts', 'Maluku Utara'),
(103, 'Kab. Fak Fak', '', '-2.92641', '132.29608', 'Districts', 'Papua Barat'),
(104, 'Kab. Kaimana', '', '-3.6397187', '133.7402301', 'Districts', 'Papua Barat'),
(105, 'Kab. Sorong', '', '-1.5049499999999512', '132.28638', 'Districts', 'Papua Barat'),
(106, 'Kota Sorong', '', '-0.8666632', '131.249999', 'City', 'Papua Barat'),
(107, 'Kab. Keerom', '', '-2.89707999999996', '140.76643', 'Districts', 'Papua'),
(108, 'Kab. Kepulauan Yapen', '', '-1.7564788', '136.367660782307', 'Districts', 'Papua'),
(109, 'Kab. Merauke', '', '-8.499112', '140.404984', 'Districts', 'Papua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbx_location`
--
ALTER TABLE `tbx_location`
  ADD UNIQUE KEY `IndexLocation` (`IndexLocation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbx_location`
--
ALTER TABLE `tbx_location`
  MODIFY `IndexLocation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

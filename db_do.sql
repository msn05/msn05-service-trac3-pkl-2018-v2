-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2018 at 11:56 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_do`
--

-- --------------------------------------------------------

--
-- Table structure for table `kustom`
--

CREATE TABLE `kustom` (
  `kustom_id` int(6) NOT NULL,
  `kode_kustom` varchar(10) NOT NULL,
  `kustom_nama` varchar(34) NOT NULL,
  `no_ktp` int(20) NOT NULL,
  `kustom_alamat` text NOT NULL,
  `kustom_jk` varchar(43) NOT NULL,
  `kustom_hp` varchar(43) NOT NULL,
  `kustom_email` varchar(43) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kustom`
--

INSERT INTO `kustom` (`kustom_id`, `kode_kustom`, `kustom_nama`, `no_ktp`, `kustom_alamat`, `kustom_jk`, `kustom_hp`, `kustom_email`) VALUES
(20, '', '22', 2, '2', 'Laki-Laki', '2w323', '222'),
(21, 'U0001', 'Abdul Yahya', 8761526, 'Jalan Raya Bandung', 'Laki-Laki', '0891271623', 'abdyahya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mekanik`
--

CREATE TABLE `tbl_mekanik` (
  `id_mnk` int(11) NOT NULL,
  `nama_mnk` varchar(40) NOT NULL,
  `no_telephone` varchar(211) NOT NULL,
  `alamat_mnk` varchar(54) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mekanik`
--

INSERT INTO `tbl_mekanik` (`id_mnk`, `nama_mnk`, `no_telephone`, `alamat_mnk`) VALUES
(19, '211', '211', '211'),
(20, 'Abdul Aziz', '019212', 'rembang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobil`
--

CREATE TABLE `tbl_mobil` (
  `id_mbl` int(6) NOT NULL,
  `tanggal` datetime NOT NULL,
  `no_polisi` varchar(23) NOT NULL,
  `brand` varchar(43) NOT NULL,
  `tipe_mbl` varchar(43) NOT NULL,
  `model_mbl` varchar(54) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `lokasi_mbl` varchar(34) NOT NULL,
  `status` int(12) NOT NULL COMMENT '1 = tersedia, 2 = di sewa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`id_mbl`, `tanggal`, `no_polisi`, `brand`, `tipe_mbl`, `model_mbl`, `tgl_masuk`, `lokasi_mbl`, `status`) VALUES
(39, '0000-00-00 00:00:00', 'STRADA TRITON TRB GLS-D', 'BG9124NU', 'SILVERMETALLIC', '15', '0000-00-00', '105', 2),
(40, '0000-00-00 00:00:00', 'STRADA TRITON TRB GLS-D', 'BG9126NU', 'SILVERMETALLIC', '14', '0000-00-00', '102', 1),
(41, '0000-00-00 00:00:00', 'STRADA TRITON GLS-DC 2.', 'BD9794AP', '0', '16', '0000-00-00', '102', 1),
(42, '0000-00-00 00:00:00', 'STRADA TRITON HDX DC 2.', 'BG9783NT', 'SILVERMETALLIC', '14', '0000-00-00', '94', 1),
(43, '0000-00-00 00:00:00', 'STRADA TRITON HDX DC 2.', 'BG9831DJ', 'WHITESOLID', '14', '0000-00-00', '92', 2),
(44, '0000-00-00 00:00:00', 'STRADA TRITON TRB GLS-D', 'BG9376NW', 'WHITESOLID', '15', '0000-00-00', '90', 2),
(45, '0000-00-00 00:00:00', 'STRADA TRITON GLS-DC 2.', 'BD9796AP', '0', '14', '0000-00-00', '84', 1),
(46, '0000-00-00 00:00:00', 'STRADA TRITON HDX DC 2.', 'BG9793NT', 'SILVERMETALLIC', '14', '0000-00-00', '76', 2),
(47, '0000-00-00 00:00:00', 'HILUX DC E AIRBAG 2.5 4', 'BG9840NT', 'SUPERWHITE', '13', '0000-00-00', '69', 1),
(48, '0000-00-00 00:00:00', 'STRADA TRITON TRB GLS-A', 'BG9017NT', 'WHITESOLID', '14', '0000-00-00', '65', 1),
(49, '0000-00-00 00:00:00', 'STRADA TRITON TRB GLS-A', 'BG9030NT', 'WHITESOLID', '14', '0000-00-00', '62', 1),
(50, '0000-00-00 00:00:00', 'STRADA TRITON HDX DC 2.', 'BG9044DK', 'WHITESOLID', '13', '0000-00-00', '52', 1),
(51, '0000-00-00 00:00:00', 'STRADA TRITON NEW GLS D', 'BG9653NS', 'Red', '16', '0000-00-00', '51', 1),
(52, '0000-00-00 00:00:00', 'COLT-D FE 73 110PS 6B 4', 'BG8388DE', 'Yellow', '15', '0000-00-00', '50', 1),
(53, '0000-00-00 00:00:00', 'HILUX DC E AIRBAG 2.5 4', 'BG9846NT', 'SUPERWHITE', '15', '0000-00-00', '50', 2),
(54, '0000-00-00 00:00:00', 'AVANZA GRAND G AB 1.3 4', 'BG1097UR', 'White', '16', '0000-00-00', '45', 1),
(55, '0000-00-00 00:00:00', 'STRADA TRITON TRB GLS-A', 'BG9012NT', 'WHITESOLID', '15', '0000-00-00', '42', 1),
(56, '0000-00-00 00:00:00', 'STRADA TRITON TRB GLS-A', 'BG9036NT', 'Grey', '16', '0000-00-00', '42', 1),
(57, '0000-00-00 00:00:00', 'INNOVA G AIRBAG MC 2.0 ', 'B1847UYO', 'Black', '14', '0000-00-00', '42', 1),
(58, '0000-00-00 00:00:00', 'HILUX STD AIRBAG 2.0 4X', 'BH9051AS', 'Black', '15', '0000-00-00', '38', 1),
(59, '0000-00-00 00:00:00', 'PAJERO SPORT GLX 2.5 4X', 'BG1620IE', 'White', '16', '0000-00-00', '38', 1),
(60, '0000-00-00 00:00:00', 'AVANZA NEW VELOZ AIRBAG', 'BG1706IV', 'SILVERMETALIC', '15', '0000-00-00', '37', 1),
(61, '0000-00-00 00:00:00', 'COLT-D FE 74 125PS 6B 4', 'H1389PW', '0', '15', '0000-00-00', '37', 1),
(62, '0000-00-00 00:00:00', 'COLT-D FE 73 110PS 6B 4', 'BG8988UR', 'Yellow', '14', '0000-00-00', '35', 1),
(63, '0000-00-00 00:00:00', 'COLT-D FE 73 110PS 6B 4', 'BG8986UR', 'Yellow', '14', '0000-00-00', '35', 1),
(64, '0000-00-00 00:00:00', 'STRADA TRITON TRB GLS-A', 'BG9140NT', 'WHITESOLID', '14', '0000-00-00', '30', 1),
(65, '0000-00-00 00:00:00', 'AVANZA G NEW AIRBAG 1.3', 'B1716UYN', 'SILVERMETALIC', '13', '0000-00-00', '26', 1),
(66, '0000-00-00 00:00:00', 'AVANZA G NEW AIRBAG 1.3', 'D1705ADL', 'White', '14', '0000-00-00', '25', 1),
(67, '0000-00-00 00:00:00', 'HILUX DC G NEW 2.5 4X4 ', 'DA9004BP', 'Super White', '15', '0000-00-00', '25', 1),
(68, '0000-00-00 00:00:00', 'HILUX DC G NEW 2.5 4X4 ', 'KH8126GJ', 'SUPERWHITE', '16', '0000-00-00', '21', 1),
(69, '0000-00-00 00:00:00', 'STRADA TRITON GLS-DC 2.', 'BG9305NL', 'WHITESOLID', '14', '0000-00-00', '20', 1),
(70, '0000-00-00 00:00:00', 'PANTHER FD PS 2.5 4X2 M', 'BG9616NV', 'BLACKMICAMETALLIC', '14', '0000-00-00', '18', 1),
(71, '0000-00-00 00:00:00', 'PANTHER FD PS 2.5 4X2 M', 'BG9515NV', 'BLACKMICAMETALLIC', '13', '0000-00-00', '17', 1),
(72, '0000-00-00 00:00:00', 'AVANZA G NEW 1.3 4X2 MT', 'BN2936AY', 'SILVERMETALLIC', '14', '0000-00-00', '15', 1),
(73, '0000-00-00 00:00:00', 'DUTRO 130 HD PS 6B 5.8 ', 'BG7172D', 'White', '14', '0000-00-00', '14', 1),
(74, '0000-00-00 00:00:00', 'DUTRO 130 HD PS 6B 5.8 ', 'BG7179D', 'White', '15', '0000-00-00', '14', 1),
(75, '0000-00-00 00:00:00', 'DYNA 110 FT PS 6B 4.0 4', 'BG8659UV', 'Red', '15', '0000-00-00', '205', 1),
(76, '0000-00-00 00:00:00', 'CARRY REAL VAN GX 1.5 4', 'BG1894RQ', 'RADIANTREDMETALLIC', '12', '0000-00-00', '154', 1),
(77, '0000-00-00 00:00:00', 'CARRY REAL VAN GX 1.5 4', 'BG1548RT', 'RADIANTREDMETALLIC', '12', '0000-00-00', '137', 1),
(78, '0000-00-00 00:00:00', 'AVANZA G NEW 1.3 4X2 MT', 'B1611UZO', 'BLACKMICA', '13', '0000-00-00', '105', 1),
(79, '0000-00-00 00:00:00', 'COLT-D L300 72PS STD 2.', 'BG9957ND', 'Black', '12', '0000-00-00', '102', 1),
(80, '0000-00-00 00:00:00', 'AVANZA G NEW AIRBAG 1.3', 'B1307UZZ', 'SILVERMETALIK', '16', '0000-00-00', '102', 1),
(81, '0000-00-00 00:00:00', 'AVANZA G NEW AIRBAG 1.3', 'B1284UZZ', 'SILVERMETALIK', '14', '0000-00-00', '94', 1),
(82, '0000-00-00 00:00:00', 'AVANZA E NEW AIRBAG 1.3', 'BN2860HB', 'White', '16', '0000-00-00', '92', 1),
(83, '0000-00-00 00:00:00', 'AVANZA G NEW AIRBAG 1.3', 'B1340UZZ', 'BLACKMETALIC', '14', '0000-00-00', '90', 1),
(84, '0000-00-00 00:00:00', 'INNOVA E NEW 2.0 4X2 MT', 'BN2938AY', 'BLACKMICA', '16', '0000-00-00', '84', 1),
(85, '0000-00-00 00:00:00', 'STRADA TRITON HDX DC 2.', 'BG9438DJ', 'White', '13', '0000-00-00', '76', 1),
(86, '0000-00-00 00:00:00', 'GRAN MAX D MB 1.3 4X2 M', 'BG1877ZW', 'White', '12', '0000-00-00', '69', 1),
(87, '0000-00-00 00:00:00', 'CARRY REAL VAN GX 1.5 4', 'BG1559RN', 'RADIANTREDMETALLIC', '14', '0000-00-00', '65', 1),
(88, '0000-00-00 00:00:00', 'CARRY REAL VAN GX 1.5 4', 'BG1305RT', 'RADIANTREDMETALLIC', '15', '0000-00-00', '62', 1),
(89, '0000-00-00 00:00:00', 'CARRY REAL VAN GX 1.5 4', 'BG1304RT', 'RADIANTREDMETALLIC', '16', '0000-00-00', '52', 1),
(90, '0000-00-00 00:00:00', 'STRADA TRITON TRB GLS-D', 'BM8474TQ', 'BLACKMICAMETALLIC', '14', '0000-00-00', '51', 1),
(91, '0000-00-00 00:00:00', 'STRADA TRITON GLS-AB 2.', 'BG9314NV', 'WHITESOLID', '13', '0000-00-00', '50', 1),
(92, '0000-00-00 00:00:00', 'INNOVA G AIRBAG MC 2.0 ', 'B1996UYO', 'HITM', '15', '0000-00-00', '50', 1),
(93, '0000-00-00 00:00:00', 'PAJERO SPORT GLX 2.5 4X', 'BG1621IE', 'White', '14', '0000-00-00', '45', 1),
(94, '0000-00-00 00:00:00', 'INNOVA G AIRBAG 2.0 4X2', 'BG1828AB', 'SILVERMETALLIC', '14', '0000-00-00', '42', 1),
(95, '0000-00-00 00:00:00', 'STRADA TRITON GLS-AB 2.', 'BG9308NV', 'WHITESOLID', '13', '0000-00-00', '42', 1),
(96, '0000-00-00 00:00:00', 'AVANZA GRAND G AB 1.3 4', 'BG1057UG', 'BLACKMICAMETALLIC', '16', '0000-00-00', '42', 1),
(97, '0000-00-00 00:00:00', 'AVANZA G NEW AIRBAG 1.3', 'B1156UZZ', 'BLACKMICA', '13', '0000-00-00', '38', 1),
(98, '0000-00-00 00:00:00', 'AVANZA GRAND G AB 1.3 4', 'BG1050UG', 'BLACKMICAMETALLIC', '16', '0000-00-00', '38', 1),
(99, '0000-00-00 00:00:00', 'INNOVA G AIRBAG MC 2.0 ', 'BG1228IA', 'SILVERMETALLIC', '15', '0000-00-00', '37', 1),
(100, '0000-00-00 00:00:00', 'INNOVA E AIRBAG MC 2.0 ', 'B1380UYN', 'White', '15', '0000-00-00', '37', 1),
(101, '0000-00-00 00:00:00', 'PAJERO SPORT GLX 2.5 4X', 'BG1615IE', 'White', '14', '0000-00-00', '35', 1),
(102, '0000-00-00 00:00:00', 'HILUX DC G NEW 2.5 4X4 ', 'BG9972NP', 'BLACKMICA', '13', '0000-00-00', '35', 1),
(103, '0000-00-00 00:00:00', 'STRADA TRITON GLS-AB 2.', 'BG9307NV', 'WHITESOLID', '13', '0000-00-00', '30', 1),
(104, '0000-00-00 00:00:00', 'AVANZA GRAND G AB 1.3 4', 'B1902NOR', 'HITAM', '16', '0000-00-00', '26', 1),
(105, '0000-00-00 00:00:00', 'PAJERO SPORT GLX 2.5 4X', 'BG1874IE', 'White', '14', '0000-00-00', '25', 1),
(106, '0000-00-00 00:00:00', 'STRADA TRITON TRB GLS-A', 'BG9032NT', 'WHITESOLID', '14', '0000-00-00', '25', 1),
(107, '0000-00-00 00:00:00', 'INNOVA G AIRBAG 2.5 4X2', 'BG1512AE', 'BLACKMICA', '14', '0000-00-00', '21', 1),
(108, '0000-00-00 00:00:00', 'INNOVA G AIRBAG MC 2.0 ', 'BG1270AO', 'BLACKMICA', '14', '0000-00-00', '20', 1),
(109, '0000-00-00 00:00:00', 'GRAN MAX MB 1.5 D PS 4X', 'B1757UYP', 'SILVERMETALLIC', '15', '0000-00-00', '18', 1),
(110, '0000-00-00 00:00:00', 'INNOVA G AIRBAG 2.0 4X2', 'B1146URI', 'SUPERWHITE', '13', '0000-00-00', '17', 1),
(111, '0000-00-00 00:00:00', 'AVANZA G NEW AIRBAG 1.3', 'B1767UYN', 'White', '15', '0000-00-00', '15', 1),
(112, '0000-00-00 00:00:00', 'STRADA TRITON HDX DC 2.', 'BG9784NT', 'SILVERMETALLIC', '14', '0000-00-00', '14', 1),
(113, '0000-00-00 00:00:00', 'INNOVA G 2.4 4X2 AT D 2', 'BG1285UG', 'White', '16', '0000-00-00', '14', 1),
(114, '0000-00-00 00:00:00', 'GRAN MAX 3W 1.3 4X2 MT ', 'BH9717AS', 'Black', '14', '0000-00-00', '205', 1),
(115, '0000-00-00 00:00:00', 'AVANZA E NEW AIRBAG 1.3', 'BG1049AB', 'BLACKMICA', '14', '0000-00-00', '154', 1),
(116, '0000-00-00 00:00:00', 'INNOVA G AIRBAG MC 2.0 ', 'B1744UYN', 'BLACKMICA', '15', '0000-00-00', '137', 1),
(117, '0000-00-00 00:00:00', 'PANTHER GD 3W  PS 2.5 4', 'BG9829NV', 'BLACKSOLID', '14', '0000-00-00', '105', 1),
(118, '0000-00-00 00:00:00', 'PAJERO SPORT GLX 2.5 4X', 'BG1617IE', 'White', '14', '0000-00-00', '102', 1),
(119, '0000-00-00 00:00:00', 'STRADA TRITON GLS-AB 2.', 'BG9304NV', 'WHITESOLID', '13', '0000-00-00', '102', 1),
(120, '0000-00-00 00:00:00', 'INNOVA G AIRBAG 2.0 4X2', 'BN1453BS', 'BLACKMICA', '14', '0000-00-00', '94', 1),
(121, '0000-00-00 00:00:00', 'PAJERO NEW SPORT GLX 2.', 'BG1672AO', 'White', '14', '0000-00-00', '92', 1),
(122, '0000-00-00 00:00:00', 'STRADA TRITON HDX SC 2.', 'BG9379NV', 'WHITESOLID', '13', '0000-00-00', '90', 1),
(123, '0000-00-00 00:00:00', 'AVANZA GRAND G AB 1.3 4', 'BG1217UG', 'White', '16', '0000-00-00', '84', 1),
(124, '0000-00-00 00:00:00', 'INNOVA G AIRBAG MC 2.0 ', 'B1850UYO', 'BLACKMICA', '15', '0000-00-00', '76', 1),
(125, '0000-00-00 00:00:00', 'INNOVA G AIRBAG MC 2.0 ', 'B1811UYO', 'BLACKMICA', '15', '0000-00-00', '69', 1),
(126, '0000-00-00 00:00:00', 'INNOVA G 2.4 4X2 AT D 2', 'BG1301UG', 'White', '16', '0000-00-00', '65', 1),
(127, '0000-00-00 00:00:00', 'INNOVA G AIRBAG MC 2.0 ', 'B1960UYO', 'Black', '15', '0000-00-00', '62', 1),
(128, '0000-00-00 00:00:00', 'AVANZA GRAND G AB 1.3 4', 'B1206NOS', 'HITAM', '16', '0000-00-00', '52', 1),
(129, '0000-00-00 00:00:00', 'INNOVA G AIRBAG 2.0 4X2', 'BG1329AC', 'BLACKMICA', '14', '0000-00-00', '51', 1),
(130, '0000-00-00 00:00:00', 'INNOVA G AIRBAG MC 2.0 ', 'B1730UYN', 'White', '15', '0000-00-00', '50', 1),
(131, '0000-00-00 00:00:00', 'AVANZA GRAND G AB 1.3 4', 'BG1216UG', 'SUPERWHITE', '16', '0000-00-00', '50', 1),
(132, '0000-00-00 00:00:00', 'INNOVA V LUX AIRBAG MC ', 'BE2474YU', 'SILVERMETALIC', '15', '0000-00-00', '45', 1),
(133, '0000-00-00 00:00:00', 'AVANZA G NEW AIRBAG 1.3', 'B1863UYO', 'Silver', '15', '0000-00-00', '42', 1),
(134, '0000-00-00 00:00:00', 'STRADA TRITON EXCEED HP', 'BA8732BQ', 'BLACKMICA', '14', '0000-00-00', '42', 1),
(135, '0000-00-00 00:00:00', 'INNOVA G AIRBAG 2.0 4X2', 'BN1452BS', 'SILVERMETALLIC', '14', '0000-00-00', '42', 1),
(136, '0000-00-00 00:00:00', 'AVANZA G NEW AIRBAG 1.3', 'BG1824AB', 'SUPERWHITE', '14', '0000-00-00', '38', 1),
(137, '0000-00-00 00:00:00', 'FORTUNER V NEW 2.7 4X4 ', 'DA8670BI', 'Black', '13', '0000-00-00', '38', 1),
(138, '0000-00-00 00:00:00', 'ALTIS V ALL NEW COROLLA', 'BN1442PB', 'White', '14', '0000-00-00', '37', 1),
(139, '0000-00-00 00:00:00', 'INNOVA G AIRBAG MC 2.0 ', 'B1252UYI', 'Black', '15', '0000-00-00', '37', 1),
(140, '0000-00-00 00:00:00', 'AVANZA GRAND G AB 1.3 4', 'B1233NOS', 'SILVERMETALLIC', '16', '0000-00-00', '35', 1),
(141, '0000-00-00 00:00:00', 'AVANZA G NEW AIRBAG 1.3', 'BG1826AB', 'BLACKMICA', '14', '0000-00-00', '35', 1),
(142, '0000-00-00 00:00:00', 'INNOVA G AIRBAG 2.0 4X2', 'BN1451BS', 'WHITESOLID', '14', '0000-00-00', '30', 1),
(143, '0000-00-00 00:00:00', 'STRADA TRITON HDX DC 2.', 'BG9039DK', 'White', '13', '0000-00-00', '26', 1),
(144, '0000-00-00 00:00:00', 'DUTRO 130 HD PS 6B 5.8 ', 'KT7835AO', 'WHITESOLID', '14', '0000-00-00', '25', 1),
(145, '0000-00-00 00:00:00', 'STRADA TRITON TRB GLS-A', 'BG9063NT', 'SUPERWHITE', '14', '0000-00-00', '25', 1),
(146, '0000-00-00 00:00:00', 'INNOVA E AIRBAG MC 2.0 ', 'BG1812IQ', 'Black Mica Metallic', '15', '0000-00-00', '21', 1),
(147, '0000-00-00 00:00:00', 'INNOVA G 2.0 4X2 MT B 2', 'BG1367RP', 'Black Mica Metallic', '17', '0000-00-00', '20', 1),
(148, '0000-00-00 00:00:00', 'ALTIS V 1.8 4X2 AT B 20', 'BARU103536', 'Black Mica Metallic', '17', '0000-00-00', '18', 1),
(149, '0000-00-00 00:00:00', 'AVANZA GRAND G AB 1.3 4', 'BG1042RY', 'black', '17', '0000-00-00', '17', 1),
(150, '0000-00-00 00:00:00', 'GRAN MAX BV AC 1.3 4X2 ', 'BARU044412', 'black', '17', '0000-00-00', '15', 1),
(151, '0000-00-00 00:00:00', 'GRAN MAX BV AC 1.3 4X2 ', 'BARU044411', 'black', '17', '0000-00-00', '14', 1),
(152, '0000-00-00 00:00:00', 'GRAN MAX BV AC 1.3 4X2 ', 'BARU044439', 'black', '17', '0000-00-00', '14', 1),
(153, '0000-00-00 00:00:00', 'GRAN MAX BV AC 1.3 4X2 ', 'BARU044440', 'black', '17', '0000-00-00', '205', 1),
(154, '0000-00-00 00:00:00', 'GRAN MAX BV AC 1.3 4X2 ', 'BARU044410', 'Silver Metallic', '17', '0000-00-00', '154', 1),
(155, '0000-00-00 00:00:00', 'GRAN MAX D MB FH 1.3 4X', 'BG1894RP', 'Silver Metallic', '17', '0000-00-00', '137', 1),
(156, '0000-00-00 00:00:00', 'GRAN MAX D MB FH 1.3 4X', 'BG1895RP', 'HIGHLIGHTSILVER', '17', '0000-00-00', '105', 1),
(157, '0000-00-00 00:00:00', 'RANGER SC BASE 2.5 4X4 ', 'BG9072NE', 'GREYMICAMETALLIC', '11', '0000-00-00', '102', 1),
(158, '0000-00-00 00:00:00', 'INNOVA G AIRBAG 2.0 4X2', 'BG1544DG', 'ALPINEWHITE', '14', '0000-00-00', '102', 1),
(159, '0000-00-00 00:00:00', 'D-MAX RODEO LS PS 3.0 4', 'BG9053NM', 'BLACKMICA', '12', '0000-00-00', '94', 1),
(160, '0000-00-00 00:00:00', 'AVANZA G NEW AIRBAG 1.3', 'BG1053AP', 'WHITE METALLIC', '14', '0000-00-00', '92', 1),
(161, '0000-00-00 00:00:00', 'XENIA GREAT X STD 1.3 4', 'BG1850UN', 'White', '16', '0000-00-00', '90', 1),
(162, '0000-00-00 00:00:00', 'PAJERO SPORT GLX 2.5 4X', 'BG1612IE', 'SILVERMETALLIC', '14', '0000-00-00', '84', 1),
(163, '0000-00-00 00:00:00', 'STRADA TRITON TRB GLS-D', 'BG9132NU', 'Silver', '14', '0000-00-00', '76', 1),
(164, '0000-00-00 00:00:00', 'AVANZA G NEW AIRBAG 1.3', 'B1066UYP', 'SUPERWHITE', '15', '0000-00-00', '69', 1),
(165, '0000-00-00 00:00:00', 'HILUX DC G AIRBAG 2.5 4', 'BG9709NV', 'Red', '14', '0000-00-00', '65', 1),
(166, '0000-00-00 00:00:00', 'STRADA TRITON TRB GLS-D', 'BG9192NU', 'Silver', '14', '0000-00-00', '62', 1),
(167, '0000-00-00 00:00:00', 'PANTHER LS FF 2.5 4X2 M', 'BG1261IV', 'BLACKMICA', '15', '0000-00-00', '52', 1),
(168, '0000-00-00 00:00:00', 'AVANZA G NEW AIRBAG 1.3', 'BN3161BS', 'ALPINEWHITE', '15', '0000-00-00', '51', 1),
(169, '0000-00-00 00:00:00', 'D-MAX RODEO LS PS 3.0 4', 'BG9368NQ', 'RADIANTREDMETALLIC', '12', '0000-00-00', '50', 1),
(170, '0000-00-00 00:00:00', 'CARRY REAL VAN GX 1.5 4', 'BG1151ZC', 'REDMETALLIC', '12', '0000-00-00', '50', 1),
(171, '0000-00-00 00:00:00', 'CARRY REAL VAN GX 1.5 4', 'BE2894YS', 'ALPINEWHITE', '13', '0000-00-00', '45', 1),
(172, '0000-00-00 00:00:00', 'D-MAX RODEO LS PS 3.0 4', 'BG9370NQ', 'BLACKMICAMETALLIC', '12', '0000-00-00', '42', 1),
(173, '0000-00-00 00:00:00', 'INNOVA G 2.4 4X2 MT D 2', 'BG1348UI', 'White', '16', '0000-00-00', '42', 1),
(174, '0000-00-00 00:00:00', 'HIACE STD 2.5 4X2 MT D ', 'BG7003AO', 'White', '14', '0000-00-00', '42', 1),
(175, '0000-00-00 00:00:00', 'STRADA TRITON NEW GLS D', 'BG9212NR', 'WHITESOLID', '16', '0000-00-00', '38', 1),
(176, '0000-00-00 00:00:00', 'STRADA TRITON TRB GLS-A', 'BG9088NT', 'Black Mica Metallic', '14', '0000-00-00', '38', 1),
(177, '0000-00-00 00:00:00', 'INNOVA G 2.0 4X2 MT B 2', 'BG1386UT', 'Black Mica Metallic', '16', '0000-00-00', '37', 1),
(178, '0000-00-00 00:00:00', 'HILUX DC G 2.5 4X4 MT D', 'BG9879NR', '#N/A', '16', '0000-00-00', '37', 1),
(179, '0000-00-00 00:00:00', 'AVANZA G NEW AIRBAG 1.3', 'BH9677AV', 'SILVERMETALLIC', '#N/A', '0000-00-00', '35', 1),
(180, '0000-00-00 00:00:00', 'INNOVA G AIRBAG MC 2.0 ', 'BG1368AF', 'SILVERMETALLIC', '14', '0000-00-00', '35', 1),
(181, '0000-00-00 00:00:00', 'RUSH G 1.5 4X2 MT B 201', 'BG1806AV', 'PUTIH', '14', '0000-00-00', '30', 1),
(182, '0000-00-00 00:00:00', 'XENIA GREAT X STD 1.3 4', 'BG1562UG', 'Black Mica Metallic', '16', '0000-00-00', '26', 1),
(183, '0000-00-00 00:00:00', 'INNOVA G AIRBAG MC 2.0 ', 'BG1304UH', 'GREYMICAMETALLIC', '16', '0000-00-00', '25', 1),
(184, '0000-00-00 00:00:00', 'AVANZA G NEW AIRBAG 1.3', 'BG1232AP', 'SILVERMETALLIC', '14', '0000-00-00', '25', 1),
(200, '0000-00-00 00:00:00', 'GRAN MAX BV AC 1.3 4X2 ', 'BH9628AS', 'White', '14', '0000-00-00', '90', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_oren`
--

CREATE TABLE `tbl_oren` (
  `id_rental` int(11) NOT NULL,
  `no_order` varchar(30) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `kustom_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_dirental` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `tgl_dikembalikan` date DEFAULT NULL,
  `total_denda` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `email` varchar(90) DEFAULT NULL,
  `alamat` text,
  `model_mobil` varchar(50) NOT NULL,
  `tipe_mobil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_oren`
--

INSERT INTO `tbl_oren` (`id_rental`, `no_order`, `id_karyawan`, `kustom_id`, `harga`, `tgl_dirental`, `tgl_kembali`, `denda`, `id_mobil`, `tgl_dikembalikan`, `total_denda`, `total`, `status`, `email`, `alamat`, `model_mobil`, `tipe_mobil`) VALUES
(6, 'R000', 1, 21, 20000, '2018-04-19', '2018-04-19', 2000, 44, NULL, 0, 20000, '1', 'abdyahya@gmail.com', NULL, '15', 'WHITESOLID'),
(7, 'R000', 1, 21, 20000, '2018-04-19', '2018-04-19', 2000, 44, NULL, 0, 20000, '1', 'abdyahya@gmail.com', NULL, '15', 'WHITESOLID'),
(8, 'R001', 1, 21, 10000, '2018-04-27', '2018-04-27', 1000, 46, NULL, 0, 10000, '1', 'abdyahya@gmail.com', NULL, '14', 'SILVERMETALLIC'),
(9, 'R002', 1, 21, 10000, '2018-04-27', '2018-04-27', 1000, 46, NULL, 0, 10000, '1', 'abdyahya@gmail.com', NULL, '14', 'SILVERMETALLIC'),
(10, 'R003', 1, 21, 100000, '2018-04-28', '2018-04-27', 200000, 43, NULL, 0, 100000, '1', 'abdyahya@gmail.com', NULL, '14', 'WHITESOLID'),
(11, 'R004', 1, 21, 200000, '2018-04-13', '2018-04-27', 20000, 43, NULL, 0, 20000, '1', 'abdyahya@gmail.com', NULL, '14', 'WHITESOLID'),
(12, 'R005', 1, 21, 2000, '2018-04-24', '2018-04-24', 20000, 53, NULL, 0, 2000, '1', 'abdyahya@gmail.com', 'Jalan Raya Bandung', '15', 'SUPERWHITE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_os`
--

CREATE TABLE `tbl_os` (
  `id_servis` varchar(40) NOT NULL,
  `no_order` int(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `kustom_id` int(11) NOT NULL,
  `id_sparepart` int(11) NOT NULL,
  `id_m` int(11) NOT NULL,
  `jumlah_b` int(11) NOT NULL,
  `harga_sp` int(11) NOT NULL,
  `perkiraan_selesai` date NOT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama_sparepart` varchar(30) NOT NULL,
  `model_sparepart` varchar(40) NOT NULL,
  `tipe_sparepart` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_os`
--

INSERT INTO `tbl_os` (`id_servis`, `no_order`, `tgl_masuk`, `id_karyawan`, `kustom_id`, `id_sparepart`, `id_m`, `jumlah_b`, `harga_sp`, `perkiraan_selesai`, `total_bayar`, `status`, `alamat`, `email`, `nama_sparepart`, `model_sparepart`, `tipe_sparepart`) VALUES
('S001', 12390, '2018-04-21', 1, 21, 2, 20, 2, 20000, '2018-04-20', 40000, '1', '', '', '', '', ''),
('S002', 392879, '2018-04-27', 1, 21, 2, 20, 2, 20000, '2018-04-24', 40000, '2', '', '', '', '', ''),
('S003', 20395, '2018-04-26', 1, 21, 2, 20, 2, 20000, '2018-04-19', 40000, '1', '', '', '', '', ''),
('S004', 67985, '2018-04-21', 1, 21, 2, 20, 2, 20000, '2018-04-16', 40000, '2', '', '', '', '', ''),
('S005', 432222, '2018-04-19', 1, 21, 2, 20, 2, 20000, '2018-04-19', 40000, '1', '', '', '', '', ''),
('S006', 181199, '2018-04-18', 1, 21, 2, 20, 20000, 20000, '2018-04-17', 400000000, '1', 'Jalan Raya Bandung', 'abdyahya@gmail.com', 'Oli', 'oli', 'oli');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sparepart`
--

CREATE TABLE `tbl_sparepart` (
  `id_sp` int(6) NOT NULL,
  `kode_sp` varchar(30) NOT NULL,
  `nama_sp` varchar(40) NOT NULL,
  `brand_sp` varchar(30) NOT NULL,
  `tipe_sp` varchar(30) NOT NULL,
  `model_sp` varchar(32) NOT NULL,
  `tgl_dtg` date NOT NULL,
  `jumlah_sp` varchar(40) NOT NULL,
  `harga` varchar(23) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sparepart`
--

INSERT INTO `tbl_sparepart` (`id_sp`, `kode_sp`, `nama_sp`, `brand_sp`, `tipe_sp`, `model_sp`, `tgl_dtg`, `jumlah_sp`, `harga`, `status`) VALUES
(1, '212', '21', '21', '21', '21', '1212-12-21', '21', '121212', '1'),
(2, 'S001', 'Oli', 'Federal', 'oli', 'oli', '2018-04-03', '10', '20000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(54) NOT NULL,
  `password` varchar(54) NOT NULL,
  `nama` varchar(54) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'satrio', '1'),
(2, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'satriob', '1'),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kustom`
--
ALTER TABLE `kustom`
  ADD PRIMARY KEY (`kustom_id`);

--
-- Indexes for table `tbl_mekanik`
--
ALTER TABLE `tbl_mekanik`
  ADD PRIMARY KEY (`id_mnk`);

--
-- Indexes for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD PRIMARY KEY (`id_mbl`);

--
-- Indexes for table `tbl_oren`
--
ALTER TABLE `tbl_oren`
  ADD PRIMARY KEY (`id_rental`),
  ADD KEY `kustom_id` (`kustom_id`);

--
-- Indexes for table `tbl_sparepart`
--
ALTER TABLE `tbl_sparepart`
  ADD PRIMARY KEY (`id_sp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kustom`
--
ALTER TABLE `kustom`
  MODIFY `kustom_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_mekanik`
--
ALTER TABLE `tbl_mekanik`
  MODIFY `id_mnk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  MODIFY `id_mbl` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
--
-- AUTO_INCREMENT for table `tbl_oren`
--
ALTER TABLE `tbl_oren`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_sparepart`
--
ALTER TABLE `tbl_sparepart`
  MODIFY `id_sp` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

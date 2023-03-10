-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 06:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtugasakhir3`
--

-- --------------------------------------------------------

--
-- Table structure for table `datauji`
--

CREATE TABLE `datauji` (
  `ID_Uji` int(11) NOT NULL,
  `IQ` varchar(50) NOT NULL,
  `Rata_rata_Nilai_US` varchar(50) NOT NULL,
  `Keaktifan` varchar(15) NOT NULL,
  `Kedisiplinan` varchar(15) NOT NULL,
  `Kerja_Sama` varchar(15) NOT NULL,
  `Ketunaan` varchar(100) NOT NULL,
  `Jenis_Sekolah` varchar(15) NOT NULL,
  `Hasil_Klasifikasi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datauji`
--

INSERT INTO `datauji` (`ID_Uji`, `IQ`, `Rata_rata_Nilai_US`, `Keaktifan`, `Kedisiplinan`, `Kerja_Sama`, `Ketunaan`, `Jenis_Sekolah`, `Hasil_Klasifikasi`) VALUES
(30, '0 - 74', '75 - 100', 'Kurang', 'Baik', 'Kurang', 'Kelainan Emosional', 'SLB', 'SLB'),
(31, '75 - 110', '75 - 100', 'Baik', 'Baik', 'Baik', 'Kelainan Emosional', 'SMP', 'SMP'),
(32, '75 - 110', '75 - 100', 'Baik', 'Baik', 'Kurang', 'Kelainan Akademik', 'SMP', 'SMP'),
(33, '0 - 74', '75 - 100', 'Sangat Baik', 'Sangat Baik', 'Sangat Baik', 'Kelainan Akademik', 'SMP', 'SMP'),
(34, '0 - 74', '75 - 100', 'Baik', 'Sangat Baik', 'Kurang', 'Kelainan Emosional', 'SMP', 'SMP'),
(35, '75 - 110', '75 - 100', 'Sangat Baik', 'Sangat Baik', 'Kurang', 'Kelainan Fisik', 'SMP', 'SMP'),
(36, '75 - 110', '75 - 100', 'Kurang', 'Baik', 'Baik', 'Kelainan Akademik', 'SMP', 'SMP'),
(37, '0 - 74', '75 - 100', 'Kurang', 'Baik', 'Baik', 'Kelainan Emosional', 'SMP', 'SMP'),
(38, '75 - 110', '75 - 100', 'Baik', 'Baik', 'Baik', 'Kelainan Akademik', 'SMP', 'SMP'),
(39, '0 - 74', '75 - 100', 'Sangat Baik', 'Baik', 'Kurang', 'Kelainan Akademik', 'SMP', 'SLB');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `ID_jawaban` int(11) NOT NULL,
  `Nama_Siswa_Klasifikasi` varchar(100) NOT NULL,
  `Jawaban(IQ)` varchar(50) NOT NULL,
  `Jawaban(Nilai_PAI)` varchar(50) NOT NULL,
  `Jawaban(Rata_rata_Nilai_US)` varchar(50) NOT NULL,
  `Jawaban(Keaktifan)` varchar(15) NOT NULL,
  `Jawaban(Kedisiplinan)` varchar(15) NOT NULL,
  `Jawaban(Kerja_Sama)` varchar(15) NOT NULL,
  `Jawaban(Ketunaan)` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`ID_jawaban`, `Nama_Siswa_Klasifikasi`, `Jawaban(IQ)`, `Jawaban(Nilai_PAI)`, `Jawaban(Rata_rata_Nilai_US)`, `Jawaban(Keaktifan)`, `Jawaban(Kedisiplinan)`, `Jawaban(Kerja_Sama)`, `Jawaban(Ketunaan)`) VALUES
(1, 'Jumadi', '76', '71-75', '81-85', 'Kurang', 'Sangat Baik', 'Sangat Baik', 'Kelainan Fisik'),
(2, 'Surya', '88', '91-95', '86-90', 'Baik', 'Sangat Baik', 'Kurang', 'Kelainan Akademik'),
(3, 'Rizal', '95', '71-75', '71-75', 'Sangat Baik', 'Sangat Baik', 'Baik', 'Kelainan Emosional'),
(4, 'Rizal123', '70', '71-75', '71-75', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(5, 'Alya', '71', '91-95', '76-80', 'Kurang', 'Baik', 'Baik', 'Kelainan Akademik'),
(6, 'cobarule', '86', '76-80', '71-75', 'Kurang', 'Baik', 'Sangat Baik', 'Kelainan Akademik'),
(7, 'cobarule1', '75', '76-80', '71-75', 'Kurang', 'Baik', 'Baik', 'Kelainan Akademik'),
(8, 'cobarule2', '56', '76-80', '71-75', 'Baik', 'Kurang', 'Baik', 'Kelainan Emosional'),
(9, 'cobarule3', '50', '76-80', '76-80', 'Baik', 'Kurang', 'Baik', 'Kelainan Akademik'),
(10, 'cobarule4', '72', '76-80', '81-85', 'Kurang', 'Kurang', 'Baik', 'Kelainan Akademik'),
(13, 'Rizal123', '77', '76-80', '76-80', 'Sangat Baik', 'Baik', 'Baik', 'Kelainan Fisik'),
(14, 'rizal5', '65', '76-80', '86-90', 'Kurang', 'Kurang', 'Kurang', 'Kelainan Emosional'),
(15, 'Rizal5', '65', '76-80', '71-75', 'Kurang', 'Kurang', 'Kurang', 'Kelainan Emosional'),
(16, 'coba2', '60', '71-75', '71-75', 'Kurang', 'Kurang', 'Baik', 'Kelainan Emosional'),
(17, 'coba2', '60', '71-75', '71-75', 'Kurang', 'Kurang', 'Kurang', 'Kelainan Emosional'),
(18, 'cobabershasil', '69', '', '71-75', 'Baik', 'Kurang', 'Kurang', 'Kelainan Emosional'),
(19, 'cobarule123', '70', '', '71-75', 'Sangat Baik', 'Sangat Baik', 'Kurang', 'Kelainan Akademik'),
(20, 'paijo551', '56', '', '71-75', 'Baik', 'Kurang', 'Kurang', 'Kelainan Emosional'),
(21, 'toba', '77', '', '76-80', 'Baik', 'Kurang', 'Baik', 'Kelainan Fisik'),
(22, 'toba1', '55', '', '76-80', 'Baik', 'Kurang', 'Baik', 'Kelainan Fisik'),
(23, 'asdasda', '55', '', '76-80', 'Baik', 'Sangat Baik', 'Baik', 'Kelainan Fisik'),
(24, '3', 'cobacoba', '65', '75-100', 'Baik', 'Kurang', 'Kurang', 'Kelainan Akademik'),
(25, '2', 'rizal123', '65', '75-100', 'Baik', 'Baik', 'Kurang', 'Kelainan Fisik'),
(26, '2', 'rizal123', '65', '75-100', 'Baik', 'Baik', 'Kurang', 'Kelainan Fisik'),
(27, '2', 'rizal123', '65', '75-100', 'Baik', 'Kurang', 'Kurang', 'Kelainan Fisik'),
(28, '2', 'Rizal', '65', '75-100', 'Baik', 'Kurang', 'Kurang', 'Kelainan Fisik'),
(29, '1', '', '', '0-74', 'Kurang', 'Kurang', 'Kurang', 'Kelainan Fisik'),
(30, '1', '', '', '0-74', 'Kurang', 'Kurang', 'Kurang', 'Kelainan Fisik'),
(31, '1', '', '', '0-74', 'Kurang', 'Kurang', 'Kurang', 'Kelainan Fisik'),
(32, '3', 'paijo551', '65', '75-100', 'Kurang', 'Kurang', 'Kurang', 'Kelainan Akademik'),
(33, '1', 'cobacoba', '75', '0-74', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(34, '1', 'cobacoba', '75', '0-74', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(35, '1', 'cobacoba', '75', '0-74', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(36, '1', 'cobacoba', '75', '0-74', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(37, '1', 'cobacoba', '75', '0-74', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(38, '1', 'cobacoba', '75', '0-74', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(39, '1', 'cobacoba', '75', '0-74', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(40, '1', 'cobacoba', '75', '0-74', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(41, '1', 'cobacoba', '75', '0-74', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(42, '1', 'cobacoba', '75', '0-74', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(43, '1', 'cobacoba', '75', '0-74', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(44, '1', 'cobacoba', '75', '0-74', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(45, '1', 'cobacoba', '75', '0-74', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(46, '1', 'cobacoba', '75', '0-74', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(47, '1', 'cobacoba', '75', '0-74', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(48, '1', 'cobacoba', '75', '0-74', 'Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(49, '1', 'cobacoba124214', '90', '75-100', 'Kurang', 'Baik', 'Sangat Baik', 'Kelainan Akademik'),
(50, '1', 'cobacoba124214', '90', '75-100', 'Kurang', 'Baik', 'Sangat Baik', 'Kelainan Akademik'),
(51, '1', 'cobacoba124214', '90', '75-100', 'Kurang', 'Baik', 'Sangat Baik', 'Kelainan Akademik'),
(52, '1', 'cobacoba124214', '90', '75-100', 'Kurang', 'Baik', 'Sangat Baik', 'Kelainan Akademik'),
(53, '1', 'cobacoba124214', '90', '75-100', 'Kurang', 'Baik', 'Sangat Baik', 'Kelainan Akademik'),
(54, '1', 'Adiel Adinata', '76', '75-100', 'Baik', 'Kurang', 'Sangat Baik', 'Kelainan Fisik'),
(55, '1', 'Adiel Adinata', '76', '75-100', 'Kurang', 'Kurang', 'Kurang', 'Kelainan Fisik'),
(56, '12', 'Rahmat Wahyudi', '65', '0-74', 'Kurang', 'Kurang', 'Kurang', 'Kelainan Fisik'),
(57, '13', 'Muhammad Ichsan', '65', '75-100', 'Baik', 'Baik', 'Kurang', 'Kelainan Akademik'),
(58, '1', 'Adiel Adinata', '65', '0-74', 'Sangat Baik', 'Baik', 'Kurang', 'Kelainan Emosional'),
(59, '1', 'M. Riandi Nur Ramadhan', '55', '0-74', 'Kurang', 'Kurang', 'Kurang', 'Kelainan Fisik'),
(60, '4', 'M. Riandi Nur Ramadhan', '65', '0-74', 'Kurang', 'Kurang', 'Kurang', 'Kelainan Fisik'),
(61, '1', 'Adiel Adinata', '0 - 74', '0 - 74', 'Baik', 'Kurang', 'Baik', 'Kelainan Emosional'),
(62, '1', 'Adiel Adinata', '74 - 110', '0 - 74', 'Baik', 'Baik', 'Kurang', 'Kelainan Akademik'),
(63, '1', 'Adiel Adinata', '74 - 110', '0 - 74', 'Baik', 'Baik', 'Kurang', 'Kelainan Akademik'),
(64, '1', 'Adiel Adinata', '74 - 110', '0 - 74', 'Baik', 'Baik', 'Kurang', 'Kelainan Akademik'),
(65, '1', 'Adiel Adinata', '74 - 110', '0 - 74', 'Baik', 'Baik', 'Kurang', 'Kelainan Akademik'),
(66, '1', 'Adiel Adinata', '74 - 110', '0 - 74', 'Baik', 'Baik', 'Kurang', 'Kelainan Akademik'),
(67, '1', 'Adiel Adinata', '74 - 110', '0 - 74', 'Baik', 'Baik', 'Kurang', 'Kelainan Akademik'),
(68, '1', 'Adiel Adinata', '74 - 110', '0 - 74', 'Baik', 'Baik', 'Kurang', 'Kelainan Akademik'),
(69, '1', 'Adiel Adinata', '0 - 74', '0 - 74', 'Baik', 'Kurang', 'Sangat Baik', 'Kelainan Emosional'),
(70, '1', 'Adiel Adinata', '0 - 74', '0 - 74', 'Baik', 'Baik', 'Sangat Baik', 'Kelainan Fisik'),
(71, '1', 'Adiel Adinata', '0 - 74', '0 - 74', 'Baik', 'Baik', 'Sangat Baik', 'Kelainan Fisik'),
(72, '1', 'Adiel Adinata', '0 - 74', '0 - 74', 'Baik', 'Baik', 'Sangat Baik', 'Kelainan Fisik'),
(73, '1', 'Adiel Adinata', '0 - 74', '0 - 74', 'Baik', 'Baik', 'Kurang', 'Kelainan Akademik'),
(74, '1', 'Adiel Adinata', '74 - 110', '74 - 100', 'Kurang', 'Baik', 'Kurang', 'Kelainan Fisik'),
(75, '1', 'Adiel Adinata', '0 - 74', '0 - 74', 'Baik', 'Sangat Kurang', 'Baik', 'Kelainan Akademik'),
(76, '1', 'Adiel Adinata', '0 - 74', '0 - 74', 'Kurang', 'Baik', 'Baik', 'Kelainan Fisik'),
(77, '1', 'Adiel Adinata', '75 - 110', '75 - 100', 'Baik', 'Kurang', 'Sangat Baik', 'Kelainan Fisik'),
(78, '1', 'Adiel Adinata', '0 - 74', '0 - 74', 'Kurang', 'Kurang', 'Kurang', 'Kelainan Akademik'),
(79, '1', 'Adiel Adinata', '0 - 74', '0 - 74', 'Kurang', 'Kurang', 'Kurang', 'Kelainan Akademik'),
(80, '1', 'Adiel Adinata', '0 - 74', '0 - 74', 'Kurang', 'Kurang', 'Kurang', 'Kelainan Akademik'),
(81, '1', 'Adiel Adinata', '75 - 110', '0 - 74', 'Kurang', 'Baik', 'Baik', 'Kelainan Fisik');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `ID_klasifikasi` int(11) NOT NULL,
  `Nama_Siswa_HasilKlasifikasi` varchar(50) NOT NULL,
  `Hasil_Klasifikasi` varchar(15) NOT NULL,
  `Keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`ID_klasifikasi`, `Nama_Siswa_HasilKlasifikasi`, `Hasil_Klasifikasi`, `Keterangan`) VALUES
(1, 'Adiel Adinata', 'SMP', 'Sudah'),
(2, 'Kahardian R.N', 'SMP', 'Sudah'),
(3, 'Djaya Prabandaru', 'SLB', 'Sudah'),
(4, 'Ilham Arif R', 'SLB', 'Sudah'),
(6, 'Amanda Devana A', 'SMP', 'Sudah'),
(7, 'Simon Felix', 'SLB', 'Sudah'),
(8, 'Tasya Aulia', '', ''),
(9, 'Dian Wahyuni', 'SLB', 'Sudah'),
(10, 'Fauzi Nur Rizky', 'SLB', 'Sudah'),
(12, 'Rahmat Wahyudi', '', ''),
(13, 'Muhammad  Ichsan', '', ''),
(14, 'Salman Rahmatulloh', '', ''),
(15, 'Zayyan Alvina Brillian Elvareta', '', ''),
(16, 'Maulana Rizqi A Alfaridzi', 'SMP', 'Sudah'),
(17, 'Wirgi Pradana', 'SLB', 'Sudah'),
(18, 'Mochamad Lutfi Romadhoni', '', ''),
(19, 'Farhan Kamal Taufiqi', '', ''),
(20, 'M.Riandi Nur Ramadhan', 'SLB', 'Sudah'),
(21, 'Widiati Sakinah', '', ''),
(22, 'Novelia Anisah Rahayu', '', ''),
(23, 'Aditya Reza Prasetya', '', ''),
(24, 'Ahmad Rafli', '', ''),
(25, 'Fardan Al-Faruq', '', ''),
(27, 'Rayyan Mahendra Permana Putra', '', ''),
(28, 'Galih Silawarti Ningrum', '', ''),
(29, 'Arief Rachman Hakim', '', ''),
(30, 'Fadia Khairunnisa', '', ''),
(31, 'Ferdi Andriansyah', '', ''),
(32, 'Mochammad Fatih Istiandanu', '', ''),
(33, 'Nailul Mari Birdy', '', ''),
(34, 'Vivi Abbya Ismail', '', ''),
(35, 'Fairuz Hafaffa', '', ''),
(37, 'Hisyam Senoaji Hidayat', '', ''),
(38, 'Yasmin Al Qonita', '', ''),
(39, 'Kazu Evani Hinide Siswoyo', '', ''),
(40, 'Adhim Pra Mestiana', '', ''),
(41, 'Putri Noviani', '', ''),
(42, 'Revan Pasha Firmansyah', '', ''),
(44, 'Revalino Ramadhan Putra', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `ID_Pengguna` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor` int(16) NOT NULL,
  `jabatan` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`ID_Pengguna`, `nama`, `nomor`, `jabatan`) VALUES
(1, 'Adiel Adinata', 38693355, 'siswa'),
(2, 'Kahardian R.N', 38698231, 'siswa'),
(3, 'Djaya Prabandaru', 45770996, 'siswa'),
(4, 'Ilham Arif R', 38397363, 'siswa'),
(6, 'Amanda Devana A', 20929615, 'siswa'),
(7, 'Simon Felix', 39291612, 'siswa'),
(8, 'Tasya Aulia', 33425092, 'siswa'),
(9, 'Dian Wahyuni', 28956963, 'siswa'),
(10, 'Fauzi Nur Rizky', 38697776, 'siswa'),
(12, 'Rahmat Wahyudi', 20940522, 'siswa'),
(13, 'Muhammad  Ichsan', 46316435, 'siswa'),
(14, 'Salman Rahmatulloh', 57687699, 'siswa'),
(15, 'Zayyan Alvina Brillian Elvareta', 58728977, 'siswa'),
(16, 'Maulana Rizqi A Alfaridzi', 54487450, 'siswa'),
(17, 'Wirgi Pradana', 69909556, 'siswa'),
(18, 'Mochamad Lutfi Romadhoni', 20988131, 'siswa'),
(19, 'Farhan Kamal Taufiqi', 47571076, 'siswa'),
(20, 'M.Riandi Nur Ramadhan', 62667667, 'siswa'),
(21, 'Widiati Sakinah', 68357085, 'siswa'),
(22, 'Novelia Anisah Rahayu', 57883161, 'siswa'),
(23, 'Aditya Reza Prasetya', 64531772, 'siswa'),
(24, 'Ahmad Rafli', 72061360, 'siswa'),
(25, 'Fardan Al-Faruq', 76023114, 'siswa'),
(27, 'Rayyan Mahendra Permana Putra', 81901623, 'siswa'),
(28, 'Galih Silawarti Ningrum', 85572636, 'siswa'),
(29, 'Arief Rachman Hakim', 77076455, 'siswa'),
(30, 'Fadia Khairunnisa', 76235994, 'siswa'),
(31, 'Ferdi Andriansyah', 74742399, 'siswa'),
(32, 'Mochammad Fatih Istiandanu', 73512573, 'siswa'),
(33, 'Nailul Mari Birdy', 61979782, 'siswa'),
(34, 'Vivi Abbya Ismail', 75330259, 'siswa'),
(35, 'Fairuz Hafaffa', 82499310, 'siswa'),
(37, 'Hisyam Senoaji Hidayat', 73668629, 'siswa'),
(38, 'Yasmin Al Qonita', 76399292, 'siswa'),
(39, 'Kazu Evani Hinide Siswoyo', 88989439, 'siswa'),
(40, 'Adhim Pra Mestiana', 89518188, 'siswa'),
(41, 'Putri Noviani', 85545331, 'siswa'),
(42, 'Revan Pasha Firmansyah', 88023944, 'siswa'),
(44, 'Revalino Ramadhan Putra', 88400159, 'siswa'),
(45, 'admin', 12345, 'admin'),
(48, 'Rizalcoba', 12312312, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan`
--

CREATE TABLE `perhitungan` (
  `ID_Perhitungan` int(11) NOT NULL,
  `Atribut` varchar(50) NOT NULL,
  `Nilai_Gain` double NOT NULL,
  `Entropy1` double NOT NULL,
  `Entropy2` double NOT NULL,
  `Entropy3` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perhitungan`
--

INSERT INTO `perhitungan` (`ID_Perhitungan`, `Atribut`, `Nilai_Gain`, `Entropy1`, `Entropy2`, `Entropy3`) VALUES
(1, 'IQ', 0.459, 0.811, 0, 0),
(2, 'Rata_rata_Nilai_US', 0.459, 0.811, 0, 0),
(3, 'Kerja_Sama', 1, 0, 0, 0),
(4, 'Ketunaan', 0.191, 0.971, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rasio_gain`
--

CREATE TABLE `rasio_gain` (
  `ID_Rasio` int(11) NOT NULL,
  `opsi` varchar(50) NOT NULL,
  `cabang1` varchar(100) NOT NULL,
  `cabang2` varchar(100) NOT NULL,
  `rasio_gain` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rasio_gain`
--

INSERT INTO `rasio_gain` (`ID_Rasio`, `opsi`, `cabang1`, `cabang2`, `rasio_gain`) VALUES
(1, 'opsi1', 'Kurang', 'Baik , Sangat Baik', 0.387),
(2, 'opsi2', 'Baik', 'Sangat Baik , Kurang', 0.387),
(3, 'opsi3', 'Sangat Baik', 'Kurang , Baik', 0.521);

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `ID_Rule` int(11) NOT NULL,
  `Parent` varchar(1000) NOT NULL,
  `Akar` varchar(250) NOT NULL,
  `Aturan` varchar(1000) NOT NULL,
  `Keputusan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`ID_Rule`, `Parent`, `Akar`, `Aturan`, `Keputusan`) VALUES
(1, '(Kedisiplinan=\'Baik\')', '(Kerja_Sama=\'Baik\')', '(Kedisiplinan=\'Baik\') AND (Kerja_Sama=\'Baik\')', 'SMP'),
(2, '(Kedisiplinan=\'Baik\') AND (Kerja_Sama=\'Kurang\')', '(IQ=\'75 - 110\')', '(Kedisiplinan=\'Baik\') AND (Kerja_Sama=\'Kurang\') AND (IQ=\'75 - 110\')', 'SMP'),
(3, '(Kedisiplinan=\'Baik\') AND (Kerja_Sama=\'Kurang\')', '(IQ=\'0 - 74\')', '(Kedisiplinan=\'Baik\') AND (Kerja_Sama=\'Kurang\') AND (IQ=\'0 - 74\')', 'SLB'),
(5, '(Kedisiplinan=\'Baik\')', '(Kerja_Sama=\'Sangat Baik\')', '(Kedisiplinan=\'Baik\') AND (Kerja_Sama=\'Sangat Baik\')', 'SMP'),
(6, '', '(Kedisiplinan=\'Sangat Baik\')', ' AND (Kedisiplinan=\'Sangat Baik\')', 'SMP'),
(7, '(Kedisiplinan=\'Kurang\') AND (Keaktifan=\'Baik\')', '(Kerja_Sama=\'Kurang\')', '(Kedisiplinan=\'Kurang\') AND (Keaktifan=\'Baik\') AND (Kerja_Sama=\'Kurang\')', 'SLB'),
(8, '(Kedisiplinan=\'Kurang\') AND (Keaktifan=\'Baik\')', '(Kerja_Sama=\'Sangat Baik\')', '(Kedisiplinan=\'Kurang\') AND (Keaktifan=\'Baik\') AND (Kerja_Sama=\'Sangat Baik\')', 'SMP'),
(9, '(Kedisiplinan=\'Kurang\') AND (Keaktifan=\'Baik\')', '(Kerja_Sama=\'Baik\')', '(Kedisiplinan=\'Kurang\') AND (Keaktifan=\'Baik\') AND (Kerja_Sama=\'Baik\')', 'SMP'),
(10, '(Kedisiplinan=\'Kurang\')', '(Keaktifan=\'Kurang\')', '(Kedisiplinan=\'Kurang\') AND (Keaktifan=\'Kurang\')', 'SLB'),
(11, '(Kedisiplinan=\'Kurang\')', '(Keaktifan=\'Sangat Baik\')', '(Kedisiplinan=\'Kurang\') AND (Keaktifan=\'Sangat Baik\')', 'SMP');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `ID_Siswa` int(11) NOT NULL,
  `ID_Pengguna` int(11) NOT NULL,
  `Nama_Siswa` varchar(100) NOT NULL,
  `NISN` char(10) NOT NULL,
  `Jenis_Kelamin` char(1) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Tgl_Lahir` date NOT NULL,
  `Nama_Orang_Tua` varchar(100) NOT NULL,
  `Kondisi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`ID_Siswa`, `ID_Pengguna`, `Nama_Siswa`, `NISN`, `Jenis_Kelamin`, `Alamat`, `Tgl_Lahir`, `Nama_Orang_Tua`, `Kondisi`) VALUES
(1, 1, 'Adiel Adinata', '0038693355', 'L', 'Dukuh Setro Utara VIII/93', '2003-04-17', 'Jahannes Santoso', 'Lulus'),
(2, 2, 'Kahardian R.N', '0038698231', 'L', 'Baskara III/33', '2003-11-07', 'Oscar Legimin Naiggolan,SH', 'Lulus'),
(3, 3, 'Djaya Prabandaru', '0045770996', 'L', 'Sukolilo II/28', '2003-03-11', 'Dwidjo Fatchurrachman', 'Lulus'),
(4, 4, 'Ilham Arif R', '0038397363', 'L', 'Simokerto Tebasan 9', '2003-11-07', 'Suhirno', 'Lulus'),
(6, 6, 'Amanda Devana A', '0020929615', 'P', 'Lebak Jaya II A/17 C', '2003-05-12', 'Wahyu Tri Hidayat', 'Lulus'),
(7, 7, 'Simon Felix', '0039291612', 'L', 'Setro Baru Utara IX /57', '2003-03-01', 'Alfon Aron A', 'Lulus'),
(8, 8, 'Tasya Aulia', '0033425092', 'P', 'Setro II/26', '2003-11-14', 'Ahmad Syaiful Bahri', 'Lulus'),
(9, 9, 'Dian Wahyuni', '0028956963', 'P', 'Nambangan IV/45', '2002-12-08', 'Adam Huri', 'Lulus'),
(10, 10, 'Fauzi Nur Rizky', '0038697776', 'L', 'Lebak Timur XI/7', '2003-12-13', 'Nur Salam (alm)', 'Lulus'),
(12, 12, 'Rahmat Wahyudi', '0020940522', 'L', 'Lebo Agung II/72', '2002-11-12', 'Agus Mulyani', 'Lulus'),
(13, 13, 'Muhammad  Ichsan', '0046316435', 'L', 'Lebak Indah Utara 61', '2004-12-20', 'Miardhi Setjowijono', 'Lulus'),
(14, 14, 'Salman Rahmatulloh', '0057687699', 'L', 'Bogorami Timur 3/34', '2005-09-22', 'Choirul Saifullah', 'Lulus'),
(15, 15, 'Zayyan Alvina Brillian Elvareta', '0058728977', 'P', 'Lebak Jaya Utara VA Rawasan 14', '2005-03-24', 'Fauzi', 'Lulus'),
(16, 16, 'Maulana Rizqi A Alfaridzi', '0054487450', 'L', 'Sukolilo Lor 3/5', '2005-03-24', 'Efi Susiana', 'Lulus'),
(17, 17, 'Wirgi Pradana', '0069909556', 'L', 'Lebo Agung I/29', '2006-07-14', 'Mugiono', 'Lulus'),
(18, 18, 'Mochamad Lutfi Romadhoni', '0020988131', 'L', 'Bulak Rukem Timur 2-C/8', '2002-11-05', 'Soemari', 'Lulus'),
(19, 19, 'Farhan Kamal Taufiqi', '0047571076', 'L', 'Lebo Agung 6/12', '2004-08-06', 'Achmadi', 'Lulus'),
(20, 20, 'M.Riandi Nur Ramadhan', '0062667667', 'L', 'Hery Kasiyanto 24', '2006-10-27', 'Pujianto', 'Lulus'),
(21, 21, 'Widiati Sakinah', '0068357085', 'P', 'Kedinding Lor Kemuning 56', '2006-04-22', 'Nawang Eko Sasono', 'Lulus'),
(22, 22, 'Novelia Anisah Rahayu', '0057883161', 'P', 'Bulak Kenjeran 3/4d', '2005-11-15', 'Asarik', 'Lulus'),
(23, 23, 'Aditya Reza Prasetya', '0064531772', 'L', 'Bulak Cupat Barat 5/31', '2006-06-23', 'Hendra Priyanto', 'Lulus'),
(24, 24, 'Ahmad Rafli', '0072061360', 'L', 'Lebak Timur 3a/10', '2007-08-02', 'Patoyo', 'Lulus'),
(25, 25, 'Fardan Al-Faruq', '0076023114', 'L', 'Sukolilo Kenjeran V / 7', '2007-08-14', 'Syahrul Wahyudi', 'Lulus'),
(27, 27, 'Rayyan Mahendra Permana Putra', '0081901623', 'L', 'Lebak Timur 4/6', '2008-05-17', 'Febrian Nura Putra', 'Lulus'),
(28, 28, 'Galih Silawarti Ningrum', '0085572636', 'P', 'Lebak Jaya 2-B/1', '2008-05-23', 'Suratno Hadi,ST', 'Lulus'),
(29, 29, 'Arief Rachman Hakim', '0077076455', 'L', 'Bulak Cupat Timur No 25', '2007-03-27', 'Agus Marjono', 'Lulus'),
(30, 30, 'Fadia Khairunnisa', '0076235994', 'P', 'Setro Baru Utara I/155', '2007-06-12', 'Zainudin', 'Lulus'),
(31, 31, 'Ferdi Andriansyah', '0074742399', 'L', 'Bulak Kenjeran 3/4b', '2007-01-07', 'Sugiono', 'Lulus'),
(32, 32, 'Mochammad Fatih Istiandanu', '0073512573', 'L', 'Setroi I/4-a', '2008-02-21', 'Arief Suwandi', 'Lulus'),
(33, 33, 'Nailul Mari Birdy', '0061979782', 'P', 'Setro Baru 6/50-A', '2006-12-30', 'Dwi Subagyo', 'Lulus'),
(34, 34, 'Vivi Abbya Ismail', '0075330259', 'P', 'Bulak Rukem Timur 1/24', '2007-07-17', 'Piter Rizald Ismail', 'Lulus'),
(35, 35, 'Fairuz Hafaffa', '0082499310', 'P', 'Bogorami Timur 3/34', '2008-02-17', 'Choirul Saifullah', 'Lulus'),
(37, 37, 'Hisyam Senoaji Hidayat', '0073668629', 'L', 'Tambak Deres III/8', '2007-10-14', 'Agus Andriyanto', 'Lulus'),
(38, 38, 'Yasmin Al Qonita', '0076399292', 'P', 'Bulak Kali Tinjang Baru 25/9B', '2007-11-29', 'Rubianto', 'Lulus'),
(39, 39, 'Kazu Evani Hinide Siswoyo', '0088989439', 'P', 'Sidomulyp II A/12', '2008-02-29', 'Novan Hendro Siswojo', 'Lulus'),
(40, 40, 'Adhim Pra Mestiana', '0089518188', 'L', 'Lebak Jaya Tengah 3/4', '2008-05-16', 'Dwi Prasetya', 'Lulus'),
(41, 41, 'Putri Noviani', '0085545331', 'P', 'Babatan Labansari 15', '2008-11-24', 'Ramelan', 'Lulus'),
(42, 42, 'Revan Pasha Firmansyah', '0088023944', 'L', 'Setro Baru 3/37', '2008-03-08', 'Supalal', 'Lulus'),
(44, 44, 'Revalino Ramadhan Putra', '0088400159', 'L', 'Jl. Kyai Tambak Deres No.72', '2008-09-22', 'Achmad Anwar', 'Lulus');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `ID_Training` int(11) NOT NULL,
  `IQ` varchar(50) NOT NULL,
  `Nama_Siswa` varchar(250) NOT NULL,
  `Rata_rata_Nilai_US` varchar(50) NOT NULL,
  `Keaktifan` varchar(15) NOT NULL,
  `Kedisiplinan` varchar(15) NOT NULL,
  `Kerja_Sama` varchar(15) NOT NULL,
  `Ketunaan` varchar(100) NOT NULL,
  `Jenis_Sekolah` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`ID_Training`, `IQ`, `Nama_Siswa`, `Rata_rata_Nilai_US`, `Keaktifan`, `Kedisiplinan`, `Kerja_Sama`, `Ketunaan`, `Jenis_Sekolah`) VALUES
(1, '0 - 74', 'Dummy', '0 - 74', 'Baik', 'Baik', 'Baik', 'Kelainan Emosional', 'SMP'),
(2, '75 - 110', 'Dummy', '75 - 100', 'Sangat Baik', 'Baik', 'Kurang', 'Kelainan Akademik', 'SMP'),
(3, '0 - 74', 'Dummy', '0 - 74', 'Kurang', 'Sangat Baik', 'Kurang', 'Kelainan Akademik', 'SMP'),
(4, '75 - 110', 'Dummy', '0 - 74', 'Baik', 'Baik', 'Sangat Baik', 'Kelainan Akademik', 'SMP'),
(5, '0 - 74', 'Dummy', '0 - 74', 'Sangat Baik', 'Sangat Baik', 'Kurang', 'Kelainan Akademik', 'SMP'),
(6, '0 - 74', 'Dummy', '75 - 100', 'Baik', 'Sangat Baik', 'Sangat Baik', 'Kelainan Akademik', 'SMP'),
(7, '75 - 110', 'Dummy', '0 - 74', 'Kurang', 'Baik', 'Baik', 'Kelainan Akademik', 'SMP'),
(8, '0 - 74', 'Dummy', '75 - 100', 'Kurang', 'Baik', 'Baik', 'Kelainan Emosional', 'SMP'),
(9, '0 - 74', 'Dummy', '0 - 74', 'Baik', 'Kurang', 'Kurang', 'Kelainan Emosional', 'SLB'),
(10, '0 - 74', 'Dummy', '75 - 100', 'Baik', 'Baik', 'Sangat Baik', 'Kelainan Emosional', 'SMP'),
(11, '0 - 74', 'Dummy', '75 - 100', 'Kurang', 'Sangat Baik', 'Baik', 'Kelainan Emosional', 'SMP'),
(12, '0 - 74', 'Dummy', '75 - 100', 'Baik', 'Baik', 'Sangat Baik', 'Kelainan Emosional', 'SMP'),
(13, '0 - 74', 'Dummy', '75 - 100', 'Kurang', 'Kurang', 'Baik', 'Kelainan Akademik', 'SLB'),
(14, '0 - 74', 'Dummy', '75 - 100', 'Baik', 'Baik', 'Baik', 'Kelainan Emosional', 'SMP'),
(15, '75 - 110', 'Dummy', '75 - 100', 'Sangat Baik', 'Sangat Baik', 'Baik', 'Kelainan Akademik', 'SMP'),
(16, '0 - 74', 'Dummy', '0 - 74', 'Kurang', 'Kurang', 'Kurang', 'Kelainan Emosional', 'SLB'),
(17, '0 - 74', 'Dummy', '75 - 100', 'Sangat Baik', 'Kurang', 'Kurang', 'Kelainan Akademik', 'SMP'),
(18, '0 - 74', 'Dummy', '0 - 74', 'Baik', 'Kurang', 'Kurang', 'Kelainan Emosional', 'SLB'),
(19, '0 - 74', 'Dummy', '0 - 74', 'Baik', 'Kurang', 'Kurang', 'Kelainan Emosional', 'SLB'),
(20, '75 - 110', 'Dummy', '0 - 74', 'Baik', 'Kurang', 'Sangat Baik', 'Kelainan Akademik', 'SMP'),
(21, '75 - 110', 'Dummy', '0 - 74', 'Kurang', 'Baik', 'Baik', 'Kelainan Akademik', 'SMP'),
(22, '75 - 110', 'Dummy', '75 - 100', 'Baik', 'Baik', 'Baik', 'Kelainan Akademik', 'SMP'),
(23, '0 - 74', 'Dummy', '75 - 100', 'Kurang', 'Kurang', 'Baik', 'Kelainan Emosional', 'SLB'),
(24, '75 - 110', 'Dummy', '75 - 100', 'Kurang', 'Sangat Baik', 'Baik', 'Kelainan Akademik', 'SMP'),
(25, '75 - 110', 'Dummy', '75 - 100', 'Baik', 'Kurang', 'Baik', 'Kelainan Emosional', 'SMP'),
(26, '0 - 74', 'Dummy', '75 - 100', 'Baik', 'Kurang', 'Sangat Baik', 'Kelainan Emosional', 'SMP'),
(27, '0 - 74', 'Dummy', '75 - 100', 'Kurang', 'Kurang', 'Baik', 'Kelainan Akademik', 'SLB'),
(28, '0 - 74', 'Dummy', '75 - 100', 'Kurang', 'Baik', 'Kurang', 'Kelainan Akademik', 'SLB'),
(29, '0 - 74', 'Dummy', '75 - 100', 'Sangat Baik', 'Baik', 'Sangat Baik', 'Kelainan Emosional', 'SMP'),
(81, '0 - 74', 'Rizal Prabaswara', '0 - 74', 'Kurang', 'Kurang', 'Kurang', 'Kelainan Fisik', 'SLB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datauji`
--
ALTER TABLE `datauji`
  ADD PRIMARY KEY (`ID_Uji`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`ID_jawaban`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`ID_klasifikasi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID_Pengguna`);

--
-- Indexes for table `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD PRIMARY KEY (`ID_Perhitungan`);

--
-- Indexes for table `rasio_gain`
--
ALTER TABLE `rasio_gain`
  ADD PRIMARY KEY (`ID_Rasio`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`ID_Rule`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`ID_Siswa`),
  ADD KEY `ID_Pengguna` (`ID_Pengguna`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`ID_Training`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datauji`
--
ALTER TABLE `datauji`
  MODIFY `ID_Uji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `ID_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `ID_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `ID_Pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `perhitungan`
--
ALTER TABLE `perhitungan`
  MODIFY `ID_Perhitungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rasio_gain`
--
ALTER TABLE `rasio_gain`
  MODIFY `ID_Rasio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `ID_Rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `ID_Siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `ID_Training` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2022 at 10:23 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikrepsi893`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru893`
--

CREATE TABLE `tb_guru893` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `nama_lengkap` varchar(60) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru893`
--

INSERT INTO `tb_guru893` (`id_guru`, `nip`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `id_user`) VALUES
(1, '52353231245', 'Bayu', 'Banjarmasin', '1992-05-10', 'Sultan Adam', '082746125412', 3),
(2, '66666666', 'Bagas', 'Banjarbaru', '2022-05-11', 'Banjarmasin', '082746125412', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas893`
--

CREATE TABLE `tb_kelas893` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas893`
--

INSERT INTO `tb_kelas893` (`id_kelas`, `nama_kelas`) VALUES
(1, 'IPS 2'),
(2, 'IPA 1'),
(4, '6P');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggaran893`
--

CREATE TABLE `tb_pelanggaran893` (
  `no` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_poin` int(11) NOT NULL,
  `status` enum('Diajukan','Disetujui','Dibatalkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggaran893`
--

INSERT INTO `tb_pelanggaran893` (`no`, `tanggal`, `id_siswa`, `id_guru`, `id_poin`, `status`) VALUES
(1, '2022-05-12', 1, 1, 3, 'Disetujui'),
(2, '2022-05-19', 2, 1, 4, 'Dibatalkan'),
(3, '2022-05-27', 1, 2, 4, 'Dibatalkan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_poin893`
--

CREATE TABLE `tb_poin893` (
  `id_poin` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_poin893`
--

INSERT INTO `tb_poin893` (`id_poin`, `deskripsi`, `poin`) VALUES
(3, 'test 2', 10),
(4, 'test 3', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa893`
--

CREATE TABLE `tb_siswa893` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa893`
--

INSERT INTO `tb_siswa893` (`id_siswa`, `nis`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `jk`, `id_kelas`, `id_user`) VALUES
(1, '11111', 'Akbar', 'Banjarmasin', '2000-05-11', 'Sultan Adam', 'L', 1, 1),
(2, '56789', 'Abdul', 'Banjarbaru', '2000-05-24', 'Viale della Moschea, 85, 00197 Roma RM, Italy', 'L', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user893`
--

CREATE TABLE `tb_user893` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(80) NOT NULL,
  `status` enum('admin','kesiswaan','guru','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user893`
--

INSERT INTO `tb_user893` (`id_user`, `username`, `password`, `status`) VALUES
(1, '11111', 'bcd724d15cde8c47650fda962968f102', 'siswa'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, '52353231245', '77e69c137812518e359196bb2f5e9bb9', 'kesiswaan'),
(4, '56789', 'bcd724d15cde8c47650fda962968f102', 'siswa'),
(5, '66666666', '77e69c137812518e359196bb2f5e9bb9', 'guru');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_kelas`
-- (See below for the actual view)
--
CREATE TABLE `view_kelas` (
`id_kelas` int(11)
,`nama_kelas` varchar(15)
,`jumlah` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pelanggaran`
-- (See below for the actual view)
--
CREATE TABLE `view_pelanggaran` (
`no` int(11)
,`tanggal` date
,`id_siswa` int(11)
,`nis` varchar(6)
,`nama_siswa` varchar(50)
,`nama_kelas` varchar(15)
,`nama_lengkap` varchar(60)
,`deskripsi` text
,`poin` int(11)
,`status` enum('Diajukan','Disetujui','Dibatalkan')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_siswa`
-- (See below for the actual view)
--
CREATE TABLE `view_siswa` (
`id_siswa` int(11)
,`nis` varchar(6)
,`nama_siswa` varchar(50)
,`tempat_lahir` varchar(50)
,`tanggal_lahir` date
,`alamat` varchar(80)
,`jk` enum('L','P')
,`id_kelas` int(11)
,`id_user` int(11)
,`kelas_id` int(11)
,`nama_kelas` varchar(15)
);

-- --------------------------------------------------------

--
-- Structure for view `view_kelas`
--
DROP TABLE IF EXISTS `view_kelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kelas`  AS SELECT `tb_kelas893`.`id_kelas` AS `id_kelas`, `tb_kelas893`.`nama_kelas` AS `nama_kelas`, (select count(0) from `tb_siswa893` where (`tb_kelas893`.`id_kelas` = `tb_siswa893`.`id_kelas`)) AS `jumlah` FROM `tb_kelas893``tb_kelas893`  ;

-- --------------------------------------------------------

--
-- Structure for view `view_pelanggaran`
--
DROP TABLE IF EXISTS `view_pelanggaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pelanggaran`  AS SELECT `a`.`no` AS `no`, `a`.`tanggal` AS `tanggal`, `b`.`id_siswa` AS `id_siswa`, `b`.`nis` AS `nis`, `b`.`nama_siswa` AS `nama_siswa`, `c`.`nama_kelas` AS `nama_kelas`, `d`.`nama_lengkap` AS `nama_lengkap`, `e`.`deskripsi` AS `deskripsi`, `e`.`poin` AS `poin`, `a`.`status` AS `status` FROM ((((`tb_pelanggaran893` `a` join `tb_siswa893` `b`) join `tb_kelas893` `c`) join `tb_guru893` `d`) join `tb_poin893` `e`) WHERE ((`a`.`id_siswa` = `b`.`id_siswa`) AND (`b`.`id_kelas` = `c`.`id_kelas`) AND (`a`.`id_guru` = `d`.`id_guru`) AND (`a`.`id_poin` = `e`.`id_poin`))  ;

-- --------------------------------------------------------

--
-- Structure for view `view_siswa`
--
DROP TABLE IF EXISTS `view_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_siswa`  AS SELECT `tb_siswa893`.`id_siswa` AS `id_siswa`, `tb_siswa893`.`nis` AS `nis`, `tb_siswa893`.`nama_siswa` AS `nama_siswa`, `tb_siswa893`.`tempat_lahir` AS `tempat_lahir`, `tb_siswa893`.`tanggal_lahir` AS `tanggal_lahir`, `tb_siswa893`.`alamat` AS `alamat`, `tb_siswa893`.`jk` AS `jk`, `tb_siswa893`.`id_kelas` AS `id_kelas`, `tb_siswa893`.`id_user` AS `id_user`, `tb_kelas893`.`id_kelas` AS `kelas_id`, `tb_kelas893`.`nama_kelas` AS `nama_kelas` FROM (`tb_siswa893` join `tb_kelas893`) WHERE (`tb_siswa893`.`id_kelas` = `tb_kelas893`.`id_kelas`)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_guru893`
--
ALTER TABLE `tb_guru893`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_kelas893`
--
ALTER TABLE `tb_kelas893`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_pelanggaran893`
--
ALTER TABLE `tb_pelanggaran893`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_poin893`
--
ALTER TABLE `tb_poin893`
  ADD PRIMARY KEY (`id_poin`);

--
-- Indexes for table `tb_siswa893`
--
ALTER TABLE `tb_siswa893`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_user893`
--
ALTER TABLE `tb_user893`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_guru893`
--
ALTER TABLE `tb_guru893`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kelas893`
--
ALTER TABLE `tb_kelas893`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pelanggaran893`
--
ALTER TABLE `tb_pelanggaran893`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_poin893`
--
ALTER TABLE `tb_poin893`
  MODIFY `id_poin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_siswa893`
--
ALTER TABLE `tb_siswa893`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user893`
--
ALTER TABLE `tb_user893`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

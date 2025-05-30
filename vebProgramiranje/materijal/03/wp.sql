-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2025 at 07:39 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_bcrypt`
--

CREATE TABLE `users_bcrypt` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_bcrypt`
--

INSERT INTO `users_bcrypt` (`id`, `username`, `password`) VALUES
(1, 'john', '$2y$10$MZrl.ErpUsWHeter2h85neLboDfvGhW7Zllwp8DXr3Nk.GJ8bVkTm'),
(2, 'marc', '$2y$10$i9i2UdUknnVpueToj2HHEeiECwOwOKTH7RAH00tCYuHkYsFLI1WDG'),
(3, 'php', '$2y$10$YsZiOgzLI2230PlUUdWf9uCccwVs7XDnRsegUrNpanbBQfuJ724Ei'),
(4, 'root', '$2y$10$PobWrV0qaTot6oHEfk3e1.yVFWO/oFRyMp8TshWmCNFLCjQIopUg6'),
(6, 'admin', '$2y$10$W8LiEg9D9OMCFJSxI1GJ0u/q1Q2DGkJ6A/QeIXVQqMVKpdPwoLKF.');

-- --------------------------------------------------------

--
-- Table structure for table `users_md5`
--

CREATE TABLE `users_md5` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_md5`
--

INSERT INTO `users_md5` (`id`, `username`, `password`) VALUES
(1, 'john', '527bd5b5d689e2c32ae974c6229ff785'),
(2, 'marc', '97e1e59c0375e0f55c10d4314db20466'),
(3, 'php', 'e1bfd762321e409cee4ac0b6e841963c'),
(4, 'root', '63a9f0ea7bb98050796b649e85481845'),
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `users_md5_salt`
--

CREATE TABLE `users_md5_salt` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_md5_salt`
--

INSERT INTO `users_md5_salt` (`id`, `username`, `password`) VALUES
(1, 'john', 'bf2cc3a9b5cedf9e5293ce76cbb5a21f'),
(2, 'marc', '35312efb7174e77e87d327751d18a4a2'),
(3, 'php', '50557fe5803bf3359c6136178a7c8981'),
(4, 'root', 'fe2c55fbcb162847bbb873cb0f5aa000'),
(6, 'admin', '049b01e6bd5804a74088745378823a0a');

-- --------------------------------------------------------

--
-- Table structure for table `users_not_secure`
--

CREATE TABLE `users_not_secure` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_not_secure`
--

INSERT INTO `users_not_secure` (`id`, `username`, `password`) VALUES
(1, 'john', 'john'),
(2, 'marc', 'marc'),
(3, 'php', 'php'),
(4, 'root', 'root'),
(6, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users_sha1_salt`
--

CREATE TABLE `users_sha1_salt` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_sha1_salt`
--

INSERT INTO `users_sha1_salt` (`id`, `username`, `password`) VALUES
(1, 'john', '0b6cae5e7874747d0acb9bfc8f435c0cd6e24a16'),
(2, 'marc', '280a9cf9eeb6d79d19917b735a166d2d8e10ab8f'),
(3, 'php', '857fd27f7fa0d2302288957530545798285c5d84'),
(4, 'root', 'c9635f205f0dad1d8dda067efe93ca189eb96112'),
(6, 'admin', '3331b961f826bc412dc351ca298af5b7fe71bf89');

-- --------------------------------------------------------

--
-- Table structure for table `users_web`
--

CREATE TABLE `users_web` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `token` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `registration_expires` datetime NOT NULL,
  `active` smallint(1) NOT NULL DEFAULT 0,
  `code_password` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `new_password_expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_web`
--

INSERT INTO `users_web` (`id_user`, `username`, `firstname`, `lastname`, `password`, `email`, `token`, `registration_expires`, `active`, `code_password`, `new_password_expires`) VALUES
(1, 'john', 'John', 'Malkowich', '$2y$10$Lrtl9YZAjyjp8ptP6Jg4CeRd3PXHcBff2et007wuj7Cce97SZ0zfq', 'john@gmail.com', '', '2021-04-17 21:53:58', 1, '', '2021-04-17 21:53:58'),
(8, 'test', 'test', 'test', '$2y$10$0kx2MNaRey/8iS2qPRUnY.dlJTitdLXtybmqFxrEb/CjiUMFStlpa', 'test@gmail.com', 'GckgEaitKrtkWbidEftxFnfyQhhlHqtwVvvpWhdh', '2023-03-29 14:12:44', 0, '', '0000-00-00 00:00:00'),
(9, 't', 't', 't', '$2y$10$lgTJ3qBLCsBygvSpMkV3V.UxPXDUa60ozIL8OASPo.oHmt6T.ZHnK', 'tes@gmail.com', 'OcahumVwecjdQbqxtuNvkzwpUgtmuvMoctnfGvbp', '2023-03-29 14:14:31', 0, '', '0000-00-00 00:00:00'),
(10, 'q', 'q', 'q', '$2y$10$oXN2mB.coQXxAwzyExSQtO51obVH5g19E.gc5CUMFJkKXU2Lin0.K', 'q@a.com', 'TsakVmyqBiywLtgoWbqeMsuoXdubMnuaJppiSbds', '2023-03-29 14:17:04', 0, '', '0000-00-00 00:00:00'),
(11, 'j', 'j', 'j', '$2y$10$dVNmZ3lpFehVBq81Tu1Pb.fBZ3IDxTt9/Tv9ZCdFET5TLShnSimNG', 'j@j.com', 'CxscdmifRblporvdIoypskmxGcmmrlnhGfpasqyx', '2023-03-29 14:18:53', 0, '', '0000-00-00 00:00:00'),
(12, 'ttt', 't', 't', '$2y$10$OJf.oG3VpbZTdaqW2c6QZOw60J27Uev4bP9RAv7zsL3Qv7pGQxZ3W', 'tttttt@gmail.com', 'BcklKhmpEhqaBzajKhkwMdaoIdgvCfqrPzwtXeco', '2023-03-29 14:22:12', 0, '', '0000-00-00 00:00:00'),
(13, 'trtrt', 'trtrt', 'rtrt', '$2y$10$v6EaopSj2Vxy6tzAGLaJgO3IFmks1v9ni.GMT4t..kK3I0BKdK4WO', 'rtrtrtrtrt@gg.com', 'QfeocfRgyhtmKfxopbRbhbeyBystfyAjgxxbFilv', '2023-03-29 14:23:41', 0, '', '0000-00-00 00:00:00'),
(14, 'rtrtrt', 'rtrtrt', 'rtrtr', '$2y$10$wdJVG4LNyYfre76ohRZFVem52SuiQyVkPPqS/8lFw4wSSPguAEk4u', 'trtrtrtr@gg.com', 'MrncTfclVsefXcycNyzeXjxjJzjoBvxfFntxRroy', '2023-03-29 14:24:29', 0, '', '0000-00-00 00:00:00'),
(15, 'gbgbgb', 'gbgbg', 'bgbgbg', '$2y$10$6BubI4NyGI//YuBjQ.p8GuQwzt1MwpcAbkhnudfq42jWCib7HGgVK', 'jkjkjk@g.com', 'YxiKguIuaYtgEybSgiMlyVuaPdlMghEgrTyvKzcM', '2023-03-29 14:25:02', 0, '', '0000-00-00 00:00:00'),
(16, 'bbbb', 'bbbb', 'bbbb', '$2y$10$B5XuMZsgj9yNS460KgAaLe8MDkq4CoYT5KajNXdmL20odxopfY77O', 'ererere@gg.com', '', '0000-00-00 00:00:00', 1, '', '0000-00-00 00:00:00'),
(17, 'fdfd', 'fdfdf', 'dfdfdf', '$2y$10$cohj1q5WK.ZeIL51LpIUg.wzeKUvzZb4DjJxEIGqKuYRqbdyOYP3O', 'dfdfdf@ff.com', 'a6bd453e97f039bf5ebee69dc975b14cc1ba8b67', '2023-03-29 14:57:28', 0, '', '0000-00-00 00:00:00'),
(18, 'zzzzzzz', 'zzzz', 'zzz', '$2y$10$fR9GmCBO8RiAS0i1G4O4b.38ooEi7cYn4889OQG0iUKx1Ea44x3sK', 'zzzzz@gg.com', '', '0000-00-00 00:00:00', 1, '', '0000-00-00 00:00:00'),
(19, '', 't1', 't2', '$2y$10$J12ZLEDVUT83PJfAhU5kpuDXDMGnoQu33gwAgU/mE.4a1eFpa9TTm', 't@t.com', '', '2024-03-24 16:54:39', 0, '', '0000-00-00 00:00:00'),
(20, '', 'test1fn', 'test1ln', '', 't1@tt.com', '', '2024-01-01 10:00:00', 1, '', '0000-00-00 00:00:00'),
(21, '', 'test2fn', 'test2ln', '', 't2@tt.com', '', '2024-01-02 11:00:00', 1, '', '0000-00-00 00:00:00'),
(23, '', 'test1fn', 'test1ln', '', 't1@tt.com', '', '2024-01-01 10:00:00', 1, '', '0000-00-00 00:00:00'),
(24, '', 'test2fn', 'test2ln', '', 't2@tt.com', '', '2024-01-02 11:00:00', 1, '', '0000-00-00 00:00:00'),
(26, '', 't1', 't2', '$2y$10$J12ZLEDVUT83PJfAhU5kpuDXDMGnoQu33gwAgU/mE.4a1eFpa9TTm', 't@t.com', '', '2025-05-06 14:19:19', 0, '', '0000-00-00 00:00:00'),
(27, '', 't1', 't2', '$2y$10$J12ZLEDVUT83PJfAhU5kpuDXDMGnoQu33gwAgU/mE.4a1eFpa9TTm', 't@t.com', '', '2025-05-06 14:19:30', 0, '', '0000-00-00 00:00:00'),
(28, '', 't1', 't2', '$2y$10$J12ZLEDVUT83PJfAhU5kpuDXDMGnoQu33gwAgU/mE.4a1eFpa9TTm', 't@t.com', '', '2025-05-06 14:19:31', 0, '', '0000-00-00 00:00:00'),
(29, '', 't1', 't2', '$2y$10$J12ZLEDVUT83PJfAhU5kpuDXDMGnoQu33gwAgU/mE.4a1eFpa9TTm', 't@t.com', '', '2025-05-06 14:19:31', 0, '', '0000-00-00 00:00:00'),
(30, '', 'test1fn', 'test1ln', '', 't1@tt.com', '', '2024-01-01 10:00:00', 1, '', '0000-00-00 00:00:00'),
(31, '', 'test2fn', 'test2ln', '', 't2@tt.com', '', '2024-01-02 11:00:00', 1, '', '0000-00-00 00:00:00'),
(33, '', 'test1fn', 'test1ln', '', 't1@tt.com', '', '2024-01-01 10:00:00', 1, '', '0000-00-00 00:00:00'),
(34, '', 'test2fn', 'test2ln', '', 't2@tt.com', '', '2024-01-02 11:00:00', 1, '', '0000-00-00 00:00:00'),
(35, '', 't1', 't2', '$2y$10$J12ZLEDVUT83PJfAhU5kpuDXDMGnoQu33gwAgU/mE.4a1eFpa9TTm', 't@t.com', '', '2025-05-11 19:27:57', 0, '', '0000-00-00 00:00:00'),
(36, '', 'test1fn', 'test1ln', '', 't1@tt.com', '', '2024-01-01 10:00:00', 1, '', '0000-00-00 00:00:00'),
(37, '', 'test2fn', 'test2ln', '', 't2@tt.com', '', '2024-01-02 11:00:00', 1, '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_bcrypt`
--
ALTER TABLE `users_bcrypt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_md5`
--
ALTER TABLE `users_md5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_md5_salt`
--
ALTER TABLE `users_md5_salt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_not_secure`
--
ALTER TABLE `users_not_secure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_sha1_salt`
--
ALTER TABLE `users_sha1_salt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_web`
--
ALTER TABLE `users_web`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_bcrypt`
--
ALTER TABLE `users_bcrypt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_md5`
--
ALTER TABLE `users_md5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_md5_salt`
--
ALTER TABLE `users_md5_salt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_not_secure`
--
ALTER TABLE `users_not_secure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_sha1_salt`
--
ALTER TABLE `users_sha1_salt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_web`
--
ALTER TABLE `users_web`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

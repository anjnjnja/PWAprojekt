-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 08:47 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projektbaza`
--
CREATE DATABASE IF NOT EXISTS `projektbaza` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projektbaza`;

-- --------------------------------------------------------

--
-- Table structure for table `clanci`
--

CREATE TABLE `clanci` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `naslov` varchar(64) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clanci`
--

INSERT INTO `clanci` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '2021-06-12', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pulvinar arcu vitae justo consequat dignissim.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pulvinar arcu vitae justo consequat dignissim. Donec in volutpat nibh. Integer at augue nulla. Nullam eget dui non tellus tincidunt venenatis. Phasellus gravida porta eros quis rutrum. Nunc posuere quis leo eu feugiat. Nunc quis sagittis justo. Curabitur fringilla consequat est eu rutrum. Sed tempus eget diam vitae facilisis. Ut facilisis turpis augue, sit amet elementum urna fermentum a. Sed blandit tortor nec elit faucibus, in sagittis velit vestibulum. Morbi et justo quis odio maximus efficitur sed in mi. Vestibulum et luctus lorem, ut molestie risus. Morbi at condimentum nibh. Nam a libero ut mauris varius fringilla gravida vel nunc.', 'ovca.jpg', 'sport', 0),
(2, '0000-00-00', 'Etiam suscipit dictum lacus at maximus.', ' Phasellus id magna in quam feugiat tincidunt. Aenean a auctor lorem. Aenean tempor eget libero eu consequat. Sed feugiat efficitur leo sed iaculis. Suspendisse feugiat, dui nec convallis imperdiet, turpis lorem rutrum sapien, nec vestibulum augue mauris sed odio. In hac habitasse platea dictumst. Curabitur et dolor vitae ligula varius interdum. Maecenas ac ex justo. Donec porttitor semper imperdiet. ', 'Phasellus id magna in quam feugiat tincidunt. Aenean a auctor lorem. Aenean tempor eget libero eu consequat. Sed feugiat efficitur leo sed iaculis. Suspendisse feugiat, dui nec convallis imperdiet, turpis lorem rutrum sapien, nec vestibulum augue mauris sed odio. In hac habitasse platea dictumst. Curabitur et dolor vitae ligula varius interdum. Maecenas ac ex justo. Donec porttitor semper imperdiet. Nulla ullamcorper nunc in est dapibus consequat. Phasellus hendrerit ut dolor ut suscipit. Fusce at elit a augue efficitur tincidunt quis non lorem. Donec vitae libero non sapien dignissim iaculis vel eget est. Nam suscipit ipsum vitae ex rutrum, ac tincidunt sem efficitur.\r\n\r\nNam gravida ligula nec nibh imperdiet dapibus. Maecenas quis enim sed risus maximus imperdiet. Cras neque nisl, dignissim sed ante sed, varius faucibus augue. Aenean molestie sodales dui. Proin quam tellus, tempor sit amet quam eget, maximus luctus mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec aliquet ante vitae massa volutpat, at sodales mauris malesuada. In hac habitasse platea dictumst. Nullam lectus lectus, eleifend non ligula et, ullamcorper blandit mauris. Cras pellentesque vehicula tortor, vel maximus metus egestas et. Sed at massa augue. Sed vestibulum nunc eget turpis ornare lacinia. Integer eleifend varius ultricies. Phasellus interdum diam dolor, vel placerat tortor rutrum ut.', 'ovca.jpg', 'sport', 0),
(4, '0000-00-00', 'Etiam suscipit dictum lacus at maximus.', ' Phasellus id magna in quam feugiat tincidunt. Aenean a auctor lorem. Aenean tempor eget libero eu consequat. Sed feugiat efficitur leo sed iaculis. Suspendisse feugiat, dui nec convallis imperdiet, turpis lorem rutrum sapien, nec vestibulum augue mauris sed odio. In hac habitasse platea dictumst. Curabitur et dolor vitae ligula varius interdum. Maecenas ac ex justo. Donec porttitor semper imperdiet. ', 'Phasellus id magna in quam feugiat tincidunt. Aenean a auctor lorem. Aenean tempor eget libero eu consequat. Sed feugiat efficitur leo sed iaculis. Suspendisse feugiat, dui nec convallis imperdiet, turpis lorem rutrum sapien, nec vestibulum augue mauris sed odio. In hac habitasse platea dictumst. Curabitur et dolor vitae ligula varius interdum. Maecenas ac ex justo. Donec porttitor semper imperdiet. Nulla ullamcorper nunc in est dapibus consequat. Phasellus hendrerit ut dolor ut suscipit. Fusce at elit a augue efficitur tincidunt quis non lorem. Donec vitae libero non sapien dignissim iaculis vel eget est. Nam suscipit ipsum vitae ex rutrum, ac tincidunt sem efficitur.\r\n\r\nNam gravida ligula nec nibh imperdiet dapibus. Maecenas quis enim sed risus maximus imperdiet. Cras neque nisl, dignissim sed ante sed, varius faucibus augue. Aenean molestie sodales dui. Proin quam tellus, tempor sit amet quam eget, maximus luctus mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec aliquet ante vitae massa volutpat, at sodales mauris malesuada. In hac habitasse platea dictumst. Nullam lectus lectus, eleifend non ligula et, ullamcorper blandit mauris. Cras pellentesque vehicula tortor, vel maximus metus egestas et. Sed at massa augue. Sed vestibulum nunc eget turpis ornare lacinia. Integer eleifend varius ultricies. Phasellus interdum diam dolor, vel placerat tortor rutrum ut.', 'maslinovo.png', 'politika', 0),
(5, '0000-00-00', 'Etiam suscipit dictum lacus at maximus.', ' Phasellus id magna in quam feugiat tincidunt. Aenean a auctor lorem. Aenean tempor eget libero eu consequat. Sed feugiat efficitur leo sed iaculis. Suspendisse feugiat, dui nec convallis imperdiet, turpis lorem rutrum sapien, nec vestibulum augue mauris sed odio. In hac habitasse platea dictumst. Curabitur et dolor vitae ligula varius interdum. Maecenas ac ex justo. Donec porttitor semper imperdiet. ', 'Phasellus id magna in quam feugiat tincidunt. Aenean a auctor lorem. Aenean tempor eget libero eu consequat. Sed feugiat efficitur leo sed iaculis. Suspendisse feugiat, dui nec convallis imperdiet, turpis lorem rutrum sapien, nec vestibulum augue mauris sed odio. In hac habitasse platea dictumst. Curabitur et dolor vitae ligula varius interdum. Maecenas ac ex justo. Donec porttitor semper imperdiet. Nulla ullamcorper nunc in est dapibus consequat. Phasellus hendrerit ut dolor ut suscipit. Fusce at elit a augue efficitur tincidunt quis non lorem. Donec vitae libero non sapien dignissim iaculis vel eget est. Nam suscipit ipsum vitae ex rutrum, ac tincidunt sem efficitur.\r\n\r\nNam gravida ligula nec nibh imperdiet dapibus. Maecenas quis enim sed risus maximus imperdiet. Cras neque nisl, dignissim sed ante sed, varius faucibus augue. Aenean molestie sodales dui. Proin quam tellus, tempor sit amet quam eget, maximus luctus mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec aliquet ante vitae massa volutpat, at sodales mauris malesuada. In hac habitasse platea dictumst. Nullam lectus lectus, eleifend non ligula et, ullamcorper blandit mauris. Cras pellentesque vehicula tortor, vel maximus metus egestas et. Sed at massa augue. Sed vestibulum nunc eget turpis ornare lacinia. Integer eleifend varius ultricies. Phasellus interdum diam dolor, vel placerat tortor rutrum ut.', 'plaza.jpg', 'politika', 0),
(6, '2021-06-12', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pulvinar arcu vitae justo consequat dignissim.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pulvinar arcu vitae justo consequat dignissim. Donec in volutpat nibh. Integer at augue nulla. Nullam eget dui non tellus tincidunt venenatis. Phasellus gravida porta eros quis rutrum. Nunc posuere quis leo eu feugiat. Nunc quis sagittis justo. Curabitur fringilla consequat est eu rutrum. Sed tempus eget diam vitae facilisis. Ut facilisis turpis augue, sit amet elementum urna fermentum a. Sed blandit tortor nec elit faucibus, in sagittis velit vestibulum. Morbi et justo quis odio maximus efficitur sed in mi. Vestibulum et luctus lorem, ut molestie risus. Morbi at condimentum nibh. Nam a libero ut mauris varius fringilla gravida vel nunc.', 'plaza.jpg', 'politika', 0),
(7, '2021-06-12', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pulvinar arcu vitae justo consequat dignissim.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pulvinar arcu vitae justo consequat dignissim. Donec in volutpat nibh. Integer at augue nulla. Nullam eget dui non tellus tincidunt venenatis. Phasellus gravida porta eros quis rutrum. Nunc posuere quis leo eu feugiat. Nunc quis sagittis justo. Curabitur fringilla consequat est eu rutrum. Sed tempus eget diam vitae facilisis. Ut facilisis turpis augue, sit amet elementum urna fermentum a. Sed blandit tortor nec elit faucibus, in sagittis velit vestibulum. Morbi et justo quis odio maximus efficitur sed in mi. Vestibulum et luctus lorem, ut molestie risus. Morbi at condimentum nibh. Nam a libero ut mauris varius fringilla gravida vel nunc.', 'avion2.jpg', 'sport', 0),
(23, '0000-00-00', 'Hrvatska ulazi u sukob s NATO', 'predsjednik Zoran Milanović rekao da neće prihvatiti završnu deklaraciju saveza.', 'ČLAN Predsjedništva BiH Željko Komšić ocijenio je da Hrvatska ulazi u sukob s NATO-om pošto je predsjednik Zoran Milanović ranije u nedjelju rekao da neće prihvatiti završnu deklaraciju saveza bez da se u njoj spominje Daytonski sporazum i tri konstitutivna naroda.\r\n\r\n\"Zbog forsiranja prevladanog etničkog koncepta konstitutivnosti naroda, Hrvatska dolazi u sukob s NATO-om\", rekao je Komšić.\r\n\r\nHrvatska nema moć blokirati načela deklaracije, smatra Komšić.\r\n\r\n\"Teško da jedna Hrvatska može zaustaviti ono što je interes NATO-a, k tome zalažući se za ono što nisu NATO i EU standardi\", dodao je Komšić.\r\n\r\nPo njegovim riječima, sadržaj presuda Europskog suda za ljudska prava u vezi izbornih reformi te dokument Nacionalni program reformi koji je BiH poslala u NATO savez preferira jednakopravnost svih građana.\r\n\r\n\"Sad u NATO-u trebaju odlučiti jesu li im važniji standardi i interesi alijanse, ili anti-NATO i antieuropski standardi dužnosnika iz Hrvatske\", naveo je Komšić.', 'img/komsic.jpg', 'politika', 0),
(24, '0000-00-00', 'ENGLESKA - HRVATSKA 1:0', 'HRVATSKA je izgubila u prvoj utakmici na Europskom prvenstvu.', 'Hrvatska preživjela uvodni pritisak Engleza pa preuzela posjed\r\nEnglezi su tražili rani pogodak i odmah preuzeli kontrolu utakmice. Igrali su visoki presing kojim su Hrvatskoj otežavali iznošenje lopte te su nerijetko oduzimali posjed na obrambenoj polovici Hrvatske. Rezultiralo je to brojnim prilikama za Englesku na početku utakmice, a najbolju je propustio Foden u šestoj minuti. Sterling je povukao brzi napad, dodao na desnu stranu Fodenu koji se izvukao na ljevicu i pogodio stativu Livakovićevog gola.\r\n\r\nOdlično je Livaković obranio i Phillipsov udarac s ruba šesnaesterca u devetoj minuti, dok je velike probleme hrvatskoj obrani zadavao Raheem Sterling. Ipak, od sredine prvog dijela Englezi su smanjili intenzitet presinga, pa se Hrvatska ohrabrila i preuzela kontrolu nad posjedom. \r\n\r\nNo, Engleska se dobro branila i nije dozvolila Hrvatskoj stvaranje prilika za pogodak. U obećavajućoj poziciji bio je Perišić u 27. minuti poslije ubačaja Vrsaljka i jedinog kiksa engleske obrane u prvom dijelu, ali nije uspio zahvatiti loptu kako je htio i ona je otišla daleko od gola. U smiraj poluvremena Engleska je imala slobodni udarac na rubu šesnaesterca, no Trippier ga je izveo loše i pogodio živi zid.', 'img/nogomet.jpg', 'sport', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'anja', 'penic', 'apenic', '1234', 1),
(2, 'Anja', 'Penic', 'anjap', '$2y$10$HNGzgMZVGV8DiqHuxwQ71Oz.s4SMtGOk1Fsx8ARDPzF9rYH5v8edG', 1),
(3, 'Admin', 'Adminovic', 'admin', '$2y$10$G6.GBj73/IOOHSHt9Wt2meNINA1pgSXI/PtLlHSl.TUYVp0ahoMKe', 0),
(4, 'Misa', 'Misic', 'Test', '$2y$10$jCF0xSwA6lY4fOv5fqhPuO1Hq33bQR4OZeHR2G8sZgZoLJhBI36ge', 0),
(5, 'Misha', 'Mishkich', 'Mishka', '$2y$10$Vwe5Z4d1tVPJOvV1zSTXzuvzfysYikK7DSL1S8zIBZ1q3l2ED3Ef2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanci`
--
ALTER TABLE `clanci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_imeidx` (`korisnicko_ime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanci`
--
ALTER TABLE `clanci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

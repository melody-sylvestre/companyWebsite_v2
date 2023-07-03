-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Jul 01, 2023 at 09:48 AM
-- Server version: 5.7.41
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `companyDatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `BannerImages`
--

CREATE TABLE `BannerImages` (
  `id` int(10) UNSIGNED NOT NULL,
  `Title` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `Subtitle` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `ImageUrl` varchar(255) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `BannerImages`
--

INSERT INTO `BannerImages` (`id`, `Title`, `Subtitle`, `ImageUrl`) VALUES
(1, 'Lorem ipsum dolor sit amet.', 'Ut tenetur amet sit natus nihil ad quia quaerat. Ab quis quos et sunt velit qui architecto dignissimos est quasi repellat. ', 'https://images.freeimages.com/images/large-previews/3b2/prague-conference-center-1056491.jpg'),
(2, 'Qui galisum quis et explicabo quidem', '33 quia eius est excepturi dolore qui veritatis voluptatibus et officiis molestias aut esse corporis sed voluptatum molestiae ea provident incidunt. ', 'https://images.freeimages.com/images/large-previews/4b8/free-harvest-sunrise-1640551.jpg'),
(3, 'Aut deserunt accusantium', 'Qui galisum quis et explicabo quidem quo consectetur illo aut dolor odit. Aut modi rerum et neque ratione et expedita maxime ut aliquam rerum ut minima quae. ', 'https://images.freeimages.com/images/large-previews/ab7/gerber-and-rose-2-1544099.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ContactMessages`
--

CREATE TABLE `ContactMessages` (
  `id` int(10) UNSIGNED NOT NULL,
  `FullName` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `EmailAddress` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `PhoneNumber1` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `PhoneNumber2` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `PhoneNumber3` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `MessageText` text COLLATE latin1_bin,
  `bIncludeAddressDetails` tinyint(4) DEFAULT NULL,
  `AddressLine1` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `AddressLine2` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `CityTown` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `StateCounty` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `Postcode` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `Country` varchar(255) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BannerImages`
--
ALTER TABLE `BannerImages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ContactMessages`
--
ALTER TABLE `ContactMessages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BannerImages`
--
ALTER TABLE `BannerImages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ContactMessages`
--
ALTER TABLE `ContactMessages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 08, 2022 at 09:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `destination`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryid` tinyint(10) NOT NULL,
  `countryname` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryid`, `countryname`, `description`, `image`, `caption`) VALUES
(1, 'Canada', 'Country to the north of the United States, Canada is famous for its bilingual population (French and English), ice hockey, Niagara Falls, and Banff National Park.', 'vancouver.jpg', 'Vancouver skyline at twilight'),
(2, 'Italy', 'With its mild, Mediterranean climate, mountains, beaches,  and rich history, Italy is a favorite travel spot. Some of its most famous cities include Rome, Naples, Florence, Venice, Pisa, Sicily, and Milan. Religious landmarks include the Vatican, Il Duomo, and the Sistine Chapel.', 'colosseum.jpg', 'The Roman Colosseum'),
(3, 'Japan', 'A country composed of islands in East Asia, Japan is home to a rich and diverse culture, and some great mountains. Nearly 80 percent of the country is covered in mountains, many of which are protected in an extensive system of national parks.', 'miyajima.jpg', 'Island of Miyajima'),
(4, 'Peru', 'Set on the west coast of South America, and home of a large portion of the Andes mountain chain, Peru was originally the home of the Incas, an expansive ancient civilization. Many of the Incas ruins can still be found today in Peru, including Machu Picchu.', 'peru.jpg', 'Incan ruins at Machu Picchu'),
(5, 'Namibia', 'Formerly South-West Africa, Namibia\'s boundaries reach from the Atlantic Ocean to the Kalahari Desert. One of its great claims to fame is the unparalleled Etosha National Park, home to leopards, antelope, giraffes, elephants, flamingos, and rhinoceroses.', 'etosha.jpg', 'Etosha National Park, Namibia'),
(6, 'India', 'The world\'s seventh-largest country, and second most populous, India is not covered in a weekend. From the Himalayas to the coasts of the Indian Ocean, this landmass forms its own subcontinent. With its ancient cultures and deep history, India is also a favorite for culture enthusiasts.', 'ganges.jpg', 'Ganges River in Varanasi, India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countryid` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

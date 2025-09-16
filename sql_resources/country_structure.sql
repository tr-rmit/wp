
-- Table structure for table `country`

CREATE DATABASE destination
CHARACTER
SET utf8mb4
COLLATE utf8mb4_unicode_ci;


CREATE TABLE `country`(
  `countryid` tinyint(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `countryname` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



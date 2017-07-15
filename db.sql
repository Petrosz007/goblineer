CREATE TABLE `auctions` (
  `auc` int(15) NOT NULL PRIMARY KEY,
  `item` int(15) DEFAULT NULL,
  `owner` varchar(22) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `buyout` int(15) DEFAULT NULL,
  `quantity` int(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

CREATE TABLE `status` (
  `realm` varchar(21) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

CREATE TABLE `blood` (
  `id` int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `item` int(20) NOT NULL,
  `marketvalue` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `quantity` int(50) NOT NULL,
  `bloodprice` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

CREATE TABLE `realms` (
  `id` int(11) NOT NULL,
  `region` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `realm` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `locale` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

CREATE TABLE `marketvalue` (
  `id` int(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `item` int(11) NOT NULL,
  `marketvalue` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

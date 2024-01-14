SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `recipes_app` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `recipes_app`;

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `recipeId` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `amount` float NOT NULL,
  `unit` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `recipeId` (`recipeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE IF NOT EXISTS `recipes` (
  `id` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `userId` varchar(128) COLLATE utf8_polish_ci DEFAULT NULL,
  `title` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `creation_time` int(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_polish_ci NOT NULL,
  `registerDate` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;


ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`recipeId`) REFERENCES `recipes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Adminer 4.8.4 MySQL 8.0.39-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `shifts`;
CREATE TABLE `shifts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shift` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `user` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  CONSTRAINT `shifts_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `shifts` (`id`, `shift`, `user`) VALUES
(10,	'4-9',	7),
(32,	'Monday 12-9:30pm',	27),
(33,	'Wowowow',	25),
(34,	'Sunday 4-9:30pm',	27),
(35,	'Monday 12-9:30pm',	1),
(36,	'Monday 12-9:30',	21),
(37,	'Wednesday 12:9-30PM',	7),
(38,	'Thursday 12-9:30',	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin` tinyint NOT NULL DEFAULT '0',
  `manager` tinyint NOT NULL DEFAULT '0',
  `forename` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `username`, `hash`, `admin`, `manager`, `forename`, `surname`) VALUES
(1,	'cowiemama',	'$2y$10$rIh8GVFD39BIDnX8oGdytunnDaD1HWiQvQcGYJ6dVg3.d4k8KEwma',	0,	0,	'Coen',	'Williams'),
(7,	'System Admin',	'$2y$10$i13pCznj1kNitjtqMsUyAuAdg8.uDVl34w6TjmBFhyWyYw6fmdXoa',	1,	0,	'admin',	'admin'),
(9,	'System Manager',	'$2y$10$qQ/iaC1LUnIh6VYfwBIJGeRt8qMbVFZS2pZsBf3q9.K5XGlRBpDSO',	0,	1,	'manager',	'manager'),
(11,	'wlpapps',	'$2y$10$mMnZRNfPx58Wkrt7svlgEuinzlBWNn5V4/sctuZMaacILv94fx7pG',	1,	1,	'William',	'Papps'),
(21,	'1234',	'$2y$10$l980R6MUeD4UJT6EmoB2bePWcLOYbT8bdCwTNKQuC47TvnUEnASGq',	0,	0,	'1234',	'1234'),
(25,	'FishxChips',	'$2y$10$2FTj2NAcraRGLeAUMEdbPuKf.D2Up8AviAPcy29zE8NECEUlZik3O',	0,	0,	'Arion',	'Smith'),
(27,	'Test',	'$2y$10$cWWqNrKc7GmE0bGtD0zavOtU8vN4hEm3WRuAyZMryRoyhuagvrPIu',	0,	0,	'Test',	'Test'),
(29,	'BenMiles',	'$2y$10$H6XfG0SICi2dcmEsEVO4gOdHzxGDPVuHHT1OW1GRrAFeEHhR4OaDS',	0,	0,	'Ben',	'Miles');

-- 2024-09-02 23:24:57

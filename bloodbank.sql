-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2016 at 11:16 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodbanks`
--

CREATE TABLE `bloodbanks` (
  `bankid` int(4) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobileno` varchar(10) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `location` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodbanks`
--

INSERT INTO `bloodbanks` (`bankid`, `name`, `mobileno`, `email`, `password`, `location`) VALUES
(4, 'Vijaya', '9387291828', 'vijaya@email.com', '32250170a0dca92d53ec9624f336ca24', 14),
(5, 'Galvanie', '9383829394', 'galvanie@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 4),
(6, 'Atharva Blood Bank', '8374923949', 'atharvabb@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 20),
(7, 'SSKM Blood Bank', '9875314681', 'SSKM@email.com', 'd0b3b7d8157c3057b45342df1493d39e', 16),
(8, 'Howrah Blood Bank', '8546971234', 'howrah@email.com', '527bd5b5d689e2c32ae974c6229ff785', 9),
(9, 'BCCB ', '7984236510', 'BCCB@email.com', '0a2b20c712ba7bdfc97e27206cdbba8a', 1),
(10, 'Save Human', '9547863210', 'save@email.com', '1acd536fdcecefab5896878ea959f75d', 8),
(11, 'NRRS', '8579312460', 'nrrs@email.com', '1836449da1b5e00b7b645b9fd7ecf964', 7),
(12, 'JMP', '7469853016', 'jmp@email.com', '7c03374aa85dc867196202145d7b8a93', 20),
(13, 'SSFG', '9468721530', 'ssfg@email.com', 'df3939f11965e7e75dbc046cd9af1c67', 19),
(14, 'NRJMPF', '8632102547', 'nrjmpf@email.com', 'bd1d7b0809e4b4ee9ca307aa5308ea6f', 10),
(15, 'Nirjah', '7623014689', 'nirjah@email.com', 'b298eb65cef44849771e75638b25fa32', 14),
(16, 'Nirali', '9632587410', 'nirali@email.com', 'a14c666e67bc46b736c9532f896785ce', 18),
(17, 'Rushali', '8632147590', 'rushali@email.com', '3340a48cafaaba09a4a9835a7df29e62', 13),
(18, 'Smitali', '7569840321', 'smitali@email.com', '86d93b4c1eecc7173f8fc5728341829a', 15),
(19, 'Redhuman', '8520146973', 'redhuman@email.com', '91bbe2bdc6f2d75400b754a43ae6304c', 6),
(20, 'Being Human', '9630124578', 'beinghuman@email.com', '03346657feea0490a4d4f677faa0583d', 10),
(21, 'SRK', '7012563489', 'srk@email.com', '6c8063c7409deb9289f71eab7f7a1548', 21),
(22, 'Rudali', '9865741230', 'rudali@email.com', '6a45059d8546feb3343506218bb98c4b', 22),
(23, 'Jonali', '8632014973', 'jonali@email.com', '5aea3b184baf9bf064ab4078e8234928', 3),
(24, 'BOI', '7031689425', 'boi@email.com', 'acb2d0aa0155477464a0d2a10ed8e9ae', 2),
(25, 'HDFC Blood Bank', '9517536842', 'hdfc@email.com', '43996837cc43820e78c4a30700e4a5e8', 1),
(26, 'ICICI Blood Banks', '8632104579', 'icici@email.com', '7ac66c0f148de9519b8bd264312c4d64', 16),
(27, 'Hammington Blood Bank', '7412369805', 'hammington@email.com', '7617001a04ad1634f11b03307fa879df', 14),
(28, 'Need Blood', '8520193746', 'needblood@email.com', '6e513cd46304521ea0aa946d6f249678', 1),
(29, 'Raktadan', '8059706804', 'raktadan@email.com', '947af30fc5fd1aaf1e0d8899d5d5baee', 7),
(30, 'Vasaikar', '7604983248', 'vasaikar@email.com', 'a10e9aa4485527a50457f3bf5695dcd8', 13),
(31, 'Save Them', '7586580136', 'savethem@email.com', '7f0e9dd6a73e7a57671de692e07e095a', 12),
(32, 'ZARA', '9012365874', 'zara@email.com', '2ec4c0f55abb3f1fd8c3ea29467681ad', 11),
(33, 'Hermes', '8019756432', 'hermes@email.com', 'fb5be496b0b960f3eee21dbdd24f9169', 1),
(34, 'Park Avenue', '7872690135', 'parkavenue@email.com', 'daffd55e1b8020c7a60a7b6e36afb775', 2),
(35, 'Gandhi Blood Bank', '8963251475', 'gandhi@email.com', '4b2d985e85146ecf7b53226985e65170', 3),
(36, 'APJ ', '8523647910', 'apj@email.com', 'fc5e038d38a57032085441e7fe7010b0', 4),
(37, 'Adarsh', '7965843021', 'adarsh@email.com', '3f2b39b2e53e3c2db28fb785078d8e54', 5),
(38, 'Ashirwad Blood Bank', '8551978750', 'ashirwad@email.com', '4504542a389f43225fd133a14b98a70a', 6),
(39, 'Balaji Blood Bank', '8521470398', 'balaji@email.com', '163218e536c13ff2fc9a4d76e34be085', 7),
(40, 'SFIT Blood Bank', '7875085519', 'sfit@email.com', 'd29131a227fb5418787871b01bf808a5', 8),
(41, 'Central Blood Bank', '8521973604', 'central@email.com', 'd74fdde2944f475adc4a85e349d4ee7b', 9),
(42, 'City Blood Bank', '8539764011', 'city@email.com', 'b0bef02616cfef7b5d16896a04be26b1', 10),
(43, 'Civil Blood Bank', '9630124500', 'civil@email.com', '293d8830ccddfdb9fb79f6ff906ebf94', 11),
(44, 'Kurla Blood Bank', '8569741230', 'kurla@email.com', '04ca10548fc3b75627472d53a5ad0b2b', 12),
(45, 'Cottage Blood Bank', '9881250776', 'cottage@email.com', '70622c804c517e0fc7e77a65d24019d0', 13),
(46, 'Diagno', '8632014697', 'diagno@email.com', 'f175e09ccd29c70d6cfd9181256da4a7', 14),
(47, 'MSD', '8630124597', 'msd@email.com', '99941a8015cd830b498cd9f0ddf4a500', 15),
(48, 'Alone', '8520648219', 'alone@email.com', '5a39fe36ce9aa092ffe8faa0eaedd5da', 16),
(49, 'Dr. Neelam Blood Bank', '9012365478', 'neelam@email.com', 'e783c7044c361cd2f88aefc5caf9b7c5', 17),
(50, 'GG Blood Bank', '8965231470', 'gg@email.com', 'a82c094e1eab34db59803d0e7ad3fed8', 18),
(51, 'Holy Family Blood Bank', '9638527410', 'holy@email.com', '0d3fda0bdbb9d619e09cdf3eecba7999', 19),
(52, 'Jain Blood Bank', '9887563214', 'jain@email.com', 'ff2213fe11616190136f39a64e56a3c5', 20),
(54, 'Manav Seva Blood Bank', '9852146008', 'manav@email.com', 'b0f2169aa609c42c1bc96d4aa5da3aea', 21),
(55, 'Navjeevan Blood Bank', '9865740038', 'navjeevan@email.com', '15285722f9def45c091725aee9c387cb', 22),
(56, 'Samarpan', '8806699772', 'samarpan@email.com', '6447e00b955f4ee617f45b1df75e7821', 18),
(57, 'Sarla Blood Bank', '9955873647', 'sarla@email.com', 'b667a6cebe3dedf8bb0c26f032eaba15', 7),
(59, 'Tata Blood Bank', '8662997501', 'tata@email.com', 'e40b34e3380d6d2b238762f0330fbd84', 19),
(61, 'TCS Blood Bank', '8520067711', 'tcs@email.com', 'c4ceb152db108935c71875ae7eaeaaec', 17),
(63, 'Red Cross Blood', '9644283007', 'red@email.com', 'e2ff3cfd4b43876adaa5767ce93bf7d3', 14),
(64, 'Life Blood Bank', '8927349384', 'life@email.com', 'd6b0ab7f1c8ab8f514db9a6d85de160a', 19),
(65, 'Anjelica Blood Bank', '7208170153', 'anjelica@email.com', '482c811da5d5b4bc6d497ffa98491e38', 9),
(66, 'NR Blood Bank', '8372938483', 'nrbank@email.com', 'd6b0ab7f1c8ab8f514db9a6d85de160a', 15),
(67, 'Adarsh Blood Bank', '8374928373', 'adarshbb@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 17);

-- --------------------------------------------------------

--
-- Table structure for table `bloodstocks`
--

CREATE TABLE `bloodstocks` (
  `bankid` int(4) UNSIGNED NOT NULL,
  `aplus` int(3) UNSIGNED NOT NULL DEFAULT '0',
  `aminus` int(3) UNSIGNED NOT NULL DEFAULT '0',
  `bplus` int(3) UNSIGNED NOT NULL DEFAULT '0',
  `bminus` int(3) UNSIGNED NOT NULL DEFAULT '0',
  `oplus` int(3) UNSIGNED NOT NULL DEFAULT '0',
  `ominus` int(3) UNSIGNED NOT NULL DEFAULT '0',
  `abplus` int(3) UNSIGNED NOT NULL DEFAULT '0',
  `abminus` int(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodstocks`
--

INSERT INTO `bloodstocks` (`bankid`, `aplus`, `aminus`, `bplus`, `bminus`, `oplus`, `ominus`, `abplus`, `abminus`) VALUES
(4, 19, 20, 16, 9, 19, 12, 10, 6),
(5, 15, 18, 19, 20, 10, 7, 10, 11),
(6, 30, 7, 9, 10, 16, 18, 20, 11),
(7, 12, 10, 20, 14, 17, 19, 20, 30),
(8, 18, 19, 20, 11, 20, 30, 12, 7),
(9, 19, 29, 10, 11, 13, 17, 19, 10),
(10, 19, 20, 30, 30, 10, 11, 12, 17),
(11, 19, 10, 20, 10, 11, 9, 20, 11),
(12, 12, 19, 20, 10, 19, 20, 30, 11),
(13, 19, 20, 10, 20, 30, 11, 18, 19),
(14, 19, 20, 10, 19, 20, 30, 11, 9),
(15, 19, 20, 11, 10, 19, 20, 30, 11),
(16, 25, 14, 30, 12, 15, 12, 9, 15),
(17, 18, 20, 30, 11, 9, 7, 19, 18),
(18, 14, 30, 30, 20, 12, 12, 30, 9),
(19, 19, 20, 12, 10, 30, 11, 18, 19),
(20, 19, 20, 18, 19, 22, 12, 21, 20),
(21, 19, 20, 19, 10, 20, 30, 11, 12),
(22, 19, 20, 19, 22, 24, 30, 11, 9),
(23, 19, 20, 10, 20, 10, 11, 20, 18),
(24, 19, 20, 11, 19, 20, 19, 11, 11),
(25, 19, 19, 20, 19, 30, 12, 12, 29),
(26, 19, 20, 10, 11, 12, 12, 29, 30),
(27, 19, 20, 21, 11, 21, 10, 11, 19),
(28, 19, 20, 11, 10, 20, 22, 30, 21),
(29, 19, 20, 11, 11, 10, 9, 8, 10),
(30, 20, 19, 11, 19, 20, 22, 30, 11),
(31, 30, 19, 10, 20, 29, 11, 10, 11),
(67, 18, 12, 12, 13, 3, 29, 12, 11);

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `donorid` int(5) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(3) UNSIGNED DEFAULT NULL,
  `mobileno` varchar(10) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `weight` int(3) UNSIGNED NOT NULL,
  `gender` varchar(6) NOT NULL,
  `bloodgroup` int(2) NOT NULL,
  `city` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`donorid`, `name`, `age`, `mobileno`, `email`, `password`, `weight`, `gender`, `bloodgroup`, `city`) VALUES
(0, '', NULL, NULL, '', '', 0, '', 0, 0),
(1, 'Rudolph Almeida', 20, '8390340416', 'rudolf1.almeida@gmail.com', '243e61e9410a9f577d2d662c67025ee9', 71, 'male', 3, 14),
(2, 'Niral Almeida', 20, '9623969772', 'niralalmeida18@gmail.com', '243e61e9410a9f577d2d662c67025ee9', 55, 'female', 1, 18),
(3, 'Smit Carvalho', 20, '7875030964', 'smit.carvalho.sc@gmail.com', '243e61e9410a9f577d2d662c67025ee9', 52, 'male', 7, 1),
(4, 'Fabiola Almeida', 48, '9987413158', 'fabiola_almeida@yahoo.com', '243e61e9410a9f577d2d662c67025ee9', 65, 'female', 3, 9),
(5, 'Rushal Ferreira', 20, '8551919770', 'rushalferreira@gmail.com', '243e61e9410a9f577d2d662c67025ee9', 50, 'female', 5, 7),
(6, 'Brille Almeida', 24, '8080759615', 'brille@email.com', '56f491c56340a6fa5c158863c6bfb39f', 45, 'female', 7, 9),
(7, 'Chrysbel Almeida', 47, '7548963214', 'chrys@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 50, 'female', 7, 19),
(8, 'Johan Carvalho', 45, '7854298765', 'johan@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 56, 'male', 5, 16),
(9, 'Neomi Almeida', 19, '9626987245', 'neomi@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 45, 'female', 7, 14),
(10, 'Neres Almeida', 54, ' 932397951', 'neres@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 82, 'male', 7, 14),
(11, 'Helen Almeida', 46, '7875450033', 'helen@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 70, 'female', 1, 14),
(12, 'Siona Almeida', 20, '7755889900', 'siona@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 45, 'female', 6, 20),
(13, 'Noel Ferriera ', 59, '6598741235', 'noel@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 65, 'male', 6, 15),
(14, 'Ignatius Almeida', 69, '7788554421', 'ignatius@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 58, 'male', 3, 7),
(15, 'Pramila Ferrira', 55, '9587125469', 'pramila@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 78, 'female', 4, 11),
(16, 'Pranali Misquitta', 25, '7898567825', 'pranali@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 50, 'female', 8, 8),
(17, 'Russel Misquitta', 30, '7823248756', 'rus@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 65, 'male', 2, 1),
(18, 'Kayden Misquitta', 30, '7899885566', 'kad@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 58, 'male', 2, 2),
(19, 'Ethan Pereira', 35, '9985764123', 'Ethan@emaIl', '5f4dcc3b5aa765d61d8327deb882cf99', 89, 'male', 3, 3),
(20, 'Nick Dias', 50, '9868754321', 'nickky@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 50, 'male', 4, 4),
(21, 'Sheela Carvalho', 50, ' 987544110', 'sheela@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 65, 'female', 4, 4),
(22, 'Xavier Carvalho', 62, '9811225544', 'Xav@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 54, 'male', 5, 5),
(23, 'Win Fernandes', 33, '9323452211', 'win@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'male', 6, 5),
(24, 'Naysa Andrades', 26, '9744110023', 'Naysa@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 65, 'female', 7, 6),
(25, 'Sawali Bansode', 24, '9685772233', 'Sawali@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 57, 'female', 7, 6),
(26, 'Payal Bhoir', 41, '9874125753', 'payal@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 59, 'female', 6, 7),
(27, 'Sakshi Bhuj', 41, '9323661124', 'Sakshi@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 56, 'female', 7, 8),
(28, 'Ginelle Coutinho', 27, '9323379515', 'Gin@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 54, 'female', 8, 8),
(29, 'Orris Dabre', 29, '9323223311', 'orris@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 65, 'female', 8, 9),
(30, 'Greselda Almeida', 28, '9866554472', 'garashi@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 56, 'female', 8, 10),
(31, 'Answeeta Lopes', 27, '7878450022', 'Answeeta@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 68, 'female', 1, 11),
(32, 'Melissa Dcunha', 25, '7845781245', 'mel@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 56, 'female', 2, 11),
(33, 'Princia Dmello', 26, '9689674545', 'princia@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 70, 'female', 2, 12),
(34, 'Jordina Dcunha', 25, '9855667744', 'Jordz@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 50, 'female', 3, 12),
(35, 'Gibson Foss', 50, '9323551144', 'gibbu@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 57, 'male', 3, 13),
(36, 'Christangel Fargose', 29, '9696857412', 'chris@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 52, 'male', 3, 13),
(37, 'Smith Colaco', 25, '9868745744', 'smith@email.com', 'd4827d2ddae225f3bbb16ccc9cf746a9', 69, 'male', 3, 14),
(38, 'Flloyd Dsouza', 29, '9899774455', 'fllo@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 57, 'male', 5, 14),
(39, 'Alex Thomas', 29, '7788554422', 'alex@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 75, 'male', 6, 15),
(40, 'Allwyn Vincent', 25, '7744552135', 'allyyy@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 52, 'male', 7, 16),
(41, 'Glenn Dsouza', 53, '9866552211', 'glen@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 26, 'male', 8, 17),
(42, 'Samantha Gonsalves', 26, '7874579621', 'Sam@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 54, 'female', 6, 18),
(43, 'Vania Dabre', 24, '9826552211', 'van@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 56, 'female', 2, 19),
(44, 'Lisa Dcruz', 37, '9811754621', 'lissa@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'female', 8, 20),
(45, 'Simran Dhangade', 35, '9362587411', 'Sim@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 66, 'female', 7, 20),
(46, 'Syeira Dias', 33, '9685968596', 'syeira@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 59, 'female', 7, 19),
(47, 'Gia Dmello', 57, '9638527411', 'gia@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 66, 'female', 6, 18),
(48, 'Janet Fernandes', 34, '7888552246', 'jannet@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 66, 'female', 5, 17),
(49, 'Nishtha Gharat', 45, '9855461273', 'Nish@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 58, 'female', 5, 17),
(50, 'Parita Gharat', 37, '9653214781', 'parita@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'female', 5, 16),
(51, 'Emily Gonsalves', 44, '7858586541', 'emily@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 52, 'female', 4, 15),
(52, 'Nicole Gonsalves', 29, '9858575412', 'Nicole@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'female', 4, 15),
(53, 'Priti Jadhav', 36, '9865745869', 'priti@email.com', '628c6b0bbeff80d5d27f6c5fe905e6eb', 56, 'female', 1, 16),
(54, 'Karan Koli', 34, '9623969775', 'karan@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 57, 'male', 2, 15),
(55, 'Rihanna Lopes', 56, '9688774455', 'Rihanna@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 60, 'female', 3, 14),
(56, 'Teanna Lopes', 25, '7875486932', 'teanna@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 50, 'female', 3, 13),
(57, 'Roseann Menezes', 28, '7874859692', 'roseann@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 55, 'female', 4, 12),
(58, 'Siya Mhatre', 39, '7896854122', 'siya@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 57, 'female', 5, 11),
(59, 'Mariska Noronha', 30, '9685748591', 'Mariska@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 57, 'female', 4, 11),
(60, 'Oliva Sabu', 43, '7858586542', 'oliva@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 52, 'female', 4, 10),
(61, 'Aurel Pereira', 37, '7858586543', 'aurel@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'female', 4, 9),
(62, 'Sara Pereira', 56, '7873579621', 'sara@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 56, 'female', 5, 9),
(63, 'Vaishnavi Phad', 39, '7857586542', 'vaish@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 47, 'female', 6, 8),
(64, 'Bhagyalakshmi Choudh', 26, '9837201924', 'bhagya@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 51, 'female', 7, 7),
(65, 'Ananya Rane', 37, '9362587421', 'ananya@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 51, 'female', 8, 6),
(66, 'Vidhi', 26, '9362587427', 'vidhi@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'female', 1, 6),
(67, 'Saachi Salaskar', 25, '9363587421', 'saachi@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 59, 'female', 1, 5),
(68, 'Vidita Sarvaiya', 47, '7853586541', 'vadita@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 74, 'female', 2, 4),
(69, 'Priyanka Sashiprakas', 25, '9623969375', 'priyanka@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 58, 'female', 3, 3),
(70, 'Kimaya Shetty', 26, '9633969772', 'kimaya@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 52, 'female', 4, 2),
(71, 'Femina Sarfaraz', 24, '9623979775', 'femina@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 52, 'female', 7, 1),
(72, 'Pragya Singh', 25, '7548963217', 'pragya@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 51, 'female', 8, 20),
(73, 'Simran Solkar', 25, '9363587428', 'simran@email', '5f4dcc3b5aa765d61d8327deb882cf99', 52, 'female', 8, 19),
(74, 'Ardal Andrandes', 26, '9623969782', 'ardal@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'male', 7, 18),
(75, 'Nathan Athaide', 54, '9623969472', 'nathan@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 51, 'male', 6, 18),
(76, 'Jeremaih Carvalho', 25, '9623969792', 'jeremaih@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 55, 'male', 1, 17),
(77, 'Yasaar Khan', 24, '9623969377', 'yasaar@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 47, 'male', 2, 16),
(78, 'Sai Chaudhari', 27, '7853587547', 'sai@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 52, 'male', 2, 15),
(79, 'Siddhant Chaudari', 26, '9372587421', 'sid@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 60, 'male', 3, 15),
(80, 'Yug Chorghe', 28, '7852586541', 'yug@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 49, 'male', 4, 14),
(81, 'Prem Choudhary', 27, '7897854122', 'prem@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 56, 'male', 5, 13),
(82, 'Guru Desai', 30, '7852586547', 'Guru@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 52, 'male', 6, 11),
(83, 'Abdul khan', 26, '7538963217', 'abdul@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 48, 'male', 1, 1),
(84, 'Jack Jones', 54, '9837493481', 'jack@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 69, 'male', 5, 19),
(85, 'Asher Dias', 20, '9685448591', 'ash@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 56, 'male', 1, 1),
(86, 'Adel Dsouza', 23, '7874579621', 'adel@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 54, 'male', 2, 2),
(87, 'Pratik Gandhi', 24, '7839484538', 'pratik@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 55, 'male', 3, 3),
(88, 'Jai Gupta', 27, '7874579921', 'jai@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 52, 'male', 4, 4),
(89, 'Ayush Gupta', 25, '7874589921', 'ayush@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 54, 'male', 4, 5),
(90, 'Bhavik Lokhande', 22, '7874579721', 'bhavik@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'male', 5, 6),
(91, 'Oren Almeida', 23, '7873479621', 'oren@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 52, 'male', 6, 7),
(92, 'Asher Machado', 26, '7874509621', 'asher@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 57, 'male', 6, 8),
(93, 'Rudra Mehta', 22, '7864579621', 'rudra@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'male', 7, 8),
(94, 'Aarush Nair', 22, '7824579621', 'ayush1@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 50, 'male', 7, 9),
(95, 'Dhruv Patil', 23, '7877579621', 'dhruv@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'male', 7, 9),
(96, 'Kalash Pawar', 24, '7874500621', 'kalash@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 52, 'male', 8, 10),
(97, 'Sean Pereira', 47, '9307030493', 'sean@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 54, 'male', 1, 20),
(98, 'Verril Pereira', 26, '9304030793', 'veril@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'male', 2, 19),
(99, 'Rhythm Rathod', 25, '9307030403', 'rhythm@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 54, 'male', 3, 18),
(100, 'Jagrut Raut', 20, '9374030793', 'jagrut@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 54, 'male', 2, 17),
(101, 'Vedant Rahane', 45, '9307430403', 'ved@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 54, 'male', 4, 16),
(102, 'Jayden Sequeira', 25, '9334030793', 'jayden@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 51, 'male', 8, 15),
(103, 'Ketul Mishra', 26, '9304730793', 'ket@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'male', 7, 14),
(104, 'Tanish Talati', 21, '9307470403', 'tani@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 54, 'male', 7, 13),
(105, 'Shaun Almeida', 25, '9314030793', 'shaun@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 47, 'male', 6, 12),
(106, 'Nigel Almeida', 27, '9307035403', 'nigel@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'male', 6, 11),
(107, 'Zayn Malik', 58, '9308730793', 'zayn@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 54, 'male', 5, 10),
(108, 'Salman Yusuf Khan', 24, '9304730723', 'salman@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'male', 5, 9),
(109, 'Irfhan Khan ', 52, '9334730793', 'irfan@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'male', 4, 9),
(110, 'Mahi Dhoni', 25, '9303730723', 'mahi@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 59, 'male', 4, 18),
(111, 'Suresh Raina', 25, '9373730723', 'suresh@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 52, 'male', 3, 8),
(112, 'Ravindra Jadeja', 24, '9304770723', 'ravi@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 56, 'male', 3, 9),
(113, 'Bhuvaneshwar Kumar', 24, '9304731123', 'bhuvi@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'male', 3, 7),
(114, 'Virendra Sehwag', 45, '9304430793', 'viru@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 56, 'male', 2, 6),
(115, 'Yuvraj Singh', 56, '9303710723', 'yuvi@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 56, 'male', 2, 6),
(116, 'Sean Abot', 26, '9304010793', 'sean42@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 56, 'male', 2, 5),
(117, 'Albie Morkel ', 27, '7874519621', 'albie@email.com', 'f36165dd51ca74198a62546f36fc00a0', 56, 'male', 2, 4),
(118, 'Jos Butler', 25, '9303230723', 'Jos@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'male', 2, 3),
(119, 'Joe Root', 52, '9303730713', 'joe@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 51, 'male', 8, 3),
(120, 'Dale Steyn', 26, '9303210723', 'Dale@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 53, 'male', 8, 2),
(121, 'AB devillers', 26, '7824579521', 'abd@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 45, 'male', 7, 1),
(122, 'Quinton Deqock', 27, '9301230723', 'qunnie@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 564, 'male', 7, 20),
(123, 'Phil Huges', 57, '9303220723', 'phil@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 57, 'male', 6, 19),
(124, 'Michael Clarke', 25, '9301210723', 'michael@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 60, 'male', 6, 18),
(125, 'Steve Smith', 24, '9303210728', 'steve@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 54, 'male', 5, 17),
(126, 'Rud', 18, '5555858584', 'rud@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 78, 'male', 1, 1),
(127, 'Ankita Karia', 24, '9484938767', 'ankita@email.com', 'e99a18c428cb38d5f260853678922e03', 45, 'female', 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventid` int(5) UNSIGNED NOT NULL,
  `bankid` int(4) UNSIGNED NOT NULL,
  `eventname` varchar(30) NOT NULL,
  `eventday` int(2) UNSIGNED NOT NULL,
  `eventmonth` int(2) UNSIGNED NOT NULL,
  `eventlocation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventid`, `bankid`, `eventname`, `eventday`, `eventmonth`, `eventlocation`) VALUES
(1, 4, 'Vijaya Donation Drive', 15, 11, 'St. Francis School, Delhi'),
(2, 4, 'Vijaya Donation', 30, 11, 'Vijaya Complex, Delhi'),
(3, 16, 'Nirali Donation Drive', 13, 11, 'Nirali Hospital, Ranchi'),
(4, 16, 'Nirali December Donation', 15, 12, 'Nirali Hospital, Ranchi'),
(5, 16, 'Nirali January Donation', 5, 1, 'Nirali Hospital, Ranchi'),
(6, 16, 'Nirali February Donation Drive', 15, 2, 'Nirali Hospital, Ranchi');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `requestid` int(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  `bloodgroup` int(2) NOT NULL,
  `city` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`requestid`, `name`, `email`, `mobileno`, `bloodgroup`, `city`) VALUES
(1, 'Ruel Dmello', 'rueldmello@email.com', '8374828384', 1, 14),
(2, 'Mishal Carvalho', 'mishal@email.com', '9348374839', 3, 14),
(3, 'David Flanagan', 'david@email.com', '8374293843', 1, 14),
(4, 'William Stallings', 'will@email.com', '8374928390', 3, 14),
(5, 'Ashish Nehra', 'ashish@email.com', '7839484738', 1, 14),
(6, 'Virat Kohli', 'virat@email.com', '8937489890', 3, 16),
(7, 'John Almeida', 'john@email.com', '9848509584', 3, 19),
(8, 'Rudolph Almeida', 'rudolf@email.com', '9898787899', 1, 1),
(9, 'Rudolph Almeida', 'rudolf@email.com', '8689797678', 3, 14),
(10, 'XYZ', 'xyz@email.com', '9384938488', 1, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodbanks`
--
ALTER TABLE `bloodbanks`
  ADD PRIMARY KEY (`bankid`);

--
-- Indexes for table `bloodstocks`
--
ALTER TABLE `bloodstocks`
  ADD PRIMARY KEY (`bankid`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`donorid`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`requestid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodbanks`
--
ALTER TABLE `bloodbanks`
  MODIFY `bankid` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bloodstocks`
--
ALTER TABLE `bloodstocks`
  ADD CONSTRAINT `foreignkey` FOREIGN KEY (`bankid`) REFERENCES `bloodbanks` (`bankid`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

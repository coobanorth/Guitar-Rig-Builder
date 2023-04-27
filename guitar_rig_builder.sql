-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2023 at 04:58 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guitar_rig_builder`
--

-- --------------------------------------------------------

--
-- Table structure for table `amps`
--

CREATE TABLE `amps` (
  `amp_id` int(11) NOT NULL,
  `amp_brand` text NOT NULL,
  `amp_model` char(50) NOT NULL,
  `amp_price` int(11) NOT NULL,
  `amp_blues` tinyint(1) NOT NULL,
  `amp_country` tinyint(1) NOT NULL,
  `amp_funk` tinyint(1) NOT NULL,
  `amp_jazz` tinyint(1) NOT NULL,
  `amp_metal` tinyint(1) NOT NULL,
  `amp_pop` tinyint(1) NOT NULL,
  `amp_rock` tinyint(1) NOT NULL,
  `amp_ranking` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amps`
--

INSERT INTO `amps` (`amp_id`, `amp_brand`, `amp_model`, `amp_price`, `amp_blues`, `amp_country`, `amp_funk`, `amp_jazz`, `amp_metal`, `amp_pop`, `amp_rock`, `amp_ranking`) VALUES
(1, 'Vox', 'AC15C1', 700, 1, 1, 0, 0, 0, 1, 1, 1),
(2, 'Fender', 'Princeton', 600, 1, 1, 1, 1, 0, 1, 0, NULL),
(4, 'Marshall', 'JCM800', 1500, 1, 0, 0, 0, 1, 0, 1, 1),
(5, 'Peavy', '6505 120w Amp Head', 789, 0, 0, 0, 0, 1, 0, 1, NULL),
(6, 'Blackstar', 'Fly 3 Mini Amp', 75, 1, 1, 1, 1, 0, 1, 1, 5),
(7, 'Orange', 'Micro Dark Valve Hybrid Guitar Amp Head', 145, 1, 0, 0, 0, 1, 0, 1, 3),
(8, 'Orange', 'Crush 20RT Combo', 149, 1, 1, 1, 1, 1, 1, 1, 2),
(9, 'Marshall', 'MG50GFX Gold 50W Guitar Combo', 249, 1, 1, 1, 1, 1, 1, 1, 2),
(10, 'Boss', 'Katana 50 MKII 1x12 Combo', 235, 1, 1, 1, 1, 1, 1, 1, 2),
(11, 'Boss', 'Katana 100 MKII 1x12 Combo', 359, 1, 1, 1, 1, 1, 1, 1, 3),
(12, 'Marshall', 'ORI50H Origin 50W Valve Head', 499, 1, 1, 0, 0, 0, 1, 1, 1),
(13, 'Vox', 'AC30S1', 779, 1, 1, 0, 1, 0, 1, 1, NULL),
(14, 'Behringer', 'HA-20R 20W Guitar Combo Amp', 99, 1, 1, 1, 1, 0, 1, 1, NULL),
(15, 'Roland', 'Cube 10GX Guitar Amplifier', 136, 1, 1, 1, 1, 0, 1, 1, 1),
(16, 'Yamaha', 'THR5 Guitar Amp', 219, 1, 1, 1, 1, 0, 1, 1, NULL),
(17, 'Orange', 'Pedal Baby 100 Power Amp', 279, 1, 1, 1, 1, 0, 1, 0, NULL),
(18, 'Bugera', 'G20 Infinium 20W Class-A Tube Amplifier Head', 319, 1, 1, 0, 0, 1, 0, 1, NULL),
(19, 'Orange', 'Super Crush 100 Head', 399, 1, 1, 1, 1, 1, 1, 1, 1),
(20, 'PRS', 'HX 50 Hendrix Guitar Head', 2799, 1, 1, 0, 0, 0, 1, 1, NULL),
(21, 'Fender', '57 Custom Deluxe', 2249, 1, 1, 1, 1, 0, 1, 1, NULL),
(22, 'Marshall', '1959HW Plexi Handwired Reissue Valve Head', 1999, 1, 1, 0, 0, 1, 1, 1, NULL),
(23, 'Fender', '65 Twin Reverb', 1929, 1, 0, 1, 1, 0, 1, 0, 4),
(24, 'Fender', '59 Bassman Valve Guitar Amp', 1899, 1, 1, 1, 1, 0, 1, 1, NULL),
(25, 'Marshall', '2555X Silver Jubilee Reissue Valve Head', 1515, 0, 0, 0, 0, 1, 0, 1, NULL),
(26, 'Fender', '68 Custom Deluxe Reverb', 1349, 1, 1, 1, 1, 0, 1, 0, 1),
(27, 'Revv', 'G20 Lunchbox Valve Head w/ Two Notes Cab Emulation', 1299, 1, 0, 0, 0, 1, 0, 1, NULL),
(28, 'Vox', 'AC15C1X Custom Combo w/ Celestion Blue', 1066, 1, 1, 0, 1, 0, 1, 1, NULL),
(29, 'Orange', 'Rocker 32 Combo', 839, 1, 1, 0, 0, 1, 1, 1, NULL),
(30, 'Fender', 'Bassbreaker 30R Combo', 749, 1, 1, 0, 1, 0, 1, 1, 2),
(31, ' Magnatone', 'Twilighter Stereo 2x12" Valve Amp Combo', 4299, 1, 1, 1, 1, 0, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guitars`
--

CREATE TABLE `guitars` (
  `guitar_id` int(11) NOT NULL,
  `guitar_brand` varchar(50) NOT NULL,
  `guitar_model` varchar(50) NOT NULL,
  `guitar_price` int(11) NOT NULL,
  `guitar_blues` tinyint(1) DEFAULT NULL,
  `guitar_country` tinyint(1) DEFAULT NULL,
  `guitar_funk` tinyint(1) DEFAULT NULL,
  `guitar_jazz` tinyint(1) DEFAULT NULL,
  `guitar_metal` tinyint(1) DEFAULT NULL,
  `guitar_pop` tinyint(1) DEFAULT NULL,
  `guitar_rock` tinyint(1) DEFAULT NULL,
  `guitar_ranking` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guitars`
--

INSERT INTO `guitars` (`guitar_id`, `guitar_brand`, `guitar_model`, `guitar_price`, `guitar_blues`, `guitar_country`, `guitar_funk`, `guitar_jazz`, `guitar_metal`, `guitar_pop`, `guitar_rock`, `guitar_ranking`) VALUES
(33, 'Gibson', 'SG Standard \'61', 1600, 1, 1, 0, 0, 1, 1, 1, 2),
(34, 'Squire', 'FSR Classic Vibe Jaguar', 399, 0, 1, 1, 1, 0, 1, 0, 8),
(35, 'Epiphone', '1959 Les Paul Standard', 749, 1, 0, 0, 0, 1, 1, 1, 1),
(36, 'Eastcoast', 'T1 Electric Guitar', 119, 1, 1, 1, 1, 0, 1, 1, 2),
(37, 'Fender', 'Kingfish Telecaster Deluxe RW', 2349, 1, 0, 0, 0, 1, 0, 1, NULL),
(38, 'Yamaha', 'Pacifica 112V', 249, 1, 1, 1, 0, 0, 1, 0, 4),
(39, 'Squire', 'Contemporary Stratocaster Special RMN', 329, 0, 0, 0, 0, 0, 1, 1, 1),
(40, 'Aria', '615-MK2', 329, 1, 0, 0, 0, 0, 1, 1, NULL),
(41, 'Knoxville', 'Electric Guitar T-Type', 100, 0, 1, 0, 0, 0, 1, 0, NULL),
(42, 'ESP', 'James Hetfield Iron Cross', 5799, 0, 0, 0, 0, 1, 0, 1, NULL),
(43, 'PRS', 'Custom 24', 5299, 1, 1, 0, 0, 1, 1, 1, NULL),
(44, 'Gibson', 'Les Paul Custom', 4699, 1, 0, 0, 0, 1, 0, 1, NULL),
(45, 'Fender', 'Custom Shop 1963 Jaguar Journeyman Relic', 3799, 1, 1, 1, 1, 0, 1, 1, 1),
(46, 'Gretsch', 'G6136T-59GE White Falcon with Bigsby', 3599, 1, 1, 0, 1, 0, 1, 1, 2),
(47, 'Gibson', 'ES-345', 2999, 1, 0, 0, 1, 0, 1, 1, 1),
(48, 'Rickenbacker', '360', 2799, 1, 1, 1, 1, 0, 1, 1, 1),
(49, 'Squire', 'Contemporary Active Jazzmaster HH', 399, 1, 0, 0, 0, 1, 0, 1, 2),
(50, 'Gibson', 'Custom Shop Murphy Lab 1964 Trini Lopez', 5579, 1, 1, 0, 1, 0, 1, 1, 1),
(51, 'Squire', 'Classic Vibe 70s Telecaster Thinline', 347, 1, 1, 0, 0, 0, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pedals`
--

CREATE TABLE `pedals` (
  `pedal_id` int(11) NOT NULL,
  `pedal_brand` text NOT NULL,
  `pedal_model` char(50) NOT NULL,
  `pedal_type` text NOT NULL,
  `pedal_price` int(11) NOT NULL,
  `pedal_blues` tinyint(1) NOT NULL,
  `pedal_country` tinyint(1) NOT NULL,
  `pedal_funk` tinyint(1) NOT NULL,
  `pedal_jazz` tinyint(1) NOT NULL,
  `pedal_metal` tinyint(1) NOT NULL,
  `pedal_pop` tinyint(1) NOT NULL,
  `pedal_rock` tinyint(1) NOT NULL,
  `pedal_ranking` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedals`
--

INSERT INTO `pedals` (`pedal_id`, `pedal_brand`, `pedal_model`, `pedal_type`, `pedal_price`, `pedal_blues`, `pedal_country`, `pedal_funk`, `pedal_jazz`, `pedal_metal`, `pedal_pop`, `pedal_rock`, `pedal_ranking`) VALUES
(2, 'Boss', 'DS-2', 'overdrive', 60, 0, 0, 1, 0, 1, 0, 1, NULL),
(3, 'TC Electronic', 'Wiretap Riff Recorder', 'other', 25, 1, 1, 1, 1, 1, 1, 1, 1),
(4, 'TC Electronic', 'Skysurfer Mini Reverb Pedal', 'time_based', 42, 1, 1, 1, 0, 0, 1, 1, NULL),
(5, 'TC Electronic', 'Polytune 3 Mini', 'other', 83, 1, 1, 1, 1, 1, 1, 1, 1),
(6, 'Boss', 'DS-1W Waza Craft Distortion Pedal', 'overdrive', 125, 0, 0, 0, 0, 1, 0, 1, 1),
(7, 'EarthQuaker Devices', 'Hummingbird V4 Repeated Percussions Tremolo', 'time_based', 219, 1, 0, 1, 0, 1, 1, 1, NULL),
(8, 'SubZero', 'Aurora Autowah Micro Pedal', 'wah', 20, 0, 0, 0, 0, 1, 0, 1, NULL),
(9, 'SubZero', 'Avalanche Compressor Micro Guitar Pedal', 'other', 20, 0, 1, 1, 1, 0, 1, 0, NULL),
(10, 'SubZero', 'Slick Lick Vintage Overdrive Pedal', 'overdrive', 20, 1, 0, 0, 0, 0, 0, 1, NULL),
(11, 'NUX', 'Steel Singer Drive', 'overdrive', 30, 1, 0, 0, 0, 0, 1, 1, NULL),
(12, 'TC Electronic', 'Cinders Overdrive Pedal', 'overdrive', 39, 1, 1, 0, 0, 0, 1, 1, NULL),
(13, 'SubZero', 'Space And Time Digital Reverb Pedal', 'time_based', 50, 1, 0, 1, 1, 0, 1, 1, 1),
(14, 'Vox', 'V845 Wah', 'wah', 57, 1, 0, 0, 0, 1, 0, 1, NULL),
(15, 'TC Electronic', 'Spark Mini Booster', 'boost', 56, 1, 0, 0, 0, 1, 1, 1, NULL),
(16, 'Electro Harmonix', 'Hot Tubes Distortion', 'overdrive', 69, 0, 0, 0, 0, 1, 0, 1, 1),
(17, 'Fender', 'Hammertone Digital Delay Pedal', 'time_based', 71, 0, 0, 0, 0, 1, 1, 1, NULL),
(18, 'Fender', 'Hammertone Reverb Pedal', 'time_based', 71, 1, 1, 1, 1, 1, 1, 1, NULL),
(19, 'Electro Harmonix', 'Nano Big Muff Pi Distortion', 'overdrive', 75, 0, 0, 0, 0, 1, 0, 1, NULL),
(20, 'Boss', 'MD-2 Mega Distortion Guitar Pedal', 'overdrive', 85, 0, 0, 0, 0, 1, 0, 1, NULL),
(21, 'Dunlop', 'GCB95 CryBaby Wah Pedal', 'wah', 89, 1, 0, 0, 0, 1, 0, 1, NULL),
(22, 'MXR', 'M101 Phase 90 Guitar Effects Pedal', 'modulation', 93, 1, 0, 0, 1, 1, 1, 1, NULL),
(23, 'Boss', 'BD-2 Blues Driver', 'overdrive', 94, 1, 1, 0, 0, 0, 0, 1, NULL),
(24, 'TC Electronic', 'Corona Mini Chorus Pedal', 'modulation', 93, 0, 0, 1, 0, 0, 1, 1, NULL),
(25, 'MXR', 'M133 Micro Amp Pedal', 'boost', 93, 1, 0, 0, 0, 1, 1, 1, NULL),
(26, 'Boss', 'CH-1 Super Chorus Pedal', 'modulation', 99, 1, 1, 1, 0, 0, 1, 1, NULL),
(27, 'Fender', 'Lost Highway Phaser', 'modulation', 109, 1, 0, 1, 0, 0, 1, 1, 1),
(28, 'Fender', 'Bubbler Analog Chorus & Vibrato', 'modulation', 109, 1, 1, 1, 1, 0, 1, 1, NULL),
(29, 'JHS Pedals', '3 Series Compressor', 'other', 115, 0, 1, 1, 0, 0, 1, 1, NULL),
(30, 'Strymon', 'Riverside Multistage Drive Pedal', 'overdrive', 288, 1, 1, 0, 0, 1, 1, 1, NULL),
(31, 'Strymon', 'Blue Sky Reverberator', 'time_based', 288, 1, 1, 1, 1, 0, 1, 1, 1),
(32, 'Strymon', 'Flint Tremolo & Reverb', 'time_based', 309, 1, 1, 1, 1, 0, 1, 1, NULL),
(33, 'Strymon', 'Lex V2 Rotary Effect Pedal', 'other', 329, 1, 0, 1, 1, 0, 1, 1, 1),
(34, 'Strymon', 'Mobius Multi-Modulation Pedal', 'modulation', 411, 1, 1, 1, 1, 1, 1, 1, NULL),
(35, 'Strymon', 'Big Sky Multi Reverb Pedal', 'time_based', 449, 1, 1, 1, 1, 1, 1, 1, NULL),
(36, 'Strymon', 'TimeLine Delay Pedal', 'time_based', 429, 1, 1, 1, 1, 1, 1, 1, 1),
(37, 'Strymon', 'Volante Magnetic Echo Machine', 'time_based', 399, 1, 1, 1, 1, 1, 1, 1, NULL),
(38, 'Strymon', 'Iridium Amp & IR Cab Simulator', 'other', 377, 1, 1, 1, 1, 1, 1, 1, NULL),
(39, 'Strymon', 'DIG v2 Dual Delay Pedal', 'time_based', 351, 1, 1, 1, 1, 1, 1, 1, 1),
(40, 'No', 'Pedal', 'other', 0, 1, 1, 1, 1, 1, 1, 1, 1),
(41, 'Line 6', 'Helix HX Effects Multi FX Pedal', 'other', 439, 1, 1, 1, 1, 1, 1, 1, NULL),
(42, 'Boss', 'SD-1', 'overdrive', 65, 1, 0, 0, 0, 0, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `query_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `query_budget` int(11) NOT NULL,
  `query_genre` text NOT NULL,
  `query_gigging` tinyint(1) NOT NULL,
  `guitar_id` int(11) NOT NULL,
  `amp_id` int(11) NOT NULL,
  `pedal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`query_id`, `user_id`, `query_budget`, `query_genre`, `query_gigging`, `guitar_id`, `amp_id`, `pedal_id`) VALUES
(2, 26, 3000, 'blues', 1, 40, 4, 34),
(3, 26, 10000, 'jazz', 1, 47, 21, 39),
(4, 28, 3000, 'jazz', 1, 34, 30, 32),
(5, 28, 6000, 'metal', 1, 33, 25, 30),
(6, 28, 2501, 'funk', 1, 38, 2, 33),
(7, 28, 20000, 'pop', 1, 46, 29, 29),
(8, 28, 3000, 'blues', 0, 35, 29, 12),
(9, 28, 3000, 'jazz', 1, 34, 28, 28),
(10, 28, 9755, 'pop', 1, 38, 28, 40),
(11, 28, 9755, 'pop', 1, 47, 26, 39),
(12, 28, 9755, 'pop', 1, 35, 29, 36),
(13, 28, 9755, 'pop', 1, 36, 24, 37),
(14, 28, 6000, 'metal', 1, 33, 5, 37),
(15, 28, 6000, 'metal', 1, 33, 11, 8),
(16, 28, 6000, 'metal', 1, 35, 10, 36),
(17, 28, 6000, 'metal', 1, 33, 22, 22),
(18, 28, 6000, 'metal', 1, 35, 19, 16),
(19, 28, 3000, 'funk', 1, 34, 26, 18),
(20, 28, 3000, 'funk', 1, 38, 19, 28),
(21, 28, 20000, 'funk', 1, 45, 21, 27),
(22, 28, 20000, 'metal', 1, 42, 22, 35),
(23, 28, 4000, 'country', 1, 34, 22, 35),
(24, 28, 6000, 'pop', 1, 34, 23, 27),
(25, 28, 6000, 'pop', 1, 34, 23, 27),
(26, 28, 6000, 'pop', 1, 34, 23, 27),
(27, 28, 1200, 'blues', 1, 38, 6, 40),
(28, 28, 6000, 'jazz', 0, 47, 30, 31),
(29, 28, 1000, 'jazz', 0, 34, 10, 40),
(30, 29, 6900, 'rock', 1, 33, 4, 16),
(31, 29, 2000, 'jazz', 1, 34, 8, 13),
(32, 29, 4200, 'pop', 0, 35, 1, 36),
(33, 29, 20000, 'jazz', 0, 46, 23, 39),
(34, 29, 850, 'blues', 0, 38, 9, 40),
(35, 29, 2000, 'funk', 0, 34, 19, 5),
(36, 29, 3500, 'pop', 1, 34, 30, 36),
(37, 29, 1000, 'pop', 1, 38, 11, 40),
(38, 31, 5000, 'rock', 1, 33, 12, 6),
(39, 31, 6000, 'funk', 0, 48, 26, 33),
(40, 31, 2000, 'pop', 1, 34, 9, 27),
(41, 31, 400, 'country', 0, 38, 6, 40),
(42, 31, 700, 'jazz', 1, 36, 11, 40),
(43, 31, 1000, 'metal', 0, 49, 10, 40),
(44, 32, 20000, 'funk', 1, 45, 23, 31),
(45, 25, 500, 'rock', 0, 39, 15, 40),
(46, 25, 500, 'rock', 0, 51, 7, 40),
(47, 25, 500, 'rock', 0, 51, 7, 40),
(48, 35, 750, 'metal', 0, 49, 7, 40),
(49, 35, 500000, 'jazz', 0, 50, 11, 3),
(50, 36, 500, 'pop', 0, 36, 6, 40);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fname` text NOT NULL,
  `user_sname` text NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_points` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_sname`, `user_username`, `user_email`, `user_password`, `user_points`) VALUES
(24, 'Cooba', 'North', 'coobanorth', 'Coob@North', '$2y$10$Tr2BzwgBaPiM6a/9.mZ1vuKL2Py0A3R0j4dkuEks3RkcpuIhoIIdO', 0),
(25, 'joe', 'lucas', 'joe', 'lucas.16@gosfordhillschool.org', '$2y$10$o9ThR9WCrUZv/lmwXcwQf.9mDgbf/8YFa0IsNuWlTLV2J9ctnq0Zy', 100000004),
(26, 'Test', '5', 'Test5', 'Test5@test.org', '$2y$10$QoDVN9312Xz3WM869LW8PuNT36zyAryFGX2Nq3q5gw3mcDbQK.i/G', 0),
(27, 'T6', '6T', 'T6', 't6@123', '$2y$10$XRL4B6NCLdMDsd8W48GB.uvXcRligosaSR/gErLN5BYG2CG2MQfFW', 0),
(28, 'admin', 'admin', 'admin', 'admim@email.com', '$2y$10$8JDz1T5NUn/OOIW3v2rfqebHLY5VMVQh70E8yQoS4RGO.qHMq4RgW', 25),
(29, 'Big', 'John', 'BigJohn420', 'BigJohn420@nintendo.com', '$2y$10$Sv4RSdrz67zEV5v2sNxhFegt/mREcIcsKhyOK1KrLffIl16rzrw3S', 8),
(31, 'Video', 'Test', 'video_test', 'video_test@email.com', '$2y$10$zP6OuCXz/Lw4OExib9aOkuz0/1M7OozszEqfmQWDStocRMP3mlqqC', 10),
(32, 'Rory', 'Gauld', 'Rozza is Jamming', 'roryagauld@gmail.com', '$2y$10$juEz3fHzjsvNlwgDoCvPPeepoNuBvg3S/5RxaOW9d0iW1SgkyizQe', 20),
(35, 'Bob', 'Smith', 'bob123', 'plee@gosfordhillschool.org', '$2y$10$fmtfw0DUeH3LEwhbLDowdetUYGKKEPz9Lc/NLUxVX3KS5PZT9hG2W', 3),
(36, 'andy', 'north', 'andynorth', 'andynorth3@gmail.com', '$2y$10$fSz1XC416uuPtcBCrX2mp.hNBTFCrGql9fTXP730ayVUD4c23V0US', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amps`
--
ALTER TABLE `amps`
  ADD PRIMARY KEY (`amp_id`),
  ADD UNIQUE KEY `amp_model` (`amp_model`);

--
-- Indexes for table `guitars`
--
ALTER TABLE `guitars`
  ADD PRIMARY KEY (`guitar_id`),
  ADD UNIQUE KEY `guitar_model` (`guitar_model`);

--
-- Indexes for table `pedals`
--
ALTER TABLE `pedals`
  ADD PRIMARY KEY (`pedal_id`),
  ADD UNIQUE KEY `pedal_model` (`pedal_model`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amps`
--
ALTER TABLE `amps`
  MODIFY `amp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `guitars`
--
ALTER TABLE `guitars`
  MODIFY `guitar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `pedals`
--
ALTER TABLE `pedals`
  MODIFY `pedal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

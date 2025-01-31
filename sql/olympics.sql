-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2025 at 11:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olympics`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminprofile`
--

CREATE TABLE `adminprofile` (
  `adminID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `dateOfBirth` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminprofile`
--

INSERT INTO `adminprofile` (`adminID`, `firstName`, `lastName`, `photo`, `dateOfBirth`, `email`, `phoneNumber`, `password`, `gender`, `country`) VALUES
(1, 'Kaye Niña', 'Cristobal', 'assets/admin.jpg', '2002-11-12', 'kayeninacristobal@admin.com', '09214305263', '$2y$10$tFuwYD2kh4RBK5zldZSEc.J61HcYAwj2YsX7uYQkMiAuEq6vhS7Qi', 'female', 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `athleticdetails`
--

CREATE TABLE `athleticdetails` (
  `athleticID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `sportDiscipline` varchar(50) DEFAULT NULL,
  `specialtyCategory` varchar(50) DEFAULT NULL,
  `team` varchar(50) DEFAULT NULL,
  `coachName` varchar(50) DEFAULT NULL,
  `motto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `athleticdetails`
--

INSERT INTO `athleticdetails` (`athleticID`, `userID`, `sportDiscipline`, `specialtyCategory`, `team`, `coachName`, `motto`) VALUES
(1, 1, 'Basketball', 'Point Guard', 'Raptors Elite', 'Coach Simmons', 'Success is not final, failure is not fatal: It is the courage to continue that counts.'),
(2, 2, 'Swimming', 'Freestyle', 'Aqua Warriors', 'Coach Rivera', 'The road to success is not easy to navigate, but with perseverance, dedication, and a clear vision, nothing is impossible.'),
(3, 3, 'Tennis', 'Singles', 'Court Legends', 'Coach Baxter', 'Chase your dreams relentlessly, never settle for mediocrity, and strive to be the best version of yourself every single day.'),
(4, 4, 'Soccer', 'Striker', 'Striker Kings', 'Coach Delgado', 'The strength to keep moving forward is found not in what we accomplish, but in how we handle challenges and turn them into opportunities.'),
(5, 5, 'Gymnastics', 'Floor Exercise', 'Graceful Flyers', 'Coach Henderson', 'Believe in the impossible, work with passion, and turn dreams into reality.'),
(6, 6, 'Volleyball', 'Libero', 'Net Defenders', 'Coach Thompson', 'Embrace the challenges, push past your limits, and grow stronger every day.'),
(7, 7, 'Rugby', 'Forward', 'Iron Titans', 'Coach Capello', 'Champions are made through preparation, discipline, and perseverance.'),
(8, 8, 'Track and Field', '100m Sprint', 'Lightning Bolts', 'Coach Wheeler', 'It’s not just speed, it’s passion that drives you to the finish line.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `passWord` varchar(255) DEFAULT NULL,
  `confirmPW` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `photo`, `dateOfBirth`, `gender`, `country`, `phoneNumber`, `email`, `passWord`, `confirmPW`) VALUES
(1, 'Paul', 'Abuleigh', 'uploads/abuleigh.jpg', '1990-07-15', 'male', 'Canada', '+1 (647) 555-78', 'paul.abuleigh90@example.com', '$2y$10$YoSgimUDUzoaERUkA2dhSeZCTHCU/auB5x3LkfIE33bc2n56SRPJK', '$2y$10$YoSgimUDUzoaERUkA2dhSeZCTHCU/auB5x3LkfIE33bc2n56SRPJK'),
(2, 'Queenie', 'Asmin', 'uploads/asmin.jpg', '1998-02-22', 'female', 'Philippines', '+63 917 555 123', 'queenie.asmin98@example.com', '$2y$10$KDZklWIvhxXecQ3s.hPjs./l54.YZ2ho9r4LbiYk1kw8rg0XMsQpG', '$2y$10$KDZklWIvhxXecQ3s.hPjs./l54.YZ2ho9r4LbiYk1kw8rg0XMsQpG'),
(3, 'Alyce', 'Gorr', 'uploads/gorr.jpg', '1995-03-10', 'female', 'Australia', '+61 412 555 678', 'alyce.gorr95@example.com', '$2y$10$6XHG9BpPaN5HdohH1KutmuQCO1JxffX0Fj2an04K.vg8SwEx1R3Yq', '$2y$10$6XHG9BpPaN5HdohH1KutmuQCO1JxffX0Fj2an04K.vg8SwEx1R3Yq'),
(4, 'Boy', 'Lingo', 'uploads/lingo.jpg', '1989-01-15', 'male', 'United States', '+1 (305) 555-78', 'boy.lingo89@example.com', '$2y$10$E8Vbsx3TnWU9cw4X9n0qAOPsZh4ITH7N2HnDIzCuDYS/CbPJPjvmW', '$2y$10$E8Vbsx3TnWU9cw4X9n0qAOPsZh4ITH7N2HnDIzCuDYS/CbPJPjvmW'),
(5, 'Angela', 'Mollusk', 'uploads/mollusk.jpg', '1992-06-28', 'female', 'Canada', '+1 (416) 555-23', 'angela.mollusk92@example.com', '$2y$10$Ei3UHCd/qjwonRhlGSoTTecO8pG8cmL7LweyJw6WFZml6zCxSZ8Y.', '$2y$10$Ei3UHCd/qjwonRhlGSoTTecO8pG8cmL7LweyJw6WFZml6zCxSZ8Y.'),
(6, 'Sarah', 'Potts', 'uploads/potts.jpg', '1997-11-03', 'female', ' United Kingdom', '+44 7700 555 12', 'sarah.potts97@example.co.uk', '$2y$10$5H4XfllFcuaJhvzbMk4fs.mwVd.MdqruDTnjGMzOhpYMH99a2AQ7u', '$2y$10$5H4XfllFcuaJhvzbMk4fs.mwVd.MdqruDTnjGMzOhpYMH99a2AQ7u'),
(7, 'Tony', 'Pullova', 'uploads/pullova.jpg', '1991-08-19', 'male', 'Italy', '+39 345 555 678', 'tony.pullova91@example.it', '$2y$10$bMwY0Gs5sqBrwIFsalqUwu9Jtv49vQZrbC3mTrox3vC5Gj7Z/kcja', '$2y$10$bMwY0Gs5sqBrwIFsalqUwu9Jtv49vQZrbC3mTrox3vC5Gj7Z/kcja'),
(8, 'Jane', 'Swyft', 'uploads/swyft.jpg', '1988-09-12', 'female', 'New Zealand', '+64 21 555 4321', 'jane.swyft88@example.nz', '$2y$10$xT2etkwwbzsXlm0.0Zc/S.hd9//CdcnNoboTTjhc94xPj80Ah7Z2e', '$2y$10$xT2etkwwbzsXlm0.0Zc/S.hd9//CdcnNoboTTjhc94xPj80Ah7Z2e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminprofile`
--
ALTER TABLE `adminprofile`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `athleticdetails`
--
ALTER TABLE `athleticdetails`
  ADD PRIMARY KEY (`athleticID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminprofile`
--
ALTER TABLE `adminprofile`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `athleticdetails`
--
ALTER TABLE `athleticdetails`
  MODIFY `athleticID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `athleticdetails`
--
ALTER TABLE `athleticdetails`
  ADD CONSTRAINT `athleticdetails_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

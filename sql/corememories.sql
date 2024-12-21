-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 01:26 AM
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
-- Database: `corememories`
--

-- --------------------------------------------------------

--
-- Table structure for table `islandcontents`
--

CREATE TABLE `islandcontents` (
  `islandContentID` int(4) NOT NULL,
  `islandOfPersonalityID` int(4) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `content` varchar(300) NOT NULL,
  `color` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islandcontents`
--

INSERT INTO `islandcontents` (`islandContentID`, `islandOfPersonalityID`, `image`, `content`, `color`) VALUES
(1, 1, 'sportyIsland1.jpeg', '<b>Arnis:</b> <i>I learned self-discipline and self-defense here.</i>', '#FF3829'),
(2, 1, 'sportyIsland2.jpg', '<b>Badminton:</b> <i>This sport taught me that it doesn’t matter how many times you’ve tried; the important thing is you’ve learned something.</i>', '#FF3829'),
(3, 1, 'sportyIsland3.jpg', '<b>First Championship:</b> <i>I remember having so much energy here, even though I didn’t yet have my MVP trophy.</i>', '#FF3829'),
(4, 1, 'sportyIsland4.jpg', '<b>Back-to-Back Champs:</b> <i>This made me realize that small wins are still wins. We won’t always get what we want in just one snap; we need to work hard for it.</i>', '#FF3829'),
(5, 1, 'sportyIsland5.jpg', '<b>Basketball at Sintang Paaralan:</b> <i>I wasn’t satisfied with my performance here, but I gained knowledge and friends, which is the most important part.</i>', '#FF3829'),
(6, 1, 'sportyIsland6.jpeg', '<b>Mythical Five:</b> <i>Becoming the captain here boosted my confidence and helped me become one of the top scorers.</i>', '#FF3829'),
(7, 1, 'sportyIsland7.jpeg', '<b>Champs, baby!:</b> <i>Through our love for the sport, we took home the crown.</i>', '#FF3829'),
(8, 2, 'pageantryIsland1.jpg', '<b>Little Kid:</b> <i>I don’t exactly remember what happened here, but I was happy because I saw myself on television at the time!</i>', '#854AFF'),
(9, 2, 'pageantryIsland2.jpg', '<b>Not so little:</b> <i>I felt complete here since my father watched me ramp.</i>', '#854AFF'),
(10, 2, 'pageantryIsland3.jpg', '<b>Miss Photogenic:</b> <i>I felt grateful because the other candidates were deserving too.</i>', '#854AFF'),
(11, 2, 'pageantryIsland4.jpg', '<b>Gained Weight:</b> <i>Many years have passed, but I still don’t know our ranking from this event.</i>', '#854AFF'),
(12, 2, 'pageantryIsland5.jpg', '<b>Miss Scientia:</b> <i>I remember not knowing how to model properly, but God granted my wish.</i>', '#854AFF'),
(13, 2, 'pageantryIsland6.jpg', '<b>Second RU:</b> <i>What I realized here is that the world won’t stop if you stop, so keep going.</i>', '#854AFF'),
(14, 2, 'pageantryIsland7.jpg', '<b>Lakambini:</b> <i>Indeed, what’s meant for you will come to you, no matter what happens.</i>', '#854AFF'),
(15, 2, 'pageantryIsland8.jpg', '<b>Binibini:</b> <i>This was my TOTGA. It felt so close, yet just out of reach. But it made me stronger and reminded me that a win is still a win.</i>', '#854AFF'),
(16, 2, 'pageantryIsland9.jpg', '<b>Sintafest:</b> <i>I didn’t expect to place because I didn’t prepare much, but life is good and allowed me to.</i>', '#854AFF'),
(17, 3, 'copilotIsland1.jpg', '<b>My solace:</b> <i>During moments of exhaustion and doubt, when the thought of continuing almost slipped away, I found her.</i>', '#FFDF00'),
(18, 3, 'copilotIsland2.jpg', '<b>My safe haven:</b> <i>She made me realize that I want to hold her until the strands of my hair turn gray, my face bears graceful lines, and my mind recalls nothing but her lovely visage.</i>', '#FFDF00'),
(19, 3, 'copilotIsland3.jpg', '<b>My dream:</b> <i>I love loving her, and I’m happiest when I’m with her.</i>', '#FFDF00'),
(20, 3, 'copilotIsland4.jpg', '<b>My strength:</b> <i>She is one of the reasons why I become better each day. I feel incredibly blessed to have her.</i>', '#FFDF00'),
(21, 3, 'copilotIsland5.jpg', '<b>My one and only:</b> <i>She captivates my heart in everything she does. Kung totoo man ang iba\'t ibang mundo, sana sa bawat ako, makita nila \'yung siya.</i>', '#FFDF00'),
(22, 3, 'copilotIsland6.jpg', '<b>My wifey:</b> <i>She made me feel content with what I have right now and made me see that I want to experience it forever.</i>', '#FFDF00'),
(23, 3, 'copilotIsland7.jpg', '<b>My woman:</b> <i>She makes every moment feel like a whispered verse of a love story.</i>', '#FFDF00'),
(24, 3, 'copilotIsland8.jpg', '<b>My perfect algorithm:</b> <i>Through her love, I feel like I can do anything and everything.</i>', '#FFDF00'),
(25, 4, 'friendshipIsland1.jpg', '<b>JHS Friends:</b> <i>They made me believe in the saying that nothing’s permanent.</i>', '#2A62FF'),
(26, 4, 'friendshipIsland2.png', '<b>SHS Friends:</b> <i>They taught me that friendship should not be demanding.</i>', '#2A62FF'),
(27, 4, 'friendshipIsland3.jpg', '<b>Ates:</b> <i>They taught me to be a strong, independent ghorlie.</i>', '#2A62FF'),
(28, 4, 'friendshipIsland4.jpg', '<b>First college buddies:</b> <i>They made me feel that it’s okay to explore and spread my wings.</i>', '#2A62FF'),
(29, 4, 'friendshipIsland5.jpg', '<b>PPG:</b> <i>Doing acads while enjoying.</i>', '#2A62FF'),
(30, 4, 'friendshipIsland6.jpeg', '<b>For keeps:</b> <i>This outing made our bond stronger than ever.</i>', '#2A62FF'),
(31, 4, 'friendshipIsland7.jpg', '<b>Memorable:</b> <i>They made me feel that friendship is about letting each other win. No one is left behind.</i>', '#2A62FF'),
(32, 4, 'friendshipIsland8.jpg', '<b>Complete:</b> <i>Having friends is like winning trophies.</i>', '#2A62FF'),
(33, 5, 'leadershipIsland1.jpg', '<b>Out of my comfort zone:</b> <i>Leadership made me feel seen and heard.</i>', '#88C82C'),
(34, 5, 'leadershipIsland2.jpg', '<b>Registration:</b> <i>It taught me to be responsible and take charge.</i>', '#88C82C'),
(35, 5, 'leadershipIsland3.jpg', '<b>Hosting:</b> <i>I can now do what I couldn’t before.</i>', '#88C82C'),
(36, 5, 'leadershipIsland4.jpeg', '<b>Classroom Officers:</b> <i>Leadership starts with the small roles.</i>', '#88C82C'),
(37, 5, 'leadershipIsland5.jpeg', '<b>GDSC:</b> <i>It made me believe that leadership is about being selfless and helping others grow.</i>', '#88C82C'),
(38, 5, 'leadershipIsland6.jpg', '<b>Motivation:</b> <i>Leaders must inspire, not just give instructions.</i>', '#88C82C'),
(39, 5, 'leadershipIsland7.jpg', '<b>My growth:</b> <i>Leadership helped me step out of my comfort zone, learn from failures, and emerge stronger.</i>', '#88C82C');

-- --------------------------------------------------------

--
-- Table structure for table `islandsofpersonality`
--

CREATE TABLE `islandsofpersonality` (
  `islandOfPersonalityID` int(4) NOT NULL,
  `name` varchar(40) NOT NULL,
  `shortDescription` varchar(300) DEFAULT NULL,
  `longDescription` varchar(900) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islandsofpersonality`
--

INSERT INTO `islandsofpersonality` (`islandOfPersonalityID`, `name`, `shortDescription`, `longDescription`, `color`, `image`, `status`) VALUES
(1, 'Sporty Island', 'The Love for Sports', 'My elementary sports was arnis, my high school sports are basketball and badminton. Now college is basketball only. This reflects my competitive spirit and strong sportsmanship.', '#FF3829', 'sportyIsland.png', 'ACTIVE'),
(2, 'Pageantry Island', 'A Passion for Beauty and Elegance', 'Pageantry has been a key part of my life, shaping my confidence and poise in social situations. It encourages my love for the arts and enhances my communication skills.', '#854AFF', 'pageantryIsland.png', 'ACTIVE'),
(3, 'Co-Pilot Island', 'Finding Peace and Love in One Person', 'A meaningful relationship is the foundation of peace and happiness in my life. I have learned that true fulfillment comes from finding a partner who shares your values, brings joy, and supports your growth.', '#FFDF00', 'copilotIsland.png', 'ACTIVE'),
(4, 'Friendship Island', 'Building Lasting Connections', 'Friendship is one of the most important values in my life. It’s about trust, mutual respect, and supporting each other through life\'s ups and downs.', '#2A62FF', 'friendshipIsland.png', 'ACTIVE'),
(5, 'Leadership Island', 'Guiding and Inspiring Teams', 'As a leader, I am dedicated to inspiring and motivating others. I strive to lead by example, encourage teamwork, and build strong communities wherever I go.', '#88C82C', 'leadershipIsland.png', 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `islandcontents`
--
ALTER TABLE `islandcontents`
  ADD PRIMARY KEY (`islandContentID`);

--
-- Indexes for table `islandsofpersonality`
--
ALTER TABLE `islandsofpersonality`
  ADD PRIMARY KEY (`islandOfPersonalityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `islandcontents`
--
ALTER TABLE `islandcontents`
  MODIFY `islandContentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `islandsofpersonality`
--
ALTER TABLE `islandsofpersonality`
  MODIFY `islandOfPersonalityID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

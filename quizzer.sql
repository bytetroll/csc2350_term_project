-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2016 at 08:05 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quizzer`
--

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE IF NOT EXISTS `quizes` (
  `QuizID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `Data` text NOT NULL,
  `Name` text NOT NULL,
  `Answers` text NOT NULL,
  PRIMARY KEY (`QuizID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`QuizID`, `UserID`, `Data`, `Name`, `Answers`) VALUES
(1, 1, '[["Am I a robot?",["Yes","How would I know?"]],["Question",["True","False"]],["Question",["True","False"]]]', 'Excistensial Crisis Quiz', '["1","1","1"]'),
(2, 1, '[["Am I a robot?",["Yes","How would I know?"]],["Question",["True","False"]],["Question",["True","False"]]]', 'Excistensial Crisis Quiz', '["1","1","1"]'),
(3, 4, '[["Am I a robot?",["Yes","How would I know?"]],["Question",["True","False"]],["Question",["True","False"]],["Question",["True","False"]],["Question",["True","False"]]]', 'Excistensial Crisis Quiz', '["1","1","1","1","1"]'),
(4, 4, '[["Am I a robot?",["Yes","How would I know?"]],["Question",["True","False"]],["Question",["True","False"]],["Question",["True","False"]],["Question",["True","False"]]]', 'Excistensial Crisis Quiz', '["1","1","1","1","1"]'),
(5, 4, '[["Am I a robot?",["Yes","How would I know?"]],["Question",["True","False"]],["Question",["True","False"]],["Question",["True","False"]],["Question",["True","False"]],["Question",["True","False"]],["Question",["True","False"]]]', 'Excistensial Crisis Quiz', '["1","1","1","1","1","1","1"]'),
(6, 4, '[["Am I a robot?",["Yes","How would I know?"]]]', 'Excistensial Crisis Quiz', '["1"]'),
(7, 4, '[["Am I a robot?",["Yes","How would I know?"]]]', 'Excistensial Crisis Quiz', '["1"]'),
(8, 4, '[["Am I a robot?",["Yes","How would I know?"]]]', 'Excistensial Crisis Quiz', '["1"]'),
(9, 4, '[["Am I a robot?",["Yes","How would I know?"]]]', 'Excistensial Crisis Quiz', '["1"]'),
(10, 4, '[["Am I a robot?",["Yes","How would I know?"]],["Question",["True","False"]],["Question",["True","False"]],["Question",["True","False"]],["Question",["True","False"]]]', 'Excistensial Crisis Quiz', '["1","1","1","1","1"]'),
(11, 4, '[["Am I a robot?",["Yes","How would I know?"]]]', 'Excistensial Crisis Quiz', '["1"]'),
(12, 4, '[["Am I a robot?",["Yes","How would I know?"]],["Question",["True","False"]],["Question",["True","False"]],["Question",["True","False"]]]', 'Excistensial Crisis Quiz', '["1","1","1","1"]');

-- --------------------------------------------------------

--
-- Table structure for table `quizes_completed`
--

CREATE TABLE IF NOT EXISTS `quizes_completed` (
  `QuizCompletedID` int(11) NOT NULL AUTO_INCREMENT,
  `QuizID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Data` text NOT NULL,
  `OwnerID` int(11) NOT NULL,
  `Grade` int(11) NOT NULL,
  PRIMARY KEY (`QuizCompletedID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `quizes_completed`
--

INSERT INTO `quizes_completed` (`QuizCompletedID`, `QuizID`, `UserID`, `Data`, `OwnerID`, `Grade`) VALUES
(1, 3, 4, '["1","1","1","1","1"]', 4, 100),
(2, 3, 4, '["1","0","1","1","1"]', 4, 80),
(3, 2, 4, '["1","0","1"]', 1, 67),
(4, 1, 4, '["1","0","1"]', 1, 67),
(5, 6, 4, '["0"]', 4, 0),
(6, 12, 4, '["1","0","1","1"]', 4, 75),
(7, 4, 4, '["1","1","1","1","0"]', 4, 80),
(8, 5, 4, '["1","0","1","0","1","1","1"]', 4, 72),
(9, 5, 4, '["1","0","1","1","1","1","1"]', 4, 86),
(10, 1, 4, '["1","0","1"]', 1, 67),
(11, 2, 4, '["1","0","0"]', 1, 34),
(12, 7, 4, '["0"]', 4, 0),
(13, 10, 1, '["1","0","1","1","1"]', 4, 80);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `UserID`) VALUES
('migi0027', '5f4dcc3b5aa765d61d8327deb882cf99', 'miguel.pemail@gmail.com', 1),
('migi0027', '5f4dcc3b5aa765d61d8327deb882cf99', 'miguel.pemail@gmail.com', 2),
('thom0027', '5f4dcc3b5aa765d61d8327deb882cf99', 'miguel.pemail@gmail.com', 3),
('ass', '5f4dcc3b5aa765d61d8327deb882cf99', 'ass@gmail.com', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

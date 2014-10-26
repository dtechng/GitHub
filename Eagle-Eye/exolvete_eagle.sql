-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2014 at 12:03 PM
-- Server version: 5.5.37-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exolvete_eagle`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `transport_company` int(11) NOT NULL,
  `complaint_type_id` int(11) NOT NULL,
  `plate_number` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `from_state` int(11) NOT NULL,
  `from_city` varchar(200) NOT NULL,
  `to_state` int(11) NOT NULL,
  `to_city` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `transport_company`, `complaint_type_id`, `plate_number`, `description`, `from_state`, `from_city`, `to_state`, `to_city`, `image`, `status`, `created`, `modified`) VALUES
(38, 0, 12, 1, 'BDG 435 XTK', 'we almost had an accident because of the reckless driving of the bus driver', 25, 'Yaba', 25, 'Ikeja', '', '', '2014-10-26 09:24:06', '0000-00-00 00:00:00'),
(39, 0, 6, 4, 'LA 822 TYX', 'The vehicle keeps breaking down on the road', 11, 'Asaba', 25, 'Volks', '', '', '2014-10-26 09:46:25', '0000-00-00 00:00:00'),
(40, 0, 6, 4, 'AKR 406 B2', 'Roof was leaking through my journey from eko to ibadan. Please take bus off road.', 25, 'Oshodi', 31, 'Ibadan', 'gallery/544cc3f4e6c24.jpg', '', '2014-10-26 09:50:44', '0000-00-00 00:00:00'),
(41, 0, 12, 1, 'BDG 435 XTK', 'the driver almost ran the bus into the lagoon', 25, 'Agege', 25, 'lagos', '', '', '2014-10-26 09:50:55', '0000-00-00 00:00:00'),
(42, 0, 10, 1, 'OYO 4B6 2H', 'Reckless driving', 25, 'Surulere', 25, 'oshodi', 'gallery/544cc45831c1c.jpg', '', '2014-10-26 09:52:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_type`
--

CREATE TABLE IF NOT EXISTS `complaint_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `complaint_type`
--

INSERT INTO `complaint_type` (`id`, `title`, `slug`) VALUES
(1, 'Reckless Driving', 'reckless-driving'),
(2, 'Robbery', 'robbery'),
(3, 'One Chance', 'one-chance'),
(4, 'Faulty Vehicle', 'faulty-vehicle'),
(5, 'Bad Customer Service', 'bad-customer-service');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE IF NOT EXISTS `response` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complaint_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`id`, `complaint_id`, `user_id`, `content`, `created`, `modified`) VALUES
(4, 41, 10, 'The Bus driver has been penalized', '2014-10-26 12:56:06', '0000-00-00 00:00:00'),
(5, 42, 10, 'We are currently investigating this report', '2014-10-25 09:59:53', '0000-00-00 00:00:00'),
(6, 42, 10, 'The Transport Company has been penalised', '2014-10-26 10:00:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=213 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `title`) VALUES
(1, 'Abia'),
(2, 'Abuja'),
(3, 'Adamawa'),
(4, 'Akwa Ibom'),
(5, 'Anambra'),
(6, 'Bauchi'),
(7, 'Bayelsa'),
(8, 'Benue'),
(9, 'Borno'),
(10, 'Cross River'),
(11, 'Delta'),
(12, 'Ebonyi'),
(13, 'Edo'),
(14, 'Ekiti'),
(15, 'Enugu'),
(16, 'Gombe'),
(17, 'Imo'),
(18, 'Jigawa'),
(19, 'Kaduna'),
(20, 'Kano'),
(21, 'Katsina'),
(22, 'Kebbi'),
(23, 'Kogi'),
(24, 'Kwara'),
(25, 'Lagos'),
(26, 'Nassarawa'),
(27, 'Niger'),
(28, 'Ogun'),
(29, 'Ondo'),
(30, 'Osun'),
(31, 'Oyo'),
(32, 'Plateau'),
(33, 'Rivers'),
(34, 'Sokoto'),
(35, 'Taraba'),
(36, 'Yobe'),
(37, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `transport_company`
--

CREATE TABLE IF NOT EXISTS `transport_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `transport_company`
--

INSERT INTO `transport_company` (`id`, `title`) VALUES
(1, 'Bansa Travel And Tours Limited'),
(2, 'Creseada International Limited'),
(3, 'Ifesinachi Group of Companies'),
(4, 'Young Shall Grow Motors Limited'),
(5, 'Gmd Automobile And Equipment Limited'),
(6, 'Abg Group Of Company'),
(7, 'TK Otedola Commercial Enterprises'),
(8, 'Ground Air Travels Agencies Limited'),
(9, 'Safewheelers Express Limited'),
(10, 'Skyblue Ventures Logistics Limited'),
(11, 'Chisco Transport Nigeria Limited'),
(12, ''),
(13, 'Oluwafemi Croup of Transport'),
(14, 'deji transport');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `role` int(11) NOT NULL,
  `institution` varchar(200) NOT NULL,
  `trans_comp_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `image`, `role`, `institution`, `trans_comp_id`, `created`, `modified`) VALUES
(9, 'Usman Irale', '08169315298', 'superirale@gmail.com', '3fc1add0fded0c3d9def8e459b1162fa', '', 2, '', 0, '2014-10-26 09:12:45', '0000-00-00 00:00:00'),
(10, 'Korede Oluwafemi', '', 'oluwafemikorede@gmail.com', '202cb962ac59075b964b07152d234b70', '', 3, 'LASTMA', 0, '2014-10-26 09:27:40', '0000-00-00 00:00:00'),
(11, 'Akinshola Samuel', '', 'akinsholasamuel@gmail.com', '202cb962ac59075b964b07152d234b70', '', 3, 'FRSC', 0, '2014-10-26 09:28:36', '0000-00-00 00:00:00'),
(12, 'Peter Ekerette', '', 'peterdagenius@yahoo.com', '202cb962ac59075b964b07152d234b70', '', 4, '', 6, '2014-10-26 09:29:13', '0000-00-00 00:00:00'),
(13, 'Akinde SAMUE', '+2348024916061', 'akinsholasamuel@gmail.com', '', '', 0, '', 0, '2014-10-26 09:48:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE IF NOT EXISTS `users_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`id`, `title`) VALUES
(1, 'user'),
(2, 'super-admin'),
(3, 'government'),
(4, 'company-admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

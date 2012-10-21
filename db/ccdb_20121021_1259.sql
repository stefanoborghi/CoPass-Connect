-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2012 at 12:59 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ccdb`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `tbav_all_transaction`
--
CREATE TABLE IF NOT EXISTS `tbav_all_transaction` (
`id` int(11)
,`card_id` varchar(20)
,`card_type` varchar(45)
,`name` varchar(256)
,`surname` varchar(256)
,`email` varchar(45)
,`cs_start_id` int(11)
,`cs_start_name_cd` varchar(45)
,`cs_start_fiscal_id_type` varchar(45)
,`cs_start_fiscal_id` varchar(100)
,`cs_end_id` int(11)
,`cs_end_name_cd` varchar(45)
,`cs_end_fiscal_id_type` varchar(45)
,`cs_end_fiscal_id` varchar(100)
,`type` varchar(100)
,`credits` int(11)
,`status` varchar(100)
,`sysdate` timestamp
);
-- --------------------------------------------------------

--
-- Table structure for table `tba_cards`
--

CREATE TABLE IF NOT EXISTS `tba_cards` (
  `id` varchar(20) NOT NULL,
  `tba_cc_site_id_generator` int(11) NOT NULL COMMENT 'Id del cc site che ha emesso la carta',
  `tba_cc_site_id_owner` int(11) NOT NULL COMMENT 'id del site che ha il possesso della carta',
  `credits_amount` int(11) DEFAULT NULL,
  `card_type` varchar(45) NOT NULL COMMENT 'tipo di carta virtuale',
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tba_cards_tba_cc_site1_idx` (`tba_cc_site_id_generator`),
  KEY `fk_tba_cards_tba_cc_site2_idx` (`tba_cc_site_id_owner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ccrker virtual cards';

--
-- Dumping data for table `tba_cards`
--

INSERT INTO `tba_cards` (`id`, `tba_cc_site_id_generator`, `tba_cc_site_id_owner`, `credits_amount`, `card_type`, `status`) VALUES
('TYPE0H501F3456', 1, 1, 0, 'TYPE0', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `tba_cards_has_tba_user_account`
--

CREATE TABLE IF NOT EXISTS `tba_cards_has_tba_user_account` (
  `tba_user_account_id` int(11) NOT NULL,
  `tba_cards_id` varchar(20) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tba_user_account_id`,`tba_cards_id`),
  KEY `fk_tba_cards_has_tba_user_account_tba_user_account1_idx` (`tba_user_account_id`),
  KEY `fk_tba_cards_has_tba_user_account_tba_cards1_idx` (`tba_cards_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tba_cards_has_tba_user_account`
--

INSERT INTO `tba_cards_has_tba_user_account` (`tba_user_account_id`, `tba_cards_id`, `status`) VALUES
(3, 'TYPE0H501F3456', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `tba_cc_site`
--

CREATE TABLE IF NOT EXISTS `tba_cc_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tba_user_account_id` int(11) NOT NULL COMMENT 'Admin cc id',
  `name` varchar(45) NOT NULL,
  `fiscal_id` varchar(100) DEFAULT NULL,
  `fiscal_id_type` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `day_pass` decimal(10,0) NOT NULL COMMENT 'Day pass',
  `note` tinytext,
  `card_cost` varchar(45) DEFAULT NULL COMMENT 'Price for each card emitted owed to CopassConnect',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tba_user_account_id_UNIQUE` (`tba_user_account_id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  KEY `fk_tba_cc_site_tba_user_account1_idx` (`tba_user_account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='cc site' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tba_cc_site`
--

INSERT INTO `tba_cc_site` (`id`, `tba_user_account_id`, `name`, `fiscal_id`, `fiscal_id_type`, `address`, `status`, `email`, `day_pass`, `note`, `card_cost`) VALUES
(1, 2, 'cowo360', '12354890098', 'P.I.', 'Via Vacuna 96 00157 Roma', 'enabled', '', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tba_cc_site_details`
--

CREATE TABLE IF NOT EXISTS `tba_cc_site_details` (
  `tba_cc_site_id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(256) NOT NULL,
  `value` varchar(150) NOT NULL,
  `priority` int(11) DEFAULT NULL COMMENT 'Order',
  UNIQUE KEY `value_UNIQUE` (`value`),
  KEY `fk_tba_cc_details_tba_cc_site1_idx` (`tba_cc_site_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tba_parameters`
--

CREATE TABLE IF NOT EXISTS `tba_parameters` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Fax,phone,website ...',
  `name` varchar(150) NOT NULL,
  `type` varchar(45) NOT NULL COMMENT 'label,parameter ...',
  `encode` varchar(45) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `value` tinytext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='All parameter like types and label' AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tba_parameters`
--

INSERT INTO `tba_parameters` (`id`, `name`, `type`, `encode`, `description`, `value`) VALUES
(1, 'cc_profile', 'system', 'cvs', 'CopassConnect user profile types', 'cc_admin,cs_admin,cc_user'),
(2, 'id_card_type', 'label', 'cvs', 'Id card types', 'C.I.,Passport'),
(3, 'user_status', 'system', 'cvs', 'User account status', 'enabled,disabled'),
(4, 'engagement_level', 'system', 'int', 'User max  engagement level', '10'),
(5, 'card_type', 'system', 'cvs', 'Credit card types: credit_card is charged by real money, virtual_card is charged by virtual credits.', 'credit_card,virtual_card'),
(6, 'cc_site_status', 'system', 'cvs', 'CopassConnect site status', 'validated,disabled,enabled,suspended,closed'),
(7, 'card_status', 'system', 'cvs', 'Card status', 'enabled,disabled,suspended'),
(8, 'card_bind_users_status', 'system', 'cvs', 'Binding status between user and card ', 'enabled,disabled,supended'),
(9, 'transaction_type', 'system', 'cvs', 'Transaction type', 'credit charge,credit discharge'),
(10, 'transaction_status', 'system', 'cvs', 'Transaction status', 'open,closed'),
(11, 'user_details', 'label', 'cvs', 'User detail label', 'Adrress,Phone,Mobile,Fax,Web Site,Facebook,Email'),
(12, 'cc_site_details', 'label', 'cvs', 'CopassConnect site details label', 'Phone,Mobile,Fax,Web Site,Facebook,Email');

-- --------------------------------------------------------

--
-- Table structure for table `tba_transactions_log`
--

CREATE TABLE IF NOT EXISTS `tba_transactions_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tba_cards_id` varchar(20) NOT NULL,
  `tba_cc_site_id_start` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `tba_cc_site_id_end` int(11) NOT NULL COMMENT 'card cc_site owner',
  `credits` int(11) NOT NULL,
  `cause` tinytext,
  `sysdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tba_transactions_log_tba_cards1_idx` (`tba_cards_id`),
  KEY `fk_tba_transactions_log_tba_cc_site1_idx` (`tba_cc_site_id_start`),
  KEY `fk_tba_transactions_log_tba_cc_site2_idx` (`tba_cc_site_id_end`),
  KEY `idx_tba_transaction_log_transaction_type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Transactions' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tba_transactions_log`
--

INSERT INTO `tba_transactions_log` (`id`, `tba_cards_id`, `tba_cc_site_id_start`, `type`, `tba_cc_site_id_end`, `credits`, `cause`, `sysdate`, `status`) VALUES
(1, 'TYPE0H501F3456', 1, 'ADD', 1, 100, NULL, '2012-10-20 17:19:49', 'active'),
(2, 'TYPE0H501F3456', 1, 'MINUS', 1, 50, NULL, '2012-10-20 17:25:38', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tba_user_account`
--

CREATE TABLE IF NOT EXISTS `tba_user_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL COMMENT 'Email for account login',
  `pwd` varchar(256) DEFAULT NULL COMMENT 'Password',
  `status` varchar(256) NOT NULL COMMENT 'Account status : enable,disable,suspended',
  `name` varchar(256) NOT NULL COMMENT 'Account label name',
  `surname` varchar(256) NOT NULL,
  `cc_profile` varchar(45) NOT NULL COMMENT 'cc user profile',
  `idcard` varchar(100) DEFAULT NULL,
  `id_card_type` varchar(45) DEFAULT NULL,
  `engagement_level` int(11) NOT NULL DEFAULT '0',
  `note` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Application login account' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tba_user_account`
--

INSERT INTO `tba_user_account` (`id`, `email`, `pwd`, `status`, `name`, `surname`, `cc_profile`, `idcard`, `id_card_type`, `engagement_level`, `note`) VALUES
(1, 'ccadmin@cowo360.org', 'password1', 'enabled', 'Stefano', 'Borghi', 'cc_admin', 'RM12234P', 'P.A.', 0, NULL),
(2, 'csadmin@cowo360.org', 'password2', 'enabled', 'Elisabetta', 'frasca', 'cs_admin', 'P.A.', 'RM4949P', 0, NULL),
(3, 'mrossi@cowo360.org', 'password3', 'enabled', 'Mario', 'Rossi', 'cc_user', 'P.A.', 'RM123456', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tba_user_details`
--

CREATE TABLE IF NOT EXISTS `tba_user_details` (
  `tba_user_account_id` int(11) NOT NULL,
  `label` varchar(256) NOT NULL,
  `value` varchar(150) NOT NULL,
  `priority` varchar(256) DEFAULT NULL,
  UNIQUE KEY `value_UNIQUE` (`value`),
  KEY `fk_tba_user_details_tba_user_account1_idx` (`tba_user_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User details';

-- --------------------------------------------------------

--
-- Structure for view `tbav_all_transaction`
--
DROP TABLE IF EXISTS `tbav_all_transaction`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`192.168.0.163` SQL SECURITY DEFINER VIEW `tbav_all_transaction` AS select `tl`.`id` AS `id`,`c`.`id` AS `card_id`,`c`.`card_type` AS `card_type`,`ua`.`name` AS `name`,`ua`.`surname` AS `surname`,`ua`.`email` AS `email`,`cs_start`.`id` AS `cs_start_id`,`cs_start`.`name` AS `cs_start_name_cd`,`cs_start`.`fiscal_id_type` AS `cs_start_fiscal_id_type`,`cs_start`.`fiscal_id` AS `cs_start_fiscal_id`,`cs_end`.`id` AS `cs_end_id`,`cs_end`.`name` AS `cs_end_name_cd`,`cs_end`.`fiscal_id_type` AS `cs_end_fiscal_id_type`,`cs_end`.`fiscal_id` AS `cs_end_fiscal_id`,`tl`.`type` AS `type`,`tl`.`credits` AS `credits`,`tl`.`status` AS `status`,`tl`.`sysdate` AS `sysdate` from (((((`tba_transactions_log` `tl` join `tba_cc_site` `cs_start`) join `tba_cc_site` `cs_end`) join `tba_cards` `c`) join `tba_cards_has_tba_user_account` `ca`) join `tba_user_account` `ua`) where (1 and (`tl`.`tba_cards_id` = `c`.`id`) and (`tl`.`tba_cc_site_id_start` = `cs_start`.`id`) and (`tl`.`tba_cc_site_id_end` = `c`.`tba_cc_site_id_owner`) and (`c`.`tba_cc_site_id_owner` = `cs_end`.`id`) and (`ca`.`tba_cards_id` = `c`.`id`) and (`ca`.`tba_user_account_id` = `ua`.`id`));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tba_cards`
--
ALTER TABLE `tba_cards`
  ADD CONSTRAINT `fk_tba_cards_tba_cc_site1` FOREIGN KEY (`tba_cc_site_id_generator`) REFERENCES `tba_cc_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tba_cards_tba_cc_site2` FOREIGN KEY (`tba_cc_site_id_owner`) REFERENCES `tba_cc_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tba_cards_has_tba_user_account`
--
ALTER TABLE `tba_cards_has_tba_user_account`
  ADD CONSTRAINT `fk_tba_cards_has_tba_user_account_tba_cards1` FOREIGN KEY (`tba_cards_id`) REFERENCES `tba_cards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tba_cards_has_tba_user_account_tba_user_account1` FOREIGN KEY (`tba_user_account_id`) REFERENCES `tba_user_account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tba_cc_site`
--
ALTER TABLE `tba_cc_site`
  ADD CONSTRAINT `fk_tba_cc_site_tba_user_account1` FOREIGN KEY (`tba_user_account_id`) REFERENCES `tba_user_account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tba_cc_site_details`
--
ALTER TABLE `tba_cc_site_details`
  ADD CONSTRAINT `fk_tba_cc_details_tba_cc_site1` FOREIGN KEY (`tba_cc_site_id`) REFERENCES `tba_cc_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tba_transactions_log`
--
ALTER TABLE `tba_transactions_log`
  ADD CONSTRAINT `fk_tba_transactions_log_tba_cards1` FOREIGN KEY (`tba_cards_id`) REFERENCES `tba_cards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tba_transactions_log_tba_cc_site1` FOREIGN KEY (`tba_cc_site_id_start`) REFERENCES `tba_cc_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tba_transactions_log_tba_cc_site2` FOREIGN KEY (`tba_cc_site_id_end`) REFERENCES `tba_cc_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tba_user_details`
--
ALTER TABLE `tba_user_details`
  ADD CONSTRAINT `fk_tba_user_details_tba_user_account1` FOREIGN KEY (`tba_user_account_id`) REFERENCES `tba_user_account` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

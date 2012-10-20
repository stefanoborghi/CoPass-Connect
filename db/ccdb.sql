-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 20, 2012 at 05:48 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `tba_cards_has_tba_user_account`
--

CREATE TABLE IF NOT EXISTS `tba_cards_has_tba_user_account` (
  `tba_cards_id` varchar(20) NOT NULL,
  `tba_user_account_id` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tba_cards_id`,`tba_user_account_id`),
  KEY `fk_tba_cards_has_tba_user_account_tba_user_account1_idx` (`tba_user_account_id`),
  KEY `fk_tba_cards_has_tba_user_account_tba_cards1_idx` (`tba_cards_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tba_cc_site`
--

CREATE TABLE IF NOT EXISTS `tba_cc_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tba_user_account_id` int(11) NOT NULL COMMENT 'Admin cc id',
  `name` varchar(45) NOT NULL,
  `fiscal_id` varchar(45) NOT NULL,
  `fiscal_id_type` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tba_user_account_id_UNIQUE` (`tba_user_account_id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  KEY `fk_tba_cc_site_tba_user_account1_idx` (`tba_user_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='cc site' AUTO_INCREMENT=1 ;

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
  `description` varchar(256) DEFAULT NULL,
  `value` tinytext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='All parameter like types and label' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tba_transactions_log`
--

CREATE TABLE IF NOT EXISTS `tba_transactions_log` (
  `id` varchar(45) NOT NULL,
  `tba_cards_id` varchar(20) NOT NULL,
  `tba_cc_site_id_start` int(11) NOT NULL,
  `tba_transactions_type` varchar(100) NOT NULL,
  `tba_cc_site_id_end` int(11) NOT NULL COMMENT 'card cc_site owner',
  `credits` int(11) NOT NULL,
  `sysdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tba_transactions_log_tba_cards1_idx` (`tba_cards_id`),
  KEY `fk_tba_transactions_log_tba_cc_site1_idx` (`tba_cc_site_id_start`),
  KEY `fk_tba_transactions_log_tba_cc_site2_idx` (`tba_cc_site_id_end`),
  KEY `idx_tba_transaction_log_transaction_type` (`tba_transactions_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Transactions';

-- --------------------------------------------------------

--
-- Table structure for table `tba_user_account`
--

CREATE TABLE IF NOT EXISTS `tba_user_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL COMMENT 'Email for account login',
  `pwd` varchar(256) NOT NULL COMMENT 'Password',
  `status` varchar(256) NOT NULL COMMENT 'Account status : enable,disable,suspended',
  `name` varchar(256) NOT NULL COMMENT 'Account label name',
  `surname` varchar(256) NOT NULL,
  `idcard` varchar(100) NOT NULL,
  `id_card_type` varchar(45) NOT NULL,
  `cc_profile` varchar(45) NOT NULL COMMENT 'cc user profile',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Application login account' AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `fk_tba_transactions_log_tba_cc_site1` FOREIGN KEY (`tba_cc_site_id_start`) REFERENCES `tba_cc_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tba_transactions_log_tba_cards1` FOREIGN KEY (`tba_cards_id`) REFERENCES `tba_cards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tba_transactions_log_tba_cc_site2` FOREIGN KEY (`tba_cc_site_id_end`) REFERENCES `tba_cc_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tba_user_details`
--
ALTER TABLE `tba_user_details`
  ADD CONSTRAINT `fk_tba_user_details_tba_user_account1` FOREIGN KEY (`tba_user_account_id`) REFERENCES `tba_user_account` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

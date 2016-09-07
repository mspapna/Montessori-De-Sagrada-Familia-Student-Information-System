-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 01, 2016 at 05:01 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a6962825_mdsf`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `contact_no` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(40) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` VALUES(1, 'admin', 'admin', 'NA', 'NA', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `assign_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `assigned` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`assign_id`),
  KEY `teacher_id` (`teacher_id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `assign`
--


-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `enroll_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `enrolled` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grade` float NOT NULL,
  PRIMARY KEY (`enroll_id`),
  KEY `subject_id` (`subject_id`),
  KEY `student_id` (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `enroll`
--


-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `gender` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `contact_no` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `course` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `year_level` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `guardian` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` VALUES(1, 'Dale Ansley Lim', 'dale', 'Male', 'Unknown', '124213', 'Computer Science', 'Senior', 'Unknown', 'dale.lim.71@facebook.com');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `semester` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `section` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` VALUES(1, 'Philosophy', 'First Semester', 'X1');
INSERT INTO `subject` VALUES(2, 'Computer Science', 'First Semester', 'W3');
INSERT INTO `subject` VALUES(2, 'Arithmetic', 'First Semester', 'Y4');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(8) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `contact_no` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(40) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `teacher`
--



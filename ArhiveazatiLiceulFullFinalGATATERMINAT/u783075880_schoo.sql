-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 22, 2019 at 05:14 PM
-- Server version: 10.2.23-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u783075880_schoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` int(11) NOT NULL,
  `ANAME` varchar(150) NOT NULL,
  `APASS` varchar(150) NOT NULL,
  `APNUME` varchar(150) NOT NULL,
  `AQUAL` varchar(150) NOT NULL,
  `ACLAS` varchar(150) NOT NULL,
  `AMAIL` varchar(150) NOT NULL,
  `APADDR` varchar(150) NOT NULL,
  `IMG` varchar(150) NOT NULL,
  `APNO` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `ANAME`, `APASS`, `APNUME`, `AQUAL`, `ACLAS`, `AMAIL`, `APADDR`, `IMG`, `APNO`) VALUES
(1, 'Stanciu', '4ac6648d5cf836d3bb800246209b8c9b', 'Stefan', 'Matematica', 'XI-B-Profilul Real(mate-info)', 'doctor95p@gmail.com', 'Tara Romania,Judetul Prahova,Comuna Urziceni,Str. 213, Nr. 2312', 'staff/download.jpg', '0798678546');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `CID` int(11) NOT NULL,
  `CNAME` varchar(150) NOT NULL,
  `CSEC` varchar(150) NOT NULL,
  `CPROF` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`CID`, `CNAME`, `CSEC`, `CPROF`) VALUES
(81, 'XI', 'B', 'Profilul Real(mate-info)');

-- --------------------------------------------------------

--
-- Table structure for table `detalii`
--

CREATE TABLE `detalii` (
  `NUME` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `STRADA` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JUDETUL` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ORASUL` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TELEFON` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detalii`
--

INSERT INTO `detalii` (`NUME`, `STRADA`, `JUDETUL`, `ORASUL`, `TELEFON`, `DID`) VALUES
('Colegiul Spiru-Haret Ploiesti', 'Bobalna', 'Prahova', 'Ploiesti', '0786578986', 13);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `EID` int(11) NOT NULL,
  `ENAME` varchar(150) NOT NULL,
  `ETYPE` varchar(150) NOT NULL,
  `EDATE` varchar(150) NOT NULL,
  `SESSION` varchar(150) NOT NULL,
  `CLASS` varchar(150) NOT NULL,
  `SUB` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`EID`, `ENAME`, `ETYPE`, `EDATE`, `SESSION`, `CLASS`, `SUB`) VALUES
(27, 'Infoeducatia2018', '4', '8-01-2019', 'Concurs', 'XI', 'Matematica');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `MID` int(11) NOT NULL,
  `REGNO` varchar(150) NOT NULL,
  `SUB` varchar(150) NOT NULL,
  `MARK` varchar(150) NOT NULL,
  `TERM` varchar(150) NOT NULL,
  `CLASS` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ora`
--

CREATE TABLE `ora` (
  `ORA` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ora`
--

INSERT INTO `ora` (`ORA`) VALUES
('8.00-8.50'),
('9.00-9.50'),
('10.10-11.00'),
('11.10-12.00'),
('12.10-13.00'),
('13.10-14.00'),
('14.10-15.00'),
('15.10-16.00'),
('16.10-17.00'),
('17.10-18.00'),
('18.10-19.00');

-- --------------------------------------------------------

--
-- Table structure for table `profilul`
--

CREATE TABLE `profilul` (
  `PROFILUL` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `TPROF` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profilul`
--

INSERT INTO `profilul` (`PROFILUL`, `TPROF`) VALUES
('Profilul Real(mate-info)', 22);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `TID` int(11) NOT NULL,
  `TNAME` varchar(150) CHARACTER SET latin1 NOT NULL,
  `TPASS` varchar(150) CHARACTER SET latin1 NOT NULL,
  `QUAL` varchar(150) CHARACTER SET latin1 NOT NULL,
  `PNO` varchar(150) CHARACTER SET latin1 NOT NULL,
  `MAIL` varchar(150) CHARACTER SET latin1 NOT NULL,
  `PADDR` text CHARACTER SET latin1 NOT NULL,
  `IMG` varchar(150) CHARACTER SET latin1 NOT NULL,
  `CLAS` varchar(150) NOT NULL,
  `PNAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`TID`, `TNAME`, `TPASS`, `QUAL`, `PNO`, `MAIL`, `PADDR`, `IMG`, `CLAS`, `PNAME`) VALUES
(65, 'Marcel', '3a76aacd6bc9e1d83c88f70c3216b257', 'Informatica', '0879678434', 'doctor95p@gmail.com', 'Tara Romania,Judetul Prahova,Comuna Urziceni,Str. 213, Nr. 2312', 'staff/download.jpg', 'XI-B-Profilul Real(mate-info)', 'Viorel');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `RNO` varchar(150) NOT NULL,
  `NAME` varchar(150) NOT NULL,
  `FNAME` varchar(150) NOT NULL,
  `DOB` varchar(150) NOT NULL,
  `GEN` varchar(150) NOT NULL,
  `PHO` varchar(150) NOT NULL,
  `MAIL` varchar(150) NOT NULL,
  `ADDR` text NOT NULL,
  `SCLASS` varchar(150) NOT NULL,
  `SSEC` varchar(150) NOT NULL,
  `SIMG` varchar(150) NOT NULL,
  `TID` int(11) NOT NULL,
  `PROFILUL` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `RNO`, `NAME`, `FNAME`, `DOB`, `GEN`, `PHO`, `MAIL`, `ADDR`, `SCLASS`, `SSEC`, `SIMG`, `TID`, `PROFILUL`) VALUES
(17, 'S101', 'Alex', 'Viorel', '4-05-2002', 'Male', '09876545678', 'danstanciu50@yahoo.com', 'Tara Romania,Judetul Prahova,Comuna Urziceni,Str. 213, Nr. 23134', 'XI', 'B', 'student/download.jpg', 65, 'Profilul Real(mate-info)'),
(18, 'S102', 'Marcu', 'Viorel', '1-01-2019', 'Male', '08784923123', 'danstanciu50@yahoo.com', 'Tara Romania,Judetul Prahova,Comuna Urziceni,Str. 213, Nr. 23134', 'XI', 'B', 'student/download.jpg', 65, 'Profilul Real(mate-info)');

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE `sub` (
  `SID` int(11) NOT NULL,
  `SNAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`SID`, `SNAME`) VALUES
(25, 'Matematica');

-- --------------------------------------------------------

--
-- Table structure for table `zile`
--

CREATE TABLE `zile` (
  `ZILE` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zile`
--

INSERT INTO `zile` (`ZILE`) VALUES
('Luni'),
('Marti'),
('Miercuri'),
('Joi'),
('Vineri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `detalii`
--
ALTER TABLE `detalii`
  ADD PRIMARY KEY (`DID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`EID`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`MID`);

--
-- Indexes for table `profilul`
--
ALTER TABLE `profilul`
  ADD PRIMARY KEY (`TPROF`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`TID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`SID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `detalii`
--
ALTER TABLE `detalii`
  MODIFY `DID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `EID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profilul`
--
ALTER TABLE `profilul`
  MODIFY `TPROF` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sub`
--
ALTER TABLE `sub`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

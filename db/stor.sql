-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 06:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stor`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookid` char(5) NOT NULL,
  `book_category` varchar(50) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `author_name` varchar(70) NOT NULL,
  `images` varchar(200) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookid`, `book_category`, `book_name`, `author_name`, `images`, `quantity`, `price`, `num`) VALUES
('AB003', 'crime', 'Sherlok Holmes', 'konan doil', '', 50, 710, 1),
('AB020', 'harry', 'potter', 'Raviravi', '', 200, 360, 3),
('AB006', 'hi', 'ygyggg', 'dddd', '', 52, 100, 4);

-- --------------------------------------------------------

--
-- Table structure for table `creceipt`
--

CREATE TABLE `creceipt` (
  `oderid` int(11) NOT NULL,
  `datet` date NOT NULL,
  `book_name` varchar(40) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cname` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `tamount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creceipt`
--

INSERT INTO `creceipt` (`oderid`, `datet`, `book_name`, `quantity`, `cname`, `price`, `tamount`) VALUES
(123, '2023-10-15', 'spider', 4, 'ruchira', 1000, 4000),
(2000, '2023-10-11', 'madoldhuwa', 1, 'nadun', 950, 950),
(10205, '2023-10-14', 'Percy Jackson', 1, 'Ruchira', 2426, 2426);

-- --------------------------------------------------------

--
-- Table structure for table `move`
--

CREATE TABLE `move` (
  `ID` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Actor` varchar(100) NOT NULL,
  `Creaw` varchar(100) NOT NULL,
  `Summery` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `move`
--

INSERT INTO `move` (`ID`, `name`, `Actor`, `Creaw`, `Summery`) VALUES
(1, 'Adaraniya Prarthana', 'aa', 'aad', 'dwdwqc'),
(2, 'Bahubuthyo', 'aa', 'aad', 'dwdwqc'),
(3, 'kick', 'isy77', 'isdh', 'idwd');

-- --------------------------------------------------------

--
-- Table structure for table `oders`
--

CREATE TABLE `oders` (
  `Order_id` int(11) NOT NULL,
  `Book_id` int(11) NOT NULL,
  `bookname` varchar(40) NOT NULL,
  `Date_time` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `Phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `C_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `Total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oders`
--

INSERT INTO `oders` (`Order_id`, `Book_id`, `bookname`, `Date_time`, `quantity`, `Phone`, `email`, `C_name`, `price`, `Total_amount`) VALUES
(10203, 102, 'Age of sail', '2023-10-11', 2, 777456289, 'vishan@row.gmail.com', 'Vishan', 1100, 2200),
(10204, 103, 'The old gurd', '2023-10-12', 1, 715823694, 'bumal@sathsara.gmail.com', 'Bumal', 1500, 1500),
(10205, 104, 'Percy Jackson', '2023-10-14', 1, 774896523, 'ruchira@bandara.gmail.com', 'Ruchira', 2426, 2426),
(10206, 105, 'The 100', '2023-10-15', 3, 774158263, 'janidu@fernando.gmail.com', 'Janidu', 1500, 4500);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `people_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `mid_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`people_id`, `first_name`, `last_name`, `mid_name`) VALUES
(34, 'cs', 'csz', 'SDZZZZZZZZZZZZZ'),
(36, 'gimhana', 'weerathunga', 'ff');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `mobilenumber` bigint(10) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `lastname`, `gender`, `mobilenumber`, `emailaddress`, `address`, `date`, `password`) VALUES
(6, 'gimhana', 'weerathunga', 'male', 7159595563, 'gima@gmail.com', 'fjf', '0000-00-00', '1234'),
(7, 'bumal', 'sathsara', 'male', 710000000, 'bumal@gmail.com', '33', '0000-00-00', '0000'),
(8, 'savidya', 'alponso', 'male', 714444444, 'savi@gmail.com', 'dfsf', '0000-00-00', '55555'),
(9, 'gimhana', 'weerathunga', 'male', 715959563, 'g1@gmail.com', '2', '0000-00-00', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date_t` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`book_id`, `quantity`, `price`, `date_t`) VALUES
(102, 4, 1500, 2023),
(10201, 4, 2000, 2023),
(12345, 5, 1000, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `starfe`
--

CREATE TABLE `starfe` (
  `S_id` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `starfe`
--

INSERT INTO `starfe` (`S_id`, `Name`, `email`, `password`, `type`) VALUES
(1, 'Gimhana', 'gima@gmail.com', '1234', 'admin'),
(3, 'Ravindu', 'ravi@gmail.com', '1111', 'book-keeper'),
(5, 'Kithsadu', 'hiru@gmail.com', '2222', 'rq-manager'),
(6, 'savidya', 'savi@gmail.com', '3333', 'f_manager'),
(7, 'bumal', 'bumal@gmail.com', 'dbc4d84bfcfe2284ba11beffb853a8c4', 'book-keeper');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`num`),
  ADD KEY `bookid` (`bookid`) USING BTREE;

--
-- Indexes for table `creceipt`
--
ALTER TABLE `creceipt`
  ADD PRIMARY KEY (`oderid`);

--
-- Indexes for table `move`
--
ALTER TABLE `move`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `oders`
--
ALTER TABLE `oders`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`people_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `starfe`
--
ALTER TABLE `starfe`
  ADD PRIMARY KEY (`S_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `move`
--
ALTER TABLE `move`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `people_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `starfe`
--
ALTER TABLE `starfe`
  MODIFY `S_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 09:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plumber_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `image`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `application` varchar(1000) NOT NULL,
  `plumber_id` varchar(255) NOT NULL,
  `plumber_name` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `type`, `application`, `plumber_id`, `plumber_name`, `date`) VALUES
(1, 'change service', '<p>i want to change services<em><strong> bececuse its bad</strong></em> ..........dfjsdfnjsdfgs dksjdbfsdbf sdbfsdigbf sdfbsdigfsf sdfgdsilgfsd fsdbfisdgf sldgflsidgf sdlfgslgfsd fsdbfsdif</p>\r\n', '69', 'mehedi hasan', '0000-00-00'),
(2, 'change schedule', '<p>i want to change my schedule time.</p>\r\n\r\n<p>becase i am unable this time.&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<pre>\r\nLorem ipsum dolor &quot;<em><strong>sit amet, consectetur adipisicing&quot;</strong></em> elit. A blanditiis delectus ducimus eius harum labore minus repellat saepe sunt.\r\n​​vero! Aliquam assumenda culpa in ipsa magni neque nobis provident quis.\r\n&nbsp;</pre>\r\n	</li>\r\n</ol>\r\n', '69', 'mehedi hasan', '2019-12-20'),
(3, 'change schedule', '<p>i want to chnge my schedule time.</p>\r\n\r\n<p><strong>on 8 am to 12 pm</strong></p>\r\n', '69', 'mehedi hasan', '2019-12-27'),
(4, 'change schedule', '<p>i want to change schedule time.</p>\r\n', '69', 'hasan shanto', '2019-12-27'),
(6, 'change service', 'kl', '69', 'hasan shanto', '2020-03-10'),
(7, 'block/unblock issue', '<p>mehedi <em>hasan <strong>ShNAto sdfdf<span dir=\"rtl\">k dfgdgdf dfgdg dfgdgf </span></strong></em></p>\r\n', '69', 'hasan shanto', '2020-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `apply_plumber`
--

CREATE TABLE `apply_plumber` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `parm_address` varchar(255) NOT NULL,
  `pres_address` varchar(255) NOT NULL,
  `nid` varchar(17) NOT NULL,
  `service` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `expreance` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apply_plumber`
--

INSERT INTO `apply_plumber` (`id`, `first_name`, `last_name`, `email`, `phone`, `parm_address`, `pres_address`, `nid`, `service`, `dob`, `gender`, `expreance`, `image`, `status`) VALUES
(10016, 'mehedi', 'hasan', 'mehedi@gmail.com', '01941697253', 'panthapath 59/7', 'panthapath 59/7', '11125400', 'Electronic', '1997-12-12', 'Male', '1', 'rsz_img_2225-01.jpg', 1),
(10017, 'Md. Alamin', 'akanda', 'alamin@gmail.com', '01941697253', 'luxmipur atia toli bazar', 'panthapath dhaka 59/7', '1112452154248121', 'Baby cleaning', '2020-11-11', 'Male', '02', 'lrg.jpg', 0),
(10018, 'tamanna', 'islam rafa', 'itamannarafa@gmail.com1', '01916065082', 'chandpur', 'laxmipur', '097242937', 'water leak', '2001-06-01', 'Female', '1', '2019-11-22-11-50-53-511.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `plumberID` int(5) NOT NULL,
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_phone` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_email` varchar(255) NOT NULL,
  `p_phone` varchar(255) NOT NULL,
  `p_address` varchar(255) NOT NULL,
  `hour_rate` float NOT NULL,
  `service` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `process` varchar(255) NOT NULL,
  `final` varchar(255) NOT NULL,
  `payment` int(11) NOT NULL,
  `notify` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`plumberID`, `id`, `c_id`, `c_name`, `c_phone`, `c_email`, `p_name`, `p_email`, `p_phone`, `p_address`, `hour_rate`, `service`, `address`, `date`, `status`, `process`, `final`, `payment`, `notify`) VALUES
(69, 22, 5, 'Mehedi Hasan', '01755374793', 'mehedi@gmail.com', 'hasan shanto', 'm@gmail.com', '01941697253', 'panthapath 59/7', 300, 'Electronic', 'panthapath', '2020-03-15', '1', '1', '2', 0, 1),
(69, 24, 5, 'Mehedi Hasan', '01755374793', 'mehedi@gmail.com', 'hasan shanto', 'm@gmail.com', '01941697253', 'panthapath 59/7', 300, 'Electronic', 'panthapath', '2020-03-15', '1', '1', '2', 0, 1),
(74, 25, 5, 'Mehedi Hasan', '01755374793', 'mehedi@gmail.com', 'al-amin akanda', 'alamin@gmail.com', '0124588', 'panthapath', 300, 'Baby cleaning', 'panthapath 59/7', '2020-03-15', '1', '1', '2', 0, 1),
(70, 26, 2, 'sadia sultana', '01544544554', 'sadia@gmail.com', 'smm mukut', 's@gmail.com', '0755374793', 'dhanmondi', 500, 'Electronic', 'Merul La/11, Badda (East)', '2020-03-16', '1', '1', '2', 0, 1),
(69, 27, 2, 'sadia sultana', '01544544554', 'sadia@gmail.com', 'hasan shanto', 'm@gmail.com', '01941697253', 'panthapath 59/7', 300, 'Electronic', 'Merul La/11, Badda (East)', '2020-03-16', '1', '1', '2', 0, 1),
(70, 28, 2, 'sadia sultana', '01544544554', 'sadia@gmail.com', 'smm mukut', 's@gmail.com', '124', 'dhanmondi', 500, 'home cleaning ', 'Merul La/11, Badda (East)', '2020-03-16', '1', '1', '2', 0, 1),
(74, 29, 2, 'sadia sultana', '01544544554', 'sadia@gmail.com', 'al-amin akanda', 'alamin@gmail.com', '0124588', 'panthapath', 300, 'Baby cleaning', 'Merul La/11, Badda (East)', '2020-03-16', '1', '1', '2', 0, 1),
(72, 30, 2, 'sadia sultana', '01544544554', 'sadia@gmail.com', 'moin kabir', 'moin@gmail.com', '01755374393', 'jigatala 55/1, Dhaka ', 200, 'bathroom repair', 'Merul La/11, Badda (East)', '2020-03-16', '0', '0', '0', 0, 1),
(69, 31, 5, 'Mehedi Hasan', '01755374793', 'mehedi@gmail.com', 'hasan shanto', 'm@gmail.com', '01941697253', 'panthapath 59/7', 300, 'Baby cleaning', 'panthapath', '2020-03-16', '1', '1', '2', 0, 1),
(76, 32, 2, 'sadia sultana', '01544544554', 'sadia@gmail.com', 'kamrul hasan', 'km@gmail.com', '01755374793', 'luxmipur', 550, 'home cleaning ', 'Merul La/11, Badda (East)', '2020-03-16', '1', '1', '2', 0, 1),
(70, 34, 2, 'sadia sultana', '01544544554', 'sadia@gmail.com', 'smm mukut', 's@gmail.com', '0182854558', 'dhanmondi', 350, 'Electronic', 'Merul La/11, Badda (East)', '2020-03-18', '0', '0', '0', 0, 1),
(70, 41, 2, 'sadia sultana', '01544544554', 'sadia@gmail.com', 'smm mukut', 's@gmail.com', '0182854558', 'dhanmondi', 350, 'Electronic', 'Merul La/11, Badda (East)', '2020-03-18', '0', '0', '0', 0, 1),
(76, 43, 7, 'fabiha nahar', '01755374793', 'safa@gmail.com', 'kamrul hasan', 'km@gmail.com', '01755374793', 'luxmipur', 300, 'home cleaning ', 'chandpur, Matlab (south), Nulua v/7', '2020-03-18', '1', '1', '2', 0, 1),
(76, 44, 7, 'fabiha nahar', '01755374793', 'safa@gmail.com', 'kamrul hasan', 'km@gmail.com', '01755374793', 'luxmipur', 300, 'home cleaning ', 'chandpur, Matlab (south), Nulua v/7', '2020-03-18', '1', '1', '2', 0, 1),
(76, 45, 7, 'fabiha nahar', '01755374793', 'safa@gmail.com', 'kamrul hasan', 'km@gmail.com', '01755374793', 'luxmipur', 300, 'home cleaning ', 'chandpur, Matlab (south), Nulua v/7', '2020-03-18', '0', '0', '0', 0, 1),
(69, 46, 7, 'fabiha nahar', '01755374793', 'safa@gmail.com', 'hasan shanto', 'm@gmail.com', '01941697253', 'panthapath 59/7', 500, 'Electronic', 'chandpur, Matlab (south), Nulua v/7', '2020-03-18', '1', '1', '2', 0, 1),
(80, 48, 3, 'Nurul islam', '01941697253', 'nurul@gmail.com', 'tamanna islam rafa', 'itamannarafa@gmail.com1', '01866717825', 'chandpur', 350, 'water leak', 'merul badda La/11, Gulsahn 1212', '2020-03-25', '1', '1', '2', 0, 1),
(69, 50, 2, 'sadia sultana', '01544544554', 'sadia@gmail.com', 'hasan shanto', 'm@gmail.com', '01941697253', 'panthapath 59/7', 500, 'Electronic', 'Merul La/11, Badda (East)', '2020-04-29', '1', '1', '2', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chating`
--

CREATE TABLE `chating` (
  `id` int(11) NOT NULL,
  `m_id` int(10) NOT NULL,
  `message` varchar(400) NOT NULL,
  `name` varchar(100) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chating`
--

INSERT INTO `chating` (`id`, `m_id`, `message`, `name`, `m_name`, `image`, `date`, `status`) VALUES
(23, 5, 'hellow admin', 'rsz_img_2225-01.jpg', 'Mehedi Hasan', '', '2020-03-19 17:23:57', 1),
(24, 2, 'hi', 'IMG_2843.JPG', 'sadia sultana', '', '2020-03-19 17:25:45', 1),
(25, 5, 'ldfng', 'rsz_img_2225-01.jpg', 'Mehedi Hasan', '', '2020-03-19 17:27:37', 1),
(29, 2, 'ki koro?', 'IMG_2843.JPG', 'sadia sultana', '', '2020-03-19 17:41:31', 1),
(36, 2, 'ok', 'admin.jpg', 'sadia sultana', '', '2020-03-19 17:57:08', 1),
(37, 2, 'ok', 'admin.jpg', 'sadia sultana', '', '2020-03-19 17:57:44', 1),
(38, 5, 'i need a plumber', 'rsz_img_2225-01.jpg', 'Mehedi Hasan', '', '2020-03-19 17:58:38', 1),
(39, 5, 'tell me your problem sir', 'admin.jpg', 'Mehedi Hasan', '', '2020-03-19 17:59:00', 1),
(40, 5, ',mm', 'admin.jpg', 'Mehedi Hasan', '', '2020-03-19 18:01:46', 1),
(41, 5, 'i need electronic service', 'rsz_img_2225-01.jpg', 'Mehedi Hasan', '', '2020-03-19 18:21:10', 1),
(42, 5, 'sda', 'admin.jpg', 'Mehedi Hasan', '', '2020-03-19 18:23:54', 1),
(43, 7, 'hellow..is there any one', 'IMG_20180712_150709.jpg', 'fabiha nahar', '', '2020-03-19 18:24:43', 1),
(44, 7, 'heloow', 'IMG_20180712_150709.jpg', 'fabiha nahar', '', '2020-03-19 18:25:00', 1),
(45, 7, 'yes tell me your probelm', 'admin.jpg', 'fabiha nahar', '', '2020-03-19 18:29:11', 1),
(46, 7, 'i need baby plumber', 'IMG_20180712_150709.jpg', 'fabiha nahar', '', '2020-03-19 18:29:27', 1),
(47, 7, 'oky you can serach', 'admin.jpg', 'fabiha nahar', '', '2020-03-19 18:29:44', 1),
(48, 2, 'hi', 'admin.jpg', 'sadia sultana', '', '2020-03-22 21:06:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `first_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `c_id` int(11) NOT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 NOT NULL,
  `contact` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`first_name`, `c_id`, `last_name`, `username`, `password`, `status`, `contact`, `address`, `gender`, `image`, `date`) VALUES
('mehedi', 1, 'shanto', 'mukut@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '01941697253', 'panthapath', 'Male', 'FB_IMG_1484938165429.jpg', '2019-11-11'),
('sadia', 2, 'sultana', 'sadia@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '01544544554', 'Merul La/11, Badda (East)', 'Female', 'IMG_2843.JPG', '2019-12-02'),
('Nurul', 3, 'islam', 'nurul@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '01941697253', 'merul badda La/11, Gulsahn 1212', 'Male', '79406776_685959521936505_5434955683415982080_o.jpg', '2019-12-26'),
('nazrul', 4, 'islam', 'naz@gmail.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', '0', '01755374793', 'west raza bazar', 'Male', '2.jpg', '2019-12-27'),
('Mehedi', 5, 'Hasan', 'mehedi@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '01755374793', 'panthapath', 'Male', 'rsz_img_2225-01.jpg', '2019-12-27'),
('moin', 6, 'kabir', 'moin@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '01755374793', 'jigatala', 'Male', 'IMG_0342.JPG', '2020-01-15'),
('fabiha', 7, 'nahar', 'safa@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '01755374793', 'chandpur, Matlab (south), Nulua v/7', 'Female', 'IMG_20180712_150709.jpg', '2020-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `hire_post`
--

CREATE TABLE `hire_post` (
  `id` int(11) NOT NULL,
  `service` varchar(255) NOT NULL,
  `application` text NOT NULL,
  `post_date` date NOT NULL,
  `post_end` date NOT NULL,
  `vacancy` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hire_post`
--

INSERT INTO `hire_post` (`id`, `service`, `application`, `post_date`, `post_end`, `vacancy`, `status`) VALUES
(10009, 'Electronic', '<h2><em><strong>we need Electronic plumber</strong></em></h2>\r\n\r\n<p>here is the requermwnt of plumber. sodj jhsd fsj ksj ith hvs jkbhvud ksjbd s dfbshdf ksbdfhsydf jsbdfhsf jsdvfv.</p>\r\n\r\n<ol>\r\n	<li>honest and time maintiance</li>\r\n	<li>timely work</li>\r\n	<li>hard worker</li>\r\n	<li>facality&nbsp;</li>\r\n</ol>\r\n\r\n<p>montly dhka kaknd n sdjnsdnf sjnmehedi mehedi&nbsp;mehedi&nbsp;meh edi mehe di mehe dimehedi&nbsp;</p>\r\n', '2020-02-24', '2020-03-31', 12, 0),
(10010, 'Baby cleaning', '<h2>we need baby cleang plumber</h2>\r\n\r\n<p>here is the requermwnt of plumber. sodj jhsd fsj ksj ith hvs jkbhvud ksjbd s dfbshdf ksbdfhsydf jsbdfhsf jsdvfv.</p>\r\n\r\n<ul>\r\n	<li>honest and time maintiance</li>\r\n	<li>timely work</li>\r\n	<li>hard worker</li>\r\n	<li>facality&nbsp;</li>\r\n</ul>\r\n\r\n<p>montly vata djfbdsfbsd</p>\r\n', '2020-03-24', '2020-04-02', 3, 0),
(100102, 'water leak', '<p><strong>Job Context</strong></p>\r\n\r\n<ul>\r\n	<li>প্রথম ছয় (০৬) মাসের অস্থায়ী সময়কাল, সাফল্যের সাথে অস্থায়ী সময় শেষ করার পরে সংস্থাটি কর্মচারীকে স্থায়ী করার সিদ্ধান্ত নেবে।</li>\r\n</ul>\r\n\r\n<p><strong>Job Responsibilities</strong></p>\r\n\r\n<ul>\r\n	<li>ডায়াগনস্টিক সেন্টারের প্লাম্বার/পাইপ ফিটিংয়ের কাজ করা।</li>\r\n	<li>স্থাপিত পাইপ সংস্কার, রক্ষণা-বেক্ষণ ও মেরামতের কাজ করা।</li>\r\n	<li>পুরাতন পাইপ অপসারণ, পুন:স্থাপন ও সম্প্রসারণসহ পাইপ ফিটিংয়ের সকল প্রকার কাজ করা।</li>\r\n	<li>সুয়ারেজ, টয়লেট পাইপ লাইন জ্যাম ক্লিয়ার করা।</li>\r\n	<li>পানি সরবরাহ নিশ্চিত করা।</li>\r\n	<li>উর্দ্ধতন কর্তৃপক্ষের নির্দেশে যে কোন দায়িত্ব ও কাজ দ্রুততম সময়ে সম্পূর্ণ করা।</li>\r\n</ul>\r\n\r\n<p><strong>Employment Status</strong></p>\r\n\r\n<p>Full-time</p>\r\n\r\n<p><strong>Educational Requirements</strong></p>\r\n\r\n<ul>\r\n	<li>৮ম শ্রেণি/এসএসসি/এইচএসসি/সংশ্লিষ্ট ট্রেড সার্টিফিকেট।</li>\r\n	<li>অভিজ্ঞ প্রার্থীদের জন্য শিক্ষাগত যোগ্যতা শিথিলযোগ্য।</li>\r\n</ul>\r\n\r\n<p><strong>Experience Requirements</strong></p>\r\n\r\n<ul>\r\n	<li>2 to 5 year(s)</li>\r\n</ul>\r\n\r\n<p><strong>Additional Requirements</strong></p>\r\n\r\n<ul>\r\n	<li>Only males are allowed to apply</li>\r\n	<li>যোগাযোগের দক্ষতা।</li>\r\n</ul>\r\n\r\n<p><strong>Job Location</strong></p>\r\n\r\n<p>বাংলাদেশের যেকোনো স্থানে</p>\r\n', '2020-03-25', '2020-04-05', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `id_card`
--

CREATE TABLE `id_card` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_email` varchar(255) NOT NULL,
  `p_phone` varchar(255) NOT NULL,
  `p_address` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  `service` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `id_card`
--

INSERT INTO `id_card` (`id`, `p_id`, `p_name`, `p_email`, `p_phone`, `p_address`, `join_date`, `service`, `image`, `status`) VALUES
(1000321, 69, 'hasan shanto', 'm@gmail.com', '01941697253', 'panthapath 59/7', '2019-11-29', 'Electronic', 'rsz_img_2225-01.jpg', 0),
(1000322, 70, 'smm mukut', 's@gmail.com', '0182854558', 'dhanmondi', '2019-11-29', 'Electronic', 'dl2.jpg', 0),
(1000323, 72, 'moin kabir', 'moin@gmail.com', '01755374393', 'jigatala 55/1, Dhaka ', '2019-12-02', 'bathroom repair', 'IMG_E3048.JPG', 0),
(1000324, 76, 'kamrul hasan', 'km@gmail.com', '01755374793', 'luxmipur', '2020-03-16', 'home cleaning ', 'rsz_img_2225-01.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `description` varchar(200) NOT NULL,
  `location_status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `lat`, `lng`, `description`, `location_status`) VALUES
(1, 23.777805, 90.405464, 'Home Cleaning Service', 1),
(2, 23.772465, 90.382584, 'Baby Cleaning ', 1),
(3, 23.749210, 90.383873, 'Electronic Service', 1),
(4, 23.814873, 90.452965, 'home cleaning', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `phone`, `message`) VALUES
(3, 'mehedi', 'ms@gmail.com', '0125455', 'this is mehedi'),
(4, 'mukut', 'mukut@gmail.com', '1545555', 'this is mukut'),
(6, 'mehedi', 'mehedi@gmail.com', '01941697253', 'i want to know about your system');

-- --------------------------------------------------------

--
-- Table structure for table `news_feed`
--

CREATE TABLE `news_feed` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `post_desc` varchar(25) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_post`
--

CREATE TABLE `news_post` (
  `id` int(11) NOT NULL,
  `post_desc` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `post_name` varchar(255) NOT NULL,
  `post_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_post`
--

INSERT INTO `news_post` (`id`, `post_desc`, `image`, `post_name`, `post_image`) VALUES
(2, 'Thanks Evaly.. 15 days এর জায়গায় 22days লাগছে.. বাকি সব ঠিকাছে.. পাঠাও এর সার্ভিসটা ভাল্লাগে নাই বরাবরের মতই। #BATA_80% Cashback offer এ কিনা।', 'lrg.jpg', 'Mehedi Hasan', 'rsz_img_2225-01.jpg'),
(3, 'Thanks Evaly.. 15 days এর জায়গায় 22days লাগছে.. বাকি সব ঠিকাছে.. পাঠাও এর সার্ভিসটা ভাল্লাগে নাই বরাবরের মতই। #BATA_80% Cashback offer এ কিনা। how bdsjbdf skdjbfskdbf kjsbdfksf ksbdfkbfksd lbdf ', 'Capture.PNG', 'sadia sultana', 'IMG_2843.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `application` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `application`, `date`) VALUES
(2, 'Meeting', '<h2>all plumber are requested to join &quot;meeting&quot;.</h2>\r\n\r\n<p><strong><em>on 12-12-2019</em></strong></p>\r\n', '2019-12-23'),
(3, 'Meeting ', '<p>every one must attend&nbsp;</p>\r\n', '2019-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `c_ID` int(11) NOT NULL,
  `p_ID` int(11) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `c_phone` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_phone` varchar(255) NOT NULL,
  `p_email` varchar(255) NOT NULL,
  `hour_rate` float NOT NULL,
  `hour` int(11) NOT NULL,
  `discount` float NOT NULL,
  `tax` float NOT NULL,
  `total` float NOT NULL,
  `payble` float NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `bkas_number` varchar(20) NOT NULL,
  `text_id` varchar(255) NOT NULL,
  `p_address` varchar(255) NOT NULL,
  `booking_date` varchar(255) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `payment_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `c_ID`, `p_ID`, `c_name`, `c_address`, `c_phone`, `service`, `c_email`, `p_name`, `p_phone`, `p_email`, `hour_rate`, `hour`, `discount`, `tax`, `total`, `payble`, `card_number`, `bkas_number`, `text_id`, `p_address`, `booking_date`, `booking_id`, `date`, `invoice_date`, `status`, `payment_by`) VALUES
(100277, 5, 69, 'Mehedi Hasan', 'panthapath', '01755374793', 'Electronic', 'mehedi@gmail.com', 'hasan shanto', '01941697253', 'm@gmail.com', 300, 2, 200, 0, 600, 400, '12547475', '', '21245', 'panthapath 59/7', '2020-03-15', 22, '2020-03-15', '2020-03-15', 1, 'Card'),
(100278, 5, 69, 'Mehedi Hasan', 'panthapath', '01755374793', 'Electronic', 'mehedi@gmail.com', 'hasan shanto', '01941697253', 'm@gmail.com', 300, 4, 350, 0, 1200, 850, '', '01755374793', '1234', 'panthapath 59/7', '2020-03-15', 24, '2020-03-15', '2020-03-15', 1, 'Bkash'),
(100279, 5, 74, 'Mehedi Hasan', 'panthapath 59/7', '01755374793', 'Baby cleaning', 'mehedi@gmail.com', 'al-amin akanda', '0124588', 'alamin@gmail.com', 300, 1, 50, 0, 300, 250, '4148271', '', '1234', 'panthapath', '2020-03-15', 25, '2020-03-15', '2020-03-15', 1, 'Card'),
(100280, 2, 76, 'sadia sultana', 'Merul La/11, Badda (East)', '01544544554', 'home cleaning ', 'sadia@gmail.com', 'kamrul hasan', '01755374793', 'km@gmail.com', 550, 2, 100, 0, 1100, 1000, '', '01828499288', 'DINA-123', 'luxmipur', '2020-03-16', 32, '2020-03-17', '2020-03-16', 1, 'Bkash'),
(100281, 2, 69, 'sadia sultana', 'Merul La/11, Badda (East)', '01544544554', 'Electronic', 'sadia@gmail.com', 'hasan shanto', '01941697253', 'm@gmail.com', 300, 5, 200, 0, 1500, 1300, '414827515', '', 'Mehedi', 'panthapath 59/7', '2020-03-16', 27, '2020-03-18', '2020-03-18', 1, 'Card'),
(100282, 2, 74, 'sadia sultana', 'Merul La/11, Badda (East)', '01544544554', 'Baby cleaning', 'sadia@gmail.com', 'al-amin akanda', '0124588', 'alamin@gmail.com', 300, 1, 50, 0, 300, 250, '4147258641', '', 'sad-123', 'panthapath', '2020-03-16', 29, '2020-03-18', '2020-03-18', 1, 'Card'),
(100283, 2, 70, 'sadia sultana', 'Merul La/11, Badda (East)', '01544544554', 'home cleaning ', 'sadia@gmail.com', 'smm mukut', '124', 's@gmail.com', 500, 6, 150, 0, 3000, 2850, '414725862', '', 'Shoms-12', 'dhanmondi', '2020-03-16', 28, '2020-03-18', '2020-03-18', 1, 'Card'),
(100284, 2, 70, 'sadia sultana', 'Merul La/11, Badda (East)', '01544544554', 'Electronic', 'sadia@gmail.com', 'smm mukut', '0755374793', 's@gmail.com', 500, 7, 350, 0, 3500, 3150, '4147528', '', 'mnbs-12', 'dhanmondi', '2020-03-16', 26, '2020-03-18', '2020-03-18', 0, 'Card'),
(100285, 5, 69, 'Mehedi Hasan', 'panthapath', '01755374793', 'Baby cleaning', 'mehedi@gmail.com', 'hasan shanto', '01941697253', 'm@gmail.com', 300, 3, 30, 0, 900, 870, '', '01941697253', 'Sadia-dina', 'panthapath 59/7', '2020-03-16', 31, '2020-03-18', '2020-03-18', 1, 'Bkash'),
(100286, 7, 76, 'fabiha nahar', 'chandpur, Matlab (south), Nulua v/7', '01755374793', 'home cleaning ', 'safa@gmail.com', 'kamrul hasan', '01755374793', 'km@gmail.com', 300, 1, 1, 0, 300, 299, '1221', '', 'sd', 'luxmipur', '2020-03-18', 43, '2020-03-18', '2020-03-18', 1, 'Card'),
(100287, 7, 69, 'fabiha nahar', 'chandpur, Matlab (south), Nulua v/7', '01755374793', 'Electronic', 'safa@gmail.com', 'hasan shanto', '01941697253', 'm@gmail.com', 500, 2, 375, 0, 1000, 625, '1245', '', '444', 'panthapath 59/7', '2020-03-18', 46, '2020-03-18', '2020-03-18', 1, 'Card'),
(100288, 7, 76, 'fabiha nahar', 'chandpur, Matlab (south), Nulua v/7', '01755374793', 'home cleaning ', 'safa@gmail.com', 'kamrul hasan', '01755374793', 'km@gmail.com', 300, 4, 0, 0, 1200, 0, '', '', '', 'luxmipur', '2020-03-18', 44, '0000-00-00', '2020-03-20', 0, ''),
(100289, 3, 80, 'Nurul islam', 'merul badda La/11, Gulsahn 1212', '01941697253', 'water leak', 'nurul@gmail.com', 'tamanna islam rafa', '01866717825', 'itamannarafa@gmail.com1', 350, 1, 50, 0, 350, 300, '111214551', '', 'MMMA12', 'chandpur', '2020-03-25', 48, '2020-03-25', '2020-03-25', 1, 'Card'),
(100290, 2, 69, 'sadia sultana', 'Merul La/11, Badda (East)', '01544544554', 'Electronic', 'sadia@gmail.com', 'hasan shanto', '01941697253', 'm@gmail.com', 500, 1, 200, 0, 500, 300, '', '01828499288', 'DINA-123', 'panthapath 59/7', '2020-04-29', 50, '2020-04-29', '2020-04-29', 1, 'Bkash');

-- --------------------------------------------------------

--
-- Table structure for table `plumbers`
--

CREATE TABLE `plumbers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `service` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 NOT NULL,
  `contact` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `rate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plumbers`
--

INSERT INTO `plumbers` (`id`, `first_name`, `last_name`, `username`, `service`, `nid`, `password`, `status`, `contact`, `address`, `gender`, `image`, `date`, `rate`) VALUES
(69, 'hasan', 'shanto', 'm@gmail.com', 'Electronic', '2565', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '01941697253', 'panthapath 59/7', 'Male', 'rsz_img_2225-01.jpg', '2019-11-29', '500'),
(70, 'smm', 'mukut', 's@gmail.com', 'Electronic', '554', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '0182854558', 'dhanmondi', 'Male', 'dl2.jpg', '2019-11-29', '350'),
(72, 'moin', 'kabir', 'moin@gmail.com', 'bathroom repair', '12456852254578554', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', '0', '01755374393', 'jigatala 55/1, Dhaka ', 'Male', 'IMG_E3048.JPG', '2019-12-02', '600'),
(74, 'al-amin', 'akanda', 'alamin@gmail.com', 'Baby cleaning', '12564555245487544', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '0124588', 'panthapath', 'Male', 'registration.jpg', '2020-01-15', '300'),
(76, 'kamrul', 'hasan', 'km@gmail.com', 'home cleaning ', '123456455758555444', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '01755374793', 'luxmipur', 'Male', 'rsz_img_2225-01.jpg', '2020-03-16', '300'),
(77, 'mehedi', 'hasan', 'mehedi@gmail.com', 'Electronic', '11125400', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '', '', '', '.', '2020-03-25', ''),
(78, 'mehedi', 'hasan', 'mehedihasan@gmail.com', 'Electronic', '11125400', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '0', '01755374793', 'panthapath 59/7', 'Male', 'rsz_img_2225-01.jpg', '2020-03-25', ''),
(79, 'mehedi', 'hasan', 'mehedi121@gmail.com', 'Electronic', '11125400', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '', '', '', '', '2020-03-25', ''),
(80, 'tamanna', 'islam rafa', 'itamannarafa@gmail.com1', 'water leak', '097242937', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '01866717825', 'chandpur', 'Female', '2019-11-28-14-23-41-958.jpg', '2020-03-25', '350');

-- --------------------------------------------------------

--
-- Table structure for table `post_rating`
--

CREATE TABLE `post_rating` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_rating`
--

INSERT INTO `post_rating` (`id`, `userid`, `postid`, `rating`, `timestamp`) VALUES
(88, 5, 69, 5, '2020-03-15 17:25:30'),
(89, 2, 69, 3, '2020-03-10 19:51:53'),
(90, 6, 69, 3, '2020-03-10 19:54:24'),
(91, 5, 70, 2, '2020-03-23 10:28:31'),
(92, 6, 72, 3, '2020-03-10 19:55:54'),
(93, 6, 74, 2, '2020-03-10 19:55:50'),
(94, 6, 70, 2, '2020-03-10 19:55:52'),
(95, 5, 72, 2, '2020-03-10 20:32:40'),
(96, 5, 74, 5, '2020-03-15 20:25:40'),
(97, 2, 72, 2, '2020-03-10 19:56:13'),
(98, 2, 74, 5, '2020-04-29 19:43:19'),
(101, 2, 70, 5, '2020-03-16 17:43:10'),
(102, 5, 76, 5, '2020-04-28 10:01:25'),
(103, 2, 76, 1, '2020-03-20 17:03:50'),
(104, 3, 80, 3, '2020-03-25 12:42:03'),
(105, 5, 80, 2, '2020-03-26 12:44:33'),
(106, 5, 78, 2, '2020-04-23 11:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `issue` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `issue`, `p_name`, `description`) VALUES
(2, 'time management', 'mehedi', 'can not maintain time. always late work.'),
(3, 'time management', 'mehedi', 'can not maintain time. always late work.'),
(5, 'time maintain ', 'moin', 'late and work slowly.'),
(6, 'slow work', 'smm', 'work very slowly '),
(7, 'slow work', 'smm', 'work slowly '),
(8, 'time maintain', 'hasan', 'problem when worked');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_email` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `title`, `description`, `image`) VALUES
(5, 'Baby cleaning', 'Baby cleaning', 'No matter it\'s your home or workplace, cleanliness of your space is important in order to stay SAFE, HYGIENIC and PRODUCTIVE, everyday. HandyMama Professional Cleaning service comes up with a complete solution that makes your space sparkle! Our highly trained cleaning professionals go to your place with all required cleaning equipment, supplies and chemicals, do their job what they are best at', 'dl2.jpg'),
(10, 'bathroom repair ', 'bathroom repair ', 'bathroom repair  is necessary. we provided good and experienced bathroom repair plumber .', 'clean1.jpg'),
(11, 'home cleaning ', 'home cleaning', 'we provide good home cleaning plumber', '2.jpg'),
(16, 'water leak', 'water leak repair ', 'Roto-Rooter offers complete commercial sewer and drain cleaning and plumbing repair services, including high-pressure water jetting, underground leak and line detection, video camera line inspections, automated drain care programs, grease trap and liquid waste pumping, backflow protection, and pipe repair and replacement.', '296664493.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply_plumber`
--
ALTER TABLE `apply_plumber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plumberID` (`plumberID`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `chating`
--
ALTER TABLE `chating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `hire_post`
--
ALTER TABLE `hire_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id_card`
--
ALTER TABLE `id_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_feed`
--
ALTER TABLE `news_feed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_post`
--
ALTER TABLE `news_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_ID` (`c_ID`),
  ADD KEY `p_ID` (`p_ID`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `plumbers`
--
ALTER TABLE `plumbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_rating`
--
ALTER TABLE `post_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `apply_plumber`
--
ALTER TABLE `apply_plumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10019;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `chating`
--
ALTER TABLE `chating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hire_post`
--
ALTER TABLE `hire_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100103;

--
-- AUTO_INCREMENT for table `id_card`
--
ALTER TABLE `id_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000325;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_feed`
--
ALTER TABLE `news_feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_post`
--
ALTER TABLE `news_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100291;

--
-- AUTO_INCREMENT for table `plumbers`
--
ALTER TABLE `plumbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `post_rating`
--
ALTER TABLE `post_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`plumberID`) REFERENCES `plumbers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `customers` (`c_id`);

--
-- Constraints for table `id_card`
--
ALTER TABLE `id_card`
  ADD CONSTRAINT `id_card_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `plumbers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`c_ID`) REFERENCES `customers` (`c_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`p_ID`) REFERENCES `plumbers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `plumbers` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

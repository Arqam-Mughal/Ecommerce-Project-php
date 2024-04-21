-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 05:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwd533`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` bigint(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cfmpass` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `rolesid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `fname`, `lname`, `email`, `password`, `cfmpass`, `status`, `addate`, `rolesid`) VALUES
(1, 'Ahmad', 'Ali', 'admin@gmail.com', 'admin', 'admin', 'admin', '', 0),
(21, 'Fazal', 'Khan', 'superadmin@gmail.com', 'data', '21232f297a57a5a743894a0e4a801fc3', '', '', 1),
(22, 'Ahsan', 'Khan', 'ahsan@gmail.com', '6325ae85d932504df0319223a2d5e7e7', '6325ae85d932504df0319223a2d5e7e7', '', '', 2),
(23, 'Ahmad', 'Ali', 'ahmad@gmail.com', '6325ae85d932504df0319223a2d5e7e7', '6325ae85d932504df0319223a2d5e7e7', '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `productid` bigint(255) NOT NULL,
  `pcode` varchar(255) NOT NULL,
  `proname` varchar(255) NOT NULL,
  `psale` varchar(255) NOT NULL,
  `ppic` varchar(255) NOT NULL,
  `ptprice` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`productid`, `pcode`, `proname`, `psale`, `ppic`, `ptprice`, `uemail`, `quantity`) VALUES
(15, '190', 'Civic Type R as Best Car of 2017', '9899999', '25379.jpg,36281.jpg', '9899999', '<br />\n<b>Warning</b>:  Undefined variable $uemail in <b>C:\\xampp\\htdocs\\firstwork\\project\\eshop Backup AJAX before oop\\Eshop Project\\subcategary.php</b> on line <b>137</b><br />\n', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cart2`
--

CREATE TABLE `cart2` (
  `productid` bigint(255) NOT NULL,
  `pcode` varchar(255) NOT NULL,
  `proname` varchar(255) NOT NULL,
  `psale` varchar(255) NOT NULL,
  `ppic` varchar(255) NOT NULL,
  `ptprice` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart2`
--

INSERT INTO `cart2` (`productid`, `pcode`, `proname`, `psale`, `ppic`, `ptprice`, `uemail`, `quantity`) VALUES
(40, '36', 'Bruce Harper', '30', '32357.jpg,62314.jpg', '30', '', ''),
(41, '88', 'Regan Parrish', '34', '60288.jfif,37007.jfif', '34', '', '1'),
(42, '80', 'Indira Flynn', '56', '90405.jfif,96361.jfif', '56', '', '1'),
(43, '78', 'Maggie Walton', '88', '61848.jfif,94910.jfif', '88', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uid` bigint(255) NOT NULL,
  `ufname` varchar(255) NOT NULL,
  `ulname` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `umobile` varchar(255) NOT NULL,
  `ucountry` varchar(255) NOT NULL,
  `ustate` varchar(255) NOT NULL,
  `ucity` varchar(255) NOT NULL,
  `pstlcode` varchar(255) NOT NULL,
  `uaddress` varchar(255) NOT NULL,
  `praddress` varchar(255) NOT NULL,
  `upass` varchar(255) NOT NULL,
  `cfmpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `ufname`, `ulname`, `uemail`, `umobile`, `ucountry`, `ustate`, `ucity`, `pstlcode`, `uaddress`, `praddress`, `upass`, `cfmpass`) VALUES
(1, 'Brock Burns', 'Nathan Cross', 'vulavoragi@mailinator.com', '58', 'Dolor aut delectus ', 'Neque ut lorem ipsum', 'Id dolor molestiae ', '67', 'Non nulla perferendi', 'Fugit vero nesciunt', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(2, 'Brock Burns', 'Nathan Cross', 'vulavoragi@mailinator.com', '58', 'Dolor aut delectus ', 'Neque ut lorem ipsum', 'Id dolor molestiae ', '67', 'Non nulla perferendi', 'Fugit vero nesciunt', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(3, 'Vincent Morales', 'Amy Ochoa', 'hywi@mailinator.com', '75', 'Mollit non dolores q', 'Quaerat tempor ducim', 'Est mollit mollitia ', '62', 'Veritatis consequunt', 'Voluptatem cupidatat', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(4, 'Brock Burns', 'Nathan Cross', 'vulavoragi@mailinator.com', '58', 'Dolor aut delectus ', 'Neque ut lorem ipsum', 'Id dolor molestiae ', '67', 'Non nulla perferendi', 'Fugit vero nesciunt', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(5, 'Ray Hughes', 'Dante Cruz', 'goxuku@mailinator.com', '36', 'Molestiae quo ut off', 'Ex sed in aut adipis', 'Ut non asperiores si', '83', 'Eu sed optio eos sa', 'Facilis optio maxim', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(6, 'Ray Hughes', 'Dante Cruz', 'goxuku@mailinator.com', '36', 'Molestiae quo ut off', 'Ex sed in aut adipis', 'Ut non asperiores si', '83', 'Eu sed optio eos sa', 'Facilis optio maxim', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(7, 'Brock Burns', 'Nathan Cross', 'vulavoragi@mailinator.com', '58', 'Dolor aut delectus ', 'Neque ut lorem ipsum', 'Id dolor molestiae ', '67', 'Non nulla perferendi', 'Fugit vero nesciunt', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(8, 'Paula Pearson', 'Alana Brown', 'ditaqumop@mailinator.com', '86', 'Voluptas dolores ani', 'Excepteur vero totam', 'Amet recusandae Li', '91', 'Voluptatum tempora q', 'Vel porro dolor mini', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(9, 'Emery Harrington', 'Kennan Gill', 'suta@mailinator.com', '16', 'Est omnis rerum rer', 'Hic aperiam deleniti', 'Aut ea maxime et ut ', '31', 'Accusantium odit odi', 'Excepteur temporibus', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(10, 'Denise Mirza', 'Paki Stafford', 'mirza@gmail.com', '36', 'Ad voluptas et deser', 'Et eum non sunt minu', 'Proident duis ducim', '90', 'In totam voluptatum ', 'Occaecat exercitatio', '786786', '786786'),
(11, 'Hashim Willis', 'Hiram Welch', 'vulinonali@mailinator.com', '82', 'Cumque natus omnis s', 'Sed corrupti quas v', 'Quos veniam dolorem', 'Eu et ut voluptate v', 'Ut amet assumenda p', 'Et in est vel id quo', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(12, 'Hashim Willis', 'Hiram Welch', 'vulinonali@mailinator.com', '82', 'Cumque natus omnis s', 'Sed corrupti quas v', 'Quos veniam dolorem', 'Eu et ut voluptate v', 'Ut amet assumenda p', 'Et in est vel id quo', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(13, 'Emerald Hewitt', 'Shafira Poole', 'bawoci@mailinator.com', '40', 'Iusto nihil praesent', 'Rerum veniam quae a', 'Quisquam esse quibu', 'Perspiciatis provid', 'Nihil repellendus U', 'Autem at ducimus co', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(14, 'Shelly Reese', 'Thane Ratliff', 'radyhop@mailinator.com', '55', 'Magnam exercitatione', 'Illo eveniet natus ', 'Sit magna perspiciat', 'Minima quod nesciunt', 'Accusantium tempor d', 'Ipsum optio qui lib', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(15, 'Shelly Reese', 'Thane Ratliff', 'radyhop@mailinator.com', '55', 'Magnam exercitatione', 'Illo eveniet natus ', 'Sit magna perspiciat', 'Minima quod nesciunt', 'Accusantium tempor d', 'Ipsum optio qui lib', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(16, 'Wylie Maxwell', 'Preston Massey', 'kexewa@mailinator.com', '7', 'Eos id nostrud occa', 'Iste earum numquam i', 'Tempora repudiandae ', 'Laudantium nulla il', 'Tempor est eos est', 'Qui ad voluptatibus ', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(17, 'Edan Keith', 'Lewis Jones', 'qavi@mailinator.com', '32', 'Eiusmod asperiores p', 'Molestias vero dolor', 'Ea ex unde culpa vit', 'Sed adipisci nisi an', 'Impedit maxime maxi', 'Voluptas incidunt p', 'Pa$$w0rd!', 'Pa$$w0rd!');

-- --------------------------------------------------------

--
-- Table structure for table `newtb`
--

CREATE TABLE `newtb` (
  `nid` int(255) NOT NULL,
  `nname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newtb`
--

INSERT INTO `newtb` (`nid`, `nname`) VALUES
(1, 'Infinix'),
(2, 'Redme'),
(3, 'Infinix'),
(4, 'Redme'),
(5, 'Infinix'),
(6, 'Redme'),
(7, 'Infinix'),
(8, 'Samsung'),
(9, 'Redme'),
(10, 'Samsung'),
(11, 'Vivo'),
(12, 'Infinix'),
(13, 'Redme'),
(14, 'Samsung'),
(15, ''),
(16, 'Vivo, Redme');

-- --------------------------------------------------------

--
-- Table structure for table `onlineuser`
--

CREATE TABLE `onlineuser` (
  `uid` bigint(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postlcode` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `peraddress` varchar(255) NOT NULL,
  `pay` varchar(255) NOT NULL,
  `order_num` varchar(255) NOT NULL,
  `ustatus` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `onlineuser`
--

INSERT INTO `onlineuser` (`uid`, `fname`, `lname`, `email`, `mobile`, `country`, `state`, `city`, `postlcode`, `address`, `peraddress`, `pay`, `order_num`, `ustatus`, `date`) VALUES
(28, 'Adrian Leblanc', 'Donovan Rosario', 'waqas.ishaq963@gmail.com', '58', 'Natus perferendis iu', 'Labore sint quisqua', 'Dicta voluptatibus f', '14', 'Laboris dignissimos ', 'Tenetur eum et quia ', 'Bank Transfer', '45127', 'complete', '04-17-24'),
(29, 'Adrian Leblanc', 'Donovan Rosario', 'waqas.ishaq963@gmail.com', '58', 'Natus perferendis iu', 'Labore sint quisqua', 'Dicta voluptatibus f', '14', 'Laboris dignissimos ', 'Tenetur eum et quia ', 'Cash on Delivery', '61720', 'pending', '04-21-24'),
(30, 'Adrian Leblanc', 'Donovan Rosario', 'waqas.ishaq963@gmail.com', '58', 'Natus perferendis iu', 'Labore sint quisqua', 'Dicta voluptatibus f', '14', 'Laboris dignissimos ', 'Tenetur eum et quia ', 'Cash on Delivery', '83450', 'pending', '04-21-24'),
(31, 'Adrian Leblanc', 'Donovan Rosario', 'waqas.ishaq963@gmail.com', '58', 'Natus perferendis iu', 'Labore sint quisqua', 'Dicta voluptatibus f', '14', 'Laboris dignissimos ', 'Tenetur eum et quia ', 'Cash on Delivery', '86743', 'pending', '04-21-24');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` bigint(255) NOT NULL,
  `order_num` varchar(255) NOT NULL,
  `proname` varchar(255) NOT NULL,
  `psale` varchar(255) NOT NULL,
  `ptprice` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `pquantity` varchar(255) NOT NULL,
  `odate` varchar(255) NOT NULL,
  `ostatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `order_num`, `proname`, `psale`, `ptprice`, `uemail`, `pquantity`, `odate`, `ostatus`) VALUES
(56, '45127', 'Kurta', '5999', '5999', 'waqas.ishaq963@gmail.com', '1', '04-17-24', 'complete'),
(57, '45127', 'Angarkha', '6999', '6999', 'waqas.ishaq963@gmail.com', '1', '04-17-24', 'complete'),
(58, '61720', 'Kurta', '5999', '5999', 'waqas.ishaq963@gmail.com', '1', '04-21-24', 'pending'),
(59, '61720', 'Angarkha', '6999', '6999', 'waqas.ishaq963@gmail.com', '1', '04-21-24', 'pending'),
(60, '83450', 'Sherwani', '11999', '11999', 'waqas.ishaq963@gmail.com', '1', '04-21-24', 'pending'),
(61, '83450', 'ROWEQPP P9 Pro', '13999', '13999', 'waqas.ishaq963@gmail.com', '1', '04-21-24', 'pending'),
(62, '86743', 'Angarkha', '6999', '6999', 'waqas.ishaq963@gmail.com', '1', '04-21-24', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pos-cart`
--

CREATE TABLE `pos-cart` (
  `posid` bigint(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos-orderinfo`
--

CREATE TABLE `pos-orderinfo` (
  `pos-ppid` bigint(255) NOT NULL,
  `pos-pname` varchar(255) NOT NULL,
  `pos-pcode` varchar(255) NOT NULL,
  `pos-sprice` varchar(255) NOT NULL,
  `pos-pqty` varchar(255) NOT NULL,
  `pos-pprice` varchar(255) NOT NULL,
  `pos-pinvoice` varchar(255) NOT NULL,
  `pos-pstatus` varchar(255) NOT NULL,
  `pos-pdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos-orderinfo`
--

INSERT INTO `pos-orderinfo` (`pos-ppid`, `pos-pname`, `pos-pcode`, `pos-sprice`, `pos-pqty`, `pos-pprice`, `pos-pinvoice`, `pos-pstatus`, `pos-pdate`) VALUES
(41, 'Mini 4,000 mAh Power Bank', '110', '10999', '17', '186983', '45', 'complete', '04-17-24'),
(42, 'Corolla X 1.6 (Special Edition) ', '120', '8299999', '2', '16599998', '45', 'complete', '04-17-24'),
(43, 'Dell 3593 Core i5 10th Gen', '200', '49000', '2', '98000', '45', 'complete', '04-17-24'),
(44, 'Lenovo V15 Laptop, 15.6\"', '488', '60000', '18', '1080000', '45', 'complete', '04-17-24');

-- --------------------------------------------------------

--
-- Table structure for table `pos-userinfo`
--

CREATE TABLE `pos-userinfo` (
  `posuserid` bigint(255) NOT NULL,
  `pos-uname` varchar(255) NOT NULL,
  `pos-uphone` varchar(255) NOT NULL,
  `tcash` varchar(255) NOT NULL,
  `pos-ustatus` varchar(255) NOT NULL,
  `pos-uinvoice` varchar(255) NOT NULL,
  `pos-email` varchar(255) NOT NULL,
  `pos-date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos-userinfo`
--

INSERT INTO `pos-userinfo` (`posuserid`, `pos-uname`, `pos-uphone`, `tcash`, `pos-ustatus`, `pos-uinvoice`, `pos-email`, `pos-date`) VALUES
(15, 'Ahmad', '03410304750', '17964981', 'complete', '45', 'admin@gmail.com', '04-17-24');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` bigint(255) NOT NULL,
  `pcname` varchar(255) NOT NULL,
  `psubname` varchar(255) NOT NULL,
  `psupname` varchar(255) NOT NULL,
  `pcode` varchar(255) NOT NULL,
  `proname` varchar(255) NOT NULL,
  `pdes` varchar(255) NOT NULL,
  `pcost` varchar(255) NOT NULL,
  `psale` varchar(255) NOT NULL,
  `pqname` varchar(255) NOT NULL,
  `pstock` varchar(255) NOT NULL,
  `ppic` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `pcname`, `psubname`, `psupname`, `pcode`, `proname`, `pdes`, `pcost`, `psale`, `pqname`, `pstock`, `ppic`, `status`) VALUES
(8, '31', '19', '22', '10', 'Kurta', 'Good!!', '5000', '5999', '2', '1', 'a:2:{i:0;s:9:\"79785.jpg\";i:1;s:9:\"91239.jpg\";}', 'online'),
(9, '31', '19', '22', '20', 'Angarkha', 'Good!', '5999', '6999', '2', '2', 'a:2:{i:0;s:9:\"14687.jpg\";i:1;s:9:\"58290.jpg\";}', 'online'),
(10, '31', '19', '22', '30', 'Sherwani', 'Good!', '10000', '11999', '2', '3', 'a:2:{i:0;s:9:\"81539.jpg\";i:1;s:9:\"42961.jpg\";}', 'online'),
(11, '31', '21', '22', '40', 'skirts', 'Good!!', '7000', '8999', '2', '5', 'a:2:{i:0;s:9:\"68926.jpg\";i:1;s:9:\"67725.jpg\";}', 'online'),
(12, '48', '26', '23', '70', 'ROWEQPP P9 Pro', 'Good!!', '12000', '13999', '11', '9', 'a:2:{i:0;s:9:\"63824.jpg\";i:1;s:9:\"35037.jpg\";}', 'online'),
(13, '48', '27', '24', '110', 'Mini 4,000 mAh Power Bank', 'Good!!', '9000', '10999', '17', '19', 'a:2:{i:0;s:9:\"11309.jpg\";i:1;s:9:\"65282.jpg\";}', 'online'),
(14, '32', '28', '22', '120', 'Corolla X 1.6 (Special Edition) ', ' Nice!!', '8000000', '8299999', '2', '300', 'a:2:{i:0;s:9:\"62570.jpg\";i:1;s:9:\"99303.jpg\";}', 'online'),
(15, '32', '18', '25', '190', 'Civic Type R as Best Car of 2017', 'Nice!!', '9000000', '9899999', '2', '400', 'a:2:{i:0;s:9:\"25379.jpg\";i:1;s:9:\"36281.jpg\";}', 'online'),
(16, '33', '22', '25', '200', 'Dell 3593 Core i5 10th Gen', 'Good!!', '45000', '49000', '2', '500', 'a:2:{i:0;s:9:\"94495.jpg\";i:1;s:9:\"66758.jpg\";}', 'online'),
(18, '33', '23', '24', '488', 'Lenovo V15 Laptop, 15.6\"', 'Good!!', '59000', '60000', '18', '199', 'a:2:{i:0;s:9:\"91952.jpg\";i:1;s:9:\"22577.jpg\";}', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `pid` bigint(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pmessage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pid`, `pname`, `pmessage`) VALUES
(31, 'Dresses', 'Good!..'),
(32, 'Cars', 'Good!..'),
(33, 'Laptop', 'Good!..\r\n'),
(48, 'Mobile Accessories', 'Nice!!');

-- --------------------------------------------------------

--
-- Table structure for table `quantity`
--

CREATE TABLE `quantity` (
  `quaid` bigint(255) NOT NULL,
  `quaname` varchar(255) NOT NULL,
  `quades` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quantity`
--

INSERT INTO `quantity` (`quaid`, `quaname`, `quades`) VALUES
(1, '1', '...'),
(2, '2', '......'),
(11, '3', '...'),
(16, 'one', '....\r\n'),
(17, 'two', '...'),
(18, 'three', '....');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleid` bigint(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `Access` varchar(255) NOT NULL,
  `accessto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleid`, `role`, `Access`, `accessto`) VALUES
(1, 'SuperAdmin', 'All', 'a:8:{i:0;s:8:\"category\";i:1;s:11:\"subcategory\";i:2;s:7:\"product\";i:3;s:8:\"supplier\";i:4;s:8:\"quantity\";i:5;s:6:\"orders\";i:6;s:4:\"Role\";i:7;s:3:\"POS\";}'),
(2, 'MD', 'Custom', 'a:5:{i:0;s:8:\"category\";i:1;s:11:\"subcategory\";i:2;s:7:\"product\";i:3;s:6:\"orders\";i:4;s:3:\"POS\";}'),
(3, 'Sales Manager', 'Custom', 'a:5:{i:0;s:7:\"product\";i:1;s:8:\"supplier\";i:2;s:6:\"orders\";i:3;s:8:\"quantity\";i:4;s:4:\"Role\";}'),
(4, 'Manager', 'Custom', 'a:3:{i:0;s:8:\"category\";i:1;s:11:\"subcategory\";i:2;s:3:\"POS\";}'),
(5, 'Ad', 'Custom', 'orders'),
(6, 'SuperAdmin', 'Custom', 'a:1:{i:0;s:6:\"orders\";}');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `userid` bigint(255) NOT NULL,
  `ufname` varchar(255) NOT NULL,
  `ulname` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `umobile` varchar(255) NOT NULL,
  `ucountry` varchar(255) NOT NULL,
  `ustate` varchar(255) NOT NULL,
  `ucity` varchar(255) NOT NULL,
  `pstlcode` varchar(255) NOT NULL,
  `uaddress` varchar(255) NOT NULL,
  `praddress` varchar(255) NOT NULL,
  `upass` varchar(255) NOT NULL,
  `cfmpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`userid`, `ufname`, `ulname`, `uemail`, `umobile`, `ucountry`, `ustate`, `ucity`, `pstlcode`, `uaddress`, `praddress`, `upass`, `cfmpass`) VALUES
(1, 'Mirza ARQAM', 'MUGHAL', 'admin@gmail.com', '1899898', 'Pakistan', 'Pakistan', 'FAISALABAD', '3600', 'FSD 567', 'FSD 567', 'admin123', 'admin123'),
(2, 'Linus Macdonald', 'Clark Snider', 'zoko@mailinator.com', '54', 'Proident corrupti ', 'Nostrum sunt reicien', 'Sint quasi sed cupi', '65', 'Fuga Consequat Qua', 'Perferendis velit iu', '', ''),
(3, 'Geoffrey Dunn', 'Fleur Boone', 'mirza@gmail.com', '73', 'Sed voluptate dolori', 'Omnis molestias est ', 'Omnis aperiam in quo', '69', 'Qui consectetur ut s', 'Dolores sed esse ita', '786786', '786786'),
(4, 'Inez Solomon', 'Imelda Vasquez', 'ali@gmail.com', '33', 'Dolorem culpa repre', 'Cupidatat cillum ut ', 'Aliquam ipsum est n', '97', 'Eiusmod rerum molest', 'Dolorem vitae eos q', '123123', '123123'),
(5, 'Fulton Richard', 'Veronica Dunn', 'kinimin@mailinator.com', '18', 'Harum sit autem veni', 'Reprehenderit dolore', 'Occaecat quae quia i', '69', 'Exercitation neque q', 'Dolores ullam volupt', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(6, 'Dorian Burke', 'Malik Crawford', 'zyre@mailinator.com', '84', 'Eius deserunt non ma', 'Occaecat perferendis', 'Sed exercitationem e', '12', 'Vitae ex omnis unde ', 'Commodi consectetur', 'nads', 'nads'),
(7, 'Marcia Herring', 'Kalia Byrd', 'mitujuvu@mailinator.com', '69', 'Elit dolor accusamu', 'Voluptas perspiciati', 'Dolorum excepturi in', '3', 'Et totam atque debit', 'Labore repellendus ', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(8, 'Heather Knowles', 'Odessa Estes', 'anees@gmail.com', '38', 'Voluptas sunt amet', 'Inventore debitis au', 'Inventore eos dolore', '27', 'Asperiores pariatur', 'Nesciunt eum verita', '786786', '786786'),
(9, '', '', '', '', '', '', '', '', '', '', '', ''),
(10, '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'Adrian Leblanc', 'Donovan Rosario', 'waqas.ishaq963@gmail.com', '58', 'Natus perferendis iu', 'Labore sint quisqua', 'Dicta voluptatibus f', '14', 'Laboris dignissimos ', 'Tenetur eum et quia ', '786786', '786786'),
(12, 'Gil Gregory', 'Edward Lynn', 'mirzaarqam88@gmail.com', '40', 'Dignissimos laudanti', 'Accusamus quam sunt ', 'Eum aute accusamus m', '10', 'Iusto non autem duis', 'Dolorum dolor qui vo', '786786', '786786'),
(13, 'Guy Walton', 'Hamish Chan', 'nawazullah8695@gmail.com', '36', 'Ipsum illo quo asper', 'Nam veritatis ration', 'Facilis quae volupta', '1', 'Sunt voluptatem Dol', 'Enim sunt ut modi ut', '786786', 'Pa$$w0rd!'),
(14, 'Aurelia Galloway', 'Nita Romero', 'mirzaarqam87@gmail.com', '47', 'Eum beatae sunt eu q', 'Ipsam nihil incididu', 'Id eos ut ad veniam', '2', 'Atque quod necessita', 'Eum nihil amet dist', '786786', '786786');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` bigint(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `semail` varchar(255) NOT NULL,
  `sclass` varchar(255) NOT NULL,
  `smobile` varchar(255) NOT NULL,
  `sgender` varchar(255) NOT NULL,
  `spic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `semail`, `sclass`, `smobile`, `sgender`, `spic`) VALUES
(21, 'Bethany Levy', 'sepyzobura@mailinator.com', 'Expedita irure eiusm', '51', 'Female', '81462.jfif'),
(23, 'Kareem Young', 'halixokegu@mailinator.com', 'Ad voluptates ipsum ', '51', 'Male', '30109.jpg'),
(24, 'Bethany Hicks', 'tegen@mailinator.com', 'Omnis aspernatur odi', '97', 'Male', 'danny.jpg'),
(25, 'Bethany Hicks', 'tegen@mailinator.com', 'Omnis aspernatur odi', '97', 'Male', '53095.jpg'),
(27, 'Bethany Hicks', 'tegen@mailinator.com', 'Omnis aspernatur odi', '97', 'Male', 'danny.jpg'),
(28, 'Amaya Brennan', 'kamazysapo@mailinator.com', 'Adipisci officia nul', '41', 'Female', '84489.jpg'),
(29, 'Aline Farley', 'xivohutyh@mailinator.com', 'Non repellendus Do ', '81', '', '67984.jpg'),
(30, 'Pearl Mueller', 'veni@mailinator.com', 'Est ex voluptatem N', '49', 'Female', '37580.jpg'),
(31, 'Rhoda Aguirre', 'hepyfu@mailinator.com', 'Provident minima vo', '66', '', '63500.jpg'),
(32, 'Breanna Jarvis', 'defycika@mailinator.com', 'Omnis officia alias ', '78', 'Female', '11117.jpg'),
(33, 'Kennan Harding', 'muhevoqe@mailinator.com', 'Consequatur voluptat', '41', '41', '17007.png'),
(34, 'Kennan Harding', 'muhevoqe@mailinator.com', 'Consequatur voluptat', '41', '41', '32805.png'),
(35, 'Alvin Leblanc', 'jetitybib@mailinator.com', 'Mollit nihil blandit', '17', '17', '20196.png'),
(36, 'Sylvia Valenzuela', 'huluq@mailinator.com', 'Consequuntur volupta', '100', '100', '20833.jpg'),
(37, 'Kellie Cervantes', 'pudureqe@mailinator.com', 'Minim et quo volupta', '60', '60', '28268.png'),
(38, 'Cassady Carrillo', 'qibi@mailinator.com', 'Aut elit ad neque o', '40', '40', '4673.png');

-- --------------------------------------------------------

--
-- Table structure for table `student2`
--

CREATE TABLE `student2` (
  `sid` bigint(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `semail` varchar(255) NOT NULL,
  `sclass` varchar(255) NOT NULL,
  `spic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student2`
--

INSERT INTO `student2` (`sid`, `sname`, `semail`, `sclass`, `spic`) VALUES
(5, 'xive@mailinator.com', 'zepexeceko@mailinator.com', 'cyxed@mailinator.com', '27501.png'),
(6, 'xive@mailinator.com', 'zepexeceko@mailinator.com', 'cyxed@mailinator.com', '44427.png');

-- --------------------------------------------------------

--
-- Table structure for table `subcategary`
--

CREATE TABLE `subcategary` (
  `spid` bigint(255) NOT NULL,
  `subid` bigint(255) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `subdes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategary`
--

INSERT INTO `subcategary` (`spid`, `subid`, `subname`, `subdes`) VALUES
(32, 18, 'Civic', 'Nice!!'),
(31, 19, 'Men\'s Dresses', 'Good!!'),
(31, 21, 'Women Dresses', 'Nice'),
(33, 22, 'Dell', 'Good'),
(33, 23, 'Lenovo', 'Good'),
(48, 26, 'Headset', 'Good!!'),
(48, 27, 'Power banks', 'Nice!!!'),
(32, 28, 'Corola', 'Good!!');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supid` bigint(255) NOT NULL,
  `supname` varchar(255) NOT NULL,
  `supdes` varchar(255) NOT NULL,
  `supnum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supid`, `supname`, `supdes`, `supnum`) VALUES
(22, 'Ahsan', 'Ahsan', '65467687'),
(23, 'Saqib', 'Saqib', '03410304750'),
(24, 'Taha Developer', 'Nice!..', '767862'),
(25, 'Ali', 'Good!..', '0965687');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` bigint(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `umobile` varchar(255) NOT NULL,
  `ucnic` varchar(255) NOT NULL,
  `upass` varchar(255) NOT NULL,
  `cfmpass` varchar(255) NOT NULL,
  `rolename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `uname`, `uemail`, `umobile`, `ucnic`, `upass`, `cfmpass`, `rolename`) VALUES
(5, 'Mohsin', 'mohsin@gmail.com', '679845576', '', '786786', '786786', '21'),
(6, 'Zeeshan', 'cicozi@mailinator.com', '93', '25', '787787', '787787', '22'),
(9, 'waqas', 'waqas.ishaq963@gmail.com', '925645466', '6745780908', '786786', '786786', '24'),
(10, 'Ahmad', 'zyre@mailinator.com', '927879908', '330299099789', '82', '82', '23'),
(11, 'Maisie Guthrie', 'wotokol@mailinator.com', '61', '81', '47', '47', '24'),
(12, 'Zane Bonner', 'hisa@mailinator.com', '31', '79', '67', '67', '23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `cart2`
--
ALTER TABLE `cart2`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `newtb`
--
ALTER TABLE `newtb`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `onlineuser`
--
ALTER TABLE `onlineuser`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `pos-cart`
--
ALTER TABLE `pos-cart`
  ADD PRIMARY KEY (`posid`);

--
-- Indexes for table `pos-orderinfo`
--
ALTER TABLE `pos-orderinfo`
  ADD PRIMARY KEY (`pos-ppid`);

--
-- Indexes for table `pos-userinfo`
--
ALTER TABLE `pos-userinfo`
  ADD PRIMARY KEY (`posuserid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `quantity`
--
ALTER TABLE `quantity`
  ADD PRIMARY KEY (`quaid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `student2`
--
ALTER TABLE `student2`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `subcategary`
--
ALTER TABLE `subcategary`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `productid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cart2`
--
ALTER TABLE `cart2`
  MODIFY `productid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `uid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `newtb`
--
ALTER TABLE `newtb`
  MODIFY `nid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `onlineuser`
--
ALTER TABLE `onlineuser`
  MODIFY `uid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `pos-cart`
--
ALTER TABLE `pos-cart`
  MODIFY `posid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `pos-orderinfo`
--
ALTER TABLE `pos-orderinfo`
  MODIFY `pos-ppid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pos-userinfo`
--
ALTER TABLE `pos-userinfo`
  MODIFY `posuserid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `pid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `quantity`
--
ALTER TABLE `quantity`
  MODIFY `quaid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `userid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `student2`
--
ALTER TABLE `student2`
  MODIFY `sid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subcategary`
--
ALTER TABLE `subcategary`
  MODIFY `subid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2020 at 11:23 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlyvanban`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Văn bản Pháp Luật'),
(2, 'Văn bản Luật'),
(3, 'Văn bản Quản Lý'),
(4, 'Văn bản Nội bộ'),
(5, 'Văn bản Hành chính');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `idf` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`idf`, `name`, `size`, `type`, `link`) VALUES
(59, 'ke hoach kiem tra ct.pdf', 0, '', 'public/files/ke hoach kiem tra ct.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` int(11) NOT NULL,
  `date_of_signature` date DEFAULT NULL,
  `date` date NOT NULL,
  `user` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `delete_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `code`, `description`, `content`, `category`, `date_of_signature`, `date`, `user`, `delete_at`) VALUES
(1, 'KẾ HOẠCH KIỂM TRA CÔNG TÁC VĂN THƯ, LƯU TRỮ NĂM 2020', 'VVV', 'Được sự đồng ý của Giám đốc Sở Nội vụ, ngày 31 tháng 01 năm 2020, Chi cục Văn thư - Lưu trữ ban hành Kế hoạch số 22/KH-CCVTLT về kiểm tra công tác văn thư, lưu trữ năm 2020 tại các cơ quan, tổ chức', 'I. MỤC ĐÍCH, YÊU CẦU\r\n\r\n1. Nhằm tổng hợp, đánh giá tình hình thực hiện Luật Lưu trữ và các quy định của Nhà nước về công tác VTLT tại các cơ quan, tổ chức.\r\n\r\n2. Công tác kiểm tra giúp phát hiện và kịp thời chấn chỉnh, hướng dẫn bổ sung các điểm còn thiếu sót, chưa phù hợp với quy định trong công tác VTLT tại các cơ quan, tổ chức; từng bước nâng cao nghiệp vụ công tác VTLT, nhất là công tác lập hồ sơ, chỉnh lý, số hóa và giao nộp hồ sơ vào Lưu trữ cơ quan, Lưu trữ lịch sử; công tác quản lý tài liệu lưu trữ điện tử.\r\n\r\n3. Kết quả kiểm tra tình hình thực tế hoạt động VTLT của lĩnh vực giáo dục, y tế để có giải pháp hướng dẫn thực hiện thống nhất.\r\n\r\n4. Thông qua kết quả kiểm tra là cơ sở thực tế để tham mưu, đề xuất các phương án, đề án, nhằm phát triển ngành VTLT Thành phố.', 1, '2020-03-02', '2020-06-24', 'admin', NULL),
(3, 'ĐỀ NGHỊ CÁC CƠ QUAN, TỔ CHỨC BÁO CÁO TỔNG KẾT THỰC HIỆN LUẬT LƯU TRỮ', 'GHI', 'hực hiện Công văn số 1515/BNV-VTLTNN ngày 25 tháng 3 năm 2020 của Bộ Nội vụ về việc hướng dẫn báo cáo tổng kết thực hiện Luật Lưu trữ', 'Ngày 31 tháng 3 năm 2020, Chi cục Văn thư - Lưu trữ ban hành Công văn số 58/CCVTLT-QL gửi các cơ quan, tổ chức đề nghị báo cáo tổng kết thực hiện Luật Lưu trữ.\r\n\r\nCông văn có nội dung chủ yếu:\r\n\r\nThực hiện Công văn số 1515/BNV-VTLTNN ngày 25 tháng 3 năm 2020 của Bộ Nội vụ về việc hướng dẫn báo cáo tổng kết thực hiện Luật Lưu trữ;\r\n\r\nĐể có cơ sở tổng hợp, tham mưu Giám đốc Sở Nội vụ trình Ủy ban nhân dân Thành phố báo cáo tổng kết và đề xuất sửa đổi, bổ sung một số điều của Luật Lưu trữ, Chi cục Văn thư - Lưu trữ đề nghị các cơ quan, tổ chức báo cáo tổng kết thực hiện Luật Lưu trữ theo Đề cương đính kèm (số liệu báo cáo tính từ thời điểm Luật Lưu trữ có hiệu lực đến ngày 31 tháng 12 năm 2019).\r\n\r\nBáo cáo gửi về Chi cục Văn thư - Lưu trữ trước ngày 10 tháng 4 năm 2020, địa chỉ: tầng 6, Tòa nhà IPC, số 1489 Nguyễn Văn Linh, phường Tân Phong, Quận 7; Hệ thống quản lý văn bản của chính quyền điện tử Thành phố hoặc Email: ccvtlt.snv@tphcm.gov.vn', 1, '2020-03-04', '2020-05-25', 'admin', NULL),
(4, 'ĐỀ CƯƠNG CHUYÊN ĐỀ CÔNG TÁC QUẢN LÝ VĂN BẢN', 'XZVFK', 'Công tác quản lý văn bản là một trong bốn mặt hoạt động của công tác văn thư cơ quan. Quản lý văn bản là việc tổ chức thực hiện quản lý hệ thống văn bản đến và văn bản đi của cơ quan theo nguyên tắc và trình tự nhất định', 'Công tác quản lý văn bản được quy định thực hiện thống nhất tại Nghị định số 110/2004/NĐ-CP ngày 08 tháng 4 năm 2004 của Chính phủ về công tác văn thư, Nghị định số 09/2010/NĐ-CP ngày 08 tháng 02 năm 2010 của Chính phủ sửa đổi, bổ sung một số điều của công tác văn thư và Thông tư số 07/2012/TT-BNV ngày 22 tháng 11 năm 2012 của Bộ Nội vụ hướng dẫn quản lý văn bản, lập hồ sơ và nộp hồ sơ, tài liệu vào Lưu trữ cơ quan. Thông tư này có hiệu lực thi hành kể từ ngày 07 tháng 01 năm 2013.\r\n\r\nViệc quản lý văn bản quy định tại Thông tư số 07/2012/TT-BNV đã bãi bỏ Công văn số 425/VTLTNN-NVTW ngày 18 tháng 7 năm 2005 của Cục Văn thư và Lưu trữ nhà nước về việc hướng dẫn quản lý văn bản đi, văn bản đến.\r\n\r\nViệc quản lý văn bản bao gồm việc quản lý hệ thống văn bản đến và quản lý hệ thống văn bản đi của cơ quan được thực hiện theo nguyên tắc và trình tự như sau:', 5, '2020-03-04', '2020-05-25', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_file`
--

CREATE TABLE `post_file` (
  `idp` int(11) NOT NULL,
  `idf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_file`
--

INSERT INTO `post_file` (`idp`, `idf`) VALUES
(1, 59);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `pass` char(128) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `answer` char(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user`, `pass`, `name`, `question`, `answer`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'HKLTeam', 'Mật khẩu cấp 2', 'aef271acfc907622ec1285cbc3f3ed61');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`idf`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user`),
  ADD KEY `fk_cateogory` (`category`);

--
-- Indexes for table `post_file`
--
ALTER TABLE `post_file`
  ADD PRIMARY KEY (`idp`,`idf`),
  ADD KEY `fk_f_f` (`idf`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `idf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_cateogory` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user`) REFERENCES `user` (`user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_file`
--
ALTER TABLE `post_file`
  ADD CONSTRAINT `fk_f_f` FOREIGN KEY (`idf`) REFERENCES `files` (`idf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_f_p` FOREIGN KEY (`idp`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 04:43 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `macbook_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(10) NOT NULL,
  `role_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avata` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_ad` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `role_id`, `name`, `email`, `phone`, `address`, `password`, `avata`, `status`, `created_at`, `updated_ad`) VALUES
(9, ' 1', 'admin', 'admin@gmail.com', 1247578578, NULL, '25d55ad283aa400af464c76d713c07ad', 'default-avatar.png', 1, '2020-06-22 09:58:29', '2020-06-22 02:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `parent_id` tinyint(4) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `title`, `icon`, `sort_order`, `status`, `created_at`) VALUES
(1, 0, 'MacBook Pro', 'macbook-pro', NULL, 1, 1, '0000-00-00 00:00:00'),
(2, 0, 'Macbook Air', 'macbook-air', NULL, 2, 1, '0000-00-00 00:00:00'),
(3, 0, 'IMAC', 'macbook-cpo', NULL, 3, 1, '0000-00-00 00:00:00'),
(4, 0, 'Hàng cũ', 'hang-cu', NULL, 4, 1, '0000-00-00 00:00:00'),
(5, 0, 'Phụ kiện ', 'phu-kien', NULL, 5, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` tinyint(5) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `ordere`
--

CREATE TABLE IF NOT EXISTS `ordere` (
`id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordere`
--

INSERT INTO `ordere` (`id`, `product_id`, `qty`, `name`, `price`, `image`, `amount`, `transaction_id`, `status`, `created_at`) VALUES
(1, 7, 1, 'MXK72 - Macbook Pro 13 inch 2020 - i5 1.4/8GB/512Gb', 56000000, 'P20201-350x265.jpg', 56000000, 1, 0, '2020-06-30 14:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text,
  `qty` int(11) DEFAULT NULL,
  `hot` tinyint(4) DEFAULT '0',
  `buyed` int(5) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `thunbar` varchar(255) DEFAULT NULL,
  `status` char(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `category_id`, `content`, `qty`, `hot`, `buyed`, `view`, `thunbar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MPXQ2 - Macbook Pro 13 inch non-Touch bar 2017 - i5 2.3/8GB/128GB', 'MPXQ2 - Macbook Pro 13 inch non-Touch bar 2017 - i5 2.3/8GB/128GB - hàng CPO - Newseal chưa active', 22000000, 0, 1, '<table>\r\n	<thead>\r\n		<tr>\r\n			<td colspan="2">\r\n			<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n				<tbody>\r\n					<tr>\r\n						<td> </td>\r\n						<td> </td>\r\n					</tr>\r\n					<tr>\r\n						<td> </td>\r\n						<td> </td>\r\n					</tr>\r\n					<tr>\r\n						<td> </td>\r\n						<td> </td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			BỘ VI XỬ LÝ</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Số lượng vi xử lý</td>\r\n			<td>1 (2 Cores)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tốc Độ Vi Xử Lý</td>\r\n			<td>2.3 GHz</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Turbo Boost</td>\r\n			<td>3.6GHz</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Băng Thông Hệ Thống</td>\r\n			<td>4 GT/s (OPI)*</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cache Level 1</td>\r\n			<td>32k/32k x2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cấu trúc</td>\r\n			<td>64 – Bit</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mã Vi Xử Lý</td>\r\n			<td>Core i5 (i5 – 7360U)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Có Thể Lựa Chọn</td>\r\n			<td>2.5 Ghz*</td>\r\n		</tr>\r\n		<tr>\r\n			<td>FPU</td>\r\n			<td>Tích Hợp</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cache Bus Speed</td>\r\n			<td>2.3 GHz ( Built-in)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cache Level 2 / Level 3</td>\r\n			<td>256k x4, 4MB*</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan="2">BỘ NHỚ RAM</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Loại Ram</td>\r\n			<td>LPDDR3 SDRAM*</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ram Mặc Định</td>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ram Trên Main</td>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ram Bus</td>\r\n			<td>2133 MHz</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ram Tối Đa</td>\r\n			<td>16 GB</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan="2">CARD MÀN HÌNH</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Card Hình</td>\r\n			<td>Iris Plus Graphics 640</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại Bộ Nhớ Card Hình</td>\r\n			<td>Tích Hợp</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan="2">MÀN HÌNH</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Màn hình</td>\r\n			<td>13.3” Widescreen</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hỗ Trợ Màn Hình Phụ</td>\r\n			<td>Dual/Mirroring</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ Phân Giải</td>\r\n			<td>2560×1600</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ Phân Giải Màn Hình Phụ</td>\r\n			<td>4096×2304 (x2)</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan="2">Ổ CỨNG</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Ổ cứng</td>\r\n			<td>128, 256GB*, 512GB*</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Giao Thức Ổ Cứng</td>\r\n			<td>Proprietary (PCIe 3.0)</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan="2">GIAO TIẾP VÀ BÀN PHÍM</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Standard AirPort</td>\r\n			<td>802.11ac</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cổng USB</td>\r\n			<td>2* (3.1)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bàn Phím</td>\r\n			<td>Full-size</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Standard Bluetooth</td>\r\n			<td>4.2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cảm Ứng</td>\r\n			<td>TrackPad ( Force Touch)</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan="2">TÊN GỌI THEO NHÓM</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Case Type</td>\r\n			<td>Notebook</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mã Máy</td>\r\n			<td>MPXQ2LL/A</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Apple Model No</td>\r\n			<td>A1708</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Form Factor</td>\r\n			<td>13” Macbook Pro ( No Touch Bar)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Apple Subfamily</td>\r\n			<td>Mid 2017 13”</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model ID</td>\r\n			<td>MacbookPro 14.1</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan="2">PIN VÀ THỜI LƯỢNG PIN</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Loại Pin</td>\r\n			<td>54.5W h Li-Poly</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thời Lượng Pin</td>\r\n			<td>10 Hours</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan="2">KHẢ NĂNG HỖ TRỢ PHẦN MỀM</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Hệ Điều Hành Đi Kèm</td>\r\n			<td>X 10.12</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hỗ Trợ Windows Tối Đa</td>\r\n			<td>10 (64 Bit)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hỗ Trợ Windows Ảo</td>\r\n			<td>Boot/Virtualization</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan="2">KÍCH THƯỚC</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Kích Thước</td>\r\n			<td>0.59×11.97×8.36</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng Lượng</td>\r\n			<td>1.37 Kg</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan="2">HIỆU NĂNG THỰC TẾ</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Geekbench 3 (64)</td>\r\n			<td>8710 ( 8916 – GB 4)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Geekbench 2 (64)</td>\r\n			<td>10133</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Geekbench 2 (32)</td>\r\n			<td>7806</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Geekbench 3 (32)</td>\r\n			<td>3499</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Geekbench 3 (64)</td>\r\n			<td>3898 (4332 – GB 4)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Macbook Pro 13 inch 2017 - Thiết kế bước đầu thay đổi.</strong></p>\r\n\r\n<p dir="ltr">Trên tay mình hiện đang là phiên bản NonTouch Pro 13" 2017<br />\r\n<img alt="" src="https://www.hnmac.vn/media/data/DSC06686.jpg" /></p>\r\n\r\n<p>Giữ nguyên thiết kế  của Macbook Pro 2016 là những từ để nói đến thiết kế Macbook Pro 2017. Kích thước và ngoại hình của MacBook Pro 2016 và 2017 đều tương tự nhau.<br />\r\nCó thể thấy Apple chưa bao giờ làm người dùng thất vọng về các sản phẩm của mình. Chất liệu vỏ nhôm truyền thống sang trọng vì vậy chúng ta có thể nhận ra đó là Macbook từ ánh nhìn đầu tiên. <a href="https://www.hnmac.vn/macbook-pro-2017">Macbook Pro 2017 13inch</a> có độ dày 14,9 mm và nặng 1,37 kg.<br />\r\n<br />\r\nỞ nắp màn hình, logo Trái táo của Apple cũng giống như Macbook Pro đời 2016 là không còn phát sáng nữa mà thay vào đó là dập nổi.<br />\r\n<img alt="" src="https://www.hnmac.vn/media/data/DSC06690.jpg" /><br />\r\nMáy được bán ra với 2 màu là Silver và Space Gray. Và mình nhận thấy màu Space Gray rất đẹp và đầy nam tính và nó là điểm nhấn để tạo sự khác biệt so với các thế hệ Macbook trước đó là cứ giữ nguyên một màu Silver.</p>\r\n\r\n<p><strong>Màn hình Retina đáp ứng mọi yêu cầu của người dùng</strong></p>\r\n\r\n<p dir="ltr"><img alt="" src="https://www.hnmac.vn/media/data/DSC06727.jpg" /></p>\r\n\r\n<p dir="ltr">Màn hình của <a href="https://www.hnmac.vn/macbook-pro-2017">Macbook Pro 13inch 2017</a> sở hữu màn hình LED 13,3 inch với độ phân giải 2560 x 1600 pixel và công nghệ IPS vẫn tương tự như phiên bản của 2016 là 227 ppi.</p>\r\n\r\n<p dir="ltr">Vớị chiếc màn hình trên nên Macbook cũng làm làm hài được những người dùng khó tính. Phục vụ cho nhu cầu chỉnh sửa ản, video cũng như các hoạt động giải trí đa phương tiện.</p>\r\n\r\n<p><strong>Âm thanh hoạt động tốt bass trong và êm hơn.</strong></p>\r\n\r\n<p dir="ltr"><img alt="" src="https://www.hnmac.vn/media/data/DSC06731.jpg" /></p>\r\n\r\n<p>Trên phiên bản Macbook Pro 2017 đã nâng cấp đáng kể trên hệ thống âm thanh, hoạt động trong phạm vi lớn hơn so với các phiên bản Macbook trước đấy, đồng thời âm thanh lớn hơn 58% và âm bass lớn hơn 2.5x.</p>\r\n\r\n<p><strong>Bàn phím và TrackPad</strong><br />\r\n<img alt="" src="https://www.hnmac.vn/media/data/DSC06720.jpg" /></p>\r\n\r\n<p>Bàn phím trên Macbook Pro 13inch 2017 là bàn phím Butterfly thế hệ 2 đem lại Phản hồi tốt hơn, hành trình ngắn hơn nên cần lực gõ ít hơn và cũng nhờ vậy mà chiếc máy cũng mỏng đi 1 cách đáng kể.</p>\r\n\r\n<p dir="ltr">Với anh em chơi phím cơ thì đây là thảm hoạ vì phím quá mỏng đem lại cảm giác gõ có thể sẽ không thích so với đời Macbook Pro cũ cũng như Macbook Air.</p>\r\n', 48, 1, NULL, NULL, 'Pro13-Non-2017-Sliver-700x530.jpg', '1', '2020-06-22 14:33:53', '2020-06-22 14:33:53'),
(2, 'MVVJ2 / MVVL2 - Macbook Pro 16 inch 2019 - i7', 'MVVJ2 / MVVL2 - Macbook Pro 16 inch 2019 - i7', 53500000, 0, 1, '<p><strong>Tổng quan:</strong></p>\r\n\r\n<ul>\r\n	<li>Diện t&iacute;ch l&agrave;m việc lớn hơn đ&aacute;ng kể do k&iacute;ch thước m&agrave;n h&igrave;nh lớn hơn v&agrave; độ ph&acirc;n giải hiển thị mặc định cao hơn</li>\r\n	<li>B&agrave;n ph&iacute;m nổi hơn, th&ocirc; hơn, h&agrave;nh tr&igrave;nh ph&iacute;m g&otilde; d&agrave;i hơn, cảm gi&aacute;c g&otilde; bồng bềnh v&agrave; feedback ở mức trung b&igrave;nh</li>\r\n	<li>Tổng thể k&iacute;ch thước kh&ocirc;ng to hơn nhiều so với&nbsp;<a href="https://tinhte.vn/macbook/">MacBook</a>&nbsp;15&quot; cũ.&nbsp;<a href="https://tinhte.vn/tags/apple/">Apple</a>&nbsp;chọn giải ph&aacute;p tăng k&iacute;ch thước l&agrave;m việc v&agrave; giữ nguy&ecirc;n k&iacute;ch thước tổng thể, thay v&igrave; giảm tổng thể v&agrave; giữ nguy&ecirc;n k&iacute;ch thước l&agrave;m việc như hầu hết c&aacute;c m&aacute;y Windows viền mỏng kh&aacute;c.</li>\r\n	<li>Viền mỏng hơn kh&ocirc;ng mang lại ấn tượng mạnh v&igrave; c&aacute;c cạnh tr&ecirc;n v&agrave; dưới vẫn d&agrave;y, nếu so với c&aacute;c m&aacute;y t&iacute;nh viền mỏng kh&aacute;c th&igrave; kh&ocirc;ng c&oacute; g&igrave; mới mẻ.</li>\r\n</ul>\r\n\r\n<p><strong>K&iacute;ch thước v&agrave; m&agrave;n h&igrave;nh:</strong><br />\r\nCầm n&oacute;&nbsp;<a href="https://tinhte.vn/tags/tren-tay/">tr&ecirc;n tay</a>, bỏ v&agrave;o balo, t&uacute;i... sự thay đổi l&agrave; gần như kh&ocirc;ng thấy được. Tuy nhi&ecirc;n ch&uacute;ng ta lại c&oacute; một kh&ocirc;ng gian l&agrave;m việc lớn hơn nhiều. Lớn hơn kh&ocirc;ng chỉ bởi v&igrave; m&agrave;n h&igrave;nh c&oacute; k&iacute;ch thước lớn hơn (16&quot; so với 15&quot;4 tr&ecirc;n m&agrave;n h&igrave;nh tỉ lệ 16:10) m&agrave; c&ograve;n v&igrave; độ ph&acirc;n giải hiển thị mặc định lớn hơn (1782x1120 so với 1650x1050). Những anh em từng d&ugrave;ng MacBook 17&quot; trước đ&acirc;y đ&atilde; phải đợi bao nhi&ecirc;u năm rồi, cuối c&ugrave;ng Apple cũng đ&atilde; mang lại d&ograve;ng m&aacute;y m&agrave;n h&igrave;nh lớn n&agrave;y.<br />\r\n<br />\r\n<img alt="" src="https://www.hnmac.vn/media/data/4832929_Macbook_Pro_16-11.jpg" style="height:100%; width:100%" /><br />\r\n<br />\r\nV&agrave; với anh em hiện đang d&ugrave;ng&nbsp;<a href="https://tinhte.vn/tags/macbook-pro/">MacBook Pro</a>&nbsp;15&quot; một c&aacute;ch nghi&ecirc;m t&uacute;c th&igrave; sau n&agrave;y c&ocirc;ng việc đ&oacute; sẽ được l&agrave;m tr&ecirc;n một chiếc m&aacute;y lớn hơn. Apple cũng sẽ dừng kh&ocirc;ng l&agrave;m bản 15&quot; nữa. Kh&ocirc;ng chỉ l&agrave;m media như h&igrave;nh hay phim mới thấy ngon, m&agrave; với anh em th&iacute;ch l&agrave;m việc với nhiều cửa sổ c&ugrave;ng l&uacute;c tr&ecirc;n một m&agrave;n h&igrave;nh cũng được hưởng lợi nhiều từ việc n&agrave;y.</p>\r\n', 500, 1, NULL, NULL, '16t-1400x1060.jpg', '1', '2020-06-29 16:03:12', '2020-06-29 16:03:12'),
(3, 'MJVM2 - MacBook Air 11 inch 2015 - i5 1.6/4GB/128GB - 99%', 'MJVM2 - MacBook Air 11 inch 2015 - i5 1.6/4GB/128GB - 99%', 12500000, 0, 2, '<p>MacBook Air MJVM2 l&agrave; d&ograve;ng sản phẩm 11.6&rdquo; được ra mắt năm 2015 của apple, được n&acirc;ng cấp tương đối nhiều so với c&aacute;c d&ograve;ng MacBook Air trước đ&acirc;y, chiếc MacBook Air hiện nay đ&atilde; trở n&ecirc;n mạnh mẽ cũng như c&oacute; thời lượng sử dụng mạnh mẽ hơn hẳn<br />\r\n<img alt="" src="https://www.hnmac.vn/media/data/DSC07782.jpg" style="height:100%; width:100%" /><strong>Thiết Kế</strong></p>\r\n\r\n<p><strong>&nbsp;</strong>Vẫn giữ c&aacute;c nguy&ecirc;n tắc cơ bản cho d&ograve;ng Air, chiếc MacBook Air MJVM2 vẫn giữ một thiết kế nh&ocirc;m unibody đẹp v&agrave; chắc chắn cũng như độ mỏng v&agrave; trọng lượng cực kỳ ấn tượng</p>\r\n\r\n<p>&nbsp;M&agrave;n h&igrave;nh cũng l&agrave; điểm được đ&aacute;nh gi&aacute; rất tốt tr&ecirc;n chiếc MJVM2 n&agrave;y. Tuy độ ph&acirc;n giải chỉ l&agrave; 1366 x 768 nhưng con số n&agrave;y đặt v&agrave;o một chiếc m&agrave;n h&igrave;nh 11.6&rdquo; lại rất tuyệt vời, c&ugrave;ng c&ocirc;ng nghệ Led, m&agrave;n của chiếc MJVM2 cho chất lượng h&igrave;nh ảnh tốt, m&agrave;u sắc tươi s&aacute;ng cũng như thời lượng pin cũng được cải thiện rất nhiều.</p>\r\n\r\n<p><img alt="" src="https://www.hnmac.vn/media/data/DSC07781.jpg" style="height:100%; width:100%" /></p>\r\n\r\n<p><strong>Trackpad, b&agrave;n ph&iacute;m</strong></p>\r\n\r\n<p>&nbsp;Tuy kh&ocirc;ng được trang bị c&ocirc;ng nghệ Force Touch nhưng với c&ocirc;ng nghệ Multi-touch trackpad, chiếc MJVM2 vẫn cho một cảm gi&aacute;c sử dụng tuyệt vời, c&aacute;c thao t&aacute;c phong ph&uacute;, mượt m&agrave;.<br />\r\n<img alt="" src="https://www.hnmac.vn/media/data/DSC07790.jpg" style="height:100%; width:100%" /></p>\r\n\r\n<p>Giữ nguy&ecirc;n thiết kế b&agrave;n ph&iacute;m chiclet với c&aacute;c ph&iacute;m gọn g&agrave;ng, h&agrave;nh tr&igrave;nh ph&iacute;m kh&aacute; ổn gi&uacute;p tạo cảm gi&aacute;c thoải m&aacute;i, dễ d&agrave;ng khi g&otilde; ph&iacute;m.</p>\r\n\r\n<p><img alt="" src="https://www.hnmac.vn/media/data/DSC07787.jpg" style="height:100%; width:100%" /></p>\r\n\r\n<p><strong>Khả năng kết nối dữ liệu</strong></p>\r\n\r\n<p>C&aacute;c cổng giao tiếp kh&ocirc;ng c&oacute; nhiều thay đổi so với d&ograve;ng tiền nhiệm, gồm 2 cổng USB 3.0, 1 cổng Thunderbolt, cổng sạc v&agrave; cổng tai nghe c&ugrave;ng c&aacute;c kết nối kh&ocirc;ng d&acirc;y như Wifi v&agrave; Bluetooth.<br />\r\n<img alt="" src="https://www.hnmac.vn/media/data/DSC07792.jpg" style="height:100%; width:100%" /><img alt="" src="https://www.hnmac.vn/media/data/DSC07793.jpg" style="height:100%; width:100%" />Wifi của chiếc MJVM2 chuẩn 802.11ac, c&oacute; tốc độ nhanh gấp 3 lần so với thế hệ trước đ&oacute;, đ&acirc;y l&agrave; một cải thiện rất đ&aacute;ng kể.</p>\r\n\r\n<p><strong>Cấu h&igrave;nh</strong></p>\r\n\r\n<p>Phần cứng của MacBook Air 2015 cũng được thay đổi để đ&aacute;p ứng c&aacute;c nhu cầu của người d&ugrave;ng một c&aacute;ch đ&aacute;ng kể.</p>\r\n\r\n<p>&nbsp;Trang bị chiếc chip core I5 thế hệ 5 với xung nhịp 1.6GHz, 4gb ram v&agrave; card đồ hoạ t&iacute;ch hợp Intel HD Graphics&nbsp; 5000, với cấu h&igrave;nh n&agrave;y, hầu hết c&aacute;c nhu cầu cơ bản của người d&ugrave;ng đều được đ&aacute;p ứng một c&aacute;ch dễ d&agrave;ng.&nbsp;</p>\r\n\r\n<p>&nbsp;Ở phi&ecirc;n bản 2015, một cải thiện đ&aacute;ng để ch&iacute;nh l&agrave; ổ cứng SSD 128gb theo chuẩn PCIe c&oacute; tốc độ đọc ghi cực kỳ ấn tượng. Việc n&acirc;ng cấp tốc độ ở SSD cũng cải thiện rất nhiều tốc độ của m&aacute;y cũng như tối ưu điện năng.</p>\r\n', 20, 1, NULL, NULL, 'air-11-350x265.jpg', '1', '2020-06-29 16:06:31', '2020-06-29 16:06:31'),
(4, 'MMGM2 - Macbook Retina 12 inch 2016 - m5 1.2/8GB/512GB', 'MMGM2 - Macbook Retina 12 inch 2016 - m5 1.2/8GB/512GB', 21900000, 0, 2, '<p><strong>Tổng quan.</strong></p>\r\n\r\n<p>- Dòng Macbook mỏng nhất mà Apple cho ra đời và được thiết kế lại hoàn toàn khác với các dòng Macbook trước đây <br />\r\n- Vỏ được làm bằng nhôm với màn hình 12inch<br />\r\n- Trang bị cổng Type-C cho mọi loại kết nối<img alt="" src="https://www.hnmac.vn/media/data/DSC07455-copy-compressed.jpg" style="height:100%; width:100%" /></p>\r\n\r\n<p><strong>Thiết kế.</strong></p>\r\n\r\n<p> Với mục địch hướng người dùng đến với một sản phẩm nhỏ, gọn, mỏng nhẹ và thời trang, Apple đã đưa đến tay người dùng chiếc Macbook 12” với thiết kế cực kỳ ấn tượng. Cả chiếc máy được làm bằng nhôm nguyên khối chỉ dày chưa đến 1.5cm và cực kỳ nhẹ, ngoài ra còn có hẳn 4 màu để người dùng lựa chọn gồm Gold, Sliver Space Gray và Rose Gold<br />\r\n<img alt="" src="https://www.hnmac.vn/media/data/DSC07457-copy.jpg" style="height:100%; width:100%" /></p>\r\n', 30, 1, NULL, NULL, '12.1-350x265.jpg', '1', '2020-06-29 16:08:07', '2020-06-29 16:08:07'),
(5, 'MUHN2 - Macbook Pro 13 inch 2019 - i5 1.4/8GB/128GB - hàng CPO - New seal chưa active', 'MUHN2 - Macbook Pro 13 inch 2019 - i5 1.4/8GB/128GB - hàng CPO - New seal chưa active', 26000000, 0, 1, '<p>Đ&acirc;y l&agrave; chiếc&nbsp;<a href="https://tinhte.vn/tags/macbook-pro/">MacBook Pro</a>&nbsp;Retina 13.3inch, phi&ecirc;n bản Touch Bar 2019. Thay đổi chủ yếu ở d&ograve;ng n&agrave;y đ&oacute; l&agrave; n&acirc;ng cấp cấu h&igrave;nh phần cứng. V&agrave; khắc phục lỗi phần cứng m&agrave; c&aacute;c thế hệ trước mắc phải, đặc biệt l&agrave; hệ thống&nbsp;<a href="https://tinhte.vn/tags/ban-phim-canh-buom/">b&agrave;n ph&iacute;m c&aacute;nh bướm</a>&nbsp;mới.</p>\r\n\r\n<ul>\r\n	<li>Kh&ocirc;ng được trang bị CPU thế hệ thứ 9&nbsp;giống như d&ograve;ng&nbsp;<a href="https://tinhte.vn/macbook/">Macbook</a>&nbsp;Pro 15.4&rdquo;, tuy nhi&ecirc;n&nbsp;<a href="https://tinhte.vn/tags/macbook-pro-13/">Macbook Pro 13</a>.3inch vẫn được n&acirc;ng cấp với 1 con CPU thệ hệ thứ 8 t&ecirc;n m&atilde; l&agrave; 8257U, đ&acirc;y l&agrave; con CPU được intel ph&aacute;t triển ri&ecirc;ng cho M&aacute;y t&iacute;nh&nbsp;<a href="https://tinhte.vn/tags/apple/">Apple</a>&nbsp;dựa tr&ecirc;n con chip thế hệ cũ (i5-8257U), với xung nhịp cao hơn, đi k&egrave;m l&agrave; GPU t&iacute;ch hợp Intel Iris Plus Graphics 655 tinh chỉnh cho xung nhịp cao hơn (1.05Ghz vs 1.15Ghz)</li>\r\n	<li>Thay đổi tiếp theo đ&oacute; l&agrave; b&agrave;n ph&iacute;m c&aacute;nh bướm với c&aacute;c vật liệu cấu tạo đổi mới, đồng thời thay đổi lớp chống bụi Silicon hạn chế bụi v&agrave;o g&acirc;y hư hỏng bản ph&iacute;m.</li>\r\n	<li>V&agrave; quan trọng nhất l&agrave; gi&aacute; kh&ocirc;ng đổi so với c&aacute;c đời trước, c&oacute; nghĩa l&agrave; c&ugrave;ng một ph&acirc;n kh&uacute;c cấu h&igrave;nh m&aacute;y, nhưng ở năm 2019 với rất nhiều n&acirc;ng cấp nhưng gi&aacute; cũng vẫn bằng với c&aacute;c đời m&aacute;y 2018 trở về trước đ&acirc;y.</li>\r\n</ul>\r\n\r\n<p>Macbook Pro 13.3inch l&agrave; d&ograve;ng m&aacute;y tầm trung trong hệ sinh th&aacute;i Mac của Apple, với ưu thế l&agrave; ngoại h&igrave;nh rất nhỏ gọn, trọng lượng nhẹ (1,37kg), ph&ugrave; hợp với anh em hay phải di chuyển nhưng vẫn cần một c&aacute;i m&aacute;y t&iacute;nh c&oacute; hiệu năng ổn định đ&aacute;p ứng được nhu cầu. Tất cả c&aacute;c m&aacute;y t&iacute;nh Macbook Pro 13.3inch đều kh&ocirc;ng c&oacute; tuỳ chọn cấu h&igrave;nh c&oacute; GPU rời giống như tr&ecirc;n c&aacute;c m&aacute;y 15.4inch, tuy nhi&ecirc;n về cấu h&igrave;nh th&igrave; nếu như anh em c&oacute; nhu cầu cần n&oacute; mạnh hơn th&igrave; khi mua m&aacute;y, c&oacute; thể tuỳ chọn cấu h&igrave;nh theo &yacute; muốn như CPU tối đa l&agrave; Core i7/ 16Gb Ram v&agrave; SSD tối đa cho d&ograve;ng m&aacute;y n&agrave;y l&agrave; 2TB.</p>\r\n\r\n<p><img alt="Tren_tay_Macbook_Pro_13_2019-6151.jpg" src="https://www.hnmac.vn/media/data/4695999_Tren_tay_Macbook_Pro_13_2019-6151-copy.jpg" style="height:100%; width:100%" /><br />\r\n<em>Những g&igrave; quan trọng c&oacute; b&ecirc;n trong hộp. Thật tiếc l&agrave; sợi d&acirc;y USB-C tặng k&egrave;m l&agrave; chuẩn USB 2.0, tốc độ kh&ocirc;ng cao, chủ yếu l&agrave; d&ugrave;ng để sạc.</em><br />\r\n<img alt="Tren_tay_Macbook_Pro_13_2019-6160.jpg" src="https://www.hnmac.vn/media/data/4695910_Tren_tay_Macbook_Pro_13_2019-6160.jpg" style="height:100%; width:100%" />​</p>\r\n\r\n<p>N&oacute;i th&ecirc;m một ch&uacute;t về những chiếc m&aacute;y 13.3inch Touch Bar v&agrave; Non Touch Bar. C&oacute; thể nhiều anh em hay n&oacute;i &ldquo;Touch Bar chả để l&agrave;m g&igrave; m&agrave; lại tốn tiền&rdquo;. Việc tốn hơn 300$ để mua một c&aacute;i m&aacute;y 13.3&rdquo; Touch Bar đổi lại anh em sẽ c&oacute; 1 c&aacute;i CPU với xung nhịp cao hơn,&nbsp;c&oacute; th&ecirc;m 1 quản tản nhiệt thay v&igrave; chỉ 1 quạt tản nhiệt tr&ecirc;n phi&ecirc;n bản kh&ocirc;ng c&oacute; Touch Bar. V&agrave; quan trọng hơn nữa l&agrave; ở thời điểm hiện tại th&igrave; phi&ecirc;n bản kh&ocirc;ng c&oacute; Touch Bar vẫn chưa được n&acirc;ng cấp, vẫn đang chỉ c&oacute; bản của đời 2017 m&agrave; th&ocirc;i.</p>\r\n', 50, 1, NULL, NULL, 'daidien1-700x530.jpg', '1', '2020-06-29 16:09:39', '2020-06-29 16:09:39'),
(6, ' MVFL2 - MacBook Air 13 inch 2019 - i5 1.6/8GB/256GB - Newseal Xách Tay', ' MVFL2 - MacBook Air 13 inch 2019 - i5 1.6/8GB/256GB - Newseal Xách Tay', 26000000, 0, 2, '<p>MacBook Air 2019.<br />\r\nMỏng nhẹ, ngoại h&igrave;nh xuất sắc, thời lượng pin tốt</p>\r\n\r\n<p>Kể từ năm ngo&aacute;i, Apple đ&atilde; n&acirc;ng cấp rất nhiều cho d&ograve;ng MacBook Air của m&igrave;nh, ấn tượng đầu ti&ecirc;n l&agrave; về ngoại h&igrave;nh đẹp mắt hơn, tiếp đến l&agrave; m&agrave;n h&igrave;nh Retina sắc n&eacute;t giống như d&ograve;ng MacBook Pro.<br />\r\n<br />\r\n<img alt="" src="https://www.hnmac.vn/media/data/DSC06511-copy-compressed.jpg" style="height:100%; width:100%" /><br />\r\nApple cung cấp cho người d&ugrave;ng một t&ugrave;y chọn CPU duy nhất tr&ecirc;n MacBook Air 2019 l&agrave; Intel Core i5-8210Y, đ&acirc;y l&agrave; CPU tiết kiệm điện với c&ocirc;ng suất chỉ 7W gi&uacute;p m&aacute;y hoạt động m&aacute;t mẻ, thời lượng pin d&agrave;i hơn. C&oacute; c&aacute;c t&ugrave;y chọn lưu trữ&nbsp;<a href="https://fptshop.com.vn/may-tinh-xach-tay/macbook-air-13-128gb-2019" id="MacBook Air 2019 128GB" target="_blank" title="MacBook Air 2019 128GB" type="MacBook Air 2019 128GB">128GB</a>&nbsp;v&agrave;&nbsp;<a href="https://fptshop.com.vn/may-tinh-xach-tay/macbook-air-13-256gb-2019" target="_blank" title="256GB" type="256GB">256GB</a>, RAM 8GB hoặc 16GB, nhưng phi&ecirc;n bản 8GB RAM phổ biến hơn cả.<br />\r\n<br />\r\nThiết kế xuất sắc<br />\r\nTương tự như Macbook Air 2018, bản 2019 cũng sở hữu ngoại h&igrave;nh xuất sắc thay đổi ho&agrave;n to&agrave;n về thiết kế so với c&aacute;c d&ograve;ng Macbook Air đời cũ. Ngoại h&igrave;nh của m&aacute;y thừa hưởng kh&aacute; nhiều từ d&ograve;ng Macbook Pro 13 inch 2016 trở lại đ&acirc;y với viền m&agrave;n h&igrave;nh mỏng hơn, Trackpad rộng r&atilde;i, loa được đưa l&ecirc;n mặt tr&ecirc;n.<br />\r\n- B&agrave;n ph&iacute;m được cải tiến<br />\r\nTr&ecirc;n MacBook Air 2019, phần b&agrave;n ph&iacute;m tiếp tục được n&acirc;ng cấp l&ecirc;n Butterfly thế hệ thứ 4, Apple cho biết đ&atilde; c&oacute; một ch&uacute;t thay đổi về vật liệu cũng như t&ugrave;y biến để b&agrave;n ph&iacute;m mới hoạt động tốt hơn c&aacute;c thế hệ cũ.<br />\r\n<img alt="" src="https://www.hnmac.vn/media/data/DSC06501.jpg" style="height:100%; width:100%" /></p>\r\n', 10, 1, NULL, NULL, '5-350x265.jpg', '1', '2020-06-29 16:11:28', '2020-06-29 16:11:28'),
(7, 'MXK72 - Macbook Pro 13 inch 2020 - i5 1.4/8GB/512Gb', 'MXK72 - Macbook Pro 13 inch 2020 - i5 1.4/8GB/512Gb', 56000000, 0, 1, '<p dir="ltr"><em>H&ocirc;m nay, 4/5/2019 lại 1 lần nữa Apple &acirc;m thầm cho ra mắt d&ograve;ng sản phẩm mới .Macbook Pro 13 inch 2020. Đ&acirc;y được xem l&agrave; một bản n&acirc;ng cấp đ&aacute;ng gi&aacute; cho d&ograve;ng notebook chuy&ecirc;n nghiệp đến từ nh&agrave; t&aacute;o. H&atilde;y c&ugrave;ng Hnmac điểm qua 1 v&agrave;i n&acirc;ng cấp đ&aacute;ng gi&aacute;.</em></p>\r\n\r\n<p><img alt="" src="https://www.hnmac.vn/media/data/MBP20204.jpg" style="height:100%; width:100%" /></p>\r\n\r\n<p dir="ltr"><strong>MAGIC KEYBOARD: BYE BYE C&Aacute;NH BƯỚM, C&Ugrave;NG CH&Agrave;O Đ&Oacute;N LẠI B&Agrave;N PH&Iacute;M CẮT K&Eacute;O.&nbsp;</strong><br />\r\nTrở&nbsp;lại với truyền thống những chiếc Macbook được ra mắt gần đ&acirc;y như Macbook Pro 16 inch, Macbook Air 2020, chiếc Macbook Pro 13 inch 2020 đ&atilde; được trang bị b&agrave;n ph&iacute;m Magic Keyboard mới. Đ&acirc;y được xem l&agrave; một trong những cải tiến v&ocirc; c&ugrave;ng qu&yacute; gi&aacute;, bởi người d&ugrave;ng đ&atilde; nếm qu&aacute; nhiều tr&aacute;i đắng từ chiếc b&agrave;n ph&iacute;m c&aacute;nh bướm thế hệ cũ. Được xem l&agrave; yếu tố đầu ti&ecirc;n khiến người d&ugrave;ng băn khoăn trước quyết định c&oacute; n&ecirc;n n&acirc;ng cấp l&ecirc;n chiếc Macbook Pro 13 inch 2020 hay kh&ocirc;ng?&nbsp;</p>\r\n\r\n<p><img alt="" src="https://www.hnmac.vn/media/data/MBP20203.jpg" style="height:100%; width:100%" /></p>\r\n\r\n<p>&nbsp;B&ecirc;n cạnh đ&oacute;, ph&iacute;m ESC đ&atilde; được t&aacute;ch ri&ecirc;ng ra khỏi dải Touchbar so với những thế hệ tiền nhiệm. Rất nhiều người d&ugrave;ng đ&atilde; phản &aacute;nh rằng, ph&iacute;m ESC tr&ecirc;n dải Touchbar hoạt động kh&ocirc;ng ổn định. Nay tr&ecirc;n chiếc Macbook Pro 13 inch 2020, Apple đ&atilde; lắng nghe người d&ugrave;ng hơn v&agrave; quyết định chuyển vị tr&iacute; ESC ra b&ecirc;n cạnh dải Touch Bar. Một cải tiến nho nhỏ nữa tr&ecirc;n b&agrave;n ph&iacute;m của Macbook Pro 13 inch 2020 năm nay đến từ cụm ph&iacute;m điều hướng. Tr&ecirc;n những phi&ecirc;n bản tiền nhiệm, cụm ph&iacute;m điều hướng được xếp qu&aacute; s&aacute;t nhau, khiến người d&ugrave;ng cảm thấy kh&oacute; khăn khi muốn sử dụng. Nay tr&ecirc;n phi&ecirc;n bản Macbook Pro 13 inch 2020, cụm ph&iacute;m điều hướng n&agrave;y đ&atilde; được thiết kế lại với h&igrave;nh d&aacute;ng chữ T đảo ngược, đem lại trải nghiệm nhập liệu tốt hơn đ&aacute;ng kể cho người d&ugrave;ng.<br />\r\nB&ecirc;n cạnh đ&oacute;, ph&iacute;m &ldquo;ESC&quot; đ&atilde; được t&aacute;ch ri&ecirc;ng ra khỏi cụm Touch Bar, cũng như cụm ph&iacute;m điều hướng đ&atilde; được thiết kế lại đem tới trải nghiệm tốt hơn cho người d&ugrave;ng.</p>\r\n', 5, 1, NULL, NULL, 'P20201-350x265.jpg', '1', '2020-06-29 16:15:56', '2020-06-29 16:15:56'),
(8, 'Macbook Pro 13 inch 2019 - i5 1.4/8GB/128GB - 99%', 'Macbook Pro 13 inch 2019 - i5 1.4/8GB/128GB - 99%', 24800000, 0, 1, '<p>Đ&acirc;y l&agrave; chiếc&nbsp;<a href="https://tinhte.vn/tags/macbook-pro/">MacBook Pro</a>&nbsp;Retina 13.3inch, phi&ecirc;n bản Touch Bar 2019. Thay đổi chủ yếu ở d&ograve;ng n&agrave;y đ&oacute; l&agrave; n&acirc;ng cấp cấu h&igrave;nh phần cứng. V&agrave; khắc phục lỗi phần cứng m&agrave; c&aacute;c thế hệ trước mắc phải, đặc biệt l&agrave; hệ thống&nbsp;<a href="https://tinhte.vn/tags/ban-phim-canh-buom/">b&agrave;n ph&iacute;m c&aacute;nh bướm</a>&nbsp;mới.</p>\r\n\r\n<ul>\r\n	<li>Kh&ocirc;ng được trang bị CPU thế hệ thứ 9&nbsp;giống như d&ograve;ng&nbsp;<a href="https://tinhte.vn/macbook/">Macbook</a>&nbsp;Pro 15.4&rdquo;, tuy nhi&ecirc;n&nbsp;<a href="https://tinhte.vn/tags/macbook-pro-13/">Macbook Pro 13</a>.3inch vẫn được n&acirc;ng cấp với 1 con CPU thệ hệ thứ 8 t&ecirc;n m&atilde; l&agrave; 8257U, đ&acirc;y l&agrave; con CPU được intel ph&aacute;t triển ri&ecirc;ng cho M&aacute;y t&iacute;nh&nbsp;<a href="https://tinhte.vn/tags/apple/">Apple</a>&nbsp;dựa tr&ecirc;n con chip thế hệ cũ (i5-8257U), với xung nhịp cao hơn, đi k&egrave;m l&agrave; GPU t&iacute;ch hợp Intel Iris Plus Graphics 655 tinh chỉnh cho xung nhịp cao hơn (1.05Ghz vs 1.15Ghz)</li>\r\n	<li>Thay đổi tiếp theo đ&oacute; l&agrave; b&agrave;n ph&iacute;m c&aacute;nh bướm với c&aacute;c vật liệu cấu tạo đổi mới, đồng thời thay đổi lớp chống bụi Silicon hạn chế bụi v&agrave;o g&acirc;y hư hỏng bản ph&iacute;m.</li>\r\n	<li>V&agrave; quan trọng nhất l&agrave; gi&aacute; kh&ocirc;ng đổi so với c&aacute;c đời trước, c&oacute; nghĩa l&agrave; c&ugrave;ng một ph&acirc;n kh&uacute;c cấu h&igrave;nh m&aacute;y, nhưng ở năm 2019 với rất nhiều n&acirc;ng cấp nhưng gi&aacute; cũng vẫn bằng với c&aacute;c đời m&aacute;y 2018 trở về trước đ&acirc;y.</li>\r\n</ul>\r\n\r\n<p>Macbook Pro 13.3inch l&agrave; d&ograve;ng m&aacute;y tầm trung trong hệ sinh th&aacute;i Mac của Apple, với ưu thế l&agrave; ngoại h&igrave;nh rất nhỏ gọn, trọng lượng nhẹ (1,37kg), ph&ugrave; hợp với anh em hay phải di chuyển nhưng vẫn cần một c&aacute;i m&aacute;y t&iacute;nh c&oacute; hiệu năng ổn định đ&aacute;p ứng được nhu cầu. Tất cả c&aacute;c m&aacute;y t&iacute;nh Macbook Pro 13.3inch đều kh&ocirc;ng c&oacute; tuỳ chọn cấu h&igrave;nh c&oacute; GPU rời giống như tr&ecirc;n c&aacute;c m&aacute;y 15.4inch, tuy nhi&ecirc;n về cấu h&igrave;nh th&igrave; nếu như anh em c&oacute; nhu cầu cần n&oacute; mạnh hơn th&igrave; khi mua m&aacute;y, c&oacute; thể tuỳ chọn cấu h&igrave;nh theo &yacute; muốn như CPU tối đa l&agrave; Core i7/ 16Gb Ram v&agrave; SSD tối đa cho d&ograve;ng m&aacute;y n&agrave;y l&agrave; 2TB.</p>\r\n\r\n<p><img alt="Tren_tay_Macbook_Pro_13_2019-6151.jpg" src="https://www.hnmac.vn/media/data/4695999_Tren_tay_Macbook_Pro_13_2019-6151-copy.jpg" style="height:100%; width:100%" /><br />\r\n<em>Những g&igrave; quan trọng c&oacute; b&ecirc;n trong hộp. Thật tiếc l&agrave; sợi d&acirc;y USB-C tặng k&egrave;m l&agrave; chuẩn USB 2.0, tốc độ kh&ocirc;ng cao, chủ yếu l&agrave; d&ugrave;ng để sạc.</em><br />\r\n<img alt="Tren_tay_Macbook_Pro_13_2019-6160.jpg" src="https://www.hnmac.vn/media/data/4695910_Tren_tay_Macbook_Pro_13_2019-6160.jpg" style="height:100%; width:100%" /></p>\r\n', 20, 1, NULL, NULL, 'daidien2-1400x1060.jpg', '1', '2020-06-29 16:17:25', '2020-06-29 16:17:25'),
(9, 'MXK72 - Macbook Pro 13 inch 2020 - i5 1.4/8GB/512Gb - 2 thunderbolt - SA/A', 'MXK72 - Macbook Pro 13 inch 2020 - i5 1.4/8GB/512Gb - 2 thunderbolt - SA/A', 30000000, 0, 2, '<p dir="ltr"><em>H&ocirc;m nay, 4/5/2019 lại 1 lần nữa Apple &acirc;m thầm cho ra mắt d&ograve;ng sản phẩm mới .Macbook Pro 13 inch 2020. Đ&acirc;y được xem l&agrave; một bản n&acirc;ng cấp đ&aacute;ng gi&aacute; cho d&ograve;ng notebook chuy&ecirc;n nghiệp đến từ nh&agrave; t&aacute;o. H&atilde;y c&ugrave;ng Hnmac điểm qua 1 v&agrave;i n&acirc;ng cấp đ&aacute;ng gi&aacute;.</em></p>\r\n\r\n<p><img alt="" src="https://www.hnmac.vn/media/data/MBP20204.jpg" style="height:100%; width:100%" /></p>\r\n\r\n<p dir="ltr"><strong>MAGIC KEYBOARD: BYE BYE C&Aacute;NH BƯỚM, C&Ugrave;NG CH&Agrave;O Đ&Oacute;N LẠI B&Agrave;N PH&Iacute;M CẮT K&Eacute;O.&nbsp;</strong><br />\r\nTrở&nbsp;lại với truyền thống những chiếc Macbook được ra mắt gần đ&acirc;y như Macbook Pro 16 inch, Macbook Air 2020, chiếc Macbook Pro 13 inch 2020 đ&atilde; được trang bị b&agrave;n ph&iacute;m Magic Keyboard mới. Đ&acirc;y được xem l&agrave; một trong những cải tiến v&ocirc; c&ugrave;ng qu&yacute; gi&aacute;, bởi người d&ugrave;ng đ&atilde; nếm qu&aacute; nhiều tr&aacute;i đắng từ chiếc b&agrave;n ph&iacute;m c&aacute;nh bướm thế hệ cũ. Được xem l&agrave; yếu tố đầu ti&ecirc;n khiến người d&ugrave;ng băn khoăn trước quyết định c&oacute; n&ecirc;n n&acirc;ng cấp l&ecirc;n chiếc Macbook Pro 13 inch 2020 hay kh&ocirc;ng?&nbsp;</p>\r\n\r\n<p><img alt="" src="https://www.hnmac.vn/media/data/MBP20203.jpg" style="height:100%; width:100%" /></p>\r\n\r\n<p>&nbsp;B&ecirc;n cạnh đ&oacute;, ph&iacute;m ESC đ&atilde; được t&aacute;ch ri&ecirc;ng ra khỏi dải Touchbar so với những thế hệ tiền nhiệm. Rất nhiều người d&ugrave;ng đ&atilde; phản &aacute;nh rằng, ph&iacute;m ESC tr&ecirc;n dải Touchbar hoạt động kh&ocirc;ng ổn định. Nay tr&ecirc;n chiếc Macbook Pro 13 inch 2020, Apple đ&atilde; lắng nghe người d&ugrave;ng hơn v&agrave; quyết định chuyển vị tr&iacute; ESC ra b&ecirc;n cạnh dải Touch Bar. Một cải tiến nho nhỏ nữa tr&ecirc;n b&agrave;n ph&iacute;m của Macbook Pro 13 inch 2020 năm nay đến từ cụm ph&iacute;m điều hướng. Tr&ecirc;n những phi&ecirc;n bản tiền nhiệm, cụm ph&iacute;m điều hướng được xếp qu&aacute; s&aacute;t nhau, khiến người d&ugrave;ng cảm thấy kh&oacute; khăn khi muốn sử dụng. Nay tr&ecirc;n phi&ecirc;n bản Macbook Pro 13 inch 2020, cụm ph&iacute;m điều hướng n&agrave;y đ&atilde; được thiết kế lại với h&igrave;nh d&aacute;ng chữ T đảo ngược, đem lại trải nghiệm nhập liệu tốt hơn đ&aacute;ng kể cho người d&ugrave;ng.<br />\r\nB&ecirc;n cạnh đ&oacute;, ph&iacute;m &ldquo;ESC&quot; đ&atilde; được t&aacute;ch ri&ecirc;ng ra khỏi cụm Touch Bar, cũng như cụm ph&iacute;m điều hướng đ&atilde; được thiết kế lại đem tới trải nghiệm tốt hơn cho người d&ugrave;ng.</p>\r\n', 10, 1, NULL, NULL, 'P20201-1400x1060.jpg', '1', '2020-06-29 16:19:29', '2020-06-29 16:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `permission`, `created_at`) VALUES
(1, 'Subper admin', 'Subper admin', 'all', '2020-06-22 02:56:37'),
(2, 'Admin', 'Admin', '', '2020-06-22 02:56:37'),
(3, 'hien', 'ss', 'edit-news', '2020-06-22 02:56:37'),
(4, 'Ruma Fashion', 'yy', 'delete-order', '2020-06-22 02:56:37'),
(5, 'Ruma Fashion', 'yy', 'delete-order', '2020-06-22 02:56:37'),
(6, 'Test', 'Description', 'home,list-order,delete-order,list-category', '2020-06-22 02:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `active` tinyint(5) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `name`, `email`, `address`, `phone`, `amount`, `message`, `active`, `created_at`) VALUES
(1, 'vietanh ', 'phamvietanh2710@gmail.com', 'Hà Nội ', '0969466833 ', 56000000, NULL, 0, '2020-06-30 14:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `name`, `email`, `password`, `phone`, `address`, `created_at`) VALUES
(1, NULL, 'vietanh', 'phamvietanh2710@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0969466833', 'Hà Nội', '2020-06-30 14:33:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `id_2` (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`), ADD FULLTEXT KEY `title` (`title`);

--
-- Indexes for table `ordere`
--
ALTER TABLE `ordere`
 ADD PRIMARY KEY (`id`), ADD KEY `transaction_id` (`transaction_id`), ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ordere`
--
ALTER TABLE `ordere`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordere`
--
ALTER TABLE `ordere`
ADD CONSTRAINT `ordere_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ordere_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

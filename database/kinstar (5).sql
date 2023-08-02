-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 31, 2023 lúc 08:00 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kinstar`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `name`, `thumb`, `created_date`) VALUES
(2, 'banner film', 'slide-f-1.jpg', '2023-07-29'),
(3, 'banner film', 'slide-f-2.jpg', '2023-07-29'),
(4, 'banner film', 'slide-f-3.jpg', '2023-07-29'),
(5, 'banner film', 'slide-f-4.jpg', '2023-07-29'),
(6, 'banner home', 'slide-1.jpg', '2023-07-29'),
(7, 'banner home', 'slide-2.jpg', '2023-07-29'),
(8, 'banner home', 'slide-3.jpg', '2023-07-29'),
(9, 'banner home', 'slide-4.jpg', '2023-07-29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `beverages`
--

CREATE TABLE `beverages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `thumb` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `beverages`
--

INSERT INTO `beverages` (`id`, `name`, `price`, `detail`, `thumb`) VALUES
(1, '1 Ly nước', 35000, '1 Ly Pepsi 350ml', '48tải xuống (4).jfif'),
(2, 'Bắp', 55000, '1  túi bắp 160g', '3photo1569834628378-1569834628687-crop-15698346881461785318215.jpg'),
(3, 'Combo2', 110000, '2 ly nước 350ml, 1 túi bắp 160g ', '14gia-bap-nuoc-cgv-4.png'),
(4, 'Combo1', 80000, '1 Ly Pepsi 350ml, 1 túi bắp 160g', '174dcf799a77eafbbf0b2c7c0ee79c4938.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_beverages`
--

CREATE TABLE `bill_beverages` (
  `id` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_beverages` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_beverages`
--

INSERT INTO `bill_beverages` (`id`, `id_ticket`, `id_beverages`, `quantity`, `price`) VALUES
(11, 11, 3, 2, 110000),
(12, 12, 1, 1, 35000),
(13, 12, 2, 2, 110000),
(14, 12, 3, 2, 220000),
(15, 12, 4, 2, 160000),
(18, 15, 1, 5, 175000),
(19, 15, 2, 2, 110000),
(20, 21, 3, 1, 110000),
(21, 22, 2, 1, 55000),
(22, 22, 1, 1, 35000),
(23, 26, 3, 3, 330000),
(24, 26, 4, 3, 240000),
(25, 27, 1, 1, 35000),
(26, 27, 2, 1, 55000),
(27, 27, 3, 2, 220000),
(28, 28, 3, 3, 330000),
(29, 28, 2, 3, 165000),
(30, 28, 4, 1, 80000),
(31, 28, 1, 2, 70000),
(32, 33, 3, 1, 110000),
(33, 33, 2, 1, 55000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chair_is_waiting`
--

CREATE TABLE `chair_is_waiting` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_showtime` int(11) NOT NULL,
  `col_index` int(10) NOT NULL,
  `row_index` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_` date NOT NULL,
  `vote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `percent` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `discount`
--

INSERT INTO `discount` (`id`, `name`, `date_start`, `date_end`, `percent`, `quantity`) VALUES
(1, 'MAKHUYENMAI1', '2023-07-18', '2023-07-31', 10, 4),
(7, 'KHYENMAINE', '2023-07-20', '2023-07-21', 100, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film`
--

CREATE TABLE `film` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `directors` varchar(255) NOT NULL,
  `actor` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `premiere` date NOT NULL,
  `time` int(10) NOT NULL,
  `language` varchar(255) NOT NULL,
  `rated` varchar(255) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `thumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `film`
--

INSERT INTO `film` (`id`, `name`, `directors`, `actor`, `genre`, `premiere`, `time`, `language`, `rated`, `trailer`, `description`, `thumb`) VALUES
(7, 'QUỶ QUYỆT: CỬA ĐỎ VÔ ĐỊNH', 'Patrick Wilson', 'Ty Simpkins, Patrick Wilson, Hiam Abbass, Sinclair Daniel, Andrew Astor, Rose Byrne', 'Kinh Dị', '2023-07-14', 134, 'Tiếng Anh - Phụ đề Tiếng Việt', 'T16 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 16 TUỔI TRỞ LÊN (16+)', 'https://www.youtube.com/embed/mTcLzRFK1ro', 'Phần tiếp theo của loạt phim kinh dị Insidious với sự góp mặt của dàn diễn viên gốc thuộc gia đình Lambert. Câu chuyện xoay quanh quyết định mở ra cánh cửa đỏ và đi sâu vào Cõi Vô Định của Josh (Patrick Wilson) và Dalton (Ty Simpkins) - nay đã trưởng thành - để tiêu diệt một lần và mãi mãi những con quỷ đang ám ảnh cả gia đình mình. Từ đó họ phải đối mặt với quá khứ tăm tối và đầy bí ản của gia đình, nơi những ám ảnh kinh hoàng nhất đang rình rập. Dàn diễn viên gốc từ Insidious trở lại gồm Patrick Wilson (kiêm vai trò đạo diễn), Ty Simpkins, Rose Byrne và Andrew Astor. Cũng có sự tham gia của Sinclair Daniel và Hiam Abbass. Phim do Jason Blum, Oren Peli, James Wan và Leigh Whannell sản xuất. Kịch bản được viết bởi Scott Teems dựa trên câu chuyện của Leigh Whannell, và nhân vật do Leigh Whannell tạo ra.', '51700x1000_8_.jpg'),
(9, 'NHIỆM VỤ: BẤT KHẢ THI NGHIỆP BÁO PHẦN MỘT', 'Christopher McQuarrie', 'Tom Cruise, Rebecca Ferguson, Vanessa Kirby', 'Hành Động, Phiêu Lưu', '2023-07-14', 160, 'Tiếng Anh - Phụ đề Tiếng Việt, tiếng Hàn', 'T16 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 16 TUỔI TRỞ LÊN (16+)', 'https://www.youtube.com/embed/TVEIIUXUC6E', 'Phần phim thứ 7 của loạt phim Nhiệm Vụ Bất Khả Thi', '42700x1000_7_.jpg'),
(10, 'XỨ SỞ CÁC NGUYÊN TỐ', ' Peter Sohn', 'Leah Lewis, Mamoudou Athie', 'Gia đình, Hài, Hoạt Hình', '2023-07-14', 139, 'Tiếng Anh - Phụ đề Tiếng Việt; Lồng tiếng', 'K - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM DƯỚI 13 TUỔI VÀ CÓ NGƯỜI BẢO HỘ ĐI KÈM', 'https://www.youtube.com/embed/8qTBWDKtyYU', 'Xứ Sở Các Nguyên Tố từ Disney và Pixar lấy bối cảnh tại thành phố các nguyên tố, nơi lửa, nước, đất và không khí cùng chung sống với nhau. Câu chuyện xoay quanh nhân vật Ember, một cô nàng cá tính, thông minh, mạnh mẽ và đầy sức hút. Tuy nhiên, mối quan hệ của cô với Wade - một anh chàng hài hước, luôn thuận thế đẩy dòng - khiến Ember cảm thấy ngờ vực với thế giới này. Được đạo diễn bởi Peter Sohn, sản xuất bởi Denise Ream, và lồng tiếng bởi Leah Lewis (Ember) và Mamoudou Athie (Wade), phim dự kiến khởi chiếu tại rạp vào tháng 23.06.2023.', '8poster_official_preiview.jpg'),
(11, 'TAY ĐUA KIỆT XUẤT', 'Ross Venokur', ' Sharon Horgan, Chloe Bennet, J.K. Simmons, Jimmy O. Yang,… ', 'Hoạt Hình', '2023-07-14', 92, 'Tiếng Anh - Phụ đề Tiếng Việt; Lồng tiếng', 'K - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM DƯỚI 13 TUỔI VÀ CÓ NGƯỜI BẢO HỘ ĐI KÈM', 'https://www.youtube.com/embed/ZsQwK81LdZA', 'Bộ phim kể về một chú cu li chậm chạp tên Trí (Zhi) có niềm say mê với tốc độ. Ngôi làng nơi Trí và bà ngoại sống đang đứng trước nguy cơ bị phá hủy để xây dựng một khu trung tâm sang trọng. Khi đó, Trí đã đặt cược với Quang Phế (Vainglorious) - nhà đương kim vô địch. Với sự giúp đỡ của một nhà cựu vô địch đua xe, Trí tham gia cuộc đua kéo dài bốn ngày với hy vọng chiến thắng để cứu ngôi làng cũng như thực hiện ước mơ đua xe của mình.', '80poster_rally_road_racers_final.jpg'),
(12, 'QUÝ CÔNG TỬ', 'Park Hoon-jung', 'Kim Seon-Ho, Kang Tae-Ju, Go Ara, Kang-woo Kim', 'Hành Động', '2023-07-14', 118, 'Tiếng Hàn - Phụ đề tiếng Việt, tiếng Anh', 'T18 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 18 TUỔI TRỞ LÊN (18+)', 'https://www.youtube.com/embed/ybcWiZOjJj8', 'Quý Công Tử xoay quanh người đàn ông bí ẩn được biết đến với tên gọi “Quý Công Tử”. Gã đột nhiên xuất hiện trước mắt Marco, một thanh niên người Philippines mơ ước trở thành vận động viên boxing chuyên nghiệp, lang thang khắp các sàn đấu bất hợp pháp tại đây. Nhằm chi trả cho viện phí của mẹ, Marco đến Hàn Quốc để tìm người cha đã bỏ rơi hai mẹ con cậu từ lâu. Đụng độ Quý Công Tử cùng hàng loạt những con người bí hiểm trong thế giới ngầm, Marco trở thành mục tiêu duy nhất của những thế lực mang nhiều mục đích khác nhau. Cuộc truy đuổi điên cuồng bắt đầu.', '54poster_1__3_2.jpg'),
(13, 'PHIM ĐIỆN ẢNH THÁM TỬ LỪNG DANH CONAN: TÀU NGẦM SẮT MÀU ĐEN', 'Yuzuru Tachikawa', 'Yuzuru Tachikawa', 'Hành Động, Hoạt Hình, Phiêu Lưu', '2023-07-21', 110, 'Tiếng Nhật - Phụ đề Tiếng Việt; Lồng tiếng', 'K - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM DƯỚI 13 TUỔI VÀ CÓ NGƯỜI BẢO HỘ ĐI KÈM', 'https://www.youtube.com/embed/0bJXtdfb7hg', 'Thám Tử Lừng Danh Conan: Tàu Ngầm Sắt Màu Đen lấy bối cảnh tại Pacific Buoy - một trụ sở hàng hải của Interpol có nhiệm vụ kết nối các camera an ninh trên toàn thế giới. Nhóm của Conan, theo lời mời của Sonoko, cũng đến đảo Hachijo để xem cá voi. Tại đây, Conan nhận được thông tin về một nhân viên Europol bị ám sát. Cùng với đó, tính mạng Haibara bị đe dọa, phải chăng thân phận của cô đã bị bại lộ trước Gin…', '70conan_movie_26_-_vietnamese_poster.jpg'),
(14, 'DINH THỰ MA ÁM', 'Justin Simien', 'Jamie Lee Curtis, Owen Wilson, Rosario Dawson', 'Gia đình, Hài, Tâm Lý', '2023-07-28', 120, 'Tiếng Anh - Phụ đề Tiếng Việt', 'T16 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 16 TUỔI TRỞ LÊN (16+)', 'https://www.youtube.com/embed/uYH-YphjlmI', 'Nhà là nơi ma ám. Cùng xem đoạn trailer của bộ phim Dinh Thự Ma Ám sẽ được trình chiếu tại các cụm rạp vào ngày 28.07 này.', '25rsz_haunted_mansion_teaser_poster.jpg'),
(18, 'TRĂM NĂM HẠNH PHÚC!', 'Mook-Piyakarn Bootprasert', 'Chompoo Araya A. Hargate, Sunny Suwanmethanont, Becky Rebecca', 'Hài, Tâm Lý', '2023-07-26', 135, ' Tiếng Thái - Phụ đề Tiếng Việt và Tiếng Anh', 'T16 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 16 TUỔI TRỞ LÊN (16+)', 'https://www.youtube.com/embed/ZC9lcxgLfnU', 'Chuyện tình sóng gió của Sati (Sunny Suwanmethanont) và Meta (Chompoo Araya) ngỡ chỉ còn thiếu 1 giọt nước...mắt nữa sẽ tràn ly thì Sati đã “suy” Meta sau cú “hôn đất” nhẹ tựa mây hồng, chỉ gây mất trí nhớ sương sương về quá khứ khá “bad” của mình. Sau khi cố chấp muốn lội về ngày xưa để lý giải cho hiện tại bất ổn của mình…Sati đã “lôi kéo” thêm vợ cũ và con gái Namo (Becky Rebecca) chung vui bằng cách cùng anh du hành thông qua những tấm hình được chụp bằng “chiếc máy ảnh xuyên không” mà Sati vô tình tìm được.. Từ đây, nhà có 3 người đã tạo ra những tình huống bá đạo tưởng hơi twist mà twist hơi nhiều!!', '2700x1000-livelaughlove_1_.jpg'),
(19, 'DORAEMON: NOBITA VÀ VÙNG ĐẤT LÝ TƯỞNG', 'Japan', 'Japan', 'Animation Japan', '2023-07-26', 120, ' Japan', 'Dành cho mọi độ tuổi', 'https://www.youtube.com/embed/bUTfUVLP_Zk', 'Phim điện ảnh Doraemon: Nobita và vùng đất lý tưởng trên bầu trời - kể câu chuyện khi Nobita tìm thấy một hòn đảo hình lưỡi liềm trên trời mây. Ở nơi đó, tất cả đều hoàn hảo… đến mức cậu nhóc Nobita mê ngủ ngày cũng có thể trở thành một thần đồng toán học, một siêu sao thể thao. Cả hội Doraemon cùng sử dụng một món bảo bối độc đáo chưa từng xuất hiện trước đây để đến với vương quốc tuyệt vời này. Cùng với những người bạn ở đây, đặc biệt là chàng robot mèo Sonya, cả hội đã có chuyến hành trình tới vương quốc trên mây tuyệt vời… cho đến khi những bí mật đằng sau vùng đất lý tưởng này được hé lộ.', '5011117_103_100004.jpg'),
(20, 'FANTI', 'Andy Nguyễn', 'Thảo Tâm, Hồ Thu Anh, Võ Điền Gia Huy, Công Dương ', ' thriller (giật gân)', '2023-08-20', 120, 'Tiếng việt', 'T16 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 16 TUỔI TRỞ LÊN (16+)', 'https://www.youtube.com/embed/yZvCDWOfRPI', 'Thế giới của cô diễn viên trẻ đảo lộn khi một kẻ ẩn danh đội lốt fan bước ra từ chiếc điện thoại và bắt đầu theo dõi, quấy phá, thậm chí đe doạ cuộc sống của cô.', '1211045_103_100002.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `detail_content` longtext NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `detail_content`, `thumb`, `created_date`, `role`) VALUES
(1, '[EXPEND4BLE - BIỆT ĐỘI ĐÁNH THUÊ 4] - Thương hiệu hành động “Biệt Đội Đánh Thuê” trở lại màn ảnh sau một thập kỷ, quy tụ dàn sao hạng A Hollywood', 'Một trong những thương hiệu phim hành động nổi tiếng bậc nhất Hollywood - Biệt Đội Đánh Thuê (The Expendables) sẽ chính thức trở lại vào tháng 9 tới đây. Những gương mặt biểu tượng của loạt phim như Sylvester Stallone hay Jason Statham sẽ đồng loạt trở lạ', '<h2><strong>[EXPEND4BLE - BIỆT ĐỘI Đ&Aacute;NH THU&Ecirc; 4] - Thương hiệu h&agrave;nh động &ldquo;Biệt Đội Đ&aacute;nh Thu&ecirc;&rdquo; trở lại m&agrave;n ảnh sau một thập kỷ, quy tụ d&agrave;n sao hạng A Hollywood</strong></h2>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/expendables-1.jpeg\" /></p>\r\n\r\n<p><em>Biệt Đội Đ&aacute;nh Thu&ecirc; 4 (tựa gốc: Expend4ables)&nbsp;</em>tiếp tục theo ch&acirc;n biệt đội đặc biệt n&agrave;y thực hiện c&aacute;c nhiệm vụ mới, lần n&agrave;y l&agrave; ngăn chặn &ocirc;ng tr&ugrave;m khủng bố Suarto, với &acirc;m mưu bu&ocirc;n lậu vũ kh&iacute; hạt nh&acirc;n v&agrave; k&iacute;ch động chiến tranh giữa 2 phe Nga v&agrave; Mỹ.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Trong đoạn giới thiệu của&nbsp;<em>Biệt Đội Đ&aacute;nh Thu&ecirc; 4,&nbsp;</em>kh&aacute;n giả được gặp lại những gương mặt th&acirc;n quen từng l&agrave; một phần kỷ niệm tuyệt vời của họ những năm đầu thế kỷ 21. Gi&agrave; g&acirc;n Sylvester Stallone sẽ quay lại phần phim trong vai tr&ograve; đặc biệt, nhường lại &quot;h&agrave;o quang&quot; nh&acirc;n vật trung t&acirc;m cho Jason Statham với vai diễn Lee Christmas. Lần n&agrave;y, Lee sẽ l&agrave; người dẫn dắt biệt đội thực hiện những nhiệm vụ hiểm nguy trước mắt.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/expendables-2.jpeg\" /></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, kh&aacute;n giả được chi&ecirc;m ngưỡng m&agrave;n trở lại &quot;đốt mắt&quot; của mỹ nh&acirc;n quyến rũ bậc nhất Hollywood Megan Fox. Ở tuổi 36, Fox sở hữu gương mặt đẹp sắc sảo c&ugrave;ng th&acirc;n h&igrave;nh v&ocirc; c&ugrave;ng n&oacute;ng bỏng. C&ocirc; v&agrave;o vai một đặc vụ CIA, cũng l&agrave; bạn g&aacute;i cũ của Lee. Những h&igrave;nh ảnh t&igrave;nh tứ của Jason Statham v&agrave; Megan Fox trong trailer khiến kh&aacute;n giả th&ecirc;m kỳ vọng v&agrave;o &quot;phản ứng h&oacute;a học&quot; đỉnh cao giữa cả hai. Nhiều &yacute; kiến cho biết, đ&atilde; từ rất l&acirc;u, họ mới được thấy &quot;anh h&ugrave;ng c&ocirc; độc&quot; Jason Statham v&agrave;o vai &quot;t&igrave;nh nh&acirc;n&quot; c&ugrave;ng một sao nữ v&agrave; c&oacute; những ph&acirc;n cảnh ướt &aacute;t như vậy tr&ecirc;n m&agrave;n ảnh rộng.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/expendables-3.jpeg\" /></p>\r\n\r\n<p>Những h&igrave;nh ảnh được h&eacute; lộ qua trailer hứa hẹn&nbsp;<em>Biệt Đội Đ&aacute;nh Thu&ecirc; 4&nbsp;</em>sẽ đưa kh&aacute;n giả trở lại với thời ho&agrave;ng kim trong những bộ phim h&agrave;nh động đậm chất Hollywood, với những m&agrave;n ch&aacute;y nổ, đua xe, cận chiến đ&atilde; mắt. Sau phần 3 từng khiến kh&ocirc;ng &iacute;t fan &quot;phật l&ograve;ng&quot; khi trở n&ecirc;n nhẹ đ&ocirc; cho ph&ugrave; hợp với m&aacute;c PG-13, &ecirc; k&iacute;p chia sẻ, họ thực hiện&nbsp;<em>Biệt Đội Đ&aacute;nh Thu&ecirc; 4&nbsp;</em>với định hướng của một phim h&agrave;nh động nh&atilde;n R, mang tất cả những pha chiến đấu v&agrave; kết liễu bạo lực mang t&iacute;nh thương hiệu của loạt phim trở lại m&agrave;n ảnh.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&ugrave;ng với d&agrave;n sao hạng A, phần phim mới sẽ được cầm trịch bởi đạo diễn Scott Waugh. &Ocirc;ng từng đạo diễn nhiều phim h&agrave;nh động nổi tiếng, trong đ&oacute; c&oacute; thể kể đến&nbsp;<em>Need for Speed.&nbsp;</em></p>\r\n\r\n<p><em><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/expendables-4.jpeg\" /></em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>M&ugrave;a thu năm nay,&nbsp;<em>Biệt Đội Đ&aacute;nh Thu&ecirc; 4&nbsp;</em>đ&atilde; sẵn s&agrave;ng trở lại để khuấy đảo m&agrave;n ảnh rộng to&agrave;n cầu. Phim dự kiến sẽ khởi chiếu tại quốc tế v&agrave; Việt Nam v&agrave;o 22.09.2023 tới đ&acirc;y.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>EXPEND4ABLES - tựa Việt: BIỆT ĐỘI Đ&Aacute;NH THU&Ecirc; 4 - dự kiến khởi chiếu th&aacute;ng 22.09.2023.&nbsp;</p>\r\n', '61expendables-1.jpeg', '2023-07-31', 0),
(2, '[Shin - Cậu Bé Bút Chì: Đại Chiến Siêu Năng Lực Sushi Bay] - Thương hiệu “Shin - Cậu Bé Bút Chì” công phá màn ảnh rộng với phần phim 3D đầu tiên, “chốt đơn” khởi chiếu 25.08', 'Vừa có màn quậy tung màn ảnh rộng hồi đầu năm trong phần phim 2D thứ 30, mùa hè năm nay, Shin - Cậu Bé Bút Chì tiếp tục \"công phá\" phòng vé với phần phim 3D đầu tiên trong toàn loạt phim. Đây là dự án trọng điểm được thực hiện trong suốt 7 năm của loạt ph', '<h3>[Shin - Cậu B&eacute; B&uacute;t Ch&igrave;: Đại Chiến Si&ecirc;u Năng Lực Sushi Bay] - Thương hiệu &ldquo;Shin - Cậu B&eacute; B&uacute;t Ch&igrave;&rdquo; c&ocirc;ng ph&aacute; m&agrave;n ảnh rộng với phần phim 3D đầu ti&ecirc;n, &ldquo;chốt đơn&rdquo; khởi chiếu 25.08</h3>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/shin-1.jpeg\" /></p>\r\n\r\n<p><em>3DCG! Shin - Cậu B&eacute; B&uacute;t Ch&igrave;: Đại Chiến Si&ecirc;u Năng Lực ~Sushi Bay~&nbsp;</em>xoay quanh c&acirc;u chuyện về hai nguồn s&aacute;ng đặc biệt từ vũ trụ mang theo si&ecirc;u năng lực đặc biệt tới Tr&aacute;i Đất. Một nguồn s&aacute;ng t&iacute;ch cực &quot;nhập&quot; v&agrave;o nh&oacute;c Shin, khiến cặp m&ocirc;ng n&uacute;ng n&iacute;nh của cậu ch&agrave;ng trở n&ecirc;n n&oacute;ng bỏng v&agrave; c&oacute; khả năng điều khiển những đồ vật xung quanh theo &yacute; muốn.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/shin-2.jpeg\" /></p>\r\n\r\n<p>Thế nhưng, năng lực đặc biệt n&agrave;y kh&ocirc;ng chỉ chia sẻ cho m&igrave;nh Shin. Một thanh ni&ecirc;n trẻ kh&aacute;c t&ecirc;n Mitsuru Hiriya - người v&ocirc; c&ugrave;ng bất m&atilde;n với cuộc sống hiện tại cũng nhận được si&ecirc;u năng lực n&agrave;y. Nhưng thay v&igrave; sử dụng si&ecirc;u năng lực một c&aacute;ch &quot;trong s&aacute;ng&quot; như nh&oacute;c Shin, Hiriya lại sử dụng năng lượng n&agrave;y để trả th&ugrave; cuộc sống. Đồng thời, một nh&agrave; khoa học xấu xa kh&aacute;c cũng đang nhăm nhe &yacute; định lợi dụng si&ecirc;u năng lực của Hiriya để trở th&agrave;nh b&aacute; chủ. Số phận thế giới l&uacute;c n&agrave;y nằm trong tay nh&oacute;c Shin! Liệu cậu b&eacute;ch&agrave;ng v&agrave; gia đ&igrave;nh sẽ l&agrave;m g&igrave; để bảo vệ cuộc sống b&igrave;nh y&ecirc;n cho mọi người?&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://youtu.be/sNQhWlwitr4\" target=\"_blank\">https://youtu.be/sNQhWlwitr4</a></p>\r\n\r\n<p><em>Trailer &quot;3DCG! Shin - Cậu B&eacute; B&uacute;t Ch&igrave;: Đại Chiến Si&ecirc;u Năng Lực ~Sushi Bay~&quot;</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Với nội dung được cải bi&ecirc;n từ tập truyện&nbsp;<em>Shinnosuke v&agrave; Himawari: Anh Em Si&ecirc;u Năng Lực,&nbsp;</em>phần phim mới đưa v&agrave;o những giả thuyết bất ngờ xung quanh hai nguồn năng lực ngo&agrave;i Tr&aacute;i Đất, đồng thời x&acirc;y dựng tuyến nh&acirc;n vật th&uacute; vị gi&uacute;p bộ phim hồi hộp, cuốn h&uacute;t cho tới tận ph&uacute;t cuối c&ugrave;ng. Đồng thời, c&aacute;c th&ocirc;ng điệp &yacute; nghĩa về gia đ&igrave;nh, sự dũng cảm cũng được đan c&agrave;i đầy kh&eacute;o l&eacute;o th&ocirc;ng qua những c&acirc;u chuyện h&agrave;i hước của Shin-chan v&agrave; gia đ&igrave;nh, bạn b&egrave;.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/shin-3.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>L&agrave; t&aacute;c phẩm đầu ti&ecirc;n sử dụng c&ocirc;ng nghệ đồ họa 3D của loạt phim điện ảnh&nbsp;<em>Shin - Cậu B&eacute; B&uacute;t Ch&igrave;,&nbsp;</em>phần phim mới n&agrave;y hứa hẹn sẽ đem đến cho kh&aacute;n giả những trải nghiệm điện ảnh cực kỳ mới mẻ xoay quanh h&agrave;nh tr&igrave;nh của nh&oacute;c Shin. Phần tạo h&igrave;nh gần như kh&ocirc;ng thay đổi so với phi&ecirc;n bản 2D, giữ nguy&ecirc;n n&eacute;t đ&aacute;ng y&ecirc;u của c&aacute;c nh&acirc;n vật. C&ugrave;ng với đ&oacute;, phần chuyển động c&ocirc;ng nghệ 3D khiến c&aacute;c nh&acirc;n vật trở n&ecirc;n sống động, gần gũi hơn với kh&aacute;n giả.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/shin-4.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ch&iacute;nh thức ra rạp tại Việt Nam v&agrave;o ng&agrave;y 25.08 với cả phi&ecirc;n bản lồng tiếng v&agrave; phụ đề,&nbsp;<em>3DCG! Shin - Cậu B&eacute; B&uacute;t Ch&igrave;: Đại Chiến Si&ecirc;u Năng Lực ~Sushi Bay~&nbsp;</em>được coi l&agrave; anime bom tấn cuối c&ugrave;ng của m&ugrave;a h&egrave; sau cơn sốt m&agrave;&nbsp;<em>Doraemon&nbsp;</em>hay&nbsp;<em>Th&aacute;m Tử Lừng Danh Conan&nbsp;</em>tạo ra. Đ&acirc;y cũng l&agrave; điểm đặc biệt khi phần phim mới của&nbsp;<em>Shin-chan&nbsp;</em>được chiếu tại cả Nhật Bản v&agrave; Việt Nam trong th&aacute;ng 8, cho thấy cơn sốt to&agrave;n cầu của bộ phim.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>NEW DIMENSION! CRAYON SHINCHAN THE MOVIE: BATTLE OF SUPERNATURAL POWERS ~ FLYING SUSHI ~ - tựa Việt: 3DCG! SHIN - CẬU B&Eacute; B&Uacute;T CH&Igrave;: ĐẠI CHIẾN SI&Ecirc;U NĂNG LỰC ~SUSHI BAY~ - khởi chiếu tại rạp 25.08.2023 với cả phi&ecirc;n bản lồng tiếng v&agrave; phụ đề.&nbsp;</p>\r\n', '71shin-2.jpeg', '2023-07-31', 0),
(5, 'BÊN TRONG VỎ KÉN VÀNG | Phim Việt thắng lớn tại Cannes “Bên Trong Vỏ Kén Vàng ” sẽ ra mắt khán giả trong nước tháng 8 này', 'Tại Liên hoan phim Cannes 2023, bộ phim Bên Trong Vỏ Kén Vàng (tựa tiếng Anh: Inside the Yellow Cocoon Shell) đã chiến thắng ở hạng mục Camera d\'Or – giải thưởng vinh danh các tác phẩm đầu tay xuất sắc. Tác phẩm của đạo diễn Phạm Thiên Ân là bộ phim thứ h', '<h2><strong>B&Ecirc;N TRONG VỎ K&Eacute;N V&Agrave;NG | Phim Việt thắng lớn tại Cannes &ldquo;B&ecirc;n Trong Vỏ K&eacute;n V&agrave;ng &rdquo; sẽ ra mắt kh&aacute;n giả trong nước th&aacute;ng 8 n&agrave;y</strong></h2>\r\n\r\n<p>Đạo diễn Phạm Thi&ecirc;n &Acirc;n chia sẻ về việc mang&nbsp;B&ecirc;n Trong Vỏ K&eacute;n V&agrave;ng&nbsp;đến với kh&aacute;n giả Việt Nam, đ&acirc;y l&agrave; c&aacute;ch để đo&agrave;n l&agrave;m phim b&agrave;y tỏ l&ograve;ng biết ơn c&ugrave;ng lời tri &acirc;n đẹp nhất đến những người đ&atilde; ủng hộ phim trong suốt thời gian qua. Kh&ocirc;ng chỉ vậy, đ&acirc;y c&ograve;n l&agrave; cơ hội để &ecirc; k&iacute;p tr&igrave;nh chiếu những thước phim đầy tự h&agrave;o được quay tại L&acirc;m Đồng - mảnh đất qu&ecirc; hương của ch&iacute;nh đạo diễn Phạm Thi&ecirc;n&nbsp;&Acirc;n.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/ben-trong-vo-ken-vang-1.jpeg\" /></p>\r\n\r\n<p>B&ecirc;n Trong Vỏ K&eacute;n V&agrave;ng&nbsp;theo ch&acirc;n Thiện (L&ecirc; Phong Vũ) tr&ecirc;n h&agrave;nh tr&igrave;nh đưa linh cữu của chị d&acirc;u về qu&ecirc; ngoại, mang theo đứa ch&aacute;u trai t&ecirc;n Đạo (Nguyễn Thịnh) &ndash; đ&atilde; sống s&oacute;t thần kỳ sau vụ tai nạn. Trở về qu&ecirc; hương, Thiện bắt đầu h&agrave;nh tr&igrave;nh t&igrave;m kiếm người anh đ&atilde; mất t&iacute;ch nhiều năm trước để trao Đạo cho anh trai.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Giữa khung cảnh huyền b&iacute; của v&ugrave;ng n&ocirc;ng th&ocirc;n Việt Nam, h&igrave;nh b&oacute;ng qu&aacute; khứ, tuổi trẻ của Thiện c&ugrave;ng gia đ&igrave;nh dần trở lại, khiến anh bắt đầu đặt ra những c&acirc;u hỏi s&acirc;u sắc về đức tin của ch&iacute;nh m&igrave;nh. Rời khỏi th&agrave;nh thị, về với nơi sống bao quanh bởi rừng gi&agrave; c&ugrave;ng những m&agrave;n sương bản lảng, Thiện cũng dần s&acirc;u v&agrave;o m&ecirc; cung của mộng tưởng &ndash; thực tại, anh vật lộn trong cuộc khủng hoảng hiện sinh về những g&igrave; đ&aacute;ng để sống.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/ben-trong-vo-ken-vang-2.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/ben-trong-vo-ken-vang-3.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chia sẻ về&nbsp;B&ecirc;n Trong Vỏ K&eacute;n V&agrave;ng, Phạm Thi&ecirc;n &Acirc;n cho biết:&nbsp;<em>Với &quot;B&ecirc;n trong vỏ k&eacute;n v&agrave;ng&quot;, t&ocirc;i muốn kh&aacute;m ph&aacute; h&agrave;nh tr&igrave;nh về qu&ecirc; của một người đ&agrave;n &ocirc;ng đưa dẫn anh ta kết nối với qu&aacute; khứ như thế n&agrave;o. Lần trở về qu&ecirc; hương n&agrave;y cho thấy xung đột nội t&acirc;m giữa một đức tin m&agrave; anh ấy bỏ b&ecirc; v&agrave; một cuộc sống khiến anh ta v&ocirc; c&ugrave;ng bất m&atilde;n. H&agrave;nh tr&igrave;nh phản &aacute;nh những chiều k&iacute;ch của t&acirc;m hồn con người, thứ m&agrave; ch&uacute;ng ta kh&ocirc;ng ngừng t&igrave;m kiếm nhưng kh&ocirc;ng bao giờ c&oacute; thể ho&agrave;n thiện, một c&aacute;i g&igrave; đ&oacute; kết nối với ước mơ, đam m&ecirc; v&agrave; c&aacute;i chết kh&ocirc;ng thể tr&aacute;nh khỏi.</em>&nbsp;<em>T&ocirc;i tin rằng để vượt qua sự hối hả của bề nổi x&atilde; hội hiện đại, tất cả ch&uacute;ng ta đều phải sống về mặt tinh thần. D&ugrave; tin Ch&uacute;a hay kh&ocirc;ng, người ta kh&ocirc;ng tr&aacute;nh khỏi việc đặt c&acirc;u hỏi m&igrave;nh l&agrave; ai, đang sống v&igrave; ai&quot;</em>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Về giải thưởng Cam&eacute;ra d&#39;Or (M&aacute;y Quay V&agrave;ng), được tạo ra lần đầu v&agrave;o năm 1978 bởi Gilles Jacob, đ&acirc;y l&agrave; giải thưởng l&acirc;u đời v&agrave; uy t&iacute;n của Li&ecirc;n hoan phim Cannes d&agrave;nh cho phim truyện đầu tay hay nhất được tr&igrave;nh chiếu tại một trong c&aacute;c cuộc tuyển chọn của Cannes. Giải thưởng Cam&eacute;ra d&#39;Or được trao giải trong Lễ bế mạc Li&ecirc;n hoan bởi một ban gi&aacute;m khảo độc lập v&agrave; thay đổi theo từng năm. Đ&acirc;y l&agrave; ước mơ của rất nhiều đạo diễn độc lập tr&ecirc;n khắp thế giới bởi v&igrave; một đạo diễn chỉ c&oacute; thể đạt được giải M&aacute;y Quay V&agrave;ng một lần trong cuộc đời l&agrave;m phim.&nbsp;B&ecirc;n Trong Vỏ K&eacute;n V&agrave;ng &ndash;&nbsp;vinh dự l&agrave; t&aacute;c phẩm Việt Nam duy nhất tranh giải v&agrave; thắng lớn ở Cannes năm nay. Bộ phim cũng nhận được tr&agrave;ng vỗ tay hơn 5 ph&uacute;t của kh&aacute;n giả trong đ&ecirc;m tr&igrave;nh chiếu ng&agrave;y 24/5 vừa qua.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/ben-trong-vo-ken-vang-4.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>B&ecirc;n Trong Vỏ K&eacute;n V&agrave;ng&nbsp;c&oacute; sự g&oacute;p mặt của d&agrave;n diễn vi&ecirc;n trẻ gồm L&ecirc; Phong Vũ (vai Thiện), Nguyễn Thị Tr&uacute;c Quỳnh (vai chị Thảo), Nguyễn Thịnh (vai Đạo) v&agrave; Vũ Ngọc Mạnh (vai Trung). Bộ phim được đạo diễn v&agrave; dựng phim bởi Phạm Thi&ecirc;n &Acirc;n, đ&acirc;y l&agrave; phim d&agrave;i đầu tay của anh sau nhiều phim ngắn. Phim được sản xuất bởi JK Film, h&atilde;ng phim th&agrave;nh lập năm 2014 bởi đạo diễn Phạm Thi&ecirc;n &Acirc;n, nh&agrave; sản xuất Trần Văn Thi v&agrave; nh&oacute;m bạn c&ugrave;ng chung ch&iacute; hướng đam m&ecirc; điện ảnh. Với mong muốn đưa điện ảnh Việt Nam vươn tầm quốc tế, JK Film tập trung ph&aacute;t triển những g&oacute;c nh&igrave;n độc đ&aacute;o trong nền điện ảnh độc lập Việt Nam, phản &aacute;nh những kh&iacute;a cạnh kh&aacute;c nhau của đời sống đương đại. H&atilde;ng đ&atilde; sản xuất một số phim ngắn như&nbsp;<em>Hair</em>&nbsp;(2014),&nbsp;<em>Blind Light</em>&nbsp;(2016),&nbsp;<em>The Mute</em>&nbsp;(2018) v&agrave;&nbsp;<em>Stay Awake, Be Ready</em>&nbsp;(2019), v&agrave; gi&agrave;nh được nhiều giải thưởng danh gi&aacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đạo diễn Phạm Thi&ecirc;n &Acirc;n sinh năm 1989. Sau khi tốt nghiệp Đại học Hoa Sen, TP. HCM ng&agrave;nh C&ocirc;ng nghệ th&ocirc;ng tin, anh t&igrave;m thấy niềm y&ecirc;u th&iacute;ch đối với điện ảnh v&agrave; bắt đầu &quot;con đường&quot; l&agrave;m phim chuy&ecirc;n nghiệp. Năm 2014, anh gi&agrave;nh giải Nh&igrave; cuộc thi&nbsp;<em>L&agrave;m phim ngắn 48 giờ</em>. Năm 2018, phim ngắn&nbsp;<em>C&acirc;m lặng</em>&nbsp;(<em>The Mute</em>) của Phạm Thi&ecirc;n &Acirc;n đ&atilde; đến c&aacute;c li&ecirc;n hoan phim quốc tế Palm Springs, Tampere v&agrave; Uppsala. Phim ngắn mới nhất của anh mang t&ecirc;n&nbsp;<em>H&atilde;y thức tỉnh v&agrave; sẵn s&agrave;ng</em>&nbsp;(Stay Awake, Be Ready) đ&atilde; được vinh danh với giải Illy tại sự kiện mang t&ecirc;n Directors&#39; Fortnight 2019, v&agrave; tr&igrave;nh chiếu ở nhiều li&ecirc;n hoan phim quốc tế.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>B&Ecirc;N TRONG VỎ K&Eacute;N V&Agrave;NG&nbsp;dự kiến khởi chiếu v&agrave;o&nbsp;11.08.2023.</p>\r\n', '39ben-trong-vo-ken-vang-1.jpeg', '2023-07-31', 0),
(6, '[Ác Quỷ Ma Sơ II] - Biểu tượng kinh dị đình đám Valak chính thức trở lại trong trailer mới của “Ác Quỷ Ma Sơ II”', 'Một trong những biểu tượng kinh dị đình đám nhất của vũ trụ kinh dị The Conjuring nói riêng và điện ảnh thế giới thế kỷ 21 nói chung - ma sơ Valak - sẽ có màn trở lại trong phần phim riêng mới The Nun II (tựa Việt: Ác Quỷ Ma Sơ II)', '<h2><strong>[&Aacute;c Quỷ Ma Sơ II] - Biểu tượng kinh dị đ&igrave;nh đ&aacute;m Valak ch&iacute;nh thức trở lại trong trailer mới của &ldquo;&Aacute;c Quỷ Ma Sơ II&rdquo;</strong></h2>\r\n\r\n<p>Lấy bối cảnh nước Ph&aacute;p năm 1956, c&ugrave;ng c&aacute;i chết b&iacute; ẩn của một linh mục, một giai thoại đ&aacute;ng sợ v&agrave; &aacute;m ảnh sẽ mở ra. Phần phim tiếp tục xoay quanh nh&acirc;n vật ch&iacute;nh - Sơ Irene - do Taissa Farmiga thủ vai.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/ac-quy-ma-so-1.jpeg\" /></p>\r\n\r\n<p>Đoạn trailer mới của&nbsp;<em>The Nun II&nbsp;</em>đưa kh&aacute;n giả đến với một tu viện, nơi c&aacute;c c&ocirc; b&eacute; đang đ&ugrave;a giỡn rất vui vẻ với nhau. Tuy nhi&ecirc;n, một c&ocirc; b&eacute; nhận ra h&agrave;nh động kỳ lạ ở một người đ&agrave;n &ocirc;ng. Phải chăng c&oacute; thế lực b&iacute; ẩn n&agrave;o đ&oacute; đang t&aacute;c động đến những con người ở đ&acirc;y?&nbsp;</p>\r\n\r\n<p><a href=\"https://youtu.be/Ppnu3iUAm5U\" target=\"_blank\">https://youtu.be/Ppnu3iUAm5U</a>&nbsp;</p>\r\n\r\n<p><em>Trailer &quot;&Aacute;c Quỷ Ma Sơ II&quot;</em></p>\r\n\r\n<p>Sơ Irene sau đ&oacute; đ&atilde; c&oacute; mặt tại tu viện v&agrave; tr&ograve; chuyện với c&ocirc; b&eacute; về những sự việc xảy ra tại đ&acirc;y. C&ocirc; b&eacute; kể lại về một tr&ograve; chơi, nơi 5 c&ocirc; b&eacute; c&ugrave;ng chơi, v&agrave; c&ocirc; em &uacute;t phải nh&igrave;n v&agrave;o một căn ph&ograve;ng b&iacute; mật sau một lỗ tho&aacute;ng nhỏ. Theo lời c&ocirc; b&eacute;, thứ c&ocirc; nh&igrave;n thấy ở đ&acirc;y l&agrave; một nữ tu. Liệu Sơ Irene c&oacute; nhận ra, đ&acirc;y ch&iacute;nh l&agrave; hồn ma nữ tu Valak từng c&oacute; cuộc chiến &quot;sống c&ograve;n&quot; với c&ocirc; kh&ocirc;ng l&acirc;u trước đ&acirc;y?</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/ac-quy-ma-so-2.jpeg\" /></p>\r\n\r\n<p>L&agrave; phần phim tiếp nối c&acirc;u chuyện năm 2019 của&nbsp;<em>The Nun,&nbsp;</em>bộ phim hứa hẹn sẽ tiếp tục h&eacute; lộ đến kh&aacute;n giả những kh&iacute;a cạnh mới đằng sau c&acirc;u chuyện về hồn ma nữ tu từng reo rắc biết bao nỗi &aacute;m ảnh n&agrave;y. Bầu kh&ocirc;ng kh&iacute; u &aacute;m, quỷ dị vốn l&agrave; điểm mạnh của c&aacute;c bộ phim thuộc thương hiệu&nbsp;<em>The Conjuring&nbsp;</em>sẽ tiếp tục được thể hiện trong&nbsp;<em>The Nun II.&nbsp;</em>Điều n&agrave;y khiến tựa phim về ma sơ Valak hứa hẹn sẽ trở th&agrave;nh t&aacute;c phẩm kinh dị nổi bật bậc nhất nửa cuối năm nay.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Phần phim mới do đạo diễn Michael Chaves của&nbsp;<em>The Conjuring: The Devil Made Me Do It&nbsp;</em>cầm trịch, c&ugrave;ng bi&ecirc;n kịch&nbsp;Goldberg &amp; Richard Naing v&agrave; Akela Cooper của Meg3n v&agrave; Malignant chấp b&uacute;t. B&ecirc;n cạnh Taissa Farmiga, Bonnie Aarons - nữ diễn vi&ecirc;n thủ vai Valak trong cả&nbsp;<em>The Conjuring 2&nbsp;</em>v&agrave;&nbsp;<em>The Nun&nbsp;</em>cũng như t&agrave;i tử Jonas Bloquet sẽ trở lại trong phần tiếp theo. Phim bổ sung th&ecirc;m Storm Reid - nữ diễn vi&ecirc;n trẻ được biết đến qua&nbsp;<em>The Suicide Squad.&nbsp;</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>THE NUN II - tựa Việt: &Aacute;C QUỶ MA SƠ II - dự kiến khởi chiếu th&aacute;ng 8.09.2023.&nbsp;</p>\r\n', '16ac-quy-ma-so-1.jpeg', '2023-07-31', 0),
(7, '[BLUE BEETLE] - Bom tấn mới của nhà DC “Blue Beetle” hé lộ trailer mới: Sức mạnh gia đình lần nữa lên ngôi?', 'Sau tuyên bố của người đứng đầu DC Studios - CEO James Gunn về việc Blue Beetle sẽ tiếp tục hành trình của mình trong vũ trụ mới DCU, rất nhiều sự chú ý được dành cho siêu anh hùng mới toanh lần đầu lên màn ảnh rộng trong phần phim riêng vào tháng 8 tới đ', '<h3>[BLUE BEETLE] - Bom tấn mới của nh&agrave; DC &ldquo;Blue Beetle&rdquo; h&eacute; lộ trailer mới: Sức mạnh gia đ&igrave;nh lần nữa l&ecirc;n ng&ocirc;i?</h3>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/blue-beetle.jpeg\" /></p>\r\n\r\n<p>Rạng s&aacute;ng 12/7 (giờ Việt Nam),&nbsp;<em>Blue Beetle&nbsp;</em>ch&iacute;nh thức c&ocirc;ng bố trailer tiếp theo sau đoạn giới thiệu &quot;g&acirc;y b&atilde;o&quot; trước đ&acirc;y. Gương mặt nổi bật của biệt đội Teen Titans - anh ch&agrave;ng Jaime Reyes (do Xolo Mariduena thủ vai) khiến kh&aacute;n giả cho&aacute;ng ngợp với những khả năng si&ecirc;u b&aacute; đạo m&agrave; bọ xanh Scarab trao cho anh.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://youtu.be/j5rpK0Ba7q8\" target=\"_blank\"><em>https://youtu.be/j5rpK0Ba7q8</em></a></p>\r\n\r\n<p><em>Trailer mới của &quot;Blue Beetle&quot;</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cũng giống như trailer đầu ti&ecirc;n, đoạn giới thiệu mới của bộ phim nhận được nhiều lời t&aacute;n dương của kh&aacute;n giả dựa phần kỹ xảo ấn tượng c&ugrave;ng những pha biến h&igrave;nh phấn kh&iacute;ch khiến kh&aacute;n giả kh&ocirc;ng thể ngồi y&ecirc;n. Kh&aacute;c với c&aacute;c si&ecirc;u anh h&ugrave;ng sử dụng nhiều &quot;sức mạnh vật l&yacute;&quot; hay c&aacute;c khả năng si&ecirc;u nhi&ecirc;n, Blue Beetle nổi bật với bộ gi&aacute;p được coi l&agrave; &quot;tối t&acirc;n bậc nhất vũ trụ si&ecirc;u anh h&ugrave;ng&quot;. Điều đ&oacute; cho anh ch&agrave;ng tự do sử dụng kho vũ kh&iacute; đỉnh cao trong bộ gi&aacute;p.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/blue-beetle--2-.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thế nhưng, những g&igrave; gi&aacute;p xanh Blue Beetle l&agrave;m được c&ograve;n hơn thế. N&oacute; c&ograve;n tạo ra bất cứ&nbsp;loại vũ kh&iacute; n&agrave;o Jaime c&oacute; thể tượng tưởng. Điều n&agrave;y hứa hẹn một bữa tiệc đ&atilde; mắt của những vũ kh&iacute; tối t&acirc;n, s&aacute;ng tạo khiến kh&aacute;n giả trầm trồ v&agrave; phấn kh&iacute;ch trong&nbsp;<em>Blue Beetle.&nbsp;</em>Những đoạn đối thoại h&agrave;i hước giữa Jaime v&agrave; Scarab (do Becky G lồng tiếng) cũng l&agrave; điểm s&aacute;ng của bộ phim, b&aacute;o hiệu một &quot;t&igrave;nh bạn&quot; độc nhất v&ocirc; nhị tr&ecirc;n m&agrave;n ảnh rộng.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/blue-beetle--3-.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;,&nbsp;<em>Blue Beetle&nbsp;</em>nhiều khả năng sẽ l&agrave; một phim si&ecirc;u anh h&ugrave;ng tiếp theo đề cao t&igrave;nh cảm gia đ&igrave;nh, đặc biệt sau c&acirc;u thoại của Jaime: &quot;T&igrave;nh y&ecirc;u gia đ&igrave;nh ch&iacute;nh l&agrave; thứ gi&uacute;p t&ocirc;i trở n&ecirc;n mạnh mẽ&quot;. Ph&acirc;n đoạn b&agrave; nội của Jaime &ocirc;m vũ kh&iacute; tấn c&ocirc;ng phản diện khiến kh&aacute;n giả c&agrave;ng th&ecirc;m t&ograve; m&ograve; về gia đ&igrave;nh đặc biệt n&agrave;y. Kh&ocirc;ng chỉ c&oacute; kỹ xảo đẹp mắt,&nbsp;<em>Blue Beetle&nbsp;</em>c&oacute; thể sẽ l&agrave; t&aacute;c phẩm với nội dung th&acirc;n thiện với kh&aacute;n giả đại ch&uacute;ng.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/blue-beetle--4-.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Blue Beetle&nbsp;</em>l&agrave; c&acirc;u chuyện về anh ch&agrave;ng Jaime Reyes, sinh ra v&agrave; lớn l&ecirc;n trong một gia đ&igrave;nh gốc Mexico. L&agrave; người duy nhất tốt nghiệp Đại học trong gia đ&igrave;nh, Jaime được cả nh&agrave; đặt trọn niềm tin. Thế nhưng, trong ng&agrave;y đầu ti&ecirc;n đến tập đo&agrave;n Kord nhận việc theo lời mời của Jenny Kord (Bruna Marqueze thủ vai), Jaime được Jenny trao cho một hộp burger kỳ lạ, trong đ&oacute; cất giấu một loại vũ kh&iacute; hủy diệt thế giới l&agrave; Scarab. Bọ xanh ngay lập tức lựa chọn Jaime l&agrave;m vật chủ, đưa anh v&agrave;o một h&agrave;nh tr&igrave;nh đầy phấn kh&iacute;ch để chống lại những kẻ phản diện &acirc;m mưu th&ocirc;n t&iacute;nh thế giới. D&ugrave; Jaime đ&atilde; sẵn s&agrave;ng hay chưa, giờ đ&acirc;y anh đ&atilde; l&agrave; một si&ecirc;u anh h&ugrave;ng.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>BLUE BEETLE dự kiến khởi chiếu 18.08.2023</p>\r\n', '86blue-beetle.jpeg', '2023-07-31', 0),
(8, '[Thám Tử Lừng Danh Conan: Tàu Ngầm Sắt Màu Đen] - 5 cặp đôi được fan Conan “đẩy thuyền” năm này qua năm khác: Movie 26 có tận 3 cặp đôi đông fan nhất!', 'Không chỉ gây hấp dẫn bởi những vụ án \"hack não\", loạt phim Thám Tử Lừng Danh Conan còn thu hút lượng fan đông đảo nhờ những tuyến tình cảm, cũng như nhiều cặp đôi thú vị. Dù là yêu đương, đồng đội hay bạn bè tri kỷ, các \"couple\" của Conan đều có câu chuy', '<h3>[Th&aacute;m Tử Lừng Danh Conan: T&agrave;u Ngầm Sắt M&agrave;u Đen] - 5 cặp đ&ocirc;i được fan Conan &ldquo;đẩy thuyền&rdquo; năm n&agrave;y qua năm kh&aacute;c: Movie 26 c&oacute; tận 3 cặp đ&ocirc;i đ&ocirc;ng fan nhất!</h3>\r\n\r\n<p>Shinichi &amp; Ran</p>\r\n\r\n<p>Với c&aacute;c kh&aacute;n giả y&ecirc;u th&iacute;ch loạt&nbsp;<em>Th&aacute;m Tử Lừng Danh Conan</em>, cặp đ&ocirc;i Shinichi - Ran vẫn đ&oacute;ng vai tr&ograve; quan trọng nhất trong cả loạt truyện. Kudo Shinichi v&agrave; Mori Ran l&agrave; &quot;thanh mai tr&uacute;c m&atilde;&quot;, c&ugrave;ng nhau học mẫu gi&aacute;o, cấp 1 rồi l&ecirc;n tận trung học. Thậm ch&iacute;, 2 b&ecirc;n gia đ&igrave;nh (m&agrave; cụ thể l&agrave; 2 người mẹ) lại v&ocirc; c&ugrave;ng th&acirc;n thiết, giao hảo với nhau. C&oacute; thể n&oacute;i, Ran l&agrave; người con g&aacute;i duy nhất khiến Shinichi rung động, v&agrave; l&agrave; động lực lớn nhất để anh sớm lật đổ Tổ chức &Aacute;o đen v&agrave; trở về nh&acirc;n dạng thật của m&igrave;nh.</p>\r\n\r\n<p>Ch&iacute;nh t&aacute;c giả Gosho Aoyama cũng từng khẳng định Shinichi v&agrave; Ran l&agrave; một đ&ocirc;i v&agrave; sẽ c&oacute; kết đẹp, vậy th&igrave; kh&ocirc;ng c&oacute; l&yacute; g&igrave; m&agrave; fan của CONAN kh&ocirc;ng tiếp tục hy vọng v&agrave; đ&oacute;n chờ một si&ecirc;u đ&aacute;m cưới của &quot;cặp đ&ocirc;i v&agrave;ng&quot; l&agrave;ng anime n&agrave;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/shinichi-ran.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Conan &amp; Haibara Ai</p>\r\n\r\n<p>Nếu khoảng thời gian thanh xu&acirc;n của Shinichi l&agrave; b&ecirc;n cạnh Ran, th&igrave; phần lớn thời gian của Conan đều c&oacute; sự g&oacute;p mặt của c&ocirc; bạn Haibara Ai. Haibara v&agrave; Conan c&oacute; nhiều điểm chung như th&ocirc;ng minh, c&oacute; &oacute;c ph&aacute; &aacute;n, quả cảm, lại c&ugrave;ng chịu chung số phận &quot;teo nhỏ&quot; v&igrave; thuốc của Tổ chức &Aacute;o đen. Từ quan hệ &quot;chuột bạch th&iacute; nghiệm&quot; (do Haibara l&agrave; người điều chế ra thuốc teo nhỏ), cặp đ&ocirc;i dần dần trở th&agrave;nh bạn học, rồi l&agrave; đ&ocirc;i bạn tri kỷ ăn &yacute;, trải qua biết bao vụ &aacute;n h&oacute;c b&uacute;a.</p>\r\n\r\n<p>Kh&aacute;c với Ran, Conan lu&ocirc;n c&oacute; sự t&ocirc;n trọng nhất định d&agrave;nh cho Haibara. Anh tr&aacute;nh gọi c&ocirc; l&agrave; &quot;Ai&quot; nhằm giữ khoảng c&aacute;ch bạn b&egrave;, cũng l&agrave; một c&aacute;ch để Haibara thoải m&aacute;i. Ở phần phim 26 n&agrave;y, &quot;t&igrave;nh bạn diệu kỳ&quot; của Conan v&agrave; Haibara chắc chắn sẽ v&ocirc; c&ugrave;ng tỏa s&aacute;ng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/conan-haibara.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Rei x Akai</p>\r\n\r\n<p><em>Th&aacute;m Tử Lừng Danh Conan</em>&nbsp;rất biết c&aacute;ch x&acirc;y dựng c&aacute;c &quot;cặp b&agrave;i tr&ugrave;ng&quot;, m&agrave; trong đ&oacute; Furuya Rei v&agrave; Akai c&oacute; đ&ocirc;ng fan kh&ocirc;ng k&eacute;m bất k&igrave; ai. Cả hai đều l&agrave; những đặc vụ xuất ch&uacute;ng, c&oacute; nhiều mật hiệu v&agrave; th&acirc;n phận v&igrave; đều từng l&agrave; &quot;điệp vi&ecirc;n 2 mang&quot; của Tổ chức &Aacute;o đen. Tuy c&oacute; nhiều lần c&ugrave;ng nhau đụng độ, s&aacute;t c&aacute;nh trong c&aacute;c vụ &aacute;n nhưng điều khiến kh&aacute;n giả y&ecirc;u th&iacute;ch cặp đ&ocirc;i n&agrave;y ch&iacute;nh l&agrave; nhiều uẩn kh&uacute;c, hiểu lầm dẫn đến mối hận th&ugrave; kh&oacute; x&oacute;a nh&ograve;a giữa 2 anh ch&agrave;ng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/rei-akai.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Năm xưa, Akai, Rei v&agrave; một đồng đội c&oacute; b&iacute; danh Scotch đ&atilde; từng c&oacute; m&agrave;n chạm mặt. Scotch khi n&agrave;y nghĩ m&igrave;nh bị Rei ph&aacute;t hiện l&agrave; gi&aacute;n điệp FBI n&ecirc;n muốn tự s&aacute;t để bảo mật danh t&iacute;nh của m&igrave;nh v&agrave; cả Rei. Akai khi n&agrave;y cố thuyết phục Scotch rằng bản th&acirc;n anh cũng l&agrave; &quot;tay trong&quot; của FBI, thế nhưng Scotch đ&atilde; quyết định nổ s&uacute;ng khi nghe tiếng bước ch&acirc;n chạy l&ecirc;n. Rei nh&igrave;n thấy Akai v&agrave; một Scotch đ&atilde; l&igrave;a đời, sau đ&oacute; nghĩ rằng Akai đ&atilde; bức chết Scotch. Một người kh&ocirc;ng chịu giải th&iacute;ch, một người kh&ocirc;ng chịu nghe, v&agrave; kết cục l&agrave; người xem c&oacute; một cặp đ&ocirc;i &quot;ngược t&acirc;m&quot;, &quot;đụng l&agrave; trụng&quot; như thế n&agrave;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Takagi x Sato</p>\r\n\r\n<p>L&agrave; 2 nh&acirc;n vật ch&iacute;nh của movie 25 từng đạt doanh thu cao nhất mọi thời đại d&agrave;nh cho anime tại Việt Nam, Takagi v&agrave; Sato c&oacute; chuyện t&igrave;nh khiến kh&aacute;n giả th&iacute;ch th&uacute; trong&nbsp;<em>Th&aacute;m Tử Lừng Danh Conan</em>. Tại sở cảnh s&aacute;t, trung sĩ Takagi cũng giống nhiều anh ch&agrave;ng đồng nghiệp kh&aacute;c, đ&oacute; l&agrave; th&iacute;ch thầm thiếu &uacute;y Sato. Tuy nhi&ecirc;n Takagi c&oacute; đặc &acirc;n l&agrave; thường xuy&ecirc;n c&ugrave;ng Sato ph&aacute; &aacute;n. Ngược lại, Sato cũng nảy sinh t&igrave;nh cảm với Takagi, d&ugrave; c&oacute; đ&ocirc;i lần diện mạo Takagi gợi nhớ Sato về Matsuda Jinpei - ch&agrave;ng cảnh s&aacute;t điển trai qu&aacute; cố m&agrave; Sato từng rất y&ecirc;u.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/takagi-sato.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thế nhưng sau nhiều chuy&ecirc;n &aacute;n v&agrave; h&agrave;ng loạt nguy hiểm sinh tử, Sato nhận ra t&igrave;nh cảm của m&igrave;nh hướng về Takagi v&agrave; đồng &yacute; đ&aacute;p lại anh. Tuy vậy, cả hai đ&atilde; nhiều lần phải l&agrave;m &quot;đ&aacute;m cưới giả&quot; để v&acirc;y bắt kẻ th&ugrave;, v&agrave; vẫn c&ograve;n nợ fan một h&ocirc;n lễ ho&agrave;nh tr&aacute;ng &quot;h&agrave;ng thật&quot; 100%.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hattori x Kazuha</p>\r\n\r\n<p><em>Th&aacute;m Tử Lừng Danh Conan</em>&nbsp;c&oacute; 3 cặp đ&ocirc;i trung học ch&iacute;nh được y&ecirc;u th&iacute;ch, nhưng chỉ c&oacute; 2 trong số đ&oacute; l&agrave; đ&atilde; x&aacute;c nhận th&agrave;nh đ&ocirc;i. Hattori v&agrave; Kazuha l&agrave; trường hợp đặc biệt, cũng l&agrave; b&agrave;i test độ ki&ecirc;n nhẫn cho người h&acirc;m mộ. Giống Shinichi v&agrave; Ran, Kazuha v&agrave; Hattori cũng biết nhau từ nhỏ, thậm ch&iacute; &quot;t&igrave;nh trong như đ&atilde; mặt ngo&agrave;i c&ograve;n e&quot;. Ch&agrave;ng th&aacute;m tử miền T&acirc;y đương nhi&ecirc;n thầm thương trộm nhớ Kazuha, v&agrave; ngược lại Kazuha th&iacute;ch Hattori ra mặt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/hattori-kazuha.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sẽ chẳng c&oacute; g&igrave; đ&aacute;ng b&agrave;n nếu Hattori thực chất đ&atilde; muốn tỏ t&igrave;nh với Kazuha, nhưng lần n&agrave;o cũng thất bại. Nhiều fan c&ograve;n đ&ugrave;a rằng đ&iacute;ch đến lớn nhất của Hattori kh&ocirc;ng c&ograve;n l&agrave; trở th&agrave;nh th&aacute;m tử vượt mặt Shinichi nữa, m&agrave; l&agrave; th&agrave;nh c&ocirc;ng n&oacute;i c&acirc;u &quot;Tớ th&iacute;ch cậu&quot; với Kazuha. Liệu rằng từ giờ cho đến hồi kết, kh&aacute;n giả c&oacute; thể chứng kiến ph&acirc;n đoạn &quot;huyền thoại&quot; n&agrave;y hay kh&ocirc;ng?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>DETECTIVE CONAN: BLACK IRON SUBMARINE - tựa Việt: PHIM ĐIỆN ẢNH TH&Aacute;M TỬ LỪNG DANH CONAN: T&Agrave;U NGẦM SẮT M&Agrave;U ĐEN - khởi chiếu tại rạp 21.07.2023. Suất chiếu đặc biệt nguy&ecirc;n ng&agrave;y 15,16,07.2023.</p>\r\n', '66shinichi-ran.jpeg', '2023-07-31', 0),
(9, '[Thám Tử Lừng Danh Conan: Tàu Ngầm Sắt Màu Đen] - Phần phim Conan mới “chốt đơn” ra rạp ngày 21/7, liệu có thể xô đổ kỷ lục ấn tượng của phần phim trước?', 'Mùa hè bùng nổ của các anime đã chính thức bắt đầu với màn phá kỷ lục phòng vé của Phim Điện Ảnh Doraemon: Nobita Và Vùng Đất Lý Tưởng Trên Bầu Trời. Và tiếp theo, cựu vương của thể loại anime tại phòng vé Việt - Thám Tử Lừng Danh Conan cũng sẽ trở lại vớ', '<h3>[Th&aacute;m Tử Lừng Danh Conan: T&agrave;u Ngầm Sắt M&agrave;u Đen] - Phần phim Conan mới &ldquo;chốt đơn&rdquo; ra rạp ng&agrave;y 21/7, liệu c&oacute; thể x&ocirc; đổ kỷ lục ấn tượng của phần phim trước?</h3>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/conan-1.jpeg\" /></p>\r\n\r\n<p>Phần phim mới&nbsp;lấy bối cảnh tại Pacific Buoy - một trụ sở h&agrave;ng hải của Interpol c&oacute; nhiệm vụ kết nối c&aacute;c camera an ninh tr&ecirc;n to&agrave;n thế giới. Nh&oacute;m của Conan, theo lời mời của Sonoko, cũng đến đảo Hachijo để xem c&aacute; voi. Tại đ&acirc;y, Conan nhận được th&ocirc;ng tin về một nh&acirc;n vi&ecirc;n Europol bị &aacute;m s&aacute;t. C&ugrave;ng với đ&oacute;, t&iacute;nh mạng Haibara bị đe dọa, phải chăng th&acirc;n phận của c&ocirc; đ&atilde; bị bại lộ trước Gin...&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/conan-2.jpeg\" /></p>\r\n\r\n<p>Theo tiết lộ từ &ecirc; k&iacute;p thực hiện bộ phim, đ&acirc;y sẽ l&agrave; lần đầu ti&ecirc;n nh&acirc;n vật rất được y&ecirc;u th&iacute;ch - c&ocirc; b&eacute; Haibara Ai sẽ trở th&agrave;nh nh&acirc;n vật trung t&acirc;m của to&agrave;n bộ tập phim. Đoạn after-credit của phần phim năm ngo&aacute;i đ&atilde; khiến c&aacute;c fan kh&ocirc;ng khỏi chờ mong v&agrave;o m&agrave;n đối đầu của Gin &amp; Sherry - cặp đ&ocirc;i &quot;rực lửa ngang tr&aacute;i&quot; m&agrave; họ y&ecirc;u mến. V&agrave; đến phần phim n&agrave;y, mong ước của c&aacute;c fan đ&atilde; trở th&agrave;nh sự thực. Gin v&agrave; Sherry - hay Haibara - sẽ hội ngộ trong bối cảnh như thế n&agrave;o đ&acirc;y?</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/conan-3.jpeg\" /></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, đ&acirc;y cũng l&agrave; phần phim đ&aacute;nh dấu sự trở lại trong một phim điện ảnh Conan của Tổ chức &Aacute;o đen sau 7 năm. Liệu những b&iacute; mật n&agrave;o về tổ chức n&agrave;y sẽ được h&eacute; lộ? Conan sẽ chiến đấu thế n&agrave;o với những kẻ đ&atilde; lu&ocirc;n săn l&ugrave;ng cậu? Với lời hứa hẹn về &quot;cuộc đối đầu trực diện với Tổ chức &Aacute;o đen&quot; m&agrave; tất cả ch&uacute;ng ta mong chờ,&nbsp;<em>Th&aacute;m Tử Lừng Danh Conan: T&agrave;u Ngầm Sắt M&agrave;u Đen&nbsp;</em>được dự đo&aacute;n sẽ tiếp tục trở th&agrave;nh c&uacute; hit lớn tại Việt Nam.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/conan-4.jpeg\" /></p>\r\n\r\n<p>B&ecirc;n cạnh k&eacute;p ch&iacute;nh quen thuộc, phần phim n&agrave;y c&ograve;n quy tụ d&agrave;n nh&acirc;n vật &quot;khủng&quot; rất được kh&aacute;n giả y&ecirc;u mến. Th&ocirc;ng tin &quot;Vi&ecirc;n đạn bạc&quot; Akai c&ugrave;ng Bourbon sẽ t&aacute;i ngộ trong phần phim n&agrave;y khiến c&aacute;c fan nữ của bộ phim như b&ugrave;ng nổ. C&ugrave;ng với đ&oacute;, những c&aacute;i t&ecirc;n sừng sỏ của Tổ chức &Aacute;o đen như Gin, mỹ nh&acirc;n Vermouth, Vodka, Rum c&ugrave;ng gương mặt ho&agrave;n to&agrave;n mới Pinga sẽ tăng th&ecirc;m độ nguy hiểm cho tổ chức b&iacute; ẩn n&agrave;y.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/conan-5.jpeg\" /></p>\r\n\r\n<p>Hiện tại, d&ugrave; đ&atilde; trải qua hơn 2 th&aacute;ng khởi chiếu tại Nhật Bản,&nbsp;<em>Th&aacute;m Tử Lừng Danh Conan: T&agrave;u Ngầm Sắt M&agrave;u Đen&nbsp;</em>vẫn vững v&agrave;ng trong top 10 những bộ phim ăn kh&aacute;ch nhất ph&ograve;ng v&eacute;. T&iacute;nh đến nay, phim đ&atilde; thu về 12.8 tỉ y&ecirc;n tại ph&ograve;ng v&eacute; Nhật, trở th&agrave;nh phim Conan đầu ti&ecirc;n vượt mốc 10 tỉ y&ecirc;n tại ph&ograve;ng v&eacute;. Kh&ocirc;ng chỉ vậy, ch&agrave;ng th&aacute;m tử nh&iacute; vẫn đang vững ch&acirc;n tại ng&ocirc;i vương&nbsp;<em>Phim điện ảnh c&oacute; doanh thu cao nhất ph&ograve;ng v&eacute; Nhật Bản 2023,&nbsp;</em>bất chấp loạt bom tấn Hollywood. Th&agrave;nh t&iacute;ch n&agrave;y l&agrave; lời khẳng định mạnh mẽ cho sức h&uacute;t của phần phim Conan mới nhất.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ch&iacute;nh thức ra rạp tại Việt Nam từ 21.07 tới đ&acirc;y,&nbsp;<em>Th&aacute;m Tử Lừng Danh Conan: T&agrave;u Ngầm Sắt M&agrave;u Đen&nbsp;</em>được kỳ vọng sẽ tiếp tục &quot;l&agrave;m n&ecirc;n chuyện&quot;, giống như những g&igrave; phần trước đ&atilde; l&agrave;m được. Đ&acirc;y sẽ l&agrave; m&oacute;n qu&agrave; tuyệt vời cho c&aacute;c fan của Conan trong những ng&agrave;y h&egrave; th&aacute;ng 7 năm nay.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>DETECTIVE CONAN: BLACK IRON SUBMARINE - tựa Việt: TH&Aacute;M TỬ LỪNG DANH CONAN: T&Agrave;U NGẦM SẮT M&Agrave;U ĐEN - khởi chiếu tại rạp 21.07.2023.</p>\r\n', '90conan-1.jpeg', '2023-07-31', 0),
(10, '[ĐẤU TRƯỜNG SINH TỬ: KHÚC HÁT CỦA CHIM CA VÀ RẮN ĐỘC] - Thương hiệu phim Đấu Trường Sinh Tử tái xuất màn ảnh rộng sau 8 năm, hé lộ nguồn gốc của trò chơi đáng sợ và quá khứ của kẻ phản diện Coriolanus Snow', 'Đã 8 năm trôi qua kể từ khi một trong những thương hiệu phim nổi tiếng bậc nhất thế giới Đấu Trường Sinh Tử kết thúc với phần phim Húng Nhại, là bước đệm cho sự nghiệp của hàng loạt các diễn viên nổi tiếng như Jennifer Lawrence, Josh Hutcherson, Liam Hems', '<h3>[ĐẤU TRƯỜNG SINH TỬ: KH&Uacute;C H&Aacute;T CỦA CHIM CA V&Agrave; RẮN ĐỘC] - Thương hiệu phim Đấu Trường Sinh Tử t&aacute;i xuất m&agrave;n ảnh rộng sau 8 năm, h&eacute; lộ nguồn gốc của tr&ograve; chơi đ&aacute;ng sợ v&agrave; qu&aacute; khứ của kẻ phản diện Coriolanus Snow</h3>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/the-hunger-games-1.jpeg\" /></p>\r\n\r\n<p><em>Đấu Trường Sinh Tử</em>&nbsp;l&agrave; loạt phim được chuyển thể từ tiểu thuyết c&ugrave;ng t&ecirc;n của t&aacute;c giả Suzanne Collins, bao gồm ba phần&nbsp;<em>Đấu Trường Sinh Tử, Bắt Lửa v&agrave; H&uacute;ng Nhại phần 1 &amp; 2</em>. Phim xoay quanh c&acirc;u chuyện của th&agrave;nh phố Capitol thuộc Panem, nơi tổ&nbsp;chức một cuộc thi đ&aacute;ng sợ mang t&ecirc;n Đấu Trường Sinh Tử. 12 quận tại th&agrave;nh phố n&agrave;y phải cống nạp một nam v&agrave; một nữ trong độ tuổi từ 12 đến 18 để l&agrave;m vật tế trong Đấu trường. C&ocirc; g&aacute;i 16 tuổi đến từ Quận 12 Katniss Everdeen đ&atilde; t&igrave;nh nguyện tham gia đấu trường thay cho em g&aacute;i m&igrave;nh.&nbsp;C&aacute;c phần phim theo ch&acirc;n c&ocirc; trong những tr&ograve; chơi sinh tử đ&aacute;ng sợ, nơi m&agrave; Katniss đ&atilde; thấy được sự ph&acirc;n biệt gi&agrave;u ngh&egrave;o, học c&aacute;ch sinh tồn v&agrave; c&ocirc; quyết định phải nổi dậy chống lại Capitol.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Đấu Trường Sinh Tử: Kh&uacute;c H&aacute;t Của Chim Ca V&agrave; Rắn Độc</em><em>&nbsp;</em>l&agrave; phần tiền truyện của mạch truyện ch&iacute;nh, lấy bối cảnh 64 năm trước phần phim đầu ti&ecirc;n. Phần tiền truyện theo ch&acirc;n Coriolanus Snow (Tom Blyth thủ vai) trẻ tuổi, ch&iacute;nh l&agrave; vị Tổng thống Snow trong loạt phim&nbsp;<em>Đấu Trường Sinh Tử</em>&nbsp;sau n&agrave;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mở đầu trailer, kh&aacute;n giả đ&atilde; được &quot;diện kiến&quot; người thiết kế ra tr&ograve; chơi sinh tử v&agrave; đ&atilde; đẩy&nbsp;rất nhiều người trẻ v&agrave;o chỗ chết: Hiệu trưởng Casca Highbottom (do Peter Dinklage thủ vai). Casca triệu tập tất cả mọi người cho Lễ&nbsp;chi&ecirc;u qu&acirc;n lần thứ 10, v&agrave; chuẩn bị lựa chọn c&aacute;c vật tế từ 12 quận. L&uacute;c n&agrave;y Coriolanus Snow l&agrave; niềm hy vọng cuối c&ugrave;ng cho d&ograve;ng d&otilde;i Snow đang dần lụi t&agrave;n, được chỉ định trở th&agrave;nh cố vấn cho tr&ograve; chơi. Vai tr&ograve; của anh l&agrave; trợ gi&uacute;p vật tế trong đấu trường v&agrave; anh sẽ l&agrave; cố vấn của Lucy Gray Baird (Rachel Zegler thủ vai).</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/the-hunger-game-2.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/the-hunger-game-6.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/the-hunger-game-7.jpeg\" /></p>\r\n\r\n<p>Từ đ&oacute;, Snow c&oacute; một mối quan hệ đặc biệt với Lucy, v&agrave; c&oacute; thể đ&oacute; l&agrave; t&igrave;nh y&ecirc;u. Dường như Snow rất c&oacute; duy&ecirc;n với Quận 12, v&igrave; Lucy giống như Katniss Everdeen người lật đổ &ocirc;ng sau n&agrave;y, cũng l&agrave; một c&ocirc; g&aacute;i xuất th&acirc;n từ Quận 12. Tr&ograve; chơi sinh tử trong phần tiền truyện hứa hẹn sẽ kịch t&iacute;ch, g&acirc;y cấn kh&ocirc;ng k&eacute;m g&igrave; mạch truyện ch&iacute;nh. Tr&ograve; chơi sẽ khiến kh&aacute;n giả cảm nhận r&otilde; được sự ph&acirc;n cấp giữa qu&yacute; tộc v&agrave; người thường, v&igrave; sinh tồn m&agrave; con người bất chấp cả đạo đức.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/the-hunger-game-3.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/the-hunger-game-4.jpeg\" /></p>\r\n\r\n<p>Phần tiền truyện sẽ h&eacute; lộ qu&aacute; khứ của Tổng thống Snow thời trẻ, những sự kiện nguồn cơn dẫn Snow đến con đường trở th&agrave;nh thủ lĩnh độc t&agrave;i của Panem thay v&igrave; l&agrave; ch&agrave;ng thiếu ni&ecirc;n lương thiện. Đến cuối c&ugrave;ng, kh&aacute;n giả mới c&oacute; thể được biết ai sẽ l&agrave; chim ca, h&oacute;t l&ecirc;n một kh&uacute;c h&aacute;t của kẻ chiến thắng v&agrave; ai l&agrave; rắn độc thật sự. D&ugrave; phần tiền truyện kh&ocirc;ng c&oacute; sự tham gia của những c&aacute;i t&ecirc;n quen thuộc như Jennifer Lawrence, Liam Hemsworth,... phim vẫn quy tụ d&agrave;n diễn vi&ecirc;n thực lực như &quot;n&agrave;ng Bạch Tuyết&quot; Rachel Zegler, Tom Blyth, ng&ocirc;i sao của Tr&ograve; Chơi Vương Quyền Peter Dinklage, nữ diễn vi&ecirc;n gạo cội Viola Davis,...</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/the-hunger-game-5.jpeg\" /></p>\r\n\r\n<p>ĐẤU TRƯỜNG SINH TỬ: KH&Uacute;C H&Aacute;T CỦA CHIM CA V&Agrave; RẮN ĐỘC (TỰA GỐC: THE HUNGER GAMES: THE BALLAD OF SONGBIRDS AND SNAKES)<em>&nbsp;</em>dự kiến khởi chiếu 17.11.2023.</p>\r\n', '62the-hunger-game-5.jpeg', '2023-07-31', 0),
(11, 'RẠP PHIM KINSTAR TUYỂN NHÂN VIÊN PARTIME', 'Cùng trở thành nhân viên rạp phim để được làm việc trong môi trường chuyên nghiệp. Đến ngay Cinestar Vietnam để trao cho mình cơ hội tuyển dụng đặc biệt vào 13.12.2022 nhé!', '<h2><strong>RẠP PHIM CINESTAR TUYỂN NH&Acirc;N VI&Ecirc;N PARTIME</strong></h2>\r\n\r\n<p>M&ocirc;i trường trẻ trung, năng động, nhiều nam thanh nữ t&uacute; độc th&acirc;n vui t&iacute;nh</p>\r\n\r\n<p>&nbsp;Được hưởng c&aacute;c tỷ tỷ quyền lợi chỉ c&oacute; tại Rạp phim&nbsp;</p>\r\n\r\n<p>Đăng k&yacute; nhanh nhanh c&aacute;c bạn ơi để được li&ecirc;n hệ v&agrave; phỏng vấn nh&eacute;!</p>\r\n\r\n<p><img src=\"https://lh5.googleusercontent.com/cblV1_e9XMRkQUznje3bblKbhUjUeC_Fd_H431g5PiJVc2VnrBMX82nROzuE7DvKIqOkSJRDxxAJcmRa5G13gXna4Y48P94Cl1C2ou_D03HDgsRz-DIjvdF8wiTmZaGzfLVXV5QBtFI_AIS8U2HCLDhP690W4Rvdmc0sBH1gJv-yNfGHLCp1hlupeIHPVQ\" style=\"height:527px; width:402px\" /></p>\r\n\r\n<p><strong>Địa điểm l&agrave;m việc:</strong>&nbsp;Rạp Cinestar Hai B&agrave; Trưng, Cinestar Quốc Thanh</p>\r\n\r\n<p>- Giao dịch b&aacute;n v&eacute;, b&aacute;n bắp-nước, kiểm so&aacute;t v&eacute; v&agrave; hướng dẫn kh&aacute;ch h&agrave;ng xem phim.</p>\r\n\r\n<p>- Thời gian l&agrave;m việc theo ca linh động, đăng k&yacute; hằng tuần theo lịch học.</p>\r\n\r\n<p>- Được nghỉ 1 -2 ng&agrave;y/tuần</p>\r\n\r\n<p>- Nam/Nữ từ 18-25 tuổi (Sinh vi&ecirc;n c&aacute;c trường ĐH, CĐ)</p>\r\n\r\n<p>- C&oacute; tố chất, kỹ năng l&agrave;m việc trong ng&agrave;nh dịch vụ.</p>\r\n\r\n<p>- Si&ecirc;ng năng, th&aacute;o v&aacute;t, trung thực.</p>\r\n\r\n<p>- Giao tiếp tốt.</p>\r\n\r\n<p>- L&agrave;m được lễ, tết</p>\r\n\r\n<p>- Sinh vi&ecirc;n c&aacute;c trường đại học kh&ocirc;ng cần kinh nghiệm, chỉ cần y&ecirc;u th&iacute;ch c&ocirc;ng việc ở Rạp phim.</p>\r\n\r\n<p><strong>CINESTAR H&Acirc;N HẠNH CH&Agrave;O Đ&Oacute;N C&Aacute;C BẠN VỀ TEAM!!</strong></p>\r\n\r\n<p><strong>--------------</strong></p>\r\n\r\n<p><strong>CINESTAR VIETNAM&nbsp;</strong></p>\r\n\r\n<p><strong>Be Happy - Be A Star&nbsp;</strong></p>\r\n', '34c\'hunt.jpg', '2023-07-31', 1);
INSERT INTO `news` (`id`, `title`, `content`, `detail_content`, `thumb`, `created_date`, `role`) VALUES
(13, 'CINESTAR LÂM ĐỒNG (ĐỨC TRỌNG) - TUYỂN DỤNG NHÂN SỰ', 'Cinestar Lâm Đồng (Đức Trọng) tuyển dụng các ứng viên tiềm năng, đam mê phim ảnh giải trí và làm việc trong môi trường năng động, chuyên nghiệp mong muốn được cống hiến và phát triển bản thân. ', '<h3>CINESTAR L&Acirc;M ĐỒNG (ĐỨC TRỌNG) - TUYỂN DỤNG NH&Acirc;N SỰ</h3>\r\n\r\n<hr />\r\n<p><img src=\"https://www.cinestar.com.vn/pictures/tuyen%20dung/rap-chieu-phim-cinestar-nguyen-trai-2--1-.jpg\" /></p>\r\n\r\n<p><strong>C&ocirc;ng ty Cổ phần Giải tr&iacute; - Ph&aacute;t h&agrave;nh phim - Rạp chiếu phim Ng&ocirc;i Sao</strong>&nbsp;(Cinestar) l&agrave; một trong những Hệ thống Rạp Chiếu Phim được y&ecirc;u th&iacute;ch bởi gi&aacute; v&eacute; hợp l&yacute; v&agrave; chất lượng dịch vụ cao cấp nhất đến với c&ocirc;ng ch&uacute;ng hiện nay. C&ocirc;ng ty Cinestar đang mở rộng v&agrave; ph&aacute;t triển kinh doanh c&aacute;c dự &aacute;n hệ thống Rạp chiếu phim ở c&aacute;c tỉnh th&agrave;nh tr&ecirc;n cả nước. Tại L&acirc;m Đồng, C&ocirc;ng ty Cinestar đang trong giai đoạn ho&agrave;n th&agrave;nh dự &aacute;n &ldquo;RẠP CHIẾU PHIM&nbsp;CINESTAR L&Acirc;M ĐỒNG (ĐỨC TRỌNG)&rdquo;.</p>\r\n\r\n<p>Với&nbsp;cơ hội l&agrave;m việc trong m&ocirc;i trường năng động, chuy&ecirc;n nghiệp, mong muốn được cống hiến, ph&aacute;t triển bản th&acirc;n v&agrave; thăng tiến. Ch&uacute;ng t&ocirc;i đang t&igrave;m kiếm những ứng vi&ecirc;n ng&ocirc;i sao cho lĩnh vực Rạp chiếu phim như sau:</p>\r\n\r\n<p><strong>1. Địa điểm l&agrave;m việc:&nbsp;</strong>Tầng 4, T&ograve;a nh&agrave; TTC Plaza Đức Trọng - 713 QL20, Li&ecirc;n Nghĩa, Đức Trọng, L&acirc;m Đồng</p>\r\n\r\n<p><strong>2. Quyền lợi được hưởng:</strong></p>\r\n\r\n<p>-&nbsp; Được hưởng đầy đủ chế độ BHXH theo ph&aacute;p luật hiện h&agrave;nh</p>\r\n\r\n<p>-&nbsp; Được l&agrave;m việc trong m&ocirc;i trường năng động</p>\r\n\r\n<p>-&nbsp; C&aacute;c chế độ ph&uacute;c lợi của c&ocirc;ng ty.</p>\r\n\r\n<p><strong>3. Y&ecirc;u cầu hồ sơ:</strong></p>\r\n\r\n<p>-&nbsp; CV (Bảng t&oacute;m tắt qu&aacute; tr&igrave;nh l&agrave;m việc)</p>\r\n\r\n<p>-&nbsp; Sơ yếu l&yacute; lịch.</p>\r\n\r\n<p>-&nbsp; Bản sao&middot;Chứng minh nh&acirc;n d&acirc;n.</p>\r\n\r\n<p>-&nbsp; H&igrave;nh 3x4 (1 tấm).</p>\r\n\r\n<p>-&nbsp; C&aacute;c chứng chỉ, bằng cấp li&ecirc;n quan đến c&ocirc;ng việc.</p>\r\n\r\n<p><strong>4. C&aacute;ch thức nộp hồ sơ:</strong></p>\r\n\r\n<p>-&nbsp;<strong>C&aacute;ch 1</strong>: Ứng vi&ecirc;n scan v&agrave; nộp hồ sơ ứng tuyển v&agrave;o địa chỉ Email: hr@cinestar.com.vn</p>\r\n\r\n<p>Ti&ecirc;u đề hồ sơ, email ghi r&otilde; theo nội dung sau:</p>\r\n\r\n<p>M&Atilde; HỒ SƠ ỨNG TUYỂN -&nbsp;HỌ T&Ecirc;N ỨNG VI&Ecirc;N&nbsp;(<em>m&atilde; hồ sơ ứng tuyển chi tiết tại th&ocirc;ng tin tuyển dụng của từng vị tr&iacute;</em>&nbsp;)</p>\r\n\r\n<p><strong><em>&nbsp;V&iacute; dụ</em>:&nbsp;</strong>Ứng vi&ecirc;n ứng tuyển v&agrave;o vị tr&iacute; Quản l&yacute; Rạp th&igrave; ti&ecirc;u đề hồ sơ v&agrave; email ghi như sau:&nbsp; &nbsp;&nbsp;<strong>&nbsp;LĐ-OPS-01-Trần Tuấn</strong></p>\r\n\r\n<p>Th&ocirc;ng tin li&ecirc;n hệ:&nbsp;Ph&ograve;ng Nh&acirc;n sự&nbsp;&nbsp;<em>SĐT:</em>&nbsp;<strong>028 7300 7279</strong>&nbsp;(nhấn&nbsp;73019).</p>\r\n\r\n<p>-&nbsp;<strong>C&aacute;ch 2</strong>: Hoặc Đăng k&yacute; hồ sơ trực tiếp theo c&aacute;c c&aacute;c form mẫu đăng tải tr&ecirc;n website&nbsp;<a href=\"https://www.cinestar.com.vn/tintuc/tuyen-dung\">https://www.cinestar.com.vn/tintuc/tuyen-dung</a></p>\r\n\r\n<p>-&nbsp;<strong>C&aacute;ch 3</strong>:&nbsp;Ứng vi&ecirc;n nộp hồ sơ trực tiếp về địa chỉ: Tầng 4, T&ograve;a nh&agrave; TTC Plaza Đức Trọng - 713 QL20, Li&ecirc;n Nghĩa, Đức Trọng, L&acirc;m Đồng</p>\r\n\r\n<p><strong>5. C&aacute;c vị tr&iacute; tuyển dụng:</strong></p>\r\n\r\n<p>Ứng vi&ecirc;n quan t&acirc;m vui l&ograve;ng nhấn v&agrave;o c&aacute;c vị tr&iacute; tuyển dụng dưới đ&acirc;y để xem th&ocirc;ng tin chi tiết, đăng k&yacute; th&ocirc;ng tin v&agrave; nộp hồ sơ trực tiếp.</p>\r\n\r\n<p><strong>I/ KHỐI VĂN PH&Ograve;NG</strong></p>\r\n', '6tuyỂn-dỤng-Đt-ld-.png', '2023-07-31', 1),
(14, 'Chung kết Hoa hậu Nhân ái Việt Nam 2023 sẽ diễn ra tại Đà Lạt', '(NSMT) - Miss Petite Vietnam – Hoa hậu Nhân ái Việt Nam 2023 được Uỷ Ban nhân dân tỉnh Lâm Đồng cấp giấy phép số 1676/UBND-VX4, do Công ty cổ phẩn Giải trí Tiếp thị Truyền thông Tân Thành Công phối hợp với Công ty Cổ phần Truyền thông Giải trí Kim Lợi Glo', '<h3>Chung kết Hoa hậu Nh&acirc;n &aacute;i Việt Nam 2023 sẽ diễn ra tại Đ&agrave; Lạt</h3>\r\n\r\n<p>Với th&ocirc;ng điệp, mục đ&iacute;ch tổ chức l&agrave; &ldquo;Lan tỏa t&iacute;nh nh&acirc;n văn, l&ograve;ng nh&acirc;n &aacute;i&rdquo;, ban tổ chức cuộc thi Miss Petite Vietnam &ndash; Hoa hậu nh&acirc;n &aacute;i Việt Nam 2023 mong muốn t&igrave;m kiếm những gương mặt nh&acirc;n &aacute;i để lan tỏa những điều tốt đẹp tới x&atilde; hội.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/Tin%20t%E1%BB%A9c/cinestar-da-lat-1.jpeg\" /></p>\r\n\r\n<p>Miss Petite l&agrave; cuộc thi hoa hậu đ&atilde; được nhiều nước tổ chức trong những năm qua, với qui m&ocirc; cấp quốc gia v&agrave; quốc tế. Đặc biệt l&agrave; c&aacute;c cuộc thi: Miss Petite Universe International, Miss Petite International, Miss Petite Global,&hellip; V&agrave; Miss Petite Vietnam &ndash; Hoa hậu nh&acirc;n &aacute;i Việt Nam 2023 được tổ chức theo xu hướng chung của thế giới. Định dạng cuộc thi lần n&agrave;y, ph&ugrave; hợp với thể trạng của người &Aacute; Đ&ocirc;ng - đặc biệt phụ nữ Việt Nam. Chiều cao kh&ocirc;ng c&ograve;n l&agrave; vấn đề bận t&acirc;m của c&aacute;c th&iacute; sinh khi tham gia v&agrave;o cuộc thi sắc đẹp. Sự lan tỏa t&iacute;nh nh&acirc;n văn, l&ograve;ng nh&acirc;n &aacute;i của c&aacute;c th&iacute; sinh đến cộng đồng v&agrave; sự tự tin, th&acirc;n thiện, kỹ năng giao tiếp, vẻ đẹp duy&ecirc;n d&aacute;ng, n&eacute;t đẹp h&igrave;nh thể ch&iacute;nh l&agrave; những yếu tố cơ bản để th&iacute; sinh c&oacute; thể gi&agrave;nh danh hiệu cao nhất trong cuộc thi Miss Petite Vietnam.</p>\r\n\r\n<p>B&ecirc;n cạnh c&aacute;c hoạt động ch&iacute;nh, Miss Petite Vietnam c&ograve;n ch&uacute; trọng c&aacute;c hoạt động g&oacute;p phần quảng b&aacute; văn h&oacute;a, du lịch Việt Nam v&agrave; c&aacute;c c&ocirc;ng t&aacute;c hoạt động x&atilde; hội trong h&agrave;nh tr&igrave;nh nh&acirc;n &aacute;i nhằm lan tỏa t&iacute;nh nh&acirc;n văn, l&ograve;ng nh&acirc;n &aacute;i của c&aacute;c th&iacute; sinh, c&aacute;c bạn trẻ đến với cộng đồng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/Tin%20t%E1%BB%A9c/cinestar-da-lat-2.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/Tin%20t%E1%BB%A9c/cinestar-da-lat-3.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/Tin%20t%E1%BB%A9c/cinestar-da-lat-4.jpeg\" /></p>\r\n\r\n<p>C&aacute;c th&iacute; sinh đạt giải sau cuộc thi được đề cử trở th&agrave;nh đại diện Việt Nam tham gia c&aacute;c s&acirc;n chơi nhan sắc quốc tế như: Miss Petite Universe International, Miss Petite International, Miss Petite Global... Kế hoạch n&agrave;y sẽ g&oacute;p phần lan tỏa h&igrave;nh ảnh v&agrave; n&eacute;t đẹp văn h&oacute;a, du lịch Việt Nam đến với bạn b&egrave; tr&ecirc;n thế giới.</p>\r\n\r\n<p>C&aacute;c danh hiệu được trao đến c&aacute;c th&iacute; sinh trong đ&ecirc;m thi chung kết gồm Hoa hậu, 4 &Aacute; hậu v&agrave; c&aacute;c danh hiệu kh&aacute;c. Tổng gi&aacute; trị giải thưởng hơn 1 tỷ đồng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/Tin%20t%E1%BB%A9c/cinestar-da-lat-5.jpeg\" /></p>\r\n\r\n<p>Th&agrave;nh phần ban gi&aacute;m khảo cuộc thi gồm:&nbsp;ThS-BS CK2 Phan Thị Hồng Vinh &ndash; Gi&aacute;m khảo Nh&acirc;n trắc học; Giảng vi&ecirc;n, ca sĩ Osen Ngọc Mai; ca sĩ Phương Thanh; diễn vi&ecirc;n Trương Ngọc &Aacute;nh; nh&agrave; sản xuất, đạo diễn Phước Sang; &ocirc;ng Nickson Sim đến từ Malaysia &ndash; Nh&agrave; s&aacute;ng lập cuộc thi Miss Petite Global; &ocirc;ng Vương Duy Bi&ecirc;n - Nguy&ecirc;n Thứ trưởng Bộ Văn h&oacute;a - Thể thao v&agrave; Du lịch, Ph&oacute; chủ tịch Li&ecirc;n hiệp c&aacute;c Hội Văn học v&agrave; Nghệ thuật Việt Nam.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/Tin%20t%E1%BB%A9c/cinestar-da-lat-6.jpeg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/Tin%20t%E1%BB%A9c/cinestar-da-lat-7.jpeg\" /></p>\r\n\r\n<p>V&ograve;ng sơ tuyển được tổ chức trực tuyến (thi online) v&agrave;o th&aacute;ng 4/2023 để tuyển chọn ra Top 100 th&iacute; sinh tham gia V&ograve;ng chung khảo sẽ tổ chức v&agrave;o th&aacute;ng 7/2023. V&ograve;ng chung kết sẽ được tổ chức v&agrave;o th&aacute;ng 9/2023 tại TP Đ&agrave; Lạt, L&acirc;m Đồng.</p>\r\n', '96cinestar-da-lat-1.jpeg', '2023-07-31', 1),
(15, 'CÓ THỂ BẠN CHƯA BIẾT CINESTAR HUẾ ĐANG SỬ DỤNG 100% ĐIỆN NĂNG LƯỢNG MẶT TRỜI', 'Hướng đến sự phát triển bền vững, khách hàng có thể trải nghiệm những thước phim điện ảnh chất lượng tại Cinestar Huế với 100% điện năng lượng mặt trời thân thiện với môi trường và sẽ đầu tư cho toàn hệ thống trong tương lai.', '<h3 style=\"color:#3f3f3f; font-style:normal\">&Oacute; THỂ BẠN CHƯA BIẾT CINESTAR HUẾ ĐANG SỬ DỤNG 100% ĐIỆN NĂNG LƯỢNG MẶT TRỜI</h3>\r\n\r\n<h1>V&Igrave; SAO CINESTAR HUẾ CHỌN NĂNG LƯỢNG MẶT TRỜI L&Agrave;M NGUỒN ĐIỆN CHO HỆ THỐNG</h1>\r\n\r\n<p>Tr&aacute;ch nhiệm với m&ocirc;i trường l&agrave; một trong những t&ocirc;n chỉ quan trọng trong hoạt động x&acirc;y dựng v&agrave; ph&aacute;t triển của Cinestar. L&agrave; một doanh nghiệp kinh doanh về mảng giải tr&iacute;, nhu cầu sử dụng điện để phục vụ kh&aacute;ch h&agrave;ng của ch&uacute;ng t&ocirc;i rất lớn. Tại Cinestar Huế, ch&uacute;ng t&ocirc;i đ&atilde; lắp đặt v&agrave; sử dụng 100% điện năng lượng mặt trời. Vậy tại sao Cinestar Huế lại đi đầu trong sử dụng điện từ nguồn năng lượng xanh sạch từ thi&ecirc;n nhi&ecirc;n n&agrave;y thay v&igrave; sử dụng điện th&ocirc;ng thường?</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/Tin%20t%E1%BB%A9c/Nangluongmattroi/cinestar-hue.jpg\" style=\"height:533px; margin-bottom:10px; margin-top:10px; width:800px\" /></p>\r\n\r\n<h2>Điện mặt trời t&aacute;c động t&iacute;ch cực đến m&ocirc;i trường</h2>\r\n\r\n<p>Điện từ năng lượng mặt trời l&agrave; nguồn năng lượng sạch, tạo ra từ mặt trời v&agrave; mang lại lợi &iacute;ch cho m&ocirc;i trường. Đ&acirc;y l&agrave; lựa chọn thay thế cho nhi&ecirc;n liệu h&oacute;a thạch như than đ&aacute; v&agrave; kh&iacute; đốt tự nhi&ecirc;n l&agrave;m giảm lượng kh&iacute; thải cacbon, giảm &ocirc; nhiễm nguồn nước v&agrave; giảm hiệu ứng nh&agrave; k&iacute;nh. Khi xảy ra hiệu ứng nh&agrave; k&iacute;nh được tạo ra từ nhi&ecirc;n liệu khi đốt ch&aacute;y dẫn đến biến đổi kh&iacute; hậu to&agrave;n cầu, v&agrave; n&oacute; g&acirc;y ra c&aacute;c t&aacute;c hại nghi&ecirc;m trọng về m&ocirc;i trường như thời tiết xấu, mực nước biển d&acirc;ng cao, thay đổi hệ sinh th&aacute;i&hellip;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/Tin%20t%E1%BB%A9c/Nangluongmattroi/nang-luong-mat-troi.jpg\" style=\"height:533px; margin-bottom:10px; margin-top:10px; width:800px\" /></p>\r\n\r\n<h2>T&iacute;nh chất bền vững v&agrave; t&aacute;i tạo của năng lượng mặt trời</h2>\r\n\r\n<p>So với những nguồn nhi&ecirc;n liệu h&oacute;a thạch sẽ cạn kiệt trong nhiều thập kỷ tới, năng lượng từ mặt trời sẽ kh&ocirc;ng cạn kiệt trong tương lai gần. Ch&uacute;ng l&agrave; nguồn năng lượng t&aacute;i tạo từ ng&agrave;y n&agrave;y qua ng&agrave;y kh&aacute;c. Đặc biệt, ch&uacute;ng tạo ra điện m&agrave; kh&ocirc;ng tổn hại tới m&ocirc;i trường khi c&aacute;c tấm pin mặt trời hấp thụ nhiệt để sinh ra điện, kh&ocirc;ng c&oacute; kh&iacute; từ nh&agrave; k&iacute;nh thải ra. V&igrave; vậy, điện mặt trời c&ograve;n mang &yacute; nghĩa ph&aacute;t triển bền vững khi vừa đ&aacute;p ứng nhu cầu ở hiện tại m&agrave; kh&ocirc;ng ảnh hưởng đến tương lai.</p>\r\n\r\n<h2>Điện từ pin mặt trời cung cấp nguồn điện lớn khắc phục sự cố, an to&agrave;n với mạng lưới điện v&agrave; người sử dụng</h2>\r\n\r\n<p>Trong c&aacute;c trường hợp sử dụng điện qu&aacute; tải, thi&ecirc;n tai lũ lụt thường xảy ra ở Huế hay c&aacute;c sự cố kh&aacute;c, th&igrave; việc sử dụng điện năng lượng mặt trời &iacute;t thiệt hại đến m&aacute;y m&oacute;c thiết bị hơn an to&agrave;n đến người sử dụng. Mặt kh&aacute;c, v&igrave; mặt trời cung cấp nguồn năng lượng lớn, điện mặt trời c&oacute; thể đủ đ&aacute;p ứng nhu cầu sử dụng điện trong bất kỳ sự cố n&agrave;o. Đ&oacute; l&agrave; l&yacute; do khi xung quanh mất điện m&agrave; t&ograve;a nh&agrave; Huế vẫn c&oacute; điện để phục vụ kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<h2>Sử dụng điện năng lượng mặt trời tiết kiệm tiền cho quốc gia, doanh nghiệp v&agrave; c&aacute; nh&acirc;n.</h2>\r\n\r\n<p>Sử dụng điện mặt trời đồng nghĩa với việc t&ograve;a nh&agrave; Cinestar Huế giảm tải sử dụng điện của nh&agrave; nước cung cấp, đồng thời gi&uacute;p giảm ng&acirc;n s&aacute;ch tiết kiệm chi ph&iacute; cho doanh nghiệp.&nbsp;</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, c&aacute;c khoản chi ph&iacute; dịch vụ sẽ được giảm lại, khoản tiết kiệm được sẽ được giảm gi&aacute; trở lại cho kh&aacute;ch h&agrave;ng v&agrave; đ&oacute; cũng l&agrave; mục ti&ecirc;u Cinestar muốn nhắm đến - mang lại lợi &iacute;ch cho ch&iacute;nh kh&aacute;ch h&agrave;ng của m&igrave;nh.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.cinestar.com.vn/pictures/Tin%20t%E1%BB%A9c/Nangluongmattroi/cinestar.jpg\" style=\"height:533px; margin-bottom:10px; margin-top:10px; width:800px\" /></p>\r\n\r\n<h1>ĐIỆN NĂNG LƯỢNG MẶT TRỜI SẼ ĐƯỢC ĐẦU TƯ CHO TO&Agrave;N HỆ THỐNG CỤM RẠP CINESTAR TRONG TƯƠNG LAI</h1>\r\n\r\n<p>Điện năng lượng mặt trời mang những lợi &iacute;ch cho to&agrave;n cầu, quốc gia cả tổ chức doanh nghiệp v&agrave; c&aacute; nh&acirc;n. V&igrave; vậy, để hướng đến sự ph&aacute;t triển bền vững, Cinestar đ&atilde; v&agrave; đang ng&agrave;y một nghi&ecirc;n cứu, t&igrave;m t&ograve;i để đưa nguồn điện năng lượng mặt trời đến với to&agrave;n bộ hệ thống tr&ecirc;n to&agrave;n quốc.&nbsp;</p>\r\n', '54cinestar-hue.jpg', '2023-07-31', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`id`, `id_user`, `question`, `answer`, `date`) VALUES
(5, 2, 'Làm thế nào để mua vé online?', '<p>HƯỚNG DẪN MUA V&Eacute; ONLINE</p>\r\n\r\n<p>Điều kiện:</p>\r\n\r\n<p>- Bạn phải l&agrave; th&agrave;nh vi&ecirc;n Cinestar</p>\r\n\r\n<p>- Nếu kh&ocirc;ng l&agrave; th&agrave;nh vi&ecirc;n vui l&ograve;ng đăng k&yacute; th&agrave;nh vi&ecirc;n tr&ecirc;n website để được mua v&eacute;</p>\r\n\r\n<p>Bước 2:</p>\r\n\r\n<p>Đăng nhập t&agrave;i khoản th&agrave;nh vi&ecirc;n</p>\r\n\r\n<p>Đăng nhập</p>\r\n\r\n<p>Bước 3:</p>\r\n\r\n<p>- Chọn loại v&eacute; v&agrave; số lượng:</p>\r\n\r\n<p>Bước 4:</p>\r\n\r\n<p>Chọn ghế:</p>\r\n\r\n<p>Chọn thức ăn:</p>\r\n\r\n<p>Bước 5:</p>\r\n\r\n<p>- Đồng &yacute;.</p>\r\n\r\n<p>- Đồng &yacute; c&aacute;c điều khoản</p>\r\n\r\n<p>- Chọn loại thẻ thanh to&aacute;n.</p>\r\n\r\n<p>- Thanh to&aacute;n.</p>\r\n\r\n<p>Bước 6: Nhập th&ocirc;ng tin t&agrave;i khoản để thanh to&aacute;n việc mua online.</p>\r\n\r\n<p>HO&Agrave;N TẤT</p>\r\n', '2023-07-20'),
(6, 2, 'Thủ tục đặt vé online và phương thức thanh toán như thế nào?', '<p>C&Aacute;CH ĐẶT V&Eacute; ONLINE:</p>\r\n\r\n<p>1/ Đặt v&eacute; online tr&ecirc;n mục MUA V&Eacute; ONLINE ở trang chủ Cinestar Cinema.</p>\r\n\r\n<p>2/ Chọn Phim, Rạp, Ng&agrave;y va Suất chiếu .</p>\r\n\r\n<p>3/ Bạn chọn vị tr&iacute; ghế, nhập th&ocirc;ng tin li&ecirc;n hệ.</p>\r\n\r\n<p>4/ Bạn chọn phương thức thanh to&aacute;n.</p>\r\n\r\n<p>5/Sau khi ho&agrave;n tất thanh to&aacute;n hệ thống sẽ gửi th&ocirc;ng tin v&eacute; đến li&ecirc;n hệ của bạn. Vui long xuất th&ocirc;ng tin đặt v&eacute; khi đến rap.</p>\r\n\r\n<p>CH&Uacute;C BẠN XEM PHIM VUI VẺ</p>\r\n', '2023-07-21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`id`, `name`, `seats`) VALUES
(1, 'screen01', 80),
(2, 'screen02', 72),
(3, 'Screen03', 82),
(7, 'Screen04', 80);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `row_index` varchar(11) NOT NULL,
  `col_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `seats`
--

INSERT INTO `seats` (`id`, `id_ticket`, `row_index`, `col_index`) VALUES
(34, 11, 'C', 6),
(33, 11, 'E', 6),
(38, 12, 'F', 5),
(37, 12, 'F', 6),
(36, 12, 'F', 7),
(35, 12, 'F', 8),
(50, 15, 'E', 7),
(46, 15, 'E', 8),
(45, 15, 'E', 9),
(49, 15, 'F', 7),
(47, 15, 'F', 8),
(44, 15, 'F', 9),
(48, 15, 'G', 5),
(43, 15, 'G', 6),
(51, 16, 'G', 4),
(53, 17, 'E', 7),
(52, 17, 'G', 5),
(56, 18, 'F', 7),
(55, 18, 'F', 8),
(54, 18, 'G', 6),
(57, 19, 'A', 4),
(58, 19, 'A', 5),
(59, 19, 'A', 6),
(61, 20, 'C', 5),
(60, 20, 'E', 5),
(64, 21, 'C', 5),
(63, 21, 'D', 5),
(62, 21, 'E', 5),
(67, 22, 'C', 4),
(65, 22, 'D', 3),
(66, 22, 'D', 4),
(70, 23, 'D', 2),
(69, 23, 'E', 2),
(68, 23, 'F', 2),
(72, 24, 'D', 3),
(71, 24, 'E', 3),
(75, 25, 'B', 2),
(74, 25, 'C', 4),
(73, 25, 'E', 4),
(83, 26, 'F', 3),
(82, 26, 'F', 4),
(81, 26, 'F', 5),
(80, 26, 'F', 6),
(79, 26, 'F', 7),
(76, 26, 'G', 3),
(77, 26, 'G', 4),
(78, 26, 'G', 5),
(84, 27, 'E', 5),
(85, 27, 'E', 6),
(86, 27, 'E', 7),
(89, 28, 'D', 3),
(87, 28, 'D', 4),
(88, 28, 'D', 5),
(90, 28, 'D', 6),
(91, 28, 'D', 7),
(93, 28, 'D', 8),
(92, 28, 'D', 9),
(94, 28, 'D', 10),
(96, 29, 'E', 3),
(95, 29, 'E', 4),
(98, 30, 'E', 4),
(97, 30, 'F', 4),
(101, 31, 'B', 8),
(100, 31, 'C', 10),
(99, 31, 'E', 6),
(102, 32, 'C', 7),
(104, 33, 'G', 4),
(103, 33, 'G', 5),
(106, 34, 'F', 5),
(107, 34, 'G', 3),
(105, 34, 'G', 4),
(109, 35, 'F', 6),
(110, 35, 'F', 7),
(108, 35, 'G', 5),
(112, 36, 'F', 6),
(113, 36, 'F', 7),
(111, 36, 'G', 5),
(115, 37, 'F', 6),
(116, 37, 'F', 7),
(114, 37, 'G', 5),
(118, 38, 'F', 6),
(119, 38, 'F', 7),
(117, 38, 'G', 5),
(120, 39, 'E', 5),
(121, 39, 'E', 6),
(124, 40, 'D', 3),
(123, 40, 'D', 4),
(122, 40, 'D', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shift`
--

CREATE TABLE `shift` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_room` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `shift`
--

INSERT INTO `shift` (`id`, `name`, `id_room`, `time_start`, `time_end`) VALUES
(1, '1', 1, '09:00:00', '10:30:00'),
(2, '2', 1, '11:00:00', '13:30:00'),
(3, '3', 1, '14:00:00', '16:30:00'),
(4, '4', 1, '17:00:00', '19:30:00'),
(5, '5', 1, '20:00:00', '22:30:00'),
(6, '1', 2, '09:15:00', '10:45:00'),
(7, '2', 2, '11:15:00', '13:45:00'),
(8, '3', 2, '14:15:00', '16:45:00'),
(9, '4', 2, '17:15:00', '19:45:00'),
(10, '5', 2, '20:15:00', '22:45:00'),
(11, '1', 3, '09:30:00', '11:00:00'),
(12, '2', 3, '11:30:00', '14:00:00'),
(13, '3', 3, '14:30:00', '17:00:00'),
(14, '4', 3, '17:30:00', '20:00:00'),
(15, '5', 3, '20:30:00', '23:00:00'),
(16, '1', 7, '09:00:00', '10:30:00'),
(17, '2', 7, '11:00:00', '13:30:00'),
(18, '3', 7, '14:00:00', '16:30:00'),
(19, '4', 7, '17:00:00', '19:30:00'),
(20, '5', 7, '20:00:00', '22:30:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `showtimes`
--

CREATE TABLE `showtimes` (
  `id` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_shift` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `showtimes`
--

INSERT INTO `showtimes` (`id`, `id_film`, `id_room`, `price`, `date`, `id_shift`) VALUES
(11, 14, 1, 45000, '2023-07-17', 1),
(12, 14, 1, 45000, '2023-07-17', 2),
(13, 14, 2, 45000, '2023-07-17', 9),
(14, 14, 2, 45000, '2023-07-17', 7),
(15, 12, 1, 45000, '2023-07-17', 3),
(16, 12, 1, 45000, '2023-07-17', 6),
(17, 9, 3, 45000, '2023-07-16', 12),
(18, 9, 3, 45000, '2023-07-16', 13),
(23, 13, 1, 70000, '2023-07-22', 1),
(28, 13, 2, 65000, '2023-07-22', 9),
(29, 13, 2, 65000, '2023-07-22', 10),
(32, 7, 3, 90000, '2023-07-22', 11),
(33, 7, 3, 90000, '2023-07-22', 12),
(34, 7, 3, 90000, '2023-07-22', 13),
(35, 7, 3, 90000, '2023-07-22', 14),
(39, 11, 1, 75000, '2023-07-23', 1),
(48, 7, 2, 80000, '2023-07-22', 7),
(49, 7, 2, 80000, '2023-07-22', 8),
(53, 11, 1, 90, '2023-07-19', 1),
(55, 11, 1, 90, '2023-07-19', 3),
(88, 10, 3, 90000, '2023-07-31', 13),
(89, 10, 3, 90000, '2023-07-31', 14),
(90, 10, 3, 90000, '2023-07-31', 10),
(104, 11, 1, 90, '2023-07-19', 5),
(112, 13, 2, 80000, '2023-07-24', 6),
(114, 13, 1, 80000, '2023-07-24', 1),
(118, 13, 1, 70000, '2023-07-22', 5),
(119, 13, 1, 70000, '2023-07-22', 2),
(121, 7, 1, 80000, '2023-07-20', 3),
(122, 7, 1, 80000, '2023-07-20', 4),
(123, 7, 1, 50000, '2023-07-21', 2),
(124, 7, 1, 50000, '2023-07-21', 3),
(125, 7, 1, 50000, '2023-07-21', 4),
(126, 7, 2, 60000, '2023-07-19', 7),
(127, 7, 2, 60000, '2023-07-19', 9),
(128, 7, 2, 60000, '2023-07-19', 10),
(129, 7, 2, 60000, '2023-07-19', 6),
(130, 7, 2, 60000, '2023-07-19', 8),
(131, 13, 1, 50000, '2023-07-26', 1),
(132, 13, 1, 50000, '2023-07-26', 2),
(133, 13, 1, 50000, '2023-07-26', 3),
(134, 13, 2, 70000, '2023-07-26', 6),
(135, 13, 2, 70000, '2023-07-26', 9),
(136, 13, 2, 70000, '2023-07-26', 10),
(137, 13, 2, 80000, '2023-07-27', 7),
(138, 13, 2, 80000, '2023-07-27', 8),
(139, 13, 2, 80000, '2023-07-27', 9),
(140, 13, 1, 75000, '2023-07-25', 3),
(141, 13, 1, 75000, '2023-07-25', 4),
(142, 13, 1, 75000, '2023-07-25', 5),
(143, 11, 1, 75000, '2023-07-23', 3),
(144, 11, 1, 75000, '2023-07-23', 4),
(145, 11, 1, 75000, '2023-07-23', 5),
(146, 7, 2, 80000, '2023-07-28', 7),
(147, 7, 2, 80000, '2023-07-28', 8),
(148, 7, 2, 80000, '2023-07-28', 10),
(149, 7, 2, 60000, '2023-07-26', 7),
(150, 7, 2, 60000, '2023-07-26', 8),
(151, 10, 7, 80000, '2023-07-26', 17),
(152, 10, 7, 80000, '2023-07-26', 18),
(153, 14, 1, 90000, '2023-07-29', 1),
(154, 14, 1, 90000, '2023-07-29', 3),
(155, 14, 1, 90000, '2023-07-29', 4),
(156, 14, 7, 80000, '2023-07-30', 18),
(157, 14, 7, 80000, '2023-07-30', 19),
(158, 14, 7, 80000, '2023-07-30', 20),
(159, 11, 1, 70000, '2023-07-27', 3),
(160, 11, 1, 70000, '2023-07-27', 4),
(161, 11, 1, 70000, '2023-07-27', 5),
(162, 11, 3, 75000, '2023-07-27', 11),
(163, 11, 3, 75000, '2023-07-27', 12),
(164, 11, 3, 75000, '2023-07-27', 15),
(165, 11, 7, 75000, '2023-07-28', 18),
(166, 11, 7, 75000, '2023-07-28', 19),
(167, 11, 7, 75000, '2023-07-28', 20),
(168, 19, 2, 60000, '2023-07-27', 6),
(169, 19, 2, 60000, '2023-07-27', 10),
(170, 19, 3, 75000, '2023-07-27', 13),
(171, 19, 3, 75000, '2023-07-27', 14),
(172, 19, 2, 75000, '2023-07-28', 6),
(173, 19, 2, 75000, '2023-07-28', 9),
(174, 19, 1, 75000, '2023-07-28', 3),
(175, 19, 1, 75000, '2023-07-28', 4),
(176, 19, 1, 75000, '2023-07-28', 5),
(177, 19, 7, 75000, '2023-07-29', 18),
(178, 19, 7, 75000, '2023-07-29', 19),
(179, 19, 7, 75000, '2023-07-29', 20),
(180, 18, 7, 75000, '2023-07-27', 18),
(181, 18, 7, 75000, '2023-07-27', 19),
(182, 18, 7, 75000, '2023-07-27', 20),
(183, 18, 3, 75000, '2023-07-28', 13),
(184, 18, 3, 75000, '2023-07-28', 14),
(185, 18, 3, 75000, '2023-07-28', 15),
(186, 18, 1, 60000, '2023-07-28', 1),
(187, 18, 1, 60000, '2023-07-28', 2),
(188, 18, 2, 75000, '2023-07-29', 8),
(189, 18, 2, 75000, '2023-07-29', 9),
(190, 18, 2, 75000, '2023-07-29', 10),
(191, 19, 7, 80000, '2023-08-02', 17),
(192, 19, 7, 80000, '2023-08-02', 18),
(193, 19, 7, 80000, '2023-08-02', 19),
(194, 19, 7, 80000, '2023-08-02', 20),
(195, 19, 2, 75000, '2023-08-03', 8),
(196, 19, 2, 75000, '2023-08-03', 9),
(197, 19, 2, 75000, '2023-08-03', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_showtime` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_discount` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `activated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ticket`
--

INSERT INTO `ticket` (`id`, `code`, `id_user`, `id_showtime`, `quantity`, `id_discount`, `price`, `activated`) VALUES
(11, 0, 2, 35, 2, NULL, 180000, 0),
(12, 124502, 2, 35, 4, 1, 360000, 0),
(15, 0, 2, 39, 8, 1, 540000, 0),
(16, 161402, 2, 140, 1, 1, 67500, 0),
(17, 171402, 2, 140, 2, NULL, 150000, 0),
(18, 181402, 2, 140, 3, NULL, 202500, 0),
(19, 191402, 2, 140, 3, 1, 202500, 0),
(20, 201402, 2, 140, 2, NULL, 150000, 0),
(21, 211502, 2, 150, 3, NULL, 180000, 0),
(22, 221382, 2, 138, 3, 1, 216000, 0),
(23, 235975, 2, 140, 3, NULL, 225000, 0),
(24, 244237, 2, 140, 2, NULL, 150000, 0),
(25, 255936, 2, 140, 3, NULL, 225000, 0),
(26, 264228, 9, 131, 8, 1, 360000, 0),
(27, 274234, 9, 135, 3, 1, 189000, 0),
(28, 289385, 16, 168, 8, 1, 432000, 1),
(29, 296306, 16, 135, 2, NULL, 140000, 0),
(30, 301762, 16, 88, 2, NULL, 180000, 1),
(31, 315413, 9, 136, 3, NULL, 210000, 0),
(32, 322836, 16, 136, 1, NULL, 70000, 1),
(33, 339138, 2, 153, 2, NULL, 180000, 1),
(34, 341686, 2, 177, 3, NULL, 225000, 1),
(35, 354900, 2, 177, 3, NULL, 225000, 1),
(36, 369247, 2, 177, 3, NULL, 225000, 1),
(37, 371432, 2, 177, 3, NULL, 225000, 1),
(38, 381588, 2, 177, 3, NULL, 225000, 1),
(39, 394040, 2, 188, 2, NULL, 150000, 1),
(40, 404649, 2, 154, 3, NULL, 270000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `birtday` date NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `pass` varchar(50) NOT NULL,
  `sex` int(11) NOT NULL,
  `role` int(9) NOT NULL,
  `activated` int(9) NOT NULL,
  `thumb` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `birtday`, `email`, `pass`, `sex`, `role`, `activated`, `thumb`) VALUES
(2, 'Hùng Thành', 898247888, '2000-07-01', 'pht456654@gmail.com', '8875e69e50808293bafd2960da8aaa51', 1, 99, 1, '58anh-avatar-trang-fb-mac-dinh (1).jpg'),
(9, 'Minh Hùng', 999999999, '2000-01-01', 'hung@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, 0, 1, '58354060658_2506945902823557_8441237705435844080_n.jpg'),
(12, 'Huấn Rose', 898247883, '1999-07-14', 'admin@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, 1, 1, '78toan-bo-loi-ran-day-cua-huan-hoa-hong-huan-rose.jpg'),
(15, 'Tiến Bịp', 898888888, '1988-01-01', 'tien@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, 1, 1, '24tải xuống (3).jfif'),
(16, 'Đạt vila', 123456789, '1985-07-13', 'dat@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, 1, 1, '42b6e0b1efc277cab76f8a276e9df08834.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `beverages`
--
ALTER TABLE `beverages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill_beverages`
--
ALTER TABLE `bill_beverages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_ticket` (`id_ticket`),
  ADD KEY `bill_beverages` (`id_beverages`);

--
-- Chỉ mục cho bảng `chair_is_waiting`
--
ALTER TABLE `chair_is_waiting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_showtime` (`id_showtime`,`col_index`,`row_index`),
  ADD KEY `waiting_user` (`id_user`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cm-film` (`id_film`),
  ADD KEY `cm-user` (`id_user`);

--
-- Chỉ mục cho bảng `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_user` (`id_user`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_ticket` (`id_ticket`,`row_index`,`col_index`);

--
-- Chỉ mục cho bảng `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shift_room` (`id_room`);

--
-- Chỉ mục cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `showidrom` (`id_room`),
  ADD KEY `show_film` (`id_film`),
  ADD KEY `show_shift` (`id_shift`);

--
-- Chỉ mục cho bảng `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_user` (`id_user`),
  ADD KEY `tick` (`id_showtime`),
  ADD KEY `ticket_discount` (`id_discount`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `beverages`
--
ALTER TABLE `beverages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `bill_beverages`
--
ALTER TABLE `bill_beverages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `chair_is_waiting`
--
ALTER TABLE `chair_is_waiting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=866;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `film`
--
ALTER TABLE `film`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT cho bảng `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT cho bảng `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill_beverages`
--
ALTER TABLE `bill_beverages`
  ADD CONSTRAINT `bill_beverages` FOREIGN KEY (`id_beverages`) REFERENCES `beverages` (`id`),
  ADD CONSTRAINT `bill_ticket` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id`);

--
-- Các ràng buộc cho bảng `chair_is_waiting`
--
ALTER TABLE `chair_is_waiting`
  ADD CONSTRAINT `waiting_showtime` FOREIGN KEY (`id_showtime`) REFERENCES `showtimes` (`id`),
  ADD CONSTRAINT `waiting_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `cm-film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id`),
  ADD CONSTRAINT `cm-user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seat_ticket` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id`);

--
-- Các ràng buộc cho bảng `shift`
--
ALTER TABLE `shift`
  ADD CONSTRAINT `shift_room` FOREIGN KEY (`id_room`) REFERENCES `room` (`id`);

--
-- Các ràng buộc cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  ADD CONSTRAINT `show_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id`),
  ADD CONSTRAINT `show_shift` FOREIGN KEY (`id_shift`) REFERENCES `shift` (`id`),
  ADD CONSTRAINT `showidrom` FOREIGN KEY (`id_room`) REFERENCES `room` (`id`);

--
-- Các ràng buộc cho bảng `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `tick` FOREIGN KEY (`id_showtime`) REFERENCES `showtimes` (`id`),
  ADD CONSTRAINT `ticket_discount` FOREIGN KEY (`id_discount`) REFERENCES `discount` (`id`),
  ADD CONSTRAINT `ticket_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

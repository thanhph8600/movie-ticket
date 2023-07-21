-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 20, 2023 lúc 07:57 PM
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
(1, '1 Ly nước', 35000, '1 Ly Pepsi 350ml', '48tải xuống (4).jfif');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_beverages`
--

CREATE TABLE `bill_beverages` (
  `id` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_beverages` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
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
  `date_` datetime NOT NULL,
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
  `percent` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `discount`
--

INSERT INTO `discount` (`id`, `name`, `date_start`, `date_end`, `percent`) VALUES
(1, 'MAKHUYENMAI1', '2023-07-18', '2023-07-31', 100);

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
(7, 'QUỶ QUYỆT: CỬA ĐỎ VÔ ĐỊNH', 'Patrick Wilson', 'Ty Simpkins, Patrick Wilson, Hiam Abbass, Sinclair Daniel, Andrew Astor, Rose Byrne', 'Kinh Dị', '2023-07-14', 134, 'Tiếng Anh - Phụ đề Tiếng Việt', 'T16 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 16 TUỔI TRỞ LÊN (16+)', 'blob:https://www.youtube.com/3bcbc477-58b4-44a9-acef-5779a9e0e97f', 'Phần tiếp theo của loạt phim kinh dị Insidious với sự góp mặt của dàn diễn viên gốc thuộc gia đình Lambert. Câu chuyện xoay quanh quyết định mở ra cánh cửa đỏ và đi sâu vào Cõi Vô Định của Josh (Patrick Wilson) và Dalton (Ty Simpkins) - nay đã trưởng thành - để tiêu diệt một lần và mãi mãi những con quỷ đang ám ảnh cả gia đình mình. Từ đó họ phải đối mặt với quá khứ tăm tối và đầy bí ản của gia đình, nơi những ám ảnh kinh hoàng nhất đang rình rập. Dàn diễn viên gốc từ Insidious trở lại gồm Patrick Wilson (kiêm vai trò đạo diễn), Ty Simpkins, Rose Byrne và Andrew Astor. Cũng có sự tham gia của Sinclair Daniel và Hiam Abbass. Phim do Jason Blum, Oren Peli, James Wan và Leigh Whannell sản xuất. Kịch bản được viết bởi Scott Teems dựa trên câu chuyện của Leigh Whannell, và nhân vật do Leigh Whannell tạo ra.', '51700x1000_8_.jpg'),
(9, 'NHIỆM VỤ: BẤT KHẢ THI NGHIỆP BÁO PHẦN MỘT', 'Christopher McQuarrie', 'Tom Cruise, Rebecca Ferguson, Vanessa Kirby', 'Hành Động, Phiêu Lưu', '2023-07-14', 160, 'Tiếng Anh - Phụ đề Tiếng Việt, tiếng Hàn', 'T16 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 16 TUỔI TRỞ LÊN (16+)', 'blob:https://www.youtube.com/0b106ff3-1354-4a1a-9df7-c1276abbfd10', 'Phần phim thứ 7 của loạt phim Nhiệm Vụ Bất Khả Thi', '42700x1000_7_.jpg'),
(10, 'XỨ SỞ CÁC NGUYÊN TỐ', ' Peter Sohn', 'Leah Lewis, Mamoudou Athie', 'Gia đình, Hài, Hoạt Hình', '2023-07-14', 139, 'Tiếng Anh - Phụ đề Tiếng Việt; Lồng tiếng', 'K - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM DƯỚI 13 TUỔI VÀ CÓ NGƯỜI BẢO HỘ ĐI KÈM', 'blob:https://www.youtube.com/8b3cbc7b-e4e4-4ff0-b87b-2a0d3abb3e10', 'Xứ Sở Các Nguyên Tố từ Disney và Pixar lấy bối cảnh tại thành phố các nguyên tố, nơi lửa, nước, đất và không khí cùng chung sống với nhau. Câu chuyện xoay quanh nhân vật Ember, một cô nàng cá tính, thông minh, mạnh mẽ và đầy sức hút. Tuy nhiên, mối quan hệ của cô với Wade - một anh chàng hài hước, luôn thuận thế đẩy dòng - khiến Ember cảm thấy ngờ vực với thế giới này. Được đạo diễn bởi Peter Sohn, sản xuất bởi Denise Ream, và lồng tiếng bởi Leah Lewis (Ember) và Mamoudou Athie (Wade), phim dự kiến khởi chiếu tại rạp vào tháng 23.06.2023.', '8poster_official_preiview.jpg'),
(11, 'TAY ĐUA KIỆT XUẤT', 'Ross Venokur', ' Sharon Horgan, Chloe Bennet, J.K. Simmons, Jimmy O. Yang,… ', 'Hoạt Hình', '2023-07-14', 92, 'Tiếng Anh - Phụ đề Tiếng Việt; Lồng tiếng', 'K - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM DƯỚI 13 TUỔI VÀ CÓ NGƯỜI BẢO HỘ ĐI KÈM', 'blob:https://www.youtube.com/f17478a2-266f-4c29-8e43-194274420104', 'Bộ phim kể về một chú cu li chậm chạp tên Trí (Zhi) có niềm say mê với tốc độ. Ngôi làng nơi Trí và bà ngoại sống đang đứng trước nguy cơ bị phá hủy để xây dựng một khu trung tâm sang trọng. Khi đó, Trí đã đặt cược với Quang Phế (Vainglorious) - nhà đương kim vô địch. Với sự giúp đỡ của một nhà cựu vô địch đua xe, Trí tham gia cuộc đua kéo dài bốn ngày với hy vọng chiến thắng để cứu ngôi làng cũng như thực hiện ước mơ đua xe của mình.', '80poster_rally_road_racers_final.jpg'),
(12, 'QUÝ CÔNG TỬ', 'Park Hoon-jung', 'Kim Seon-Ho, Kang Tae-Ju, Go Ara, Kang-woo Kim', 'Hành Động', '2023-07-14', 118, 'Tiếng Hàn - Phụ đề tiếng Việt, tiếng Anh', 'T18 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 18 TUỔI TRỞ LÊN (18+)', 'blob:https://www.youtube.com/543151f0-ec0e-4b22-aca9-530bb9589804', 'Quý Công Tử xoay quanh người đàn ông bí ẩn được biết đến với tên gọi “Quý Công Tử”. Gã đột nhiên xuất hiện trước mắt Marco, một thanh niên người Philippines mơ ước trở thành vận động viên boxing chuyên nghiệp, lang thang khắp các sàn đấu bất hợp pháp tại đây. Nhằm chi trả cho viện phí của mẹ, Marco đến Hàn Quốc để tìm người cha đã bỏ rơi hai mẹ con cậu từ lâu. Đụng độ Quý Công Tử cùng hàng loạt những con người bí hiểm trong thế giới ngầm, Marco trở thành mục tiêu duy nhất của những thế lực mang nhiều mục đích khác nhau. Cuộc truy đuổi điên cuồng bắt đầu.', '54poster_1__3_2.jpg'),
(13, 'PHIM ĐIỆN ẢNH THÁM TỬ LỪNG DANH CONAN: TÀU NGẦM SẮT MÀU ĐEN', 'Yuzuru Tachikawa', 'Yuzuru Tachikawa', 'Hành Động, Hoạt Hình, Phiêu Lưu', '2023-07-21', 110, 'Tiếng Nhật - Phụ đề Tiếng Việt; Lồng tiếng', 'K - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM DƯỚI 13 TUỔI VÀ CÓ NGƯỜI BẢO HỘ ĐI KÈM', 'blob:https://www.youtube.com/047a5fe0-c8de-445a-a551-867287ce7839', 'Thám Tử Lừng Danh Conan: Tàu Ngầm Sắt Màu Đen lấy bối cảnh tại Pacific Buoy - một trụ sở hàng hải của Interpol có nhiệm vụ kết nối các camera an ninh trên toàn thế giới. Nhóm của Conan, theo lời mời của Sonoko, cũng đến đảo Hachijo để xem cá voi. Tại đây, Conan nhận được thông tin về một nhân viên Europol bị ám sát. Cùng với đó, tính mạng Haibara bị đe dọa, phải chăng thân phận của cô đã bị bại lộ trước Gin…', '70conan_movie_26_-_vietnamese_poster.jpg'),
(14, 'DINH THỰ MA ÁM', 'Justin Simien', 'Jamie Lee Curtis, Owen Wilson, Rosario Dawson', 'Gia đình, Hài, Tâm Lý', '2023-07-28', 120, 'Tiếng Anh - Phụ đề Tiếng Việt', 'T16 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 16 TUỔI TRỞ LÊN (16+)', 'blob:https://www.youtube.com/537e3c3a-e065-4bee-9e2e-09e382ecba66', 'Nhà là nơi ma ám. Cùng xem đoạn trailer của bộ phim Dinh Thự Ma Ám sẽ được trình chiếu tại các cụm rạp vào ngày 28.07 này.', '25rsz_haunted_mansion_teaser_poster.jpg');

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
(3, 'Screen03', 82);

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
(1, 1, 'A', 1),
(2, 1, 'A', 2),
(3, 1, 'C', 4),
(4, 2, 'A', 3),
(5, 2, 'A', 4),
(6, 2, 'B', 4),
(7, 2, 'B', 5),
(9, 2, 'B', 6);

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
(15, '5', 3, '20:30:00', '23:00:00');

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
(145, 11, 1, 75000, '2023-07-23', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_showtime` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ticket`
--

INSERT INTO `ticket` (`id`, `id_user`, `id_showtime`, `quantity`, `id_discount`) VALUES
(1, 12, 23, 3, NULL),
(2, 2, 23, 5, NULL);

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
(9, 'Minh Hùng', 999999999, '2000-01-01', 'hung@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0, 0, 1, '58354060658_2506945902823557_8441237705435844080_n.jpg'),
(12, 'Huấn Hose', 898247883, '1999-07-14', 'admin@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, 1, 1, '78toan-bo-loi-ran-day-cua-huan-hoa-hong-huan-rose.jpg'),
(15, 'Tiến Bịp', 898888888, '1988-01-01', 'tien@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, 1, 1, '24tải xuống (3).jfif'),
(16, 'Đạt vila', 123456789, '1999-01-01', 'dat@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 1, 1, 1, '42b6e0b1efc277cab76f8a276e9df08834.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

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
  ADD KEY `seat_ticket` (`id_ticket`);

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
-- AUTO_INCREMENT cho bảng `beverages`
--
ALTER TABLE `beverages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bill_beverages`
--
ALTER TABLE `bill_beverages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `film`
--
ALTER TABLE `film`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT cho bảng `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `cm-film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id`),
  ADD CONSTRAINT `cm-user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

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

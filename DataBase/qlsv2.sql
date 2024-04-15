-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th4 15, 2024 lúc 09:57 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlsv2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('đã điểm danh','vắng mặt') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `student_id`, `class_id`, `attendance_date`, `status`) VALUES
(1, 5454, 1545, '2024-03-28', 'đã điểm danh'),
(2, 5454, 1545, '2024-04-04', 'đã điểm danh'),
(3, 277, 1545, '2024-04-04', 'đã điểm danh'),
(4, 277, 1545, '2024-04-05', 'vắng mặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `teacher_id`) VALUES
(1, 'English', NULL),
(2, 'Math', NULL),
(3, 'Science', NULL),
(4, 'History', NULL),
(5, 'Art', NULL),
(6, 'Music', NULL),
(7, 'Physical Education', NULL),
(8, 'Computer Science', NULL),
(9, 'Geography', NULL),
(10, 'Literature', NULL),
(1545, 'mkt', 2),
(6201, 'công nghệ thông tin ', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `date_of_birth`, `class_id`) VALUES
(1, 'Nguyen Van A', '2000-01-01', 1),
(2, 'Tran Thi B', '2001-02-02', 1),
(3, 'Le Van C', '2002-03-03', 1),
(4, 'Pham Thi D', '2003-04-04', 1),
(5, 'Hoang Van E', '2004-05-05', 1),
(6, 'Vu Thi F', '2005-06-06', 1),
(7, 'Dang Van G', '2006-07-07', 1),
(8, 'Nguyen Thi H', '2007-08-08', 1),
(9, 'Tran Van I', '2008-09-09', 1),
(10, 'Le Thi K', '2009-10-10', 1),
(11, 'Pham Van L', '2010-11-11', 1),
(12, 'Hoang Thi M', '2011-12-12', 4),
(13, 'Vu Van N', '2012-01-13', 4),
(14, 'Nguyen Thi P', '2013-02-14', 4),
(15, 'Tran Van Quy', '2002-04-22', 6201),
(16, 'Le Thi R', '2015-04-16', 4),
(17, 'Pham Van S', '2016-05-17', 4),
(18, 'Hoang Thi T', '2017-06-18', 4),
(19, 'Vu Van U', '2018-07-19', 4),
(20, 'Nguyen Thi V', '2019-08-20', 4),
(277, 'gfg', '2222-02-22', 1545),
(2666, 'tran bean', '2002-04-22', 6201),
(5454, 'TRAN VAN QUY', '2002-04-22', 6201);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_name`, `date_of_birth`, `address`, `phone`) VALUES
(1, 'bean', '2002-04-22', 'Hà Tĩnh', '914 574 719'),
(2, 'bean', '2002-04-22', 'Hà Tĩnh', '914 574 719'),
(244, 'Tran Thi B', '1985-09-20', '456 XYZ Street, District 2, Ho Chi Minh City', '0987654321'),
(344, 'Pham Thi D', '1990-12-25', '321 UVW Street, District 4, Ho Chi Minh City', '0542137896'),
(443, 'Le Van C', '1975-03-10', '789 DEF Street, District 3, Ho Chi Minh City', '0369852147'),
(655, 'Hoang Van E', '1988-07-08', '147 GHI Street, District 5, Ho Chi Minh City', '0789654123'),
(956, 'Tran Van I', '1978-06-03', '753 PQR Street, District 9, Ho Chi Minh City', '0325987412'),
(1065, 'Le Thi K', '1995-02-14', '852 WXY Street, District 10, Ho Chi Minh City', '0796541238'),
(1446, 'Le Thi R', '1976-05-31', '147 JKL Street, Tan Phu District, Ho Chi Minh City', '0325987412'),
(1541, 'Pham Van L', '1973-10-09', '456 ABC Street, District 11, Ho Chi Minh City', '0369854127'),
(1643, 'Vu Van N', '1977-09-17', '258 DEF Street, Go Vap District, Ho Chi Minh City', '0147853692'),
(1644, 'Nguyen Thi P', '1992-04-05', '951 UVW Street, Binh Thanh District, Ho Chi Minh City', '0789652147'),
(1652, 'Hoang Thi M', '1986-07-28', '753 XYZ Street, District 12, Ho Chi Minh City', '0987412365'),
(1655, 'Tran Van Q', '1981-11-12', '369 GHI Street, Tan Binh District, Ho Chi Minh City', '0963147895'),
(1988, 'Hoang Thi T', '1984-03-19', '753 RST Street, Phu Nhuan District, Ho Chi Minh City', '0369854127'),
(1989, 'Vu Van U', '1979-12-06', '456 PQR Street, Thu Duc District, Ho Chi Minh City', '0987412365'),
(1997, 'Pham Van S', '1998-08-24', '258 MNO Street, Binh Tan District, Ho Chi Minh City', '0796541238'),
(2890, 'Nguyen Thi V', '1993-01-28', '951 WXY Street, District 7, Ho Chi Minh City', '0147853692'),
(5647, 'Dang Van G', '1970-04-18', '369 MNO Street, District 7, Ho Chi Minh City', '0963147852'),
(6546, 'Vu Thi F', '1983-11-30', '258 JKL Street, District 6, Ho Chi Minh City', '0321478965');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','teacher','student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`username`, `student_id`, `password`, `role`) VALUES
('admin', NULL, '12345', 'admin'),
('bean', 15, '12345', 'student'),
('bean02', 2666, '12345', 'student'),
('student', 5454, '12345', 'student'),
('teacher', NULL, '12345', 'teacher');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Chỉ mục cho bảng `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6202;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8466;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`);

--
-- Các ràng buộc cho bảng `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`);

--
-- Các ràng buộc cho bảng `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

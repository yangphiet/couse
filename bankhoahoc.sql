-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 09, 2025 lúc 07:07 PM
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
-- Cơ sở dữ liệu: `bankhoahoc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_price` varchar(255) NOT NULL,
  `pttt` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `thoigian` varchar(100) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trangthai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`bill_id`, `user_id`, `course_id`, `full_name`, `email`, `phone`, `course_name`, `course_price`, `pttt`, `instructor`, `classname`, `thoigian`, `time_start`, `time_end`, `timestamp`, `trangthai`) VALUES
(40, 29, 55, 'Đinh Yang Phiệt ', 'dinhyangphiet1142003@gmail.com', '0962900419', 'Tiếng Anh nâng cao', '12000000', 'Thanh toán Ví VNPAY', 'Trần Văn Hương', 'P208', '10/09/2025', '14:00:00', '16:00:00', '2025-07-08 18:07:44', 'Đã thanh toán'),
(44, 29, 55, 'Đinh Yang Phiệt', 'dinhyangphiet1142003@gmail.com', '0962900419', 'Tiếng Anh nâng cao', '12000000', 'Thanh toán Ví VNPAY', 'Trần Văn Hương', 'P208', '10/09/2025', '14:00:00', '16:00:00', '2025-07-09 10:31:11', 'Đã thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(12, 'Tiếng Anh cơ bản'),
(13, 'Tiếng Anh nâng cao'),
(14, 'Tiếng Hàn cơ bản'),
(15, 'Tiếng Hàn nâng cao'),
(16, 'Tiếng Hàn luyện thi TOPIK 1'),
(17, 'Tiếng Anh luyện thi IELTS'),
(18, 'Tiếng Anh cơ bản'),
(19, 'Tiếng Anh nâng cao'),
(20, 'Tiếng Hàn cơ bản'),
(21, 'Tiếng Hàn nâng cao'),
(22, 'Tiếng Hàn luyện thi TOPIK 1'),
(23, 'Tiếng Anh luyện thi IELTS');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `course_id`, `content`, `timestamp`) VALUES
(24, 15, 54, 'khoá học quá hay', '2025-02-12 03:23:51'),
(25, 15, 54, 'tuyệt vời', '2025-02-12 03:24:03'),
(27, 15, 50, 'thật bổ x', '2025-02-12 03:24:18'),
(28, 15, 51, 'uy tín quá ạ', '2025-02-12 03:24:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  `instructor` varchar(100) DEFAULT NULL,
  `price` decimal(20,0) NOT NULL,
  `category_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `thoigian` varchar(100) NOT NULL,
  `intro` varchar(1000) NOT NULL,
  `time_start` time NOT NULL,
  `classname` text NOT NULL,
  `time_end` time NOT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `description`, `image`, `instructor`, `price`, `category_id`, `lesson_id`, `thoigian`, `intro`, `time_start`, `classname`, `time_end`, `teacher_id`) VALUES
(50, 'Luyện thi TOPIK 1', 'Khóa học Luyện thi TOPIK I được xây dựng bài bản giúp bạn làm quen với định dạng đề thi, luyện kỹ năng giải đề và nâng cao điểm số một cách hiệu quả.', 'TOPIK .png', 'Nguyễn Văn Hưng', 9000000, 16, 2, '01/10/', '? Bạn sẽ học được gì?\r\nHiểu rõ cấu trúc đề TOPIK I: Từ vựng – Ngữ pháp – Đọc hiểu – Nghe hiểu\r\n\r\nNắm chắc từ vựng & ngữ pháp thường xuất hiện trong đề thi\r\n\r\nChiến lược làm bài đọc hiểu nhanh, chính xác\r\n\r\nLuyện nghe hiểu theo giọng đọc thật của đề TOPIK\r\n\r\nLàm quen đề thi thật – kiểm tra thử có chấm điểm\r\n\r\n⭐ Điểm nổi bật của khóa học\r\n✅ Lộ trình học rõ ràng, từ căn bản đến luyện đề nâng cao\r\n\r\n✅ Giáo viên có kinh nghiệm luyện thi TOPIK trên 3 năm\r\n\r\n✅ Bộ đề luyện thi bám sát đề thật – có hướng dẫn giải chi tiết\r\n\r\n✅ Bài kiểm tra định kỳ – báo cáo tiến độ học tập\r\n\r\n✅ Học mọi lúc, mọi nơi – hỗ trợ qua Zalo/Email\r\n\r\n? Phù hợp với ai?\r\nNgười đã học xong tiếng Hàn sơ cấp (~100 giờ học)\r\n\r\nHọc viên muốn thi TOPIK I (cấp độ 1 – 2)\r\n\r\nSinh viên, người đi làm cần bằng để du học, xin visa D4, xin việc\r\n\r\n? Ưu đãi dành riêng cho học viên\r\n? Học thử 1 buổi đầu miễn phí\r\n? Nhận bộ đề thi thử có file nghe – có chấm điểm\r\n? Giảm 30% học phí cho người đăng ký trong tháng này\r\n\r\n⏰ Thời lượng: 20 – 2', '14:00:00', 'H201', '16:00:00', NULL),
(51, 'Luyện thi IELTS', 'Khóa học Luyện thi IELTS chuyên sâu sẽ giúp bạn nắm vững chiến lược làm bài từng kỹ năng.', 'ielts.png', 'Vũ Minh Thuận', 7000000, 17, 1, '01/12/2023', 'Bạn cần chứng chỉ IELTS để du học, định cư, hoặc xét tuyển đại học?\r\nKhóa học Luyện thi IELTS chuyên sâu sẽ giúp bạn nắm vững chiến lược làm bài từng kỹ năng, cải thiện điểm số hiệu quả với phương pháp học thông minh, cập nhật sát đề thi thật.\r\n\r\n? Bạn sẽ đạt được gì?\r\nHiểu rõ cấu trúc đề thi & tiêu chí chấm điểm 4 kỹ năng\r\n\r\nChiến lược làm bài Reading & Listening hiệu quả, tăng tốc độ và độ chính xác\r\n\r\nLuyện kỹ năng Speaking theo từng chủ đề thường gặp, chấm chữa trực tiếp\r\n\r\nViết Task 1 & Task 2 chuẩn theo tiêu chí Band 6.5 – 8.0\r\n\r\nLàm quen với đề thi thật – thi thử định kỳ\r\n\r\n? Điểm nổi bật của khóa học\r\n✅ Giáo viên 8.0+ IELTS, giàu kinh nghiệm luyện thi\r\n\r\n✅ Hệ thống bài học chia theo band mục tiêu: 5.5, 6.5, 7.5+\r\n\r\n✅ Sửa bài viết & luyện nói 1-1 theo yêu cầu\r\n\r\n✅ Bộ đề luyện tập sát đề thi thật – cập nhật mới nhất\r\n\r\n✅ Kèm học liệu PDF & video bài giảng chất lượng cao\r\n\r\n? Phù hợp với ai?\r\nNgười cần thi IELTS để đi du học, định cư, hoặc xin việc\r\n\r\nHọc sinh lớp 11, 12 dùng IELT', '09:00:00', 'F101', '11:00:00', NULL),
(52, 'Tiếng  Hàn nâng cao', 'Trong vòng 6 tháng bạn sẽ nâng cao được kiến thức Tiếng Hàn', 'THNC.png', 'Vũ Minh Thuận', 18000000, 15, 2, '10/10/2025', 'Bạn đã có nền tảng tiếng Hàn cơ bản và muốn nâng cao trình độ để giao tiếp trôi chảy, viết bài học thuật, luyện thi TOPIK II?\r\nKhóa học Tiếng Hàn Nâng Cao giúp bạn phát triển toàn diện 4 kỹ năng: nghe, nói, đọc, viết cùng với ngữ pháp trung cấp – nâng cao, từ vựng học thuật và phản xạ giao tiếp chuyên sâu.\r\n\r\n', '14:00:00', 'F204', '16:00:00', NULL),
(53, 'Tiếng Hàn Cơ Bản', 'Trong vòng 3 tháng bạn sẽ nâng cao được kiến thức Tiếng Hàn Cơ Bản', 'THCB.png', 'Trần Văn Hương', 5000000, 14, 1, '01/02/2025', 'Bạn yêu thích tiếng Hàn và văn hóa Hàn Quốc nhưng chưa biết bắt đầu từ đâu?\r\nKhóa học Tiếng Hàn Cơ Bản được thiết kế dành riêng cho người mới bắt đầu hoặc mất gốc, giúp bạn làm quen với bảng chữ cái Hangul, phát âm chuẩn, từ vựng cơ bản và các mẫu câu giao tiếp thông dụng trong cuộc sống hằng ngày.\r\n\r\n', '06:00:00', 'P205', '10:00:00', NULL),
(54, 'Tiếng Anh nâng cao', 'Trong vòng 6 tháng bạn sẽ nâng cao được kiến thức Tiếng Anh nâng cao', 'TANC.png', 'Trần Văn Hương', 12000000, 13, 2, '10/09/2025', 'Bạn đã có nền tảng tiếng Anh và mong muốn nâng cao trình độ để giao tiếp chuyên nghiệp, sử dụng tiếng Anh trong môi trường học tập và làm việc quốc tế?\r\nKhóa học Tiếng Anh Nâng Cao được thiết kế giúp bạn phát triển toàn diện 4 kỹ năng: Nghe – Nói – Đọc – Viết, đồng thời mở rộng vốn từ vựng, ngữ pháp và phản xạ giao tiếp ở cấp độ học thuật và chuyên sâu.', '14:00:00', 'P208', '16:00:00', NULL),
(55, 'Tiếng Anh cơ bản', 'Trong vòng 3 tháng bạn sẽ nâng cao được kiến thức Tiếng  Cơ Bản', 'TACB.png', 'Lê Nhật Luân', 6000000, 12, 3, '19/04/2025', 'Bạn muốn học tiếng Anh nhưng không biết bắt đầu từ đâu? Khóa học Tiếng Anh Cơ Bản được thiết kế dành riêng cho những người mới bắt đầu hoặc mất gốc, giúp bạn xây dựng nền tảng vững chắc về từ vựng, ngữ pháp và kỹ năng giao tiếp hằng ngày.', '19:00:00', 'P201', '21:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_user`
--

CREATE TABLE `course_user` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `course_user`
--

INSERT INTO `course_user` (`id`, `course_id`, `user_id`) VALUES
(1, 55, 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flashcards`
--

CREATE TABLE `flashcards` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `tu_vung` varchar(255) NOT NULL,
  `nghia` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `flashcards`
--

INSERT INTO `flashcards` (`id`, `course_id`, `tu_vung`, `nghia`, `created_at`) VALUES
(4, 55, 'apple', 'quả táo', '2025-07-04 07:49:08'),
(5, 55, 'book', 'quyển sách', '2025-07-04 07:49:08'),
(6, 55, 'cat', 'con mèo', '2025-07-04 07:49:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lessons`
--

CREATE TABLE `lessons` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` varchar(50) NOT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `lesson_name`, `video_url`, `content`) VALUES
(1, 'Buổi sáng', 'https://www.youtube.com/embed/abc123', NULL),
(2, 'Buổi chiều', NULL, NULL),
(3, 'Buổi tối', 'https://www.youtube.com/embed/n8xX8M0U3aY', '? **Chủ đề: Kỹ năng viết Email chuyên nghiệp (Writing Professional Emails)**\r\n\r\n1. Cấu trúc Email chuẩn:\r\n   - Greeting (Chào hỏi): Dear Mr./Ms. + Tên\r\n   - Introduction: I am writing to inform/inquire/request...\r\n   - Main content: Trình bày rõ ràng, ngắn gọn\r\n   - Closing: I look forward to hearing from you.\r\n   - Signature: Best regards, + Tên bạn\r\n\r\n2. Từ vựng chuyên dụng:\r\n   - Enquire (v): hỏi thông tin\r\n   - Confirm (v): xác nhận\r\n   - Regarding (prep): liên quan đến\r\n   - Deadline (n): hạn chót\r\n\r\n3. Mẫu email:'),
(4, 'Buổi sáng', 'https://www.youtube.com/embed/abc123', NULL),
(5, 'Buổi chiều', NULL, NULL),
(6, 'Buổi tối', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question_types`
--

CREATE TABLE `question_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `question_types`
--

INSERT INTO `question_types` (`type_id`, `type_name`, `description`) VALUES
(1, 'Trắc nghiệm 1 đáp án', 'Chỉ chọn 1 trong 4 đáp án đúng'),
(2, 'Điền từ', 'Nhập từ vào chỗ trống'),
(3, 'Đúng/Sai', 'Chọn đúng hoặc sai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quizzes`
--

CREATE TABLE `quizzes` (
  `quiz_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `correct_option` enum('A','B','C','D') NOT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quizzes`
--

INSERT INTO `quizzes` (`quiz_id`, `lesson_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `type_id`) VALUES
(1, 3, 'What is the capital of England?', 'London', 'Paris', 'Rome', 'Berlin', 'A', NULL),
(2, 1, 'What is the capital of England?', 'London', 'Paris', 'Rome', 'Berlin', 'A', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quiz_results`
--

CREATE TABLE `quiz_results` (
  `result_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `selected_option` enum('A','B','C','D') DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT NULL,
  `answered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quiz_results`
--

INSERT INTO `quiz_results` (`result_id`, `quiz_id`, `user_id`, `selected_option`, `is_correct`, `answered_at`) VALUES
(1, 1, 29, 'A', 1, '2025-07-09 10:31:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'teacher',
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `username`, `full_name`, `password`, `role`, `email`, `phone`, `bio`) VALUES
(4, 'vana', 'Nguyễn Văn A', '1234', 'teacher', 'vana@example.com', '0901234567', 'Giảng viên tiếng Hàn với 5 năm kinh nghiệm.'),
(5, 'tranb', 'Trần Thị B', '1234', 'teacher', 'tranb@example.com', '0911223344', 'Giảng viên tiếng Anh giao tiếp.'),
(6, 'cuonglq', 'Lê Quốc Cường', '1234', 'teacher', NULL, NULL, 'Giảng viên luyện thi TOEIC.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `registration_date`, `role`) VALUES
(15, 'phiet', '123', 'dinhyangphiet1142003@gmail.com', 'PHIET', '2025-03-05 11:15:01', 'admin'),
(29, 'yangphiet', 'phiet1142003', 'dinhyangphiet1142003@gmail.com', 'Đinh Yang Phiệt', '2025-06-12 04:25:32', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `bills_course_fk` (`course_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `lesson_id` (`lesson_id`),
  ADD KEY `courses_teacher_fk` (`teacher_id`);

--
-- Chỉ mục cho bảng `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `flashcards`
--
ALTER TABLE `flashcards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Chỉ mục cho bảng `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Chỉ mục cho bảng `question_types`
--
ALTER TABLE `question_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Chỉ mục cho bảng `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `lesson_id` (`lesson_id`),
  ADD KEY `quizzes_type_fk` (`type_id`);

--
-- Chỉ mục cho bảng `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `course_user`
--
ALTER TABLE `course_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `flashcards`
--
ALTER TABLE `flashcards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `question_types`
--
ALTER TABLE `question_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_course_fk` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Các ràng buộc cho bảng `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`lesson_id`),
  ADD CONSTRAINT `courses_teacher_fk` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`);

--
-- Các ràng buộc cho bảng `course_user`
--
ALTER TABLE `course_user`
  ADD CONSTRAINT `course_user_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `course_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `flashcards`
--
ALTER TABLE `flashcards`
  ADD CONSTRAINT `flashcards_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`lesson_id`),
  ADD CONSTRAINT `quizzes_type_fk` FOREIGN KEY (`type_id`) REFERENCES `question_types` (`type_id`);

--
-- Các ràng buộc cho bảng `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD CONSTRAINT `quiz_results_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`),
  ADD CONSTRAINT `quiz_results_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

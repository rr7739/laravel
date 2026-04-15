-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2026 at 09:31 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `id_number` varchar(200) NOT NULL,
  `role` varchar(20) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `portal_file` varchar(500) NOT NULL,
  `certificate` varchar(200) NOT NULL,
  `major` varchar(200) NOT NULL,
  `status` varchar(40) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `name`, `phone`, `email`, `id_number`, `role`, `photo`, `portal_file`, `certificate`, `major`, `status`, `notes`, `created_at`, `updated_at`, `password`) VALUES
(17, 'omar ali adam', '777999888', 'omar@test.com', '898989890', 'student', 'students/photos/XbdUnIRmDklpodd8JJurCXqIsTrRGQUSuHQoDsku.jpeg', 'students/portal/T6oo88hK83VKGB5OUGvIDFF6bbMrjAWosDZ1XNm5.pdf', 'students/certificates/hrWdaOKK7dT4IbeOJsyOzaWXlmq4uGRYVEo2TisT.jpeg', 'IT', 'accepted', 'Your application has been accepted', '2026-04-14 02:49:13', '2026-04-14 03:05:52', '111'),
(18, 'adam sami kareem', '777666555', 'adam@test.com', '12345678', 'student', 'students/photos/lHwJcdTRb3jzDEjQXLE0YzyEa6peWtNtSRT1pKEi.jpeg', 'students/portal/oJ7CngZxZvs0jsGE6YXG04QG1iIQCFKKXmhcs1eE.pdf', 'students/certificates/zwPXijdV2WCCxm53sV208BqiNjHgbDhp9APa6Apv.jpeg', 'Cyber', 'pending', NULL, '2026-04-14 02:51:10', '2026-04-14 02:51:10', '111'),
(19, 'salma zayn nabil', '775566443', 'salma@test.com', '9876543', 'student', 'students/photos/K8WU9nufJaWGQyfTQWSsy5EjqlnR8ylP66WYpemw.jpeg', 'students/portal/dy7dDfUCBHpfCHTGo7c72fpP8Mu1mp3l0PKTjUwu.pdf', 'students/certificates/pjKztdin48IcLsBwjnvr2SJNgbIYodijdml5wiZK.jpeg', 'AI', 'accepted', 'Your application has been accepted', '2026-04-14 02:53:00', '2026-04-14 11:06:57', '111'),
(20, 'dana tariq samir', '786546567', 'dana@test.com', '8765433', 'student', 'students/photos/hPFALOR551sXv3L75OrrFrzENlInVWksAAPuiQUi.jpeg', 'students/portal/IxTEJJksQrXHb1x77CGBIvESHbNof106tQH4RCQR.pdf', 'students/certificates/CSGtebXuGMO1THEpX9BPNRyZn2aFGFZb0U0NXmHj.jpeg', 'Graphics', 'resubmitted', 'photo empty', '2026-04-14 02:54:43', '2026-04-14 03:07:09', '111'),
(21, 'rami adam hussein', '776543234', 'rami@test.com', '765432908', 'student', 'students/photos/T5928SzB1Ozs5ZBkfFXximJPNclUkRghUYbFFhRB.jpeg', 'students/portal/R1hatmxLbCFdcTrjLeGPJNfwZSO2yCR4cRetxOF1.pdf', 'students/certificates/LkhZvNmVLmWD7LYXJRsIl1LOuqFW9AkfsJHpM5gR.jpeg', 'Decor', 'resubmitted', 'dddd', '2026-04-14 02:56:31', '2026-04-14 06:41:22', '111'),
(22, 'farah zayn sami', '776589767', 'farah@test.com', '765432908', 'student', 'students/photos/sfe5QUfBQiQJMvibRhzgvBRY88avNxqe9zXlZb5w.jpeg', 'students/portal/FrZN88glABXkSSLJOS3ObNNnC60vQhlSeawEqSz8.pdf', 'students/certificates/WwwubKZOGTdX2eLJwuEgT0PBvR2tcxkd5YLNGEQf.jpeg', 'Decor', 'accepted', 'Your application has been accepted', '2026-04-14 02:58:11', '2026-04-14 03:06:34', '111'),
(23, 'samir omar tariq', '778908765', 'samir@test.com', '8765436', 'student', 'students/photos/GheRTcNEhqwumZRSAAjzDu555f6ibp6dLGtZhGhW.jpeg', 'students/portal/hZkuqNTI1f51oP4zKynPRPKTqTj2n3fAQDHGHyiB.pdf', 'students/certificates/4kS9k7Wda50RzJEZ99OHL3WMFMvXkeEpfGtYlpPn.jpeg', 'Cyber', 'accepted', 'Your application has been accepted', '2026-04-14 02:59:43', '2026-04-14 03:06:43', '111'),
(24, 'salma ali ahmed', '777998888', 'salma@test.com', '3333333', 'student', 'students/photos/QsDsZ4HjDyauBb9dtitJGyjbhoSVKjOfcXyCL0Ow.jpeg', 'students/portal/bYM2tv2YuRgAnLRfpW6V9afnxEbdDGrMhsLywpVv.pdf', 'students/certificates/B1YNc0GUXNXbA3z6uLbcXjkxyoFkeiVXEz5Ou4H5.jpeg', 'IT', 'pending', NULL, '2026-04-14 06:39:08', '2026-04-14 06:39:08', NULL),
(25, 'salma ali ahmed', '777998888', 'salma@test.com', '3333333', 'student', 'students/photos/Jn0tV9vhoQJsaVo8qat7RTTd0tHLWQIMBcCfx74b.jpeg', 'students/portal/HZuaA1NyTL1FIgC7vcs5eBYMTczIhVl6QgvfaeOL.pdf', 'students/certificates/xSl6OE61IaC89g3fjKHS5qaHqR7QTdMk3MRRLZWb.jpeg', 'IT', 'accepted', 'Your application has been accepted', '2026-04-14 06:40:17', '2026-04-14 06:41:05', '123');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('admin','student') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@test.com', '12345', '777888999', 'admin', '2026-03-25 17:34:42', '2026-03-25 17:34:42'),
(2, 'admin', 'admin@test.com', '$2y$10$Vh1r3uPjQ5BqR1V3z2XGJejzXqB9lG8OP6kxFfFm7Q9oxsYkWmzTy', '777555444', 'admin', '2026-03-25 17:38:41', '2026-03-25 17:38:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

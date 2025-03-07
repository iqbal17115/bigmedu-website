-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2021 at 01:47 PM
-- Server version: 5.7.36
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nanosoft_bigm`
--

-- --------------------------------------------------------

--
-- Table structure for table `frontend_menus`
--

CREATE TABLE `frontend_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `rand_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `url_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `program_info_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_info_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontend_menus`
--

INSERT INTO `frontend_menus` (`id`, `rand_id`, `title_en`, `title_bn`, `sort_order`, `url_link`, `url_link_type`, `status`, `parent_id`, `menu_type`, `program_info_id`, `course_info_id`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(3871, 'RO4UK6APQn', 'About BIGM', '', 0, '', '5', 1, '0', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3872, 'QuredEK1KN', 'About Us', '', 0, '', '', 1, 'RO4UK6APQn', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3873, 'WwrunxMXoo', 'About BIGM', '', 0, 'about-bigm', '2', 1, 'QuredEK1KN', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3874, 'bOS9r6RqbJ', 'Objective of BIGM', '', 1, 'objective-of-bigm', '2', 1, 'QuredEK1KN', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3875, 'VDIIIzEFOP', 'Organogram of BIGM', '', 2, 'organogram-of-bigm', '2', 1, 'QuredEK1KN', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3876, 'FmwZyucX5c', 'Visit BIGM', '', 3, 'visit-bigm', '2', 1, 'QuredEK1KN', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3877, '8BQjV71Dlk', 'Directories', '', 4, 'member_to_employee_frontend', '1', 1, 'QuredEK1KN', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3878, 'LXqMBvaeRV', 'Vision and Mission', '', 5, 'vision-and-mission', '2', 1, 'QuredEK1KN', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3879, 'zJQhBC7pD7', 'Authoritative bodies of BIGM', '', 1, '', '', 1, 'RO4UK6APQn', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3880, 'ED5kkrBwpe', 'BOT Members', '', 0, 'board_of_trustees', '1', 1, 'zJQhBC7pD7', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3881, 'PZtFADZ2Te', 'GOB Members', '', 1, 'governing_body', '1', 1, 'zJQhBC7pD7', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3882, 'dYhBh6cWjd', 'BIGM Leadership', '', 2, '', '', 1, 'RO4UK6APQn', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3883, 'UE8IZFHsFj', 'The Chairman', '', 0, 'the-chairman', '2', 1, 'dYhBh6cWjd', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3884, '9V2KvpYZUL', 'Directors', '', 1, '', '', 1, 'dYhBh6cWjd', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3885, 'CEWzrjvujx', 'Additional Directors', '', 2, '', '', 1, 'dYhBh6cWjd', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3886, 'oL7OtTAkzg', 'Message from the Chairman', '', 3, '', '', 1, 'dYhBh6cWjd', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3887, 'PnW7ZvPedU', 'Message from Director', '', 4, '', '', 1, 'dYhBh6cWjd', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3888, 'nfb4mtg0ad', 'Admission', '', 1, '', '5', 1, '0', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3889, 'qnSvwE1zrx', 'Admission Information', '', 0, '', '', 1, 'nfb4mtg0ad', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3890, 'VXPKdkhsqi', 'International Students', '', 0, '', '', 1, 'qnSvwE1zrx', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3891, 'ZcBuFbcZxx', 'Departments', '', 1, '', '', 1, 'qnSvwE1zrx', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3892, 'm1r4hh3xKG', 'Admission Contact', '', 2, '', '', 1, 'qnSvwE1zrx', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3893, 'VpIuot33EI', 'Apply Online', '', 3, '', '', 1, 'qnSvwE1zrx', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3894, '2tBVFOu98H', 'Guidelines', '', 1, '', '', 1, 'nfb4mtg0ad', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3895, '2DyR31yd7b', 'Admission Guidelines', '', 0, '', '', 1, '2tBVFOu98H', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3896, 'neZ3NGzZhg', 'Admission Process', '', 1, '', '', 1, '2tBVFOu98H', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3897, 'ix3sSRxWO8', 'Admission Checklist and Documents', '', 2, '', '', 1, '2tBVFOu98H', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3898, '38obStFzER', 'Fees and Funding', '', 2, '', '', 1, 'nfb4mtg0ad', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3899, '6bqTIHB9yI', 'Tuitions Fees (Local Student)', '', 0, '', '', 1, '38obStFzER', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3900, 'JNqTwCV4Y6', 'Tuitions Fees (Int. Student)', '', 1, '', '', 1, '38obStFzER', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3901, '1UMjABFExY', 'Payment Procedure', '', 2, '', '', 1, '38obStFzER', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3902, 'c9PxsF1MSK', 'Scholarship', '', 3, '', '', 1, '38obStFzER', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3903, '8aXXyqduEK', 'Financial Aid Application', '', 4, '', '', 1, '38obStFzER', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3904, 'hlW0oERN8D', 'Academic Program', '', 2, '', '5', 1, '0', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3905, 'huTHk1VNUx', 'MPA Program', '', 0, '', '', 1, 'hlW0oERN8D', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3906, 'ggzYrUTUQ6', 'Human Resource Management', '', 0, 'mpa-in-hrm', '2', 1, 'huTHk1VNUx', 'none', '1', '3', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3907, '6NDaadmkZs', 'Overview', '', 0, 'overview-of-mpa-in-hrm', '2', 1, 'ggzYrUTUQ6', 'course_menu', '1', '3', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3908, '6NDaadmkZh', 'Message from HoD', '', 1, 'message-from-hod-of-mpa-in-hrm', '2', 1, 'ggzYrUTUQ6', 'course_menu', '1', '3', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3909, '6NDaadmkZl7', 'Academic Regulations', '', 2, '', '', 1, 'ggzYrUTUQ6', 'course_menu', '1', '3', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3910, '6NDaadmkZl8g', 'Courses', '', 3, '', '', 1, 'ggzYrUTUQ6', 'course_menu', '1', '3', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3911, 'YAcaOwRtnh', 'Faculty Members', '', 4, 'faculty_members', '1', 1, 'ggzYrUTUQ6', 'course_menu', '1', '3', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3912, '6NDaadmkZl8sa', 'Notice Board', '', 5, 'notice-all', '1', 1, 'ggzYrUTUQ6', 'course_menu', '1', '3', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3913, 'HaMZRMEdj1', 'Governance and Public Policies', '', 1, 'mpa-in-gpp', '2', 1, 'huTHk1VNUx', 'none', '1', '1', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3914, 'gE5xansHl7', 'Overview', '', 0, 'overview-of-mpa-in-gpp', '2', 1, 'HaMZRMEdj1', 'course_menu', '1', '1', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3915, 'q3ozHoK8Hn', 'Message from HoD', '', 1, 'message-from-hod-of-mpa-in-gpp', '2', 1, 'HaMZRMEdj1', 'course_menu', '1', '1', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3916, 'lAni6YV0V9', 'Academic Regulations', '', 2, '', '', 1, 'HaMZRMEdj1', 'course_menu', '1', '1', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3917, 'izuYQBwIkp', 'Courses', '', 3, '', '', 1, 'HaMZRMEdj1', 'course_menu', '1', '1', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3918, 'u813XEsdk6', 'Faculty Members', '', 4, 'faculty_members', '1', 1, 'HaMZRMEdj1', 'course_menu', '1', '1', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3919, 'AOuKOPW8C9', 'Notice Board', '', 5, 'notice-all', '1', 1, 'HaMZRMEdj1', 'course_menu', '1', '1', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3920, '3eyVv2Cs2T', 'International Economics Relation', '', 2, 'mpa-in-ier', '2', 1, 'huTHk1VNUx', 'none', '1', '2', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3921, '7mKe0IZbhP', 'Overview', '', 0, 'overview-of-mpa-in-ier', '2', 1, '3eyVv2Cs2T', 'course_menu', '1', '2', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3922, 'Wpa6aqtf3Z', 'Controller of Exam', '', 1, '', '', 1, 'hlW0oERN8D', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3923, 'fKdn7vip1t', 'Academic Calendar', '', 0, '', '', 1, 'Wpa6aqtf3Z', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3924, 'nBZvvtfm30', 'Exam Schedule', '', 1, '', '', 1, 'Wpa6aqtf3Z', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3925, 'MSfWly32ZH', 'Exam Result', '', 2, '', '', 1, 'Wpa6aqtf3Z', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3926, 'oebpIY7apm', 'Certificate and Diploma Courses', '', 2, '', '', 1, 'hlW0oERN8D', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3927, '5FRmJxaXmi', 'Academia Lecture Series', '', 3, '', '', 1, 'hlW0oERN8D', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3928, 'ZJHlmtUoH3', 'Visiting Professor', '', 4, '', '', 1, 'hlW0oERN8D', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3929, 'obyWksciTP', 'Research', '', 3, '', '', 1, '0', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3930, 'q2mDlNMqvW', 'Research in BIGM', '', 0, '', '', 1, 'obyWksciTP', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3931, 'XrSB9GcqxC', 'Research Group', '', 1, '', '', 1, 'obyWksciTP', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3932, 'dSqnprJMfm', 'Researchers Profile', '', 2, '', '', 1, 'obyWksciTP', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3933, 'K6GVMBzpRs', 'Research Centers', '', 3, '', '', 1, 'obyWksciTP', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3934, 'MlFoNQq3cU', 'Research Project', '', 4, '', '', 1, 'obyWksciTP', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3935, 'Yq1vziIpg6', 'Funded Research', '', 5, '', '', 1, 'obyWksciTP', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3936, 'ZwTHrieuCi', 'Research Collaboration', '', 6, '', '', 1, 'obyWksciTP', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3937, 'IIsKU7tWCN', 'BIGM Research Fellowship', '', 7, '', '', 1, 'obyWksciTP', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3938, 'mIJrQWCyi9', 'Research Program', '', 8, '', '', 1, 'obyWksciTP', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3939, 'kX5w0x59Cz', 'Ongoing Research', '', 0, '', '', 1, 'mIJrQWCyi9', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3940, 'oehJwfOgeq', 'Completed Research', '', 1, '', '', 1, 'mIJrQWCyi9', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3941, 'XibaV5z5Eu', 'Graduate Research', '', 2, '', '', 1, 'mIJrQWCyi9', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3942, 'g1d71mmbsq', 'Innovation Cell', '', 9, '', '', 1, 'obyWksciTP', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3943, 'oyT2KRS4vZ', 'SDGs Initiatives', '', 0, '', '', 1, 'g1d71mmbsq', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3944, 'UqiyPL0GTz', 'Capacity Building and Training', '', 4, '', '', 1, '0', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3945, 'EhpSu3xGLt', 'At a Glance CBT', '', 0, '', '', 1, 'UqiyPL0GTz', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3946, '8JQvflLcF9', 'Management', '', 1, '', '', 1, 'UqiyPL0GTz', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3947, 't7TKoaxJ1Y', 'List of Trainers', '', 2, '', '', 1, 'UqiyPL0GTz', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3948, '5cw3SkuXCG', 'Training Courses', '', 3, '', '', 1, 'UqiyPL0GTz', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3949, 'yiUNM8xdUd', 'Upcoming Training', '', 0, '', '', 1, '5cw3SkuXCG', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3950, 'CmMliHPfzk', 'Ongoing Training', '', 1, '', '', 1, '5cw3SkuXCG', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3951, '55rxDSpBGh', 'Completed Training', '', 2, '', '', 1, '5cw3SkuXCG', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3952, 'oosDvuH3ep', 'Funded Training Course', '', 4, '', '', 1, 'UqiyPL0GTz', 'none', '1', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3953, '4qGuR52Zc6', 'Policy Analysis Course', '', 0, 'policy-analysis-course', '2', 1, 'oosDvuH3ep', 'none', '4', '7', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3954, 'D1vyCGueB2', 'Course Description', '', 0, '', '', 1, '4qGuR52Zc6', 'course_menu', '4', '7', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3955, 'xxb3QUnaXg', 'Course Objective', '', 1, '', '', 1, '4qGuR52Zc6', 'course_menu', '4', '7', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3956, 'TpmrVDVciq', 'Learning Outcomes', '', 2, '', '', 1, '4qGuR52Zc6', 'course_menu', '4', '7', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3957, 'b3LU8lODLG', 'Target Audience', '', 3, '', '', 1, '4qGuR52Zc6', 'course_menu', '4', '7', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3958, 'xxT3gRIa08', 'Eligibility for Trainees’', '', 4, '', '', 1, '4qGuR52Zc6', 'course_menu', '4', '7', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3959, 'YzuPa158El', 'Module and Key Topics', '', 5, '', '', 1, '4qGuR52Zc6', 'course_menu', '4', '7', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3960, 'upZ9kTX1Sb', 'Assessment and Certification', '', 6, '', '', 1, '4qGuR52Zc6', 'course_menu', '4', '7', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3961, 'mg8D7GepRj', 'Administrator', '', 7, '', '', 1, '4qGuR52Zc6', 'course_menu', '4', '7', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3962, 'vSKmtoVkTq', 'Brochure', '', 8, '', '', 1, '4qGuR52Zc6', 'course_menu', '4', '7', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3963, 'Bu2Pb4tloC', 'Strategic Management', '', 1, '', '', 1, 'oosDvuH3ep', 'none', '4', '8', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3964, '9U8rKFG7M9', 'Fundamentals of Research Methodology', '', 2, '', '', 1, 'oosDvuH3ep', 'none', '4', '9', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3965, 'OFsab1PJ9W', 'Leadership Development Program', '', 3, '', '', 1, 'oosDvuH3ep', 'none', '4', '10', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3966, 'tkUQqy2K6G', 'Self-Initiated Training Course', '', 5, '', '', 1, 'UqiyPL0GTz', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3967, 'NK29dCEtki', 'Statistical Analytic & Modeling with R', '', 0, '', '', 1, 'tkUQqy2K6G', 'none', '5', '11', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3968, 'KTNG57wDoy', 'Data Analytics in Python', '', 1, '', '', 1, 'tkUQqy2K6G', 'none', '5', '12', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3969, '5D3pQf30nz', 'Quantitative Analysis with STATA', '', 2, '', '', 1, 'tkUQqy2K6G', 'none', '5', '13', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3970, '62hIgb7dRF', 'VAT Management', '', 3, '', '', 1, 'tkUQqy2K6G', 'none', '5', '14', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3971, 'Je2yALAtjh', 'Basic Econometric Analysis', '', 4, '', '', 1, 'tkUQqy2K6G', 'none', '5', '15', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3972, 'MS4rE3OmAn', 'Strategic Collaboration', '', 5, '', '5', 1, '0', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3973, 'XNW8pM4qHc', 'International', '', 0, '', '', 1, 'MS4rE3OmAn', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3974, 'McncBGWNcn', 'Research Collaboration', '', 0, '', '', 1, 'XNW8pM4qHc', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3975, 'upkfOCq677', 'MoU with International Research Institute', '', 1, '', '', 1, 'XNW8pM4qHc', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3976, '5ZooxLYnmI', 'Exchange Program', '', 2, '', '', 1, 'XNW8pM4qHc', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3977, 'M1TqXU4au3', 'JICA Policy Lab', '', 3, '', '5', 1, 'XNW8pM4qHc', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3978, 'BXBdTPyY2e', 'National', '', 1, '', '', 1, 'MS4rE3OmAn', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3979, 'FG8bEV4uAc', 'Concern Ministry', '', 0, '', '', 1, 'BXBdTPyY2e', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3980, 'rAvGwSIiB8', 'Bangladesh Bank', '', 1, '', '', 1, 'BXBdTPyY2e', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3981, '75i9aTGKY6', 'Private Organization', '', 2, '', '', 1, 'BXBdTPyY2e', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3982, 'qKGsUvtspk', 'International Conference', '', 2, '', '', 1, 'MS4rE3OmAn', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3983, 'ehLiDbz2Pe', 'World Bank', '', 0, '', '', 1, 'qKGsUvtspk', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3984, 'hlnCkuRXDz', 'WHO', '', 1, '', '', 1, 'qKGsUvtspk', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3985, '7WHSpEOVmc', 'ADB', '', 2, '', '', 1, 'qKGsUvtspk', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3986, 'NWbiBnqpPE', 'Universities', '', 3, '', '', 1, 'qKGsUvtspk', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3987, 'iFLrMmLOjX', 'National Integrity Stragy', '', 3, '', '', 1, 'MS4rE3OmAn', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3988, 'NKpETIGaie', 'Seminar', '', 4, '', '', 1, 'MS4rE3OmAn', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3989, 'PlC1rTDnun', 'Workshop', '', 5, '', '', 1, 'MS4rE3OmAn', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3990, 'RapnVJCYIu', 'Publications', '', 6, '', '', 1, '0', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3991, 'xsUVXiztc6', 'Journal for Policy', '', 0, '', '', 1, 'RapnVJCYIu', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3992, 'cg1j472Cxs', 'Vol.  Issue:  Year:', '', 0, '', '', 1, 'xsUVXiztc6', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3993, 'pq6bVaUNr9', 'Order Journal', '', 1, '', '', 1, 'xsUVXiztc6', 'none', '', '', NULL, NULL, '2021-10-27 14:57:13', '2021-10-27 14:57:13'),
(3994, 'Ri2PYIUPYM', 'Editorial Board', '', 2, '', '', 1, 'xsUVXiztc6', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(3995, 'ozH5f3jUc4', 'Abstracting and indexing', '', 3, '', '', 1, 'xsUVXiztc6', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(3996, '9vkauCbXMv', 'News and announcement', '', 4, '', '', 1, 'xsUVXiztc6', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(3997, '3tbVnCFKCO', 'Academic Journal', '', 1, '', '', 1, 'RapnVJCYIu', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(3998, 'DkpSeDJpxF', 'Vol.  Issue:  Year:', '', 0, '', '', 1, '3tbVnCFKCO', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(3999, 'zDicfgTXSS', 'Order Journal', '', 1, '', '', 1, '3tbVnCFKCO', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4000, 'b75Yb2swlW', 'Editorial Board', '', 2, '', '', 1, '3tbVnCFKCO', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4001, 'u2xA84unwW', 'Abstracting and indexing', '', 3, '', '', 1, '3tbVnCFKCO', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4002, 'sgmjEj0KBK', 'News and announcement', '', 4, '', '', 1, '3tbVnCFKCO', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4003, 'Ks21UEMZBg', 'Working Papers', '', 2, '', '', 1, 'RapnVJCYIu', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4004, '6rNUUkZIrQ', 'BIGM Policy Insights', '', 3, '', '', 1, 'RapnVJCYIu', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4005, 'DavyWcxSLR', 'News Paper Oped', '', 4, '', '', 1, 'RapnVJCYIu', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4006, 'B7zb6DigiD', 'Project Reports', '', 5, '', '', 1, 'RapnVJCYIu', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4007, '2kq6IDAKgy', 'Policy Review Series', '', 6, '', '', 1, 'RapnVJCYIu', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4008, '8LiIlzHYVn', 'Major Findings of BIGM Research', '', 7, '', '', 1, 'RapnVJCYIu', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4009, '5wCFqcxm53', 'BIGM Bulletin', '', 8, '', '', 1, 'RapnVJCYIu', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4010, 'ya353l1KPv', 'Roundtable Discussion', '', 9, '', '', 1, 'RapnVJCYIu', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4011, 'EzDNFjX1mV', 'Announcements', '', 7, '', '', 1, '0', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4012, 'puEgfpYx33', 'Notice', '', 0, '', '', 1, 'EzDNFjX1mV', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4013, 'ftJpFiNTWN', 'General Notice', '', 0, '', '', 1, 'puEgfpYx33', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4014, 'cdjAvHxG0s', 'Special Notice', '', 1, '', '', 1, 'puEgfpYx33', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4015, 'oeP1HHnFkr', 'Events', '', 1, '', '', 1, 'EzDNFjX1mV', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4016, 'PK2OhMKdKU', 'Upcoming events', '', 0, '', '', 1, 'oeP1HHnFkr', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4017, 'hx0ZGWXBWi', 'Completed events', '', 1, '', '', 1, 'oeP1HHnFkr', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4018, 'k9KlaNmrwU', 'Results', '', 2, '', '', 1, 'EzDNFjX1mV', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4019, 'gfrhIQixfF', 'Admission Test Result', '', 0, '', '', 1, 'k9KlaNmrwU', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4020, 'KSixe76xAn', 'Semester Final Result', '', 1, '', '', 1, 'k9KlaNmrwU', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4021, 'VXBGALNwzm', 'Participants List for Training', '', 2, '', '', 1, 'k9KlaNmrwU', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4022, 'Njw8QoHfQa', 'BIGM News', '', 3, '', '', 1, 'EzDNFjX1mV', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4023, 'fhBdP70IQY', 'Tender Notice', '', 4, '', '', 1, 'EzDNFjX1mV', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4024, 'WChP8XmKlV', 'Procurement', '', 5, '', '', 1, 'EzDNFjX1mV', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4025, 'TflaNL4ku3', 'Career Opportunity', '', 6, '', '', 1, 'EzDNFjX1mV', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4026, 'A4LQYSI4CA', 'NOC and Office Order', '', 7, 'our-library', '2', 1, 'EzDNFjX1mV', 'none', '', '', NULL, NULL, '2021-10-27 14:57:14', '2021-10-27 14:57:14'),
(4027, 'C2eKXcfGYT', 'Library one', NULL, 0, 'about-bigm', '2', 1, '0', 'library', NULL, NULL, NULL, NULL, '2021-11-13 18:43:01', '2021-11-13 18:43:01'),
(4028, '3pgyiy1o45', 'Alumni one', NULL, 0, 'about-bigm', '2', 1, '0', 'alumni', NULL, NULL, NULL, NULL, '2021-11-13 18:43:20', '2021-11-13 18:43:20'),
(4029, 'Xe9Ps8SPU1', 'blog one', NULL, 0, 'organogram-of-bigm', '2', 1, '0', 'blog', NULL, NULL, NULL, NULL, '2021-11-13 18:43:34', '2021-11-13 18:43:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `frontend_menus`
--
ALTER TABLE `frontend_menus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `frontend_menus`
--
ALTER TABLE `frontend_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4030;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

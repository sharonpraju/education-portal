
SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `delta_admin_config`;
CREATE TABLE `delta_admin_config` (
  `sl_no` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `delta_admin_config` (`sl_no`, `email`, `password`, `name`, `status`) VALUES
(1,	'test@test.com',	'$2y$12$0mooyi67pEujpzfgyDHRXeGI05hBUicTNkH5uz/UqGRErDpaMxJQy',	'test@test.com',	1);

DROP TABLE IF EXISTS `issue_tracker`;
CREATE TABLE `issue_tracker` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `issue_type` varchar(10) NOT NULL DEFAULT 'Technical',
  `issue_username` varchar(10) NOT NULL,
  `issue_title` varchar(30) NOT NULL,
  `issue_statement` varchar(255) NOT NULL,
  `issue_date` date DEFAULT NULL,
  `issue_status` int(2) NOT NULL DEFAULT 1 COMMENT '1:Issue Raised 0:Fixed',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `issue_tracker` (`id`, `issue_type`, `issue_username`, `issue_title`, `issue_statement`, `issue_date`, `issue_status`) VALUES
(1,	'Technical',	'Tibin',	'Unable to Login',	'I am unable to login to the site',	'2020-07-29',	0),
(2,	'Technical',	'Test',	'Unable to Change Password',	'I am unable to Change Password',	'2020-07-29',	0),
(9,	'Technical',	'Test',	'Test',	'Test',	NULL,	1),
(10,	'Technical',	'Testtyyt',	'Testtyyt',	'Testtyyt',	NULL,	1),
(11,	'Technical',	'Test',	'Unable to Change Password',	'I am unable to login to the site',	NULL,	0),
(13,	'Technical',	'Test',	'Unable to Change Password',	'I am unable to login to the site',	NULL,	0),
(14,	'Technical',	'Test',	'ccc',	'ccc',	NULL,	1),
(17,	'Technical',	'Test',	'Unable to Change Password',	'I am unable to login to the site',	NULL,	1),
(18,	'Technical',	'Test',	'Unable to Change Password',	'I am unable to login to the site',	NULL,	1),
(19,	'Technical',	'Test',	'Unable to Change Password',	'I am unable to login to the site',	NULL,	0),
(20,	'Technical',	'Test',	'Unable to Change Password',	'I am unable to login to the site',	NULL,	1),
(21,	'Technical',	'Test',	'Unable to Change Password',	'I am unable to login to the site',	NULL,	1),
(22,	'Technical',	'Test',	'Unable to Change Password',	'I am unable to login to the site',	NULL,	1),
(24,	'Technical',	'Test',	'test',	'test',	NULL,	1);

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `teacher` text NOT NULL,
  `teacher_id` text NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `subjects` (`id`, `name`, `description`, `teacher`, `teacher_id`, `last_updated`, `updated_by`, `status`) VALUES
(59,	'test',	'test',	'hoxver ( CSE )',	'13',	'2020-07-28 23:17:56',	'13',	1),
(60,	'test ',	'test&quot;',	'hoxver ( CSE )',	'13',	'2020-07-29 15:52:00',	'39',	1),
(61,	'test',	'test',	'hoxver ( CSE )',	'13',	'2020-07-28 23:17:59',	'13',	1);

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `who` varchar(255) NOT NULL,
  `department` varchar(225) NOT NULL,
  `phone` text DEFAULT 'Phone Number Not Set',
  `email` varchar(255) NOT NULL,
  `ban_status` int(11) NOT NULL DEFAULT 0,
  `profile_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pass_hash` varchar(255) CHARACTER SET utf8 NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) unsigned NOT NULL DEFAULT 1,
  `comments` varchar(255) NOT NULL,
  `cookie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `who`, `department`, `phone`, `email`, `ban_status`, `profile_url`, `pass_hash`, `last_updated`, `status`, `comments`, `cookie`) VALUES
(15,	'zxca',	'teacher',	'CSE',	'Phone Number Not Set',	'zxca',	1,	'',	'5fa72358f0b4fb4f2c5d7de8c9a41846',	'2020-07-29 14:37:01',	1,	'',	''),
(16,	'asd   ',	'teacher',	'test',	'Phone Number Not Set',	'asd',	0,	'',	'7815696ecbf1c96e6894b779456d330e',	'2020-07-29 14:37:21',	1,	'',	''),
(18,	'iooio',	'teacher',	'CSE',	'Phone Number Not Set',	'awa',	0,	'',	'7815696ecbf1c96e6894b779456d330e',	'2020-07-29 14:37:21',	1,	'',	''),
(20,	'athul1',	'student',	'CSE',	'Phone Number Not Set',	'u645',	1,	'',	'202cb962ac59075b964b07152d234b70',	'2020-07-30 06:26:43',	1,	'',	''),
(28,	'zxcaa',	'teacher',	'CSE',	'Phone Number Not Set',	'zxcaa',	0,	'atest',	'99d8d29b2654eac87442dc484c1254cd',	'2020-07-29 14:37:21',	1,	'0',	''),
(29,	'xxxxx',	'teacher',	'CSE',	'Phone Number Not Set',	'xxxxx',	0,	'',	'fb0e22c79ac75679e9881e6ba183b354',	'2020-07-29 14:37:21',	1,	'',	''),
(30,	'vv',	'admin',	'CSE',	'Phone Number Not Set',	'vv',	0,	NULL,	'c4055e3a20b6b3af3d10590ea446ef6c',	'2020-07-30 06:13:50',	1,	'',	''),
(35,	'ghj',	'',	'CSE',	'Phone Number Not Set',	'ghj',	0,	NULL,	'$2y$10$cjZFXQESJRam9pIz4.AqPuLijAAxoWEGmiRh2vIYPnTJlkBSWzqNO',	'2020-07-29 14:37:21',	1,	'',	''),
(36,	'ghj1',	'',	'CSE',	'Phone Number Not Set',	'ghj1',	0,	NULL,	'$2y$10$JKS9L0jxoexXJ9a02fs9C.vuu7z3Cg40iOwscVypBCM1uqdw4PL22',	'2020-07-29 14:37:21',	1,	'',	''),
(37,	'1',	'',	'CSE',	'Phone Number Not Set',	'1',	0,	NULL,	'$2y$10$tjuRM0USkN1qq2QtsWWmfO4xdMgP7JtUNyG5dhwJFZTsYTERRhjXa',	'2020-07-29 14:37:21',	1,	'',	''),
(39,	'v',	'coadmin',	'CSE',	'Phone Number Not Set',	'v',	0,	NULL,	'$2y$10$qIWmmiG5SkdFbHhj1q8nB.rGBZpBqHbQ957PlnAFTP8Sb/sj./S7W',	'2020-07-29 14:37:21',	1,	'',	''),
(40,	'123test',	'teacher',	'CSE',	'+91 123456789',	'test@test.com',	0,	'401596131269.png',	'$2y$10$EebKz2lGeEBBW/fSOTZxMOWY2d/8k5fcOsjvEauT3XhhUQYbMNrzW',	'2020-07-30 17:47:48',	1,	'',	''),
(41,	'123test',	'teacher',	'CSE',	'+91 123456789',	'test@test.com',	0,	'411596134529.png',	'$2y$10$G.bT./N3NIjZydbDo9m8v.zXy.q5DT/yokI8IW2Rg1ZE2kBNn.j1q',	'2020-07-30 18:42:12',	1,	'',	'');

-- 2020-07-30 18:46:44
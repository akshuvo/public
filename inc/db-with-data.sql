-- Adminer 4.8.1 MySQL 8.0.16 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `DonationMetaData`;
CREATE TABLE `DonationMetaData` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `donation_id` bigint(20) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `DonationRequests`;
CREATE TABLE `DonationRequests` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(128) NOT NULL,
  `donation_id` int(112) NOT NULL,
  `user_id` int(112) DEFAULT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `DonationRequests_fk1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `DonationRequests` (`id`, `full_name`, `email`, `phone`, `donation_id`, `user_id`, `comment`, `date`) VALUES
(1,	'korafojuny@mailinator.com',	'semok@mailinator.com',	'+1 (962) 352-4511',	21,	15,	'In error deserunt al',	'2022-06-30 10:46:52'),
(2,	'ruje@mailinator.com',	'bepinoz@mailinator.com',	'+1 (418) 891-9685',	21,	15,	'Voluptatem excepturi',	'2022-06-30 10:47:02'),
(3,	'guvinixu@mailinator.com',	'zixitoxa@mailinator.com',	'+1 (581) 263-7824',	21,	0,	'Beatae maiores quia',	'2022-06-30 10:47:30'),
(4,	'buvelo@mailinator.com',	'xuluzu@mailinator.com',	'+1 (437) 921-6952',	21,	15,	'Ex odit pariatur Qu',	'2022-06-30 10:50:44'),
(5,	'buvelo@mailinator.com',	'xuluzu@mailinator.com',	'+1 (437) 921-6952',	21,	15,	'Ex odit pariatur Qu',	'2022-06-30 10:50:48'),
(6,	'jynapyh@mailinator.com',	'duqot@mailinator.com',	'+1 (754) 934-8472',	21,	15,	'Error blanditiis exp',	'2022-06-30 10:53:02'),
(7,	'dsd',	'asfads@gmail.com',	'01770-544376',	21,	15,	'',	'2022-06-30 11:16:57'),
(8,	'Md Akhtarujjaman Shuvo',	'aktarujjman@gmail.com',	'01770544376',	21,	15,	'Test',	'2022-06-30 11:58:14'),
(9,	'Md Akhtarujjaman Shuvo',	'aktarujjman@gmail.com',	'01770544376',	53,	15,	'Test',	'2022-07-01 00:02:36');

DROP TABLE IF EXISTS `Donations`;
CREATE TABLE `Donations` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `type` varchar(128) NOT NULL,
  `qty` int(11) NOT NULL,
  `contents` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `location` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `user_id` int(128) NOT NULL,
  `images` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Donations` (`id`, `title`, `type`, `qty`, `contents`, `status`, `is_active`, `location`, `country`, `state`, `latitude`, `longitude`, `user_id`, `images`, `dated`) VALUES
(19,	'I can donate a raincoat',	'Raincoat',	1,	'&lt;div&gt;\r\n&lt;h2&gt;What is Lorem Ipsum?&lt;/h2&gt;\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;div&gt;&amp;nbsp;&lt;/div&gt;',	1,	0,	'Dhaka',	'Bangladesh',	'Dhaka',	'24.1640469',	'90.4283223',	15,	'187',	'2022-07-05 12:32:49'),
(20,	'Please take my coat',	'Coat',	1,	'&lt;div&gt;\r\n&lt;h2&gt;What is Lorem Ipsum?&lt;/h2&gt;\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;div&gt;\r\n&lt;h2&gt;Why do we use it?&lt;/h2&gt;\r\n&lt;p&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;h2&gt;Where does it come from?&lt;/h2&gt;\r\n&lt;p&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/p&gt;\r\n&lt;p&gt;The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.&lt;/p&gt;\r\n&lt;/div&gt;',	1,	0,	'Dhaka',	'Bangladesh',	'Dhaka',	'23.7340469',	'90.4283223',	15,	'186',	'2022-07-05 12:31:59'),
(21,	'I have a Jacket to donate',	'Jacket',	1,	'&lt;div&gt;\r\n&lt;h2&gt;What is Lorem Ipsum?&lt;/h2&gt;\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;div&gt;\r\n&lt;h2&gt;Why do we use it?&lt;/h2&gt;\r\n&lt;p&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;h2&gt;Where does it come from?&lt;/h2&gt;\r\n&lt;p&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/p&gt;\r\n&lt;p&gt;The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.&lt;/p&gt;\r\n&lt;/div&gt;',	1,	0,	'Dhaka',	'Bangladesh',	'Dhaka',	'23.7640469',	'90.1283223',	15,	'185',	'2022-07-05 12:30:51'),
(23,	'I have a pant to donate',	'Pant',	1,	'&lt;div&gt;\r\n&lt;h2&gt;What is Lorem Ipsum?&lt;/h2&gt;\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;div&gt;&amp;nbsp;&lt;/div&gt;',	1,	0,	'Dhaka',	'Bangladesh',	'Dhaka',	'23.7640469',	'90.2283223',	15,	'184',	'2022-07-05 12:27:14'),
(53,	'A shirt available in Banasree',	'Shirt',	1,	'&lt;h1&gt;fdsfs&lt;/h1&gt;\r\n&lt;p&gt;sfds&lt;/p&gt;\r\n&lt;p&gt;sfds&lt;/p&gt;\r\n&lt;p&gt;sdf&lt;/p&gt;\r\n&lt;p&gt;sfs&lt;/p&gt;\r\n&lt;p&gt;sdfs&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;',	1,	0,	'',	'Bangladesh',	'Rangpur Division',	'26.02740306306014',	'88.46411717354128',	15,	'182',	'2022-07-05 12:23:58'),
(54,	'Want to give a Soyetar',	'Sweater',	1,	'&lt;p&gt;I have on soyetar which I want to give. Please contact&lt;/p&gt;',	1,	0,	'2FH7+328, Shahid Mohammad Ali Rd, Thakurgaon 5100, Bangladesh',	'Bangladesh',	'Rangpur Division',	'26.02759587817068',	'88.46281898437807',	15,	'183',	'2022-07-05 12:26:01');

DROP TABLE IF EXISTS `Media`;
CREATE TABLE `Media` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Media` (`id`, `url`, `type`) VALUES
(7,	'uploads/Isolated_black_t-shirt_front.jpg',	'donation'),
(8,	'uploads/Isolated_white_t-shirt_front.jpg',	'donation'),
(9,	'uploads/Black_T_Shirt_Model_Front_View_Mockup.jpg',	'donation'),
(10,	'uploads/Isolated_black_t-shirt_front.jpg',	'donation'),
(11,	'uploads/Isolated_white_t-shirt_front.jpg',	'donation'),
(12,	'uploads/Black_T_Shirt_Model_Front_View_Mockup.jpg',	'donation'),
(13,	'uploads/Isolated_black_t-shirt_front.jpg',	'donation'),
(14,	'uploads/Isolated_white_t-shirt_front.jpg',	'donation'),
(15,	'uploads/Black_T_Shirt_Model_Front_View_Mockup.jpg',	'donation'),
(16,	'uploads/Isolated_black_t-shirt_front.jpg',	'donation'),
(17,	'uploads/Isolated_white_t-shirt_front.jpg',	'donation'),
(18,	'uploads/Black_T_Shirt_Model_Front_View_Mockup.jpg',	'donation'),
(19,	'uploads/Isolated_black_t-shirt_front.jpg',	'donation'),
(20,	'uploads/Isolated_white_t-shirt_front.jpg',	'donation'),
(21,	'uploads/Black_T_Shirt_Model_Front_View_Mockup.jpg',	'donation'),
(22,	'uploads/Isolated_black_t-shirt_front.jpg',	'donation'),
(23,	'uploads/Isolated_white_t-shirt_front.jpg',	'donation'),
(24,	'uploads/Black_T_Shirt_Model_Front_View_Mockup.jpg',	'donation'),
(25,	'uploads/Isolated_black_t-shirt_front.jpg',	'donation'),
(26,	'uploads/Isolated_white_t-shirt_front.jpg',	'donation'),
(27,	'uploads/Black_T_Shirt_Model_Front_View_Mockup.jpg',	'donation'),
(28,	'uploads/img-2.png',	'donation'),
(29,	'uploads/img02.png',	'donation'),
(30,	'uploads/img03.png',	'donation'),
(31,	'uploads/img-2.png',	'donation'),
(32,	'uploads/img02.png',	'donation'),
(33,	'uploads/img03.png',	'donation'),
(34,	'uploads/img-2.png',	'donation'),
(35,	'uploads/img02.png',	'donation'),
(36,	'uploads/img03.png',	'donation'),
(37,	'uploads/img-2.png',	'donation'),
(38,	'uploads/img02.png',	'donation'),
(39,	'uploads/img03.png',	'donation'),
(40,	'uploads/img-2.png',	'donation'),
(41,	'uploads/img02.png',	'donation'),
(42,	'uploads/img03.png',	'donation'),
(43,	'uploads/img-2.png',	'donation'),
(44,	'uploads/img02.png',	'donation'),
(45,	'uploads/img03.png',	'donation'),
(46,	'uploads/img-2.png',	'donation'),
(47,	'uploads/img02.png',	'donation'),
(48,	'uploads/img03.png',	'donation'),
(49,	'uploads/img-2.png',	'donation'),
(50,	'uploads/img02.png',	'donation'),
(51,	'uploads/img03.png',	'donation'),
(52,	'uploads/img-2.png',	'donation'),
(53,	'uploads/img02.png',	'donation'),
(54,	'uploads/img03.png',	'donation'),
(55,	'uploads/img-2.png',	'donation'),
(56,	'uploads/img02.png',	'donation'),
(57,	'uploads/img03.png',	'donation'),
(58,	'uploads/1648729607-img-2.png',	'donation'),
(59,	'uploads/1648729607-img02.png',	'donation'),
(60,	'uploads/1648729607-img03.png',	'donation'),
(61,	'uploads/1648729766-img-2.png',	'donation'),
(62,	'uploads/1648729766-img02.png',	'donation'),
(63,	'uploads/1648729766-img03.png',	'donation'),
(64,	'uploads/1648730179-img-2.png',	'donation'),
(65,	'uploads/1648730179-img02.png',	'donation'),
(66,	'uploads/1648730179-img03.png',	'donation'),
(67,	'uploads/1648730214-img-2.png',	'donation'),
(68,	'uploads/1648730214-img02.png',	'donation'),
(69,	'uploads/1648730214-img03.png',	'donation'),
(70,	'uploads/img-2.png',	'donation'),
(71,	'uploads/img02.png',	'donation'),
(72,	'uploads/img03.png',	'donation'),
(73,	'uploads/img-2.png',	'donation'),
(74,	'uploads/img02.png',	'donation'),
(75,	'uploads/img03.png',	'donation'),
(76,	'uploads/ils_20.svg',	'donation'),
(77,	'uploads/1648789784-img-2.png',	'donation'),
(78,	'uploads/1648789784-img02.png',	'donation'),
(79,	'uploads/1648789784-img03.png',	'donation'),
(80,	'uploads/1648789871-ils_20.svg',	'donation'),
(81,	'uploads/1648789871-img-2.png',	'donation'),
(82,	'uploads/1648789871-img02.png',	'donation'),
(83,	'uploads/1648789871-img03.png',	'donation'),
(84,	'uploads/1648789907-ils_20.svg',	'donation'),
(85,	'uploads/1648789907-img-2.png',	'donation'),
(86,	'uploads/1648789907-img02.png',	'donation'),
(87,	'uploads/1648789907-img03.png',	'donation'),
(88,	'uploads/1648789938-ils_20.svg',	'donation'),
(89,	'uploads/1648789938-img-2.png',	'donation'),
(90,	'uploads/1648789938-img02.png',	'donation'),
(91,	'uploads/1648789938-img03.png',	'donation'),
(92,	'uploads/1648790210-ils_20.svg',	'donation'),
(93,	'uploads/1648790210-img-2.png',	'donation'),
(94,	'uploads/1648790210-img02.png',	'donation'),
(95,	'uploads/1648790210-img03.png',	'donation'),
(96,	'uploads/1648790653-ils_20.svg',	'donation'),
(97,	'uploads/1648790653-img-2.png',	'donation'),
(98,	'uploads/1648790653-img02.png',	'donation'),
(99,	'uploads/1648790653-img03.png',	'donation'),
(100,	'uploads/1648790808-ils_20.svg',	'donation'),
(101,	'uploads/1648790808-img-2.png',	'donation'),
(102,	'uploads/1648790808-img02.png',	'donation'),
(103,	'uploads/1648790808-img03.png',	'donation'),
(104,	'uploads/1648790946-ils_20.svg',	'donation'),
(105,	'uploads/1648790946-img-2.png',	'donation'),
(106,	'uploads/1648790946-img02.png',	'donation'),
(107,	'uploads/1648790946-img03.png',	'donation'),
(108,	'uploads/1648790968-ils_20.svg',	'donation'),
(109,	'uploads/1648790968-img-2.png',	'donation'),
(110,	'uploads/1648790968-img02.png',	'donation'),
(111,	'uploads/1648790968-img03.png',	'donation'),
(112,	'uploads/1648791040-ils_20.svg',	'donation'),
(113,	'uploads/1648791040-img-2.png',	'donation'),
(114,	'uploads/1648791040-img02.png',	'donation'),
(115,	'uploads/1648791040-img03.png',	'donation'),
(116,	'uploads/1648791125-ils_20.svg',	'donation'),
(117,	'uploads/1648791125-img-2.png',	'donation'),
(118,	'uploads/1648791125-img02.png',	'donation'),
(119,	'uploads/1648791125-img03.png',	'donation'),
(120,	'uploads/1648791191-ils_20.svg',	'donation'),
(121,	'uploads/1648791191-img-2.png',	'donation'),
(122,	'uploads/1648791191-img02.png',	'donation'),
(123,	'uploads/1648791191-img03.png',	'donation'),
(124,	'uploads/1648791209-ils_20.svg',	'donation'),
(125,	'uploads/1648791209-img-2.png',	'donation'),
(126,	'uploads/1648791209-img02.png',	'donation'),
(127,	'uploads/1648791209-img03.png',	'donation'),
(128,	'uploads/1648791285-ils_20.svg',	'donation'),
(129,	'uploads/1648791285-img-2.png',	'donation'),
(130,	'uploads/1648791285-img02.png',	'donation'),
(131,	'uploads/1648791285-img03.png',	'donation'),
(132,	'uploads/1648792251-ils_20.svg',	'donation'),
(133,	'uploads/1648792251-img-2.png',	'donation'),
(134,	'uploads/1648792251-img02.png',	'donation'),
(135,	'uploads/1648792251-img03.png',	'donation'),
(136,	'uploads/1648792253-ils_20.svg',	'donation'),
(137,	'uploads/1648792253-img-2.png',	'donation'),
(138,	'uploads/1648792253-img02.png',	'donation'),
(139,	'uploads/1648792253-img03.png',	'donation'),
(140,	'uploads/avatar.jpeg',	'donation'),
(141,	'uploads/ff.jpg',	'donation'),
(142,	'uploads/1650324962-ff.jpg',	'donation'),
(143,	'uploads/1650325015-ff.jpg',	'donation'),
(144,	'uploads/9088.png',	'donation'),
(145,	'uploads/Screenshot 2022-06-28 at 4.14.21 PM.png',	'donation'),
(146,	'uploads/MEDBRO.jpeg',	'donation'),
(147,	'uploads/1657021125-MEDBRO.jpeg',	'donation'),
(148,	'uploads/1657022001-MEDBRO.jpeg',	'donation'),
(149,	'uploads/All Diagrams - Schema.png',	'donation'),
(150,	'uploads/1657022221-MEDBRO.jpeg',	'donation'),
(151,	'uploads/1657022290-All Diagrams - Schema.png',	'donation'),
(152,	'uploads/1657022290-MEDBRO.jpeg',	'donation'),
(153,	'uploads/1657022336-All Diagrams - Schema.png',	'donation'),
(154,	'uploads/1657022336-MEDBRO.jpeg',	'donation'),
(155,	'uploads/1657022430-All Diagrams - Schema.png',	'donation'),
(156,	'uploads/1657022430-MEDBRO.jpeg',	'donation'),
(157,	'uploads/1657022781-All Diagrams - Schema.png',	'donation'),
(158,	'uploads/1657022781-MEDBRO.jpeg',	'donation'),
(159,	'uploads/1657022886-All Diagrams - Schema.png',	'donation'),
(160,	'uploads/1657022886-MEDBRO.jpeg',	'donation'),
(161,	'uploads/1657022899-All Diagrams - Schema.png',	'donation'),
(162,	'uploads/1657022899-MEDBRO.jpeg',	'donation'),
(163,	'uploads/1657023079-All Diagrams - Schema.png',	'donation'),
(164,	'uploads/1657023079-MEDBRO.jpeg',	'donation'),
(165,	'uploads/1657023103-All Diagrams - Schema.png',	'donation'),
(166,	'uploads/1657023103-MEDBRO.jpeg',	'donation'),
(167,	'uploads/1657023122-All Diagrams - Schema.png',	'donation'),
(168,	'uploads/1657023122-MEDBRO.jpeg',	'donation'),
(169,	'uploads/1657023167-All Diagrams - Schema.png',	'donation'),
(170,	'uploads/1657023167-MEDBRO.jpeg',	'donation'),
(171,	'uploads/1657023188-All Diagrams - Schema.png',	'donation'),
(172,	'uploads/1657023188-MEDBRO.jpeg',	'donation'),
(173,	'uploads/1657023241-All Diagrams - Schema.png',	'donation'),
(174,	'uploads/1657023241-MEDBRO.jpeg',	'donation'),
(175,	'uploads/1657023274-All Diagrams - Schema.png',	'donation'),
(176,	'uploads/1657023274-MEDBRO.jpeg',	'donation'),
(177,	'uploads/1657023301-All Diagrams - Schema.png',	'donation'),
(178,	'uploads/1657023301-MEDBRO.jpeg',	'donation'),
(179,	'uploads/1657023432-MEDBRO.jpeg',	'donation'),
(180,	'uploads/1657023434-MEDBRO.jpeg',	'donation'),
(181,	'uploads/1657023611-MEDBRO.jpeg',	'donation'),
(182,	'uploads/shirt.png',	'donation'),
(183,	'uploads/sweater.png',	'donation'),
(184,	'uploads/1657024034-MEDBRO.jpeg',	'donation'),
(185,	'uploads/jacket.png',	'donation'),
(186,	'uploads/coat.png',	'donation'),
(187,	'uploads/raincoat.jpeg',	'donation');

DROP TABLE IF EXISTS `Options`;
CREATE TABLE `Options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Options` (`id`, `name`, `value`) VALUES
(1,	'siteurl',	'https://helpingwall.local');

DROP TABLE IF EXISTS `UserMetaData`;
CREATE TABLE `UserMetaData` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `full_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `lat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `long` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `user_role` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `dated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Users` (`id`, `full_name`, `email`, `password`, `phone`, `full_address`, `country`, `state`, `lat`, `long`, `user_role`, `dated`) VALUES
(15,	'Md Akhtarujjaman Shuvo',	'aktarujjman@gmail.com',	'3691308f2a4c2f6983f2880d32e29c84',	'01770544376',	'Thakurgaon, Kaharpara -5100',	'Bangladesh',	'Rangpur Division',	NULL,	NULL,	'admin',	'2022-04-01 11:52:32'),
(31,	'Rinki Khanam',	'rinkikhanam404@gmail.com',	'c74708cf996bbcf7e64557180060f65b',	'01723169433',	'Rampura, Dhaka',	'Bangladesh',	'Rangpur Division',	'0',	'0',	'user',	'2022-07-01 00:09:59');

-- 2022-07-05 12:33:43
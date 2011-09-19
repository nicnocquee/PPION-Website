-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2011 at 12:34 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ppion`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_idx` (`post_id`),
  KEY `comments_user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` VALUES(1, 20, 4, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec suscipit auctor mi vel volutpat. Nam suscipit lacus nisl. Suspendisse sagittis dui a felis pulvinar pretium interdum neque bibendum. Fusce varius vehicula auctor. Fusce mollis tincidunt leo, ullamcorper placerat lacus ultrices a. Vestibulum tincidunt varius augue vitae luctus. Aenean pretium vulputate massa non elementum. Donec cursus lacus ac arcu condimentum posuere quis vitae nisl. Nulla vulputate nisl at enim tincidunt eget molestie arcu convallis. Quisque sed ante in arcu ullamcorper consectetur vel vel libero. Nullam eget purus eu purus pretium fermentum id nec arcu. Maecenas tincidunt, ante varius auctor pretium, nisl tortor ultricies nulla, et viverra nisl nibh sit amet mi. Sed metus arcu, consectetur non sodales et, aliquet in ante. Nam luctus, purus non blandit posuere, velit mi viverra ipsum, id posuere est mauris ac est. Ut arcu lorem, elementum nec blandit sed, ultrices vel elit. Nu', '2011-09-17 21:39:33', NULL);
INSERT INTO `comments` VALUES(2, 20, 10, 'I agree!', '2011-09-17 21:39:33', NULL);
INSERT INTO `comments` VALUES(3, 19, 2, 'wowww!', '2011-09-17 21:40:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `type` varchar(64) NOT NULL,
  `visibility` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` VALUES(1, 1, '09017178823', 'phone', 0, '2011-08-05 18:52:38', NULL);
INSERT INTO `contacts` VALUES(2, 1, 'hirose mansion', 'address', 0, '2011-08-05 18:52:38', NULL);
INSERT INTO `contacts` VALUES(3, 10, 'hello', '0', 0, '2011-08-06 09:47:57', NULL);
INSERT INTO `contacts` VALUES(4, 10, 'pass', '3', 0, '2011-08-06 09:47:57', NULL);
INSERT INTO `contacts` VALUES(5, 11, '09017179924', '0', 0, '2011-08-06 09:49:47', NULL);
INSERT INTO `contacts` VALUES(6, 11, 'nicnocquee', '5', 0, '2011-08-06 09:49:47', NULL);
INSERT INTO `contacts` VALUES(7, 12, '09017179924', '0', 0, '2011-08-11 22:34:49', NULL);
INSERT INTO `contacts` VALUES(8, 12, 'nicnocquee', '5', 0, '2011-08-11 22:34:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eventmembers`
--

CREATE TABLE `eventmembers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `position` varchar(200) NOT NULL,
  `responsibility` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eventmembers_event_id_idx` (`event_id`),
  KEY `eventmembers_user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `eventmembers`
--

INSERT INTO `eventmembers` VALUES(1, 1, 1, 'leader', 'lead', '2011-08-05 18:52:38', NULL);
INSERT INTO `eventmembers` VALUES(2, 1, 2, 'transportation', 'taking care of cars', '2011-08-05 18:52:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `place` varchar(200) NOT NULL,
  `deadline` datetime NOT NULL,
  `cost` int(11) DEFAULT NULL,
  `timeStart` datetime NOT NULL,
  `timeEnd` datetime NOT NULL,
  `limitation` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` VALUES(1, 1, 'Hanami', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pulvinar augue ultrices ante ornare dictum. Aenean id lectus quam. Sed feugiat nibh quis nibh eleifend id accumsan felis consequat. Aenean suscipit imperdiet tortor, nec cursus justo imperdiet nec. Phasellus id lacus ligula, at sollicitudin odio. Proin facilisis, velit a malesuada sagittis, eros lorem lacinia orci, laoreet blandit enim mauris et orci. Curabitur ac nulla fringilla libero accumsan ultricies. Cras ultrices euismod luctus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In urna eros, ullamcorper at malesuada at, luctus et ipsum. Nam id ante vitae odio lobortis elementum a id justo. Ut sapien ante, scelerisque in ultrices at, lobortis quis risus. Proin pulvinar odio id ante euismod blandit faucibus sed massa.  Proin commodo, nibh aliquet eleifend tristique, lacus leo porta nunc, ac ullamcorper justo mi non tellus. Vivamus consequat sagittis nisl. Nunc eget malesuada leo. Integer vulputate eleifend ', 'Osaka Castle', '2011-08-21 00:00:00', 3000, '2011-09-01 00:00:00', '2011-09-01 00:00:00', '', '2011-08-05 18:52:38', NULL);
INSERT INTO `events` VALUES(2, 1, 'New year', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pulvinar augue ultrices ante ornare dictum. Aenean id lectus quam. Sed feugiat nibh quis nibh eleifend id accumsan felis consequat. Aenean suscipit imperdiet tortor, nec cursus justo imperdiet nec. Phasellus id lacus ligula, at sollicitudin odio. Proin facilisis, velit a malesuada sagittis, eros lorem lacinia orci, laoreet blandit enim mauris et orci. Curabitur ac nulla fringilla libero accumsan ultricies. Cras ultrices euismod luctus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In urna eros, ullamcorper at malesuada at, luctus et ipsum. Nam id ante vitae odio lobortis elementum a id justo. Ut sapien ante, scelerisque in ultrices at, lobortis quis risus. Proin pulvinar odio id ante euismod blandit faucibus sed massa.  Proin commodo, nibh aliquet eleifend tristique, lacus leo porta nunc, ac ullamcorper justo mi non tellus. Vivamus consequat sagittis nisl. Nunc eget malesuada leo. Integer vulputate eleifend ', 'Onohara', '2011-12-21 00:00:00', 3000, '2011-12-31 00:00:00', '2012-01-01 00:00:00', 'Single only', '2011-08-05 18:52:38', NULL);
INSERT INTO `events` VALUES(3, 1, 'Ngabuburit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pulvinar augue ultrices ante ornare dictum. Aenean id lectus quam. Sed feugiat nibh quis nibh eleifend id accumsan felis consequat. Aenean suscipit imperdiet tortor, nec cursus justo imperdiet nec. Phasellus id lacus ligula, at sollicitudin odio. Proin facilisis, velit a malesuada sagittis, eros lorem lacinia orci, laoreet blandit enim mauris et orci. Curabitur ac nulla fringilla libero accumsan ultricies. Cras ultrices euismod luctus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In urna eros, ullamcorper at malesuada at, luctus et ipsum. Nam id ante vitae odio lobortis elementum a id justo. Ut sapien ante, scelerisque in ultrices at, lobortis quis risus. Proin pulvinar odio id ante euismod blandit faucibus sed massa.  Proin commodo, nibh aliquet eleifend tristique, lacus leo porta nunc, ac ullamcorper justo mi non tellus. Vivamus consequat sagittis nisl. Nunc eget malesuada leo. Integer vulputate eleifend ', 'Onohara', '2010-09-22 00:00:00', 1000, '2010-03-21 14:30:00', '2001-01-03 11:20:00', '', '2011-08-10 23:17:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events_tags`
--

CREATE TABLE `events_tags` (
  `event_id` int(11) NOT NULL,
  `eventtag_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`,`eventtag_id`),
  KEY `events_tags_event_id_idx` (`event_id`),
  KEY `events_tags_eventtag_id_idx` (`eventtag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_tags`
--

INSERT INTO `events_tags` VALUES(1, 1);
INSERT INTO `events_tags` VALUES(1, 2);
INSERT INTO `events_tags` VALUES(1, 3);
INSERT INTO `events_tags` VALUES(3, 4);
INSERT INTO `events_tags` VALUES(3, 5);
INSERT INTO `events_tags` VALUES(3, 6);
INSERT INTO `events_tags` VALUES(3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `eventtags`
--

CREATE TABLE `eventtags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `eventtags`
--

INSERT INTO `eventtags` VALUES(1, 'hanami', '2011-08-05 18:52:38', NULL);
INSERT INTO `eventtags` VALUES(2, 'summer', '2011-08-05 18:52:38', NULL);
INSERT INTO `eventtags` VALUES(3, 'sakura', '2011-08-05 18:52:38', NULL);
INSERT INTO `eventtags` VALUES(4, 'ngabuburit', '2011-08-10 23:11:20', NULL);
INSERT INTO `eventtags` VALUES(5, 'puasa', '2011-08-10 23:11:20', NULL);
INSERT INTO `eventtags` VALUES(6, 'ramadhan', '2011-08-10 23:11:20', NULL);
INSERT INTO `eventtags` VALUES(7, 'japan', '2011-08-10 23:11:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expertises`
--

CREATE TABLE `expertises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expertises_user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `expertises`
--

INSERT INTO `expertises` VALUES(1, 1, 'biology', '2011-08-05 18:52:38', NULL);
INSERT INTO `expertises` VALUES(2, 1, 'math', '2011-08-05 18:52:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `member` int(11) NOT NULL,
  `relationship` varchar(64) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `family_user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `family`
--

INSERT INTO `family` VALUES(1, 1, 2, 'son', 1, '2011-08-05 18:52:38', NULL);
INSERT INTO `family` VALUES(2, 1, 3, 'daughter', 1, '2011-08-05 18:52:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `post` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `likes_user_idx` (`user`),
  KEY `likes_post_idx` (`post`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `likes`
--


-- --------------------------------------------------------

--
-- Table structure for table `perm_data`
--

CREATE TABLE `perm_data` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `permKey` varchar(30) NOT NULL,
  `permName` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permKey` (`permKey`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `perm_data`
--


-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `url` varchar(200) NOT NULL,
  `direction` varchar(20) NOT NULL,
  `profile` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photos_user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` VALUES(1, 1, 'http://something.jpg', 'left', 0, '2011-08-05 18:52:38', NULL);
INSERT INTO `photos` VALUES(2, 1, 'http://something2.jpg', 'right', 1, '2011-08-05 18:52:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `flag` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_idx` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` VALUES(18, 1, 'This is first post', 'Hello world!', NULL, '2011-08-07 12:13:39', NULL);
INSERT INTO `posts` VALUES(19, 1, 'Article 2', 'This is the body of the article 2. This article will be about stuffs.', NULL, '2011-08-07 12:15:17', NULL);
INSERT INTO `posts` VALUES(20, 1, 'Article 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse felis neque, fringilla eget accumsan eu, euismod a felis. Suspendisse potenti. Aenean ac nunc vel dolor laoreet egestas. Donec ultrices, dolor sed ullamcorper suscipit, sem eros sagittis odio, quis pellentesque risus felis quis turpis. Aliquam nec turpis vel libero dictum fermentum. Vestibulum scelerisque, orci in eleifend varius, nunc diam tincidunt diam, sit amet feugiat dolor turpis vel metus. Vivamus in eros dui. Praesent sodales dui et tellus pretium ullamcorper. Nulla lectus tortor, commodo et tristique nec, vestibulum id nulla. Quisque vel risus felis. Pellentesque ut urna orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam faucibus tellus nec libero luctus aliquet. Vestibulum dolor sapien, vehicula ac pellentesque a, commodo sed urna.\n\nInteger odio ipsum, semper eu fringilla at, scelerisque sed libero. Suspendisse in nisi et arcu auctor dictum. Integer in risus quis odio venenatis venenatis. Vivamus tincidunt, nunc porttitor tincidunt venenatis, lectus sem gravida turpis, eget sollicitudin ipsum ante sit amet nulla. Phasellus sit amet elit libero, at mattis justo. Integer sit amet quam quis lacus placerat semper vel nec elit. Nam id tellus quis neque consequat lacinia. Aliquam ipsum turpis, adipiscing et lobortis ut, auctor vel nulla. Vivamus erat lacus, malesuada non tempor nec, pellentesque eu ligula. Etiam nec ipsum dui.\n\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec suscipit auctor mi vel volutpat. Nam suscipit lacus nisl. Suspendisse sagittis dui a felis pulvinar pretium interdum neque bibendum. Fusce varius vehicula auctor. Fusce mollis tincidunt leo, ullamcorper placerat lacus ultrices a. Vestibulum tincidunt varius augue vitae luctus. Aenean pretium vulputate massa non elementum. Donec cursus lacus ac arcu condimentum posuere quis vitae nisl. Nulla vulputate nisl at enim tincidunt eget molestie arcu convallis. Quisque sed ante in arcu ullamcorper consectetur vel vel libero. Nullam eget purus eu purus pretium fermentum id nec arcu. Maecenas tincidunt, ante varius auctor pretium, nisl tortor ultricies nulla, et viverra nisl nibh sit amet mi. Sed metus arcu, consectetur non sodales et, aliquet in ante. Nam luctus, purus non blandit posuere, velit mi viverra ipsum, id posuere est mauris ac est. Ut arcu lorem, elementum nec blandit sed, ultrices vel elit. Nullam dapibus auctor ligula non euismod. Aenean interdum mattis dui, et condimentum dui facilisis a. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed luctus, magna non aliquam scelerisque, lacus dolor faucibus orci, ac ultricies lacus mi a eros.\n\nNullam fermentum accumsan diam id porta. Fusce varius egestas libero, ac vehicula quam viverra sit amet. Aliquam quis lacus ac velit tempus tempus. Morbi sagittis facilisis mauris, vel egestas augue ultricies in. Vivamus tempus fringill', NULL, '2011-08-07 12:17:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

CREATE TABLE `posts_tags` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`tag_id`),
  KEY `posts_tags_post_id_idx` (`post_id`),
  KEY `posts_tags_tag_id_idx` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts_tags`
--

INSERT INTO `posts_tags` VALUES(18, 67);
INSERT INTO `posts_tags` VALUES(18, 68);
INSERT INTO `posts_tags` VALUES(18, 69);
INSERT INTO `posts_tags` VALUES(19, 69);
INSERT INTO `posts_tags` VALUES(19, 70);
INSERT INTO `posts_tags` VALUES(19, 71);
INSERT INTO `posts_tags` VALUES(20, 69);
INSERT INTO `posts_tags` VALUES(20, 72);
INSERT INTO `posts_tags` VALUES(20, 73);

-- --------------------------------------------------------

--
-- Table structure for table `role_data`
--

CREATE TABLE `role_data` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `roleName` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roleName` (`roleName`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `role_data`
--

INSERT INTO `role_data` VALUES(5, 'super admin');
INSERT INTO `role_data` VALUES(6, 'admin');
INSERT INTO `role_data` VALUES(7, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `role_perms`
--

CREATE TABLE `role_perms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `roleID` bigint(20) NOT NULL,
  `permID` bigint(20) NOT NULL,
  `value` tinyint(1) NOT NULL DEFAULT '0',
  `addDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roleID_2` (`roleID`,`permID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `role_perms`
--

INSERT INTO `role_perms` VALUES(3, 5, 39, 1, '2011-08-13 23:11:01');
INSERT INTO `role_perms` VALUES(4, 5, 40, 1, '2011-08-13 23:11:01');
INSERT INTO `role_perms` VALUES(8, 6, 40, 0, '2011-08-13 23:51:06');
INSERT INTO `role_perms` VALUES(7, 6, 39, 0, '2011-08-13 23:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `rsvps`
--

CREATE TABLE `rsvps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `answer` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rsvps_event_id_idx` (`event_id`),
  KEY `rsvps_user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rsvps`
--

INSERT INTO `rsvps` VALUES(1, 1, 1, 0, '2011-08-05 18:52:38', NULL);
INSERT INTO `rsvps` VALUES(2, 1, 2, 1, '2011-08-05 18:52:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` VALUES(67, 'hello', '2011-08-07 12:13:39', NULL);
INSERT INTO `tags` VALUES(68, 'world', '2011-08-07 12:13:39', NULL);
INSERT INTO `tags` VALUES(69, 'japan', '2011-08-07 12:13:39', NULL);
INSERT INTO `tags` VALUES(70, 'sakura', '2011-08-07 12:15:17', NULL);
INSERT INTO `tags` VALUES(71, 'summer', '2011-08-07 12:15:17', NULL);
INSERT INTO `tags` VALUES(72, 'lorem', '2011-08-07 12:17:31', NULL);
INSERT INTO `tags` VALUES(73, 'ipsum', '2011-08-07 12:17:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `hometown` varchar(64) NOT NULL,
  `affiliation` varchar(64) NOT NULL,
  `arrival_date` date NOT NULL,
  `birthday` date DEFAULT NULL,
  `marriage_status` tinyint(1) NOT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `introduction` varchar(140) DEFAULT NULL,
  `undergrad_university` varchar(64) NOT NULL,
  `undergrad_department` varchar(64) DEFAULT NULL,
  `undergrad_graduation_year` int(11) DEFAULT NULL,
  `master_university` varchar(64) DEFAULT NULL,
  `master_department` varchar(64) DEFAULT NULL,
  `master_graduation_year` int(11) DEFAULT NULL,
  `phd_university` varchar(64) DEFAULT NULL,
  `phd_department` varchar(64) DEFAULT NULL,
  `phd_graduation_year` int(11) DEFAULT NULL,
  `informal_skill` varchar(64) DEFAULT NULL,
  `left_the_country` tinyint(1) NOT NULL,
  `position` varchar(32) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_uniq` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, '2@ppion.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Dua', 'Bandung', 'Osaka City University', '2008-04-01', '1985-01-21', 1, 'M', 'Islam', 'Lorem ipsum bla bla bla', 'Institut Teknologi Bandung', 'Teknik Elektro', 2006, 'Osaka City University', 'Communication System', 2011, 'Osaka City University', 'Communication System', 2014, 'iOS development', 0, 'Web developer', '2011-08-05 18:52:38', NULL);
INSERT INTO `users` VALUES(2, '3@ppion.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Tiga', 'Bandung', 'Osaka City University', '2008-04-01', '1985-01-21', 1, 'M', 'Islam', 'Lorem ipsum bla bla bla', 'Institut Teknologi Bandung', 'Teknik Elektro', 2006, 'Osaka City University', 'Communication System', 2011, 'Osaka City University', 'Communication System', 2014, 'iOS development', 0, 'Web developer', '2011-08-05 18:52:38', NULL);
INSERT INTO `users` VALUES(3, '4@ppion.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Empat', 'Bandung', 'Osaka City University', '2008-04-01', '1985-01-21', 1, 'M', 'Islam', 'Lorem ipsum bla bla bla', 'Institut Teknologi Bandung', 'Teknik Elektro', 2006, 'Osaka City University', 'Communication System', 2011, 'Osaka City University', 'Communication System', 2014, 'iOS development', 0, 'Web developer', '2011-08-05 18:52:38', NULL);
INSERT INTO `users` VALUES(4, 'nico@flutterscape.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'NicoPrananta', 'Bandung', 'Flutterscape', '2008-04-01', '1985-01-21', 0, '0', 'Islam', 'about.me/nico.prananta', 'Institut Teknologi Bandung', 'Teknik Elektro', 2002, 'Osaka City University', 'Teknik Elektro', 2011, '', '', 0, 'iOS dev and web dev', 0, '', '2011-08-06 01:17:46', NULL);
INSERT INTO `users` VALUES(5, 'nico@com.com', '48cccca3bab2ad18832233ee8dff1b0b', 'Nico Prananta', 'Bandung', 'Flutterscape', '2008-04-01', '1985-01-21', 0, '1', 'Islam', 'bio bio bio', 'Institut Teknologi Bandung', 'Teknik Elektro', 2002, 'Osaka City University', 'Teknik Elektro', 2011, '', '', 0, 'iOS dev and web dev', 1, '', '2011-08-06 01:22:12', NULL);
INSERT INTO `users` VALUES(6, 'nico@com.comm', 'ddbac82a201a23d4737376af67b8e79d', 'Nico Prananta', 'Bandung', 'Flutterscape', '2008-04-01', '1985-01-21', 0, '0', 'Islam', 'bio bio', 'Institut Teknologi Bandung', 'Teknik Elektro', 2002, 'Osaka City University', 'Teknik Elektro', 2011, '', '', 0, 'iOS dev and web dev', 0, '', '2011-08-06 03:34:31', NULL);
INSERT INTO `users` VALUES(7, 'nico@com.commm', '343b1c4a3ea721b2d640fc8700db0f36', 'Nico Prananta', 'Bandung', 'Flutterscape', '2008-04-01', '1985-01-21', 0, '0', 'Islam', 'bio bio', 'Institut Teknologi Bandung', 'Teknik Elektro', 2002, 'Osaka City University', 'Teknik Elektro', 2011, '', '', 0, 'iOS dev and web dev', 0, '', '2011-08-06 04:20:11', NULL);
INSERT INTO `users` VALUES(8, 'nico@com.commmm', 'e10adc3949ba59abbe56e057f20f883e', 'Nico Prananta', 'Bandung', 'Flutterscape', '2008-04-01', '1985-01-21', 0, '0', 'Islam', 'bio bio', 'Institut Teknologi Bandung', 'Teknik Elektro', 2002, 'Osaka City University', 'Teknik Elektro', 2011, 'osaka', '93931', 9931, 'iOS dev and web dev', 0, '', '2011-08-06 04:23:39', NULL);
INSERT INTO `users` VALUES(9, 'nio@com.commmm', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'Nico Prananta', 'Bandung', 'Flutterscape', '2008-04-01', '1985-01-21', 0, '0', 'Islam', 'bhhfs sfgsfgs', 'Institut Teknologi Bandung', 'Teknik Elektro', 2002, 'Osaka City University', 'Teknik Elektro', 2011, 'osaka', '93931', 9931, 'iOS dev and web dev', 0, 'ngga ada', '2011-08-06 04:25:41', NULL);
INSERT INTO `users` VALUES(10, 'nicco@com.commmm', 'e10adc3949ba59abbe56e057f20f883e', 'Nico Prananta', 'Bandung', 'Flutterscape', '2008-04-01', '1985-01-21', 0, '0', 'Islam', 'bio bio', 'Institut Teknologi Bandung', 'Teknik Elektro', 2002, 'Osaka City University', 'Teknik Elektro', 2011, '', '', 0, 'iOS dev and web dev', 0, 'ngga ada', '2011-08-06 09:47:57', NULL);
INSERT INTO `users` VALUES(11, 'niiicco@com.commmm', '343b1c4a3ea721b2d640fc8700db0f36', 'Nico Prananta', 'Bandung', 'Flutterscape', '2008-04-01', '1985-01-21', 0, '0', 'Islam', 'bio bio', 'Institut Teknologi Bandung', 'Teknik Elektro', 2002, 'Osaka City University', 'Teknik Elektro', 2011, '', '', 0, 'iOS dev and web dev', 0, 'ngga ada', '2011-08-06 09:49:46', NULL);
INSERT INTO `users` VALUES(12, 'nico@ppion.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Nico Prananta', 'Bandung', 'Flutterscape', '2008-04-01', '1985-01-21', 0, '0', 'Islam', 'about.me/nico.prananta', 'Institut Teknologi Bandung', 'Teknik Elektro', 2006, 'Osaka City University', 'Teknik Elektro', 2011, '', '', 0, 'iOS dev and web dev', 0, 'Web developer', '2011-08-11 22:34:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_perms`
--

CREATE TABLE `user_perms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userID` bigint(20) NOT NULL,
  `permID` bigint(20) NOT NULL,
  `value` tinyint(1) NOT NULL DEFAULT '0',
  `addDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userID` (`userID`,`permID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_perms`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `userID` bigint(20) NOT NULL,
  `roleID` bigint(20) NOT NULL,
  `addDate` datetime NOT NULL,
  UNIQUE KEY `userID` (`userID`,`roleID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` VALUES(12, 5, '2011-08-13 23:09:54');
INSERT INTO `user_roles` VALUES(4, 7, '2011-08-13 23:51:57');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `eventmembers`
--
ALTER TABLE `eventmembers`
  ADD CONSTRAINT `eventmembers_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `eventmembers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `events_tags`
--
ALTER TABLE `events_tags`
  ADD CONSTRAINT `events_tags_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_tags_ibfk_2` FOREIGN KEY (`eventtag_id`) REFERENCES `eventtags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expertises`
--
ALTER TABLE `expertises`
  ADD CONSTRAINT `expertises_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `family`
--
ALTER TABLE `family`
  ADD CONSTRAINT `family_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post`) REFERENCES `posts` (`id`);

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD CONSTRAINT `posts_tags_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rsvps`
--
ALTER TABLE `rsvps`
  ADD CONSTRAINT `rsvps_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `rsvps_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

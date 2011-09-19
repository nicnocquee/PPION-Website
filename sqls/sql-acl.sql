SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Table structure for table `perm_data`
-- 

CREATE TABLE `perm_data` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `permKey` varchar(30) NOT NULL,
  `permName` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `permKey` (`permKey`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- Table structure for table `role_data`
-- 

CREATE TABLE `role_data` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `roleName` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `roleName` (`roleName`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `role_perms`
-- 

CREATE TABLE `role_perms` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `roleID` bigint(20) NOT NULL,
  `permID` bigint(20) NOT NULL,
  `value` tinyint(1) NOT NULL default '0',
  `addDate` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `roleID_2` (`roleID`,`permID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
-- 

--
-- Table structure for table `user_perms`
-- 

CREATE TABLE `user_perms` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `userID` bigint(20) NOT NULL,
  `permID` bigint(20) NOT NULL,
  `value` tinyint(1) NOT NULL default '0',
  `addDate` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userID` (`userID`,`permID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
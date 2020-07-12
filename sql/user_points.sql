CREATE TABLE `user_points` (
  `uid` int(11) NOT NULL default '0',
  `uname` varchar(25) NOT NULL default '',
  `news` int(11) NOT NULL default '0',
  `smartsection` int(11) NOT NULL default '0',
  `wfsections` int(11) NOT NULL default '0',
  `newbbex` int(11) NOT NULL default '0',
  `newbb` int(11) NOT NULL default '0',
  `smartfaq` int(11) NOT NULL default '0',
  `wordbook` int(11) NOT NULL default '0',
  `xcgal` int(11) NOT NULL default '0',
  `xcgalvote` int(11) NOT NULL default '0',
  `extgallery` int(11) NOT NULL default '0',
  `dloads` int(11) NOT NULL default '0',
  `dloadsvotes` int(11) NOT NULL default '0',
  `wfdloads` int(11) NOT NULL default '0',
  `wfdloadsvotes` int(11) NOT NULL default '0',
  `links` int(11) NOT NULL default '0',
  `linksvotes` int(11) NOT NULL default '0',
  `weblinks` int(11) NOT NULL default '0',
  `weblinksvotes` int(11) NOT NULL default '0',
  `xmovie` int(11) NOT NULL default '0',
  `xmovievotes` int(11) NOT NULL default '0',
  `comments` int(11) NOT NULL default '0',
  `friends` int(11) NOT NULL default '0',
  `bonus` int(11) NOT NULL default '0',
  `points` int(13) NOT NULL default '0',
  PRIMARY KEY  (`uid`)
) TYPE=MyISAM;


CREATE TABLE `user_points_bonus` (
  `id` tinyint(8) unsigned NOT NULL auto_increment,
  `uid` int(11) NOT NULL default '0',
  `bonus` int(11) NOT NULL default '0',
  `comments` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;



CREATE TABLE `user_points_config` (
  `actifnews` int(1) NOT NULL default '0',
  `poinnews` int(4) NOT NULL default '0',
  `actifsmartsection` int(1) NOT NULL default '0',
  `poinsmartsection` int(4) NOT NULL default '0',
  `actifwfsections` int(1) NOT NULL default '0',
  `poinwfsections` int(4) NOT NULL default '0',
  `actifnewbbex` int(1) NOT NULL default '0',
  `poinnewbbex` int(4) NOT NULL default '0',
  `actifnewbb` int(1) NOT NULL default '0',
  `poinnewbb` int(4) NOT NULL default '0',
  `actifsmartfaq` int(1) NOT NULL default '0',
  `poinsmartfaq` int(3) NOT NULL default '0',
  `actifwordbook` int(1) NOT NULL default '0',
  `poinwordbook` int(4) NOT NULL default '0',
  `actifxcgal` int(1) NOT NULL default '0',
  `poinxcgal` int(4) NOT NULL default '0',
  `actifxcgalvote` int(1) NOT NULL default '0',
  `poinxcgalvote` int(3) NOT NULL default '0',
  `actifextgallery` int(1) NOT NULL default '0',
  `poinextgallery` int(4) NOT NULL default '0',
  `actifdloads` int(1) NOT NULL default '0',
  `poindloads` int(4) NOT NULL default '0',
  `actifdloadsvotes` int(1) NOT NULL default '0',
  `poindloadsvotes` int(4) NOT NULL default '0',
  `actifwfdloads` int(1) NOT NULL default '0',
  `poinwfdloads` int(4) NOT NULL default '0',
  `actifwfdloadsvotes` int(1) NOT NULL default '0',
  `poinwfdloadsvotes` int(4) NOT NULL default '0',
  `actiflinks` int(1) NOT NULL default '0',
  `poinlinks` int(4) NOT NULL default '0',
  `actiflinksvotes` int(1) NOT NULL default '0',
  `poinlinksvotes` int(4) NOT NULL default '0',
  `actifweblinks` int(1) NOT NULL default '0',
  `poinweblinks` int(4) NOT NULL default '0',
  `actifweblinksvotes` int(1) NOT NULL default '0',
  `poinweblinksvotes` int(4) NOT NULL default '0',
  `actifxmovie` int(1) NOT NULL default '0',
  `poinxmovie` int(4) NOT NULL default '0',
  `actifxmovievotes` int(1) NOT NULL default '0',
  `poinxmovievotes` int(4) NOT NULL default '0',
  `actifcomments` int(1) NOT NULL default '0',
  `poincomments` int(4) NOT NULL default '0',
  `actiffriends` int(1) NOT NULL default '0',
  `poinfriends` int(4) NOT NULL default '0',
  `actifbonus` int(1) NOT NULL default '0'
) TYPE=MyISAM;




INSERT INTO `user_points_config` VALUES (1, 10, 1, 10, 1, 10, 1, 1, 1, 1, 1, 3, 1, 3, 1, 2, 1, 1, 1, 2, 1, 2, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 2, 1, 1, 1, 2, 0, 1, 1, 1, 1, 1, 1);


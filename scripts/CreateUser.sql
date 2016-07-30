CREATE TABLE `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `username` (`username`)
);


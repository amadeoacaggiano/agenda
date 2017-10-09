CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `fone_1` varchar(11) NOT NULL,
  `fone_2` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `valida_rep` (`name`,`last_name`,`fone_1`,`fone_2`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
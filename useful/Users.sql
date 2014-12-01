CREATE TABLE `users` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `login` varchar(32) DEFAULT NULL,
 `password` varchar(100) DEFAULT NULL,
 `mail` varchar(100) NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8

INSERT INTO  `myskeleton`.`users` (
	`id` ,
	`login` ,
	`password` ,
	`mail`
)
VALUES (
	NULL ,  'admin',  '$2a$08$gchzpJueeENOvNr033W76OoPHzrY0KjqUdEnfg4A1xD81lKrN9y52',  'admin@example.com'
);
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


CREATE SEQUENCE users_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


CREATE TABLE users (
    user_id bigint DEFAULT nextval('users_seq'::regclass) NOT NULL,
    name text,
    email text NOT NULL,
    password character varying(70) NOT NULL,
    reg_dttm timestamp with time zone DEFAULT now() NOT NULL,
    approved_email boolean DEFAULT false,
    approved_email_code text,
    is_active boolean DEFAULT true
);

ALTER TABLE ONLY users
    ADD CONSTRAINT users_unique_email UNIQUE (email);

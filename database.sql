/* Create Database and Table */
create database ujikir_db;

use ujikir_db;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `nik` varchar(20),
  `name` varchar(100),
  `address` varchar(200),
  `mobile` varchar(15),
  `policenumber` varchar(15),
  `vehicle` varchar(15),
  `type` varchar(30),
  `yearscreated` varchar(6),
  `date` DATE,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `admin` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(30),
  `password` varchar(30)
  PRIMARY KEY  (`id`)
);

INSERT INTO admin (username, password) VALUES ('admin','2020@Banjarnegara');
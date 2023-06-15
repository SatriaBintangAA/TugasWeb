create database crud_db;
 
use crud_db;
 
CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(100),
  `sekolah` varchar(100),
  `alamat` varchar(100),
  `foto` varchar(200) NOT NULL
  PRIMARY KEY  (`id`)
);
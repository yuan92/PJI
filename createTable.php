create database pji;
use pji;
create table auteur (id int(32) auto_increment not null,titre varchar(128) not null, prenom varchar(32) not null, firstInitial varchar(32), nom 
varchar(32) not null, sex varchar(8), revue varchar(128), source varchar(128),  suject 
varchar(128),  motCle varchar(512), localisation varchar(32),primary key(id));



修改表的编码方式：ALTER TABLE `auteur` DEFAULT CHARACTER SET utf8;该命令用于将表test的编码方式改为utf8；gbk



show databases;

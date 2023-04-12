/*
練習用
*/
create database if not exists pollapp default character set utf8mb4 collate utf8mb4_general_ci;
use pollapp;

crete user if not exists 'test_user'@'localhost' identified by 'pwd';
grant all on pollapp.* to 'test_use'@'localhost';

create table `topics` (
  `id` int(10) unsigned AUTO_INCREMENT PRIMARY KEY COMMENT 'トピックID',
  `title` varchar(30) NOT NULL COMMENT 'トピック本文',
  `publish` int(1) NOT NULL COMMENT '公開状態(1: 公開、0: 非公開)',
  `views` int(10) NOT NULL DEFAULT '0' COMMENT 'PV数',
  `likes` int(10) NOT NULL DEFAULT '0' COMMENT '賛成数'
)
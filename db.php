<?php
const DB_HOST = 'localhost';
const DB_NAME = 'test';
const DB_USER = 'root';
const DB_PWD = '';

$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// Создаем таблицы если их нет
$db->query("CREATE TABLE IF NOT EXISTS `sort_text` (
  `id` int NOT NULL AUTO_INCREMENT primary key,
  `text` text NOT NULL,
  `status` int DEFAULT 0
) ENGINE=InnoDB CHARSET=utf8");

$db->query("CREATE TABLE IF NOT EXISTS `settings` (
  `description` text NOT NULL,
  `activeButtons` varchar(255) NOT NULL                          
) ENGINE=InnoDB CHARSET=utf8");

$db->query("CREATE TABLE IF NOT EXISTS `buttons` (
  `buttonId` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `buttonName` text NOT NULL
) ENGINE=InnoDB CHARSET=utf8");
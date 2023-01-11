<?php
include 'Logics/Autoload.php';

$f_connection = Logics\Connection::get_first_connection();
$bd = Logics\Connection::bd;
$request0 = "CREATE DATABASE `$bd`";
$rezult0 = mysqli_query($f_connection, $request0);

$connection = Logics\Connection::get_connection();
$request1 = "CREATE TABLE `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`login` VARCHAR(100) DEFAULT NULL,
	`password` VARCHAR(100) DEFAULT NULL,
	`name` VARCHAR(100) DEFAULT NULL,
	`photo` VARCHAR(100) DEFAULT NULL,
	`role` VARCHAR(100) DEFAULT NULL,
	PRIMARY KEY (`id`)
)";
$request2 = "CREATE TABLE `posts` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`auth_id` VARCHAR(100) DEFAULT NULL,
	`auth_name` VARCHAR(100) DEFAULT NULL,
	`timestamp` VARCHAR(100) DEFAULT NULL,
	`category` VARCHAR(100) DEFAULT NULL,
	`photo` VARCHAR(100) DEFAULT NULL,
	`header` VARCHAR(100) DEFAULT NULL,
	`text_first` VARCHAR(150) DEFAULT NULL,
	`text_full` VARCHAR(10000) DEFAULT NULL,
	`views` VARCHAR(100) DEFAULT NULL,
	PRIMARY KEY (`id`)
)";
$request3 = "CREATE TABLE `comments` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`post_id` VARCHAR(100) DEFAULT NULL,
	`auth_id` VARCHAR(100) DEFAULT NULL,
	`auth_name` VARCHAR(100) DEFAULT NULL,
	`auth_photo` VARCHAR(100) DEFAULT NULL,
	`timestamp` VARCHAR(100) DEFAULT NULL,
	`text` VARCHAR(1000) DEFAULT NULL,
	PRIMARY KEY (`id`)
)";

$rezult1 = mysqli_query($connection, $request1);
$rezult2 = mysqli_query($connection, $request2);
$rezult3 = mysqli_query($connection, $request3);

echo "<pre>";
echo "===== DATA BASE ===============================<br>";
var_dump($rezult0);
echo "<br><br>===== USERS TABLE =============================<br>";
var_dump($rezult1);
echo "<br><br>===== POSTS TABLE =============================<br>";
var_dump($rezult2);
echo "<br><br>===== COMMENTS TABLE ==========================<br>";
var_dump($rezult3);
<?php
$dbName = 'autodb_disparitycorp';
if (file_exists(dirname(__FILE__).'/'.$dbName.'.db')) {
    @unlink(dirname(__FILE__).'/'.$dbName.'.db');
}

$dir = 'sqlite:'.  dirname(__FILE__).'/'.$dbName.'.db';
$dbManager  = new PDO($dir) or die("cannot open the database");

//Create database
$dbManager->query('CREATE DATABASE disparitycorp');

//Create table users
$dbManager->query('CREATE TABLE "users" (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`username`	TEXT,
	`password`	TEXT,
	`departmentid`	INTEGER,
	`employedsince`	INTEGER,
	`locked`	INTEGER
)');

//Create table access
$dbManager->query('CREATE TABLE `access` (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`userid`	INTEGER UNIQUE,
	`accessright`	TEXT
)');

//Create table logins
$dbManager->query('CREATE TABLE `logins` (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`name`	TEXT,
	`time`	INTEGER,
	`cookie`	TEXT
)');

//Create table deparment
$dbManager->query('CREATE TABLE "department" (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`name`	TEXT,
	`initials`	TEXT
)');

//Create table registration
$dbManager->query('CREATE TABLE "registrations" (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT UNIQUE,
	`first_name`	BLOB,
	`last_name`	TEXT,
	`age`	INTEGER,
	`sex`	TEXT,
	`city`	TEXT,
	`email`	TEXT,
	`user_id`	INTEGER
)');

echo "Created database successfully";
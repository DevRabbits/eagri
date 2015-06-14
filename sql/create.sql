CREATE TABLE user (
id int NOT NULL AUTO_INCREMENT,
mail varchar(255) NOT NULL,
login varchar(255) NOT NULL,
password varchar(255) NOT NULL,
PRIMARY KEY(id));

CREATE TABLE parcelle (
id int NOT NULL AUTO_INCREMENT,
owner varchar(255) NOT NULL,
name varchar(255) NOT NULL,
PRIMARY KEY(id));

CREATE TABLE experience (
id int NOT NULL AUTO_INCREMENT,
name varchar(255) NOT NULL,
parcelle varchar(255) NOT NULL,
PRIMARY KEY(id));

CREATE TABLE task (
id int NOT NULL AUTO_INCREMENT,
name varchar(255) NOT NULL,
date varchar(255) NOT NULL,
resume varchar(255) NOT NULL,
experience varchar(255) NOT NULL,
PRIMARY KEY(id));

--run this file in localhost/phpmyadmin

create database sha;
use sha;
create table shatable(
	id int auto_increment primary key,
	user varchar(20),
	pass char(130)
)
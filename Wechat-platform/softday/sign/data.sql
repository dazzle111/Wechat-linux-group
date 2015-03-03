drop table if exists register;

CREATE TABLE register(
	id int unsigned auto_increment primary key not null,
	num char(8)  not null,
	name char(20) not null,
	tel char(11) not null,
	unique key(num)
)default charset=utf8;

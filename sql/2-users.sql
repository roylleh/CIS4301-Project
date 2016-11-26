drop table users;
create table users (
	userid INT PRIMARY KEY,
	username VARCHAR(50),
	password VARCHAR(50),
	name VARCHAR(50),
	email VARCHAR(50),
	dob DATE,
	address VARCHAR(50),
	phone VARCHAR(50),
	ssn VARCHAR(50),
	doctorid INT REFERENCES doctors(doctorid)
);
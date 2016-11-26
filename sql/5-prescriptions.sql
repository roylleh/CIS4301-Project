drop table prescriptions;
create table prescriptions (
	userid INT REFERENCES users(userid),
	name VARCHAR(250),
	price INT,
	startdate DATE,
	refills INT
);
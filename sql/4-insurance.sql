drop table insurance;
set define off;
create table insurance (
	userid INT REFERENCES users(userid),
	company VARCHAR(250),
	copay INT,
	premium INT,
	deductible INT
);
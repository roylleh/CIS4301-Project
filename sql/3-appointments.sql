drop table appointments;
create table appointments (
	userid INT REFERENCES users(userid),
	doctorid INT REFERENCES doctors(doctorid),
	app_date DATE,
	app_time VARCHAR(50)
);
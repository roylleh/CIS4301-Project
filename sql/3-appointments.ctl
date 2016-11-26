OPTIONS(SKIP=1)
LOAD DATA
INFILE '3-appointments.csv'
INSERT INTO TABLE appointments
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
(
	userid,
	doctorid,
	app_date,
	app_time
)
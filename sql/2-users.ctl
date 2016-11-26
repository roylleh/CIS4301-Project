OPTIONS(SKIP=1)
LOAD DATA
INFILE '2-users.csv'
INSERT INTO TABLE users
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
(
	userid,
	username,
	password,
	name,
	email,
	dob,
	address,
	phone,
	ssn,
	doctorid
)
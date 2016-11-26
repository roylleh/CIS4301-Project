OPTIONS(SKIP=1)
LOAD DATA
INFILE '1-doctors.csv'
INSERT INTO TABLE doctors
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
(
	doctorid,
	name,
	address,
	phone
)
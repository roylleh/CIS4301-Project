OPTIONS(SKIP=1)
LOAD DATA
INFILE '5-prescriptions.csv'
INSERT INTO TABLE prescriptions
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
(
	userid,
	name,
	price,
	startdate,
	refills
)
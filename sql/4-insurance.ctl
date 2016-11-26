OPTIONS(SKIP=1)
LOAD DATA
INFILE '4-insurance.csv'
INSERT INTO TABLE insurance
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
(
	userid,
	company,
	copay,
	premium,
	deductible
)
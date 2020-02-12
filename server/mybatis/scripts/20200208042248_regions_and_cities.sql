-- // regions and cities
-- Migration SQL that makes the change goes here.

CREATE TABLE region (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(500) NOT NULL
)
;

INSERT INTO region (name) VALUES
	('North Central'),
	('NorthEast'),
	('Northwest'),
	('Plains'),
	('South Central'),
	('Southeast'),
	('Southwest')
;

CREATE TABLE city (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	region_id INT NOT NULL,
	name VARCHAR(500) NOT NULL,
	CONSTRAINT city_region_fk FOREIGN KEY (region_id) REFERENCES region(id)
)
;

INSERT INTO city (region_id, name)
	SELECT
	    (SELECT id FROM region WHERE name = 'NorthEast') region_id,
		city_names.name name
	FROM (
		SELECT 'Albany' name UNION
		SELECT 'Baltimore' name UNION
		SELECT 'Boston' name UNION
		SELECT 'Buffalo' name UNION
		SELECT 'New York' name UNION
		SELECT 'Philadelphia' name UNION
		SELECT 'Pittsburgh' name UNION
		SELECT 'Portland, Ma' name UNION
		SELECT 'Washington' name
	) city_names
;
INSERT INTO city (region_id, name)
	SELECT
		(SELECT id FROM region WHERE name = 'Southeast') region_id,
		city_names.name name
	FROM (
		SELECT 'Atlanta' name UNION
		SELECT 'Charleston' name UNION
		SELECT 'Charlotte' name UNION
		SELECT 'Chattanooga' name UNION
		SELECT 'Jacksonville' name UNION
		SELECT 'Miami' name UNION
		SELECT 'Knoxville' name UNION
		SELECT 'Mobile' name UNION
		SELECT 'Norfolk' name UNION
		SELECT 'Richmond' name UNION
		SELECT 'Tampa' name
	) city_names
;
INSERT INTO city (region_id, name)
	SELECT
		(SELECT id FROM region WHERE name = 'Northwest') region_id,
		city_names.name name
	FROM (
		SELECT 'Billings' name UNION
		SELECT 'Portland, Ore' name UNION
		SELECT 'Pocatello' name UNION
		SELECT 'Rapid City' name UNION
		SELECT 'Salt Lake City' name UNION
		SELECT 'Seattle' name UNION
		SELECT 'Spokane' name UNION
		SELECT 'Butte' name UNION
		SELECT 'Casper' name
	) city_names
;
INSERT INTO city (region_id, name)
	SELECT
		(SELECT id FROM region WHERE name = 'South Central') region_id,
		city_names.name name
	FROM (
		SELECT 'Birmingham' name UNION
		SELECT 'Dallas' name UNION
		SELECT 'Fort Worth' name UNION
		SELECT 'Houston' name UNION
		SELECT 'Little Rock' name UNION
		SELECT 'Louisville' name UNION
		SELECT 'Memphis' name UNION
		SELECT 'Nashville' name UNION
		SELECT 'New Orleans' name UNION
		SELECT 'San Antonio' name UNION
		SELECT 'Shreveport' name
	) city_names
;
INSERT INTO city (region_id, name)
	SELECT
		(SELECT id FROM region WHERE name = 'North Central') region_id,
		city_names.name name
	FROM (
		SELECT 'Chicago' name UNION
		SELECT 'Cincinnati' name UNION
		SELECT 'Cleveland' name UNION
		SELECT 'Columbus' name UNION
		SELECT 'Detroit' name UNION
		SELECT 'Indianapolis' name UNION
		SELECT 'Milwaukee' name UNION
		SELECT 'St. Louis' name
	) city_names
;
INSERT INTO city (region_id, name)
	SELECT
		(SELECT id FROM region WHERE name = 'Plains') region_id,
		city_names.name name
	FROM (
		SELECT 'Denver' name UNION
		SELECT 'Des Moines' name UNION
		SELECT 'Fargo' name UNION
		SELECT 'Kansas City' name UNION
		SELECT 'Minneapolis' name UNION
		SELECT 'Oklahoma City' name UNION
		SELECT 'Omaha' name UNION
		SELECT 'Pueblo' name UNION
		SELECT 'St. Paul' name
	) city_names
;
INSERT INTO city (region_id, name)
	SELECT
		(SELECT id FROM region WHERE name = 'Southwest') region_id,
		city_names.name name
	FROM (
		SELECT 'Las Vegas' name UNION
		SELECT 'El Paso' name UNION
		SELECT 'Los Angeles' name UNION
		SELECT 'Oakland' name UNION
		SELECT 'Phoenix' name UNION
		SELECT 'Reno' name UNION
		SELECT 'Sacramento' name UNION
		SELECT 'San Diego' name UNION
		SELECT 'San Francisco' name UNION
		SELECT 'Tucumcari' name
	) city_names
;

-- //@UNDO
-- SQL to undo the change goes here.

DROP TABLE city
;

DROP TABLE region
;

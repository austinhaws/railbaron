-- // region abbreviation
-- Migration SQL that makes the change goes here.

ALTER TABLE region ADD abbreviation NVARCHAR(500)
;
UPDATE region SET abbreviation =
	CASE WHEN name = 'North Central' then 'NC'
	    WHEN name = 'NorthEast' then 'NE'
	    WHEN name = 'Northwest' then 'NW'
	    WHEN name = 'Plains' then 'P'
	    WHEN name = 'South Central' then 'SC'
	    WHEN name = 'Southeast' then 'SE'
	    WHEN name = 'Southwest' then 'SW'
	END
;

-- //@UNDO
-- SQL to undo the change goes here.


ALTER TABLE region DROP COLUMN abbreviation
;

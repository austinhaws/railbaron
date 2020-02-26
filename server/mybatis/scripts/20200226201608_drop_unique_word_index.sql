-- // drop unique word index
-- Migration SQL that makes the change goes here.

ALTER TABLE word DROP INDEX word_u
;


-- //@UNDO
-- SQL to undo the change goes here.


ALTER TABLE word ADD CONSTRAINT word_u UNIQUE (word)
;

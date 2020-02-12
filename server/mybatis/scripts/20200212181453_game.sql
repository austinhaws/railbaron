-- // game
-- Migration SQL that makes the change goes here.

CREATE TABLE game (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	created_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

	phrase VARCHAR(500) NOT NULL
);

CREATE TABLE player (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

	game_id INT NOT NULL,
	to_city_id INT NOT NULL,
	from_city_id INT NOT NULL,
	home_city_id INT NOT NULL,
	taw_color VARCHAR(500) NOT NULL,
	name VARCHAR(500) NOT NULL,

	CONSTRAINT player_game_fk FOREIGN KEY (game_id) REFERENCES game(id),
	CONSTRAINT player_to_fk FOREIGN KEY (to_city_id) REFERENCES city(id),
	CONSTRAINT player_from_fk FOREIGN KEY (from_city_id) REFERENCES city(id),
	CONSTRAINT player_home_fk FOREIGN KEY (home_city_id) REFERENCES city(id)
);

-- //@UNDO
-- SQL to undo the change goes here.

DROP TABLE player
;
DROP TABLE game
;

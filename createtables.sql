PRAGMA encoding = 'UTF-8';
PRAGMA foreign_keys = OFF;
CREATE TABLE IF NOT EXISTS users (
	userid 			INTEGER 	PRIMARY KEY,
	username 		TEXT 		NOT NULL	 UNIQUE,
	email 			TEXT	 	NOT NULL 	 UNIQUE,
	phone 			TEXT 		UNIQUE,
	passhash 		TEXT		NOT NULL,
	creation_date   	INTEGER		NOT NULL,
	lastname	    	TEXT ,
	firstname 		TEXT ,
	online 			INTEGER 	NOT NULL  DEFAULT 1,
	status			INTEGER,
	pfp			TEXT,
	CHECK( online < 2 AND
	 length(phone) == 11 ));
CREATE TABLE IF NOT EXISTS items (
	itemid 			INTEGER   PRIMARY KEY,
	price 			INTEGER	  NOT NULL,
	category 		TEXT,
	name	   	    	TEXT 	  NOT NULL,
	number_left 		INTEGER   NOT NULL, 
	creation_date   	INTEGER   NOT NULL,
	rating 			INTEGER,
	ratingnum		INTEGER,
	click			INTEGER,
	status			INTEGER, CHECK ( price != 0 AND
	 rating < 6 )
	);
CREATE TABLE IF NOT EXISTS attributes (
	itemid  INTEGER 		 PRIMARY KEY,
	key 	TEXT,
	value 	TEXT,
	FOREIGN KEY (itemid) REFERENCES items (itemid) ON DELETE NO ACTION
	);
CREATE TABLE IF NOT EXISTS basketlist (
	userid 			INTEGER		PRIMARY KEY,
	basketid 		INTEGER     NOT NULL UNIQUE,
	creation_date   	INTEGER 	NOT NULL,
	ispurchased 		INTEGER 	DEFAULT 0
	CHECK ( ispurchased < 2 ),
	FOREIGN KEY (userid) REFERENCES users(userid) ON DELETE NO ACTION,
	FOREIGN KEY (basketid) REFERENCES basket(basketid) ON DELETE NO ACTION
	);
CREATE TABLE IF NOT EXISTS basket (
	basketid 		INTEGER		PRIMARY KEY,
	itemid 			INTEGER		NOT NULL,
	itemcount 			INTEGER		NOT NULL,
	FOREIGN KEY (itemid) REFERENCES items (itemid) ON DELETE NO ACTION
	);
CREATE TABLE IF NOT EXISTS categories (
	categoryid	TEXT	PRIMARY KEY,
	categoryname	TEXT	NOT NULL,
	categoryimage	TEXT,
	click			INTEGER
	);

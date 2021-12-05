
USE `dn236`;-- put your databse name inside the single quote.
-- if you want to upload this sql to remote njit databse server, you need put your UCID inside the single quotes.
DROP TABLE IF EXISTS `todo`;
DROP TABLE IF EXISTS `users`;
-- create the tables

CREATE TABLE users (
	username       	VARCHAR(250)    NOT NULL UNIQUE,
	fname     	  	VARCHAR(60)   	NOT NULL,
	lname     	  	VARCHAR(60)    	NOT NULL,
	email       	VARCHAR(250)   	NOT NULL UNIQUE,
	password    	VARCHAR(30)    	NOT NULL,
	prevpass1 		VARCHAR(30)    	DEFAULT NULL,
	prevpass2 		VARCHAR(30)    	DEFAULT NULL,
	PRIMARY KEY (username),
	CONSTRAINT chk_email CHECK(email LIKE '%_@_%._%')
);
/* users table notes
prevpass1 -> 1 password ago
prevpass2 -> 2 passwords ago
*/
CREATE TABLE toDo (
	taskId        	INT           	NOT NULL AUTO_INCREMENT,
	username      	VARCHAR(250)	NOT NULL,
	completed		TINYINT(2)		NOT NULL DEFAULT 0,
	dueDate       	DATETIME      	NOT NULL,     
	description   	VARCHAR(250)  	NOT NULL,
	urgency    		TINYINT(2)    	NOT NULL, 
	PRIMARY KEY (taskId),
	FOREIGN KEY (username) REFERENCES users(username)
);
/* todo table notes
we don't really need this but if we do its here: currentDate   DATETIME     	default  current_timestamp,
urgency : 0->'Normal' ; 1->'Important' ; 2->'Very Important'
completed : 0-> not completed ; 1-> completed
*/


-- insert sample data into the database
INSERT INTO users (username, fname, lname, email, password, prevpass1, prevpass2) 
VALUES
('Ya.boy', 'Ya', 'boy', 'yab0y@gmail.com','ChillinHardInDa6',NULL,NULL),
('Sk8rboii', 'Tony', 'Hawk', 'areyouTonyHawk@gmail.com','YesIamThe1','Sk84ever',NULL),
('TheDude', 'Jeff', 'Lebowski', 'thedude@gmail.com','1000000aire',NULL,NULL),
('Zuccd!', 'Mark', 'Zuckerberg', 'givemey0urdata@gmail.com','N0FACESonlyMETA',NULL,NULL);


INSERT INTO toDo (username, dueDate, description, urgency) 
VALUES
('Sk8rboii', '2021-12-10 04:20:00', 'DO A KICKFLIP!', 0),
('Sk8rboii', '2021-12-09 23:59:59', 'Tell everyone to DO A KICKFLIP!', 1), 
('Ya.boy', '2021-12-10 04:20:00', 'DO A KICKFLIP!', 0),
('Ya.boy', '2021-12-10 04:00:00', 'Learn how to do a kickflip', 0),
('TheDude', '2021-12-10 04:20:00', 'DO A KICKFLIP!', 0),
('TheDude', '1998-03-06 00:00:00', 'Abide', 0),
('Zuccd!', '2021-12-10 04:20:00', 'DO A KICKFLIP!', 0),
('Zuccd!', '2022-01-01 00:00:00', 'Sell everyones data', 0),
('Zuccd!', '2021-12-25 00:00:00', 'Pretend to be human', 1),
('Zuccd!', '2100-01-01 00:00:00', 'Ascend to METAVERSE', 2);


USE `jb645`;-- put your databse name inside the single quote.
-- if you want to upload this sql to remote njit databse server, you need put your UCID inside the single quotes.

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `toDo`;


-- create the tables
CREATE TABLE users (
	username    VARCHAR (250)  NOT NULL UNIQUE,
	fname       VARCHAR (60)   NOT NULL,
	lname       VARCHAR(60)    NOT NULL,
	email       VARCHAR(250)   NOT NULL UNIQUE,
	password    VARCHAR(30)    NOT NULL,
	prevpass1 	VARCHAR(30)    NULL,	--Previous password after 1 password change
	prevpass2 	VARCHAR(30)    NULL,	--Previous password after 2 password changes
	PRIMARY KEY (username),
	CONSTRAINT chk_email CHECK(email LIKE '%_@___%')

);

CREATE TABLE toDo (
	taskId        INT           DEFAULT NULL AUTO_INCREMENT,
	username      VARCHAR(60)   NOT NULL,
	dueDate       DATETIME      NOT NULL,     -- check this later
	currentDate   DATETIME     	default  current_timestamp,
	description   VARCHAR(250)  NOT NULL,
	urgency       TINYINT(2)    NOT NULL, -- TINYINT(2) since starts at 0 'Normal','Important','Very Important'

	PRIMARY KEY (taskId),
	FOREIGN KEY (username) REFERENCES users(username)
);
-- insert sample data into the database
INSERT INTO users (username, fname, lname, email, password, prevpass1, prevpass2) 
VALUES
('Ya.boy', 'Ya', 'boy', 'yab0y@gmail.com','ChillinHardInDa6',NULL,NULL),
('Sk8rboii', 'Tony', 'Hawk', 'areyouTonyHawk@gmail.com','YesIamThe1','Sk84ever',NULL),
('TheDude', 'Jeff', 'Lebowski', 'thedude@gmail.com','1000000aire',NULL,NULL),
('Zuccd!', 'Mark', 'Zuckerberg', 'givemey0urdata@gmail.com','N0FACESonlyMETA',NULL,NULL),;
INSERT INTO toDo (username, dueDate, description, urgency) 
VALUES
('Sk8rboii', 2021-12-10 04:20:00, 'DO A KICKFLIP!', 0),
('Sk8rboii', 2021-12-09 23:59:59, 'Tell everyone to DO A KICKFLIP!', 1), 
('Ya.boy', 2021-12-10 04:20:00, 'DO A KICKFLIP!', 0),
('Ya.boy', 2021-12-10 04:00:00, 'Learn how to do a kickflip', 0),
('TheDude', 2021-12-10 04:20:00, 'DO A KICKFLIP!', 0),
('TheDude', 1998-03-06 00:00:00, 'Abide', 0),
('Zuccd', 2021-12-10 04:20:00, 'DO A KICKFLIP!', 0),
('Zuccd', 2022-01-01 00:00:00, 'Sell everyones data', 0),
('Zuccd', 2021-12-25 00:00:00, 'Pretend to be human', 1),
('Zuccd', 2100-01-01 00:00:00, 'Ascend to METAVERSE', 2);
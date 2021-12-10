
USE `jb645`;-- put your databse name inside the single quote.
-- if you want to upload this sql to remote njit databse server, you need put your UCID inside the single quotes.
DROP TABLE IF EXISTS `todo`;
DROP TABLE IF EXISTS `users`;
-- create the tables

CREATE TABLE users (
	email       	VARCHAR(250)   	NOT NULL UNIQUE,
	username       	VARCHAR(250)    NOT NULL UNIQUE,
	fname     	  	VARCHAR(60)   	NOT NULL,
	lname     	  	VARCHAR(60)    	NOT NULL,
	password    	VARCHAR(30)    	NOT NULL,
	prevpass1 		VARCHAR(30)    	DEFAULT NULL,
	prevpass2 		VARCHAR(30)    	DEFAULT NULL,
	PRIMARY KEY (email),
	CONSTRAINT chk_email CHECK(email LIKE '%_@_%._%')
);
/* users table notes
prevpass1 -> 1 password ago
prevpass2 -> 2 passwords ago
*/
CREATE TABLE toDo (
	taskID        	INT           	NOT NULL AUTO_INCREMENT,
	email      		VARCHAR(250)	NOT NULL,
	completed		TINYINT(2)		NOT NULL DEFAULT 0,
	dueDate       	DATETIME      	NOT NULL,     
	title			VARCHAR(50)		NOT NULL,
	description   	VARCHAR(500)  	NOT NULL,
	urgency    		TINYINT(2)    	NOT NULL, 
	PRIMARY KEY (taskID),
	FOREIGN KEY (email) REFERENCES users(email)
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
('Zuccd', 'Mark', 'Zuckerberg', 'givemey0urdata@gmail.com','N0FACESonlyMETA',NULL,NULL);


INSERT INTO toDo (email, dueDate, title, description, urgency) 
VALUES
('areyouTonyHawk@gmail.com', '2021-12-10 04:20:00', '!KICKFLIP TIME!', 'DO A KICKFLIP!', 0),
('areyouTonyHawk@gmail.com', '2021-12-09 23:59:59', 'Spread the word', 'Tell everyone to DO A KICKFLIP!', 1), 
('yab0y@gmail.com', '2021-12-10 04:20:00', '!KICKFLIP TIME!', 'DO A KICKFLIP!', 0),
('yab0y@gmail.com', '2021-12-10 04:00:00', 'Get learnd', 'Learn how to do a kickflip', 0),
('thedude@gmail.com', '2021-12-10 04:20:00', '!KICKFLIP TIME!', 'DO A KICKFLIP!', 0),
('thedude@gmail.com', '1998-03-06 00:00:00', 'What the Dude does', 'Abide', 0),
('givemey0urdata@gmail.com', '2021-12-10 04:20:00', '!KICKFLIP TIME!', 'DO A KICKFLIP!', 0),
('givemey0urdata@gmail.com', '2022-01-01 00:00:00', 'Step 4:Profit', 'Sell everyones data', 0),
('givemey0urdata@gmail.com', '2021-12-25 00:00:00', 'Stay low', 'Pretend to be human', 1),
('givemey0urdata@gmail.com', '2100-01-01 00:00:00', 'Endgame', 'Ascend to METAVERSE', 2);

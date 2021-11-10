
USE `jb645`;-- put your databse name inside the single quote.
-- if you want to upload this sql to remote njit databse server, you need put your UCID inside the single quotes.

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `toDo`;


-- create the tables
CREATE TABLE users (
                          username    VARCHAR (250)   NOT NULL UNIQUE,
                          fname       VARCHAR (60)   NOT NULL,
                          lname       VARCHAR(60)    NOT NULL,
                          email       VARCHAR(250)    NOT NULL UNIQUE,
                          password    VARCHAR(30)    NOT NULL,
                          PRIMARY KEY (username),
                          CONSTRAINT chk_email CHECK(email LIKE '%_@___%')

);

CREATE TABLE toDo (
                            taskId        INT            DEFAULT NULL AUTO_INCREMENT,
                            username      VARCHAR(60)    NOT NULL,
                            dueDate       DATETIME       NOT NULL,     -- check this later
                            currentDate   DATETIME     default  current_timestamp,
                            description   VARCHAR(250)   NOT NULL,
                            urgency       VARCHAR(60)    NOT NULL, -- TINYINT(2)

                            PRIMARY KEY (taskId),
                            FOREIGN KEY (username) REFERENCES users(username),
                            CONSTRAINT chk_urgency CHECK ( urgency IN ('Normal','Important','Very Important') )
);

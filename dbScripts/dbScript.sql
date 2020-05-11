CREATE TABLE users(
    id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name varchar(64) NOT NULL,
    password varchar(64) NOT NULL,
    email varchar(64) NOT NULL,
    PersonID int);

CREATE TABLE attributes(
    id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name varchar(64) NOT NULL
);

CREATE TABLE attrValues(
    id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userId int,
    attrId int,
    FOREIGN KEY (userId) REFERENCES users(id),
    FOREIGN KEY (attrId ) REFERENCES attributes(id),
    attrValue varchar(64) NOT NULL
)
CREATE DATABASE IF NOT EXISTS cendi;

USE cendi;

CREATE TABLE IF NOT EXISTS users(
    user_id VARCHAR(36) NOT NULL,
    firstname NVARCHAR(50),
    lastname NVARCHAR(50),
    email VARCHAR(255),
    pwd CHAR(60),
    PRIMARY KEY (user_id),
    UNIQUE (email)
);

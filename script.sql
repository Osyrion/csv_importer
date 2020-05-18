-- IF DB EXISTS
DROP DATABASE testdb;

-- CREATE NEW DATABASE
CREATE DATABASE testdb CHARACTER SET utf8;

-- CREATE TABLE
CREATE TABLE CSV_IMPORT (
    id int NOT NULL AUTO_INCREMENT,
    payment_date varchar(255),
    amount int NOT NULL,
    comment varchar(255),
    PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- CREATE USER
DELETE FROM mysql.user WHERE User='universalusername';
flush privileges;
CREATE USER 'universalusername'@'127.0.0.1' IDENTIFIED BY '1234';

-- ADD PRIVILEGES
GRANT INSERT, UPDATE, SELECT ON testdb.CSV_IMPORT TO 'universalusername'@'127.0.0.1';
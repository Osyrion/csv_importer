CREATE DATABASE testdb;

CREATE TABLE CSV_IMPORT (
    id int NOT NULL AUTO_INCREMENT,
    predcisli int,
    cislo uctu int,
    pocatecni_datum date,
    konecne_datum date,
    pocatecni_zustatek int,
    konecny_zustate int,
    Ma_dati int,
    Dal int
);

CREATE USER 'robert'@'127.0.0.1' IDENTIFIED BY '1234';

GRANT INSERT, UPDATE, SELECT ON testdb.CSV_IMPORT TO 'robert'@'127.0.0.1';
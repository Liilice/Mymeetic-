DROP DATABASE IF EXISTS mymeetic;
CREATE DATABASE mymeetic;

USE mymeetic;

DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS user_loisir;
DROP TABLE IF EXISTS session;


CREATE TABLE user (
    id              INT             NOT NULL AUTO_INCREMENT,
    email           VARCHAR(255)    NOT NULL UNIQUE,
    nom             VARCHAR(255)    NOT NULL,
    prenom          VARCHAR(255)    NOT NULL,
    date_naissance  DATE            NOT NULL,
    genre           VARCHAR(255)    NOT NULL,
    password        VARCHAR(255)    NOT NULL,
    code_postal     INT             NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE user_loisir (
    id_user         INT             NOT NULL,
    name            VARCHAR(255)    NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id)
);
CREATE TABLE session (
    id_session      INT             NOT NULL AUTO_INCREMENT,
    id_user         INT             NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id),
    PRIMARY KEY (id_session)
);


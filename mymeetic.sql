DROP DATABASE IF EXISTS mymeetic;
CREATE DATABASE mymeetic;

USE mymeetic;

DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS user_loisir;
DROP TABLE IF EXISTS loisir;
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

CREATE TABLE loisir (
    id              INT             NOT NULL AUTO_INCREMENT,
    name            VARCHAR(255)    NOT NULL UNIQUE,
    PRIMARY KEY (id)
);

CREATE TABLE user_loisir (
    id_user         INT             NOT NULL,
    id_loisir       INT             NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id),
    FOREIGN KEY (id_loisir) REFERENCES loisir(id)
);
CREATE TABLE session (
    id_session      CHAR(64)        NOT NULL,
    id_user         INT             NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id)
);
INSERT INTO loisir
            (name)
    VALUES  ('Sport'),
            ('Lecture'),
            ('Informatique'),
            ('Cinema'),
            ('Jeux vidéo'),
            ('Couture'),
            ('Cuisine')
    ;

DROP SCHEMA IF EXISTS mesnotes;

CREATE SCHEMA mesnotes;

USE mesnotes;

-- Création table utilisateur
CREATE TABLE UTILISATEUR (
    NOMUT VARCHAR(100) NOT NULL,
    PRENOMUT VARCHAR(100) NOT NULL,
    UTNAME VARCHAR(100) PRIMARY KEY NOT NULL,
    EMAILUT VARCHAR(100) NOT NULL,
    NUMEROUT VARCHAR(10) NOT NULL,
    MDPUT VARCHAR(100) NOT NULL
);

INSERT INTO
    UTILISATEUR
VALUES
    (
        'Ariste',
        'Kindy',
        'Ardy286',
        'kindy@gmail.com',
        5147896325,
        'Babouche021'
    );

-- Création table document
CREATE TABLE DOCUMENT (
    UTNAME VARCHAR(100) NOT NULL,
    NOMDOC VARCHAR(100),
    CONTENUDOC TEXT,
    -- deletes notes when the user is deleted 
    -- Cannot delete user who have docs without this ( solution a notre probme de suppression de compte et de document )
    CONSTRAINT fk_UTNAME FOREIGN KEY (UTNAME) REFERENCES UTILISATEUR(UTNAME) ON DELETE CASCADE
);

INSERT INTO
    DOCUMENT
VALUES
    (
        'Ardy286',
        'HardCodeExample',
        'Babouche021'
    );

CREATE TABLE ADMINISTATEUR (
    UTNAME VARCHAR(100) NOT NULL,
    MDPUT VARCHAR(100) NOT NULL
);

INSERT INTO
    ADMINISTATEUR
VALUES
    ("admin", "1234");

COMMIT;




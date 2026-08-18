CREATE TABLE responsables(
    id SERIAL PRIMARY KEY,
    prenom VARCHAR(50) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    numero VARCHAR(50) NOT NULL,
    adresse VARCHAR(50) NOT NULL
);

CREATE TABLE statuts(
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE roles(
    id SERIAL PRIMARY KEY,
    role VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE anneeScolaires(
    id SERIAL PRIMARY KEY,
    annee VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE etablissements(
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE utilisateurs(
    id SERIAL PRIMARY KEY,
    prenom VARCHAR(50) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    login VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT REFERENCES roles(id)
);

CREATE TABLE eleves(
    id SERIAL PRIMARY KEY,
    id_responsable INT REFERENCES responsables(id),
    matricule VARCHAR(50) NOT NULL UNIQUE,
    prenom VARCHAR(50) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    numero VARCHAR(50) NOT NULL,
    adresse VARCHAR(50) DEFAULT NULL,
    id_statut INT REFERENCES statuts(id)
);

CREATE TABLE classes(
    id SERIAL PRIMARY KEY,
    id_etablissement INT REFERENCES etablissements(id),
    nom VARCHAR(50) NOT NULL,
    UNIQUE (id_etablissement, nom)
);

CREATE TABLE inscriptions(
    id SERIAL PRIMARY KEY,
    id_eleve INT NOT NULL REFERENCES eleves(id),
    id_annee INT NOT NULL REFERENCES anneeScolaires(id),
    id_classe INT NOT NULL REFERENCES classes(id),
    id_utilisateur INT NOT NULL REFERENCES utilisateurs(id)
);

CREATE TABLE transferts(
    id SERIAL PRIMARY KEY,
    id_inscription INT NOT NULL REFERENCES inscriptions(id),
    id_etablissement_destination INT NOT NULL REFERENCES etablissements(id),
    id_classe_destination INT NOT NULL REFERENCES classes(id),
    id_utilisateur INT NOT NULL REFERENCES utilisateurs(id),
    date_transfert DATE NOT NULL DEFAULT CURRENT_DATE
);
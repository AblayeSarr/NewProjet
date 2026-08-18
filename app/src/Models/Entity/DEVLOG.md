Conception de la base de données et programmation orientée objet

Création des tables:

Nous avons commencé par concevoir la structure de la base de données PostgreSQL.
Les principales tables créées sont :

- etablissements : contient les établissements scolaires.
- responsables : contient les responsables légaux des élèves.
- niveaux : contient les différents niveaux scolaires.
- anneeScolaires : contient les années scolaires.
- matieres : contient les matières enseignées.
- classes : contient les classes.
- eleves : contient les informations des élèves.
- utilisateurs : contient les utilisateurs de l'application.
- inscriptions : permet de relier un élève à une classe pour une année scolaire.

Modélisation orientée objet:

Après la création du schéma SQL, nous avons identifié les principales entités métier qui seront représentées sous forme de classes PHP.
Les principales entités sont :

- Etablissement
- Responsable
- Niveau
- AnneeScolaire
- Matiere
- Classe
- Eleve
- Utilisateur
- Inscription

Chaque classe représente une entité métier de l'application.

Par exemple, l'entité Eleve correspond à la table eleves et contient les informations principales d'un élève :

- id
- matricule
- nom
- prénom
- date de naissance
- établissement
- responsable

Concepts de programmation orientée objet utilisés

Plusieurs concepts de la programmation orientée objet ont été utilisés dans la conception.
Les attributs des entités sont protégés et leur accès se fait à travers des méthodes.

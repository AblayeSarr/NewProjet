# DEVLOG — Conception de la base de données

## 1. Objectif

L'objectif de cette étape était de mettre en place le schéma
relationnel de la base de données de l'application de gestion
scolaire.

Nous avons identifié les principales données nécessaires au
fonctionnement de l'application et nous les avons séparées dans
des tables afin d'éviter de mélanger plusieurs responsabilités
dans une même table.

La base de données a été conçue avec PostgreSQL.
Les principales données à gérer sont :

- les responsables ;
- les élèves ;
- les statuts ;
- les rôles ;
- les utilisateurs ;
- les années scolaires ;
- les établissements ;
- les classes ;
- les inscriptions ;
- les transferts.

## 2. Création de la table `responsables`

Nous avons commencé par créer la table `responsables`.
Cette table permet de stocker les informations relatives aux
responsables des élèves.
Elle contient les informations suivantes :

- l'identifiant du responsable ;
- son prénom ;
- son nom ;
- son numéro ;
- son adresse.

Le champ `id` a été défini comme clé primaire avec `SERIAL`.
Cela permet d'identifier chaque responsable de manière unique.
Les champs `prenom`, `nom`, `numero` et `adresse` ont été définis
avec `NOT NULL`, car ces informations sont obligatoires dans notre
modèle.
Cette table sera ensuite utilisée par la table `eleves` afin de
relier un élève à son responsable.

## 3. Création de la table `statuts`

Nous avons ensuite créé la table `statuts`.
Cette table permet de séparer les informations concernant le statut
d'un élève des informations propres à l'élève.
Elle contient :

- un identifiant ;
- le nom du statut.

Le champ `nom` possède une contrainte `UNIQUE`.
Cette contrainte permet d'éviter d'enregistrer plusieurs fois le
même statut dans la base.
La table `statuts` sera référencée par la table `eleves` grâce au
champ `id_statut`.

## 4. Création de la table `roles`

Nous avons créé une table spécifique pour les rôles.
Cette table contient :

- l'identifiant du rôle ;
- le nom du rôle.

Le champ `role` est défini comme `UNIQUE`.
La séparation des rôles et des utilisateurs permet de ne pas
enregistrer directement les informations du rôle dans chaque
utilisateur.
La table `utilisateurs` possède donc une clé étrangère
`role_id` qui permet de retrouver le rôle associé à un utilisateur.

## 5. Création de la table `anneeScolaires`

Nous avons créé la table `anneeScolaires` pour gérer les années
scolaires de l'application.
Cette table contient :

- un identifiant ;
- l'année scolaire.

Le champ `annee` est obligatoire grâce à `NOT NULL` et possède
également une contrainte `UNIQUE`.
Cette table est nécessaire pour pouvoir associer une inscription
à une année scolaire précise.
La table `inscriptions` utilisera donc `id_annee` comme clé
étrangère vers cette table.

## 6. Création de la table `etablissements`

Nous avons créé la table `etablissements` afin de représenter
les établissements gérés par l'application.
Elle contient :

- l'identifiant de l'établissement ;
- son nom.

Le nom est obligatoire et unique.
Cette table est utilisée par la table `classes`, car une classe
doit être rattachée à un établissement.
Elle sera également utilisée par la table `transferts` pour
identifier l'établissement de destination d'un transfert.

## 7. Création de la table `utilisateurs`

Nous avons créé la table `utilisateurs` pour représenter les
personnes qui utilisent l'application.

La table contient :

- l'identifiant ;
- le prénom ;
- le nom ;
- le login ;
- le mot de passe ;
- le rôle associé.

Le `login` est défini comme `UNIQUE` afin d'empêcher plusieurs
utilisateurs d'utiliser le même identifiant de connexion.
Le champ `role_id` est une clé étrangère vers la table `roles`.
Cette relation permet d'associer chaque utilisateur à un rôle
existant dans la base de données.
Le champ `password` a été défini avec une taille de `255`
car il devra contenir un mot de passe hashé et non le mot de passe
en clair.

## 8. Création de la table `eleves`

Nous avons ensuite créé la table principale concernant les élèves.
La table `eleves` contient :

- l'identifiant ;
- l'identifiant du responsable ;
- le matricule ;
- le prénom ;
- le nom ;
- le numéro ;
- l'adresse ;
- l'identifiant du statut.

Le champ `id_responsable` est une clé étrangère vers la table
`responsables`.
Le champ `id_statut` est une clé étrangère vers la table `statuts`.
Cela permet de relier les informations de l'élève aux données
qui sont stockées dans les tables correspondantes.

## 9. Remplacement de `ref` par `matricule`

Pendant la conception de la table `eleves`, nous avions initialement
utilisé le champ `ref`.

Après réflexion sur le domaine scolaire, nous avons remplacé ce
champ par `matricule`.
Le terme `matricule` correspond mieux à l'identifiant métier
utilisé pour identifier un élève dans le système scolaire.
Le champ `matricule` a été défini comme obligatoire et unique.
Il est important de distinguer le `id` de la base de données
et le `matricule`.
Le `id` est utilisé par la base de données comme identifiant
technique.
Le `matricule` correspond à l'identifiant métier de l'élève.

## 10. Création de la table `classes`

Nous avons créé la table `classes` pour représenter les classes
scolaires.
Elle contient :

- l'identifiant de la classe ;
- l'identifiant de l'établissement ;
- le nom de la classe.

Le champ `id_etablissement` est une clé étrangère vers
`etablissements`.
Cela permet de rattacher chaque classe à un établissement.
Nous avons également ajouté la contrainte :
`UNIQUE (id_etablissement, nom)`
Cette contrainte porte sur la combinaison entre l'établissement
et le nom de la classe.
Elle permet d'éviter qu'un même établissement possède plusieurs
classes portant exactement le même nom.

## 11. Création de la table `inscriptions`

Nous avons ensuite créé la table `inscriptions`.
Cette table est importante car elle permet de représenter
l'inscription d'un élève.

Elle contient :

- l'identifiant de l'inscription ;
- l'élève concerné ;
- l'année scolaire ;
- la classe ;
- l'utilisateur qui a effectué l'inscription.
Les champs suivants sont des clés étrangères :

- `id_eleve` vers `eleves` ;
- `id_annee` vers `anneeScolaires` ;
- `id_classe` vers `classes` ;
- `id_utilisateur` vers `utilisateurs`.

Les quatre champs sont obligatoires avec `NOT NULL`.

L'inscription permet donc de conserver les informations
nécessaires pour savoir dans quelle année et dans quelle classe
un élève est inscrit, ainsi que l'utilisateur qui a enregistré
l'opération.

---

## 12. Création de la table `transferts`

Enfin, nous avons créé la table `transferts`.
Cette table permet d'enregistrer les opérations de transfert
liées aux inscriptions.

Elle contient :

- l'identifiant du transfert ;
- l'inscription concernée ;
- l'établissement de destination ;
- la classe de destination ;
- l'utilisateur ayant effectué le transfert ;
- la date du transfert.

Le champ `id_inscription` est une clé étrangère vers la table
`inscriptions`.
Les champs `id_etablissement_destination` et
`id_classe_destination` permettent d'enregistrer la destination
du transfert.
Le champ `id_utilisateur` permet d'identifier l'utilisateur
ayant effectué l'opération.
La date du transfert est automatiquement définie par PostgreSQL
grâce à :

`DEFAULT CURRENT_DATE`

Cela évite de devoir fournir manuellement la date lors de chaque
création d'un transfert.

## 13. Mise en place des relations

Après avoir créé les différentes tables, nous avons mis en place
les relations entre elles grâce aux clés étrangères.
Les principales relations sont :

- `eleves.id_responsable` → `responsables.id` ;
- `eleves.id_statut` → `statuts.id` ;
- `utilisateurs.role_id` → `roles.id` ;
- `classes.id_etablissement` → `etablissements.id` ;
- `inscriptions.id_eleve` → `eleves.id` ;
- `inscriptions.id_annee` → `anneeScolaires.id` ;
- `inscriptions.id_classe` → `classes.id` ;
- `inscriptions.id_utilisateur` → `utilisateurs.id` ;
- `transferts.id_inscription` → `inscriptions.id` ;
- `transferts.id_etablissement_destination`
  → `etablissements.id` ;
- `transferts.id_classe_destination` → `classes.id` ;
- `transferts.id_utilisateur` → `utilisateurs.id`.

Ces relations permettent à PostgreSQL de contrôler
la cohérence des données entre les différentes tables.

## 14. Gestion des contraintes

Pendant la conception, nous avons utilisé plusieurs contraintes
SQL afin de garantir l'intégrité des données.

### `PRIMARY KEY`

Chaque table possède un champ `id` comme clé primaire.

Cela permet d'identifier chaque enregistrement de manière unique.

### `NOT NULL`

Les informations nécessaires au fonctionnement du système
ont été définies comme obligatoires.

### `UNIQUE`

Les contraintes `UNIQUE` ont été utilisées pour les données
qui ne doivent pas être dupliquées, notamment :

- les rôles ;
- les années scolaires ;
- les établissements ;
- les logins ;
- les matricules ;
- certaines combinaisons de classes.

### `REFERENCES`

Les clés étrangères ont été utilisées pour représenter
les relations entre les tables et maintenir l'intégrité
référentielle.

## 15. Ordre de création des tables

Nous avons également pris en compte les dépendances entre
les tables.

Certaines tables utilisent des clés étrangères vers d'autres
tables. Elles ne peuvent donc pas être créées correctement
avant les tables dont elles dépendent.

L'ordre retenu est :

1. `responsables`
2. `statuts`
3. `roles`
4. `anneeScolaires`
5. `etablissements`
6. `utilisateurs`
7. `eleves`
8. `classes`
9. `inscriptions`
10. `transferts`

Cet ordre permet de créer progressivement les tables en respectant
leurs dépendances.

## 16. Difficultés rencontrées

La principale difficulté a été de déterminer correctement
les responsabilités de chaque table et les relations entre elles.

Nous avons également dû revoir la conception de l'identifiant
de l'élève en remplaçant `ref` par `matricule`.

Une autre difficulté concernait la relation entre les classes
et les établissements. Il fallait permettre à plusieurs
établissements d'avoir des classes portant le même nom tout en
empêchant les doublons à l'intérieur d'un même établissement.

La conception de la table `inscriptions` a également demandé
de regrouper correctement les relations entre l'élève, l'année
scolaire, la classe et l'utilisateur.

Enfin, la table `transferts` a nécessité de déterminer quelles
informations devaient être conservées afin de représenter
correctement l'opération de transfert.


## 17. Résultat

À la fin de cette étape, le schéma de base de données contient
les 10 tables suivantes :

1. `responsables`
2. `statuts`
3. `roles`
4. `anneeScolaires`
5. `etablissements`
6. `utilisateurs`
7. `eleves`
8. `classes`
9. `inscriptions`
10. `transferts`

Les tables sont reliées par des clés étrangères et les principales
contraintes d'intégrité ont été mises en place.
Cette étape fournit maintenant la structure nécessaire pour
commencer la création des entités PHP correspondant aux tables,
puis la mise en place des repositories et des services.
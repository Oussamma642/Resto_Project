# Projet de Restaurant

## Description
Ce répertoire représente le côté Admin qui gère plusieurs fonctionnalités relatives à un projet de restaurant. Il est composé de 4 dossiers principaux. Dans chaque dossier, il existe des sous-dossiers/sous-fichiers.

## Structure du projet
La structure du projet est comme suit :

### Dossier `css`
- `style.css`  
- `boostrap.css`  

### Dossier `Dashbord-admin`
#### Dossier `Classes`
Ce dossier contient toutes les classes qui gèrent le traitement du backend et communiquent avec la base de données.

##### Dossier `DbhConnection`
- `Dbh.php` (Liaison entre PHP et la base de données)

##### Dossier `UserClasses`
- `clsAddNewUser.php` (Classe pour ajouter un nouvel utilisateur)
- `clsDeleteUser.php` (Classe pour supprimer un utilisateur)
- `clsListUser.php` (Classe qui retourne la liste des utilisateurs ayant le rôle d'admin)
- `clsPermission.php` (Classe qui détermine la structure des permissions des utilisateurs)
- `clsModifyUser.php` (Classe pour modifier les informations d'un utilisateur)
- `clsUser.php` (Classe principale d'un utilisateur, contenant le constructeur et les opérations principales. Les autres classes servent de liaison avec cette classe.)

#### Dossier `ReservationClasses`
Ce dossier contient les classes qui traitent la partie backend des opérations liées aux réservations.
- `AcceptReservation.php` (Classe pour accepter une réservation)
- `CancelReservation.php` (Classe pour annuler une réservation)
- `LstReservation.php` (Classe qui retourne la liste des réservations)
- `MainClass.php` (Classe principale pour tout ce qui concerne une réservation)

#### Dossier `OrderClasses`
Ce dossier contient les classes qui traitent la partie backend des opérations liées aux commandes.
- `LstOrder.php` (Liste des commandes)
- `ModifyOrder.php` (Classe pour modifier une commande)
- `MainClass.php` (Classe principale des commandes)

#### Dossier `OpeningClosingClasses`
Ce dossier contient une seule classe pour gérer les horaires d'ouverture et de fermeture du restaurant pendant toute la semaine.
- `clsOpeningClose.php` (Classe qui gère les horaires d'ouverture/fermeture du restaurant)

#### fichiers des interface (côté client) dans `Dashbord-admin`
- `Comments.php` (Interface des commentaires)
- `Contact.php` (Interface des contacts)
- `Dishes.php` (Interface du menu des plats)
- `Home.php` (Interface d'accueil)
- `Logout.php` (Fichier qui gère le traitement de la déconnexion)
- `OpClose.php` (Interface pour l'ouverture/fermeture)
- `Orders.php` (Interface des commandes)
- `Reservations.php` (Interface des réservations)
- `Users.php` (Interface des utilisateurs)

### Dossier `Base de Données`
Ce dossier contient les fichiers relatifs à la base de données.

- `Creation.sql` (Syntaxe pour la création de la base de données et des tables)

#### Dossier `Users`
Ce dossier contient tout ce qui concerne les utilisateurs dans la base de données.
- `Insertion.sql` (Inserts des données utilisateur)
- `InsertionProc.sql` (Procédure pour insérer un utilisateur)
- `ListUsersProc.sql` (Procédure pour lister tous les utilisateurs)
- `UpdateProc.sql` (Procédure pour modifier un utilisateur)

#### Dossier `Reservations`
- `contient des fichiers sql pour les reservations dans la base des donnees`
#### Dossier `OuvertureFermeture`
- `contient des fichiers sql pour les Ouverture/Fermeture dans la base des donnees`
#### Dossier `Oders`
- `contient des fichiers sql pour les commandes dans la base des donnees`
#### Dossier `Menu_items`
### Dossier `Images`
Ce dossier contient toutes les images nécessaires pour l'interface.


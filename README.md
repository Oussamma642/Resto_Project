# Projet de Restaurant
## Ce répo represente le côté Admin qui gère plusieurs fonctionnalités relatives à un projet restaurant.
## Il est composé de 4 dossiers principaux, Dans chaque dossier, il existe des sous-dossiers/sous-fichiers.
## La structure du projet est comme suivie:
* Dossier css
  *fichier style.css
  *fichier boostrap.css 
*Dossier Dashbord-admin
  *Dossier Classes (Il contient toutes les classes qui gèrent le traitement du backend et communiquent avec la base des données)
    *Dossier DbhConnection
      *Fichier Dbh.php (Liaise le php avec la base des données)
    * Dossier UserClasses
      *clsAddNewUser.php (fichier contient La classe qui ajoute un nouveau Utilisateur)
      *clsDeleteUser.php (fichier contient La classe qui supprime un utilisateur)
      *clsListUser.php (fichier contient La classe qui retourne la list des utilisateur ayant le role admin)
      *clsPermission.php (fichier contient La classe qui détérmine la structure a laquelle les permissions des utilisateur doit-etre par)
      *clsModifyUser.php (fichier contient La classe qui modifier les infos d'un utilisateur)
      *clsUser.php(fichier contient la classe principale d'un utilisateur qui contient le constructeur et les operations principales, cvd les classes au-dessous sont toutes des liason qui         commuinique avec cette classe)
    * Dossier ReservationClasses (Le dossier qui contient les classes qui traitent la partie back-end des operations faites sur les reservations)
      *AcceptReservation.php (fichier pour accepter une reservation)
      *CancelReeservation.php (fichier pour refuser une reservation)
      *LstReservation.php (fichier qui retourne les listes des reservations)
      *MainClass.php (fichier qui contient la class principale de tous ce qui concerne une reservation)
    *Dossier OrderClasses (Le dossier qui contient les classes qui traitent la partie back-end des operations faites sur les commandes)
      *Fichier LstOrder.php (Listes des commandes)
      *Fichier ModifyOrder.php (Modifier une commande)
      *Fichier MainClass.php (La classe principale des commandes)
    *Dossier OpeningClosingClasses (Dossier contient une seule classe pour gerer le tempe des ouvertures/fermetures du resto pendant toutes la semaine)
        *Fichier clsOpeningClose.php (Contient la classe qui gere le tempe des ouvertures/fermetures du resto pendant toutes la semaine)
    *Fichier Comments.php (L'interface des commentaires)
    *Fichier Contact.php (L'interface des contact)
    *Fichier Dishes.php (L'interface des Menu PLat)
    *Fichier Home.php (L'interface Home)
    *Fichier Logout.php (Fichier qui gere le traitement de deconnexion)
    *Fichier OpClose.php (L'interface ouverture/fermeture )
    *Fichier Orders.php (L'interface des comamndes)
    *Fichier Reservations.php (L'interface des reservations)
    *Fichier Users.php (L'interface des utilisateurs)
*Dossier de la base des données
  *Fichier Creation.sql (La syntax de la creation de la base des donnees avec les tables)
  *Dossier Users (Contient tous ce qui conserne l'utilisateur dans la base donnees)
    *Insertion.sql (les inertions des donnees user)
    *InsertionProc.sql (La procedure qui insere un utilisateur)
    *ListUsersProc.sql (Procedure qui liste toutes les utilisateur)
    *UpdatePro.sql (Procedure qui modifier un utilisateur)
*Dossier des images

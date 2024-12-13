<?php

// include_once '../UserClasses/clsUser.php';

include_once 'C:\xampp\desktop\htdocs\Resto_Project\Dashbord-Menu\Classes\UserClasses\clsUser.php';

include_once 'clsReservation.php';

class clsAddNewReservation{
    
    private static function _CheckForms(){

        return (
            isset($_POST['firstName']) &&
            isset($_POST['lastName']) &&
            isset($_POST['email']) &&
            isset($_POST['phoneNumber']) &&
            isset($_POST['nbrGuests']) &&
            isset($_POST['date']) &&
            isset($_POST['time']) 
        );
    }

    // public static function AddNewReservation(){

    //     if (self::_CheckForms()){

    //         $usrId = null;
    //         $currUser = clsUser::Find($_POST['email'], '0000');

    //         if ($currUser == null){  
                     
    //             $currUser = new clsUser(
    //                 null, 
    //                 trim($_POST['firstName']), 
    //                 trim($_POST['lastName']), 
    //                 trim($_POST['email']), 
    //                 '0000', 
    //                 trim($_POST['phoneNumber']), 
    //                 'client', 
    //                 0
    //             );
    //             $usrId = $currUser->Save();   
    //             echo '<script> console.log("Non Existe") </script>';
    //             echo '<script> console.log(' . $usrId . ') </script>';
    //         }
    //         else{
    //             $usrId = $currUser->getUserId();
    //             $name = $currUser->getLastName();
    //             echo '<script> console.log("Existe") </script>';
    //             echo "<script> console.log('$name') </script>";
    //             echo "<script> console.log('$usrId') </script>";
    //         }
    //         $usrId = $currUser->getUserId();
            
            
    //         $nbrTables = 1;
    //         $nbrGuests = $_POST['nbrGuests'];

    //         if ($nbrGuests > 4){
    //             $nbrTables = ceil($nbrGuests / 4) ;
    //         }

    //         clsReservation::AddNewReservation($usrId, $_POST['date'], $_POST['time'], $_POST['nbrGuests'], $nbrTables);

    //         unset($currUser);
    //     }

    // }


    public static function AddNewReservation()
    {
        if (self::_CheckForms()) {
            // Initialisation de l'ID utilisateur
            $usrId = null;
    
            // Recherche de l'utilisateur existant
            $currUser = clsUser::Find($_POST['email'], '0000');
    
            if ($currUser === null) {  
                // Si l'utilisateur n'existe pas, le créer
                $currUser = new clsUser(
                    null, 
                    trim($_POST['firstName']), 
                    trim($_POST['lastName']), 
                    trim($_POST['email']), 
                    '0000', 
                    trim($_POST['phoneNumber']), 
                    'client', 
                    0
                );
    
                // Sauvegarder l'utilisateur et récupérer l'ID
                $usrId = $currUser->Save();
                if ($usrId === null) {
                    echo '<script> console.error("Erreur : impossible de créer l\'utilisateur.") </script>';
                    return; // Arrêter l'exécution si la création échoue
                }
                echo '<script> console.log("Utilisateur créé avec succès : ID ' . $usrId . '") </script>';
            } else {
                // Si l'utilisateur existe, récupérer son ID
                $usrId = $currUser->getUserId();
                echo '<script> console.log("Utilisateur existant trouvé : ID ' . $usrId . '") </script>';
            }
    
            // Calcul du nombre de tables nécessaires
            $nbrGuests = (int) $_POST['nbrGuests'];
            $nbrTables = ($nbrGuests > 4) ? ceil($nbrGuests / 4) : 1;
    
            // Ajouter la réservation
            $result = clsReservation::AddNewReservation(
                $usrId,
                $_POST['date'],
                $_POST['time'],
                $nbrGuests,
                $nbrTables
            );
    
            // Vérifier si la réservation a été ajoutée avec succès
            if ($result) {
                echo '<script> console.log("Réservation ajoutée avec succès.") </script>';
            } else {
                echo '<script> console.error("Erreur : impossible d\'ajouter la réservation.") </script>';
            }
    
            // Nettoyage
            unset($currUser);
        }
    }
    

    public static function Test(){

        echo $_POST['firstName'] . '<br><br>';
        echo $_POST['lastName'] . '<br><br>';
        echo $_POST['email'] . '<br><br>';
        echo $_POST['phoneNumber'] . '<br><br>';
        echo $_POST['nbrGuests'] . '<br><br>';
        echo $_POST['date'] . '<br><br>';
        echo $_POST['time'] . '<br><br>';

    }
}
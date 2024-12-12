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

    public static function AddNewReservation(){

        if (self::_CheckForms()){

            // $usrId = null;
            $currUser = clsUser::Find($_POST['email'], '0000');

            if ($currUser == null){  
                     
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
                $usrId = $currUser->Save();   
                echo '<script> console.log("Non Existe") </script>';

            }
            else{
                $usrId = $currUser->getUserId();
                echo '<script> console.log("Existe") </script>';
            }
            clsReservation::AddNewReservation($usrId, $_POST['date'], $_POST['time'], $_POST['nbrGuests']);

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
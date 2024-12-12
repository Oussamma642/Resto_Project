<?php

include_once '../UserClasses/clsUser.php';

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
        // ("CALL add_new_user('$fname', '$lname', '$email', '$pswd', '$role', '$phone', $prmsn)");

        if (self::_CheckForms()){

            $usrId = null;
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
            }
            else{
                $usrId = $currUser->getUserId();
            }
            clsReservation::AddNewReservation($userId, $_POST['date'], $_POST['time'], $_POST['nbrGuests']);
        }

    }

}
<?php

include_once 'clsContact.php';

class clsModifyContact
{
    public static function ModifyContact()
    {
        if (
            isset($_POST['contactId']) && 
            isset($_POST['email']) && 
            isset($_POST['reponse']) &&
            !empty(trim($_POST['reponse']))
            )
            {
                $mod = clsContact::ModifyContact($_POST['contactId'], $_POST['reponse'], 'resolved');
                
                $_SESSION['ContactStatusMessage'] = ($mod) ? 
                "The respone has been succufully sent" :
                "Failed to send the response!!";
            }
        else
            {
                $_SESSION['ContactStatusMessage'] = "Missing field, check your form inputs!!";
            }
        header("location:../Dashbord-Menu/Contact.php");
        exit();
    }

}
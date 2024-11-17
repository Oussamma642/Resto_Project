<?php

include_once 'clsContact.php';

class clsModifyContact
{
    public static function ModifyContact()
    {
        // Start the session to access session variables
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Check if the current user is set in the session
        if (!isset($_SESSION['currUser'])) {
            $_SESSION['ContactStatusMessage'] = "User is not logged in.";
            header("location:../Dashbord-Menu/Contact.php");
            exit();
        }

        $currUser = $_SESSION['currUser']; // Retrieve the current user object from the session

        if (
            isset($_POST['contactId']) && 
            isset($_POST['email']) && 
            isset($_POST['subject']) &&
            isset($_POST['reponse']) &&
            !empty(trim($_POST['reponse']))
        ) {
            $mod = clsContact::ModifyContact($_POST['contactId'], $_POST['reponse'], 'resolved');

            if ($mod) {
                $currUser->SendMail($_POST['email'], $_POST['subject'], $_POST['reponse']);
            }
            
            // $_SESSION['ContactStatusMessage'] = ($mod) ? 
            // "The response has been successfully sent" :
            // "Failed to send the response!!";
        } else {
            $_SESSION['ContactStatusMessage'] = "Missing field, check your form inputs!!";
        }
        header("location:../Dashbord-Menu/Contact.php");
        exit();
    }
}
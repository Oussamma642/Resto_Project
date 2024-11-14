<?php


include_once 'clsUser.php';

class clsAddNewUser
{
    public static function AddNewUser()
    {
        if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phoneNumber']) && isset($_POST['permissions']))
        {
            echo "<script type='text/javascript'>alert('Yes');</script>";        
        }
        else
        {
            header("location:../Dashbord-Menu/Users.php");
        }
    
    }
}
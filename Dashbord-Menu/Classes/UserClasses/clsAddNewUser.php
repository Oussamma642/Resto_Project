<?php


// user_id INT AUTO_INCREMENT PRIMARY KEY,
// first_name VARCHAR(100) NOT NULL,
// last_name VARCHAR(100) NOT NULL,
// email VARCHAR(150) NOT NULL UNIQUE,
// password VARCHAR(255) NOT NULL,
// role ENUM('admin', 'client') NOT NULL,
// phone_number VARCHAR(20),
// permissions int,


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
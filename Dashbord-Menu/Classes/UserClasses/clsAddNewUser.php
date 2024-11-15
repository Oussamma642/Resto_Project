<?php

include_once 'clsUser.php';

class clsAddNewUser
{
    // private static $_permissions = 0;

    // private static function handlePermissions($perms)
    // {
    //     foreach($perms as $p) {
    //         self::$_permissions += $p; 
    //     }
    // }

    public static function AddNewUser()
    {
        if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phoneNumber']) && isset($_POST['permissions'])) {

            echo "Yes";

            // $perms = $_POST['permissions'];
            // if (in_array(-1, $perms)) {
            //     echo 'All permissions selected<br><br>';
            //     return; 
            // } 
            // else {
            //     self::handlePermissions($perms);
            //     echo 'Permissions result: ' . self::$_permissions;
            // }
        } 
        else {
            
            echo "No";
            // header("location:../Dashbord-Menu/Users.php");
        }
    }
}
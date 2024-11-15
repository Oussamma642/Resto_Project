<?php

include_once 'clsUser.php';

class clsAddNewUser
{
    private static $_permissions = 0;

    private static function handlePermissions($perms)
    {
        foreach($perms as $p) {
            self::$_permissions += $p; 
        }
    }

    public static function AddNewUser()
    {
        if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phoneNumber']) && isset($_POST['permissions'])) {


            $perms = $_POST['permissions'];
            
            if (in_array(-1, $perms)) 
            {
                echo "<script>console.log('All permissions selected')</script>";
                return; 
            } 
            else {
                self::handlePermissions($perms);
                $p = self::$_permissions;
                echo "<script>console.log('The selected Permissions are: $p')</script>";
            
            }
        } 
        else {
            
            
            header("location:../Dashbord-Menu/Users.php");
        }
    }
}
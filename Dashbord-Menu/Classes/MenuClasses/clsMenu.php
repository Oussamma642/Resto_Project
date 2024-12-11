<?php


class clsMenu
{  
    private static function Conncect()
    {
        include_once 'C:\xampp\desktop\htdocs\Resto_Project\Dashbord-Menu\Classes\DbhConnection\Dbh.php';
        return Dbh::connect();
    }

    // Reservations List
    public static function ListMenu()
    { 
        // Conncet with DB
        $conn = self::Conncect();

        // Prepare and execute the statement
        $stmt = $conn->prepare("CALL GetMenuItems()");
        $stmt->execute();

        // Fetch all reservations as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
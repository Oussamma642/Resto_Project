<?php

class clsOrders
{

    private static function Conncect()
    {
        include_once 'C:\xampp\desktop\htdocs\Resto_Project\Dashbord-Menu\Classes\DbhConnection\Dbh.php';
        return Dbh::connect();
    }

    public static function LstOrders()
    {
        // Conncet with DB
        $conn = clsOrders::Conncect();
        // Prepare and execute the statement
        $stmt = $conn->prepare("CALL Orders_Liste()");
        $stmt->execute();
        
        // Fetch all reservations as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function ModifyOrder($id, $status)
    {
        // Conncet with DB
        $conn = clsOrders::Conncect();
        // Prepare and execute the statement
        $stmt = $conn->prepare("CALL ModifyOrder($id, '$status')");
        return $stmt->execute();
    }
}
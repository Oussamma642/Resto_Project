<?php

class clsContact
{
    private static function Connect()
    {
        include_once 'C:\xampp\desktop\htdocs\Resto_Project\Dashbord-Menu\Classes\DbhConnection\Dbh.php';
        return Dbh::connect();
    }

    public static function ListContacts()
    {
        // Conncet with DB
        $conn = self::Connect();

        $stmt = $conn->prepare("CALL List_Contacts()");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
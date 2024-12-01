<?php

include_once 'C:\xampp\desktop\htdocs\Resto_Project\Dashbord-Menu\Classes\ContactsClasses\clsContact.php';
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

    public static function LstContentOrder($orderID)
    {
        // Conncet with DB
        $conn = clsOrders::Conncect();
        // Prepare and execute the statement
        $stmt = $conn->prepare("CALL Order_Items_Details($orderID)");
        $stmt->execute();
        // Fetch all reservations as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    

    public static function ModifyOrder($id, $status, $email, $lname) : bool
    {
        // Conncet with DB
        $conn = clsOrders::Conncect();
        // Prepare and execute the statement
        $stmt = $conn->prepare("CALL ModifyOrder($id, '$status')");
        $stmt->execute();

        if ($stmt){

            // public static function SendMail($To, $fullname , $subject, $response, $reservation=false, $status="confirmed",$order=false, $statusOrder="completed")
            // {        
            //     self::_SendMail($To, $fullname , $subject, trim($response), $reservation, $status, $order, $statusOrder);   
            // }
        
            
            clsContact::SendMail($email, $lname, "Votre commande", "", false, "", true, $status);
            return true;
        }
        return false;
    }
}
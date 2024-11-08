<?php


class clsReservation
{

    private static function Conncect()
    {
        include_once 'C:\xampp\desktop\htdocs\Resto_Project\Dashbord-Menu\Classes\DbhConnection\Dbh.php';
        return Dbh::connect();
    }

    // Reservations List
    public static function ListReservation()
    {
        
        // Conncet with DB
        $conn = clsReservation::Conncect();

        // Prepare and execute the statement
        $stmt = $conn->prepare("CALL Reservation_List()");
        $stmt->execute();

        // Fetch all reservations as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function AcceptReservation($id)
    {
        $conn = clsReservation::Conncect();
        $stmt = $conn->prepare("CALL ModifyReservationStatus($id, 'confirmed')");
        return $stmt->execute();
    }
    
    public static function CancelReservation($id)
    {
        $conn = clsReservation::Conncect();
        $stmt = $conn->prepare("CALL ModifyReservationStatus($id, 'canceled')");
        return $stmt->execute();
    }   
}
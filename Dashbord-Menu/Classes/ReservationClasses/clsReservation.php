<?php


include_once 'C:\xampp\desktop\htdocs\Resto_Project\Dashbord-Menu\Classes\ContactsClasses\clsContact.php';
class clsReservation
{

    protected $Contact;
    
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
  
    public function __construct()
    {
        $this->Contact = new clsContact();   
    }

    public static function ModifyReservation($id, $status, $email, $lname) : bool
    {
        $conn = clsReservation::Conncect();
        
        $stmt = $conn->prepare("CALL ModifyReservationStatus($id, '$status')");
        $stmt->execute();

        if ($stmt)
        {
            // private static function _SendMail($To, $fullname , $subject, $response, $reservation=false, $status="", $order=false, $statusOrder="") : void

            clsContact::SendMail($email, $lname, "Votre Reservation", "", true, $status);
            return true;
        }
        else {
            return false;
        }

    }
    
}
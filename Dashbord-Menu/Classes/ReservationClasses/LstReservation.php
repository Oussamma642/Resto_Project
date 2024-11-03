<?php



//include_once '../Classes/DbhConnection/Dbh.php';

include_once 'C:\xampp\desktop\htdocs\Resto_Project\Dashbord-Menu\Classes\DbhConnection\Dbh.php';

// class clsLstReservations extends clsDbh
// {
//     static public function getLstReservation()
//     {

//         $stmt = parent::connect()->prepare("call Reservation_List()");
//         $stmt->execute();
//         return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all reservations as an associative array
//     }
// }

class clsLstReservations 
{
    static public function getLstReservation()
    {
        // Get the database connection
        $conn = Dbh::connect();

        // Prepare and execute the statement
        $stmt = $conn->prepare("CALL Reservation_List()");
        $stmt->execute();

        // Fetch all reservations as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Usage example:
// $reservations = clsLstReservations::getLstReservation();
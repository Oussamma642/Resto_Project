<?php



//include_once '../Classes/DbhConnection/Dbh.php';

include_once 'C:\xampp\desktop\htdocs\Resto_Project\Dashbord-Menu\Classes\DbhConnection\Dbh.php';

class clsLstReservations extends clsDbh
{
    static public function getLstReservation()
    {

        $stmt = parent::connect()->prepare("select u.user_id, r.reservation_id, u.first_name, u.last_name, r.reservation_date, r.time_slot, r.nbrGuests, r.status 
                                from user u 
                                inner join reservations r on u.user_id = r.user_id;
                                ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all reservations as an associative array
    }
}
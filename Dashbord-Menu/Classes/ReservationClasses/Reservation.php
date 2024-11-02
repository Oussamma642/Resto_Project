<?php


/*
 

    reservation_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    reservation_date DATE NOT NULL,
    time_slot TIME NOT NULL,
    number_of_guests INT NOT NULL,  -- Suppression du CHECK
    status ENUM('pending', 'confirmed', 'canceled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE

*/

// include_once '../Classes/DbhConnection/Dbh.php'


// class clsReservation extends clsDbh
// {
//     private $userID;
//     private $lname;
//     private $resID;
//     private $resDate;
//     private $timeSlot;
//     private $nbrGuests;
//     private $status;

//     public function __construct($userID, $resID, $lname, $resDate, $timeSlot, $nbrGuests, $status) {
//         $this->userID = $userID;
//         $this->resID = $resID;
//         $this->lname = $lname;
//         $this->resDate = $resDate;
//         $this->timeSlot = $timeSlot;
//         $this->nbrGuests = $nbrGuests;
//         $this->status = $status;
//     }

//     // Getters
//     public function getUserID() {
//         return $this->userID;
//     }

//     public function getLname() {
//         return $this->lname;
//     }

//     public function getResID() {
//         return $this->resID;
//     }

//     public function getResDate() {
//         return $this->resDate;
//     }

//     public function getTimeSlot() {
//         return $this->timeSlot;
//     }

//     public function getNbrGuests() {
//         return $this->nbrGuests;
//     }

//     public function getStatus() {
//         return $this->status;
//     }

//     // Setters
//     public function setUserID($userID) {
//         $this->userID = $userID;
//     }

//     public function setLname($lname) {
//         $this->lname = $lname;
//     }

//     public function setResID($resID) {
//         $this->resID = $resID;
//     }

//     public function setResDate($resDate) {
//         $this->resDate = $resDate;
//     }

//     public function setTimeSlot($timeSlot) {
//         $this->timeSlot = $timeSlot;
//     }

//     public function setNbrGuests($nbrGuests) {
//         $this->nbrGuests = $nbrGuests;
//     }

//     public function setStatus($status) {
//         $this->status = $status;
//     }

//     // Load Reservations from the database

//     static function loadReservations()
//     {

//         $query = "SELECT * FROM reservations";
//         $stmt = $pdo->query($query);
//     }

//     // Get Reservation List
//     static function getReservationList()
//     {
        
//     } 
// }
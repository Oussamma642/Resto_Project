<?php


class clsUser
{

    private $user_id;
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $phone_number;
    private $role;
    
    private static function Conncect()
    {
        include_once 'C:\xampp\desktop\htdocs\Resto_Project\Dashbord-Menu\Classes\DbhConnection\Dbh.php';
        return Dbh::connect();
    }
    
    public function __construct($id, $fname, $lname, $email, $pswd, $phone ,$role)
    {
        $this->user_id = $id;
        $this->first_name = $fname;
        $this->last_name = $lname;
        $this->email = $email;
        $this->password = $pswd;
        $this->phone_number = $phone;
        $this->role = $role;
    }    

    public function Find($username, $pswd)
    {
        $conn = clsReservation::Conncect();

        // Prepare and execute the statement
        $stmt = $conn->prepare("SELECT email, password FROM ");
        $stmt->execute();

        // Fetch all reservations as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    
    

}
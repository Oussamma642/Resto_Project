<?php

include_once './Global.php';

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


    // Find The user 
    public static function Find($email, $pswd)
    {
        $conn = clsUser::Conncect();

        // Prepare and execute the statement
        $stmt = $conn->prepare("SELECT * from users where password = '$pswd' and email='$email'");
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) 
        {
            $currUser = new clsUser($user['user_id'], $user['first_name'], $user['last_name'], $user['email'], $user['password'], $user['phone_number'], $user['role']);
            return $currUser;
        }
        else
            return null;
    }
  
    
     // Getter for user_id (read-only)
     public function getUserId()
     {
         return $this->user_id;
     }
 
     // Getter and setter for first_name
     public function getFirstName()
     {
         return $this->first_name;
     }
 
     public function setFirstName($fname)
     {
         $this->first_name = $fname;
     }
 
     // Getter and setter for last_name
     public function getLastName()
     {
         return $this->last_name;
     }
 
     public function setLastName($lname)
     {
         $this->last_name = $lname;
     }
 
     // Getter and setter for email
     public function getEmail()
     {
         return $this->email;
     }
 
     public function setEmail($email)
     {
         $this->email = $email;
     }
 
     // Getter and setter for password
     public function getPassword()
     {
         return $this->password;
     }
 
     public function setPassword($pswd)
     {
         $this->password = $pswd;
     }
 
     // Getter and setter for phone_number
     public function getPhoneNumber()
     {
         return $this->phone_number;
     }
 
     public function setPhoneNumber($phone)
     {
         $this->phone_number = $phone;
     }
 
     // Getter and setter for role
     public function getRole()
     {
         return $this->role;
     }
 
     public function setRole($role)
     {
         $this->role = $role;
     }
 }
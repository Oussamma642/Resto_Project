<?php


/* 
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'client') NOT NULL,
    phone_number VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

*/

class clsUser
{
    private $id;
    private $fname;
    private $lname;
    private $email;
    private $password;
    private $role;
    private $phoneNumber;
    
    public function __construct($id, $fname, $lname, $email, $password, $role, $phoneNumber)
    {
        $this->id = $id;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->$password = $password;
        $this->role = $role;
    }
    
    // Getters
    public function getID(){return $this->id;} // Read Only
    public function getFname(){return $this->fname;}
    public function getLname(){return $this->lname;}
    public function getEmail(){return $this->email;}
    public function getPassword(){return $this->password;} 
    public function getRole(){return $this->role;} // Read Only
    public function getPhoneNumber(){return $this->phoneNumber;} 

    // Setters 

    public function setFname($fname){$this->fname = $fname;}
    public function setLname($lname){ $this->lname = $lname;}
    public function setEmail($email){$this->email= $email;}
    public function setPassword($pswd){ $this->password = $pswd;} 
    public function setRole($role){ $this->role = $role;} // Read Only
    public function setPhoneNumber($phone){ $this->phoneNumber = $phone;} 


}
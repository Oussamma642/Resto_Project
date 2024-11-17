<?php

// Important File to send an email
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
    
//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include_once 'clsPermissions.php';

class clsUser
{
    private $user_id;
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $phone_number;
    private $role;
    private $permissions;
        
    private function _SendMail($To, $subject, $respone)
    {
        $mail = new PHPMailer(true);

        //Server settings
        $mail->isSMTP();                              //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;             //Enable SMTP authentication
        $mail->Username   = 'sadosami297@gmail.com';   //SMTP write your email
        $mail->Password   = 'egtmqgkttoorpfek';      //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
        $mail->Port       = 465;                                    
    
        //Recipients
        $mail->setFrom('sadosami297@gmail.com', "Oussama"); // Sender Email and name
        $mail->addAddress($To);     //Add a recipient email  
        $mail->addReplyTo('sadosami297@gmail.com', "Oussama"); // reply to sender email
    
        //Content
        $mail->isHTML(true);               //Set email format to HTML
        $mail->Subject = $subject;   // email subject headings
        $mail->Body    = $respone; //email message
    
        // Success sent message alert
        $mail->send();
        echo
        " 
        <script> 
         alert('Message was sent successfully!');
         document.location.href = 'index.php';
        </script>
        ";
    
    }

    private static function Conncect()
    {
        include_once 'C:\xampp\desktop\htdocs\Resto_Project\Dashbord-Menu\Classes\DbhConnection\Dbh.php';
        return Dbh::connect();
    }
    

    public function __construct($id=null, $fname='', $lname='', $email='', $pswd='', $phone='' ,$role='', $prmsn=null)
    {
        $this->user_id = $id;
        $this->first_name = $fname;
        $this->last_name = $lname;
        $this->email = $email;
        $this->password = $pswd;
        $this->phone_number = $phone;
        $this->role = $role;
        $this->permissions = $prmsn;
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

    
     // Getter and setter for permissions
     public function getPermissions()
     {
        return $this->permissions;
     
     }

     public function setPermissions($prmsn)
     {
        $this->permissions = $prmsn;
     }
    
     // Find The user 
    public static function Find($email, $pswd)
    {
        $conn = self::Conncect();

        // Prepare and execute the statement
        $stmt = $conn->prepare("SELECT * from users where password = '$pswd' and email='$email'");
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) 
        {
            $currUser = new clsUser($user['user_id'], $user['first_name'], $user['last_name'], $user['email'], $user['password'], $user['phone_number'], $user['role'], $user['permissions']);
            return $currUser;
        }
        else
            return null;
    }

    // ListUsers
    public static function ListUsers()
    {
        $conn = clsUser::Conncect();
        // Prepare and execute the statement
        $stmt = $conn->prepare("CALL list_users_admin()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // DeleteUser
    public function DeleteUser($id)
    {
        $conn = self::Conncect();
        $stmt = $conn->prepare("DELETE FROM users WHERE user_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();

    }

    // Update Method into the database
    public function Update()
    {
        $id = $this->user_id;
        $fname = $this->first_name;
        $lname = $this->last_name;
        $email = $this->email;
        $pswd = $this->password;
        $phone = $this->phone_number;
        $role = $this->role;
        $prmsn = $this->permissions;

        $conn = self::Conncect();
        $stmt = $conn->prepare("CALL update_user($id,'$fname', '$lname', '$email', '$pswd', '$phone', '$role', $prmsn)");
        return $stmt->execute();

    }

    // Save method to insert a new user into the database
    public function Save()
    {
        $fname = $this->first_name;
        $lname = $this->last_name;
        $email = $this->email;
        $pswd = $this->password;
        $phone = $this->phone_number;
        $role = $this->role;
        $prmsn = $this->permissions;

        $conn = self::Conncect();
        $stmt = $conn->prepare("CALL add_new_user('$fname', '$lname', '$email', '$pswd', '$role', '$phone', $prmsn)");
        return $stmt->execute();
    }
    
    
    public function CheckAccessPermission(int $Permission):bool
    {
        if ($this->permissions == Permissions::All)
            return true;

        if (($this->permissions & $Permission) == $Permission)
            return true;
        else
            return false;
    }

    public function SendMail($To, $subject, $respone)
    {
        $this->_SendMail($To, $subject, $respone);   
    }
}
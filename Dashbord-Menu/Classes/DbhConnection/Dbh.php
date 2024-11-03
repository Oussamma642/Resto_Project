<?php

// class clsDbh 
// {
//     private $host = "localhost";
//     private $dbname = "restaurant";
//     private $dbusername = "root";
//     private $dbpassword = "";
    
//     protected function connect()
//     {
//         try
//         {
//             $pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->dbusername, $this->dbpassword);
//             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             return $pdo;
//         }
//         catch(PDOException $e)
//         {   
//             die("Connection failed: ". $e->getMessage());
//         }
//     }
    
// } 


class Dbh {
    protected static $conn;

    public static function connect() {
        if (!self::$conn) {
            $host = "localhost";
            $dbname = "restaurant";
            $username = "root";
            $password = "";
            
            try {
                self::$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return self::$conn;
    }
}
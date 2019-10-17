<?php

class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "Ab123456";
    private $dbname = "store";

        function connect()
    {

        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            echo "Connected successfully"."<br>";
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}
?>


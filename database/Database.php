<?php

class Database
{

    private $servername = 'localhost';
    private $username = 'rawabi';
    private $password = 'Rawabiorange@1995';
    private $dbname = 'store';


    public function connect(){
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//            echo "connected to database";
            return $conn;

        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }

    }




}


?>
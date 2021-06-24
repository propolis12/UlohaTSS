<?php


class SQLConnection
{

    private $connection;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=UlohaDubnicaTSS", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection = $conn;
            ///echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();

        }
    }
    public function getConnection() {

        return $this->connection;
    }

}
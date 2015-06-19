<?php

class MySQLConnection{

    private $connection;
    private $currentTable;

    function __construct($password){
        $servername = 'z3r0.info';
        $username = 'app';
        $dbname = 'db_app';
        $conn = new mysqli($servername, $username, $password, $dbname);

        if($conn->connect_error){
            die("Connection Failed: " . $conn->connect_error);
        }
        $this->connection = $conn;
        echo"Connected successfully <br>";
    }

    public function select(){
        $selectCommand = "SELECT * FROM title";
        $result = $this->connection->query($selectCommand);
        if($result->num_rows > 0){

            while($row = $result->fetch_assoc()){
                $titles[$row["id"]] = $row["title"];
            }
        }else{
            echo "0 results";
        }
        return $titles;
    }

}


?>

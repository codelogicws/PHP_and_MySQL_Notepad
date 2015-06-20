<?php

if(!isset($_SESSION)){
	session_start();
}

class MySQLConnection{

    private $connection;
    
    function __construct(){
    	$this->loadSession();
    }


    private static function loadSession(){
        if(!isset($_SESSION)){
           session_start();
        }
    }

    public static function makeWithPassword($password){
    	$mySQLConnection = new MySQLConnection();
    	$mySQLConnection->connectToMyDatabase($password);
        return $mySQLConnection;
    }
    
    public static function makeFromSession(){
    	$mySQLConnection = new MySQLConnection();
    	echo "Pass from session " . $_SESSION["password"];
    	$mySQLConnection->connectToMyDatabase($_SESSION["password"]);
    	return $mySQLConnection;
    }
    
    private function connectToMyDatabase($password){
        $servername = 'localhost';
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
        	return "error";
        }
        return $titles;
    }
    
    public function printServerInfo(){
    	echo $this->connection->server_info;
    }
    
    
}


?>

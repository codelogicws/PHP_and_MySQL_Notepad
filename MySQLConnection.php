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
    }
    
    public function getNote($id){
    	$stuff = $this->selectArgument("note", $id);
    	return $stuff[$id];
    }
    
    public function getTitle($id){
    	$stuff = $this->selectArgument("title", $id);
    	return $stuff[$id];
    }
    
    public function selectArgument($table, $id){
    	$command = "SELECT * FROM $table WHERE id='$id'";
    	return $this->returnQuery($command, $table);
    }

    public function getTitles(){
        $command = "SELECT * FROM title";
        return $this->returnQuery($command, "title");
    }
    
    public function returnQuery($command, $table){
        $result = $this->connection->query($command);
        if($result->num_rows > 0){

            while($row = $result->fetch_assoc()){
                $titles[$row["id"]] = $row[$table];
            }
        }else{
        	return "error";
        }
        return $titles;
    }
    
    public function removeNote($id){
    	$command = 'CALL removeNote("' . $id . '")';
    	$failed = !$this->connection->query($command);
    	if($failed){
    		echo '!!Could not remove the old note!!';
    		echo "<br>";
    		echo $this->connection->errno . $this->connection->error;
    	}
    }
    
    public function updateNote($id, $title, $note){
    	$command = 'CALL updateNote("' . $id . '", "' . $title . '", "' . $note . '");';
    	$failed = !$this->connection->query($command);
    	if($failed){
    		echo '!!Could not edit note!!';
    		echo "<br>";
    		echo $this->connection->errno . $this->connection->error;
    		return "Failed to update Note";
    	}else{
    		return "Successfully updated the note!";
    	}
    
    }
    
    public function addNote($title, $note){
    	$command = 'CALL addNote("' . $title . '", "' . $note . '")';
    	$failed = !$this->connection->query($command);
    	if($failed){
    		echo '!!Could not create the new note!!';
    		echo "<br>";
    		echo $this->connection->errno . $this->connection->error;
    	}
    }
    
    public function printServerInfo(){
    	echo $this->connection->server_info;
    }
    
    
}


?>

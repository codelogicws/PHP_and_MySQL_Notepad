<?php
include "MySQLConnection.php";
if(!isset($_SESSION)){
	session_start();
}

$id = $_POST["delete"];
$connection = MySQLConnection::makeWithPassword($_SESSION["password"]);
echo $connection->removeNote($id);
?>

<br><a href="notelist.php">back</a>

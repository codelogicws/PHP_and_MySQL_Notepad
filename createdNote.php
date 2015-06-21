<?php

include "MySQLConnection.php";

$title = $_POST["title"];
$note = $_POST["note"];

$connection = MySQLConnection::makeWithPassword($_SESSION["password"]);
echo $connection->addNote($title, $note);
?>
<br><a href="notelist.php">back</a>
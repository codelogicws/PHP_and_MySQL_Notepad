<?php

include "MySQLConnection.php";

$title = $_POST["title"];
$note = $_POST["note"];


echo $title;
echo "<br>";
echo $note;

$connection = MySQLConnection::makeWithPassword($_SESSION["password"]);
echo $connection->addNote($title, $note);

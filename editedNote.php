<?php

include "MySQLConnection.php";
if(!isset($_SESSION)){
	session_start();
}

$connection = MySQLConnection::makeWithPassword($_SESSION['password']);

$id = $_POST['id'];
$title = $_POST['title'];
$note = $_POST['note'];
echo $connection->updateNote($id, $title, $note);
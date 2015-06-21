<?php
include "MySQLConnection.php";
if(!isset($_SESSION)){
	session_start();
}
$passwordPostName = "password";
?>

<html>
<body>

<?php

function addButton($key, $title){
    echo $title . " (" . $key . ")<br>\n";
    echo '<button type="submit" name="note" class="bttn" value="' .
        $key . 
        '">' . 
        $title . 
        "</button><br>";
}

function addAllNoteButtons($connection){
    $titles = $connection->getTitles();
    echo '<form action="editnote.php" method="post">';
    foreach($titles as $key => $title){
        addButton($key, $title);
    }
    echo "</form>";
}

function addCreateButton(){
	echo '<form action="createNote.php" method="post">';
	echo '<input type="submit" class="bttn" name="Create New Note" value="Create New Note">';
	echo '</form>';
}

$passwordPosted = isset($_POST[$passwordPostName]);
if ($passwordPosted){
	$conn = MySQLConnection::makeWithPassword($_POST[$passwordPostName]);
	$_SESSION["password"] = $_POST[$passwordPostName];
}else{//password already exists
	$conn = MySQLConnection::makeFromSession();	
}

addAllNoteButtons($conn);
addCreateButton();


?>


</body>
</html>

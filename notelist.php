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

function addEditButton($key, $title){
    echo $title . " (" . $key . ")<br>\n";
    echo '<button type="submit" name="note" class="bttn" value="' .
        $key . 
        '">' . 
        $title . 
        "</button><br>";
}

function addDeleteButton($id){
	echo '<button type="submit" clsss="bttn" name="delete" value=" . $id . ">delete</button>';
}

function addAllNoteButtons($connection){
    $titles = $connection->getTitles();
    foreach($titles as $key => $title){
    	echo '<form action="editnote.php" method="post">';
        addEditButton($key, $title);
    	echo "</form>";
    	echo '<form action="deletedNote.php" method="post">';
    	addDeleteButton($key);
    	echo "</form>";
    	echo "<hr><p>";
    }
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

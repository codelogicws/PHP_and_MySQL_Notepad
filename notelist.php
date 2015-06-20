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
    $titles = $connection->select();
    echo '<form action="editnote.php" method="post">';
    foreach($titles as $key => $title){
        addButton($key, $title);
    }
    echo "</form>";
}

$passwordPosted = isset($_POST[$passwordPostName]);
if ($passwordPosted){
	$conn = MySQLConnection::makeWithPassword($_POST[$passwordPostName]);
	$_SESSION["password"] = $_POST[$passwordPostName];
}else{//password already exists
	echo "got Here";
	$conn = MySQLConnection::makeFromSession();	
}

addAllNoteButtons($conn);

?>


</body>
</html>

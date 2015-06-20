<?php
include "MySQLConnection.php";
if(!isset($_SESSION)){
	session_start();
}
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

$conn;

if (isset($_POST['password'])){
	$conn = MySQLConnection::makeWithPassword($_POST["password"]);
	$_SESSION["password"] = $_POST["password"];
}else{
	echo "got Here";
	$conn = MySQLConnection::makeFromSession();	
}

addAllNoteButtons($conn);

?>


</body>
</html>

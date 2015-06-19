<?php
include "MySQLConnection.php";
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

echo "<br>";
$conn = new MySQLConnection($_POST["password"]);
addAllNoteButtons($conn);

?>


</body>
</html>

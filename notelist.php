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

echo "<br>";
$conn = new MySQLConnection($_POST["password"]);
$titles = $conn->select();

echo '<form action="editnote.php" method="post">';

foreach($titles as $key => $title){
    addButton($key, $title);
}

echo "</form>";

?>


</body>
</html>

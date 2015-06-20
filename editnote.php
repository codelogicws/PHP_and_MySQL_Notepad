<?php
include "MySQLConnection.php";
?>

<html><body>

<?php
    echo $_POST["note"] . "<br>";
    $connection = MySQLConnection::makeFromSession();

?>

</body></html>

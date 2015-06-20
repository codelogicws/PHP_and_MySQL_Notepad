<?php
include "MySQLConnection.php";
?>

<html><body>

<?php
    echo $_POST["note"];
    $connection = MySQLConnection::makeFromSession();
    
    

?>

</body></html>

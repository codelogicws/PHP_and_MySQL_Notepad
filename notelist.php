<?php
include "MySQLConnection.php";
?>

<html>
<body>

<?php

    echo "<br>";
    $conn = new MySQLConnection($_POST["password"]);
    $titles = $conn->select();
    foreach($titles as $key => $val){
        echo $val . " (" . $key . ")<br>";
    }

?>


</body>
</html>

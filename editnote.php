<?php
include "MySQLConnection.php";
?>

<html><body>

<?php
    $id = $_POST["note"];
    $connection = MySQLConnection::makeFromSession();
    $note = $connection->getNote($id);

?>

<form>
<center>
	<input type="text" size="60">
	<br>
	<textarea name="note" cols="60" rows="10"><?php echo '"' . $note . '"'?></textarea>
	<br>
</center>
</form>

</body></html>

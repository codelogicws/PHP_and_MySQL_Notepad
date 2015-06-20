<?php
include "MySQLConnection.php";
?>

<html><body>

<?php
    $id = $_POST["note"];
    $connection = MySQLConnection::makeFromSession();
    $note = $connection->getNote($id);
    $title = $connection->getTitle($id);

?>

<form>
	<input type="text" value=<?php echo '"' . $title . '"'?>>
	<br>
	<textarea rows="10" cols="50"><?php echo $note?></textarea>
</form>
<a href="notelist.php">Back</a>

</body></html>

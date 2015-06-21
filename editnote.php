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

<form action="editedNote.php" method="post">
	<input type="hidden" name="id" value="<?php echo $id ?>">
	<input type="text" name="title" value=<?php echo '"' . $title . '"'?>>
	<br>
	<textarea name="note" rows="10" cols="50"><?php echo $note?></textarea>
	<br>
	<input type="submit">
</form>
<a href="notelist.php">Back</a>

</body></html>

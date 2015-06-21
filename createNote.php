<?php

include "MySQLConnection.php";

?>

<form action="createdNote.php" method="post">
<input type="hidden" name="id">
	<input type="text" name="title">
	<br>
	<textarea name="note" rows="10" cols="50"></textarea>
	<br>
	<input type="submit">
</form>
<a href="notelist.php">Back</a>
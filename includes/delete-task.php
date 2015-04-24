<?php
	$task_id = strip_tags($_POST['id']);//task id take away tags
	require('connect.php');//requiring the connect.php file
	$mysqli = new mysqli('localhost', 'root', 'root', 'todo-list');//new mysqli connection
	$result = $mysqli->query("DELETE FROM tasks WHERE id='$task_id'");
	
	if ($result) {//if result is a query delete task id
		
	}
?>
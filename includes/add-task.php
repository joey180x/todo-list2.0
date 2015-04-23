<?php
 $task = strip_tags($_POST['task']);//stripiing  tags
 $date = date('Y-m-d');//adding date
 $time = date('H:i:s');//adding time

 include('connect.php');//adding connect.php

 $mysqli = new mysqli('localhost', 'root', 'root', 'todo-list');//connecting to database
 $mysqli ->query("INSERT INTO tasks VALUES ('', '$task', '$date', '$time')");//inserting values into query

 $query = "SELECT * FROM tasks WHERE task='$task' and date='$date' and time='$time' ";

 if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc())
			$task_id = $row['id'];
			$task_name = $row['task'];
			
	}

	$mysqli->close();
	
	echo '<li><span>'.task_name.'</span><img id"'.task.id.'" class="delete-button" width=10px" src"image/close.svg" /></li'>;
?>
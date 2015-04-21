<?php
$mysqli = new mysqli('localhost', 'root', 'root', 'todo-list'); //connecting to database on phpmyadmin
if ($mysqli->connect_error){//if theres a connection error
	die('Connect Error (' . $mysqli->connect_errno . ')'//kill it
		. $mysqli->connect_error);//if theres an error
}
else{//if not
	echo"Connection made";// tell user that connection has been made
}
$mysqli->close();////closes mysqli

?>
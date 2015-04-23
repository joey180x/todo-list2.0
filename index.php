<!DOCTYPE html>
<html>
<head>
	<title>To-do List 2.0</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="wrap">
		<div class="task-list">
			<ul>
			<?php require("includes/connect.php");//requiring connect.php file to connect to database-->
				 $mysqli = new mysqli('localhost', 'root', 'root', 'todo-list');//connecting to database
				$query = "SELECT * FROM tasks ORDER BY date ASC, time ASC";//query information, order by date and time
				if ($result = $mysqli->query($query)) {//if result is a query
					$numrows = $result->num_rows;//number of rows
					if ($numrows>0) {//if number of rows is gretaer than 0
						while($row = $result->fetch_assoc()){//fetch associated
							$task_id = $row['id'];//task id
							$task_name = $row['task'];//and task name

							echo "<li>
							<span>'.$task_name'
							";
						}
					}
				}

				?>
			</ul>
		</div>
	<form class="add-new-task" autocomplete="off">
		<input type="text" name="new-task" placeholder="Add new item.."/>
	</form>
</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
	add_task();//calling the add task function

	function add_task(){
		$('.add-new-task').submit(function(){
			var new_task = $('.add-new-task input[name=new-task').val();

			if (new_task != '') {
				$.post('includes/add-task.php', { task: new_task}, function(data) {
					$('add-new-task input[name=new-task]').val();
						$(data).appendTo('task-list ul').hide().fadeIn();
				});
			}
			return false;
		});
	}

	$('.delete-button').click(function(){//delete button function
		var current_element = $(this) = $(this); //variable this is the current element
		var task_id = $(this).attr('id');// method returns undefined for attributes that have not been set.

		$.post('includes/delete-task.php', {id: task_id}, function(){//post deleted task
		current_element.parent().fadeOut("fast", function(){//fade out fast when task is deleted
			$(this).remove();//remove this
		});
	});
});
</script>
</html>
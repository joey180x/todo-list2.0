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
				<?php require("includes/connect.php"); ?>
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
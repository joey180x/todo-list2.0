<?php
    require_once(__DIR__ . "/../model/config.php");

 ?>

 <h1 class="login-header">Login</h1>

 <form method="post" action="<?php echo $path . "controller/login-user.php"; ?>"> 	
      <div>
		<label class="username" for="username">Username: </label>
		<input class= "username-box" type="text" name="username" />
	</div>

	<div>
		<label class="password" for="password">Password: </label>
		<input class="password-box" type="password" name="password" />
	</div>

	<div>
		<button class="submit" type="submit">Submit:</button>
	</div>
 </form>


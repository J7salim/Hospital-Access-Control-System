<?php
	require 'core.inc.php';
	require 'connect.inc.php';
	
	if (!loggedin())
	{
		if (isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['confirm_password'])&&isset($_POST['firstname'])&&isset($_POST['surname'])&&isset($_POST['email']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm_password'];
			$password_hash = md5($password);
			$firstname = $_POST['firstname'];
			$surname = $_POST['surname'];
			$email = $_POST['email'];
			
			if (!empty($username)&&!empty($password)&&!empty($confirm_password)&&!empty($firstname)&&!empty($surname)&&!empty($email))
			{
				if ($password!=$confirm_password) 
				{
					echo 'Passwords do not match..!';
				}else
				{
					//check for email address
					$query = "SELECT `email` FROM `users` WHERE `email` = '$email'";
					$query_run = mysql_query($query);
					
					if (mysql_num_rows($query_run)==1)
					{
						echo 'The email '.$email.' already exist.';
					}else
					{
						//check for username
						$query = "SELECT `username` FROM `users` WHERE `username` = '$username'";
						$query_run = mysql_query($query);
					
						if (mysql_num_rows($query_run)==1)
						{
							echo 'The username '.$username.' already exist.';
						}else
						{
							$query = "INSERT INTO `users` VALUES ('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($surname)."','".mysql_real_escape_string($email)."',NOW())";
							if ($query_run = mysql_query($query))
							{
								header('Location: register_success.php');
							}else
							{
								echo 'Registration is closed for now..!';
							}
						}
					}	
				}
			}else
			{
				echo 'All fields are required';
			}
		}
?>

<form action="register.php" method="POST">
Username:<br> <input type="text" name="username" value="<?php if (isset($username)) { echo $username ; } ?>"><br><br>
Password:<br> <input type="password" name="password" ><br><br>
Confirm password:<br> <input type="password" name="confirm_password"><br><br>
Firstname:<br> <input type="text" name="firstname" value="<?php if (isset($firstname)) { echo $firstname ; } ?>"><br><br>
Surname:<br> <input type="text" name="surname" value="<?php if (isset($surname)) { echo $surname ; } ?>"><br><br>
E-mail:<br> <input type="text" name="email" value="<?php if (isset($email)) { echo $email ; } ?>"><br><br>
<input type="submit" value="Register">
</form>

<?php

	}else if (loggedin())
	{
		echo 'You\'re aready registered and logged in.' ;
	}
?>

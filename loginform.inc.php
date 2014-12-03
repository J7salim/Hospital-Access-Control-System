<?php

if (isset($_POST['username']) && isset($_POST['password']))
	{
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		
		$username_hash = base64_encode($username);
		$password_hash = base64_encode($password);
		
		if (!empty($username) && !empty($password))
		{
			$query = "SELECT `id` FROM `users` WHERE `username`='".mysql_real_escape_string($username_hash)."' AND `password`='".mysql_real_escape_string($password_hash)."'";
			if ($query_run = mysql_query($query))
			{
				$query_num_rows = mysql_num_rows($query_run);
				if ($query_num_rows == 0)
				{
					echo '<center><p style="color:red;">Invalid username/password combination.</p></center>';
				}elseif ($query_num_rows == 1)
				{
					$user_id = mysql_result($query_run, 0, 'id');
					$_SESSION['user_id'] = $user_id;
					header('Location: index.php');
				}
			}
		}else
		{
			echo '<center><p style="color:red;">You must supply a username and password</p></center>';
		}
	}
	
	
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Hospital Access Control System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
           
            <header>
                <h1>Hospital Access Control System</h1>

            </header>
            <section>				
                <div id="container_demo" >
                  
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="<?php echo $current_file; ?>" method="POST" autocomplete="on"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" name="submit" value="Login" /> 
								</p>
                                <p class="change_link">
									Forgot Username/Password ?
									<a href="#" class="to_register">Retrieve</a>
								</p>
                            </form>
                        </div>
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>

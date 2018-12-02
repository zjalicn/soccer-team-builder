
<html>
	<head>
		<title>Squad Builder</title>
    	<link rel="stylesheet" type="text/css" href="home.css" />
	</head>

	<body>

		<div class = "banner">
			<img src="images/banner.png">
		</div>

		 <div class="login">
		 	<form method="POST" action="index.php" onsubmit="return LoginValidation()" >

			 	<div id="login_field">
				    <label><b>Username</b></label>
				    <input type="text" placeholder="Enter Username" name="username" id="username"required>
				   </div>

			    <br>
			    <div id="login_field">
				    <label><b>Password</b></label>
				    <input type="password" placeholder="Enter Password" name="password" id="password" required>
				</div>

			    <br>
			    <p id="login_error" >ERROR: INCORRECT USERNAME OR PASSWORD</p>
			    <button id="loginButton" type="submit" formmethod="post" formaction="index.php">LOG IN</button>
			    <button onclick="location.href='signup.php'">Sign Up</button>
				<button onclick="location.href='mainpage.php'" type="submit">Try</button>
				
			</form>
		  </div>

		  <script type="text/javascript">

		  	var submitButton = document.getElementById("loginButton");
		  	submitButton.addEventListener(click, LoginValidation);

		  	function LoginValidation(){
		  		return true;
		  	}


		  </script>

	</body>
</html>


<?php
	include 'php-pre55-password-hash-utils.php';// One of the files that was provided, the password encryption functions are from here
	require_once('config.php');
	session_start();
	$mysqli = new mysqli($DATABASE, $USER, $PASSWORD, $TABLE);

	if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Check for a POST request method

		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);
		$sql = "SELECT pass FROM USERS WHERE id = '$username' LIMIT 1";
		$result=$mysqli->query($sql);
		
		foreach($mysqli->query($sql) as $row){ //This is done to access the actual password value from the database so that we can verify it
	        $dbpassword = $row['pass'];
		}

		$sql = "SELECT 1 FROM USERS WHERE id = '$username' LIMIT 1"; //Now select the user corresponding to the username input
		
		if ($mysqli->query($sql) && mysqli_num_rows($mysqli->query($sql)) > 0){
			if (password_verify($password, $dbpassword)){

				$_SESSION['username'] = $username; //Set the session value of username so that we know who's logged into the builder later

				if ($username == 'admin'){
					header("location:admin.php");
				} else {
					header("location: mainpage.php");
				}
			} else {
				echo '<script type="text/javascript">document.getElementById("login_error").style.display = "block";</script>';
			}
			
		} else {
			echo '<script type="text/javascript">document.getElementById("login_error").style.display = "block";</script>';
		}
	}
?>


<html>

	<head>
		<title>Sign Up</title>
    	<link rel="stylesheet" type="text/css" href="home.css" />
	</head>

	<body>
		<div class = "banner">
			<img src="images/banner.png">
		</div>

		<div class="signup-form">
			<form method="POST" action="signup.php" onsubmit="return Validate()" >
	            <label> Username </label>

	            <!-- 
	            the value attribute of the following input is set to a php script that auto refills the value 
	            if one was input previously and user was redirected back to this page 
	        	-->
	            <input type="text" placeholder="Enter username" id="username" name="username" value="<?php if (isset($_POST['username'])) { echo $_POST['username']; } ?>" required> 
	            <span id="taken_error"> ERROR: USERNAME ALREADY IN USE </span> <!-- hidden by default -->
	            <br>

	        	<p style="font-size: 12px">*must be &lt= 10 characters</p> <!-- use &lt entity instead of the less than sign, it's good practice-->

	            <label> Password </label>
	            <input type="password" id="password" placeholder="Enter Password" name="password" required>
	            <br>
	            <p style="font-size: 12px">*must be &lt= 10 characters</p>


	            <label> Repeat Password </label>
	            <input type="password" id="password_repeat" placeholder="Repeat Password" name="password_repeat" required>

	            <!-- 
	            All possible errors that might show up, all are hidden by default and their display style is changed when activated
	        	-->

		    	<p id="name_error" >ERROR: USERNAME IS TOO LONG</p>
		    	<p id="password_length_error" >ERROR: PASSWORD IS TOO LONG</p>
		    	<p id="password_error" >ERROR: REPEAT PASSWORD IS NOT SAME AS PASSWORD</p>

		    	<div id="submit_button">
		    		<input type="submit" value="REGISTER"/>
		    	</div>
			</form>
		</div>

		<script type="text/javascript">
		/*
		This script adds an event listener to the submit button which checks that the username is 
		<= 10 chars and that both password entries are the same before creating an account for the user 
		*/

			var submitButton = document.getElementById("submit_button");

			submitButton.addEventListener("click", Validate);

			//This function validates that the username and password follow the requirements and that the password was correctly typed twice
			//Input: evt
			//Output: boolean value, true if the input was successfully validated

			function Validate(evt){ 				
				var username = document.getElementById("username");
				var password = document.getElementById("password");
				var password_repeat = document.getElementById("password_repeat");

				//CHECK USERNAME
				if (username.value.length > 10){ 
					document.getElementById("name_error").style.display = "block";
					return false;
				} else {
					document.getElementById("name_error").style.display = "none";
				}
				
				//Check that password doesn't exceed length
				if (password.value.length > 10 ){
					document.getElementById("password_length_error").style.display = "block";
					return false;
				} else {
					document.getElementById("password_length_error").style.display = "none";

				}

				//CHECK PASSWORD IS THE SAME

				if (password.value != password_repeat.value){
					document.getElementById("password_error").style.display = "block";
					return false;
				} else {
					document.getElementById("password_error").style.display = "none";
				}
				
				return true;
			} 
		</script>

	</body>

</html>

<?php
	include 'php-pre55-password-hash-utils.php'; //Import the password encryption tools provided
	require_once('config.php');
	session_start();
	$mysqli = new mysqli($DATABASE, $USER, $PASSWORD, $TABLE);


	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		if ($_POST['password'] == $_POST['password_repeat']){ //If password matches password_repeat..

			$username = htmlspecialchars($_POST['username']);
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT); //Encrypt the password, we are storing the encrypted version into the database
			$_SESSION['username'] = $username;

			$sql = "INSERT INTO USERS VALUES ('$username','$password')";
			
			if ($mysqli->query($sql) === TRUE){
				header("location: index.php"); //Redirect user back to front page so that they may use their newly created account
			} else {
				echo "<script>document.getElementById('taken_error').style.display='block';</script>";
			}
		}
	}
?>

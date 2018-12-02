<html>
<head>
<title>Squad Builder</title>
    <link rel="stylesheet" type="text/css" href="home.css" />
</head>

<body>

<div class = "banner">
<img src="images/banner.png">
</div>


<div class="admin_command">
  <h1 id="add_button" style="color:green">ADD PLAYER</h1>
  <h1 id="delete_button">DELETE PLAYER</h1>
</div>

<!-- 
Error messages that may appear depending on the input provided. 
Their CSS display style is set to "block" when the error occurs
-->
<span id="kitnum_notfound_error">Kit Number could not be found</span>
<span id="kitnum_taken_error">Kit Number is already in use.</span>
<span id="success">SUCCESS</span>

<!-- 
These 2 divs contain the admin functions. add_player is turned on by default 
-->

 <div id="add_player" >
 <form method="POST" name="add_player" action="admin.php" id ="admin_form" onsubmit="return LoginValidation()" >

 <label>Team: </label>
 <select name="team">
  <option value="arsenal">Arsenal</option>
  <option value="juve">Juventus</option>
</select> <br>

<label>Position: </label>
<select name="position">
  <option value="FW">Forward</option>
  <option value="GK">Goal Keeper</option>
  <option value="DF">Defensive Midfielder</option>
  <option value="MF">Midfielder</option>
</select> <br>

<label>First name: </label>
<input type="text" name="fname" maxlength="20" value="<?php if (isset($_POST['fname'])) { echo $_POST['fname']; } ?>"><br>

<label>Last name: </label>
<input type="text" name="lname" required maxlength="20" value="<?php if (isset($_POST['lname'])) { echo $_POST['lname']; } ?>"><br>

<label>Kit Num: </label> 
<input type="number" name="kitnum" max="9999999999" required value="<?php if (isset($_POST['kitnum'])) { echo $_POST['kitnum']; } ?>">
<br>

<label>Nationality: </label>
<input type="text" name="nationality" maxlength="3" required value="<?php if (isset($_POST['nationality'])) { echo $_POST['nationality']; } ?>"><br>

<label>Overall: </label>
<input type="number" name="overall" max="9999999999" required value="<?php if (isset($_POST['overall'])) { echo $_POST['overall']; } ?>"><br>

<label>Pace: </label>
<input type="number" name="pace" max="9999999999" required value="<?php if (isset($_POST['pace'])) { echo $_POST['pace']; } ?>"><br>

<label>Shooting: </label>
<input type="number" name="shooting" max="9999999999" required value="<?php if (isset($_POST['shooting'])) { echo $_POST['shooting']; } ?>"><br>

<label>Passing: </label>
<input type="number" name="passing" max="9999999999" required value="<?php if (isset($_POST['passing'])) { echo $_POST['passing']; } ?>"><br>

<label>Dribbling: </label> 
<input type="number" name="dribbling" max="9999999999" required value="<?php if (isset($_POST['dribbling'])) { echo $_POST['dribbling']; } ?>" ><br>

<label>Defending: </label>
<input type="number" name="defending" max="9999999999" required value="<?php if (isset($_POST['defending'])) { echo $_POST['defending']; } ?>" ><br>

<label>Physical: </label>
<input type="number" name="physical" max="9999999999" required value="<?php if (isset($_POST['physical'])) { echo $_POST['physical']; } ?>" ><br>

<button name="admin_action" value="add_player" type="submit">Enter player</button>

</form>
</div>

<!--
Style attribute of the add_player div is set to display:none by default because its 
CSS properties are going to be changed regularly 
-->

<div id= "delete_player" style="display:none;">
<form method="POST" name="delete_player" action="admin.php" onsubmit="return LoginValidation()" >

 <span id="success">SUCCESS</span><br>

 <label>Team: </label>
 <select name="team">
  <option value="arsenal">Arsenal</option>
  <option value="juve">Juventus</option>
</select> <br>

 <label>Kit Num: </label> 
<input type="number" name="kitnum" max="9999999999" required >

 <button name="admin_action" value="delete_player" type="submit">Delete player</button>

</div>

<button onclick="location.href='index.php'" type="submit">Log Out</button>
<button onclick="location.href='mainpage.php'" type="submit">Squad Builder </button>

<!-- 
Javascript to add functionality to the ADd PLAYER and DELETE PLAYER headers, 
which will change the activated action to green and the de-activated action black 
-->

<script type="text/javascript">

var addText = document.getElementById("add_button");
var deleteText = document.getElementById("delete_button");

var addPlayer = document.getElementById("add_player");
var deletePlayer = document.getElementById("delete_player");

addText.addEventListener("click", function(){
    addText.style.color = "green" ;
    deleteText.style.color = "black" ;
    addPlayer.style.display="block";
    deletePlayer.style.display="none";
});

deleteText.addEventListener("click", function(){
addText.style.color = "black" ;
    deleteText.style.color = "green" ;
    addPlayer.style.display="none";
    deletePlayer.style.display="block";

});
</script>
</body>
</html>


<?php
require_once('config.php');
session_start(); //session_start() allows us to store and retrieve values across the various pages
$mysqli = new mysqli($DATABASE, $USER, $PASSWORD, $TABLE );//Connect to the database



if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //Check to see if the server has recieved a POST request method

//Depending on which admin_action was chosen, do the following..
if ($_REQUEST["admin_action"] == "add_player") {

//All these values are being stored as variables so that they're easier to merge into the SQL command string later
$team = $_POST['team'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$kitnum = $_POST['kitnum'];
$position = $_POST['position'];
$nationality = $_POST['nationality'];
$overall = $_POST['overall'];
$pace = $_POST['pace'];
$shooting = $_POST['shooting'];
$passing = $_POST['passing'];
$dribbling = $_POST['dribbling'];
$defending = $_POST['defending'];
$physical = $_POST['physical'];

$sql = "INSERT INTO "; //This variable stores the SQL command we are creating, since we are adding a player we always start with INSERT INTO

//There are 4 tables, 2 for each of the 2 teams. 1 for goal keepers and the other for outfielders.

if ($team == "arsenal"){
$sql .= "ARSENAL_";
} else {
$sql .= "JUVENTUS_";
}

if ($position == "GK"){
$sql .= "GK";
} else {
$sql .= "OUT";
}

$sql .= " VALUES (";
$sql .= "'" . $fname . "'" . ','. "'" . $lname . "'" . ',' . $kitnum . ',' . "'" . $position . "'" . ',' .
"'" . $nationality . "'" . ',' . $overall . ',' . $pace . ',' . $shooting . ',' . $passing . ','
. $dribbling . ',' . $defending . ',' . $physical . ')'; 

if ( $mysqli->query($sql) ){//Run the following query in our SQL database and if it runs successfully...
echo '<script type="text/javascript">' ,
'document.getElementById("success").style.display="block";',
'</script>';

echo '<script type="text/javascript">' ,
'document.getElementById("kitnum_taken_error").style.display="hidden";',
'</script>';
} else {
echo '<script type="text/javascript">' ,
'document.getElementById("kitnum_taken_error").style.display="block";',
'</script>';
}

} elseif ($_REQUEST["admin_action"] == "delete_player"){

$team = $_POST['team'];
$kitnum = $_POST['kitnum'];

$sql = "DELETE FROM "; //Removing a user so we start the statement with this..
$sql2 = $sql; //We're making two statements so that we check both the outfielders and goal keepers 


if ($team == "arsenal"){
$sql .= "ARSENAL_OUT";
$sql2 .= "ARSENAL_GK";
} else {
$sql .= "JUVENTUS_OUT";
$sql2 .= "JUVENTUS_GK";
}

$sql .= " WHERE kitnum = " . $kitnum ;
$sql2 .= " WHERE kitnum = " . $kitnum ;


if ( $mysqli->query($sql) || $mysqli->query($sql2)){ //Checks whether a player with this Kitnum is on the team selected and 
  echo '<script type="text/javascript">' ,
    'document.getElementById("success").style.display="block";', //displays success feedback to the user..
    '</script>';
  echo '<script type="text/javascript">' ,
    'document.getElementById("kitnum_notfound_error").style.display="hidden";', //..and removes the kitnum error if it was previously shown
    '</script>';
} else {
  echo '<script type="text/javascript">' ,
    'document.getElementById("kitnum_notfound_error").style.display="block";', //or tells the user that the player with the given kitnum couldn't be found
    '</script>';
}
}

}

?>


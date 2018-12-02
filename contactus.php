<!DOCTYPE html>
<html>
  <head>
    <title>Squad Builder</title>
	<link rel="stylesheet" type="text/css" href="builder.css"/>
	<script src="XIgen.js" type="application/javascript"></script>
	<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=qjbob82x0e4tpkthwoe0dk9dsuysew4vnzhc3ate7zz4eijc"></script>
	<script>tinymce.init({ selector:'textarea', menubar: false, toolbar: false });</script>
  </head>
  <body>
  <!--Menu-->
  <div class="container">
	<img id="logo" src="SBlogo.jpg" alt="S.B. Logo">
    <nav>
		<ul>
			<li ><a href="index.php">Log out</a></li>
			<li ><a href="admin.php" class="admin_privilege" style="display:none;">Admin</a></li>
			<li id="nav"><span> Hello, <span id="username_topbar"></span></span></li>
			<li id="nav-right"><a href="mainpage.php">Squad Builder</a></li>
		</ul>
	</nav>
	<!--Form - uses tinymce-->
	<form action='mailto:iacobelt@uwindsor.ca' method='post' enctype='text/plain' id='contact'>
		Name:  
		<input type='text' name='name'><br>
		Email:  
		<input type='text' name='email'><br>
		<input type='submit' value='Send'>
		<input type='reset' value='Reset'>
	</form>

	Comments:  <br>
  <textarea name='comments' rows='10' cols='100' form='contact'></textarea><br>
  
  	<div id="footer"></div>
  </div>
  </body>
</html>

<?php ?>




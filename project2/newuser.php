<!--
	Project 2 - PHP
	This is a sign up test page for adding names and passwords.
-->
<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Sign Up</title>
</head>
<body>
	<h1>Sign Up</h1>
	<h3>New User</h3>
	
	<form action="newuser-submit.php" method="post">
	
	Your Name: <input name="username" type="text"> 
	Password: <input name="password" type="password">
	
	<input type="submit" value="Sign Up"> 
	<input type="reset">
	
	</form>
</body>
</html>
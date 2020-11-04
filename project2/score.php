<!--
	Project 2 - PHP
	This is a test page to simulate when the game has a new score to update.
-->
<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Score</title>
</head>
<body>
	<h1>Add a Score</h1>
	<form action="score-submit.php" method="post">
	
	Your Name: <input name="username" type="text"> 
	Password: <input name="password" type="password">
	Input Score 1: <input name="score1" type="text"> 
	<input type="submit" value="Add"> 
	<input type="reset">
	
	</form>
</body>
</html>
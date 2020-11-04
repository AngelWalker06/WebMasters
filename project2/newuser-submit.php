<!--
	Project 2 - PHP
	This is a follow up test page to add the new user to the text file.
-->
<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Success</title>
</head>
<body>
	<?php
		$username = $_POST["username"];
		$password = $_POST["password"];
		$valid = true;
		
		//sends back to initial page if invalid info is given
		if ((!isset($username) || $username == "") &&
			(!isset($password) || $password == "")){
				$valid = false;
				header("Location: newuser.php");
		}
	?>
	
	<h1>Thank You!</h1>
	<h3>Welcome, <?php print $_POST["username"] ?>!</h3>
	
	
	<?php
		//sets the variable info equal to the given inputs of the user in a desired format
		$info = $username.",00,00,00,00,00,".$password;
		$newLine = "\n";
		//sets fullFile equal to all of the users' information within the file
		$fullFile = file_get_contents('users.txt');
		if ($valid == true){
			if (file_get_contents('users.txt')=="empty"){
				$fullFile = str_replace("empty",$info,$fullFile);
				//checks validity
				//adds the user's info into the existing users list
				file_put_contents('users.txt',$fullFile);
			}
			else{
				//adds the user's info into the existing users list
				file_put_contents('users.txt', $newLine.$info, FILE_APPEND);
			}
		}
	?>
	
	</form>	
</body>
</html>
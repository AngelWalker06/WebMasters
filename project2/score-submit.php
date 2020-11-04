<!--
	Project 2 - PHP
	This is a score submit page which can update the first score's value.
	This can act as a guide for the other levels as well, with just the
	score index being the only thing we need to switch out. :)
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
		$score1 = $_POST["score1"];
		$valid = true;
		
		//resent back to initial page if not valid info given
		if ((!isset($username) || $username == "") &&
			(!isset($password) || $password == "") &&
			(!isset($score1) || $score1 == "")){
				$valid = false;
				header("Location: score.php");
		}
	?>
	<h1>Score Added!</h1>
	<?php
		$score = $_POST["score1"];
		//sets file equal to calling for the users file 
		$file = file('users.txt');
		//sets count equal to the the amount of lines (which is the same as the number of users) in the file
		$count = count($file);
		//set topFive equal to the top five of the user list
		
		//sets fullFile equal to all of the users' information within the file
		$fullFile = file_get_contents('users.txt');
		//sets the array into separate users per element/index
		$users = explode("\n", $fullFile);
		
		//find user in text file to update by running through the whole file
		for ($i=0;$i<count($users);$i++){
			//splits string into each piece of info of the current user
			$current = explode(",", $users[$i]);
			//checks if current user is the user that is being updated
			if ($current[0] == $username && $current[6] == $password){
				//create new string with updated score
				$updateUser = $current[0].",".$score.",".$current[2].",".$current[3].",".
								$current[4].",".$current[5].",".$current[6];
				//replace string in the text file with new updated info
				$fullFile = str_replace($users[$i],$updateUser,$fullFile);
				//stop once found
				break;
			}
		}
		
		//checks validity
		if ($valid == true){
			//adds the user's info into the existing users list
			file_put_contents('users.txt',$fullFile);
		}
	?>
	
	</form>
</body>
</html>
<?php session_save_path("session"); 
      session_start();
      $username = $_SESSION['username'];?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Level 5</title>
    <style media="screen">
      .letterInput{
        width: 20px;
      }
      .correct{
        background-color: lightgreen;
      }

    </style>
<link rel="stylesheet" href="levels.css">
  </head>

  <body>
    <?php include("header.php") ?>
    <h1>Hello <?php echo $username; ?>!</h1>
    <h2>Level 5</h2>
    <a href="leaderboard5.php">Leaderboard</a>
    <br>
    <br>
    <form action="" method="post">
      <fieldset>
      <legend>find the word</legend>
      <p>A dish</p>
      <?php
      if ($_POST["first"]!="e"){
        echo'<input type="text" name="first" class="letterInput" value="">';
      }else if($_POST["reset"]){
        echo'<input type="text" name="first" class="letterInput" value="">';
      }else if ($_POST["first"]=="e"){
        echo'<input type="text" name="first" class="letterInput correct" value="e">';
      }

      if ($_POST["second"]!="g"){
        echo '<input type="text" name="second" class="letterInput" value="">';
      }else if($_POST["reset"]){
        echo '<input type="text" name="second" class="letterInput" value="">';
      }else if ($_POST["second"]=="g"){
        echo '<input type="text" name="second" class="letterInput correct" value="g">';
      }
      if ($_POST["third"]!="g"){
        echo '<input type="text" name="third" class="letterInput" value="">';
      }else if($_POST["reset"]){
        echo '<input type="text" name="third" class="letterInput" value="">';
      }else if ($_POST["third"]=="g"){
        echo '<input type="text" name="third" class="letterInput correct" value="g">';
      }

      if ($_POST["fourth"]!="s"){
        echo'<input type="text" name="fourth" class="letterInput" value="">';
      }else if($_POST["reset"]){
        echo'<input type="text" name="fourth" class="letterInput" value="">';
      } else if ($_POST["fourth"]=="s"){
        echo'<input type="text" name="fourth" class="letterInput correct" value="s">';
      }

       ?>

      <br><br>

      <input type="submit"  name="submit">
      <input type="submit" name="clues" value="clue"><br><br>
      <input type="submit" name="reset" value="restart">
      <br>
      <?php
      if(isset( $_POST["clues"])) {
        echo '<p>Usually eaten for breakfast<p>';
      }

       ?>
      <?php
      if ($_POST["reset"]){
        file_put_contents("score_tracker.txt", 4);
       }
       ?>
    </fieldset>

  </form>

<div class="fail/pass">
<?php
  $file = 'score_tracker.txt';
  $trials = intval(file_get_contents($file));
  if ($trials == 0){
    echo '<h3> Game Over. <h3>';
    echo '<a href="index.php">Back to main page</a>';
    file_put_contents($file, 4);

  }
  else{
    if (isset($_POST['submit'])){
      $finalWord="";
      foreach ($_POST as $key => $value) {
        $finalWord .= $value;
      }
      if ($finalWord=="eggsSubmit"){
	echo 'Congratulations, you completed this level.' ;
      $score = $trials * 2;
      //file_put_contents("users_score.txt", $score);
	  
		//added code
		$valid = true;
		//sets file equal to calling for the users file 
		$file = file('userdata.txt');
		//sets count equal to the the amount of lines (which is the same as the number of users) in the file
		$count = count($file);
		//set topFive equal to the top five of the user list
		
		//sets fullFile equal to all of the users' information within the file
		$fullFile = file_get_contents('userdata.txt');
		//sets the array into separate users per element/index
		$users = explode("\n", $fullFile);
		
		//find user in text file to update by running through the whole file
		for ($i=0;$i<count($users);$i++){
			//splits string into each piece of info of the current user
			$current = explode(",", $users[$i]);
			//checks if current user is the user that is being updated
			if ($current[0] == $username){
				//create new string with updated score
				$updateUser = $current[0].",".$current[1].",".$current[2].",".$current[3].",".
								$current[4].",".$score.",".$current[6];
				//replace string in the text file with new updated info
				$fullFile = str_replace($users[$i],$updateUser,$fullFile);
				//stop once found
				break;
			}
		}
		
		//checks validity
		if ($valid == true){
			//adds the user's info into the existing users list
			file_put_contents('userdata.txt',$fullFile);
		}
		file_put_contents($file, 4);
      }
     else{
      echo 'You must complete this level to move on';
      $trials=$trials-1;
      $input=$trials."\n";
      file_put_contents($file, $input);

    }
    }
  }
 ?>
 <p>Number of tries remaining: <?php echo $trials; ?></p>

</div>
<?php include("footer.php") ?>


  </body>
</html>

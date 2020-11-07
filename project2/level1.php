<!--<<<<<<< Updated upstream -->
<?php session_save_path("session"); 
  session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>level 1</title>
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
    <?php include "header.php"; ?>
  <?php
  session_start();
  echo $_SESSION['username'];
  echo $_SESSION['score1'];
  echo $_SESSION['score2'];
  echo $_SESSION['score3'];
  echo $_SESSION['score4'];
  echo $_SESSION['score5'];
  ?>

    <h1>Hello <?php echo $_SESSION['username']; ?></h1>
    <h2>level 1</h2>
    <a href="leaderboard1.php">Leaderboard</a>
    <br>
    <br>
    <form action="" method="post">
      <fieldset>
      <legend>Find the correct word</legend>
      <p>The name of something you are doing right now</p>
      <?php
      if ($_POST["first"] != "h") {
        echo '<input type="text" name="first" class="letterInput" value="">';
      } elseif ($_POST["reset"]) {
        echo '<input type="text" name="first" class="letterInput" value="">';
      } elseif ($_POST["first"] == "h") {
        echo '<input type="text" name="first" class="letterInput correct" value="h">';
      }
      if ($_POST["second"] != "a") {
        echo '<input type="text" name="second" class="letterInput" value="">';
      } elseif ($_POST["reset"]) {
        echo '<input type="text" name="second" class="letterInput" value="">';
      } elseif ($_POST["second"] == "a") {
        echo '<input type="text" name="second" class="letterInput correct" value="a">';
      }
      if ($_POST["third"] != "n") {
        echo '<input type="text" name="third" class="letterInput" value="">';
      } elseif ($_POST["reset"]) {
        echo '<input type="text" name="third" class="letterInput" value="">';
      } elseif ($_POST["third"] == "n") {
        echo '<input type="text" name="third" class="letterInput correct" value="n">';
      }
      if ($_POST["fourth"] != "g") {
        echo '<input type="text" name="fourth" class="letterInput" value="">';
      } elseif ($_POST["reset"]) {
        echo '<input type="text" name="fourth" class="letterInput" value="">';
      } elseif ($_POST["fourth"] == "g") {
        echo '<input type="text" name="fourth" class="letterInput correct" value="g">';
      }
      if ($_POST["fifth"] != "m") {
        echo '<input type="text" name="fifth" class="letterInput" value="">';
      } elseif ($_POST["reset"]) {
        echo '<input type="text" name="fifth" class="letterInput" value="">';
      } elseif ($_POST["fifth"] == "m") {
        echo '<input type="text" name="fifth" class="letterInput correct" value="m">';
      }
      if ($_POST["sixth"] != "a") {
        echo '<input type="text" name="sixth" class="letterInput" value="">';
      } elseif ($_POST["reset"]) {
        echo '<input type="text" name="sixth" class="letterInput" value="">';
      } elseif ($_POST["sixth"] == "a") {
        echo '<input type="text" name="sixth" class="letterInput correct" value="a">';
      }
      if ($_POST["seventh"] != "n") {
        echo '<input type="text" name="seventh" class="letterInput" value="">';
      } elseif ($_POST["reset"]) {
        echo '<input type="text" name="seventh" class="letterInput" value="">';
      } elseif ($_POST["seventh"] == "n") {
        echo '<input type="text" name="seventh" class="letterInput correct" value="n">';
      }
      ?>

      <br><br>

      <input type="submit"  name="submit">
      <input type="submit" name="clues" value="clue"><br><br>
      <input type="submit" name="reset" value="restart">
      <?php if (isset($_POST["clues"])) {
        echo '<p> The answer is somewhere on this page.<p>';
      } ?>
      <?php if ($_POST["reset"]) {
        file_put_contents("score_tracker.txt", 4);
      } ?>
    </fieldset>

  </form>

<div class="fail/pass">
<?php
$file = 'score_tracker.txt';
$trials = intval(file_get_contents($file));
if ($trials == 0) {
  echo '<h3> Game Over. <h3>';
  echo '<a href="index.php">Back to main page</a>';
  file_put_contents($file, 4);
} else {
  if (isset($_POST['submit'])) {
    $finalWord = "";
    foreach ($_POST as $key => $value) {
      $finalWord .= $value;
    }
    if ($finalWord == "hangmanSubmit") {
      echo 'Congratulations, you completed this level. <a href="level2.php">Next level</a>';
      $score = "Level 1: " . $username . "," . $trials * 2 . "\n";
      file_put_contents("users_score.txt", $score, FILE_APPEND | LOCK_EX);
      file_put_contents($file, 4);
    } else {
      echo 'You must complete this level to move on';
      $trials = $trials - 1;
      $input = $trials . "\n";
      file_put_contents($file, $input);
    }
  }
}
?>
 <p>Number of tries remaining: <?php echo $trials; ?></p>

</div>
<?php include "footer.php"; ?>


  </body>
</html>
=======
<?php
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>level 1</title>
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
    <h1>Hello <?php echo $username; ?></h1>
    <h2>level 1</h2>
    <a href="leaderboard1.php">Leaderboard</a>
    <br>
    <br>
    <form action="" method="post">
      <fieldset>
      <legend>Find the correct word</legend>
      <p>The name of something you are doing right now</p>
      <?php
      if ($_POST["first"] != "h") {
        echo '<input type="text" name="first" class="letterInput" value="">';
      } elseif ($_POST["reset"]) {
        echo '<input type="text" name="first" class="letterInput" value="">';
      } elseif ($_POST["first"] == "h") {
        echo '<input type="text" name="first" class="letterInput correct" value="h">';
      }

      if ($_POST["second"] != "a") {
        echo '<input type="text" name="second" class="letterInput" value="">';
      } elseif ($_POST["reset"]) {
        echo '<input type="text" name="second" class="letterInput" value="">';
      } elseif ($_POST["second"] == "a") {
        echo '<input type="text" name="second" class="letterInput correct" value="a">';
      }

      if ($_POST["third"] != "n") {
        echo '<input type="text" name="third" class="letterInput" value="">';
      } elseif ($_POST["reset"]) {
        echo '<input type="text" name="third" class="letterInput" value="">';
      } elseif ($_POST["third"] == "n") {
        echo '<input type="text" name="third" class="letterInput correct" value="n">';
      }
      if ($_POST["fourth"] != "g") {
        echo '<input type="text" name="fourth" class="letterInput" value="">';
      } elseif ($_POST["reset"]) {
        echo '<input type="text" name="fourth" class="letterInput" value="">';
      } elseif ($_POST["fourth"] == "g") {
        echo '<input type="text" name="fourth" class="letterInput correct" value="g">';
      }
      if ($_POST["fifth"] != "m") {
        echo '<input type="text" name="fifth" class="letterInput" value="">';
      } elseif ($_POST["reset"]) {
        echo '<input type="text" name="fifth" class="letterInput" value="">';
      } elseif ($_POST["fifth"] == "m") {
        echo '<input type="text" name="fifth" class="letterInput correct" value="m">';
      }

      if ($_POST["sixth"] != "a") {
        echo '<input type="text" name="sixth" class="letterInput" value="">';
      } elseif ($_POST["reset"]) {
        echo '<input type="text" name="sixth" class="letterInput" value="">';
      } elseif ($_POST["sixth"] == "a") {
        echo '<input type="text" name="sixth" class="letterInput correct" value="a">';
      }
      if ($_POST["seventh"] != "n") {
        echo '<input type="text" name="seventh" class="letterInput" value="">';
      } elseif ($_POST["reset"]) {
        echo '<input type="text" name="seventh" class="letterInput" value="">';
      } elseif ($_POST["seventh"] == "n") {
        echo '<input type="text" name="seventh" class="letterInput correct" value="n">';
      }
      ?>

      <br><br>

      <input type="submit"  name="submit">
      <input type="submit" name="clues" value="clue"><br><br>
      <input type="submit" name="reset" value="restart">
      <?php if (isset($_POST["clues"])) {
        echo '<p> The answer is somewhere on this page.<p>';
      } ?>
      <?php if ($_POST["reset"]) {
        file_put_contents("score_tracker.txt", 4);
      } ?>
    </fieldset>

  </form>

<div class="fail/pass">
<?php
$file = 'score_tracker.txt';
$trials = intval(file_get_contents($file));
if ($trials <= 0) {
  echo '<h3> Game Over. <h3>';
  echo '<a href="index.php">Back to main page</a>';
  file_put_contents($file, 4);
} else {
  if (isset($_POST['submit'])) {
    $finalWord = "";
    foreach ($_POST as $key => $value) {
      $finalWord .= $value;
    }
    if ($finalWord == "hangmanSubmit") {
      echo 'Congratulations, you completed this level. <a href="level2.php">Next level</a>';
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
      for ($i = 0; $i < count($users); $i++) {
        //splits string into each piece of info of the current user
        $current = explode(",", $users[$i]);
        //checks if current user is the user that is being updated
        if ($current[0] == $username) {
          //create new string with updated score
          $updateUser =
            $current[0] .
            "," .
            $score .
            "," .
            $current[2] .
            "," .
            $current[3] .
            "," .
            $current[4] .
            "," .
            $current[5] .
            "," .
            $current[6];
          //replace string in the text file with new updated info
          $fullFile = str_replace($users[$i], $updateUser, $fullFile);
          //stop once found
          break;
        }
      }

      //checks validity
      if ($valid == true) {
        //adds the user's info into the existing users list
        file_put_contents('userdata.txt', $fullFile);
      }
      file_put_contents($file, 4);
    } else {
      echo 'You must complete this level to move on';
      $trials = $trials - 1;
      $input = $trials . "\n";
      file_put_contents($file, $input);
    }
  }
}
?>
 <p>Number of tries remaining: <?php echo $trials; ?></p>

</div>
<?php include "footer.php"; ?>


  </body>
</html>
>>>>>>> Stashed changes

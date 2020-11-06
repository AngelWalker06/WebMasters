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
  </head>

  <body>
    <?php include("header.php") ?>
    <h1>Username <?php //echo $_POST['username'] ?></h1>
    <h2>level 1</h2>
    <a href="#">Leaderboard</a>
    <br>
    <br>
    <form action="" method="post">
      <fieldset>
      <legend>Something you wear</legend>
      <p>A month</p>
      <?php
      if ($_POST["first"]!="p"){
        echo'<input type="text" name="first" class="letterInput" value="">';
      }else if($_POST["reset"]){
        echo'<input type="text" name="first" class="letterInput" value="">';
      } else if ($_POST["first"]=="p"){
        echo'<input type="text" name="first" class="letterInput correct" value="p">';
      }

        if ($_POST["second"]!="a"){
          echo'<input type="text" name="second" class="letterInput" value="">';
        }else if($_POST["reset"]){
          echo'<input type="text" name="second" class="letterInput" value="">';
        } else if ($_POST["second"]=="a"){
          echo'<input type="text" name="second" class="letterInput correct" value="a">';
        }
        if ($_POST["third"]!="n"){
          echo'<input type="text" name="third" class="letterInput" value="">';
        }else if($_POST["reset"]){
          echo'<input type="text" name="third" class="letterInput" value="">';
        } else if ($_POST["third"]=="n"){
          echo'<input type="text" name="third" class="letterInput correct" value="n">';
        }
        if ($_POST["fourth"]!="t"){
          echo'<input type="text" name="fourth" class="letterInput" value="">';
        }else if($_POST["reset"]){
          echo'<input type="text" name="fourth" class="letterInput" value="">';
        } else if ($_POST["third"]=="t"){
          echo'<input type="text" name="fourth" class="letterInput correct" value="t">';
        }
        if ($_POST["fifth"]!="s"){
          echo'<input type="text" name="fifth" class="letterInput" value="">';
        }else if($_POST["reset"]){
          echo'<input type="text" name="fifth" class="letterInput" value="">';
        } else if ($_POST["fourth"]=="s"){
          echo'<input type="text" name="fifth" class="letterInput correct" value="s">';
        }

       ?>

      <br><br>

      <input type="submit"  name="submit">
      <input type="submit" name="clues" value="clue"><br><br>
      <input type="submit" name="reset" value="restart">
      <br>
      <?php
      if(isset( $_POST["clues"])) {
        echo '<p>Covers the leg<p>';
      }

       ?>
      <?php
      if ($_POST["reset"]){
        file_put_contents("score_tracker.txt", 4);
       }
       }
       ?>
    </fieldset>

  </form>

<div class="fail/pass">
<?php
  $file = 'score_tracker.txt';
  $trials = intval(file_get_contents($file));
  if ($trials <= 0){
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
      if ($finalWord=="pantsSubmit"){
      echo 'Congratulations, you completed this level. <a href="level5.php">Next level</a>';
      $score="Level 4, ".$username.",".($trials*2)."\n";
      file_put_contents("users_score.txt", $score);
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

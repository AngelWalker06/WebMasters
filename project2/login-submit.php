
<?php
$userN = $_POST['username'];
$passW = $_POST['password'];
$userlist = file('userdata.txt');

$success = false;
foreach ($userlist as $user) {
  $user_details = explode(',', $user);
  if ($user_details[0] == $userN && $user_details[6] == $passW) {
    $success = true;
    break;
  }
}

if ($success): ?><head>
<link rel="stylesheet" href="style.css" />
</head>
<body class="wrapper"> <div>
 Thanks for logging in! Let's play game now!</br>
 <a class="btn btn-primary" href="level1.php" role="button">Level 1</a></br>
 <a class="btn btn-primary" href="level2.php" role="button">Level 2</a></br>
 <a class="btn btn-primary" href="level3.php" role="button">Level 3</a></br>
 <a class="btn btn-primary" href="level4.php" role="button">Level 4</a></br>
 <a class="btn btn-primary" href="level5.php" role="button">Level 5</a></br>
 </div></body>
<?php else: ?>
  <head>
<link rel="stylesheet" href="style.css" />
</head>
<body class="wrapper"> <div>
<br> You have entered the wrong username or password. Please try again. <br>
<a class="btn btn-primary" href="login.php" role="button">Back to Login</a></br>
 </div></body>


<?php endif;


?>

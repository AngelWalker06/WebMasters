
<?php
$errors = [];
$user = [
  'username' => '',
  'score1' => 0,
  'score2' => 0,
  'score3' => 0,
  'score4' => 0,
  'score5' => 0,
  'password' => '',
];
/* Confirm that values are present before accessing them. */
if (isset($_POST['username'])) {
  $user['username'] = urlencode($_POST['username']);
}
if (isset($_POST['password'])) {
  $user['password'] = urlencode($_POST['password']);
}

/* Write to singles.txt after validation. */
if (empty($errors)) {

  //parse form details into a one line
  $user_details = $user;
  $to_write = implode(",", $user_details);
  file_put_contents("userdata.txt", PHP_EOL . $to_write, FILE_APPEND);
  ?>
  <head>
  <link rel="stylesheet" href="style.css" />
</head>
<body class="wrapper"> <div>
   Thanks for the registration! Let's play game now!</br>
   <a class="btn btn-primary" href="level1.php" role="button">Level 1</a></br>
   <a class="btn btn-primary" href="level2.php" role="button">Level 2</a></br>
   <a class="btn btn-primary" href="level3.php" role="button">Level 3</a></br>
   <a class="btn btn-primary" href="level4.php" role="button">Level 4</a></br>
   <a class="btn btn-primary" href="level5.php" role="button">Level 5</a></br>
   </div></body>
  
<?php
} else {
   ?>
    <div class="errors">
        Please fix the following errors:
        <ul>
<?php foreach ($errors as $error) { ?>
            <li><?= $error ?> </li>
    <?php } ?>
        </ul>
    </div>
<?php
}


?>

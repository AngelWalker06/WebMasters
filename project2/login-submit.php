
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

if ($success) {
  echo "<br> Hi $userN you have been logged in. <br>";
} else {
  echo "<br> You have entered the wrong username or password. Please try again. <br>";
}


?>

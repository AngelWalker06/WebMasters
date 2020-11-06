
 /* Set default values for all variables the page needs. */<?php
 /* Set default values for all variables the page needs. */
 $errors = [];
 $user = [
   'username' => '',
   'score1' => '',
   'score2' => '',
   'score3' => '',
   'score4' => '',
   'score5' => '',
   'password' => '',
 ];
 /* Confirm that values are present before accessing them. */ if (
   isset($_POST['username'])
 ) {
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
    <pre>
        Thank you for the registering!
        do you want to play game now?
        link
    </pre>
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

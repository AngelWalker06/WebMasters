<?php session_save_path("session"); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Sign Up</title>
  <link
    rel="stylesheet"
    href="style.css"
  />
  <style type="text/css">
    body {
      font: 14px sans-serif;
    }
    .wrapper {
      width: 350px;
      padding: 20px;
    }
  </style>
</head>

<body class="wrapper" style="width: auto;">
  <div >
    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>
    <form action="register-submit.php" method="post">
            <div class="form-group <?php echo !empty($username_err)
              ? 'has-error'
              : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo !empty($password_err)
              ? 'has-error'
              : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
  </div>
  <?php include "footer.php"; ?>
</body>

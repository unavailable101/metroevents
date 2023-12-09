<?php
    session_start();
     include("api.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        toRegister();
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
      <div class="center" style="border:1px black solid; 
                                border-radius: 10px;
                                box-shadow: 0px 0px 15px 0px black;">
          <h1>Register</h1>
          <form method="POST" action="">
              <div class="txt_field">
                  <input type="text" name="name" method="POST" required>
                  <label>Name</label>
              </div>
              <div class="txt_field">
                  <input type="text" name="username" method="POST" required>
                  <label>Username</label>
              </div>
              <div class="txt_field">
                  <input type="email" name="email" method="POST" required>
                  <label>Email</label>
              </div>
              <div class="txt_field">
              <!-- remember to put require here -->
                  <input type="password" name="password" method="POST" > 
                  <label>Password</label>
              </div>
              <input name="submit" type="Submit" value="Sign Up">
              <div class="signup_link">
                  Have an Account ? <a href="login.php">Login Here</a>
              </div>
          </form>
      </div>
  </body>
</html>
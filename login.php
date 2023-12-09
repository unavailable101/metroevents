<?php
    session_start();
     include("api.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        toLogin();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Metro Events</title>
        <link rel="stylesheet" type = "text/css" href="styles.css">
        
    </head>
    <body class="body-login">
        <div class="container">
            <h1>Metro Events</h1>
        </div>
        <div class="container" style="padding-left: 100px;">
            <div id="inner-container">
                <h2 style="margin-top: 0;">Log In</h2>
                <br>
                <form method="POST" action="login.php">
                    <div class="login-form">
                        <label style="color: rgb(122, 118, 118);">
                            Username
                        </label>
                        <input type="text" value="" name="username" method="POST" require/>
                    </div>
                    <br>
                    <div class="login-form">
                        <label style="color: rgb(122, 118, 118);">
                            Password
                        </label>
                        <input type="password" value="" name="password" method="POST" />
                    </div>
                    <br>
                    <div class="login-options">
                        <span style="flex: 1; text-align: right;">
                            <a href="#">Forgot Password?</a>
                        </span>
                        <br>
                        <br>
                        <button style="margin-right: auto;">LOGIN</button>
                        <br>
                        <br>
                        <span style="flex: 1;">
                            Don't have an account? <a href="register.php" id="register">Register</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>

    </body>
</html>

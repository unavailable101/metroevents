<?php
  session_start();
  // include("login.php");
  // include("register.php");
  if (!isset($_SESSION['username'])){
    header('location:login.php');
  }

?>

<!DOCTYPE html> 
<html>
<head>
  <title>Metro Events</title>
</head>
<body>
  
  <?php
    include("header.php");
    include("api.php");
  ?>

  <div style="display: flex; justify-content: flex;">
    <div style="display: flex; flex-wrap: wrap; justify-content: space-around;width: 100%; ">
      <?php
        echo allEvents();
      ?>
    </div>
  </div>
</body>
</html>

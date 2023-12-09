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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
  <script src = "myscripts.js"></script>
</body>
</html>

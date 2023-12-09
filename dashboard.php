<!-- <body> -->
  
  <?php
      session_start();
      include("header.php");
      // echo '<h3>Hello, ' . $_SESSION['name'] . '</h3>'; 
    if ($_SESSION['uid'] < 3 ){
      include("dash-for-admin.php");
    } else {
      include("dash-for-user.php");
    }
  ?>
<!--     
</body> -->
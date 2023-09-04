<?php session_start();
 session_destroy();
header('location:login.php'); 
 echo "<script type='text/javascript'>window.location.href='login.php';</script>"; 
 ?>

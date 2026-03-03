
<?php
   session_start();
   unset($_SESSION['email']);
   unset($_SESSION['password']);
   session_destroy();
   header("location:C:\wamp\www\S\index.php");
?>

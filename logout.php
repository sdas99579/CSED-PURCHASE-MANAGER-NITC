<?php 
      include('./config/constants.php');
   //1.Destroy The Session
   session_destroy();//unset $_session['user']
   //2.Redirect to Login page
   header('location:'.SITEURL.'login.php');
?>
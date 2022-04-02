
<?php 
  include('./config/constants.php');
  include('./config/login-check.php');
?>
<?php
  if(isset($_SESSION['session-id']))
  {
    if(time()-$_SESSION["login_time_stamp"] >600) 
    {
        session_unset();
        session_destroy();
        $_SESSION['session-out']="<div class='error text-center'>Session Time Out!!</div>";
        header("location:".SITEURL."userlogin.php");
    }
  }
  if(isset($_SESSION['session-id']))
  {
    $id=$_SESSION['session-id'];
  }
if(isset($_SESSION['request']))// checking whether the session is set ot not
{
 echo $_SESSION['request']; //Displayt the session message if set
 unset($_SESSION['request']);//Remove Session Message
}
?>
<html>
    <head>
        <title>Welcome!! CSED Member</title>
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./css/user.css">
    </head>

    <body class="back-graund">
        <div class="index">
            <h2 class="text-center">CSED Member</h2>
                <div class="">
                  <a href="<?php echo SITEURL; ?>logout.php" class="btn btn-primary">Log Out</a>
                </div>
                 <br>
               <?php  
                  
                 if(isset($_SESSION['login']))
                   {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                   }
                   if(isset($_SESSION['register']))
                   {
                    echo $_SESSION['register'];
                    unset($_SESSION['register']);
                   }
                   
               ?>
                <br>
                 <!--Login Form Start  -->
                 <form action="" method="POST" class="text-center">
                     <div class="main-page">
                       <input type="submit" name="add_request" value="+Add Request" class="button-73"> 
                      </div>
                     <div class="main-page">
                      <input type="submit" name="check_status" value="Check Status" class="button-73">
                     </div>
                     <div class="main-page">
                        <input type="submit" name="view_pre_req" value="View Previous Requests" class="button-73">
                     </div>
                     <br><br>
                 </form>
        </div>
    </body>
</html>
<?php
  if(isset($_POST['add_request']))
  {
    
    header("location:".SITEURL."Request_form.php");
  }
  if(isset($_POST['check_status']))
  {
    header("location:".SITEURL."check_status.php");
  }
  if(isset($_POST['view_pre_req']))
  {
    header("location:".SITEURL."previous_list.php");
  }
?>
<?php 
  include('./config/constants.php');
?>

<html>
    <head>
        <title>Login - CSED Purchase Manager</title>
        <link rel="stylesheet" href="./css/user.css">
    </head>

    <body class="back-graund">
        <div class="login">
            <h2 class="text-center">Login</h2>
               <br>
               <?php  
                 
                 if(isset($_SESSION['login']))
                   {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                   }
                   if(isset($_SESSION['no-login-message']))
                   {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                   }
               
               ?>
                <br>
                 <!--Login Form Start  -->
                 <form action="" method="POST" class="text-center">
                     E-mail: <br>
                     <input type="text" name="username" placeholder="Enter Username"><br><br>
                     Password: <br>
                     <input type="password" name="password" placeholder="Enter Password"><br><br>
                     
                     <input type="submit" name="submit" value="Login" class="btn-primary">
                     <input type="submit" name="submit" value="Forget pasword" class="btn-primary">
                     <br><br>
                 </form>
            <p class="text-center">Created By - <a href="www.mohdnafees.com">Group Number 10</a></p>
        </div>
    </body>
</html>

<?php 
  //check whether the submit button clicled or not
  if(isset($_POST['submit']))
  {
      //1.Get the data from form
      //$username=$_POST['username']; //Old that is not secure
      $username=mysqli_real_escape_string($conn,$_POST['username']);//New that is secure
      //$password=md5($_POST['password']);
      $raw_password=md5($_POST['password']);
      $password=mysqli_real_escape_string($conn,$raw_password);
      //2.Creat SQL to check whether the user witrh username and passwotd exist
      $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
      //3.Execute Query
      $res= mysqli_query($conn,$sql);
      if($res==true)
      {
          $coun=mysqli_num_rows($res);
          if($coun==1)
          {
              //User available and Login Success
              $_SESSION['login']="<div class='success'>Login Successful.</div>";
              $_SESSION['user']=$username;//To check whether user is loged in or not
             header('location:'.SITEURL.'admin/');
          }
          else
          {
              //user not available and Login Fails
              $_SESSION['login']="<div class='error text-center'>Login Failed - Username or Password did not match.</div>";
              header('location:'.SITEURL.'admin/login.php');
          }
      }
  }
 
?>
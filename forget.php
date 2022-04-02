<?php 
  include('./config/constants.php');
?>

<html>
    <head>
        <title>Login - CSED Purchase Manager</title>
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/userlogin.css">
    </head>
    
    <body> <!-- class="back-graund" -->
        <div class="main_div">
          <div class="box">  
            <h2 class="text-center" style="color:#fff;">Forgot Password</h2>
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
                 <div class="inputBox">
                    <input type="text" name="e_mail" autocomplete="off" required="">
				    <label>E-Mail</label>
			      </div>
                  <input type="submit" name="submit" value="Change Password" class="btn-primary">
                  <a href="<?php echo SITEURL; ?>userlogin.php" class="btn btn-primary" role="button">Back</a>
                  <br><br>
                 </form>
            <p class="text-center">Created By - <a href="www.mohdnafees.com">Group Number 10</a></p>
        </div>
     </div> 
    </body>
</html>

<?php 
  //check whether the submit button clicled or not
  if(isset($_POST['submit']))
  {
      //1.Get the data from form
      //$username=$_POST['username']; //Old that is not secure
      $e_mail=mysqli_real_escape_string($conn,$_POST['e_mail']);//New that is secure
      //$password=md5($_POST['password']);
      $sql="SELECT * FROM tbl_login WHERE e_mail='$e_mail'";
      //3.Execute Query
      $res= mysqli_query($conn,$sql);
      if($res==true)
      {
          $coun=mysqli_num_rows($res);
          $rows=mysqli_fetch_assoc($res);
          $id=$rows['id'];
          if($coun==1)
          {
              //User available and Login Success
             // $_SESSION['login']="<div class='success'>Login Successful.</div>";
             // $_SESSION['user']=$e_mail;//To check whether user is loged in or not
             header('location:'.SITEURL.'change_password.php?id='.$id);
          }
          else
          {
              //user not available and Login Fails
              $_SESSION['login']="<div class='error text-center' style='color:#fff'>User doesn't exist!! Please Register First</div>";
              header('location:'.SITEURL.'userlogin.php');
          }
      }
  }
 
?>
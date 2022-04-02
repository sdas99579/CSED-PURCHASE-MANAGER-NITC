<?php 
  include('./config/constants.php');
?>

<html>
    <head>
        <title>Register - CSED Purchase Manager</title>
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/userlogin.css">
    </head>

    <body>
       <div class="main_div">
        <div class="box">
            <h2 class="text-center" style="color:#fff;">Register</h2>
               <br>
               <?php  
                 
                 if(isset($_SESSION['register']))
                   {
                    echo $_SESSION['register'];
                    unset($_SESSION['register']);
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
                  <div class="inputBox">
                  <input type="password" name="password" autocomplete="off" required="">
				            <label>Password</label>
			            </div>
                  <div class="inputBox">
                    <input type="text" name="csed_id" autocomplete="off" required="">
				            <label>CSED ID</label>
			            </div>
            
                  <input type="submit" name="Register" value="Register" class="btn-primary">
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
  if(isset($_POST['Register']))
  {
      //1.Get the data from form
      //$username=$_POST['username']; //Old that is not secure
      $e_mail=mysqli_real_escape_string($conn,$_POST['e_mail']);//New that is secure
      //$password=md5($_POST['password']);
      $raw_password=md5($_POST['password']);
      $password=mysqli_real_escape_string($conn,$raw_password);
      $csed_id=mysqli_real_escape_string($conn,$_POST['csed_id']);
      //$type=mysqli_real_escape_string($conn,$_POST['type']);
      //2.Creat SQL to check whether the user witrh username and passwotd exist
      $sql="INSERT INTO tbl_login set 
        e_mail='$e_mail',
        password='$password',
        csed_id='$csed_id'";
      //3.Execute Query
      $res= mysqli_query($conn,$sql);
      if($res==true)
      {
        //Data inserted
        //echo "Data inserted";
        //Creat a session variable to dispaly the message
        $_SESSION['register']="<div class='success'>Registered Successfully</div>";
        //Redirect page
        header("location:".SITEURL);
      }     
      else
      {
        //Data is not inserted
        //echo "Data is not inserted";
         //Creat a session variable to dispaly the message
         $_SESSION['register']="<div class='error'>Fail to Register</div>";
         //Redirect page
         header("location:".SITEURL.'/register.php'); 
      }
  }
 
?>
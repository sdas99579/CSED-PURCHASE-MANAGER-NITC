
<?php 
  include('./config/constants.php');
?>

<html>
    <head>
        <title>Welcome!! CSED Menber</title>
        <link rel="stylesheet" href="./css/user.css">
    </head>

    <body class="back-graund">
        <div class="login">
            <h2 class="text-center">CSED Menber</h2>
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
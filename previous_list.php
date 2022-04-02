<?php 
  include('./config/constants.php');
?>
<?php
 if(isset($_SESSION['session-id']))
 {
 $id=$_SESSION['session-id'];
 $sql="SELECT * FROM tbl_login WHERE id=$id";
   $res=mysqli_query($conn,$sql);
   if($res==true)
   {
     $count=mysqli_num_rows($res);
     if($count==1)
     {
       $row=mysqli_fetch_assoc($res);
       $e_mail=$row['e_mail'];
     }
   }
 }	
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
 <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

	<link rel="stylesheet" href="./css/userlogin.css">
</head>
<body>

<div class="main_div" style="margin:10%; padding: 5% ;align: center;">
	<div class="box">
		<h1>CSED Member</h1>
		<h3 style="text-align: center;color: #fff">Previous list</h3><br>
		<form method="post" action="">
			<div class="inputBox">
				<input type="text" name="rq_item" autocomplete="off">
				<label>Request Id</label>
				<input type="submit" name="" value="Search">
			</div>
			<div style="clear:both"></div>
    <br />
    <!-- <h1 class="cantainer text-center"> My Cart  <i class="fas fa-cart-arrow-down"></i></h1><br> -->
    <div class="table-responsive">
    <table class="table table-bordered text-center " style="border:3px solid #5cb85c;">
    <tr>
    <th width="30%" style="color: #fff">Request Item</th>
    <th width="10%" style="color: #fff">Date</th>
    <th width="10%" style="color: #fff">Action</th>
    </tr>
    <?php
    $sql1="SELECT * FROM tbl_request WHERE e_mail='$e_mail' ORDER BY date DESC";
    $res1=mysqli_query($conn,$sql1);
    //$count=mysqli_num_rows($res1);
    //echo $count;
    if($res1==true)
    {
      //echo $e_mail;
      $count=mysqli_num_rows($res1);
      if($count>0)
      {
        while($rows=mysqli_fetch_assoc($res1))
        {
          $id1=$rows['id'];
          $req_item=$rows['req_item'];
          $date=$rows['date'];
        ?>
        <tr style="color:#fff">
          <td><?php echo $req_item; ?></td>
          <td><?php echo $date; ?></td>
          <td>
          <a href="<?php echo SITEURL; ?>req_detail.php?id1=<?php echo $id1; ?>" class="btn btn-primary" role="button">Info</a> 
          </td>
        </tr> 
        <?php
        }
      }
      else
      {
        //No Request Found
        $_SESSION['req_not_found']="<div class='error'>Record Not Found</div>";
        //header('location:'.SITEURL.'Request_form.php');
        header('location:'.SITEURL);
      }
  
    }
    ?>
    </table>
    </div>
    <div style="padding:10px;">
     <!-- <input type="submit" name="exit" value="Back"> -->
     <a href="<?php echo SITEURL; ?>" class="btn btn-primary" role="button">Back</a> 
  </div>	
	</form>
	</div>
	
</div>


</body>
</html>

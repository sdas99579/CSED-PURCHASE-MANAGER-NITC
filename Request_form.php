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

if(isset($_SESSION['request']))// checking whether the session is set ot not
{
 echo $_SESSION['request']; //Displayt the session message if set
 unset($_SESSION['request']);//Remove Session Message
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
<link rel="stylesheet" href="./css/userlogin.css">
</head>
<body>

<div class="main_div">
	<div class="box">
		<h1>CSED Member</h1>
		<h3 style="text-align: center;color: #fff">New Request</h3><br>
		<form method="post" action="">
			<div class="inputBox">
				<input type="text" name="req_item" autocomplete="off" required="">
				<label>Request Item</label>
			</div>

			<div class="inputBox">
				<input type="text" name="location" autocomplete="off" required="" >
				<label>Request location in campus</label>
			</div>
			<div class="inputBox">
				<input type="text" name="reason" autocomplete="off" required="" >
				<label>Reason</label>
			</div>
			<div class="inputBox">
				<!-- <input type="text" name="date" autocomplete="off" required="" > -->
				<input type="date" id="birthday" name="date" required="" style="color:#fff;">
				<!-- <label>Date dd/mm/yy</label> -->
			</div>
            <input type="hidden" name="e_mail" value="<?php echo $e_mail; ?>">
			<input type="submit" name="submit" value="Submit">
			<a href="<?php echo SITEURL; ?>" class="btn btn-primary" role="button">Back</a> 

		</form>
	</div>
	
 </div> 
</body>
</html>

<?php
  if(isset($_POST['submit']))
  {
	$e_mail1=$_POST['e_mail'];
	$req_item=$_POST['req_item'];
	$location=$_POST['location'];
	$reason=$_POST['reason'];
	$status="pending";
	$date=$_POST['date'];
	//echo $date;
	$sql="INSERT INTO tbl_request set 
	    req_item='$req_item',
		location='$location',
		reason='$reason',
		status='$status',
        e_mail='$e_mail1',
		date='$date'";
	$res=mysqli_query($conn,$sql);
	if($res==true)
    {
      //Category Updated
      $_SESSION['request']="<div class='success'>Requested Successfully.</div>";
      header('location:'.SITEURL);
    }
    else
    {
     //fail to Update Category
      $_SESSION['request']="<div class='error'>Request Failed</div>";
      header('location:'.SITEURL.'Request_form.php');
    }	
  }
?>
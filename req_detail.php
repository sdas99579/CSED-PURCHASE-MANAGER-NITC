<?php 
  include('./config/constants.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Request Details</title>
	
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

<div class="main_div" style="padding: 10%;">
	<div class="box">
		<h1>CSED Member</h1>
		<br>
		<form method="post" action="">
			<div class="inputBox" style="color: #fff">
				<!-- <input type="text" name="rq_item" autocomplete="off" required=""> -->
				<!-- <label>Request Item</label> -->
				<?php
                 if(isset($_GET['id1']))
                {
                  $id1=$_GET['id1'];
				  //echo $id;
				  $sql="SELECT * FROM tbl_request WHERE id=$id1";
				  $res=mysqli_query($conn,$sql);
				  $count=mysqli_num_rows($res);
				  if($count==1)
				  {
					$row=mysqli_fetch_assoc($res);
					$req_item=$row['req_item'];
					$location=$row['location'];
					$reason=$row['reason'];
					$status=$row['status'];
					$date=$row['date'];
				  }
 				} 
?>
				<h3>Request Id:</h3>
				<br>
				 <p><?php echo $id1 ?></p>
				<br>
				<h3>Item Name:</h3>
				<br>
				<p><?php echo $req_item ?></p>
				<br>
				<h3>Date:</h3>
				<br>
				<p><?php echo $date ?></p>
				<br>
				<h3>Location:</h3>
				<br>
				<p><?php echo $location ?></p>
				<br>
				<h3>Reason:</h3>
				<br>
				<p><?php echo $reason ?></p>
				<br>
				<h3>Status:</h3>
				<br>
				<p><?php echo $status ?></p>
				<br>
				<br>
			</div>
			<!-- <input type="submit" name="back" value="Back"> -->
            <a href="<?php echo SITEURL; ?>previous_list.php" class="btn btn-primary" role="button">Back</a> 
		</form>
	</div>
	
</div>


</body>
</html>
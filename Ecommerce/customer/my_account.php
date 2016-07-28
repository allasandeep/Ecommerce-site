<!DOCTYPE>
<?php 
session_start();
include("functions/functions.php");

?>
<html>
 <head>
    <title>onlinebiryani</title>
	
	<link rel="stylesheet" href="styles/style1.css" media="all"/>
  </head>
 <body style='background:#b9a879; '>
 <!-- main container starts here -->
   <div class="main_wrapper">
    <!-- header starts here -->
	<div class="header_wrapper"> 
	<a href='index.php'><img style="width:230px; height:100px;  margin:30px;" id="logo" src="logo.png"/></a>
	 <!-- Search box -->
	   <div id="search">
	      <form method="get" action="results.php" enctype="multipart/form-data">
		    <input type="text" class="textbox" name="user_query" placeholder=" Search the Items"/>
			<input type="submit" class="button button1" name="search" value="search"/>
		  </form>
	   </div></div>
	<!-- header ends here -->
	
	<!-- menu bar starts here -->
	<div class="menubar">
	
	   <ul id="menu">
	      <li><a href="../index.php">HOME</a></li>
		
		  <li><a href="my_account.php">MY ACCOUNT</a></li>
		  <li><a href="../orderonline.php">ORDER ONLINE</a></li>
		  <li><a href="../aboutus.php">ABOUT US</a></li>
	   
	   </ul>
	  
	   </div>
	 
	<!-- menu bar ends here -->
	<?php cart(); ?>
	<div id="shopping_cart">
	
	<span style="float:right; font-size:18px;  margin:5px; line-height:0px; color:white;">
	<?php 
	if(isset($_SESSION['customer_email'])){
		echo $_SESSION['customer_email']."<b>!</b>";
	}
	 
	if(!isset($_SESSION['customer_email'])){
		
		echo "<a href='checkout.php' style='text-decoration:none;'><button class='button'><span>Login</span></button></a>";
	}
	else
	{
		echo "<a href='logout.php' style='color:white; text-decoration:none;'><button class='button'><span>Logout</span></button></a>";
	}
	?>
	</span>
	
	</div>
	<!-- content wrapper starts here -->
	<div class="content_wrapper">
	<div id="page3_area1">
	
	
	
	

	<div id="sidebar">
	<div id="sidebar_title" align="center"><a href="my_account.php" style="text-decoration:none; color:white;";>My Account</a></div>
	<ul id="account_details">
	<!-- for getting customer image -->
	<?php
	$user = $_SESSION['customer_email'];
	
	$get_img = "select * from customers where customer_email='$user'";
	
	$run_img = mysqli_query($con, $get_img);
	
	 $row_img = mysqli_fetch_array($run_img);
	
	//$c_image = $row_img['customer_image'];
	
	//echo "<img src='customer_images/$c_image' width='150' height='150'/>";
	
	$c_name = $row_img['customer_name'];
	
	?> 
	<li><a href="my_account.php?my_orders">My Orders</a></li>
	<li><a href="my_account.php?my_cart">My Cart</a></li>
	<li><a href="my_account.php?edit_account">Edit Account</a></li>
	<li><a href="my_account.php?change_pass">Change Password</a></li>
	<li><a href="my_account.php?delete_account">Delete Account</a></li>
	<li><a href="logout.php">Logout</a></li>
	<ul>
	</div>
	<div id="contentpart" align="center">
	
	
	<?php
	if(!isset($_GET['my_orders'])){
		if(!isset($_GET['my_cart'])){
		if(!isset($_GET['edit_account'])){
			if(!isset($_GET['change_pass'])){
				if(!isset($_GET['delete_account'])){
					
					
			
	
	echo "<h2 style='padding:3px; color:green' align='center'>Hello! $c_name</h2><br>
	<b>You can see your orders progress by clicking this <a href='my_account.php?my_orders'>Link</a></b>";
					}
			}
		}
		
	}
	}
	?>
	<?php
	if(isset($_GET['my_cart'])){
			echo "<script>window.open('cart.php','_self')</script>";
	}
	if(isset($_GET['edit_account'])){
		include("edit_account.php");
	}
	if(isset($_GET['change_pass'])){
		include("change_pass.php");
	}
	if(isset($_GET['delete_account'])){
		include("delete_account.php");
	}
	if(isset($_GET['my_orders'])){
		include("my_orders.php");
	}
	?>
	</div>
	 
	
	</div>
	</div>
	<!-- content wrapper ends here  -->
	<div id="footer">
     <h4 style="text-align:center; padding-top:5px;">&copy;2016 online Biryani </h4>
	</div>

   
   
   
   
   
   </div>
   <!-- main container ends here -->
 
 
 
 
 
 </body>
 </html>
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
	        <li><a href="index.php">HOME</a></li>
		 
		  <li><a href="customer/my_account.php">MY ACCOUNT</a></li>
		  <li><a href="orderonline.php">ORDER ONLINE</a></li>
		  <li><a href="aboutus.php">ABOUT US</a></li>
	   
	   </ul>
	  
	   </div>
	   <div class="menubar">
	
	   <ul id="cats">
	     <?php getCats(); ?>
		 
	  </ul>
	  
	   </div>
	<!-- menu bar ends here -->
	<!-- content wrapper starts here -->
	<div class="content_wrapper">
	<div id="page3_area1" >
	<?php cart(); ?>
	
	<div id="shopping_cart">
	
	<span style="float:right; font-size:18px;  margin:5px; line-height:0px; color:white;"><?php if(isset($_SESSION['customer_email'])){
		echo $_SESSION['customer_email']."<b>!</b>";
	}
	else{
	echo "<b> Customer!</b>";}?>  Total Items:     <?php total_items();?>   Total Price: <?php total_price();?> <a href='cart.php'><button class="button"><span>Go to Cart</span></button></a><?php
	if(!isset($_SESSION['customer_email'])){
		
		echo "<a href='checkout.php' style='color:white; text-decoration:none;'><button class='button'><span>Login</span></button></a>";
	}
	else
	{
		echo "<a href='logout.php' style='color:white; text-decoration:none;'><button class='button'><span>Logout</span></button></a>";
	}
	?></span>
	
	</div>
	<div id="items_box">
	
	<?php
	if(!isset($_SESSION['customer_email'])){
		
		include("customer_login.php");
	}
	else{
		include("payment.php");
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
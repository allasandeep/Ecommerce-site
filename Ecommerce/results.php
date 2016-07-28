<!DOCTYPE>
<?php 
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
		    <input type="text" class="textbox" name="user_query" placeholder="Search the Items"/>
			<input type="submit" class="button button1" name="search" value="search"/>
		  </form>
	   </div></div>
	<!-- header ends here -->
	
	<!-- menu bar starts here -->
	<div class="menubar">
	
	   <ul id="menu">
	       <li><a href="index.php">HOME</a></li>
		  <li><a href="aboutus.php">ABOUT US</a></li>
		  <li><a href="orderonline.php">ORDER ONLINE</a></li>
		  <li><a href="signin.php">SIGN IN</a></li>
		  <li><a href="contactus.php">CONTACT US</a></li>
	   
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
	
	<div id="shopping_cart">
	
	<span style="float:right; font-size:18px;  margin:5px; line-height:0px; color:white;">Total Items:     <?php total_items();?>   Total Price: <?php total_price();?> <a href='cart.php'><button class="button"><span>Go to Cart</span></button></a></span>
	
	</div>
	<div id="items_box">
	
	<?php
	if(isset($_GET['search'])){
	
     $search_query =$_GET['user_query'];	
	
	$get_itm = "select *from items where item_keywords like '%$search_query%'";
	
	$run_itm = mysqli_query($con,$get_itm);
	
	while($row_itm = mysqli_fetch_array($run_itm)){
		$itm_id = $row_itm['item_id'];
		$itm_cat = $row_itm['item_cat'];
		$itm_title = $row_itm['item_title'];
		$itm_price = $row_itm['item_price'];
		$itm_desc = $row_itm['item_desc'];
		$itm_image = $row_itm['item_image'];
		
		echo "
			<div id='single_item'>
		<h3>$itm_title</h3>
		<img src='admin_area/item_images/$itm_image' width='350' height='280'/>
		
		<p><b>$itm_price INR</b></p>
		
		<button class='button' style='float:left;'><a href='details.php?itm_id=$itm_id' style='text-decoration:none; color:white;'><span>Details</span></a></button>
		
		<a href='orderonline.php?add_cart=$itm_id'><button class='button button1' style='float:right'>Add to Cart</button></a>
		</div>";
	}
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
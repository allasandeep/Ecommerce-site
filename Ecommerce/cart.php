<!DOCTYPE>
<?php 
session_start();
include("functions/functions.php");

?>
<html>
 <head>
    <title>onlinebiryani</title>
	
	<link rel="stylesheet" href="styles/style1.css" media="all"/>
	<link rel="stylesheet" href="styles/loginstyle.css" media="all"/>
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
	    </div>
	</div>
	<!-- header ends here -->
	
	<!-- menu bar starts here -->
	<div class="menubar">
	
	   <ul id="menu">
	        <li><a href="index.php">HOME</a></li>
		  
		  <li><a href="my_account.php">MY ACCOUNT</a></li>
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
		echo  $_SESSION['customer_email']."<b>!</b>";
	}
	else{
	echo "<b> Customer!</b>";}?> Total Items:     <?php total_items();?>   Total Price: <?php total_price();?> <a href='orderonline.php'><button class="button"><span>Back to Shop</span></button></a>
	<?php
	if(!isset($_SESSION['customer_email'])){
		
		echo "<a href='checkout.php' style='color:white; text-decoration:none;'><button class='button'><span>Login</span></button></a>";
	}
	else
	{
		echo "<a href='logout.php' style='color:white; text-decoration:none;'><button class='button'><span>Logout</span></button></a>";
	}
	?></span>
	
	</div>
	 <!-- cart Form starts here -->
	 <div class="">
	<div class="cart_form">
	<form class="login-form" action="" method="post" enctype="multipart/form-data">
	<table  width="1000px" bgcolor="#FFFFFF">
	<tr align="center">
	  <th><h3>Remove</h3></th>
	  <th><h3>Product(S)</h3></th>
	  <th><h3>Quantity</h3></th>
	  <th><h3>Total Price</h3></th>
	  </tr>
	  <tr align="center">
	  <th>----------</th>
	  <th>----------</h3></th>
	  <th>----------</h3></th>
	  <th>----------</h3></th>
	  </tr>

	  <?php
	$total = 0;
	
	global $con;
	
	$ip = getIp();
	
	$sel_price = "select *from cart where ip_add='$ip'";
	
	$run_price = mysqli_query($con,$sel_price);
	
	while($i_price=mysqli_fetch_array($run_price)){
		
		$itm_id = $i_price['i_id'];
		
		$itm_price = "select *from items where item_id='$itm_id'";
		
		$run_itm_price = mysqli_query($con,$itm_price);
		
		while ($ii_price = mysqli_fetch_array($run_itm_price)){
			
			$item_price = array($ii_price['item_price']);
			$item_title = $ii_price['item_title'];
			$item_image = $ii_price['item_image'];
			$single_price = $ii_price['item_price'];
			$values = array_sum($item_price);
			
			$total +=$values;
			
      ?>
	  
	  
	  <tr align="center">
	  <td><input type="checkbox" name="remove[]" value="<?php echo $itm_id;?>"/></td>
	  <td><?php echo $item_title; ?><br>
	  <img src="admin_area/item_images/<?php echo $item_image;  ?>" width="100px" height="100px" />
	  </td>
	  <td><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty']; ?>"/></td>
	  <?php
	  if(isset($_POST['update_cart'])){
		  
		  $qty =$_POST['qty'];
		  
		  $update_qty = "update cart set qty='$qty'";
		  $run_qty = mysqli_query($con,$update_qty);
		  
		  $_SESSION['qty']=$qty;
		  
		  $total = $total*$qty;
	  }
	 ?>
	 
	   <td><?php echo $single_price." INR"; ?></td>
	  </tr>
	 
	<?php }}
	?>
	 <tr>
	  <td colspan="3" align="right"><b>Sub Total:</b></td>
	  <td align="center"> <?php echo $total." INR"; ?></td>
	  </tr>
	  <tr align="center">
	  <td ><input type="submit" class="button button1" name="update_cart" value="Update Cart"/></td>
	  <td><input type="submit"  class="button button1" name="continue" value="Continue Buying"/></td>
	  <td><input type="submit"  class="button button1" name="checkout" value="Checkout"/></td>
	  </tr>
	  </table>
	  </form>
	  </div>
	  </div>
	  <!-- cart Form ends here -->
	 <?php
	 $ip = getIp();
	 
	 if(isset($_POST['update_cart'])){
		 
		 foreach($_POST['remove'] as $remove_id){
			 
         $delete_item = "delete from cart where i_id='$remove_id' AND ip_add='$ip'";
		 
		 $run_delete = mysqli_query($con,$delete_item);
		
		 
		 if($run_delete){
			 
	 echo "<Script>alert('Proceed to remove item!')</script>";
	echo "<script>window.open('cart.php','_self')</script>";
		 }
			 
		 }
	 }
	 
	 if(isset($_POST['continue'])){
		  echo "<script>window.open('orderonline.php','_self')</script>";
	 }
	 
	 if(isset($_POST['checkout'])){
		  echo "<script>window.open('checkout.php','_self')</script>";
	 }
	 ?>
	  </div>
	</div>
	</div>
	<!-- content wrapper ends here  -->
	
	
	

   </div>
   <!-- main container ends here -->
 
 
 
 
 
 </body>
 </html>
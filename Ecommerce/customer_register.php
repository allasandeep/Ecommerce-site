<!DOCTYPE>
<?php 
session_start();
include("functions/functions.php");
include("includes/db.php");

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
	<a href='#'><img id="logo" src="images/logo.gif"/></a>
	 <!-- Search box -->
	   <div id="form">
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
		  <li><a href="signin.php">SIGN IN</a></li>
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
	
	<span style="float:right; font-size:18px;  margin:5px; line-height:0px; color:white;">Total Items:     <?php total_items();?>   Total Price: <?php total_price();?> <a href='cart.php'><button class="button"><span>Go to Cart</span></button></a></span>
	
	</div>
	
	
	
	<div class="login-page">
    <h2 align="center">Create an Account!</h2>
	<br>
	<div class="form">
    	 <form class="login-form" method="post" action="customer_register.php" enctype="multipart/form-data">
		 <input type="text" name="c_name"  placeholder="Name" required="required"/>
	     <input type="text" name="c_email" placeholder="Email" required="required"/>
         <input type="password" name="c_pass" placeholder="password" required="required"/>
		 <select name="c_country">
	     <option>Select a Country</option>
	     <option>India</option>
	     </select>
		 <input type="text" name="c_city" placeholder="City" required="required"/>
		 <input type="text" name="c_address"  placeholder="Address" required="required"/>
		 <input type="text" name="c_contact" placeholder="Contact" required="required"/>
         <button type="submit" name="register">login</button>
		 <p class="message">Already a Member? <a href="checkout.php?customer_login">Sign In</a></p>
	</form>
	</div>
	</div>
	
	
	
	<!--
	<div id="register_form">
	<form action="customer_register.php" method="post" enctype="multipart/form-data">
	<table  width="1000" align="center" bgcolor="#fff3e6">
	<tr align="center"><td colspan="2"><h2>Create an Account</h2></td></tr>
	<tr>
	<td align="right">Customer Name:</td>
	<td><input type="text" name="c_name" required/></td>
	</tr>
	<tr>
	<td align="right">Email:</td>
	<td><input type="text" name="c_email" required/></td>
	</tr>
	<tr>
	<td align="right">Password:</td>
	<td><input type="password" name="c_pass" required/></td>
	</tr>
	<tr>
	<td align="right">Image:</td>
	<td><input type="file"  name="c_image"/></td>
	</tr> 
	<tr>
	<td align="right">Country:</td>
	<td>
	<select name="c_country">
	<option>Select a Country</option>
	<option>India</option>
	</select></td>
	</tr>
	<tr>
	<td align="right">City:</td>
	<td><input type="text" name="c_city" required/></td>
	</tr>
	<tr>
	<td align="right">Address:</td>
	<td><input type="text" name="c_address" required/><td>
	</tr>
	<tr>
	<td align="right">Contact:</td>
	<td><input type="text" name="c_contact" required/></td>
	</tr>
	<tr align="center">
	<td colspan="2"><input type="submit" class="button button1" name="register" value="Create Account"/></td>
	</tr>
    </table>
	</form>
	</div> -->
	
	
	
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
 <?php
   
 
 
 if(isset($_POST['register'])){
	 
	 $ip = getIp();
	 
	 $c_name = $_POST['c_name'];
	 if($c_name == $name){
		 echo "<script>alert('That name already exits,try a new name!')</script>";
		 $c_name = $_POST['c_name'];
	 }
	 $c_email = $_POST['c_email'];
	 
	 $c_pass = $_POST['c_pass'];
	 $c_image = $_FILES['c_image']['name'];
	 $c_image_tmp = $_FILES['c_image']['tmp_name'];
	 $c_country = $_POST['c_country'];
	 $c_city = $_POST['c_city'];
	 $c_address = $_POST['c_address'];
	 $c_contact = $_POST['c_contact'];
	 
	 move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
	 
	 $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_address,customer_contact,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_address','$c_contact','$c_image')";
 
    $run_c = mysqli_query($con,$insert_c);
	
	$sel_cart = "select *from cart where ip_add='$ip'";
	
	$run_cart = mysqli_query($con,$sel_cart);
	
	$check_cart = mysqli_num_rows($run_cart);
	
	
	if($check_Cart==0){
		
		$_SESSION['customer_email']=$c_email;
		
		echo "<script>alert('Account has been created successfully,Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
	}
	else{
		$_SESSION['customer_email']=$c_email;
		
		echo "<script>alert('Account has been created successfully,Thanks!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}
 
 }
 
 ?>
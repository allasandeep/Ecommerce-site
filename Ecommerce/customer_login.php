<?php
include("includes/db.php");
 
?>
<link rel="stylesheet" href="styles/loginstyle.css" media="all"/>
<div class="login-page" >
    <h2 align="center" >Login or Register to order!</h2>
	<br>
	<div class="form">
    	       
		 
	     <form class="login-form" method="post" action="">
	     <input type="text" name="email" placeholder="Email" required/>
         <input type="password" name="pass" placeholder="password" required/>
         <button type="submit" name="login">login</button>
		 <p class="message">Not registered? <a href="customer_register.php">Create an account</a></p>
	</form>
	</div>
	
	
	<!-- <table width="500" align="center" bgcolor="#fff3e6">
	  	   <tr align="center">
          <td colspan="4"><h2>Login or Register to order!</h2></td>
	     </tr>
		 <tr>
		 <td align="right"><h4>Email:</h4></td>
		 <td><input type=" text" name="email" class="textbox" placeholder="Enter Email" required/></td>
		 </tr>
		 
		 <tr >
		 <td align="right" ><h4>Password:</h4></td>
		 <td><input type="password" class="textbox" name="pass" placeholder="Enter password" required/></td>
		 </tr>
		 <tr align="center">
		 <td colspan="3"><a href="checkout.php?forgot_pass">Forgot Password?</a></td>
		 </tr>
		 <tr align="center">
		 <td colspan="3"><input type="submit" class="button button1" name="login" value="Login"/></td>
		 </tr>
		 
		 </table>
		 <h3 style="float:left; padding=5;"><a href="customer_register.php" style="text-decoration:none;">New? Register Here</a></h3>
		 </div>
		 </form> -->
		 <?php
		 
		if(isset($_POST['login'])){
			 $c_email = mysql_real_escape_string($_POST['email']);
             $c_pass = mysql_real_escape_string($_POST['pass']);	

             $sel_c = "select *from customers where customer_pass='$c_pass' AND customer_email='$c_email'";

             $run_c= mysqli_query($con,$sel_c);
             $check_customer = mysqli_num_rows($run_c);

             if($check_customer==0){
				 echo "<script>alert('Password or Email is incorrect,Please try again!')</script>";
				 
				 exit();
			 }
         
	$ip = getIp();	
    
	$sel_cart = "select *from cart where ip_add='$ip'";
	
	$run_cart = mysqli_query($con,$sel_cart);
	
	$check_cart = mysqli_num_rows($run_cart);
	
	if($check_customer>0 AND $check_cart==0){
		
		$_SESSION['customer_email']=$c_email;
		
		echo "<script>alert('Login Successfull')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
	}
	else
	{
		$_SESSION['customer_email']=$c_email;
		
		echo "<script>alert('Login Successfull')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}
			 
		}
		 ?>
		 </div>
		 

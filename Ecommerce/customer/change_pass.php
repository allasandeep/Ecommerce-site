 <h2 style="text-align:center; color:green;">Change Your Password</h2><br>
<form action="" method="post">
<pre style=" font-size:15px;">
   Enter Current Password   :  <input type="password" class="textbox" name="current_pass" required><br>
   Enter New Password       :  <input type="password" class="textbox" name="new_pass" required><br>
   Enter New Password Again :  <input type="password" class="textbox" name="new_pass_again" required><br>
   </pre>
	  <input type="submit" class="button button1" name="change_pass" value="Change Password">
</form>
<?php
include("includes/db.php");

   if(isset($_POST['change_pass'])){
	   
	   $user = $_SESSION['customer_email'];
	   
	   $current_pass= $_POST['current_pass'];
	   $new_pass = $_POST['new_pass'];
	   $new_again = $_POST['new_pass_again'];
	   
	   $sel_pass = "select *from customers where customer_pass='$current_pass' AND customer_email='$user'";
	   
	   $run_pass = mysqli_query($con, $sel_pass);
	   
	   $check_pass = mysqli_num_rows($run_pass);
	   
	   if($check_pass==0){
		   
		   echo "<script>alert('Your current password is Wrong!')</script>";
	   }
	   
	   if($new_pass!=$new_again){
		   
		    echo "<script>alert('New password do not match!')</script>";
			exit();
	   }
	   else{
		   
		   $update_pass = "update customers set customer_pass='$new_pass' where customer_email='$user'";
		   
		   $run_update = mysqli_query($con , $update_pass);
		   
		   echo "<script>alert('New password is updated successfully!')</script>";
		   echo "<script>window.open('my_account.php','_self')</script>";
	   }
   } 





?>
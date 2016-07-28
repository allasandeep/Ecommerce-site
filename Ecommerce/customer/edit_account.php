<?php

    include("includes/db.php");
	$user = $_SESSION['customer_email'];
	
	$get_customer = "select * from customers where customer_email='$user'";
	
	$run_customer = mysqli_query($con, $get_customer);
	
	 $row_customer = mysqli_fetch_array($run_customer);
	 
	 $c_id = $row_customer['customer_id'];
	 $name = $row_customer['customer_name'];
	 $email = $row_customer['customer_email'];
	 $pass = $row_customer['customer_pass'];
	 $image = $row_customer['customer_image'];
	 $country = $row_customer['customer_country'];
	 $city = $row_customer['customer_city'];
	 $address = $row_customer['customer_address'];
	 $contact = $row_customer['customer_contact'];
	 //$image = $row_customer['customer_image'];
	 
?>
	<form action="" method="post" enctype="multipart/form-data">
	<table  width="500" align="center" bgcolor="#fff3e6">
	<tr align="center" ><td colspan="2"><h2 style="color:green;">Update your Account</h2></td></tr>
	<tr>
	<td align="right">Customer Name:</td>
	<td><input type="text" class="textbox" name="c_name" value="<?php echo $name;?>"required/></td>
	</tr>
	<tr>
	<td align="right" >Email:</td>
	<td><input type="text" class="textbox" name="c_email" value="<?php echo $email;?>"  /></td>
	</tr>
	<tr>
	<td align="right">Password:</td>
	<td><input type="password" class="textbox" name="c_pass" value="<?php echo $pass;?>" required/></td>
	</tr>
	<tr>
	<!--<td align="right">Image:</td>
	<td><input type="file"  name="c_image"/><img src="customer_images/<?php echo $image;?>" width="50" height="50"/></td>
	</tr> -->
	<tr>
	<td align="right">Country:</td>
	<td>
	<select class="textbox" name="c_country" disabled >
	<option><?php echo $country ?></option>
	<option>India</option>
	</select></td>
	</tr>
	<tr>
	<td align="right">City:</td>
	<td><input type="text" class="textbox" name="c_city" value="<?php echo $city;?>"/></td>
	</tr>
	<tr>
	<td align="right">Address:</td>
	<td><input type="text" class="textbox" name="c_address" value="<?php echo $address;?>"/><td>
	</tr>
	<tr>
	<td align="right">Contact:</td>
	<td><input type="text" class="textbox" name="c_contact" value="<?php echo $contact;?>"/></td>
	</tr>
	<tr align="center">
	<td colspan="2"><input type="submit" class="button button1" name="update" value="Update Account"/></td>
	</tr>
    </table>
	</form>
	
	
	
 <?php
 if(isset($_POST['update'])){
	 
	 
	 $ip = getIp();
	 $customer_id = $c_id;
	 $c_name = $_POST['c_name'];
	 $c_email = $_POST['c_email'];
	 $c_pass = $_POST['c_pass'];
	 $c_image = $_FILES['c_image']['name'];
	 $c_image_tmp = $_FILES['c_image']['tmp_name'];
	 $c_city = $_POST['c_city'];
	 $c_address = $_POST['c_address'];
	 $c_contact = $_POST['c_contact'];
	 
	 move_uploaded_file($c_image_tmp,"customer_images/$c_image");
	 
	 $update_c = "update customers  set customer_name='$c_name',customer_email='$c_email',customer_pass='$c_pass',customer_city='$c_city',customer_address='$c_address',customer_contact='$c_contact' where customer_id='$customer_id'";
 
    $run_update = mysqli_query($con,$update_c);
	
	if($run_update){
		
		echo "<script>alert('Your account has been successfully Updated')</script>";
	    echo "<script>window.open('my_account.php','_self')</script>";
	}
	
	

 
 }
 
 ?>
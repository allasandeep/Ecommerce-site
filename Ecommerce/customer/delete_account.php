<br><br><br><h2 style="text-align:center; color:red;">Do you really want to DELETE your Account?</h2><br>
<form action="" method="post">

<input type="submit" class="button button1" name="yes"  value="Yes,I want to"/>
<input type="submit" class="button button1" name="no" value="No,i was kidding"/>
</form>

<?php
include("includes/db.php");

$user = $_SESSION['customer_email'];

if(isset($_POST['yes'])){
	
	$delete_customer = "delete from customers where customer_email='$user'";
	
	$run_customer = mysqli_query($con,$delete_customer);

echo "<script>alert('Your Account has been Deleted!')</script>";
echo "<script>window.open('../index.php','_self')</script>";
	}
	if(isset($_POST['no'])){
		echo "<script>alert('oh!do not joke again')</script>";
echo "<script>window.open('my_account.php','_self')</script>";
	}




?>

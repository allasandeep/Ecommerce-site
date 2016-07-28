<?php 
session_start(); 
?>



<html>
	<head>
		<title>Payment Successful!</title>
	</head>

<body>
<?php 
		include("includes/db.php");
		include("functions/functions.php");
		
		//this is all for product details
		
		$total = 0;
		
		global $con; 
		
		$ip = getIp(); 
		
		$sel_price = "select * from cart where ip_add='$ip'";
		
		$run_price = mysqli_query($con, $sel_price); 
		
		while($i_price=mysqli_fetch_array($run_price)){
			
			$itm_id = $i_price['i_id']; 
			
			$itm_price = "select * from items where item_id='$itm_id'";
			
			$run_itm_price = mysqli_query($con,$itm_price); 
			
			while ($ii_price = mysqli_fetch_array($run_itm_price)){
			
			$item_price = array($ii_price['item_price']);
			
			$item_id = $ii_price['item_id'];
			
			$itm_name = $ii_price['item_title'];
			
			
			$values = array_sum($item_price);
			
			$total +=$values;
			
			}
		
		
		}
		
			// getting Quantity of the product 
			$get_qty = "select * from cart where i_id='$itm_id'";
			
			$run_qty = mysqli_query($con, $get_qty); 
			
			$row_qty = mysqli_fetch_array($run_qty); 
			
			$qty = $row_qty['qty'];
			
			if($qty==0){
			
			$qty=1;
			}
			else {
			
			$qty=$qty;
			
			$total = $total*$qty;
			
			}
			
			// this is about the customer
			$user = $_SESSION['customer_email'];
				
			$get_c = "select * from customers where customer_email='$user'";
				
			$run_c = mysqli_query($con, $get_c); 
				
			$row_c = mysqli_fetch_array($run_c); 
				
			$c_id = $row_c['customer_id'];
			$c_email = $row_c['customer_email'];
			$c_name = $row_c['customer_name']; 
			
			//payment details from paypal
			
			$amount = $_GET['amt']; 
			
			$currency = $_GET['cc']; 
			
			$trx_id = $_GET['tx']; 

			$invoice = mt_rand();
				
				//inserting the payment to table 
				$insert_payment = "insert into payments (amount,customer_id,item_id,trx_id,currency,payment_date) values ('$amount','$c_id','$itm_id','$trx_id','$currency',NOW())";
				
				$run_payment = mysqli_query($con, $insert_payment); 
				
				// inserting the order into table
				$insert_order = "insert into orders (i_id, c_id, qty, invoice_no, order_date,status) values ('$itm_id','$c_id','$qty','$invoice',NOW(),'in Progress')";
				$run_order = mysqli_query($con, $insert_order); 
				
				//removing the products from cart
				$empty_cart = "delete from cart";
				$run_cart = mysqli_query($con, $empty_cart);
				
				
				
		if($amount==$total){
		
		echo "<h2>Welcome:" . $_SESSION['customer_email']. "<br>" . "Your Payment was successful!</h2>";
		echo "<a href='http://www.onlinebiryani.com/myshop/customer/my_account.php'>Go to your Account</a>";
		
		}
		else {
		
		echo "<h2>Welcome Guest, Payment was failed</h2><br>";
		echo "<a href='http://www.onlinebiryani.com/myshop'>Go to Back to shop</a>";
		
		}
		
		
		
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <sales@onlinebiryani.com>' . "\r\n";
			
			$subject = "Order Details";
			
			$message = "<html> 
			<p>
			
			Hello dear <b style='color:blue;'>$c_name</b> you have ordered some products on our website onlinetuting.com, please find your order details, your order will be processed shortly. Thank you!</p>
			
				<table width='600' align='center' bgcolor='#FFCC99' border='2'>
			
					<tr align='center'><td colspan='6'><h2>Your Order Details from onlinetuting.com</h2></td></tr>
					
					<tr align='center'>
						<th><b>S.N</b></th>
						<th><b>Item Name</b></th>
						<th><b>Quantity</b></th>
						<th><b>Paid Amount</th></th>
						<th>Invoice No</th>
					</tr>
					
					<tr align='center'>
						<td>1</td>
						<td>$itm_name</td>
						<td>$qty</td>
						<td>$amount</td>
						<td>$invoice</td>
					</tr>
			
				</table>
				
				<h3>Please go to your account and see your order details!</h3>
				
				<h2> <a href='http://www.onlinebiryani.com/myshop'>Click here</a> to login to your account</h2>
				
				<h3> Thank you for your order @ - www.onlinetuting.com</h3>
				
			</html>
			
			";
			
			mail($c_email,$subject,$message,$headers);
			
				

?>
</body>
</html>








<table width="795" align="center" bgcolor="silver"> 

	
	<tr align="center">
		<td colspan="6"><h2>Your Orders details:</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Product (S)</th>
		<th>Quantity</th>
		<th>Invoice No</th>
		<th>Order Date</th>
		<th>Status</th>
	</tr>
	<?php 
	include("includes/db.php");
	
		$user = $_SESSION['customer_email'];
				
			$get_c = "select * from customers where customer_email='$user'";
				
			$run_c = mysqli_query($con, $get_c); 
				
			$row_c = mysqli_fetch_array($run_c); 
			$c_id = $row_c['customer_id'];
	
	$get_order = "select * from orders where c_id='$c_id'";
	
	$run_order = mysqli_query($con, $get_order); 
	
	$i = 0;
	
	while ($row_order=mysqli_fetch_array($run_order)){
		
		$order_id = $row_order['order_id'];
		$qty = $row_order['qty'];
		$itm_id = $row_order['i_id'];
		$invoice_no = $row_order['invoice_no'];
		$order_date = $row_order['order_date'];
		$status = $row_order['status'];
		$i++;
		
		$get_itm = "select * from items where item_id='$itm_id'";
		$run_itm = mysqli_query($con, $get_itm); 
		
		$row_itm=mysqli_fetch_array($run_itm); 
		
		$itm_image = $row_itm['item_image']; 
		$itm_title = $row_itm['item_title'];
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td>
		<?php echo $itm_title;?><br>
		<img src="../admin_area/item_images/<?php echo $itm_image;?>" width="50" height="50" />
		</td>
		<td><?php echo $qty;?></td>
		<td><?php echo $invoice_no;?></td>
		<td><?php echo $order_date;?></td>
		<td><?php echo $status;?></td>
	
	</tr>
	<?php } ?>
</table>
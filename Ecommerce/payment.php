<div>
<?php 
		include("includes/db.php"); 
		
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
			
			$item_name = $ii_price['item_title'];
			
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
			
			}


?>
<h2 align="center" style="padding:2px;">Pay now with Paypal:</h2>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" >

<!-- Identify your business so that you can collect the payments. -->
<input type="hidden" name="business" value="sandeepalla96marchant@gmail.com">

<!-- Specify a Buy Now button. -->
<input type="hidden" name="cmd" value="_xclick">

<!-- Specify details about the item that buyers will purchase. -->
<input type="hidden" name="item_name" value="<?php echo $item_name; ?>">
<input type="hidden" name="item_number" value="<?php echo $itm_id; ?>">
<input type="hidden" name="amount" value="<?php echo $total; ?>">
<input type="hidden" name="quantity" value="<?php echo $qty; ?>">
<input type="hidden" name="currency_code" value="USD">

<input type="hidden" name="return" value="http://www.onlinebiryani.com/myshop/paypal_success.php"/>
<input type="hidden" name="cancel_return" value="http://www.onlinebiryani.com/myshop/paypal_cancel.php"/>

<!-- Display the payment button. -->
<input type="image" name="submit" border="0"
src="paypal_button.png"
alt="PayPal - The safer, easier way to pay online">
<img alt="" border="0" width="1" height="1"
src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>

</div>

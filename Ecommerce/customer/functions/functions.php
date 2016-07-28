<?php

$con = mysqli_connect("localhost","root","","ecommerce");

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL:" . mysqli_connect_error();
}

//getting the user ip address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

//creating the shopping cart
function cart(){
	if(isset($_GET['add_cart'])){
		
	global $con;
	
	$ip = getIp();
	$itm_id = $_GET['add_cart'];
	
	$check_itm = "select * from cart where ip_add='$ip' AND i_id='$itm_id'";
	
	$run_check = mysqli_query($con,$check_itm);
	
	if(mysqli_num_rows($run_check)>0){
		
		 echo "<Script>alert('Item already added to cart!')</script>";
	echo "<script>window.open('orderonline.php','_self')</script>";
	}
	else{
		$insert_itm = "insert into cart (i_id,ip_add) values ('$itm_id','$ip')";
	 $run_itm = mysqli_query($con, $insert_itm);
	
	
		  
		  echo "<Script>alert('Item added to cart!')</script>";
	echo "<script>window.open('orderonline.php','_self')</script>";
	 
	 
	}
	
}
}

//getting the total added items

function total_items(){
	
	if(isset($_GET['add_cart'])){
		
		global $con;
		
		$ip = getIp();
		
		$get_items = "select *from cart where ip_add='$ip'";
		
		$run_items = mysqli_query($con,$get_items);
		
		$count_items = mysqli_num_rows($run_items);
	}
		else{
		global $con;
		
		$ip = getIp();
		
		$get_items = "select *from cart where ip_add='$ip'";
		
		$run_items = mysqli_query($con,$get_items);
		
		$count_items = mysqli_num_rows($run_items);
		}
	echo $count_items;
	}
//getting the total price of the items in the cart

function total_price(){
	
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
			
			$values = array_sum($item_price);
			
			$total +=$values;
			}
	}
	echo $total." INR ";
}


//getting the categories

function getCats(){
	
	global $con;
	
	$get_cats="select *from categories";
	
	$run_cats= mysqli_query($con , $get_cats);
	
	while ($row_cats = mysqli_fetch_array($run_cats)){
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];
		
		echo "<li><a href='orderonline.php?cat=$cat_id'>$cat_title</a></li>";
	}
}

function getItm(){
	
	if(!isset($_GET['cat'])){
		
	global $con;
	
	$get_itm = "select *from items order by RAND() LIMIT 0,10";
	
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
		
		<img style='width:350; height:280;' src='admin_area/item_images/$itm_image' />
		<br>
		
		<p><b>Price:$itm_price INR</b></p>
		<br>
		
		<button class='button' style='float:left;'><a href='details.php?itm_id=$itm_id' style='text-decoration:none; color:white;'><span>Details</span></a></button>
		
		<a href='orderonline.php?add_cart=$itm_id'><button class='button button1' style='float:right'>Add to Cart</button></a>
		</div>
		";
	}
}
}

function getCatItm(){
	
	if(isset($_GET['cat'])){
		
		$cat_id = $_GET['cat'];
		
	global $con;
	
	$get_cat_itm = "select *from items where item_cat='$cat_id'";
	
	$run_cat_itm = mysqli_query($con,$get_cat_itm);
	
	$count_cats=mysqli_num_rows($run_cat_itm);
	
		if($count_cats==0)
	{
		echo "<h2 style='padding:10px;'>There are no products in this Category!</h2>";
	}
	
	while($row_cat_itm = mysqli_fetch_array($run_cat_itm)){
		$itm_id = $row_cat_itm['item_id'];
		$itm_cat = $row_cat_itm['item_cat'];
		$itm_title = $row_cat_itm['item_title'];
		$itm_price = $row_cat_itm['item_price'];
		$itm_desc = $row_cat_itm['item_desc'];
		$itm_image = $row_cat_itm['item_image'];
		
		echo "
			<div id='single_item'>
		<h3>$itm_title</h3>
		<img style='width:350; height:280;' src='admin_area/item_images/$itm_image' />
		
		<p><b>$itm_price INR</b></p>
		
		<button class='button' style='float:left;'><a href='details.php?itm_id=$itm_id' style='text-decoration:none; color:white;'><span>Details</span></a></button>
		
		<a href='orderonline.php?add_cart=$itm_id'><button class='button button1' style='float:right'>Add to Cart</button></a>
		</div>		";
	    
		
	  
	}
}
}
?>
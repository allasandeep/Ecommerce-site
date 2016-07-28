<?php
session_start();

if(!isset($_SESSION['user_email'])){
	
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
	
}
else
{
	
?>

<!DOCTYPE>

<html>
  <head>
    <title>This is Admin Panel</title>
	
	<link rel="stylesheet" href="styles/style.css" media="all"/>
  </head>
  <body>
   <div class="main_wrapper">
   
   <div id="header"></div>
   <div id="right">
   <h2 style="text-align:center;">Manage Content</h2>
       
	   <a href="index.php?insert_item">Insert New Item</a>
       <a href="index.php?view_items">View Items</a>
	   <a href="index.php?insert_cat">Insert New Category</a>
	   <a href="index.php?view_cats">View all Categories</a>
	   <a href="index.php?view_customers">View Customers</a>
	   <a href="index.php?view_orders">View Orders</a>
	   <a href="index.php?view_payments">View Payments</a>
	   <a href="index.php?logout">Admin Logout</a>
   </div>
   <div id="left">
    <h2 style="color:green; text-align:center;"><?php echo @$_GET['Logged In']; ?></h2>
   <?php
   if(isset($_GET['insert_item'])){
	   include("insert_item.php");
   }
    if(isset($_GET['view_items'])){
	   include("view_items.php");
   }
    if(isset($_GET['edit_itm'])){
	   include("edit_itm.php");
   }
    if(isset($_GET['insert_cat'])){
	   include("insert_cat.php");
   }
    if(isset($_GET['view_cats'])){
	   include("view_cats.php");
   }
    if(isset($_GET['edit_cat'])){
	   include("edit_cat.php");
   }
    if(isset($_GET['view_customers'])){
	   include("view_customers.php");
   }
   if(isset($_GET['view_orders'])){
	   include("view_orders.php");
   }
   if(isset($_GET['view_payments'])){
	   include("view_payments.php");
   }
   if(isset($_GET['logout'])){
	   include("logout.php");
   }
   ?>
   
   </div>
   
   </div>



</body>

</html>

<?php }
?>
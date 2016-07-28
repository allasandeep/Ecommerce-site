<?php 
    include("includes/db.php");
	 if(isset($_GET['delete_itm'])){
	 
	 $delete_id = $_GET['delete_itm'];
	 
	 $delete_itm = "delete from items where item_id='$delete_id'";
	 
	 $run_delete = mysqli_query($con,$delete_itm);
	 
	 if($run_delete){
		 
		 echo "<script>alert('Item has been deleted!')</script>";
		 echo "<script>window.open('index.php?view_items','_self')</script>";
	 }
	 
	 
	 
	 }

?>
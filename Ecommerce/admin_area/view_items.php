<?php

if(!isset($_SESSION['user_email'])){
	
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
	
}
else
{
	?>
	
<table width="795" align="center" bgcolor="#39CCCC" >
   
   <tr align="center">
      <td colspan="6"><h2>View all Items Here</h2></td>
   </tr>
   
   <tr align="center" bgcolor="white">
      <th>S.No</th>
	  <th>Title</th>
	  <th>Image</th>
	  <th>Price</th>
	  <th>Edit</th>
	  <th>Delete</th>
	  
   </tr>
   <?php
   include("includes/db.php");
   
   $get_itm = "select * from items";
   
   $run_itm = mysqli_query($con,$get_itm);
   
   $i=0;
   while($row_itm=mysqli_fetch_array($run_itm)){
	   
	   $itm_id = $row_itm['item_id'];
	   $itm_title = $row_itm['item_title'];
	   $itm_image = $row_itm['item_image'];
	   $itm_price = $row_itm['item_price'];
	   $i++;
   ?>
   <tr align="center">
   <td><?php echo $i;?></td>
   <td><?php echo $itm_title;?></td>
   <td><img src="item_images/<?php echo $itm_image;?> width="60px" height="60px"/></td>
   <td><?php echo $itm_price;?></td>
   <td><a href="index.php?edit_itm=<?php echo $itm_id; ?>">Edit</a></td>
   <td><a href="delete_itm.php?delete_itm=<?php echo $itm_id;?>">Delete</a></td>
   </tr>
   <?php } ?>
   

</table>

 <?php } ?>
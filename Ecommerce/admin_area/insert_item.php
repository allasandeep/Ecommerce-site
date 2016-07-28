<?php 
if(!isset($_SESSION['user_email'])){
	
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
	
}
else
{
?>

<!DOCTYPE>
<?php
include("includes/db.php");
?>
<html>
    <head>
	<title>Inserting Items</title>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  </head>

  <body >

<form action="" method="post" enctype="multipart/form-data">

<table align="center" width="795px" border="1" bgcolor="#39CCCC">

<tr align="center">
     <td colspan="6"><h2>Insert new post here</h2></td>
</tr>

<tr>
       <td align="right"><b>Item Title:</b></td>
       <td><input type="text" name="item_title" size="60" required/></td>
</tr>
<tr>
<td align="right"><b>Item Category:</b></td>
<td>
<select name="item_cat">
      <option>Select a Category</option>
	  <?php
    $get_cats="select *from categories";
	
	$run_cats= mysqli_query($con , $get_cats);
	
	while ($row_cats = mysqli_fetch_array($run_cats)){
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];
		
		echo "<option value='$cat_id'>$cat_title</option>";
		
	}
	   ?>
</select>
</td>
</tr>
<tr>
<td align="right"><b>Item price:</b></td>
<td><input type="text" name="item_price" required/></td>
</tr>
<tr>
<td align="right"><b>Item description:</b></td>
<td><textarea name="item_desc" cols="20" rows="10"></textarea></td>
</tr>
<tr>
<td align="right"><b>Item image:</b></td>
<td><input type="file" name="item_image" required/></td>
</tr>
<tr>
<td align="right"><b>Item keywords:</b></td>
<td><input type="text" name="item_keywords" size="50" required /></td>
</tr>
<tr align="center">
<td colspan="6"><input type="submit" class="button button1" name="insert_post" value="Insert Item Now"/></td>
</tr>
</table>

</form>
</body>
</html>
<?php

  if(isset($_POST['insert_post'])){
	  //getting the text data from the fields
	  $item_title = $_POST['item_title'];
	  $item_cat = $_POST['item_cat'];
	  $item_price = $_POST['item_price'];
	  $item_desc = $_POST['item_desc'];
	  $item_keywords = $_POST['item_keywords'];
	  //getting the image from fields
	  $item_image =$_FILES['item_image']['name'];
	  $item_image_tmp = $_FILES['item_image']['tmp_name'];
	  
	  move_uploaded_file($item_image_tmp,"item_images/$item_image");
	  
	  $insert_item = "insert into items (item_cat,item_title,item_price,item_desc,item_image,item_keywords) values('$item_cat',' $item_title','$item_price ','$item_desc',' $item_image','$item_keywords')";
	  
	  $insert_itm = mysqli_query($con,$insert_item);
	  
	  if($insert_itm){
		  
		  echo "<Script>alert('Item has been inserted!')</script>";
		  echo "<script>window.open('index.php?view_items','_self')</script>";
	  }
}

?>	

<?php } ?>
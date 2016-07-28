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

if(isset($_GET['edit_itm'])){
	
	$get_id =$_GET['edit_itm'];
	
	 $get_itm = "select * from items where item_id='$get_id'";
   
   $run_itm = mysqli_query($con,$get_itm);
   
   
   $row_itm=mysqli_fetch_array($run_itm);
	   
	   $itm_id = $row_itm['item_id'];
	   $itm_title = $row_itm['item_title'];
	   $itm_image = $row_itm['item_image'];
	   $itm_price = $row_itm['item_price'];
	   $itm_desc = $row_itm['item_desc'];
	   $itm_keywords = $row_itm['item_keywords'];
	   $itm_cat = $row_itm['item_cat'];
	   
	   $get_cat ="select *from categories where cat_id='$itm_cat'";
	   
	   $run_cat = mysqli_query($con,$get_cat);
	   
	   $row_cat=mysqli_fetch_array($run_cat);
	   
	   $category_title = $row_cat['cat_title'];
	   
   }
?>
<html>
    <head>
	<title>Update Items</title>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  </head>

  <body bgcolor="skyblue">

<form action="" method="post" enctype="multipart/form-data">

<table align="center" width="795px" border="1" bgcolor="orange">

<tr align="center">
     <td colspan="6"><h2>Edit and Update Items</h2></td>
</tr>

<tr>
       <td align="right"><b>Item Title:</b></td>
       <td><input type="text" name="item_title" size="60" value="<?php echo $itm_title;?>" /></td>
</tr>
<tr>
<td align="right"><b>Item Category:</b></td>
<td>
<select name="item_cat">
      <option><?php echo $category_title; ?></option>
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
<td><input type="text" name="item_price" value="<?php echo $itm_price; ?>" /></td>
</tr>
<tr>
<td align="right"><b>Item description:</b></td>
<td><textarea name="item_desc" cols="20" rows="10" ><?php echo $itm_desc; ?></textarea></td>
</tr>
<tr>
<td align="right"><b>Item image:</b></td>
<td><input type="file" name="item_image" /><img src="item_images/<?php echo $itm_image;?> width="60px" height="60px"/></td>
</tr>
<tr>
<td align="right"><b>Item keywords:</b></td>
<td><input type="text" name="item_keywords" size="50" value="<?php echo $itm_keywords; ?>"  /></td>
</tr>
<tr align="center">
<td colspan="6"><input type="submit" class="button button1" name="update_item" value="Update Item"/></td>
</tr>
</table>

</form>
</body>
</html>
<?php

  if(isset($_POST['update_item'])){
	  //getting the text data from the fields
	  
	  $update_id= $itm_id;
	  $item_title = $_POST['item_title'];
	  $item_cat = $_POST['item_cat'];
	  $item_price = $_POST['item_price'];
	  $item_desc = $_POST['item_desc'];
	  $item_keywords = $_POST['item_keywords'];
	  //getting the image from fields
	  $item_image =$_FILES['item_image']['name'];
	  $item_image_tmp = $_FILES['item_image']['tmp_name'];
	  
	  move_uploaded_file($item_image_tmp,"item_images/$item_image");
	  
	    $update_item = "update items set item_cat='$item_cat',item_title='$item_title',item_price='$item_price',item_desc='$item_desc',item_image='$item_image',item_keywords='$item_keywords' where item_id='$update_id'";
	  
	  $run_item = mysqli_query($con,$update_item);
	  
	  if($run_item){
		  
		  echo "<Script>alert('Item has been updated!')</script>";
		  echo "<script>window.open('index.php?view_items','_self')</script>";
	  }
}

?>	
<?php } ?> 
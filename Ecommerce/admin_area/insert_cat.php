<?php
if(!isset($_SESSION['user_email'])){
	
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
	
}
else
{
	?>
<form action="" method="post" style="padding:80px; background:#39CCCC;" >

<b>Insert New Category:</b>
<input type="text" name="new_cat" required/>
<input type="submit" class="button button1" name="add_cat" value="Add Category" />
</form>

<?php
include("includes/db.php");

if(isset($_POST['add_cat'])){
	
$new_cat = $_POST['new_cat'];

      $insert_cat = "insert into categories (cat_title) values ('$new_cat')";

      $run_cat = mysqli_query($con,$insert_cat);

      if($run_cat){
		  
		  echo "<script>alert('New Category has been Inserted!')</script>";
		  echo "<script>window.open('index.php?view_cats','_self')</script>";
	  }	  
}
?>
<?php } ?>
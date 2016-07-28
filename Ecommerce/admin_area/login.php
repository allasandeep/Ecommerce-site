<!DOCTYPE>
<html>
   <head>
      <title>Login Form</title>
	  <link rel="stylesheet" href="styles/loginstyle.css" media="all"/>
</head>
<body>
<div class="login-page">
<!-- <h2 style="color:white; text-align:center;"><?php echo $_GET['not_admin'];?></h2>

<h2 style="color:white; text-align:center;"><?php echo $_GET['logged_out'];?></h2> -->
 <h1 style="margin:1px; text-align:center;">Admin Login<h1>
  <div class="form">
   
   <!-- <form class="register-form">
      <input type="text" name="email" placeholder="Email" required="required"/>
      <input type="password" placeholder="password" required="required"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p> 
    </form> -->
    <form class="login-form" method="post" action="login.php">
      <input type="text" name="email" placeholder="Email" required="required"/>
      <input type="password" name="password" placeholder="password" required="required"/>
      <button type="submit" name="login">login</button>
      <!--<p class="message">Not registered? <a href="#">Create an account</a></p> -->
    </form>
  </div>
  
  </body>
  </html>
  <?php
  session_start();
  include("includes/db.php");
  
       if(isset($_POST['login'])){
		   
		   $email = mysql_real_escape_string($_POST['email']);
		   $pass = mysql_real_escape_string($_POST['password']);
		   
		     $sel_user = "select *from admins where user_pass='$pass' AND user_email='$email'";
		   
		    $run_user= mysqli_query($con,$sel_user);
             $check_user = mysqli_num_rows($run_user);

             if($check_user==0){
				 echo "<script>alert('Password or Email is incorrect,Please try again!')</script>";
				 exit();
			 }
			 else{
				 $_SESSION['user_email']=$email;
		
		
		echo "<script>window.open('index.php?logged_in=You have successfully Logged In!','_self')</script>";
			 }
		   
		   
	   }
  
  
  
  
  
  
  
  ?>
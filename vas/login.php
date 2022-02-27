<?php
include 'db.php';
session_start();
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];


				$sql="SELECT * FROM login WHERE email='$email' AND password='$password'";
				$res=mysqli_query($conn,$sql);
				$count=mysqli_num_rows($res);
				$row=mysqli_fetch_assoc($res);

				$select = "SELECT * FROM doctor WHERE email='$email'";
				$query = mysqli_query($conn,$select);
				$row2=mysqli_fetch_assoc($query);
				$status = $row2['status'];

				$sel = "SELECT pid FROM pet WHERE email='$email'";
				$que = mysqli_query($conn,$sel);
				$row3=mysqli_fetch_assoc($que);

if ($count>0)
{
  	if($row['type']=='admin')	
  	{
		$_SESSION['id']=$row['login_id'];
		header('location:admin.php');

  	}
 	 elseif($row['type']=='pet')
  	{
      
            $_SESSION['id']=$row['login_id'];
        	header('location:pet.php?pid='.$row3['pid']);
    }			
  	
  	elseif($row['type']=='doctor')
  	{
		  
		
			if($status=="approved")
			{
				
				echo '<script>alert("Login successfull!")</script>';
				header('location:doctor.php?id='.$row2['did']);
				
			}
			elseif($status=="pending")
			{
			
			echo '<script>alert("Doctor approval pending!")</script>';
			header("location: login.php");
			
		}
			
          		
	}
        
  	else
  	{
  		echo"<script>alert('Not approved'); 
	             window.location.href='index.php';       </script>";
  	}
}
else
{
	echo"<script>alert('incorrect password'); 
	             window.location.href='index.php';       </script>";
}


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style> form {
	background-color:#00002a90;
	font-size:20px;
	text-align:center;
	border: 0px outset #cc0000;
	color:white;
	outline:0;
	height:440px;
	width: 440px;
	padding-left:10px;
	padding-right:10px;
  margin-top: 20px;
  margin-left:360px;
} 
.input {
	border: 1px outset #FFA5A5;
	
	outline:0;
	height:30px;
	width: 275px;
	padding-left:10px;
	padding-right:10px;
}
.button {
	font-size: 18px;
	padding: 4px 160px;
	border-radius: 8px;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
	background-color: green;
  	color: white;
  	border: 2px solid green;
		} 
</style>
</head>
<body background="hh.jpg">

<div class="container">
<div class="row">
<div class="col-lg-10">
<div class="page-header">

</div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group ">
<div class="page-header">
<h2>LOGIN</h2>

</div>
<label>Email</label>
<input type="email" name="email" class="form-control" class="input" value="" maxlength="30" required="">
<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
</div>
<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control" class="input" value="" maxlength="8" required="">
<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span><BR>
</div>  
<input type="submit" class="button" name="login" value="submit">
<br><BR>
You don't have an account?<a href="index.php" class="mt-3">Click Here</a>
</form>
</div>
</div>     
</div>
</body>
</html>



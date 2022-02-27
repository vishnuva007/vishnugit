<?php
require_once "db.php";
if(isset($_SESSION['login_id'])!="") {
header("Location: dashboard.php");
}
if (isset($_POST['signup'])) {
$cname = mysqli_real_escape_string($conn, $_POST['cname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phno = mysqli_real_escape_string($conn, $_POST['phno']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']); 
$ptype=mysqli_real_escape_string($conn, $_POST['ptype']);
$breed=mysqli_real_escape_string($conn, $_POST['breed']);
$p_age=mysqli_real_escape_string($conn, $_POST['p_age']);
$pweight=mysqli_real_escape_string($conn, $_POST['pweight']);
$pgen=mysqli_real_escape_string($conn, $_POST['pgen']);
$type=mysqli_real_escape_string($conn, $_POST['type']);
if (!preg_match("/^[a-zA-Z ]+$/",$cname)) {
$cname_error = "Name must contain only alphabets and space";
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
$email_error = "Please Enter Valid Email ID";
}
if(strlen($password) < 6) {
$password_error = "Password must be minimum of 6 characters";
}       
if(strlen($phno) != 10) {
$phno_error = "Mobile number must be minimum of 10 characters";
}
if($password != $cpassword) {
$cpassword_error = "Password and Confirm Password doesn't match";
}

$se="SELECT * FROM `login` WHERE email='$email'";
		$r=mysqli_query($conn, $se) or die("<br>Query error...".mysqli_error($conn));
		$count=mysqli_num_rows($r);

	if ($count>0) 
	{
		echo "<script> alert('Username already exists!');window.location.href='index.php'</script>";
	}
	else{


$log="INSERT INTO `login`(`email`, `password`, `type`)VALUES('$email','$password','pet')";
mysqli_query($conn,$log);
$sel="SELECT * FROM `login` WHERE username='$email AND password='$password'";
$rs=mysqli_query($conn,$sel);
$row=mysqli_fetch_assoc($rs);
$login_id=$row['login_id'];
    }
if(mysqli_query($conn,"INSERT INTO pet(cname,breed,ptype,p_age,pweight,pgen,phno,email,password) VALUES('" . $cname . "', '" . $breed . "', '" . $ptype . "', '" . $p_age . "', '" . $pweight . "', '" . $pgen . "', '" . $phno . "',  '" . $email . "', '" . md5($password) . "')")) {
header("location: login.php");
exit();
} 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>pet registration</title>
<style> form {
	background-color:#00002a90;
	font-size:20px;
	font-family:Limelight;
	border: 0px outset #FFd700;
	
	outline:0;
	height:620px;
	width: 740px;
	padding-left:10px;
	padding-right:10px;
  margin-top: 0px;
  margin-left:240px;
} 
.in {
	border: 2px outset #FFd700;
	border-radius:4px;
	outline:0;
	height:30px;
	width: 300px;
	padding-left:10px;
	padding-right:10px;
	
}
.btn{
	border-radius:4px;
    background: #12AD2B;
    color: #ffffff;
    font-size: 15px;
    padding: 6px 30px;
    text-decoration: none;
	margin-left: 220px;
	width:300px;
}
.btn:hover{
    background: darkred;
    color: #fff;
}
.gap{
	margin-left: 300px;
}
.gaps{
	margin-left: 270px;
}</style>
</head>
<body background="hh.jpg">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<font color="#FFffff"><center><h2>PET REGISTRATION</h2></center>

<center><p>Please fill out all the fields</p></center>


<label>Owner Name</label>
<label class="gap">Pet Type</label><BR>

<input type="text" name="cname" class="in" value="" maxlength="50" size="50"  required="" pattern="[A-Za-z]">
<span><?php if (isset($cname_error)) echo $cname_error; ?></span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="ptype" class="in" value="" maxlength="50" size="50" required="" pattern="[A-Za-z]">
<span><?php if (isset($ptype_error)) echo $ptype_error; ?></span><BR><BR>

<label>Breed</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="gap">Pet Age</label><BR>
<input type="text" name="breed" class="in"  value="" maxlength="50"  size="50" required="" pattern="[A-Za-z]">
<span><?php if (isset($ptype_error)) echo $ptype_error; ?></span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="p_age" class="in" value="" maxlength="50"  size="50" required="">
<span><?php if (isset($p_age_error)) echo $p_age_error; ?></span><BR><br>

<label>Weight of the Pet</label>
<label class="gaps">Pet Gender</label><BR>
<input type="text" name="pweight" class="in" value="" maxlength="50" size="50"  required="">
<span><?php if (isset($pweight_error)) echo $pweight_error; ?></span>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="pgen" class="in" value="" maxlength="50" size="50"  required="" pattern="[A-Za-z]">
<span><?php if (isset($pgen_error)) echo $pgen_error; ?></span><BR><BR>

<label>Email</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="gap">Phone Number</label><BR>
<input type="email" name="email" class="in" value="" maxlength="30"  size="50" required="">
<span><?php if (isset($email_error)) echo $email_error; ?></span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type="text" name="phno" class="in" value="" maxlength="12" size="50"  required="" pattern="[0-9]{10}">
<span><?php if (isset($phno_error)) echo $phno_error; ?></span><BR><BR>

<label>Password</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="gap">Confirm Password</label><BR>
<input type="password" name="password"  class="in" value="" maxlength="8"  size="50" required="">
<span><?php if (isset($password_error)) echo $password_error; ?></span>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="cpassword" class="in" value="" maxlength="8"  size="50" required="">
<span><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span><BR><BR>

<input type="submit"  name="signup" class="btn" size="50" value="SIGN UP"><BR><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Already have an account?<a href="login.php" >Login</a>
</font>
</form>

</body>
</html>
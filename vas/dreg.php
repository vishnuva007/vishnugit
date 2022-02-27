<?php
require_once "db.php";
if(isset($_SESSION['login_id'])!="") {
header("Location: index.php");
}
if (isset($_POST['signup'])) {
$dname = mysqli_real_escape_string($conn, $_POST['dname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phno = mysqli_real_escape_string($conn, $_POST['phno']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']); 
$qlfy=mysqli_real_escape_string($conn, $_POST['qlfy']);
$cert=mysqli_real_escape_string($conn, $_POST['cert']);
$pic=mysqli_real_escape_string($conn, $_POST['pic']);
$licno=mysqli_real_escape_string($conn, $_POST['licno']);
$type=mysqli_real_escape_string($conn, $_POST['type']);

// $cert = $_FILES['cert']['dname'];
echo $cert;
// move_uploaded_file($_FILES['cert']['tmp_name'], 'Upload/'.$cert);

//  $pic = $_FILES['pic']['dname'];
// move_uploaded_file($_FILES['pic']['tmp_name'], 'Upload/'.$pic);
// $cert = $_FILES['cert']['tmp_name'];
//     $img = file_get_contents($cert);

// 	$pic = $_FILES['pic']['tmp_name'];
//     $imge = file_get_contents($pic);



if (!preg_match("/^[a-zA-Z ]+$/",$dname)) {
$dname_error = "Name must contain only alphabets and space";
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
$email_error = "Please Enter Valid Email ID";
}
if(strlen($password) < 7) {
$password_error = "Password must be minimum of 7 characters";
}       
if(strlen($mobile) < 10) {
$phno_error = "Mobile number must be minimum of 10 characters";
}
if($password != $cpassword) {
$cpassword_error = "Password and Confirm Password doesn't match";
}
$s="SELECT * FROM `login` WHERE email='$email'";
		$r=mysqli_query($conn, $s) or die("<br>Query error...".mysqli_error($conn));
		$count=mysqli_num_rows($r);

	if ($count>0) 
	{
		echo "<script> alert('Username already exists!');window.location.href='index.php'</script>";
	}
	else{


$lo="INSERT INTO `login`(`email`, `password`, `type`)VALUES('$email','$password','doctor')";
mysqli_query($conn,$lo);
$sel="SELECT * FROM `login` WHERE email='$email' AND password='$password'";
$rs=mysqli_query($conn,$sel);
$row=mysqli_fetch_assoc($rs);
$login_id=$row['login_id'];
    }
$reg = mysqli_query($conn, "INSERT INTO doctor(dname,phno,email,password,qlfy,cert,pic,licno,status) VALUES('" . $dname . "', '" . $phno . "', '" . $email . "', '" . md5($password) . "', '" . $qlfy . "', '" . $cert . "', '" . $pic . "',  '" . $licno . "','pending')");
	echo '<script type = "text/javascript">';
	echo 'alert("Your account is under verification");';
	echo 'window.location.href = "dreg.php"';
	echo '</script>';


 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Simple Registration Form in PHP with Validation</title>
<style> form {
	background-color:#00002abb;
	font-size:20px;
	
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
	border: 2px outset #16E2F5;
	font-face:Limelight;
	outline:0;
	height:30px;
	width: 300px;
	padding-left:10px;
	padding-right:10px;
}
.btn{
    background: #12AD2B;
    color: #ffffff;
    font-size: 15px;
    padding: 5px 30px;
    text-decoration: none;
	margin-left: 310px;
}
.btn:hover{
    background: darkred;
    color: #fff;
}
.gap{
	margin-left: 300px;
}
.gaps{
	margin-left: 280px;
}
</style>
</head>
<body background="hh.jpg">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<font color="#ffffff"><center><h2>DOCTOR REGISTRATION</h2></center>

<center>Please fill all fields in the form</center><br>
<label>Doctor Name</label>
<label class="gap">Qualification</label><br>
<input type="text" name="dname" class="in" value="" maxlength="50" pattern="[A-Za-z]{3,}" required="">
<span><?php if (isset($dname_error)) echo $dname_error; ?></span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type="text" name="qlfy"  value="" class="in" maxlength="50" required="" pattern="[A-Za-z]{3,}">
<span ><?php if (isset($qlfy_error)) echo $qlfy_error; ?></span><BR><br>

<label>Certificate</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="gap">Photo</label><BR>
<input type="file" name="cert"  value="" class="in" maxlength="50" required="">
<span><?php if (isset($cert_error)) echo $cert_error; ?></span>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="file" name="pic"  value="" class="in" maxlength="50" required="">
<span><?php if (isset($pic_error)) echo $pic_error; ?></span><BR><BR>

<label>License Number</label>
<label class="gaps">Email</label><BR>
<input type="text" name="licno"  value="" class="in" maxlength="50" required="" pattern="{6}">
<span class="text-danger"><?php if (isset($licno_error)) echo $licno_error; ?></span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type="email" name="email"  value="" class="in" maxlength="30" required="">
<span ><?php if (isset($email_error)) echo $email_error; ?></span><BR><BR>

<label>Phone Number</label>
&nbsp;&nbsp;<label class="gaps">Password</label><BR>
<input type="text" name="phno"  value="" class="in" maxlength="12" required="">
<span><?php if (isset($phno_error)) echo $phno_error; ?></span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type="password" name="password"  value="" class="in" maxlength="8" required="">
<span><?php if (isset($password_error)) echo $password_error; ?></span><BR><BR>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label>Confirm Password</label><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
<input type="password" name="cpassword" value="" class="in" maxlength="8" required="">
<span ><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span><BR><BR>

<input type="submit" class="btn"  name="signup" value="SIGN UP"><BR><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Already have an account?<a href="login.php">Login</a>
</font>
</form>

</body>
</html>
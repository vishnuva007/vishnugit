<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta
	name="viewport"
	content="width=device-width,
			initial-scale=1.0"/>
	<link rel="stylesheet" href="styles.css"
		class="css" />
</head>
<body>
<form action="" method="post">
<?php
include_once 'db.php';
$pid = $_GET['pid'];

if(isset($_POST['submit'])){

	// $pamnt = mysqli_real_escape_string($conn, $_POST['amt']);
	date_default_timezone_set('Asia/Kolkata');
	 $pdate = date("d-m-Y-----h:i:sA");
	
	if(mysqli_query($conn,"INSERT INTO payment(pamnt,pdate,pid) VALUES (300, '$pdate', '$pid')"))
	{
		echo '<script>alert("Payment of RS.300 is successfull")</script>';
	}
}


?>
	<div class="container">
	<div class="main-content">
		<p class="text">Pay Consultation fee</p>
	</div>

	<div class="centre-content">
		<h1 class="price">PAY</h1>
		<p class="course">
		Pay your consultation fee here!
		</p>
	</div>

	<div class="last-content" align="center">
	
		<button type="button" class="pay-now-btn">
		An amount of 300rs. is to be paid
		</button>

	</div>

	<div class="card-details">
		<center><p>Pay using Credit or Debit card</p></center>

    <div class="card-number">
		<label> Amount </label>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
			type="text"
			class="card-number-field"
			value="RS.300 /-" 
      disabled="disabled"
      name="amt"/>
		</div>

		<div class="card-number">
		<label> Card Number </label>
		<input
			type="text"
			class="card-number-field"
			placeholder="####-####-####-####"
			pattern="[0-9]{16}"
			required=""/>
		</div>
		
		<div class="date-number">
		<label> Expiry Date </label>
		&nbsp;&nbsp;&nbsp;<input type="text" class="date-number-field"
				placeholder="MM/YY" required=""
				pattern="[0-9]{2}+/[0-9]{2}" />
		</div>

		<div class="cvv-number">
		<label> CVV number </label>
		&nbsp;&nbsp;<input type="password" class="cvv-number-field"
				placeholder="xxx" required=""
				pattern="[0-9]{3}"/>
		</div>
		<div class="nameholder-number">
		<label> Card Holder </label>
    &nbsp;&nbsp;
		<input
			type="text"
			class="card-name-field"
			placeholder="Enter your Name" required=""
			/>
		</div>
		<input type="submit"
				class="submit-now-btn" name="submit" value="PAY"/>
		
	</div>
	</div>
</form>
</body>
</html>

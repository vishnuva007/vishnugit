<?php
include_once 'db.php';
$pid = $_GET['pid'];
if(isset($_POST['button']))
{
	
	
	$reason = mysqli_real_escape_string($conn, $_POST['reason']);
	$symptom = mysqli_real_escape_string($conn, $_POST['symptom']);
	$ig = mysqli_real_escape_string($conn, $_POST['ig']);
	$med = mysqli_real_escape_string($conn, $_POST['med']);
	$meet = mysqli_real_escape_string($conn, $_POST['meet']);

	if(mysqli_query($conn,"INSERT INTO question(`pid`, `reason`, `symptom`,`food`,`medicine`,`meet`) VALUES ('$pid','$reason','$symptom','$ig','$med','$meet')"))
    {    
        echo '<script>alert("ANSWER GIVEN SUCCESSFULLY")</script>';
        header("location:pet.php?pid=$pid");
   }
}

?>

<html>
<head>
<meta charset="UTF-8">
<title>Questionnaire</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/main.css">
<style> form 
.bs-example{
margin: 10px;
}

.btn{
    background: #fff;
    color: #ff0000;
    font-size: 12px;
    padding: 5px 30px;
    text-decoration: none;
    width: 1110px;
    border:2px solid #b22222;
}
.btn:hover{
    background: #ff0000;
    color: #fff;
}
.he{
                width: 1110px;
                font-family: "Segoe UI";
                background-color:#b22222;
                height: 80px;
                color:#ffffff;
                text-align:center;
                font-size: 40px;
                padding-top:12px;
                opacity: 0.8;
                
                margin-top:50px;
                margin-left:45px;
            }

            .in{
                width:1110px;
                border: 3px solid #b22222;
	            }
.box{
	width:1200px;
	border: 3px solid #b22222;
	height:900px;
	margin-left:20px;
	margin-top:50px;
}

		</style>
</head>
<body>
<form class="box" action="" method="post">

<div class="he">ANSWER THE QUESTIONS CAREFULLY</div><BR><BR>
<center>
<label>Please indicate the reason for your visit     </label><br>
<textarea name="reason" class="in" value="" required=""  no resize ></textarea><br><br>
<label>What are the symptoms of the pet&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br>
<textarea name="symptom" class="in" value="" required=""></textarea><BR><BR>
<label>Does it shows ignorrance to the food&nbsp;&nbsp;</label><br>
<textarea name="ig" class="in" value="" required=""></textarea><BR><BR>
<label>Did you gave any medicines?Mention</label><br>
<textarea name="med" class="in" value="" required=""></textarea><br><br>
<label>Do you want to conduct a meet with doctor?</label><br>
<select class="in" name="meet">
  <option value="YES">YES</option>
  <option value="NO">NO</option>
</select><br><br><br>
<button autofocus="autofocus" type="submit" class="btn" name="button">SUBMIT</button>
		</center>
</form>
</body>
</html>
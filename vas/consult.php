<?php
include_once 'db.php';


if(isset($_POST['submit']))
{
$link = $_POST['meet'];

$docid=$_GET['id'];
$query=mysqli_query($conn,"SELECT * from doctor WHERE did = '$docid'");
$res = mysqli_fetch_assoc($query);
$dname = $res['dname'];

if(mysqli_query($conn,"UPDATE appointment SET link='$link' WHERE dname = '$dname'")){

    echo '<script>alert("Meeting Link Successfully Shared")</script>';
}


}
?>


<html>
<head>
<style>
            .header{
                width:device-width;
                font-family: "Segoe UI";
                background-color:#4169e1;
                height: 80px;
                color:#ffffff;
                text-align:center;
                font-size: 40px;
                padding-top:20px;
                border-bottom-right-radius: 80px;
            }
            .input {
	border: 2px outset #4169e1;
	
	outline:0;
	height:30px;
	width: 400px;
	padding-left:10px;
	padding-right:10px;
    margin-left:380px;
    margin-top:80px;
   
}
.btn{
    background: #4169e1;
    color: #ffffff;
    font-size: 13px;
    padding: 6px 20px;
    text-decoration: none;
    border-radius:3px;
}
.btn:hover{
    background: darkblue;
    color: #ffffff;
}
        </style>
</head>
<body>
    <form action="" method="post">
      <div class="header"> Generate a Google meet link and share it with the client</div>
       <input type="text" class="input" align="cente" name="meet" required="">
       <input type="submit" class="btn" name="submit" value="SEND LINK">



</form>
</body>


</html>
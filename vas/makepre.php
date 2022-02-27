<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap 4 Bordered Table</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
form 
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
                
                margin-top:15px;
                margin-left:85px;
            }

            .in{
                width:1110px;
                border: 3px solid #b22222;
            }
</style>
<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});
</script>
</head>
<body background=".jpg">
<div class="he">Write Prescription Here</div>

    
    <center>
    <form action="" method="post">
	<div class="bs-example">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">

</div>

<?php
include_once 'db.php';
$docid = $_GET['id'];
$pid = $_GET['pid'];
$aid = $_GET['aid'];
if(isset($_POST['proceed']))
{

// $select = "SELECT * FROM appointment";
// $query = mysqli_query($conn,$select);
// $row=mysqli_fetch_assoc($query); 
// $name = $row['name'];

   $pdetails = mysqli_real_escape_string($conn, $_POST['pres']);


    
   if(mysqli_query($conn,"INSERT INTO `prescription`(`pdetails`, `pid`, `did`) VALUES ('$pdetails',$pid,$docid)"))
    {  
        if(mysqli_query($conn,"UPDATE `appointment` SET status = 1 WHERE aid = $aid")) 
        { 
        echo '<script>alert("PRESCRIPTION GIVEN SUCCESSFULLY")</script>';
        }
        
   }

//    $query = mysqli_query($conn,"SELECT * FROM prescription");
//    $row = mysqli_fetch_assoc($query);
   
//    $u = "UPDATE prescription SET status = 'y' WHERE pid='$pid' AND did='$docid'";

    // $ins = mysqli_query($conn,"INSERT INTO prescription(pdetails,pid,did)VALUES('$pdetails','$apid','$docid')");
	// $u = mysqli_query($conn,"UPDATE prescription SET pid='$apid' WHERE name='$name'");
    
}
?>

<textarea name="pres" value="" class="in" required="" rows="10" cols="30" placeholder="Note your prescription and tips :"></textarea><br><br>
<button  type="submit" class="btn" name="proceed">SEND</button>
</form>
</center>
</body>
</html>

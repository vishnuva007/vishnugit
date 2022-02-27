<?php
include_once 'db.php';
$docid = $_GET['id'];

?>

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
.bs-example{
margin: 10px;
}
.btn{
    background: #fff;
    color: #ff0000;
    font-size: 12px;
    padding: 5px 30px;
    text-decoration: none;
}
.btn:hover{
    background: #ff0000;
    color: #fff;
}
.bt:hover{
    background: #a9a9a9;
    color: #b22222;
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
</style>
<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});
</script>
</head>
<body>
    <form action="" method="post">
    <div class="he">Consulted Clients</div>
	<div class="bs-example">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">

</div>
<?php
	include_once 'db.php';
	

	 $docid = $_GET['id'];
	 $select = "SELECT * FROM doctor WHERE did='$docid'";
	 $q = mysqli_query($conn,$select);
	 $res=mysqli_fetch_assoc($q);
	 $dname = $res['dname'];
	 
     
    // $p = mysqli_query($conn,"SELECT * FROM prescription  WHERE status!='y'");
    // $b = mysqli_fetch_assoc($p);
    // $status = $b['status'];
    

   
	$result="SELECT aid,name,email,date,timeslot,pid,dname FROM appointment WHERE status = 0 AND dname='$dname'";
	$query = mysqli_query($conn,$result);
    $num = mysqli_num_rows($query);
  
?>

    
<table class='table table-bordered table-striped' bgcolor="#dcdcdc" style="color:#000000;">
    
<tr>
<th>Name</th>
<th>E-mail</th>
<th>Date</th>
<th>Time Slot</th>
<th>GIVE PRESCRIPTION</th>
</tr>

 <?php 
    $num = mysqli_num_rows($query);
    if ($num > 0)
    {
        while($result=mysqli_fetch_assoc($query))
        {
          
    
            echo"
                <tr class='bt'>
                    <td>".$result['name']."</td>
                    <td>".$result['email']."</td>
                    <td>".$result['date']."</td>
                    <td>".$result['timeslot']."</td>"?>
                    <?php $pid = $result['pid'];
                     $aid = $result['aid'];
                    echo "<td><a href='makepre.php?id=$docid&amp;pid=$pid&amp;aid=$aid;'  class='btn'>SEND</a> </td>
                </tr> ";
    
               
            }
        
    }
       
?>  
                                                                                                                           
</table>

</div>
</div>        
</div>
</div>
 
</form>
</body>
</html>


<!-- <?php
include_once 'db.php';
if(isset($_POST['proceed']))
{
$reason=$_POST['reason'];

$qry="SELECT * FROM pet WHERE pid=$pid";
$res = mysqli_query($qry);
$num_rows = mysqli_num_rows($res);
if($num_rows > 0)
{
	mysqli_query("INSERT INTO prescription(pdetails,pid,did)VALUES('$pdetails','$pid','$docid')");
}

} ?>	


<html>
<head>
<meta charset="UTF-8">
<title>Questionnaire</title>

<style> form {
	background-color:#66ffff99;
	font-size:20px;
	text-align:center;
	border: 3px outset #FFd700;
	border-radius: 30px;
	outline:0;
	height:600px;
	width: 1200px;
	padding-left:10px;
	padding-right:10px;
  margin-top: 30px;
  margin-left:20px;
} 
.input {
	border: 3px outset #FFA5A5;
	
	outline:0;
	padding-left:10px;
	padding-right:10px;
    width: 600px;
    height: 400px;
}

.btn{
    background: #12AD2B;
    color: #ffffff;
    font-size: 15px;
    padding: 5px 30px;
    text-decoration: none;
	margin-left: 10px;
}
.btn:hover{
    background: darkred;
    color: #fff;
}</style>
</head>
<body>
<form action="" method="post">
<h2>WRITE PRESCRIPTION</h2><BR>
<textarea name="pres" value="" class="input" required="" rows="10" cols="30"></textarea><br><br>
<button autofocus="autofocus" type="submit" class="btn" name="proceed">PROCEED</button>
</form>
</body>
</html> -->

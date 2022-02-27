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
<div class="he">SCHEDULES</div>
<div class="bs-example">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">

</div>
<?php

include_once 'db.php';
    $docid = $_GET['id'];
    $select = "SELECT dname FROM doctor where did = '$docid' ";
	$q = mysqli_query($conn,$select);
	$res=mysqli_fetch_assoc($q);
	$dname = $res['dname'];
   


$result = mysqli_query($conn,"SELECT * FROM appointment WHERE dname = '$dname' ");
?>
<?php
if (mysqli_num_rows($result)>0) {
?>
<table class='table table-bordered table-striped' bgcolor="#dcdcdc" style="color:#000000;">
<tr>
<th>Name</th>
<th>Email id</th>
<th>Date</th>
<th>Timeslot</th>
</tr>
<?php

while($row = mysqli_fetch_array($result))
{
?>
<tr>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["date"]; ?></td>
<td><?php echo $row["timeslot"]; ?></td>
</tr>
<?php

}
?>
</table>
<?php
}
else{
echo "  No result found";
}
?>
</div>
</div>        
</div>
</div>
</body>
</html>
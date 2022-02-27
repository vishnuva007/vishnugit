

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

</head>
<body>
<div class="he">Doctor Request For Registration </div>
    
<div class="page-header clearfix">

</div>
<div class="bs-example">
<div class="container">
<div class="row">
<div class="col-md-12">

<table class='table table-bordered table-striped' bgcolor="#dcdcdc" style="color:#000000;">
<tr>
<th>Name</th>
<th>Email</th>
<th>Phno</th>
<th>Photo</th>
<th>Qualification</th>
<th>Certificate</th>
<th>License No</th>
<th>Action</th>
</tr>
 <?php

include_once 'db.php';
$sel = "SELECT * FROM doctor WHERE status = 'pending'";
$q = mysqli_query($conn,$sel);
while($row = mysqli_fetch_assoc($q)){
    ?>

    <tr>
    <td><?php echo $row['dname'];?></td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['phno'];?></td>
    <td><?php echo $row['pic'];?></td>
    <td><?php echo $row['qlfy'];?></td>
    <td><?php echo $row['cert'];?></td>
    <td><?php echo $row['licno'];?></td>
    <td>
        <form action = "viewreq.php" method = "POST">
        <input type = "hidden" name = "did" value = "<?php echo $row['did'];?>"/>
        <input type = "submit" class="btn" name = "Approve" value = "Approve"/>
        <input type = "submit" class="btn" name = "Deny" value = "Deny"/>
        </form>
        </td>
</tr> 
</table>

<?php
}
?>
<?php


if(isset($_POST['Approve'])){
    $did = $_POST['did'];

    $s = "UPDATE doctor SET status = 'approved' WHERE did = '$did'";
    $r = mysqli_query($conn,$s);

    echo '<script type = "text/javascript">';
	echo 'alert("Doctor approved!");';
	echo 'window.location.href = "admin.php"';
	echo '</script>';
}


if(isset($_POST['Deny'])){
    $did = $_POST['did'];

    $s = "DELETE FROM doctor WHERE did = '$did'";
    $r = mysqli_query($conn,$s);

    echo '<script type = "text/javascript">';
	echo 'alert("Doctor Denied!");';
	echo 'window.location.href = "login.php"';
	echo '</script>';
}
?>


</div>        
</div>
</div>
</div>
</body>
</html>
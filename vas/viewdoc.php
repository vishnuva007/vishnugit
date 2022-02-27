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
    <div class="he">DOCTORS</div>
    <div class="bs-example">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">

</div>
<?php
include_once 'db.php';

$sel = "SELECT * FROM doctor WHERE status = 'approved'";
$q = mysqli_query($conn,$sel);

if(isset($_GET['dname'])){
    $dname=$_GET['dname'];
    $del=mysqli_query($conn,"DELETE FROM doctor WHERE dname='$dname'");
    header("location:viewusers.php");
}
?>


<table class='table table-bordered table-striped' bgcolor="#dcdcdc" style="color:#000000;">
    
<tr>
<th>Owner Name</th>
<th>Email</th>
<th>Phno</th>
<th>Photo</th>
<th>Qualification</th>
<th>Certificate</th>
<th>License No</th>
<th>Delete</th>
</tr>

<?php 
    $n = mysqli_num_rows($q);
    if ($n > 0)
    {
        while($res=mysqli_fetch_assoc($q))
        {
            echo"
                <tr class='bt'>
                    <td>".$res['dname']."</td>
                    <td>".$res['email']."</td>
                    <td>".$res['phno']."</td>                   
                    <td><img src=pictures/$res[pic] alt='$res[pic]'> </td>                    
                    <td>".$res['qlfy']."</td>
                    <td>".$res['cert']."</td>
                    <td>".$res['licno']."</td>
                    <td><a href='viewusers.php? dname=".$res['dname']."' class='btn'>Delete</a> </td>
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



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
                margin-left:84px;
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
    <div class="he">PAYMENT RECORDS</div>
<div class="bs-example">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">

</div>
<?php
include_once 'db.php';

$result="SELECT payment.*,pet.* from payment INNER JOIN pet ON payment.pid=pet.pid";
$query = mysqli_query($conn,$result);

?>


<table class='table table-bordered table-striped' bgcolor="#dcdcdc" style="color:#000000;">
    
<tr>
<th>Name</th>
<th>Email</th>
<th>Amount</th>
<th>Date & Time</th>
</tr>

<?php 
    $num = mysqli_num_rows($query);
    if ($num > 0)
    {
        while($result=mysqli_fetch_assoc($query))
        {
            echo"
                <tr CLASS='bt'>
                    <td>".$result['cname']."</td>
                    <td>".$result['email']."</td>
                    <td>".$result['pamnt']."</td>
                    <td>".$result['pdate']."</td>
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
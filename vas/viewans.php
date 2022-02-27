

<html>
<head>
<meta charset="UTF-8">
<title>Questionnaire</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style> .bs-example{
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
                width: device-width;
                font-family: "Segoe UI";
                background-color:#b22222;
                height: 80px;
                color:#ffffff;
                text-align:center;
                font-size: 40px;
                padding-top:12px;
                opacity: 0.8;
                
                margin-top:15px;
                
            }</style>
</head>
<body>

<div class="he">ANSWERS GIVEN BY THE CLIENTS</div><BR>

<table class='table table-bordered table-striped' bgcolor="#dcdcdc" style="color:#000000;">

	<?php
	include_once 'db.php';
	

	 $docid = $_GET['id'];
	 $select = "SELECT * FROM doctor WHERE did='$docid'";
	 $q = mysqli_query($conn,$select);
	 $res=mysqli_fetch_assoc($q);
	 $dname = $res['dname'];
	 
	
	$res="SELECT appointment.*,question.* from appointment INNER JOIN question ON appointment.pid=question.pid  WHERE appointment.dname='$dname' AND appointment.status=0";
	$query = mysqli_query($conn,$res);
	// $row=mysqli_fetch_assoc($query); 
	// $pid = $row['pid'];
	// $q = mysqli_query($conn,$r);
	// $row2 = mysqli_fetch_assoc($q); 
	// $id = $row2['pid'];
	?>

<table class='table table-bordered table-striped' bgcolor="#dcdcdc" style="color:#000000;">
    
<tr>
<td>Name</td>
<td>Reason</td>
<td>Symptom</td>
<td>Food</td>
<td>Medicine</td>
<td>Meet</td>
<td>Date</td>
<td>Timeslot</td>
</tr>

<?php 
     $num = mysqli_num_rows($query);
     if ($num > 0)
     {
        while($result=mysqli_fetch_assoc($query))
		        {
					//  if($id==$docid)
					// {
            echo"
                <tr>
                    <td>".$result['name']."</td>
                    <td>".$result['reason']."</td>
                    <td>".$result['symptom']."</td>
                    <td>".$result['food']."</td>
                    <td>".$result['medicine']."</td>
					<td>".$result['meet']."</td>
					<td>".$result['date']."</td>
					<td>".$result['timeslot']."</td>
                </tr> ";
					//  }
         }
    }
?>
</table>

</div>
</div>        
</div>
</div>
</body>
</html>
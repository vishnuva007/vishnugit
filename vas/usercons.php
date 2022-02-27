<?php
include_once 'db.php';
$pid = $_GET['pid'];
$sel = mysqli_query($conn,"SELECT * FROM appointment WHERE pid='$pid'");
$row = mysqli_fetch_assoc($sel); 
$link = $row['link'];
// echo "Copy the link to join the doctor : $link";
?>

<html>
    <head>
        <style>
            .header{
                width:device-width;
                font-family: "Segoe UI";
                background-color:#b22222;
                height: 80px;
                color:#ffffff;
                text-align:center;
                font-size: 40px;
                padding-top:20px;
                border-bottom-right-radius: 80px;
            }
                   
        </style>
    </head>
    <div class="header">Copy the below link to join the Doctor</div><br>
    <div align="center"><?php echo $link; ?></div>
    </body>
    </html>

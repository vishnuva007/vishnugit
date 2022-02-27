<?php
 $mysqli = new mysqli('localhost', 'root', '', 'vas');
 $pid = $_GET['pid'];
if(isset($_GET['date'])){
    $date = $_GET['date'];
    
    }

if(isset($_POST['submit'])){

    

    $name = $_POST['name'];
    $email = $_POST['email'];
    $timeslot=$_POST['timeslot'];

    if(!empty($_POST['dname'])) {
    $dname = $_POST['dname'];
    }

    $stmt = $mysqli->prepare("select * from appointment where date = ? AND timeslot = ?");
    $stmt->bind_param('ss', $date,$timeslot);
   
   
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
       
            $msg = "<div class='alert alert-danger'>Already Booked</div>";
        }else{
            $stmt = $mysqli->prepare("INSERT INTO appointment(name, timeslot, email, date,pid,dname) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param('ssssss', $name, $timeslot, $email, $date,$pid,$dname);
            $stmt->execute();
            $msg = "<div class='alert alert-success'>Booking Successfull</div>";
            $appointment[]=$timeslot;
            $stmt->close();
            $mysqli->close();
            
        }
    }

}



$duration = 20;
$cleanup = 10;
$start = "09:00";
$end = "17:00";

function timeslots($duration, $cleanup, $start, $end) {
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();

    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }
        $slots[] = $intStart->format("h:iA")."-".$endPeriod->format("h:iA");
    }
    return $slots;
}

?>

<html>

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <style>
        .bt{
    background: #00bfff;
    color: #ffffff;
    float:right;
    border-radius: 5px;
    font-size: 12px;
    padding: 5px 40px;
    text-decoration: none;
    margin-right: 100px;
    }
.bt:hover{
    background: green;
    color: #ffffff;
}
</style>
  </head>

  <body>
      <a href='pet.php?pid=<?php echo $pid; ?>'><input type="button" name="" class='bt' value="HOME"></a>
    <div class="container">
        <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1><br>
        <div class="row">
            <div class="col-mod-12">
                <?php echo isset($msg)?$msg:""; ?>
            </div>
            <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
                foreach($timeslots as $ts){ 
            ?>
            <div class="col-md-2">
                <div class="form-group">
                <?php if(in_array($ts,$appointment ??[])){ ?>
                    <button class="btn btn-danger"><?php echo $ts; ?></button>   
                
                    <?php }else{ ?>
                        <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>  
                    <?php } ?>    
                  
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

  
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Booking: <span id="slot"></span></h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Timeslot</label>
                        <input required="" type="text" readonly name="timeslot" id="timeslot" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input required="" type="text" name="name" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input required="" type="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Select doctor</label>
                        <select class="form-control" name="dname">
<?php
include_once 'db.php';
$sel = "SELECT * from doctor";
$q = mysqli_query($conn,$sel);
while($row = mysqli_fetch_assoc($q)) {

?>

<option>
<?php echo $row["dname"]; ?></option>
<?php

}
?>
</select>
                    </div>
                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>

                    </div>
     
                </form>
            </div>
        </div>
      </div>
      
    </div>

  </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(".book").click(function(){
            var timeslot = $(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");
        })
    </script>

</body>
</html>
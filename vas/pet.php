<?php
$pid = $_GET['pid'];
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="sidebar">
    <div class="logo-details">
    <i class='bx bxl-vimeo'></i>
    <i class='bx bx-font-color'></i>
    <i class='bx bxl-stripe'></i>
      <span class="logo_name"></span>
    </div>
      <ul class="nav-links">
        <li>
          <a href='calender.php?pid=<?php echo $pid; ?>' class="active">
          <i class='bx bx-log-in-circle bx-fade-left' ></i>
            <span class="links_name">BOOK APPOINTMENT</span>
          </a>
        </li><br>
        
        <li>
          <a href='ques.php?pid=<?php echo $pid; ?>' class="active">
          <i class='bx bx-log-in-circle bx-fade-left' ></i>
            <span class="links_name">ANSWER QUESTIONS</span>
          </a>           
                  </li><br>
                  <li>
                    <a href='usercons.php?pid=<?php echo $pid; ?>' class="active">
                    <i class='bx bx-log-in-circle bx-fade-left' ></i>
                      <span class="links_name">CONSULT</span>
                    </a>           
                            </li><br>
                  <li>
                    <a href='viewpre.php?pid=<?php echo $pid; ?>' class="active">
                    <i class='bx bx-log-in-circle bx-fade-left' ></i>
                      <span class="links_name">VIEW PRESCRIPTION</span>
                    </a>           
                            </li><br>
        <li>
          <a href="payment.php?pid=<?php echo $pid; ?>" class="active">
          <i class='bx bx-log-in-circle bx-fade-left' ></i>
            <span class="links_name">PAY</span>
          </a>
        </li><BR>
        <li>
          <a href="index.php" class="active">
          <i class='bx bx-arrow-to-left bx-flashing' ></i>
            <span class="links_name">Logout</span>
          </a>
        </li>
        
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <font color="blue"><span class="dashboard">VETERINARY ADMINISTRATION SERVICE</span></font>
      </div>
    
  <img src="homepic.jpg" style="width:1220px;height:530px;" style="top:18%; left:40%">
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

 </script>
</body>
</html>

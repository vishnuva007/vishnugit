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
          <a href="login.php" class="active">
          <i class='bx bx-log-in-circle bx-fade-left' ></i>
            <span class="links_name">LOGIN</span>
          </a>
        </li><br>
        
        <li>
          <a href="petreg.php" class="active">
          <i class='bx bx-user-plus bx-tada' ></i>
            <span class="links_name">Register Pet</span>
          </a>           
                  </li><br>
                  <li>
                    <a href="dreg.php" class="active">
                    <i class='bx bx-clinic bx-tada' ></i>
                      <span class="links_name">Register Doctor</span>
                    </a>           
                            </li><br>
        <li>
          <a href="about.php" class="active">
          <i class='bx bx-edit-alt bx-tada' ></i>
            <span class="links_name">About Us</span>
          </a>
        </li><BR>
        <li>
          <a href="contact.php" class="active">
          <i class='bx bx-phone bx-tada' ></i>
            <span class="links_name">Contact Us</span>
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


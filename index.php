<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/all.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">

  <title>UUMRMS</title>
</head>

<body>
  <!-- Start Navigation -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">

    <a href="index.php" class="navbar-brand" style="margin-left:15%"> Unity University Maintenance Request Management System</a>

  </nav> <!-- End Navigation -->
  <nav class="navbar navbar-expand-sm navbar-dark  fixed-top" style="margin-top:70px;">
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav pl-5 custom-nav" style="margin-left:30%;">
        <li class="nav-item"><a href="index.php" class="nav-link"><i class="fa fa-home"></i><b> Home</b></a></li>
        <li class="nav-item"><a href="#About" class="nav-link pl-5"><i class="fa fa-info"></i><b> About</b></a></li>
        <li class="nav-item"><a href="#Contact" class="nav-link pl-5"><i class="fa fa-phone"></i> <b>Contact</b></a></li>
        <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link pl-5"><b>Login &nbsp &nbsp &nbsp &nbsp &nbsp</b></a></li>
        <li class="nav-item"><a href="Admin/login.php" class="nav-link">Admin Login</a></li>
      </ul>
    </div>
  </nav> <!-- End Navigation -->

  <!-- Start Header Jumbotron-->
  <header class="jumbotron back-image size" style="background-image: url(image/bg1.jpg);">
   
  </header> <!-- End Header Jumbotron -->

  <div class="container" id="About">
    <!--Introduction Section-->
    <div class="jumbotron">
      <h3 class="text-center">Welcome to Unity University Maintenance Request Management System </h3>
      <p>
      Unity University is a renowned higher education institution based in Addis Ababa, Ethiopia. Established in 1994, the university aims to providequality education 
      and produce skilled professionals who can contribute effectively to the economic and social development of the country. With a diverse studentbody and a team of 
      highly experienced faculty members, Unity University is committed to equipping its students with the necessary knowledge, skills and values to succeed in their 
      chosen fields. The university offers a range of undergraduate, graduate and continuing education programs, including engineering, business, social sciences, 
      health sciences and law. It also has a strong research culture and contributes significantly to the advancement of knowledge in Ethiopia and beyond. With its 
      mission of fostering unity through quality education, Unity University is a vital institution in Ethiopia's higher education landscape.
      </p>
    </div>
  </div>
  <!--Introduction Section End-->
 
  <!--Start Contact Us-->
  <div class="container" id="Contact">
    <!--Start Contact Us Container-->
    <h2 class="text-center mb-4">Contact US</h2> <!-- Contact Us Heading -->
    <!--<div class="row">-->

      <!--Start Contact Us Row-->
     
      <!-- End Contact Us 1st Column -->

    <div class="col-md-4 text-center">
        <!-- Start Contact Us 2nd Column-->
      <strong>Unity University:</strong> <br>
       <p  class="text-center mb-4"> Address: Addis Abeba <br>
        Phone: 011 629 8154 <br></p>
      </div> <!-- End Contact Us 2nd Column-->
    </div> <!-- End Contact Us Row-->
  </div> <!-- End Contact Us Container-->
  <!-- End Contact Us -->

  <!-- Start Footer-->
  <footer class="container-fluid bg-dark text-white mt-5" style="border-top: 3px solid #DC3545;">
    <div class="container">
        <!-- Start Footer Container -->
      <div class="row py-3">
          <!-- Start Footer Row -->
        

        <div class="col-md-6 text-right">
            <!-- Start Footer 2nd Column -->
          <small> Designed by GC &copy; 2023.
          </small>
            <!-- <small class="ml-2"><a href="Admin/login.php">Admin Login</a></small> -->
        </div> <!-- End Footer 2nd Column -->
      </div> <!-- End Footer Row -->
    </div> <!-- End Footer Container -->
  </footer> <!-- End Footer -->

  <!-- Boostrap JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
</body>

</html>
<?php include("includes/db.php"); ?>

<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>Demo Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="admin/assets/vendor/fonts/boxicons.css" />
    

    <!-- Core CSS -->
    <link rel="stylesheet" href="admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="admin/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="admin/assets/vendor/libs/apex-charts/apex-charts.css" />
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="admin/assets/vendor/js/helpers.js"></script>
    <script src="admin/assets/js/config.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="./"><h2>Demo Blog<em>.</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <?php
//                $query = "SELECT * FROM categories";
//                $ab = mysqli_query($connection, $query);
//                
//                while($row = mysqli_fetch_assoc($ab)){
//                    $ba = $row['cat_title'];
//                    
//                    echo "<li class='nav-item'>
//                <a class='nav-link' href=''>{$ba}</a>
//              </li>";
//                    
//                }
                ?> 
              <!-- <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="blog.html">Blog</a>
              </li> -->
             <li class="nav-item">
                <a class="nav-link" href="contact">Contact Us</a>
              </li>
              <?php if(isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                <a class='nav-link' href='admin'>Dashboard</a>
              </li>";
    
} else  {   
    echo "<li class='nav-item'>
                <a class='nav-link' href='includes/login'>Login</a>
              </li>";
}
            ?>
    <?php 
                if(isset($_GET['p_id'])) {
    $post_id = $_GET['p_id'];
    
    echo "<li class='nav-item'>
                <a class='nav-link' href='admin/posts.php?source=edit_post&p_id=$post_id'>Edit Post</a>
              </li>";
    
}
                ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>
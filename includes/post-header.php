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

    <title>Stand CSS Blog by TemplateMo</title>

    <!-- Bootstrap core CSS -->
    <link href="/cms/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/cms/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/cms/assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="/cms/assets/css/owl.css">

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
          <a class="navbar-brand" href="index.html"><h2>Stand Blog<em>.</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="blog.html">Blog Entries</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
              <?php 
                if(isset($_SESSION['username'])){
                    if(isset($_GET['p_id'])) {
    $post_id = $_GET['p_id'];
    
    echo "<li class='nav-item'>
                <a class='nav-link active' href='admin/posts.php?source=edit_post&p_id=$post_id'>Edit Post</a>
              </li>";
                    }
}
                ?>                          
            <?php if(isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                <a class='nav-link' href='admin'>Dashboard</a>
              </li>";
    
} else  {   
    echo "<li class='nav-item'>
                <a class='nav-link' href='includes/login.php'>Login</a>
              </li>";
}
            ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>
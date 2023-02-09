<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shiv Tourism</title>
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/bootstrap.css">
  <link rel="stylesheet" href="../../css/font-awesome.min.css">
  <!-- swiper css link  -->
  <link rel="stylesheet" href="../../css/swiper-bundle.min.css" />

  <!-- font awesome cdn link  --> 
  <link rel="stylesheet" href="../../css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="../../css/animate.css">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/login.css">
  <link rel="stylesheet" href="../../css/styles.css">
  <!--bootstrap.css-->
  <script src="../../js/6be23040d4.js"></script>  
</head>

<body>

  <!-- header section starts  -->
  <nav>
    <div class="menu-icon">
      <span class="fas fa-bars"></span>
      <div class="cancel-icon">
        <span class="fas fa-times"></span>
      </div>
    </div>
    <div class="logo">
      <img src="../../images/1.png" alt="" style="padding-top: -10px;">
    </div>
    <div class="nav-items">
      
        <li><a href="../hotelsmanagement/index.php">BookingManage</a></li>
      <?php 
      $pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
      if (isset($_SESSION['user'])) {
        $logedInUseremail = $_SESSION['user'];
        $statementuser = $pdo->prepare("SELECT * from users where Email=?");
        $statementuser->execute(array($logedInUseremail));
      ?>
        <li><a href="../profile/"><i class="fas fa-user fa-fw"></i></a></li>
      <?php
      } elseif (isset($_SESSION['hotel'])) {
      ?>
        <li><a href="../profile/"><i class="fas fa-user fa-fw"></i></a></li>
      <?php
      } else {
      ?>
        <li><a href="../loginlogout/login.php">LOG-IN</a></li>
      <?php
      }
      ?>

    </div>

  </nav>
  </div>
  <!-- </section> -->
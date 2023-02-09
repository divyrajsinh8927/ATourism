<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <!-- swiper css link  -->
  <link rel="stylesheet" href="../css/swiper-bundle.min.css" />

  <!-- font awesome cdn link  --> 
  <link rel="stylesheet" href="../css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="../css/animate.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="../css/styles.css">
  <!--bootstrap.css-->
  <script src="../js/6be23040d4.js"></script>  
</head>

<body>


<?php
if(isset($_SESSION['user']))
{
  $email=$_SESSION['user'];
}
else if(isset($_SESSION['hotel']))
{
  $email=$_SESSION['hotel'];
}
?>
  <section class="container2 forms" style="padding-top: 150px;">
    <div class="form login">
      <div class="form-content">
        <header>Confirm Password</header>
        <form action="./loginprocess.php" method="POST" class="loginform">
          <div class="field input-field">
            <input type="email" placeholder="Email" class="input" name="email" id="email" value="<?=$email?>">
          </div>

          <div class="field input-field">
            <input type="password" placeholder="Old Password" class="password" name="loginpassword" id="loginpassword">
            <i onclick="$('#hide').toggle(); $(this).hide();$('#loginpassword').attr('type', 'text');" id="show" style="font-size: 20px; cursor: pointer; color: black; margin:4px;" class='fa fa-solid fa-eye eye-icon'></i>
            <i onclick="$('#show').toggle(); $(this).hide();$('#loginpassword').attr('type', 'password');" id="hide" style="display : none;font-size: 20px; cursor: pointer; color: black; margin:4px;" class='fa fa-solid fa-eye-slash eye-icon'></i>
          </div>
          <div class="field button-field">
            <button type="submit" name="confirmpassword">Confirm</button>
          </div>
        </form>
      </div>
    </div>
    </section>
    <script src="../js/bootstrap.js"></script>
<script src="../js/swiper-bundle.min.js"></script>
<script src="../js/jquery-3.3.1.slim.min.js"></script>
<!-- <script src='../../js/popper.min.js'></script> -->
<script src='../js/bootstrap.min.js'></script>
<script src="../js/jquery-3.6.0.min.js"></script>
<!-- custom js file link  -->
<script src="../js/script.js"></script>
</body>

</html>
<?php

session_start();
$pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
if (isset($_POST['loginbutton'])) {
  $email = $_POST['email'];
  $password = $_POST['loginpassword'];

  $statement = $pdo->prepare("SELECT * from users where Email=?");
  $statement->execute(array($email));

  $record = $statement->fetch();
      if (!password_verify($password,$record["PasswordHash"])) {
        echo 'Invalid password.';
      } else {
        $usertype = $record['UserType'];
        $status = $record['Status'];
        $delete = $record['UserIsDelete'];
        $row = $statement->rowcount();
        
        if ($row > 0) {
          if ($delete == 0) {
            if ($status != 0) {
        if ($usertype == 'A') {
          $_SESSION['Admin'] = $email;
          header("Location: ../Admin/index.php");
        } elseif ($usertype == 'H') {
          $_SESSION['hotel'] = $email;
          header("Location: ../hotel/hotelsmanagement/index.php");
        } else {
          $_SESSION['user'] = $email;
          header("Location: ../home/index.php");
        }
      } else {
        echo "<script>window.location.href='./login.php'; alert('User Deactivated');</script>";
      }
    } else {
      echo "<script>window.location.href='./login.php';alert('User Deleted!');</script>";
    }
  } else {
    echo "<script>window.location.href='./login.php';alert('wrong UserName Or Password or Password');</script>";
  }
  
}
}

//change password

if (isset($_POST['confirmpassword'])) {
  $email = $_POST['email'];
  $password = $_POST['loginpassword'];
  $statement = $pdo->prepare("SELECT Id,UserType,Email,PasswordHash,Status from users where Email=?");
  $statement->execute(array($email));
  $record = $statement->fetch();
  if (!password_verify($password,$record["PasswordHash"])) {
    echo 'Invalid password.';
  } else {
    $usertype = $record['UserType'];
    $status = $record['Status'];
    $id = $record['Id'];
  
  $row = $statement->rowCount();
  if ($row > 0) {
    header("Location: ./change-password.php?id=$id");
  } else {
    echo "<script>window.location.href='./check-password.php';alert('wrong UserName Or Password or Password');</script>";
  }
}
}

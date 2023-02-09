<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
if (isset($_SESSION['Admin'])) {
    // get current logged in user   
    $logedInUseremail = $_SESSION['Admin'];
    $statementuser = $pdo->prepare("SELECT * from users where Email=?");
    $statementuser->execute(array($logedInUseremail));
    while ($logedInUsername = $statementuser->fetch()) {
        $currentusername = $logedInUsername['Name'];
    }
}
else{
    header("Location: ../User/loginlogout/login.php");
}
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="./css/style.css" rel="stylesheet" />
    <link href="./css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/animate.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <h4 class="navbar-brand ps-3" href="index.html">Tourism Management</h4>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="profile.php">profile</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="./process/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                            Users Management
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="usersmanagement.php">View Users</a>
                                <a class="nav-link collapsed" href="regiester.php">Register</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="placesmanagement.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-map-location-dot"></i></div>
                            Places Management
                        </a>
                        <a class="nav-link" href="hotelsmanagement.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-hotel"></i></div>
                            Hotels Management
                        </a>
                        <a class="nav-link" href="booking.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard-list"></i></div>
                            Booking Management
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="medium">Logged in as :</div>
                    <h4><?= $currentusername ?></h4>
                </div>
            </nav>
        </div>
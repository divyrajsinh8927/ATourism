<?php
include('./includes/layout-sidenav-light.php');
$pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
$statementuser = $pdo->prepare("SELECT Id from users");
$statementuser->execute();
$usercount = $statementuser->rowCount();
$statementplace = $pdo->prepare("SELECT Id from places");
$statementplace->execute();
$placecount = $statementplace->rowCount();
$statementhotel = $pdo->prepare("SELECT Id from hotels");
$statementhotel->execute();
$hotelcount = $statementhotel->rowCount();
$statementbook = $pdo->prepare("SELECT Id from booking");
$statementbook->execute();
$bookingcount = $statementbook->rowCount();
?>

<div id="layoutSidenav_content">
    <main class="index-body">
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <i class="fa-solid fa-users" style="padding-top: 10px; padding-bottom: 5px; font-size: 40px;"></i>
                        <div style="align-self: center;">
                            <a class="small text-white stretched-link" href="usersmanagement.php">
                                <h4>Users</h4>
                            </a>
                        </div>
                        <div class="card-body" style="align-self: center; padding-top: 5px;">
                            <h4><?php echo htmlentities($usercount); ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <i class="fa-solid fa-map-location-dot" style="padding-top: 10px; padding-bottom: 5px; font-size: 40px;"></i>
                        <div style="align-self: center;">
                            <a class="small text-white stretched-link" href="./placesmanagement.php">
                                <h4>Places</h4>
                            </a>
                        </div>
                        <div class="card-body" style="align-self: center; padding-top: 5px;">
                            <h4><?php echo htmlentities($placecount); ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <i class="fa-solid fa-hotel" style="padding-top: 10px; padding-bottom: 5px; font-size: 40px;"></i>
                        <div style="align-self: center;">
                            <a class="small text-white stretched-link" href="hotelsmanagement.php">
                                <h4>Hotels</h4>
                            </a>
                        </div>
                        <div class="card-body" style="align-self: center; padding-top: 5px;">
                            <h4><?php echo htmlentities($hotelcount); ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <i class="fa-solid fa-clipboard-list" style="padding-top: 10px; padding-bottom: 5px; font-size: 40px;"></i>
                        <div style="align-self: center;">
                            <a class="small text-white stretched-link" href="booking.php">
                                <h4>Bookings</h4>
                            </a>
                        </div>
                        <div class="card-body" style="align-self: center; padding-top: 5px;">
                            <h4><?php echo htmlentities($bookingcount); ?></h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</div>
</main>
<?php
include('./includes/footer.php');
?>
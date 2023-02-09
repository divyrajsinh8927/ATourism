<?php

include('includes/layout-sidenav-light.php');
$pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
?>
<div id="layoutSidenav_content">
    <main>
        <div class="card mb-4">
            <div class="card-header" style="font-size: 30px;">
                <i class="fa-solid fa-clipboard-list"></i>
                Booking Detail
            </div>
            <div class="card-body">
                <table id="datatablesSimple" style="text-align:center;">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Hotel Name</th>
                            <th>Booking Date</th>
                            <th>Arrival Date</th>
                            <th>Leaving Date</th>
                            <th>Total Day Of Living</th>
                            <th>Total Booked Rooms</th>
                            <th>Total Price</th>
                            <th>Booking Status</th>
                            <th>Hotel Response</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>User Name</th>
                            <th>Hotel Name</th>
                            <th>Booking Date</th>
                            <th>Arrival Date</th>
                            <th>Leaving Date</th>
                            <th>Total Day Of Living</th>
                            <th>Total Booked Rooms</th>
                            <th>Total Price</th>
                            <th>Booking Status</th>
                            <th>Hotel Response</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $statementbook = $pdo->prepare("SELECT * FROM booking");
                        $statementbook->execute();
                        while ($rowbook = $statementbook->fetch()) {
                            $id = $rowbook['Hotel_id'];
                            $userid = $rowbook['User_id'];
                            $status = $rowbook['BookingIsCancel'];
                            $leavingdate = $rowbook['LeavingDate'];
                            $hotelresponse = $rowbook['Status'];
                            $statementuser = $pdo->prepare("SELECT * FROM users WHERE Id=?");
                            $statementuser->execute(array($userid));
                            $rowuser = $statementuser->fetch();
                            //city
                            $statementhotel = $pdo->prepare("SELECT * FROM hotels WHERE Id=?");
                            $statementhotel->execute(array($id));
                            $rowhotel = $statementhotel->fetch();
                            $hotel = $rowhotel['HotelName'];
                        ?>
                            <tr>
                                <td><?= $rowuser['Name']; ?></td>
                                <td><?= $hotel ?></td>
                                <td><?= $rowbook['BookingDate']; ?></td>
                                <td><?= $rowbook['ArrivalDate']; ?></td>
                                <td><?= $rowbook['LeavingDate']; ?></td>
                                <td><?= $rowbook['Totaldays']; ?></td>
                                <td><?= $rowbook['TotalRooms']; ?></td>
                                <td><?= $rowbook['TotalPrice']; ?></td>
                                <?php
                                if ($hotelresponse == Null) {
                                    if ($status != 1) {
                                ?>
                                        <td>waiting For Response</td>
                                    <?php
                                    } else {
                                    ?>
                                        <td colspan="2">Booking Canceled</td>
                                    <?php
                                    }
                                } elseif ($hotelresponse == 0) {
                                    ?>
                                    <td>Disapproved</td>
                                <?php
                                } else {
                                ?>
                                    <td>Approved</td>
                                <?php
                                }
                                if ($status == 1) {
                                ?>
                                    <!-- <td>Booking Cancled</td> -->
                                    <?php
                                } else {
                                    $currentdate = date("Y/m/d");
                                    if (strtotime($currentdate) > strtotime($leavingdate)) {
                                    ?>
                                        <td>Completed</td>
                                    <?php
                                    } else {
                                    ?>
                                        <td>Continue...</td>
                                <?php
                                    }
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>
</main>
<?php
include('./includes/footer.php');
?>
<?php
include('../home/header.php');
?>
<section class="home">
    <?php
    $pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
    if (isset($_SESSION['hotel'])) {
        // get current logged in user   
        $logedInUseremail = $_SESSION['hotel'];
        $statementid = $pdo->prepare("SELECT * from users where Email=?");
        $statementid->execute(array($logedInUseremail));
        $logedInUserid = $statementid->fetch();
        $userid = $logedInUserid['Id'];
        $username = $logedInUserid['Name'];
        $statementbookingdatahotel = $pdo->prepare("SELECT * from hotels where User_id=?");
        $statementbookingdatahotel->execute(array($userid));
        $logedInhotelid = $statementbookingdatahotel->fetch();
        $hotelid = $logedInhotelid['Id'];
        $statementbookingdata = $pdo->prepare("SELECT * from booking where Hotel_id=?");
        $statementbookingdata->execute(array($hotelid));
        // $statementbookingdata = $pdo->prepare("SELECT * from canclebookings where Hotel_id=?");
        // $statementbookingdata->execute(array($hotelid));
    ?>
        <div class="heading" style="background:url(../../images/6.jpg) no-repeat">
            <h1>BOOKING HISTORY OF <?= $username ?></h1>
        </div><br><br><br>
        <div class="flex">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>HotelName</th>
                        <th>Booking For</th>
                        <th>bookingdate</th>
                        <th>arrival-leavingdate</th>
                        <th>Totaldays</th>
                        <th>totalrooms</th>
                        <th>totalprice</th>
                        <th>Approve</th>
                        <th>Dispprove</th>
                    </tr>
                </thead>
                <!-- <tfoot>
                        <tr>
                        <th>HotelName</th>
                        <th>bookingdate</th>
                        <th>arrival-leavingdate</th>
                        <th>Totaldays</th>
                        <th>totalrooms</th>
                        <th>totalprice</th>
                        <th>States</th>
                        </tr>
                    </tfoot> -->
                <?php
                while ($logedInUserhistory = $statementbookingdata->fetch()) {
                    $bookid = $logedInUserhistory['Id'];
                    $bookingFor = $logedInUserhistory['BookingFor'];
                    $hotelid = $logedInUserhistory['Hotel_id'];
                    $statementbookinghotel = $pdo->prepare("SELECT * from hotels where Id=?");
                    $statementbookinghotel->execute(array($hotelid));
                    $bookhotel = $statementbookinghotel->fetch();
                    $hotelname = $bookhotel['HotelName'];
                    $bookingdate = date("Y-m-d", strtotime($logedInUserhistory['BookingDate']));
                    $arrivaldate = date("Y-m-d", strtotime($logedInUserhistory['ArrivalDate']));
                    $leavingdate = date("Y-m-d", strtotime($logedInUserhistory['LeavingDate']));
                    $totaldays = $logedInUserhistory['Totaldays'];
                    $totalrooms = $logedInUserhistory['TotalRooms'];
                    $totalprice = $logedInUserhistory['TotalPrice'];
                    $status = $logedInUserhistory['Status'];
                    $cancle = $logedInUserhistory['BookingIsCancel'];
                ?>
                    <tbody>
                        <tr>
                            <td data-label="Hotel-"><?= $hotelname ?></td>
                            <td data-label="BookingFor"><?= $bookingFor ?></td>
                            <td data-label="BookingDate-"><?= $bookingdate ?></td>
                            <td data-label="ArrivalDate-"><?= $arrivaldate ?> - <?= $leavingdate ?></td>
                            <td data-label="TotalDays-"><?= $totaldays ?></td>
                            <td data-label="totalRooms-"><?= $totalrooms ?></td>
                            <td data-label="totalPrice-"><?= $totalprice ?></td>
                            <?php
                            $currentdate = date("Y/m/d");
                            if($cancle == 0){
                            if (strtotime($currentdate) < strtotime($leavingdate)) {
                                if ($status == NULL) {
                            ?>
                                    <input type="hidden" value="<?= $bookid ?>" id="bookid">
                                    <td data-label="sTATES-"><a href="./approve.php?id=<?= $bookid ?>"><button class="btn-success" style="font-weight: bolder; color: black; background-color: greenyellow; border-radius: 10px; border: 1px;">&nbsp; Approve &nbsp; </button></a></td>
                                    <td data-label="sTATES-"><a href="./canclebooking.php?id=<?= $bookid ?>"><button class="btn-danger" style="font-weight: bolder; color: black; border-radius: 10px; border: 1px;">&nbsp; disapprove &nbsp;</button></a></a></td>
                                <?php
                                } else if ($status == 1) {
                                ?>
                                    <td data-label="sTATES-" colspan="2">Approved</td>
                                <?php
                                } else {
                                ?>
                                    <td data-label="sTATES-" colspan="2">DisApproved</td>
                                <?php
                                }
                            } else { ?>
                                <td data-label="sTATES-" colspan="2">Complete</td>
                    <?php
                            }
                            }else{
                                ?>
                                <td data-label="sTATES-" colspan="2">Booking Canceled</td>
                                <?php
                            }
                    }
                    } else {
                        echo "<script> window.location.href = './index.php'; alert('To Book Hotel Login First');</script>";
                    }
                
                    ?>
                        </tr>
                    </tbody>
            </table>
            <table>


                <tbody>
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
</section><br><br><br><br>
<?php
include('../home/footer.php');
?>
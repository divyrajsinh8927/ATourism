<?php
    include('./includes/layout-sidenav-light.php');
$pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
?>
<div id="layoutSidenav_content">
    <main>
        <div class="card mb-4">
            <div class="card-header" style="font-size: 30px;">
                <i class="fa-solid fa-map-location-dot"></i>
                Adding hotel
            </div>
            <div class="card-body" style="align-items: center;">
                <div class="container">
                    <form action="./process/adddataprocess.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Upload Image</label>
                            </div>
                            <input type="file" id="hotelimage" name="hotelimage1">
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Upload Image</label>
                            </div>
                            <input type="file" id="hotelimage" name="hotelimage2">
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Upload Image</label>
                            </div>
                            <input type="file"  name="hotelimage3">
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Hotel Name</label>
                            </div>
                            <input type="text" id="hotelname" name="hotelname" placeholder="Hotel name..">
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Per Day Price</label>
                            </div>
                            <input type="text" id="pdprice" name="pdprice" placeholder="Hotel Per Day Prise..">
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Select City</label>
                            </div><br>
                            <select name="citys" id="citys">
                                <option value="">Select City</option>
                                <?php
                                $bookcity = $pdo->prepare("SELECT * FROM city");
                                $bookcity->execute();
                                while ($selectcity = $bookcity->fetch()) {
                                ?>
                                    <option value="<?= $selectcity['Id']; ?>"><?= $selectcity['CityName'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="lname">Select User</label>
                                </div><br>
                                <select name="User" id="User">
                                    <option value="">Select User</option>
                                    <?php
                                    $hotelUser = $pdo->prepare("SELECT * FROM users WHERE UserType = 'H'");
                                    $hotelUser->execute();
                                    while ($hotelUsers = $hotelUser->fetch()) {
                                    ?>
                                        <option value="<?= $hotelUsers['Id']; ?>"><?= $hotelUsers['Name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="subject">Hotel Details</label>
                            </div><br>
                            <textarea id="placedetail" name="detail" placeholder="Write something.." style="height:200px"></textarea>
                        </div><br>
                        <div class="row">
                            <input type="submit" value="ADD" name="addhotel">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?php
include('./includes/footer.php');
?>
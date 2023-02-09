<?php
include('./includes/layout-sidenav-light.php');
$pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
$id = $_GET['id'];
$statementrecord = $pdo->prepare("SELECT * FROM hotels WHERE Id=?");
$statementrecord->execute(array($id));
$rowrecord = $statementrecord->fetch();
$name = $rowrecord['HotelName'];
$pdprice = $rowrecord['PerDayPrice'];
$city_id = $rowrecord['City_id'];
$detail = $rowrecord['HotelDetail'];
$statementcity = $pdo->prepare("SELECT * FROM city WHERE Id=?");
$statementcity->execute(array($city_id));
$rowcity = $statementcity->fetch();
$city = $rowcity['CityName'];
?>
?>
<div id="layoutSidenav_content">
    <main>
        <div class="card mb-4">
            <div class="card-header" style="font-size: 30px;">
                <i class="fa-solid fa-map-location-dot"></i>
                Adding Places
            </div>
            <div class="card-body" style="align-items: center;">
                <div class="container">
                    <form action="./process/updateprocess.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                        <?php
                            $statementimage = $pdo->prepare("SELECT * FROM hotelmedia WHERE Hotel_id=?");
                            $statementimage->execute(array($id));;
                            while ($rowimage = $statementimage->fetch()) {
                                $placeimage = $rowimage['HotelImages'];
                            ?>
                            <div class="col-25">
                            <img src="../images/<?= $placeimage  ?>" alt="" style="height: 150px; width: 200px; margin-top: 10px;"/>
                                    <input type="radio" name="hotelimage" class="imgradiobutton" value="<?= $rowimage['Id']; ?>"  />
                            </div>
                            <?php } ?>
                            </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Upload Image</label>
                            </div>
                            <input type="file" id="hotelimage" name="hotelimage" value="<?php echo $img; ?>">
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Place Name</label>
                            </div>
                            <input type="text" id="hotelname" name="hotelname" placeholder="Place name.." value="<?= $name ?>">
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Per Day Price</label>
                            </div>
                            <input type="text" id="pdprice" name="pdprice" placeholder="Hotel Per Day Prise.." value="<?= $pdprice ?>">
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Select City</label>
                            </div><br>
                            <select name="citys" id="citys">
                                <option value="<?= $city_id ?>"><?= $city ?></option>
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
                                <label for="subject">Place Details</label>
                            </div><br>
                            <textarea id="placedetail" name="detail" placeholder="Write something.." style="height:200px"><?= $detail ?></textarea>
                        </div><br>
                        <div class="row">
                            <input type="submit" value="Update" name="Updatehotel">
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
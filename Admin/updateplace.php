<?php
include('./includes/layout-sidenav-light.php');
$pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
$id = $_GET['id'];
$statementrecord = $pdo->prepare("SELECT * FROM places WHERE Id=?");
$statementrecord->execute(array($id));
$rowrecord = $statementrecord->fetch();
$name = $rowrecord['PlaceName'];
$city_id = $rowrecord['City_id'];
$detail = $rowrecord['Discription'];
//city
$statementcity = $pdo->prepare("SELECT * FROM city WHERE Id=?");
$statementcity->execute(array($city_id));
$rowcity = $statementcity->fetch();
$state_id = $rowcity['State_id'];
//state
$statementstate = $pdo->prepare("SELECT * FROM states WHERE Id=?");
$statementstate->execute(array($state_id));
$rowstate = $statementstate->fetch();
$country_id = $rowstate['Country_id'];
//country
$statementcountry = $pdo->prepare("SELECT * FROM country WHERE Id=?");
$statementcountry->execute(array($country_id));
$rowcountry = $statementcountry->fetch();
$country = $rowcountry['CountryName'];
$state = $rowstate['StateName'];
$city = $rowcity['CityName'];
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
                            $statementimage = $pdo->prepare("SELECT * FROM placemedia WHERE Place_id=?");
                            $statementimage->execute(array($id));;
                            while ($rowimage = $statementimage->fetch()) {
                                $placeimage = $rowimage['PlaceImages'];
                            ?>
                                <div class="col-25">
                                    <img src="../images/<?= $placeimage  ?>" alt="" style="height: 150px; width: 200px; margin-top: 10px;"/>
                                    <input type="radio" id="placeimage1" name="placeimage1" class="imgradiobutton" value="<?= $rowimage['Id']; ?>"  />
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Upload Image</label>
                            </div>
                            <input type="file" id="placeimage1" name="placeimage1">
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Place Name</label>
                            </div>
                            <input type="text" id="placename" name="placename" placeholder="Place name.." value="<?= $name ?>">
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Select Country</label>
                            </div><br>
                            <select name="country" id="country">
                                <option value=""><?= $country ?></option>
                                <?php
                                $statement = $pdo->prepare("SELECT * FROM country");
                                $statement->execute();
                                while ($row = $statement->fetch()) {
                                ?>
                                    <option value="<?= $row['Id']; ?>"><?= $row['CountryName']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Select State</label>
                            </div><br>
                            <select name="state" id="state">
                                <option value=""><?= $state ?></option>
                                <?php
                                $bookstate = $pdo->prepare("SELECT * FROM States");
                                $bookstate->execute();
                                while ($selctstate = $bookstate->fetch()) {
                                ?>
                                    <option value="<?= $selctstate['Id']; ?>"><?= $selctstate['StateName']; ?></option>
                                <?php } ?>
                            </select>
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
                            <input type="submit" value="Update" name="Updateplace">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        $('#country').on('change', function() {
            var country_id = this.value;
            $.ajax({
                url: "ajaxdata.php?country_id=" + country_id,
                type: "GET",
                data: {
                    country_id: country_id
                },
                cache: false,
                success: function(result) {
                    $("#state").html(result);
                    $('#citys').html('<option value="">Select State First</option>');
                }
            });
        });

        $('#state').on('change', function() {
            var State_id = this.value;
            $.ajax({
                url: "ajaxdata.php?State_id=" + State_id,
                type: "GET",
                data: {
                    State_id: State_id
                },
                cache: false,
                success: function(result) {
                    $("#citys").html(result);
                }
            });
        });
    });
</script>
<?php
include('./includes/footer.php');
?>
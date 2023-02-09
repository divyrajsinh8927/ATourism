<?php
include('./includes/layout-sidenav-light.php');
$pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
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
                    <form action="./process/adddataprocess.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Upload Image</label>
                            </div>
                            <input type="file" id="placeimage" name="placeimage" required>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Upload Image</label>
                            </div>
                            <input type="file"  name="placeimage2" required>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Upload Image</label>
                            </div>
                            <input type="file" name="placeimage3" required>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Place Name</label>
                            </div>
                            <input type="text" id="placename" name="placename" placeholder="Place name.." required>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Select Country</label>
                            </div><br>
                            <select name="country" id="country" required>
                                <option value="">Select Country</option>
                                <?php
                                $statement = $pdo->prepare("SELECT * FROM country");
                                $statement->execute();
                                while ($row = $statement->fetch()) {
                                ?>
                                    <option value="<?= $row['Id']; ?>" ><?= $row['CountryName']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Select State</label>
                            </div><br>
                            <select name="state" id="state" >
                                <option value="">Select State</option>
                                <?php
                                $bookstate = $pdo->prepare("SELECT * FROM States");
                                $bookstate->execute();
                                while ($selctstate = $bookstate->fetch()) {
                                ?>
                                    <option value="<?= $selctstate['Id']; ?>" required><?= $selctstate['StateName']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Select City</label>
                            </div><br>
                            <select name="citys" id="citys" required> 
                                <option value="">Select City</option>
                                <?php
                                $bookcity = $pdo->prepare("SELECT * FROM city");
                                $bookcity->execute();
                                while ($selectcity = $bookcity->fetch()) {
                                ?>
                                    <option value="<?= $selectcity['Id']; ?>" ><?= $selectcity['CityName'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="subject">Place Details</label>
                            </div><br>
                            <textarea id="placedetail" name="detail" placeholder="Write something.." style="height:200px" required></textarea>
                        </div><br>
                        <div class="row">
                            <input type="submit" value="ADD" name="addplace">
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
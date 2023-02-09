<?php
include('includes/layout-sidenav-light.php');
$pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
?>
<div id="layoutSidenav_content">
    <main>
        <div class="card mb-4">
            <div class="card-header" style="font-size: 30px;">
                <i class="fa-solid fa-map-location-dot"></i>
                Place Management
                <a href="addplace.php" id="addplace" style="text-decoration: none; color: black;border: 0px solid; float: right;">+ Add Place <i class="fa-solid fa-map-location-dot"></i> </a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Place Name</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Details</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $statementplace = $pdo->prepare("SELECT * FROM places");
                        $statementplace->execute();
                        while ($rowplace = $statementplace->fetch()) {
                            $id = $rowplace['Id'];
                            $discription = $rowplace['Discription'];
                            $cityid = $rowplace['City_id'];
                            $delete = $rowplace['PlaceIsDelete'];
                            //city
                            $statementcity = $pdo->prepare("SELECT * FROM city WHERE Id=?");
                            $statementcity->execute(array($cityid));
                            $rowcity = $statementcity->fetch();
                            $city = $rowcity['CityName'];
                            $stateid = $rowcity['State_id'];
                            //state
                            $statementstate = $pdo->prepare("SELECT * FROM states WHERE Id=?");
                            $statementstate->execute(array($stateid));
                            $rowstate = $statementstate->fetch();
                            $state = $rowstate['StateName'];
                            $countryid = $rowstate['Country_id'];
                            //Country
                            $statementcountry = $pdo->prepare("SELECT * FROM country WHERE Id=?");
                            $statementcountry->execute(array($countryid));
                            $rowcountry = $statementcountry->fetch();
                            $country = $rowcountry['CountryName'];
                            //photo
                            $statementimage = $pdo->prepare("SELECT * FROM placemedia WHERE Place_id=?");
                            $statementimage->execute(array($id));;


                            if ($delete == 0) {
                        ?>
                                <tr>
                                    <td>
                                        <?php
                                        while ($rowimage = $statementimage->fetch()) {
                                            $placeimage = $rowimage['PlaceImages'];
                                        ?>
                                            <img src="../images/<?= $placeimage  ?>" alt="" style="height: 150px; width: 250px; margin-top: 10px;">
                                        <?php } ?>
                                    </td>
                                    <td><?= $rowplace['PlaceName']; ?></td>
                                    <td><?= $city ?></td>
                                    <td><?= $state ?></td>
                                    <td><?= $country ?></td>
                                    <td><?= $discription ?></td>
                                    <td><a href="./process/deleteplace.php?id=<?= $id ?>" onclick="if (! confirm('You Want To Delete The Place ?')) { return false; }"><input type="submit" name="delete" value="Delete" style="background-color: orangered;"></a></td>
                                    <td><a href="./updateplace.php?id=<?= $id ?>"><input type="submit" name="update" value="Update"></a></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>Place Name</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Details</th>
                            <th>Update</th>
                            <th>Update</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
</div>
</main>
<script>
window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple, {
         perPage: 5
         });

       
    }
});
</script>
<?php
include('./includes/footer.php');
?>
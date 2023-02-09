<?php
include('includes/layout-sidenav-light.php');
$pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
?>
<div id="layoutSidenav_content">
    <main>
        <div class="card mb-4">
            <div class="card-header" style="font-size: 30px;">
                <i class="fa-solid fa-hotel"></i>
                Hotel Mangement
                <a href="addhotel.php" id="addhotel" style="text-decoration: none; color: black;border: 0px solid; float: right;"> + Add Hotel <i class="fa-solid fa-hotel"></i></a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>hotel Name</th>
                            <th>Per Day Price</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Details</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>hotel Name</th>
                            <th>Per Day Price</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Details</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $statementhotel = $pdo->prepare("SELECT * FROM hotels");
                        $statementhotel->execute();
                        while ($rowhotel = $statementhotel->fetch()) {
                            $id = $rowhotel['Id'];
                            $pdprice = $rowhotel['PerDayPrice'];
                            $cityid = $rowhotel['City_id'];
                            $delete = $rowhotel['HotelIsDelete'];
                            //city
                            $statementcity = $pdo->prepare("SELECT * FROM city WHERE Id=?");
                            $statementcity->execute(array($cityid));
                            $rowcity = $statementcity->fetch();
                            $city = $rowcity['CityName'];
                            //state
                            $statementstate = $pdo->prepare("SELECT * FROM states WHERE Id=?");
                            $statementstate->execute(array($rowcity['State_id']));
                            $rowstate = $statementstate->fetch();
                            $state = $rowstate['StateName'];
                            //city
                            $statementcountry = $pdo->prepare("SELECT * FROM country WHERE Id=?");
                            $statementcountry->execute(array($rowstate['Country_id']));
                            $rowcountry = $statementcountry->fetch();
                            $country = $rowcountry['CountryName'];
                            //hotelimage
                            $statementimage = $pdo->prepare("SELECT * FROM hotelmedia WHERE Hotel_id=?");
                            $statementimage->execute(array($id));

                            if ($delete == 0) {
                        ?>
                                <tr>
                                    <td><?php
                                    while ($rowimage = $statementimage->fetch()) {
                                        $hotelimage = $rowimage['HotelImages'];
                                        ?>
                                        <img src="../images/<?= $hotelimage?>" alt="" style="width: 250px;height: 150px; margin-top: 10px;">
                                    <?php
                                    }
                                    ?>
                                    </td>
                                    <td><?= $rowhotel['HotelName']; ?></td>
                                    <td><?= $pdprice ?></td>
                                    <td><?= $city ?></td>
                                    <td><?= $state ?></td>
                                    <td><?= $country ?></td>
                                    <td><?= $rowhotel['HotelDetail']; ?></td>
                                    <td><a href="./process/deletehotel.php?id=<?= $id ?>" onclick="if (! confirm('You Want To Delete The Hotel ?')) { return false; }"><input type="submit" name="delete" value="Delete" style="background-color: orangered;"></a></td>
                                    <td><a href="./updatehotel.php?id=<?= $id ?>"><input type="submit" name="update" value="Update"></a></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
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
<?php
include('./includes/layout-sidenav-light.php');
?>
<div id="layoutSidenav_content">
    <main>
        <div class="card mb-4">
            <div class="card-header" style="font-size: 30px;">
                <i class="fas fa-users-cog"></i>
                UsersManagement
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile-No</th>
                            <th>Email</th>
                            <!-- <th>Password</th> -->
                            <th>Status</th>
                            <th>Change Status</th>
                            <th>Delete User</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Mobile-No</th>
                            <th>Email</th>
                            <!-- <th>Password</th> -->
                            <th>Status</th>
                            <th>Change Status</th>
                            <th>Delete User</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
                        $usertype = 'U';
                        $usertypeh = 'H';
                        $statementusers = $pdo->prepare("SELECT * FROM users WHERE UserType=? or UserType=?");
                        $statementusers->execute(array($usertype, $usertypeh));
                        while ($rowuser = $statementusers->fetch()) {
                            if ($rowuser['UserIsDelete'] == 0) {
                        ?>
                                <tr>
                                    <td><?= $rowuser['Name']; ?></td>
                                    <td><?= $rowuser['MobileNumber']; ?></td>
                                    <td><?= $rowuser['Email']; ?></td>
                                    <!-- <td><?= $rowuser['PasswordHash']; ?></td> -->
                                    <?php
                                    if ($rowuser['Status'] == 1) {
                                        $status = "Active";
                                    } else {
                                        $status = "Deactive";
                                    }
                                    ?>
                                    <td><?= $status ?></td>
                                    <?php
                                    if ($rowuser['Status'] != 1) {
                                    ?>
                                        <td><a href="./process/activedeactive.php?id=<?= $rowuser['Id']; ?>" onclick="if (! confirm('Are you Sure?')) { return false; }"><button class="btn-success" style="font-weight: bolder; color: black; background-color: greenyellow; border-radius: 4px; border: 1px;">&nbsp; ACTIVE &nbsp; </button></a></td>
                                    <?php
                                    } else {
                                    ?>
                                        <td><a href="./process/activedeactive.php?id=<?= $rowuser['Id']; ?>" onclick="if (! confirm('Are You Sure?')) { return false; }"><button class="btn-danger" style="font-weight: bolder; color: black; border-radius: 4px; border: 1px;">&nbsp; DEACTIVE &nbsp;</button></a></td>
                                    <?php
                                    }
                                    ?>
                                    <td><a href="./process/deleteusers.php?id=<?= $rowuser['Id']; ?>" onclick="if (! confirm('You Want To Delete The User?')) { return false; }"><input type="submit" name="delete" value="Delete" style="background-color: orangered;"></a></td>
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
<?php
include('./includes/footer.php');
?>
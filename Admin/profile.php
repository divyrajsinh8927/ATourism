<?php
include('./includes/layout-sidenav-light.php');
?>
<div id="layoutSidenav_content">
    <main>
        <section class="pro-body">
            <div class="card-container1">
                <img class="round" src="../images/profile-page.png" alt="user" />
                <?php
                $pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
                if (isset($_SESSION['Admin'])) {
                    // get current logged in user   
                    $logedInUseremail = $_SESSION['Admin'];
                    $statementuser = $pdo->prepare("SELECT * from users where Email=?");
                    $statementuser->execute(array($logedInUseremail));
                    $logedInUsername = $statementuser->fetch();
                    $currentusername = $logedInUsername['Name'];
                    $currentusermobial = $logedInUsername['MobileNumber'];
                }
                ?>
                <div class="ds pens">
                    <h2><?= $currentusername ?></h2>
                    <h3>Email:</h3>
                    <h4><?= $logedInUseremail; ?></h4>
                    <h3>Mobile No :</h3>
                    <h4><?= $currentusermobial ?></h4>
                </div>
                <div class="buttons">
                    <a href="./process/logout.php"><button class="primary">
                            Log-Out
                        </button></a>
                </div>
            </div>
        </section>
    </main>
</div>
<?php
include('./includes/footer.php');
?>
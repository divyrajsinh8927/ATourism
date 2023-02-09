<section class="pro-body">
    <div class="card-container1">
        <img class="round" src="../../images/profile-page.png" alt="user" />
        <?php
        $pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
        if (isset($_SESSION['user'])) {
            // get current logged in user   
            $logedInUseremail = $_SESSION['user'];
            $statementuser = $pdo->prepare("SELECT * from users where Email=?");
            $statementuser->execute(array($logedInUseremail));
            while ($logedInUsername = $statementuser->fetch()) {
                $currentusername = $logedInUsername['Name'];
                $currentusermobial = $logedInUsername['MobileNumber'];
            }
        }
        elseif(isset($_SESSION['hotel'])) {
            // get current logged in user   
            $logedInUseremail = $_SESSION['hotel'];
            $statementuser = $pdo->prepare("SELECT * from users where Email=?");
            $statementuser->execute(array($logedInUseremail));
            while ($logedInUsername = $statementuser->fetch()) {
                $currentusername = $logedInUsername['Name'];
                $currentusermobial = $logedInUsername['MobileNumber'];
            }
        }
        ?>
        <div class="ds pens">
        <h2><?=$currentusername?></h2>
        <h3>Email:</h3>
        <div style="width: 90%; overflow-wrap: break-word; margin: 0 auto; " class="email"><?=$logedInUseremail;?></div>
        <h3>Mobile No :</h3>
        <h4><?=$currentusermobial;?></h4>
        </div>
        <div class="buttons">
            <a href="../../loginlogout/logout.php"><button class="primary">
                    Log-Out
                </button></a>
            </div>
            <div class="buttons" style="padding-top: 2px;">
            <a href="../../loginlogout/check-password.php"><button class="primary" style="background-color: transparent; color: blue;border: non;">
                    Change Password
                </button></a>
            </div>
    </div>
</section>